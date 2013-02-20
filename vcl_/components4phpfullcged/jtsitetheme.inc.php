<?php
//-----------------------------------------------------------------------
//                  - JomiTech Components For PHP 1.0 -
//                      -- Site Theme component --
//
//            Copyright © JomiTech 2007. All Rights Reserved.
//-----------------------------------------------------------------------
require_once( "vcl/vcl.inc.php" );

use_unit( "classes.inc.php" );
use_unit( "controls.inc.php" );
use_unit( "extctrls.inc.php" );
use_unit( "components4phpfullcged/jtphp.inc.php" );
use_unit( "components4phpfullcged/jtfont.inc.php" );
use_unit( "components4phpfullcged/jtlayout.inc.php" );
use_unit( "components4phpfullcged/jtthemedgraphiccontrol.inc.php" );
use_unit( "components4phpfullcged/jtthemedcustompanel.inc.php" );

global $JTSiteThemeGlobalInstance;

$JTSiteThemeGlobalInstance = null;

class JTSiteTheme extends Component
{
    // Loaded theme directory.
    protected $ThemeDir;
    protected $ThemeWebDir;

    protected $HasDumpedJS = false;
    protected $ComponentJSCode = array();
    protected $AfterSiteThemeJS = '';

    // Currently loaded control theme info.
    protected $_ComponentThemes = array();

    // Properties
    protected $Theme = 'default';

    function __construct( $aowner = null )
    {
        global $JTSiteThemeGlobalInstance;

        parent::__construct( $aowner );

        $JTSiteThemeGlobalInstance = $this;
    }

    function __destruct()
    {
    }

    function loaded()
    {
        parent::loaded();

        $this->setTheme( $this->Theme );
    }

    function dumpHeaderCode()
    {
        parent::dumpHeaderCode();

        if( !defined( 'JTSITETHEME' ) )
        {
            print( "<!-- Created using JomiTech Components For PHP Full -->\r\n" );

            print( $this->generateComponentCSSCode( 'sitetheme' ) );

            print( "<script language=\"JavaScript\" type=\"text/javascript\" src=\"" . $this->ThemeWebDir . "scripts.js\"></script>\r\n" );

            define( 'JTSITETHEME', 1 );

            echo( "<script language=\"JavaScript\" type=\"text/javascript\">\r\n" );
            echo( "var JTThemeWebDir = \"" . $this->ThemeWebDir . "\";\r\n" );
            echo( "</script>\r\n" );
        }

        foreach( $this->ComponentJSCode as $code )
            print( $code );

        if( $this->AfterSiteThemeJS )
        {
            echo( "<script language=\"JavaScript\" type=\"text/javascript\">\r\n" );
            echo( $this->AfterSiteThemeJS );
            echo( "</script>\r\n" );
        }

        $this->HasDumpedJS = true;
    }

    static function PrintNoSiteTheme( $width, $height, $error = '' )
    {
        if( strlen( $width ) && $width{ strlen( $width ) - 1 } != '%' )
            $width .= 'px';

        if( strlen( $height ) && $height{ strlen( $height ) - 1 } != '%' )
            $height .= 'px';

        print( "<table style=\"width: " . $width . "; height: " . $height . "; background-color: #CC0000;\"><tr><td align=\"center\" valign=\"center\" style=\"font-family: Tahoma,Verdana,Geneva,Arial,Helvetica,sans-serif; font-size: 8pt; color: white;\">Error rendering component! $error</td></tr></table>" );
    }

    function getTheme()
    {
        return $this->Theme;
    }

    function setTheme( $value )
    {
        $oldtheme = $this->Theme;

        $this->Theme = $value;

        if( !$this->loadTheme() )
        {
            $this->Theme = $oldtheme;
        }
    }

    function defaultTheme()
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

    function readThemeImagesDir()
    {
        return $this->ThemeWebDir . 'images';
    }

    protected function loadTheme()
    {
        $themefile = GetJTPHPPath() . 'themes/';

        if( empty( $this->Theme ) )
            $themefile .= 'default';
        else
            $themefile .= $this->Theme;

        $themefile .= '/';

        if( !file_exists( $themefile ) )
            return false;

        $this->ThemeDir = $themefile;

        $themefile = GetJTPHPWebPath() . 'themes/';

        if( empty( $this->Theme ) )
            $themefile .= 'default';
        else
            $themefile .= $this->Theme;

        $themefile .= '/';

        $this->ThemeWebDir = $themefile;

        return true;
    }

    function loadComponentTheme( $class )
    {
        if( !array_key_exists( $class, $this->_ComponentThemes ) )
        {
            $themefile = $this->ThemeDir . $class . '.xml';

            $parser = new JTSiteThemeComponentThemeParser();

            if( !$parser->parseComponentTheme( $themefile ) )
                return false;

            $this->_ComponentThemes[ $class ] = $parser->getComponentTheme();
        }

        return true;
    }

    function generatePageCSSCode()
    {
        return "<link href=\"" . $this->ThemeWebDir . "page_styles.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n";
    }

    function generateComponentCSSCode( $object )
    {
        if( !defined( "JTCSSSTYLE_$object" ) )
        {
            $data = "<link href=\"" . $this->ThemeWebDir . $object . "styles.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n";

            define( "JTCSSSTYLE_$object", 1 );
        }
        else
        {
            $data = '';
        }

        return $data;
    }

    function addComponentJSCode( $object )
    {
        $data = '';

        if( !defined( "JTJS_$object" ) )
        {
            $data = "<script language=\"JavaScript\" type=\"text/javascript\" src=\"" . $this->ThemeWebDir . $object . ".js\"></script>\r\n";

            define( "JTJS_$object", 1 );
        }

        if( $this->HasDumpedJS )
            print( $data );
        else
            $this->ComponentJSCode[] = $data;
    }

    function addAfterSiteThemeJS( $code )
    {
        if( $this->HasDumpedJS )
        {
            echo( "<script language=\"JavaScript\" type=\"text/javascript\">\r\n" );
            echo( $code );
            echo( "</script>\r\n" );
        }
        else
        {
            $this->AfterSiteThemeJS .= $code . "\r\n";
        }
    }

    function generateComponentSectionCode( $component, $section, $vars )
    {
        $class = get_class( $component );
        $skin = $component->Skin;

        return $this->generateSectionCode( $class, $skin, $section, $vars );
    }

    function generateSectionCode( $class, $skin, $section, $vars )
    {
        if( !array_key_exists( $class, $this->_ComponentThemes ) ||
            !array_key_exists( $skin, $this->_ComponentThemes[ $class ]->Skins ) ||
            !array_key_exists( $section, $this->_ComponentThemes[ $class ]->Skins[ $skin ]->SkinCodeSections ) )
            return '';

        $code = $this->_ComponentThemes[ $class ]->Skins[ $skin ]->SkinCodeSections[ $section ];

        $vars[ 'THEMEWEBDIR' ] = $this->ThemeWebDir;

        foreach( $vars as $k => $v )
            $code = str_replace( '{$' . $k . '}', $v, $code );

        return $code;
    }

    function retrieveSetting( $component, $name )
    {
        $class = get_class( $component );
        $skin = $component->Skin;

        if( array_key_exists( $class, $this->_ComponentThemes ) )
        {
            if( array_key_exists( $skin, $this->_ComponentThemes[ $class ]->Skins ) && array_key_exists( $name, $this->_ComponentThemes[ $class ]->Skins[ $skin ]->SkinSettings ) )
                return $this->_ComponentThemes[ $class ]->Skins[ $skin ]->SkinSettings[ $name ];

            if( array_key_exists( $name, $this->_ComponentThemes[ $class ]->GlobalSettings ) )
                return $this->_ComponentThemes[ $class ]->GlobalSettings[ $name ];
        }

        return '';
    }
}

class JTSiteThemeComponentTheme
{
    public $Skins = array();
    public $GlobalSettings = array();
}

class JTSiteThemeComponentSkin
{
    public $SkinCodeSections = array();
    public $SkinSettings = array();
}

class JTSiteThemeComponentThemeParser
{
    private $_ComponentTheme = null;
    private $_CurrentSkin = null;
    private $_CurrentCodeID = '';
    private $_CurrentCode = '';

    function __construct()
    {
    }

    function parseComponentTheme( $classfile )
    {
        $this->_ComponentTheme = new JTSiteThemeComponentTheme();

        $xml_parser = xml_parser_create();

        xml_set_element_handler( $xml_parser, array( $this, 'startElement' ), array( $this, 'endElement' ) );
        xml_set_character_data_handler( $xml_parser, array( $this, 'charData' ) );

        $result = true;

        $fp = @fopen( $classfile, 'rb' );
        if( $fp )
        {
            while( $data = fread( $fp, 262144 ) )
            {
                if( !xml_parse( $xml_parser, $data, feof( $fp ) ) )
                {
                    printf( "XML error parsing $classfile: %s at line %d", xml_error_string( xml_get_error_code( $xml_parser ) ), xml_get_current_line_number( $xml_parser ) );

                    $result = false;
                    break;
                }
            }

            fclose( $fp );
        }
        else
        {
            $result = false;
        }

        xml_parser_free( $xml_parser );

        return $result;
    }

    function getComponentTheme()
    {
        return $this->_ComponentTheme;
    }

    private function startElement( $parser, $tagname, $attribs )
    {
        if( $tagname == 'SKIN' )
        {
            $skinid = $attribs[ 'ID' ];
            if( strlen( $skinid ) == 0 )
                $skinid = 'default';

            $this->_CurrentSkin = new JTSiteThemeComponentSkin();

            $this->_ComponentTheme->Skins[ $skinid ] = $this->_CurrentSkin;
        }
        else if( $tagname == 'SETTING' )
        {
            if( $this->_CurrentSkin )
                $this->_CurrentSkin->SkinSettings[ $attribs[ 'NAME' ] ] = $attribs[ 'VALUE' ];
            else
                $this->_ComponentTheme->GlobalSettings[ $attribs[ 'NAME' ] ] = $attribs[ 'VALUE' ];
        }
        else if( $tagname == 'CODE' && $this->_CurrentSkin )
        {
            $this->_CurrentCodeID = $attribs[ 'ID' ];
            $this->_CurrentCode = '';
        }
    }

    private function endElement( $parser, $tagname )
    {
        if( $tagname == 'SKIN' )
        {
            $this->_CurrentSkin = null;
        }
        else if( $tagname == 'CODE' )
        {
            $code = $this->_CurrentCode;
            $i = strpos( $code, "\r\n" );
            if( $i !== false )
                $code = substr( $code, $i + 2 );
            $i = strrpos( $code, "\r\n" );
            if( $i !== false )
                $code = substr( $code, 0, $i );

            $this->_CurrentSkin->SkinCodeSections[ $this->_CurrentCodeID ] = /*trim(*/ $code /*)*/;

            $this->_CurrentCodeID = '';
            $this->_CurrentCode = '';
        }
    }

    private function charData( $parser, $data )
    {
        $this->_CurrentCode .= $data;
    }
}
?>
