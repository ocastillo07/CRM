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
class urhvacaciones extends Page
{
   public $hfidcubre = null;
   public $hfidcolaborador = null;
   public $btncal = null;
   public $btnregresar = null;
   public $hfidnota = null;
   public $hfestatus = null;
   public $btncubre = null;
   public $edobservaciones = null;
   public $edpuestocubre = null;
   public $edcubre = null;
   public $edidcubre = null;
   public $dtregreso = null;
   public $dtfin = null;
   public $dtinicio = null;
   public $eddisfrutar = null;
   public $eddisponibles = null;
   public $edfechaingreso = null;
   public $edpuesto = null;
   public $edarea = null;
   public $dtfechacreacion = null;
   public $cbplaza = null;
   public $ednombre = null;
   public $edidcolaborador = null;
   public $Label17 = null;
   public $Label16 = null;
   public $Label15 = null;
   public $Label12 = null;
   public $Label11 = null;
   public $Label10 = null;
   public $Label8 = null;
   public $Label7 = null;
   public $Label9 = null;
   public $lbufh = null;
   public $Label13 = null;
   public $Label6 = null;
   public $Label5 = null;
   public $Label4 = null;
   public $btnbuscarcli = null;
   public $Label3 = null;
   public $Label1 = null;
   public $edidsolicitud = null;
   public $Label2 = null;
   public $Label14 = null;
   public $cbestatus = null;
   public $pbotones = null;
   public $btnimprimir = null;
   public $btnnuevo = null;
   public $lbtitulo = null;
   public $btnguardarcerrar = null;
   public $btnguardar = null;
   function btnimprimirJSClick($sender, $params)
   {
   ?>
      basicAjax('urhvacaciones_ajax.php', 'Imprimir=1&reporte=rhvacaciones'+
                '&idsolicitud='+vcl.$('edidsolicitud').value+'&tipo=pdf');
   <?php
   }

   function edidcolaboradorJSKeyPress($sender, $params)
   {
   ?>
   if( ValidaEntero(vcl.$('edidcolaborador').value, event) != event.keyCode)
        return false;
   <?php
   }

   function edidcubreJSKeyPress($sender, $params)
   {
   ?>
   if( ValidaEntero(vcl.$('edidcubre').value, event) != event.keyCode)
        return false;
   <?php
   }

   function eddisfrutarJSKeyPress($sender, $params)
   {
   ?>
   if( ValidaEntero(vcl.$('eddisfrutar').value, event) != event.keyCode)
        return false;
   <?php
   }

   function btncalJSClick($sender, $params)
   {
?>
   basicAjax('urhvacaciones_ajax.php', 'CalculaPeriodo=1'+
             '&dias='+vcl.$('eddisfrutar').value+
             '&inicio='+vcl.$('dtinicio').value);
<?php
   }

   function eddisfrutarJSBlur($sender, $params)
   {
?>
   basicAjax('urhvacaciones_ajax.php', 'CalculaPeriodo=1'+
             '&dias='+vcl.$('eddisfrutar').value+
             '&inicio='+vcl.$('dtinicio').value);
<?php
   }


   function btncubreClick($sender, $params)
   {
      redirect('urhcolaboradoresvista.php?pagina=urhvacaciones.php&tipo=c');
   }

   function edidcubreJSBlur($sender, $params)
   {
?>
      if(vcl.$('edidcubre').value != '')
        basicAjax('urhvacaciones_ajax.php', 'TraeCubridor='+vcl.$('edidcubre').value);
<?php
   }

   function btncolaboradorClick($sender, $params)
   {
      redirect('urhcolaboradoresvista.php?pagina=urhvacaciones.php');
   }

   function edidcolaboradorJSBlur($sender, $params)
   {
?>
      if(vcl.$('edidcolaborador').value != '')
        basicAjax('urhvacaciones_ajax.php', 'TraeColaborador='+vcl.$('edidcolaborador').value);
<?php
   }

   function urhvacacionesJSLoad($sender, $params)
   {
?>
      validarEventos();
      if(vcl.$('edidcolaborador').value != '')
        basicAjax('urhvacaciones_ajax.php', 'TraeColaborador='+vcl.$('edidcolaborador').value);

      if(vcl.$('edidcubre').value != '')
        basicAjax('urhvacaciones_ajax.php', 'TraeCubridor='+vcl.$('edidcubre').value);
<?php
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('ALRHVACA') == false)
         echo '<script language="javascript" type="text/javascript">
              alert("No puede dar de Alta Vacaciones");
              </script>';
      else
         redirect("urhvacaciones.php?idsolicitud=0");
   }

   function btnguardarcerrarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect('urhvacacionesvista.php');
      }
   }

   function btnguardarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect('urhvacaciones.php?idsolicitud=' . $this->edidsolicitud->text);
      }
   }

   function btnregresarClick($sender, $params)
   {
      redirect('urhvacacionesvista.php');
   }

   function urhvacacionesShow($sender, $params)
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
               if(Derechos('ELRHVACA') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                    alert("No Tienes el Derecho para Eliminar Vacaciones");
                    window.location="urhvacacionesvista.php";
                    </script>';
               }
               else
               {
                  $this->hfestatus->Value = 3;
                  $this->Locate();

                  $sql = 'Delete from rhvacaciones where idsolicitud = ' . $this->edidsolicitud->text;
                  $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

                  dmconexion::Log('Elimino la vacante ' . $this->edidsolicitud->text, 3);
                  redirect("urhvacacionesvista.php");
               }
            }
         }
      }

      if(isset($_GET['idcolaborador']))
      {
         if(!isset($_GET['tipo']))
         {
            $this->hfidcolaborador->value = $_GET['idcolaborador'];
            $sql = 'select idempleado from rhcolaboradores where idcolaborador = ' . $this->hfidcolaborador->value;
            $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
            $row = mysql_fetch_array($rs);
            $this->edidcolaborador->Text = $row['idempleado'];
         }
         else
         {
            $this->hfidcubre->value = $_GET['idcolaborador'];
            $sql = 'select idempleado from rhcolaboradores where idcolaborador = ' . $this->hfidcubre->value;
            $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
            $row = mysql_fetch_array($rs);
            $this->edidcubre->Text = $row['idempleado'];
         }
      }
   }

   function Alta()
   {
      $this->edidsolicitud->Text = MaxId('rhvacaciones', 'idsolicitud') + 1;
      $this->cbestatus->ItemIndex = 1;
      $this->cbestatus->Enabled = false;
      $this->edobservaciones->Text = '';
      $this->habilitar(true);
   }

   function Locate()
   {
      $sql = 'SELECT v.idsolicitud, v.idcolaborador, v.idplaza, v.fechacreacion,
              concat(c.nombre, " ", c.apaterno, " ", c.amaterno) AS colaborador,
              c.idempleado, c.diaspendientes, c.fechaingreso,
              pt.nombre as puesto, a.nombre as area,
              v.idoriginador, v.dias, v.fechainicio, v.fechafin, v.fecharegreso,
              v.observaciones,  v.idnota, v.idestatus, v.idcubre, b.idempleado as idcubreemp,
              concat(b.nombre, " ", b.apaterno, " ", b.amaterno) AS cubre,
              pb.nombre as puestocubre, ' . ufh('v') . ' as ufh
              from rhvacaciones v
              left join rhcolaboradores c on c.idcolaborador=v.idcolaborador
              left join puestos pt on pt.idpuesto=c.idpuesto
              left join areas a on a.idarea=c.idarea
              left join rhcolaboradores b on b.idcolaborador=v.idcubre
              left join puestos pb on pb.idpuesto=b.idpuesto
              where v.idsolicitud = ' . $this->edidsolicitud->Text;
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);



      $this->dtfechacreacion->Text = $row['fechacreacion'];
      $this->cbestatus->ItemIndex = $row['idestatus'];
      $this->hfidcolaborador->value = $row['idcolaborador'];
      $this->edidcolaborador->Text = $row['idempleado'];
      $this->ednombre->Text = $row['colaborador'];
      $this->edarea->Text = $row['area'];
      $this->edpuesto->Text = $row['puesto'];
      $this->cbplaza->ItemIndex = $row['idplaza'];
      $this->edpuestocubre->Text = $row['puestocubre'];
      $this->edcubre->Text = $row['cubre'];
      $this->hfidcubre->value = $row['idcubre'];
      $this->edidcubre->Text = $row['idcubreemp'];
      $this->dtregreso->Text = $row['fecharegreso'];
      $this->dtfin->Text = $row['fechafin'];
      $this->dtinicio->Text = $row['fechainicio'];
      $this->eddisfrutar->Text = $row['dias'];
      $this->eddisponibles->Text = $row['diaspendientes'];
      $this->edfechaingreso->Text = $row['fechaingreso'];
      $this->edobservaciones->Text = $row['observaciones'];
      $this->lbufh->Caption = $row['ufh'];
   }

   function Guardar()
   {
      $ban = false;

      if($this->hfestatus->value == 1)
      {
         $sql = 'insert into rhvacaciones (idestatus, idnota, idplaza, idcolaborador, fechacreacion,
                dias, fechainicio, fechafin, fecharegreso, idcubre, observaciones, idoriginador,
                usuario, fecha, hora) values
                (1, ' . $this->hfidnota->Value . ', ' . $this->cbplaza->ItemIndex . ',
                "' . $this->hfidcolaborador->value . '", curdate(),
                ' . $this->eddisfrutar->Text . ', "' . $this->dtinicio->Text . '",
                "' . $this->dtfin->text . '","' . $this->dtregreso->Text . '",
                 "' . $this->hfidcubre->value . '", "' . $this->edobservaciones->Text . '",
                "' . $_SESSION["idusuario"] . '", "' . $_SESSION["login"] . '",curdate(),CURTIME())';
         $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
         $this->edidsolicitud->Text = mysql_insert_id();
         $msg = "Inserto las Vacaciones No. " . $this->edidsolicitud->Text;
         $nivel = 1;

      }
      else
      {
         if(Derechos('EDRHVACA') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Vacaciones");
                  window.location="urhvacacionesvista.php";
                  </script>';
            $ban = false;
         }
         else
         {
            $this->hfestatus->Value = 2;
            $msg = "Modifico las Vacaciones No. " . $this->edidsolicitud->Text;
            $nivel = 2;

            $sql = 'update rhvacaciones set idestatus=' . $this->cbestatus->ItemIndex . ',
                    idnota=' . $this->hfidnota->Value . ', idplaza=' . $this->cbplaza->ItemIndex . ',
                    idcolaborador="' . $this->hfidcolaborador->value . '", dias=' . $this->eddisfrutar->Text . ',
                    fechainicio="' . $this->dtinicio->Text . '", fechafin="' . $this->dtfin->text . '",
                    fecharegreso="' . $this->dtregreso->Text . '", idcubre="' . $this->hfidcubre->value . '",
                    observaciones="' . $this->edobservaciones->Text . '",
                    usuario="' . $_SESSION["login"] . '", fecha=curdate(), hora=CURTIME()
                    where idsolicitud = ' . $this->edidsolicitud->Text;
            $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());

         }
      }
      #para enviar el mail de aviso
      if($this->hfestatus->value == 2 || $this->cbestatus->ItemIndex == 2)
      {
         $msn = 'Se han creado las Vacaciones No. ' . $this->edidsolicitud->Text .
         '. Para el colaborador ' . $this->ednombre->text .
         '. De ' . $this->dtinicio->Text . ' a ' . $this->dtfin->text . ' con regreso el dia ' . $this->dtregreso->Text . '.';

         $correos = GetConfiguraciones('mailrh');
         $mailsistema = GetConfiguraciones('mailsistema');

         enviarmailattach($mailsistema, 'Sistema de CRM', $correos, 'Varios', 'AVISO DE PERMISO ', $msn, '', '');

         $this->hfestatus->Value = 2;
      }
      dmconexion::Log($msg, $nivel);
   }

   function Validar()
   {
      if($this->cbestatus->ItemIndex > 2 && $this->hfestatus->value == 2)
      {
        $sql = 'select idestatus from rhvacaciones where idsolicitud='.$this->edidsolicitud->Text;
        $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
        $row = mysql_fetch_array($rs);
        if($row['idestatus'] == 1)
        {
            echo '<script language="javascript" type="text/javascript">
                 alert("No puedes Autorizar o Rechazar antes de poner en Proceso");
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

        if(Derechos('AUTRHVACA') == false)
        {
           echo '<script language="javascript" type="text/javascript">
                 alert("No tiene derechos para Autorizar o Rechazar Vacaciones");
                 </script>';
            return false;
         }
      }

      if($this->edidcolaborador->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el Colaborador de las Vacaciones");
             </script>';
         return false;
      }

      if($this->cbplaza->ItemIndex == - 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la Plaza");
             </script>';
         return false;
      }

      if($this->eddisfrutar->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan los dias a disfrutar");
             </script>';
         return false;
      }

      if($this->dtinicio->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan la fecha de inicio de las vacaciones");
             </script>';
         return false;
      }

      if($this->dtfin->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan la fecha de termino de las vacaciones");
             </script>';
         return false;
      }

      if($this->dtregreso->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan la fecha de regreso de las vacaciones");
             </script>';
         return false;
      }

      if($this->hfidcubre->Value == '' ||  $this->hfidcubre->Value == '0')
      {
          echo '<script language="javascript" type="text/javascript">
             alert("Falta la persona que cubre.);
             </script>';
         return false;
      }

      if($this->hfidcolaborador->Value == $this->hfidcubre->Value)
      {
          echo '<script language="javascript" type="text/javascript">
             alert("La persona que cubre no puede ser la misma que vacacione");
             </script>';
         return false;
      }

      if($this->edobservaciones->Text == '')
      {
          echo '<script language="javascript" type="text/javascript">
             alert("Faltan las observaciones");
             </script>';
         return false;
      }

      //fechas
      if($this->cbestatus->ItemIndex == 1)
      {
         if(strtotime($this->dtinicio->Text) < strtotime(date('Y/m/d')))
         {
            echo '<script language="javascript" type="text/javascript">
             alert("La fecha de Vacaciones es menor a la actual");
             </script>';
            return false;
         }

         if(strtotime($this->dtfin->Text) < strtotime($this->dtinicio->Text))
         {
            echo '<script language="javascript" type="text/javascript">
             alert("La fecha de Fin de Vacaciones es menor a la fecha de Inicio");
             </script>';
            return false;
         }

         if(strtotime($this->dtregreso->Text) < strtotime($this->dtfin->Text))
         {
            echo '<script language="javascript" type="text/javascript">
             alert("La fecha de Regreso de Vacaciones es menor a la fecha Fin");
             </script>';
            return false;
         }
      }

      return true;
   }

   function Habilitar($hab)
   {
      $this->dtfechacreacion->Enabled = $hab;
      $this->cbestatus->Enabled = $hab;
      $this->edidcolaborador->Enabled = $hab;
      $this->ednombre->Enabled = $hab;
      $this->edarea->Enabled = $hab;
      $this->edpuesto->Enabled = $hab;
      $this->cbplaza->Enabled = $hab;
      $this->edobservaciones->Enabled = $hab;
   }

   function inicializa()
   {
      //plaza
      $this->cbplaza->Clear();
      $sql = 'select idplaza, nombre from plazas';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbplaza->AddItem($row['nombre'], null , $row['idplaza']);

      //estatus
      $this->cbestatus->Clear();
      $sql = 'select idestatus, nombre from rhestatus';
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

global $urhvacaciones;

//Creates the form
$urhvacaciones = new urhvacaciones($application);

//Read from resource file
$urhvacaciones->loadResource(__FILE__);

//Shows the form
$urhvacaciones->show();

?>