<?php
include("dmconexion.php");
include("urecursos.php");

session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");

require_once("vcl/vcl.inc.php");
//Includes
use_unit("mysql.inc.php");
use_unit("dbgrids.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class uinventario extends Page
{
   public $sqlexportar = null;
   public $btnexportar = null;
   public $hfidproducto = null;
   public $dsinventario = null;
   public $sqlinventario = null;
   public $lbtitulo = null;
   public $lblpagina = null;
   public $btnsiguiente = null;
   public $btnregresar = null;
   public $btngo = null;
   public $edgo = null;
   public $btnbuscar = null;
   public $cbofiltro = null;
   public $edbuscar = null;
   public $Label1 = null;
   public $pbotones = null;
   public $grid = null;
   function btnexportarClick($sender, $params)
   {
      if(Derechos('Exportar Inventario') == false)
      {
         echo '<script language="javascript" type="text/javascript">
                    alert(\' No tienes Derechos para Exportar Inventarios\');
                  </script>';
      }
      else
      {
         exportar($this->sqlexportar->sql, 'Inventario');
         redirect("uinventario.php");
         $this->sqlexportar->SQL = '';
      }


   }

   function uinventarioJSLoad($sender, $params)
   {

?>
       //Add your javascript code here
       grid.setWidth(document.body.offsetWidth - 40);
       grid.setHeight(document.body.offsetHeight - 150);
       vcl.$('lblpagina_outer').style.top=document.body.offsetHeight-50;
<?php

   }

   function btnsiguienteClick($sender, $params)
   {
      $this->sqlinventario->LimitStart = $this->sqlinventario->LimitStart + $this->sqlinventario->LimitCount;
   }

   function btnregresarClick($sender, $params)
   {
      $this->sqlinventario->LimitStart = $this->sqlinventario->LimitStart - $this->sqlinventario->LimitCount;
   }

   function btngoClick($sender, $params)
   {
      if(is_numeric($this->edgo->Text))
         $this->sqlinventario->LimitStart = ($this->edgo->Text - 1) * $this->sqlinventario->LimitCount;
   }

   function cbofiltroChange($sender, $params)
   {
      if($this->cbofiltro->ItemIndex == 0)
      {
         $this->edbuscar->Text = '';
         $this->filtro();
      }
   }

   function btnbuscarClick($sender, $params)
   {
      $this->filtro();
   }

   function filtro()
   {
      $nom = NombreCliente('c');
      switch($this->cbofiltro->ItemIndex)
      {
         case 1:
            //ID
            if(is_numeric($this->edbuscar->Text))
               $cond = ' and idproducto=' . $this->edbuscar->Text;
            else
               echo '<script language="javascript" type="text/javascript">
                             alert(\'No es un valor valido\');
                           </script>';
            break;
         case 2:
            //Clave
            $cond = ' and clave like "%' . $this->edbuscar->Text . '%"';
            break;
         case 3:
            //Existencias
            $cond = ' and existencias like "%' . $this->edbuscar->Text . '%"';
            break;
         case 4:
            //Backorder
            $cond = ' and backorder like "%' . $this->edbuscar->Text . '%"';
            break;
      }
      $sql = 'select count(*) from(
					select idproducto,clave as ClaveCamion,if(existencias is null,0,existencias) as Existencias,
					if(backorder is null,0,backorder) as Backorder
					from productos where (existencias>0 or backorder>0) ' . $cond . ') as t';
      $rs = mysql_query($sql)or die("Error de consulta SQL: " . $sql);
      $row = mysql_fetch_row($rs);
      $total = $row[0];
      $this->sqlinventario->LimitCount = GetConfiguraciones('LimitCountGrids');
      $pagact = ($this->sqlinventario->LimitStart + $this->sqlinventario->LimitCount) / $this->sqlinventario->LimitCount;
      $paginas = ceil($total / $this->sqlinventario->LimitCount);

      $this->lblpagina->Caption = 'Total de Registros: ' . $total . ' Pagina ' . $pagact . ' de ' . $paginas;

      if($this->sqlinventario->LimitCount < $total)
      {
         $this->btnsiguiente->Enabled = false;
         $this->btnregresar->Enabled = false;
      }
      if(($total - $this->sqlinventario->LimitCount) > 0)
         $this->btnsiguiente->Enabled = true;

      if(($total - $this->sqlinventario->LimitStart) > 0)
         $this->btnregresar->Enabled = true;

      if(($total - $this->sqlinventario->LimitStart) < $this->sqlinventario->LimitCount)
         $this->btnsiguiente->Enabled = false;

      if($this->sqlinventario->LimitStart == 0)
         $this->btnregresar->Enabled = false;

      if($this->btnregresar->Enabled == false && $this->btnsiguiente->Enabled == false)
         $this->btngo->Enabled = false;
      else
         $this->btngo->Enabled = true;

      $this->sqlinventario->close();
      $sql = 'select idproducto,clave as ClaveCamion,if(existencias is null,0,existencias) as Existencias,
					if(backorder is null,0,backorder) as Backorder
					from productos where (existencias>0 or backorder>0) ' . $cond;
      $this->sqlinventario->SQL = $sql;
      $this->sqlexportar->SQL = $sql;
      $this->sqlinventario->open();
      if($this->sqlinventario->RecordCount == 0)
      {
         $this->cbofiltro->ItemIndex = 0;
         echo '<script language="javascript" type="text/javascript">
            alert("No se encontraron datos");
            </script>';
         $this->sqlinventario->LimitStart = 0;
      }
   }

   function uinventarioCreate($sender, $params)
   {
      if(Derechos('Accesar Inventario') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para Accesar a Inventario");
               document.location.href("menu.php");
               </script>';
         exit;
      }
      else
         $this->filtro();
   }

   function uinventarioShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
   }


   function gridJSClick($sender, $params)
   {

?>
       //Add your javascript code here
         var model=grid.getTableModel();
         var row=grid.getFocusedRow();
         document.uinventario.hfidproducto.value= model.getValue(0, row);
<?php

   }

   function gridJSDblClick($sender, $params)
   {

?>
       //Add your javascript code here
         document.location.href("uproductos.php?idproducto="+document.getElementById("hfidproducto").value);
<?php
   }
}

global $application;

global $uinventario;

//Creates the form
$uinventario = new uinventario($application);

//Read from resource file
$uinventario->loadResource(__FILE__);

//Shows the form
$uinventario->show();

?>