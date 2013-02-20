/*********************************************************************************/
/*                  JomiTech Components For PHP Script File                      */
/*               Copyright © JomiTech 2007. All Rights Reserved.                 */
/*********************************************************************************/
var JTMenuActive = null;
var JTMenuSkipClick = false;
var JTMenuList = new Array();
var JTIEVer = getIEVersion();
var JTRegisteredOnResize = new Array();
var JTPageLoaded = false;

addEvent( document, "click", JTMenuDocumentClick );
addEvent( window, "load", JTMenuOnLoad );
addEvent( window, "load", JTPageOnLoad );

function JTPageOnLoad()
{
    JTPageLoaded = true;
}

function JTJSLog( message )
{
    if( typeof( jtLogWindow ) == "undefined" || jtLogWindow.closed )
    {
        jtLogWindow = window.open( "", null, "width=500,height=300,scrollbars=yes,resizable=yes,status=no,location=no,menubar=no,toolbar=no" );
        if( !jtLogWindow )
            return;

        jtLogWindow.document.open();
        jtLogWindow.document.write( "<html><head><title>JomiTech JavaScript Debug Output</title></head><body></body></html>" );
        jtLogWindow.document.close();
    }

    jtLogWindow.document.body.appendChild( jtLogWindow.document.createTextNode( message ) );
    jtLogWindow.document.body.appendChild( jtLogWindow.document.createElement( "br" ) );
}

function getEventTarget( e )
{
    return ( e.srcElement ) ? e.srcElement : e.target;
}

function getParentNode( object )
{
    var p = object.parentNode;

    while( p.id == ( object.id + "_outer" ) || p.id == ( object.id + "_outerdiv" ) )
        p = p.parentNode;

    return p;
}

function getSizedParentNode( object )
{
    if( getOuterNode( object ) )
        return getOuterNode( object ).offsetParent;
    else
        return object.offsetParent;
}

function getOuterNode( object )
{
    return document.getElementById( object.id + "_outer" );
}

function getBrowserScrollX()
{
    if( window.pageXOffset )
        return window.pageXOffset;
    else if( document.documentElement && document.documentElement.scrollLeft )
        return document.documentElement.scrollLeft;
    else
        return document.body.scrollLeft;
}

function getBrowserScrollY()
{
    if( window.pageYOffset )
        return window.pageYOffset;
    else if( document.documentElement && document.documentElement.scrollTop )
        return document.documentElement.scrollTop;
    else
        return document.body.scrollTop;
}

function setBrowserScrollX( x )
{
    if( window.pageXOffset )
        window.pageXOffset = x;
    else if( document.documentElement && document.documentElement.scrollLeft )
        document.documentElement.scrollLeft = x;
    else
        document.body.scrollLeft = x;
}

function setBrowserScrollY( y )
{
    if( window.pageYOffset )
        window.pageYOffset = y;
    else if( document.documentElement && document.documentElement.scrollTop )
        document.documentElement.scrollTop = y;
    else
        document.body.scrollTop = y;
}

function getBrowserWidth()
{
    if( document.documentElement && document.documentElement.clientWidth )
        return document.documentElement.clientWidth;
    else
        return document.body.clientWidth;
}

function getBrowserHeight()
{
    if( document.documentElement && document.documentElement.clientHeight )
        return document.documentElement.clientHeight;
    else
        return document.body.clientHeight;
}

function getObjectScreenX( object )
{
    var x = 0;

    while( object )
    {
        x += object.offsetLeft;

        object = object.offsetParent;
    }

    return x;
}

function getObjectScreenY( object )
{
    var y = 0;

    while( object )
    {
        y += object.offsetTop;

        object = object.offsetParent;
    }

    return y;
}

function setObjectScreenY( object, y )
{
    y -= getObjectScreenY( getParentNode( object ) );

    getTruePositionNode( object ).style.top = y + "px";
}

function getIEVersion()
{
    var rv = -1;

    if( navigator.appName == 'Microsoft Internet Explorer' )
    {
        var ua = navigator.userAgent;
        var re = new RegExp( "MSIE ([0-9]{1,}[\.0-9]{0,})" );

        if( re.exec( ua ) != null )
            rv = parseFloat( RegExp.$1 );
    }

    return rv;
}

function getTruePositionNode( obj )
{
    if( getOuterNode( obj ) )
        return getOuterNode( obj );
    else
        return obj;
}

function getParentWidth( obj )
{
    if( getSizedParentNode( obj ) == document.body )
        return getBrowserWidth();
    else
        return getTruePositionNode( getSizedParentNode( obj ) ).clientWidth;
}

function getParentHeight( obj )
{
    if( getSizedParentNode( obj ) == document.body )
        return getBrowserHeight();
    else
        return getTruePositionNode( getSizedParentNode( obj ) ).clientHeight;
}

function addEvent( object, eventName, functionPtr )
{
    if( window.addEventListener )
        object.addEventListener( eventName, functionPtr, false );
    else if( window.attachEvent )
        object.attachEvent( "on" + eventName, functionPtr );
}

function deleteEvent( object, eventName, functionPtr )
{
    if( window.removeEventListener )
        object.removeEventListener( eventName, functionPtr, false );
    else if( window.detachEvent )
        object.detachEvent( "on" + eventName, functionPtr );
}

function addOnSubmitEvent( object, functionPtr )
{
    addEvent( object, "submit", functionPtr );

    if( typeof( object.onSubmitEvents ) == "undefined" )
    {
        object.onSubmitEvents = new Array();

        object.oldSubmit = object.submit;
        object.submit = function()
        {
            if( JTIEVer == -1 )
            {
                var e = new JTEvent( this, "submit" );
                var i;

                for( i = 0; i < this.onSubmitEvents.length; ++i )
                {
                    var funcPtr = this.onSubmitEvents[ i ];

                    if( !funcPtr( e ) )
                        return;
                }
            }
            else
            {
                if( !this.fireEvent( "onsubmit" ) )
                    return;
            }

            this.oldSubmit();
        }

    }

    object.onSubmitEvents.push( functionPtr );
}

function getSelectionLength( f )
{
    var l = 0;

    if( document.selection )
    {
        f.focus();

        var range = document.selection.createRange();

        l = range.text.length;
    }
    else if( f.selectionStart || f.selectionStart == "0" )
    {
        l = f.selectionEnd - f.selectionStart;
    }

    return l;
}

function getCaretPosition( f )
{
    var i = 0;

    if( document.selection )
    {
        f.focus();

        var range = document.selection.createRange();

        range.moveStart( 'character', -f.value.length );

        i = range.text.length;
    }
    else if( f.selectionStart || f.selectionStart == "0" )
    {
        i = f.selectionStart;
    }

    return i;
}


function setCaretPosition( f, pos, selLength )
{
    if( document.selection )
    {
        f.focus();

        var range = document.selection.createRange();

        range.moveStart( 'character', -f.value.length );
        range.moveEnd( 'character', -f.value.length );

        range.moveStart( 'character', pos );
        range.moveEnd( 'character', selLength );

        range.select();
    }
    else if( f.selectionStart || f.selectionStart == '0' )
    {
        f.selectionStart = pos;
        f.selectionEnd = pos + selLength;
        f.focus();
    }
}

function getTotalDocumentTagCount()
{
	var all = document.all || document.getElementsByTagName( "*" );

	return all.length;
}

function JTJSFont( fontFamily, fontSize, fontColor, fontWeight, fontLineHeight, fontAlign, fontStyle, fontVariant, fontCase )
{
    this.fontAlign = fontAlign;
    this.fontCase = fontCase;
    this.fontColor = fontColor;
    this.fontFamily = fontFamily;
    this.fontLineHeight = fontLineHeight;
    this.fontSize = fontSize;
    this.fontStyle = fontStyle;
    this.fontVariant = fontVariant;
    this.fontWeight = fontWeight;

    this.applyToObjectStyle = function( object )
    {
        object.style.fontFamily = this.fontFamily;
        object.style.fontSize = this.fontSize;
        object.style.color = this.fontColor;
        object.style.fontWeight = this.fontWeight;
        object.style.lineHeight = this.fontLineHeight;
        object.style.textAlign = this.fontAlign;
        object.style.fontStyle = this.fontStyle;
        object.style.fontVariant = this.fontVariant;
        object.style.textTransform = this.fontCase;
    }
}

function JTEvent( fromElement, type )
{
    this.target = fromElement;
    this.srcElement = fromElement;
    this.type = type;
}

function JTInitializeMenu( id, jsOnClick, controlName, controlButton, controlAttachType )
{
    var menuObject = document.getElementById( id );

    menuObject.Popup = function( x, y )
    {
		var menuFrame = document.getElementById( "JTMenuFrame" );

        if( JTMenuActive )
            JTMenuActive.Hide();

        /* if( getOuterNode( this ) )
        {
            getOuterNode( this ).style.left = x + "px";
            getOuterNode( this ).style.top = y + "px";
        }
        else
        */
        // {
            this.style.left = x + "px";
            this.style.top = y + "px";
        // }

		this.style.display = "block";
        this.style.visibility = "visible";

		if( menuFrame )
		{
			menuFrame.style.left = this.style.left;
			menuFrame.style.top = this.style.top;
			menuFrame.style.width = this.offsetWidth;
			menuFrame.style.height = this.offsetHeight;
			menuFrame.style.display = "block";
			menuFrame.style.zIndex = this.style.zIndex - 1;
		}

        JTMenuActive = this;
        JTMenuSkipClick = true;
    }

    menuObject.Hide = function()
    {
		var menuFrame = document.getElementById( "JTMenuFrame" );

		if( menuFrame )
			menuFrame.style.display = "none";

        this.style.visibility = "hidden";
		this.style.display = "none";

        JTMenuActive = null;
    }

    menuObject.OnLoad = function()
    {
        if( this.controlName && this.controlButton )
        {
            var controlObject = document.getElementById( this.controlName + "_" + this.controlButton );

            if( controlObject )
            {
                controlObject.menuObject = this;

                if( this.controlAttachType )
                    addEvent( controlObject, this.controlAttachType, JTMenuControlMouseOver );
            }
        }

		this.parentNode.removeChild( this );
		document.body.appendChild( this );

		this.style.zIndex = getTotalDocumentTagCount() + 2;

		var outer = getOuterNode( this );
		if( outer )
			outer.parentNode.removeChild( outer );
    }

    menuObject.controlName = controlName;
    menuObject.controlButton = controlButton;
    menuObject.controlAttachType = controlAttachType;
    menuObject.jsOnClick = jsOnClick;
    menuObject.onclick = JTMenuClick;

    if( !document.all )
    {
        var items = menuObject.getElementsByTagName( "LI" );
        var i;

        for( i = 0; i < items.length; ++i )
        {
            items[ i ].style.MozUserSelect = "none";
            items[ i ].onmousedown = function() { return false; }
        }
    }

    eval( "window." + menuObject.id + " = document.getElementById( '" + menuObject.id + "' );" );

	if( !JTPageLoaded )
		JTMenuList.push( menuObject );
	else
		menuObject.OnLoad();
}

function JTMenuOnLoad()
{
	if( JTIEVer <= 6 )
	{
		var menuFrame = document.createElement( "IFRAME" );

		document.body.appendChild( menuFrame );

		menuFrame.id = "JTMenuFrame";
		menuFrame.scrolling = "no";
		menuFrame.frameBorder = 0;
		menuFrame.style.display = "none";
		menuFrame.style.position = "absolute";
		menuFrame.style.zIndex = 199;
	}

	for( var i = 0; i < JTMenuList.length; ++i )
        JTMenuList[ i ].OnLoad();
}

function JTMenuDocumentClick( e )
{
    if( JTMenuSkipClick )
    {
        JTMenuSkipClick = false;
        return;
    }

    if( JTMenuActive )
        JTMenuActive.Hide();
}

function JTMenuClick( e )
{
    var event = e || window.event;

    event.cancelBubble = true;

    if( event.stopPropagation )
        event.stopPropagation();

    return false;
}

function JTMenuItemOver( MenuItemID )
{
    var itemObject = document.getElementById( MenuItemID );

    itemObject.className = "jtbb jtfont jtmenuitem jtmenuitem_over";
}

function JTMenuItemOut( MenuItemID )
{
    var itemObject = document.getElementById( MenuItemID );

    itemObject.className = "jtbb jtfont jtmenuitem";
}

function JTMenuHide( MenuItemID )
{
    var objNames = MenuItemID.split( "_" );
    var menuObjectName = objNames[ 0 ];
    var menuItemName = objNames[ 1 ];

    document.getElementById( menuObjectName ).Hide();
}

function JTMenuHideActive()
{
    if( JTMenuActive )
        JTMenuActive.Hide();
}

function JTMenuControlMouseOver( e )
{
    var event = e || window.event;
    var eventObj = getEventTarget( event );

    JTMenuShowForControl( eventObj );

    if( event.type != "click" )
        JTMenuSkipClick = false;
}

function JTMenuShowForControl( controlObject, heightOffset )
{
    if( controlObject && controlObject.menuObject )
    {
        var x, y;

        x = getObjectScreenX( controlObject ) - getObjectScreenX( getSizedParentNode( controlObject.menuObject ) );
        y = getObjectScreenY( controlObject ) - getObjectScreenY( getSizedParentNode( controlObject.menuObject ) ) + controlObject.offsetHeight;

        if( controlObject.clientWidth > 0 )
            x += ( controlObject.offsetWidth - controlObject.clientWidth ) / 2;

        if( typeof( heightOffset ) == "undefined" )
            heightOffset = 0;

        controlObject.menuObject.Popup( x, y + heightOffset );
    }
}

function JTMenuCleanup( id )
{
	var menu = document.getElementById( id );

	document.body.removeChild( menu );
}

function JTUpdateAnchors()
{
	/*if( JTIEVer > -1 )
	{
		if( JTIEVer < 7 )
			JTUpdateElementAndChildrenWidth( document.body );
	
		JTUpdateElementAndChildrenHeight( document.body );
	}*/

	var i, l;

	l = JTRegisteredOnResize.length;
	for( i = 0; i < l; ++i )
		eval( JTRegisteredOnResize[ i ] );
}

function JTUpdateElementAndChildrenWidth( obj )
{
    if( obj != document.body && obj.style )
    {
        if( obj.style.right && obj.style.left )
        {
            var w = getParentWidth( obj ) - obj.offsetLeft - parseInt( obj.style.right );

            if( obj.style.width == "" && w > -1 )
                obj.style.width = w + "px";

            w -= ( obj.offsetWidth - parseInt( obj.style.width ) );

            if( w > -1 )
                obj.style.width = w + "px";
        }
    }

    var i, l;

    l = obj.childNodes.length;

    for( i = 0; i < l; ++i )
        JTUpdateElementAndChildrenWidth( obj.childNodes[ i ] );
}

function JTUpdateElementAndChildrenHeight( obj )
{
    if( obj != document.body && obj.style )
    {
        if( obj.style.bottom && obj.style.top )
        {
            var h = getParentHeight( obj ) - obj.offsetTop - parseInt( obj.style.bottom );

            if( obj.style.height == "" && h > -1 )
                obj.style.height = h + "px";

            h -= ( obj.offsetHeight - parseInt( obj.style.height ) );

            if( h > -1 )
                obj.style.height = h + "px";
        }
    }

    var i, l;

    l = obj.childNodes.length;

    for( i = 0; i < l; ++i )
        JTUpdateElementAndChildrenHeight( obj.childNodes[ i ] );
}

function JTInitAnchorUpdate()
{
    if( JTIEVer > -1 )
        window.attachEvent( "onload", JTUpdateAnchors );

	addEvent( window, "resize", JTUpdateAnchors );
}

function JTEliminateDuplicateID( id )
{
    var object = document.getElementById( id );

    if( object )
    {
        var objectParent = object.parentNode;

        objectParent.removeChild( object );
    }
}

function JTHeightAnimate( heightObject, destHeight )
{
    setTimeout( "JTDoHeightAnimate( '" + heightObject.id + "', " + heightObject.offsetHeight + ", " + destHeight + ", 0 )", 20 );
}

function JTHeightRestore( heightObject )
{
    heightObject.style.height = "auto";
}

function JTDoHeightAnimate( id, startHeight, endHeight, index )
{
    document.getElementById( id ).style.height = ( ( index < 4 ) ? ( ( ( ( endHeight - startHeight ) / 5 ) * index ) + startHeight ) : endHeight ) + "px";

    if( index < 4 )
        setTimeout( "JTDoHeightAnimate( '" + id + "', " + startHeight + ", " + endHeight + ", " + ( index + 1 ) + ")", 20 );
}

function JTMonthCalInitialize( monthCalId, selectedYear, selectedMonth, selectedDay, formObject, submitFieldId, onSelectDate )
{
    var monthCalObject = document.getElementById( monthCalId );

    selectedYear = parseInt( selectedYear, 10 );
    if( isNaN( selectedYear ) )
        selectedYear = "";

    selectedMonth = parseInt( selectedMonth, 10 );
    if( isNaN( selectedMonth ) )
        selectedMonth = "";

    selectedDay = parseInt( selectedDay, 10 );
    if( isNaN( selectedDay ) )
        selectedDay = "";

    monthCalObject.SelectedYear = selectedYear;
    monthCalObject.SelectedMonth = selectedMonth;
    monthCalObject.SelectedDay = selectedDay;
    monthCalObject.form = formObject;
    monthCalObject.SubmitFieldId = submitFieldId;
    monthCalObject.OnSelectDate = onSelectDate;

    document.getElementById( monthCalId + "_selyear" ).value = selectedYear;
    document.getElementById( monthCalId + "_selmonth" ).value = selectedMonth;
    document.getElementById( monthCalId + "_selday" ).value = selectedDay;
}

function JTMonthCalendarDateClick( monthCalId, year, month, day )
{
    var monthCalObject = document.getElementById( monthCalId );

    year = parseInt( year, 10 );
    month = parseInt( month, 10 );
    day = parseInt( day, 10 );

    if( monthCalObject.OnSelectDate && monthCalObject.OnSelectDate( monthCalObject, year, month, day ) == false )
        return;
    
    document.getElementById( monthCalId + "_selyear" ).value = year;
    document.getElementById( monthCalId + "_selmonth" ).value = month;
    document.getElementById( monthCalId + "_selday" ).value = day;

    if( monthCalObject.SubmitFieldId )
    {
        monthCalObject.form.elements[ monthCalObject.SubmitFieldId ].value = monthCalId;

        if( ( monthCalObject.form.onsubmit ) && ( typeof( monthCalObject.form.onsubmit ) == "function" ) )
            monthCalObject.form.onsubmit();

        monthCalObject.form.submit();
    }
    else
    {
        // if( monthCalObject.SelectedYear == year && monthCalObject.SelectedMonth == month )
        {
            if( monthCalObject.SelectedDay )
            {
                var curSelectedCell = document.getElementById( monthCalId + "_day_" + monthCalObject.SelectedDay );

                curSelectedCell.className = curSelectedCell.className.replace( " jtmonthcalendarcellselected", "" );
            }

            var newSelectedCell = document.getElementById( monthCalId + "_day_" + day );

            newSelectedCell.className = newSelectedCell.className + " jtmonthcalendarcellselected";

            monthCalObject.SelectedYear = year;
            monthCalObject.SelectedMonth = month;
            monthCalObject.SelectedDay = day;
        }
    }
}
