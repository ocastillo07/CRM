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
class uAsuntos extends Page
{
   public $tblasuntos = null;
   public $edidasunto = null;
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
      redirect("uasuntosvista.php");
   }

   function btngcerrarClick($sender, $params)
   {
      $this->Guardar();
      redirect("uasuntosvista.php");
   }

   function btnguardarClick($sender, $params)
   {
      $this->Guardar();
      #redirect("uasuntos.php?idasunto=" . $this->edidasunto->Text);
   }

   function uAsuntosShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET["idasunto"]))
      {
         $this->edidasunto->Text = $_GET["idasunto"];
         if($this->edidasunto->Text == 0)
            $this->hfestatus->Value = 1;
         else 
            $this->hfestatus->Value = 2;
         if($this->edidasunto->Text == 0 && $this->hfestatus->Value == 1)
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
               if(Derechos('Eliminar Asuntos') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                  			alert("No puede Eliminar Asuntos");
                  			window.location="uasuntosvista.php";
                  			</script>';
               }
               else 
               {
                  $this->hfestatus->Value = 3;
                  $this->Locate();
                  $this->tblasuntos->open();
                  $this->tblasuntos->delete();
                  $this->tblasuntos->Active = false;
                  dmconexion::Log("Elimino el Asunto no. " . $this->edidasunto->Text . " " . 
                  $this->ednombre->Text, 3);
                  redirect("uasuntosvista.php");
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
         $this->sqlgen->sql = "Select ifnull(max(idasunto), 0)+1 as id from actividadesasuntos";
         $this->sqlgen->open();
         $this->edidasunto->Text = $this->sqlgen->fieldget("id");
      }
   }

   function Locate()
   {
      if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
      {
         if($_GET["idasunto"] != 0)
         {
            $this->edidasunto->Text = $_GET["idasunto"];
            $this->sqlgen->close();
            $r = ufh('p');
            $this->sqlgen->SQL = 'Select idasunto,nombre, ' . $r . ' as ufh from actividadesasuntos p
                              where idasunto = ' . $this->edidasunto->Text;
            $this->sqlgen->Active = true;
            $this->sqlgen->open();
            $this->tblasuntos->setFilter(' idasunto="' . $this->edidasunto->Text . '"');
            $this->ednombre->Text = $this->sqlgen->fieldget("nombre");
            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");
         }
      }
   }

   function Guardar()
   {
      if(!isset($_GET["idasunto"]))
      {
         if($this->hfestatus->Value == 1)
         {
            $this->tblasuntos->open();
            $this->tblasuntos->insert();
            $this->tblasuntos->fieldset("idasunto", $this->edidasunto->Text);
            $msg = "Inserto el Asunto no. " . $this->edidasunto->Text . " " . $this->ednombre->Text;
				$ban=true;
         }
         else 
         {
            if(Derechos('Modificar Asuntos') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Asuntos");
                  window.location="uasuntosvista.php";
                  </script>';
					$ban=false;
            }
            else 
            {
               $this->tblasuntos->close();
               $this->tblasuntos->writeFilter('idasunto="' . $this->edidasunto->Text . '"');
               $this->tblasuntos->refresh();
               $this->tblasuntos->open();
               $this->tblasuntos->Edit();
               $msg = "Edito el Asunto No. " . $this->edidasunto->Text . " " . $this->ednombre->Text;
					$ban=true;
            }
         }               
			if($ban)
			{
         	$this->tblasuntos->fieldset("nombre", $this->ednombre->Text);
         	$this->tblasuntos->fieldset("usuario", $_SESSION["login"]);
         	$this->tblasuntos->fieldset("fecha", date("Y/n/j"));
         	$this->tblasuntos->fieldset("hora", date("H:i:s"));
         	$this->tblasuntos->post();
         	$this->tblasuntos->Active = false;
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

global $uasuntos;

//Creates the form
$uasuntos = new uasuntos($application);

//Read from resource file
$uasuntos->loadResource(__FILE__);

//Shows the form
$uasuntos->show();

?>