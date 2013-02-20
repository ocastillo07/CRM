<script type='text/javascript' src='funciones.js'></script>
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
class uperfilesvista extends Page
{
       public $btnderechos = null;
       public $btneliminar = null;
       public $btnnuevo = null;
       public $dstabla = null;
       public $sqltabla = null;
       public $grid = null;
       public $pbotones = null;
       public $lbtitulo = null;
       public $hfidus = null;
       function uperfilesvistaJSLoad($sender, $params)
       {

       ?>
       validarEventos();
       grid.setWidth(document.body.offsetWidth - 40);
       grid.setHeight(document.body.offsetHeight - 200);

        grid.getTableColumnModel().setColumnWidth(0,70);
		    grid.getTableColumnModel().setColumnWidth(1,200);
		    grid.getTableColumnModel().setColumnWidth(2,150);
       <?php

       }

       function uperfilesvistaShow($sender, $params)
       {
       if(Derechos('ACCPERFILES') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert(" No tienes Derechos para Accesar Perfiles");
                 document.location.href("menu.php");
                 </script>';
         }

       $this->pbotones->Width = $_SESSION["width"];
       $this->lbtitulo->Caption= $this->Caption;
       $this->sqltabla->close();
       $this->sqltabla->sql = 'Select u.idusuario,  u.nombre
                              from usuarios u left join areas a on a.idarea=u.idarea
                              left join puestos p on p.idpuesto=u.idpuesto
                              where tipo = "P"
                              order by u.nombre';
       $this->sqltabla->open();
       }

       function gridJSDblClick($sender, $params)
       {
       ?>
       var model = grid.getTableModel();
       var row = grid.getFocusedRow();
       document.location.href("uperfiles.php?idusr="+model.getValue(0, row));
       <?php
       }

       function btnderechosJSClick($sender, $params)
       {
       ?>
       var model=grid.getTableModel();
       var row=grid.getFocusedRow();
       document.location.href("uusuariosderechos.php?idusr="+model.getValue(0, row));
       <?php
       }

       function btneliminarJSClick($sender, $params)
       {
       ?>
       if(!confirm('Desea Eliminar el Perfil Seleccionado?'))
            return(false);
       var model=grid.getTableModel();
       var row=grid.getFocusedRow();
       document.location.href("uperfiles.php?idusr="+model.getValue(0, row)+"&elim=1");
       <?php
       }

       function btnnuevoClick($sender, $params)
       {
       if(Derechos('ALPERFILES') == false)
          {
          echo '<script language="javascript" type="text/javascript">
               alert("No puede Agregar Perfiles");
               </script>';
          }
       else
          redirect("uperfiles.php?idusr=0");
       }

}

global $application;

global $uperfilesvista;

//Creates the form
$uperfilesvista=new uperfilesvista($application);

//Read from resource file
$uperfilesvista->loadResource(__FILE__);

//Shows the form
$uperfilesvista->show();

?>