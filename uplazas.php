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
class uplazas extends Page
{
       public $edfax = null;
       public $edtelefono = null;
       public $edcp = null;
       public $edestado = null;
       public $edciudad = null;
       public $edcolonia = null;
       public $ednumero = null;
       public $eddir = null;
       public $edrfc = null;
       public $edrsocial = null;
       public $Label13 = null;
       public $Label12 = null;
       public $Label11 = null;
       public $Label10 = null;
       public $Label9 = null;
       public $Label8 = null;
       public $Label7 = null;
       public $ediniciales = null;
       public $Label6 = null;
       public $Label5 = null;
       public $Label4 = null;
       public $Label2 = null;
       public $tblplazas = null;
       public $sqlgen = null;
       public $sqlgen2 = null;
       public $Label3 = null;
       public $lbufh = null;
       public $ednombre = null;
       public $edidplaza = null;
       public $Label1 = null;
       public $pbotones = null;
       public $edregresar = null;
       public $lbtitulo = null;
       public $btngcerrar = null;
       public $btnguardar = null;
       public $hfpassactual = null;
       public $hfpass = null;
       public $hfestatus = null;
       function edregresarClick($sender, $params)
       {
       redirect('uplazasvista.php');
       }

       function btngcerrarClick($sender, $params)
       {
       $this->Guardar();
       redirect("uplazasvista.php");
       }

       function btnguardarClick($sender, $params)
       {
       $this->Guardar();
       redirect("uplazas.php?idplaza=".$this->edidplaza->Text);
       }

       function uplazasShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
       $this->lbtitulo->Caption= $this->Caption;
       if(isset($_GET["idplaza"]))
         {
         $this->edidplaza->Text = $_GET["idplaza"];
         if($this->edidplaza->Text == 0)
            $this->hfestatus->Value = 1;
         else
            $this->hfestatus->Value = 2;

         if($this->edidplaza->Text == 0 && $this->hfestatus->Value == 1)
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
               if(Derechos('Eliminar Plazas') == false)
                  {
                  echo '<script language="javascript" type="text/javascript">
                       alert("No puede Eliminar Plazas");
                       window.location="uplazasvista.php";
                       </script>';
                  }
                   else
                  {
                  $rsm ="Select idplaza from ofertas where idplaza = ".$this->edidplaza->Text;
                  $r = mysql_query($rsm) or die("error sql: ".$rsm." ".mysql_error());
                  if(mysql_num_rows($r) > 0)
                    {
                    echo '<script language="javascript" type="text/javascript">
                         alert("No puede eliminar la Plaza porque esta siendo utilizado por una oferta");
                         window.location="uplazasvista.php";
                         </script>';
                    }
                  else
                    {
                       $this->hfestatus->Value = 3;
                       $this->Locate();
                       $this->tblplazas->open();
               	    $this->tblplazas->delete();
               	    $this->tblplazas->Active = false;
               	    dmconexion::Log("Elimino la Plaza no. ".$this->edidplaza->Text." ".
				    $this->ednombre->Text,3);
               	    redirect("uplazasvista.php");
                    }
                  }
               }
            }
         }
       }

        function Alta()
       {
       if($this->hfestatus->Value == 1)
         $this->edidplaza->Text = MaxId('plazas', 'idplaza')+1;
       }

       function Locate()
       {
       if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
         {
         if( $_GET["idplaza"] != 0)
            {
            $this->edidplaza->Text = $_GET["idplaza"];
            $this->sqlgen->close();
            $r = ufh('p');
            $this->sqlgen->SQL = 'SELECT p.idplaza, p.iniciales, p.rsocial, p.nombre, p.rfc,
                                p.direccion, p.numero, p.colonia, p.ciudad, p.estado, p.cp,
                                p.telefono, p.fax, '.$r.' as ufh FROM plazas AS p
                                 where idplaza = '.$this->edidplaza->Text;
            $this->sqlgen->Active = true;
            $this->sqlgen->open();
            $this->tblplazas->setFilter(' idplaza="'.$this->edidplaza->Text.'"');
            $this->ediniciales->Text = $this->sqlgen->fieldget("iniciales");
            $this->ednombre->Text = $this->sqlgen->fieldget("nombre");
            $this->edrsocial->Text = $this->sqlgen->fieldget("rsocial");
            $this->edrfc->Text = $this->sqlgen->fieldget("rfc");
            $this->eddir->Text = $this->sqlgen->fieldget("direccion");
            $this->ednumero->Text = $this->sqlgen->fieldget("numero");
            $this->edcolonia->Text = $this->sqlgen->fieldget("colonia");
            $this->edciudad->Text = $this->sqlgen->fieldget("ciudad");
            $this->edestado->Text = $this->sqlgen->fieldget("estado");
            $this->edcp->Text = $this->sqlgen->fieldget("cp");
            $this->edtelefono->Text = $this->sqlgen->fieldget("telefono");
            $this->edfax->Text = $this->sqlgen->fieldget("fax");
            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");
            }
         }
       }

       function Guardar()
       {
       if(!isset($_GET["idplaza"]))
         {
         if($this->hfestatus->Value == 1)
            {
            $this->tblplazas->open();
            $this->tblplazas->insert();
            $this->tblplazas->fieldset("idplaza", $this->edidplaza->Text);
            $msg = "Inserto la Plaza no. ".$this->edidplaza->Text." ".$this->ednombre->Text;
            }
         else
            {
            if(Derechos('Modificar Plazas') == false)
               {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Plazas");
                  window.location="uplazasvista.php";
                  </script>';
               }
            else
			   {
               $this->tblplazas->close();
               $this->tblplazas->writeFilter('idplaza="'.$this->edidplaza->Text.'"');
               $this->tblplazas->refresh();
               $this->tblplazas->open();
               $this->tblplazas->Edit();
               $msg = "Edito la Plaza no. ".$this->edidplaza->Text." ".$this->ednombre->Text;
               }
			}
         $this->tblplazas->fieldset("iniciales", $this->ediniciales->Text);
         $this->tblplazas->fieldset("nombre", $this->ednombre->Text);
         $this->tblplazas->fieldset("rsocial", $this->edrsocial->Text);
         $this->tblplazas->fieldset("rfc", $this->edrfc->Text);
         $this->tblplazas->fieldset("direccion", $this->eddir->Text);
         $this->tblplazas->fieldset("numero", $this->ednumero->Text);
         $this->tblplazas->fieldset("colonia", $this->edcolonia->Text);
         $this->tblplazas->fieldset("ciudad", $this->edciudad->Text);
         $this->tblplazas->fieldset("estado", $this->edestado->Text);
         $this->tblplazas->fieldset("cp", $this->edcp->Text);
         $this->tblplazas->fieldset("telefono", $this->edtelefono->Text);
         $this->tblplazas->fieldset("fax", $this->edfax->Text);
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

global $uplazas;

//Creates the form
$uplazas=new uplazas($application);

//Read from resource file
$uplazas->loadResource(__FILE__);

//Shows the form
$uplazas->show();

?>