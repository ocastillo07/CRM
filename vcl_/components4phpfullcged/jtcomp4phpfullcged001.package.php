<?php
//-----------------------------------------------------------------------
//     - JomiTech Components For PHP 1.0 Full CodeGear(TM) Edition -
//                          -- Package File --
//
//            Copyright © JomiTech 2007. All Rights Reserved.
//-----------------------------------------------------------------------
require_once( 'vcl/vcl.inc.php' );

use_unit( 'designide.inc.php' );

setPackageTitle( 'JomiTech Components For PHP Full CodeGear Edition' );
setIconPath( './palette' );

if( function_exists( 'addSplashBitmap' ) )
    addSplashBitmap( 'JomiTech Components For PHP Full CodeGear Edition', 'c4php.bmp' );


$FontStyles = array(
    'fsTiny',
    'fsSmall',
    'fsDefault',
    'fsMedium',
    'fsLarge',
    'fsTitle',
    'fsHeading'
);

// Load available themes.
$ThemesList = array();
$dir = 'themes';

$dh = opendir( $dir );

while( false !== ( $filename = readdir( $dh ) ) )
{
    $fullname = "$dir/$filename";
    if( substr( $filename, 0, 1 ) != '.' && is_dir( $fullname ) )
        $ThemesList[] = $filename;
}

closedir( $dh );


$FontList = array(
    'Segoe UI, Tahoma, Verdana, Geneva, Arial, Helvetica, sans-serif',
    'Tahoma, Verdana, Geneva, Arial, Helvetica, sans-serif',
    'Verdana, Geneva, Arial, Helvetica, sans-serif',
    'Arial, Helvetica, sans-serif',
    'Times New Roman, Times, serif',
    'Courier New, Courier, mono'
);

$BorderStyles = array(
    'Dashed',
    'Dotted',
    'Double',
    'Groove',
    'Inset',
    'Outset',
    'None',
    'Ridge',
    'Solid',
);

$MonthNums = array(
    '1',
    '2',
    '3',
    '4',
    '5',
    '6',
    '7',
    '8',
    '9',
    '10',
    '11',
    '12',
);

registerComponents( 'JomiTech Visual Controls', array( 'JTSiteTheme' ), 'components4phpfullcged/jtsitetheme.inc.php' );
registerComponents( 'JomiTech Visual Controls', array( 'JTGroupBox' ), 'components4phpfullcged/jtgroupbox.inc.php' );
registerComponents( 'JomiTech Visual Controls', array( 'JTLookupComboBox' ), 'components4phpfullcged/jtlookupcombobox.inc.php' );
registerComponents( 'JomiTech Visual Controls', array( 'JTMenu' ), 'components4phpfullcged/jtmenu.inc.php' );
registerComponents( 'JomiTech Visual Controls', array( 'JTMonthCalendar' ), 'components4phpfullcged/jtmonthcalendar.inc.php' );
registerComponents( 'JomiTech Visual Controls', array( 'JTRadioButtonList' ), 'components4phpfullcged/jtradiobuttonlist.inc.php' );

registerPropertyValues( 'JTSiteTheme', 'Theme', $ThemesList );

registerBooleanProperty( 'JTThemedGraphicControl', 'Anchors.Left' );
registerBooleanProperty( 'JTThemedGraphicControl', 'Anchors.Top' );
registerBooleanProperty( 'JTThemedGraphicControl', 'Anchors.Right' );
registerBooleanProperty( 'JTThemedGraphicControl', 'Anchors.Bottom' );
registerBooleanProperty( 'JTThemedGraphicControl', 'Anchors.Relative' );
registerPropertyValues( 'JTThemedGraphicControl', 'SiteTheme', array( 'JTSiteTheme' ) );
registerPropertyValues( 'JTThemedGraphicControl', 'StyleFont.Family', $FontList );
registerPropertyEditor( 'JTThemedGraphicControl', 'StyleFont.Color', 'TJTWebColorPropertyEditor', 'native' );
registerPropertyValues( 'JTThemedGraphicControl', 'StyleFont.Align', array('taNone','taLeft','taRight','taCenter','taJustify'));
registerPropertyValues( 'JTThemedGraphicControl', 'StyleFont.Case', array('caCapitalize','caUpperCase','caLowerCase','caNone'));
registerPropertyValues( 'JTThemedGraphicControl', 'StyleFont.Style', array('fsNormal','fsItalic','fsOblique'));
registerPropertyValues( 'JTThemedGraphicControl', 'StyleFont.Variant', array('vaNormal','vaSmallCaps'));
registerPropertyValues( 'JTThemedGraphicControl', 'StyleFont.Weight', array('normal','bold','bolder','lighter','100','200','300','400','500','600','700','800','900'));

registerPropertyValues( 'JTThemedCustomPanel', 'Layout.Type', array( 'JTANCHOR_LAYOUT', 'ABS_XY_LAYOUT', 'XY_LAYOUT', 'FLOW_LAYOUT', 'GRIDBAG_LAYOUT', 'ROW_LAYOUT', 'COL_LAYOUT' ) );

registerPropertyValues( 'JTLookupComboBox', 'DataSource', array( 'Datasource' ) );
registerPropertyValues( 'JTLookupComboBox', 'LookupDataSource', array( 'Datasource' ) );
registerBooleanProperty( 'JTLookupComboBox', 'Enabled' );
registerBooleanProperty( 'JTLookupComboBox', 'ReadOnly' );
registerBooleanProperty( 'JTLookupComboBox', 'TabStop' );

registerPropertyValues( 'JTMenu', 'Control', array( 'JTThemedGraphicControl::MenuButtons' ) );

registerPropertyValues( 'JTMonthCalendar', 'CurrentMonth', $MonthNums );
registerPropertyValues( 'JTMonthCalendar', 'DataSource', array( 'Datasource' ) );

registerPropertyValues( 'JTRadioButtonList', 'DataSource', array( 'Datasource' ) );
registerPropertyEditor( 'JTRadioButtonList', 'Items', 'TJTStringArrayPropertyEditor', 'native' );
registerPropertyValues( 'JTRadioButtonList', 'TextClass', $FontStyles );
registerBooleanProperty( 'JTRadioButtonList', 'TabStop' );

registerAsset( array( 'JTSiteTheme' ), array( 'components4phpfullcged/themes' ) );

?>
