<?php
//-----------------------------------------------------------------------
//                  - JomiTech Components For PHP 1.0 -
//                    -- Lookup combo box component --
//
//            Copyright © JomiTech 2007. All Rights Reserved.
//-----------------------------------------------------------------------
require_once("vcl/vcl.inc.php");
use_unit( "classes.inc.php" );
use_unit( "controls.inc.php" );

use_unit( "components4phpfullcged/jtsitetheme.inc.php" );

class JTLookupComboBox extends JTThemedGraphicControl
{
    protected $_Enabled = true;
    protected $_ReadOnly = 0;
    protected $_datafield = '';
    protected $_datasource = null;
    protected $_LookupDataSource = null;
    protected $_LookupField = '';
    protected $_LookupDataField = '';
    protected $_SelectedValue = '';

    function __construct( $aowner = null )
    {
        parent::__construct( $aowner );

        $this->Width = 200;
        $this->Height = 24;
    }

    function loaded()
    {
        parent::loaded();

        $this->setDataSource( $this->_datasource );
        $this->setLookupDataSource( $this->_LookupDataSource );
    }

    function preinit()
    {
        $submitted = $this->input->{$this->Name};

        if( is_object( $submitted ) )
        {
            $this->_SelectedValue = $submitted->asString();
            $this->updateDataField( $this->_SelectedValue );
        }
        else
        {
            $this->_SelectedValue = '';
        }
    }

    function dumpHeaderCode()
    {
        parent::dumpHeaderCode();

        $this->resolveSiteThemeInstance();

        if( $this->SiteThemeInstance )
            print( $this->SiteThemeInstance->generateComponentCSSCode( 'lookup' ) );
    }

    protected function dumpThemedContents()
    {
        $contents = '';

        if( ( $this->ControlState & csDesigning ) != csDesigning && $this->_LookupDataSource && $this->_LookupField )
        {
            if( $this->_datafield && $this->_datasource )
            {
                $field = $this->_datafield;
                $value = $this->_datasource->DataSet->$field;
            }
            else
            {
                $value = '';
            }

            $lookupfield = $this->_LookupField;
            $lookupdatafield = $this->_LookupDataField;

            for( $this->_LookupDataSource->DataSet->First(); !$this->_LookupDataSource->DataSet->EOF; $this->_LookupDataSource->DataSet->Next() )
            {
                $data = $this->_LookupDataSource->DataSet->AssociativeFieldValues[ $lookupfield ];

                if( $lookupdatafield )
                    $itemvalue = $this->_LookupDataSource->DataSet->AssociativeFieldValues[ $lookupdatafield ];
                else
                    $itemvalue = $data;

                $vars = array(
                    'CONTENT'       => $data,
                    'VALUE'         => $itemvalue,
                );

                if( ( $this->_datafield && $this->_datasource && $value == $itemvalue ) || ( !$this->_datafield && !$this->_datasource && $itemvalue == $this->_SelectedValue ) )
                    $vars[ 'SELECTED' ] = ' selected';
                else
                    $vars[ 'SELECTED' ] = '';

                $contents .= $this->generateComponentSectionCode( 'item', $vars );
            }
        }

        $styles = GetJTFontString( $this->StyleFont );

        $vars = array(
            'CONTENT'       => $contents,
            'EVENTS'        => $this->JsEvents,
            'DISABLED'      => ( $this->_Enabled ? '' : ' disabled' ),
            'READONLY'      => ( $this->_ReadOnly ? ' readonly' : '' ),
            'STYLES'        => $styles,
            'TABINDEX'      => ( $this->_TabStop ? $this->_TabOrder : -1 ),
        );

        print( $this->generateComponentSectionCode( 'combobox', $vars ) );
    }

    function getDataField()
    {
        return $this->_datafield;
    }

    function setDataField( $value )
    {
        $this->_datafield = $value;
    }

    function defaultDataField()
    {
        return '';
    }

    function getDataSource()
    {
        return $this->_datasource;
    }

    function setDataSource( $value )
    {
        if( $value && $value == $this->_LookupDataSource )
            throw new Exception( 'DataSource cannot be set to the same Datasource as the LookupDataSource property' );

        $this->_datasource = $this->fixupPropertyAndCheck( $value, 'Datasource' );
    }

    function defaultDataSource()
    {
        return null;
    }

    function getEnabled()
    {
        return $this->_Enabled;
    }

    function setEnabled( $value )
    {
        $this->_Enabled = $value;
    }

    function defaultEnabled()
    {
        return true;
    }

    function getLookupField()
    {
        return $this->_LookupField;
    }

    function setLookupField( $value )
    {
        $this->_LookupField = $value;
    }

    function defaultLookupField()
    {
        return '';
    }

    function getLookupDataField()
    {
        return $this->_LookupDataField;
    }

    function setLookupDataField( $value )
    {
        $this->_LookupDataField = $value;
    }

    function defaultLookupDataField()
    {
        return '';
    }

    function getLookupDataSource()
    {
        return $this->_LookupDataSource;
    }

    function setLookupDataSource( $value )
    {
        if( $value && $value == $this->_datasource )
            throw new Exception( 'LookupDataSource cannot be set to the same Datasource as the DataSource property' );

        $this->_LookupDataSource = $this->fixupPropertyAndCheck( $value, 'Datasource' );
    }

    function defaultLookupDataSource()
    {
        return null;
    }

    function getReadOnly()
    {
        return $this->_ReadOnly;
    }

    function setReadOnly( $value )
    {
        $this->_ReadOnly = $value;
    }

    function defaultReadOnly()
    {
        return 0;
    }

    function getSelectedValue()
    {
        return $this->_SelectedValue;
    }

    function setSelectedValue( $value )
    {
        $this->_SelectedValue = $value;
    }

    function defaultSelectedValue()
    {
        return '';
    }

    function getStyleFont()
    {
        return $this->readStyleFont();
    }

    function setStyleFont( $value )
    {
        $this->writeStyleFont( $value );
    }

    function getTabOrder()
    {
        return $this->readTabOrder();
    }

    function setTabOrder( $value )
    {
        $this->writeTabOrder( $value );
    }

    function getTabStop()
    {
        return $this->readTabStop();
    }

    function setTabStop( $value )
    {
        $this->writeTabStop( $value );
    }

    function getjsOnClick()
    {
        return $this->readjsOnClick();
    }

    function setjsOnClick( $value )
    {
        $this->writejsOnClick($value);
    }

    function getjsOnBlur()
    {
        return $this->readjsOnBlur();
    }

    function setjsOnBlur( $value )
    {
        $this->writejsOnBlur( $value );
    }

    function getjsOnFocus()
    {
        return $this->readjsOnFocus();
    }

    function setjsOnFocus( $value )
    {
        $this->writejsOnFocus( $value );
    }

    function getjsOnChange()
    {
        return $this->readjsOnChange();
    }

    function setjsOnChange( $value )
    {
        $this->writejsOnChange( $value );
    }
}
?>
