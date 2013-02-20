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

use_unit("menus.inc.php");
use_unit("webservices.inc.php");
use_unit("comctrls.inc.php");
use_unit("mysql.inc.php");
use_unit("dbgrids.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class uofertasmotivos extends Page
{
       public $hfidestatus = null;
       public $lbtitulo2 = null;
       public $dsofertasrechazo = null;
       public $tbofertasrechazo = null;
       public $lbtitulo = null;
       public $cbomotivo = null;
       public $edoferta = null;
       public $Label3 = null;
       public $hfidrevision = null;
       public $Label1 = null;
       public $pbotones = null;
       public $btnregresar = null;
       public $lbnotas = null;
       public $mnotas = null;
       public $pnotas = null;
       public $btnguardar = null;

       function btnimprimirClick($sender, $params)
       {
         header("Location: http://localhost:8080/imprimirpdf.jsp?tiporeporte=rtf");
          // header("Location: http://localhost:8080/parametro.jsp?myParam=oscar&Age=26");
       }


       function btnguardarcerrarClick($sender, $params)
       {
         $this->guardar();
         redirect('uofertasvista.php');
       }

       function btnregresarClick($sender, $params)
       {
         redirect('uofertas.php?idoferta='.$this->edoferta->Text.
         '&idrevision='.$this->hfidrevision->Value);
       }

       function btnguardarClick($sender, $params)
       {
         $this->guardar();
       }

       function guardar()
       {
         //cambiar el estutus de la oferta
         $sql= 'select idfase from ofertasfases where idestatus='.$this->hfidestatus->Value;
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $row= mysql_fetch_row($rs);
         $sql= 'update ofertas set idestatus='.$this->hfidestatus->Value.', idfase='.
         $row[0].' where idoferta='.$this->edoferta->Text.' and idrevision='.$this->hfidrevision->Value;
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         //guardar
			if($this->btnguardar->tag=='1')        
			{
         	$this->tbofertasrechazo->open();
         	$this->tbofertasrechazo->insert();
         	$this->tbofertasrechazo->fieldset("idoferta", $this->edoferta->text);
				$nivel = 1;
				$ban=true;
			}
			else
			{
				$this->tbofertasrechazo->close();
            $this->tbofertasrechazo->writeFilter('idoferta=' . $this->edoferta->Text);
            $this->tbofertasrechazo->refresh();
            $this->tbofertasrechazo->open();
            $this->tbofertasrechazo->Edit();
            $nivel = 2;
            $ban = true;
			}
         
			if($this->lbtitulo->Tag == 1)
         {
            $msg = "Oferta No. ".$this->edoferta->text.' Perdida por motivo '.
                  $this->cbomotivo->Items[$this->cbomotivo->ItemIndex];
         }
         else
         {
            $msg = "Oferta No. ".$this->edoferta->text.' Cancelado por motivo '.
                  $this->cbomotivo->Items[$this->cbomotivo->ItemIndex];
         }
         
			if($ban)
			{
         	$this->tbofertasrechazo->fieldset('idmotivo',$this->cbomotivo->ItemIndex);
         	$this->tbofertasrechazo->fieldset('comentario',$this->mnotas->Text);
         	$this->tbofertasrechazo->fieldset("usuario", $_SESSION["login"]);
         	$this->tbofertasrechazo->fieldset("fecha", date("Y/n/j"));
         	$this->tbofertasrechazo->fieldset("hora", date("H:i:s"));
	         $this->tbofertasrechazo->post();
   	      $this->tbofertasrechazo->Active = false;   
				$this->btnguardar->Tag=2;
      	   dmconexion::Log($msg,$nivel);
			}
       }

       function uofertasmotivosShow($sender, $params)
       {
         $this->pbotones->Width = $_SESSION["width"];
         $this->lbtitulo2->Caption= $this->Caption;
         if(isset($_GET['idoferta']))
         {
            $this->Limpiar();
            $this->edoferta->text= $_GET['idoferta'];
            $this->hfidrevision->Value= $_GET['idrevision'];    
				$this->btnguardar->tag=1;
            if(isset($_GET['tipo']))
            {  //perdido
               $this->hfidestatus->Value= $_GET['tipo'];
               if($_GET['tipo']=='92')
               {
                  $sql = 'select idclasificacion,nombre from clasificaciones where idtipo=8';
                  $this->lbtitulo->Caption = "Motivo de Perdida";
                  $this->lbtitulo->Tag = 1;
               } //cancelado
               if($_GET['tipo']=='93')
               {
                  $sql = 'select idclasificacion,nombre from clasificaciones where idtipo=17';
                  $this->lbtitulo->Caption = "Motivo de Cancelacion";
                  $this->lbtitulo->Tag = 2;
               }
               $rs = mysql_query($sql) or die('Error de consulta SQL: '.$sql);
               while($row = mysql_fetch_array($rs))
                  $this->cbomotivo->AddItem($row['nombre'],null,$row['idclasificacion']);
            }
         }
       }

       function Limpiar()
       {
         $this->edoferta->Text = "";
         $this->cbomotivo->Clear();
         $this->mnotas->Clear();
       }

}

global $application;

global $uofertasmotivos;

//Creates the form
$uofertasmotivos=new uofertasmotivos($application);

//Read from resource file
$uofertasmotivos->loadResource(__FILE__);

//Shows the form
$uofertasmotivos->show();

?>