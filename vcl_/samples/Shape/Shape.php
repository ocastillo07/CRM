<?php
//Includes
require_once("vcl/vcl.inc.php");
use_unit("buttons.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class frmShape extends Page
{
   public $Label1 = null;
   public $Shape6 = null;
   public $Shape5 = null;
   public $Shape4 = null;
   public $Shape3 = null;
   public $Shape2 = null;
   public $Shape1 = null;
}

global $application;

global $frmShape;

//Creates the form
$frmShape = new frmShape($application);

//Read from resource file
$frmShape->loadResource(__FILE__);

//Shows the form
$frmShape->show();

?>