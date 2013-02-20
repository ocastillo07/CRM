<script type='text/javascript' src='funciones.js'></script>
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
class upropuestasvista extends Page
{
   public $grid = null;
   public $lbtitulo = null;
   public $sqlexportar = null;
   public $btnexportar = null;
   public $hfcliente = null;
   public $hfidrevision = null;
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
   public $dspropuestas = null;
   public $sqlpropuestas = null;
   public $hfidpropuesta = null;
   public $btneliminar = null;
   public $btnnuevo = null;
   function upropuestasvistaJSLoad($sender, $params)
   {
?>
       grid.setWidth(document.body.offsetWidth - 40);
       grid.setHeight(document.body.offsetHeight - 150); //150
       vcl.$('lblpagina_outer').style.top=document.body.offsetHeight-50;

       grid.getTableColumnModel().setColumnWidth(0,65);  //col,width
			 grid.getTableColumnModel().setColumnWidth(1,60);
			 grid.getTableColumnModel().setColumnWidth(2,40);
			 grid.getTableColumnModel().setColumnWidth(3,60);
			 grid.getTableColumnModel().setColumnWidth(4,200);
			 grid.getTableColumnModel().setColumnWidth(5,200);
			 grid.getTableColumnModel().setColumnWidth(6,200);
			 grid.getTableColumnModel().setColumnWidth(7,60);
			 grid.getTableColumnModel().setColumnWidth(8,0);
			 grid.getTableColumnModel().setColumnWidth(9,60);
			 grid.getTableColumnModel().setColumnWidth(10,0);
			 grid.getTableColumnModel().setColumnWidth(11,80);
       grid.getTableColumnModel().setColumnWidth(12,0);
       grid.getTableColumnModel().setColumnWidth(13,80);

<?php
   }

   function btnsiguienteClick($sender, $params)
   {
      $this->sqlpropuestas->LimitStart = $this->sqlpropuestas->LimitStart + $this->sqlpropuestas->LimitCount;
   }

   function btnregresarClick($sender, $params)
   {
      $this->sqlpropuestas->LimitStart = $this->sqlpropuestas->LimitStart - $this->sqlpropuestas->LimitCount;
   }

   function btngoClick($sender, $params)
   {
      if(is_numeric($this->edgo->Text))
         $this->sqlpropuestas->LimitStart = ($this->edgo->Text - 1) * $this->sqlpropuestas->LimitCount;
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('Alta Propuestas') == false)
         echo '<script language="javascript" type="text/javascript">
            	alert("No puede dar de Alta propuestas");
            	</script>';
      else
         redirect("upropuestas.php?idpropuesta=0");
   }


   function btnexportarClick($sender, $params)
   {
      if(Derechos('Exportar Propuestas') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert(\' No tienes Derechos para Exportar Propuestas\');
               </script>';
      }
      else
      {
         exportar($this->sqlpropuestas->SQL, 'Propuestas');
      }
   }

   function btneliminarJSClick($sender, $params)
   {
?>
      if(!confirm('Desea Eliminar la Propuesta Seleccionada?'))
        return(false)

			var model=grid.getTableModel();
      var row=grid.getFocusedRow();
      document.location.href("upropuestas.php?idpropuesta="+model.getValue(0, row)+
			        							  "&idrevision="+model.getValue(1, row)+"&elim=1");
<?php
   }

   function btnbuscarClick($sender, $params)
   {
      $this->filtro();
   }

   function filtro()
   {
      switch($this->cbofiltro->ItemIndex)
      {
         case 1:
            //idpropuesta
            if(is_numeric($this->edbuscar->Text))
               $cond = ' and idpropuesta=' . $this->edbuscar->Text;
            else
               echo '<script language="javascript" type="text/javascript">
                     alert(\'No es un valor entero\');
                     </script>';
            break;
         case 2:
            //plaza
            $cond = ' and p.nombre like "%' . $this->edbuscar->Text . '%"';
            break;
         case 3:
            //Cliente
            $cond = ' and ' . $nom . ' like "%' . $this->edbuscar->Text . '%"';
            break;
         case 4:
            //vendedor
            $cond = ' and  '.NombreFisica('u').' like "%' .
            $this->edbuscar->Text . '%"';
            break;
         case 5:
            //vehiculo
            $cond = ' and vehiculo like "%' . $this->edbuscar->Text . '%"';
            break;
         case 6:
            //estatus
            $cond = ' and e.nombre like "%' . $this->edbuscar->Text . '%"';
            break;
         case 7:
            //plazo
            if(is_numeric($this->edbuscar->Text))
               $cond = ' and plazo="' . $this->edbuscar->Text . '"';
            else
               echo '<script language="javascript" type="text/javascript">
                    alert(\'No es un valor numerico\');
                    </script>';
            break;
         case 8:
            //tipo propuesta
            $cond = ' and tp.nombre like "%' . $this->edbuscar->Text . '%"';
            break;
      }

      $select = 'SELECT p.idpropuesta, p.idrevision, t.iniciales as tipo, p.idcliente, ' . NombreMoral('c') . ' as cliente,
                 p.atencion, p.vehiculo,  p.idvendedor, u.iniciales as vendedor, p.idplaza, pl.nombre as plaza,
                 p.idestatus, e.nombre as estatus, p.fechacreacion, p.recorrido, p.plazo, p.notas ';

      $from = 'from idlpropuestas p left join plazas pl on pl.idplaza=p.idplaza
              left join clientes c on c.idcliente=p.idcliente
              left join usuarios u on u.idusuario=p.idvendedor
              left join idlpropuestasestatus e on e.idestatus=p.idestatus
              left join idlpropuestastipos t on t.idtipopropuesta=p.idtipopropuesta
               where p.idpropuesta> 0  ';

      $sql = 'select count(*) as total ' . $from;

      if(Derechos('Todas las Propuestas') == true)
         $sql = $sql . ' and p.idplaza>0';
      else if(Derechos('Solo Propuestas Plaza') == true)
      {
         $plaza = 'select idplaza from usuarios where login="' . $_SESSION["login"] . '"';
         $rs = mysql_query($plaza)or die('Error de consulta SQL: ' . $plaza);
         $row = mysql_fetch_row($rs);
         $sql = $sql . ' and p.idplaza=' . $row[0];
      }
      else
         $sql = $sql . ' and login="' . $_SESSION["login"] . '" ';
      $sql = $sql . $cond . ' ORDER BY idpropuesta desc,idrevision desc';

      $rs = mysql_query($sql)or die("Error de consulta SQL: " . $sql);
      $row = mysql_fetch_row($rs);
      $total = $row[0];
      $this->sqlpropuestas->LimitCount = GetConfiguraciones('LimitCountGrids');
      $pagact = ($this->sqlpropuestas->LimitStart + $this->sqlpropuestas->LimitCount) / $this->sqlpropuestas->LimitCount;
      $paginas = ceil($total / $this->sqlpropuestas->LimitCount);

      $this->lblpagina->Caption = 'Total de Registros: ' . $total . ' Pagina ' . $pagact . ' de ' . $paginas;

      if($this->sqlpropuestas->LimitCount < $total)
      {
         $this->btnsiguiente->Enabled = false;
         $this->btnregresar->Enabled = false;
      }
      if(($total - $this->sqlpropuestas->LimitCount) > 0)
         $this->btnsiguiente->Enabled = true;

      if(($total - $this->sqlpropuestas->LimitStart) > 0)
         $this->btnregresar->Enabled = true;

      if(($total - $this->sqlpropuestas->LimitStart) < $this->sqlpropuestas->LimitCount)
         $this->btnsiguiente->Enabled = false;

      if($this->sqlpropuestas->LimitStart == 0)
         $this->btnregresar->Enabled = false;

      if($this->btnregresar->Enabled == false && $this->btnsiguiente->Enabled == false)
         $this->btngo->Enabled = false;
      else
         $this->btngo->Enabled = true;

      $this->sqlpropuestas->close();

      $sql = $select . $from;
      if(Derechos('Todas las propuestas'))
         $sql = $sql . ' and p.idplaza>0';
      else if(Derechos('Solo Propuestas Plaza'))
      {
         $plaza = 'select idplaza from usuarios where login="' . $_SESSION["login"] . '"';
         $rs = mysql_query($plaza)or die('Error de consulta SQL: ' . $plaza);
         $row = mysql_fetch_row($rs);
         $sql = $sql . ' and p.idplaza=' . $row[0];
      }
      else
         $sql = $sql . ' and login="' . $_SESSION["login"] . '" ';
      $sql = $sql . $cond . ' ORDER BY idpropuesta desc, idrevision desc';

      $this->sqlpropuestas->SQL = $sql;
      $this->sqlexportar->SQL = $sql;
      $this->sqlpropuestas->open();

      if($this->sqlpropuestas->RecordCount == 0)
      {
         $this->cbofiltro->ItemIndex = 0;
         echo '<script language="javascript" type="text/javascript">
            alert("No se encontraron datos");
            </script>';
         $this->sqlpropuestas->LimitStart = 0;
      }
   }

   function upropuestasvistaCreate($sender, $params)
   {
      if(Derechos('Accesar Propuestas') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para Accesar Propuestas");
               document.location.href("menu.php");
               </script>';
         exit;
      }
      else
         $this->filtro();
   }

   function upropuestasvistaShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
   }


   function gridJSClick($sender, $params)
   {
?>
         var model=grid.getTableModel();
         var row=grid.getFocusedRow();
         document.upropuestasvista.hfidpropuesta.value =model.getValue(0, row);
         document.upropuestasvista.hfidrevision.value= model.getValue(1,row);
         document.upropuestasvista.hfcliente.value= model.getValue(4,row);
<?php
   }

   function gridJSDblClick($sender, $params)
   {
?>
         document.location.href("upropuestas.php?idpropuesta="+document.getElementById("hfidpropuesta").value+
         "&idrevision="+document.getElementById("hfidrevision").value);
<?php
   }


}

global $application;

global $upropuestasvista;

//Creates the form
$upropuestasvista = new upropuestasvista($application);

//Read from resource file
$upropuestasvista->loadResource(__FILE__);

//Shows the form
$upropuestasvista->show();

?>