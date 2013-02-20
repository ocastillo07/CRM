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
use_unit("db.inc.php");
use_unit("mysql.inc.php");
use_unit("dbgrids.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class uclientesflotilla extends Page
{
       public $edcantidad = null;
       public $cbtipo = null;
       public $hfidcontador = null;
       public $tblflotilla = null;
       public $dsflotilla = null;
       public $sqlflotilla = null;
       public $dgflotilla = null;
       public $sqlgen = null;
       public $hfestatus = null;
       public $Label13 = null;
       public $hfnombre = null;
       public $hfidcliente = null;
       public $lblprocedencia = null;
       public $edidcontador = null;
       public $Label12 = null;
       public $lblufh = null;
       public $Label1 = null;
       public $pbotones = null;
       public $btnregresar = null;
       public $btneliminar = null;
       public $btnnuevo = null;
       public $btngcerrar = null;
       public $btnguardar = null;
       public $pmenu = null;
       function dgflotillaJSDblClick($sender, $params)
       {
       ?>
       //Add your javascript code here
       var model=dgflotilla.getTableModel();
       var row=dgflotilla.getFocusedRow();
       var link = "uclientesflotilla.php?idcliente="+document.getElementById("hfidcliente").value+
                              "&estatus=2&idcontador="+model.getValue(0, row);
       document.location.href(link);
       <?php

       }

       function btneliminarJSClick($sender, $params)
       {

       ?>
       //Add your javascript code here
       var model=dgflotilla.getTableModel();
       var row=dgflotilla.getFocusedRow();
       var link = "uclientesflotilla.php?idcliente="+document.getElementById("hfidcliente").value+
                              "&estatus=3&idcontador="+model.getValue(0, row);
       document.location.href(link);
       <?php

       }

       function uclientesflotillaShow($sender, $params)
       {
       $this->pbotones->Width = $_SESSION["width"]-200;
       if(isset($_GET["idcliente"])== true)
         {
         $this->hfidcliente->Value = $_GET["idcliente"];
         if(isset($_GET["idcontador"])== true)
            $this->edidcontador->Text = $_GET["idcontador"];

         if(isset($_GET["estatus"])== true)
            $this->hfestatus->value = $_GET["estatus"];
         else
            $this->hfestatus->value = 2;

       $nombre = NombreCliente('o');
       $this->sqlgen->close();
       $this->sqlgen->SQL = 'Select '.$nombre.' as nombre from clientes o '.
                            'where idcliente ='.$this->hfidcliente->Value;
       $this->sqlgen->open();
       $this->lblprocedencia->Caption = $this->sqlgen->fieldget('nombre');

       switch( $this->hfestatus->Value )
         {
         case 1:
            {
            $this->inicializaforma();
            $this->Limpiar();
            $this->Alta();
            break;
            }

         case 2:
            {
            $this->inicializaforma();
            $this->Limpiar();
            $this->Locate();
            break;
            }

         case 3:
            {
            $this->inicializaforma();
            $this->Locate();
            $this->tblflotilla->open();
            $this->tblflotilla->delete();
            $this->tblflotilla->Active = false;
            $this->Limpiar();
            dmconexion::Log("Elimino el idflotilla no. ".$this->edidcontador->Text." del cliente no.".$this->hfidcliente->Value,3);
            redirect("uclientesflotilla.php?idcliente=".$this->hfidcliente->Value);
            break;
            }
            }
         }


       }

       function btnguardarClick($sender, $params)
       {
        $r = $this->Validar();
         if($r == true)
            {
            $this->Guardar();
            redirect("uclientesflotilla.php?idcliente=".$this->hfidcliente->Value."&idcontador=".$this->edidcontador->Text);
            }
       }

       function btngcerrarClick($sender, $params)
       {
        $r = $this->Validar();
         if($r == true)
            {
            $this->Guardar();
            redirect("uclientes.php?=idcliente=".$this->hfidcliente->Value);
            }
       }

       function btnnuevoClick($sender, $params)
       {
       redirect("uclientesflotilla.php?idcliente=".$this->hfidcliente->Value."&estatus=1");
       }

       function btnregresarClick($sender, $params)
       {
       redirect('uclientes.php?idcliente='.$this->hfidcliente->Value);
       }

       function uclientesflotillaCreate($sender, $params)
       {
       menu();
       }

       function Validar()
       {
       if($this->cbtipo->ItemIndex == -1)
         {
         echo '<script language="javascript" type="text/javascript"> '.
              'alert(\'Falta el tipo de camion.\'); </script>';
         return false;
         }

       if($this->edcantidad->Text == "")
         {
         echo '<script language="javascript" type="text/javascript"> '.
              'alert(\'Falta la cantidad.\'); </script>';
         return false;
         }

       return true;
       }


       function Alta()
       {
       if($this->hfestatus->Value == 1)
         {
         if(isset($_GET["idcliente"])== true)
           $this->hfidcliente->Value = $_GET["idcliente"];

         $this->edidcontador->Text = MaxId('clientesflotilla', 'idcontador')+1;

         $this->sqlflotilla->close();
         $this->sqlflotilla->SQL = 'Select c.idcontador, t.nombre, c.cantidad '.
         'from clientesflotilla c left join camionestipos as t on t.idtipo=c.idtipo '.
         'where idcliente ='.$this->hfidcliente->Value.' order by idcontador';
         $this->sqlflotilla->open();

         }
       }

       function Locate()
       {
       if ($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
         {
         $this->hfidcliente->Value = $_GET["idcliente"];
         if(isset($_GET["idcontador"]))
            $this->edidcontador->Text = $_GET["idcontador"];
         else
            {
            $this->sqlgen->close();
            $this->sqlgen->SQL = 'Select ifnull(min(idcontador),0) as id from clientesflotilla '.
                                 'where idcliente = '.$_GET["idcliente"];
            $this->sqlgen->open();
            $this->edidcontador->Text = $this->sqlgen->fieldget("id");

            if($this->edidcontador->Text == '0')
               {
               $this->hfestatus->Value = 1;
               $this->Alta();
               //exit;
               }
            }
         }

         $nombre = NombreFisica('c');
         $this->sqlflotilla->close();
         $this->sqlflotilla->SQL = 'Select c.idcontador, t.nombre, c.cantidad '.
         'from clientesflotilla c left join camionestipos as t on t.idtipo=c.idtipo '.
         'where idcliente ='.$this->hfidcliente->Value.' order by idcontador';
         $this->sqlflotilla->open();


         if($this->edidcontador->Text != "")
            {
            $this->tblflotilla->setFilter(' idcontador="'.$this->edidcontador->Text.'"');
            $this->sqlgen->close();
            $r = ufh('c');
            $this->sqlgen->SQL = 'Select idtipo, idcontador, cantidad, '.$r.' as ufh '.
                               'from clientesflotilla c '.
                               'where idcontador = '.$this->edidcontador->Text;
            $this->sqlgen->open();
            if($this->sqlgen->RecordCount > 0)
               {
               $this->edcantidad->Text =  $this->sqlgen->fieldget("cantidad");

               $this->lblufh->Caption = $this->sqlgen->fieldget("ufh");

               $this->cbtipo->ItemIndex = $this->sqlgen->fieldget("idtipo");
               }
            }
         }

       function Guardar()
       {
       if(!isset($_GET["idcliente"]))
         {
         if($this->hfestatus->Value == 1)
            {
            $this->tblflotilla->open();
            $this->tblflotilla->insert();
            $this->tblflotilla->fieldset("idcontador", $this->edidcontador->Text);
            $msg = "Inserto a la flotilla el camion no. ".$this->edidcontador->Text." del cliente no.".$this->hfidcliente->Value;
            $nivel = 1;
            }
         else
            {
            $this->tblflotilla->close();
            $this->tblflotilla->writeFilter('idcontador="'.$this->edidcontador->Text.'"');
            $this->tblflotilla->refresh();
            $this->tblflotilla->open();
            $this->tblflotilla->Edit();
            $msg = "Edito la flotilla del camion no. ".$this->edidcontador->Text." ".$this->hfnombre->Value." del cliente no.".$this->hfidcliente->Value;
            $nivel = 2;
            }

         $this->tblflotilla->fieldset("cantidad", $this->edcantidad->Text);
         $this->tblflotilla->fieldset("idcliente", $this->hfidcliente->Value);

         $this->tblflotilla->fieldset("idtipo", $_REQUEST['cbtipo']);

         $this->tblflotilla->fieldset("usuario", $_SESSION["login"]);
         $this->tblflotilla->fieldset("fecha", date("Y/n/j"));
         $this->tblflotilla->fieldset("hora", date("H:i:s"));
         $this->tblflotilla->post();
         $this->tblflotilla->Active = false;
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
       $this->lblufh->Caption = '';
       }

       function inicializaforma()
         {
         //tipo camion
         $this->sqlgen->close();
         $this->sqlgen->sql = 'Select nombre, idtipo as id from camionestipos';
         $this->sqlgen->open();
         $this->cbtipo->Clear();
         $this->cbtipo->AddItem("", null, null);
         while($this->sqlgen->EOF != true)
            {
            $this->cbtipo->AddItem($this->sqlgen->fieldget("nombre"), null, $this->sqlgen->fieldget("id"));
            $this->sqlgen->next();
            }


         }

}

global $application;

global $uclientesflotilla;

//Creates the form
$uclientesflotilla=new uclientesflotilla($application);

//Read from resource file
$uclientesflotilla->loadResource(__FILE__);

//Shows the form
$uclientesflotilla->show();

?>