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
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class urevtacaidamotvista extends Page
{
       public $dstabla = null;
       public $sqltabla = null;
       public $grid = null;
       public $pbotones = null;
       public $lbtitulo = null;
       public $btnnuevo = null;
       public $btneliminar = null;
       public $hfidus = null;
       function urevtacaidamotvistaShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
   	   $this->lbtitulo->Caption= $this->Caption;
       $this->sqltabla->close();
       $this->sqltabla->SQL = 'select idmotivo as ID, nombre
                               from revtacaidamot order by idmotivo';
       $this->sqltabla->open();
       }

       function urevtacaidamotvistaCreate($sender, $params)
       {
       if(Derechos('Accesar a Motivos de Vta Caida') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	 alert("Usted no tiene derechos para accesar a Motivos de Venta Caida");
               	 document.location.href("menu.php");
               	 </script>';
         	exit;
         }
       }

       function btneliminarJSClick($sender, $params)
       {
       ?>
       if(!confirm('Desea Eliminar el Motivo Seleccionado?'))
            return(false);
       var model=grid.getTableModel();
       var row=grid.getFocusedRow();
       document.location.href("urevtacaidamot.php?idmotivo="+model.getValue(0, row)+"&elim=1");
       <?php
       }

       function gridJSDblClick($sender, $params)
       {
       ?>
       var model = grid.getTableModel();
       var row = grid.getFocusedRow();
       document.location.href("urevtacaidamot.php?idmotivo="+model.getValue(0, row));
       <?php
       }

       function btnnuevoClick($sender, $params)
       {
       if(Derechos('Alta Motivos de Vta Caida') == false)
         {
		 echo '<script language="javascript" type="text/javascript">
		      alert("No puede Agregar Motivos");
			  </script>';
		 }
	   else
	  	 redirect("urevtacaidamot.php?idmotivo=0");
       }

}

global $application;

global $urevtacaidamotvista;

//Creates the form
$urevtacaidamotvista=new urevtacaidamotvista($application);

//Read from resource file
$urevtacaidamotvista->loadResource(__FILE__);

//Shows the form
$urevtacaidamotvista->show();

?>