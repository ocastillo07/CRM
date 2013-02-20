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
class utipocarteravista extends Page
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
       document.location.href("utipocartera.php?idtipo="+model.getValue(0, row));
       <?php
       }

       function btneliminarJSClick($sender, $params)
       {
       ?>
       if(!confirm('Desea Eliminar el Tipo de Camion Seleccionado?'))
            return(false);
       var model=grid.getTableModel();
       var row=grid.getFocusedRow();
       document.location.href("utipocartera.php?idtipo="+model.getValue(0, row)+"&elim=1");
       <?php
       }

       function btnnuevoClick($sender, $params)
       {
      if(Derechos('Alta Tipo de Cartera') == false)
         {
		 echo '<script language="javascript" type="text/javascript">
		      alert("No puede Agregar Tipos de Carteras");
			  </script>';
		 }
	   else
	  	 redirect("utipocartera.php?idtipo=0");
       }

       function utipocarteravistaCreate($sender, $params)
       {
       if(Derechos('Accesar Tipo de Cartera') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	 alert("Usted no tiene derechos para accesar a Tipos de Cartera");
               	 document.location.href("menu.php");
               	 </script>';
         	exit;
         }
       }

       function utipocarteravistaShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
   	   $this->lbtitulo->Caption= $this->Caption;
       $this->sqltabla->close();
       $this->sqltabla->SQL = 'select idtipo as ID, nombre, m.moneda, diascredito
                               from tipocartera tc left join monedas m
                               on m.idmoneda=tc.idmoneda order by idtipo';
       $this->sqltabla->open();
       }

}

global $application;

global $utipocarteravista;

//Creates the form
$utipocarteravista=new utipocarteravista($application);

//Read from resource file
$utipocarteravista->loadResource(__FILE__);

//Shows the form
$utipocarteravista->show();

?>