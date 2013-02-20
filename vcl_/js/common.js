function isdefined(object, variable)
{
        return (typeof(eval(object)[variable]) != 'undefined');
}

function findObj(id,thedoc)
{
    var f, k;

    if (!thedoc) thedoc=document;

    if (thedoc.all)
    {
        f=thedoc[id];
        if (f) return(f);
    }

    for (k=0;k<thedoc.forms.length;k++)
    {
        f=thedoc.forms[k][id];
        if (f) return(f);
    }

    if (thedoc.layers)
    {
        for(k=0;k<thedoc.layers.length;k++)
        {
            f=findObj(id,thedoc.layers[i].document);
            if (f) return(f);
        }
    }

    if (thedoc.getElementById)
    {
        f=thedoc.getElementById(id);
        return(f);
    }
}

function showLayer(layername,event)
{
        layer=findObj(layername);
        l=event.clientX+document.body.scrollLeft+40;
        t=event.clientY+document.body.scrollTop-100;
        layer.style.left=l.toString()+"px";
        layer.style.top=t.toString()+"px";
        layer.style.visibility="visible";
}

function hideLayer(layername)
{
        layer=findObj(layername);
        layer.style.visibility="hidden";
}


function toJSON(xa)
{
    var m = {
            '\b': '\\b',
            '\t': '\\t',
            '\n': '\\n',
            '\f': '\\f',
            '\r': '\\r',
            '"' : '\\"',
            '\\': '\\\\'
        };

        s = {
            array: function (x) {
                var a = ['['], b, f, i, l = x.length, v;
                for (i = 0; i < l; i += 1) {
                    v = x[i];
                    f = s[typeof v];
                    if (f) {
                        v = f(v);
                        if (typeof v == 'string') {
                            if (b) {
                                a[a.length] = ',';
                            }
                            a[a.length] = v;
                            b = true;
                        }
                    }
                }
                a[a.length] = ']';
                return a.join('');
            },
            'boolean': function (x) {
                return String(x);
            },
            'null': function (x) {
                return "null";
            },
            number: function (x) {
                return isFinite(x) ? String(x) : 'null';
            },
            object: function (x) {
                if (x) {
                    if (x instanceof Array) {
                        return s.array(x);
                    }
                    if (!x.json)
                    {
                    x.json=1;
                    var a = ['{'], b, f, i, v;
                    for (i in x) {
                        v = x[i];
                        f = s[typeof v];
                        if (f) {
                            v = f(v);
                            if (typeof v == 'string') {
                                if (b) {
                                    a[a.length] = ',';
                                }
                                a.push(s.string(i), ':', v);
                                b = true;
                            }
                        }
                    }
                    a[a.length] = '}';
                    return a.join('');
                    }
                }
                return 'null';
            },
            string: function (x) {
                if (/["\\\x00-\x1f]/.test(x)) {
                    x = x.replace(/([\x00-\x1f\\"])/g, function(a, b) {
                        var c = m[b];
                        if (c) {
                            return c;
                        }
                        c = b.charCodeAt();
                        return '\\u00' +
                            Math.floor(c / 16).toString(16) +
                            (c % 16).toString(16);
                    });
                }
                return '"' + x + '"';
            }
        };

        return(s.object(xa));
};

String.prototype.parseJSON = function () {
    try {
        return !(/[^,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t]/.test(
                this.replace(/"(\\.|[^"\\])*"/g, ''))) &&
            eval('(' + this + ')');
    } catch (e) {
        return false;
    }
};



       function dumpObj(obj, name, indent, depth) {

              if (depth > 10) {

                     return indent + name + ": <Maximum Depth Reached>\n";

              }

              if (typeof obj == "object") {

                     var child = null;

                     var output = indent + name + "\n";

                     indent += "\t";

                     for (var item in obj)

                     {

                           try {

                                  child = obj[item];

                           } catch (e) {

                                  child = "<Unable to Evaluate>";

                           }

                           if (typeof child == "object") {

                                  output += dumpObj(child, item, indent, depth + 1);

                           } else {

                                  output += indent + item + ": " + child + "\n";

                           }

                     }

                     return output;

              } else {

                     return obj;

              }

       }

       /*
       Codigo agregado para el uso de ajax
       */

      vcl=
      {
        $:function ()
        {
          var elements = new Array();
          for (var i = 0; i < arguments.length; i++)
          {
            var element = arguments[i];
            if (typeof element == 'string')
              element = findObj(element);
            if (arguments.length == 1)
              return element;
            elements.push(element);
          }
          return elements;
        },
        int:function(obj)
        {
          return parseInt(vcl.$(obj).value);
        },
        real:function(obj)
        {
          return parseFloat(vcl.$(obj).value);
        },
        escape:function(obj)
        {
          return escape(vcl.$(obj).value);
        },
        unescape:function(obj)
        {
          return unescape(vcl.$(obj).value);
        },
        focus:function(obj)
        {
          vcl.$(obj).focus();
        },
        check:function(obj)
        {
          vcl.$(obj).checked=true;
        },
        uncheck:function(obj)
        {
          vcl.$(obj).checked=false;
        },
        hide:function(obj)
        {
          vcl.$(obj).style.display = 'none';
        },
        show:function(obj)
        {
          vcl.$(obj).style.display = '';
        },
        find:function(obj)
        {
          return vcl.$(obj);
        },
        text:function(obj)
        {
          return vcl.$(obj).value;
        },
        value:function(obj)
        {
          return vcl.$(obj).value;
        },
        setOpacity:function(incoming,value)
        {
          theObj=vcl.$(incoming);
          theObj.style.opacity = value/10;
          theObj.style.filter = 'alpha(opacity=' + value*10 + ')';
        }
      }

      function createHTTPrequest()
      {
        /* Firefox, Opera 8.0+, Safari */
        try
        {
          return new XMLHttpRequest();
        }
        catch (error) {}
        /* newer IE */
        try
        {
          return new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (error) {}
        /* older IE */
        try
        {
          return new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (error) {}
        throw new Error("Your browser does not have AJAX support!");
      }

      function basicAjax (url,parameters,callback)
      {
        xmlHttp=createHTTPrequest();
        if (callback)
        {
          xmlHttp.onreadystatechange=callback;
        }
        else
        {
          xmlHttp.onreadystatechange=function()
          {
            if(xmlHttp.readyState==4)
            {
              if (xmlHttp.status == 200)
              {
                eval(xmlHttp.responseText);
              }
              else
              {
                alert("Sorry, received a server error ="+xmlHttp.statusText);
              }
            }
          }
        }
        xmlHttp.open("POST",url,true);
        if (typeof(basicAjaxAsyncFalse) != 'undefined' && basicAjaxAsyncFalse==1)
          xmlHttp.open("POST",url,false);
          //this will force a wait for return
          xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
          xmlHttp.setRequestHeader("If-Modified-Since", "Fri, 31 Dec 1999 23:59:59GMT");
          xmlHttp.send(parameters);
      }
