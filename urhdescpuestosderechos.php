<script type='text/javascript' src='funciones.js'></script>
<link href="estilos.css" rel="stylesheet" type="text/css" />
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
class urhdescpuestosderechos extends Page
{
   public $lbpuesto = null;
   public $lbareas = null;
   public $lbpuestos = null;
   public $hfidpuesto = null;
   public $hfestatus = null;
   public $Label1 = null;
   public $pbotones = null;
   public $btnbloquear = null;
   public $btnliberar = null;
   public $btnregresar = null;
   public $btngcerrar = null;
   public $btnguardar = null;
   public $lbtitulo = null;
   function urhdescpuestosderechosJSLoad($sender, $params)
   {

?>
    validarEventos();
   if(vcl.$('hfidpuesto').value != '' && vcl.$('hfidpuesto').value != undefined)
      basicAjax('urhdescpuestosderechos_ajax.php','Inicializa=0'+'&idpuesto='+vcl.$('hfidpuesto').value);
   else
      basicAjax('urhdescpuestosderechos_ajax.php','Inicializa=0'+'&idpuesto='+vcl.$('hfidpuesto').value);
<?php

   }

   function urhdescpuestosderechosShow($sender, $params)
   {
      if(Derechos('ACCDERECHOS') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No puede Accesar a Derechos de Usuarios");
               window.location="uusuariosvista.php?pagina=uusuariosvista.php";
               </script>';
      }

      if(isset($_GET['idpuesto']))
      {
         $this->pbotones->Width = $_SESSION["width"] - 164;
         $this->lbtitulo->Caption = $this->Caption;
         $this->hfidpuesto->Value = $_GET['idpuesto'];
         $this->LlenaPagina();
      }
   }

   function btnbloquearJSClick($sender, $params)
   {
?>
      basicAjax('urhdescpuestosderechos_ajax.php','Bloquear=0');
<?php
   }

   function btnliberarJSClick($sender, $params)
   {
?>
      basicAjax('urhdescpuestosderechos_ajax.php','Liberar=0');
<?php
   }

   function btngcerrarClick($sender, $params)
   {
      $this->guardar();
      redirect('upuestosvista.php');
   }

   function btnguardarClick($sender, $params)
   {
      $this->Guardar();
      echo '<script language="javascript" type="text/javascript">
           alert("Derechos guardados");
           window.location="urhdescpuestosderechos.php?idpuesto=' . $this->hfidpuesto->Value . '";
           </script>';
   }

   function btnregresarClick($sender, $params)
   {
      redirect("upuestosvista.php");
   }

   function LlenaPagina()
   {

      $sql = 'Select p.idpuesto, p.nombre from puestos p where p.idpuesto=' . $this->hfidpuesto->Value;
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);

      $this->lbpuesto->Caption = 'PUESTO [' . $row['idpuesto'] . ']: ' . $row['nombre'];
   }

   function Guardar()
   {
      if(Derechos('ASIGDER') == false)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("No puede Asignar Derechos");
              window.location="upuestosvista.php";
              </script>';
      }
      else
      {
         $idpuesto = $this->hfidpuesto->Value;

         $sql = 'Delete from rhdescpuestos_der where idpuesto=' . $idpuesto;
         $rs = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());


         $memlim = ini_get('memory_limit');
         $maxtime = ini_get('max_execution_time');
         ini_set('memory_limit', '50M');
         ini_set('max_execution_time', '1000');


         $der = $_SESSION['tabladesc'];
         foreach($der as $value)
         {
            if($value != '')
            {

               $sql = 'Insert into rhdescpuestos_der (idpuesto, iddescripcion, usuario, fecha, hora)
                values(' . $idpuesto . ', "' . $value . '", "' . $_SESSION['login'] . '", curdate(), curtime())';
               $rs = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
            }
         }

         ini_set('memory_limit', $memlim);
         ini_set('max_execution_time', $maxtime);
         dmconexion::Log('Edito los derechos del usuario ' . $idpuesto, 3);
      }
   }

}

global $application;

global $urhdescpuestosderechos;

//Creates the form
$urhdescpuestosderechos = new urhdescpuestosderechos($application);

//Read from resource file
$urhdescpuestosderechos->loadResource(__FILE__);

//Shows the form
$urhdescpuestosderechos->show();

?>