<?php
//-----------------------------------------------------------------------
//                  - JomiTech Components For PHP 1.0 -
//                --  JTThemedGraphicControl base class --
//
//             ! Must only be included by jtsitetheme.inc.php !
//
//              Copyright © JomiTech 2007. All Rights Reserved.
//-----------------------------------------------------------------------
abstract class JTThemedGraphicControl extends CustomControl
{
    private $SiteTheme;
    protected $SiteThemeInstance;
    protected $_DumpDimensions = true;

    protected $_Anchors = null;
    protected $_Skin = 'default';
    protected $_StyleFont = null;
    protected $_TabOrder = 0;
    protected $_TabStop = true;

    function __construct( $aowner = null )
    {
        parent::__construct( $aowner );

        // Nasty hack.
        if( basename( $_SERVER[ 'SCRIPT_FILENAME' ] ) == 'getclassinfo.php' )
            $this->ControlState |= csDesigning;

        $this->_StyleFont = new JTFont();
        $this->_StyleFont->_control = $this;

        $this->ControlStyle = 'csRenderOwner=1';
        $this->ControlStyle = 'csRenderAlso=JTSiteTheme';

        $this->_layout = new JTLayout();
        $this->_layout->_control = $this;

        $this->_Anchors = new JTAnchors( $this );
    }

    function dumpContents()
    {
        if( !$this->initializeSkin( $error ) )
        {
            JTSiteTheme::PrintNoSiteTheme( $this->Width, $this->Height, $error );
            return;
        }

        $this->callEvent( 'onshow', array() );

        $this->dumpThemedContents();
        $this->dumpControlFooter();
    }

    abstract protected function dumpThemedContents();

    protected function dumpControlFooter()
    {
    }

    function readStyleFont()
    {
        return $this->_StyleFont;
    }

    function writeStyleFont( $value )
    {
        if( is_object( $value ) )
            $this->_StyleFont = $value;
    }

    function getAnchors()
    {
        return $this->_Anchors;
    }

    function setAnchors( $value )
    {
        if( is_object( $value ) )
            $this->_Anchors = $value;
    }

    function getAnchorsWorkaround()
    {
        return '--Workaround--';
    }

    function setAnchorsWorkaround( $value )
    {
    }

    function getSiteTheme()
    {
        return $this->SiteTheme;
    }

    function setSiteTheme( $value )
    {
        $this->SiteTheme = $value;
    }

    function getSkin()
    {
        return $this->_Skin;
    }

    function setSkin( $value )
    {
        if( strlen( $value ) == 0 )
            $value = 'default';

        $this->_Skin = $value;
    }

    function defaultSkin()
    {
        return 'default';
    }

    function getHelp()
    {
        return get_class( $this );
    }

    function setHelp( $value )
    {
    }

    function defaultHelp()
    {
        return get_class( $this );
    }

    function readMenuButtons()
    {
        return array();
    }

    function writeMenuButtons( $value )
    {
    }

    function readDumpDimensions()
    {
        return $this->_DumpDimensions;
    }

    function writeDumpDimensions( $value )
    {
        $this->_DumpDimensions = $value;
    }

    function readTabOrder()
    {
        return $this->_TabOrder;
    }

    function writeTabOrder( $value )
    {
        if( !is_numeric( $value ) )
            return;

        $this->_TabOrder = $value;
    }

    function defaultTabOrder()
    {
        return 0;
    }

    function readTabStop()
    {
        return $this->_TabStop;
    }

    function writeTabStop( $value )
    {
        $this->_TabStop = ( $value ? true : 0 );
    }

    function defaultTabStop()
    {
        return true;
    }

    function getVisible()
    {
        return $this->readVisible();
    }

    function setVisible( $value )
    {
        $this->writeVisible( $value );
    }

    protected function resolveSiteThemeInstance()
    {
        global $JTSiteThemeGlobalInstance;

        if( !$this->SiteThemeInstance && isset( $JTSiteThemeGlobalInstance ) )
            $this->SiteThemeInstance = $JTSiteThemeGlobalInstance;

        if( !$this->SiteThemeInstance )
            $this->SiteThemeInstance = $this->propertyToObject( $this->SiteTheme );
    }

    protected function propertyToObject( $value )
    {
        if( !empty( $value ) )
        {
            if( !is_object( $value ) )
            {
                $form = $this->owner;

                if( strpos( $value, '.' ) )
                {
                    $pieces = explode( '.', $value );
                    $form = $pieces[0];

                    global $$form;

                    $form = $$form;

                    $value = $pieces[1];
                }

                if( is_object( $form->$value ) )
                {
                    $value = $form->$value;
                }
            }
        }

        return $value;
    }

    protected function initializeSkin( &$error )
    {
        $error = '';

        $this->resolveSiteThemeInstance();

        if( !$this->SiteThemeInstance )
        {
            $error = JT_NO_SITETHEME_MESSAGE;
            return false;
        }

        if( !$this->SiteThemeInstance->loadComponentTheme( get_class( $this ) ) )
        {
            $error = 'Failed to load ' . get_class( $this ) . ' component theme.';
            return false;
        }

        return true;
    }

    protected function retrieveSetting( $name )
    {
        return $this->SiteThemeInstance->retrieveSetting( $this, $name );
    }

    function generateComponentSectionCode( $section, $vars )
    {
        $vars[ 'NAME' ] = $this->Name;
        $vars[ 'CURSOR' ] = strtolower( substr( $this->_cursor, 2 ) );

        if( $this->_DumpDimensions )
        {
            $vars[ 'WIDTH' ] = $this->Width . 'px';
            $vars[ 'HEIGHT' ] = $this->Height . 'px';
        }
        else
        {
            $vars[ 'WIDTH' ] = '100%';
            $vars[ 'HEIGHT' ] = '100%';
        }

       return $this->SiteThemeInstance->generateComponentSectionCode( $this, $section, $vars );
    }

    function fixupPropertyAndCheck( $value, $type )
    {
        $result = $this->fixupProperty( $value );

        if( ( $this->ControlState & csDesigning ) != csDesigning && is_object( $result ) )
        {
            if( !$result->inheritsFrom( $type ) )
                throw new Exception( $this->Name . ' property type mismatch, expected ' . $type . ', received ' . get_class( $result ) );
        }

        return $result;
    }

    function serialize()
    {
        parent::serialize();

        $owner = $this->readOwner();
        if( $owner )
        {
            $prefix = $owner->readNamePath() . '.' . $this->Name . '.ExtraProperties.';

            $_SESSION[ $prefix . 'DumpDimensions' ] = $this->_DumpDimensions;
        }
    }

    function unserialize()
    {
        parent::unserialize();

        $owner = $this->readOwner();
        if( $owner )
        {
            $prefix = $owner->readNamePath() . '.' . $this->Name . '.ExtraProperties.';

            if( isset( $_SESSION[ $prefix . 'DumpDimensions' ] ) )
                $this->_DumpDimensions = $_SESSION[ $prefix . 'DumpDimensions' ];
        }
    }
}

class JTAnchors extends Persistent
{
    protected $_Left = true;
    protected $_Top = true;
    protected $_Right = 0;
    protected $_Bottom = 0;
    protected $_Relative = true;

    protected $_Owner = null;

    function __construct( $aowner )
    {
        parent::__construct();

        $this->_Owner = $aowner;
    }

    function readOwner()
    {
        return $this->_Owner;
    }

    function getLeft()
    {
        return $this->_Left;
    }

    function setLeft( $value )
    {
        $this->_Left = $value;
    }

    function defaultLeft()
    {
        return true;
    }

    function getTop()
    {
        return $this->_Top;
    }

    function setTop( $value )
    {
        $this->_Top = $value;
    }

    function defaultTop()
    {
        return true;
    }

    function getRight()
    {
        return $this->_Right;
    }

    function setRight( $value )
    {
        $this->_Right = $value;
    }

    function defaultRight()
    {
        return 0;
    }

    function getBottom()
    {
        return $this->_Bottom;
    }

    function setBottom( $value )
    {
        $this->_Bottom = $value;
    }

    function defaultBottom()
    {
        return 0;
    }

    function getRelative()
    {
        return $this->_Relative;
    }

    function setRelative( $value )
    {
        $this->_Relative = $value;
    }

    function defaultRelative()
    {
        return true;
    }
}
?>
