<?php
require_once("vcl/vcl.inc.php");
//Includes
require_once("dmAuth.php");
use_unit("dbgrids.inc.php");
use_unit("Zend/zacl.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");


global $dmAuth;
$dmAuth->ZAuth->Execute();

global $aclmanager;
$aclmanager->Role=$dmAuth->ZAuth->UserRealm;

//Class definition
class ZACLSample extends Page
{
       public $Label1 = null;
       public $dbgCustomerInvoices = null;
       public $dbgCustomerList = null;
       public $dbgCustomerReserved = null;
       public $lbCustomerReserved = null;
       public $lbCustomerInvoices = null;
       public $lbCustomerList = null;
       public $Label2 = null;
       public $ZACL = null;
}

global $application;

global $ZACLSample;

//Creates the form
$ZACLSample=new ZACLSample($application);

//Read from resource file
$ZACLSample->loadResource(__FILE__);

//Shows the form
$ZACLSample->show();

?>