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
class upresupuestosperdido extends Page
{
   public $hfestatus = null;
   public $cbmotivo = null;
   public $Label4 = null;
   public $mmotivo = null;
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
   function btnguardarcerrarClick($sender, $params)
   {
      if($this->cbmotivo->ItemIndex != - 1 && $this->mmotivo->Text != '')
      {
			$this->guardar();
			redirect('upresupuestos.php?idpresupuesto='.$this->edidpresupuesto->text.
			'&idrevision='.$this->edrevision->Text);
      }
   }

   function btnguardarClick($sender, $params)
   {
      if($this->cbmotivo->ItemIndex != - 1 && $this->mmotivo->Text != '')
      {
			$this->guardar();
      }
   }

   function guardar()
   {
      if($this->hfestatus->Value == '1')
      {
         $sql = 'insert into represupuestoscancelados(idpresupuesto,idrevision,idmotivo,descripcion) values
					 (' . $this->edidpresupuesto->Text . ',' . $this->edrevision->Text . ',' . $this->cbmotivo->ItemIndex . 
         ',"' . $this->mmotivo->Text . '")';
         $rs = mysql_query($sql)or die('Error de consulta SQL ' . $sql);
      }
      else 
      {
         $sql = 'update represupuestoscancelados set idmotivo=' . $this->cbmotivo->ItemIndex . 
         ' ,descripcion="' . $this->mmotivo->Text . '"';
         $rs = mysql_query($sql)or die("Error de consulta SQL " . $sql);
      }
      //actualizar el presupuesto a estatus perdido
      $sql = 'update represupuestos set idestatus=116 where idpresupuesto=' . $this->edidpresupuesto->Text . 
      ' and idrevision=' . $this->edrevision->text;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $this->hfestatus->Value = 2;
   }

   function btnregresarClick($sender, $params)
   {
      redirect('upresupuestos.php?idpresupuesto=' . $this->edidpresupuesto->text . '&idrevision=' . 
      $this->edrevision->Text);
   }

   function upresupuestosperdidoShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"] - 160;
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET['idpresupuesto']) && isset($_GET['idrevision']))
      {
         $this->edidpresupuesto->text = $_GET['idpresupuesto'];
         $this->edrevision->text = $_GET['idrevision'];
         $this->cbmotivo->Clear();
      	$this->mmotivo->Clear();
			$sql = 'select idclasificacion, nombre from clasificaciones where idtipo=20 order by orden';
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         while($row = mysql_fetch_array($rs))
            $this->cbmotivo->AddItem($row['nombre'], null , $row['idclasificacion']);
         $this->hfestatus->Value = 1;
      }
   }

}

global $application;

global $upresupuestosperdido;

//Creates the form
$upresupuestosperdido = new upresupuestosperdido($application);

//Read from resource file
$upresupuestosperdido->loadResource(__FILE__);

//Shows the form
$upresupuestosperdido->show();

?>