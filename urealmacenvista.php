<?php
require_once("vcl/vcl.inc.php");
//Includes
use_unit("db.inc.php");
use_unit("mysql.inc.php");
use_unit("dbgrids.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class urealmacenvista extends Page
{
       public $dstabla = null;
       public $sqltabla = null;
       public $grid = null;
       public $pbotones = null;
       public $lbtitulo = null;
       public $btnnuevo = null;
       public $btneliminar = null;
       function urealmacenvistaShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
   	   $this->lbtitulo->Caption= $this->Caption;
       $this->sqltabla->close();
       $this->sqltabla->SQL = 'select idalmacen as ID, nombre, direccion, numero, colonia, ciudad
                                from realmacen order by idalmacen';
       $this->sqltabla->open();
       }

       function urealmacenvistaCreate($sender, $params)
       {
       if(Derechos('Accesar a Almacenes') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	 alert("Usted no tiene derechos para accesar a Almacenes");
               	 document.location.href("menu.php");
               	 </script>';
         	exit;
         }
       }

       function btneliminarJSClick($sender, $params)
       {
       ?>
       if(!confirm('Desea Eliminar el Almacen Seleccionado'))
            return(false);
       var model=grid.getTableModel();
       var row=grid.getFocusedRow();
       document.location.href("urealmacen.php?idalmacen="+model.getValue(0, row)+"&elim=1");
       <?php
       }

       function gridJSDblClick($sender, $params)
       {
       ?>
       var model = grid.getTableModel();
       var row = grid.getFocusedRow();
       document.location.href("urealmacen.php?idalmacen="+model.getValue(0, row));
       <?php
       }

       function btnnuevoClick($sender, $params)
       {
       if(Derechos('Alta Almacenes') == false)
         {
		 echo '<script language="javascript" type="text/javascript">
		      alert("No puede Agregar Almacenes");
			  </script>';
		 }
	   else
	  	 redirect("urealmacen.php?idalmacen=0");
       }

}

global $application;

global $urealmacenvista;

//Creates the form
$urealmacenvista=new urealmacenvista($application);

//Read from resource file
$urealmacenvista->loadResource(__FILE__);

//Shows the form
$urealmacenvista->show();

?>