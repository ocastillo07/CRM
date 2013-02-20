<script type='text/javascript' src='funciones.js'></script>
<?php
//Includes
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
require_once("vcl/vcl.inc.php");
//Includes
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class urhvacantesac extends Page
{
       public $edcantidad = null;
       public $cbpuesto = null;
       public $cbarea = null;
       public $hfidnota = null;
       public $hfestatus = null;
       public $lbufh = null;
       public $edobservaciones = null;
       public $Label13 = null;
       public $Label7 = null;
       public $Label6 = null;
       public $Label5 = null;
       public $Label4 = null;
       public $cbplaza = null;
       public $Label1 = null;
       public $edidsolicitud = null;
       public $Label2 = null;
       public $dtfechacreacion = null;
       public $Label14 = null;
       public $cbestatus = null;
       public $pbotones = null;
       public $btnimprimir = null;
       public $btnnuevo = null;
       public $lbtitulo = null;
       public $btnregresar = null;
       public $btnguardarcerrar = null;
       public $btnguardar = null;



       function btnimprimirJSClick($sender, $params)
   {
?>
      basicAjax('urhvacantesac_ajax.php', 'Imprimir=1&reporte=rhvacantesac'+
                '&idsolicitud='+vcl.$('edidsolicitud').value+'&tipo=pdf');
<?php

   }

   function urhvacantesacJSLoad($sender, $params)
   {
?>
      validarEventos();
<?php
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('ALRHVACAC') == false)
         echo '<script language="javascript" type="text/javascript">
              alert("No puede dar de Alta Vacantes Aumento de Colaboradores");
              </script>';
      else
         redirect("urhvacantesac.php?idsolicitud=0");
   }

   function btnguardarcerrarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect('urhvacantesacvista.php');
      }
   }

   function btnguardarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect('urhvacantesac.php?idsolicitud=' . $this->edidsolicitud->text);
      }
   }

   function btnregresarClick($sender, $params)
   {
      redirect('urhvacantesacvista.php');
   }

   function urhvacantesacShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET['idsolicitud']))
      {
         $this->edidsolicitud->text = $_GET['idsolicitud'];
         if($this->edidsolicitud->text == '0')
            $this->hfestatus->Value = 1;
         else
            $this->hfestatus->Value = 2;
         //alta
         if($this->hfestatus->Value == 1)
         {
            $this->Limpiar();
            $this->hfestatus->Value = 1;
            $this->inicializa();
            $this->Alta();
         }//modificacion
         else
         {
            if(!isset($_GET["elim"]))
            {
               $this->Limpiar();
               $this->edidsolicitud->text = $_GET['idsolicitud'];
               $this->hfestatus->Value = 2;
               $this->inicializa();
               $this->locate();
            }
            else //eliminar
            {
               if(Derechos('ELRHVACAC') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                    alert("No Tienes el Derecho para Eliminar Vacantes Aumento de Colaboradores");
                    window.location="urhvacantesacvista.php";
                    </script>';
               }
               else
               {
                  $this->hfestatus->Value = 3;
                  $this->Locate();

                  $sql = 'Delete from rhvacantesac where idsolicitud = ' . $this->edidsolicitud->text;
                  $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

                  dmconexion::Log('Elimino el permiso ' . $this->edidsolicitud->text, 3);
                  redirect("urhvacantesacvista.php");
               }
            }
         }
      }
   }

   function Alta()
   {
      $this->edidsolicitud->Text = MaxId('rhvacantesac', 'idsolicitud') + 1;
      $this->cbestatus->ItemIndex = 1;
      $this->cbestatus->Enabled = false;
      $this->habilitar(true);
      $this->edobservaciones->Text = '';
   }

   function Locate()
   {
      $sql = 'Select v.idsolicitud, v.idestatus, v.idnota, v.idplaza, v.fechacreacion,
              v.idarea, v.idpuesto, v.observaciones, v.idoriginador,
              v.cantidad, ' . ufh('v') . ' as ufh
              from rhvacantesac v
              where v.idsolicitud = ' . $this->edidsolicitud->Text;
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);

      $this->dtfechacreacion->Text = $row['fechacreacion'];
      $this->cbestatus->ItemIndex = $row['idestatus'];
      $this->cbarea->ItemIndex = $row['idarea'];
      $this->cbpuesto->ItemIndex = $row['idpuesto'];
      $this->cbplaza->ItemIndex = $row['idplaza'];
      $this->edcantidad->Text = $row['cantidad'];
      $this->edobservaciones->Text = $row['observaciones'];

      $this->lbufh->Caption = $row['ufh'];

      if($this->cbestatus->ItemIndex == 1)
        $this->Habilitar(true);
      else
        $this->Habilitar(false);
   }

   function Guardar()
   {
      $ban = false;

      if($this->hfestatus->value == 1)
      {
         $sql = 'insert into rhvacantesac (idestatus, idnota, idplaza, fechacreacion,
                 idarea, idpuesto, observaciones, cantidad, idoriginador,
                usuario, fecha, hora) values
                (1, ' . $this->hfidnota->Value . ', ' . $this->cbplaza->ItemIndex . ', curdate(),
                ' . $this->cbarea->ItemIndex . ', ' . $this->cbpuesto->ItemIndex . ',
                "' . $this->edobservaciones->Text . '",  "' . $this->edcantidad->Text . '",
                "' . $_SESSION["idusuario"] . '", "' . $_SESSION["login"] . '",curdate(),CURTIME())';
         $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
         $this->edidsolicitud->Text = mysql_insert_id();
         $msg = "Inserto la Vacante AC No. " . $this->edidsolicitud->Text;
         $nivel = 1;

      }
      else
      {
         if(Derechos('EDRHVACAC') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Vacantes Aumento de Colaboradores");
                  window.location="urhvacantesacvista.php";
                  </script>';
            $ban = false;
         }
         else
         {
            $this->hfestatus->Value = 2;
            $msg = "Modifico la Vacante AC No. " . $this->edidsolicitud->Text;
            $nivel = 2;

            $sql = 'update rhvacantesac set idestatus=' . $this->cbestatus->ItemIndex . ',
                idnota=' . $this->hfidnota->Value . ', idplaza=' . $this->cbplaza->ItemIndex . ',
                idarea=' . $this->cbarea->ItemIndex . ', idpuesto=' . $this->cbpuesto->ItemIndex . ',
                observaciones="' . $this->edobservaciones->Text . '", cantidad="' . $this->edcantidad->Text . '",
                usuario="' . $_SESSION["login"] . '", fecha=curdate(), hora=CURTIME()
                where idsolicitud = ' . $this->edidsolicitud->Text;
            $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());

         }
      }

      if($this->cbestatus->ItemIndex == 3)
      {
         $sql = 'update rhvacantesac set contratacion=CURDATE()
                where idsolicitud = ' . $this->edidsolicitud->Text.' and contratacion="0000-00-00"';
            $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
      }

      #para enviar el mail de aviso
      if($this->hfestatus->value == 2 || $this->cbestatus->ItemIndex == 2)
      {
         $msn = 'Se ha creado el Vacante AC No. ' . $this->edidsolicitud->Text .
         ' Del puesto ' . $this->cbpuesto->Items[$this->cbpuesto->ItemIndex] ;

         $correos = GetConfiguraciones('mailrh');
         $mailsistema = GetConfiguraciones('mailsistema');

         enviarmailattach($mailsistema, 'Sistema de CRM', $correos, 'Varios', 'AVISO DE VANCATE AC ', $msn, '', '');

         $this->hfestatus->Value = 2;
      }
      dmconexion::Log($msg, $nivel);
   }

   function Validar()
   {
      if($this->cbestatus->ItemIndex > 2 && $this->hfestatus->value == 2)
      {
         $sql = 'select idestatus from rhvacantesac where idsolicitud=' . $this->edidsolicitud->Text;
         $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         $row = mysql_fetch_array($rs);
         if($row['idestatus'] == 1)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("No puedes Contratar o Rechazar antes de poner en Proceso");
                 </script>';
            return false;
         }

         if($row['idestatus'] > 2)
        {
            echo '<script language="javascript" type="text/javascript">
                 alert("Ya se encuentra cerrado");
                 </script>';
            return false;
        }

         if(Derechos('AUTRHVACAC') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("No tiene derechos para Contratar o Rechazar Vacantes Aumento de Colaboradores");
                 </script>';
            return false;
         }
      }

      if($this->cbplaza->ItemIndex == -1)
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Falta la plaza");
             </script>';
            return false;
         }

      if($this->cbarea->ItemIndex == -1)
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Falta el area");
             </script>';
            return false;
         }

      if($this->cbpuesto->ItemIndex == -1)
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Falta el puesto");
             </script>';
            return false;
         }

      if($this->edcantidad->Text == '' || $this->edcantidad->Text == '0')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Falta la cantidad");
             </script>';
            return false;
         }

      return true;
   }

   function Habilitar($hab)
   {
      $this->dtfechacreacion->Enabled = $hab;
      $this->cbestatus->Enabled = $hab;
      $this->cbarea->Enabled = $hab;
      $this->cbpuesto->Enabled = $hab;
      $this->cbplaza->Enabled = $hab;
      $this->edobservaciones->Enabled = $hab;
      $this->edcantidad->Enabled = $hab;

      if($this->cbestatus->ItemIndex < 3)
         $this->cbestatus->Enabled = true;
      else
         $this->cbestatus->Enabled = false;
   }

   function inicializa()
   {
      //plazas
      $this->cbplaza->Clear();
      $sql = 'select idplaza, nombre from plazas';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbplaza->AddItem($row['nombre'], null , $row['idplaza']);

      //areas
      $this->cbarea->Clear();
      $sql = 'select idarea, nombre from areas';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbarea->AddItem($row['nombre'], null , $row['idarea']);

      //puestos
      $this->cbpuesto->Clear();
      $sql = 'select idpuesto, nombre from puestos';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbpuesto->AddItem($row['nombre'], null , $row['idpuesto']);

      //estatus
      $this->cbestatus->Clear();
      $sql = 'select idestatus, nombre from rhestatus_vac';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbestatus->AddItem($row['nombre'], null , $row['idestatus']);

      //fechacreacion
      $this->dtfechacreacion->Text = Date('Y/m/d');
   }

   function Limpiar()
   {
      reset($this->controls->items);
      while(list($key, $val) = each($this->controls->items))
      {
         if($val->inheritsFrom("Edit") || $val->inheritsFrom("DateTimePicker"))
         {
            $val->Text = "";
         }
         if($val->inheritsFrom("ComboBox"))
         {
            $val->ItemIndex = -1;
         }
         if($val->inheritsFrom("HiddenField"))
         {
            $val->value = '0';
         }
      }
      $this->lbufh->Caption = '';
   }
}

global $application;

global $urhvacantesac;

//Creates the form
$urhvacantesac=new urhvacantesac($application);

//Read from resource file
$urhvacantesac->loadResource(__FILE__);

//Shows the form
$urhvacantesac->show();

?>