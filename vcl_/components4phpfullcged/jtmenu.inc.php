<?php
//-----------------------------------------------------------------------
//                  - JomiTech Components For PHP 1.0 -
//                         -- Menu component --
//
//            Copyright © JomiTech 2007. All Rights Reserved.
//-----------------------------------------------------------------------
require_once("vcl/vcl.inc.php");

use_unit( "components4phpfullcged/jtsitetheme.inc.php" );
use_unit( "components4phpfullcged/jtphp.inc.php" );

class JTMenu extends JTThemedGraphicControl
{
    protected $_Items;
    protected $_Control;
    protected $_onclick;

    function __construct( $aowner = null )
    {
        parent::__construct( $aowner );

        $this->Width = 200;
        $this->Height = 300;

        $this->_Items = array();

        $this->_Control = null;
    }

    function init()
    {
        parent::init();

        $submitEventValue = $this->input->{$this->JSWrapperHiddenFieldName};
        if( is_object( $submitEventValue ) )
        {
            if( $this->_onclick )
                $this->callEvent( 'onclick', array( $submitEventValue->asString() ) );
        }
    }

    function dumpHeaderCode()
    {
        parent::dumpHeaderCode();

        $this->resolveSiteThemeInstance();

        if( $this->SiteThemeInstance )
        {
            print( $this->SiteThemeInstance->generateComponentCSSCode( 'menu' ) );
        }
    }

    function dumpJavascript()
    {
        parent::dumpJavascript();

        print( "var $this->Name" . "Links = new Array();\r\n" );

        if( count( $this->_Items ) > 0 )
        {
            foreach( $this->_Items as $item_data )
            {
                list( $item_name, $item_text, $item_link ) = $item_data;

                $item_name = $this->Name . "_" . $item_name;

                print( $this->Name . "Links[ '$item_name' ] = \"" . addslashes( $item_link ) . "\";\r\n" );
            }
        }

        print( "\r\n" );

        print( "function $this->Name" . "ClickHandler( e )\r\n" );
        print( "{\r\n" );
        print( "  var event = e || window.event;\r\n" );
        print( "  var id = getEventTarget( event ).id;\r\n" );
        print( "  if( document.getElementById( id ).tagName == 'A' )\r\n" );
        print( "    id = id.substr( 0, id.length - 5 );\r\n" );
        print( "  JTMenuHide( id );\r\n" );

        if( $this->JsOnClick != null )
        {
            print( "  if( " . $this->JsOnClick . "( e ) == false )\r\n" );
            print( "    return false;\r\n" );
        }

        print( "  if( " . $this->Name . "Links[ id ] )\r\n" );
        print( "  {\r\n");
        print( "    window.location = " . $this->Name . "Links[ id ];\r\n" );
        print( "    return false;\r\n" );
        print( "  }\r\n" );

        if( ( ( $this->ControlState & csDesigning ) != csDesigning ) && ( $this->_onclick ) )
        {
            $form = "document." . $this->owner->Name;

            print( "  $form." . $this->JSWrapperHiddenFieldName . ".value = id;\r\n" );
            print( "  if( ( $form.onsubmit ) && ( typeof( $form.onsubmit ) == 'function' ) )\r\n" );
            print( "    $form.onsubmit();\r\n" );
            print( "  $form.submit();\r\n" );
        }

        print( "  return false;\r\n" );
        print( "}\r\n\r\n" );
    }

    protected function dumpThemedContents()
    {
        print( "<div id=\"" . $this->Name . "_outerdiv\">\r\n" );

        $this->internalDumpThemedContents();

        print( "</div>\r\n" );
    }

    protected function internalDumpThemedContents()
    {
        $content = '';
        $first = true;

        if( count( $this->_Items ) > 0 )
        {
            foreach( $this->_Items as $item_data )
            {
                list( $item_name, $item_text, $item_link ) = $item_data;

                $item_name = $this->Name . "_" . $item_name;

                if( $item_text == '-' )
                    $content .= $this->GenerateMenuDivider();
                else
                    $content .= $this->GenerateMenuItem( $item_name, $item_text, $item_link );
            }
        }

        print( $this->GenerateMenuBackground( $content ) );
    }

    protected function dumpControlFooter()
    {
        if( ( $this->ControlState & csDesigning ) != csDesigning )
        {
            print( "<script language=\"JavaScript\" type=\"text/javascript\"><!--\r\n" );

            $this->dumpBodyJavaScript();

            print( "// -->\r\n" );
            print( "</script>\r\n" );
            print( "<input type=\"hidden\" name=\"" . $this->JSWrapperHiddenFieldName . "\" value=\"\">\r\n" );
        }
    }

    protected function dumpBodyJavaScript()
    {
        if( $this->_Control )
        {
            list( $control_name, $control_button ) = explode( '.', $this->_Control );
        }
        else
        {
            $control_name = '';
            $control_button = '';
        }

        print( "JTInitializeMenu( '" . $this->Name . "', " . GetJTJSEventToString( $this->JsOnClick ) . ", '$control_name', '$control_button', 'mouseover' );\r\n" );

        if( count( $this->_Items ) > 0 )
        {
            foreach( $this->_Items as $item_data )
            {
                list( $item_name, $item_text, $item_link ) = $item_data;

                $item_name = $this->Name . "_" . $item_name;

                print( "document.getElementById( '$item_name' ).onclick = " . $this->Name . "ClickHandler;\r\n" );
            }
        }
    }

    function dumpForAjax()
    {
        if( !$this->initializeSkin( $error ) )
            return;

        $this->callEvent( 'onshow', array() );

        ob_start();

        $this->internalDumpThemedContents();

        $contents = ob_get_contents();

        ob_end_clean();

        $contents = str_replace( "\r\n", " ", $contents );
        $contents = str_replace( "\n", " ", $contents );
        $contents = str_replace( '"', '\"', $contents );

        print( "document.getElementById( '" . $this->Name . "_outerdiv' ).innerHTML = \"$contents\";\r\n" );

        $this->dumpBodyJavaScript();
    }

    function dumpJSEvent( $event )
    {
        if( $event )
        {
            print( "function $event( event )\r\n" );
            print( "{\r\n" );
            print( "    var event = event || window.event;\r\n" );
            print( "    var params = new Array( getEventTarget( event ).id );\r\n" );

            if( $this->owner )
                $this->owner->$event( $this, array() );

            print( "\r\n}\r\n\r\n" );
        }
    }

    protected function GenerateMenuDivider()
    {
        return $this->generateComponentSectionCode( 'divider', array() );
    }

    protected function GenerateMenuItem( $name, $content, $link )
    {
        if( $link )
        {
            $vars = array(
                'ITEMNAME'      => $name,
                'LINK'          => $link,
                'CONTENT'       => $content,
            );

            $content = $this->generateComponentSectionCode( 'link', $vars );
        }

        $vars = array(
            'ITEMNAME'      => $name,
            'CONTENT'       => $content,
        );

        return $this->generateComponentSectionCode( 'item', $vars );
    }

    protected function GenerateMenuBackground( $content )
    {
        $vars = array(
            'CONTENT'       => $content,
            'DISPLAY'       => ( ( $this->ControlState & csDesigning ) != csDesigning ) ? 'none' : 'block',
            'VISIBILITY'    => ( ( $this->ControlState & csDesigning ) != csDesigning ) ? 'hidden' : 'visible',
        );

        return $this->generateComponentSectionCode( 'menu', $vars );
    }

    function AddItem( $name, $caption, $link = '' )
    {
        $this->_Items[] = array( $name, $caption, $link );

        return count( $this->_Items ) - 1;
    }

    function InsertItem( $index, $name, $caption, $link = '' )
    {
        array_splice( $this->_Items, $index, 0, array( $name, $caption, $link ) );

        return $index;
    }

    function DeleteItem( $index )
    {
        if( $index < 0 || $index >= count( $this->_Items ) )
            return false;

        array_splice( $this->_Items, $index );

        return true;
    }

    function ClearItems()
    {
        $this->_Items = array();
    }

    function LoadItemsFromFile( $filename )
    {
        $contents = file( $filename );

        $this->ClearItems();

        foreach( $contents as $line )
        {
            preg_match( '/^\"([\w]{1,})\"\,\"([\w]{1,})\"\,\"([a-zA-Z0-9\:\/\.]{0,})\"\r\n$/i', $line, $s );

            $name = $s[ 1 ];
            $caption = $s[ 2 ];
            $link = $s[ 3 ];

            $this->AddItem( stripslashes( $name ), stripslashes( $caption ), stripslashes( $link ) );
        }
    }

    function SaveItemsToFile( $filename )
    {
        $contents = array();

        foreach( $this->_Items as $item )
        {
            list( $name, $caption, $link ) = $item;

            $contents[] = '"' . addslashes( $name ) . '","' . addslashes( $caption ) . '","' . addslashes( $link ) . "\"\r\n";
        }

        file_put_contents( $filename, $contents );
    }

    function getItems()
    {
        return $this->_Items;
    }

    function setItems( $value )
    {
        foreach( $value as &$v )
        {
            if( !is_array( $v ) )
                $v = unserialize( $v );
        }

        $this->_Items = $value;
    }

    function getControl()
    {
        return $this->_Control;
    }

    function setControl( $value )
    {
        $this->_Control = $value;
    }

    function getOnClick()
    {
        return $this->_onclick;
    }

    function setOnClick( $value )
    {
        $this->_onclick = $value;
    }

    function getjsOnClick()
    {
        return $this->readjsOnClick();
    }

    function setjsOnClick( $value )
    {
        $this->writejsOnClick($value);
    }
}
?>
