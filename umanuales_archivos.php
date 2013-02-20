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
class umanuales_archivos extends Page
{
   public $btnagregar = null;
   public $ulimgpath = null;
   public $lblnombre = null;
   public $lblarchivo = null;
   public $Label1 = null;
   public $pbotones = null;
   public $lbtitulo = null;
   public $btnregresar = null;

   function umanuales_archivosShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      if(Derechos('WBADMMAN'))
      {
         echo '<script language="javascript" type="text/javascript">
            alert("No puede Administrar Manuales del sistema");
            window.location = "index.php";
            </script>';
         exit;
      }
      else
      {
         if(isset($_GET['id']))
            $this->lblnombre->Tag = $_GET['id'];
         $rsm = "SELECT nombre, idtitulo from manuales_contenido where idcontador= " . $this->lblnombre->Tag;
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
         $row = mysql_fetch_array($r);
         $this->lblnombre->Caption = '<a href="umanuales_contenido.php?id=' . $row['idtitulo'] . '"><FONT color=#004080>"' . $row['nombre'] . '"</a>';

         if(isset($_GET['borrar']))
         {
            $rsm = "SELECT archivo from manuales_archivos where idcontador= " . $_GET['borrar'];
            $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
            $row = mysql_fetch_array($r);
            echo '<script language="javascript" type="text/javascript">
            if(confirm("Esta seguro de Eliminar el Archivo ' . $row['archivo'] . '"))
               window.location="umanuales_archivos.php?del=' . $_GET['borrar'] . '";
            else
               window.location="umanuales_archivos.php";
            </script>';
         }

         if(isset($_GET['del']))
         {
            $rsm = "SELECT archivo from manuales_archivos where idcontador= " . $_GET['del'];
            $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
            $row = mysql_fetch_array($r);

            $sql = "Delete from manuales_archivos where idcontador = " . $_GET['del'];
            $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

            $file = $_SERVER['DOCUMENT_ROOT'] . GetConfiguraciones('PathManuales') . $row['archivo'];
            if(!unlink($file))
            {
               echo '<script language="javascript" type="text/javascript">
                     alert("error al borrar archivo!!");
                     </script>';
            }
            dmconexion::Log('Elimino el Archivo ' . $_GET['del'] . ' ' . $row['archivo'], 3);
         }

         if(isset($_GET['subir']))
         {
            $path = GetConfiguraciones('PathManuales');
            if((($_SESSION['files']["type"] == "image/gif")
            || ($_SESSION['files']["type"] == "image/jpeg")
            || ($_SESSION['files']["type"] == "image/pjpeg")
            || ($_SESSION['files']["type"] == "application/pdf")
            || ($_SESSION['files']["type"] == "application/vnd.ms-excel")
            || ($_SESSION['files']["type"] == "application/msword"))
            && ($_SESSION['files']["size"] < 10485760))//10 megas
            {
               if($_SESSION['files']["error"] > 0)
               {
                  echo '<script language="javascript" type="text/javascript">
                        alert("Error al subir Archivo");
                        </script>';
               }
               else
               {
                  $file = $_SERVER['DOCUMENT_ROOT'] . GetConfiguraciones('PathManuales') .
                          cadenasinacentos($_SESSION['files']["name"]);
                  if(!unlink($file))
                     echo '<script language="javascript" type="text/javascript">
                           alert("Error al sobre escribir el archivo");
                           </script>';
                  echo '<script language="javascript" type="text/javascript">
                          alert(\'Archivo ' . $_SERVER['DOCUMENT_ROOT'] . $path .
                          cadenasinacentos($_SESSION['files']["name"]) . ' Guardado\');
                        </script>';
                  $origen = $_SERVER['DOCUMENT_ROOT'] . $path . 'temp_'.
                                     cadenasinacentos($_SESSION['files']["name"]);
                  $destino = $_SERVER['DOCUMENT_ROOT'] . $path .
                                     cadenasinacentos($_SESSION['files']["name"]);
                  //move_uploaded_file($origen,$destino);
                  copy($origen,$destino);
                  unlink($origen);
               }
            }
            else
            {
               echo '<script language="javascript" type="text/javascript">
              alert("Formato del Archivo Invalido!");
              </script>';
            }
         }
         if(isset($_GET['subirclear']))
         {
            $file = $_SERVER['DOCUMENT_ROOT'] . GetConfiguraciones('PathManuales') .
                     'temp_'.cadenasinacentos($_SESSION['files']["name"]);
            unlink($file);
         }

      }
      $this->lblarchivo->Caption = $this->MuestraManuales();
   }

   function btnagregarClick($sender, $params)
   {
      if($this->ulimgpath->FileName != '')
      {
         $archivo = cadenasinacentos($this->ulimgpath->FileName);
         $sql = "select replace(replace(replace(replace(replace(REPLACE(lower(archivo),'á','a'),'é','e')
                ,'í','i'),'ó','o'),'ú','u'),'ñ','n') as archivo
                from manuales_archivos where
                replace(replace(replace(replace(replace(REPLACE(lower(archivo),'á','a'),'é','e')
                ,'í','i'),'ó','o'),'ú','u'),'ñ','n')='" . $archivo . "'";
         $rs = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
         if(mysql_num_rows($rs) > 0)
         {
            $row = mysql_fetch_array($rs);
            $_SESSION['files'] = $_FILES["ulimgpath"];
            $path = GetConfiguraciones('PathManuales');
            move_uploaded_file($_FILES["ulimgpath"]["tmp_name"],
            $_SERVER['DOCUMENT_ROOT'] . $path .'temp_'.cadenasinacentos($_FILES["ulimgpath"]["name"]));
            echo '<script language="javascript" type="text/javascript">
                  if(confirm("El achivo ya existe deseas remplazarlo?"))
                      window.location="umanuales_archivos.php?subir=1";
                  else
                     window.location="umanuales_archivos.php?subirclear=1";
                  </script>';
         }
         else
         {
            $sql = "Insert into manuales_archivos (archivo, idcontenido, usuario, fecha, hora) values
                   ('" . cadenasinacentos($this->ulimgpath->FileName) . "',  '" . $this->lblnombre->Tag . "', '" . $_SESSION['login'] . "', curdate(), curtime())";
            $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

            //enviar mail de aviso
            dmconexion::Log('Agrego el Archivo ' . cadenasinacentos($this->ulimgpath->FileName) . ' a ' .
            str_replace('\'', "", str_replace('"', "", $this->lblnombre->Caption)), $nivel);
            $this->UploadFile();
         }
      }
   }

   function UploadFile()
   {
      $path = GetConfiguraciones('PathManuales');

      if((($_FILES["ulimgpath"]["type"] == "image/gif")
      || ($_FILES["ulimgpath"]["type"] == "image/jpeg")
      || ($_FILES["ulimgpath"]["type"] == "image/pjpeg")
      || ($_FILES["ulimgpath"]["type"] == "application/pdf")
      || ($_FILES["ulimgpath"]["type"] == "application/vnd.ms-excel")
      || ($_FILES["ulimgpath"]["type"] == "application/msword"))
      && ($_FILES["ulimgpath"]["size"] < 10485760))//10 megas
      {
         if($_FILES["ulimgpath"]["error"] > 0)
         {
            echo '<script language="javascript" type="text/javascript">
              alert("Error al subir Archivo");
              </script>';
         }
         else
         {
            if(file_exists($path .cadenasinacentos($_FILES["ulimgpath"]["name"])))
            {
               echo '<script language="javascript" type="text/javascript">
              alert("El Archivo ya existe");
              </script>';
            }
            else
            {
               echo '<script language="javascript" type="text/javascript">
                  alert(\'Archivo ' . $_SERVER['DOCUMENT_ROOT'] .
                  $path .cadenasinacentos($_FILES["ulimgpath"]["name"]) . ' Guardado\');
                  </script>';
               move_uploaded_file($_FILES["ulimgpath"]["tmp_name"],
               $_SERVER['DOCUMENT_ROOT'] . $path . cadenasinacentos($_FILES["ulimgpath"]["name"]));
            }
         }
      }
      else
      {
         echo '<script language="javascript" type="text/javascript">
              alert("Formato del Archivo Invalido!");
              </script>';
      }
   }

   function btnregresarClick($sender, $params)
   {
      redirect('menu.php');
   }

   function MuestraManuales($eb = true)
   {

      $rsm = "SELECT * from manuales_archivos where idcontenido=" . $this->lblnombre->Tag;
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
         Manual
         </span></td>
         ';

      if($eb == true)
         $c = $c .
         '
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
            <div align="left">' . $row['idcontador'] . '</div>
            </span>
            </td>
            <td>
            <span style=" font-family: Verdana; font-size: 10;  ">
            <div align="left"><a href="' . GetConfiguraciones('PathManuales') . codificacion($row['archivo']) . '" target="_blank"><FONT color=#004080>' . $row['archivo'] . '</a></div>
            </span>
            </td>';

         if($eb == true)
            $c = $c .
            '
               <td>
               <span style=" font-family: Verdana; font-size: 10;  ">
               <div align="left"><a href="umanuales_archivos.php?borrar=' . $row['idcontador'] . '" ><FONT color=#004080>Borrar</a> </div>
               </span>
               </td>';
         $c = $c .
         ' </tr> ';

      }
      $c = $c . ' </table>';
      return $c;
   }
}
global $application;

global $umanuales_archivos;

//Creates the form
$umanuales_archivos = new umanuales_archivos($application);

//Read from resource file
$umanuales_archivos->loadResource(__FILE__);

//Shows the form
$umanuales_archivos->show();

?>