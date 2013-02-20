<?php
require_once("vcl/vcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class Unit1 extends Page
{
       function Unit1Create($sender, $params)
       {
         redirect('login.php');


       }

}

global $application;

global $Unit1;

//Creates the form
$Unit1=new Unit1($application);

//Read from resource file
$Unit1->loadResource(__FILE__);

//Shows the form
$Unit1->show();

?>