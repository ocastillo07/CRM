<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
{
   redirect("login.php");
}
require_once("vcl/vcl.inc.php");
//Includes
use_unit("db.inc.php");
use_unit("mysql.inc.php");
use_unit("dbgrids.inc.php");
use_unit("buttons.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class uusuariosvista extends Page
{
   public $cbplaza = null;
   public $cbpuesto = null;
   public $cbarea = null;
   public $Label5 = null;
   public $Label4 = null;
   public $Label3 = null;
   public $Label2 = null;
   public $hfpagina = null;
   public $grid = null;
   public $btnbuscar = null;
   public $cbofiltro = null;
   public $edbuscar = null;
   public $Label1 = null;
   public $dspuestos = null;
   public $sqlpuestos = null;
   public $lbtitulo = null;
   public $pbotones = null;
   public $btnnuevo = null;
   public $btnderechos = null;
   public $btneliminar = null;
   public $hfidus = null;
   function uusuariosvistaJSLoad($sender, $params)
   {
?>
    grid.setWidth(document.body.offsetWidth - 40);
    grid.setHeight(document.body.offsetHeight - 150);
<?php
   }

   function filtro()
   {
      $cond = ' where idusuario is not null ';
      switch($this->cbofiltro->ItemIndex)
      {
         case 1:
            //idusuario
            if(is_numeric($this->edbuscar->Text))
               $cond .= ' and idusuario=' . $this->edbuscar->Text . ' ';
            else
               echo '<script language="javascript" type="text/javascript">
                             alert(\'No es un valor valido\');
                           </script>';
            break;
         case 2:
            //iniciales
            $cond .= ' and iniciales like "%' . $this->edbuscar->Text . '%" ';
            break;
         case 3:
            //nombre
            $nombre = NombreFisica('u');
            $cond .= ' and nombre like "%' . $this->edbuscar->Text . '%" ';
            break;
         case 4:
            //estatus
            $cond .= ' and estatus like "%' . $this->edbuscar->Text . '%" ';
            break;
      }

      if($this->cbplaza->ItemIndex > 0)
         $cond .= ' and idplaza like ' . $this->cbplaza->ItemIndex . ' ';

      if($this->cbarea->ItemIndex > 0)
         $cond .= ' and idarea like ' . $this->cbarea->ItemIndex . ' ';

      if($this->cbpuesto->ItemIndex > 0)
         $cond .= ' and idpuesto like ' . $this->cbpuesto->ItemIndex . ' ';


      $this->sqlpuestos->close();
      $nombre = NombreFisica('u');
      $sql = 'Select u.idusuario, u.iniciales, ' . $nombre . ' as nombre, pl.nombre as plaza,
      a.nombre as area, p.nombre as puesto, if(u.estatus = 1, "Activo", "Inactivo") as estatus,
      u.idplaza, u.idarea, u.idpuesto
      from usuarios u left join areas a on a.idarea=u.idarea
      left join puestos p on p.idpuesto=u.idpuesto left join plazas pl on pl.idplaza=u.idplaza
	where u.tipo = "U"
      order by area, puesto, u.nombre';
      $this->sqlpuestos->sql = 'select * from (' . $sql . ' ) as t ' . $cond;
      $this->sqlpuestos->open();
   }


   function btneliminarJSClick($sender, $params)
   {

?>
       if(!confirm('Desea Eliminar el Usuario Seleccionado?'))
            return(false);
       var model=grid.getTableModel();
       var row=grid.getFocusedRow();
       document.location.href("uusuarios.php?idusr="+model.getValue(0, row)+"&elim=1");
<?php
   }

   function btnderechosJSClick($sender, $params)
   {
?>
       //Add your javascript code here
       var model=grid.getTableModel();
       var row=grid.getFocusedRow();
       var pagina = vcl.$('hfpagina').value;
       if(pagina == '')
        document.location.href("uusuariosderechos.php?idusr="+model.getValue(0, row));
       else
        document.location.href(pagina+"?idusr="+model.getValue(0, row));

<?php
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('Alta Usuarios') == false)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("No puede Agregar Usuarios");
              </script>';
      }
      else
         redirect("uusuarios.php?idusr=0");
   }

   function gridJSDblClick($sender, $params)
   {

?>
       var model = grid.getTableModel();
       var row=grid.getFocusedRow();
       var pagina = vcl.$('hfpagina').value;

       vcl.$('hfidus').value = model.getValue(0, row);
       if(pagina == '')
          document.location.href("uusuarios.php?idusr="+model.getValue(0, row));
       else
          document.location.href(pagina+"?idusr="+model.getValue(0, row));
<?php
   }


   function uusuariosvistaShow($sender, $params)
   {
     

      $this->cbofiltro->ItemIndex = 3;
      $this->pbotones->Width = $_SESSION["width"];
      $this->inicializa();

      if(isset($_GET['pagina']))
         $this->hfpagina->Value = $_GET['pagina'];

      if(isset($_GET['idarea']))
         $this->cbarea->ItemIndex = $_GET['idarea'];

      if(isset($_GET['idpuesto']))
         $this->cbpuesto->ItemIndex = $_GET['idpuesto'];

      if(isset($_GET['idplaza']))
         $this->cbplaza->ItemIndex = $_GET['idplaza'];

       if($this->hfpagina->value == '')
		{
      if(Derechos('Accesar Usuarios') == false)
      {
         $sql = 'Select idusuario from usuarios where login="' . $_SESSION["login"] . '"';
         $rs = mysql_query($sql)or die('Error de sql ' . $sql);
         $row = mysql_fetch_row($rs);
         redirect("uusuarios.php?idusr=" . $row[0]);
      }
}


      $this->lbtitulo->Caption = $this->Caption;
      $this->filtro();
   }

   function inicializa()
   {
      //plazas
      $sql = 'Select nombre, idplaza from plazas';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $this->cbplaza->Clear();
      $this->cbplaza->AddItem("", null , null);
      while($row = mysql_fetch_array($rs))
         $this->cbplaza->AddItem($row["nombre"], null ,$row["idplaza"]);

      //areas
      $sql = 'Select idarea, nombre from areas order by nombre';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $this->cbarea->Clear();
      while($row = mysql_fetch_array($rs))
         $this->cbarea->AddItem($row["nombre"], null ,$row["idarea"]);

      //puesto
      $sql = 'Select idpuesto, nombre from puestos order by nombre';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $this->cbpuesto->Clear();
      $this->cbpuesto->AddItem("", null , null);
      while($row = mysql_fetch_array($rs))
         $this->cbpuesto->AddItem($row["nombre"], null ,$row["idpuesto"]);
   }


}

global $application;

global $uusuariosvista;

//Creates the form
$uusuariosvista = new uusuariosvista($application);

//Read from resource file
$uusuariosvista->loadResource(__FILE__);

//Shows the form
$uusuariosvista->show();

?>