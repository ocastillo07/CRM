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
class uareasvista extends Page
{
       public $grid = null;
       public $dstabla = null;
       public $sqltabla = null;
       public $btnbuscar = null;
       public $edbuscar = null;
       public $Label1 = null;
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
       	document.location.href("uareas.php?idarea="+model.getValue(0, row));
       <?php
       }

       function btneliminarJSClick($sender, $params)
       {
       ?>
       if(!confirm('Desea Eliminar el Area Seleccionado?'))
            return(false);
       var model=grid.getTableModel();
       var row=grid.getFocusedRow();
       document.location.href("uareas.php?idarea="+model.getValue(0, row)+"&elim=1");
       <?php
       }

       function uareasvistaJSLoad($sender, $params)
       {
       ?>
       //Add your javascript code here
       grid.getTableColumnModel().setColumnWidth(0,80);  //col,width
	    grid.getTableColumnModel().setColumnWidth(1,350);
       grid.setWidth(document.body.offsetWidth - 40);
       grid.setHeight(document.body.offsetHeight - 150);
       <?php
       }

       function btnbuscarClick($sender, $params)
       {
       $this->filtro();
       }

       function btnnuevoClick($sender, $params)
       {
       if(Derechos('Alta Areas') == false)
         {
		 echo '<script language="javascript" type="text/javascript">
		      alert("No puede Agregar Areas");
			  </script>';
		 }
	   else
	  	 redirect("uareas.php?idarea=0");
       }

       function uareasvistaShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
   	   $this->lbtitulo->Caption= $this->Caption;
	   $this->filtro();
       }

       function uareasvistaCreate($sender, $params)
       {
       if(Derechos('Accesar Areas') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	 alert("Usted no tiene derechos para accesar a Areas");
               	 document.location.href("menu.php");
               	 </script>';
         	exit;
         }
       }

       function filtro()
	   {
       $sql = 'select idarea, nombre from areas';

	   if($this->edbuscar->Text != '')
         $cond = ' where nombre like "%'.$this->edbuscar->Text.'%"';
       else
         $cond = '';

       $this->sqltabla->close();
	   $this->sqltabla->SQL= $sql.$cond.' order by idarea';
       $this->sqltabla->open();
       }
}

global $application;

global $uareasvista;

//Creates the form
$uareasvista=new uareasvista($application);

//Read from resource file
$uareasvista->loadResource(__FILE__);

//Shows the form
$uareasvista->show();

?>