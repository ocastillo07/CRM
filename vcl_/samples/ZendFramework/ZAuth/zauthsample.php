<?php
require_once("vcl/vcl.inc.php");
//Includes
require_once("dmAuth.php");
use_unit("Zend/zauth.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class ZAuthSample extends Page
{
   public $Label1 = null;
   function ZAuthSampleBeforeShow($sender, $params)
   {
      global $dmAuth;

      //Before showing the page, execute the ZAuth component
      $dmAuth->ZAuth->Execute();
   }


}

global $application;

global $ZAuthSample;

//Creates the form
$ZAuthSample = new ZAuthSample($application);

//Read from resource file
$ZAuthSample->loadResource(__FILE__);

//Shows the form
$ZAuthSample->show();

?>