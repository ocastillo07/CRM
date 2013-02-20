<?php
require_once("vcl/vcl.inc.php");
//Includes
include("urecursos.php");
include("dmconexion.php");

session_start();
if(!isset($_SESSION["login"]))
  redirect("login.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class ucorreo extends Page
{
   public $hfnombre = null;
   public $upload = null;
   public $lbeliminar = null;
   public $lbadjunto2 = null;
   public $btnadjuntar = null;
   public $btnenviar = null;
   public $mmensaje = null;
   public $edasunto = null;
   public $edpara = null;
   public $edde = null;
   public $lbadjunto = null;
   public $Label4 = null;
   public $Label3 = null;
   public $Label2 = null;
   public $Label1 = null;
   function btnenviarClick($sender, $params)
   {
      if($this->mmensaje->Text!='')
		{
			$from = $_SESSION['email'];
			$name = $this->hfnombre->Value;
			$to= $this->edpara->Text;
      	$subject = $this->edasunto->Text;
      	$message = $this->mmensaje->Text;
			$files = $this->lbadjunto->Caption;
			if($this->lbadjunto2->Caption!='')
				$files.='&'.$this->lbadjunto2->Caption;
			$path = $_SERVER['DOCUMENT_ROOT'] ."/";
      	$envio=enviarmailattach($from,$name,$to,$to,$subject,$message,$path,$files);
      	echo '<script language="javascript" type="text/javascript">
              alert(\' ' .$envio  .'\');  
				   window.close();
            </script>';
		}
		else
		{
			echo '<script language="javascript" type="text/javascript">
           alert(\'El contenido del mensaje esta vacio. Favor de Escribir un mensaje \'); 
         </script>';
		}
	}

   function lbeliminarClick($sender, $params)
   {
      unlink(GetConfiguraciones('pathcorreos'). $this->lbadjunto2->Caption);
      $this->lbadjunto2->Caption = '';
      $this->lbeliminar->Caption = '';
   }

   function btnadjuntarClick($sender, $params)
   {
      $path = GetConfiguraciones('pathcorreos');     
      if(tipoarchivo($_FILES["upload"]["type"]) && $_FILES["upload"]["size"] < 20485760)
      {         
         if($_FILES["upload "]["error "] > 0)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert(\'Error al subir Archivo: ' . $_FILES["upload "]["error "] . '\');
                  </script>';
         }
         else 
         {
            if(file_exists($path . $_FILES["upload"]["name"]))
            {
               echo '<script language="javascript" type="text/javascript">
                    		      alert(\' El Archivo ya existe: ' . $_FILES["upload"]["name"] . '\');
                     	   </script>';
            }
            else 
            {   
               if($this->lbadjunto2->Caption == '')
               {                       
                  move_uploaded_file($_FILES["upload"]["tmp_name"], 
                  $_SERVER['DOCUMENT_ROOT'] . $path . replace($_FILES["upload"]["name"]));
                 
                  $this->lbadjunto2->Caption = replace($_FILES["upload"]["name"]);
                  $this->lbadjunto2->Link = $path. replace($_FILES["upload"]["name"]); 
                  $this->lbeliminar->Caption = 'Eliminar';
						$this->lbeliminar->Link=$path. replace($_FILES["upload"]["name"]); 						
               }
            }
         }
      }
      else 
      {
         echo '<script language="javascript " type="text / javascript ">
                    alert(\' Formato del Archivo Invalido! \');
                  </script>';
      }
   }

   function ucorreoShow($sender, $params)
   {
      if(isset($_GET['name']))
      {  
			$this->limpiar();
			$this->edde->Text = $_GET['name'].' <'.$_SESSION['email'].'>';
         $this->edpara->Text = $_GET['to'];
         $this->edasunto->Text = $_GET['subject'];
         $this->lbadjunto->Caption = $_GET['attach'];
         $this->lbadjunto->Link = "presupuestos/".$_GET['attach'];  
			$this->hfnombre->Value= $_GET['name'];
      }
   }                              
	
	function limpiar()
	{
		reset($this->controls->items);
      while(list($key, $val) = each($this->controls->items))
      {
         if($val->inheritsFrom("Edit"))
         {
            $val->Text = "";
            $val->tag = '';
         }
      }
      $this->lbadjunto->Caption = ''; 
		$this->lbadjunto->Link='';
		$this->lbadjunto2->Caption='';                           
		$this->lbadjunto2->Link='';
		$this->lbeliminar->Caption='';
		$this->lbeliminar->Link='';
		$this->hfnombre->Value='';  
		$this->mmensaje->Clear(); 
	}


}

global $application;

global $ucorreo;

//Creates the form
$ucorreo = new ucorreo($application);

//Read from resource file
$ucorreo->loadResource(__FILE__);

//Shows the form
$ucorreo->show();

?>