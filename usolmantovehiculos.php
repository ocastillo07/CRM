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
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class usolmantovehiculos extends Page
{
   public $edvehiculo = null;
   public $Label5 = null;
   public $tbsolicitudes = null;
   public $Label13 = null;
   public $lbnotas = null;
   public $lbeliminar1 = null;
   public $lbeliminar2 = null;
   public $lbadjunto2 = null;
   public $lbadjunto1 = null;
   public $sqlnotas = null;
   public $hfauditar = null;
   public $hfclasificacion = null;
   public $mdescripcion = null;
   public $hfidsolicitud = null;
   public $hfidcorreccion = null;
   public $hfidanalisis = null;
   public $hfidproblema = null;
   public $edfechacreacion = null;
   public $hfidnota = null;
   public $hfpath2 = null;
   public $hfpath1 = null;
   public $lbufh = null;
   public $hfestatus = null;
   public $btnsubir = null;
   public $upload = null;
   public $Label15 = null;
   public $cbestatus = null;
   public $Label14 = null;
   public $chksolicita = null;
   public $dtcompromiso = null;
   public $Label12 = null;
   public $Label10 = null;
   public $mcorreccion = null;
   public $manalisis = null;
   public $cbresponsable = null;
   public $Label9 = null;
   public $rgclasificacion = null;
   public $Label7 = null;
   public $Label6 = null;
   public $Label4 = null;
   public $Label3 = null;
   public $Label2 = null;
   public $Label1 = null;
   public $edoriginador = null;
   public $edidsolicitud = null;
   public $pbotones = null;
   public $btnnuevo = null;
   public $lbtitulo = null;
   public $btncerrar = null;
   public $btnguardarcerrar = null;
   public $btnguardar = null;


   function usolmantovehiculosShow($sender, $params)
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
            $this->alta();
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
               if(Derechos('ELIMTOVE') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                    alert("No Tienes el Derecho para Eliminar Solicitudes a Mantenimiento de Vehiculos");
                    window.location="usolmantovehiculosvista.php";
                    </script>';
               }
               else
               {
                  $this->hfestatus->Value = 3;
                  $this->Locate();

                  $this->tbsolicitudes->open();
                  $this->tbsolicitudes->delete();
                  $this->tbsolicitudes->Active = false;

                  //se eliminan las notas de la accion
                  $sql = "Delete from notas where idnota = '" . $this->hfidnota->Value . "'";
                  $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

                  //notas problema
                  $sql = "Delete from notas where idnota = '" . $this->hfidproblema->Value . "'";
                  $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

                  //se eliminan las notas de la accion memo
                  $sql = "Delete from notas where idnota = '" . $this->hfidsolicitud->Value . "'";
                  $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

                  //se eliminan las notas de la correccion
                  $sql = "Delete from notas where idnota = '" . $this->hfidcorreccion->Value . "'";
                  $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

                  //se eliminan las notas de la analisis
                  $sql = "Delete from notas where idnota = '" . $this->hfidanalisis->Value . "'";
                  $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

                  dmconexion::Log("Elimino la Solicitud de Mantenimiento a Vehiculos no. " . $this->edidsolicitud->Text .
                  " Del originador " . $this->edoriginador->Text, 3);

                  redirect("usolmantovehiculosvista.php");
               }
            }
         }
      }
   }

   function rgclasificacionJSClick($sender, $params)
   {

?>
      if(vcl.$('cbestatus').value=='111')
      {
         if(vcl.$('hfclasificacion').value=='0')
            document.getElementById('rgclasificacion_0').checked = true;
         else
            document.getElementById('rgclasificacion_1').checked = true;
      }
      else if(vcl.$('hfauditar').value=='0' && vcl.$('hfestatus').value=='2')
      {
         if(vcl.$('hfclasificacion').value=='0')
            document.getElementById('rgclasificacion_0').checked = true;
         else
            document.getElementById('rgclasificacion_1').checked = true;
      }

<?php

   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('ALMTOVE') == false)
         echo '<script language="javascript" type="text/javascript">
               alert("No puede dar de Alta Solicitudes a Mantenimiento de Vehiculos");
               </script>';
      else
         redirect("usolmantovehiculos.php?idsolicitud=0&folio=0");
   }

   function cbestatusJSChange($sender, $params)
   {

?>
   basicAjax('usolmantovehiculos_ajax.php','cbestatuschange=1'+
             '&estatus=' + vcl.$('cbestatus').value +
             '&idsolicitud=' + vcl.$('edidsolicitud').value);
<?php

   }

   function usolmantovehiculosJSLoad($sender, $params)
   {

?>
   if(vcl.$('cbestatus').value=='111')
   {
     findObj('dtcompromiso').disabled=true;
     findObj('btnguardar').disabled=true;
     findObj('btnguardarcerrar').disabled=true;
     document.getElementById('f-calendar-trigger-1').disabled=true;
   }
   validarEventos();

<?php
   }


   function mcorreccionDblClick($sender, $params)
   {
      if(Derechos('EDMTOVE'))
      {
         if($this->cbestatus->ItemIndex == '111')
         {
            echo '<script language="javascript" type="text/javascript">
                  alert(\'Ya no puedes agregar mas notas, la Solicitud esta Cerrada!\');
                  </script>';
         }
         else if($this->hfidcorreccion->Value != '0')
            redirect("unotas.php?idnota=" . $this->hfidcorreccion->Value .
            "&procedencia=solmantovehiculos" . "&idprocedencia=" . $this->edidsolicitud->Text);
         else
            echo '<script language="javascript" type="text/javascript">
                  alert("Primero escribe un comentario en el recuadro");
                  </script>';
      }
      else
         echo '<script language="javascript" type="text/javascript">
               alert("No puede Modificar Solicitudes a Mantenimiento de Vehiculos");
               window.location="usolmantovehiculosvista.php";
               </script>';
   }

   function manalisisDblClick($sender, $params)
   {
      if(Derechos('EDMTOVE'))
      {
         if($this->cbestatus->ItemIndex == '111')
         {
            echo '<script language="javascript" type="text/javascript">
               alert(\'Ya no puedes agregar mas notas, la Solicitud esta Cerrada!\');
               </script>';
         }
         else
            if($this->hfidanalisis->Value != '0')
               redirect("unotas.php?idnota=" . $this->hfidanalisis->Value . "&procedencia=solmantovehiculos" .
               "&idprocedencia=" . $this->edidsolicitud->Text);
         else
            echo '<script language="javascript" type="text/javascript">
                  alert("Primero escribe un comentario en el recuadro");
                  </script>';
      }
      else
         echo '<script language="javascript" type="text/javascript">
               alert("No puede Modificar Solicitudes a Mantenimiento de Vehiculos");
               window.location="usolmantovehiculosvista.php";
               </script>';
   }

   function mdescripcionDblClick($sender, $params)
   {
      if(Derechos('EDMTOVE'))
      {
         if($this->cbestatus->ItemIndex == '111')
         {
            echo '<script language="javascript" type="text/javascript">
                  alert(\'Ya no puedes agregar mas notas, la Solicitud esta Cerrada!\');
                  </script>';
         }
         else if($this->hfidproblema->Value != '0')
            redirect("unotas.php?idnota=" . $this->hfidproblema->Value . "&procedencia=solmantovehiculos" .
            "&idprocedencia=" . $this->edidsolicitud->Text);
         else
            echo '<script language="javascript" type="text/javascript">
                     alert("Primero escribe un comentario en el recuadro");
                     </script>';
      }
      else
         echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Solicitudes a Mantenimiento de Vehiculos");
                  window.location="usolmantovehiculosvista.php";
                  </script>';
   }

   function btnguardarcerrarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->guardar();
         redirect('usolmantovehiculosvista.php');
      }
   }

   function lbeliminar2Click($sender, $params)
   {
      $this->eliminararchivo(2);
   }

   function lbeliminar1Click($sender, $params)
   {
      $this->eliminararchivo(1);
   }

   function eliminararchivo($no)
   {
      if(Derechos('ELARMTOVE') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Eliminar el Archivo");
               </script>';
      }
      else
      {
         if($no == 1)
         {
            unlink('Adjuntos/' . $this->lbadjunto1->Caption);
            $this->hfpath1->Value = '';
            $sql = ' update solmantovehiculos set path1="' . $this->hfpath1->Value .
            '" where idsolicitud =' . $this->edidsolicitud->Text;
            $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
            $this->lbadjunto1->Caption = '';
            $this->lbeliminar1->Caption = '';
         }
         if($no == 2)
         {
            unlink('Adjuntos/' . $this->lbadjunto2->Caption);
            $this->hfpath2->Value = '';
            $sql = ' update solmantovehiculos set path2="' . $this->hfpath2->Value .
            '" where idsolicitud =' . $this->edidsolicitud->Text;
            $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
            $this->lbadjunto2->Caption = '';
            $this->lbeliminar2->Caption = '';
         }
      }
   }

   function btnsubirClick($sender, $params)
   {
      if(Derechos('SUBARMTOVE') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Adjuntar el Archivo");
               </script>';
      }
      else
      {
         if($this->hfestatus->value == 1)
         {
            echo '<script language="javascript" type="text/javascript">
               alert(\' Debes Guardar Los Datos Antes de Subir el Archivo \');
               </script>';

         }
         else
         {
            $path = GetConfiguraciones('Pathadjuntos');

            if(tipoarchivo($_FILES["upload"]["type"]) && $_FILES["upload"]["size"] < 20485760)
            {
               if($_FILES["upload"]["error"] > 0)
               {
                  echo '<script language="javascript" type="text/javascript">
                           alert(\'Error al subir Archivo: ' . $_FILES["upload"]["error"] . '\');
                         </script>';
               }
               else
               {
                  if(file_exists($_SERVER['DOCUMENT_ROOT'] . $path . $_FILES["upload"]["name"]))
                  {
                     echo '<script language="javascript" type="text/javascript">
                              alert(\'Ya existe el archivo: ' . $_FILES["upload"]["name"] . ', favor de renombrarlo o seleccione otro \');
                          </script>';
                  }
                  else
                  {
                     if($this->lbadjunto1->Caption == '')
                     {
                        move_uploaded_file($_FILES["upload"]["tmp_name"],
                        $_SERVER['DOCUMENT_ROOT'] . $path . replace($_FILES["upload"]["name"]));
                        echo '<script language="javascript" type="text/javascript">
                              alert(\'Archivo Guardado: ' . replace($_FILES["upload"]["name"]) . '\');
                            </script>';
                        $this->lbadjunto1->Caption = replace($_FILES["upload"]["name"]);
                        $this->lbadjunto1->Link = "Adjuntos/" . replace($_FILES["upload"]["name"]);
                        $this->hfpath1->Value = replace($_FILES['upload']['name']);
                        $sql = ' update solmantovehiculos set path1="' . $this->hfpath1->Value .
                        '" where idsolicitud =' . $this->edidsolicitud->Text;
                        $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
                        $this->lbeliminar1->Caption = 'Eliminar';
                     }
                     else if($this->lbadjunto2->Caption == '')
                     {
                        move_uploaded_file($_FILES["upload"]["tmp_name"],
                        $_SERVER['DOCUMENT_ROOT'] . $path . replace($_FILES["upload"]["name"]));
                        echo '<script language="javascript" type="text/javascript">
                            alert(\'Archivo Guardado: ' . replace($_FILES["upload"]["name"]) . '\');
                          </script>';
                        $this->lbadjunto2->Caption = replace($_FILES["upload"]["name"]);
                        $this->lbadjunto2->Link = "Adjuntos/" . replace($_FILES["upload"]["name"]);
                        $this->hfpath2->Value = replace($_FILES['upload']['name']);
                        $sql = ' update solmantovehiculos set path2="' . $this->hfpath2->Value .
                        '" where idsolicitud =' . $this->edidsolicitud->Text;
                        $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
                        $this->lbeliminar2->Caption = 'Eliminar';
                     }
                     else
                     {
                        echo '<script language="javascript" type="text/javascript">
                               alert(\'Ya no puedes agregar otro Archivo \');
                             </script>';
                     }
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

   function btncerrarClick($sender, $params)
   {
      redirect('usolmantovehiculosvista.php');
   }

   function btnguardarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->guardar();
         $this->mdescripcion->Clear();
         $this->manalisis->Clear();
         $this->mcorreccion->Clear();
         $this->locate();
      }
   }

   function guardar()
   {
      $ban = false;
      if($this->hfestatus->value == 1)
      {
         $axion = 'insert into solmantovehiculos(idclasificacion,idestatus,originador,vehiculo,idnota,
         idnotaproblema,idresponsable,idnotaanalisis,idnotacorreccion,solicitacierre,
         fechacreacion,fechacompromiso,usuario,fecha,hora) values (' . $this->rgclasificacion->ItemIndex . ',' .
         $this->cbestatus->ItemIndex . ',"' . strtoupper($this->edoriginador->Text) . '","'.
         strtoupper($this->edvehiculo->Text) .'",'. $this->hfidnota->Value . ',' . $this->hfidproblema->Value . ',' .
         $this->cbresponsable->ItemIndex . ',' . $this->hfidanalisis->Value . ',' . $this->hfidcorreccion->Value .
          ',' . $this->chksolicita->Checked . ',curdate(),"' . $this->dtcompromiso->text . '","' .
         $_SESSION["login"] . '",curdate(),CURTIME())';
         $raxion = mysql_query($axion)or die("Error de Consulta SQL: " . $axion . ' ' . mysql_error());
         $this->edidsolicitud->Text = mysql_insert_id();
         $msg = "Inserto la Solicitud No. " . $this->edidsolicitud->Text;
         $nivel = 1;
         #problema este campo siempre es obligatorio
         $sql = 'insert into notas (idprocedencia,procedencia,usuario,fecha,hora) values
                 (' . $this->edidsolicitud->text . ',"Solicitud-Problema","' . $_SESSION['login'] . '",curdate(),curtime())';
         $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql . ' ' . mysql_error());
         $this->hfidproblema->Value = mysql_insert_id();
         $s = $this->mdescripcion->Text;
         if(!empty($s))
         {
            $sql1 = 'insert into notasdet(idnota,nota,usuario,fecha,hora) values(' . $this->hfidproblema->value .
            ',"' . strtoupper(replacememo($this->mdescripcion->text)) . '","' . $_SESSION['login'] . '", curdate(),curtime())';
            $rs1 = mysql_query($sql1)or die('Error de Consulta SQL: ' . $sql1 . ' ' . mysql_error());
         }
         $up = 'update solmantovehiculos set idnotaproblema=' . $this->hfidproblema->Value . ' where idsolicitud=' . $this->edidsolicitud->Text;
         $rsup = mysql_query($up)or die("Error de Consulta SQL: " . $up . ' ' . mysql_error());
      }
      else
      {
         if(Derechos('EDMTOVE') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Solicitudes a Mantenimiento de Vehiculos");
                  window.location="usolmantovehiculosvista.php";
                  </script>';
            $ban = false;
         }
         else
         {
            $this->tbsolicitudes->close();
            $this->tbsolicitudes->writeFilter('idsolicitud="' . $this->edidsolicitud->Text . '"');
            $this->tbsolicitudes->refresh();
            $this->tbsolicitudes->open();
            $this->tbsolicitudes->Edit();
            $this->hfestatus->Value = 2;
            $msg = "Modifico la Solicitud No. " . $this->edidsolicitud->Text;
            $nivel = 2;
            $this->tbsolicitudes->fieldset('fechacreacion', $this->edfechacreacion->Text);
            $this->tbsolicitudes->fieldset('idestatus', $this->cbestatus->ItemIndex);
            $this->tbsolicitudes->fieldset('originador', strtoupper($this->edoriginador->Text));
            $this->tbsolicitudes->fieldset('vehiculo', strtoupper($this->edvehiculo->Text));
            $this->tbsolicitudes->fieldset('idclasificacion', $this->rgclasificacion->ItemIndex);
            //$this->tbsolicitudes->fieldset('idproceso', $this->cbproceso->ItemIndex);
            //$this->tbsolicitudes->fieldset('idprocedimiento', $this->cbprocedimiento->ItemIndex);
            $this->tbsolicitudes->fieldset('idresponsable', $this->cbresponsable->ItemIndex);
            $this->tbsolicitudes->fieldset('solicitacierre', $this->chksolicita->Checked);
            if($this->chksolicita->Checked && $this->cbestatus->ItemIndex == 109)
               $this->tbsolicitudes->fieldset('idestatus', 110);
            $this->tbsolicitudes->fieldset('fechacompromiso', $this->dtcompromiso->text);
            if($this->cbestatus->ItemIndex == 111)
               $this->tbsolicitudes->fieldset('fechacierre', Fecha());
            ######### ids de notas ############
            $this->insertaridnotas();
            $this->tbsolicitudes->fieldset('idnotaproblema', $this->hfidproblema->Value);
            $this->tbsolicitudes->fieldset('idnotaanalisis', $this->hfidanalisis->Value);
            $this->tbsolicitudes->fieldset('idnotacorreccion', $this->hfidcorreccion->Value);
            //$this->tbsolicitudes->fieldset('idnotaaccion', $this->hfidsolicitud->Value);
            $this->tbsolicitudes->fieldset('idnota', $this->hfidnota->Value);
            $this->tbsolicitudes->fieldset('path1', $this->hfpath1->Value);
            $this->tbsolicitudes->fieldset('path2', $this->hfpath2->Value);
            $this->tbsolicitudes->fieldset("usuario", $_SESSION["login"]);
            $this->tbsolicitudes->fieldset("fecha", Fecha());
            $this->tbsolicitudes->fieldset("hora", Hora());
            $this->tbsolicitudes->post();
         }
      }
      #para enviar el mail de aviso
      if($this->hfestatus->value == 1 || $this->cbestatus->ItemIndex == 111)
      {
         if($this->cbestatus->ItemIndex < 111)
         {
            $msn = strtoupper($this->edoriginador->Text) . ' ha creado la Solicitud A Mantenimiento de Vehiculos No. ' . $this->edidsolicitud->Text .
            ' De tipo ' . $this->rgclasificacion->Items[$this->rgclasificacion->ItemIndex] .
            ' Dirigida a ' . $this->cbresponsable->Items[$this->cbresponsable->ItemIndex] .
            ' Con la siguiente Descripcion del Problema:  ' . $this->mdescripcion->Text;
            $sql = 'select email from usuarios where idusuario=' . $this->cbresponsable->ItemIndex;
            $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql . ' ' . mysql_error());
            $row = mysql_fetch_row($rs);
            $correos = $row[0] . ',' . GetConfiguraciones('mailsolmantovehiculos');
         }
         else
         {
            $msn = 'La Solicitud de Manto de Vehiculos No. ' . $this->edidsolicitud->text . ' se ha Cerrado, por el usuario: ' . $_SESSION['login'];
            $correos = GetConfiguraciones('mailsolmantovehiculos');
         }
         enviarmailattach(GetConfiguraciones('mailsistema'), 'Sistema de CRM', strtolower($correos), 'Varios', 'AVISO DE SOLICITUD A MANTENIMIENTO DE VEHICULOS', $msn, '', '');
         //enviarmail('crm@ibc.com.mx', strtolower($correos), 'Aviso de Solicitud de Informatica Requerida', $msn);
         $this->hfestatus->Value = 2;
      }
      dmconexion::Log($msg, $nivel);
   }

   function insertaridnotas()
   {
      #analisis
      if($this->manalisis->Text != '' && $this->hfidanalisis->Value == '0')
      {
         $sql = 'insert into notas (idprocedencia,procedencia,usuario,fecha,hora) values
                (' . $this->edidsolicitud->text . ',"Solicitud-Analisis","' . $_SESSION['login'] .
         '",curdate(),curtime())';
         $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql . ' ' . mysql_error());
         $this->hfidanalisis->Value = mysql_insert_id();
         if($this->manalisis->Tag == '1')
         {
            $sql2 = 'insert into notasdet(idnota,nota,usuario,fecha,hora) values(' . $this->hfidanalisis->value .
            ',"' . strtoupper(replacememo($this->manalisis->text)) . '","' . $_SESSION['login'] . '", curdate(),curtime())';
            $rs2 = mysql_query($sql2)or die('Error de Consulta SQL: ' . $sql2 . ' ' . mysql_error());
            $this->manalisis->Tag = 0;
         }
      }
      #correccion
      if($this->mcorreccion->Text != '' && $this->hfidcorreccion->Value == '0')
      {
         $sql = 'insert into notas (idprocedencia,procedencia,usuario,fecha,hora) values
                (' . $this->edidsolicitud->text . ',"Solicitud-Correccion","' . $_SESSION['login'] . '",curdate(),curtime())';
         $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql . ' ' . mysql_error());
         $this->hfidcorreccion->Value = mysql_insert_id();
         if($this->mcorreccion->Tag == '1')
         {
            $sql3 = 'insert into notasdet(idnota,nota,usuario,fecha,hora) values(' . $this->hfidcorreccion->value .
            ',"' . strtoupper(replacememo($this->mcorreccion->text)) . '","' . $_SESSION['login'] . '", curdate(),curtime())';
            $rs3 = mysql_query($sql3)or die('Error de Consulta SQL: ' . $sql3 . ' ' . mysql_error());
            $this->mcorreccion->Tag = 0;
         }
      }

   }

   function lbnotasClick($sender, $params)
   {
      if($this->hfestatus->value == '2')
      {
         dmconexion::Log("Acceso a las Notas de Solicitud de Informatica " . $this->edidsolicitud->Text . " " .
         $this->edoriginador->Text, 1);
         redirect("unotas.php?idnota=" . $this->hfidnota->Value . "&procedencia=solmantovehiculos" .
         "&idprocedencia=" . $this->edidsolicitud->Text);
      }
      else
         echo '<script language="javascript" type="text/javascript">
               alert("Primero debes Guardar la Solicitud de Informatica para agregar notas");
               </script>';
   }


   function alta()
   {
      $this->edidsolicitud->Text = MaxId('solmantovehiculos', 'idsolicitud') + 1;
      $this->cbestatus->ItemIndex = 109;
      $this->hfpath1->value = '';
      $this->hfpath2->value = '';
      $this->cbestatus->Enabled = false;
      $this->habilitar(1, true);
      $this->mdescripcion->Tag = 0;
      $this->manalisis->Tag = 0;
      $this->mcorreccion->Tag = 0;
      $this->hfclasificacion->value = 0;
   }

   function habilitar($nivel, $estado)
   {
      if($nivel == 1)
      {
         $this->cbestatus->Enabled = !$estado;
         $this->edoriginador->Enabled = $estado;
         $this->edvehiculo->Enabled = $estado;
         //$this->rgclasificacion->Enabled = $estado;
         //$this->cbproceso->Enabled = $estado;
         $this->mdescripcion->ReadOnly = !$estado;
         //$this->cbprocedimiento->Enabled = $estado;
         $this->cbresponsable->Enabled = $estado;
         //auditar
         $this->dtcompromiso->Enabled = !$estado;
         $this->chksolicita->Enabled = !$estado;
         $this->mcorreccion->ReadOnly = $estado;
         $this->manalisis->ReadOnly = $estado;
         $this->upload->Enabled = !$estado;
         $this->btnsubir->Enabled = !$estado;
      }
      if($nivel == 2)
      {
         $this->cbestatus->Enabled = $estado;
         $this->edoriginador->Enabled = $estado;
         $this->edvehiculo->Enabled = $estado;
         //$this->rgclasificacion->Enabled = $estado;
         //$this->cbproceso->Enabled = $estado;
         $this->mdescripcion->ReadOnly = !$estado;
         //$this->cbprocedimiento->Enabled = $estado;
         $this->cbresponsable->Enabled = $estado;
         //auditar
         $this->dtcompromiso->Enabled = $estado;
         $this->chksolicita->Enabled = $estado;
         $this->mcorreccion->ReadOnly = !$estado;
         $this->manalisis->ReadOnly = !$estado;
         $this->upload->Enabled = $estado;
         $this->btnsubir->Enabled = $estado;
         $this->lbnotas->Enabled = $estado;
      }
   }

   function locate()
   {
      $this->tbsolicitudes->close();
      $this->tbsolicitudes->writeFilter('idsolicitud=' . $this->edidsolicitud->text);
      $this->tbsolicitudes->refresh();
      $this->tbsolicitudes->open();
      $sql = 'select idusuario from usuarios where login="' . $_SESSION["login"] . '"';
      $rs = mysql_query($sql)or die('Error de consulta SQL:' . $sql . ' ' . mysql_error());
      $row = mysql_fetch_row($rs);
      $this->edfechacreacion->Text = $this->tbsolicitudes->fieldget('fechacreacion');
      $this->cbestatus->ItemIndex = $this->tbsolicitudes->fieldget('idestatus');
      $this->edoriginador->Text = $this->tbsolicitudes->fieldget('originador');
      $this->edvehiculo->Text = $this->tbsolicitudes->fieldget('vehiculo');
      $this->rgclasificacion->ItemIndex = $this->tbsolicitudes->fieldget('idclasificacion');
      $this->hfclasificacion->value = $this->tbsolicitudes->fieldget('idclasificacion');
      //$this->cbproceso->ItemIndex = $this->tbsolicitudes->fieldget('idproceso');
      //$this->cbprocedimiento->ItemIndex = $this->tbsolicitudes->fieldget('idprocedimiento');
      $this->cbresponsable->ItemIndex = $this->tbsolicitudes->fieldget('idresponsable');
      $this->chksolicita->Checked = $this->tbsolicitudes->fieldget('solicitacierre');
      $this->dtcompromiso->text = $this->tbsolicitudes->fieldget('fechacompromiso');
      $this->hfidproblema->Value = $this->tbsolicitudes->fieldget('idnotaproblema');
      $this->hfidanalisis->Value = $this->tbsolicitudes->fieldget('idnotaanalisis');
      $this->hfidcorreccion->Value = $this->tbsolicitudes->fieldget('idnotacorreccion');
      //$this->hfidsolicitud->Value = $this->tbsolicitudes->fieldget('idnotaaccion');
      $this->traernotasaccion($this->hfidproblema->Value, 1);
      $this->traernotasaccion($this->hfidanalisis->Value, 2);
      $this->traernotasaccion($this->hfidcorreccion->Value, 3);
      $this->traernotasaccion($this->hfidsolicitud->Value, 4);
      $this->hfidnota->Value = $this->tbsolicitudes->fieldget('idnota');
      $r = ufh('a');
      $sql = 'select ' . $r . ' as ufh from solmantovehiculos a where idsolicitud= ' . $this->edidsolicitud->text;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      $row = mysql_fetch_row($rs);
      $this->lbufh->Caption = $row[0];

      //adjuntos
      if(Derechos("ABRARMTOVE"))
      {
         //adjuntos
         $this->lbadjunto1->Link = 'Adjuntos/' . $this->tbsolicitudes->fieldget('path1');
         $this->lbadjunto1->Caption = $this->tbsolicitudes->fieldget('path1');
         $this->hfpath1->Value = $this->tbsolicitudes->fieldget('path1');
         if($this->tbsolicitudes->fieldget('path1') <> '')
            $this->lbeliminar1->Caption = 'Eliminar';

         $this->lbadjunto2->Link = 'Adjuntos/' . $this->tbsolicitudes->fieldget('path2');
         $this->lbadjunto2->Caption = $this->tbsolicitudes->fieldget('path2');
         $this->hfpath2->Value = $this->tbsolicitudes->fieldget('path2');
         if($this->tbsolicitudes->fieldget('path2') <> '')
            $this->lbeliminar2->Caption = 'Eliminar';
      }
      //notas
      $this->traernotas();

      if($this->cbestatus->ItemIndex == '109')//pendiente
      {
         $this->habilitar(1, false);
         $this->hfauditar->Value = 0;
         $this->memos();
      }
      else if($this->cbestatus->ItemIndex == '110')//en revision
      {
         if(Derechos('AUDMTOVE') == false)
         {
            $this->habilitar(2, false);
            $this->hfauditar->Value = 0;
            $this->memos();
         }
         else
         {
            $this->habilitar(2, true);
            $this->hfauditar->Value = 1;
            $this->memos();
         }
      }
      else
      {
         $this->habilitar(2, false);
         $this->hfauditar->Value = 0;
      }
   }

   function memos()
   {
      if($this->manalisis->Text == '')
      {
         $this->manalisis->ReadOnly = false;
         $this->manalisis->Tag = 1;
      }
      else
      {
         $this->manalisis->ReadOnly = true;
         $this->manalisis->Tag = 0;
      }

      if($this->mcorreccion->Text == '')
      {
         $this->mcorreccion->ReadOnly = false;
         $this->mcorreccion->tag = 1;
      }
      else
      {
         $this->mcorreccion->ReadOnly = true;
         $this->mcorreccion->tag = 0;
      }
   }

   function traernotas()
   {
      $sql = 'select idnota from solmantovehiculos where idsolicitud=' . $this->edidsolicitud->Text;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      $row = mysql_fetch_row($rs);
      if($row[0] > 0)
         $idnota = $row[0];
      else
      {
         $sql = 'select max(idnota)+1 as id from notas';
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
         $row = mysql_fetch_row($rs);
         $idnota = $row[0];
      }
      $this->sqlnotas->close();
      $r = ufh('n');
      $this->sqlnotas->SQL = 'select nota,' . str_replace("Modificado", "Elaborado ", $r) . ' as ufh ' .
      ' from notasdet n left join usuarios u on n.usuario=u.login ' .
      ' where idnota=' . $idnota . ' ORDER BY n.fecha desc,n.hora DESC';
      $this->sqlnotas->open();
      $colores[0] = "#ff5500";
      $colores[1] = "#004080";
      while(!$this->sqlnotas->EOF == true)
      {
         if(($this->sqlnotas->RecNo % 2) == 0)
            $c = 0;
         else
            $c = 1;
         $t .= '<br><strong>
              <font color=' . $colores[$c] . '>' . strtoupper($this->sqlnotas->fieldget('nota')) . '
              </font>
            </strong><br>';
         $t .= '<strong>
              <font color=' . $colores[$c] . '>' . $this->sqlnotas->fieldget('ufh') . '
              </font>
            </strong><br>';
         $this->sqlnotas->next();
      }
      $this->lbnotas->Caption = $t;
   }

   function traernotasaccion($idnota, $idmemo)
   {
      $r = ufh('n');
      $sql = 'select nota,' . str_replace("Modificado", "Elaborado ", $r) . ' as ufh ' .
      ' from notasdet n left join usuarios u on n.usuario=u.login ' .
      ' where idnota=' . $idnota . ' ORDER BY n.fecha,n.hora';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      while($row = mysql_fetch_array($rs))
      {
         if($idmemo == '1')
         {
            $this->mdescripcion->AddLine(strtoupper($row['nota']));
            $this->mdescripcion->AddLine($row['ufh']);
         }
         if($idmemo == '2')
         {
            $this->manalisis->AddLine(strtoupper($row['nota']));
            $this->manalisis->AddLine($row['ufh']);
         }

         if($idmemo == '3')
         {
            $this->mcorreccion->AddLine(strtoupper($row['nota']));
            $this->mcorreccion->AddLine($row['ufh']);
         }
      }
   }

   function inicializa()
   {
      //estatus
      $sql = 'select idclasificacion,nombre from clasificaciones where idtipo=18';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      while($row = mysql_fetch_array($rs))
         $this->cbestatus->AddItem($row['nombre'], null , $row['idclasificacion']);


      //responsables
      $sql = 'select u.idusuario,concat(if(u.nombre="","",u.nombre)," ",
          if(u.apaterno="","",u.apaterno)," ",if(u.amaterno="","",u.amaterno)) as nombre
          from usuarios u left join puestos p on p.idpuesto=u.idpuesto
          where p.responsablemanto=1';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . ' ' . mysql_error());
      $this->cbresponsable->Clear();
      $this->cbresponsable->AddItem('Sin Asignar', null , '-1');
      while($row = mysql_fetch_array($rs))
         $this->cbresponsable->AddItem($row['nombre'], null , $row['idusuario']);

      //fechacreacion
      $this->edfechacreacion->Text = Date('Y-m-d');

   }

   function Validar()
   {
      if($this->edoriginador->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el Originador de la Solicitud");
             </script>';
         return false;
      }

      if($this->edvehiculo->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el Vehiculo de la Solicitud");
             </script>';
         return false;
      }

      if($this->mdescripcion->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la Descripcion del Problema");
             </script>';
         return false;
      }

      if($this->cbresponsable->ItemIndex == - 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el Responsable de la Solicitud");
             </script>';
         return false;
      }

      return true;
   }

   function Limpiar()
   {
      reset($this->controls->items);
      while(list($key, $val) = each($this->controls->items))
      {
         if($val->inheritsFrom("Edit"))
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
      $this->dtcompromiso->Text = '';
      $this->lbnotas->Caption = '';
      $this->mdescripcion->Clear();
      $this->manalisis->Clear();
      $this->mcorreccion->Clear();
      $this->lbadjunto1->Caption = '';
      $this->lbadjunto2->caption = '';
      $this->lbeliminar1->caption = '';
      $this->lbeliminar2->Caption = '';
      $this->chksolicita->Checked = false;
      $this->lbufh->Caption = '';
   }
}

global $application;

global $usolmantovehiculos;

//Creates the form
$usolmantovehiculos = new usolmantovehiculos($application);

//Read from resource file
$usolmantovehiculos->loadResource(__FILE__);

//Shows the form
$usolmantovehiculos->show();

?>