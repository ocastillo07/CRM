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
class urealmacen extends Page
{
       public $edidalmacen = null;
       public $tblalmacen = null;
       public $edfax = null;
       public $edtelefono = null;
       public $Label6 = null;
       public $Label4 = null;
       public $edcontacto = null;
       public $Label2 = null;
       public $sqlgen = null;
       public $sqlgen2 = null;
       public $Label11 = null;
       public $edcp = null;
       public $Label10 = null;
       public $edestado = null;
       public $Label9 = null;
       public $edciudad = null;
       public $Label8 = null;
       public $edcolonia = null;
       public $Label7 = null;
       public $ednumero = null;
       public $Label5 = null;
       public $eddir = null;
       public $Label3 = null;
       public $lbufh = null;
       public $ednombre = null;
       public $Label1 = null;
       public $pbotones = null;
       public $edregresar = null;
       public $lbtitulo = null;
       public $btngcerrar = null;
       public $btnguardar = null;
       public $hfpassactual = null;
       public $hfpass = null;
       public $hfestatus = null;
       function urealmacenShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
       $this->lbtitulo->Caption= $this->Caption;
       if(isset($_GET["idalmacen"]))
         {
         $this->edidalmacen->Text = $_GET["idalmacen"];
         if($this->edidalmacen->Text == 0)
            $this->hfestatus->Value = 1;
         else
            $this->hfestatus->Value = 2;

         if($this->edidalmacen->Text == 0 && $this->hfestatus->Value == 1)
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
               if(Derechos('Eliminar Almacenes') == false)
                  {
                  echo '<script language="javascript" type="text/javascript">
                       alert("No puede Eliminar Almacenes");
                       window.location="urealmacenvista.php";
                       </script>';
                  }
                   else
                  {
                  $rsm ="Select idalmacen from ofertas where idalmacen = ".$this->edidalmacen->Text;
                  $r = mysql_query($rsm) or die("error sql: ".$rsm." ".mysql_error());
                  if(mysql_num_rows($r) > 0)
                    {
                    echo '<script language="javascript" type="text/javascript">
                         alert("No puede eliminar el Almacen porque esta siendo utilizado por una oferta");
                         window.location="urealmacenvista.php";
                         </script>';
                    }
                  else
                    {
                       $this->hfestatus->Value = 3;
                       $this->Locate();
                       $this->tblalmacen->open();
               	    $this->tblalmacen->delete();
               	    $this->tblalmacen->Active = false;
               	    dmconexion::Log("Elimino el Almacen no. ".$this->edidalmacen->Text." ".
				    $this->ednombre->Text,3);
               	    redirect("urealmacenvista.php");
                    }
                  }
               }
            }
         }
       }

       function btnguardarClick($sender, $params)
       {
       $this->Guardar();
       redirect("urealmacen.php?idalmacen=".$this->edidalmacen->Text);
       }

       function btngcerrarClick($sender, $params)
       {
       $this->Guardar();
       redirect("urealmacenvista.php");
       }

       function edregresarClick($sender, $params)
       {
       redirect('urealmacenvista.php');
       }

       function Alta()
       {
       if($this->hfestatus->Value == 1)
         $this->edidalmacen->Text = MaxId('realmacen', 'idalmacen')+1;
       }

       function Locate()
       {
       if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
         {
         if( $_GET["idalmacen"] != 0)
            {
            $this->edidalmacen->Text = $_GET["idalmacen"];
            $this->sqlgen->close();
            $r = ufh('t');
            $this->sqlgen->SQL = 'SELECT t.idalmacen, t.nombre,
                                t.direccion, t.numero, t.colonia, t.ciudad, t.estado, t.cp,
                                t.telefono, t.fax, t.contacto, '.$r.' as ufh FROM realamacen AS t
                                 where idalmacen = '.$this->edidalmacen->Text;
            $this->sqlgen->Active = true;
            $this->sqlgen->open();
            $this->tblalmacen->setFilter(' idalmacen="'.$this->edidalmacen->Text.'"');
            $this->ednombre->Text = $this->sqlgen->fieldget("nombre");
            $this->eddir->Text = $this->sqlgen->fieldget("direccion");
            $this->ednumero->Text = $this->sqlgen->fieldget("numero");
            $this->edcolonia->Text = $this->sqlgen->fieldget("colonia");
            $this->edciudad->Text = $this->sqlgen->fieldget("ciudad");
            $this->edestado->Text = $this->sqlgen->fieldget("estado");
            $this->edcp->Text = $this->sqlgen->fieldget("cp");
            $this->edtelefono->Text = $this->sqlgen->fieldget("telefono");
            $this->edfax->Text = $this->sqlgen->fieldget("fax");
            $this->edcontacto->Text = $this->sqlgen->fieldget("contacto");
            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");
            }
         }
       }

       function Guardar()
       {
       if(!isset($_GET["idalmacen"]))
         {
         if($this->hfestatus->Value == 1)
            {
            $this->tblalmacen->open();
            $this->tblalmacen->insert();
            $this->tblalmacen->fieldset("idalmacen", $this->edidalmacen->Text);
            $msg = "Inserto el Almacen no. ".$this->edidalmacen->Text." ".$this->ednombre->Text;
            }
         else
            {
            if(Derechos('Modificar Almacenes') == false)
               {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Almacenes");
                  window.location="urealmacenvista.php";
                  </script>';
               }
            else
			   {
               $this->tblalmacen->close();
               $this->tblalmacen->writeFilter('idalmacen="'.$this->edidalmacen->Text.'"');
               $this->tblalmacen->refresh();
               $this->tblalmacen->open();
               $this->tblalmacen->Edit();
               $msg = "Edito el Almacen no. ".$this->edidalmacen->Text." ".$this->ednombre->Text;
               }
			}
         $this->tblalmacen->fieldset("nombre", $this->ednombre->Text);
         $this->tblalmacen->fieldset("direccion", $this->eddir->Text);
         $this->tblalmacen->fieldset("numero", $this->ednumero->Text);
         $this->tblalmacen->fieldset("colonia", $this->edcolonia->Text);
         $this->tblalmacen->fieldset("ciudad", $this->edciudad->Text);
         $this->tblalmacen->fieldset("estado", $this->edestado->Text);
         $this->tblalmacen->fieldset("cp", $this->edcp->Text);
         $this->tblalmacen->fieldset("telefono", $this->edtelefono->Text);
         $this->tblalmacen->fieldset("fax", $this->edfax->Text);
          $this->tblalmacen->fieldset("contacto", $this->edcontacto->Text);
         $this->tblalmacen->fieldset("usuario", $_SESSION["login"]);
         $this->tblalmacen->fieldset("fecha", date("Y/n/j"));
         $this->tblalmacen->fieldset("hora", date("H:i:s"));
         $this->tblalmacen->post();
         $this->tblalmacen->Active = false;
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

global $urealmacen;

//Creates the form
$urealmacen=new urealmacen($application);

//Read from resource file
$urealmacen->loadResource(__FILE__);

//Shows the form
$urealmacen->show();

?>