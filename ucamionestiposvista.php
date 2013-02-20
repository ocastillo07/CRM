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
class ucamionestiposvista extends Page
{
       public $dstabla = null;
       public $sqltabla = null;
       public $grid = null;
       public $pbotones = null;
       public $lbtitulo = null;
       public $btnnuevo = null;
       public $btneliminar = null;
       public $hfidus = null;
       function ucamionestiposvistaJSLoad($sender, $params)
       {

       ?>
       //Add your javascript code here
       grid.setWidth(document.body.offsetWidth - 40);
       grid.setHeight(document.body.offsetHeight - 150);
       <?php

       }

       function ucamionestiposvistaShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
   	   $this->lbtitulo->Caption= $this->Caption;
       $this->sqltabla->close();
       $this->sqltabla->SQL = 'select idtipo as ID, nombre, margenutilidad from camionestipos order by idtipo';
       $this->sqltabla->open();
       }

       function uareasvistaCreate($sender, $params)
       {
       if(Derechos('Accesar Tipo de Camion') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	 alert("Usted no tiene derechos para accesar a Tipos de Camion");
               	 document.location.href("menu.php");
               	 </script>';
         	exit;
         }
       }

       function btnnuevoClick($sender, $params)
       {
       if(Derechos('Alta Tipo de Camion') == false)
         {
		 echo '<script language="javascript" type="text/javascript">
		      alert("No puede Agregar Tipos de Camiones");
			  </script>';
		 }
	   else
	  	 redirect("ucamionestipos.php?idtipo=0");
       }

       function btneliminarJSClick($sender, $params)
       {
       ?>
       if(!confirm('Desea Eliminar el Tipo de Camion Seleccionado?'))
            return(false);
       var model=grid.getTableModel();
       var row=grid.getFocusedRow();
       document.location.href("ucamionestipos.php?idtipo="+model.getValue(0, row)+"&elim=1");
       <?php
       }


       function gridJSDblClick($sender, $params)
       {
       ?>
       var model = grid.getTableModel();
       var row = grid.getFocusedRow();
       document.location.href("ucamionestipos.php?idtipo="+model.getValue(0, row));
       <?php
       }

}

global $application;

global $ucamionestiposvista;

//Creates the form
$ucamionestiposvista=new ucamionestiposvista($application);

//Read from resource file
$ucamionestiposvista->loadResource(__FILE__);

//Shows the form
$ucamionestiposvista->show();

?>