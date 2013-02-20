<script type='text/javascript' src='funciones.js'></script>
<?php
//Includes
include("dmconexion.php");
include("urecursos.php");
include("ufechas.php");
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
class urhexcepciones extends Page
{
   public $Label42 = null;
   public $edoriginador = null;
   public $hfidestatus = null;
   public $eddirector = null;
   public $Label12 = null;
   public $lbnotas = null;
   public $lblhistorial = null;
   public $hfidcolaborador = null;
   public $edarea = null;
   public $hfidnota = null;
   public $btnregresar = null;
   public $hfestatus = null;
   public $lbufh = null;
   public $edmotivo = null;
   public $dtafectacion = null;
   public $edjustificacion = null;
   public $edmonto = null;
   public $rgtipo = null;
   public $edpuesto = null;
   public $cbplaza = null;
   public $dtfechacreacion = null;
   public $btncolaborador = null;
   public $ednombre = null;
   public $edidcolaborador = null;
   public $Label11 = null;
   public $Label10 = null;
   public $Label9 = null;
   public $Label8 = null;
   public $Label13 = null;
   public $Label7 = null;
   public $Label6 = null;
   public $Label5 = null;
   public $Label4 = null;
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
   function lbnotasClick($sender, $params)
   {
      if($this->hfestatus->Value == 1)
      {
         echo '<script language="javascript" type="text/javascript">
           alert("No puedes agregar notas sin guardar primero.");
           </script>';
         exit;
      }
      $this->guardar();

      if($this->hfidnota->Value > 0)
         redirect('unotas.php?idnota=' . $this->hfidnota->Value .
         '&procedencia=rhexcepciones&idprocedencia=' . $this->edidsolicitud->Text);
      else
         redirect('unotas.php?idnota=0&procedencia=rhexcepciones&idprocedencia=' . $this->edidsolicitud->Text);
   }

   function edidcolaboradorJSKeyPress($sender, $params)
   {

?>
   if( ValidaEntero(vcl.$('edidcolaborador').value, event) != event.keyCode)
        return false;

<?php

   }

   function btnimprimirJSClick($sender, $params)
   {
?>
      basicAjax('urhexcepciones_ajax.php', 'Imprimir=1&reporte=rhexcepciones'+
                '&idsolicitud='+vcl.$('edidsolicitud').value+'&tipo=pdf');
<?php
   }


   function edmontoJSKeyPress($sender, $params)
   {

?>
   if( ValidaDecimal(vcl.$('edmonto').value, event) != event.keyCode)
        return false;
<?php

   }

   function edidcolaboradorJSChange($sender, $params)
   {
?>
      if(vcl.$('edidcolaborador').value == '')
      {
        vcl.$('ednombre').value = '';
        vcl.$('edarea').value = '';
        vcl.$('edpuesto').value = '';
      }
<?php
   }

   function rgtipoClick($sender, $params)
   {
      $this->habportipo();
   }

   function btncolaboradorClick($sender, $params)
   {
      redirect('urhcolaboradoresvista.php?pagina=urhexcepciones.php');
   }

   function rgtipoJSChange($sender, $params)
   {
?>
      if(vcl.$('rgtipo').itemIndex == 0)
      {
        vcl.$('edmonto').enabled = true;
        vcl.$('edjustificacion').enabled = true;
        vcl.$('dtafectacion').enabled = false;
        vcl.$('edmotivo').enabled = false;
      }
      else
      {
        vcl.$('edmonto').enabled = false;
        vcl.$('edjustificacion').enabled = false;
        vcl.$('dtafectacion').enabled = true;
        vcl.$('edmotivo').enabled = true;
      }
<?php
   }

   function edidcolaboradorJSBlur($sender, $params)
   {
?>
   if(vcl.$('edidcolaborador').value != '')
      basicAjax('urhexcepciones_ajax.php', 'TraeColaborador='+vcl.$('edidcolaborador').value);
<?php
   }


   function urhexcepcionesJSLoad($sender, $params)
   {
?>
      validarEventos();
      if(vcl.$('edidcolaborador').value != '')
        basicAjax('urhexcepciones_ajax.php', 'TraeColaborador='+vcl.$('edidcolaborador').value);
<?php
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('ALRHEXCEP') == false)
         echo '<script language="javascript" type="text/javascript">
              alert("No puede dar de Alta Excepciones");
              </script>';
      else
         redirect("urhexcepciones.php?idsolicitud=0");
   }

   function btnguardarcerrarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect('urhexcepcionesvista.php');
      }
   }

   function btnguardarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect('urhexcepciones.php?idsolicitud=' . $this->edidsolicitud->text);
      }
   }

   function btnregresarClick($sender, $params)
   {
      redirect('urhexcepcionesvista.php');
   }

   function urhexcepcionesShow($sender, $params)
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
               if(Derechos('ELRHEXCEP') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                    alert("No Tienes el Derecho para Eliminar Excepciones");
                    window.location="urhexcepcionesvista.php";
                    </script>';
               }
               else
               {
                  $this->hfestatus->Value = 3;
                  $this->Locate();

                  $sql = 'Delete from rhexcepciones where idsolicitud = ' . $this->edidsolicitud->text;
                  $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

                  dmconexion::Log('Elimino la excepcion ' . $this->edidsolicitud->text, 3);
                  redirect("urhexcepcionesvista.php");
               }
            }
         }
      }

      if(isset($_GET['idcolaborador']))
      {
         $this->hfidcolaborador->value = $_GET['idcolaborador'];
         $sql = 'select idempleado from rhcolaboradores where idcolaborador = ' . $this->hfidcolaborador->value;
         $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         $row = mysql_fetch_array($rs);
         $this->edidcolaborador->Text = $row['idempleado'];
      }

      if(isset($_GET['idprocedencia']))
      {
         $this->hfidnota->Value = $_GET['idnota'];
         $sql = 'update rhexcepciones set idnota=' . $_GET['idnota'] . ' where idsolicitud=' . $this->edidsolicitud->Text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->TraerNotas();
      }
   }

   function Alta()
   {
      $this->edidsolicitud->Text = MaxId('rhexcepciones', 'idsolicitud') + 1;
      $this->cbestatus->ItemIndex = 1;
      $this->cbestatus->Enabled = false;
      $this->hfestatus->Value = 1;
      $this->hfidestatus->Value = 1;
      $this->habilitar(true);
      $this->edjustificacion->Text = '';
      $this->eddirector->Text = '';
      $this->edmotivo->Text = '';
      $this->rgtipo->ItemIndex = 0;
      $this->habportipo();

      $sql = 'Select ' . NombreFisica('u') . ' as originador from usuarios u where idusuario=' . $_SESSION['idusuario'];
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);
      $this->edoriginador->Text = $row['originador'];
   }

   function Locate()
   {
      //$this->edjustificacion->Text = '';
      //         $this->edmotivo->Text = '';
      $sql = 'SELECT  e.idsolicitud, e.idestatus, e.idcolaborador, c.idempleado,
              concat(c.nombre, " ", c.apaterno, " ", c.amaterno) as colaborador,
							p.nombre as puesto, a.nombre as area, e.director,
              e.idnota, e.idplaza, e.fechacreacion, e.tipo, e.monto, e.justificacion,
              e.fechaafectacion, e.motivo, s.nombre as estatus,
              ' . NombreFisica('u') . ' as originador, ' . ufh('e') . ' as ufh
              from rhexcepciones e left join rhestatus s on s.idestatus=e.idestatus
              left join rhcolaboradores c on c.idcolaborador=e.idcolaborador
							left join puestos p on p.idpuesto=c.idpuesto
							left join areas a on a.idarea=c.idarea
              left join usuarios u on u.idusuario=e.idoriginador
              where e.idsolicitud = ' . $this->edidsolicitud->Text;
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);
      $this->dtfechacreacion->Text = $row['fechacreacion'];
      $this->cbestatus->ItemIndex = $row['idestatus'];
      $this->hfidestatus->value = $row['idestatus'];
      $this->hfidcolaborador->value = $row['idcolaborador'];
      $this->edidcolaborador->Text = $row['idempleado'];
      $this->ednombre->Text = $row['colaborador'];
      $this->edarea->Text = $row['area'];
      $this->edpuesto->Text = $row['puesto'];
      $this->cbplaza->ItemIndex = $row['idplaza'];
      $this->edmonto->Text = $row['monto'];
      $this->edjustificacion->Text = $row['justificacion'];
      $this->eddirector->Text = $row['director'];
      $this->edmotivo->Text = $row['motivo'];
      $this->dtafectacion->Text = $row['fechaafectacion'];
      $this->hfidnota->Value = $row['idnota'];
      $this->edoriginador->Text = $row['originador'];

      if($row['tipo'] == 'PAE')
         $this->rgtipo->ItemIndex = 0;
      else
         $this->rgtipo->ItemIndex = 1;

      $this->lbufh->Caption = $row['ufh'];

      if($row['idestatus'] > 1)
         $this->Habilitar(false);
      else
         $this->Habilitar(true);

      $this->habportipo();

      $this->TraerNotas();
   }

   function Guardar()
   {
      $ban = false;
      $nom = $this->rgtipo->Items[$this->rgtipo->ItemIndex];
      if($this->rgtipo->ItemIndex == 0)
      {
         $tipo = 'PAE';
         $desc = 'Con el monto bruto de $' . $this->edmonto->text . ' con la siguiente justificacion: ' . $this->edjustificacion->Text;
         $this->dtafectacion->Text = '';
      }
      else
      {
         $tipo = 'EPA';
         $desc = 'Con fecha de afectacion ' . $this->dtafectacion->text . ' con el siguiente motivo: ' . $this->edmotivo->Text;
      }

      if($this->hfestatus->value == 1)
      {
         $sql = 'insert into rhexcepciones (idestatus, idcolaborador, idnota, idplaza, fechacreacion,
                tipo, monto, justificacion, fechaafectacion, motivo, idoriginador, usuario, fecha, hora) values
                (' . $this->cbestatus->ItemIndex . ', "' . $this->hfidcolaborador->value . '", ' . $this->hfidnota->Value . ',
                ' . $this->cbplaza->ItemIndex . ', curdate(),
                "' . $tipo . '", "' . $this->edmonto->Text . '", "' . $this->edjustificacion->Text . '",
                "' . $this->dtafectacion->Text . '", "' . $this->edmotivo->Text . '",
                "' . $_SESSION["idusuario"] . '", "' . $_SESSION["login"] . '",curdate(),CURTIME())';
         $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
         $this->edidsolicitud->Text = mysql_insert_id();
         $msg = "Inserto la Excepcion No. " . $this->edidsolicitud->Text;
         $nivel = 1;
         $this->hfestatus->value = 2;

      }
      else
      {
         if(Derechos('EDRHEXCEP') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Excepciones");
                  window.location="urhexcepcionesvista.php";
                  </script>';
            $ban = false;
         }
         else
         {
            $this->hfestatus->Value = 2;
            $msg = "Modifico la Excepcion No. " . $this->edidsolicitud->Text;
            $nivel = 2;

            $sql = 'update rhexcepciones set idestatus=' . $this->cbestatus->ItemIndex . ',
                   idcolaborador="' . $this->hfidcolaborador->value . '", idnota=' . $this->hfidnota->Value . ',
                   idplaza=' . $this->cbplaza->ItemIndex . ', tipo="' . $tipo . '", monto=' . $this->edmonto->Text . ',
                   justificacion="' . $this->edjustificacion->Text . '", fechaafectacion="' . $this->dtafectacion->Text . '",
                   motivo="' . $this->edmotivo->Text . '", director="' . $this->eddirector->Text . '",
                   usuario="' . $_SESSION["login"] . '", fecha=curdate(), hora=CURTIME()
                    where idsolicitud = ' . $this->edidsolicitud->Text;
            $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());

         }
      }
      #para enviar el mail de aviso
      //CREACION
      if($this->hfestatus->value == 2 && $this->cbestatus->ItemIndex == 2)
      {
         $msn = 'Se ha creado la Excepcion No. ' . $this->edidsolicitud->Text .
         ' De tipo ' . $nom .
         ' Para el colaborador ' . $this->ednombre->text . $desc;

         $correos = GetConfiguraciones('mailrh');
         $mailsistema = GetConfiguraciones('mailsistema');

         enviarmailattach($mailsistema, 'Sistema de CRM', $correos, 'Varios', 'AVISO DE CREACION EXCEPCION ', $msn, '', '');

         $this->hfestatus->Value = 2;
      }

      //ACTIVACION
      if($this->hfestatus->value == 2 && $this->cbestatus->ItemIndex >= 2)
      {
         $msn = 'Se ha ' . $this->cbestatus->Items[$this->cbestatus->ItemIndex] . ' la Excepcion No. ' . $this->edidsolicitud->Text .
         ' De tipo ' . $nom . chr(13) .
         ' Para el colaborador ' . $this->ednombre->text . $desc . chr(13) . $this->lbufh->Caption;

         $correos = GetConfiguraciones('mailrh');

         $sql = 'Select email from usuarios u right join rhexcepciones e on e.idoriginador=u.idusuario
                where e.idsolicitud = ' . $this->edidsolicitud->Text;
         $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         $row = mysql_fetch_array($rs);
         $correos .= ',' . $row['email'];

         $mailsistema = GetConfiguraciones('mailsistema');
         enviarmailattach($mailsistema, 'Sistema de CRM', $correos, 'Varios', 'AVISO DE ACTIVACION DE EXCEPCION', $msn, '', '');
         $this->hfestatus->Value = 2;
      }
      dmconexion::Log($msg, $nivel);
   }

   function Validar()
   {

      if($this->hfidestatus->value == 3 && $this->cbestatus->ItemIndex < 3)
      {
         echo '<script language="javascript" type="text/javascript">
                 alert("No puedes utilizar ese estatus");
                 </script>';
         return false;
      }

      if($this->hfestatus->value == 1 && $this->cbestatus->ItemIndex > 2)
      {
         echo '<script language="javascript" type="text/javascript">
                 alert("Debes guardar en Borrador o Proceso");
                 </script>';
         return false;
      }

      if($this->hfestatus->value == 2 && $this->cbestatus->ItemIndex > 2)
      {
         $sql = 'select x.idestatus, e.finalizado
                 from rhexcepciones x left join rhestatus e on e.idestatus=x.idestatus
                 where x.idsolicitud=' . $this->edidsolicitud->Text;
         $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         $row = mysql_fetch_array($rs);

         if($row['finalizado'] == 1)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("Ya se encuentra cerrado");
                 </script>';
            return false;
         }

         if($this->hfidestatus->value == 1 && $this->cbestatus->ItemIndex > 2)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("Debes guardar en Borrador o Proceso");
                 </script>';
            return false;
         }

         if($this->hfidestatus->value == 2 && $this->cbestatus->ItemIndex > 4)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("No puedes Aplicar antes de poner en Autorizar o Rechazar");
                 </script>';
            return false;
         }

         if($this->hfidestatus->value == 3 && $this->cbestatus->ItemIndex == 4)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("No puedes Rechazar despues de Autorizar ");
                 </script>';
            return false;
         }

         if($this->hfidestatus->value > $this->cbestatus->ItemIndex)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("No puedes regresar el estatus");
                 </script>';
            return false;
         }

         if(Derechos('AUTRHEXCEP') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("No tiene derechos para Autorizar o Rechazar Excepciones");
                 </script>';
            return false;
         }

         if($row['idestatus'] == 3)
         {
            if(Derechos('APLRHEXCEP') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                 alert("No tiene derechos para aplicar");
                 </script>';
               return false;
            }
         }
      }

      if($this->edidcolaborador->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el Colaborador de la Excepcion");
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

      if($this->rgtipo->ItemIndex == - 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el Tipo de Excepcion");
             </script>';
         return false;
      }

      if($this->rgtipo->ItemIndex == 0 && ($this->edmonto->Text == '' || $this->edmonto->Text == '0'))
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el monto de Excepcion");
             </script>';
         return false;
      }

      if($this->rgtipo->ItemIndex == 0 && $this->edjustificacion->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la justificacion");
             </script>';
         return false;
      }

      if($this->rgtipo->ItemIndex == 1 && $this->dtafectacion->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la fecha de afectacion");
             </script>';
         return false;
      }

      if($this->rgtipo->ItemIndex == 1 && $this->edmotivo->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el motivo");
             </script>';
         return false;
      }

      //fechas
      if($this->hfidestatus->value == 1)
      {
         if($this->rgtipo->ItemIndex == 1 && strtotime($this->dtafectacion->Text) > strtotime(date('Y/m/d')))
         {
            echo '<script language="javascript" type="text/javascript">
             alert("La fecha de Afectacion es mayor a la actual");
             </script>';
            return false;
         }

         if($this->rgtipo->ItemIndex == 1 && strtotime($this->dtafectacion->Text) < strtotime(IncDay(date('Y/m/d'), - 8)))
         {
            echo '<script language="javascript" type="text/javascript">
             alert("La fecha de Afectacion es menor a la 8 dias.");
             </script>';
            return false;
         }
      }

      return true;
   }

   function Habilitar($hab)
   {
      $this->dtfechacreacion->Enabled = $hab;
      $this->edidcolaborador->Enabled = $hab;
      $this->ednombre->Enabled = $hab;
      $this->edarea->Enabled = $hab;
      $this->edpuesto->Enabled = $hab;
      $this->cbplaza->Enabled = $hab;
      $this->edmonto->Enabled = $hab;
      $this->edjustificacion->Enabled = $hab;
      $this->eddirector->Enabled = $hab;
      $this->edmotivo->Enabled = $hab;
      $this->dtafectacion->Enabled = $hab;
      $this->btncolaborador->Enabled = $hab;

      if($this->hfidestatus->value < 4)
      {
         $this->cbestatus->Enabled = true;
         $this->eddirector->Enabled = true;
      }
      else
      {
         $this->cbestatus->Enabled = false;
         $this->eddirector->Enabled = false;
      }

      if(Derechos('NOTRHEXCEP'))
         $this->lbnotas->Enabled = true;
      else
         $this->lbnotas->Enabled = false;
   }

   function habportipo()
   {
      if($this->hfidestatus->Value < 4)
         if($this->rgtipo->ItemIndex == 0)
         {
            $this->edmonto->enabled = true;
            $this->edjustificacion->enabled = true;
            $this->dtafectacion->enabled = false;
            $this->edmotivo->enabled = false;
         }
         else
         {
            $this->edmonto->enabled = false;
            $this->edjustificacion->enabled = false;
            $this->dtafectacion->enabled = true;
            $this->edmotivo->enabled = true;
         }
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
            $val->Text = "";

         if($val->inheritsFrom("ComboBox") || $val->inheritsFrom("RadioGroup"))
            $val->ItemIndex = -1;

         if($val->inheritsFrom("HiddenField"))
            $val->value = '0';
      }
      $this->lbufh->Caption = '';
      $this->lblhistorial->Caption = '';

   }



   function TraerNotas()
   {
      $sql = 'select idnota from rhexcepciones where idsolicitud=' . $this->edidsolicitud->Text;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      if($row[0] > 0)
         $idnota = $row[0];
      else
         $idnota = MaxId('notas', 'idnota') + 1;

      $sql = 'select nota,' . str_replace("Modificado", "Elaborado ", ufh('n')) . ' as ufh ' .
      ' from notasdet n left join usuarios u on n.usuario=u.login ' .
      ' where idnota=' . $idnota . ' ORDER BY n.fecha desc,n.hora DESC';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

      $colores[0] = "#ff5500";
      $colores[1] = "#004080";
      $i = 0;

      while($row = mysql_fetch_array($rs))
      {
         if(($i % 2) == 0)
            $c = 0;
         else
            $c = 1;

         $t .= '<br><strong>
							<font color=' . $colores[$c] . '>' . strtoupper($row['nota']) . '
							</font>
						</strong><br>';
         $t .= '<strong>
							<font color=' . $colores[$c] . '>' . $row['ufh'] . '
							</font>
						</strong><br>';
         $i++;
      }
      $this->lblhistorial->Caption = $t;
   }

}

global $application;

global $urhexcepciones;

//Creates the form
$urhexcepciones = new urhexcepciones($application);

//Read from resource file
$urhexcepciones->loadResource(__FILE__);

//Shows the form
$urhexcepciones->show();

?>