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

       //This event is fired when the user is not authenticated and login
       //is required, so the right thing to do is redirect to the login screen
       function ZAuthLogin($sender, $params)
       {
        //ZAuth component is responsible for manage authentication
        //ZAuthDigest uses the file validusers.txt to validate the user
        redirect('login.php');

        //In the same way we are using a ZAuthDigest to validate against a file
        //you can use the ZAuthDB component to validate against a database table
       }

}

global $application;

global $dmAuth;

//Creates the form
$dmAuth=new dmAuth($application);

//Read from resource file
$dmAuth->loadResource(__FILE__);

?>