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
class uasuntosvista extends Page
{
       public $dsasuntos = null;
       public $sqlasuntos = null;
       public $dgasuntos = null;
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
       	$sql = 'select idasunto as IdAsunto,nombre as Asunto
					  from actividadesasuntos  ';

		 	$cond='';
         switch($this->cbofiltro->ItemIndex)
         {
         case 1:  //idprocedimiento
                  $cond = ' where idasunto= '.$this->edbuscar->Text;
						break;
         case 2:  //procedimiento
                  $cond = ' where nombre like"%'.$this->edbuscar->Text.'%" ';
                  break;
         }
			$this->sqlasuntos->close();
			$this->sqlasuntos->SQL= $sql.$cond.' order by idasunto';
         $this->sqlasuntos->open();
			//$this->sqlasuntos->Active=true;
		 }

		 function uasuntosvistaJSLoad($sender, $params)
       {

       ?>
       //Add your javascript code here
         dgasuntos.getTableColumnModel().setColumnWidth(0,120);  //col,width
			dgasuntos.getTableColumnModel().setColumnWidth(1,450);
         dgasuntos.getTableColumnModel().setColumnWidth(0,80);  //col,width
	      dgasuntos.getTableColumnModel().setColumnWidth(1,350);
         dgasuntos.setWidth(document.body.offsetWidth - 40);
         dgasuntos.setHeight(document.body.offsetHeight - 150);
       <?php
       }

       function uasuntosvistaCreate($sender, $params)
       {
       	if(Derechos('Accesar Asuntos') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	   alert("Usted no tiene derechos para accesar a Asuntos");
               	document.location.href("menu.php");
               	</script>';
         	exit;
         }
       }

       function btneliminarJSClick($sender, $params)
       {

       ?>
       //Add your javascript code here
       	if(!confirm('Desea Eliminar el Asunto Seleccionado?'))
            return(false);
       	var model=dgasuntos.getTableModel();
       	var row=dgasuntos.getFocusedRow();
       	document.location.href("uasuntos.php?idasunto="+model.getValue(0, row)+"&elim=1");
       <?php
       }


       function btnnuevoClick($sender, $params)
       {
       	if(Derechos('Alta Asuntos') == false)
         {
				echo '<script language="javascript" type="text/javascript">
					alert("No puede Agregar Asuntos");
				</script>';
			}
			else
				redirect("uasuntos.php?idasunto=0");
       }

       function dgasuntosJSDblClick($sender, $params)
       {
       	//$this->hfidus->Value = $this->sqlasuntos->fieldget("idasunto");
       ?>
       //Add your javascript code here
       	var model = dgasuntos.getTableModel();
       	var row=dgasuntos.getFocusedRow();
       	document.location.href("uasuntos.php?idasunto="+model.getValue(0, row));
       <?php
       }

       function uasuntosvistaShow($sender, $params)
       {
	    	$this->pbotones->Width = $_SESSION["width"];
   	   $this->lbtitulo->Caption= $this->Caption;
			$this->filtro();
       }
}

global $application;

global $uasuntosvista;

//Creates the form
$uasuntosvista=new uasuntosvista($application);

//Read from resource file
$uasuntosvista->loadResource(__FILE__);

//Shows the form
$uasuntosvista->show();

?>