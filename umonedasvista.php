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
class umonedasvista extends Page
{
       public $dstabla = null;
       public $sqltabla = null;
       public $grid = null;
       public $pbotones = null;
       public $lbtitulo = null;
       public $btnnuevo = null;
       public $btneliminar = null;
       public $hfidus = null;
       function gridJSDblClick($sender, $params)
       {
       ?>
       var model = grid.getTableModel();
       var row = grid.getFocusedRow();
       document.location.href("umonedas.php?idmoneda="+model.getValue(0, row));
       <?php
       }

       function btneliminarJSClick($sender, $params)
       {
       ?>
       if(!confirm('Desea Eliminar la Moneda Seleccionada?'))
            return(false);
       var model=grid.getTableModel();
       var row=grid.getFocusedRow();
       document.location.href("umonedas.php?idmoneda="+model.getValue(0, row)+"&elim=1");
       <?php
       }

       function umonedasvistaJSLoad($sender, $params)
       {
       ?>
       grid.getTableColumnModel().setColumnWidth(0,80);  //col,width
	   grid.getTableColumnModel().setColumnWidth(1,100);
       grid.getTableColumnModel().setColumnWidth(2,150);
       <?php
       }

       function btnnuevoClick($sender, $params)
       {
       if(Derechos('Alta Monedas') == false)
         {
		 echo '<script language="javascript" type="text/javascript">
		      alert("No puede Agregar Monedas");
			  </script>';
		 }
	   else
	  	 redirect("umonedas.php?idmoneda=0");
       }

       function umonedasvistaShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
   	   $this->lbtitulo->Caption= $this->Caption;
       $this->sqltabla->close();
       $this->sqltabla->SQL = 'select idmoneda as ID, iniciales, moneda, tcc as TCcompra, tc as TCVenta from monedas order by idmoneda';
       $this->sqltabla->open();
       }

       function umonedasvistaCreate($sender, $params)
       {
       if(Derechos('Accesar Monedas') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	 alert("Usted no tiene derechos para accesar a Monedas");
               	 document.location.href("menu.php");
               	 </script>';
         	exit;
         }
       }

}

global $application;

global $umonedasvista;

//Creates the form
$umonedasvista=new umonedasvista($application);

//Read from resource file
$umonedasvista->loadResource(__FILE__);

//Shows the form
$umonedasvista->show();

?>