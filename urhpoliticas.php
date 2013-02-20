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
class urhpoliticas extends Page
{
   public $hfdetalle = null;
   public $lblnombre = null;
   public $lblcontenido = null;
   public $edtitulo = null;
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
   function cbareaChange($sender, $params)
   {
      $this->lblcontenido->Caption = $this->MuestraManuales();


   }

   function urhpoliticasShow($sender, $params)
   {
      if(isset($_GET['id']))
      {
         $this->lblnombre->Tag = $_GET['id'];

         $rsm = "SELECT a.nombre as area, p.titulo from rhpoliticas p
              left join areas a on a.idarea = p.idarea
              where idcontador= " . $this->lblnombre->Tag;
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
         $row = mysql_fetch_array($r);
         $this->lblnombre->Caption = '<FONT color=#004080>AREA : "' . $row['area'] . '"';
         $this->edtitulo->Text = $row['titulo'];
      }

      if(isset($_GET['editar']))
      {
         $sql = "Select titulo from rhpoliticas where idcontador = " . $_GET['editar'];
         $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
         $row = mysql_fetch_array($result);
         $this->edtitulo->Text = $row['titulo'];
         $this->edtitulo->Tag = $_GET['editar'];
      }

      if(isset($_GET['borrar']))
      {
         echo '<script language="javascript" type="text/javascript">
            if(confirm("Esta seguro de Eliminar el Documento ' . $this->edtitulo->Text . ' ?"))
               window.location="urhpoliticas.php?del=' . $_GET['borrar'] . '";
            else
               window.location="urhpoliticas.php";
            </script>';
      }

      if(isset($_GET['del']))
      {
         $sql = "Select archivo from rhpoliticas where idcontador=" . $_GET['del'];
         $rs = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
         while($row = mysql_fetch_array($rs))
            unlink($_SERVER['DOCUMENT_ROOT'] . GetConfiguraciones('PathPoliticas') . $row['archivo']);

         $sql = "Delete from rhpoliticas where idcontador = " . $_GET['del'];
         $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
         //enviar mail de aviso
         dmconexion::Log('Elimino la politica ' . $_GET['del'] . ' - ' . $this->edtitulo->Text, 3);
      }
      $this->lblcontenido->Caption = $this->MuestraManuales();
   }

   function urhpoliticasCreate($sender, $params)
   {
      if(Derechos('ALRHPOLIT') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Agregar Politicas");
               document.location.href("menu.php");
               </script>';
      }

      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      $this->inicializa();


   }


   function cbpuestoChange($sender, $params)
   {
      $sql = 'Select archivo from rhpoliticas where idpuesto=' . $this->cbpuesto->ItemIndex;
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


   function btnregresarClick($sender, $params)
   {
      redirect('urhpoliticasvista.php');
   }

   function lbeliminarClick($sender, $params)
   {
      if(Derechos('ELRHPOLIT') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Eliminar el Archivo");
               </script>';
      }
      else
      {
         $path = GetConfiguraciones('PathPoliticas');
         $path = RightStr($path, strlen($path) - 1);
         unlink($path . $this->lbadjunto->Caption);
         $this->hfpath->Value = '';
         $sql = ' delete from rhpoliticas where idpuesto =' . $this->cbpuesto->ItemIndex;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->lbadjunto->Caption = '';
         $this->lbeliminar->Caption = '';
      }
   }

   function btnsubirClick($sender, $params)
   {
      if(Derechos('SUBRHPOLIT') == false)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("No Tienes Derechos para Adjuntar el Archivo");
              </script>';
      }
      else
      {
         if($this->edtitulo->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
              alert("Falta el titulo del archivo");
              </script>';
         }
         else
         {
            $path = GetConfiguraciones('PathPoliticas');
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
                     //$this->lbadjunto->Caption = replace($_FILES["upload"]["name"]);
                     //$this->lbadjunto->Link = $path . replace($_FILES["upload"]["name"]);
                     $this->hfpath->Value = replace($_FILES['upload']['name']);
                     $sql = ' insert into rhpoliticas (idarea, titulo, archivo, usuario, fecha, hora)
                         values (' . $this->cbarea->ItemIndex . ', "' . $this->edtitulo->Text . '",
                         "' . $this->hfpath->Value . '",
                         "' . $_SESSION['login'] . '", curdate(), curtime())';
                     $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
                     $this->edtitulo->Text = '';
                     //$this->lbeliminar->Caption = 'Eliminar';
                     //$this->lbeliminar->Visible = true;
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

   }

   function MuestraManuales($eb = true)
   {
      $path = GetConfiguraciones('PathPoliticas');
      $rsm = "SELECT p.idcontador, p.titulo, p.archivo from rhpoliticas p where idarea=" . $this->cbarea->ItemIndex . " order by titulo";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      $c = '
         <table width="750" border="0" cellspacing="1" cellpadding="1"  class = "estilos.css">
         <tr bgcolor="#E5E5E5">

         <td width="20">
         <span style=" font-family: Verdana; font-size: 11; ">
         No.
         </span></td>
         <td width="300">
         <span style=" font-family: Verdana; font-size: 11; ">
         Politica
         </span></td>
         ';

      if($eb == true)
         $c = $c .
         '<td width="75">
            <span style=" font-family: Verdana; font-size: 11; ">
            Editar
            </span></td>
            <td width="75">
            <span style=" font-family: Verdana; font-size: 11; ">
            Borrar
            </span></td>';

      $c = $c .
      '
         </tr>';

      while($row = mysql_fetch_array($r))
      {
         $c = $c . '
            <tr>
            <td>
            <span style=" font-family: Verdana; font-size: 10;  ">
            <div align="left"><FONT color=#004080>' . $row['idcontador'] . '</div>
            </span>
            </td>
            <td>
            <span style=" font-family: Verdana; font-size: 10;  ">
            <div align="left"><a href="' . $path . $row['archivo'] . '" TARGET="_blank"><FONT color=#004080>' . $row['titulo'] . '</a></div>
            </span>
            </td>';

         if($eb == true)
            $c = $c .
            '
               <td>
               <span style=" font-family: Verdana; font-size: 10;  ">
               <div align="left"><a href="urhpoliticas.php?editar=' . $row['idcontador'] . '"><FONT color=#004080>Editar</a> </div>
               </span>
               </td>
               <td>
               <span style=" font-family: Verdana; font-size: 10;  ">
               <div align="left"><a href="urhpoliticas.php?borrar=' . $row['idcontador'] . '"><FONT color=#004080>Borrar</a> </div>
               </span>
               </td>';
         $c = $c .
         ' </tr> ';

      }
      $c = $c . ' </table>';
      return $c;
   }

   function inicializa()
   {
      //areas
      $this->cbarea->Clear();
      $sql = 'select idarea, nombre from areas';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbarea->AddItem($row['nombre'], null , $row['idarea']);

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

global $urhpoliticas;

//Creates the form
$urhpoliticas = new urhpoliticas($application);

//Read from resource file
$urhpoliticas->loadResource(__FILE__);

//Shows the form
$urhpoliticas->show();

?>