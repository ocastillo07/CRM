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
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class uperfiles extends Page
{
   public $btnderechos = null;
   public $lbtitulo = null;
   public $edregresar = null;
   public $btngcerrar = null;
   public $btnguardar = null;
   public $tblusuarios = null;
   public $sqlgen = null;
   public $lbufh = null;
   public $ednombre = null;
   public $Label5 = null;
   public $edidusuario = null;
   public $Label1 = null;
   public $hfestatus = null;
   public $pbotones = null;
   function btnderechosJSClick($sender, $params)
   {

   ?>
        document.location.href("uusuariosderechos.php?idusr="+vcl.$('edidusuario').value);
   <?php

   }

   function uperfilesJSLoad($sender, $params)
   {

   ?>
   validarEventos();
   <?php

   }

   function edidusuarioJSKeyPress($sender, $params)
   {
?>
   if(event.keyCode == 13)
     return false;
<?php
   }

   function uperfilesShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET["idusr"]))
      {
         $this->edidusuario->Text = $_GET["idusr"];
         if($this->edidusuario->Text == 0)
            $this->hfestatus->Value = 1;
         else
            $this->hfestatus->Value = 2;

         if($this->edidusuario->Text == 0 && $this->hfestatus->Value == 1)
         {
            $this->inicializaforma();
            $this->Limpiar();
            $this->Alta();
         }
         else
         {
            if(!isset($_GET["elim"]))
            {
               $this->inicializaforma();
               $this->Limpiar();
               $this->Locate();
            }
            else
            {
               if($this->ValidarBorrar() == true)
               {
                  $this->hfestatus->Value = 3;
                  $this->inicializaforma();
                  $this->Locate();
                  $this->tblusuarios->open();
                  $this->tblusuarios->delete();
                  $this->tblusuarios->Active = false;
                  dmconexion::Log("Elimino el perfil no. " . $this->edidusuario->Text, 3);
                  redirect("uperfilesvista.php");
               }
            }
         }
      }
   }

   function btnguardarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect("uperfiles.php?idusr=" . $this->edidusuario->Text);
      }
   }

   function btngcerrarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect("uperfilesvista.php");
      }
   }

   function btnregresarClick($sender, $params)
   {
      redirect("uperfilesvista.php");
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('ALPERFILES') == false)
          {
          echo '<script language="javascript" type="text/javascript">
               alert("No puede Agregar Perfiles");
               </script>';
          }
       else
          redirect("uperfiles.php?idusr=0");
   }

   function btnderechosClick($sender, $params)
   {
      redirect("uusuariosderechos.php?idusr=" . $this->edidusuario->Text);
   }

   function Alta()
   {
      if($this->hfestatus->Value == 1)
      {
         $this->sqlgen->close();
         $this->sqlgen->sql = "Select ifnull(max(idusuario), 0)+1 as id from usuarios";
         $this->sqlgen->open();
         $this->edidusuario->Text = $this->sqlgen->fieldget("id");
      }
   }

   function Locate()
   {
      if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
      {
         if($_GET["idusr"] != 0)
         {
            $this->edidusuario->Text = $_GET["idusr"];
            $this->sqlgen->close();
            $r = ufh('u');
            $this->sqlgen->SQL = 'Select u.idusuario, u. nombre, ' . $r . ' as ufh, u.estatus
            from usuarios u where u.idusuario = ' . $this->edidusuario->Text;

            $this->sqlgen->Active = true;
            $this->sqlgen->open();

            $this->tblusuarios->setFilter(' idusuario="' . $this->edidusuario->Text . '"');
            $this->ednombre->Text = $this->sqlgen->fieldget("nombre");
            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");

         }
      }
   }

   function Guardar()
   {
      if(!isset($_GET["idusr"]))
      {
         if($this->hfestatus->Value == 1)
         {
            $sql = 'Insert into usuarios (idarea, idpuesto, idplaza, nombre, apaterno, amaterno,
                   iniciales, login, tipo, usuario, fecha, hora)
                   values(1,1,1, "' . strtoupper($this->ednombre->Text) . '", "", "",
                   "' . 'p' . $this->edidusuario->Text . '", "' . 'p' . $this->edidusuario->Text . '",
                   "P", "' . $_SESSION['login'] . '", curdate(), curtime())';
            $rs = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

            $msg = "Inserto el perfil no. " . $this->edidusuario->Text;
         }
         else
         {
            if(Derechos('EDPERFILES') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                    alert("No puede Modificar Perfiles");
                    window.location="uperfilesvista.php";
                    </script>';
            }
            else
            {
               $sql = 'update usuarios set nombre="' . strtoupper($this->ednombre->Text) . '",
                    estatus="' . $estatus . '", usuario="' . $_SESSION['login'] . '",
                   fecha=curdate(), hora=curtime() where idusuario = ' . $this->edidusuario->Text;
               $rs = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
               $msg = "Edito el perfil no. " . $this->edidusuario->Text;
            }
         }


         $this->hfestatus->Value = 2;
         dmconexion::Log($msg, $nivel);
      }
   }

   function Limpiar()
   {
      reset($this->controls->items);
      while(list($key, $val) = each($this->controls->items))
      {
         if($val->inheritsFrom("Edit"))
            $val->Text = "";
      }
      $this->lbufh->Caption = '';
   }

   function inicializaforma()
   {
   //

   }

   function Validar()
   {
      if($this->ednombre->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el nombre del perfil");
             </script>';
         return false;
      }

      if(ExisteNombre($this->ednombre->Text, 'usuarios', 'nombre', ' and idusuario<>' .
          $this->edidusuario->Text. ' and tipo = "P" ') == true )
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Ese nombre esta siendo usado");
             </script>';
         return false;
      }

      return true;
   }

   function ValidarBorrar()
   {
      if(Derechos('ELPERFILES') == false)
      {
         echo '<script language="javascript" type="text/javascript">
                  	alert("No puede Eliminar Perfiles");
                  	window.location="uperfilesvista.php";
                  	</script>';
         return false;
      }

      $sql = 'Select idusuario from usuariosperfiles where idperfil=' . $this->edidusuario->Text;
      $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
      $row = mysql_fetch_array($rs);
      if($row != false)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("No puede Eliminar el Perfiles esta siendo usada por usuarios.");
              window.location="uperfilesvista.php";
              </script>';
         return false;
      }

      return true;
   }
}

global $application;

global $uperfiles;

//Creates the form
$uperfiles = new uperfiles($application);

//Read from resource file
$uperfiles->loadResource(__FILE__);

//Shows the form
$uperfiles->show();

?>