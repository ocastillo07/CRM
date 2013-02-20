function isFloat(s)
  {
  var n = s; //trim(s);
  return n.length>0 && !(/[^0-9.]/).test(n) && (/\.\d/).test(n);
  }

function round(num, dec)
  {
  var result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
  return result;
  }

function ValidaDecimal(num, event)
  {
  if((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode!=13)  )
    {
    if(event.keyCode == 46)
      {
      if(isFloat(num))
        {
        event.keyCode = 32;
        return false;
        }
      else
        {
        if(num.indexOf('.') > -1)
          {
          event.keyCode = 32;
          return false;
          }
        else
          return event.keyCode;
        }
      }
    else
      {
      event.keyCode = 32;
      return false;
      }
    }
  else
    return event.keyCode;
  }

function ValidaEntero(num, event)
{
  if((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode!=13)  )
    {
    event.keyCode = 32;
    return false;
    }
  else
    return event.keyCode;
}

function validarEventos()
{
	var dlist = document.getElementsByTagName('html');
	for( var i = 0; i < dlist.length; i++ )
		attachHandler(dlist.item(i));
}

function attachHandler(node)
{
	// Iterate the dom, attaching the onkeypress event to all of the items
	if( node.nodeType == 1 ) // Element
	{
		node.onkeydown = down;
		node.onkeypress = press;
		//alert('Attached checkShortcut to '+node.nodeName+' '+node.readOnly);
		// Iterate the children of this node
		var children = node.childNodes;
		for( var i = 0; i < children.length; i++ )
			attachHandler(children.item(i));
	}
}

function stopPropagation(e)
{
	e = e||event; /* get IE event ( not passed ) */
	//alert(e.keyCode);
	e.stopPropagation? e.stopPropagation() : e.cancelBubble = true;
}

function down(e)
{
  stopPropagation(e);
  tecla = (document.all) ? event.keyCode : event.which;
  if(tecla==8)
  {
	  activeElement = event.srcElement;
	  //alert(activeElement.type);
	  if(activeElement.type == 'textarea')
	  {
		  //alert(activeElement.readOnly);
		  if(activeElement.readOnly == true)
			  return false;
	  }
	  else
		  if (activeElement.type == 'text')
		  {
			  //alert(activeElement.readOnly);
			  if(activeElement.readOnly == true)
				  return false;
		  }
		  else
			  return false;
  }
}

function press(e)
{
  stopPropagation(e);
  tecla = (document.all) ? event.keyCode : event.which;
	if(tecla==13)
		return false;
}

function posicionCursor(edit)
{
       var tb = edit;
        var cursor = -1;

        // IE
        if (document.selection && (document.selection != 'undefined'))
        {
            var _range = document.selection.createRange();
            var contador = 0;
            while (_range.move('character', -1))
                contador++;
            cursor = contador;
        }
       // FF
        else if (tb.selectionStart >= 0)
            cursor = tb.selectionStart;

       return cursor;
}

function setCaretPosition(elem, caretPos)
{
    if(elem != null)
    {
        if(elem.createTextRange)
        {
            var range = elem.createTextRange();
            range.move('character', caretPos);
            range.select();
        }
        else
        {
            if(elem.selectionStart)
            {
                elem.focus();
                elem.setSelectionRange(caretPos, caretPos);
            }
            else
                elem.focus();
        }
    }
}


function RelojDigital(elem)
{
  if(ValidarHora(elem.value) == false)
    return false;

  var p = posicionCursor(elem);
  var l = elem.value.length;

   //ARRIBA
   if(event.keyCode == 38)
   {
   //hora
   if(p == 0 || p == 1  )
      {
      var h = elem.value.substr(0, 2);

      if(h == 23)
        h = 0;
      else
        if(h >= 0 && 23 >= h)
          h++;

      if(10 > h)
        h = '0'+h;

      var r = elem.value.substr(2, l);

      elem.value = h + r;
      }

   //minutos
   if(p == 3 || p == 4  )
      {
      var h = elem.value.substr(3, 2);

      if(h == 59)
        h = 0;
      else
        if(h >= 0 && 59 >= h)
          h++;

      if(10 > h)
        h = '0'+h;

      var i = elem.value.substr(0, 3);
      var r = elem.value.substr(5, l);

      elem.value = i + h + r;
      }

   //segundos
   if(p == 6 || p == 7  )
      {
      var h = elem.value.substr(6, 2);

      if(h == 59)
        h = 0;
      else
        if(h >= 0 && 59 >= h)
          h++;

      if(10 > h)
        h = '0'+h;

      var i = elem.value.substr(0, 6);
      elem.value = i + h;
      }
   }

   //ABAJO
   if(event.keyCode == 40)
   {
   //hora
   if(p == 0 || p == 1  )
      {
      var h = elem.value.substr(0, 2);

      if(h == 0)
        h = 23;
      else
        if(h >= 0 && 23 >= h)
          h--;

      if(10 > h)
        h = '0'+h;

      var r = elem.value.substr(2, l);

      elem.value = h + r;
      }

   //minutos
   if(p == 3 || p == 4  )
      {
      var h = elem.value.substr(3, 2);

      if(h == 0)
        h = 59;
      else
        if(h >= 0 && 59 >= h)
          h--;

      if(10 > h)
        h = '0'+h;

      var i = elem.value.substr(0, 3);
      var r = elem.value.substr(5, l);

      elem.value = i + h + r;
      }

   //segundos
   if(p == 6 || p == 7  )
      {
      var h = elem.value.substr(6, 2);

      if(h == 0)
        h = 59;
      else
        if(h >= 0 && 59 >= h)
          h--;

      if(10 > h)
        h = '0'+h;

      var i = elem.value.substr(0, 6);
      elem.value = i + h;
      }
   }

   setCaretPosition(elem, p);
   return true;
   //FF
   //vcl.$('edinicio').selectionStart = p;
}

function ValidarHora(hora)
{
  if (hora=='')
    return false;

  if (hora.length>8)
  {
  //alert("Introdujo una cadena mayor a 8 caracteres");
  return false;
  }

  if (hora.length!=8 && hora.length!=5)
  {
    //alert("Introducir HH:MM:SS");
    return false;
  }


a=hora.charAt(0) //<=2
b=hora.charAt(1) //<4
c=hora.charAt(2) //:
d=hora.charAt(3) //<=5
e=hora.charAt(5) //:
f=hora.charAt(6) //<=5

if ((a==2 && b>3) || (a>2))
  {
  //alert("El valor que introdujo en la Hora no corresponde, introduzca un digito entre 00 y 23");
  return false;
  }

if (d>5)
{
  //alert("El valor que introdujo en los minutos no corresponde, introduzca un digito entre 00 y 59");
  return false;
}



if (f>5)
{
  //alert("El valor que introdujo en los segundos no corresponde");
  return false;
}

if (c!=':')
{
  //alert("Introduzca el caracter ':' para separar la hora, los minutos y los segundos");
  return false;
}

if (hora.length==8 )
if ( e!=':')
{
  //alert("Introduzca el caracter ':' para separar la hora, los minutos y los segundos");
  return false;
}

return true;
}

function getRadioButtonValue(ctrl)
{
    for(i=0;i<ctrl.length;i++)
        if(ctrl[i].checked)
          return ctrl[i].value;
        else
          return -1;
}

function setCheckedValue(radioObj, newValue) {
	if(!radioObj)
		return;
	var radioLength = radioObj.length;
	if(radioLength == undefined) {
		radioObj.checked = (radioObj.value == newValue.toString());
		return;
	}
	for(var i = 0; i < radioLength; i++) {
		radioObj[i].checked = false;
		if(radioObj[i].value == newValue.toString()) {
			radioObj[i].checked = true;
		}
	}
}
