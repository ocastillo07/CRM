<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
require_once("vcl/vcl.inc.php");
//Includes
use_unit("mysql.inc.php");
use_unit("db.inc.php");
use_unit("dbgrids.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class usolmantovehiculosvista extends Page
{
   public $dsgrid = null;
   public $sqlgrid = null;
   public $grid = null;
   public $lblpagina = null;
   public $Label2 = null;
   public $cbestatus = null;
   public $btnsiguiente = null;
   public $btnregresar = null;
   public $btngo = null;
   public $edgo = null;
   public $btnbuscar = null;
   public $cbofiltro = null;
   public $edbuscar = null;
   public $Label1 = null;
   public $pbotones = null;
   public $lbtitulo = null;
   public $btnexportar = null;
   public $hfidsolicitud = null;
   public $btneliminar = null;
   public $btnnuevo = null;

   function usolmantovehiculosvistaJSLoad($sender, $params)
   {
   ?>
      grid.setWidth(document.body.offsetWidth - 40);
      grid.setHeight(document.body.offsetHeight - 150);
      vcl.$('lblpagina_outer').style.top=document.body.offsetHeight-20;
   <?php
   }

   function usolmantovehiculosvistaCreate($sender, $params)
   {
      if(Derechos('ACCMTOVE') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para Accesar a Solicitudes a Mantenimiento de Vehiculos");
               document.location.href("menu.php");
               </script>';
         exit;
      }
   }

   function usolmantovehiculosvistaShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      $this->cbestatus->Clear();
      $this->cbestatus->AddItem('TODOS', null , 0);
      $this->cbestatus->AddItem('PENDIENTE', null , 109);
      $this->cbestatus->AddItem('EN REVISION', null , 110);
      $this->cbestatus->AddItem('CERRADA', null , 111);
      //$this->cbestatus->ItemIndex = 109;
      $this->filtro();
   }

   function btnexportarClick($sender, $params)
   {
      if(Derechos('EXPMTOVE') == false)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("No tienes Derechos para Exportar Solicitudes a Mantenimiento de Vehiculos");
              </script>';
      }
      else
      {
         exportar($this->sqlgrid->sql, 'Solicitudes');
      }
   }

   function btnsiguienteClick($sender, $params)
   {
      $this->sqlgrid->LimitStart = $this->sqlgrid->LimitStart + $this->sqlgrid->LimitCount;
   }

   function btnregresarClick($sender, $params)
   {
      $this->sqlgrid->LimitStart = $this->sqlgrid->LimitStart - $this->sqlgrid->LimitCount;
   }

   function btngoClick($sender, $params)
   {
      if(is_numeric($this->edgo->Text))
         $this->sqlgrid->LimitStart = ($this->edgo->Text - 1) * $this->sqlgrid->LimitCount;
   }

   function btneliminarJSClick($sender, $params)
   {
   ?>
         if(!confirm('Desea Eliminar la Solocitud Seleccionada?'))
            return(false);
         document.location.href("usolmantovehiculos.php?idsolicitud="+document.getElementById("hfidsolicitud").value+"&elim=1");
   <?php
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('ALMTOVE') == false)
         echo '<script language="javascript" type="text/javascript">
              alert("No puede dar de Alta Solicitudes a Mantenimiento de Vehiculos");
              </script>';
      else
         redirect("usolmantovehiculos.php?idsolicitud=0&folio=0");
   }

   function filtro()
   {
      if($this->cbestatus->ItemIndex != 0)
         $estatus = 'where idestatus=' . $this->cbestatus->ItemIndex;
      else
         $estatus = '';
      $cond = ' ';

      switch($this->cbofiltro->ItemIndex)
      {
         case 0:
            $this->edbuscar->text = '';
            $cond = ' idsolicitud>0';
            break;
         case 1:
            //idsolicitud
            if(is_numeric($this->edbuscar->Text))
               $cond = '  idsolicitud=' . $this->edbuscar->Text;
            else
               echo '<script language="javascript" type="text/javascript">
                    alert("No es un valor valido");
                    </script>';
            break;
         case 2:
            //idclasificacion
            $cond = ' clasificacion like "%' . $this->edbuscar->Text . '%"';
            ;
            break;
         case 3:
            //Originador
            $cond = ' Originador like "%' . $this->edbuscar->Text . '%"';
            break;
         case 4:
            //idestatus
            $cond = ' Estatus like "%' . $this->edbuscar->Text . '%"';
            break;
         case 5:
            //Proceso
            $cond = ' Proceso like "%' . $this->edbuscar->Text . '%"';
            break;
         case 6:
            //Procedimiento
            $cond = ' Procedimiento like "%' . $this->edbuscar->Text . '%"';
            break;
         case 7:
            //Responsable
            $cond = ' Responsable like "%' . $this->edbuscar->Text . '%"';
            break;
         case 8:
            //Problema
            $cond = ' Problema like "%' . $this->edbuscar->Text . '%"';
            break;
         case 9:
            //Analisis
            $cond = ' Analisis like "%' . $this->edbuscar->Text . '%"';
            break;
         case 10:
            //correccion
            $cond = ' Correccion like "%' . $this->edbuscar->Text . '%"';
            break;
         case 11:
            //Accion
            $cond = ' Accion like "%' . $this->edbuscar->Text . '%"';
            break;
         case 12:
            //solicitacierre
            $cond = ' Solicitacierre like "%' . $this->edbuscar->Text . '%"';
            break;
         case 13:
            //fechacreacion
            $cond = ' Fechacreacion="' . $this->edbuscar->Text . '"';
            break;
         case 14:
            //fechacompromiso
            $cond = ' Fechacompromiso="' . $this->edbuscar->Text . '"';
            break;
         case 15:
            //fechac cierre
            $cond = ' Fechacierre="' . $this->edbuscar->Text . '"';
            break;
      }

      if($estatus != '')
         $cond = $estatus . ' and ' . $cond;
      else
         $cond =  ' where ' . $cond;

      $sql = 'SELECT a.idsolicitud as idsolicitud, if(a.idclasificacion=0,"Mantenimiento","Reparación") as Clasificacion,
             a.originador as Originador, a.vehiculo as Vehiculo, a.idestatus,c.nombre as Estatus,
             concat(u.nombre," ",u.apaterno," ",u.amaterno) as Responsable,
             left(np.nota,250) as Problema,left(nan.nota,250) as Analisis,left(nc.nota,250) as Correccion,
             if(a.solicitacierre=1,"Si","No") as Solicitacierre,a.fechacreacion as Fechacreacion,
             a.fechacompromiso as Fechacompromiso,a.fechacierre as Fechacierre
             from solmantovehiculos a
             left join clasificaciones c on a.idestatus=c.idclasificacion
             left join usuarios u on u.idusuario=a.idresponsable
             left join notasdet np on a.idnotaproblema=np.idnota
             left join notasdet nc on a.idnotacorreccion=nc.idnota
             left join notasdet nan on a.idnotaanalisis=nan.idnota
             where a.idsolicitud > 0 ';

      if(Derechos('TODMTOVE') == true)
         $sql = $sql . 'and a.idresponsable>0 group by idsolicitud';
      //else if(Derechos('Ver Solicitudes de Informatica por Area') == true)
      //   $sql = $sql . 'and  u.idarea=' . $_SESSION['idarea'];
      else
         $sql = $sql . 'and  u.login="' . $_SESSION["login"] . '" group by idsolicitud';

      $sql = 'select * from (' . $sql . ') as tab ' . $cond . ' order by idsolicitud desc';

      $rs = mysql_query('select count(*) from (' . $sql . ') as t')or die("Error de consulta SQL: " . $sql);
      $row = mysql_fetch_row($rs);
      $total = $row[0];
      $this->sqlgrid->LimitCount = GetConfiguraciones('LimitCountGrids');
      $pagact = ($this->sqlgrid->LimitStart + $this->sqlgrid->LimitCount) / $this->sqlgrid->LimitCount;
      $paginas = ceil($total / $this->sqlgrid->LimitCount);

      $this->lblpagina->Caption = 'Total de Registros: ' . $total . ' Pagina ' . $pagact . ' de ' . $paginas;

      if($this->sqlgrid->LimitCount < $total)
      {
         $this->btnsiguiente->Enabled = false;
         $this->btnregresar->Enabled = false;
      }
      if(($total - $this->sqlgrid->LimitCount) > 0)
         $this->btnsiguiente->Enabled = true;

      if(($total - $this->sqlgrid->LimitStart) > 0)
         $this->btnregresar->Enabled = true;

      if(($total - $this->sqlgrid->LimitStart) < $this->sqlgrid->LimitCount)
         $this->btnsiguiente->Enabled = false;

      if($this->sqlgrid->LimitStart == 0)
         $this->btnregresar->Enabled = false;

      if($this->btnregresar->Enabled == false && $this->btnsiguiente->Enabled == false)
         $this->btngo->Enabled = false;
      else
         $this->btngo->Enabled = true;

      $this->sqlgrid->close();
      $this->sqlgrid->SQL = $sql;
      $this->sqlgrid->open();

      if($this->sqlgrid->RecordCount == 0)
      {
         $this->cbofiltro->ItemIndex = 0;
         echo '<script language="javascript" type="text/javascript">
              alert("No se encontraron datos");
              </script>';
         $this->sqlgrid->LimitStart = 0;
      }
   }

   function gridJSDblClick($sender, $params)
   {
   ?>
      document.location.href("usolmantovehiculos.php?idsolicitud="+document.getElementById("hfidsolicitud").value);
   <?php
   }

   function gridJSClick($sender, $params)
   {
   ?>
      var model = grid.getTableModel();
      var row = grid.getFocusedRow();
      document.usolmantovehiculosvista.hfidsolicitud.value = model.getValue(0, row);
   <?php
   }

}

global $application;

global $usolmantovehiculosvista;

//Creates the form
$usolmantovehiculosvista = new usolmantovehiculosvista($application);

//Read from resource file
$usolmantovehiculosvista->loadResource(__FILE__);

//Shows the form
$usolmantovehiculosvista->show();

?>