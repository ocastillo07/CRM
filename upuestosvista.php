<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
require_once("vcl/vcl.inc.php");
//Includes
use_unit("db.inc.php");
use_unit("mysql.inc.php");
use_unit("dbgrids.inc.php");
use_unit("buttons.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class upuestosvista extends Page
{
       public $btndescpuestos = null;
       public $btnbuscar = null;
       public $cbofiltro = null;
       public $edbuscar = null;
       public $Label1 = null;
       public $dgpuestos = null;
       public $dspuestos = null;
       public $sqlpuestos = null;
       public $lbtitulo = null;
       public $pbotones = null;
       public $btnnuevo = null;
       public $btnderechos = null;
       public $btneliminar = null;
       public $hfidus = null;
       function btndescpuestosJSClick($sender, $params)
       {
       ?>
          var model=dgpuestos.getTableModel();
       	  var row=dgpuestos.getFocusedRow();
       	  document.location.href("urhdescpuestosderechos.php?idpuesto="+model.getValue(0, row));
       <?php
       }

       function btnbuscarClick($sender, $params)
       {
       	$this->filtro();
			if($this->cbofiltro->ItemIndex==0)
				$this->edbuscar->Text='';
       }

       function filtro()
		 {
       	$sql = 'select idpuesto,p.nombre as Puesto,
					 a.nombre as Area from puestos p left join areas a on a.idarea=p.idarea';

		 	$cond='';
         switch($this->cbofiltro->ItemIndex)
         {
         case 1:  //puesto
                  $cond = ' where p.nombre like"%'.$this->edbuscar->Text.'%"';
						break;
         case 2:  //area
                  $cond = ' where a.nombre like"%'.$this->edbuscar->Text.'%" ';
                  break;
         }
			$this->sqlpuestos->close();
			$this->sqlpuestos->SQL= $sql.$cond.' order by area,puesto';
         $this->sqlpuestos->open();
			//$this->sqlpuestos->Active=true;
		 }

		 function upuestosvistaJSLoad($sender, $params)
       {

       ?>
       //Add your javascript code here
         dgpuestos.getTableColumnModel().setColumnWidth(0,80);  //col,width
			dgpuestos.getTableColumnModel().setColumnWidth(1,350);
			dgpuestos.getTableColumnModel().setColumnWidth(2,100);
         dgpuestos.setWidth(document.body.offsetWidth - 40);
         dgpuestos.setHeight(document.body.offsetHeight - 150); //150
       <?php

       }

       function upuestosvistaCreate($sender, $params)
       {
       	if(Derechos('Accesar Puestos') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	   alert("Usted no tiene derechos para accesar a Puestos");
               	document.location.href("menu.php");
               	</script>';
         	exit;
         }
       }

       function btneliminarJSClick($sender, $params)
       {

       ?>
       //Add your javascript code here
       	if(!confirm('Desea Eliminar el Puesto Seleccionado?'))
            return(false);
       	var model=dgpuestos.getTableModel();
       	var row=dgpuestos.getFocusedRow();
       	document.location.href("upuestos.php?idpuesto="+model.getValue(0, row)+"&elim=1");
       <?php
       }

       function btnderechosJSClick($sender, $params)
       {
       ?>
       //Add your javascript code here
       	var model=dgpuestos.getTableModel();
       	var row=dgpuestos.getFocusedRow();
       	document.location.href("umanuales_derechos.php?idpto="+model.getValue(0, row));
       <?php
       }

       function btnnuevoClick($sender, $params)
       {
       	if(Derechos('Alta Puestos') == false)
         {
				echo '<script language="javascript" type="text/javascript">
					alert("No puede Agregar Puestos");
				</script>';
			}
			else
				redirect("upuestos.php?idpuesto=0");
       }

       function dgpuestosJSDblClick($sender, $params)
       {
       	$this->hfidus->Value = $this->sqlpuestos->fieldget("idpuesto");
       ?>
       //Add your javascript code here
       	var model = dgpuestos.getTableModel();
       	var row=dgpuestos.getFocusedRow();
       	document.location.href("upuestos.php?idpuesto="+model.getValue(0, row));
       <?php
       }

       function upuestosvistaShow($sender, $params)
       {
	    	$this->pbotones->Width = $_SESSION["width"];
   	   $this->lbtitulo->Caption= $this->Caption;
			$this->filtro();
       }
}

global $application;

global $upuestosvista;

//Creates the form
$upuestosvista=new upuestosvista($application);

//Read from resource file
$upuestosvista->loadResource(__FILE__);

//Shows the form
$upuestosvista->show();

?>