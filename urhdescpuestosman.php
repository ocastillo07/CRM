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
class urhdescpuestosman extends Page
{
   public $lbpuestos = null;
   public $lbarea = null;
   public $Label1 = null;
   public $Label2 = null;
   public $hfpath = null;
   public $pbotones = null;
   public $lbtitulo = null;
   public $btnregresar = null;
   function urhdescpuestosmanCreate($sender, $params)
   {
      if(Derechos('ACCRHDESCPTOS') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para accesar a Descripcion de Puestos");
               document.location.href("menu.php");
               </script>';
         exit;
      }
   }

   function urhdescpuestosmanShow($sender, $params)
   {

      $this->pbotones->Width = $_SESSION["width"];
      $this->hfpath->Value = GetConfiguraciones('PathPuestos');
      $rsm = "select nombre, idarea from areas";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $this->lbarea->Clear();
      while($row = mysql_fetch_array($r))
         $this->lbarea->AddItem($row['nombre'], null , $row['idarea']);
   }

   function lbareaClick($sender, $params)
   {
      $this->lbpuestos->Clear();
      $rsm = "select p.nombre, p.idpuesto, ifnull(d.fecha, '~') as fecha
              from puestos p left join rhdescpuestos d on d.idpuesto=p.idpuesto
              where idarea= " . $this->lbarea->ItemIndex;
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      while($row = mysql_fetch_array($r))
         $this->lbpuestos->AddItem($row['nombre'] . '    [' . $row['fecha'] . ']', null , $row['idpuesto']);
   }

   function lbpuestosClick($sender, $params)
   {
      $rsm = "select archivo  from rhdescpuestos
              where idpuesto=" . $this->lbpuestos->ItemIndex;
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $row = mysql_fetch_array($r);
      if($row != false)
      {
         $sql = 'Select idpuesto from rhdescpuestos_der
                where idpuesto=' . $_SESSION['idpuesto'] . ' and iddescripcion=' . $this->lbpuestos->ItemIndex;
         $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         $row = mysql_fetch_array($rs);
         if($row != false)
         {

            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

            $file = $uri . GetConfiguraciones('PathPuestos') . $row['archivo'];
            $url = '<script language="javascript" type="text/javascript">
           window.open("http://' . $host . $file . '", "_blank");
                 </script>';

            echo $url;
         }
         else
         {
            echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para accesar a esta Descripcion");
               </script>';
         }
      }
      else
      {
         echo '<script language="javascript" type="text/javascript">
                alert("No esta capturada la descripcion de puesto");
                </script>';
      }
   }


   function btnregresarClick($sender, $params)
   {
      redirect('menu.php');
   }

}

global $application;

global $urhdescpuestosman;

//Creates the form
$urhdescpuestosman = new urhdescpuestosman($application);

//Read from resource file
$urhdescpuestosman->loadResource(__FILE__);

//Shows the form
$urhdescpuestosman->show();

?>