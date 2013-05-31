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
class uresegnorefvista extends Page
{
   public $btnexportar = null;
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
   public $hfidsolicitud = null;
   public $btneliminar = null;
   public $btnnuevo = null;

   function btnexportarClick($sender, $params)
   {
      if(Derechos('REEXNOREF') == false)
      {
         echo '<script language="javascript" type="text/javascript">
                    alert(\'No tienes Derechos para Exportar No Refacciones\');
                  </script>';
      }
      else
      {
         exportar($this->sqlgrid->sql, 'Seguimiento a No Refacciones');
         $this->sqlexportar->SQL = '';
      }
   }


   function btnbuscarClick($sender, $params)
   {
      $this->filtro();
   }


   function uresegnorefvistaJSLoad($sender, $params)
   {
?>
      grid.setWidth(document.body.offsetWidth - 40);
      grid.setHeight(document.body.offsetHeight - 150);
      vcl.$('lblpagina_outer').style.top=document.body.offsetHeight-20;
<?php
   }

   function uresegnorefvistaCreate($sender, $params)
   {
      if(Derechos('REACCNOREF') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para Accesar Seguimiento a No Refacciones");
               document.location.href("menu.php");
               </script>';
         exit;
      }

      $this->cbestatus->Clear();
      $this->cbestatus->AddItem('TODOS', null , 0);
      $sql = 'select idestatus, nombre from resegnoref_estatus';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbestatus->AddItem($row['nombre'], null , $row['idestatus']);
      $this->cbestatus->ItemIndex = 0;
   }

   function uresegnorefvistaShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;

      $this->filtro();
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
         document.location.href("uresegnoref.php?idsolicitud="+document.getElementById("hfidsolicitud").value+"&elim=1");
<?php
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('REALNOREF') == false)
         echo '<script language="javascript" type="text/javascript">
              alert("No puede dar de Alta Seguimiento a No Refacciones");
              </script>';
      else
         redirect("uresegnoref.php?idsolicitud=0");
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
            $cond = ' e.fechacreacion="' . $this->edbuscar->Text . '"';
            break;
         case 3:
            //idplaza
            $cond = ' e.idplaza="' . $this->edbuscar->Text . '"';
            break;
         case 4:
            //tipo
            $cond = ' e.tiponom like "%' . $this->edbuscar->Text . '%"';
            break;
         case 5:
            //colaborador
            $cond = ' c.nombre like "%' . $this->edbuscar->Text . '%"';
            break;
         case 6:
            //id colaborador
            $cond = ' c.idempleado = "' . $this->edbuscar->Text . '"';
            break;

      }

      if($estatus != '')
         $cond = $cond . ' ' . $estatus;

      $sql = 'SELECT r.idsolicitud, e.nombre as estatus, p.nombre as plaza, r.fechacreacion,
              '.NombreFisica('u').' as originador, if(r.procedencia="S", "SERVICIO", "MOSTRADOR") as procedencia,
              if(r.procedencia="S", r.idservicio, r.norecibo) as documento, r.fechacierre,
              (select fecharecepcion from resegnorefdet det where det.idsolicitud = r.idsolicitud limit 1) as fecharecepcion
              from resegnoref r left join plazas p on p.idplaza=r.idplaza
              left join resegnoref_estatus as e on e.idestatus=r.idestatus
              left join usuarios u on u.idusuario=r.idoriginador ';

      /*if(Derechos('TODRESEGNOREF') == true)
         $sql = $sql . 'where r.idsolicitud > 0 ' . $cond . ' group by idsolicitud';
      else
         $sql = $sql . 'where r.idoriginador="' . $_SESSION['idusuario'] . '" ' . $cond . ' group by idsolicitud';*/

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
      document.location.href("uresegnoref.php?idsolicitud="+document.getElementById("hfidsolicitud").value);
<?php
   }

   function gridJSClick($sender, $params)
   {
?>
      var model = grid.getTableModel();
      var row = grid.getFocusedRow();
      document.uresegnorefvista.hfidsolicitud.value = model.getValue(0, row);
<?php
   }

}

global $application;

global $uresegnorefvista;

//Creates the form
$uresegnorefvista = new uresegnorefvista($application);

//Read from resource file
$uresegnorefvista->loadResource(__FILE__);

//Shows the form
$uresegnorefvista->show();

?>