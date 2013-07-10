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
use_unit("comctrls.inc.php");
use_unit("dbgrids.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class useserviciosvista extends Page
{
   public $hfpagina = null;
   public $lblpagina = null;
   public $dstabla = null;
   public $sqltabla = null;
   public $edid = null;
   public $ckid = null;
   public $Label3 = null;
   public $cbalmacen = null;
   public $Label2 = null;
   public $ckperiodo = null;
   public $dthasta = null;
   public $dtdesde = null;
   public $lbfiltrar = null;
   public $btnsiguiente = null;
   public $btnregresar = null;
   public $btngo = null;
   public $edgo = null;
   public $btnbuscar = null;
   public $cbestatus = null;
   public $grid = null;
   public $pbotones = null;
   public $lbexportar = null;
   public $btnexportar = null;
   public $lbnuevo = null;
   public $btnnuevo = null;
   public $lbtitulo = null;
   function useserviciosvistaShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"] - 160;
      $this->lbtitulo->Caption = $this->Caption;

      if(isset($_GET['pagina']))
         $this->hfpagina->Value = $_GET['pagina'];



      //estatus
      if($this->cbestatus->Count == 0)
      {
         $this->cbestatus->Clear();
         $sql = 'select idestatus as id, nombre from seserviciosestatus order by idestatus';
         $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
         while($row = mysql_fetch_array($rs))
         {
            $this->cbestatus->AddItem($row['nombre'], null , $row['id']);
         }
         $this->cbestatus->AddItem('SIN FACTURAR', null , 'SF');
         $this->cbestatus->AddItem('ABIERTOS', null , 'AB');
         $this->cbestatus->AddItem('CERRADOS', null , 'CR');
         $this->cbestatus->AddItem('TODOS', null , '0');
         $this->cbestatus->ItemIndex = 1;
         mysql_free_result($rs);

         $this->dtdesde->Text = FechaPrimero();
         $this->dthasta->Text = Fecha();

         //almacen
         $this->cbalmacen->Clear();
         $sql = 'select a.idalmacen id, a.nombrecorto as nombre from realmacen a';

         if(Derechos('TODALMACENES') != true)
            $sql = $sql . ' where a.idalmacen="' . $_SESSION['sesidalmacen'] . '"';
         else
            $sql = $sql . ' where a.idplaza="' . $_SESSION['sesidplaza'] . '"';

         $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
         while($row = mysql_fetch_array($rs))
            $this->cbalmacen->AddItem($row['nombre'], null , $row['id']);
         mysql_free_result($rs);
         $this->cbalmacen->AddItem('TODOS', null , '0');
         $this->cbalmacen->ItemIndex = 0;
      }


      $this->filtro();
   }

   function useserviciosvistaCreate($sender, $params)
   {
      if(Derechos('SEACCSERV') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para accesar a Servicios");
               document.location.href("menu.php");
               </script>';
         exit;
      }
   }

   function btnexportarJSClick($sender, $params)
   {
?>
       window.location='useservicios_ajax.php?Exportar=TraspasosAlmacen';
<?php
   }

   function useserviciosvistaJSLoad($sender, $params)
   {
?>
       validarEventos();
       grid.setWidth(document.body.offsetWidth - 40);
       grid.setHeight(document.body.offsetHeight - 200);
       vcl.$('lblpagina_outer').style.top=document.body.offsetHeight-50;

       grid.getTableColumnModel().setColumnWidth(0,30);  //col,width
       grid.getTableColumnModel().setColumnWidth(1,60);
       grid.getTableColumnModel().setColumnWidth(2,60);
       grid.getTableColumnModel().setColumnWidth(3,120);
       grid.getTableColumnModel().setColumnWidth(4,100);
       grid.getTableColumnModel().setColumnWidth(5,80);
       grid.getTableColumnModel().setColumnWidth(6,60);
       grid.getTableColumnModel().setColumnWidth(7,200);
       grid.getTableColumnModel().setColumnWidth(8,80);
       grid.getTableColumnModel().setColumnWidth(9,300);
<?php
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('SEALSERV') == false)
      {
         echo '<script language="javascript" type="text/javascript">
         alert("No puede Agregar Servicios");
         </script>';
      }
      else
         redirect("useservicios.php?idservicio=0");
   }

   function gridJSDblClick($sender, $params)
   {
?>
       var model = grid.getTableModel();
       var row = grid.getFocusedRow();
       var pagina=document.getElementById('hfpagina');
       if(pagina.value.length==0)
         document.location.href("useservicios.php?serie="+model.getValue(0, row)+
       "&idservicio="+model.getValue(1, row));
       else
         document.location.href(pagina.value+"?serie="+model.getValue(0, row)+
       "&idservicio="+model.getValue(1, row));


<?php
   }

   function btnbuscarClick($sender, $params)
   {
      $this->filtro();
   }

   function btngoClick($sender, $params)
   {
      if(is_numeric($this->edgo->Text))
         $this->sqltabla->LimitStart = ($this->edgo->Text - 1) * $this->sqltabla->LimitCount;
   }

   function btnregresarClick($sender, $params)
   {
      $this->sqltabla->LimitStart = $this->sqltabla->LimitStart - $this->sqltabla->LimitCount;
   }

   function btnsiguienteClick($sender, $params)
   {
      $this->sqltabla->LimitStart = $this->sqltabla->LimitStart + $this->sqltabla->LimitCount;
   }

   function filtro()
   {
      if($this->ckid->Checked)
         $cond = ' Where concat(s.serie, s.idservicio) = "' . strtoupper($this->edid->Text) . '" ';
      else
      {
         if($this->cbestatus->ItemIndex == '0')
            $cond = ' Where s.idestatus > 0 ';
         else
            if($this->cbestatus->ItemIndex == 'AB')
               $cond = ' where s.idestatus between 1 and 7 ';
         else
            if($this->cbestatus->ItemIndex == 'CR')
               $cond = ' where s.idestatus between 8 and 9 ';
         else
            $cond = ' Where s.idestatus =  ' . $this->cbestatus->ItemIndex . ' ';

         if($this->ckperiodo->Checked)
            $cond .= ' and s.fechacreacion between "' . $this->dtdesde->Text . '" and "' . $this->dthasta->Text . '" ';

         if(Derechos('TODALMACENES') != true)
            $cond = $cond . ' and a.idalmacen="' . $_SESSION['sesidalmacen'] . '"';
         else
            $cond = $cond . ' and a.idplaza="' . $_SESSION['sesidplaza'] . '"';
      }

      $from = 'from seservicios s
              left join realmacen a on a.idalmacen = s.idalmacen
              left join seserviciosestatus e on e.idestatus = s.idestatus
              left join setiposervicios t on t.idtiposervicio=s.idtiposervicio
              left join clientes c on c.idcliente=s.idcliente ';

      $sql = 'select count(*) as total ' . $from . $cond;

      $rs = mysql_query($sql)or die("Error de consulta SQL: " . $sql);
      $row = mysql_fetch_row($rs);
      $total = $row[0];
      $this->sqltabla->LimitCount = GetConfiguraciones('LimitCountGrids');
      $pagact = ($this->sqltabla->LimitStart + $this->sqltabla->LimitCount) / $this->sqltabla->LimitCount;
      $paginas = ceil($total / $this->sqltabla->LimitCount);

      $this->lblpagina->Caption = 'Total de Registros: ' . $total . ' Pagina ' . $pagact . ' de ' . $paginas;

      if($this->sqltabla->LimitCount < $total)
      {
         $this->btnsiguiente->Enabled = false;
         $this->btnregresar->Enabled = false;
      }

      if(($total - $this->sqltabla->LimitCount) > 0)
         $this->btnsiguiente->Enabled = true;

      if(($total - $this->sqltabla->LimitStart) > 0)
         $this->btnregresar->Enabled = true;

      if(($total - $this->sqltabla->LimitStart) < $this->sqltabla->LimitCount)
         $this->btnsiguiente->Enabled = false;

      if($this->sqltabla->LimitStart == 0)
         $this->btnregresar->Enabled = false;

      if($this->btnregresar->Enabled == false && $this->btnsiguiente->Enabled == false)
         $this->btngo->Enabled = false;
      else
         $this->btngo->Enabled = true;

      $this->sqltabla->close();

      $sql = 'select serie, idservicio, s.idfactura, e.nombre as estatus, t.nombre as tipo,
               a.nombrecorto as almacen, s.idcliente, ' . NombreCliente('c') . ' as cliente,
               s.fechacreacion, observaciones, s.totalmn ' . $from . $cond . ' order by idservicio desc';

      $this->sqltabla->SQL = $sql;
      $this->sqltabla->open();

      $_SESSION['sqlexp'] = $sql;

      if($this->sqltabla->RecordCount == 0)
      {
         $this->cbalmacen->ItemIndex = 0;
         //$this->cbestatus->ItemIndex = 1;
         echo '<script language="javascript" type="text/javascript">
            alert("No se encontraron datos");
            </script>';
         $this->sqltabla->LimitStart = 0;
      }
   }
}

global $application;

global $useserviciosvista;

//Creates the form
$useserviciosvista = new useserviciosvista($application);

//Read from resource file
$useserviciosvista->loadResource(__FILE__);

//Shows the form
$useserviciosvista->show();

?>