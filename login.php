<?php
session_start();
include("dmconexion.php");
include("urecursos.php");

//Includes
require_once("vcl/vcl.inc.php");
use_unit("mysql.inc.php");
use_unit("stdctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");

//Class definition
class ulogin extends Page
{
   public $sqlgen = null;
   public $hfwidth = null;
   public $edpassword = null;
   public $Label3 = null;
   public $Image1 = null;
   public $edlogin = null;
   public $btncancelar = null;
   public $btnlogin = null;
   public $plogin = null;
   public $Label2 = null;
   public $Label1 = null;

   function uloginJSLoad($sender, $params)
   {

?>
   //Add your javascript code here
   var edlogin = document.getElementById("edlogin");
   edlogin.focus();
<?php

   }


   function uloginShow($sender, $params)
   {
      if(!isset($_GET["height"]))
      {
?>
        <script type="text/javascript" language="javascript">
            document.location.href = "login.php?height=" + window.screen.height+"&width="+window.screen.width;
        </script>
<?php
      }
      else
      {

         $bh = $_GET["height"];
         $bh /= 2;
         $fh = $this->Height / 2;
         $this->plogin->Top = $bh - $fh - 80;

         $bw = $_GET["width"];
         $this->hfwidth->Value = $_GET["width"];
         $bw /= 2;
         $fw = $this->Width / 2;
         $this->plogin->Left = $bw - $fw;
      }

   }

   function btnloginClick($sender, $params)
   {
      if(($_POST["edlogin"] == "") || ($_POST["edpassword"] == ""))
      {
         echo "Faltan datos edlogin = " . $_POST["edlogin"] . ", edpassword = " . $_POST["edpassword"] . "";
      }
      else
      {

         $sql = "Select u.idusuario, u.login, u.pass, u.idpuesto, u.idarea, u.idplaza,
                 u.email, ifnull(p.idperfil, 0) as perfil
					       from usuarios u left join usuariosperfiles p  on p.idusuario = u.idusuario
                 where u.login='" . $_POST["edlogin"] . "'
                 and u.pass=md5('" . $_POST["edpassword"] . "')  and u.estatus = 1";
         $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         $row = mysql_fetch_array($rs);

         if($row != false)
         {
            $_SESSION['login'] = $_POST["edlogin"];
            $_SESSION['idusuario'] = $row['idusuario'];
            $_SESSION['idplaza'] = $row['idplaza'];
            $_SESSION['idalmacen'] = $row['idplaza'];
            $_SESSION['idpuesto'] = $row['idpuesto'];
            $_SESSION['idarea'] = $row['idarea'];
            $_SESSION['width'] = $this->hfwidth->Value;
            $_SESSION['pdfpath'] = GetConfiguraciones('pdfpath') . 'fpdf.php';
            $_SESSION['email'] = $row['email'];
            $_SESSION['idperfil'] = $row['perfil'];

            //avisos del sistema por acciones pendientes
            $sql = 'select count(idaccion) as pendientes from acciones
						where idresponsable=' . $row['idusuario'] . ' and idestatus in(109,110) ';
            $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
            $row = mysql_fetch_row($rs);
            if($row[0] > 1)
            {
               echo '<script language="javascript" type="text/javascript">
            			alert(\'Tienes ' . $row[0] . ' Acciones Pendientes por Revisar\');
          			</script>';
            }
            if($row[0] == 1)
            {
               echo '<script language="javascript" type="text/javascript">
            			alert(\'Tienes ' . $row[0] . ' Accion Pendiente por Revisar\');
          			</script>';
            }
            dmconexion::Log("Acceso al sistema", 1);
?>
        <script type="text/javascript" language="javascript">
            document.location.href = "menu.php";
        </script>
<?php

         }
         else
         {
            echo "Datos incorrectos";
            session_write_close();
         }
      }
   }
}

global $application;

global $ulogin;

//Creates the form
$ulogin = new ulogin($application);

//Read from resource file
$ulogin->loadResource(__FILE__);

//Shows the form
$ulogin->show();
?>