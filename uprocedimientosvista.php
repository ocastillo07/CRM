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
class uprocedimientosvista extends Page
{
       public $dsprocedimientos = null;
       public $dgprocedimientos = null;
       public $sqlprocedimientos = null;
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
       	$sql = 'select idprocedimiento as IdProcedimiento,prefijo,numero,nombre as Procedimiento
					  from accionesprocedimientos p ';

		 	$cond='';
         switch($this->cbofiltro->ItemIndex)
         {
         case 1:  //idprocedimiento
                  $cond = ' where idprocedimiento= '.$this->edbuscar->Text;
						break;
         case 2:  //procedimiento
                  $cond = ' where nombre like"%'.$this->edbuscar->Text.'%" ';
                  break;
			case 3:  //prefijo
						$cond = ' where prefijo like"%'.$this->edbuscar->Text.'%" ';
                  break;
			case 4:  //numero
						$cond = ' where numero like"%'.$this->edbuscar->Text.'%" ';
                  break;

         }
			$this->sqlprocedimientos->close();
			$this->sqlprocedimientos->SQL= $sql.$cond.' order by idprocedimiento';
         $this->sqlprocedimientos->open();
			//$this->sqlprocedimientos->Active=true;
		 }

		 function uprocedimientosvistaJSLoad($sender, $params)
       {

       ?>
       //Add your javascript code here
         dgprocedimientos.getTableColumnModel().setColumnWidth(0,120);  //col,width
			dgprocedimientos.getTableColumnModel().setColumnWidth(1,450);
         dgprocedimientos.setWidth(document.body.offsetWidth - 40);
         dgprocedimientos.setHeight(document.body.offsetHeight - 150); //150
       <?php
       }

       function uprocedimientosvistaCreate($sender, $params)
       {
       	if(Derechos('Accesar Procedimientos') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	   alert("Usted no tiene derechos para accesar a Procedimientos");
               	document.location.href("menu.php");
               	</script>';
         	exit;
         }
       }

       function btneliminarJSClick($sender, $params)
       {

       ?>
       //Add your javascript code here
       	if(!confirm('Desea Eliminar el Procedimiento Seleccionado?'))
            return(false);
       	var model=dgprocedimientos.getTableModel();
       	var row=dgprocedimientos.getFocusedRow();
       	document.location.href("uprocedimientos.php?idprocedimiento="+model.getValue(0, row)+"&elim=1");
       <?php
       }


       function btnnuevoClick($sender, $params)
       {
       	if(Derechos('Alta Procedimientos') == false)
         {
				echo '<script language="javascript" type="text/javascript">
					alert("No puede dar de Alta Procedimientos");
				</script>';
			}
			else
				redirect("uprocedimientos.php?idprocedimiento=0");
       }

       function dgprocedimientosJSDblClick($sender, $params)
       {
       	//$this->hfidus->Value = $this->sqlprocedimientos->fieldget("idprocedimiento");
       ?>
       //Add your javascript code here
       	var model = dgprocedimientos.getTableModel();
       	var row=dgprocedimientos.getFocusedRow();
       	document.location.href("uprocedimientos.php?idprocedimiento="+model.getValue(0, row));
       <?php
       }

       function uprocedimientosvistaShow($sender, $params)
       {
	    	$this->pbotones->Width = $_SESSION["width"];
   	   $this->lbtitulo->Caption= $this->Caption;
			$this->filtro();
       }
}

global $application;

global $uprocedimientosvista;

//Creates the form
$uprocedimientosvista=new uprocedimientosvista($application);

//Read from resource file
$uprocedimientosvista->loadResource(__FILE__);

//Shows the form
$uprocedimientosvista->show();

?>