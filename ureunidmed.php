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
class ureunidmed extends Page
{
       public $tblunidades = null;
       public $eedidunidad = null;
       public $Label3 = null;
       public $lbufh = null;
       public $ednombre = null;
       public $Label1 = null;
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
       function ureunidmedShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
       $this->lbtitulo->Caption= $this->Caption;
       if(isset($_GET["idunidad"]))
         {
         $this->edidunidad->Text = $_GET["idunidad"];
         if($this->edidunidad->Text == 0)
            $this->hfestatus->Value = 1;
         else
            $this->hfestatus->Value = 2;

         if($this->edidunidad->Text == 0 && $this->hfestatus->Value == 1)
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
               if(Derechos('Eliminar Unidades de Medida') == false)
                  {
                  echo '<script language="javascript" type="text/javascript">
                       alert("No puede Eliminar Unidades de Medida");
                       window.location="ureunidmedvista.php";
                       </script>';
                  }
                   else
                  {
                  $rsm ="Select idunidad from repartes where idunidad = ".$this->edidunidad->Text;
                  $r = mysql_query($rsm) or die("error sql: ".$rsm." ".mysql_error());
                  if(mysql_num_rows($r) > 0)
                    {
                    echo '<script language="javascript" type="text/javascript">
                         alert("No puede eliminar la Unidad de Medida porque esta siendo utilizado por una Parte");
                         window.location="ureunidmedvista.php";
                         </script>';
                    }
                  else
                    {
                       $this->hfestatus->Value = 3;
                       $this->Locate();
                       $this->tblplazas->open();
               	    $this->tblplazas->delete();
               	    $this->tblplazas->Active = false;
               	    dmconexion::Log("Elimino la Unidad de Medida no. ".$this->edidunidad->Text." ".
				    $this->ednombre->Text,3);
               	    redirect("ureunidmedvista.php");
                    }
                  }
               }
            }
         }
       }

       function btnguardarClick($sender, $params)
       {
       $this->Guardar();
       redirect("ureunidmed.php?idunidad=".$this->edidunidad->Text);
       }

       function btngcerrarClick($sender, $params)
       {
       $this->Guardar();
       redirect("ureunidmedvista.php");
       }

       function edregresarClick($sender, $params)
       {
       redirect('ureunidmedvista.php');
       }

       function Alta()
       {
       if($this->hfestatus->Value == 1)
         $this->edidunidad->Text = MaxId('reunidadmedida', 'idunidad')+1;
       }

       function Locate()
       {
       if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
         {
         if( $_GET["idunidad"] != 0)
            {
            $this->edidunidad->Text = $_GET["idunidad"];
            $this->sqlgen->close();
            $r = ufh('u');
            $this->sqlgen->SQL = 'SELECT u.idunidad, u.nombre, '.$r.' as ufh FROM reunidadmedida AS u
                                 where idunidad = '.$this->edidunidad->Text;
            $this->sqlgen->Active = true;
            $this->sqlgen->open();
            $this->tblplazas->setFilter(' idunidad="'.$this->edidunidad->Text.'"');
            $this->ednombre->Text = $this->sqlgen->fieldget("nombre");
            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");
            }
         }
       }

       function Guardar()
       {
       if(!isset($_GET["idunidad"]))
         {
         if($this->hfestatus->Value == 1)
            {
            $this->tblplazas->open();
            $this->tblplazas->insert();
            $this->tblplazas->fieldset("idunidad", $this->edidunidad->Text);
            $msg = "Inserto la Unidad de Medida no. ".$this->edidunidad->Text." ".$this->ednombre->Text;
            }
         else
            {
            if(Derechos('Modificar Unidades de Medida') == false)
               {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Unidades de Medida");
                  window.location="ureunidmedvista.php";
                  </script>';
               }
            else
			   {
               $this->tblplazas->close();
               $this->tblplazas->writeFilter('idunidad="'.$this->edidunidad->Text.'"');
               $this->tblplazas->refresh();
               $this->tblplazas->open();
               $this->tblplazas->Edit();
               $msg = "Edito la Unidad de Medida no. ".$this->edidunidad->Text." ".$this->ednombre->Text;
               }
			}

         $this->tblplazas->fieldset("nombre", $this->ednombre->Text);
         $this->tblplazas->fieldset("usuario", $_SESSION["login"]);
         $this->tblplazas->fieldset("fecha", date("Y/n/j"));
         $this->tblplazas->fieldset("hora", date("H:i:s"));
         $this->tblplazas->post();
         $this->tblplazas->Active = false;
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

global $ureunidmed;

//Creates the form
$ureunidmed=new ureunidmed($application);

//Read from resource file
$ureunidmed->loadResource(__FILE__);

//Shows the form
$ureunidmed->show();

?>