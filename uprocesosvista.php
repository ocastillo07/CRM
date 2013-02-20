<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   {
   redirect("login.php");
   }
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
class uprocesosvista extends Page
{
       public $dgproceso = null;
       public $dsproceso = null;
       public $sqlproceso = null;
       public $btnbuscar = null;
       public $cbofiltro = null;
       public $edbuscar = null;
       public $Label1 = null;
       public $lbtitulo = null;
       public $pbotones = null;
       public $btnnuevo = null;
       public $btneliminar = null;
       public $hfidus = null;


       function btnbuscarClick($sender, $params)
       {
       	$this->filtro();
			if($this->cbofiltro->ItemIndex==0)
				$this->edbuscar->Text='';
       }

       function filtro()
		 {
       	$sql = 'select idproceso as IdProceso,nombre as Proceso
					  from accionesprocesos p ';

		 	$cond='';
         switch($this->cbofiltro->ItemIndex)
         {
         case 1:  //idprocedimiento
                  $cond = ' where idproceso= '.$this->edbuscar->Text;
						break;
         case 2:  //procedimiento
                  $cond = ' where nombre like"%'.$this->edbuscar->Text.'%" ';
                  break;
         }
			$this->sqlproceso->close();
			$this->sqlproceso->SQL= $sql.$cond.' order by idproceso';
         $this->sqlproceso->open();
			//$this->sqlproceso->Active=true;
		 }

		 function uprocesosvistaJSLoad($sender, $params)
       {

       ?>
       //Add your javascript code here
         dgproceso.getTableColumnModel().setColumnWidth(0,120);  //col,width
			dgproceso.getTableColumnModel().setColumnWidth(1,450);
         dgproceso.setWidth(document.body.offsetWidth - 40);
         dgproceso.setHeight(document.body.offsetHeight - 150); //150
       <?php
       }

       function uprocesosvistaCreate($sender, $params)
       {
       	if(Derechos('Accesar Procesos') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	   alert("Usted no tiene derechos para accesar a Procesos");
               	document.location.href("menu.php");
               	</script>';
         	exit;
         }
       }

       function btneliminarJSClick($sender, $params)
       {

       ?>
       //Add your javascript code here
       	if(!confirm('Desea Eliminar el Proceso Seleccionado?'))
            return(false);
       	var model=dgproceso.getTableModel();
       	var row=dgproceso.getFocusedRow();
       	document.location.href("uprocesos.php?idproceso="+model.getValue(0, row)+"&elim=1");
       <?php
       }


       function btnnuevoClick($sender, $params)
       {
       	if(Derechos('Alta Procesos') == false)
         {
				echo '<script language="javascript" type="text/javascript">
					alert("No puede Agregar Procesos");
				</script>';
			}
			else
				redirect("uprocesos.php?idproceso=0");
       }

       function dgprocesoJSDblClick($sender, $params)
       {
       	//$this->hfidus->Value = $this->sqlproceso->fieldget("idproceso");
       ?>
       //Add your javascript code here
       	var model = dgproceso.getTableModel();
       	var row=dgproceso.getFocusedRow();
       	document.location.href("uprocesos.php?idproceso="+model.getValue(0, row));
       <?php
       }

       function uprocesosvistaShow($sender, $params)
       {
	    	$this->pbotones->Width = $_SESSION["width"];
   	   $this->lbtitulo->Caption= $this->Caption;
			$this->filtro();
       }
}

global $application;

global $uprocesosvista;

//Creates the form
$uprocesosvista=new uprocesosvista($application);

//Read from resource file
$uprocesosvista->loadResource(__FILE__);

//Shows the form
$uprocesosvista->show();

?>