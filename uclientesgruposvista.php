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
class uclientesgruposvista extends Page
{
       public $dgclientesgrupos = null;
       public $sqlclientesgrupos = null;
       public $dsclientesgrupos = null;
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
       	$sql = 'select idgrupo as IdGrupo,nombre as Grupo
					  from clientesgruposcat';

		 	$cond='';
         switch($this->cbofiltro->ItemIndex)
         {
         case 1:  //idprocedimiento
                  $cond = ' where idgrupo= '.$this->edbuscar->Text;
						break;
         case 2:  //procedimiento
                  $cond = ' where nombre like"%'.$this->edbuscar->Text.'%" ';
                  break;
         }
			$this->sqlclientesgrupos->close();
			$this->sqlclientesgrupos->SQL= $sql.$cond.' order by idgrupo';
         $this->sqlclientesgrupos->open();
			//$this->sqlclientesgrupos->Active=true;
		 }

		 function uclientesgruposvistaJSLoad($sender, $params)
       {

       ?>
       //Add your javascript code here
         dgclientesgrupos.getTableColumnModel().setColumnWidth(0,120);  //col,width
			dgclientesgrupos.getTableColumnModel().setColumnWidth(1,450);
         dgclientesgrupos.getTableColumnModel().setColumnWidth(0,80);  //col,width
	      dgclientesgrupos.getTableColumnModel().setColumnWidth(1,350);
         dgclientesgrupos.setWidth(document.body.offsetWidth - 40);
         dgclientesgrupos.setHeight(document.body.offsetHeight - 150);
       <?php
       }

       function uclientesgruposvistaCreate($sender, $params)
       {
       	if(Derechos('ACCCLIGPOS') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	   alert("Usted no tiene Derechos para Accesar a Clientes Grupos");
               	document.location.href("menu.php");
               	</script>';
         	exit;
         }
       }

       function btneliminarJSClick($sender, $params)
       {

       ?>
       //Add your javascript code here
       	if(!confirm('Desea Eliminar el Grupo Seleccionado?'))
            return(false);
       	var model=dgclientesgrupos.getTableModel();
       	var row=dgclientesgrupos.getFocusedRow();
       	document.location.href("uclientesgrupos.php?idgrupo="+model.getValue(0, row)+"&elim=1");
       <?php
       }


       function btnnuevoClick($sender, $params)
       {
       	if(Derechos('ALCLIGPOS') == false)
         {
				echo '<script language="javascript" type="text/javascript">
					alert("No puede Agregar Grupos");
				</script>';
			}
			else
				redirect("uclientesgrupos.php?idgrupo=0");
       }

       function dgclientesgruposJSDblClick($sender, $params)
       {
       	//$this->hfidus->Value = $this->sqlclientesgrupos->fieldget("idasunto");
       ?>
       //Add your javascript code here
       	var model = dgclientesgrupos.getTableModel();
       	var row=dgclientesgrupos.getFocusedRow();
       	document.location.href("uclientesgrupos.php?idgrupo="+model.getValue(0, row));
       <?php
       }

       function uclientesgruposvistaShow($sender, $params)
       {
	    	$this->pbotones->Width = $_SESSION["width"];
   	   $this->lbtitulo->Caption= $this->Caption;
			$this->filtro();
       }
}

global $application;

global $uclientesgruposvista;

//Creates the form
$uclientesgruposvista=new uclientesgruposvista($application);

//Read from resource file
$uclientesgruposvista->loadResource(__FILE__);

//Shows the form
$uclientesgruposvista->show();

?>