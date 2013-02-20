<?php
require_once("vcl/vcl.inc.php");
//Includes
use_unit("Zend/zauthdigest.inc.php");
use_unit("Zend/zauth.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class dmAuth extends DataModule
{
       public $ZAuthDigest = null;
       public $ZAuth = null;
       function ZAuthLogin($sender, $params)
       {
        redirect("login.php");
       }

}

global $application;

global $dmAuth;

//Creates the form
$dmAuth=new dmAuth($application);

//Read from resource file
$dmAuth->loadResource(__FILE__);

?>