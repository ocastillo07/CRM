<script type='text/javascript' src='funciones.js'></script>
<?php
//Includes
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");


require_once("vcl/vcl.inc.php");
//Includes
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class urebusquedas extends Page
{
   public $Button1 = null;
   public $dtf2 = null;
   public $dtf1 = null;
   public $Label2 = null;
   public $hftabla = null;
   public $lbdetalle = null;
   public $pbotones = null;
   public $lbtitulo = null;
   public $btnregresar = null;
   function urebusquedasJSLoad($sender, $params)
   {

   ?>
    basicAjax('urebusquedas_ajax.php', 'TraerDetalle=1&tabla='+vcl.$('hftabla').value+
              '&f1='+vcl.$('dtf1').value+
              '&f2='+vcl.$('dtf2').value);
   <?php

   }

   function urebusquedasShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;

      if(isset($_GET['tabla']))
      {
         $this->hftabla->Value = $_GET['tabla'];

         $this->dtf1->Text = date('Y/m/01');
         $this->dtf2->Text = date('Y/m/d');
      }




   }





   function btnregresarClick($sender, $params)
   {
      redirect('uresegnoref.php');
   }

}

global $application;

global $urebusquedas;

//Creates the form
$urebusquedas = new urebusquedas($application);

//Read from resource file
$urebusquedas->loadResource(__FILE__);

//Shows the form
$urebusquedas->show();

?>