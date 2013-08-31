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
class urhcolaboradoresvista extends Page
{
   public $hfparam = null;
   public $lblpagina = null;
   public $btnsiguiente = null;
   public $btnregresar = null;
   public $btngo = null;
   public $edgo = null;
   public $hfpagina = null;
   public $dsgrid = null;
   public $sqlgrid = null;
   public $btnbuscar = null;
   public $cbofiltro = null;
   public $edbuscar = null;
   public $Label1 = null;
   public $grid = null;
   public $hfidcolaborador = null;
   public $pbotones = null;
   public $lbtitulo = null;
   public $btnnuevo = null;
   public $btneliminar = null;
   function btnbuscarClick($sender, $params)
   {

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


   function urhcolaboradoresvistaJSLoad($sender, $params)
   {
?>
      grid.setWidth(document.body.offsetWidth - 40);
      grid.setHeight(document.body.offsetHeight - 150); //150
      vcl.$('lblpagina_outer').style.top=document.body.offsetHeight-50;
<?php
   }

   function btneliminarJSClick($sender, $params)
   {
?>
       if(!confirm('Desea Eliminar el Colaborador Seleccionado?'))
            return(false);
       var model=grid.getTableModel();
       var row=grid.getFocusedRow();
       document.location.href("urhcolaboradores.php?idcolaborador="+model.getValue(0, row)+"&elim=1");
<?php
   }

   function gridJSDblClick($sender, $params)
   {
?>
       var pagina=document.getElementById('hfpagina').value;
       var model = grid.getTableModel();
       var row=grid.getFocusedRow();
       if(vcl.$('hfparam').value == 'c')
       {
          document.location.href(pagina+"?idcolaborador="+model.getValue(0, row)+"&tipo=c");
       }
       else
       {
          vcl.$('hfidcolaborador').value = model.getValue(0, row);
          document.location.href(pagina+"?idcolaborador="+model.getValue(0, row));
       }
<?php
   }

   function filtro()
   {
      $cond = '';
      switch($this->cbofiltro->ItemIndex)
      {
         case 1:
            //idcolaborador
            if(is_numeric($this->edbuscar->Text))
               $cond = ' where u.idcolaborador=' . $this->edbuscar->Text;
            else
               echo '<script language="javascript" type="text/javascript">
                    alert("No es un valor valido");
                    </script>';
            break;
         case 2:
            //idempleado
            if(is_numeric($this->edbuscar->Text))
               $cond = ' where u.idempleado = "' . $this->edbuscar->Text . '"';
            else
               echo '<script language="javascript" type="text/javascript">
                    alert("No es un valor valido");
                    </script>';
            break;
         case 3:
            //nombre
            $nombre = NombreFisica('u');
            $cond = ' where ' . $nombre . ' like "%' . $this->edbuscar->Text . '%"';
            break;
         case 4:
            //estatus
            $cond = ' where if(u.estatus = 1, "Activo", "Inactivo") like "%' . $this->edbuscar->Text . '%"';
            break;
         case 5:
            //area
            $cond = ' where a.nombre like "%' . $this->edbuscar->Text . '%"';
            break;
         case 6:
            //puesto
            $cond = ' where p.nombre like "%' . $this->edbuscar->Text . '%"';
            break;
         case 7:
            // plaza
            $cond = ' where pl.nombre like "%' . $this->edbuscar->Text . '%"';
            break;
      }

      $nombre = NombreFisica('u');
      $sql = 'SELECT u.idcolaborador, u.idempleado, u.iniciales, ' . $nombre . ' AS nombre,
             pl.nombre AS plaza, a.nombre AS area, p.nombre AS puesto,
             if(u.estatus = 1, "Activo", "Inactivo") AS estatus, u.fechaingreso
             from rhcolaboradores u left join areas a on a.idarea=u.idarea
             left join puestos p on p.idpuesto=u.idpuesto
             left join plazas pl on pl.idplaza=u.idplaza ' . $cond . '
             order by area, puesto, u.nombre';
      $sql = 'select * from (' . $sql . ' ) as t ';

         $rs=mysql_query($sql) or die("Error de consulta SQL: ".$sql);
         $row=mysql_fetch_row($rs);
         $total = $row[0];
         $this->sqlgrid->LimitCount = GetConfiguraciones('LimitCountGrids');
         $pagact = ($this->sqlgrid->LimitStart+$this->sqlgrid->LimitCount)/$this->sqlgrid->LimitCount;
         $paginas = ceil($total/$this->sqlgrid->LimitCount);

         $this->lblpagina->Caption = 'Total de Registros: '.$total.' Pagina '.$pagact.' de '.$paginas;

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
      $this->sqlgrid->sql = $sql;
      $this->sqlgrid->open();
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('ALRHCOLAB') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No puede Agregar Colaboradores");
               </script>';
      }
      else
         redirect("urhcolaboradores.php?idcolaborador=0");
   }

   function urhcolaboradoresvistaShow($sender, $params)
   {

      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      $this->filtro();

      if(isset($_GET['pagina']))
        $this->hfpagina->Value = $_GET['pagina'];

      if(isset($_GET['tipo']))
        $this->hfparam->Value = $_GET['tipo'];
   }

   function urhcolaboradoresvistaCreate($sender, $params)
   {
      if(Derechos('ACCRHCOLAB') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para Accesar Colaboradores");
               document.location.href("menu.php");
               </script>';
         exit;
      }
   $this->cbofiltro->ItemIndex = 3;
   }
}

global $application;

global $urhcolaboradoresvista;

//Creates the form
$urhcolaboradoresvista = new urhcolaboradoresvista($application);

//Read from resource file
$urhcolaboradoresvista->loadResource(__FILE__);

//Shows the form
$urhcolaboradoresvista->show();

?>