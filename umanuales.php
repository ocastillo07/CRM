<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
require_once("vcl/vcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class umanuales extends Page
{
   public $Label3 = null;
   public $Label2 = null;
   public $Label1 = null;
   public $hfserver = null;
   public $hfpath = null;
   public $lbarchivos = null;
   public $lbcontenido = null;
   public $lbtitulos = null;
   public $pbotones = null;
   public $lbtitulo = null;
   public $btnregresar = null;
   function umanualesCreate($sender, $params)
   {
      if(Derechos('Accesar Manuales') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para accesar a Manuales");
               document.location.href("menu.php");
               </script>';
         exit;
      }
   }

   function lbtitulosClick($sender, $params)
   {
      $this->lbarchivos->Clear();
      $this->lbcontenido->Clear();
      $rsm = "select mc.nombre, mc.idcontador,mid(mc.nombre, locate('-',mid(mc.nombre, locate('-',mc.nombre) +1, length(mc.nombre)))+1,locate('-',mid(mc.nombre, locate('-',mc.nombre) +1, length(mc.nombre))) -1)  as num,
mid(mc.nombre, locate('-',mid(mc.nombre, locate('-',mc.nombre) +1, length(mc.nombre)))+1,locate(' ',mid(mc.nombre, locate('-',mc.nombre) +1, length(mc.nombre)))+1 -2) as num1,
concat(mid(mc.nombre, locate('-',mid(mc.nombre, locate('-',mc.nombre) +1, length(mc.nombre)))+1,(locate(' ',mid(mc.nombre, locate('-',mc.nombre) +1, length(mc.nombre)))+1)-
(locate('-',mid(mc.nombre, locate('-',mc.nombre) +1, length(mc.nombre)))+1 ) ),
left(mc.nombre, locate('-',mid(mc.nombre, locate('-',mc.nombre) +1, length(mc.nombre))) -1) ) as primero
					from manuales_contenido mc
					left join manuales_archivos ma on ma.idcontenido=mc.idcontador
					left join manuales_derechos de on de.idmanual=ma.idcontador
					where idpuesto=" . $_SESSION['idpuesto'] . " and mc.idtitulo= " .
      $this->lbtitulos->ItemIndex . " order by primero, num, num1";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      while($row = mysql_fetch_array($r))
         $this->lbcontenido->AddItem($row['nombre'], null , $row['idcontador']);
   }

   function lbcontenidoClick($sender, $params)
   {
      $rsm = "select ma.archivo, ma.idcontador
					from manuales_archivos ma
					left join manuales_derechos de on de.idmanual=ma.idcontador
					where idpuesto=" . $_SESSION['idpuesto'] . " and ma.idcontenido=" .
      $this->lbcontenido->ItemIndex . " order by archivo";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $this->lbarchivos->Clear();
      while($row = mysql_fetch_array($r))
         $this->lbarchivos->AddItem($row['archivo'], null , codificacion($row['archivo']));
   }

   function lbarchivosJSDblClick($sender, $params)
   {
?>
       //Add your javascript code here
       //window.location = document.getElementById('hfpath').value+document.getElementById('lbarchivos').value;
		 	window.open('http://'+document.getElementById('hfserver').value+
			document.getElementById('hfpath').value+document.getElementById('lbarchivos').value+
			'#toolbar=0&navpanes=0','','dependent=yes,menubar=yes,resizable=yes');
<?php
   }

   function umanualesShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->hfserver->Value = $_SERVER['SERVER_NAME'];
      $this->hfpath->Value = GetConfiguraciones('PathManuales');
      $rsm = "select mt.nombre, mt.idcontador
					from manuales_titulos mt
					left join manuales_contenido mc on mt.idcontador=mc.idtitulo
					left join manuales_archivos ma on ma.idcontenido=mc.idcontador
					left join manuales_derechos de on de.idmanual=ma.idcontador
					where idpuesto=" . $_SESSION['idpuesto'] . " order by nombre";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $this->lbtitulos->Clear();
      while($row = mysql_fetch_array($r))
         $this->lbtitulos->AddItem($row['nombre'], null , $row['idcontador']);
   }

   function btnregresarClick($sender, $params)
   {
      redirect('menu.php');
   }

}

global $application;

global $umanuales;

//Creates the form
$umanuales = new umanuales($application);

//Read from resource file
$umanuales->loadResource(__FILE__);

//Shows the form
$umanuales->show();

?>