<script type='text/javascript' src='funciones.js'></script>
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

/*
dayofweek() mysql
1 dom  2 lun 3 mar 4 mie
5 jue  6 vie 7 sab
*/

//Class definition
class udiasfvos extends Page
{
       public $btnregresar = null;
       public $pbotones = null;
       public $btnnuevo = null;
       public $lbtitulo = null;
       public $btngcerrar = null;
       public $btnguardar = null;
       public $hfestatus = null;
       public $cbmes = null;
       public $edfestividad = null;
       public $tbldias = null;
       public $ckcambia = null;
       public $Label6 = null;
       public $Label5 = null;
       public $Label4 = null;
       public $Label2 = null;
       public $cksexenial = null;
       public $cbsemana = null;
       public $cbsustituto = null;
       public $cbdia = null;
       public $sqlgen = null;
       public $sqlgen2 = null;
       public $Label3 = null;
       public $lbufh = null;
       public $edidcontador = null;
       public $Label1 = null;

       function udiasfvosJSLoad($sender, $params)
       {
       ?>
       validarEventos();
       if(vcl.$('hfestatus').value == 1)
          vcl.$("edfestividad").focus();
       <?php
       }

       function btnregresarClick($sender, $params)
       {
       redirect('udiasfvosvista.php');
       }

       function btngcerrarClick($sender, $params)
       {
       if( $this->Validar() == true )
        {
       $this->Guardar();
       redirect("udiasfvosvista.php");
       }
       }

       function btnguardarClick($sender, $params)
       {
       if( $this->Validar() == true )
        {
       $this->Guardar();
       redirect("udiasfvos.php?idcontador=".$this->edidcontador->Text);
       }
       }

       function udiasfvosShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-160;
       $this->lbtitulo->Caption= $this->Caption;
       if(isset($_GET["idcontador"]))
         {
         $this->edidcontador->Text = $_GET["idcontador"];
         if($this->edidcontador->Text == 0)
            $this->hfestatus->Value = 1;
         else
            $this->hfestatus->Value = 2;

         if($this->edidcontador->Text == 0 && $this->hfestatus->Value == 1)
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
               if(Derechos('ELDIASFVOS') == false)
                  {
                  echo '<script language="javascript" type="text/javascript">
                       alert("No puede Eliminar Festividades");
                       window.location="udiasfvosvista.php";
                       </script>';
                  }
                   else
                  {
                       $this->hfestatus->Value = 3;
                       $this->Locate();
                       $this->tbldias->open();
               	    $this->tbldias->delete();
               	    $this->tbldias->Active = false;
               	    dmconexion::Log("Elimino la Festividad no. ".$this->edidcontador->Text." ".
				    $this->edfestividad->Text,3);
               	    redirect("udiasfvosvista.php");
                  }
               }
            }
         }
       }

       function btnnuevoClick($sender, $params)
       {
       if(Derechos('ALDIASFVOS') == false)
         {
		 echo '<script language="javascript" type="text/javascript">
		      alert("No puede Agregar Festividades");
			  </script>';
		 }
	   else
	  	 redirect("udiasfvos.php?idcontador=0");
       }

       function Alta()
       {
       if($this->hfestatus->Value == 1)
         $this->edidcontador->Text = MaxId('diasfestivos', 'idcontador')+1;
       }

       function Locate()
       {
       if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
         {
         if( $_GET["idcontador"] != 0)
            {
            $this->edidcontador->Text = $_GET["idcontador"];
            $this->sqlgen->close();
            $r = ufh('d');
            $this->sqlgen->SQL = 'SELECT idcontador, festividad, dia, mes, diasustituto,
            semanames, sexenial, cambiadia, '.$r.' as ufh FROM diasfestivos AS d
            where idcontador = '.$this->edidcontador->Text;
            $this->sqlgen->Active = true;
            $this->sqlgen->open();
            $this->tbldias->setFilter(' idcontador="'.$this->edidcontador->Text.'"');
            $this->edfestividad->Text = $this->sqlgen->fieldget("festividad");

            $this->cbdia->ItemIndex = $this->sqlgen->fieldget("dia");
            $this->cbmes->ItemIndex = $this->sqlgen->fieldget("mes");
            $this->cbsemana->ItemIndex = $this->sqlgen->fieldget("semanames");
            $this->cbsustituto->ItemIndex = $this->sqlgen->fieldget("diasustituto");

            if($this->sqlgen->fieldget("sexenial")==1)
			    $this->cksexenial->Checked=true;
			else
			    $this->cksexenial->Checked=false;

            if($this->sqlgen->fieldget("cambiadia")==1)
			    $this->ckcambia->Checked=true;
			else
			    $this->ckcambia->Checked=false;

            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");
            }
         }
       }

       function Guardar()
       {
       if(!isset($_GET["idcontador"]))
         {
         if($this->hfestatus->Value == 1)
            {
            $this->tbldias->open();
            $this->tbldias->insert();
            $this->tbldias->fieldset("idcontador", $this->edidcontador->Text);
            $msg = "Inserto la Festividad no. ".$this->edidcontador->Text." ".$this->edfestividad->Text;
            }
         else
            {
            if(Derechos('EDDIASFVOS') == false)
               {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Festividades");
                  window.location="udiasfvosvista.php";
                  </script>';
               }
            else
			   {
               $this->tbldias->close();
               $this->tbldias->writeFilter('idcontador="'.$this->edidcontador->Text.'"');
               $this->tbldias->refresh();
               $this->tbldias->open();
               $this->tbldias->Edit();
               $msg = "Edito la Festividad no. ".$this->edidcontador->Text." ".$this->edfestividad->Text;
               }
			}

         $this->tbldias->fieldset("festividad", strtoupper($this->edfestividad->Text));

         $this->tbldias->fieldset("dia", $_REQUEST['cbdia']);
         $this->tbldias->fieldset("mes", $_REQUEST['cbmes']);
         $this->tbldias->fieldset("semanames", $_REQUEST['scbsemana']);
         $this->tbldias->fieldset("diasustituto", $_REQUEST['cbsustituto']);

         if($this->ckcambia->Checked==true)
		    $this->tbldias->fieldset("cambiadia", 1);
		 else
		    $this->tbldias->fieldset("cambiadia", 0);

         if($this->cksexenial->Checked==true)
		    $this->tbldias->fieldset("sexenial", 1);
		 else
		    $this->tbldias->fieldset("sexenial", 0);

         $this->tbldias->fieldset("usuario", $_SESSION["login"]);
         $this->tbldias->fieldset("fecha", Fecha());
         $this->tbldias->fieldset("hora", Hora());
         $this->tbldias->post();
         $this->tbldias->Active = false;
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

          if($val->inheritsFrom("ComboBox"))
            $val->ItemIndex=0;

          if($val->inheritsFrom("CheckBox"))
            $val->Checked=false;
          }
       $this->lbufh->Caption = '';
       }

       function Validar()
       {
       	if($this->edfestividad->Text == '')
         {
          	echo '<script language="javascript" type="text/javascript">
             alert("Falta el nombre de la Festividad");
             </script>';
          	return false;
         }

       if($this->cbmes->ItemIndex == 0)
         {
          	echo '<script language="javascript" type="text/javascript">
             alert("Falta el mes de la Festividad");
             </script>';
          	return false;
         }

       if($this->cbdia->ItemIndex == 0)
         {
          	echo '<script language="javascript" type="text/javascript">
             alert("Falta el dia de la Festividad");
             </script>';
          	return false;
         }

       return true;
       }
}

global $application;

global $udiasfvos;

//Creates the form
$udiasfvos=new udiasfvos($application);

//Read from resource file
$udiasfvos->loadResource(__FILE__);

//Shows the form
$udiasfvos->show();

?>