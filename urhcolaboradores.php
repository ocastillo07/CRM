<script type='text/javascript' src='funciones.js'></script>
<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
require_once("vcl/vcl.inc.php");
//Includes
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class urhcolaboradores extends Page
{
   public $chkbloqueado = null;
   public $edcomentarios = null;
   public $Label11 = null;
   public $btnnuevo = null;
   public $eddias = null;
   public $Label4 = null;
   public $edidempleado = null;
   public $edidcolaborador = null;
   public $dtingreso = null;
   public $lbufh = null;
   public $cbplaza = null;
   public $Label12 = null;
   public $Label8 = null;
   public $cbpuesto = null;
   public $cbarea = null;
   public $Label10 = null;
   public $Label9 = null;
   public $Label6 = null;
   public $edapaterno = null;
   public $ckactivo = null;
   public $ednombre = null;
   public $Label5 = null;
   public $edamaterno = null;
   public $Label7 = null;
   public $Label3 = null;
   public $ediniciales = null;
   public $Label2 = null;
   public $Label1 = null;
   public $pbotones = null;
   public $edregresar = null;
   public $lbtitulo = null;
   public $btngcerrar = null;
   public $btnguardar = null;
   public $hfestatus = null;
   function eddiasJSKeyPress($sender, $params)
   {

   ?>
   //Añada su código javascript aquí
    if(ValidaEntero(document.getElementById('eddias').value, event) != event.keyCode)
           return false;
   <?php

   }

   function edidempleadoJSKeyPress($sender, $params)
   {

   ?>
   //Añada su código javascript aquí
         if(ValidaEntero(document.getElementById('edidempleado').value, event) != event.keyCode)
           return false;
   <?php

   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('ALRHCOLAB') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No puede Agregar Colaboradores");
               </script>';
      }
      else
         redirect("urhcolaboradores.php?idcolaborador=0");
   }

   function edregresarClick($sender, $params)
   {
      redirect("urhcolaboradoresvista.php");
   }

   function btngcerrarClick($sender, $params)
   {
      if($this->Validar() != false)
      {
         $this->Guardar();
         redirect("urhcolaboradoresvista.php");
      }
   }

   function btnguardarClick($sender, $params)
   {
      if($this->Validar() != false)
      {
         $this->Guardar();
         redirect("urhcolaboradores.php?idcolaborador=" . $this->edidcolaborador->Text);
      }
   }

   function urhcolaboradoresShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET["idcolaborador"]))
      {
         $this->edidcolaborador->Text = $_GET["idcolaborador"];
         if($this->edidcolaborador->Text == 0)
            $this->hfestatus->Value = 1;
         else
            $this->hfestatus->Value = 2;

         if($this->edidcolaborador->Text == 0 && $this->hfestatus->Value == 1)
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
               if(Derechos('ELRHCOLAB') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                    alert("No puede Eliminar Colaboradores");
                    window.location="urhcolaboradoresvista.php";
                    </script>';
               }
               else
               {
                  $this->hfestatus->Value = 3;
                  $sql = 'Delete from rhcolaboradores where idcolaborador=' . $this->edidcolaborador->Text;
                  $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
                  dmconexion::Log("Elimino el colaborador no. " . $this->edidcolaborador->Text, 3);
                  redirect("urhcolaboradoresvista.php");
               }
            }
         }
      }
   }

   function Alta()
   {
      $this->edidcolaborador->Text = MaxId('rhcolaboradores', 'idcolaborador') + 1;
      $this->ckactivo->Checked = true;
      $this->edcomentarios->Text = '';
   }

   function Locate()
   {
      if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
      {
         if($_GET["idcolaborador"] != 0)
         {
            $this->edidcolaborador->Text = $_GET["idcolaborador"];
            $sql = 'SELECT u.idcolaborador, u.idempleado, u.iniciales, u.diaspendientes,
                   u.nombre, u.apaterno, u.amaterno, u.idplaza, u.idarea, u.idpuesto, bloqpermisos,
                   u.estatus, u.comentarios, u.fechaingreso, ' . ufh('u') . ' as ufh
                   from rhcolaboradores u
                   where idcolaborador = ' . $this->edidcolaborador->Text;
            $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
            $row = mysql_fetch_array($rs);

            $this->ednombre->Text = $row["nombre"];
            $this->edapaterno->Text = $row["apaterno"];
            $this->edamaterno->Text = $row["amaterno"];
            $this->ediniciales->Text = $row["iniciales"];
            $this->cbplaza->ItemIndex = $row["idplaza"];
            $this->cbarea->ItemIndex = $row["idarea"];
            $this->cbpuesto->ItemIndex = $row["idpuesto"];
            $this->edidempleado->Text = $row["idempleado"];
            $this->eddias->Text = $row["diaspendientes"];
            $this->edcomentarios->Text = $row["comentarios"];
            $this->dtingreso->Text = $row['fechaingreso'];
            $this->lbufh->Caption = $row["ufh"];
            if($row["estatus"] == 1)
               $this->ckactivo->Checked = true;
            else
               $this->ckactivo->Checked = false;

            if($row["bloqpermisos"] == 1)
               $this->chkbloqueado->Checked = true;
            else
               $this->chkbloqueado->Checked = false;
         }
      }
   }

   function Guardar()
   {
      if(!isset($_GET["idcolaborador"]))
      {
         if($this->ckactivo->Checked == true)
            $estatus = '1';
         else
            $estatus = '0';

         if($this->hfestatus->Value == 1)
         {
            $sql = 'insert into rhcolaboradores (idempleado, iniciales, nombre, apaterno, amaterno,
                   fechaingreso, diaspendientes, idarea, idpuesto, idplaza, estatus, comentarios, bloqpermisos,
                   usuario, fecha, hora) values (' . $this->edidempleado->Text . ',
                   "' . strtoupper($this->ediniciales->Text) . '", "' . strtoupper($this->ednombre->Text) . '",
                   "' . strtoupper($this->edapaterno->Text) . '","' . strtoupper($this->edamaterno->Text) . '",
                   "' . $this->dtingreso->Text . '","' . $this->eddias->Text . '",
                   "' . $this->cbarea->ItemIndex . '","' . $this->cbpuesto->ItemIndex . '",
                   "' . $this->cbplaza->ItemIndex . '","' . $estatus . '", "' . $this->edcomentarios->Text . '",
		     "' . $this->chkbloqueado->Checked . '","' . $_SESSION['login'] . '",curdate(),curtime())';

            $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
            $this->edidcolaborador->Text = mysql_insert_id();
            $msg = "Inserto el colaborador no. " . $this->edidcolaborador->Text;
            dmconexion::Log("Inserto el colaborador no. " . $this->edidcolaborador->Text, 1);
         }
         else
         {
            if(Derechos('EDRHCOLAB') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                    alert("No puede Modificar Colaboradores");
                    window.location="urhcolaboradoresvista.php";
                    </script>';
            }
            else
            {

               $sql = 'update rhcolaboradores set idempleado=' . $this->edidempleado->Text . ',
                      iniciales="' . strtoupper($this->ediniciales->Text) . '", nombre="' . strtoupper($this->ednombre->Text) . '",
                      apaterno="' . strtoupper($this->edapaterno->Text) . '", amaterno="' . strtoupper($this->edamaterno->Text) . '",
                      fechaingreso="' . $this->dtingreso->Text . '", diaspendientes="' . $this->eddias->Text . '",
                      idarea="' . $this->cbarea->ItemIndex . '", idpuesto="' . $this->cbpuesto->ItemIndex . '",
                      idplaza="' . $this->cbplaza->ItemIndex . '", estatus="' . $estatus . '",
                      comentarios ="' . $this->edcomentarios->Text . '",
                      usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
                      where idcolaborador = ' . $this->edidcolaborador->Text;

               $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

               dmconexion::Log("Edito el colaborador no. " . $this->edidcolaborador->Text, 2);
            }
         }
      }
   }

   function Limpiar()
   {
      reset($this->controls->items);
      while(list($key, $val) = each($this->controls->items))
      {
         if($val->inheritsFrom("Edit") || $val->inheritsFrom("DateTimePicker"))
            $val->Text = "";

         if($val->inheritsFrom("ComboBox"))
            $val->ItemIndex = -1;

         if($val->inheritsFrom("HiddenField"))
            $val->value = '0';

         if($val->inheritsFrom("CheckBox"))
            $val->checked = false;

      }
      $this->lbufh->Caption = '';
   }

   function inicializaforma()
   {
      //plazas
      $sql = 'Select nombre, idplaza from plazas';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $this->cbplaza->Clear();
      $this->cbplaza->AddItem("", null , null);
      while($row = mysql_fetch_array($rs))
      {
         $this->cbplaza->AddItem($row["nombre"], null , $row["idplaza"]);
      }

      //areas
      $sql = 'Select idarea, nombre from areas order by nombre';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $this->cbarea->Clear();
      $this->cbarea->AddItem("", null , null);
      while($row = mysql_fetch_array($rs))
      {
         $this->cbarea->AddItem($row["nombre"], null , $row["idarea"]);
      }

      //puesto
      $sql = 'Select idpuesto, nombre from puestos order by nombre';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $this->cbpuesto->Clear();
      $this->cbpuesto->AddItem("", null , null);
      while($row = mysql_fetch_array($rs))
      {
         $this->cbpuesto->AddItem($row["nombre"], null , $row["idpuesto"]);
      }
   }

   function Validar()
   {
      if($this->ediniciales->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan las iniciales");
             </script>';
         return false;
      }

      if($this->edidempleado->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el Numero de Empleado");
             </script>';
         return false;
      }

      if($this->ednombre->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan el nombre");
             </script>';
         return false;
      }

      if($this->edapaterno->Text == '' && $this->edamaterno->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan los apellidos");
             </script>';
         return false;
      }

      if($this->cbarea->ItemIndex < 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el area");
             </script>';
         return false;
      }

      if($this->cbpuesto->ItemIndex < 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el puesto");
             </script>';
         return false;
      }

      if($this->cbplaza->ItemIndex < 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la plaza");
             </script>';
         return false;
      }

      if($this->dtingreso->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la Fecha de Ingreso");
             </script>';
         return false;
      }

      $sql = 'Select idempleado from rhcolaboradores
              where idcolaborador <> ' . $this->edidcolaborador->Text . '
              and idempleado= ' . $this->edidempleado->Text;
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);
      if($row != false)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("El Numero de Empleado ya existe");
             </script>';
         return false;
      }

      $sql = 'Select iniciales from rhcolaboradores
              where idcolaborador <> ' . $this->edidcolaborador->Text . '
              and iniciales= "' . $this->ediniciales->Text . '"';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);
      if($row != false)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Las iniciales ya estan siendo utilizadas");
             </script>';
         return false;
      }

      //Actualizar bloqueo
      //Actualizar bloqueo
      if(BloquearPermisos($this->hfestatus->Value, $this->chkbloqueado->Checked, $this->edidcolaborador->Text) == false)
         return false;

      return true;
   }

}

global $application;

global $urhcolaboradores;

//Creates the form
$urhcolaboradores = new urhcolaboradores($application);

//Read from resource file
$urhcolaboradores->loadResource(__FILE__);

//Shows the form
$urhcolaboradores->show();

?>