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
class uclientesvista extends Page
{
   public $lbpagina = null;
   public $tblclientes = null;
   public $sqlgen = null;
   public $dsclientes = null;
   public $dgclientes = null;
   public $cbord = null;
   public $Label4 = null;
   public $cbordenar = null;
   public $Label3 = null;
   public $Label2 = null;
   public $btnexportar = null;
   public $lbtitulo = null;
   public $hftabla = null;
   public $edgo = null;
   public $btngo = null;
   public $btnregresar = null;
   public $btnsiguiente = null;
   public $cbfiltro = null;
   public $edfiltrar = null;
   public $btnFiltrar = null;
   public $Label1 = null;
   public $btneliminar = null;
   public $btnnuevo = null;
   public $hfpagina = null;
   public $pbotones = null;
   public $hfidcliente = null;
   public $sqlExportar;
   function uclientesvistaJSLoad($sender, $params)
   {

   ?>
   //Add your javascript code here
   dgclientes.setWidth(document.body.offsetWidth - 40);
   dgclientes.setHeight(document.body.offsetHeight - 160); //150
   vcl.$('lbpagina_outer').style.top = document.body.offsetHeight-50;
   <?php

   }

   function btnFiltrarClick($sender, $params)
   {
      redirect("uclientesvista.php?pagina=" . $this->hfpagina->Value);
   }


   function btnexportarClick($sender, $params)
   {
      if(Derechos('Exportar Clientes') == false)
      {
         echo '<script language="javascript" type="text/javascript">
                    alert(\' No tienes Derechos para Exportar Clientes\');
                  </script>';
      }
      else
      {
         exportar($this->sqlgen->sql, 'Clientes');
         $this->sqlexportar->SQL = '';
      }
   }

   function btngoClick($sender, $params)
   {
      if(is_numeric($this->edgo->Text))
         $this->tblclientes->LimitStart = ($this->edgo->Text - 1) * $this->tblclientes->LimitCount;
   }

   function btnregresarClick($sender, $params)
   {
      $this->tblclientes->LimitStart = $this->tblclientes->LimitStart - $this->tblclientes->LimitCount;
   }

   function btnsiguienteClick($sender, $params)
   {
      $this->tblclientes->LimitStart = $this->tblclientes->LimitStart + $this->tblclientes->LimitCount;
   }

   function btneliminarJSClick($sender, $params)
   {
?>
       //Add your javascript code here
         if(!confirm('Desea Eliminar el Cliente Seleccionado?'))
         {
            return(false);
         }
       var model=dgclientes.getTableModel();
       var row=dgclientes.getFocusedRow();
       document.location.href("uclientes.php?idcliente="+model.getValue(0, row)+"&elim=1");
<?php
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('Alta Clientes') == false)
         echo '<script language="javascript" type="text/javascript">
            alert("No puede dar de Alta Clientes");
            </script>';
      else
         redirect("uclientes.php?idcliente=0");
   }

   function uclientesvistaCreate($sender, $params)
   {
      if(Derechos('Accesar Clientes') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para accesar a clientes");
               document.location.href("menu.php");
               </script>';
         exit;
      }
   }

   function filtro()
   {
      $nom = NombreCliente('c');
      $vend = NombreFisica('u');
      $vendref = NombreFisica('vr');
      if($this->cbfiltro->ItemIndex != '0')
         $cond = 'having ' . $this->cbfiltro->ItemIndex . ' like "%' . $this->edfiltrar->Text . '%"';
      else
         $cond = '';

      if($this->cbordenar->ItemIndex != '0')
         $orden = 'order by ' . $this->cbordenar->ItemIndex . ' ' . $this->cbord->ItemIndex;
      else
         $orden = '';

       if($this->hfpagina->Value != 'uclientes.php')
         $estatus = ' where c.idestatus<>3';
      else
         $estatus = '';

      if(Derechos('TODCLI') == true)
         $porusuario = '';
      else
         $porusuario = ' ';


      $this->sqlgen->close();
      $sql = "Select count(*) as total from (
		  Select idcliente as NumCliente, Nombre, nomComercial as NomComercial, rfc as RFC,
		  concat(if(direccion is null,'',direccion),' ',if(numero is null,'',numero)) as Direccion, colonia as Colonia, cp as CP,
		  municipio as Municipio, estado as Estado, idgds as IDGDS, alta as FechaAlta, telefono as Tel,
		  fax as Fax, c.email as Correo,
        sum(Thortons) as Thortons, sum(Rabones) as Rabones, sum(Autobuses) as Autobuses,
        sum(Tractocamiones) as Tractocamiones, sum(Ligeros) as Ligeros,
        if(sum(ClientesdeVentas)>0, 'SI', 'NO') as ClientesdeVentas,
        if(sum(PasajeUrbano)>0, 'SI', 'NO')  as PasajeUrbano,
        if(sum(RefMXL)>0, 'SI', 'NO')  as RefMXL,
        if(sum(SocioDiamante)>0, 'SI', 'NO')  as SocioDiamante,
        if(sum(RefTIJ) >0, 'SI', 'NO') as RefTIJ,
        if(sum(RefENS) >0, 'SI', 'NO') as RefENS,
        estatus as Estatus, persona as Persona, vendedor as Vendedor,
		  vendref as VendRef, sector as Sector from (
        Select c.idcliente,  " . $nom . " as Nombre, c.nomComercial, c.rfc, c.direccion, c.numero,
        c.colonia, c.cp, c.municipio, c.estado, if(activado = 1, 'Activado', 'Sin Activar') as activado,
        c.idgds, alta, telefono, fax, c.email,
        if(ct.nombre='Thortons', cf.cantidad, 0) as Thortons,
        if(ct.nombre='Rabones', cf.cantidad, 0) as Rabones,
        if(ct.nombre='Autobuses', cf.cantidad, 0) as Autobuses,
        if(ct.nombre='Tractocamiones', cf.cantidad, 0) as Tractocamiones,
        if(ct.nombre='Ligeros', cf.cantidad, 0) as Ligeros,
        if(g.nombre='Clientes de Ventas', 1, 0) as ClientesdeVentas,
        if(g.nombre='Pasaje Urbano' , 1, 0) as PasajeUrbano,
        if(g.nombre='Ref MXL' , 1, 0) as RefMXL,
        if(g.nombre='Socio Diamante' , 1, 0) as SocioDiamante,
        if(g.nombre='Ref TIJ' , 1, 0) as RefTIJ,
        if(g.nombre='Ref ENS' , 1, 0) as RefENS,
        e.nombre as estatus, c.persona, " . $vend . " as vendedor, " . $vendref . " as vendref, sec.nombre as sector
        from clientes c left join estatusclientes e on e.idestatus=c.idestatus
        left join clasificaciones sec on sec.idclasificacion=c.idsector
        left join usuarios u on u.idusuario=c.idvendcam left join usuarios vr on vr.idusuario=c.idvendref
        left join clientesflotilla cf on cf.idcliente=c.idcliente left join camionestipos ct on ct.idtipo=cf.idtipo
        left join clientesgrupos cg on cg.idcliente=c.idcliente left join clasificaciones g on g.idclasificacion=cg.idgrupo
        ".$estatus.") as c  group by idcliente " . $cond . " ) as t " . $orden;
      $this->sqlgen->SQL = $sql;
      $this->sqlgen->open();

      $total = $this->sqlgen->fieldget('total');
      $this->tblclientes->LimitCount = GetConfiguraciones('LimitCountGrids');
      $pagact = ($this->tblclientes->LimitStart + $this->tblclientes->LimitCount) / $this->tblclientes->LimitCount;
      $paginas = ceil($total / $this->tblclientes->LimitCount);

      $this->lbpagina->Caption = 'Total de Registros: ' . $total . ' Pagina ' . $pagact . ' de ' . $paginas;

      if($this->tblclientes->LimitCount < $total)
      {
         $this->btnsiguiente->Enabled = false;
         $this->btnregresar->Enabled = false;
      }

      if(($total - $this->tblclientes->LimitCount) > 0)
         $this->btnsiguiente->Enabled = true;

      if(($total - $this->tblclientes->LimitStart) > 0)
         $this->btnregresar->Enabled = true;

      if(($total - $this->tblclientes->LimitStart) < $this->tblclientes->LimitCount)
         $this->btnsiguiente->Enabled = false;

      if($this->tblclientes->LimitStart == 0)
         $this->btnregresar->Enabled = false;

      if($this->btnregresar->Enabled == false && $this->btnsiguiente->Enabled == false)
         $this->btngo->Enabled = false;
      else
         $this->btngo->Enabled = true;


      $this->hftabla->Value = "tmpCtes" . $_SESSION['idusuario'];

      $sql = "Drop table if exists " . $this->hftabla->Value;
      $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

      $this->sqlgen->SQL = " Select idcliente as NumCliente, Nombre, nomComercial as NomComercial, rfc as RFC,
		  concat(if(direccion is null,'',direccion),' ',if(numero is null,'',numero)) as Direccion, colonia as Colonia, cp as CP,
		  municipio as Municipio, estado as Estado, idgds as IDGDS, alta as FechaAlta, telefono as Tel,
		  fax as Fax, c.email as Correo,
        sum(Thortons) as Thortons, sum(Rabones) as Rabones, sum(Autobuses) as Autobuses,
        sum(Tractocamiones) as Tractocamiones, sum(Ligeros) as Ligeros,
        if(sum(ClientesdeVentas)>0, 'SI', 'NO') as ClientesdeVentas,
        if(sum(PasajeUrbano)>0, 'SI', 'NO')  as PasajeUrbano,
        if(sum(RefMXL)>0, 'SI', 'NO')  as RefMXL,
        if(sum(SocioDiamante)>0, 'SI', 'NO')  as SocioDiamante,
        if(sum(RefTIJ) >0, 'SI', 'NO') as RefTIJ,
        if(sum(RefENS) >0, 'SI', 'NO') as RefENS,
        estatus as Estatus, persona as Persona, vendedor as Vendedor,
		  vendref as VendRef, sector as Sector from (
        Select c.idcliente,  " . $nom . " as Nombre, c.nomComercial, c.rfc, c.direccion, c.numero,
        c.colonia, c.cp, c.municipio, c.estado, if(activado = 1, 'Activado', 'Sin Activar') as activado,
        c.idgds, alta, telefono, fax, c.email,
        if(ct.nombre='Thortons', cf.cantidad, 0) as Thortons,
        if(ct.nombre='Rabones', cf.cantidad, 0) as Rabones,
        if(ct.nombre='Autobuses', cf.cantidad, 0) as Autobuses,
        if(ct.nombre='Tractocamiones', cf.cantidad, 0) as Tractocamiones,
        if(ct.nombre='Ligeros', cf.cantidad, 0) as Ligeros,
        if(g.nombre='Clientes de Ventas', 1, 0) as ClientesdeVentas,
        if(g.nombre='Pasaje Urbano' , 1, 0) as PasajeUrbano,
        if(g.nombre='Ref MXL' , 1, 0) as RefMXL,
        if(g.nombre='Socio Diamante' , 1, 0) as SocioDiamante,
        if(g.nombre='Ref TIJ' , 1, 0) as RefTIJ,
        if(g.nombre='Ref ENS' , 1, 0) as RefENS,
        e.nombre as estatus, c.persona, " . $vend . " as vendedor, " . $vendref . " as vendref, sec.nombre as sector
        from clientes c left join estatusclientes e on e.idestatus=c.idestatus
        left join clasificaciones sec on sec.idclasificacion=c.idsector
        left join usuarios u on u.idusuario=c.idvendcam left join usuarios vr on vr.idusuario=c.idvendref
        left join clientesflotilla cf on cf.idcliente=c.idcliente left join camionestipos ct on ct.idtipo=cf.idtipo
        left join clientesgrupos cg on cg.idcliente=c.idcliente left join clasificaciones g on g.idclasificacion=cg.idgrupo
        ".$estatus.") as c  group by idcliente " . $cond . " " . $orden;

      $sql = "Create table " . $this->hftabla->Value . ' ' . $this->sqlgen->SQL;
      $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
      $this->RellenaLista();
      $this->RellenaGrid();

      if($this->tblclientes->RecordCount == 0)
      {
         //$this->cbfiltro->ItemIndex = 3;
         echo '<script language="javascript" type="text/javascript">
         alert("No se encontraron datos");
         </script>';
         $this->tblclientes->LimitStart = 0;
      }
   }

   function RellenaGrid()
   {
      $this->tblclientes->TableName = $this->hftabla->Value;//$params;
      $this->tblclientes->Active = false;
      $this->tblclientes->Active = true;
   }

   function RellenaLista()
   {
      $sql = "Describe " . $this->hftabla->Value;
      $rs = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
      $this->cbfiltro->Clear();
      $this->cbordenar->Clear();
      $this->cbfiltro->AddItem('Todos', null , '0');
      $this->cbordenar->AddItem('Todos', null , '0');
      while($row = mysql_fetch_array($rs))
      {
         $this->cbfiltro->AddItem($row[0], null , $row[0]);
         $this->cbordenar->AddItem($row[0], null , $row[0]);
      }

      $this->cbfiltro->ItemIndex = 'NomComercial';
   }

   function uclientesvistaShow($sender, $params)
   {
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET['pagina']))
         $this->hfpagina->Value = $_GET['pagina'];
      //else
      //	$this->hfpagina->Value="";
      $this->pbotones->Width = $_SESSION["width"];

      $this->filtro();
   }

   function dgclientesJSDblClick($sender, $params)
   {
?>
       //Add your javascript code here
       var model=dgclientes.getTableModel();
       var row=dgclientes.getFocusedRow();
       var pagina=document.getElementById('hfpagina').value;
		 //alert(pagina.length+ ' '+pagina);
       if(pagina.length=='0')
         document.location.href("uclientes.php?idcliente="+model.getValue(0, row));
       else
         document.location.href(pagina+"?idcliente="+model.getValue(0, row));

<?php
      dmconexion::Log("Acceso a clientes", 1);
   }
}

global $application;

global $uclientesvista;

//Creates the form
$uclientesvista = new uclientesvista($application);

//Read from resource file
$uclientesvista->loadResource(__FILE__);

//Shows the form
$uclientesvista->show();

?>