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
use_unit("mysql.inc.php");
use_unit("oracle.inc.php");
use_unit("buttons.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class uusuariosderechos extends Page
{
   public $lbtitulo = null;
   public $btnbloquear = null;
   public $btnliberar = null;
   public $pbotones = null;
   public $btnguardar = null;
   public $btngcerrar = null;
   public $hfvalor = null;
   public $hfidusuario = null;
   public $hfcount = null;
   public $sqlderechos = null;
   public $lblderechos = null;
   public $hfestatus = null;
   public $Label1 = null;
   function btnbloquearClick($sender, $params)
   {
      $t = '<table width="500" border="0" cellpadding="0" cellspacing="0">';
      $this->sqlderechos->close();
      $this->sqlderechos->SQL = 'Select distinct d.idderecho, d.descripcion,0 as ch ' .
      'from derechos d order by descripcion';
      $this->sqlderechos->open();
      $this->CreaTabla();
   }


   function btnliberarClick($sender, $params)
   {
      $this->sqlderechos->close();
      $this->sqlderechos->SQL = 'Select distinct d.idderecho, d.descripcion,1 as ch ' .
      'from derechos d order by descripcion';
      $this->sqlderechos->open();
      $this->CreaTabla();
   }


   function btnguardarClick($sender, $params)
   {
      $this->Guardar();
      redirect("uusuariosderechos.php?idusr=" . $this->hfidusuario->Value);
   }

   function uusuariosderechosCreate($sender, $params)
   {
      if(Derechos('Accesar Derechos') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para Accesar Derechos");
               document.location.href("uusuariosvista.php");
               </script>';
         exit;
      }
   }

   function btngcerrarClick($sender, $params)
   {
      $this->Guardar();
      redirect("uusuariosvista.php");
   }

   function uusuariosderechosShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET['idusr']))
      {
         $this->hfidusuario->Value = $_GET['idusr'];
         //$t = '<table width="500" border="0" cellpadding="0" cellspacing="0" align="center">';
         $this->sqlderechos->close();
         $this->sqlderechos->SQL = 'Select distinct d.idderecho, d.descripcion,if(u.idusuario is not null, 1,0) as ch ' .
         'from derechos d left join usuariosderechos u on u.idderecho=d.idderecho ' .
         'and u.idusuario=' . $this->hfidusuario->Value . ' order by descripcion';
         $this->sqlderechos->open();
         $this->CreaTabla();
      }
   }

   function CreaTabla()
   {
      $t = '<table width="400" border="0" cellpadding="0" cellspacing="0" align="center">';
      $colores[0] = '#F0F0F0';
      $colores[1] = '#CDCDCD';
      while(!$this->sqlderechos->EOF == true)
      {
         if(($this->sqlderechos->RecNo % 2) == 0)
            $c = 0;
         else
            $c = 1;
         if($this->sqlderechos->fieldget('ch') == 1)
            $ch = 'checked="checked"';
         else
            $ch = '';
         $t = $t . '<tr bgcolor="' . $colores[$c] . '">
          <td height = "20"> <span style=" font-family: Verdana; font-size: 11; "> ' .
         $this->sqlderechos->fieldget('descripcion') . ' </span>  </td>
          <td><span style=" font-family: Verdana; font-size: 11; ">
          <input type="checkbox" name="chk' . $this->sqlderechos->fieldget('idderecho') . '"
          id="chk' . $this->sqlderechos->fieldget('idderecho') . '"
          value="' . $this->sqlderechos->fieldget('idderecho') . '" ' . $ch . '     /></span></td>
          </tr>';
         $this->sqlderechos->next();
      }
		$sql = 'select max(idderecho) from ('.$this->sqlderechos->SQL.' ) as t';
		$rs = mysql_query($sql) or die('Error de consulta SQL: '.$sql);
		$row = mysql_fetch_row($rs);
      $this->hfcount->Value = $row[0];
      $t = $t . ' <tr><td></td></tr><tr><td></td></tr></table> ';
      $this->lblderechos->Caption = $t;
   }

   function Locate()
   {
      $this->sqlderechos->close();
      $this->sqlderechos->SQL = 'Select idderecho from usuariosderechos where idusuario = ' . $this->hfidusuario->Value;
      while(!$this->sqlderechos->EOF == true)
      {
         echo '<script language="javascript" type="text/javascript">
         printf(document.getElementId().value);
         </script>';
         $this->sqlderechos->next();
      }
   }

   function Guardar()
   {
      if(Derechos('Asignar Derechos') == false)
      {
         echo '<script language="javascript" type="text/javascript">
                  alert("No puede Asignar Derechos");
                  window.location="uusuariosvista.php";
                  </script>';
      }
      else
      {
         $sql = 'Delete from usuariosderechos where idusuario=' . $this->hfidusuario->Value;
         $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

         for($i = 1; $i <= $this->hfcount->Value; $i++)
         {

            if($_REQUEST['chk' . $i] > 0)
            {
               $s = 'Insert into usuariosderechos (idusuario, idderecho, usuario, fecha, hora) ' .
               'values(' . $this->hfidusuario->Value . ', ' . $_REQUEST['chk' . $i] . ', "' . $_SESSION['login'] . '", curdate(), curtime())';
               $rs = mysql_query($s)or die("error sql: " . $s . " " . mysql_error());
            }
         }
         dmconexion::Log('Edito los derechos del usuario ' . $this->hfidusuario->Value, 3);
      }
   }

}

global $application;

global $uusuariosderechos;

//Creates the form
$uusuariosderechos = new uusuariosderechos($application);

//Read from resource file
$uusuariosderechos->loadResource(__FILE__);

//Shows the form
$uusuariosderechos->show();

?>