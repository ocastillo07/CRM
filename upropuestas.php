<script type='text/javascript' src='funciones.js'></script>
<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");

require_once("vcl/vcl.inc.php");
//Includes

use_unit("menus.inc.php");
use_unit("comctrls.inc.php");
use_unit("mysql.inc.php");
use_unit("dbgrids.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class upropuestas extends Page
{
   public $cbmonapertura = null;
   public $edcostoapertura = null;
   public $Label11 = null;
   public $Label10 = null;
   public $ulcalculo = null;
   public $lbelimcalculo = null;
   public $lbadjcalc = null;
   public $btncalculo = null;
   public $hfpathcalculo = null;
   public $Label3 = null;
   public $ednotasestatus = null;
   public $lbnotasestatus = null;
   public $cbubicacion = null;
   public $cbllantas = null;
   public $Label8 = null;
   public $Label7 = null;
   public $lbrenta = null;
   public $hfpathratinglife = null;
   public $hfpathrating = null;
   public $ednotas = null;
   public $lbelimlife = null;
   public $lbelimrating = null;
   public $lbadjlife = null;
   public $lbadjrating = null;
   public $btnlife = null;
   public $ullife = null;
   public $btnrating = null;
   public $ulrating = null;
   public $cbmoncosto = null;
   public $edcosto = null;
   public $edrecorrido = null;
   public $cbmonrenta = null;
   public $edrenta = null;
   public $edplazo = null;
   public $edatencion = null;
   public $edvehiculo = null;
   public $btnbuscarcliente = null;
   public $edidcliente = null;
   public $cbtipopropuesta = null;
   public $edcreacion = null;
   public $cbestatus = null;
   public $edidpropuesta = null;
   public $Label9 = null;
   public $Label28 = null;
   public $Label25 = null;
   public $Label24 = null;
   public $Label21 = null;
   public $Label20 = null;
   public $Label16 = null;
   public $Label26 = null;
   public $Label14 = null;
   public $edcliente = null;
   public $Label4 = null;
   public $Cliente = null;
   public $Label27 = null;
   public $edvendedor = null;
   public $Label1 = null;
   public $Label32 = null;
   public $Label29 = null;
   public $edplaza = null;
   public $Label6 = null;
   public $edrevision = null;
   public $Label5 = null;
   public $idproprta = null;
   public $hfestatus = null;
   public $lbtitulo = null;
   public $btnimprimir = null;
   public $hfemail = null;
   public $btnmail = null;
   public $pbotones = null;
   public $btnregresar = null;
   public $btnactivar = null;
   public $dspropuestas = null;
   public $tbpropuestas = null;
   public $btnGuardarcerrar = null;
   public $btnGuardar = null;
   public $Label2 = null;


   function edrecorridoJSKeyPress($sender, $params)
   {

?>
   if( ValidaDecimal(document.getElementById('edrecorrido').value, event) != event.keyCode)
      return false;

<?php

   }

   function cbtipopropuestaJSChange($sender, $params)
   {
?>
   basicAjax('upropuestas_ajax.php', 'HabilitaXTipo='+vcl.$('cbtipopropuesta').value);
<?php
   }


   function edidclienteJSBlur($sender, $params)
   {
?>
    basicAjax('upropuestas_ajax.php', 'TraeCliente='+vcl.$('edidcliente').value);
<?php
   }

   function edcostoJSKeyPress($sender, $params)
   {
?>
      if( ValidaDecimal(document.getElementById('edcosto').value, event) != event.keyCode)
        return false;
<?php
   }

   function edrentaJSKeyPress($sender, $params)
   {
?>
    if( ValidaDecimal(document.getElementById('edrenta').value, event) != event.keyCode)
      return false;
<?php
   }

   function edplazoJSKeyPress($sender, $params)
   {
?>
    if( ValidaEntero(document.getElementById('edplazo').value, event) != event.keyCode)
      return false;
<?php
   }


   function btnbuscarclienteClick($sender, $params)
   {
      redirect("uclientesvista.php?pagina=upropuestas.php");
   }

   function btnmailClick($sender, $params)
   {
      if($this->hfemail->Value == NULL || $this->hfemail->Value == '')
      {
         echo '<script language="javascript" type="text/javascript">
               alert(\'El Cliente No tiene Capturado el Correo!\');
               </script>';
      }
      else
      {
         echo '<script language="javascript" type="text/javascript">
			 		     window.open("http://' . GetConfiguraciones('ipserver') . ':8080/imprimirpdf.jsp?"+
					     "reporte=propuestas&idpropuesta=' . $this->edidpropuesta->Text . '&idrevision=' .
         $this->edrevision->text . '", "_blank");
					     var largo = 768;
					     var altura = 520;
					     var top = (screen.height-altura)/2;
					     var izquierda = (screen.width-largo)/2;
					     window.open("ucorreo.php?name=' . $this->edvendedor->Text .
         '&to=' . $this->hfemail->Value . '&' . 'subject=Propuesta de Camiones Idealease&attach=propuestas' .
         $this->edidpropuesta->Text . '.pdf", "_blank",
					     "resizable=no,menubar=no,titlebar=yes,width="+largo+",height="+altura+",top="+top+",left="+izquierda);
               </script>';
      }
   }

   function lbelimratingClick($sender, $params)
   {
      if(Derechos('Eliminar Archivo Rating') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Eliminar el Archivo");
               </script>';
      }
      else
      {
         unlink('Adjuntos/' . $this->lbadjrating->Caption);
         $this->hfpathrating->Value = '';
         $sql = ' update idlpropuestas set pathrating="' . $this->hfpathrating->Value .
         '" where idpropuesta =' . $this->edidpropuesta->Text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->lbadjrating->Caption = '';
         $this->lbelimrating->Caption = '';
      }
   }

   function btnratingClick($sender, $params)
   {
      if(Derechos('Subir Archivo Rating') == false)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("No Tienes Derechos para Adjuntar el Archivo");
              </script>';
      }
      else
      {
         if($this->edidpropuesta->tag == 1)
         {
            echo '<script language="javascript" type="text/javascript">
              	 alert(\' Debes Guardar Los Datos Antes de Subir el Archivo \');
           		   </script>';

         }
         else
         {
            $path = GetConfiguraciones('Pathadjuntos');

            if((tipoarchivo($_FILES["ulrating"]["type"], 1) == true)
            && ($_FILES["ulrating"]["size"] < GetConfiguraciones('ArchivosSize')))//10 megas
            {
               if($_FILES["ulrating"]["error"] > 0)
               {
                  echo '<script language="javascript" type="text/javascript">
                  		     alert(\'Error al subir Archivo: ' . $_FILES["ulrating"]["error"] . '\');
                     		</script>';
               }
               else
               {
                  if(file_exists($path . $_FILES["ulrating"]["name"]))
                  {
                     echo '<script language="javascript" type="text/javascript">
                    	 alert(\' El Archivo ya existe: ' . $_FILES["ulrating"]["name"] . '\');
                     	 </script>';
                  }
                  else
                  {
                     move_uploaded_file($_FILES["ulrating"]["tmp_name"],
                     $_SERVER['DOCUMENT_ROOT'] . $path . replace($_FILES["ulrating"]["name"]));


                     $this->lbadjrating->Caption = replace($_FILES["ulrating"]["name"]);
                     $this->lbadjrating->Link = "Adjuntos/" . replace($_FILES["ulrating"]["name"]);
                     $this->hfpathrating->Value = replace($_FILES['ulrating']['name']);
                     $sql = ' update idlpropuestas set pathrating="' . $this->hfpathrating->Value .
                     '" where idpropuesta =' . $this->edidpropuesta->Text;
                     $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
                     $this->lbelimrating->Caption = 'Eliminar';

                     echo '<script language="javascript" type="text/javascript">
                         		 alert(\'Archivo Guardado: ' . replace($_FILES["ulrating"]["name"]) . '\');
                        		</script>';
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

   function lbelimlifeClick($sender, $params)
   {
      if(Derechos('Eliminar Archivo LifeCycle') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Eliminar el Archivo");
               </script>';
      }
      else
      {
         unlink('Adjuntos/' . $this->lbelimlife->Caption);
         $this->hfpathlife->Value = '';
         $sql = ' update idlpropuestas set pathlife="' . $this->hfpathlife->Value .
         '" where idpropuesta =' . $this->edidpropuesta->Text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->lbadjlife->Caption = '';
         $this->lbelimlife->Caption = '';
      }
   }

   function lbelimcalculoClick($sender, $params)
   {
      if(Derechos('Eliminar Archivo Calculo') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Eliminar el Archivo");
               </script>';
      }
      else
      {
         unlink('Adjuntos/' . $this->lbelimcalculo->Caption);
         $this->hfpathcalculo->Value = '';
         $sql = ' update idlpropuestas set pathcalculo="' . $this->hfpathcalculo->Value .
         '" where idpropuesta =' . $this->edidpropuesta->Text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->lbadjcalc->Caption = '';
         $this->lbelimcalculo->Caption = '';
      }


   }




   function btnlifeClick($sender, $params)
   {
      if(Derechos('Subir Archivo LifeCycle') == false)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("No Tienes Derechos para Adjuntar el Archivo");
              </script>';
      }
      else
      {
         if($this->edidpropuesta->tag == 1)
         {
            echo '<script language="javascript" type="text/javascript">
              	alert(\' Debes Guardar Los Datos Antes de Subir el Archivo \');
           		</script>';

         }
         else
         {
            $path = GetConfiguraciones('Pathadjuntos');
            if((tipoarchivo($_FILES["ullife"]["type"], 1) == true)
            && ($_FILES["ullife"]["size"] < GetConfiguraciones('ArchivosSize')))//10 megas
            {
               if($_FILES["ullife"]["error"] > 0)
               {
                  echo '<script language="javascript" type="text/javascript">
                  		     alert(\'Error al subir Archivo: ' . $_FILES["ullife"]["error"] . '\');
                     		</script>';
               }
               else
               {
                  if(file_exists($path . $_FILES["ullife"]["name"]))
                  {
                     echo '<script language="javascript" type="text/javascript">
                    	 alert(\' El Archivo ya existe: ' . $_FILES["ullife"]["name"] . '\');
                     	 </script>';
                  }
                  else
                  {
                     move_uploaded_file($_FILES["ullife"]["tmp_name"],
                     $_SERVER['DOCUMENT_ROOT'] . $path . replace($_FILES["ullife"]["name"]));
                     echo '<script language="javascript" type="text/javascript">
                         		 alert(\'Archivo Guardado: ' . replace($_FILES["ullife"]["name"]) . '\');
                        		</script>';
                     $this->lbadjlife->Caption = replace($_FILES["ullife"]["name"]);
                     $this->lbadjlife->Link = "Adjuntos/" . replace($_FILES["ullife"]["name"]);
                     $this->hfpathlife->Value = replace($_FILES['ullife']['name']);
                     $sql = ' update idlpropuestas set pathlife="' . $this->hfpathlife->Value .
                     '" where idpropuesta =' . $this->edidpropuesta->Text;
                     $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
                     $this->lbelimlife->Caption = 'Eliminar';
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

   function btncalculoClick($sender, $params)
   {
      if(Derechos('Subir Archivo Calculo') == false)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("No Tienes Derechos para Adjuntar el Archivo");
              </script>';
      }
      else
      {
         if($this->edidpropuesta->tag == 1)
         {
            echo '<script language="javascript" type="text/javascript">
              	alert(\' Debes Guardar Los Datos Antes de Subir el Archivo \');
           		</script>';

         }
         else
         {
            $path = GetConfiguraciones('Pathadjuntos');
            if((tipoarchivo($_FILES["ulcalculo"]["type"], 1) == true)
            && ($_FILES["ulcalculo"]["size"] < GetConfiguraciones('ArchivosSize')))//10 megas
            {
               if($_FILES["ulcalculo"]["error"] > 0)
               {
                  echo '<script language="javascript" type="text/javascript">
                  		     alert(\'Error al subir Archivo: ' . $_FILES["ulcalculo"]["error"] . '\');
                     		</script>';
               }
               else
               {
                  if(file_exists($path . $_FILES["ulcalculo"]["name"]))
                  {
                     echo '<script language="javascript" type="text/javascript">
                    	 alert(\' El Archivo ya existe: ' . $_FILES["ulcalculo"]["name"] . '\');
                     	 </script>';
                  }
                  else
                  {
                     move_uploaded_file($_FILES["ulcalculo"]["tmp_name"],
                     $_SERVER['DOCUMENT_ROOT'] . $path . replace($_FILES["ulcalculo"]["name"]));
                     echo '<script language="javascript" type="text/javascript">
                         		 alert(\'Archivo Guardado: ' . replace($_FILES["ulcalculo"]["name"]) . '\');
                        		</script>';
                     $this->lbadjcalc->Caption = replace($_FILES["ulcalculo"]["name"]);
                     $this->lbadjcalc->Link = "Adjuntos/" . replace($_FILES["ulcalculo"]["name"]);
                     $this->hfpathcalculo->Value = replace($_FILES['ulcalculo']['name']);
                     $sql = ' update idlpropuestas set pathcalculo="' . $this->hfpathcalculo->Value .
                     '" where idpropuesta =' . $this->edidpropuesta->Text;
                     $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
                     $this->lbelimcalculo->Caption = 'Eliminar';
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

   function cbestatusChange($sender, $params)
   {
      if($this->cbestatus->ItemIndex == 1 || $this->cbestatus->ItemIndex == 2)
      {
         echo '<script language="javascript" type="text/javascript">
              alert(\'No puedes regresar a este Estatus \');
              </script>';
         $this->cbestatus->ItemIndex = $this->hfestatus->Value;
      }
      else
      {
         echo '<script language="javascript" type="text/javascript">
              if(!confirm("Deseas Cambiar de Estatus a la PROPUESTA?"))
              {
                document.location.href("upropuestas.php?siguiente=0&comboindex=' .
         $this->cbestatus->ItemIndex . '&idpropuesta=' . $this->edidpropuesta->Text .
         '&idrevision=' . $this->edrevision->Text . '&new=1");
              }
              else
              {
                document.location.href("upropuestas.php?siguiente=1&comboindex=' .
         $this->cbestatus->ItemIndex . '&idpropuesta=' . $this->edidpropuesta->Text .
         '&idrevision=' . $this->edrevision->Text . '");
              }
              </script>';
         $this->EstatusLabel();

      }
   }

   function btnimprimirClick($sender, $params)
   {
      switch($this->cbtipopropuesta->ItemIndex)
      {
         case 1:
            $reporte = 'idlfullservice';
            break;

         case 2:
            $reporte = 'idlcontratomant';
            break;

         case 3:
            $reporte = 'idlservded';
            break;
      }
      echo '<script language="javascript" type="text/javascript">
           window.open("http://' . GetConfiguraciones('ipserver') . ':8080/imprimir.jsp' .
      '?reporte=' . $reporte . '&tiporeporte=pdf' .
      '&idpropuesta=' . $this->edidpropuesta->Text . '&idrevision=' . $this->edrevision->text . '' .
      '&idtipo=' . $tipo . '", "_blank");
           </script>';
   }

   function btnGuardarClick($sender, $params)
   {
      if($this->Validar())
      {
         $this->Guardar();
         redirect('upropuestas.php?idpropuesta=' . $this->edidpropuesta->Text . '&idrevision=' . $this->edrevision->text);
      }
   }

   function btnGuardarcerrarClick($sender, $params)
   {
      if($this->Validar())
      {
         $this->Guardar();
         redirect('upropuestasvista.php');
      }
   }

   function btnregresarClick($sender, $params)
   {
      redirect('upropuestasvista.php');
   }

   function revisar()
   {
      //sacar el maximo idrevision
      $sql = 'select max(idrevision)+1 as max from idlpropuestas
              where idpropuesta=' . $this->edidpropuesta->Text;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      $idrev = $row[0];

      $idprop = $this->edidpropuesta->Text;
      $sql = 'insert into idlpropuestas (idpropuesta, idrevision, idcliente, idtipopropuesta, vehiculo, atencion,
              idvendedor, idplaza, idestatus, fechacreacion, rentamensual, idmonedarenta,
              costomant, idmonedamant, costoapertura, idmonedaapertura, recorrido, plazo, pathrating, pathlife, pathcalculo, notas,
              llantas, ubicacion, usuario, fecha, hora)
              SELECT p.idpropuesta, ' . $idrev . ' as idrevision,
              p.idcliente, p.idtipopropuesta, p.vehiculo, p.atencion, p.idvendedor, p.idplaza,
              p.idestatus, p.fechacreacion, p.rentamensual, p.idmonedarenta, p.costomant,
              p.idmonedamant, p.costoapertura, p.idmonedaapertura, p.recorrido, p.plazo, p.pathrating, p.pathlife, p.pathcalculo, p.notas,
              p.llantas, p.ubicacion, p.usuario, p.fecha, p.hora
              FROM idlpropuestas AS p WHERE p.idpropuesta = ' . $this->edidpropuesta->Text . '
              and idrevision=' . $this->edrevision->Text;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);

      //cambiar el estatus a revisada
      $sql = 'update idlpropuestas set idestatus=3
             where idpropuesta=' . $this->edidpropuesta->Text . ' and idrevision=' . $this->edrevision->Text;
      $rs = mysql_query($sql)or die('Error consulta SQL: ' . $sql);

      $this->Limpiar();
      $this->inicializa();
      $this->Locate($idprop, $idrev);
   }

   function btnactivarClick($sender, $params)
   {
      //revisar datos del cliente "completos"
      //activar la propuesta y ya no sera modificable
      if($this->btnactivar->tag == 1)
      {
         $this->revisar();
      }
      else //activar
      {
         $this->Guardar();
         $ban = true;
         if($this->edcliente->text == '')
         {
            echo '<script language="javascript" type="text/javascript">
                   alert(\'No puedes Activar falta el Cliente\');
                   </script>';
            $ban = false;
         }

         if($this->hfpathrating->Value == '' || $this->hfpathrating->Value == '0' ||
         $this->hfpathlife->Value == '' || $this->hfpathlife->Value == '0')
         {
            echo '<script language="javascript" type="text/javascript">
                   alert(\'No puedes Activar falta adjuntar archivos\');
                   </script>';
            $ban = false;
         }

         if($ban)
         {
            $this->cbestatus->ItemIndex = 3;
            $this->btnactivar->Caption = 'Revisar';
            //poner estatus del boton a revision
            $this->btnactivar->Tag = 1;
            $sql = 'update idlpropuestas set idestatus=2
                    where idpropuesta=' . $this->edidpropuesta->Text . ' and idrevision=' . $this->edrevision->Text;
            $rs = mysql_query($sql)or die('Error consulta SQL: ' . $sql);
            $this->habilitar(true);

            $msn = 'Propuesta No. ' . $this->edidpropuesta->Text .
            ' Activada por Vendedor: ' . $this->edvendedor->Text .
            ' Cliente: ' . $this->edcliente->Text .
            ' Descripcion del Vehiculo: ' . $this->edvehiculo->Text .
            ' Tipo Cotizacion: ' . $this->cbtipopropuesta->Items[$this->cbtipopropuesta->ItemIndex] .
            ' Plazo: ' . $this->edplazo->text . ' mes(es) ' .
            ' Renta Mensual: ' . $this->edrenta->Text . ' ' . $this->cbmonrenta->Items[$this->cbmonrenta->ItemIndex] .
            ' Costo Mantenimiento: ' . $this->edcosto->Text . ' ' . $this->cbmoncosto->Items[$this->cbmoncosto->ItemIndex] .
            ' Recorrido Anual Calculado : ' . $this->edrecorrido->Text . ' %' .
            ' Fecha: ' . date("d/m/Y");

            enviarmailattach(GetConfiguraciones('mailsistema'), 'Sistema de CRM', GetConfiguraciones('mailidealease'), 'Varios', 'AVISO DE PROPUESTA ACTIVADA', $msn, '', '');
            //enviarmail('CRM@ibc.com.mx', GetConfiguraciones('mailavisos'), 'Aviso de PROPUESTA ACTIVADA', $msn);

            echo '<script language="javascript" type="text/javascript">
                 alert(\'Propuesta Activada: \');
                 </script>';
         }
      }
   }

   function habilitar($ban)
   {
      $this->edidcliente->ReadOnly = $ban;
      $this->edvehiculo->ReadOnly = $ban;
      $this->edatencion->ReadOnly = $ban;
      $this->edplazo->ReadOnly = $ban;
      $this->edrenta->ReadOnly = $ban;
      $this->edrecorrido->ReadOnly = $ban;
      $this->edcosto->ReadOnly = $ban;
      $this->ednotas->ReadOnly = $ban;

      if($ban)//disabled
      {
         $this->cbmoncosto->Enabled = false;
         $this->cbmonrenta->Enabled = false;
         $this->cbubicacion->Enabled = false;
         $this->cbllantas->Enabled = false;
         $this->cbtipopropuesta->Enabled = false;

         $this->btnGuardar->Enabled = false;
         $this->btnGuardarcerrar->Enabled = false;
         $this->btnbuscarcliente->Enabled = false;

         //habilitar combo estatus,btn enviar mail e imprimir
         if($this->cbestatus->ItemIndex == 2)
            $this->cbestatus->Enabled = true;
         else
            $this->cbestatus->Enabled = false;
         /*$this->btnmail->Enabled = true;
         $this->btnimprimir->Enabled = true;    */
         $this->btnlife->Enabled = false;
         $this->btnrating->Enabled = false;
         $this->btncalculo->Enabled = false;

         $this->edcostoapertura->Enabled = false;
         $this->cbmonapertura->Enabled = false;
      }
      else //enabled
      {
         $this->cbmoncosto->Enabled = true;
         $this->cbmonrenta->Enabled = true;
         $this->cbubicacion->Enabled = true;
         $this->cbllantas->Enabled = true;
         $this->cbtipopropuesta->Enabled = true;

         $this->btnGuardar->Enabled = true;
         $this->btnGuardarcerrar->Enabled = true;
         $this->btnactivar->Enabled = true;
         $this->btnbuscarcliente->Enabled = true;
         //deshabilitar combo estatus, btn enviar mail e imprimir
         $this->cbestatus->Enabled = false;
         /*$this->btnmail->Enabled = false;
         $this->btnimprimir->Enabled = false;*/
         $this->btnlife->Enabled = true;
         $this->btnrating->Enabled = true;
         $this->btncalculo->Enabled = true;

         $this->edcostoapertura->Enabled = true;
         $this->cbmonapertura->Enabled = true;
      }

      if($this->cbestatus->ItemIndex > 1)
      {
         $this->btnmail->Enabled = true;
         $this->btnimprimir->Enabled = true;

      }
      else
      {
         $this->btnmail->Enabled = false;
         $this->btnimprimir->Enabled = false;
      }

      if($this->cbestatus->ItemIndex > 3)
         $this->btnactivar->Enabled = false;
   }

   function Guardar()
   {
      if($this->edidpropuesta->tag == '1')
      {
         $this->tbpropuestas->open();
         $this->tbpropuestas->insert();
         $this->edidpropuesta->Text = MaxId('idlpropuestas', 'idpropuesta') + 1;
         $this->tbpropuestas->fieldset("idpropuesta", $this->edidpropuesta->Text);
         $msg = "Creo la propuesta No. " . $this->edidpropuesta->Text;
         $nivel = 1;
         $ban = true;
      }
      else
      {
         if(Derechos('Modificar Propuestas') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("No puede Modificar Propuestas");
							   document.location.href("upropuestasvista.php");
                 </script>';
            $ban = false;
         }
         else
         {
            $this->tbpropuestas->close();
            $this->tbpropuestas->writeFilter('idpropuesta="' . $this->edidpropuesta->Text . '"');
            $this->tbpropuestas->refresh();
            $this->tbpropuestas->open();
            $this->tbpropuestas->Edit();
            $msg = "Edito la Propuesta No. " . $this->edidpropuesta->Text;
            $nivel = 2;
            $ban = true;
         }
      }
      if($ban)
      {
         $this->tbpropuestas->fieldset('idcliente', $this->edidcliente->Text);
         $this->tbpropuestas->fieldset('idestatus', $this->cbestatus->ItemIndex);
         $this->tbpropuestas->fieldset('idtipopropuesta', $this->cbtipopropuesta->ItemIndex);
         $this->tbpropuestas->fieldset('idrevision', $this->edrevision->text);
         $this->tbpropuestas->fieldset('idplaza', $this->edplaza->tag);
         $this->tbpropuestas->fieldset('idvendedor', $this->edvendedor->tag);

         $this->tbpropuestas->fieldset('fechacreacion', Date('Y/m/d'));
         $this->tbpropuestas->fieldset('vehiculo', strtoupper($this->edvehiculo->Text));
         $this->tbpropuestas->fieldset('atencion', strtoupper($this->edatencion->Text));

         $this->tbpropuestas->fieldset('rentamensual', $this->edrenta->Text);
         $this->tbpropuestas->fieldset('idmonedarenta', $this->cbmonrenta->ItemIndex);
         $this->tbpropuestas->fieldset('costomant', $this->edcosto->Text);
         $this->tbpropuestas->fieldset('idmonedamant', $this->cbmoncosto->ItemIndex);
         $this->tbpropuestas->fieldset('costoapertura', $this->edcostoapertura->Text);
         $this->tbpropuestas->fieldset('idmonedaapertura', $this->cbmonapertura->ItemIndex);
         $this->tbpropuestas->fieldset('plazo', $this->edplazo->Text);
         $this->tbpropuestas->fieldset('recorrido', $this->edrecorrido->Text);

         $this->tbpropuestas->fieldset('notas', strtoupper($this->ednotas->Text));
         $this->tbpropuestas->fieldset('notaestatus', strtoupper($this->ednotasestatus->Text));

         $this->tbpropuestas->fieldset('llantas', $this->cbllantas->ItemIndex);
         $this->tbpropuestas->fieldset('ubicacion', $this->cbubicacion->ItemIndex);

         $this->tbpropuestas->fieldset('pathrating', $this->lbadjrating->Caption);
         $this->tbpropuestas->fieldset('pathlife', $this->lbadjlife->Caption);
         $this->tbpropuestas->fieldset('pathcalculo', $this->lbadjcalc->Caption);

         $this->tbpropuestas->fieldset("usuario", $_SESSION["login"]);
         $this->tbpropuestas->fieldset("fecha", date("Y/n/j"));
         $this->tbpropuestas->fieldset("hora", date("H:i:s"));
         $this->tbpropuestas->post();
         $this->edidpropuesta->tag = 2;
         $this->tbpropuestas->Active = false;
         dmconexion::Log($msg, $nivel);
      }
   }

   function upropuestasCreate($sender, $params)
   {
      echo '<link rel="stylesheet" type="text/css" href="estilos.css" />';
      echo '<script type="text/javascript" src="fpropuesta.js">&nbsp;
              </script>';
   }

   function chkequipoClick($sender, $params)
   {
      if($this->chkequipo->Checked = true)
      {
         $this->Guardar();
         $this->edidpropuesta->Tag = 2;
         redirect('upropuestasdet.php?idpropuesta=' . $this->edidpropuesta->Text);
      }
   }

   function upropuestasShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"] - 160;
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET['siguiente']))
      {
         if($_GET['siguiente'] == 0)
         {
            $this->Limpiar();
            $this->inicializa();
            $this->Locate($_GET['idpropuesta'], $_GET['idrevision']);

         }
         if($_GET['siguiente'] == 1)
         {
            $this->hfestatus->Value = $_GET['comboindex'];
            if($_GET['comboindex'] == 3)
            {
               $this->Limpiar();
               $this->Locate($_GET['idpropuesta'], $_GET['idrevision']);
               $this->revisar();
            }
         }
      }
      else if(isset($_GET['idcliente']))
      {
         $nom = NombreMoral('c');
         $sql = 'Select ' . $nom . ' as nombre, idcliente, email
                 from clientes c where idcliente =' . $_GET['idcliente'];
         $rs = mysql_query($sql)or die('Error de SQL :' . $sql);
         $row = mysql_fetch_row($rs);
         $this->edcliente->Text = $row[0];
         $this->edidcliente->Text = $row[1];
         $this->hfemail->value = $row[2];
      }
      else if(isset($_GET['mail']))
      {
         $msn = ' Envio de correo del CRM International de BC';
         //$this->enviarmail('Aviso del sistema CRM', $msn, $_GET['mail']);
         enviarmailattach(GetConfiguraciones('mailsistema'), 'Sistema de CRM', $_GET['mail'], 'Varios', 'AVISO DEL SISTEMA CRM', $msn, '', '');
      }
      else if(isset($_GET['idprocedencia']))
      {
         $this->hfidnota->Value = $_GET['idnota'];
         $sql = 'update idlpropuestas set idnota=' . $_GET['idnota'] . ' where idpropuesta=' . $this->edidpropuesta->Text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      }
      else if(isset($_GET['idpropuestadet']))
      {
         //checar si el checkbox
         $sql = 'select count(idpropuesta) from idlpropuestasdet where idpropuesta=' . $_GET['idpropuestadet'];
         $rs = mysql_query($sql)or die('Error de SQL: ' . $sql);
         $row = mysql_fetch_row($rs);
         if($row[0] > 0)
            $this->chkequipo->Checked = true;
         else
            $this->chkequipo->Checked = false;
         $this->tbpropuestas->close();
         $this->tbpropuestas->writeFilter('idpropuesta=' . $_GET['idpropuestadet']);
         $this->tbpropuestas->refresh();
         $this->tbpropuestas->open();
         $this->tbpropuestas->edit();
         $sql = 'select costocarroceria,costoaccesorios,precio from idlpropuestas where idpropuesta=' . $this->edidpropuesta->text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $row = mysql_fetch_row($rs);
         $this->edcarroceria->Text = $row[0];
         $this->edaccesorios->Text = $row[1];
         $this->edprecio->Text = $row[2];
         $this->calcular();
      }
      else if(isset($_GET['idpropuesta']))
      {
         //nuevo registro
         $this->edidpropuesta->Text = ($_GET['idpropuesta']);
         if($this->edidpropuesta->Text == '0')
         {
            $this->habilitar(false);
            $this->Limpiar();
            $this->inicializa();
            $this->edidpropuesta->tag = '1';
         }
         //modificacion
         else if($this->edidpropuesta->Text > '0')
         {
            $this->Limpiar();
            $this->inicializa();
            $this->Locate($_GET['idpropuesta'], $_GET['idrevision']);

            //eliminar
            if(isset($_GET['elim']))
            {
               if(Derechos('Eliminar Propuestas') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                  			alert("No Tienes Derechos para Eliminar Propuestas");
									window.location="upropuestasvista.php";
                  			</script>';
               }
               else
               {
                  $rs = mysql_query('select idpropuesta from idlpropuestasdet where idpropuesta=' . $this->edidpropuesta->Text);
                  $row = mysql_fetch_row($rs);
                  if($row > 0)
                  {
                     $rs = mysql_query('delete from idlpropuestasdet where idpropuesta=' .
                     $this->edidpropuesta->Text);
                  }
                  $rs = mysql_query('delete from idlpropuestas where idpropuesta=' . $this->edidpropuesta->Text .
                  ' and idrevision=' . $this->edrevision->Text)or die('Error Al Eliminar Registro ');
                  dmconexion::Log("Elimino la propuesta No. " . $this->edrevision->Text .
                  " del Cliente " . $this->edcliente->Text . " ", 3);
                  redirect("upropuestasvista.php");
               }
            }
         }
      }
   }

   function Locate($idpropuesta, $idrevision)
   {
      $this->edidpropuesta->tag = '2';
      $this->tbpropuestas->close();
      $this->tbpropuestas->writeFilter('idpropuesta=' . $idpropuesta .
      ' and idrevision=' . $idrevision);

      $this->tbpropuestas->refresh();
      $this->tbpropuestas->open();
      $this->edidpropuesta->Text = $this->tbpropuestas->fieldget('idpropuesta');
      $this->edrevision->text = $this->tbpropuestas->fieldget('idrevision');

      $nom = NombreMoral('c');
      $sql = 'Select ' . $nom . ' as nombre,email from clientes c ' .
      'where idcliente =' . $this->tbpropuestas->fieldget('idcliente');
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      $this->edidcliente->text = $this->tbpropuestas->fieldget('idcliente');
      $this->edcliente->Text = $row[0];
      $this->hfemail->Value = $row[1];

      //plaza y vendedor
      $sql = 'select p.nombre as plaza, ' . NombreFisica('u') . ' as vendedor
              from usuarios u left join plazas p on u.idplaza=p.idplaza
              where idusuario=' . $this->tbpropuestas->fieldget('idvendedor') . '';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_array($rs);
      $this->edplaza->text = $row['plaza'];
      $this->edplaza->tag = $this->tbpropuestas->fieldget('idplaza');
      $this->edvendedor->Text = $row['vendedor'];
      $this->edvendedor->tag = $this->tbpropuestas->fieldget('idvendedor');

      //estatus
      $this->cbestatus->ItemIndex = $this->tbpropuestas->fieldget('idestatus');
      $this->hfestatus->Value = $this->tbpropuestas->fieldget('idestatus');
      $estatus = GetConfiguraciones('idestatuspropuesta');
      //si esta en estatus borrador
      if($this->tbpropuestas->fieldget('idestatus') == $estatus)
      {
         $this->habilitar(false);//habilitado
         $this->btnactivar->Caption = 'Activar';
         $this->btnactivar->Enabled = true;
         $this->btnactivar->Tag = 0;
         $this->btnlife->Enabled = true;
         $this->btnrating->Enabled = true;
         $this->btncalculo->Enabled = true;
         $this->btnimprimir->Enabled = false;
         $this->btnmail->Enabled = false;
      }
      else
      {

         //si esta estatus activo
         if($this->cbestatus->ItemIndex == 2)
         {
            $this->habilitar(true);
            $this->btnactivar->Caption = 'Revisar';
            $this->btnactivar->Enabled = true;
            $this->btnimprimir->Enabled = true;
            $this->btnmail->Enabled = true;
            $this->btnlife->Enabled = true;
            $this->btncalculo->Enabled = true;
            $this->btnrating->Enabled = true;
            $this->cbestatus->Enabled = true;
            $this->btnactivar->Tag = 1;
         }
         else
         {

            //revisado, ganado o perdido
            $this->btnactivar->Enabled = false;
            $this->btnlife->Enabled = true;
            $this->btnrating->Enabled = true;
            $this->btncalculo->Enabled = true;
            $this->btnimprimir->Enabled = true;
            $this->btnmail->Enabled = true;

            $this->habilitar(false);//deshabilitado

            if($this->cbestatus->ItemIndex == 3 || $this->cbestatus->ItemIndex == 4)
               $this->cbestatus->Enabled = true;

         }
      }

      $this->edcreacion->Text = $this->tbpropuestas->fieldget('fechacreacion');
      $this->edvehiculo->text = $this->tbpropuestas->fieldget('vehiculo');
      $this->edatencion->text = $this->tbpropuestas->fieldget('atencion');

      $this->cbtipopropuesta->itemindex = $this->tbpropuestas->fieldget('idtipopropuesta');
      $this->edrenta->text = round($this->tbpropuestas->fieldget('rentamensual'), 2);
      $this->cbmonrenta->itemindex = $this->tbpropuestas->fieldget('idmonedarenta');
      $this->edcosto->text = round($this->tbpropuestas->fieldget('costomant'), 4);
      $this->cbmoncosto->itemindex = $this->tbpropuestas->fieldget('idmonedamant');
      $this->edcostoapertura->text = round($this->tbpropuestas->fieldget('costoapertura'), 4);
      $this->cbmonapertura->itemindex = $this->tbpropuestas->fieldget('idmonedaapertura');
      $this->edrecorrido->text = $this->tbpropuestas->fieldget('recorrido');
      $this->edplazo->text = $this->tbpropuestas->fieldget('plazo');

      $this->ednotas->text = $this->tbpropuestas->fieldget('notas');
      $this->ednotasestatus->text = $this->tbpropuestas->fieldget('notaestatus');

      $this->cbllantas->itemindex = $this->tbpropuestas->fieldget('llantas');
      $this->cbubicacion->itemindex = $this->tbpropuestas->fieldget('ubicacion');

      $path = GetConfiguraciones('Pathadjuntos');

      $this->lbadjrating->Caption = $this->tbpropuestas->fieldget('pathrating');
      $this->hfpathrating->value = $this->tbpropuestas->fieldget('pathrating');
      $this->lbadjrating->Link = $path . $this->tbpropuestas->fieldget('pathrating');

      $this->lbadjlife->Caption = $this->tbpropuestas->fieldget('pathlife');
      $this->hfpathlife->value = $this->tbpropuestas->fieldget('pathlife');
      $this->lbadjlife->Link = $path . $this->tbpropuestas->fieldget('pathlife');

      $this->lbadjcalc->Caption = $this->tbpropuestas->fieldget('pathcalculo');
      $this->hfpathcalculo->value = $this->tbpropuestas->fieldget('pathcalculo');
      $this->lbadjcalc->Link = $path . $this->tbpropuestas->fieldget('pathcalculo');

      $this->EstatusLabel();
   }

   function Limpiar()
   {
      reset($this->controls->items);
      while(list($key, $val) = each($this->controls->items))
      {
         if($val->inheritsFrom("Edit") || $val->inheritsFrom("Memo"))
         {
            $val->Text = "";
            $val->tag = '';
         }
      }

      $this->cbestatus->Clear();
      $this->btnactivar->tag = 0;
      $this->btnactivar->Caption = "Activar";
      $this->hfemail->Value = '';

      $this->lbadjrating->Caption = '';
      $this->lbadjrating->Link = '';
      $this->lbelimrating->Caption = '';

      $this->lbadjlife->Caption = '';
      $this->lbadjlife->Link = '';
      $this->lbelimlife->Caption = '';

      $this->lbadjcalc->Caption = '';
      $this->lbadjcalc->Link = '';
      $this->lbelimcalculo->Caption = '';
   }

   function inicializa()
   {
      //trae el max id
      $sql = 'select max(idpropuesta)+1 as id from idlpropuestas';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      if($row[0] == 0 || $row[0] == '')
         $this->edidpropuesta->Text = '1';
      else
         $this->edidpropuesta->Text = $row[0];

      //id revision
      $this->edrevision->Text = 0;

      $sql = 'select p.idplaza,p.nombre as plaza,u.idusuario, ' . NombreFisica('u') . ' as vendedor' .
      ' from plazas p left join usuarios u on u.idplaza=p.idplaza' .
      ' where login=\'' . $_SESSION['login'] . '\'';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      //plaza
      $this->edplaza->Tag = $row[0];
      $this->edplaza->Text = $row[1];
      //vendedor
      $this->edvendedor->Tag = $row[2];
      $this->edvendedor->text = $row[3];

      //moneda
      $this->cbmoncosto->Clear();
      $this->cbmonrenta->Clear();
      $this->cbmonapertura->Clear();
      $sql = 'select idmoneda,moneda,tc from monedas';
      $rs = mysql_query($sql)or die('Error de consulta SQL :' . $sql);
      while($row = mysql_fetch_array($rs))
      {
         $this->cbmoncosto->AddItem($row['moneda'], null , $row['idmoneda']);
         $this->cbmonrenta->AddItem($row['moneda'], null , $row['idmoneda']);
         $this->cbmonapertura->AddItem($row['moneda'], null , $row['idmoneda']);
      }
      $this->cbmoncosto->ItemIndex = GetConfiguraciones('idmonedadefault');
      $this->cbmonrenta->ItemIndex = GetConfiguraciones('idmonedadefault');
      $this->cbmonapertura->ItemIndex = GetConfiguraciones('idmonedadefault');

      //estatus
      $sql = 'select idestatus id, nombre from idlpropuestasestatus';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      while($row = mysql_fetch_array($rs))
      {
         $this->cbestatus->AddItem($row['nombre'], null , $row['id']);
      }
      $this->cbestatus->ItemIndex = GetConfiguraciones('idestatuspropuesta');

      //tipo de propuesta
      $sql = 'SELECT nombre, idtipopropuesta id from idlpropuestastipos';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      while($row = mysql_fetch_array($rs))
      {
         $this->cbtipopropuesta->AddItem($row['nombre'], null , $row['id']);
      }

      //fechacreacion
      $this->edcreacion->Text = date('Y/m/d');
   }

   function Validar()
   {
      if(($this->cbestatus->ItemIndex == 5 || $this->cbestatus->ItemIndex == 6) && $this->ednotasestatus->Text == '')
      {
         if($this->cbestatus->ItemIndex == 5)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert("Falta escribir el motivo de la cancelacion");
                  </script>';
            return false;
         }

         if($this->cbestatus->ItemIndex == 6)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert("Falta escribir el motivo de la Perdida");
                  </script>';
            return false;
         }

      }
      return true;
   }

   function EstatusLabel()
   {
      $this->lbnotasestatus->Caption = 'Notas por Estatus';

      if($this->cbestatus->ItemIndex == 5)
         $this->lbnotasestatus->Caption = 'Motivo de Cancelacion';

      if($this->cbestatus->ItemIndex == 6)
         $this->lbnotasestatus->Caption = 'Motivo de Perdida';

      if($this->cbestatus->ItemIndex == 7)
         $this->lbnotasestatus->Caption = 'Notas de Propuesta Ganada';
   }
}

global $application;

global $upropuestas;

//Creates the form
$upropuestas = new upropuestas($application);

//Read from resource file
$upropuestas->loadResource(__FILE__);

//Shows the form
$upropuestas->show();

?>