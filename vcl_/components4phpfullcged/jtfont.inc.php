<?php
//-----------------------------------------------------------------------
//                   - JomiTech Components For PHP 1.0 -
//                       -- Extended Font Class --
//
//            Copyright © JomiTech 2007. All Rights Reserved.
//-----------------------------------------------------------------------
require_once( "vcl/vcl.inc.php" );

use_unit( "graphics.inc.php" );

class JTFont extends Font
{
    protected $_family = '';
    protected $_size = '';

    function getFamily()
    {
        return $this->_family;
    }

    function setFamily( $value )
    {
        $this->_family = $value;
        $this->modified();
    }

    function defaultFamily()
    {
        return '';
    }

    function getSize()
    {
        return $this->_size;
    }

    function setSize( $value )
    {
        $this->_size = $value;
        $this->modified();
    }

    function defaultSize()
    {
        return '';
    }
}
?>
