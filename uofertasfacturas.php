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
class uofertasfacturas extends Page
{
       public $cboiva = null;
       public $Label21 = null;
       public $hfestatus = null;
       public $lbtitulo = null;
       public $hfidrevision = null;
       public $hfidoferta = null;
       public $tbofertasfacturas = null;
       public $dsofertasfacturas = null;
       public $edbanco = null;
       public $edrecibo = null;
       public $chkotros = null;
       public $chkfondeo = null;
       public $chkcorrida = null;
       public $chkconfiguracion = null;
       public $chkcotizacion = null;
       public $chkcarta = null;
       public $Label20 = null;
       public $Label19 = null;
       public $edotros = null;
       public $dttrans = null;
       public $dtdeposito = null;
       public $Label18 = null;
       public $Label17 = null;
       public $Label16 = null;
       public $Label15 = null;
       public $Label14 = null;
       public $poperacion = null;
       public $edproveedor = null;
       public $edfactura = null;
       public $edtipo = null;
       public $Label13 = null;
       public $Label12 = null;
       public $Label11 = null;
       public $Label10 = null;
       public $paliado = null;
       public $mcondicion = null;
       public $edcotizacion = null;
       public $edvin = null;
       public $Label9 = null;
       public $Label8 = null;
       public $Label6 = null;
       public $punidad = null;
       public $pfacturacion = null;
       public $Label5 = null;
       public $ednumero = null;
       public $Label1 = null;
       public $edtelefono = null;
       public $edestado = null;
       public $edcp = null;
       public $edciudad = null;
       public $edcolonia = null;
       public $edcalle = null;
       public $edrfc = null;
       public $ednombre = null;
       public $pbotones = null;
       public $btnregresar = null;
       public $hfidnota = null;
       public $lbnotas = null;
       public $mnotas = null;
       public $pnotas = null;
       public $Label27 = null;
       public $Label26 = null;
       public $Label25 = null;
       public $Label24 = null;
       public $btnguardar = null;
       public $Label2 = null;
       public $Cliente = null;
       public $IdOferta = null;
       public $Label7 = null;
       public $Label4 = null;
       public $Label3 = null;

       function btnregresarClick($sender, $params)
       {
         redirect('uofertas.php?idoferta='.$this->hfidoferta->Value.'&idrevision='.$this->hfidrevision->Value);
       }

       function btnguardarClick($sender, $params)
       {
         $this->guardar();
         echo '<script language="javascript" type="text/javascript">
         window.open("http://'.GetConfiguraciones('ipserver').':8080/imprimir.jsp?reporte=pedidofactura&tiporeporte=pdf'.
               '&idoferta='.$this->hfidoferta->Value.'&idrevision='.$this->hfidrevision->Value.'", "_blank");
         </script>';

       }

       function guardar()
       {
         //cambiar el estutus de la oferta
         $sql= 'select idfase from ofertasfases where idestatus='.$this->hfestatus->Value;
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $row= mysql_fetch_row($rs);
         $sql= 'update ofertas set idestatus='.$this->hfestatus->Value.', idfase='.
         $row[0].' where idoferta='.$this->hfidoferta->Value.' and idrevision='.$this->hfidrevision->Value;
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);

         //guardar pedidofactura
         $this->tbofertasfacturas->open();
         $this->tbofertasfacturas->insert();
         $this->tbofertasfacturas->fieldset("idoferta", $this->hfidoferta->Value);
         $msg = "Creo el Reporte Pedido/Factura No. ".$this->hfidoferta->value;
         $nivel = 1;
         $this->tbofertasfacturas->fieldset('fechacreacion',Date('Y/m/d'));
         $this->tbofertasfacturas->fieldset('nombrefiscal',$this->ednombre->Text);
         $this->tbofertasfacturas->fieldset('rfc',$this->edrfc->text);
         $this->tbofertasfacturas->fieldset('calle',$this->edcalle->text);
         $this->tbofertasfacturas->fieldset('numero',$this->ednumero->text);
         $this->tbofertasfacturas->fieldset('colonia',$this->edcolonia->text);
         $this->tbofertasfacturas->fieldset('ciudad',$this->edciudad->text);
         $this->tbofertasfacturas->fieldset('estado',$this->edestado->text);
         $this->tbofertasfacturas->fieldset('telefono',$this->edtelefono->Text);
         $this->tbofertasfacturas->fieldset('VIN',$this->edvin->Text);
         $this->tbofertasfacturas->fieldset('nocotizacion',$this->edcotizacion->Text);
         $this->tbofertasfacturas->fieldset('condicion',$this->mcondicion->Text);
         $this->tbofertasfacturas->fieldset('tipoaliado',$this->edtipo->Text);
         $this->tbofertasfacturas->fieldset('facturaaliado',$this->edfactura->Text);
         $this->tbofertasfacturas->fieldset('proveedor',$this->edproveedor->Text);
         $this->tbofertasfacturas->fieldset('fechadeposito',$this->dtdeposito->Text);
         $this->tbofertasfacturas->fieldset('fechatrans',$this->dttrans->Text);
         $this->tbofertasfacturas->fieldset('recibo',$this->edrecibo->Text);
         $this->tbofertasfacturas->fieldset('banco',$this->edbanco->Text);
         $this->tbofertasfacturas->fieldset('piva',$this->cboiva->ItemIndex);
         $this->tbofertasfacturas->fieldset('cartacompromiso',$this->chkcarta->Checked);
         $this->tbofertasfacturas->fieldset('cotizacion',$this->chkcotizacion->Checked);
         $this->tbofertasfacturas->fieldset('configuracion',$this->chkconfiguracion->Checked);
         $this->tbofertasfacturas->fieldset('corridafinan',$this->chkcorrida->Checked);
         $this->tbofertasfacturas->fieldset('cartafondeo',$this->chkfondeo->Checked);
         $this->tbofertasfacturas->fieldset('otros',$this->edotros->Text);
         $this->tbofertasfacturas->fieldset('notas',$this->mnotas->Text);

         $this->tbofertasfacturas->fieldset("usuario", $_SESSION["login"]);
         $this->tbofertasfacturas->fieldset("fecha", date("Y/n/j"));
         $this->tbofertasfacturas->fieldset("hora", date("H:i:s"));

         $this->tbofertasfacturas->post();
         $this->tbofertasfacturas->Active = false;
         dmconexion::Log($msg,$nivel);
       }

       function uofertasfacturasShow($sender, $params)
       {

         $this->pbotones->Width = $_SESSION["width"];
         $this->lbtitulo->Caption= $this->Caption;
         if(isset($_GET['idoferta']))
         {
            $this->Limpiar();
            $this->dttrans->IfFormat="%Y-%m-%d";
            $this->dttrans->Text= date("Y-m-d");
            $this->dtdeposito->IfFormat="%Y-%m-%d";
            $this->dtdeposito->Text= date("Y-m-d");
            $this->hfidoferta->Value= $_GET['idoferta'];
            $this->hfidrevision->Value= $_GET['idrevision'];
            $this->hfestatus->Value= $_GET['idestatus'];
				$sql='Select nombre, porcentaje as id from impuestos';
				$rs= mysql_query($sql) or die('Error de SQL '.$sql);
       		$this->cboiva->Clear();
       		while($row=mysql_fetch_array($rs))
         	{
         		$this->cboiva->AddItem($row["nombre"], null,$row["id"]);
         	}
				$this->cboiva->ItemIndex=10;
			}
       }

       function Limpiar()
       {
         $this->ednombre->Text = "";
         $this->edrfc->text = "";
         $this->edcalle->text = "";
         $this->ednumero->text = "";
         $this->edcolonia->text = "";
         $this->edciudad->text = "";
         $this->edestado->text = "";
         $this->edtelefono->Text = "";
         $this->edvin->Text = "";
         $this->edcotizacion->Text = "";
         $this->edtipo->Text = "";
         $this->edfactura->Text = "";
         $this->edproveedor->Text = "";
         $this->dtdeposito->Text = "";
         $this->dttrans->Text = "";
         $this->edrecibo->Text = "";
         $this->edbanco->Text = "";
         $this->chkcarta->Checked = false;
         $this->chkcotizacion->Checked = false;
         $this->chkconfiguracion->Checked = false;
         $this->chkcorrida->Checked = false;
         $this->chkfondeo->Checked = false;
         $this->edotros->Text = "";
         $this->mcondicion->Clear();
         $this->mnotas->Clear();
       }

}

global $application;

global $uofertasfacturas;

//Creates the form
$uofertasfacturas=new uofertasfacturas($application);

//Read from resource file
$uofertasfacturas->loadResource(__FILE__);

//Shows the form
$uofertasfacturas->show();

?>