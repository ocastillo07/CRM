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
class uresegnoref extends Page
{
   public $hfpath = null;
   public $btnsubir = null;
   public $lbeliminar = null;
   public $lbadjunto = null;
   public $upload = null;
   public $Label23 = null;
   public $edfletes = null;
   public $Label22 = null;
   public $Label21 = null;
   public $lbnotaseg = null;
   public $Label20 = null;
   public $hfidcontador = null;
   public $btnresponsable = null;
   public $edidresponsable = null;
   public $edresponsable = null;
   public $Label16 = null;
   public $btnconfiguracion = null;
   public $hfdetalle = null;
   public $cksurtido = null;
   public $edimporte = null;
   public $Label5 = null;
   public $dtestimada = null;
   public $edpapeleta = null;
   public $edhorarep = null;
   public $dtrecepcion = null;
   public $edguia = null;
   public $edvia = null;
   public $edproveedor = null;
   public $edocprt = null;
   public $Label19 = null;
   public $Label18 = null;
   public $Label17 = null;
   public $Label15 = null;
   public $Label13 = null;
   public $Label12 = null;
   public $Label11 = null;
   public $edpresupuesto = null;
   public $Label10 = null;
   public $btnrecibo = null;
   public $btnservicio = null;
   public $edfechacreacion = null;
   public $edprecio = null;
   public $eddescripcion = null;
   public $edparte = null;
   public $edcantidad = null;
   public $rgprocedencia = null;
   public $Label9 = null;
   public $Label8 = null;
   public $Label6 = null;
   public $hfidestatus = null;
   public $lbdetalle = null;
   public $btnagregar = null;
   public $Label33 = null;
   public $Label32 = null;
   public $Label31 = null;
   public $Label30 = null;
   public $edrecibo = null;
   public $edidservicio = null;
   public $Label3 = null;
   public $lbnotas = null;
   public $lblhistorial = null;
   public $hfidnota = null;
   public $hfestatus = null;
   public $lbufh = null;
   public $Label7 = null;
   public $Label4 = null;
   public $cbplaza = null;
   public $Label1 = null;
   public $edidsolicitud = null;
   public $Label2 = null;
   public $Label14 = null;
   public $cbestatus = null;
   public $pbotones = null;
   public $btnnuevo = null;
   public $lbtitulo = null;
   public $btnregresar = null;
   public $btnguardarcerrar = null;
   public $btnguardar = null;
   function lbeliminarClick($sender, $params)
   {
      if(Derechos('ELARCRESEGNOREF') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Eliminar el Archivo");
               </script>';
      }
      else
      {
         $path = GetConfiguraciones('PathOrdenesRef');
         $path = RightStr($path, strlen($path) - 1);
         unlink($path . $this->lbadjunto->Caption);
         $this->hfpath->Value = '';
         $sql = ' update resegnoref set orden="' . $this->hfpath->Value .
         '" where idsolicitud =' . $this->edidsolicitud->Text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->lbadjunto->Caption = '';
         $this->lbeliminar->Caption = '';
      }
   }

   function btnsubirClick($sender, $params)
   {
      if(Derechos('SUBRESEGNOREF') == false)
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
            $path = GetConfiguraciones('PathOrdenesRef');
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
                     $sql = ' update resegnoref set orden="' . $this->hfpath->Value .
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


   function edcantidadJSBlur($sender, $params)
   {

?>
   if(vcl.$('edcantidad').value != '' && vcl.$('edprecio').value != '')
      vcl.$('edimporte').value = vcl.$('edcantidad').value * vcl.$('edprecio').value;
   if(vcl.$('edfletes').value == '')
      vcl.$('edfletes').value = '0';
<?php

   }

   function edcantidadJSKeyPress($sender, $params)
   {

?>
   if( ValidaEntero(vcl.$('edcantidad').value, event) != event.keyCode)
        return false;
<?php

   }


   function edfletesJSKeyPress($sender, $params)
   {
?>
   if( ValidaDecimal(vcl.$('edfletes').value, event) != event.keyCode)
        return false;
<?php
   }


   function uresegnorefCreate($sender, $params)
   {
      $this->lbnotaseg->Caption = $this->GetConfigSeg('notaseg');


   }

   function lbnotasaClick($sender, $params)
   {
      if($this->hfestatus->Value == 1)
      {
         echo '<script language="javascript" type="text/javascript">
           alert("No puedes agregar notas sin guardar primero.");
           </script>';
         exit;
      }
      $this->guardar();

      if($this->hfidnotaa->Value > 0)
         redirect('unotas.php?idnota=' . $this->hfidnotaa->Value .
         '&procedencia=resegnoref&idprocedencia=' . $this->edidsolicitud->Text . '&tipo=asesor');
      else
         redirect('unotas.php?idnota=0&procedencia=resegnoref' .
         '&idprocedencia=' . $this->edidsolicitud->Text .
         '&idnom=idsolicitud&tipo=asesor');
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
         '&procedencia=resegnoref&idprocedencia=' . $this->edidsolicitud->Text . '&tipo=comprador');
      else
         redirect('unotas.php?idnota=0&procedencia=resegnoref' .
         '&idprocedencia=' . $this->edidsolicitud->Text .
         '&idnom=idsolicitud&tipo=comprador');
   }

   function edidresponsableJSBlur($sender, $params)
   {
?>
      basicAjax('uresegnoref_ajax.php', 'Responsable='+vcl.$('edidresponsable').value);
<?php
   }

   function btnresponsableClick($sender, $params)
   {
      redirect('uusuariosvista.php?pagina=uresegnoref.php&idarea=3&idplaza=' . $_SESSION['idplaza']);
   }


   function edprecioJSKeyPress($sender, $params)
   {

?>
   if( ValidaDecimal(vcl.$('edprecio').value, event) != event.keyCode)
        return false;
<?php

   }

   function edidresponsableJSKeyPress($sender, $params)
   {
?>
   if( ValidaEntero(vcl.$('edidresponsable').value, event) != event.keyCode)
        return false;
<?php
   }

   function btnconfiguracionClick($sender, $params)
   {
      redirect('uresegnoref_conf.php');
   }


   function rgprocedenciaClick($sender, $params)
   {
      if($this->rgprocedencia->ItemIndex == 0)
      {
         $this->edidservicio->Enabled = true;
         $this->btnservicio->Enabled = true;
         $this->edpresupuesto->Enabled = true;

         $this->edrecibo->Enabled = false;
         $this->btnrecibo->Enabled = false;
         $this->edrecibo->Text = '';

         $this->btnsubir->Enabled = false;
         $this->lbeliminar->Enabled = false;

      }
      else
      {
         $this->edidservicio->Enabled = false;
         $this->btnservicio->Enabled = false;
         $this->edpresupuesto->Enabled = false;
         $this->edidservicio->Text = '';
         $this->edpresupuesto->Text = '';

         $this->edrecibo->Enabled = true;
         $this->btnrecibo->Enabled = true;
         $this->btnsubir->Enabled = true;
         $this->lbeliminar->Enabled = true;

      }
   }

   function btnreciboClick($sender, $params)
   {
      redirect('urebusquedas.php?tabla=M');
   }

   function btnservicioClick($sender, $params)
   {
      redirect('urebusquedas.php?tabla=S');
   }

   function btnagregarJSClick($sender, $params)
   {
?>
    var surtido = 0;
    if(vcl.$('cksurtido').checked == true)
      surtido = 1;

   if(vcl.$('edcantidad').value == '' ||
      vcl.$('edparte').value == '' ||
      vcl.$('eddescripcion').value == '' ||
      vcl.$('edprecio').value == '' )
   {
      alert('Faltan datos');
   }
   else
   {

    if(isNaN(vcl.$('edcantidad').value) == true ||
       isNaN(vcl.$('edprecio').value) == true ||
       isNaN(vcl.$('edfletes').value) == true  )
    {
        alert('Datos incorrectors valores no numericos');
    }
    else

    basicAjax('uresegnoref_ajax.php', 'Agregar=1'+
                '&cveparte='+vcl.$('edparte').value+
                '&descripcion='+vcl.$('eddescripcion').value+
                '&cantidad='+vcl.$('edcantidad').value+
                '&precio='+vcl.$('edprecio').value+
                '&importe='+vcl.$('edimporte').value+
                '&fechaestimada='+vcl.$('dtestimada').value+
                '&surtido='+surtido+
                '&ocprt='+vcl.$('edocprt').value+
                '&proveedor='+vcl.$('edproveedor').value+
                '&viaembarque='+vcl.$('edvia').value+
                '&guia='+vcl.$('edguia').value+
                '&fletes='+vcl.$('edfletes').value+
                '&fecharecepcion='+vcl.$('dtrecepcion').value+
                '&horarecepcion='+vcl.$('edhorarep').value+
                '&papeleta='+vcl.$('edpapeleta').value+
                '&hfidestatus='+vcl.$('hfidestatus').value+
                '&detalle='+vcl.$('hfdetalle').value+
                '&hfidcontador='+vcl.$('hfidcontador').value);
    }
<?php
   }


   function uresegnorefJSLoad($sender, $params)
   {
?>
      validarEventos();
      var r = '';
      if(vcl.$('edidresponsable').value != '')
         r = '&Responsable='+vcl.$('edidresponsable').value;

      basicAjax('uresegnoref_ajax.php', 'Calcular=1&hfidestatus='+vcl.$('hfidestatus').value+r);
<?php
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('REALNOREF') == false)
         echo '<script language="javascript" type="text/javascript">
              alert("No puede dar de Alta Vacantes NC");
              </script>';
      else
         redirect("uresegnoref.php?idsolicitud=0");
   }

   function btnguardarcerrarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect('uresegnorefvista.php');
      }
   }

   function btnguardarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect('uresegnoref.php?idsolicitud=' . $this->edidsolicitud->text);
      }
   }

   function btnregresarClick($sender, $params)
   {
      redirect('uresegnorefvista.php');
   }

   function uresegnorefShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"] - 165;
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
               if(Derechos('REELNOREF') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                    alert("No Tienes el Derecho para Eliminar Seguimiento de No Refacciones");
                    window.location="uresegnorefvista.php";
                    </script>';
               }
               else
               {
                  $this->hfestatus->Value = 3;
                  $this->Locate();

                  $sql = 'Delete from resegnoref where idsolicitud = ' . $this->edidsolicitud->text;
                  $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

                  dmconexion::Log('Elimino el seguimiento ' . $this->edidsolicitud->text, 3);
                  redirect("uresegnorefvista.php");
               }
            }
         }
      }

      if(isset($_GET['idservicio']))
         $this->edidservicio->Text = $_GET['idservicio'];

      if(isset($_GET['idrecibo']))
         $this->edrecibo->Text = $_GET['idrecibo'];

      if(isset($_GET['idusr']))
         $this->edidresponsable->Text = $_GET['idusr'];

      if(isset($_GET['idprocedencia']))
      {
         $this->hfidnota->Value = $_GET['idnota'];
         $sql = 'update resegnoref set idnota=' . $_GET['idnota'] . ' where idsolicitud=' . $this->edidsolicitud->Text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->TraerNotas();
      }
   }

   function Alta()
   {
      $this->edidsolicitud->Text = MaxId('resegnoref', 'idsolicitud') + 1;
      $this->cbestatus->ItemIndex = 1;
      $this->hfidestatus->Value = 1;
      $this->cbestatus->Enabled = false;
      $this->habilitar(true);
      $this->rgprocedencia->ItemIndex = 0;

      $this->btnservicio->Enabled = true;
      $this->edrecibo->Enabled = false;
      $this->btnrecibo->Enabled = false;

      /* $sql = 'Select u.idusuario,  '.NombreFisica('u').' as nombre
      from usuarios u left join usuariosderechos ud on ud.idusuario=u.idusuario
      left join derechos d on d.idderecho=ud.idderecho
      where u.idplaza = '.$_SESSION['idplaza'].' and u.estatus = 1
      and d.llave = "RERESPNOREF" ';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);
      $this->edidresponsable->Text = $row['idusuario'];
      $this->edresponsable->Text = $row['nombre'];   */

      $_SESSION['tablasegref'] = array();
   }

   function Locate()
   {
      $sql = 'SELECT s.idsolicitud, s.idestatus, s.idnota, s.idplaza, s.fechacreacion,
              s.idoriginador, s.procedencia, s.idservicio, s.norecibo, s.idpresupuesto, s.orden,
              if(s.idresponsable=0, "", s.idresponsable) as idresponsable, s.fechacierre, ' . ufh('s') . ' as ufh
              from resegnoref s
              where s.idsolicitud = ' . $this->edidsolicitud->Text;

      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

      $row = mysql_fetch_array($rs);


      $this->cbestatus->ItemIndex = $row['idestatus'];
      $this->hfidestatus->Value = $row['idestatus'];
      $this->cbplaza->ItemIndex = $row['idplaza'];
      $this->edfechacreacion->Text = $row['fechacreacion'];
      $this->hfidnota->Value = $row['idnota'];
      $this->edidservicio->Text = $row['idservicio'];
      $this->edrecibo->Text = $row['norecibo'];
      $this->edpresupuesto->Text = $row['idpresupuesto'];
      $this->edidresponsable->Text = $row['idresponsable'];

      switch($row['procedencia'])
      {
         case 'S' :
            $this->rgprocedencia->ItemIndex = 0;
            break;
         case 'M' :
            $this->rgprocedencia->ItemIndex = 1;
            break;
      }

      switch($row['tipo'])
      {
         case 'N' :
            $this->rgtipo->ItemIndex = 0;
            break;
         case 'E' :
            $this->rgtipo->ItemIndex = 1;
            break;
         case 'F' :
            $this->rgtipo->ItemIndex = 2;
            break;
      }

      if($this->hfidestatus->value != 4 && $this->hfidestatus->value != 7)
         $this->Habilitar(true);
      else
         $this->Habilitar(false);

      $this->rgprocedenciaClick(nil, nil);

      $this->lbadjunto->Caption = $row['orden'];
      if(Derechos("ABRARCRESEGNORE"))
      {
         //adjuntos
         $path = GetConfiguraciones('PathOrdenesRef');
         $this->lbadjunto->Link = $path . $row['orden'];
         $this->hfpath->Value = $row['orden'];
         if($row['orden'] <> '')
            $this->lbeliminar->Caption = 'Eliminar';
      }

      $this->lbufh->Caption = $row['ufh'];
      $this->TraerNotas();
      $this->TraeDetalle();

   }

   function Guardar()
   {
      $ban = false;
      $_SESSION['surtidoemail'] = false;

      switch($this->rgprocedencia->ItemIndex)
      {
         case 0 :
            $rgprocedencia = 'S';
            break;
         case 1 :
            $rgprocedencia = 'M';
            break;
      }

      if($this->hfestatus->value == 1)
      {
         $sql = 'insert into resegnoref (idestatus, idnota, idplaza, fechacreacion,
              procedencia, idservicio, norecibo, idpresupuesto,
              idoriginador, usuario, fecha, hora) values
              (' . $this->cbestatus->ItemIndex . ', ' . $this->hfidnota->Value . ', ' . $this->cbplaza->ItemIndex . ', curdate(),
              "' . $rgprocedencia . '", "' . $this->edidservicio->Text . '",
              "' . $this->edrecibo->text . '", "' . $this->edpresupuesto->text . '",
              "' . $_SESSION["idusuario"] . '", "' . $_SESSION["login"] . '",curdate(),CURTIME())';
         $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
         $this->edidsolicitud->Text = mysql_insert_id();
         $msg = "Inserto el Seguimiento a No Refacciones No. " . $this->edidsolicitud->Text;
         $nivel = 1;
      }
      else
      {
         if(Derechos('REEDNOREF') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Seguimiento a No Refacciones");
                  window.location="uresegnorefvista.php";
                  </script>';
            $ban = false;
         }
         else
         {
            $this->hfestatus->Value = 2;
            $msg = "Modifico el Seguimiento a No Refacciones No. " . $this->edidsolicitud->Text;
            $nivel = 2;

            $sql = 'update resegnoref set idestatus=' . $this->cbestatus->ItemIndex . ',
                    idnota=' . $this->hfidnota->Value . ', idplaza=' . $this->cbplaza->ItemIndex . ',
                    procedencia="' . $rgprocedencia . '",  idpresupuesto="' . $this->edpresupuesto->text . '",
                    idservicio="' . $this->edidservicio->Text . '", norecibo="' . $this->edrecibo->text . '",
                    orden= "' . $this->lbadjunto->Caption . '", idresponsable="' . $this->edidresponsable->Text . '",
                    usuario="' . $_SESSION["login"] . '", fecha=curdate(), hora=CURTIME()
                    where idsolicitud = ' . $this->edidsolicitud->Text;
            $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());

         }
      }

      if($this->cbestatus->ItemIndex == 4 || $this->cbestatus->ItemIndex == 7)
      {
         $sql = 'update resegnoref set fechacierre=CURDATE()
                where idsolicitud = ' . $this->edidsolicitud->Text . ' and fechacierre="0000-00-00"';
         $sql = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
      }


      switch($this->rgprocedencia->ItemIndex)
      {
         case 0 :
            $rgprocedencia = 'SERVICIO';
            $ts = 's';
            break;
         case 1 :
            $rgprocedencia = 'MOSTRADOR';
            $ts = 'm';
            break;
      }

      $sql = 'Select lower(iniciales) as iniciales from plazas where idplaza=' . $_SESSION['idplaza'];
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);
      $plz = $row['iniciales'];

      #MAIL PROCESO
      if($this->hfidestatus->value == 1 && $this->cbestatus->ItemIndex == 2)
      {
         $msn = 'Se creo Solicitud No. ' . $this->edidsolicitud->Text . '.' . chr(13) .
         'En PROCESO que solicita Autorizacion [' . $rgprocedencia . ']';

         $correos = $this->GetConfigSeg('correoproceso' . $ts . $plz);
         $mailsistema = GetConfiguraciones('mailsistema');
         $titulo = 'Se creo Solicitud No. ' . $this->edidsolicitud->Text . '.' .
         'En PROCESO que solicita Autorizacion';
         enviarmailattach($mailsistema, 'Sistema de CRM', $mailsistema . ',' . $correos, 'Varios', $titulo, $msn, '', '');
      }

      #MAIL AUTORIZADA
      if($this->hfidestatus->value == 2 && $this->cbestatus->ItemIndex == 3)
      {
         $msn = 'Se creo Solicitud No. ' . $this->edidsolicitud->Text . '.' . chr(13) .
         'AUTORIZADA que solicita a Compra [' . $rgprocedencia . ']';

         $sql = 'select email from usuarios where idusuario=' . $this->edidresponsable->Text;
         $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         $row = mysql_fetch_array($rs);

         $correos = $row['email'];
         $m = $this->GetConfigSeg('correoautorizar' . $ts . $plz);
         if($m != '')
            $correos .= ',' . $m;

         $mailsistema = GetConfiguraciones('mailsistema');
         $titulo = 'Se creo Solicitud No. ' . $this->edidsolicitud->Text . '.' .
         'AUTORIZADA que solicita a Compra';
         enviarmailattach($mailsistema, 'Sistema de CRM', $mailsistema . ',' . $correos, 'Varios', $titulo, $msn, '', '');
      }

      if($this->hfidestatus->value == 3 || $this->hfidestatus->value == 5)
      {
         #MAIL EN COMPRA
         if($this->hfidestatus->value == 3 && $this->cbestatus->ItemIndex == 5)
         {
            $msn = 'La Solicitud No. ' . $this->edidsolicitud->Text . '.' . chr(13) .
            'Se encuentra EN COMPRA  [' . $rgprocedencia . ']';

            $correos = $this->GetConfigSeg('correoencompra' . $ts . $plz);
            $mailsistema = GetConfiguraciones('mailsistema');
            $titulo = 'La Solicitud No. ' . $this->edidsolicitud->Text . '.' .
            'Se encuentra EN COMPRA';
            enviarmailattach($mailsistema, 'Sistema de CRM', $correos, 'Varios', $titulo, $msn, '', '');
         }

         #MAIL SURTIDO PARCIAL
         if($_SESSION['surtidoemail'] == true)
         {
            $msn = 'De la solicitud No. ' . $this->edidsolicitud->Text . '.' . chr(13) .
            'Se solicita pase por refaccion indicada como recibida en la solicitud [' . $rgprocedencia . ']';

            $correos = $this->GetConfigSeg('correosurtido' . $ts . $plz);

            $sql = 'select email from usuarios where idusuario=' . $_SESSION['idusuario'];
            $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
            $row = mysql_fetch_array($rs);
            $correos .= ',' . $row['email'];

            $mailsistema = GetConfiguraciones('mailsistema');
            $titulo = 'De la solicitud No. ' . $this->edidsolicitud->Text . '.' .
            'Se solicita pase por refaccion indicada como recibida en la solicitud';
            enviarmailattach($mailsistema, 'Sistema de CRM', $correos, 'Varios', $titulo, $msn, '', '');
         }
      }

      #MAIL SURTIDO
      if($this->hfidestatus->value == 5 && $this->cbestatus->ItemIndex == 6)
      {
         $msn = 'Se ha surtido en Almacen por completo, favor de pasar a firmar papeleta/prefactura' . chr(13) .
         'No. ' . $this->edidsolicitud->Text . ' [' . $rgprocedencia . ']';

         $correos = $this->GetConfigSeg('correosurtidocomp' . $ts . $plz);
         $mailsistema = GetConfiguraciones('mailsistema');
         $titulo = 'Se ha surtido en Almacen por completo, favor de pasar a firmar papeleta/prefactura';
         enviarmailattach($mailsistema, 'Sistema de CRM', $correos, 'Varios', $titulo, $msn, '', '');
      }

      #MAIL CERRADO
      if($this->hfidestatus->value == 6 && $this->cbestatus->ItemIndex == 7)
      {
         $msn = 'Se ha CERRADO solicitud No. ' . $this->edidsolicitud->Text . ' [' . $rgprocedencia . ']';

         $correos = $this->GetConfigSeg('correocerrado' . $ts . $plz);
         $mailsistema = GetConfiguraciones('mailsistema');
         $titulo = 'Se ha CERRADO solicitud No. ' . $this->edidsolicitud->Text;
         enviarmailattach($mailsistema, 'Sistema de CRM', $correos, 'Varios', $titulo, $msn, '', '');
      }


      dmconexion::Log($msg, $nivel);
      $this->GuardarDetalle();
   }

   function Validar()
   {
      if($this->hfidestatus->value == 7 || $this->hfidestatus->value == 4)
      {
         echo '<script language="javascript" type="text/javascript">
                 alert("Ya se encuentra cerrado");
                 </script>';
         return false;
      }

      //validar estatus orden
      if($this->hfidestatus->value == 1 && $this->cbestatus->ItemIndex > 2)
      {
           echo '<script language="javascript" type="text/javascript">
                 alert("No se puede usar este estatus");
                 </script>';
            return false;
      }

      if($this->hfidestatus->value == 2 &&
        ( $this->cbestatus->ItemIndex == 1 || $this->cbestatus->ItemIndex > 4))
      {
           echo '<script language="javascript" type="text/javascript">
                 alert("No se puede usar este estatus");
                 </script>';
            return false;
      }

      if($this->hfidestatus->value == 3 &&
        ( $this->cbestatus->ItemIndex < 3 || $this->cbestatus->ItemIndex == 4 ||
          $this->cbestatus->ItemIndex > 5))
      {
           echo '<script language="javascript" type="text/javascript">
                 alert("No se puede usar este estatus");
                 </script>';
            return false;
      }

      if($this->hfidestatus->value == 5 &&
        ( $this->cbestatus->ItemIndex < 5 || $this->cbestatus->ItemIndex > 6))
      {
           echo '<script language="javascript" type="text/javascript">
                 alert("No se puede usar este estatus");
                 </script>';
            return false;
      }

      if($this->hfidestatus->value == 6 && $this->cbestatus->ItemIndex < 6 )
      {
           echo '<script language="javascript" type="text/javascript">
                 alert("No se puede usar este estatus");
                 </script>';
            return false;
      }

      //fin validar orden estatus

      if($this->hfidestatus->value == 1)
      {
         if($this->rgprocedencia->ItemIndex == - 1)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("Falta la procedencia");
                 </script>';
            return false;
         }


         $tt = count($_SESSION['tablasegref']);
         if($tt == 0)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("No se han agregado refacciones");
                 </script>';
            return false;
         }

      }

      if($this->cbestatus->ItemIndex > 2)
      {

         if($this->hfidestatus->value == 1)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("Solo puedes poner en Proceso");
                 </script>';
            return false;
         }

         //SOLICITAR
         if($this->hfidestatus->value == 1 && $this->cbestatus->ItemIndex == 2)
         {
            if(Derechos('REPROMNOREF') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                 alert("No tiene derechos para Solicitar Seguimiento a No Refacciones");
                 </script>';
               return false;
            }

            if($this->edidresponsable->Text == '')
            {
               echo '<script language="javascript" type="text/javascript">
                 alert("No se ha registrado el Responsable de la compra");
                 </script>';
               return false;
            }
         }

         //PROCESO
         if($this->hfidestatus->value == 2 &&
         ($this->cbestatus->ItemIndex == 3 || $this->cbestatus->ItemIndex == 4))
         {
            if(Derechos('REAUTNOREF') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                 alert("No tiene derechos para Solicitar a Compra o Rechazar Seguimiento a No Refacciones");
                 </script>';

              return false;
            }

            if($this->edidresponsable->Text == '' )
            {
               echo '<script language="javascript" type="text/javascript">
                 alert("No se ha registrado el Responsable de la compra");
                 </script>';
               return false;
            }
         }

         //PONER EN COMPRA
         if($this->hfidestatus->value == 3 && $this->cbestatus->ItemIndex == 5)
         {
            if(Derechos('RERESPNOREF') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                 alert("No tiene derechos para ser Responsable de compra en Seguimiento a No Refacciones");
                 </script>';
               return false;
            }

            $tabla = $_SESSION['tablasegref'];
            $tt = count($tabla) - 1;
            for($i = 0; $i <= $tt; $i++)
            {
               if($tabla[$i]['fechaestimada'] == '')
               {
                  echo '<script language="javascript" type="text/javascript">
                 alert("No se tienen las fecha estimada de recepcion completas");
                 </script>';
                  return false;
               }

               if($tabla[$i]['proveedor'] == '')
               {
                  echo '<script language="javascript" type="text/javascript">
                 alert("No se tienen los proveedor completos");
                 </script>';
                  return false;
               }

               if($tabla[$i]['ocprt'] == '')
               {
                  echo '<script language="javascript" type="text/javascript">
                 alert("No se tienen los OC/PRT completos");
                 </script>';
                  return false;
               }

                if($tabla[$i]['viaembarque'] == '')
               {
               echo '<script language="javascript" type="text/javascript">
               alert("No se tienen completos la via de embarque");
               </script>';
               return false;
               }
            }
         }

         //SURTIDO EN ALMACEN
         if($this->hfidestatus->value == 5 && $this->cbestatus->ItemIndex == 6)
         {
            if(Derechos('REJEFALMNOREF') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                 alert("No tiene derechos para Recibir en Seguimiento a No Refacciones");
                 </script>';
               return false;
            }

            $tabla = $_SESSION['tablasegref'];
            $tt = count($tabla) - 1;
            for($i = 0; $i <= $tt; $i++)
            {
               if($tabla[$i]['surtido'] == '0')
               {
                  echo '<script language="javascript" type="text/javascript">
                 alert("No se tiene surtido completamente");
                 </script>';
                  return false;
               }

               if($tabla[$i]['surtido'] == '1' && ($tabla[$i]['fecharecepcion'] == '' || $tabla[$i]['horarecepcion'] == '' ||
               $tabla[$i]['horarecepcion'] == '00:00:00' || $tabla[$i]['horarecepcion'] == '00:00'))
               {
                  echo '<script language="javascript" type="text/javascript">
                 alert("No se tienen las fechas y horas de los surtidos");
                 </script>';
                  return false;
               }
            }
         }
      }


      if($this->hfidestatus->value == 6 && $this->cbestatus->ItemIndex == 7)
      {
         $tabla = $_SESSION['tablasegref'];
         $tt = count($tabla) - 1;
         for($i = 0; $i <= $tt; $i++)
         {
            if($tabla[$i]['papeleta'] == '')
            {
               echo '<script language="javascript" type="text/javascript">
                 alert("No se tienen todas las papeletas");
                 </script>';
               return false;
            }
         }
      }

      if($this->rgprocedencia->ItemIndex == - 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la procedencia");
             </script>';
         return false;
      }

      if($this->rgprocedencia->ItemIndex == 0 && $this->edidservicio->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan el Numero de Servicio");
             </script>';
         return false;
      }

      if($this->rgprocedencia->ItemIndex == 1 && ($this->edrecibo->Text == '' && $this->lbadjunto->Caption == ''))
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Faltan el Numero de Recibo o Numero de Orden de Compra");
             </script>';
         return false;
      }

      return true;
   }

   function Habilitar($hab)
   {
      $this->cbestatus->Enabled = $hab;

      //Derechos de Solicitar  Seguimiento No Refacciones (Prom. Ref/ Ases. Ser)

      if(Derechos('REPROMNOREF') == true)
         $hab2 = $hab;
      else
         $hab2 = false;

      $this->rgprocedencia->Enabled = $hab2;
      $this->edidservicio->Enabled = $hab2;
      $this->edrecibo->Enabled = $hab2;
      $this->btnsubir->Enabled = $hab2;
      $this->lbeliminar->Enabled = $hab2;
      $this->edpresupuesto->Enabled = $hab2;

      //Autoriza
      if(Derechos('REAUTNOREF') == true)
         $hab2 = $hab;
      else
         $hab2 = false;

      $this->edidresponsable->Enabled = $hab2;
      $this->btnresponsable->Enabled = $hab2;

      //solicita
      if($this->hfidestatus->Value == 1)
         $hab2 = $hab;
      else
         $hab2 = false;

      if(Derechos('REPROMNOREF') == true)
         $hab2 = $hab;
      else
         $hab2 = false;

      $this->edcantidad->Enabled = $hab2;
      $this->edparte->Enabled = $hab2;
      $this->eddescripcion->Enabled = $hab2;
      $this->edprecio->Enabled = $hab2;
      $this->edimporte->Enabled = $hab2;
      $this->edfletes->Enabled = $hab2;

      //Responsable de Compra en  Seguimiento No Refacciones
      if(Derechos('RERESPNOREF') == true)
         $hab2 = $hab;
      else
         $hab2 = false;

      $this->dtestimada->Enabled = $hab2;
      $this->edocprt->Enabled = $hab2;
      $this->edproveedor->Enabled = $hab2;
      $this->edvia->Enabled = $hab2;
      $this->edguia->Enabled = $hab2;


      //Recepcion en  Seguimiento No Refacciones
      if(Derechos('REJEFALMNOREF') == true)
         $hab2 = $hab;
      else
         $hab2 = false;

      $this->cksurtido->Enabled = $hab2;
      $this->dtrecepcion->Enabled = $hab2;
      $this->edhorarep->Enabled = $hab2;
      $this->edpapeleta->Enabled = $hab2;


      if($this->hfidestatus->value == 4 && $this->hfidestatus->value == 7)
         $this->cbestatus->Enabled = false;
      else
         $this->cbestatus->Enabled = true;
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
      $sql = 'select idestatus, nombre from resegnoref_estatus';
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

         if($val->inheritsFrom("CheckBox"))
         {
            $val->checked = false;
         }
      }
      $this->lbufh->Caption = '';
      $this->lblhistorial->Caption = '';
      $this->lbadjunto->Caption = '';
      $this->lbadjunto->Link = '';
      $this->lbeliminar->Caption = '';
   }

   function TraeDetalle()
   {
      $rsm = "SELECT d.idcontador, d.idsolicitud, d.cveparte, d.descripcion, d.cantidad,
              d.precio, d.importe, d.fechaestimada, d.surtido, d.ocprt, d.proveedor,
              d.viaembarque, d.guia, d.fletes, d.fecharecepcion, d.horarecepcion, d.papeleta
              from resegnorefdet d
             where idsolicitud ='" . $this->edidsolicitud->Text . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $i = 0;
      $tabla = array();
      while($row = mysql_fetch_array($r))
      {
         if($row['fechaestimada'] == '0000-00-00')
            $fechaestimada = '';
         else
            $fechaestimada = $row['fechaestimada'];

         if($row['fecharecepcion'] == '0000-00-00')
            $fecharecepcion = '';
         else
            $fecharecepcion = $row['fecharecepcion'];


         $tabla[$i] = array('idcontador' => $i,
                            'cveparte' => $row['cveparte'],
                            'descripcion' => $row['descripcion'],
                            'cantidad' => $row['cantidad'],
                            'precio' => $row['precio'],
                            'importe' => $row['importe'],
                            'fechaestimada' => $fechaestimada,
                            'surtido' => $row['surtido'],
                            'ocprt' => $row['ocprt'],
                            'proveedor' => $row['proveedor'],
                            'viaembarque' => $row['viaembarque'],
                            'guia' => $row['guia'],
                            'fletes' => $row['fletes'],
                            'fecharecepcion' => $fecharecepcion,
                            'horarecepcion' => $row['horarecepcion'],
                            'papeleta' => $row['papeleta']
                            );
         $i++;
      }
      $_SESSION['tablasegref'] = array();
      $_SESSION['tablasegref'] = $tabla;
   }

   function GuardarDetalle()
   {
      $tabla = $_SESSION['tablasegref'];
      $t = count($tabla) - 1;
      if($this->hfestatus->Value == '1')
      {
         for($i = 0; $i <= $t; $i++)
            $this->BDAgregar($i);
      }
      else
      {
         $rsm = "SELECT idcontador, cveparte FROM resegnorefdet where idsolicitud ='" . $this->edidsolicitud->Text . "'";
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

         while($row = mysql_fetch_array($r))
         {
            $ban = false;
            for($i = 0; $i <= $t; $i++)
            {
               if($row['cveparte'] == $tabla[$i]['cveparte'])
                  $ban = true;
            }
            if($ban == false)
               $this->BDDelRow($row['idcontador']);

         }

         for($i = 0; $i <= $t; $i++)
         {
            $rsm = "SELECT idcontador, cveparte, descripcion, precio
                    FROM resegnorefdet where idsolicitud ='" . $this->edidsolicitud->Text . "'
                    and cveparte='" . $tabla[$i]['cveparte'] . "'";
            $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
            if(mysql_num_rows($r) == 0)
               $this->BDAgregar($i);
            else
            {
               $row = mysql_fetch_array($r);
               if(!($row['cveparte'] == $tabla[$i]['cveparte'] ||
               $row['descripcion'] == $tabla[$i]['descripcion'] ||
               $row['precio'] == $tabla[$i]['precio']
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
      $tabla = $_SESSION['tablasegref'];

      //inserta el detalle
      $rsm = "Insert into resegnorefdet ( idsolicitud, cveparte, cantidad, descripcion,
              precio, importe, fechaestimada, surtido, ocprt, proveedor,
              viaembarque, guia, fletes, fecharecepcion, horarecepcion, papeleta,
              usuario, fecha, hora)
              values ('" . $this->edidsolicitud->Text . "', '" . replacememo($tabla[$i]['cveparte']) . "',
              '" . $tabla[$i]['cantidad'] . "',  '" . replacememo($tabla[$i]['descripcion']) . "',
              '" . $tabla[$i]['precio'] . "',  '" . $tabla[$i]['importe'] . "',
              '" . $tabla[$i]['fechaestimada'] . "',  '" . $tabla[$i]['surtido'] . "',
              '" . replacememo($tabla[$i]['ocprt']) . "',  '" . replacememo($tabla[$i]['proveedor']) . "',
              '" . replacememo($tabla[$i]['viaembarque']) . "',  '" . $tabla[$i]['guia'] . "', '" . $tabla[$i]['fletes'] . "',
              '" . $tabla[$i]['fecharecepcion'] . "',  '" . $tabla[$i]['horarecepcion'] . "',
              '" . $tabla[$i]['papeleta'] . "',
              '" . $_SESSION['login'] . "', curdate(), curtime())";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      dmconexion::Log('Inserto en el Seguimiento No Refacciones [' . $tabla[$i]['cveparte'] . '] ' . replacememo($tabla[$i]['descripcion']) . ' . ', 2);
   }

   function BDEditRow($row, $i)
   {
      $tabla = $_SESSION['tablasegref'];

      //Revisar si recibio para mandar email
      $sql = 'Select surtido from resegnorefdet where idcontador=' . $row;
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $rw = mysql_fetch_array($rs);
      if($rw['surtido'] != $tabla[$i]['surtido'] && $tabla[$i]['surtido'] == '1')
         $_SESSION['surtidoemail'] = true;


      //inserta el detalle
      $rsm = "Update resegnorefdet set cveparte='" . $tabla[$i]['cveparte'] . "',
              cantidad='" . $tabla[$i]['cantidad'] . "', descripcion='" . replacememo($tabla[$i]['descripcion']) . "',
              precio='" . $tabla[$i]['precio'] . "', importe='" . $tabla[$i]['importe'] . "',
              fechaestimada='" . $tabla[$i]['fechaestimada'] . "', surtido='" . $tabla[$i]['surtido'] . "',
              ocprt='" . $tabla[$i]['ocprt'] . "', proveedor='" . $tabla[$i]['proveedor'] . "',
              viaembarque='" . $tabla[$i]['viaembarque'] . "', guia='" . $tabla[$i]['guia'] . "',
              fecharecepcion='" . $tabla[$i]['fecharecepcion'] . "', horarecepcion='" . $tabla[$i]['horarecepcion'] . "',
              papeleta='" . $tabla[$i]['papeleta'] . "', fletes='" . $tabla[$i]['fletes'] . "',
              usuario='" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
              where idcontador=" . $row;
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      dmconexion::Log('Edito en el Seguimiento No Refacciones [' . $tabla[$i]['cveparte'] . '] ' . replacememo($tabla[$i]['descripcion']) . ' . ', 2);
   }

   function BDDelRow($idcontador)
   {
      $rsm = "SELECT idsolicitud, cveparte, cantidad,
              precio, importe, fechaestimada, surtido
              from resegnorefdet where idcontador ='" . $idcontador . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $row = mysql_fetch_array($r);

      dmconexion::Log('Elimino en el Seguimiento No Refacciones ' . $this->edidsolicitud->Text . ' la parte [' . $tabla[$i]['cveparte'] . '] ' . replacememo($tabla[$i]['descripcion']) . ' ', 3);

      $rsm = "Delete from resegnorefdet where idcontador ='" . $idcontador . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
   }

   function GetConfigSeg($concepto)
   {
      $rsm = mysql_query("select valor from resegnorefconf where concepto = '" . $concepto . "'");
      $row = mysql_fetch_row($rsm);
      return $row[0];
   }

   function TraerNotas()
   {
      $sql = 'select idnota from resegnoref where idsolicitud=' . $this->edidsolicitud->Text;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      if($row[0] > 0)
         $idnota = $row[0];
      else
         $idnota = MaxId('notas', 'idnota') + 1;

      $sql = 'select nota, concat(' . str_replace("Modificado", "Elaborado ", ufh('n')) . ',
             " con el  puesto ", p.nombre, " del area ", a.nombre) as ufh
             from notasdet n left join usuarios u on n.usuario=u.login
             left join puestos p on p.idpuesto=u.idpuesto
             left join areas a on a.idarea=u.idarea
             where idnota=' . $idnota . ' ORDER BY n.fecha desc,n.hora DESC';
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

global $uresegnoref;

//Creates the form
$uresegnoref = new uresegnoref($application);

//Read from resource file
$uresegnoref->loadResource(__FILE__);

//Shows the form
$uresegnoref->show();

?>