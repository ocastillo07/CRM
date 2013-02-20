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
class ureunidmedvista extends Page
{
       public $dstabla = null;
       public $sqltabla = null;
       public $grid = null;
       public $pbotones = null;
       public $lbtitulo = null;
       public $btnnuevo = null;
       public $btneliminar = null;
       public $hfidus = null;
       function ureunidmedvistaShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
   	   $this->lbtitulo->Caption= $this->Caption;
       $this->sqltabla->close();
       $this->sqltabla->SQL = 'select idunidad as ID, nombre from plazas order by idunidad';
       $this->sqltabla->open();
       }

       function ureunidmedvistaCreate($sender, $params)
       {
       if(Derechos('Accesar a Unidades de Medida') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	 alert("Usted no tiene derechos para accesar a Unidades de Medida");
               	 document.location.href("menu.php");
               	 </script>';
         	exit;
         }
       }

       function btneliminarJSClick($sender, $params)
       {
       ?>
       if(!confirm('Desea Eliminar la Plaza Seleccionada?'))
            return(false);
       var model=grid.getTableModel();
       var row=grid.getFocusedRow();
       document.location.href("ureunidmed.php?idunidad="+model.getValue(0, row)+"&elim=1");
       <?php
       }

       function gridJSDblClick($sender, $params)
       {
       ?>
       var model = grid.getTableModel();
       var row = grid.getFocusedRow();
       document.location.href("ureunidmed.php?idunidad="+model.getValue(0, row));
       <?php
       }

       function btnnuevoClick($sender, $params)
       {
       if(Derechos('Alta Unidades de Medida') == false)
         {
		 echo '<script language="javascript" type="text/javascript">
		      alert("No puede Agregar Unidades de Medida");
			  </script>';
		 }
	   else
	  	 redirect("ureunidmed.php?idunidad=0");
       }

}

global $application;

global $ureunidmedvista;

//Creates the form
$ureunidmedvista=new ureunidadmedidavista($application);

//Read from resource file
$ureunidmedvista->loadResource(__FILE__);

//Shows the form
$ureunidmedvista->show();

?>