<script type='text/javascript' src='funciones.js'></script>
<?php
//Includes
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
class uresegnoref_conf extends Page
{
   public $edcerrados = null;
   public $edcerradom = null;
   public $edsurtidocomps = null;
   public $edsurtidocompm = null;
   public $edsurtidos = null;
   public $edsurtidom = null;
   public $edencompras = null;
   public $edencompram = null;
   public $edautorizars = null;
   public $edautorizarm = null;
   public $Label16 = null;
   public $Label15 = null;
   public $Label14 = null;
   public $Label13 = null;
   public $Label12 = null;
   public $Label11 = null;
   public $Label10 = null;
   public $Label9 = null;
   public $Label8 = null;
   public $ednotaseg = null;
   public $edprocesos = null;
   public $edprocesom = null;
   public $Label7 = null;
   public $Label6 = null;
   public $Label5 = null;
   public $Label3 = null;
   public $Label2 = null;
   public $Label1 = null;
   public $Label4 = null;
   public $cbplaza = null;
   public $pbotones = null;
   public $lbtitulo = null;
   public $btnregresar = null;
   public $btnguardarcerrar = null;
   public $btnguardar = null;
   function cbplazaChange($sender, $params)
   {
    $this->Locate();
   }

   function uresegnoref_confCreate($sender, $params)
   {
      if(Derechos('ACCRESEGNOREF') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para Accesar a Configuracion de Seguimiento a No Refacciones");
               document.location.href("usegnoref.php");
               </script>';
         exit;
      }

      //plaza
      $this->cbplaza->Clear();
      $sql = 'select idplaza, nombre from plazas';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbplaza->AddItem($row['nombre'], null , $row['idplaza']);

      $this->cbplaza->ItemIndex = $_SESSION['idplaza'];
   }

   function uresegnoref_confShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"] - 165;
      $this->lbtitulo->Caption = $this->Caption;

      $this->Locate();
   }

   function btnguardarcerrarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect('uresegnoref.php');
      }
   }

   function btnguardarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect('uresegnoref_conf.php');
      }
   }

   function btnregresarClick($sender, $params)
   {
      redirect('uresegnoref.php');
   }

   function Validar()
   {
      if($this->ednotaseg->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan la nota de seguimiento");
             </script>';
         return false;
      }

      if($this->edsurtidom->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan los correos de surtido");
             </script>';
         return false;
      }

      if($this->edsurtidos->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan los correos de surtido");
             </script>';
         return false;
      }

      if($this->edsurtidocompm->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan los correos de surtido completo");
             </script>';
         return false;
      }

      if($this->edsurtidocomps->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan los correos de surtido completo");
             </script>';
         return false;
      }

      if($this->edcerradom->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan los correos de cerrado");
             </script>';
         return false;
      }

      if($this->edcerrados->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan los correos de cerrado");
             </script>';
         return false;
      }

      if($this->edprocesos->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan los correos de proceso de servicio");
             </script>';
         return false;
      }

      if($this->edprocesom->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan los correos de proceso de mostrador");
             </script>';
         return false;
      }

      if($this->edencompram->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan los correos de en compra");
             </script>';
         return false;
      }

      if($this->edencompras->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan los correos de en compra");
             </script>';
         return false;
      }

      if($this->edautorizarm->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan los correos de solicita a compra");
             </script>';
         return false;
      }

       if($this->edautorizars->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan los correos de solicita a compra");
             </script>';
         return false;
      }

      return true;
   }

   function Guardar()
   {
      $sql = 'select lower(iniciales) as iniciales from plazas where idplaza=' . $this->cbplaza->ItemIndex;
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);
      $ini = $row['iniciales'];

      $sql = 'Update resegnorefconf set valor="' . $this->ednotaseg->Text . '" where concepto="notaseg"';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

      $sql = 'Update resegnorefconf set valor="' . $this->edautorizarm->Text . '" where concepto="correoautorizarm' . $ini . '"';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $sql = 'Update resegnorefconf set valor="' . $this->edautorizars->Text . '" where concepto="correoautorizars' . $ini . '"';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

      $sql = 'Update resegnorefconf set valor="' . $this->edencompram->Text . '" where concepto="correoencompram' . $ini . '"';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $sql = 'Update resegnorefconf set valor="' . $this->edencompras->Text . '" where concepto="correoencompras' . $ini . '"';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

      $sql = 'Update resegnorefconf set valor="' . $this->edprocesom->Text . '" where concepto="correoprocesom' . $ini . '"';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $sql = 'Update resegnorefconf set valor="' . $this->edprocesos->Text . '" where concepto="correoprocesos' . $ini . '"';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

      $sql = 'Update resegnorefconf set valor="' . $this->edsurtidom->Text . '" where concepto="correosurtidom' . $ini . '"';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $sql = 'Update resegnorefconf set valor="' . $this->edsurtidos->Text . '" where concepto="correosurtidos' . $ini . '"';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

      $sql = 'Update resegnorefconf set valor="' . $this->edsurtidocompm->Text . '" where concepto="correosurtidocompm' . $ini . '"';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $sql = 'Update resegnorefconf set valor="' . $this->edsurtidocomps->Text . '" where concepto="correosurtidocomps' . $ini . '"';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

      $sql = 'Update resegnorefconf set valor="' . $this->edsurtidom->Text . '" where concepto="correocerradom' . $ini . '"';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $sql = 'Update resegnorefconf set valor="' . $this->edsurtidos->Text . '" where concepto="correocerrados' . $ini . '"';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

      dmconexion::Log('Edito la configuracion de seguimiento a no refacciones de la plaza ' . $ini, 2);

   }

   function Locate()
   {
      $sql = 'select lower(iniciales) as iniciales from plazas where idplaza = ' . $this->cbplaza->ItemIndex;
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);
      $ini = $row['iniciales'];

      $sql = 'Select * from resegnorefconf ';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      while($row = mysql_fetch_array($rs))
      {
         switch($row['concepto'])
         {
            case 'correoautorizarm' . $ini :
               $this->edautorizarm->Text = $row['valor'];
               break;
            case 'correoautorizars' . $ini :
               $this->edautorizars->Text = $row['valor'];
               break;

            case 'correoencompram' . $ini :
               $this->edencompram->Text = $row['valor'];
               break;
            case 'correoencompras' . $ini :
               $this->edencompras->Text = $row['valor'];
               break;

            case 'correoprocesom' . $ini :
               $this->edprocesom->Text = $row['valor'];
               break;
            case 'correoprocesos' . $ini :
               $this->edprocesos->Text = $row['valor'];
               break;

            case 'correosurtidom' . $ini :
               $this->edsurtidom->Text = $row['valor'];
               break;
            case 'correosurtidos' . $ini :
               $this->edsurtidos->Text = $row['valor'];
               break;

            case 'correosurtidocompm' . $ini :
               $this->edsurtidocompm->Text = $row['valor'];
               break;
            case 'correosurtidocomps' . $ini :
               $this->edsurtidocomps->Text = $row['valor'];
               break;

            case 'correocerradom' . $ini :
               $this->edcerradom->Text = $row['valor'];
               break;
            case 'correocerrados' . $ini :
               $this->edcerrados->Text = $row['valor'];
               break;

            case 'notaseg' :
               $this->ednotaseg->Text = $row['valor'];
               break;
         }
      }
   }


}

global $application;

global $uresegnoref_conf;

//Creates the form
$uresegnoref_conf = new uresegnoref_conf($application);

//Read from resource file
$uresegnoref_conf->loadResource(__FILE__);

//Shows the form
$uresegnoref_conf->show();

?>