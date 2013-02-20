<?php

session_start();
if(!isset($_SESSION["login"]))
{
   redirect("login.php");
}

require_once("vcl/vcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class uinicio extends Page
{
   public $pbotones = null;
   public $Image1 = null;
   function uinicioShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"] - 164;
      $this->Image1->Left = ($_SESSION["width"] / 2) - ($this->Image1->Width / 2) - 160;
   }

}

global $application;

global $uinicio;

//Creates the form
$uinicio = new uinicio($application);

//Read from resource file
$uinicio->loadResource(__FILE__);

//Shows the form
$uinicio->show();

?>