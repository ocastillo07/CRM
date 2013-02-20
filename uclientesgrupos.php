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
class uclientesgrupos extends Page
{
   public $tblclientesgrupos = null;
   public $edidgrupo = null;
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
      redirect("uclientesgruposvista.php");
   }

   function btngcerrarClick($sender, $params)
   {
      $this->Guardar();
      redirect("uclientesgruposvista.php");
   }

   function btnguardarClick($sender, $params)
   {
      $this->Guardar();
      redirect("uclientesgrupos.php?idgrupo=" . $this->edidgrupo->Text);
   }

   function uclientesgruposShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET["idgrupo"]))
      {
         $this->edidgrupo->Text = $_GET["idgrupo"];
         if($this->edidgrupo->Text == 0)
            $this->hfestatus->Value = 1;
         else
            $this->hfestatus->Value = 2;
         if($this->edidgrupo->Text == 0 && $this->hfestatus->Value == 1)
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
               if(Derechos('ELICLIGPOS') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                  			alert("No puede Eliminar Grupos");
                  			window.location="uclientesgruposvista.php";
                  			</script>';
               }
               else
               {
                  $this->hfestatus->Value = 3;
                  $this->Locate();
                  $this->tblclientesgrupos->open();
                  $this->tblclientesgrupos->delete();
                  $this->tblclientesgrupos->Active = false;
                  dmconexion::Log("Elimino el Grupo no. " . $this->edidgrupo->Text . " " .
                  $this->ednombre->Text, 3);
                  redirect("uclientesgruposvista.php");
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
         $this->sqlgen->sql = "Select max(idgrupo)+1 as id from clientesgruposcat ";
         $this->sqlgen->open();
         $this->edidgrupo->Text = $this->sqlgen->fieldget("id");
      }
   }

   function Locate()
   {
      if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
      {
         if($_GET["idgrupo"] != 0)
         {
            $this->edidgrupo->Text = $_GET["idgrupo"];
            $this->sqlgen->close();
            $r = ufh('p');
            $this->sqlgen->SQL = 'Select idgrupo,nombre, ' . $r . ' as ufh from clientesgruposcat p
                              where idgrupo = ' . $this->edidgrupo->Text;
            $this->sqlgen->Active = true;
            $this->sqlgen->open();
            $this->tblclientesgrupos->setFilter(' idgrupo="' . $this->edidgrupo->Text . '"');
            $this->ednombre->Text = $this->sqlgen->fieldget("nombre");
            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");
         }
      }
   }

   function Guardar()
   {
      if(!isset($_GET["idgrupo"]))
      {
         if($this->hfestatus->Value == 1)   //alta
         {
            $this->tblclientesgrupos->open();
            $this->tblclientesgrupos->insert();
            $this->tblclientesgrupos->fieldset("idgrupo", $this->edidgrupo->Text);
            $msg = "Inserto el Grupo no. " . $this->edidgrupo->Text . " " . $this->ednombre->Text;
				$ban=true;
         }
         else  //modificacion
         {
            if(Derechos('EDCLIGPOS') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Grupos");
                  window.location="uclientesgruposvista.php";
                  </script>';
					$ban=false;
            }
            else
            {
               $this->tblclientesgrupos->close();
               $this->tblclientesgrupos->writeFilter('idgrupo="' . $this->edidgrupo->Text . '"');
               $this->tblclientesgrupos->refresh();
               $this->tblclientesgrupos->open();
               $this->tblclientesgrupos->Edit();
               $msg = "Edito el Grupo No. " . $this->edidgrupo->Text . " " . $this->ednombre->Text;
					$ban=true;
            }
         }
			if($ban)
			{
         	$this->tblclientesgrupos->fieldset("nombre", $this->ednombre->Text);
         	$this->tblclientesgrupos->fieldset("usuario", $_SESSION["login"]);
         	$this->tblclientesgrupos->fieldset("fecha", date("Y/n/j"));
         	$this->tblclientesgrupos->fieldset("hora", date("H:i:s"));
         	$this->tblclientesgrupos->post();
         	$this->tblclientesgrupos->Active = false;
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

global $uclientesgrupos;

//Creates the form
$uclientesgrupos=new uclientesgrupos($application);

//Read from resource file
$uclientesgrupos->loadResource(__FILE__);

//Shows the form
$uclientesgrupos->show();

?>