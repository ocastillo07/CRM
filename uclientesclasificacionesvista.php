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
class uclientesclasificacionesvista extends Page
{
       public $dgclientesclasificaciones = null;
       public $dsclientesclasificaciones = null;
       public $sqlclientesclasificaciones = null;
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
       	$sql = 'Select idclienteclasificacion,nombre from clientesclasificaciones ';

		 	$cond='';
         switch($this->cbofiltro->ItemIndex)
         {
         case 1:  //idprocedimiento
                  $cond = ' where idclienteclasificacion= '.$this->edbuscar->Text;
						break;
         case 2:  //procedimiento
                  $cond = ' where nombre like"%'.$this->edbuscar->Text.'%" ';
                  break;
         }
			$this->sqlclientesclasificaciones->close();
			$this->sqlclientesclasificaciones->SQL= $sql.$cond.' order by idclienteclasificacion';
         $this->sqlclientesclasificaciones->open();
			//$this->sqlclientesclasificaciones->Active=true;
		 }

		 function uclientesclasificacionesvistaJSLoad($sender, $params)
       {

       ?>
       //Add your javascript code here
         dgclientesclasificaciones.getTableColumnModel().setColumnWidth(0,120);  //col,width
			dgclientesclasificaciones.getTableColumnModel().setColumnWidth(1,450);
         dgclientesclasificaciones.getTableColumnModel().setColumnWidth(0,80);  //col,width
	      dgclientesclasificaciones.getTableColumnModel().setColumnWidth(1,350);
         dgclientesclasificaciones.setWidth(document.body.offsetWidth - 40);
         dgclientesclasificaciones.setHeight(document.body.offsetHeight - 150);
       <?php
       }

       function uclientesclasificacionesvistaCreate($sender, $params)
       {
       	if(Derechos('ACCCLICLAS') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	   alert("Usted no tiene derechos para accesar a Clientes Clasificaciones");
               	document.location.href("menu.php");
               	</script>';
         	exit;
         }
       }

       function btneliminarJSClick($sender, $params)
       {

       ?>
       //Add your javascript code here
       	if(!confirm('Desea Eliminar la Clasificacion Seleccionada?'))
            return(false);
       	var model=dgclientesclasificaciones.getTableModel();
       	var row=dgclientesclasificaciones.getFocusedRow();
       	document.location.href("uclientesclasificaciones.php?idclasificacion="+model.getValue(0, row)+"&elim=1");
       <?php
       }


       function btnnuevoClick($sender, $params)
       {
       	if(Derechos('ALCLICLAS') == false)
         {
				echo '<script language="javascript" type="text/javascript">
					alert("No puede Agregar Clasificaciones");
				</script>';
			}
			else
				redirect("uclientesclasificaciones.php?idclasificacion=0");
       }

       function dgclientesclasificacionesJSDblClick($sender, $params)
       {
       	//$this->hfidus->Value = $this->sqlclientesclasificaciones->fieldget("idasunto");
       ?>
       //Add your javascript code here
       	var model = dgclientesclasificaciones.getTableModel();
       	var row=dgclientesclasificaciones.getFocusedRow();
       	document.location.href("uclientesclasificaciones.php?idclasificacion="+model.getValue(0, row));
       <?php
       }

       function uclientesclasificacionesvistaShow($sender, $params)
       {
	    	$this->pbotones->Width = $_SESSION["width"];
   	   $this->lbtitulo->Caption= $this->Caption;
			$this->filtro();
       }
}

global $application;

global $uclientesclasificacionesvista;

//Creates the form
$uclientesclasificacionesvista=new uclientesclasificacionesvista($application);

//Read from resource file
$uclientesclasificacionesvista->loadResource(__FILE__);

//Shows the form
$uclientesclasificacionesvista->show();

?>