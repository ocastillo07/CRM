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
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class urhdescpuestos extends Page
{
   public $cbpuesto = null;
   public $cbarea = null;
   public $Label6 = null;
   public $Label5 = null;
   public $hfpath = null;
   public $btnsubir = null;
   public $lbeliminar = null;
   public $lbadjunto = null;
   public $upload = null;
   public $pbotones = null;
   public $lbtitulo = null;
   public $btnregresar = null;
   function cbpuestoChange($sender, $params)
   {
      $sql = 'Select archivo from rhdescpuestos where idpuesto=' . $this->cbpuesto->ItemIndex;
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);
      if($row != false)
      {
         $this->lbadjunto->Caption = $row['archivo'];
         $this->lbadjunto->Link = $path . $row['archivo'];
         $this->hfpath->Value = $row['archivo'];
         $this->lbeliminar->Caption = 'Eliminar';
         $this->lbeliminar->Visible = true;
      }
      else
      {
         $this->lbadjunto->Caption = '';
         $this->lbadjunto->Link = '';
         $this->hfpath->Value = '';
         $this->lbeliminar->Caption = '';
         $this->lbeliminar->Visible = false;
      }

   }


   function cbareaChange($sender, $params)
   {
      $this->cargapuesto();
   }

   function btnregresarClick($sender, $params)
   {
      redirect('urhdescpuestosman.php');
   }

   function urhdescpuestosCreate($sender, $params)
   {
      if(Derechos('ALRHDESCPTOS') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Agregar Descripciones de Puesto");
               document.location.href("menu.php");
               </script>';
      }

      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      $this->inicializa();
   }

   function lbeliminarClick($sender, $params)
   {
      if(Derechos('ELRHDESCPTOS') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Eliminar el Archivo");
               </script>';
      }
      else
      {
         $path = GetConfiguraciones('PathPuestos');
         $path = RightStr($path, strlen($path) - 1);
         unlink($path . $this->lbadjunto->Caption);
         $this->hfpath->Value = '';
         $sql = ' delete from rhdescpuestos where idpuesto =' . $this->cbpuesto->ItemIndex;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->lbadjunto->Caption = '';
         $this->lbeliminar->Caption = '';
      }
   }

   function btnsubirClick($sender, $params)
   {
      if(Derechos('SUBRHDESCPTOS') == false)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("No Tienes Derechos para Adjuntar el Archivo");
              </script>';
      }
      else
      {
         $path = GetConfiguraciones('PathPuestos');
         if(($_FILES["upload"]["type"] == "application/pdf") &&
         ($_FILES["upload"]["size"] < 20485760))//10 megas
         {
            if($_FILES["upload"]["error"] > 0)
            {
               echo '<script language="javascript" type="text/javascript">
                           alert(\'Error al subir Archivo: ' . $_FILES["upload"]["error"] . '\');
                         </script>';
            }
            else
            {
               if(file_exists($path . $_FILES["upload"]["name"]))
               {
                  echo '<script language="javascript" type="text/javascript">
                       alert(\' El Archivo ya existe: ' . $_FILES["upload"]["name"] . '\');
                        </script>';
               }
               else
               {
                  move_uploaded_file($_FILES["upload"]["tmp_name"],
                  $_SERVER['DOCUMENT_ROOT'] . $path . replace($_FILES["upload"]["name"]));
                  echo '<script language="javascript" type="text/javascript">
                         		 alert(\'Archivo Guardado: ' . replace($_FILES["upload"]["name"]) . '\');
                        		</script>';
                  $this->lbadjunto->Caption = replace($_FILES["upload"]["name"]);
                  $this->lbadjunto->Link = $path . replace($_FILES["upload"]["name"]);
                  $this->hfpath->Value = replace($_FILES['upload']['name']);
                  $sql = ' insert into rhdescpuestos (idpuesto, archivo, usuario, fecha, hora)
                         values (' . $this->cbpuesto->ItemIndex . ', "' . $this->hfpath->Value . '",
                         "' . $_SESSION['login'] . '", curdate(), curtime())';
                  $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
                  $this->lbeliminar->Caption = 'Eliminar';
                  $this->lbeliminar->Visible = true;
               }
            }
         }
         else
         {
            echo '<script language="javascript" type="text/javascript">
                alert(\' Formato del Archivo Invalido! \');
                </script>';
         }
      }

   }

   function inicializa()
   {
      //areas
      $this->cbarea->Clear();
      $sql = 'select idarea, nombre from areas';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbarea->AddItem($row['nombre'], null , $row['idarea']);

    /*  //puestos
      $this->cbpuesto->Clear();
      $sql = 'select idpuesto, nombre from puestos';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbpuesto->AddItem($row['nombre'], null , $row['idpuesto']); */

   }

   function cargapuesto()
   {
      $this->cbpuesto->Clear();
      $sql = 'select idpuesto, nombre from puestos where idarea=' . $this->cbarea->ItemIndex;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbpuesto->AddItem($row['nombre'], null , $row['idpuesto']);
   }

   function Limpiar()
   {
      reset($this->controls->items);
      while(list($key, $val) = each($this->controls->items))
      {
         if($val->inheritsFrom("ComboBox"))
            $val->ItemIndex = -1;

         if($val->inheritsFrom("HiddenField"))
            $val->value = '0';
      }
      $this->lbufh->Caption = '';
   }


}

global $application;

global $urhdescpuestos;

//Creates the form
$urhdescpuestos = new urhdescpuestos($application);

//Read from resource file
$urhdescpuestos->loadResource(__FILE__);

//Shows the form
$urhdescpuestos->show();

?>