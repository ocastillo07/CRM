<script type='text/javascript' src='funciones.js'></script>
<?php
include("dmconexion.php");
include("urecursos.php");
include("ufechas.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
require_once("vcl/vcl.inc.php");
//Includes
use_unit("comctrls.inc.php");
use_unit("db.inc.php");
use_unit("mysql.inc.php");
use_unit("dbgrids.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class udiasfvosvista extends Page
{
       public $Panel1 = null;
       public $Button1 = null;
       public $edregresar = null;
       public $btngcerrar = null;
       public $btnguardar = null;
       public $hfestatus = null;
       public $pbotones = null;
       public $lbtitulo = null;
       public $btnnuevo = null;
       public $btneliminar = null;
       public $Label2 = null;
       public $btnprobar = null;
       public $dtfecha = null;
       public $Label1 = null;
       public $dstabla = null;
       public $sqltabla = null;
       public $grid = null;
       function udiasfvosvistaJSLoad($sender, $params)
       {

       ?>
       validarEventos();
       grid.setWidth(document.body.offsetWidth - 40);
       grid.setHeight(document.body.offsetHeight - 150);

       <?php

       }

       function btnprobarClick($sender, $params)
       {
       if(DiaHabil($this->dtfecha->Text) == true)
         echo '<script language="javascript" type="text/javascript">
              alert("Habil");
              </script>';
       else
         echo '<script language="javascript" type="text/javascript">
              alert("Inhabil");
              </script>';
       }

       function btnnuevoClick($sender, $params)
       {
       if(Derechos('ALDIASFVOS') == false)
         {
		 echo '<script language="javascript" type="text/javascript">
		      alert("No puede Agregar Dias Festivos");
			  </script>';
		 }
	   else
	  	 redirect("udiasfvos.php?idcontador=0");
       }

       function gridJSDblClick($sender, $params)
       {
       ?>
       var model = grid.getTableModel();
       var row = grid.getFocusedRow();
       document.location.href("udiasfvos.php?idcontador="+model.getValue(0, row));
       <?php
       }

       function btneliminarJSClick($sender, $params)
       {
       ?>
       if(!confirm('Desea Eliminar el dia Seleccionado?'))
            return(false);
       var model=grid.getTableModel();
       var row=grid.getFocusedRow();
       document.location.href("udiasfvos.php?idcontador="+model.getValue(0, row)+"&elim=1");
       <?php
       }

       function udiasfvosvistaCreate($sender, $params)
       {
      /* if(Derechos('ACCDIASFVOS') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	 alert("Usted no tiene derechos para accesar a Dias Festivos");
               	 document.location.href("menu.php");
               	 </script>';
         	exit;
         } */
       }

       function udiasfvosvistaShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
       if($this->dtfecha->Caption == '')
       $this->dtfecha->Caption = Fecha();
   	   $this->lbtitulo->Caption= $this->Caption;
       $this->sqltabla->close();
       $this->sqltabla->SQL = 'select idcontador as ID, festividad, dia, mes,
                                if(cambiadia =1, "SI", "NO") as cambia
                                from diasfestivos order by idcontador';
       $this->sqltabla->open();
       }

}

global $application;

global $udiasfvosvista;

//Creates the form
$udiasfvosvista=new udiasfvosvista($application);

//Read from resource file
$udiasfvosvista->loadResource(__FILE__);

//Shows the form
$udiasfvosvista->show();

?>