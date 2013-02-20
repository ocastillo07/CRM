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
class urhvacantesnc extends Page
{
   public $btnapoyo = null;
   public $hfidapoyo = null;
   public $edpuestoapoyo = null;
   public $edapoyo = null;
   public $edidapoyo = null;
   public $edpuestooriginador = null;
   public $edoriginador = null;
   public $Label41 = null;
   public $Label40 = null;
   public $Label39 = null;
   public $Label38 = null;
   public $lbnotaseg = null;
   public $lbnotas = null;
   public $lblhistorial = null;
   public $dtfechapropuesta = null;
   public $Label12 = null;
   public $dtreal = null;
   public $Label37 = null;
   public $edpersonal = null;
   public $cbarea = null;
   public $edcomentariosdir = null;
   public $edpercepcion = null;
   public $Label36 = null;
   public $Label35 = null;
   public $Label34 = null;
   public $Label18 = null;
   public $hfpath = null;
   public $btnsubir = null;
   public $lbeliminar = null;
   public $lbadjunto = null;
   public $upload = null;
   public $btnregresar = null;
   public $hfidestatus = null;
   public $edequipo = null;
   public $hfidcontador = null;
   public $hfdetalle = null;
   public $hfidnota = null;
   public $edcomentarios = null;
   public $edhabilidades = null;
   public $btnagregar = null;
   public $dtfechaherr = null;
   public $edaccion = null;
   public $ckcuentacon = null;
   public $edmotivos = null;
   public $edcel = null;
   public $edtel = null;
   public $ednombre = null;
   public $edotrodesc = null;
   public $ckotro = null;
   public $ckantecedentes = null;
   public $edlicencia = null;
   public $cklicencia = null;
   public $edestudiosdesc = null;
   public $cbestudios = null;
   public $rgsexo = null;
   public $ededad = null;
   public $lbufh = null;
   public $hfestatus = null;
   public $lbdetalle = null;
   public $Label33 = null;
   public $Label32 = null;
   public $Label31 = null;
   public $Label30 = null;
   public $Label29 = null;
   public $Label28 = null;
   public $Label27 = null;
   public $Label26 = null;
   public $Label25 = null;
   public $Label24 = null;
   public $Label23 = null;
   public $Label22 = null;
   public $Label21 = null;
   public $Label20 = null;
   public $Label19 = null;
   public $Label17 = null;
   public $Label16 = null;
   public $edjefe = null;
   public $edindicadores = null;
   public $edaocasionales = null;
   public $edaperiodicas = null;
   public $edadiarias = null;
   public $edobjetivo = null;
   public $cbplaza = null;
   public $edpuesto = null;
   public $Label15 = null;
   public $Label11 = null;
   public $Label10 = null;
   public $Label9 = null;
   public $Label13 = null;
   public $Label8 = null;
   public $Label7 = null;
   public $Label3 = null;
   public $Label6 = null;
   public $Label5 = null;
   public $Label4 = null;
   public $Label1 = null;
   public $edidsolicitud = null;
   public $Label2 = null;
   public $edfechacreacion = null;
   public $Label14 = null;
   public $cbestatus = null;
   public $pbotones = null;
   public $btnimprimir = null;
   public $btnnuevo = null;
   public $lbtitulo = null;
   public $btnguardarcerrar = null;
   public $btnguardar = null;


   function edidapoyoJSBlur($sender, $params)
   {

?>
   if(vcl.$('edidapoyo').value != '' && vcl.$('edidapoyo').value != '0')
      basicAjax('urhvacantesnc_ajax.php', 'TraeApoyo=ed'+
                '&idempleado='+vcl.$('edidapoyo').value);

<?php

   }

   function btnapoyoClick($sender, $params)
   {
      redirect('urhcolaboradoresvista.php?pagina=urhvacantesnc.php');
   }

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
         '&procedencia=rhvacantesnc&idprocedencia=' . $this->edidsolicitud->Text);
      else
         redirect('unotas.php?idnota=0&procedencia=rhvacantesnc&idprocedencia=' . $this->edidsolicitud->Text);
   }

   function cklicenciaClick($sender, $params)
   {
      $this->edlicencia->Enabled = $this->cklicencia->Checked;
   }

   function edpercepcionJSKeyPress($sender, $params)
   {
?>
   if( ValidaDecimal(vcl.$('edpercepcion').value, event) != event.keyCode)
        return false;
<?php
   }

   function lbeliminarClick($sender, $params)
   {
      if(Derechos('ELARCRHVACNC') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Eliminar el Archivo");
               </script>';
      }
      else
      {
         $path = GetConfiguraciones('PathCurriculums');
         $path = RightStr($path, strlen($path) - 1);
         unlink($path . $this->lbadjunto->Caption);
         $this->hfpath->Value = '';
         $sql = ' update rhvacantesnc set curriculum="' . $this->hfpath->Value .
         '" where idsolicitud =' . $this->edidsolicitud->Text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->lbadjunto->Caption = '';
         $this->lbeliminar->Caption = '';
      }


   }

   function btnsubirClick($sender, $params)
   {
      if(Derechos('SUBRHVACNC') == false)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("No Tienes Derechos para Adjuntar el Archivo");
              </script>';
      }
      else
      {
         if($this->hfestatus->Value == 1)
         {
            echo '<script language="javascript" type="text/javascript">
              	alert(\' Debes Guardar Los Datos Antes de Subir el Archivo \');
           		</script>';

         }
         else
         {
            $path = GetConfiguraciones('PathCurriculums');
            if((($_FILES["upload"]["type"] == "image/gif")
            || ($_FILES["upload"]["type"] == "image/jpeg")
            || ($_FILES["upload"]["type"] == "image/pjpeg")
            || ($_FILES["upload"]["type"] == "application/pdf")
            || ($_FILES["upload"]["type"] == "application/vnd.ms-excel")
            || ($_FILES["upload"]["type"] == "application/msword"))
            && ($_FILES["upload"]["size"] < 20485760))//10 megas
            {
               if($_FILES["upload"]["error"] > 0)
               {
                  echo '<script language="javascript" type="text/javascript">
                  		     alert(\'Error al subir Archivo: ' . $_FILES["upload"]["error"] . '\');
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
                     move_uploaded_file($_FILES["upload"]["tmp_name"],
                     $_SERVER['DOCUMENT_ROOT'] . $path . replace($_FILES["upload"]["name"]));
                     echo '<script language="javascript" type="text/javascript">
                         		 alert(\'Archivo Guardado: ' . replace($_FILES["upload"]["name"]) . '\');
                        		</script>';
                     $this->lbadjunto->Caption = replace($_FILES["upload"]["name"]);
                     $this->lbadjunto->Link = $path . replace($_FILES["upload"]["name"]);
                     $this->hfpath->Value = replace($_FILES['upload']['name']);
                     $sql = ' update rhvacantesnc set curriculum="' . $this->hfpath->Value .
                     '" where idsolicitud =' . $this->edidsolicitud->Text;
                     $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
                     $this->lbeliminar->Caption = 'Eliminar';
                  }
               }
            }
            else
            {
               echo '<script language="javascript" type="text/javascript">
                alert(\' Formato del Archivo Invalido! \');
                </script>';
            }
         }
      }
   }

   function btnagregarJSClick($sender, $params)
   {
?>
    if(vcl.$('edequipo').value == '' )
      alert('Falta el equipo o herramienta');
    else
      if(vcl.$('ckcuentacon').checked == false  &&  ( vcl.$('dtfechaherr').value == '' || vcl.$('edaccion').value == '' ))
        alert('Falta la Fecha Estimada o la Accion');
      else
      {
      if( vcl.$('edaccion').value == '')
        vcl.$('dtfechaherr').text = '';

          basicAjax('urhvacantesnc_ajax.php', 'Agregar=1'+
                '&equipo='+vcl.$('edequipo').value+
                '&cuentacon='+vcl.$('ckcuentacon').checked+
                '&accion='+vcl.$('edaccion').value+
                '&fecha='+vcl.$('dtfechaherr').value+
                '&fechareal='+vcl.$('dtreal').value+
                '&detalle='+vcl.$('hfdetalle').value+
                '&hfidestatus='+vcl.$('hfidestatus').value+
                '&hfidcontador='+vcl.$('hfidcontador').value);
      }
<?php
   }



   function btnimprimirJSClick($sender, $params)
   {
?>
      basicAjax('urhvacantesnc_ajax.php', 'Imprimir=1&reporte=rhvacantesnc&tipo=pdf&idsolicitud='+vcl.$('edidsolicitud').value);
<?php
   }


   function btnnuevoClick($sender, $params)
   {
      if(Derechos('ALRHVACNC') == false)
         echo '<script language="javascript" type="text/javascript">
              alert("No puede dar de Alta Vacantes NC");
              </script>';
      else
         redirect("urhvacantesnc.php?idsolicitud=0");
   }

   function btnguardarcerrarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect('urhvacantesncvista.php');
      }
   }

   function btnguardarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect('urhvacantesnc.php?idsolicitud=' . $this->edidsolicitud->text);
      }
   }

   function btnregresarClick($sender, $params)
   {
      redirect('urhvacantesncvista.php');
   }

   function urhvacantesncJSLoad($sender, $params)
   {
?>
      validarEventos();
      var h = '';
      if(vcl.$('hfidapoyo').value != '' && vcl.$('hfidapoyo').value != '0')
        h = '&TraeApoyo=hf&idcolaborador='+vcl.$('hfidapoyo').value;

      basicAjax('urhvacantesnc_ajax.php', 'Calcular=1&hfidestatus='+vcl.$('hfidestatus').value+h);
<?php
   }

   function urhvacantesncShow($sender, $params)
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
            $this->LimpiarMemos();
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
               if(Derechos('ELRHVACNC') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                    alert("No Tienes el Derecho para Eliminar Vacantes NC");
                    window.location="urhvacantesncvista.php";
                    </script>';
               }
               else
               {
                  $this->hfestatus->Value = 3;
                  $this->Locate();

                  $sql = 'Delete from rhvacantesnc where idsolicitud = ' . $this->edidsolicitud->text;
                  $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

                  dmconexion::Log('Elimino la vacante nc ' . $this->edidsolicitud->text, 3);
                  redirect("urhvacantesncvista.php");
               }
            }
         }
      }

      if(isset($_GET['idprocedencia']))
      {
         $this->hfidnota->Value = $_GET['idnota'];
         $sql = 'update rhvacantesnc set idnota=' . $_GET['idnota'] . ' where idsolicitud=' . $this->edidsolicitud->Text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->TraerNotas();
      }

      if(isset($_GET['idcolaborador']))
      {
         $this->hfidapoyo->Value = $_GET['idcolaborador'];
         $this->edidapoyo->Text = '';
         $this->edapoyo->Text = '';
         $this->edpuestoapoyo->Text = '';
      }
   }

   function Alta()
   {
      $this->edidsolicitud->Text = MaxId('rhvacantesnc', 'idsolicitud') + 1;
      $this->cbestatus->ItemIndex = 1;
      $this->cbestatus->Enabled = false;
      $this->edhabilidades->Text = '';
      $this->edcomentarios->Text = '';
      $this->edcomentariosdir->Text = '';
      $this->edmotivos->Text = '';
      $this->habilitar(true);
      $this->HabilitarDir(false);

      $sql = 'Select ' . NombreFisica('u') . ' as nombre, p.nombre as puesto
             from usuarios u left join puestos p on p.idpuesto=u.idpuesto
             where idusuario=' . $_SESSION["idusuario"];
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);

      $this->edoriginador->Text = $row['nombre'];
      $this->edpuestooriginador->Text = $row['puesto'];


      $_SESSION['tablaherr'] = array();

      $sql = 'Select nombre as equipo from rhvacantesnc_herrdft';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $i = 0;
      while($row = mysql_fetch_array($rs))
      {

         $tabla[$i] = array('idcontador' => $i,
                            'equipo' => strtoupper($row['equipo']),
                            'cuentacon' => 'NO',
                            'accion' => '',
                            'fecha' => '',
                            'fechareal' => ''
                            );
         $i++;
      }

      $_SESSION['tablaherr'] = $tabla;
   }

   function Locate()
   {
      $sql = 'SELECT v.idsolicitud, v.idestatus, v.idnota, v.idplaza, v.fechacreacion,
              v.idarea, v.puesto, v.fechapropuesta, v.jefeinmediato, v.personalcargo,
              v.objetivo, v.adiarias, v.aperiodicas, v.aocasionales, v.indicadores,
              v.edad, v.sexo, v.estudios, v.estudiosdesc, v.licencia, v.licenciatipo,
              v.noantecedentes, v.otrodocto, v.otrodoctodesc, v.habilidades, v.comentarios,
              v.nombre, v.telefono, v.celular, v.motivoscandidato,
              v.idapoyo, cy.idempleado as idapoyoe, ' . NombreFisica('cy') . ' as apoyo,
              py.nombre as puestoapoyo,
              ' . NombreFisica('u') . ' as originador, pg.nombre as puestooriginador,
              v.curriculum, v.percepcion, v.comentariosdir,
              v.idoriginador, ' . ufh('v') . ' as ufh
              from rhvacantesnc v
              left join rhcolaboradores as cy on cy.idcolaborador=v.idapoyo
              left join usuarios as u on u.idusuario=v.idoriginador
              left join puestos py on py.idpuesto=cy.idpuesto
              left join puestos pg on pg.idpuesto=u.idpuesto
              where v.idsolicitud = ' . $this->edidsolicitud->Text;

      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);


      $this->cbestatus->ItemIndex = $row['idestatus'];
      $this->hfidestatus->Value = $row['idestatus'];
      $this->cbplaza->ItemIndex = $row['idplaza'];
      $this->hfidnota->Value = $row['idnota'];
      $this->edfechacreacion->Text = $row['fechacreacion'];
      $this->cbarea->ItemIndex = $row['idarea'];
      $this->edpuesto->Text = $row['puesto'];

      $this->hfidapoyo->value = $row['idapoyo'];
      $this->edidapoyo->Text = $row['idapoyoe'];
      $this->edapoyo->Text = $row['apoyo'];
      $this->edpuestoapoyo->Text = $row['puestoapoyo'];
      $this->edoriginador->Text = $row['originador'];
      $this->edpuestooriginador->Text = $row['puestooriginador'];



      $this->dtfechapropuesta->Text = $row['fechapropuesta'];
      $this->edjefe->Text = $row['jefeinmediato'];
      $this->edpersonal->Text = $row['personalcargo'];
      $this->edobjetivo->Text = $row['objetivo'];
      $this->edadiarias->Text = $row['adiarias'];
      $this->edaperiodicas->Text = $row['aperiodicas'];
      $this->edaocasionales->Text = $row['aocasionales'];
      $this->edindicadores->Text = $row['indicadores'];
      $this->ededad->Text = $row['edad'];
      $this->cbestudios->ItemIndex = $row['estudios'];
      $this->edestudiosdesc->Text = $row['estudiosdesc'];
      $this->edlicencia->Text = $row['licenciatipo'];
      $this->edotrodesc->Text = $row['otrodoctodesc'];
      $this->edhabilidades->Text = $row['habilidades'];
      $this->edcomentarios->Text = $row['comentarios'];
      $this->ednombre->Text = $row['nombre'];
      $this->edtel->Text = $row['telefono'];
      $this->edcel->Text = $row['celular'];
      $this->edmotivos->Text = $row['motivoscandidato'];
      $this->edcomentariosdir->Text = $row['comentariosdir'];
      $this->edpercepcion->Text = $row['percepcion'];


      $this->cklicencia->Checked = $row['licencia'];
      $this->ckantecedentes->Checked = $row['noantecedentes'];
      $this->ckotro->Checked = $row['otrodocto'];

      if(Derechos("ABRARCRHVACNC"))
      {
         //adjuntos
         $path = GetConfiguraciones('PathCurriculums');
         $this->lbadjunto->Link = $path . $row['curriculum'];
         $this->lbadjunto->Caption = $row['curriculum'];
         $this->hfpath->Value = $row['curriculum'];
         if($row['curriculum'] <> '')
            $this->lbeliminar->Caption = 'Eliminar';
      }

      switch($row['sexo'])
      {
         case 'F' :
            $this->rgsexo->ItemIndex = 0;
            break;
         case 'M' :
            $this->rgsexo->ItemIndex = 1;
            break;
         case 'I' :
            $this->rgsexo->ItemIndex = 2;
            break;
      }

      if($this->cbestatus->ItemIndex == 1)
      {
         $this->Habilitar(true);
         $this->edlicencia->Enabled = $this->cklicencia->Checked;
      }
      else
         $this->Habilitar(false);

      if($this->cbestatus->ItemIndex < 2)
      {
         $this->edaccion->Enabled = true;
         $this->edequipo->Enabled = true;
         $this->ckcuentacon->Enabled = true;
      }
      else
      {
         $this->edaccion->Enabled = false;
         $this->edequipo->Enabled = false;
         $this->ckcuentacon->Enabled = false;
      }

      if($this->cbestatus->ItemIndex == 2 && Derechos('AUTRHVACNC') == true)
      {
         $this->HabilitarDir(true);
      }
      else
         $this->HabilitarDir(false);

      $this->lbufh->Caption = $row['ufh'];



      $this->TraerNotas();
      $this->TraeDetalle();
   }

   function Guardar()
   {
      $ban = false;

      switch($this->rgsexo->ItemIndex)
      {
         case 0 :
            $rgsexo = 'F';
            break;
         case 1 :
            $rgsexo = 'M';
            break;
         case 2:
            $rgsexo = 'I';
            break;
      }

      if($this->hfestatus->value == 1)
      {
         $sql = 'insert into rhvacantesnc (idestatus, idnota, idplaza, fechacreacion,
              idarea, puesto, fechapropuesta, jefeinmediato, personalcargo,
              objetivo, adiarias, aperiodicas, aocasionales, indicadores,
              edad, sexo, estudios, estudiosdesc, licencia, licenciatipo,
              noantecedentes, otrodocto, otrodoctodesc, habilidades, comentarios,
              nombre, telefono, celular, motivoscandidato, idoriginador, idapoyo,
              usuario, fecha, hora) values
              (' . $this->cbestatus->ItemIndex . ', ' . $this->hfidnota->Value . ', ' . $this->cbplaza->ItemIndex . ', curdate(),
              "' . $this->cbarea->ItemIndex . '", "' . strtoupper($this->edpuesto->Text) . '", "' . $this->dtfechapropuesta->Text . '",
              "' . strtoupper($this->edjefe->text) . '","' . strtoupper($this->edpersonal->Text) . '",
              "' . $this->edobjetivo->Text . '", "' . $this->edadiarias->Text . '",
              "' . $this->edaperiodicas->Text . '", "' . $this->edaocasionales->Text . '",
              "' . $this->edindicadores->Text . '", "' . strtoupper($this->ededad->Text) . '", "' . $rgsexo . '",
              "' . strtoupper($this->cbestudios->ItemIndex) . '", "' . strtoupper($this->edestudiosdesc->Text) . '",
              "' . $this->cklicencia->Checked . '", "' . strtoupper($this->edlicencia->Text) . '",
              "' . $this->ckantecedentes->Checked . '", "' . $this->ckotro->Checked . '",
              "' . strtoupper($this->edotrodesc->Text) . '", "' . strtoupper($this->edhabilidades->Text) . '",
              "' . $this->edcomentarios->Text . '", "' . strtoupper($this->ednombre->Text) . '",
              "' . $this->edtel->Text . '", "' . $this->edcel->Text . '", "' . $this->edmotivos->Text . '",
              "' . $this->hfidapoyo->Value . '",
              "' . $_SESSION["idusuario"] . '", "' . $_SESSION["login"] . '",curdate(),CURTIME())';
         $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
         $this->edidsolicitud->Text = mysql_insert_id();
         $msg = "Inserto las Vacantes NC No. " . $this->edidsolicitud->Text;
         $nivel = 1;


      }
      else
      {
         if(Derechos('EDRHVACNC') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Vacantes NC");
                  window.location="urhvacantesncvista.php";
                  </script>';
            $ban = false;
         }
         else
         {
            $this->hfestatus->Value = 2;
            $msg = "Modifico las Vacantes NC No. " . $this->edidsolicitud->Text;
            $nivel = 2;

            $sql = 'update rhvacantesnc set idestatus=' . $this->cbestatus->ItemIndex . ',
                    idnota=' . $this->hfidnota->Value . ', idplaza=' . $this->cbplaza->ItemIndex . ',
                    idarea="' . $this->cbarea->ItemIndex . '", puesto="' . strtoupper($this->edpuesto->Text) . '",
                    fechapropuesta="' . $this->dtfechapropuesta->Text . '", jefeinmediato="' . strtoupper($this->edjefe->text) . '",
                    personalcargo="' . strtoupper($this->edpersonal->Text) . '", objetivo="' . $this->edobjetivo->Text . '",
                    adiarias="' . $this->edadiarias->Text . '", aperiodicas="' . $this->edaperiodicas->Text . '",
                    aocasionales="' . $this->edaocasionales->Text . '", indicadores="' . $this->edindicadores->Text . '",
                    edad="' . strtoupper($this->ededad->Text) . '", sexo="' . $rgsexo . '", estudios="' . strtoupper($this->cbestudios->ItemIndex) . '",
                    estudiosdesc="' . strtoupper($this->edestudiosdesc->Text) . '", licencia="' . $this->cklicencia->Checked . '",
                    licenciatipo="' . strtoupper($this->edlicencia->Text) . '", noantecedentes="' . $this->ckantecedentes->Checked . '",
                    otrodocto="' . $this->ckotro->Checked . '", otrodoctodesc="' . strtoupper($this->edotrodesc->Text) . '",
                    habilidades="' . $this->edhabilidades->Text . '", comentarios="' . $this->edcomentarios->Text . '",
                    nombre="' . strtoupper($this->ednombre->Text) . '", telefono="' . $this->edtel->Text . '",
                    celular="' . $this->edcel->Text . '", motivoscandidato="' . $this->edmotivos->Text . '",
                    curriculum="' . $this->lbadjunto->Caption . '", comentariosdir="' . $this->edcomentariosdir->Text . '",
                    percepcion="' . $this->edpercepcion->Text . '", idapoyo="' . $this->hfidapoyo->Value . '",
                    usuario="' . $_SESSION["login"] . '", fecha=curdate(), hora=CURTIME()
                    where idsolicitud = ' . $this->edidsolicitud->Text;
            $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());

         }
      }

      if($this->cbestatus->ItemIndex == 3)
      {
         $sql = 'update rhvacantesnc set contratacion=CURDATE()
                where idsolicitud = ' . $this->edidsolicitud->Text . ' and contratacion="0000-00-00"';
         $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
      }

      #para enviar el mail de aviso
      if($this->hfestatus->value == 2 || $this->cbestatus->ItemIndex == 2)
      {
         $msn = 'Se han creado las Vacantes NC No. ' . $this->edidsolicitud->Text .
         '. Para el Puesto ' . $this->edpuesto->text . ' Departamento ' . $this->cbarea->Items[$this->cbarea->ItemIndex];

         $correos = GetConfiguraciones('mailrh');
         $mailsistema = GetConfiguraciones('mailsistema');

         enviarmailattach($mailsistema, 'Sistema de CRM', $correos, 'Varios', 'AVISO DE PERMISO ', $msn, '', '');

      }
      dmconexion::Log($msg, $nivel);
      $this->GuardarDetalle();
   }

   function Validar()
   {
      if($this->cbestatus->ItemIndex > 2 && $this->hfestatus->value == 2)
      {
         $sql = 'select idestatus from rhvacantesnc where idsolicitud=' . $this->edidsolicitud->Text;
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

         if(Derechos('AUTRHVACNC') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("No tiene derechos para Contratar o Rechazar Vacantes NC");
                 </script>';
            return false;
         }
      }

      if($this->hfidestatus->value == 1 && $this->cbestatus->ItemIndex > 2)
      {
         echo '<script language="javascript" type="text/javascript">
                 alert("Debes guardar en Borrador o Proceso");
                 </script>';
         return false;
      }

      if($this->hfidestatus->Value > 1)
      {

         if($this->cbarea->ItemIndex == - 1)
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Falta el Departamento");
             </script>';
            return false;
         }

         if($this->edpuesto->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Falta el Puesto");
             </script>';
            return false;
         }

         if($this->dtfechapropuesta->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Falta la fecha propuesta");
             </script>';
            return false;
         }

         if($this->edjefe->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Falta el Jefe Inmediato");
             </script>';
            return false;
         }

         if($this->edpersonal->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Falta el Personal a cargo");
             </script>';
            return false;
         }

         if($this->edobjetivo->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Falta el Objetivo");
             </script>';
            return false;
         }

         if($this->edadiarias->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Faltan las Actividades Diarias");
             </script>';
            return false;
         }

         if($this->edaperiodicas->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Faltan las Actividades Periodicas");
             </script>';
            return false;
         }

         if($this->edaocasionales->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Faltan las Actividades Ocasionales");
             </script>';
            return false;
         }

         if($this->edindicadores->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Faltan los Indicadores");
             </script>';
            return false;
         }

         if($this->ededad->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Faltan la Edad");
             </script>';
            return false;
         }

         if($this->rgsexo->ItemIndex == - 1)
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Falta el Genero");
             </script>';
            return false;
         }

         if($this->cbestudios->ItemIndex == - 1)
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Falta el Grado de Estudios");
             </script>';
            return false;
         }

         if($this->edestudiosdesc->Text == '' && $this->cbestudios->ItemIndex <> 'SEC' && $this->cbestudios->ItemIndex <> 'PREP')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Faltan la Descripcion de los Estudios");
             </script>';
            return false;
         }

         if($this->cklicencia->Checked == true && $this->edlicencia->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Faltan el Tipo de Licencia");
             </script>';
            return false;
         }

         if($this->ckotro->Checked == true && $this->edotrodesc->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Faltan la descripcion del Otro Documento");
             </script>';
            return false;
         }

         if($this->edhabilidades->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Faltan las Habilidades");
             </script>';
            return false;
         }

         if($this->ednombre->Text != '' && $this->ednombre->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Falta el Telefono del Candidato");
             </script>';
            return false;
         }

         if($this->ednombre->Text != '' && $this->edmotivos->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Faltan los Motivos de Contratacion del Candidato");
             </script>';
            return false;
         }

         //HERRAMIENTAS
         $tabla = $_SESSION['tablaherr'];
         $tc = count($tabla) - 1;
         for($i = 0; $i <= $tc; $i++)
         {
            if($tabla[$i]['cuentacon'] == 'NO' &&
            ($tabla[$i]['accion'] == '' || $tabla[$i]['fecha'] == '0000-00-00'))
            {
               echo '<script language="javascript" type="text/javascript">
             alert("Faltan los datos por llenar en la herramienta");
             </script>';
               return false;
            }
         }

      //fechas

         if(strtotime($this->dtfechapropuesta->Text) < strtotime(date('Y/m/d')))
         {
            echo '<script language="javascript" type="text/javascript">
             alert("La fecha de Propuesta es menor a la actual");
             </script>';
            return false;
         }

         //fecha contratacion despues de herramientas
         $sql = 'select max(fechareal) as fechareal, max(fechaobtencion) as fechaobtencion
                from rhvacantesnc_herr where idsolicitud=' . $this->edidsolicitud->text;
         $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         $row = mysql_fetch_array($rs);
         if(date('Y/m/d', $this->dtfechapropuesta->Text) < date('Y/m/d', $row['fechareal']))
         {
            echo '<script language="javascript" type="text/javascript">
             alert("La fecha de Propuesta a contratacion es menor a la Obtencion Real de la Herramienta");
             </script>';
            return false;
         }

         if(date('Y/m/d', $this->dtfechapropuesta->Text) < date('Y/m/d', $row['fechaobtencion']))
         {
            echo '<script language="javascript" type="text/javascript">
             alert("La fecha de Propuesta a contratacion es menor a la Obtencion Estiamda de la Herramienta");
             </script>';
            return false;
         }
      }

      return true;
   }

   function Habilitar($hab)
   {
      $this->edfechacreacion->Enabled = $hab;
      $this->cbestatus->Enabled = $hab;
      $this->cbarea->Enabled = $hab;
      $this->edpuesto->Enabled = $hab;
      $this->cbplaza->Enabled = $hab;
      $this->dtfechapropuesta->Enabled = $hab;
      $this->edjefe->Enabled = $hab;
      $this->edpersonal->Enabled = $hab;
      $this->edobjetivo->Enabled = $hab;
      $this->edadiarias->Enabled = $hab;
      $this->edaperiodicas->Enabled = $hab;
      $this->edaocasionales->Enabled = $hab;
      $this->edindicadores->Enabled = $hab;
      $this->ededad->Enabled = $hab;
      $this->rgsexo->Enabled = $hab;
      $this->cbestudios->Enabled = $hab;
      $this->edestudiosdesc->Enabled = $hab;
      $this->cklicencia->Enabled = $hab;
      $this->edlicencia->Enabled = $hab;
      $this->ckantecedentes->Enabled = $hab;
      $this->ckotro->Enabled = $hab;
      $this->edotrodesc->Enabled = $hab;
      $this->edhabilidades->Enabled = $hab;
      $this->edcomentarios->Enabled = $hab;
      $this->ednombre->Enabled = $hab;
      $this->edtel->Enabled = $hab;
      $this->edcel->Enabled = $hab;
      $this->edmotivos->Enabled = $hab;

      if($this->cbestatus->ItemIndex < 3)
         $this->cbestatus->Enabled = true;
      else
         $this->cbestatus->Enabled = false;

      if(Derechos('NOTRHVACNC'))
         $this->lbnotas->Enabled = true;
      else
         $this->lbnotas->Enabled = false;
   }

   function inicializa()
   {
      //plaza
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

      //estatus
      $this->cbestatus->Clear();
      $sql = 'select idestatus, nombre from rhestatus_vac';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbestatus->AddItem($row['nombre'], null , $row['idestatus']);

      //fechacreacion
      $this->edfechacreacion->Text = Date('Y/m/d');
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
      $this->lbadjunto->Caption = '';
      $this->lblhistorial->Caption = '';
   }

   function LimpiarMemos()
   {
      reset($this->controls->items);
      while(list($key, $val) = each($this->controls->items))
      {
         if($val->inheritsFrom("Memo"))
            $val->Text = "";
      }
   }

   function TraeDetalle()
   {
      $rsm = "SELECT h.idsolicitud, h.equipo, h.cuenta, h.accion, h.fechaobtencion, h.fechareal
              from rhvacantesnc_herr h where idsolicitud ='" . $this->edidsolicitud->Text . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $i = 0;
      $tabla = array();
      while($row = mysql_fetch_array($r))
      {

         if($row['cuenta'] == 1)
            $chk = 'SI';
         else
            $chk = 'NO';
         $tabla[$i] = array('idcontador' => $i,
                            'equipo' => $row['equipo'],
                            'cuentacon' => $chk,
                            'accion' => $row['accion'],
                            'fecha' => $row['fechaobtencion'],
                            'fechareal' => $row['fechareal'],
                            );
         $i++;
      }
      $_SESSION['tablaherr'] = array();
      $_SESSION['tablaherr'] = $tabla;
   }

   function GuardarDetalle()
   {
      $tabla = $_SESSION['tablaherr'];
      $t = count($tabla) - 1;
      if($this->hfestatus->Value == '1')
      {
         for($i = 0; $i <= $t; $i++)
            $this->BDAgregar($i);
      }
      else
      {
         $rsm = "SELECT h.idcontador, h.idsolicitud, h.equipo, h.cuenta, h.accion,
              h.fechaobtencion, h.fechareal
              from rhvacantesnc_herr h where idsolicitud ='" . $this->edidsolicitud->Text . "'";
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

         while($row = mysql_fetch_array($r))
         {
            $ban = false;
            for($i = 0; $i <= $t; $i++)
            {
               if($row['equipo'] == $tabla[$i]['equipo'])
                  $ban = true;
            }
            if($ban == false)
            {
               $this->BDDelRow($row['idcontador']);
            }

         }

         for($i = 0; $i <= $t; $i++)
         {
            $rsm = "SELECT h.idcontador, h.idsolicitud, h.equipo, h.cuenta, h.accion, h.fechaobtencion, h.fechareal
                   from rhvacantesnc_herr h where idsolicitud ='" . $this->edidsolicitud->Text . "'
                    and equipo='" . $tabla[$i]['equipo'] . "'";
            $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
            $row = mysql_fetch_array($r);
            if($row == false)
               $this->BDAgregar($i);
            else
            {
               if($row['cuenta'] == '1')
                  $chk = 'SI';
               else
                  $chk = 'NO';


               if(!($row['accion'] == $tabla[$i]['accion'] &&
               $row['fechaobtencion'] == $tabla[$i]['fecha'] &&
               $row['fechareal'] == $tabla[$i]['fechareal'] &&
               $chk == $tabla[$i]['cuentacon']
               ))
               {
                  $this->BDDelRow($row['idcontador']);
                  $this->BDAgregar($i);
               }
            }
         }
      }
   }

   function BDAgregar($row)
   {
      $i = $row;
      $tabla = $_SESSION['tablaherr'];

      if($tabla[$i]['cuentacon'] == 'SI')
         $chk = 1;
      else
         $chk = 0;

      //inserta el detalle
      $rsm = "Insert into rhvacantesnc_herr ( idsolicitud, equipo, cuenta, accion,
              fechaobtencion, fechareal, usuario, fecha, hora)
              values ('" . $this->edidsolicitud->Text . "', '" . $tabla[$i]['equipo'] . "',
              '" . $chk . "',  '" . $tabla[$i]['accion'] . "',
              '" . $tabla[$i]['fecha'] . "', '" . $tabla[$i]['fechareal'] . "', '" . $_SESSION['login'] . "', curdate(), curtime())";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      dmconexion::Log('Inserto en la Vacante NC ' . $tabla[$i]['equipo'] . ' . ', 2);
   }

   function BDDelRow($idcontador)
   {
      $rsm = "SELECT h.idsolicitud, h.equipo, h.cuenta, h.accion, h.fechaobtencion, h.fechareal
              from rhvacantesnc_herr h where idcontador ='" . $idcontador . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $row = mysql_fetch_array($r);

      dmconexion::Log('Elimino en la Orden de Servicio ' . $this->edidsolicitud->Text . ' el equipo ' . $row['equipo'], 3);

      $rsm = "Delete from rhvacantesnc_herr where idcontador ='" . $idcontador . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
   }

   function HabilitarDir($hab)
   {
      $this->edpercepcion->Enabled = $hab;
      $this->edcomentariosdir->Enabled = $hab;

   }

   function TraerNotas()
   {
      $sql = 'select idnota from rhvacantesnc where idsolicitud=' . $this->edidsolicitud->Text;
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

global $urhvacantesnc;

//Creates the form
$urhvacantesnc = new urhvacantesnc($application);

//Read from resource file
$urhvacantesnc->loadResource(__FILE__);

//Shows the form
$urhvacantesnc->show();

?>