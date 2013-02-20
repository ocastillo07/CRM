<?php
require_once("vcl/vcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

include("dmconexion.php");
include("urecursos.php");
session_start();
//Class definition
class ulogout extends Page
{
       public $Label1 = null;
       function ulogoutShow($sender, $params)
       {
       session_unset();
       session_destroy();
       redirect('login.php');
       }
}

global $application;

global $ulogout;

//Creates the form
$ulogout=new ulogout($application);

//Read from resource file
$ulogout->loadResource(__FILE__);

//Shows the form
$ulogout->show();

?>