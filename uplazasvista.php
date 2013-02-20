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
class uplazasvista extends Page
{
       public $dstabla = null;
       public $sqltabla = null;
       public $grid = null;
       public $pbotones = null;
       public $lbtitulo = null;
       public $btnnuevo = null;
       public $btneliminar = null;
       public $hfidus = null;

       function btnnuevoClick($sender, $params)
       {
       if(Derechos('Alta Plazas') == false)
         {
		 echo '<script language="javascript" type="text/javascript">
		      alert("No puede Agregar Plazas");
			  </script>';
		 }
	   else
	  	 redirect("uplazas.php?idplaza=0");

       }

       function gridJSDblClick($sender, $params)
       {
       ?>
       var model = grid.getTableModel();
       var row = grid.getFocusedRow();
       document.location.href("uplazas.php?idplaza="+model.getValue(0, row));
       <?php
       }

       function btneliminarJSClick($sender, $params)
       {
       ?>
       if(!confirm('Desea Eliminar la Plaza Seleccionada?'))
            return(false);
       var model=grid.getTableModel();
       var row=grid.getFocusedRow();
       document.location.href("uplazas.php?idplaza="+model.getValue(0, row)+"&elim=1");
       <?php
       }

       function uplazasvistaCreate($sender, $params)
       {
       if(Derechos('Accesar a Plazas') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	 alert("Usted no tiene derechos para accesar a Plazas");
               	 document.location.href("menu.php");
               	 </script>';
         	exit;
         }
       }

       function uplazasvistaShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
   	   $this->lbtitulo->Caption= $this->Caption;
       $this->sqltabla->close();
       $this->sqltabla->SQL = 'select idplaza as ID, iniciales, nombre, rsocial, ciudad
                                from plazas order by idplaza';
       $this->sqltabla->open();
       }

}

global $application;

global $uplazasvista;

//Creates the form
$uplazasvista=new uplazasvista($application);

//Read from resource file
$uplazasvista->loadResource(__FILE__);

//Shows the form
$uplazasvista->show();

?>