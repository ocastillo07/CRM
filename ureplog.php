<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   {
   redirect("login.php");
   }
require_once("vcl/vcl.inc.php");
//Includes
use_unit("mysql.inc.php");
use_unit("comctrls.inc.php");
use_unit("buttons.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class ureplog extends Page
{
       public $lbtitulo = null;
       public $lbreporte = null;
       public $pbotones = null;
       public $btngenerar = null;
       public $sqlgen = null;
       public $dtf2 = null;
       public $dtf1 = null;
       public $rgimpresion = null;
       public $cbusuario = null;
       public $Label2 = null;

       function ureplogCreate($sender, $params)
       {
       	if(Derechos('ACCREPORLOG') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	   alert("Usted no tiene derechos para Accesar al Reporte de Log");
               	document.location.href("menu.php");
               	</script>';
         	exit;
         }
       }


       function btngenerarClick($sender, $params)
       {
         switch($this->rgimpresion->ItemIndex)
         {
         case 0 : $r = 'pdf';
                  break;
         case 1 : $r = 'xls';
                  break;
         case 2 : $r = 'rtf';
                  break;
         }

         if($this->cbusuario->ItemIndex==0)
            $cadena='u.idusuario>0';
         else
            $cadena='u.idusuario='.$_REQUEST['cbusuario'];
         echo '<script language="javascript" type="text/javascript">
         window.open("http://'.GetConfiguraciones('ipserver').':8080/imprimir.jsp?reporte=logusuarios&tiporeporte='.$r.'&idusuario='.$cadena.'&f1='.$_REQUEST["dtf1"].'&f2='.$_REQUEST["dtf2"].'", "_blank");
         </script>';

      }

       function ureplogShow($sender, $params)
       {
         if($this->dtf1->Text == '')
         {
            $this->pbotones->Width = $_SESSION["width"]-200;
            $this->dtf1->Text = date("Y-m-d");
            $this->dtf2->Text = date("Y-m-d");
          //Vendedores
            $this->sqlgen->close();
            $nombre = NombreFisica('u');
            $this->sqlgen->sql = 'Select u.idusuario as id, '.$nombre.' as nombre from usuarios u
                                  left join puestos p on p.idpuesto=u.idpuesto order by nombre';
            $this->sqlgen->open();
            $this->cbusuario->Clear();
            $this->cbusuario->AddItem("Todos", null, 0);
            while($this->sqlgen->EOF != true)
            {
               $this->cbusuario->AddItem($this->sqlgen->fieldget("nombre"), null, $this->sqlgen->fieldget("id"));
               $this->sqlgen->next();
            }
         }
       }
}

global $application;

global $ureplog;

//Creates the form
$ureplog=new ureplog($application);

//Read from resource file
$ureplog->loadResource(__FILE__);

//Shows the form
$ureplog->show();

?>