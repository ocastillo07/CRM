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
