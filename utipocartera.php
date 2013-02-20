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
class utipocartera extends Page
{
       public $cbmoneda = null;
       public $eddias = null;
       public $Label2 = null;
       public $sqlgen = null;
       public $tbltipos = null;
       public $sqlgen2 = null;
       public $Label4 = null;
       public $Label3 = null;
       public $lbufh = null;
       public $ednombre = null;
       public $edidtipo = null;
       public $Label1 = null;
       public $pbotones = null;
       public $edregresar = null;
       public $lbtitulo = null;
       public $btngcerrar = null;
       public $btnguardar = null;
       public $hfpassactual = null;
       public $hfpass = null;
       public $hfestatus = null;
       function eddiasJSKeyPress($sender, $params)
       {
       ?>
       if( ValidaeEntero(document.getElementById('eddias').value, event) != event.keyCode)
           return false;
       <?php
       }

       function edregresarClick($sender, $params)
       {
       redirect('utipocarteravista.php');
       }

       function btngcerrarClick($sender, $params)
       {
       $this->Guardar();
       redirect("utipocarteravista.php");
       }

       function btnguardarClick($sender, $params)
       {
       $this->Guardar();
       redirect("utipocartera.php?idtipo=".$this->edidtipo->Text);
       }

       function utipocarteraShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
       $this->lbtitulo->Caption= $this->Caption;
       if(isset($_GET["idtipo"]))
         {
         $this->edidtipo->Text = $_GET["idtipo"];
         if($this->edidtipo->Text == 0)
            $this->hfestatus->Value = 1;
         else
            $this->hfestatus->Value = 2;

         if($this->edidtipo->Text == 0 && $this->hfestatus->Value == 1)
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
               if(Derechos('Eliminar Tipo de Cartera') == false)
                  {
                  echo '<script language="javascript" type="text/javascript">
                       alert("No puede Eliminar Tipos de Carteras");
                       window.location="utipocarteravista.php";
                       </script>';
                  }
                   else
                  {
                  $rsm ="Select idtipocamion from ofertas where idtipocamion = ".$this->edidtipo->Text;
                  $r = mysql_query($rsm) or die("error sql: ".$rsm." ".mysql_error());
                  if(mysql_num_rows($r) > 0)
                    {
                    echo '<script language="javascript" type="text/javascript">
                         alert("No puede eliminar el Tipo de Cartera porque esta siendo utilizado por una oferta");
                         window.location="utipocarteravista.php";
                         </script>';
                    }
                  else
                    {
               	    $this->hfestatus->Value = 3;
                    $this->inicializaforma();
               	    $this->Locate();
               	    $this->tbltipos->open();
               	    $this->tbltipos->delete();
               	    $this->tbltipos->Active = false;
               	    dmconexion::Log("Elimino el Tipo de Cartera no. ".$this->edidtipo->Text." ".
				    $this->ednombre->Text,3);
               	    redirect("utipocarteravista.php");
                   }
                  }
               }
            }
         }
       }

       function Alta()
       {
       if($this->hfestatus->Value == 1)
         $this->edidtipo->Text = MaxId('tipocartera', 'idtipo')+1;
       }

       function Locate()
       {
       if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
         {
         if( $_GET["idtipo"] != 0)
            {
            $this->edidtipo->Text = $_GET["idtipo"];
            $this->sqlgen->close();
            $r = ufh('c');
            $this->sqlgen->SQL = 'Select idtipo,nombre, idmoneda, diascredito, '.$r.' as ufh
                                 from tipocartera c
                                 where idtipo = '.$this->edidtipo->Text;
            $this->sqlgen->Active = true;
            $this->sqlgen->open();
            $this->tbltipos->setFilter(' idtipo="'.$this->edidtipo->Text.'"');
            $this->ednombre->Text = $this->sqlgen->fieldget("nombre");
            $this->eddias->Text = $this->sqlgen->fieldget("diascredito");
            $this->cbmoneda->ItemIndex = $this->sqlgen->fieldget("idmoneda");
            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");
            }
         }
       }

       function Guardar()
       {
       if(!isset($_GET["idtipo"]))
         {
         if($this->hfestatus->Value == 1)
            {
            $this->tbltipos->open();
            $this->tbltipos->insert();
            $this->tbltipos->fieldset("idtipo", $this->edidtipo->Text);
            $msg = "Inserto el Tipo de Cartera no. ".$this->edidtipo->Text." ".$this->ednombre->Text;
            }
         else
            {
            if(Derechos('Modificar Tipo de Cartera') == false)
               {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Tipo de Carteras");
                  window.location="utipocarteravista.php";
                  </script>';
               }
            else
			   {
               $this->tbltipos->close();
               $this->tbltipos->writeFilter('idtipo="'.$this->edidtipo->Text.'"');
               $this->tbltipos->refresh();
               $this->tbltipos->open();
               $this->tbltipos->Edit();
               $msg = "Edito el Tipo de Camion no. ".$this->edidtipo->Text." ".$this->ednombre->Text;
               }
			}
         $this->tbltipos->fieldset("nombre", $this->ednombre->Text);
         $this->tbltipos->fieldset("diascredito", $this->eddias->Text);
         $this->tbltipos->fieldset("idmoneda", $_REQUEST['cbmoneda']);
         $this->tbltipos->fieldset("usuario", $_SESSION["login"]);
         $this->tbltipos->fieldset("fecha", date("Y/n/j"));
         $this->tbltipos->fieldset("hora", date("H:i:s"));
         $this->tbltipos->post();
         $this->tbltipos->Active = false;
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

       function inicializaforma()
       {
         //monedas
         $this->sqlgen2->close();
         $this->sqlgen2->sql = 'Select idmoneda as id, moneda as nombre from monedas';
         $this->sqlgen2->open();
         $this->cbmoneda->Clear();
         $this->cbmoneda->AddItem("Selecciona Moneda", null, 0);
         while($this->sqlgen2->EOF != true)
         {
            $this->cbmoneda->AddItem($this->sqlgen2->fieldget("nombre"), null, $this->sqlgen2->fieldget("id"));
            $this->sqlgen2->next();
         }
			$this->cbmoneda->ItemIndex=0;
       }

}

global $application;

global $utipocartera;

//Creates the form
$utipocartera=new utipocartera($application);

//Read from resource file
$utipocartera->loadResource(__FILE__);

//Shows the form
$utipocartera->show();

?>