<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
require_once("vcl/vcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class urhpoliticasvista extends Page
{
   public $lbarea = null;
   public $Label1 = null;
   public $Label2 = null;
   public $lbpuestos = null;
   public $hfpath = null;
   public $pbotones = null;
   public $lbtitulo = null;
   public $btnregresar = null;
   function urhpoliticasvistaCreate($sender, $params)
   {
      if(Derechos('ACCRHPOLIT') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para accesar a Politicas");
               document.location.href("menu.php");
               </script>';
         exit;
      }


   }

   function urhpoliticasvistaShow($sender, $params)
   {

      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      $this->hfpath->Value = GetConfiguraciones('PathPoliticas');
      $rsm = "select nombre, idarea from areas";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $this->lbarea->Clear();
      while($row = mysql_fetch_array($r))
         $this->lbarea->AddItem($row['nombre'], null , $row['idarea']);
   }

   function lbareaClick($sender, $params)
   {
      $this->lbpuestos->Clear();
      $rsm = "select titulo, idcontador from rhpoliticas
              where idarea=" . $this->lbarea->ItemIndex;
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      while($row = mysql_fetch_array($r))
         $this->lbpuestos->AddItem($row['titulo'], null , $row['idcontador']);
   }

   function lbpuestosClick($sender, $params)
   {
      $rsm = "select archivo  from rhpoliticas
              where idcontador=" . $this->lbpuestos->ItemIndex;
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $row = mysql_fetch_array($r);
      if($row != false)
      {

         $host = $_SERVER['HTTP_HOST'];
         $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

         $file = $uri . GetConfiguraciones('PathPoliticas') . $row['archivo'];
         $url = '<script language="javascript" type="text/javascript">
           window.open("http://' . $host . $file . '", "_blank");
                 </script>';

         echo $url;
      }
      else
      {
         echo '<script language="javascript" type="text/javascript">
                alert("No esta capturada la politica");
                </script>';
      }
   }


   function btnregresarClick($sender, $params)
   {
      redirect('menu.php');
   }

}

global $application;

global $urhpoliticasvista;

//Creates the form
$urhpoliticasvista = new urhpoliticasvista($application);

//Read from resource file
$urhpoliticasvista->loadResource(__FILE__);

//Shows the form
$urhpoliticasvista->show();

?>