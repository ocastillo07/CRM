<script type='text/javascript' src='funciones.js'></script>
<link href="estilos.css" rel="stylesheet" type="text/css" />
<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
require_once("vcl/vcl.inc.php");
//Includes
use_unit("checklst.inc.php");
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class uusuariosderechos extends Page
{
   public $btnliberar = null;
   public $btnbloquear = null;
   public $lbmodulo = null;
   public $lbgrupo = null;
   public $hfperfil = null;
   public $lbderechos = null;
   public $lbusuario = null;
   public $hfestatus = null;
   public $hfder = null;
   public $hfidusr = null;
   public $Label1 = null;
   public $pbotones = null;
   public $btnregresar = null;
   public $btngcerrar = null;
   public $btnguardar = null;
   public $lbtitulo = null;
   public $listaderechos = null;
   function btnbloquearJSClick($sender, $params)
   {
   ?>
   basicAjax('uusuariosderechos_ajax.php','Bloquear=0');
   <?php
   }

   function btnliberarJSClick($sender, $params)
   {
   ?>
   basicAjax('uusuariosderechos_ajax.php','Liberar=0');
   <?php
   }

   function btngcerrarClick($sender, $params)
   {
      $this->guardar();
      redirect('uusuariosvista.php');
   }

   function btnguardarClick($sender, $params)
   {
      $this->Guardar();
      echo '<script language="javascript" type="text/javascript">
           alert("Derechos guardados");
           window.location="uusuariosderechos.php?idusr=' . $this->hfidusr->Value . '";
           </script>';
   }

   function uusuariosderechosJSLoad($sender, $params)
   {
?>
    validarEventos();
   if(vcl.$('hfidusr').value != '' && vcl.$('hfidusr').value != undefined)
      basicAjax('uusuariosderechos_ajax.php','Inicializa=0'+'&idusr='+vcl.$('hfidusr').value);
   else
      basicAjax('uusuariosderechos_ajax.php','Inicializa=0'+'&idusr='+vcl.$('hfidusr').value);
<?php
   }

   function btnregresarClick($sender, $params)
   {
      redirect("uusuariosvista.php");
   }

   function uusuariosderechosShow($sender, $params)
   {
      if(Derechos('ACCDERECHOS') == false)
      {
         echo '<script language="javascript" type="text/javascript">
                  	alert("No puede Accesar a Derechos de Usuarios");
                  	window.location="uusuariosvista.php?pagina=uusuariosvista.php";
                  	</script>';
      }

      if(isset($_GET['idusr']))
      {
         $this->pbotones->Width = $_SESSION["width"] - 164;
         $this->lbtitulo->Caption = $this->Caption;
         $this->hfidusr->Value = $_GET['idusr'];
         $this->LlenaPagina();
      }
   }

   function LlenaPagina()
   {
     /* $sql = 'Select u.idusuario, ' . NombreFisica('u') . ' as nombre,
              a.nombre as area, p.nombre as puesto
              from usuarios u
              left join puestos p on p.idpuesto=u.idpuesto
              left join areas a on a.idarea=u.idarea
              where u.idusuario=' . $this->hfidusr->Value;     */

      $sql = 'Select u.idusuario, ' . NombreFisica('u') . ' as nombre,
              ifnull(up.idperfil, 0) as idperfil, r.nombre as perfil,
              a.nombre as area, p.nombre as puesto, u.tipo
              from usuarios u
              left join usuariosperfiles up on up.idusuario=u.idusuario
              left join usuarios r on up.idperfil=r.idusuario
              left join puestos p on p.idpuesto=u.idpuesto
              left join areas a on a.idarea=u.idarea
              where u.idusuario=' . $this->hfidusr->Value;
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);

      if($row['tipo'] == 'U')
      {
         $this->lbusuario->Caption = 'USUARIO: [' . $row['idusuario'] . ']  ' . $row['nombre'] .
         ' PUESTO: ' . $row['puesto'] . ' DE ' . $row['area'] . '  PERFIL: ' . $row['perfil'];
         $this->hfperfil->Value = $row['idperfil'] . '';
      }
      else
      {
         $this->lbusuario->Caption = 'PERFIL: [' . $row['idusuario'] . ']  ' . $row['nombre'];
         $this->hfperfil->Value = $row['idperfil'] . '';
      }

   }

   function Guardar()
   {
      if(Derechos('ASIGDER') == false)
      {
         echo '<script language="javascript" type="text/javascript">
         alert("No puede Asignar Derechos");
         window.location="uusuariosvista.php";
         </script>';
      }
      else
      {
         $idusr = $this->hfidusr->Value;

         $sql = 'Delete from usuariosderechos
         where idusuario=' . $idusr ;
         $rs = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());


         $memlim = ini_get('memory_limit');
         $maxtime = ini_get('max_execution_time');
         ini_set('memory_limit', '50M');
         ini_set('max_execution_time', '1000');


         $der = $_SESSION['tabladerechos'];
         foreach($der as $value)
         {
            if($value != '')
            {

               $sql = 'Insert into usuariosderechos (idusuario, idderecho, usuario, fecha, hora)
                values(' . $idusr . ', "' . $value . '", "' . $_SESSION['login'] . '", curdate(), curtime())';
               $rs = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
            }
         }

         ini_set('memory_limit', $memlim);
         ini_set('max_execution_time', $maxtime);
         dmconexion::Log('Edito los derechos del usuario ' . $idusr, 3);
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