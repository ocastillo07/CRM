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
class usolinformaticaprocesosvista extends Page
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

   function dgtablaJSDblClick($sender, $params)
   {
   ?>
       	var model = dgtabla.getTableModel();
       	var row=dgtabla.getFocusedRow();
       	document.location.href("usolinformaticaprocesos.php?idproceso="+model.getValue(0, row));
   <?php
   }

   function btneliminarJSClick($sender, $params)
   {
   ?>
        if(!confirm('Desea Eliminar el Proceso Seleccionado?'))
            return(false);
         var model=dgtabla.getTableModel();
         var row=dgtabla.getFocusedRow();
         document.location.href("usolinformaticaprocesos.php?idproceso="+model.getValue(0, row)+"&elim=1");
   <?php
   }

   function usolinformaticaprocesosvistaJSLoad($sender, $params)
   {
   ?>
      dgtabla.getTableColumnModel().setColumnWidth(0,80);  //col,width
      dgtabla.getTableColumnModel().setColumnWidth(1,350);
      dgtabla.setWidth(document.body.offsetWidth - 40);
      dgtabla.setHeight(document.body.offsetHeight - 150);
   <?php
   }

   function usolinformaticaprocesosvistaCreate($sender, $params)
   {
      if(Derechos('Accesar Procesos de Informatica') == false)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("Usted no tiene derechos para accesar a Procesos de Informatica");
              document.location.href("menu.php");
              </script>';
         exit;
      }
   }

   function usolinformaticaprocesosvistaShow($sender, $params)
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
      $sql = 'select idproceso as idproceso,nombre as proceso
              from solinformaticaprocesos  ';

      $cond = '';
      switch($this->cbofiltro->ItemIndex)
      {
         case 1:
            //idprocedimiento
            $cond = ' where idproceso= ' . $this->edbuscar->Text;
            break;
         case 2:
            //procedimiento
            $cond = ' where nombre like"%' . $this->edbuscar->Text . '%" ';
            break;
      }
      $this->sqltabla->close();
      $this->sqltabla->SQL = $sql . $cond . ' order by idproceso';
      $this->sqltabla->open();
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('Alta Procesos de Informatica') == false)
      {
         echo '<script language="javascript" type="text/javascript">
					alert("No puede Agregar Procesos de Informatica");
				</script>';
      }
      else
         redirect("usolinformaticaprocesos.php?idproceso=0");
   }
}

global $application;

global $usolinformaticaprocesosvista;

//Creates the form
$usolinformaticaprocesosvista = new usolinformaticaprocesosvista($application);

//Read from resource file
$usolinformaticaprocesosvista->loadResource(__FILE__);

//Shows the form
$usolinformaticaprocesosvista->show();

?>