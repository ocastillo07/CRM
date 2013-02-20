<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");

require_once("vcl/vcl.inc.php");
//Includes
use_unit("mysql.inc.php");
use_unit("buttons.inc.php");
use_unit("dbgrids.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class upartesvista extends Page
{
   public $btnregra = null;
   public $hfidpromotor = null;
   public $hfidcliente = null;
   public $btnsiguiente = null;
   public $btnregresar = null;
   public $btngo = null;
   public $edgo = null;
   public $hfatencion = null;
   public $dgpartes = null;
   public $dspartes = null;
   public $lblpagina = null;
   public $pvista = null;
   public $Label2 = null;
   public $lbtitulo = null;
   public $sqlgen = null;
   public $cbfiltro = null;
   public $edfiltrar = null;
   public $btnFiltrar = null;
   public $Label1 = null;
   public $pbotones = null;
   public $sqlExportar;
   function upartesvistaJSLoad($sender, $params)
   {

   ?>
   //Add your javascript code here
   dgpartes.setWidth(document.body.offsetWidth - 40);
   dgpartes.setHeight(document.body.offsetHeight - 150);
   vcl.$('lblpagina_outer').style.top=document.body.offsetHeight-50;
   <?php

   }

   function btnregraClick($sender, $params)
   {
      redirect('upresupuestos.php');
   }

   function btnsiguienteClick($sender, $params)
   {
     $this->sqlgen->LimitStart =  $this->sqlgen->LimitStart + $this->sqlgen->LimitCount;
   }

   function btnregresarClick($sender, $params)
   {
   $this->sqlgen->LimitStart =  $this->sqlgen->LimitStart - $this->sqlgen->LimitCount;
   }

   function btngoClick($sender, $params)
   {
   	if(is_numeric($this->edgo->Text))
         $this->sqlgen->LimitStart = ($this->edgo->Text - 1) * $this->sqlgen->LimitCount;
   }


   function filtro()
   {
      $cond = '';
      switch($this->cbfiltro->ItemIndex)
      {
         case 1:
            //parte
            $cond = ' and cveparte like "%' . $this->edfiltrar->Text.'%"';
            break;
         case 2:
            //descripcion
            $cond = ' and descripcion like "%' . $this->edfiltrar->Text . '%" ';
            break;
			case 3:
            //linea
            $cond = ' and linea like "%' . $this->edfiltrar->Text . '%" ';
            break;
      }

      $this->sqlgen->close();
      $this->sqlgen->sql = "select count(*) as t from(SELECT cveparte,descripcion,
									costo,precio,linea FROM repartes where idalmacen=".$_SESSION['idalmacen']." ". $cond. " ) as t";
      $this->sqlgen->open();

      $total = $this->sqlgen->fieldget('t');
      $this->sqlgen->LimitCount = GetConfiguraciones('LimitCountGrids');
      $pagact = ($this->sqlgen->LimitStart + $this->sqlgen->LimitCount)/$this->sqlgen->LimitCount;
      $paginas = ceil($total / $this->sqlgen->LimitCount);

      $this->lblpagina->Caption = 'Total de Registros: ' . $total . ' Pagina ' . $pagact . ' de ' . $paginas;

      if($this->sqlgen->LimitCount < $total)
      {
         $this->btnsiguiente->Enabled = false;
         $this->btnregresar->Enabled = false;
      }

      if(($total - $this->sqlgen->LimitCount) > 0)
         $this->btnsiguiente->Enabled = true;

      if(($total - $this->sqlgen->LimitStart) > 0)
         $this->btnregresar->Enabled = true;

      if(($total - $this->sqlgen->LimitStart) < $this->sqlgen->LimitCount)
         $this->btnsiguiente->Enabled = false;

      if($this->sqlgen->LimitStart == 0)
         $this->btnregresar->Enabled = false;

      if($this->btnregresar->Enabled == false && $this->btnsiguiente->Enabled == false)
         $this->btngo->Enabled = false;
      else
         $this->btngo->Enabled = true;

      $this->sqlgen->SQL = " SELECT cveparte as CveParte,descripcion as Descripcion,
                           idalmacen as Almacen, costo as Costo,
									precio as Precio,linea as Linea FROM repartes
                           where idalmacen=".$_SESSION['idalmacen']." ".  $cond;
      $this->sqlgen->open();

      if($this->sqlgen->RecordCount == 0)
      {
         echo '<script language="javascript" type="text/javascript">
         alert("No se encontraron datos");
         </script>';
         $this->sqlgen->LimitStart = 0;
      }
   }

   function upartesvistaShow($sender, $params)
   {
      $this->lbtitulo->Caption = $this->Caption;
      $this->pbotones->Width = $_SESSION["width"];
      if(isset($_GET['atencion']))
		{
			$this->hfatencion->Value= $_GET['atencion'];
			$this->hfidcliente->Value = $_GET['idcliente'];
			 //promotores
      	$sql = 'select idusuario,concat(u.nombre," ",u.apaterno," ",u.amaterno) as promotor
					from usuarios u left join puestos p on u.idpuesto=p.idpuesto where p.idpuesto=24';
      	$rs = mysql_query($sql)or die('Error SQL: ' . $sql);
			$i=1; $promotor = 0;
      	while($row = mysql_fetch_array($rs))
      	{
				if($_GET['promotor']==$i)
					$promotor = $row[0];
				$i++;
			}
			$this->hfidpromotor->Value = $promotor;
			$this->cbfiltro->ItemIndex=2;
		}
		$this->filtro();

   }

   function dgpartesJSDblClick($sender, $params)
   {
?>
       //Add your javascript code here
       var model=dgpartes.getTableModel();
       var row=dgpartes.getFocusedRow();
	    document.location.href("upresupuestos.php?cveparte="+model.getValue(0, row)+
                              "&idalmacen="+model.getValue(2,row));

	<?php
      dmconexion::Log("Acceso a Partes", 1);
   }
}

global $application;

global $upartesvista;

//Creates the form
$upartesvista = new upartesvista($application);

//Read from resource file
$upartesvista->loadResource(__FILE__);

//Shows the form
$upartesvista->show();

?>