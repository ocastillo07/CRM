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
class uclientesclasificaciones extends Page
{
   public $edidclasificacion = null;
   public $tblclientesclasificaciones = null;
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
      redirect("uclientesclasificacionesvista.php");
   }

   function btngcerrarClick($sender, $params)
   {
      $this->Guardar();
      redirect("uclientesclasificacionesvista.php");
   }

   function btnguardarClick($sender, $params)
   {
      $this->Guardar();
      redirect("uclientesclasificaciones.php?idclasificacion=" . $this->edidclasificacion->Text);
   }

   function uclientesclasificacionesShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET["idclasificacion"]))
      {
         $this->edidclasificacion->Text = $_GET["idclasificacion"];
         if($this->edidclasificacion->Text == 0)
            $this->hfestatus->Value = 1;
         else
            $this->hfestatus->Value = 2;
         if($this->edidclasificacion->Text == 0 && $this->hfestatus->Value == 1)
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
               if(Derechos('ELICLICLAS') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                  			alert("No puede Eliminar Clasificaciones");
                  			window.location="uclientesclasificacionesvista.php";
                  			</script>';
               }
               else
               {
                  $this->hfestatus->Value = 3;
                  $this->Locate();
                  $this->tblclientesclasificaciones->open();
                  $this->tblclientesclasificaciones->delete();
                  $this->tblclientesclasificaciones->Active = false;
                  dmconexion::Log("Elimino la Clasificacion no. " . $this->edidclasificacion->Text . " " .
                  $this->ednombre->Text, 3);
                  redirect("uclientesclasificacionesvista.php");
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
         $this->sqlgen->sql = "Select ifnull(max(idclienteclasificacion), 0)+1 as id from clientesclasificaciones";
         $this->sqlgen->open();
         $this->edidclasificacion->Text = $this->sqlgen->fieldget("id");
      }
   }

   function Locate()
   {
      if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
      {
         if($_GET["idclasificacion"] != 0)
         {
            $this->edidclasificacion->Text = $_GET["idclasificacion"];
            $this->sqlgen->close();
            $r = ufh('p');
            $this->sqlgen->SQL = 'Select idclienteclasificacion,nombre, ' . $r . ' as ufh from clientesclasificaciones p
                              where idclienteclasificacion = ' . $this->edidclasificacion->Text;
            $this->sqlgen->Active = true;
            $this->sqlgen->open();
            $this->tblclientesclasificaciones->setFilter(' idclienteclasificacion="' . $this->edidclasificacion->Text . '"');
            $this->ednombre->Text = $this->sqlgen->fieldget("nombre");
            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");
         }
      }
   }

   function Guardar()
   {
      if(!isset($_GET["idclasificacion"]))
      {
         if($this->hfestatus->Value == 1)
         {
            $this->tblclientesclasificaciones->open();
            $this->tblclientesclasificaciones->insert();
            $this->tblclientesclasificaciones->fieldset("idclienteclasificacion", $this->edidclasificacion->Text);
            $msg = "Inserto la clasificacion no. " . $this->edidclasificacion->Text . " " . $this->ednombre->Text;
				$ban=true;
         }
         else
         {
            if(Derechos('EDCLICLAS') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Clasificaciones");
                  window.location="uclientesclasificacionesvista.php";
                  </script>';
					$ban=false;
            }
            else
            {
               $this->tblclientesclasificaciones->close();
               $this->tblclientesclasificaciones->writeFilter('idclienteclasificacion="' . $this->edidclasificacion->Text . '"');
               $this->tblclientesclasificaciones->refresh();
               $this->tblclientesclasificaciones->open();
               $this->tblclientesclasificaciones->Edit();
               $msg = "Edito la Clasificacion No. " . $this->edidclasificacion->Text . " " . $this->ednombre->Text;
					$ban=true;
            }
         }
			if($ban)
			{
         	$this->tblclientesclasificaciones->fieldset("nombre", $this->ednombre->Text);
         	$this->tblclientesclasificaciones->fieldset("usuario", $_SESSION["login"]);
         	$this->tblclientesclasificaciones->fieldset("fecha", date("Y/n/j"));
         	$this->tblclientesclasificaciones->fieldset("hora", date("H:i:s"));
         	$this->tblclientesclasificaciones->post();
         	$this->tblclientesclasificaciones->Active = false;
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

global $uclientesclasificaciones;

//Creates the form
$uclientesclasificaciones = new uclientesclasificaciones($application);

//Read from resource file
$uclientesclasificaciones->loadResource(__FILE__);

//Shows the form
$uclientesclasificaciones->show();

?>