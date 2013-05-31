<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   {
   redirect("login.php");
   }
require_once("vcl/vcl.inc.php");
//Includes
use_unit("db.inc.php");
use_unit("mysql.inc.php");
use_unit("comctrls.inc.php");
use_unit("buttons.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class unotificaciones extends Page
{
       public $mmantos = null;
       public $Label4 = null;
       public $Label3 = null;
       public $mRH = null;
       public $Label2 = null;
       public $Label1 = null;
       public $midealease = null;
       public $Label24 = null;
       public $Label23 = null;
       public $msolicitudes = null;
       public $Label22 = null;
       public $Label21 = null;
       public $mrefacciones03 = null;
       public $mrefacciones02 = null;
       public $mrefacciones01 = null;
       public $Label20 = null;
       public $Label19 = null;
       public $Label18 = null;
       public $Label17 = null;
       public $mofertas = null;
       public $Label16 = null;
       public $Label15 = null;
       public $macciones = null;
       public $Label14 = null;
       public $Label13 = null;
       public $Label11 = null;
       public $Label10 = null;
       public $lbtitulo = null;
       public $pbotones = null;
       public $btnguardarcerrar = null;
       public $btnguardar = null;
       public $btnregresar = null;


       function unotificacionesCreate($sender, $params)
       {
         if(Derechos('Accesar Notificaciones') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert("Usted no tiene derechos para accesar a Notificaciones");
                  document.location.href("menu.php");
                  </script>';
            exit;
         }
       }

       function btnregresarClick($sender, $params)
       {
         redirect('menu.php');
       }

       function btnguardarcerrarClick($sender, $params)
       {
         $this->guardar();
         redirect('menu.php');
       }

       function btnguardarClick($sender, $params)
       {
         $this->guardar();
       }

       function guardar()
       {

         $sql= 'update configuraciones set valor="'.$this->mofertas->Text.'" where concepto="mailavisos"';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);

			$sql= 'update configuraciones set valor="'.$this->macciones->Text.'" where concepto="mailacciones"';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);

         $sql= 'update configuraciones set valor="'.$this->msolicitudes->Text.'" where concepto="mailsolinformatica"';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);

         $sql= 'update configuraciones set valor="'.$this->mmantos->Text.'" where concepto="mailsolmantovehiculo"';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);

         //almacen 01
         $sql= 'update configuraciones set valor="'.$this->mrefacciones01->Text.'" where concepto="mailrefaccionesAL01"';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         //almacen 02
         $sql= 'update configuraciones set valor="'.$this->mrefacciones02->Text.'" where concepto="mailrefaccionesAL02"';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         //almacen 03
         $sql= 'update configuraciones set valor="'.$this->mrefacciones03->Text.'" where concepto="mailrefaccionesAL03"';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);

         //idealease
         $sql= 'update configuraciones set valor="'.$this->midealease->Text.'" where concepto="mailidealease"';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);

         //idealease
         $sql= 'update configuraciones set valor="'.$this->mRH->Text.'" where concepto="mailrh"';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);

			dmconexion::Log('Modifico configuraciones',1);
       }

       function unotificacionesShow($sender, $params)
       {
         $this->pbotones->Width = $_SESSION["width"];
         $this->lbtitulo->Caption= $this->Caption;


			//correos ofertas
         $sql='select valor from configuraciones where concepto ="mailavisos"';
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $row= mysql_fetch_row($rs);
         $this->mofertas->Text= $row[0];

			//correos acciones
			$sql='select valor from configuraciones where concepto ="mailacciones"';
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $row= mysql_fetch_row($rs);
         $this->macciones->Text= $row[0];

         //correos solicitudes
			$sql='select valor from configuraciones where concepto ="mailsolinformatica"';
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $row= mysql_fetch_row($rs);
         $this->msolicitudes->Text= $row[0];

         //correos solicitudes mantos vehiculos
			$sql='select valor from configuraciones where concepto ="mailsolmantovehiculo"';
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $row= mysql_fetch_row($rs);
         $this->mmantos->Text= $row[0];

			//correos refacciones almacen 01
			$sql='select valor from configuraciones where concepto ="mailrefaccionesAL01"';
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $row= mysql_fetch_row($rs);
         $this->mrefacciones01->Text= $row[0];

         //correos refacciones almacen 02
			$sql='select valor from configuraciones where concepto ="mailrefaccionesAL02"';
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $row= mysql_fetch_row($rs);
         $this->mrefacciones02->Text= $row[0];

         //correos refacciones almacen 03
			$sql='select valor from configuraciones where concepto ="mailrefaccionesAL03"';
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $row= mysql_fetch_row($rs);
         $this->mrefacciones03->Text= $row[0];

         //correos refacciones idealease
			$sql='select valor from configuraciones where concepto ="mailidealease"';
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $row= mysql_fetch_row($rs);
         $this->midealease->Text= $row[0];

         //correos refacciones RH
			$sql='select valor from configuraciones where concepto ="mailrh"';
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $row= mysql_fetch_row($rs);
         $this->mRH->Text= $row[0];
       }
}

global $application;

global $unotificaciones;

//Creates the form
$unotificaciones=new unotificaciones($application);

//Read from resource file
$unotificaciones->loadResource(__FILE__);

//Shows the form
$unotificaciones->show();

?>