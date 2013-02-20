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
class urevtacaidamot extends Page
{
       public $edidmotivo = null;
       public $Label3 = null;
       public $lbufh = null;
       public $ednombre = null;
       public $Label1 = null;
       public $tblmotivos = null;
       public $sqlgen = null;
       public $sqlgen2 = null;
       public $pbotones = null;
       public $edregresar = null;
       public $lbtitulo = null;
       public $btngcerrar = null;
       public $btnguardar = null;
       public $hfpassactual = null;
       public $hfpass = null;
       public $hfestatus = null;
       function urevtacaidamotShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
       $this->lbtitulo->Caption= $this->Caption;
       if(isset($_GET["idmotivo"]))
         {
         $this->edidmotivo->Text = $_GET["idmotivo"];
         if($this->edidmotivo->Text == 0)
            $this->hfestatus->Value = 1;
         else
            $this->hfestatus->Value = 2;

         if($this->edidmotivo->Text == 0 && $this->hfestatus->Value == 1)
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
               if(Derechos('Eliminar Motivos de Vta Caida') == false)
                  {
                  echo '<script language="javascript" type="text/javascript">
                       alert("No puede Eliminar Motivos de Vta Caida");
                       window.location="urevtacaidamotvista.php";
                       </script>';
                  }
                   else
                  {
                  $rsm ="Select idmotivo from revtacaida where idmotivo = ".$this->edidmotivo->Text;
                  $r = mysql_query($rsm) or die("error sql: ".$rsm." ".mysql_error());
                  if(mysql_num_rows($r) > 0)
                    {
                    echo '<script language="javascript" type="text/javascript">
                         alert("No puede eliminar la Motivos de Vta Caida porque esta siendo utilizado por una Venta Caida");
                         window.location="urevtacaidamotvista.php";
                         </script>';
                    }
                  else
                    {
                       $this->hfestatus->Value = 3;
                       $this->Locate();
                       $this->tblmotivos->open();
               	    $this->tblmotivos->delete();
               	    $this->tblmotivos->Active = false;
               	    dmconexion::Log("Elimino la Motivos de Vta Caida no. ".$this->edidmotivo->Text." ".
				    $this->ednombre->Text,3);
               	    redirect("urevtacaidamotvista.php");
                    }
                  }
               }
            }
         }
       }

       function btnguardarClick($sender, $params)
       {
       $this->Guardar();
       redirect("urevtacaidamot.php?idmotivo=".$this->edidmotivo->Text);
       }

       function btngcerrarClick($sender, $params)
       {
       $this->Guardar();
       redirect("urevtacaidamotvista.php");
       }

       function edregresarClick($sender, $params)
       {
       redirect('urevtacaidamotvista.php');
       }

       function Alta()
       {
       if($this->hfestatus->Value == 1)
         $this->edidmotivo->Text = MaxId('revtacaidamot', 'idmotivo')+1;
       }

       function Locate()
       {
       if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
         {
         if( $_GET["idmotivo"] != 0)
            {
            $this->edidmotivo->Text = $_GET["idmotivo"];
            $this->sqlgen->close();
            $r = ufh('m');
            $this->sqlgen->SQL = 'SELECT m.idmotivo, m.nombre, '.$r.' as ufh FROM revtacaidamot AS m
                                 where idmotivo = '.$this->edidmotivo->Text;
            $this->sqlgen->Active = true;
            $this->sqlgen->open();
            $this->tblmotivos->setFilter(' idmotivo="'.$this->edidmotivo->Text.'"');
            $this->ednombre->Text = $this->sqlgen->fieldget("nombre");
            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");
            }
         }
       }

       function Guardar()
       {
       if(!isset($_GET["idmotivo"]))
         {
         if($this->hfestatus->Value == 1)
            {
            $this->tblmotivos->open();
            $this->tblmotivos->insert();
            $this->tblmotivos->fieldset("idmotivo", $this->edidmotivo->Text);
            $msg = "Inserto el Motivo de Vta Caida no. ".$this->edidmotivo->Text." ".$this->ednombre->Text;
            }
         else
            {
            if(Derechos('Modificar Motivos de Vta Caida') == false)
               {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Motivos de Vta Caida");
                  window.location="urevtacaidamotvista.php";
                  </script>';
               }
            else
			   {
               $this->tblmotivos->close();
               $this->tblmotivos->writeFilter('idmotivo="'.$this->edidmotivo->Text.'"');
               $this->tblmotivos->refresh();
               $this->tblmotivos->open();
               $this->tblmotivos->Edit();
               $msg = "Edito la Motivo de Vta Caida no. ".$this->edidmotivo->Text." ".$this->ednombre->Text;
               }
			}
         $this->tblmotivos->fieldset("nombre", $this->ednombre->Text);
         $this->tblmotivos->fieldset("usuario", $_SESSION["login"]);
         $this->tblmotivos->fieldset("fecha", date("Y/n/j"));
         $this->tblmotivos->fieldset("hora", date("H:i:s"));
         $this->tblmotivos->post();
         $this->tblmotivos->Active = false;
         $this->hfestatus->Value = 2;
		 dmconexion::Log($msg,$nivel);
         }
       }

       function Limpiar()
       {
       reset($this->controls->items);
       while(list($key, $val)=each($this->controls->items))
          {
          if($val->inheritsFrom("Edit"))
            $val->Text="";
          }
       $this->lbufh->Caption = '';
       }

}

global $application;

global $urevtacaidamot;

//Creates the form
$urevtacaidamot=new urevtacaidamot($application);

//Read from resource file
$urevtacaidamot->loadResource(__FILE__);

//Shows the form
$urevtacaidamot->show();

?>