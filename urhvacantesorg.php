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
class urhvacantesorg extends Page
{
   public $hfchkna = null;
   public $hfidentrevistadorrh = null;
   public $hfidentrevistador = null;
   public $edcomgen = null;
   public $edobsreferencias = null;
   public $edhentrevista = null;
   public $edcandidato3 = null;
   public $edcandidato2 = null;
   public $edcandidato1 = null;
   public $Label46 = null;
   public $Label18 = null;
   public $Label48 = null;
   public $Label47 = null;
   public $Label45 = null;
   public $Label44 = null;
   public $btnentrevistadorrh = null;
   public $edentrevistadorrh = null;
   public $edidentrevistadorrh = null;
   public $Label43 = null;
   public $Label10 = null;
   public $lbnotas = null;
   public $lblhistorial = null;
   public $edoriginador = null;
   public $Label42 = null;
   public $hfidcolaborador = null;
   public $btnentrevistador = null;
   public $hfdetalle = null;
   public $hfidcontador = null;
   public $edobsentrevista = null;
   public $rgrefrating = null;
   public $edpuesto = null;
   public $edempresa = null;
   public $rgevgeneral = null;
   public $edobsdepartamento = null;
   public $edconocimientos = null;
   public $edhabilidades = null;
   public $rgresultado = null;
   public $rgcumpleperfil = null;
   public $edhentrevista3 = null;
   public $dtentrevista3 = null;
   public $edhentrevista2 = null;
   public $dtentrevista2 = null;
   public $edentrevistador = null;
   public $edidentrevistador = null;
   public $ednombre = null;
   public $hfidestatus = null;
   public $dtcontratacion = null;
   public $dtcontrataciondeseada = null;
   public $btnagregar = null;
   public $dtausencia = null;
   public $chkna = null;
   public $Label41 = null;
   public $Label40 = null;
   public $Label39 = null;
   public $Label38 = null;
   public $Label37 = null;
   public $Label36 = null;
   public $Label35 = null;
   public $Label34 = null;
   public $lbdetalle = null;
   public $Label32 = null;
   public $Label17 = null;
   public $Label16 = null;
   public $Label15 = null;
   public $Label29 = null;
   public $Label24 = null;
   public $Label22 = null;
   public $Label12 = null;
   public $Label28 = null;
   public $Label27 = null;
   public $Label26 = null;
   public $Label25 = null;
   public $dtentrevista = null;
   public $Label23 = null;
   public $hfpath = null;
   public $btnsubir = null;
   public $lbeliminar = null;
   public $lbadjunto = null;
   public $upload = null;
   public $Label21 = null;
   public $Label20 = null;
   public $Label19 = null;
   public $Label11 = null;
   public $Label33 = null;
   public $Label31 = null;
   public $Label30 = null;
   public $Label9 = null;
   public $Label8 = null;
   public $cbmotbaja = null;
   public $Label3 = null;
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
   public $btnnuevo = null;
   public $lbtitulo = null;
   public $btnregresar = null;
   public $btnguardarcerrar = null;
   public $btnguardar = null;

   function urhvacantesorgJSLoad($sender, $params)
   {
?>
      validarEventos();

      var h = '';

      if(vcl.$('edidentrevistador').value != '' && vcl.$('edentrevistador').value == '')
        h =  '&TraeEntrevistador='+vcl.$('edidentrevistador').value+'&edit=n';

      if(vcl.$('edidentrevistadorrh').value != '' && vcl.$('edentrevistadorrh').value == '' )
        h = h+ '&TraeEntrevistador='+vcl.$('edidentrevistadorrh').value+'&edit=rh';

       basicAjax('urhvacantesorg_ajax.php', 'Calcular=1'+h+'&hfidestatus='+vcl.$('hfidestatus').value);

<?php
   }

   function btnentrevistadorrhClick($sender, $params)
   {
      $this->btnentrevistadorrh->tag = 1;
      redirect('urhcolaboradoresvista.php?pagina=urhvacantesorg.php');
   }


   function btnentrevistadorClick($sender, $params)
   {
      $this->btnentrevistador->tag = 1;
      redirect('urhcolaboradoresvista.php?pagina=urhvacantesorg.php');
   }


   function edidentrevistadorrhJSBlur($sender, $params)
   {
?>
   basicAjax('urhvacantesorg_ajax.php', 'TraeEntrevistador='+vcl.$('edidentrevistadorrh').value+
                 '&edit=rh');
<?php
   }

   function edidentrevistadorJSBlur($sender, $params)
   {
?>
      basicAjax('urhvacantesorg_ajax.php', 'TraeEntrevistador='+vcl.$('edidentrevistador').value+
                 '&edit=n');
<?php
   }

   function cbareaChange($sender, $params)
   {
   if($this->hfestatus->Value == 1)
     { //puestos
      $this->cbpuesto->Clear();
      $sql = 'select idpuesto, nombre from puestos where idarea=' . $this->cbarea->ItemIndex;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbpuesto->AddItem($row['nombre'], null , $row['idpuesto']);
       }

   }


   function btnsubirClick($sender, $params)
   {
      if(Derechos('SUBRHVACORG') == false)
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
            if(tipoarchivo($_FILES["upload"]["type"])
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
                     $this->lbeliminar->Caption = 'Eliminar';
                     $this->lbadjunto->Caption = replace($_FILES["upload"]["name"]);
                     $this->lbadjunto->Link = $path . replace($_FILES["upload"]["name"]);
                     $this->hfpath->Value = replace($_FILES['upload']['name']);
                     $sql = ' update rhvacantesorgdet set pathcurr="' . $this->hfpath->Value .
                     '" where idsolicitud =' . $this->edidsolicitud->Text;
                     $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);

                     //redirect('urhvacantesorg.php?idsolicitud=' . $this->edidsolicitud->text);
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
      $this->chkna->Checked = $this->hfchkna->Value;
   }

   function lbeliminarClick($sender, $params)
   {
      if(Derechos('ELARCRHVACORG') == false)
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
         $sql = ' update rhvacantesorgdet set pathcurr="' . $this->hfpath->Value .
                '" where idsolicitud =' . $this->edidsolicitud->Text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->lbadjunto->Caption = '';
         $this->lbeliminar->Caption = '';
      }
      $this->chkna->Checked = $this->hfchkna->Value;
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
         '&procedencia=rhvacantesorg&idprocedencia=' . $this->edidsolicitud->Text);
      else
         redirect('unotas.php?idnota=0&procedencia=rhvacantesorg&idnom=idsolicitud&idprocedencia=' . $this->edidsolicitud->Text);
   }

   function btnagregarJSClick($sender, $params)
   {
?>
     if(vcl.$('ednombre').value != "")
     {
      vcl.$('lbadjunto').innerHTML = "";
      vcl.$('lbeliminar').innerHTML = "";
      basicAjax('urhvacantesorg_ajax.php', 'Agregar=1'+
                '&hfidcontador='+vcl.$('hfidcontador').value+
                '&detalle='+vcl.$('hfdetalle').value+
                '&hfidestatus='+vcl.$('hfidestatus').value+
                '&nombre='+vcl.$('ednombre').value+
                '&pathcurr='+vcl.$('hfpath').value+

                '&fentrevista='+vcl.$('dtentrevista').value+
                '&hentrevista='+vcl.$('edhentrevista').value+
                '&cumpleperfil='+getRadioButtonValue(vcl.$('rgcumpleperfil'))+
                '&obsentrevista='+vcl.$('edobsentrevista').value+

                '&hfidentrevistador='+vcl.$('hfidentrevistador').value+
                '&identrevistador='+vcl.$('edidentrevistador').value+
                '&entrevistador='+vcl.$('edentrevistador').value+
                '&fentrevista2='+vcl.$('dtentrevista2').value+
                '&hentrevista2='+vcl.$('edhentrevista2').value+

                '&hfidentrevistadorrh='+vcl.$('hfidentrevistadorrh').value+
                '&identrevistadorrh='+vcl.$('edidentrevistadorrh').value+
                '&entrevistadorrh='+vcl.$('edentrevistadorrh').value+
                '&fentrevista3='+vcl.$('dtentrevista3').value+
                '&hentrevista3='+vcl.$('edhentrevista3').value+
                '&resultado='+getRadioButtonValue(vcl.$('rgresultado'))+
                '&habilidades='+vcl.$('edhabilidades').value+
                '&conocimientos='+vcl.$('edconocimientos').value+
                '&observaciones='+vcl.$('edobsdepartamento').value+
                '&evgeneral='+getRadioButtonValue(vcl.$('rgevgeneral'))+

                '&refempresa='+vcl.$('edempresa').value+
                '&refpuesto='+vcl.$('edpuesto').value+
                '&obsreferencia='+vcl.$('edobsreferencias').value+
                '&refrating='+getRadioButtonValue(vcl.$('rgrefrating')));
      }
      else
         alert('No has capturado ningun nombre');
<?php
   }

   function btnimprimirJSClick($sender, $params)
   {
?>
      basicAjax('urhvacantesorg_ajax.php', 'Imprimir=1&reporte=rhvacantesorg'+
                '&idsolicitud='+vcl.$('edidsolicitud').value+'&tipo=pdf');
<?php

   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('ALRHVACORG') == false)
         echo '<script language="javascript" type="text/javascript">
              alert("No puede dar de Alta Vacantes Organigrama");
              </script>';
      else
         redirect("urhvacantesorg.php?idsolicitud=0");
   }

   function btnguardarcerrarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect('urhvacantesorgvista.php');
      }
   }

   function btnguardarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect('urhvacantesorg.php?idsolicitud=' . $this->edidsolicitud->text);
      }
   }

   function btnregresarClick($sender, $params)
   {
      redirect('urhvacantesorgvista.php');
   }

   function urhvacantesorgShow($sender, $params)
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
               if(Derechos('ELRHVACORG') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                    alert("No Tienes el Derecho para Eliminar Vacantes Organigrama");
                    window.location="urhvacantesorgvista.php";
                    </script>';
               }
               else
               {
                  $this->hfestatus->Value = 3;
                  $this->Locate();

                  $sql = 'Delete from rhvacantesorg where idsolicitud = ' . $this->edidsolicitud->text;
                  $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

                  dmconexion::Log('Elimino el permiso ' . $this->edidsolicitud->text, 3);
                  redirect("urhvacantesorgvista.php");
               }
            }
         }
      }

      if(isset($_GET['idcolaborador']))
      {

         $sql = 'select idempleado from rhcolaboradores where idcolaborador = ' . $_GET['idcolaborador'];
         $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         $row = mysql_fetch_array($rs);

         if($this->btnentrevistadorrh->tag == 1)
         {
            $this->hfidentrevistadorrh->value = $_GET['idcolaborador'];
            $this->edidentrevistadorrh->Text = $row['idempleado'];
            $this->edentrevistadorrh->Text = '';
            $this->btnentrevistadorrh->Tag = 0;
         }
         else
         {
            $this->hfidentrevistador->value = $_GET['idcolaborador'];
            $this->edidentrevistador->Text = $row['idempleado'];
            $this->edentrevistador->Text = '';
            $this->btnentrevistador->Tag = 0;
         }
      }

      if(isset($_GET['idprocedencia']))
      {
         $this->hfidnota->Value = $_GET['idnota'];
         $sql = 'update rhvacantesorg set idnota=' . $_GET['idnota'] . ' where idsolicitud=' . $this->edidsolicitud->Text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->TraerNotas();
      }
   }

   function Alta()
   {
      $this->edidsolicitud->Text = MaxId('rhvacantesorg', 'idsolicitud') + 1;
      $this->cbestatus->ItemIndex = 1;
      $this->hfidestatus->value = 1;
      $this->cbestatus->Enabled = false;
      $this->habilitar(true);
      $this->edobservaciones->Text = '';
      $sql = 'select ' . NombreFisica('u') . ' as nombre from usuarios u where idusuario=' . $_SESSION['idusuario'];
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);
      $this->edoriginador->Text = $row['nombre'];
      $this->cbarea->ItemIndex = $_SESSION['idarea'];
   }

   function Locate()
   {
      $sql = 'Select v.idsolicitud, v.idestatus, v.idnota, v.idplaza, v.fechacreacion,
              v.idarea, v.idpuesto, v.observaciones, v.idoriginador, v.idmotbaja,
              v.candidato1, v.candidato2, v.candidato3,
              v.noausencia, v.fechacontratacion, v.fechaausencia, v.fechadescontratacion, e.finalizado,
              v.idoriginador, ' . NombreFisica('u') . ' as originador, ' . ufh('v') . ' as ufh
              from rhvacantesorg v
              left join usuarios u on u.idusuario=v.idoriginador
              left join rhvacantesorg_estatus e on e.idestatus=v.idestatus
              where v.idsolicitud = ' . $this->edidsolicitud->Text;
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);

      $this->dtfechacreacion->Text = $row['fechacreacion'];
      $this->cbestatus->ItemIndex = $row['idestatus'];
      $this->hfidestatus->value = $row['idestatus'];
      $this->cbarea->ItemIndex = $row['idarea'];
      $this->cbpuesto->ItemIndex = $row['idpuesto'];
      $this->cbplaza->ItemIndex = $row['idplaza'];
      $this->cbmotbaja->ItemIndex = $row['idmotbaja'];
      $this->edcandidato1->Text = $row['candidato1'];
      $this->edcandidato2->Text = $row['candidato2'];
      $this->edcandidato3->Text = $row['candidato3'];
      $this->dtcontrataciondeseada->Text = $row['fechadescontratacion'];
      $this->dtcontratacion->Text = $row['fechacontratacion'];
      $this->dtausencia->Text = $row['fechaausencia'];
      $this->edobservaciones->Text = $row['observaciones'];
      $this->edoriginador->Text = $row['originador'];
      $this->hfidnota->Value = $row['idnota'];

      $this->lbufh->Caption = $row['ufh'];

      if($row['finalizado'] == '0')
         $this->Habilitar(true);
      else
         $this->Habilitar(false);

      if($row['noausencia'] == 1)
      {
         $this->chkna->Checked = true;
         $this->hfchkna->Value = true;
      }
      else
      {
         $this->chkna->Checked = false;
         $this->hfchkna->Value = false;
      }

      /*if(Derechos("ABRARCRHVACORG"))
      {
         //adjuntos
         $path = GetConfiguraciones('PathCurriculums');
         $this->lbadjunto->Link = $path . $row['curriculum'];
         $this->lbadjunto->Caption = $row['curriculum'];
         $this->hfpath->Value = $row['curriculum'];
         if($row['curriculum'] <> '')
            $this->lbeliminar->Caption = 'Eliminar';
      }
      */

      $this->TraeDetalle();
      $this->TraerNotas();
   }

   function Guardar()
   {
      $ban = false;

      if($this->chkna->Checked)
      {
         $chkna = 1;
         $this->hfchkna->Value = 1;
         $this->dtausencia->Text = '';
      }
      else
      {
         $chkna = 0;
         $this->hfchkna->Value = 0;
      }

      if($this->hfestatus->value == 1)
      {
         $sql = 'insert into rhvacantesorg (idestatus, idnota, idplaza, fechacreacion,
                 idarea, idpuesto, idmotbaja, noausencia, observaciones,
                 fechadescontratacion, fechaausencia, candidato1, candidato2, candidato3, idoriginador,
                 usuario, fecha, hora) values
                 (' . $this->cbestatus->ItemIndex . ', ' . $this->hfidnota->Value . ', ' . $this->cbplaza->ItemIndex . ', curdate(),
                 ' . $this->cbarea->ItemIndex . ', ' . $this->cbpuesto->ItemIndex . ',
                 ' . $this->cbmotbaja->ItemIndex . ', ' . $chkna . ', "' . $this->edobservaciones->Text . '",
                 "' . $this->dtcontrataciondeseada->Text . '", "' . $this->dtausencia->Text . '",
                 "' . $this->edcandidato1->Text . '", "' . $this->edcandidato2->Text . '", "' . $this->edcandidato3->Text . '",
                 "' . $_SESSION["idusuario"] . '", "' . $_SESSION["login"] . '",curdate(),CURTIME())';
         $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
         $this->edidsolicitud->Text = mysql_insert_id();
         $msg = "Inserto la Vacante ORG No. " . $this->edidsolicitud->Text;
         $nivel = 1;

      }
      else
      {
         if(Derechos('EDRHVACORG') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Vacantes Organigrama");
                  window.location="urhvacantesorgvista.php";
                  </script>';
            $ban = false;
         }
         else
         {
            $this->hfestatus->Value = 2;
            $msg = "Modifico la Vacante ORG No. " . $this->edidsolicitud->Text;
            $nivel = 2;

            $sql = 'update rhvacantesorg set idestatus=' . $this->cbestatus->ItemIndex . ',
                idnota=' . $this->hfidnota->Value . ', idplaza=' . $this->cbplaza->ItemIndex . ',
                idarea=' . $this->cbarea->ItemIndex . ', idpuesto=' . $this->cbpuesto->ItemIndex . ',
                observaciones="' . $this->edobservaciones->Text . '", idmotbaja=' . $this->cbmotbaja->ItemIndex . ',
                fechadescontratacion="' . $this->dtcontrataciondeseada->Text . '", fechaausencia="' . $this->dtausencia->Text . '",
                noausencia=' . $chkna . ',
                candidato1="' . $this->edcandidato1->Text . '",
                candidato2="' . $this->edcandidato2->Text . '",
                candidato3="' . $this->edcandidato3->Text . '",
                fechacontratacion="' . $this->dtcontratacion->Text . '",
                usuario="' . $_SESSION["login"] . '", fecha=curdate(), hora=CURTIME()
                where idsolicitud = ' . $this->edidsolicitud->Text;
            $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());

         }
      }

      if($this->cbestatus->ItemIndex == 3)
      {
         $sql = 'update rhvacantesorg set contratacion=CURDATE()
                where idsolicitud = ' . $this->edidsolicitud->Text . ' and contratacion="0000-00-00"';
         $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
      }

      #para enviar el mail de aviso
      if($this->hfestatus->value == 2 || $this->cbestatus->ItemIndex == 2)
      {
         $msn = 'Se ha creado el Vacante ORG No. ' . $this->edidsolicitud->Text .
                ' Del puesto ' . $this->cbpuesto->Items[$this->cbpuesto->ItemIndex];

         $correos = GetConfiguraciones('mailrh');
         $mailsistema = GetConfiguraciones('mailsistema');

         enviarmailattach($mailsistema, 'Sistema de CRM', $correos, 'Varios', 'AVISO DE VACANTE ORG ', $msn, '', '');

         $this->hfestatus->Value = 2;
      }

      #para enviar el mail de aviso
      if($this->hfestatus->value == 3 || $this->cbestatus->ItemIndex == 4)
      {
         $msn = 'Se solicita contratacion de la Vacante ORG No. ' . $this->edidsolicitud->Text .
         ' Del puesto ' . $this->cbpuesto->Items[$this->cbpuesto->ItemIndex];

         $correos = GetConfiguraciones('mailrh');
         $mailsistema = GetConfiguraciones('mailsistema');

         enviarmailattach($mailsistema, 'Sistema de CRM', $correos, 'Varios', 'AVISO DE CONTRATACION VACANTE ORG ', $msn, '', '');

         $this->hfestatus->Value = 2;
      }
      dmconexion::Log($msg, $nivel);
      $this->GuardarDetalle();
   }

   function TraeDetalle()
   {
      $rsm = "SELECT  d.idcontador, d.idsolicitud, d.nombre, d.pathcurr,
      d.identrevistadorrh as hfidentrevistadorrh, crh.idempleado as identrevistadorrh, " . NombreFisica('crh') . " as entrevistadorrh,
      d.fentrevista, d.hentrevista, d.cumpleperfil, d.obsentrevista,
      d.identrevistador as hfidentrevistador, c.idempleado as identrevistador, " . NombreFisica('c') . " as entrevistador,
      d.fentrevista2, d.hentrevista2,
      d.fentrevista3, d.hentrevista3, d.resultado, d.habilidades, d.conocimientos,
      d.observaciones, d.evgeneral,
      d.refempresa, d.refpuesto, d.refrating, d.obsreferencias
      from rhvacantesorgdet d
      left join rhcolaboradores c on c.idcolaborador = d.identrevistador
      left join rhcolaboradores crh on crh.idcolaborador = d.identrevistadorrh
      where idsolicitud='" . $this->edidsolicitud->Text . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $i = 0;
      $tabla = array();
      while($row = mysql_fetch_array($r))
      {
         $tabla[$i] = array('idcontador' => $i,
                            'nombre' => $row['nombre'],
                            'pathcurr' => $row['pathcurr'],
                            'hfidentrevistadorrh' => $row['hfidentrevistadorrh'],
                            'identrevistadorrh' => $row['identrevistadorrh'],
                            'entrevistadorrh' => $row['entrevistadorrh'],
                            'fentrevista' => $row['fentrevista'],
                            'hentrevista' => $row['hentrevista'],
                            'cumpleperfil' => $row['cumpleperfil'],
                            'obsentrevista' => $row['obsentrevista'],
                            'identrevistador' => $row['identrevistador'],
                            'hfidentrevistador' => $row['hfidentrevistador'],
                            'entrevistador' => $row['entrevistador'],
                            'fentrevista2' => $row['fentrevista2'],
                            'hentrevista2' => $row['hentrevista2'],
                            'fentrevista3' => $row['fentrevista3'],
                            'hentrevista3' => $row['hentrevista3'],
                            'resultado' => $row['resultado'],
                            'habilidades' => $row['habilidades'],
                            'conocimientos' => $row['conocimientos'],
                            'observaciones' => $row['observaciones'],
                            'evgeneral' => $row['evgeneral'],
                            'refempresa' => $row['refempresa'],
                            'refpuesto' => $row['refpuesto'],
                            'refrating' => $row['refrating'],
                            'obsreferencias' => $row['obsreferencias'],
                            );
         $i++;
      }
      $_SESSION['tablavo'] = array();
      $_SESSION['tablavo'] = $tabla;
   }

   function GuardarDetalle()
   {
      $tabla = $_SESSION['tablavo'];
      $t = count($tabla) - 1;
      if($this->hfestatus->Value == '1')
      {
         for($i = 0; $i <= $t; $i++)
            $this->BDAgregar($i);
      }
      else
      {
         $rsm = "SELECT idcontador, nombre FROM rhvacantesorgdet
         where idsolicitud ='" . $this->edidsolicitud->Text . "'";
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

         while($row = mysql_fetch_array($r))
         {
            $ban = false;
            for($i = 0; $i <= $t; $i++)
            {
               if($row['nombre'] == $tabla[$i]['nombre'])
                  $ban = true;
            }
            if($ban == false)
               $this->BDDelRow($row['idcontador']);

         }

         for($i = 0; $i <= $t; $i++)
         {
            $rsm = "SELECT idcontador, nombre, fentrevista
                    FROM rhvacantesorgdet where idsolicitud ='" . $this->edidsolicitud->Text . "'
                    and nombre='" . $tabla[$i]['nombre'] . "'";
            $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
            if(mysql_num_rows($r) == 0)
               $this->BDAgregar($i);
            else
            {
               $row = mysql_fetch_array($r);
               if(!($row['nombre'] == $tabla[$i]['nombre'] ||
               $row['fentrevista'] == $tabla[$i]['fentrevista']
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
      $tabla = $_SESSION['tablavo'];

      //inserta el detalle
      $rsm = "Insert into rhvacantesorgdet ( idsolicitud, nombre, pathcurr, identrevistadorrh,
              fentrevista, hentrevista, cumpleperfil, obsentrevista,
              identrevistador, fentrevista2, hentrevista2,
              fentrevista3, hentrevista3, resultado, habilidades,
              conocimientos, observaciones, evgeneral, opcontratacion,
              refempresa, refpuesto, refrating, usuario, fecha, hora)
              values ('" . $this->edidsolicitud->Text . "', '" . replacememo($tabla[$i]['nombre']) . "',
              '" . $tabla[$i]['pathcurr'] . "', '" . $tabla[$i]['hfidentrevistadorrh'] . "', '" . $tabla[$i]['fentrevista'] . "',  '" . $tabla[$i]['hentrevista'] . "',
              '" . $tabla[$i]['cumpleperfil'] . "',  '" . replacememo($tabla[$i]['obsentrevista']) . "',
              '" . $tabla[$i]['hfidentrevistador'] . "',  '" . $tabla[$i]['fentrevista2'] . "',
              '" . $tabla[$i]['hentrevista2'] . "',  '" . $tabla[$i]['fentrevista3'] . "',
              '" . $tabla[$i]['hentrevista3'] . "',  '" . $tabla[$i]['resultado'] . "',
              '" . replacememo($tabla[$i]['habilidades']) . "',  '" . replacememo($tabla[$i]['conocimientos']) . "',
              '" . replacememo($tabla[$i]['observaciones']) . "',  '" . $tabla[$i]['evgeneral'] . "',
              '" . $tabla[$i]['opcontratacion'] . "',  '" . replacememo($tabla[$i]['refempresa']) . "',
              '" . replacememo($tabla[$i]['refpuesto']) . "', '" . replacememo($tabla[$i]['refrating']) . "',
              '" . $_SESSION['login'] . "', curdate(), curtime())";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      dmconexion::Log('Inserto en Vacantes Organigrama [' . $this->edidsolicitud->Text . '] ' . $tabla[$i]['nombre'] . ' . ', 2);
   }

   function BDEditRow($row, $i)
   {
      $tabla = $_SESSION['tablavo'];

      //inserta el detalle
      $rsm = "Update rhvacantesorgdet set nombre='" . replacememo($tabla[$i]['nombre']) . "',
              pathcurr='" . $tabla[$i]['pathcurr'] . "', identrevistadorrh='" . $tabla[$i]['hfidentrevistadorrh'] . "', fentrevista= '" . $tabla[$i]['fentrevista'] . "', hentrevista= '" . $tabla[$i]['hentrevista'] . "',
              cumpleperfil='" . $tabla[$i]['cumpleperfil'] . "', obsentrevista='" . replacememo($tabla[$i]['obsentrevista']) . "',
              identrevistador='" . $tabla[$i]['hfidentrevistador'] . "', fentrevista2='" . $tabla[$i]['fentrevista2'] . "',
              hentrevista2='" . $tabla[$i]['hentrevista2'] . "', fentrevista3='" . $tabla[$i]['fentrevista3'] . "',
              hentrevista3='" . $tabla[$i]['hentrevista3'] . "', resultado='" . $tabla[$i]['resultado'] . "',
              habilidades='" . replacememo($tabla[$i]['habilidades']) . "', conocimientos='" . replacememo($tabla[$i]['conocimientos']) . "',
              observaciones='" . replacememo($tabla[$i]['observaciones']) . "', evgeneral='" . $tabla[$i]['evgeneral'] . "',
              opcontratacion='" . $tabla[$i]['opcontratacion'] . "', refempresa='" . replacememo($tabla[$i]['refempresa']) . "',
              refpuesto='" . replacememo($tabla[$i]['refpuesto']) . "', refrating='" . replacememo($tabla[$i]['refrating']) . "',
              usuario='" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
              where idcontador=" . $row;
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      dmconexion::Log('Edito en Vacantes Organigrama [' . $this->edidsolicitud->Text . '] ' . $tabla[$i]['nombre'] . ' . ', 2);
   }

   function BDDelRow($idcontador)
   {
      $rsm = "SELECT idsolicitud, nombre
              from rhvacantesorgdet where idcontador ='" . $idcontador . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $row = mysql_fetch_array($r);

      dmconexion::Log('Elimino en Vacantes Organigrama ' . $this->edidsolicitud->Text . ' la persona [' . $tabla[$i]['nombre'] . '] ' . $tabla[$i]['descripcion'] . ' ', 3);

      $rsm = "Delete from rhvacantesorgdet where idcontador ='" . $idcontador . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
   }


   function Validar()
   {

      if($this->hfestatus->value == 1 && $this->cbestatus->ItemIndex > 2)
      {
         echo '<script language="javascript" type="text/javascript">
                 alert("Debes guardar en Borrador o Proceso");
                 </script>';
         return false;
      }

      if($this->cbestatus->ItemIndex > 2 && $this->hfestatus->value == 2)
      {
         $sql = 'select v.idestatus, e.finalizado from rhvacantesorg v
                left join rhvacantesorg_estatus e on e.idestatus=v.idestatus
                where v.idsolicitud=' . $this->edidsolicitud->Text;
         $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         $row = mysql_fetch_array($rs);
         if($row['idestatus'] == 1)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("No puedes Contratar o Rechazar antes de poner en Proceso");
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

         if($this->cbestatus->ItemIndex == 3 && $this->hfidestatus->value < 3)
            if(Derechos('ENTRHVACORG') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                 alert("No tiene derechos para Entrevista con RH por lo que no puede poner en Reclutamiento");
                 </script>';
               return false;
            }

         if($this->cbestatus->ItemIndex == 4 && $this->hfidestatus->value == 3)
            if(Derechos('SOCRHVACORG') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                 alert("No tiene derechos para Solicitar a Contratacion");
                 </script>';
               return false;
            }

         if($this->cbestatus->ItemIndex == 5 && $this->hfidestatus->value == 4)
            if(Derechos('CONRHVACORG') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                 alert("No tiene derechos para Contratar");
                 </script>';
               return false;
            }
      }

      //Valida Estatus orden
      if($this->hfidestatus->value < 3 && $this->cbestatus->ItemIndex > 3 &&
      $this->cbestatus->ItemIndex != 6)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No se puede utilizar este estatus");
               </script>';
         return false;
      }

      if($this->hfidestatus->value == 3 && $this->cbestatus->ItemIndex > 4 &&
      $this->cbestatus->ItemIndex != 6)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No se puede utilizar este estatus");
               </script>';
         return false;
      }

      if($this->hfidestatus->value > $this->cbestatus->ItemIndex  &&
         $this->cbestatus->ItemIndex != 6)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No se puede utilizar este estatus");
               </script>';
         return false;
      }

      if($this->cbplaza->ItemIndex == - 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la plaza");
             </script>';
         return false;
      }

      if($this->cbarea->ItemIndex == - 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el area");
             </script>';
         return false;
      }

      if($this->cbpuesto->ItemIndex == - 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el puesto");
             </script>';
         return false;
      }

      if($this->dtcontrataciondeseada->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la fecha de contratacion deseada");
             </script>';
         return false;
      }

      //fechas
      if($this->cbestatus->ItemIndex == 1)
      {
         if(strtotime($this->dtcontrataciondeseada->Text) < strtotime(date('Y/m/d')))
         {
            echo '<script language="javascript" type="text/javascript">
             alert("La fecha de Contratacion Deseada es menor a la actual");
             </script>';
            return false;
         }

         if($this->chkna->Checked == false && $this->dtausencia->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Falta la fecha de ausencia del colaborador actual");
             </script>';
            return false;
         }
      }

      if($this->hfidestatus->value == 2 && $this->cbestatus->ItemIndex == 3)
      {
         //if(strtotime($this->dtcontratacion->Text) < strtotime(date('Y/m/d')))
         if($this->dtcontratacion->Text == '')
         {
            echo '<script language="javascript" type="text/javascript">
             alert("Falta la fecha de Contratacion");
             </script>';
            return false;
         }

      }

      //validar si ingreso un candidato
      if($this->ednombre->Text != '' && $this->cbestatus->ItemIndex == 2)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Si desea guardar el Candidato favor de dar click en el boton (+) y despues Guardar");
             </script>';
         return false;
      }

      return true;
   }

   function Habilitar($hab)
   {
      $this->cbestatus->Enabled = $hab;

      if($this->cbestatus->ItemIndex == 1)
         $hab2 = $hab;
      else
         $hab2 = false;


      $this->cbarea->Enabled = $hab2;
      $this->cbpuesto->Enabled = $hab2;
      $this->cbplaza->Enabled = $hab2;
      $this->chkna->Enabled = $hab2;
      $this->dtausencia->Enabled = $hab2;
      $this->dtcontratacion->Enabled = $hab2;
      $this->cbmotbaja->Enabled = $hab2;
      $this->edobservaciones->Enabled = $hab2;

      //si ya se llenaron los 3 candidatos ya no se pueden modificar los demas
      if($this->cbestatus->ItemIndex > 1 && $this->cbestatus->ItemIndex < 4)
         $hab2 = $hab;
      else
         $hab2 = false;

      //Seguimiento
      if(Derechos('SEGRHVACORG'))
         $this->lbnotas->Enabled = $hab;
      else
         $this->lbnotas->Enabled = false;

      $this->btnagregar->Enabled = $hab2;

      //solicitar candidatos
      if(Derechos('SOLRHVACORG'))
      {
         $this->ednombre->Enabled = $hab2;
         if(Derechos('SUBRHVACORG'))
         {
            $this->btnsubir->Enabled = $hab2;
            $this->upload->Enabled = $hab2;
         }
         else
         {
            $this->btnsubir->Enabled = false;
            $this->upload->Enabled = false;
         }
      }
      else
      {
         $this->lbnotas->Enabled = false;
         $this->btnsubir->Enabled = false;
      }

      //entrevista con rh
      if(Derechos('ENTRHVACORG'))
      {
         $this->edidentrevistadorrh->Enabled = $hab2;
         $this->btnentrevistadorrh->Enabled = $hab2;
         $this->edhentrevista->Enabled = $hab2;
         $this->rgcumpleperfil->Enabled = $hab2;
         $this->edobsentrevista->Enabled = $hab2;
      }
      else
      {
         $this->edidentrevistadorrh->Enabled = false;
         $this->btnentrevistadorrh->Enabled = false;
         $this->edhentrevista->Enabled = false;
         $this->rgcumpleperfil->Enabled = false;
         $this->edobsentrevista->Enabled = false;
      }

      //entrevistador
      if(Derechos('ENTRRHVACORG'))
      {
         $this->edidentrevistador->Enabled = $hab2;
         $this->btnentrevistador->Enabled = $hab2;
         $this->edhentrevista2->Enabled = $hab2;
      }
      else
      {
         $this->edidentrevistador->Enabled = false;
         $this->btnentrevistador->Enabled = false;
         $this->edhentrevista2->Enabled = false;
      }

      //entrevista con dpto
      if(Derechos('EDPRHVACORG'))
      {
         $this->edhentrevista3->Enabled = $hab2;
         $this->rgresultado->Enabled = $hab2;
         $this->edhabilidades->Enabled = $hab2;
         $this->edconocimientos->Enabled = $hab2;
         $this->edobsdepartamento->Enabled = $hab2;
         $this->rgevgeneral->Enabled = $hab2;
      }
      else
      {
         $this->edhentrevista3->Enabled = false;
         $this->rgresultado->Enabled = false;
         $this->edhabilidades->Enabled = false;
         $this->edconocimientos->Enabled = false;
         $this->edobsdepartamento->Enabled = false;
         $this->rgevgeneral->Enabled = false;
      }

      //referencias
      if(Derechos('REFRHVACORG'))
      {
         $this->edempresa->Enabled = $hab2;
         $this->edpuesto->Enabled = $hab2;
         $this->rgrefrating->Enabled = $hab2;
         $this->edobsreferencias->Enabled = $hab2;
      }
      else
      {
         $this->edempresa->Enabled = false;
         $this->edpuesto->Enabled = false;
         $this->rgrefrating->Enabled = false;
         $this->edobsreferencias->Enabled = false;
      }

      if($this->cbestatus->ItemIndex == 3)
         $hab2 = $hab;
      else
         $hab2 = false;

      //solicitar candidatos
      if(Derechos('SOCRHVACORG'))
      {
         $this->edcandidato1->Enabled = $hab;
         $this->edcandidato2->Enabled = $hab;
         $this->edcandidato3->Enabled = $hab;
      }
      else
      {
         $this->edcandidato1->Enabled = false;
         $this->edcandidato2->Enabled = false;
         $this->edcandidato3->Enabled = false;
      }

      if($this->cbestatus->ItemIndex == 4)
         $hab2 = $hab;
      else
         $hab2 = false;

      //contratar candidatos
      if(Derechos('CONRHVACORG'))
      {
         $this->edcomgen->Enabled = true;
      }
      else
      {
         $this->edcomgen->Enabled = false;
      }

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
      $sql = 'select idpuesto, nombre from puestos where idarea=' . $_SESSION['idarea'];
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbpuesto->AddItem($row['nombre'], null , $row['idpuesto']);


      //motivos
      $this->cbmotbaja->Clear();
      $sql = 'select idmotbaja id, nombre from rhvacantesorg_mb';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbmotbaja->AddItem($row['nombre'], null , $row['id']);

      //estatus
      $this->cbestatus->Clear();
      $sql = 'select idestatus, nombre from rhvacantesorg_estatus';
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
         if($val->inheritsFrom("ComboBox") || $val->inheritsFrom("RadioGroup"))
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
      $this->lbeliminar->Caption = '';
   }

   function TraerNotas()
   {
      $sql = 'select idnota from rhvacantesorg where idsolicitud=' . $this->edidsolicitud->Text;
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

      $t = ' <div style = " width:800x; height:100px; overflow: auto" > ';

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
      $t .= '</div>';
      $this->lblhistorial->Caption = $t;
   }
}

global $application;

global $urhvacantesorg;

//Creates the form
$urhvacantesorg = new urhvacantesorg($application);

//Read from resource file
$urhvacantesorg->loadResource(__FILE__);

//Shows the form
$urhvacantesorg->show();

?>