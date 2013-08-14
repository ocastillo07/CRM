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
class urhpermisos extends Page
{
   public $chkbloqueado = null;
   public $hfnow = null;
   public $hfidcontador = null;
   public $hfdetalle = null;
   public $btnagregar = null;
   public $lbdetalle = null;
   public $hfidestatus = null;
   public $Label17 = null;
   public $dtreposicion = null;
   public $edrepfin = null;
   public $edrepinicio = null;
   public $Label16 = null;
   public $Label15 = null;
   public $Label8 = null;
   public $edacumulados = null;
   public $hfidcolaborador = null;
   public $btnregresar = null;
   public $ednombre = null;
   public $dtfechacreacion = null;
   public $hfidnota = null;
   public $hfestatus = null;
   public $edobservaciones = null;
   public $edmotivo = null;
   public $edfin = null;
   public $edinicio = null;
   public $dtausencia = null;
   public $rgtipo = null;
   public $edpuesto = null;
   public $edarea = null;
   public $cbplaza = null;
   public $btncolaborador = null;
   public $edidcolaborador = null;
   public $lbufh = null;
   public $Label13 = null;
   public $Label12 = null;
   public $Label11 = null;
   public $Label10 = null;
   public $Label9 = null;
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
   public $btnimprimir = null;
   public $pbotones = null;
   public $btnnuevo = null;
   public $lbtitulo = null;
   public $btnguardarcerrar = null;
   public $btnguardar = null;




   function btnagregarJSClick($sender, $params)
   {

?>
   var now = new Date();
    f = 0;

   if(vcl.$('dtreposicion').value == '' || vcl.$('edrepinicio').value == '' ||
      vcl.$('edrepfin').value == ''  )
      alert('Faltan datos');
   else
   {
              basicAjax('urhpermisos_ajax.php', 'Agregar=1'+
                        '&fecharep='+vcl.$('dtreposicion').value+
                        '&iniciorep='+vcl.$('edrepinicio').value+
                        '&finrep='+vcl.$('edrepfin').value+
                        '&fechaaus='+vcl.$('dtausencia').value+
                        '&inicio='+vcl.$('edinicio').value+
                        '&fin='+vcl.$('edfin').value+
                        '&hfidestatus='+vcl.$('hfidestatus').value+
                        '&detalle='+vcl.$('hfdetalle').value+
                        '&hfidcontador='+vcl.$('hfidcontador').value);
   }
<?php

   }

   function edrepfinJSKeyUp($sender, $params)
   {
?>
   RelojDigital(vcl.$('edrepfin'));
<?php
   }

   function edrepfinJSKeyPress($sender, $params)
   {
?>
   RelojDigital(vcl.$('edrepfin'));
<?php
   }

   function edrepinicioJSKeyUp($sender, $params)
   {
?>
   RelojDigital(vcl.$('edrepinicio'));
<?php
   }

   function edrepinicioJSKeyPress($sender, $params)
   {
?>
   RelojDigital(vcl.$('edrepinicio'));
<?php
   }

   function rgtipoClick($sender, $params)
   {
      if($this->rgtipo->ItemIndex == 0)
         $this->HabilitarFechas(false);
      else
         $this->HabilitarFechas(true);
   }

   function HabilitarFechas($hab)
   {
      $this->edrepinicio->Enabled = $hab;
      $this->edrepfin->Enabled = $hab;
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
      basicAjax('urhpermisos_ajax.php', 'Imprimir=1&reporte=rhpermisos'+
                '&idsolicitud='+vcl.$('edidsolicitud').value+'&tipo=pdf');
<?php

   }

   function edfinJSKeyPress($sender, $params)
   {
?>
   RelojDigital(vcl.$('edfin'));
<?php
   }

   function edfinJSKeyUp($sender, $params)
   {
?>
   RelojDigital(vcl.$('edfin'));
<?php
   }

   function edinicioJSKeyUp($sender, $params)
   {
?>
   RelojDigital(vcl.$('edinicio'));
<?php
   }

   function edinicioJSKeyPress($sender, $params)
   {
?>
   RelojDigital(vcl.$('edinicio'));
<?php
   }



   function btncolaboradorClick($sender, $params)
   {
      redirect('urhcolaboradoresvista.php?pagina=urhpermisos.php');
   }

   function edidcolaboradorJSBlur($sender, $params)
   {
?>
      if(vcl.$('edidcolaborador').value != '')
        basicAjax('urhpermisos_ajax.php', 'TraeColaborador='+vcl.$('edidcolaborador').value+
                  '&fecha='+vcl.$('dtfechacreacion').value);
<?php
   }

   function urhpermisosJSLoad($sender, $params)
   {
?>
      validarEventos();
      var h = '';
      if(vcl.$('edidcolaborador').value != '')
        h = '&TraeColaborador='+vcl.$('edidcolaborador').value+
                  '&fecha='+vcl.$('dtfechacreacion').value;

      basicAjax('urhpermisos_ajax.php', 'Calcular=1'+h);
<?php
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('ALRHPERM') == false)
         echo '<script language="javascript" type="text/javascript">
              alert("No puede dar de Alta Permisos");
              </script>';
      else
         redirect("urhpermisos.php?idsolicitud=0");
   }

   function btnguardarcerrarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect('urhpermisosvista.php');
      }
   }

   function btnguardarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect('urhpermisos.php?idsolicitud=' . $this->edidsolicitud->text);
      }
   }

   function btnregresarClick($sender, $params)
   {
      redirect('urhpermisosvista.php');
   }

   function urhpermisosShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      $this->hfnow->Value = date("Y-m-j");
/*      $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
      $this->lbtitulo->Caption = $fecha_actual;   */




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
               if(Derechos('ELRHPERM') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                    alert("No Tienes el Derecho para Eliminar Permisos");
                    window.location="urhpermisosvista.php";
                    </script>';
               }
               else
               {
                  $this->hfestatus->Value = 3;
                  $this->Locate();

                  $sql = 'Delete from rhpermisos where idsolicitud = ' . $this->edidsolicitud->text;
                  $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

                  dmconexion::Log('Elimino el permiso ' . $this->edidsolicitud->text, 3);
                  redirect("urhpermisosvista.php");
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
         //sacar el # de acomulados
         $sql = 'select count(idsolicitud) as t from rhpermisos
                where idcolaborador = '. $this->hfidcolaborador->value .
                ' and YEAR(fechacreacion) = year(CURDATE()) and idestatus = 3 ';
         $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         $row = mysql_fetch_array($rs);
         $this->edacumulados->Text = $row['t'];
      }
   }

   function Alta()
   {
      $this->edidsolicitud->Text = MaxId('rhpermisos', 'idsolicitud') + 1;
      $this->cbestatus->ItemIndex = 1;
      $this->hfidestatus->value = 1;
      $this->cbestatus->Enabled = false;
      $this->habilitar(true);
      $this->edmotivo->Text = '';
      $this->edobservaciones->Text = '';
      $_SESSION['tablapermisos'] = array();
   }

   function Locate()
   {
      $sql = 'SELECT p.idsolicitud, p.idcolaborador, concat(c.nombre, " ", c.apaterno, " ", c.amaterno) as colaborador,
              p.idplaza, p.fechacreacion, p.tipo, p.fechaausencia, p.motivo,
              e.nombre as estatus, p.acumulados, p.horainicio, p.horafin, p.observaciones, p.idnota,
              p.idestatus, p.idcolaborador, c.idempleado, c.bloqpermisos,
              pt.nombre as puesto, a.nombre as area, ' . ufh('p') . ' as ufh
              from rhpermisos p left join rhestatus e on e.idestatus=p.idestatus
              left join rhcolaboradores c on c.idcolaborador=p.idcolaborador
              left join puestos pt on pt.idpuesto=c.idpuesto
              left join areas a on a.idarea=c.idarea
              where p.idsolicitud = ' . $this->edidsolicitud->Text;
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
      $this->edmotivo->Text = $row['motivo'];

      $this->dtausencia->Text = $row['fechaausencia'];
      $this->edinicio->Text = LeftStr($row['horainicio'], 5);
      $this->edfin->Text = LeftStr($row['horafin'], 5);

      $this->edobservaciones->Text = $row['observaciones'];
      $this->edacumulados->Text = $row['acumulados'];

      //if($row["bloqpermisos"] == 1)
      //   $this->chkbloqueado->Checked = true;
      //else
      //   $this->chkbloqueado->Checked = false;

      if($row['tipo'] == 'D')
         $this->rgtipo->ItemIndex = 0;
      else
         $this->rgtipo->ItemIndex = 1;

      $this->lbufh->Caption = $row['ufh'];

      if($this->cbestatus->ItemIndex == 1)
         $this->Habilitar(true);
      else
         $this->Habilitar(false);
      $this->TraeDetalle();
   }

   function Guardar()
   {
      $ban = false;

      if($this->rgtipo->ItemIndex == 0)
      {
         $tipo = 'D';
         $desc = 'Descuento';
      }
      else
      {
         $tipo = 'R';
         $desc = 'Reposicion';
      }

      if($this->hfestatus->value == 1)
      {
         $sql = 'insert into rhpermisos (idestatus, idcolaborador, idnota, idplaza, fechacreacion,
                acumulados, tipo, fechaausencia, horainicio, horafin, motivo, observaciones,
                idoriginador, usuario, fecha, hora) values
                ('.$this->cbestatus->ItemIndex.', "' . $this->hfidcolaborador->Value . '", ' . $this->hfidnota->Value . ',
                ' . $this->cbplaza->ItemIndex . ', curdate(),
                ' . $this->edacumulados->Text . ', "' . $tipo . '", "' . $this->dtausencia->Text . '",
                "' . $this->edinicio->Text . '", "' . $this->edfin->text . '", "' . $this->edmotivo->Text . '",
                "' . $this->edobservaciones->Text . '",
                "' . $_SESSION["idusuario"] . '", "' . $_SESSION["login"] . '",curdate(),CURTIME())';
         $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
         $this->edidsolicitud->Text = mysql_insert_id();
         $msg = "Inserto la Permiso No. " . $this->edidsolicitud->Text;
         $nivel = 1;

      }
      else
      {
         if(Derechos('EDRHPERM') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Permisos");
                  window.location="urhpermisosvista.php";
                  </script>';
            $ban = false;
         }
         else
         {
            $this->hfestatus->Value = 2;
            $msg = "Modifico la Permiso No. " . $this->edidsolicitud->Text;
            $nivel = 2;

            $sql = 'update rhpermisos set idestatus=' . $this->cbestatus->ItemIndex . ',
                idcolaborador="' . $this->hfidcolaborador->Value . '", idnota=' . $this->hfidnota->Value . ',
                idplaza=' . $this->cbplaza->ItemIndex . ', acumulados=' . $this->edacumulados->Text . ', tipo="' . $tipo . '",
                fechaausencia="' . $this->dtausencia->Text . '", horainicio="' . $this->edinicio->Text . '",
                horafin="' . $this->edfin->text . '", motivo="' . $this->edmotivo->Text . '",
                observaciones="' . $this->edobservaciones->Text . '",
                usuario="' . $_SESSION["login"] . '",  fecha=curdate(), hora=CURTIME()
                where idsolicitud = ' . $this->edidsolicitud->Text;
            $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());

         }
      }
      #para enviar el mail de aviso
      if($this->hfestatus->value == 2 || $this->cbestatus->ItemIndex == 3)
      {
         $msn = 'Se ha creado el Permiso No. ' . $this->edidsolicitud->Text .
         ' De tipo ' . $nom .
         ' Para el colaborador ' . $this->ednombre->text . $desc;

         $correos = GetConfiguraciones('mailrh');
         $mailsistema = GetConfiguraciones('mailsistema');

         enviarmailattach($mailsistema, 'Sistema de CRM', $correos, 'Varios', 'AVISO DE PERMISO ', $msn, '', '');

         $this->hfestatus->Value = 2;
      }

      dmconexion::Log($msg, $nivel);
      $this->GuardarDetalle();
   }

   function TraeDetalle()
   {
      $rsm = "SELECT d.idcontador, d.idsolicitud, d.fechareposicion, d.repinicio, d.repfin
              from rhpermisosdet d where idsolicitud ='" . $this->edidsolicitud->Text . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $i = 0;
      $tabla = array();
      while($row = mysql_fetch_array($r))
      {
         $tabla[$i] = array('idcontador' => $i,
                            'fecharep' => $row['fechareposicion'],
                            'iniciorep' => LeftStr($row['repinicio'], 5),
                            'finrep' => LeftStr($row['repfin'], 5)
                            );


         $i++;
      }
      $_SESSION['tablapermisos'] = array();
      $_SESSION['tablapermisos'] = $tabla;
   }

   function GuardarDetalle()
   {
      $tabla = $_SESSION['tablapermisos'];
      $t = count($tabla) - 1;
      if($this->hfestatus->Value == '1')
      {
         for($i = 0; $i <= $t; $i++)
            $this->BDAgregar($i);
      }
      else
      {
         $rsm = "SELECT idcontador, fechareposicion
                FROM rhpermisosdet where idsolicitud ='" . $this->edidsolicitud->Text . "'";
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

         while($row = mysql_fetch_array($r))
         {
            $ban = false;
            for($i = 0; $i <= $t; $i++)
            {
               if($row['fechareposicion'] == $tabla[$i]['fechareposicion'])
                  $ban = true;
            }
            if($ban == false)
               $this->BDDelRow($row['idcontador']);

         }

         for($i = 0; $i <= $t; $i++)
         {
            $rsm = "SELECT d.idsolicitud, d.fechareposicion, d.repinicio, d.repfin
                    FROM rhpermisosdet d where idsolicitud ='" . $this->edidsolicitud->Text . "'
                    and fechareposicion='" . $tabla[$i]['fecharep'] . "'";
            $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
            if(mysql_num_rows($r) == 0)
               $this->BDAgregar($i);
            else
            {
               $row = mysql_fetch_array($r);
               if(!($row['fechareposicion'] == $tabla[$i]['fecharep'] ||
               $row['repinicio'] == $tabla[$i]['iniciorep'] ||
               $row['repfin'] == $tabla[$i]['finrep']
               ))
               {
                  $this->BDDelRow($row['idcontador']);
                  $this->BDAgregar($i);
               }
               else
                  $this->BDEditRow($row['idcontador'], $i);

            }
         }
      }
   }

   function BDAgregar($row)
   {
      $i = $row;
      $tabla = $_SESSION['tablapermisos'];

      //inserta el detalle
      $rsm = "Insert into rhpermisosdet ( idsolicitud, fechareposicion, repinicio, repfin,
              usuario, fecha, hora)
              values ('" . $this->edidsolicitud->Text . "', '" . $tabla[$i]['fecharep'] . "',
              '" . $tabla[$i]['iniciorep'] . "',  '" . $tabla[$i]['finrep'] . "',
              '" . $_SESSION['login'] . "', curdate(), curtime())";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      dmconexion::Log('Inserto en Permisos No. ' . $this->edidsolicitud->Text . ' la f.reposicion [' . $tabla[$i]['fecharep'] . ']', 2);
   }

   function BDEditRow($row, $i)
   {
      $tabla = $_SESSION['tablapermisos'];

      //inserta el detalle
      $rsm = "Update rhpermisosdet set fechareposicion='" . $tabla[$i]['fecharep'] . "',
              repinicio='" . $tabla[$i]['iniciorep'] . "', repfin='" . $tabla[$i]['finrep'] . "'
              usuario='" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
              where idcontador=" . $row;
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      dmconexion::Log('Edito en Permisos No. ' . $this->edidsolicitud->Text . '  la f.reposicion [' . $tabla[$i]['fecharep'] . '] ', 2);
   }

   function BDDelRow($idcontador)
   {
      $rsm = "SELECT idsolicitud, fechareposicion, repinicio, repfin
              from rhpermisosdet where idcontador ='" . $idcontador . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $row = mysql_fetch_array($r);

      $rsm = "Delete from rhpermisosdet where idcontador ='" . $idcontador . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      dmconexion::Log('Elimino en  Permisos ' . $this->edidsolicitud->Text .
      ' la fecha reposicion [' . $tabla[$i]['fecharep'] . '] ', 3);
   }

   function Validar()
   {

      if($this->cbestatus->ItemIndex > 2 && $this->hfestatus->value == 2)
      {
         $sql = 'select x.idestatus, e.finalizado
                 from rhpermisos x left join rhestatus e on e.idestatus=x.idestatus
                 where x.idsolicitud=' . $this->edidsolicitud->Text;
         $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         $row = mysql_fetch_array($rs);
         if($row['idestatus'] == 1)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("No puedes Autorizar o Rechazar antes de poner en Proceso");
                 </script>';
            return false;
         }

         if($row['finalizado'] == 1)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("Ya se encuentra cerrado");
                 </script>';
            return false;
         }

         if($row['idestatus'] == 2 && $this->cbestatus->ItemIndex > 4)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("No puedes Aplicar antes de poner en Autorizar o Rechazar");
                 </script>';
            return false;
         }

         if(Derechos('AUTRHPERM') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("No tiene derechos para Autorizar o Rechazar Permisos");
                 </script>';
            return false;
         }

         if($this->hfidestatus->value  == 3 && $this->cbestatus->ItemIndex == 4)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("No puedes Rechazar despues de Autorizar ");
                 </script>';
            return false;
         }

         if($row['idestatus'] == 3)
         {
            if(Derechos('APLRHPERM') == false)
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
             alert("Falta el Colaborador del Permiso");
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
             alert("Falta el Tipo de Permiso");
             </script>';
         return false;
      }

      if($this->dtausencia->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la fecha de ausencia");
             </script>';
         return false;
      }

      if($this->edinicio->Text == '' || $this->edfin->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el horario de ausencia");
             </script>';
         return false;
      }

      if($this->rgtipo->ItemIndex ==1 && count($_SESSION['tablapermisos']) == 0)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la fecha de reposicion");
             </script>';
         return false;
      }

      //fechas
      //if(strtotime($this->dtausencia->Text) < strtotime(date('Y/m/d')))
      //{
      //   echo '<script language="javascript" type="text/javascript">
      //       alert("La fecha de Ausencia es menor a la actual");
      //       </script>';
      //   return false;
      //}

      if(strtotime($this->edinicio->Text) > strtotime($this->edfin->Text))
      {
         echo '<script language="javascript" type="text/javascript">
             alert("La hora de inicio es mayor a la hora fin.");
             </script>';
         return false;
      }

      //Actualizar bloqueo
      //if(!BloquearPermisos($this->chkbloqueado->Checked, $this->edidcolaborador->Text))
      //   return false;
      //if(BloquearPermisos($this->hfestatus->Value, $this->chkbloqueado->Checked, $this->edidcolaborador->Text) == false)
      //   return false;

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
      $this->edmotivo->Enabled = $hab;
      $this->btncolaborador->Enabled = $hab;
      $this->edinicio->Enabled = $hab;
      $this->edfin->Enabled = $hab;
      $this->edrepinicio->Enabled = $hab;
      $this->edrepfin->Enabled = $hab;
      $this->rgtipo->Enabled = $hab;

      if($this->cbestatus->ItemIndex < 3)
         $this->cbestatus->Enabled = true;
      else
         $this->cbestatus->Enabled = false;
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

global $urhpermisos;

//Creates the form
$urhpermisos = new urhpermisos($application);

//Read from resource file
$urhpermisos->loadResource(__FILE__);

//Shows the form
$urhpermisos->show();

?>