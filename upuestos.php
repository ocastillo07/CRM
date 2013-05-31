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
use_unit("buttons.inc.php");
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class upuestos extends Page
{
   public $chkmantos = null;
   public $chksolicitudes = null;
   public $sqlgen = null;
   public $tblpuestos = null;
   public $sqlgen2 = null;
   public $chkaccion = null;
   public $lbufh = null;
   public $cbarea = null;
   public $Label10 = null;
   public $ednombre = null;
   public $Label5 = null;
   public $edidpuesto = null;
   public $Label1 = null;
   public $edregresar = null;
   public $lbtitulo = null;
   public $hfpassactual = null;
   public $btngcerrar = null;
   public $btnguardar = null;
   public $pbotones = null;
   public $hfpass = null;
   public $hfestatus = null;
   function edregresarClick($sender, $params)
   {
      redirect("upuestosvista.php");
   }

   function btngcerrarClick($sender, $params)
   {
      $this->Guardar();
      redirect("upuestosvista.php");
   }

   function btnguardarClick($sender, $params)
   {
      $this->Guardar();
      #redirect("upuestos.php?idpuesto=" . $this->edidpuesto->Text);
   }


   function upuestosShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET["idpuesto"]))
      {
         $this->edidpuesto->Text = $_GET["idpuesto"];
         if($this->edidpuesto->Text == 0)
            $this->hfestatus->Value = 1;
         else
            $this->hfestatus->Value = 2;
         if($this->edidpuesto->Text == 0 && $this->hfestatus->Value == 1)
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
               if(Derechos('Eliminar Puestos') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                  			alert("No puede Eliminar Puestos");
                  			window.location="upuestosvista.php";
                  			</script>';
               }
               else
               {
                  $this->hfestatus->Value = 3;
                  $this->inicializaforma();
                  $this->Locate();
                  $this->tblpuestos->open();
                  $this->tblpuestos->delete();
                  $this->tblpuestos->Active = false;
                  dmconexion::Log("Elimino el Puesto no. " . $this->edidpuesto->Text . " " .
                  $this->ednombre->Text, 3);
                  redirect("upuestosvista.php");
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
         $this->sqlgen->sql = "Select ifnull(max(idpuesto), 0)+1 as id from puestos";
         $this->sqlgen->open();
         $this->edidpuesto->Text = $this->sqlgen->fieldget("id");
      }
   }

   function Locate()
   {
      if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
      {
         if($_GET["idpuesto"] != 0)
         {
            $this->edidpuesto->Text = $_GET["idpuesto"];
            $this->sqlgen->close();
            $r = ufh('p');
            $this->sqlgen->SQL = 'Select idpuesto,nombre, idarea,responsableaccion,
                              responsablesolicitud,responsablemanto, ' . $r . ' as ufh from puestos p
                              where idpuesto = ' . $this->edidpuesto->Text;
            $this->sqlgen->Active = true;
            $this->sqlgen->open();
            $this->tblpuestos->setFilter(' idpuesto="' . $this->edidpuesto->Text . '"');
            $this->ednombre->Text = $this->sqlgen->fieldget("nombre");
            $this->cbarea->ItemIndex = $this->sqlgen->fieldget("idarea");
            if($this->sqlgen->fieldget("responsableaccion") == 1)
               $this->chkaccion->Checked = true;
            else
               $this->chkaccion->Checked = false;
            if($this->sqlgen->fieldget("responsablesolicitud") == 1)
               $this->chksolicitudes->Checked = true;
            else
               $this->chksolicitudes->Checked = false;
            if($this->sqlgen->fieldget("responsablemanto") == 1)
               $this->chkmantos->Checked = true;
            else
               $this->chkmantos->Checked = false;
            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");
         }
      }
   }

   function Guardar()
   {
      if(!isset($_GET["idpuesto"]))
      {
         if($this->hfestatus->Value == 1)
         {
            $this->tblpuestos->open();
            $this->tblpuestos->insert();
            $this->tblpuestos->fieldset("idpuesto", $this->edidpuesto->Text);
            $msg = "Inserto el Puesto no. " . $this->edidpuesto->Text . " " . $this->ednombre->Text;
            $ban = true;
         }
         else
         {
            if(Derechos('Modificar Puestos') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Puestos");
                  window.location="upuestosvista.php";
                  </script>';
               $ban = false;
            }
            else
            {
               $this->tblpuestos->close();
               $this->tblpuestos->writeFilter('idpuesto="' . $this->edidpuesto->Text . '"');
               $this->tblpuestos->refresh();
               $this->tblpuestos->open();
               $this->tblpuestos->Edit();
               $msg = "Edito el Puesto no. " . $this->edidpuesto->Text . " " . $this->ednombre->Text;
               $ban = true;
            }
         }
         if($ban)
         {
            $this->tblpuestos->fieldset("nombre", $this->ednombre->Text);
            $this->tblpuestos->fieldset("idarea", $_REQUEST['cbarea']);
            if($this->chkaccion->Checked)
               $this->tblpuestos->fieldset("responsableaccion", 1);
            else
               $this->tblpuestos->fieldset("responsableaccion", 0);

            if($this->chksolicitudes->Checked)
               $this->tblpuestos->fieldset("responsablesolicitud", 1);
            else
               $this->tblpuestos->fieldset("responsablesolicitud", 0);

            if($this->chkmantos->Checked)
               $this->tblpuestos->fieldset("responsablemanto", 1);
            else
               $this->tblpuestos->fieldset("responsablemanto", 0);
            $this->tblpuestos->fieldset("usuario", $_SESSION["login"]);
            $this->tblpuestos->fieldset("fecha", date("Y/n/j"));
            $this->tblpuestos->fieldset("hora", date("H:i:s"));
            $this->tblpuestos->post();
            $this->tblpuestos->Active = false;
            $this->hfestatus->Value = 2;
            dmconexion::Log($msg, $nivel);
         }
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
      //areas
      $this->sqlgen2->close();
      $this->sqlgen2->sql = 'Select idarea, nombre from areas order by nombre';
      $this->sqlgen2->open();
      $this->cbarea->Clear();
      $this->cbarea->AddItem("", null , 0);
      while($this->sqlgen2->EOF != true)
      {
         $this->cbarea->AddItem($this->sqlgen2->fieldget("nombre"), null , $this->sqlgen2->fieldget("idarea"));
         $this->sqlgen2->next();
      }
      $this->cbarea->ItemIndex = 0;
   }
}

global $application;

global $upuestos;

//Creates the form
$upuestos = new upuestos($application);

//Read from resource file
$upuestos->loadResource(__FILE__);

//Shows the form
$upuestos->show();

?>