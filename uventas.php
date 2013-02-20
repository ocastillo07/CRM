<?php
require_once("vcl/vcl.inc.php");
//Includes
include("dmconexion.php");
include("urecursos.php");

session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
use_unit("mysql.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class uventas extends Page
{
       public $lbdetalle = null;
       public $hfestatus = null;
       public $tbventas = null;
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
       function uventasJSLoad($sender, $params)
       {

       ?>
       //Add your javascript code here
       basicAjax('upresupuestos_ajax.php','calcular=1'+
                '&idpresupuesto=' + vcl.$('edidpresupuesto').value +
                '&idrevision=' + vcl.$('edrevision').value +
                '&piva=' + vcl.$('cbiva').value +
                '&ban=0');
       <?php

       }

       function btnguardarcerrarClick($sender, $params)
       {
       	$factura= $this->edfactura->text;
			$ob= $this->mobservacion->Text;
			if(empty($factura))
			{
				echo '<script language="javascript" type="text/javascript">
            alert(\'Falta capturar la Factura \');
          	</script>';
			}
			else if(empty($ob))
			{
				echo '<script language="javascript" type="text/javascript">
            alert(\'Falta capturar la descripcion \');
          	</script>';
			}
			else
				$this->guardar();

         redirect('upresupuestos.php?idpresupuesto='.$this->edidpresupuesto->text.'&idrevision='.
						$this->edrevision->Text);
       }

       function btnguardarClick($sender, $params)
       {
       	$factura= $this->edfactura->text;
			$ob= $this->mobservacion->Text;
			if(empty($factura))
			{
				echo '<script language="javascript" type="text/javascript">
            alert(\'Falta capturar la Factura \');
          	</script>';
			}
			else if(empty($ob))
			{
				echo '<script language="javascript" type="text/javascript">
            alert(\'Falta capturar la descripcion \');
          	</script>';
			}
			else
				$this->guardar();
       }

		 function guardar()
		 {
		 	if($this->hfestatus->Value=='1')
         {
            $this->tbventas->open();
            $this->tbventas->insert();
				$this->edidventa->Text= MaxId('reventas','idventa')+1;
            $this->tbventas->fieldset("idventa", $this->edidventa->Text);
            $msg = "Creo la Venta No. ".$this->edidventa->Text;
            $nivel = 1;
         }
         else
         {
            $this->tbventas->close();
            $this->tbventas->writeFilter('idventa="'.$this->edidventa->Text.'"');
            $this->tbventas->refresh();
            $this->tbventas->open();
            $this->tbventas->Edit();
            $msg = "Edito la Venta No. ".$this->edidventa->Text;
            $nivel = 2;
         }
			$this->tbventas->fieldset('idpresupuesto',$this->edidpresupuesto->Text);
			$this->tbventas->fieldset('idrevision',$this->edrevision->Text);
			$this->tbventas->fieldset('factura',$this->edfactura->Text);
			$this->tbventas->fieldset('idalmacen',$this->edalmacen->Text);
			$this->tbventas->fieldset('idpromotor',$this->hfidpromotor->Value);
			$this->tbventas->fieldset('idcliente',$this->hfidcliente->Value);
			$this->tbventas->fieldset('fechafactura',$this->edfechafactura->Text);
			$this->tbventas->fieldset('piva',$this->cbiva->ItemIndex);
			//$this->tbventas->fieldset('idmoneda',$this->cbmoneda->ItemIndex);
			//$this->tbventas->fieldset('tc',$this->edtc->Text);
			//$this->tbventas->fieldset('costo',$this->edidpresupuesto->Text);
			$this->tbventas->fieldset('subtotal',$this->edsubtotal->Text);
			$this->tbventas->fieldset('iva',$this->ediva->Text);
			$this->tbventas->fieldset('total',$this->edtotal->Text);
			$this->tbventas->fieldset('totalmn',$this->edtotal->Text);
			$this->tbventas->fieldset('observaciones',$this->mobservacion->Text);
			$this->tbventas->fieldset('usuario',$_SESSION['login']);
			$this->tbventas->fieldset('fecha',Fecha());
			$this->tbventas->fieldset('hora',Hora());
			$this->tbventas->post();
         $this->hfestatus->Value=2;
         $this->tbventas->Active = false;
         dmconexion::Log($msg,$nivel);
			//actualizar el presupuesto a estatus ganado
			$sql= 'update represupuestos set idestatus=115 where idpresupuesto='.$this->edidpresupuesto->Text.
					' and idrevision='.$this->edrevision->text;
			$rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
		 }


       function btnregresarClick($sender, $params)
       {
       	redirect('upresupuestos.php?idpresupuesto='.$this->edidpresupuesto->text.'&idrevision='.
						$this->edrevision->Text);
       }

       function uventasShow($sender, $params)
       {
       	$this->pbotones->Width = $_SESSION["width"]-160;
         $this->lbtitulo->Caption= $this->Caption;
			if(isset($_GET['idpresupuesto']) && isset($_GET['idrevision']))
			{
				$this->limpiar();
				$this->edidventa->Text= MaxId('reventas','idventa')+1;
				$this->edidpresupuesto->text= $_GET['idpresupuesto'];
				$this->edrevision->text= $_GET['idrevision'];
				$this->edalmacen->Text= $_GET['idalmacen'];
				$this->hfidpromotor->Value= $_GET['idpromotor'];
				$this->edpromotor->text= $_GET['promotor'];
				$this->hfidcliente->Value= $_GET['idcliente'];
				$this->edcliente->text= $_GET['cliente'];
				$sql= 'select porcentaje from impuestos where estatus=1';
				$rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
				while($row= mysql_fetch_array($rs))
					$this->cbiva->AddItem($row['porcentaje'],null,$row['porcentaje']);
				$this->cbiva->ItemIndex= $_GET['piva'];
				$this->edsubtotal->Text= $_GET['subtotal'];
				$this->ediva->Text= $_GET['iva'];
				$this->edtotal->Text= $_GET['total'];
				$this->edfechafactura->Text= date('Y-m-d');
				$this->hfestatus->Value='1';
			}
       }

		 function limpiar()
		 {
		 	reset($this->controls->items);
         while(list($key, $val)=each($this->controls->items))
         {
            if ($val->inheritsFrom("Edit"))
            {
               $val->Text="";
               $val->tag='';
            }
         }

			$this->mobservacion->Clear();
		 }

}

global $application;

global $uventas;

//Creates the form
$uventas=new uventas($application);

//Read from resource file
$uventas->loadResource(__FILE__);

//Shows the form
$uventas->show();

?>