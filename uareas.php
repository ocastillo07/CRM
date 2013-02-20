<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
require_once("vcl/vcl.inc.php");
//Includes
use_unit("db.inc.php");
use_unit("mysql.inc.php");
use_unit("dbgrids.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class uareas extends Page
{
       public $tblareas = null;
       public $sqlgen = null;
       public $sqlgen2 = null;
       public $ednombre = null;
       public $edidarea = null;
       public $lbufh = null;
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

       function uareasShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
       $this->lbtitulo->Caption= $this->Caption;
       if(isset($_GET["idarea"]))
         {
         $this->edidarea->Text = $_GET["idarea"];
         if($this->edidarea->Text == 0)
            $this->hfestatus->Value = 1;
         else
            $this->hfestatus->Value = 2;

         if($this->edidarea->Text == 0 && $this->hfestatus->Value == 1)
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
               if(Derechos('Eliminar Areas') == false)
                  {
                  echo '<script language="javascript" type="text/javascript">
                        alert("No puede Eliminar Areas");
                  		window.location="uareasvista.php";
                  		</script>';
                  }
               	else
                  {
                  $rsm ="Select idarea from puestos where idarea = ".$this->edidarea->Text;
                  $r = mysql_query($rsm) or die("error sql: ".$rsm." ".mysql_error());
                  if(mysql_num_rows($r) > 0)
                    {
                    echo '<script language="javascript" type="text/javascript">
                         alert("No puede eliminar el area porque esta siendo utilizada por un puesto");
                         window.location="uareasvista.php";
                         </script>';
                    }
                  else
                    {
               	    $this->hfestatus->Value = 3;
               	    $this->Locate();
               	    $this->tblareas->open();
               	    $this->tblareas->delete();
               	    $this->tblareas->Active = false;
               	    dmconexion::Log("Elimino el Area no. ".$this->edidarea->Text." ".
				    $this->ednombre->Text,3);
               	    redirect("uareasvista.php");
                    }
                  }
               }
            }
         }
       }

       function btngcerrarClick($sender, $params)
       {
       $this->Guardar();
       redirect("uareasvista.php");
       }

       function btnguardarClick($sender, $params)
       {
       $this->Guardar();
       redirect("uareas.php?idarea=".$this->edidarea->Text);
       }

       function edregresarClick($sender, $params)
       {
       redirect('uareasvista.php');
       }

       function Alta()
       {
       if($this->hfestatus->Value == 1)
         $this->edidarea->Text = MaxId('areas', 'idarea')+1;
       }

       function Locate()
       {
       if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
         {
         if( $_GET["idarea"] != 0)
            {
            $this->edidarea->Text = $_GET["idarea"];
            $this->sqlgen->close();
            $r = ufh('a');
            $this->sqlgen->SQL = 'Select idarea,nombre, '.$r.' as ufh from areas a
                                  where idarea = '.$this->edidarea->Text;
            $this->sqlgen->Active = true;
            $this->sqlgen->open();
            $this->tblareas->setFilter(' idarea="'.$this->edidarea->Text.'"');
            $this->ednombre->Text = $this->sqlgen->fieldget("nombre");
            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");
            }
         }
       }

       function Guardar()
       {
       if(!isset($_GET["idarea"]))
         {
         if($this->hfestatus->Value == 1)
            {
            $this->tblareas->open();
            $this->tblareas->insert();
            $this->tblareas->fieldset("idarea", $this->edidarea->Text);
            $msg = "Inserto el Area no. ".$this->edidarea->Text." ".$this->ednombre->Text;
            }
         else
            {
            if(Derechos('Modificar Areas') == false)
               {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Areas");
                  window.location="uareasvista.php";
                  </script>';
               }
            else
			   {
               $this->tblareas->close();
               $this->tblareas->writeFilter('idarea="'.$this->edidarea->Text.'"');
               $this->tblareas->refresh();
               $this->tblareas->open();
               $this->tblareas->Edit();
               $msg = "Edito el Area no. ".$this->edidarea->Text." ".$this->ednombre->Text;
               }
			}
         $this->tblareas->fieldset("nombre", $this->ednombre->Text);
         $this->tblareas->fieldset("usuario", $_SESSION["login"]);
         $this->tblareas->fieldset("fecha", date("Y/n/j"));
         $this->tblareas->fieldset("hora", date("H:i:s"));
         $this->tblareas->post();
         $this->tblareas->Active = false;
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

global $uareas;

//Creates the form
$uareas=new uareas($application);

//Read from resource file
$uareas->loadResource(__FILE__);

//Shows the form
$uareas->show();

?>