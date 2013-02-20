<script language="JavaScript" type="text/javascript" src="funciones.js"></script>
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
class umonedas extends Page
{
       public $edtc = null;
       public $edtcc = null;
       public $ediniciales = null;
       public $tblmonedas = null;
       public $Label5 = null;
       public $Label4 = null;
       public $Label3 = null;
       public $sqlgen = null;
       public $sqlgen2 = null;
       public $lbufh = null;
       public $ednombre = null;
       public $edidmoneda = null;
       public $Label2 = null;
       public $Label1 = null;
       public $pbotones = null;
       public $edregresar = null;
       public $lbtitulo = null;
       public $btngcerrar = null;
       public $btnguardar = null;
       public $hfpassactual = null;
       public $hfpass = null;
       public $hfestatus = null;
       function edtcJSKeyPress($sender, $params)
       {
       ?>
       if( ValidaDecimal(document.getElementById('edtc').value, event) != event.keyCode)
           return false;
       <?php
       }

       function edtccJSKeyPress($sender, $params)
       {
       ?>
       if( ValidaDecimal(document.getElementById('edtcc').value, event) != event.keyCode)
           return false;
       <?php
       }

       function edregresarClick($sender, $params)
       {
       redirect('umonedasvista.php');
       }

       function btngcerrarClick($sender, $params)
       {
       $this->Guardar();
       redirect("umonedasvista.php");
       }

       function btnguardarClick($sender, $params)
       {
       $this->Guardar();
       redirect("umonedas.php?idmoneda=".$this->edidmoneda->Text);
       }

       function umonedasShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
       $this->lbtitulo->Caption= $this->Caption;
       if(isset($_GET["idmoneda"]))
         {
         $this->edidmoneda->Text = $_GET["idmoneda"];
         if($this->edidmoneda->Text == 0)
            $this->hfestatus->Value = 1;
         else
            $this->hfestatus->Value = 2;

         if($this->edidmoneda->Text == 0 && $this->hfestatus->Value == 1)
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
               if(Derechos('Eliminar Monedas') == false)
                  {
                  echo '<script language="javascript" type="text/javascript">
                       alert("No puede Eliminar Monedas");
                       window.location="umonedasvista.php";
                       </script>';
                  }
               	else
                  {
                  /*$rsm ="Select idmoneda from puestos where idmoneda = ".$this->edidmoneda->Text;
                  $r = mysql_query($rsm) or die("error sql: ".$rsm." ".mysql_error());
                  if(mysql_num_rows($r) > 0)
                    {
                    echo '<script language="javascript" type="text/javascript">
                         alert("No puede eliminar el area porque esta siedo utilizada por un puesto");
                         window.location="umonedasvista.php";
                         </script>';
                    }
                  else
                    {  */
               	    $this->hfestatus->Value = 3;
               	    $this->Locate();
               	    $this->tblmonedas->open();
               	    $this->tblmonedas->delete();
               	    $this->tblmonedas->Active = false;
               	    dmconexion::Log("Elimino la Moneda no. ".$this->edidmoneda->Text." ".
				    $this->ednombre->Text,3);
               	    redirect("umonedasvista.php");
                   // }
                  }
               }
            }
         }
       }

       function Alta()
       {
       if($this->hfestatus->Value == 1)
         $this->edidmoneda->Text = MaxId('monedas', 'idmoneda')+1;
       }

       function Locate()
       {
       if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
         {
         if( $_GET["idmoneda"] != 0)
            {
            $this->edidmoneda->Text = $_GET["idmoneda"];
            $this->sqlgen->close();
            $r = ufh('a');
            $this->sqlgen->SQL = 'Select idmoneda,moneda, iniciales, tc, tcc, '.$r.' as ufh
                                 from monedas a
                                 where idmoneda = '.$this->edidmoneda->Text;
            $this->sqlgen->Active = true;
            $this->sqlgen->open();
            $this->tblmonedas->setFilter(' idmoneda="'.$this->edidmoneda->Text.'"');
            $this->ednombre->Text = $this->sqlgen->fieldget("moneda");
            $this->ediniciales->Text = $this->sqlgen->fieldget("iniciales");
            $this->edtc->Text = $this->sqlgen->fieldget("tc");
            $this->edtcc->Text = $this->sqlgen->fieldget("tcc");
            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");
            }
         }
       }

       function Guardar()
       {
       if(!isset($_GET["idmoneda"]))
         {
         if($this->hfestatus->Value == 1)
            {
            $this->tblmonedas->open();
            $this->tblmonedas->insert();
            $this->tblmonedas->fieldset("idmoneda", $this->edidmoneda->Text);
            $msg = "Inserto la Moneda no. ".$this->edidmoneda->Text." ".$this->ednombre->Text;
            }
         else
            {
            if(Derechos('Modificar Monedas') == false)
               {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Monedas");
                  window.location="umonedasvista.php";
                  </script>';
               }
            else
			   {
               $this->tblmonedas->close();
               $this->tblmonedas->writeFilter('idmoneda="'.$this->edidmoneda->Text.'"');
               $this->tblmonedas->refresh();
               $this->tblmonedas->open();
               $this->tblmonedas->Edit();
               $msg = "Edito la Moneda no. ".$this->edidmoneda->Text." ".$this->ednombre->Text;
               }
			}
         $this->tblmonedas->fieldset("moneda", $this->ednombre->Text);
         $this->tblmonedas->fieldset("iniciales", $this->ediniciales->Text);
         $this->tblmonedas->fieldset("tc", $this->edtc->Text);
         $this->tblmonedas->fieldset("tcc", $this->edtcc->Text);
         $this->tblmonedas->fieldset("usuario", $_SESSION["login"]);
         $this->tblmonedas->fieldset("fecha", date("Y/n/j"));
         $this->tblmonedas->fieldset("hora", date("H:i:s"));
         $this->tblmonedas->post();
         $this->tblmonedas->Active = false;
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

global $umonedas;

//Creates the form
$umonedas=new umonedas($application);

//Read from resource file
$umonedas->loadResource(__FILE__);

//Shows the form
$umonedas->show();

?>