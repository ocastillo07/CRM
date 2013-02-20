<?php
//Ultima modificacion 2010/01/05
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
require_once("vcl/vcl.inc.php");
//Includes
use_unit("mysql.inc.php");
use_unit("buttons.inc.php");
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class frmusuarios extends Page
{
   public $cbperfil = null;
   public $Label4 = null;
   public $ediniciales = null;
   public $Label2 = null;
   public $Label3 = null;
   public $edlogin = null;
   public $ckactivo = null;
   public $lbpassword = null;
   public $cbplaza = null;
   public $Label12 = null;
   public $edamaterno = null;
   public $Label7 = null;
   public $Label6 = null;
   public $edapaterno = null;
   public $Label8 = null;
   public $cbpuesto = null;
   public $lbufh = null;
   public $edmail = null;
   public $Label9 = null;
   public $cbarea = null;
   public $Label10 = null;
   public $ednombre = null;
   public $Label5 = null;
   public $edidusuario = null;
   public $Label1 = null;
   public $edregresar = null;
   public $lbtitulo = null;
   public $hfpassactual = null;
   public $btngcerrar = null;
   public $btnguardar = null;
   public $pbotones = null;
   public $hfpass = null;
   public $tblusuarios = null;
   public $sqlgen2 = null;
   public $sqlgen = null;
   public $hfestatus = null;
   function edregresarClick($sender, $params)
   {
      redirect("uusuariosvista.php");
   }

   function btngcerrarClick($sender, $params)
   {
      $this->Guardar();
      redirect("uusuariosvista.php");
   }

   function btnguardarClick($sender, $params)
   {
      $this->Guardar();
      redirect("uusuarios.php?idusr=" . $this->edidusuario->Text);
   }

   function lbpasswordJSClick($sender, $params)
   {
		?>
       //Add your javascript code here
            var name = prompt("Introduzca el nuevo password","");
            if (name != null && name != "")
               {
               document.getElementById('hfpass').value= name;
               }
		<?php
   }

   function btngcerrarJSClick($sender, $params)
   {

?>
       //Add your javascript code here
<?php
   }



   function frmusuariosShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET["idusr"]))
      {
         if(Derechos('ASIGDER') == false)
        $this->cbperfil->Enabled = false;
      else
        $this->cbperfil->Enabled = true;

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
               if(Derechos('Eliminar Usuarios') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                  	alert("No puede Eliminar Usuarios");
                  	window.location="uusuariosvista.php";
                  	</script>';
               }
               else
               {
                  $this->hfestatus->Value = 3;
                  $this->inicializaforma();
                  $this->Locate();
                  $this->tblusuarios->open();
                  $this->tblusuarios->delete();
                  $this->tblusuarios->Active = false;
                  dmconexion::Log("Elimino el usuario no. " . $this->edidusuario->Text, 3);
                  redirect("uusuariosvista.php");
               }
            }
         }
      }
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
            $this->sqlgen->SQL = 'Select u.idusuario, u.iniciales, u. nombre, u.apaterno, u.amaterno, ' .
            'u.idarea as area, u.idpuesto as puesto, login, ' . $r . ' as ufh, u.pass,
            u.idplaza as plaza, u.estatus, u.email, ifnull(p.idperfil, 0) as idperfil
            from usuarios u left join usuariosperfiles p on p.idusuario=u.idusuario
            where u.idusuario = ' . $this->edidusuario->Text;

            $this->sqlgen->Active = true;
            $this->sqlgen->open();

            $this->tblusuarios->setFilter(' idusuario="' . $this->edidusuario->Text . '"');
            $this->ednombre->Text = $this->sqlgen->fieldget("nombre");
            $this->edapaterno->Text = $this->sqlgen->fieldget("apaterno");
            $this->edamaterno->Text = $this->sqlgen->fieldget("amaterno");
            $this->ediniciales->Text = $this->sqlgen->fieldget("iniciales");
            $this->cbplaza->ItemIndex = $this->sqlgen->fieldget("plaza");
            $this->cbarea->ItemIndex = $this->sqlgen->fieldget("area");
            $this->cbpuesto->ItemIndex = $this->sqlgen->fieldget("puesto");
            $this->cbperfil->ItemIndex = $this->sqlgen->fieldget("idperfil");
            $this->edlogin->Text = $this->sqlgen->fieldget("login");
            $this->hfpassactual->Value = $this->sqlgen->fieldget("pass");
            $this->edmail->Text = $this->sqlgen->fieldget('email');
            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");
            if($this->sqlgen->fieldget("estatus") == 1)
               $this->ckactivo->Checked = true;
            else
               $this->ckactivo->Checked = false;
         }
      }
   }

   function Guardar()
   {
      if(!isset($_GET["idusr"]))
      {
         if($this->hfestatus->Value == 1)
         {
            $this->tblusuarios->open();
            $this->tblusuarios->insert();
            $this->tblusuarios->fieldset("idusuario", $this->edidusuario->Text);
            $msg = "Inserto el usuario no. " . $this->edidusuario->Text;
            $ban = true;
         }
         else
         {
            if(Derechos('Modificar Usuarios') == false)
            {
               //Cambiar pass propio
               if($_SESSION['idusuario'] == $this->edidusuario->Text &&
               $this->hfpass->Value != null
               && $this->hfpass->Value != "")
               {
                  $sql = "Update usuarios set pass = md5('" . $this->hfpass->Value . "') where idusuario = " .
                  $this->edidusuario->Text . "";
                  $rsm = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
                  dmconexion::Log('Modifico su Password', 1);
                  redirect("uusuarios.php?idusr=" . $this->edidusuario->Text);
               }
               else
                  echo '<script language="javascript" type="text/javascript">
                    alert("No puede Modificar Usuarios");
                    window.location="uusuariosvista.php";
                    </script>';
               $ban = false;
            }
            else
            {
               $this->tblusuarios->close();
               $this->tblusuarios->writeFilter('idusuario="' . $this->edidusuario->Text . '"');
               $this->tblusuarios->refresh();
               $this->tblusuarios->open();
               $this->tblusuarios->Edit();
               $msg = "Edito el usuario no. " . $this->edidusuario->Text;
               $ban = true;
            }
         }
         if($ban)
         {
            $this->tblusuarios->fieldset("nombre", $this->ednombre->Text);
            $this->tblusuarios->fieldset("apaterno", $this->edapaterno->Text);
            $this->tblusuarios->fieldset("amaterno", $this->edamaterno->Text);
            $this->tblusuarios->fieldset("iniciales", $this->ediniciales->Text);
            $this->tblusuarios->fieldset("login", $this->edlogin->Text);
            $this->tblusuarios->fieldset("usuario", $this->edlogin->Text);
            if($this->hfpass->Value != null && $this->hfpass->Value != "")
               $this->tblusuarios->fieldset("pass", md5($this->hfpass->Value));
            $this->tblusuarios->fieldset("idarea", $_REQUEST['cbarea']);
            $this->tblusuarios->fieldset("idpuesto", $_REQUEST['cbpuesto']);
            $this->tblusuarios->fieldset("idplaza", $_REQUEST['cbplaza']);
            $this->tblusuarios->fieldset("email", $this->edmail->Text);
            if($this->ckactivo->Checked == true)
               $this->tblusuarios->fieldset("estatus", 1);
            else
               $this->tblusuarios->fieldset("estatus", 0);

            $this->tblusuarios->fieldset("usuario", $_SESSION["login"]);
            $this->tblusuarios->fieldset("fecha", date("Y/n/j"));
            $this->tblusuarios->fieldset("hora", date("H:i:s"));
            $this->tblusuarios->post();
            $this->tblusuarios->Active = false;
            $this->hfestatus->Value = 2;
            dmconexion::Log($msg, $nivel);
         }
         if(Derechos('ASIGDER') == true)
         {
            if($this->cbperfil->ItemIndex > 0)
            {
               $sql = 'SELECT idperfil from usuariosperfiles where idusuario = '.$this->edidusuario->Text.'
                        and idplaza = '.$_SESSION['idplaza'];
               $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
               $row = mysql_fetch_array($rs);
               if($row['idperfil'] == '')
               {
                  $sql = 'Insert into usuariosperfiles (idusuario, idperfil, idplaza, usuario, fecha, hora) values
                         ('.$this->edidusuario->Text.', '.$this->cbperfil->ItemIndex.','.$_SESSION['idplaza'].',
                         "'.$_SESSION["login"].'", curdate(), curtime())';
                  $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
               }
               else
               {
                  if($row['idperfil'] != $this->cbperfil->ItemIndex)
                  $sql = 'update usuariosperfiles set idperfil='.$this->cbperfil->ItemIndex.',
                         usuario="'.$_SESSION["login"].'", fecha=curdate(), hora=curtime()
                         where idusuario = '.$this->edidusuario->Text.'
                         and idplaza = '.$_SESSION['idplaza'];
                   $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
              }
            }
            else
            {
               $sql = 'delete from usuariosperfiles where idusuario = '.$this->edidusuario->Text.'
                      and idplaza = '.$_SESSION['idplaza'];
               $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
            }
            dmconexion::Log('Modifico el perfil del usuario '.$this->edidusuario->Text, 3);
         }

      }
   }

   function Limpiar()
   {
      reset($this->controls->items);
      while(list($key, $val) = each($this->controls->items))
      {
         if($val->inheritsFrom("Edit"))
         {
            $val->Text = "";
         }
      }
      $this->lbufh->Caption = '';
   }

   function inicializaforma()
   {
      //plazas
      $this->sqlgen2->close();
      $this->sqlgen2->sql = 'Select nombre, idplaza from plazas';
      $this->sqlgen2->open();
      $this->cbplaza->Clear();
      $this->cbplaza->AddItem("", null , null);
      while($this->sqlgen2->EOF != true)
      {
         $this->cbplaza->AddItem($this->sqlgen2->fieldget("nombre"), null , $this->sqlgen2->fieldget("idplaza"));
         $this->sqlgen2->next();
      }

      //areas
      $this->sqlgen2->close();
      $this->sqlgen2->sql = 'Select idarea, nombre from areas order by nombre';
      $this->sqlgen2->open();
      $this->cbarea->Clear();
      $this->cbarea->AddItem("", null , null);
      while($this->sqlgen2->EOF != true)
      {
         $this->cbarea->AddItem($this->sqlgen2->fieldget("nombre"), null , $this->sqlgen2->fieldget("idarea"));
         $this->sqlgen2->next();
      }

      //puesto
      $this->sqlgen2->close();
      $this->sqlgen2->sql = 'Select idpuesto, nombre from puestos order by nombre';
      $this->sqlgen2->open();
      $this->cbpuesto->Clear();
      $this->cbpuesto->AddItem("", null , null);
      while($this->sqlgen2->EOF != true)
      {
         $this->cbpuesto->AddItem($this->sqlgen2->fieldget("nombre"), null , $this->sqlgen2->fieldget("idpuesto"));
         $this->sqlgen2->next();
      }

      //perfiles
      $this->sqlgen2->close();                                                             //and idplaza = "'.$_SESSION['sesidplaza'].'"
      $this->sqlgen2->sql = 'Select idusuario as id, nombre from usuarios where tipo = "P" order by nombre';
      $this->sqlgen2->open();
      $this->cbperfil->Clear();
      $this->cbperfil->AddItem("SIN PERFIL", null , '0');
      while($this->sqlgen2->EOF != true)
      {
         $this->cbperfil->AddItem($this->sqlgen2->fieldget("nombre"), null , $this->sqlgen2->fieldget("id"));
         $this->sqlgen2->next();
      }
      $this->cbperfil->ItemIndex = 0;

      if(Derechos("Cambiar Password") == false && $_SESSION['idusuario'] != $this->edidusuario->Text)
         $this->lbpassword->Enabled = false;
      else
         $this->lbpassword->Enabled = true;
   }
}

global $application;

global $frmusuarios;

//Creates the form
$frmusuarios = new frmusuarios($application);

//Read from resource file
$frmusuarios->loadResource(__FILE__);

//Shows the form
$frmusuarios->show();

?>