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
class ucamionestipos extends Page
{
       public $tbltipos = null;
       public $edmargen = null;
       public $edidtipo = null;
       public $Label4 = null;
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
       function ucamionestiposShow($sender, $params)
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
               if(Derechos('Eliminar Tipo de Camion') == false)
                  {
                  echo '<script language="javascript" type="text/javascript">
                       alert("No puede Eliminar Tipos de Camiones");
                       window.location="ucamionestiposvista.php";
                       </script>';
                  }
                   else
                  {
                  $rsm ="Select idtipocamion from ofertas where idtipocamion = ".$this->edidtipo->Text;
                  $r = mysql_query($rsm) or die("error sql: ".$rsm." ".mysql_error());
                  if(mysql_num_rows($r) > 0)
                    {
                    echo '<script language="javascript" type="text/javascript">
                         alert("No puede eliminar el Tipo de Camion porque esta siendo utilizado por una oferta");
                         window.location="ucamionestiposvista.php";
                         </script>';
                    }
                  else
                    {
               	    $this->hfestatus->Value = 3;
               	    $this->Locate();
               	    $this->tbltipos->open();
               	    $this->tbltipos->delete();
               	    $this->tbltipos->Active = false;
               	    dmconexion::Log("Elimino el Tipo de Camion no. ".$this->edidtipo->Text." ".
				    $this->ednombre->Text,3);
               	    redirect("ucamionestiposvista.php");
                    }
                  }
               }
            }
         }
       }

       function btnguardarClick($sender, $params)
       {
       $this->Guardar();
       redirect("ucamionestipos.php?idtipo=".$this->edidtipo->Text);
       }

       function btngcerrarClick($sender, $params)
       {
       $this->Guardar();
       redirect("ucamionestiposvista.php");
       }

       function edregresarClick($sender, $params)
       {
       redirect('ucamionestiposvista.php');
       }

       function edmargenJSKeyPress($sender, $params)
       {
       ?>
       if( ValidaDecimal(document.getElementById('edmargen').value, event) != event.keyCode)
           return false;
       <?php
       }

       function Alta()
       {
       if($this->hfestatus->Value == 1)
         $this->edidtipo->Text = MaxId('camionestipos', 'idtipo')+1;
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
            $this->sqlgen->SQL = 'Select idtipo,nombre, margenutilidad, '.$r.' as ufh
                                 from camionestipos c
                                 where idtipo = '.$this->edidtipo->Text;
            $this->sqlgen->Active = true;
            $this->sqlgen->open();
            $this->tbltipos->setFilter(' idtipo="'.$this->edidtipo->Text.'"');
            $this->ednombre->Text = $this->sqlgen->fieldget("nombre");
            $this->edmargen->Text = $this->sqlgen->fieldget("margenutilidad");
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
            $msg = "Inserto el Tipo de Camion no. ".$this->edidtipo->Text." ".$this->ednombre->Text;
            }
         else
            {
            if(Derechos('Modificar Tipo de Camion') == false)
               {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Tipo de Camiones");
                  window.location="ucamionestiposvista.php";
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
         $this->tbltipos->fieldset("margenutilidad", $this->edmargen->Text);
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

}

global $application;

global $ucamionestipos;

//Creates the form
$ucamionestipos=new ucamionestipos($application);

//Read from resource file
$ucamionestipos->loadResource(__FILE__);

//Shows the form
$ucamionestipos->show();

?>