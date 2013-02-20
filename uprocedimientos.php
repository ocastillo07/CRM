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
class uprocedimientos extends Page
{
   public $ednumero = null;
   public $Label3 = null;
   public $edprefijo = null;
   public $Label2 = null;
   public $lbufh = null;
   public $ednombre = null;
   public $Label5 = null;
   public $edidprocedimiento = null;
   public $Label1 = null;
   public $tblprocedimientos = null;
   public $edregresar = null;
   public $lbtitulo = null;
   public $btngcerrar = null;
   public $btnguardar = null;
   public $pbotones = null;
   public $sqlgen = null;
   public $hfestatus = null;
   function edregresarClick($sender, $params)
   {
      redirect("uprocedimientosvista.php");
   }

   function btngcerrarClick($sender, $params)
   {
      $this->Guardar();
      redirect("uprocedimientosvista.php");
   }

   function btnguardarClick($sender, $params)
   {
      $this->Guardar();
      #redirect("uprocedimientos.php?idprocedimiento=" . $this->edidprocedimiento->Text);
   }

   function uprocedimientosShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET["idprocedimiento"]))
      {
         $this->edidprocedimiento->Text = $_GET["idprocedimiento"];
         if($this->edidprocedimiento->Text == 0)
            $this->hfestatus->Value = 1;
         else 
            $this->hfestatus->Value = 2;
         if($this->edidprocedimiento->Text == 0 && $this->hfestatus->Value == 1)
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
               if(Derechos('Eliminar Procedimientos') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                  			alert("No puede Eliminar Procedimientos");
                  			window.location="uprocedimientosvista.php";
                  			</script>';
               }
               else 
               {
                  $this->hfestatus->Value = 3;
                  $this->Locate();
                  $this->tblprocedimientos->open();
                  $this->tblprocedimientos->delete();
                  $this->tblprocedimientos->Active = false;
                  dmconexion::Log("Elimino el Procedimiento no. " . $this->edidprocedimiento->Text . " " . 
                  $this->ednombre->Text, 3);
                  redirect("uprocedimientosvista.php");
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
         $this->sqlgen->sql = "Select ifnull(max(idprocedimiento), 0)+1 as id from accionesprocedimientos";
         $this->sqlgen->open();
         $this->edidprocedimiento->Text = $this->sqlgen->fieldget("id");
      }
   }

   function Locate()
   {
      if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
      {
         if($_GET["idprocedimiento"] != 0)
         {
            $this->edidprocedimiento->Text = $_GET["idprocedimiento"];
            $this->sqlgen->close();
            $r = ufh('p');
            $this->sqlgen->SQL = 'Select idprocedimiento,prefijo,numero,nombre, ' . $r . ' as ufh from accionesprocedimientos p
                              where idprocedimiento = ' . $this->edidprocedimiento->Text;
            $this->sqlgen->Active = true;
            $this->sqlgen->open();
            $this->tblprocedimientos->setFilter(' idprocedimiento="' . $this->edidprocedimiento->Text . '"');
            $this->edprefijo->Text = $this->sqlgen->fieldget("prefijo");
            $this->ednumero->Text = $this->sqlgen->fieldget("numero");
            $this->ednombre->Text = $this->sqlgen->fieldget("nombre");
            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");
         }
      }
   }

   function Guardar()
   {
      if(!isset($_GET["idprocedimiento"]))
      {
         if($this->hfestatus->Value == 1)
         {
            $this->tblprocedimientos->open();
            $this->tblprocedimientos->insert();
            $this->tblprocedimientos->fieldset("idprocedimiento", $this->edidprocedimiento->Text);
            $msg = "Inserto el Procedimiento no. " . $this->edidprocedimiento->Text . " " . $this->ednombre->Text;
            $ban = true;
         }
         else 
         {
            if(Derechos('Modificar Procedimientos') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Procedimientos");
                  window.location="uprocedimientosvista.php";
                  </script>';
               #$ban = false;
            }
            else 
            {
               $this->tblprocedimientos->close();
               $this->tblprocedimientos->writeFilter('idprocedimiento="' . $this->edidprocedimiento->Text . '"');
               $this->tblprocedimientos->refresh();
               $this->tblprocedimientos->open();
               $this->tblprocedimientos->Edit();
               $msg = "Edito el Procedimiento no. " . $this->edidprocedimiento->Text . " " . $this->ednombre->Text;
               $ban = true;
            }
         }
         if($ban)
         {
            $this->tblprocedimientos->fieldset("prefijo", $this->edprefijo->Text);
            $this->tblprocedimientos->fieldset("numero", $this->ednumero->Text);
            $this->tblprocedimientos->fieldset("nombre", $this->ednombre->Text);
            $this->tblprocedimientos->fieldset("usuario", $_SESSION["login"]);
            $this->tblprocedimientos->fieldset("fecha", date("Y/n/j"));
            $this->tblprocedimientos->fieldset("hora", date("H:i:s"));
            $this->tblprocedimientos->post();
            $this->tblprocedimientos->Active = false;
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
}

global $application;

global $uprocedimientos;

//Creates the form
$uprocedimientos = new uprocedimientos($application);

//Read from resource file
$uprocedimientos->loadResource(__FILE__);

//Shows the form
$uprocedimientos->show();

?>