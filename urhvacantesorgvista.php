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
class urhvacantesorgvista extends Page
{
   public $sqlgrid = null;
   public $dsgrid = null;
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
   public $grid = null;
   public $pbotones = null;
   public $lbtitulo = null;
   public $btnexportar = null;
   public $hfidsolicitud = null;
   public $btneliminar = null;
   public $btnnuevo = null;

   function btnbuscarClick($sender, $params)
   {
      $this->filtro();
   }

   function urhvacantesorgvistaJSLoad($sender, $params)
   {
?>
      grid.setWidth(document.body.offsetWidth - 40);
      grid.setHeight(document.body.offsetHeight - 150);
      vcl.$('lblpagina_outer').style.top=document.body.offsetHeight-20;
<?php
   }

   function urhvacantesorgvistaCreate($sender, $params)
   {
      if(Derechos('ACCRHVACORG') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para Accesar Vacantes Organigrama");
               document.location.href("menu.php");
               </script>';
         exit;
      }

      $this->cbestatus->Clear();
      $this->cbestatus->AddItem('TODOS', null , 0);
      $sql = 'select idestatus, nombre from rhestatus_vac';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbestatus->AddItem($row['nombre'], null , $row['idestatus']);
      $this->cbestatus->ItemIndex = 0;
   }

   function urhvacantesorgvistaShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;

      $this->filtro();
   }

   function btnexportarClick($sender, $params)
   {
      if(Derechos('EXPRHVACORG') == false)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("No tienes Derechos para Exportar Vacantes Organigrama");
              </script>';
      }
      else
      {
         exportar($this->sqlgrid->sql, 'Vacantes Organigrama');
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
         if(!confirm('Desea Eliminar la Accion Seleccionada?'))
            return(false);
         document.location.href("urhvacantesorg.php?idsolicitud="+document.getElementById("hfidsolicitud").value+"&elim=1");
<?php
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('ALRHVACORG') == false)
         echo '<script language="javascript" type="text/javascript">
              alert("No puede dar de Alta Vacantes Organigrama");
              </script>';
      else
         redirect("urhvacantesorg.php?idsolicitud=0");
   }

   function filtro()
   {
      if($this->cbestatus->ItemIndex != 0)
         $estatus = 'and e.idestatus=' . $this->cbestatus->ItemIndex;
      else
         $estatus = '';
      $cond = ' ';

      switch($this->cbofiltro->ItemIndex)
      {
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
            //fechacreacion
            $cond = ' v.fechacreacion="' . $this->edbuscar->Text . '"';
            break;
         case 3:
            //idplaza
            $cond = ' v.idplaza="' . $this->edbuscar->Text . '"';
            break;
         case 4:
            //inicio
            $cond = ' v.area = "' . $this->edbuscar->Text . '"';
            break;
         case 5:
            //fechafin
            $cond = ' v.puesto = "' . $this->edbuscar->Text . '"';
            break;
         case 6:
            //fecharegreso
            $cond = ' v.fechacontratacion = "' . $this->edbuscar->Text . '"';
            break;
      }

      if($estatus != '')
         $cond = $cond . ' ' . $estatus;

      $sql = 'SELECT v.idsolicitud, v.idestatus, v.idnota, v.fechacreacion,
              v.fechacontratacion, v.observaciones, pl.nombre as plaza, p.nombre as puesto,
              a.nombre as area, e.nombre as estatus, v.idoriginador
              from rhvacantesorg v left join rhestatus_vac e on e.idestatus=v.idestatus
              left join puestos p on p.idpuesto=v.idpuesto
              left join areas a on a.idarea=v.idarea
              left join plazas pl on pl.idplaza=v.idplaza ';

      if(Derechos('TODRHVACORG') == true)
         $sql = $sql . 'where v.idsolicitud > 0 ' . $cond . ' group by idsolicitud';
      else
         $sql = $sql . 'where v.idoriginador="' . $_SESSION['idusuario'] . '" ' . $cond . ' group by idsolicitud';

      $sql = 'select * from (' . $sql . ') as tab  order by idsolicitud desc';

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
      document.location.href("urhvacantesorg.php?idsolicitud="+document.getElementById("hfidsolicitud").value);
<?php
   }

   function gridJSClick($sender, $params)
   {
?>
      var model = grid.getTableModel();
      var row = grid.getFocusedRow();
      document.urhvacantesorgvista.hfidsolicitud.value = model.getValue(0, row);
<?php
   }
}

global $application;

global $urhvacantesorgvista;

//Creates the form
$urhvacantesorgvista = new urhvacantesorgvista($application);

//Read from resource file
$urhvacantesorgvista->loadResource(__FILE__);

//Shows the form
$urhvacantesorgvista->show();

?>