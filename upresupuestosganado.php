<?php
require_once("vcl/vcl.inc.php");
//Includes
include("dmconexion.php");
include("urecursos.php");

session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class upresupuestosganado extends Page
{
       public $Label13 = null;
       public $mobservacion = null;
       public $edtotal = null;
       public $ediva = null;
       public $edsubtotal = null;
       public $cbiva = null;
       public $Label12 = null;
       public $Label11 = null;
       public $Label10 = null;
       public $Label9 = null;
       public $edcliente = null;
       public $hfidcliente = null;
       public $Label8 = null;
       public $hfidpromotor = null;
       public $edpromotor = null;
       public $Label7 = null;
       public $edfechafactura = null;
       public $Label6 = null;
       public $edidventa = null;
       public $Label5 = null;
       public $edalmacen = null;
       public $Label4 = null;
       public $edfactura = null;
       public $Label3 = null;
       public $edrevision = null;
       public $Label2 = null;
       public $pbotones = null;
       public $lbtitulo = null;
       public $btnguardarcerrar = null;
       public $btnguardar = null;
       public $btnregresar = null;
       public $edidpresupuesto = null;
       public $Label1 = null;


       function btnregresarClick($sender, $params)
       {
       	redirect('upresupuestos.php?idpresupuesto='.$this->edidpresupuesto->text.'&idrevision='.
						$this->edrevision->Text);
       }

       function upresupuestosganadoShow($sender, $params)
       {
       	$this->pbotones->Width = $_SESSION["width"]-160;
         $this->lbtitulo->Caption= $this->Caption;  
			if(isset($_GET['idpresupuesto']) && isset($_GET['idrevision']))
			{
				$this->edidventa->Text= MaxId('reventas','idventa')+1;
				$this->edidpresupuesto->text= $_GET['idpresupuesto'];
				$this->edrevision->text= $_GET['idrevision']; 
				$this->edalmacen->Text= $_GET['idalmacen']; 							
				$this->hfidpromotor->Value= $_GET['idpromotor'];
				$this->edpromotor->text= $_GET['promotor']; 
				$this->hfidcliente->Value= $_GET['idcliente'];
				$this->edcliente->text= $_GET['cliente']; 
				$sql= 'select porcentaje from impuestos';
				$rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
				while($row= mysql_fetch_array($rs))
					$this->cbiva->AddItem($row['porcentaje'],null,$row['porcentaje']);
				$this->cbiva->ItemIndex= $_GET['piva'];
				$this->edsubtotal->Text= $_GET['subtotal'];
				$this->ediva->Text= $_GET['iva'];
				$this->edtotal->Text= $_GET['total'];    
				$this->edfechafactura->Text= date('Y/M/d');
			}
       }

}

global $application;

global $upresupuestosganado;

//Creates the form
$upresupuestosganado=new upresupuestosganado($application);

//Read from resource file
$upresupuestosganado->loadResource(__FILE__);

//Shows the form
$upresupuestosganado->show();

?>