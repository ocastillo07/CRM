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
class uprocesos extends Page
{
   public $tblprocesos = null;
   public $edidproceso = null;
   public $edregresar = null;
   public $lbtitulo = null;
   public $btngcerrar = null;
   public $btnguardar = null;
   public $pbotones = null;
   public $ednombre = null;
   public $lbufh = null;
   public $Label5 = null;
   public $Label1 = null;
   public $Panel2 = null;
   public $sqlgen = null;
   public $hfestatus = null;
   function edregresarClick($sender, $params)
   {
      redirect("uprocesosvista.php");
   }

   function btngcerrarClick($sender, $params)
   {
      $this->Guardar();
      redirect("uprocesosvista.php");
   }

   function btnguardarClick($sender, $params)
   {
      $this->Guardar();
      #redirect("uprocesos.php?idproceso=" . $this->edidproceso->Text);
   }

   function uprocesosShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET["idproceso"]))
      {
         $this->edidproceso->Text = $_GET["idproceso"];
         if($this->edidproceso->Text == 0)
            $this->hfestatus->Value = 1;
         else 
            $this->hfestatus->Value = 2;
         if($this->edidproceso->Text == 0 && $this->hfestatus->Value == 1)
         {
            $this->Limpiar();
            $this->Alta();
         }
         else 
         {
            if(!isset($_GET["elim"]))
            {
               $this->Limpiar();
               $this->Locate();
            }
            else 
            {
               if(Derechos('Eliminar Procesos') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                  			alert("No puede Eliminar Procesos");
                  			window.location="uprocesosvista.php";
                  			</script>';
               }
               else 
               {
                  $this->hfestatus->Value = 3;
                  $this->Locate();
                  $this->tblprocesos->open();
                  $this->tblprocesos->delete();
                  $this->tblprocesos->Active = false;
                  dmconexion::Log("Elimino el Proceso no. " . $this->edidproceso->Text . " " . 
                  $this->ednombre->Text, 3);
                  redirect("uprocesosvista.php");
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
         $this->sqlgen->sql = "Select ifnull(max(idproceso), 0)+1 as id from accionesprocesos";
         $this->sqlgen->open();
         $this->edidproceso->Text = $this->sqlgen->fieldget("id");
      }
   }

   function Locate()
   {
      if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
      {
         if($_GET["idproceso"] != 0)
         {
            $this->edidproceso->Text = $_GET["idproceso"];
            $this->sqlgen->close();
            $r = ufh('p');
            $this->sqlgen->SQL = 'Select idproceso,nombre, ' . $r . ' as ufh from accionesprocesos p
                              where idproceso = ' . $this->edidproceso->Text;
            $this->sqlgen->Active = true;
            $this->sqlgen->open();
            $this->tblprocesos->setFilter(' idproceso="' . $this->edidproceso->Text . '"');
            $this->ednombre->Text = $this->sqlgen->fieldget("nombre");
            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");
         }
      }
   }

   function Guardar()
   {
      if(!isset($_GET["idproceso"]))
      {
         if($this->hfestatus->Value == 1)
         {
            $this->tblprocesos->open();
            $this->tblprocesos->insert();
            $this->tblprocesos->fieldset("idproceso", $this->edidproceso->Text);
            $msg = "Inserto el Proceso no. " . $this->edidproceso->Text . " " . $this->ednombre->Text;
            $ban = true;
         }
         else 
         {
            if(Derechos('Modificar Procesos') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Procesos");
                  window.location="uprocesosvista.php";
                  </script>';
               $ban = false;
            }
            else 
            {
               $this->tblprocesos->close();
               $this->tblprocesos->writeFilter('idproceso="' . $this->edidproceso->Text . '"');
               $this->tblprocesos->refresh();
               $this->tblprocesos->open();
               $this->tblprocesos->Edit();
               $msg = "Edito el Proceso No. " . $this->edidproceso->Text . " " . $this->ednombre->Text;
               $ban = true;
            }
         }
         if($ban)
         {
            $this->tblprocesos->fieldset("nombre", $this->ednombre->Text);
            $this->tblprocesos->fieldset("usuario", $_SESSION["login"]);
            $this->tblprocesos->fieldset("fecha", date("Y/n/j"));
            $this->tblprocesos->fieldset("hora", date("H:i:s"));
            $this->tblprocesos->post();
            $this->tblprocesos->Active = false;
            $this->hfestatus->Value = 2;
            dmconexion::Log($msg, $nivel);
         }
      }
   }

   function Limpiar()
   {
      reset($this->Panel2->controls->items);
      while(list($key, $val) = each($this->Panel2->controls->items))
      {
         if($val->inheritsFrom("Edit"))
            $val->Text = "";
      }
      $this->lbufh->Caption = '';
   }
}

global $application;

global $uprocesos;

//Creates the form
$uprocesos = new uprocesos($application);

//Read from resource file
$uprocesos->loadResource(__FILE__);

//Shows the form
$uprocesos->show();

?>