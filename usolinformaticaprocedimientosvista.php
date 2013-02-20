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
class usolinformaticaprocedimientosvista extends Page
{
   public $dgtabla = null;
   public $dstabla = null;
   public $sqltabla = null;
   public $btnbuscar = null;
   public $cbofiltro = null;
   public $edbuscar = null;
   public $Label1 = null;
   public $pbotones = null;
   public $lbtitulo = null;
   public $btnnuevo = null;
   public $btneliminar = null;
   function usolinformaticaprocedimientosvistaJSLoad($sender, $params)
   {
   ?>
      dgtabla.getTableColumnModel().setColumnWidth(0,120);  //col,width
      dgtabla.getTableColumnModel().setColumnWidth(1,450);
      dgtabla.getTableColumnModel().setColumnWidth(0,80);  //col,width
      dgtabla.getTableColumnModel().setColumnWidth(1,350);
      dgtabla.setWidth(document.body.offsetWidth - 40);
      dgtabla.setHeight(document.body.offsetHeight - 150);
   <?php
   }

   function usolinformaticaprocedimientosvistaCreate($sender, $params)
   {
    if(Derechos('Accesar Procedimientos de Informatica') == false)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("Usted no tiene derechos para accesar a Procedimientos de Informatica");
              document.location.href("menu.php");
              </script>';
         exit;
      }
   }

   function usolinformaticaprocedimientosvistaShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      $this->filtro();
   }

   function btnbuscarClick($sender, $params)
   {
      $this->filtro();
      if($this->cbofiltro->ItemIndex == 0)
         $this->edbuscar->Text = '';
   }

   function filtro()
   {
      $sql = 'select idprocedimiento as idprocedimiento,nombre as procedimiento
             from solinformaticaprocedimientos  ';

      $cond = '';
      switch($this->cbofiltro->ItemIndex)
      {
         case 1:
            //idprocedimiento
            $cond = ' where idprocedimiento= ' . $this->edbuscar->Text;
            break;
         case 2:
            //procedimiento
            $cond = ' where nombre like"%' . $this->edbuscar->Text . '%" ';
            break;
      }
      $this->sqltabla->close();
      $this->sqltabla->SQL = $sql . $cond . ' order by idprocedimiento';
      $this->sqltabla->open();
   }

   function btneliminarJSClick($sender, $params)
   {
?>
         if(!confirm('Desea Eliminar el Procedimiento Seleccionado?'))
            return(false);
         var model=dgtabla.getTableModel();
         var row=dgtabla.getFocusedRow();
         document.location.href("usolinformaticaprocedimientos.php?idprocedimiento="+model.getValue(0, row)+"&elim=1");
<?php
   }


   function btnnuevoClick($sender, $params)
   {
      if(Derechos('Alta Procedimientos de Informatica') == false)
      {
         echo '<script language="javascript" type="text/javascript">
					    alert("No puede Agregar Procedimientos");
				      </script>';
      }
      else
         redirect("usolinformaticaprocedimientos.php?idprocedimiento=0");
   }

   function dgtablaJSDblClick($sender, $params)
   {
?>
       	var model = dgtabla.getTableModel();
       	var row=dgtabla.getFocusedRow();
       	document.location.href("usolinformaticaprocedimientos.php?idprocedimiento="+model.getValue(0, row));
<?php
   }



}

global $application;

global $usolinformaticaprocedimientosvista;

//Creates the form
$usolinformaticaprocedimientosvista = new usolinformaticaprocedimientosvista($application);

//Read from resource file
$usolinformaticaprocedimientosvista->loadResource(__FILE__);

//Shows the form
$usolinformaticaprocedimientosvista->show();

?>