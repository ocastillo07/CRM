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
class umanuales_titulos extends Page
{
   public $Label2 = null;
   public $btnagregar = null;
   public $edmanual = null;
   public $lblmanuales = null;
   public $Label1 = null;
   public $pbotones = null;
   public $lbtitulo = null;
   public $btnregresar = null;


   function btnregresarClick($sender, $params)
   {
      redirect('menu.php');
   }

   function btnagregarClick($sender, $params)
   {
      if($this->edmanual->Tag != 0)
      {
         $sql = "Update manuales_titulos set nombre = '" . $this->edmanual->Text . "',
                usuario = '" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
                where idcontador = " . $this->edmanual->Tag;
         $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
         //enviar mail de aviso
         dmconexion::Log('Modifico el nombre del Manual ' . $this->edmanual->Tag . ' a ' . strtoupper($this->edmanual->Text), 2);
         $this->edmanual->Text = '';
         $this->edmanual->Tag = 0;
      }
      else
      {
         if($this->edmanual->Text != '')
         {
            $sql = "Insert into manuales_titulos (nombre, usuario, fecha, hora) values
                  ('" . strtoupper($this->edmanual->Text) . "'  , '" . $_SESSION['login'] . "', curdate(), curtime())";
            $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

            //enviar mail de aviso
            dmconexion::Log('Agrego el manual ' . $_GET['editar'] . ' - ' . strtoupper($this->edmanual->Text), $nivel);
            $this->edmanual->Text = '';
         }
      }
   }

   function umanuales_titulosShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      if(Derechos('Administrar Manuales') == false)
      {
         echo '<script language="javascript" type="text/javascript">
            		alert("No puede Administrar Manuales del sistema");
            		window.location = "menu.php";
            		</script>';
         exit;
      }
      else
      {
         if(isset($_GET['editar']))
         {
            $sql = "Select nombre from manuales_titulos where idcontador = " . $_GET['editar'];
            $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
            $row = mysql_fetch_array($result);
            $this->edmanual->Text = $row['nombre'];
            $this->edmanual->Tag = $_GET['editar'];
         }

         if(isset($_GET['borrar']))
         {
            echo '<script language="javascript" type="text/javascript">
            			if(confirm("Esta seguro de Eliminar el Area ' . $this->edmanual->Text . '? \n Si continuas Borraras Todo Su Contenido"))
               			window.location="umanuales_titulos.php?del=' . $_GET['borrar'] . '";
            			else
               			window.location="umanuales_titulos.php";
            			</script>';
         }

         if(isset($_GET['del']))
         {
            $sql = 'select idcontador from manuales_contenido where idtitulo=' . $_GET['del'];
            $rs = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
            $row = mysql_fetch_array($rs);
            if(mysql_num_rows($rs) > 0)
            {
               $sql = 'select archivo from manuales_archivos where idcontenido=' . $row['idcontador'];
               $rs = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
               while($archivos = mysql_fetch_array($rs))
                  unlink(GetConfiguraciones('PathManuales') . $archivos['archivo']);
               $sql = 'Delete from manuales_archivos where idcontenido=' . $row[0];
               mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
               $sql = 'Delete from manuales_contenido where idtitulo=' . $_GET['del'];
               mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
            }
            $sql = "Delete from manuales_titulos where idcontador = " . $_GET['del'];
            $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
            //enviar mail de aviso
            dmconexion::Log('Elimino el Area ' . $_GET['del'] . ' - ' . $this->edmanual->Text . ' y su contenido', 3);
         }
         $this->lblmanuales->Caption = $this->MuestraManuales();
      }

   }

   function MuestraManuales($eb = true)
   {

      $rsm = "SELECT * from manuales_titulos ";
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
            <div align="left"><a href="umanuales_contenido.php?id=' . $row['idcontador'] . '"><FONT color=#004080>' . $row['nombre'] . '</a></div>
            </span>
            </td>';

         if($eb == true)
            $c = $c .
            '
               <td>
               <span style=" font-family: Verdana; font-size: 10;  ">
               <div align="left"><a href="umanuales_titulos.php?editar=' . $row['idcontador'] . '"><FONT color=#004080>Editar</a> </div>
               </span>
               </td>
               <td>
               <span style=" font-family: Verdana; font-size: 10;  ">
               <div align="left"><a href="umanuales_titulos.php?borrar=' . $row['idcontador'] . '"><FONT color=#004080>Borrar</a> </div>
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

global $umanuales_titulos;

//Creates the form
$umanuales_titulos = new umanuales_titulos($application);

//Read from resource file
$umanuales_titulos->loadResource(__FILE__);

//Shows the form
$umanuales_titulos->show();

?>