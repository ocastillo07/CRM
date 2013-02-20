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
class uclientesgdsvista extends Page
{
   public $sqlgen = null;
   public $dsclientes = null;
   public $dgclientes = null;
   public $lblpagina = null;
   public $edbuscar = null;
   public $hfidpromotor = null;
   public $hfatencion = null;
   public $cbord = null;
   public $Label4 = null;
   public $cbordenar = null;
   public $Label3 = null;
   public $Label2 = null;
   public $lbtitulo = null;
   public $edgo = null;
   public $btngo = null;
   public $btnregresar = null;
   public $btnsiguiente = null;
   public $cbfiltro = null;
   public $btnFiltrar = null;
   public $Label1 = null;
   public $pbotones = null;
   public $sqlExportar;
   function uclientesgdsvistaJSLoad($sender, $params)
   {

   ?>
   //Add your javascript code here
   dgclientes.setWidth(document.body.offsetWidth - 40);
   dgclientes.setHeight(document.body.offsetHeight - 160); //150
   vcl.$('lbpagina_outer').style.top = document.body.offsetHeight-50;
   <?php

   }

   function dgclientesJSClick($sender, $params)
   {

   ?>
   //Add your javascript code here
   dgclientes.setWidth(document.body.offsetWidth - 40);
   dgclientes.setHeight(document.body.offsetHeight - 150);
   vcl.$('lblpagina_outer').style.top=document.body.offsetHeight-50;
   <?php

   }



   function btngoClick($sender, $params)
   {
      if(is_numeric($this->edgo->Text))
         $this->sqlgen->LimitStart = ($this->edgo->Text - 1) * $this->sqlgen->LimitCount;
   }

   function btnregresarClick($sender, $params)
   {
      $this->sqlgen->LimitStart = $this->sqlgen->LimitStart - $this->sqlgen->LimitCount;
   }

   function btnsiguienteClick($sender, $params)
   {
      $this->sqlgen->LimitStart = $this->sqlgen->LimitStart + $this->sqlgen->LimitCount;
   }

   function filtro()
   {
      $cond = '';
      switch($this->cbfiltro->ItemIndex)
      {
         case 1:
            //rsocial
            $cond = ' where rsocial like "%' . $this->edbuscar->Text.'%"';
            break;
         case 2:
            //nombre
            $cond = ' where nombre like"%' . $this->edbuscar->Text . '%" ';
            break;
			case 3:
            //apaterno
            $cond = ' where apaterno like"%' . $this->edbuscar->Text . '%" ';
            break;
			case 4:
            //amaterno
            $cond = ' where amaterno like"%' . $this->edbuscar->Text . '%" ';
            break;
			case 5:
            //rfc
            $cond = ' where rfc like"%' . $this->edbuscar->Text . '%" ';
            break;
			case 6:
            //direccion
            $cond = ' where direccion like"%' . $this->edbuscar->Text . '%" ';
            break;
			case 7:
            //nombre
            $cond = ' where cp like"%' . $this->edbuscar->Text . '%" ';
            break;
			case 8:
            //nombre
            $cond = ' where municipio like"%' . $this->edbuscar->Text . '%" ';
            break;
			case 9:
            //nombre
            $cond = ' where colonia like"%' . $this->edbuscar->Text . '%" ';
            break;
			case 10:
            //nombre
            $cond = ' where municipio like"%' . $this->edbuscar->Text . '%" ';
            break;
			case 11:
            //nombre
            $cond = ' where estado like"%' . $this->edbuscar->Text . '%" ';
            break;
			case 12:
            //nombre
            $cond = ' where tel1 like"%' . $this->edbuscar->Text . '%" ';
            break;
			case 13:
            //nombre
            $cond = ' where tel2 like"%' . $this->edbuscar->Text . '%" ';
            break;
			case 14:
            //nombre
            $cond = ' where email like"%' . $this->edbuscar->Text . '%" ';
            break;
      }

      if($this->cbordenar->ItemIndex != '0')
         $orden = 'order by ' . $this->cbordenar->ItemIndex . ' ' . $this->cbord->ItemIndex;
      else
         $orden = '';

      $this->sqlgen->close();
      $this->sqlgen->sql = "select count(*) as total from(SELECT c.idcliente,c.rsocial,c.nombre,c.apaterno,c.amaterno,
		 							c.rfc,c.direccion,c.cp,c.colonia,c.municipio,
									c.estado,c.persona,c.estatus,c.alta,c.tel1,c.tel2,c.email
									FROM clientesgds AS c " . $cond. ") as t ";// . $orden;
      $this->sqlgen->open();

      $total = $this->sqlgen->fieldget('total');
      $this->sqlgen->LimitCount = GetConfiguraciones('LimitCountGrids');
      $pagact = ($this->sqlgen->LimitStart + $this->sqlgen->LimitCount) / $this->sqlgen->LimitCount;
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


      $this->sqlgen->SQL = " SELECT c.idcliente,c.rsocial,c.nombre,c.apaterno,c.amaterno,
		 		c.rfc,c.direccion,c.cp,c.colonia,c.municipio,
				c.estado,c.persona,c.estatus,c.alta,c.tel1,c.tel2,c.email
				FROM clientesgds AS c " . $cond ." " . $orden;

      $result = mysql_query($this->sqlgen->SQL)or die("error sql: " . $sql . " " . mysql_error());

      if($this->sqlgen->RecordCount == 0)
      {
         echo '<script language="javascript" type="text/javascript">
         alert("No se encontraron datos");
         </script>';
         $this->sqlgen->LimitStart = 0;
      }
   }

   function uclientesgdsvistaShow($sender, $params)
   {
      $this->lbtitulo->Caption = $this->Caption;
      $this->pbotones->Width = $_SESSION["width"];
      $this->filtro();
		$this->hfatencion->Value= $_GET['atencion'];
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
   }

   function dgclientesJSDblClick($sender, $params)
   {
?>
       //Add your javascript code here
       var model=dgclientes.getTableModel();
       var row=dgclientes.getFocusedRow();
       document.location.href("upresupuestos.php?idcliente="+model.getValue(0, row));

	<?php
      dmconexion::Log("Acceso a clientes", 1);
   }
}

global $application;

global $uclientesgdsvista;

//Creates the form
$uclientesgdsvista = new uclientesgdsvista($application);

//Read from resource file
$uclientesgdsvista->loadResource(__FILE__);

//Shows the form
$uclientesgdsvista->show();

?>