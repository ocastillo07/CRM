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
class umanuales_contenido extends Page
{
   public $lblnombre = null;
   public $btnagregar = null;
   public $edmanual = null;
   public $lblcontenido = null;
   public $Label1 = null;
   public $pbotones = null;
   public $lbtitulo = null;
   public $btnregresar = null;
   function btnagregarClick($sender, $params)
   {
      if($this->edmanual->Tag != 0)
      {
         $sql = "Update manuales_contenido set nombre = '" . strtoupper($this->edmanual->Text) . "', idtitulo='" . $this->lblnombre->Tag . "',
                usuario = '" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
                where idcontador = " . $this->edmanual->Tag;
         $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
         //enviar mail de aviso
         dmconexion::Log('Modifico el nombre del Contenido ' . $this->edmanual->Tag . ' a ' . strtoupper($this->edmanual->Text), 2);
         $this->edmanual->Text = '';
         $this->edmanual->Tag = 0;
      }
      else
      {
         if($this->edmanual->Text != '')
         {
            $sql = "Insert into manuales_contenido (nombre, idtitulo, usuario, fecha, hora) values
                  ('" . strtoupper($this->edmanual->Text) . "',  '" . $this->lblnombre->Tag . "', '" . $_SESSION['login'] . "', curdate(), curtime())";
            $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

            //enviar mail de aviso
            dmconexion::Log('Agrego el Contenido ' . $this->edmanual->Tag . ' - ' . strtoupper($this->edmanual->Text), $nivel);
            $this->edmanual->Text = '';
         }
      }
   }

   function umanuales_contenidoShow($sender, $params)
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
         $rsm = "SELECT nombre from manuales_titulos where idcontador= " . $this->lblnombre->Tag;
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
         $row = mysql_fetch_array($r);
         $this->lblnombre->Caption = '<a href="umanuales_titulos.php"><FONT color=#004080>AREA : "' . $row['nombre'] . '"';
         if(isset($_GET['editar']))
         {
            $sql = "Select nombre from manuales_contenido where idcontador = " . $_GET['editar'];
            $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
            $row = mysql_fetch_array($result);
            $this->edmanual->Text = $row['nombre'];
            $this->edmanual->Tag = $_GET['editar'];
         }

         if(isset($_GET['borrar']))
         {
            echo '<script language="javascript" type="text/javascript">
            if(confirm("Esta seguro de Eliminar el Documento ' . $this->edmanual->Text . ' y TODO su contenido?"))
               window.location="umanuales_contenido.php?del=' . $_GET['borrar'] . '";
            else
               window.location="umanuales_contenido.php";
            </script>';
         }

         if(isset($_GET['del']))
         {
            $sql = "Select archivo from manuales_archivos where idcontenido=" . $_GET['del'];
            $rs = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
            while($row = mysql_fetch_array($rs))
               unlink($_SERVER['DOCUMENT_ROOT'] . GetConfiguraciones('PathManuales') . $row['archivo']);
            $sql = "Delete from manuales_archivos where idcontenido=" . $_GET['del'];
            $rs = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
            $sql = "Delete from manuales_contenido where idcontador = " . $_GET['del'];
            $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
            //enviar mail de aviso
            dmconexion::Log('Elimino el Documento ' . $_GET['del'] . ' - ' . $this->edmanual->Text, 3);
         }
         $this->lblcontenido->Caption = $this->MuestraManuales();
      }
   }

   function btnregresarClick($sender, $params)
   {
      redirect('menu.php');
   }

   function MuestraManuales($eb = true)
   {
      //$rsm ="SELECT * from manuales_contenido where idtitulo=".$this->lblnombre->Tag;
      $rsm = "SELECT mc.*,
             mid(mc.nombre, locate('-',mid(mc.nombre, locate('-',mc.nombre) +1, length(mc.nombre)))+1,locate('-',mid(mc.nombre, locate('-',mc.nombre) +1, length(mc.nombre))) -1)  as num,
            mid(mc.nombre, locate('-',mid(mc.nombre, locate('-',mc.nombre) +1, length(mc.nombre)))+1,locate(' ',mid(mc.nombre, locate('-',mc.nombre) +1, length(mc.nombre)))+1 -2) as num1,
            concat(mid(mc.nombre, locate('-',mid(mc.nombre, locate('-',mc.nombre) +1, length(mc.nombre)))+1,(locate(' ',mid(mc.nombre, locate('-',mc.nombre) +1, length(mc.nombre)))+1)-
            (locate('-',mid(mc.nombre, locate('-',mc.nombre) +1, length(mc.nombre)))+1 ) ),
            left(mc.nombre, locate('-',mid(mc.nombre, locate('-',mc.nombre) +1, length(mc.nombre))) -1) ) as primero
      from manuales_contenido mc where idtitulo=" . $this->lblnombre->Tag . " order by primero, num, num1";
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
            <div align="left"><a href="umanuales_archivos.php?id=' . $row['idcontador'] . '"><FONT color=#004080>' . $row['nombre'] . '</a></div>
            </span>
            </td>';

         if($eb == true)
            $c = $c .
            '
               <td>
               <span style=" font-family: Verdana; font-size: 10;  ">
               <div align="left"><a href="umanuales_contenido.php?editar=' . $row['idcontador'] . '"><FONT color=#004080>Editar</a> </div>
               </span>
               </td>
               <td>
               <span style=" font-family: Verdana; font-size: 10;  ">
               <div align="left"><a href="umanuales_contenido.php?borrar=' . $row['idcontador'] . '"><FONT color=#004080>Borrar</a> </div>
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

global $umanuales_contenido;

//Creates the form
$umanuales_contenido = new umanuales_contenido($application);

//Read from resource file
$umanuales_contenido->loadResource(__FILE__);

//Shows the form
$umanuales_contenido->show();

?>