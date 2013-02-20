<?php
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
class urhtpc extends Page
{
   public $rgciudad = null;
   public $Label3 = null;
   public $cbtipos = null;
   public $dtf2 = null;
   public $dtf1 = null;
   public $Label2 = null;
   public $pbotones = null;
   public $lbtitulo = null;
   public $btngenerar = null;
   function urhtpcShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
   }

   function urhtpcCreate($sender, $params)
   {
      if(Derechos('ACCRHTPC') == false)
      {
         echo '<script language="javascript" type="text/javascript">
            	   alert("Usted no tiene derechos para accesar a Reporte de Contrataciones");
               	document.location.href("menu.php");
               	</script>';
         exit;
      }
   }

   function btngenerarClick($sender, $params)
   {

      $reporte = 'rhtpc';
      $tipor = $this->cbtipos->ItemIndex;
      $f1 = $this->dtf1->Text;
      $f2 = $this->dtf2->Text;
      $idplaza = $this->rgciudad->ItemIndex;
      $tipo = 'pdf';

      echo '<script language="javascript" type="text/javascript">
           window.open("http://' . GetConfiguraciones('ipserver') . ':8080/imprimir.jsp?' .
      'reporte=' . $reporte . '&tiporeporte=' . $tipo .
      '&f1=' . $f1 . '&f2=' . $f2 . '&tipor=' . $tipor . '&idplaza=' . $idplaza . '", "_blank");
           </script>';

   }


}

global $application;

global $urhtpc;

//Creates the form
$urhtpc = new urhtpc($application);

//Read from resource file
$urhtpc->loadResource(__FILE__);

//Shows the form
$urhtpc->show();

?>