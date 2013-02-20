<script type='text/javascript' src='funciones.js'></script>
<?php
//modificaciones
//ozkar 2010-01-20 correccion en el onchange del cbomoneda, no calculaba el cto y pcio
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
class uofertas extends Page
{
   public $eddescripcion = null;
   public $Label14 = null;
   public $btnpedido = null;
   public $sqlnotas = null;
   public $lblhistorial = null;
   public $upload = null;
   public $hfpath = null;
   public $lbeliminar = null;
   public $lbadjunto = null;
   public $btnsubir = null;
   public $hfestatus = null;
   public $lbtitulo = null;
   public $eddescuento = null;
   public $Label8 = null;
   public $edtc = null;
   public $btnimprimir = null;
   public $cboestatus = null;
   public $edfechacreacion = null;
   public $Label32 = null;
   public $edtipocamion = null;
   public $edfase = null;
   public $Label31 = null;
   public $hfemail = null;
   public $btnmail = null;
   public $cbofinanciamiento = null;
   public $Label30 = null;
   public $mespecifica = null;
   public $Label28 = null;
   public $pespecificaciones = null;
   public $pbotones = null;
   public $btnregresar = null;
   public $btnactivar = null;
   public $hfidnota = null;
   public $lbnotas = null;
   public $Label29 = null;
   public $pnotas = null;
   public $edtotal = null;
   public $edcostototal = null;
   public $edaccesorios = null;
   public $edcarroceria = null;
   public $edtiempoent = null;
   public $edcolor = null;
   public $edmodelo = null;
   public $edcantcamiones = null;
   public $edvendedor = null;
   public $edrevision = null;
   public $Label27 = null;
   public $edplaza = null;
   public $Label6 = null;
   public $dsofertas = null;
   public $edano = null;
   public $Label26 = null;
   public $Label25 = null;
   public $Label24 = null;
   public $tbofertas = null;
   public $edcliente = null;
   public $edoferta = null;
   public $btnguardarcerrar = null;
   public $btnguardar = null;
   public $btnbuscarmodelo = null;
   public $edmargen = null;
   public $Label23 = null;
   public $Label17 = null;
   public $edutilidad = null;
   public $edprecio = null;
   public $cbomoneda = null;
   public $Label22 = null;
   public $edchasis = null;
   public $Label19 = null;
   public $Label18 = null;
   public $Label15 = null;
   public $Label13 = null;
   public $Label12 = null;
   public $Label11 = null;
   public $Label10 = null;
   public $precios = null;
   public $Label9 = null;
   public $chkequipo = null;
   public $Label2 = null;
   public $Label1 = null;
   public $datosprincipales = null;
   public $btnbuscarcli = null;
   public $Cliente = null;
   public $IdOferta = null;
   public $Label7 = null;
   public $Label5 = null;
   public $Label4 = null;
   public $Label3 = null;
   function btnpedidoClick($sender, $params)
   {
      if($this->cboestatus->ItemIndex=='91')
      {
         echo '<script language="javascript" type="text/javascript">
               window.open("http://'.GetConfiguraciones('ipserver').':8080/imprimir.jsp?reporte=pedidofactura&tiporeporte=pdf'.
               '&idoferta='.$this->edoferta->Text.'&idrevision='.$this->edrevision->Text.'", "_blank");
         </script>';
      }
      else
         echo '<script language="javascript" type="text/javascript">
               alert(\'No puedes imprimir la solicitud, ya que el estatus de la oferta No esta Ganada!\');
               </script>';
   }

   function lbeliminarClick($sender, $params)
   {
      if(Derechos('Eliminar ArchivoFinanciamiento') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Eliminar el Archivo");
               </script>';
      }
      else
      {
         unlink('Adjuntos/' . $this->lbadjunto->Caption);
         $this->hfpath->Value = '';
         $sql = ' update ofertas set path="' . $this->hfpath->Value .
         '" where idoferta =' . $this->edoferta->Text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->lbadjunto->Caption = '';
         $this->lbeliminar->Caption = '';
      }
   }

   function btnsubirClick($sender, $params)
   {
      if(Derechos('Subir ArchivoFinanciamiento') == false)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("No Tienes Derechos para Adjuntar el Archivo");
              </script>';
      }
      else
      {
         if($this->edoferta->tag == 1)
         {
            echo '<script language="javascript" type="text/javascript">
              	alert(\' Debes Guardar Los Datos Antes de Subir el Archivo \');
           		</script>';

         }
         else
         {
            $path = GetConfiguraciones('Pathadjuntos');
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
                     $this->lbadjunto->Link = "Adjuntos/" . replace($_FILES["upload"]["name"]);
                     $this->hfpath->Value = replace($_FILES['upload']['name']);
                     $sql = ' update ofertas set path="' . $this->hfpath->Value .
                     '" where idoferta =' . $this->edoferta->Text;
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

   function edprecioJSKeyPress($sender, $params)
   {
?>
       if( ValidaDecimal(document.getElementById('edprecio').value, event) != event.keyCode)
           return false;
<?php
   }

   function edprecioJSBlur($sender, $params)
   {
?>
          var num= document.getElementById('edprecio').value-document.getElementById('eddescuento').value;
			 document.getElementById('edtotal').value= Math.round(num*100)/100;
			 num= document.getElementById('edtotal').value-document.getElementById('edcostototal').value;
			 document.getElementById('edutilidad').value= Math.round(num*100)/100;
			 num= (document.getElementById('edutilidad').value*100)/document.getElementById('edtotal').value;
			 document.getElementById('edmargen').value= Math.round(num*100)/100;
<?php
   }

   function btnbuscarmodeloJSClick($sender, $params)
   {
      redirect("uproductosvista.php?pagina=uofertas.php");
   }

   function btnbuscarcliClick($sender, $params)
   {
      redirect("uclientesvista.php?pagina=uofertas.php");
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
					"reporte=ofertas&idoferta='.$this->edoferta->Text.'&idrevision=' .
					$this->edrevision->text.'", "_blank");
					var largo = 768;
					var altura = 520;
					var top = (screen.height-altura)/2;
					var izquierda = (screen.width-largo)/2;
					window.open("ucorreo.php?name='.$this->edvendedor->Text.
					'&to='.$this->hfemail->Value.'&'.'subject=Oferta de Camiones IBC&attach=ofertas'.
					$this->edoferta->Text.'.pdf", "_blank",
					"resizable=no,menubar=no,titlebar=yes,width="+largo+",height="+altura+",top="+top+",left="+izquierda);
         </script>';
      }
   }

   function eddescuentoJSBlur($sender, $params)
   {
?>
          var num= document.getElementById('edprecio').value-document.getElementById('eddescuento').value;
			 document.getElementById('edtotal').value= Math.round(num*100)/100;
			 num= document.getElementById('edtotal').value-document.getElementById('edcostototal').value;
			 document.getElementById('edutilidad').value= Math.round(num*100)/100;
			 num= (document.getElementById('edutilidad').value*100)/document.getElementById('edtotal').value;
			 document.getElementById('edmargen').value= Math.round(num*100)/100;
<?php

   }

   function cboestatusChange($sender, $params)
   {
      if($this->cboestatus->ItemIndex == 89 || $this->cboestatus->ItemIndex == 90)
      {
         echo '<script language="javascript" type="text/javascript">
                  alert(\'No puedes regresar a este Estatus \');
                  </script>';
         $this->cboestatus->ItemIndex = $this->hfestatus->Value;
      }
      else
      {
         echo '<script language="javascript" type="text/javascript">
                  if(!confirm("Deseas Cambiar de Estatus a la OFERTA?"))
                  {
                     document.location.href("uofertas.php?siguiente=0&comboindex=' .
         $this->cboestatus->ItemIndex . '&idoferta=' . $this->edoferta->Text .
         '&idrevision=' . $this->edrevision->Text . '&new=1");
                  }
                  else
                  {
                     document.location.href("uofertas.php?siguiente=1&comboindex=' .
         $this->cboestatus->ItemIndex . '&idoferta=' . $this->edoferta->Text .
         '&idrevision=' . $this->edrevision->Text . '");
                  }
                  </script>';
      }
   }

   function eddescuentoJSKeyPress($sender, $params)
   {
?>
       if( ValidaDecimal(document.getElementById('eddescuento').value, event) != event.keyCode)
           return false;
<?php
   }

   function edtiempoentJSKeyPress($sender, $params)
   {
?>
      // if( ValidaEntero(document.getElementById('edtiempoent').value, event) != event.keyCode)
        //   return false;
<?php
   }

   function edanoJSKeyPress($sender, $params)
   {
?>
       if( ValidaEntero(document.getElementById('edano').value, event) != event.keyCode)
           return false;
<?php

   }

   function edcantcamionesJSKeyPress($sender, $params)
   {
?>
       if( ValidaEntero(document.getElementById('edcantcamiones').value, event) != event.keyCode)
           return false;
<?php
   }

   function btnimprimirClick($sender, $params)
   {
      echo '<script language="javascript" type="text/javascript">
         window.open("http://' . GetConfiguraciones('ipserver') . ':8080/imprimir.jsp?reporte=ofertas&tiporeporte=pdf' .
      '&idoferta=' . $this->edoferta->Text . '&idrevision=' . $this->edrevision->text . '", "_blank");
         </script>';
   }

   function btnguardarcerrarClick($sender, $params)
   {
      $this->guardar();
      redirect('uofertasvista.php');
   }

   function btnregresarClick($sender, $params)
   {
      redirect('uofertasvista.php');
   }

   function revisar()
   {
      //sacar el maximo idrevision
      $sql = 'select max(idrevision)+1 as max from ofertas where idoferta=' . $this->edoferta->Text;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      $idrev = $row[0];
      $idofe = $this->edoferta->Text;
      $sql = 'insert into ofertas SELECT o.idoferta,' . $idrev . ' as idrevision,' .
             'o.idcliente,o.idvendedor,o.idplaza,"89" as idestatus,"1" as idfase,o.idfinanciamiento,o.fechacreacion,' .
             'o.idnota,o.idproducto,o.modelo,o.cantCamiones,o.idtipocamion,o.ano,o.color,o.tiempoEntrega,
             o.specEspeciales,o.costoChasis,o.costoCarroceria,o.costoAccesorios,
				 o.costo,o.descuento,o.precio,o.total,o.moneda,
				 o.tc,o.utilidad,o.pMargen,"" as path,o.usuario,o.fecha,o.hora
             FROM ofertas AS o WHERE o.idoferta = ' . $this->edoferta->Text .
             ' and idrevision=' . $this->edrevision->Text;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);

      //cambiar el estatus a revisada
      $sql = 'update ofertas set idestatus=102,idfase=3 where idoferta=' . $this->edoferta->Text .
             ' and idrevision=' . $this->edrevision->Text;
      $rs = mysql_query($sql)or die('Error consulta SQL: ' . $sql);

      $this->Limpiar();
      $this->inicializa();
      $this->locate($idofe, $idrev);
   }

   function btnactivarClick($sender, $params)
   {
      //revisar datos del cliente "completos"
      //activar la oferta y ya no sera modificable
      if($this->btnactivar->tag == 1)
      {
         $this->revisar();
      }
      else //activar
      {
         $this->guardar();
         //if(Derechos('Evadir margen minimo') == false)
         if($this->edmargen->Text > $this->edmargen->tag || (Derechos('Evadir margen minimo') == true))
         {
            $ban = true;
            if($this->edmodelo->text == '' || $this->edcliente->text == '')
            {
               echo '<script language="javascript" type="text/javascript">
                   alert(\'No puedes Activar faltan el Modelo o el Cliente\');
                   </script>';
               $ban = false;
            }

            if($this->edano->Text == '' || $this->edcolor->Text == '' || $this->edtiempoent->Text == '')
            {
               echo '<script language="javascript" type="text/javascript">
                   alert(\'No puedes Activar faltan datos por capturar\');
                   </script>';
               $ban = false;
            }

            if($ban)
            {
               $this->cboestatus->ItemIndex = 90;
               $this->btnactivar->Caption = 'Revisar';
               $this->edfase->Text = 'Cotizacion';
               $this->edfase->Tag = 2;
               //poner estatus del boton a revision
               $this->btnactivar->Tag = 1;
               $sql = 'update ofertas set idestatus=90,idfase=2
                      where idoferta=' . $this->edoferta->Text.' and idrevision='.$this->edrevision->Text;
               $rs = mysql_query($sql)or die('Error consulta SQL: ' . $sql);
               $this->habilitar(true);

               $msn = 'Oferta No. ' . $this->edoferta->Text .
               ' Activada por Vendedor: ' . $this->edvendedor->Text .
               ' Cliente: ' . $this->edcliente->Text .
               ' Descripcion del camion: ' . $this->edmodelo->Text .
               ' Tipo: ' . $this->edtipocamion->Text .
               ' Precio de Venta: $ ' . $this->edtotal->text . ' ' .
               $this->cbomoneda->Items[$this->cbomoneda->ItemIndex] .
               ' Margen de Utilidad : ' . $this->edmargen->Text . ' %' .
               ' Fecha: ' . date("d/m/Y");

               $this->insertarnota();

               //enviarmail('CRM@ibc.com.mx', GetConfiguraciones('mailavisos'), 'Aviso de OFERTA ACTIVADA', $msn);
               enviarmailattach('crm@ibc.com.mx', 'Sistema de CRM', GetConfiguraciones('mailavisos'), 'Varios', 'AVISO DE OFERTA ACTIVADA', $msn, '', '');
               echo '<script language="javascript" type="text/javascript">
                          alert(\'Oferta Activada: \');
                        </script>';
            }
         }
         else
            echo '<script language="javascript" type="text/javascript">
                       alert(\'El Margen de la utilidad es Menor al ' . $this->edmargen->tag . '% preestablecido  \');
                     </script>';
      }
   }

   function insertarnota()
   {
      $sql = 'select idnota from clientes where idcliente=' . $this->edcliente->Tag;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      $idnota = $row[0];
      if($row[0] == 0)
      {
         $idnota = MaxId('notas', 'idnota') + 1;
         $sql = "Update clientes set idnota=" . $idnota . " where idcliente = " . $this->edcliente->Tag;
         $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
         $sql = "Insert into notas (idnota,idprocedencia, procedencia, usuario, fecha, hora) " .
         "values (" . $idnota . "," . $this->edcliente->Tag . ",'clientes','" .
         $_SESSION['login'] . "', " . "curdate(), curtime())";
         $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
      }

      $nota = 'Se Activo la Oferta: ' . $this->edoferta->Text . ' IdRevision:' . $this->edrevision->Text .
      ' Con el Modelo de Camion: ' .
      $this->edmodelo->text . ' Precio: ' . $this->edprecio->text . ' Descuento ' . $this->eddescuento->Text .
      ' Total ' . $this->edtotal->Text . ' ' .
      $this->cbomoneda->Items[$this->cbomoneda->ItemIndex] . ' Utilidad: ' .
      $this->edutilidad->text . ' ' . $this->cbomoneda->Items[$this->cbomoneda->ItemIndex] .
      ' Margen: ' . $this->edmargen->Text . '%';
      $sql = "Insert into notasdet (idnota, nota, usuario, fecha, hora) " .
      "values (" . $idnota . ", '" . $nota . "', " .
      "'" . $_SESSION['login'] . "', " . "curdate(), curtime())";
      $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
   }

   function habilitar($ban)
   {
      //edits
      $this->edcantcamiones->ReadOnly = $ban;
      $this->edano->ReadOnly = $ban;
      $this->edcolor->ReadOnly = $ban;
      $this->edtiempoent->ReadOnly = $ban;
      $this->eddescuento->ReadOnly = $ban;
      $this->edprecio->ReadOnly = $ban;
      //memos
      $this->mespecifica->ReadOnly = $ban;
      //combos y botones
      if($ban)//disabled
      {
         $this->cbomoneda->Enabled = false;
         $this->btnguardar->Enabled = false;
         $this->btnguardarcerrar->Enabled = false;
         $this->btnbuscarcli->Enabled = false;
         $this->btnbuscarmodelo->Enabled = false;
         $this->chkequipo->Enabled = false;
         //habilitar combo estatus,btn enviar mail e imprimir
         if($this->cboestatus->ItemIndex == 90)
            $this->cboestatus->Enabled = true;
         else
            $this->cboestatus->Enabled = false;
         $this->btnmail->Enabled = true;
         $this->btnimprimir->Enabled = true;
      }
      else //enabled
      {
         $this->cbomoneda->Enabled = true;
         $this->btnguardar->Enabled = true;
         $this->btnguardarcerrar->Enabled = true;
         $this->btnactivar->Enabled = true;
         $this->btnbuscarcli->Enabled = true;
         $this->btnbuscarmodelo->Enabled = true;
         $this->chkequipo->Enabled = true;
         //deabilitar combo estatus,btn enviar mail e imprimir
         $this->cboestatus->Enabled = false;
         $this->btnmail->Enabled = false;
         $this->btnimprimir->Enabled = false;
      }
   }

   function lbnotasClick($sender, $params)
   {
      $this->guardar();
      $sql = 'select idnota from ofertas where idoferta=' . $this->edoferta->Text;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);

      if($row[0] > 0)
         redirect('unotas.php?idnota=' . $row[0] . '&procedencia=ofertas&idprocedencia=' . $this->edoferta->Text .
         '&idrevision=' . $this->edrevision->Text);
      else
      {
         /*$sql= 'select max(idnota)+1 as id from notas';
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $row= mysql_fetch_row($rs);
         $idnota= $row[0];         */
         $idnota = 0;
         redirect('unotas.php?idnota=' . $idnota . '&procedencia=ofertas&idprocedencia=' . $this->edoferta->Text .
         '&idrevision=' . $this->edrevision->Text);
      }
   }

   function traernotas()
   {
      $sql = 'select idnota from ofertas where idoferta=' . $this->edoferta->Text;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      if($row[0] > 0)
         $idnota = $row[0];
      else
      {
         $sql = 'select max(idnota)+1 as id from notas';
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
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

         /*$this->mnotas->AddLine(strtoupper($row['nota']));
         $this->mnotas->AddLine(strtoupper($row['ufh']));
         $this->mnotas->AddLine('--------------------------------------------------------------------------------------------');*/
      }
      $this->lblhistorial->Caption = $t;
   }

   function btnguardarClick($sender, $params)
   {
      $this->guardar();
   }

   function guardar()
   {
      if($this->edoferta->tag == '1')
      {
         $this->tbofertas->open();
         $this->tbofertas->insert();
         $this->edoferta->Text = MaxId('ofertas', 'idoferta') + 1;
         $this->tbofertas->fieldset("idoferta", $this->edoferta->Text);
         $msg = "Creo la oferta No. " . $this->edoferta->Text;
         $nivel = 1;
         $ban = true;
      }
      else
      {
         if(Derechos('Modificar Ofertas') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                    	alert("No puede Modificar Ofertas");
							document.location.href("uofertasvista.php");
                     </script>';
            $ban = false;
         }
         else
         {
            $this->tbofertas->close();
            $this->tbofertas->writeFilter('idoferta="' . $this->edoferta->Text . '"');
            $this->tbofertas->refresh();
            $this->tbofertas->open();
            $this->tbofertas->Edit();
            $msg = "Edito la Oferta No. " . $this->edoferta->Text;
            $nivel = 2;
            $ban = true;
         }
      }
      if($ban)
      {
         $this->tbofertas->fieldset('idestatus', $this->cboestatus->ItemIndex);
         $this->tbofertas->fieldset('idfase', $this->edfase->Tag);
         $this->tbofertas->fieldset('idrevision', $this->edrevision->text);
         $this->tbofertas->fieldset('idplaza', $this->edplaza->tag);
         $this->tbofertas->fieldset('idvendedor', $this->edvendedor->tag);
         $this->tbofertas->fieldset('idfinanciamiento', $this->cbofinanciamiento->ItemIndex);
         $this->tbofertas->fieldset('idcliente', $this->edcliente->tag);
         $this->tbofertas->fieldset('fechacreacion', Date('Y/m/d'));
         $this->tbofertas->fieldset('idnota', $this->hfidnota->Value);
         $this->tbofertas->fieldset('idproducto', $this->edmodelo->Tag);
         $this->tbofertas->fieldset('modelo', $this->edmodelo->Text);
         $this->tbofertas->fieldset('cantCamiones', $this->edcantcamiones->Text);
         $this->tbofertas->fieldset('idtipocamion', $this->edtipocamion->Tag);
         $this->tbofertas->fieldset('ano', $this->edano->Text);
         $this->tbofertas->fieldset('color', $this->edcolor->Text);
         $this->tbofertas->fieldset('tiempoEntrega', $this->edtiempoent->Text);
         $this->tbofertas->fieldset('specEspeciales', $this->mespecifica->text);
         $this->tbofertas->fieldset('costoChasis', $this->edchasis->Text);
         $this->tbofertas->fieldset('costoCarroceria', $this->edcarroceria->Text);
         $this->tbofertas->fieldset('costoAccesorios', $this->edaccesorios->Text);
         $this->tbofertas->fieldset('costo', $this->edcostototal->Text);
         $this->tbofertas->fieldset('descuento', $this->eddescuento->Text);
         $this->tbofertas->fieldset('precio', $this->edprecio->Text);
         $this->tbofertas->fieldset('total', $this->edtotal->Text);
         $this->tbofertas->fieldset('moneda', $this->cbomoneda->ItemIndex);
         $this->tbofertas->fieldset('tc', $this->edtc->Text);
         $this->tbofertas->fieldset('utilidad', $this->edutilidad->Text);
         $this->tbofertas->fieldset('pMargen', $this->edmargen->Text);
         $this->tbofertas->fieldset('path', $this->lbadjunto->Caption);
         $this->tbofertas->fieldset("usuario", $_SESSION["login"]);
         $this->tbofertas->fieldset("fecha", date("Y/n/j"));
         $this->tbofertas->fieldset("hora", date("H:i:s"));
         $this->tbofertas->post();
         $this->edoferta->tag = 2;
         $this->tbofertas->Active = false;
         dmconexion::Log($msg, $nivel);
      }
   }

   function cbomonedaChange($sender, $params)
   {
      $sql = 'select tc from monedas where idmoneda=' . $this->cbomoneda->ItemIndex;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      $this->edtc->Text = round($row[0], 2);

      $sql = 'select o.moneda,costochasis,costocarroceria,costoaccesorios,p.preciominimo
			from ofertas o left join productos p on o.idproducto=p.idproducto where idoferta=' . $this->edoferta->text;
      $rs = mysql_query($sql)or die('Error de SQL: ' . $sql);
      if(mysql_num_rows($rs) == 0)
      {
         if($this->edchasis->Tag <> $this->cbomoneda->itemindex)
         {
            if($this->cbomoneda->itemindex == 1)//pesos
            {
               $this->edchasis->Text = round($this->edchasis->Text * $this->edtc->text, 2);
               $this->edcostototal->Text = round($this->edcostototal->Text * $this->edtc->text, 2);
               $this->edprecio->text = round($this->edprecio->Text * $this->edtc->text, 2);
            }
            else //dolares
            {
               $this->edchasis->Text = round($this->edchasis->Text / $this->edtc->text, 2);
               $this->edcostototal->Text = round($this->edcostototal->Text / $this->edtc->text, 2);
               $this->edprecio->text = round($this->edprecio->Text / $this->edtc->text, 2);
            }
            $this->calcular();
            $this->edchasis->Tag = $this->cbomoneda->itemindex;
         }
      }
      else
      {
         $row = mysql_fetch_row($rs);
         $this->edprecio->Text = $row[4];

         $sql = 'select idtipo,moneda,sum(od.costo) as costo, sum(od.precio) as precio
				from ofertasdet  od left join productos p on p.idproducto=od.idproducto
				where idoferta=' . $this->edoferta->text . '
				group by idtipo,moneda';
         $rs = mysql_query($sql)or die('Error de SQL ' . $sql);
         while($rec = mysql_fetch_array($rs))
         {
            if($rec['idtipo'] == '2' && $rec['moneda'] == '1')
            {
               $costocarpesos .= $rec['costo'];
               $preciocarpesos .= $rec['precio'];
            }
            else if($rec['idtipo'] == '2' && $rec['moneda'] == '2')
            {
               $costocardoll .= $rec['costo'];
               $preciocardoll .= $rec['precio'];
            }
            else if($rec['idtipo'] == '3' && $rec['moneda'] == '1')
            {
               $costoaccpesos .= $rec['costo'];
               $precioaccpesos .= $rec['precio'];
            }
            else
            {
               $costoaccdoll .= $rec['costo'];
               $precioaccdoll .= $rec['precio'];
            }
         }

         if($row[0] == '2' && $this->cbomoneda->ItemIndex == '1')
         {
            $this->edchasis->Text = $this->edchasis->Text * $this->edtc->Text;
            $this->edcarroceria->Text = $costocarpesos + ($costocardoll * $this->edtc->Text);
            $this->edaccesorios->Text = $costoaccpesos + ($costoaccdoll * $this->edtc->Text);
            $this->edprecio->Text = ($this->edprecio->Text * $this->edtc->Text) + $preciocarpesos + $precioaccpesos + ($preciocardoll * $this->edtc->Text) +
            ($precioaccdoll * $this->edtc->Text);
         }
         else if($row[0] == '1' && $this->cbomoneda->ItemIndex == '2')
         {
            $this->edchasis->Text = $this->edchasis->Text / $this->edtc->Text;
            $this->edcarroceria->Text = $costocardoll + ($costocarpesos / $this->edtc->Text);
            $this->edaccesorios->Text = $costoaccdoll + ($costoaccpesos / $this->edtc->Text);
            $this->edprecio->Text = ($this->edprecio->Text / $this->edtc->Text) + $preciocardoll + $precioaccdoll + ($preciocarpesos / $this->edtc->Text) +
            ($precioaccpesos / $this->edtc->Text);
         }
         else
         {
            $this->edchasis->Text = $row[1];
            $this->edcarroceria->Text = $row[2];
            $this->edaccesorios->Text = $row[3];
            if($this->cbomoneda->ItemIndex == '1')
               $this->edprecio->Text = round($row[4] + $precioaccpesos + $preciocarpesos +
               ($preciocardoll * $this->edtc->Text) + ($precioaccdoll * $this->edtc->Text), 2);
            else
               $this->edprecio->Text = round($row[4] + $precioaccdoll + $preciocardoll +
               ($preciocarpesos / $this->edtc->Text) + ($precioaccpesos / $this->edtc->Text), 2);
         }
         $this->calcular();
      }
   }

   function uofertasCreate($sender, $params)
   {
      echo '<link rel="stylesheet" type="text/css" href="estilos.css" />';
      echo '<script type="text/javascript" src="foferta.js">&nbsp;
              </script>';
   }

   function chkequipoClick($sender, $params)
   {
      if($this->chkequipo->Checked = true)
      {
         $this->guardar();
         $this->edoferta->Tag = 2;
         redirect('uofertasdet.php?idoferta=' . $this->edoferta->Text);
      }
   }

   function calcular()
   {
      $ch = $this->edchasis->Text;
      $car = $this->edcarroceria->Text;
      $acc = $this->edaccesorios->Text;
      $desc = $this->eddescuento->Text;
      $costo = $ch + $car + $acc;
      $precio = $this->edprecio->Text;
      $this->edcostototal->Text = round($costo, 2);
      //precio
      $this->edtotal->Text = round($precio - $desc, 2);
      //utilidad preciosiniva-costosiniva
      $this->edutilidad->Text = round($this->edtotal->Text - $costo, 2);
      //% margen (utilidad*100)/preciosiniva
      if($this->edtotal->Text > 0)
         $this->edmargen->Text = round(($this->edutilidad->Text * 100) / $this->edtotal->Text, 2);
   }

   function uofertasShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"] - 160;
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET['siguiente']))
      {
         if($_GET['siguiente'] == 0)
         {
            $this->Limpiar();
            $this->inicializa();
            $this->locate($_GET['idoferta'], $_GET['idrevision']);

         }
         if($_GET['siguiente'] == 1)
         {
            $this->hfestatus->Value = $_GET['comboindex'];
            if($_GET['comboindex'] == 102)
            {
               $this->Limpiar();
               $this->locate($_GET['idoferta'], $_GET['idrevision']);
               $this->revisar();
            }
            else if($_GET['comboindex'] == 91)
            {
               redirect('uofertasfacturas.php?idoferta=' . $_GET['idoferta'] .
               '&idrevision=' . $_GET['idrevision'] . '&idestatus=' . $_GET['comboindex']);
            }
            else
               redirect('uofertasmotivos.php?idoferta=' . $_GET['idoferta'] .
               '&tipo=' . $_GET['comboindex'] . '&idrevision=' . $_GET['idrevision']);
         }
      }
      else if(isset($_GET['idcliente']))
      {
         $nom = NombreMoral('c');
         $sql = 'Select ' . $nom . ' as nombre,idcliente,email from clientes c ' .
         'where idcliente =' . $_GET['idcliente'];
         $rs = mysql_query($sql)or die('Error de SQL :' . $sql);
         $row = mysql_fetch_row($rs);
         $this->edcliente->Text = $row[0];
         $this->edcliente->Tag = $row[1];
         $this->hfemail->value = $row[2];
      }
      else if(isset($_GET['mail']))
      {
         $msn = ' Envio de correo del CRM International de BC';
         //$this->enviarmail('Aviso del sistema CRM', $msn, $_GET['mail']);
         enviarmailattach('CRM@ibc.com.mx', 'Sistema de CRM', $_GET['mail'], 'Varios', 'AVISO DEL SISTEMA CRM', $msn, '', '');
      }
      else if(isset($_GET['idproducto']))
      {
         $sql = 'select clave,descripcion,costo,preciominimo,p.moneda,round(tc,2) as tc,comentario
				      from productos p left join monedas m on m.idmoneda=p.moneda
                  where idproducto=' . $_GET['idproducto'];
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $row = mysql_fetch_array($rs);
         $this->edcantcamiones->Text = '1';
         $this->edmodelo->Text = $row['clave'];
         $this->eddescripcion->Text = $row['comentario'];
         $this->edmodelo->Tag = $_GET['idproducto'];
         $this->edchasis->Text = round($row['costo'], 2);
         $this->edchasis->Tag = $row['moneda'];
         $this->edprecio->Text = round($row['preciominimo'], 2);
         $this->edtipocamion->Text = $row['descripcion'];
         $this->cbomoneda->ItemIndex = $row['moneda'];
         $this->edtc->Text = $row['tc'];

         $sql = 'select idtipo,margenutilidad from camionestipos where nombre="' . $row[1] . '"';
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $row = mysql_fetch_row($rs);
         $this->edtipocamion->tag = $row[0];
         $this->edmargen->Tag = $row[1];
         $this->calcular();

         //$this->tipoymargen();
      }
      else if(isset($_GET['idprocedencia']))
      {
         $this->hfidnota->Value = $_GET['idnota'];
         $sql = 'update ofertas set idnota=' . $_GET['idnota'] . ' where idoferta=' . $this->edoferta->Text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->traernotas();
      }
      else if(isset($_GET['idofertadet']))
      {
         //checar si el checkbox
         $sql = 'select count(idoferta) from ofertasdet where idoferta=' . $_GET['idofertadet'];
         $rs = mysql_query($sql)or die('Error de SQL: ' . $sql);
         $row = mysql_fetch_row($rs);
         if($row[0] > 0)
            $this->chkequipo->Checked = true;
         else
            $this->chkequipo->Checked = false;
         $this->tbofertas->close();
         $this->tbofertas->writeFilter('idoferta=' . $_GET['idofertadet']);
         $this->tbofertas->refresh();
         $this->tbofertas->open();
         $this->tbofertas->edit();
         $sql = 'select costocarroceria,costoaccesorios,precio from ofertas where idoferta=' . $this->edoferta->text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $row = mysql_fetch_row($rs);
         $this->edcarroceria->Text = $row[0];
         $this->edaccesorios->Text = $row[1];
         $this->edprecio->Text = $row[2];
         $this->calcular();
      }
      else if(isset($_GET['idoferta']))
      {
         //nuevo registro
         $this->edoferta->Text = ($_GET['idoferta']);
         if($this->edoferta->Text == '0')
         {
            $this->habilitar(false);
            $this->Limpiar();
            $this->inicializa();
            $this->cbofinanciamiento->ItemIndex = 0;
            $this->hfidnota->value = 0;
            if(Derechos('Modifica Financiamiento'))
               $this->cbofinanciamiento->Enabled = true;
            $this->edoferta->tag = '1';
         }
         //modificacion
         else if($this->edoferta->Text > '0')
         {
            $this->Limpiar();
            $this->inicializa();
            $this->locate($_GET['idoferta'], $_GET['idrevision']);

            //eliminar
            if(isset($_GET['elim']))
            {
               if(Derechos('Eliminar Ofertas') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                  			alert("No Tienes Derechos para Eliminar Ofertas");
									window.location="uofertasvista.php";
                  			</script>';
               }
               else
               {
                  $rs = mysql_query('select idoferta from ofertasdet where idoferta=' . $this->edoferta->Text);
                  $row = mysql_fetch_row($rs);
                  if($row > 0)
                  {
                     $rs = mysql_query('delete from ofertasdet where idoferta=' .
                     $this->edoferta->Text);
                  }
                  $rs = mysql_query('delete from ofertas where idoferta=' . $this->edoferta->Text .
                  ' and idrevision=' . $this->edrevision->Text)or die('Error Al Eliminar Registro ');
                  dmconexion::Log("Elimino la oferta No. " . $this->edrevision->Text .
                  " del Cliente " . $this->edcliente->Text . " ", 3);
                  redirect("uofertasvista.php");
               }
            }
         }
      }
   }

   /*   function tipoymargen()
   {
   $sql='select idtipo,margenutilidad from camionestipos where idtipo="'.$this->tbofertas->fieldget('idtipocamion').'"';
   $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
   $row= mysql_fetch_row($rs);
   $this->edtipocamion->tag= $row[0];
   $this->edmargen->Tag= $row[1];
   $this->calcular();
   }   */

   function locate($idoferta, $idrevision)
   {
      $this->edoferta->tag = '2';
      $this->tbofertas->close();
      $this->tbofertas->writeFilter('idoferta=' . $idoferta .
      ' and idrevision=' . $idrevision);
      $this->tbofertas->refresh();
      $this->tbofertas->open();
      $this->edoferta->Text = $this->tbofertas->fieldget('idoferta');
      $this->edrevision->text = $this->tbofertas->fieldget('idrevision');
      //nombre,email del cliente
      $nom = NombreMoral('c');
      $sql = 'Select ' . $nom . ' as nombre,email from clientes c ' .
      'where idcliente =' . $this->tbofertas->fieldget('idcliente');
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      $this->edcliente->tag = $this->tbofertas->fieldget('idcliente');
      $this->edcliente->Text = $row[0];
      $this->hfemail->Value = $row[1];
      //plaza y vendedor
      $sql = 'select p.nombre as plaza,if(apaterno is not null or apaterno=\'\',' .
      'if(amaterno is not null or amaterno=\'\',' .
      ' concat(u.nombre,\' \',u.apaterno,\' \',amaterno), ' .
      'concat(u.nombre,\' \',u.apaterno)),u.nombre) as vendedor' .
      ' from usuarios u left join plazas p on u.idplaza=p.idplaza' .
      ' where idusuario=\'' . $this->tbofertas->fieldget('idvendedor') . '\'';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      $this->edplaza->text = $row[0];
      $this->edplaza->tag = $this->tbofertas->fieldget('idplaza');
      $this->edvendedor->Text = $row[1];
      $this->edvendedor->tag = $this->tbofertas->fieldget('idvendedor');

      //estatus
      $this->cboestatus->ItemIndex = $this->tbofertas->fieldget('idestatus');
      $this->hfestatus->Value = $this->tbofertas->fieldget('idestatus');
      $estatus = GetConfiguraciones('idestatusoferta');
      //si esta en estatus borrador
      if($this->tbofertas->fieldget('idestatus') == $estatus)
      {
         $this->habilitar(false);//habilitado
         $this->lbnotas->Enabled = true;
         $this->btnactivar->Caption = 'Activar';
         $this->btnactivar->Enabled = true;
         $this->btnactivar->Tag = 0;
			$this->btnsubir->Enabled = true;
      }
      else
      {
         $this->habilitar(true);//deshabilitado
         //si esta estatus activo
         if($this->cboestatus->ItemIndex == 90)
         {
            $this->lbnotas->Enabled = true;
            $this->btnactivar->Caption = 'Revisar';
            $this->btnactivar->Enabled = true;
				$this->btnsubir->Enabled = true;
            $this->btnactivar->Tag = 1;
         }
         else
         {
            //revisado, ganado o perdido
            $this->lbnotas->Enabled = false;
            $this->btnactivar->Enabled = false;
				$this->btnsubir->Enabled = true;
         }
      }

      if(Derechos('Modifica Financiamiento'))
      {
			if($this->cboestatus->ItemIndex=='91' || $this->cboestatus->ItemIndex=='92' ||
				$this->cboestatus->ItemIndex=='93')
			{
				$this->cbofinanciamiento->Enabled = false;
   	      $this->btnguardar->Enabled = false;
      	   $this->btnguardarcerrar->Enabled = false;
			}
			else
			{
	         $this->cbofinanciamiento->Enabled = true;
   	      $this->btnguardar->Enabled = true;
      	   $this->btnguardarcerrar->Enabled = true;
			}
      }

      //fase
      if($this->edoferta->Tag > 0)
      {
         $sql = 'select o.idfase,nombre from ofertas o ' .
         ' left join ofertasfases f  on o.idfase=f.idfase' .
         ' where idoferta=' . $this->edoferta->Text . ' and idrevision=' . $this->edrevision->Text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $row = mysql_fetch_row($rs);
         $this->edfase->Text = $row[1];
         $this->edfase->Tag = $row[0];
      }

      //modelo camion
      $this->edmodelo->text = $this->tbofertas->fieldget('modelo');
      $this->edmodelo->Tag = $this->tbofertas->fieldget('idproducto');
      if($this->tbofertas->fieldget('idtipocamion') > 0)
      {
         $sql = 'select nombre,margenutilidad from camionestipos where idtipo=' . $this->tbofertas->fieldget('idtipocamion');
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $row = mysql_fetch_row($rs);
         $this->edtipocamion->tag = $this->tbofertas->fieldget('idtipocamion');
         $this->edtipocamion->text = $row[0];
         $this->edmargen->Tag = $row[1];
      }
      $sql = 'select comentario from productos where clave="'.$this->tbofertas->fieldget('modelo').'"';
      $rs = mysql_query($sql) or die($sql);
      $row = mysql_fetch_array($rs);
      $this->eddescripcion->Text = $row['comentario'];
      $this->cbofinanciamiento->ItemIndex = $this->tbofertas->fieldget('idfinanciamiento');
      $this->hfidnota->Value = $this->tbofertas->fieldget('idnota');
      $this->edfechacreacion->Text = $this->tbofertas->fieldget('fechacreacion');
      $this->edcantcamiones->text = $this->tbofertas->fieldget('cantCamiones');
      $this->edano->text = $this->tbofertas->fieldget('ano');
      $this->edcolor->text = $this->tbofertas->fieldget('color');
      $this->edtiempoent->text = $this->tbofertas->fieldget('tiempoEntrega');
      $this->mespecifica->text = $this->tbofertas->fieldget('specEspeciales');
      $this->edchasis->text = round($this->tbofertas->fieldget('costoChasis'), 2);
      $this->edcarroceria->text = round($this->tbofertas->fieldget('costoCarroceria'), 2);
      $this->edaccesorios->text = round($this->tbofertas->fieldget('costoAccesorios'), 2);
      $this->edcostototal->text = round($this->tbofertas->fieldget('costo'), 2);
      $this->eddescuento->text = round($this->tbofertas->fieldget('descuento'), 2);
      $this->edprecio->text = round($this->tbofertas->fieldget('precio'), 2);
      $this->edtotal->text = round($this->tbofertas->fieldget('total'), 2);
      $this->cbomoneda->ItemIndex = $this->tbofertas->fieldget('moneda');
      $this->edchasis->tag = $this->tbofertas->fieldget('moneda');
      $this->edtc->text = round($this->tbofertas->fieldget('tc'), 2);
      $this->edutilidad->text = round($this->tbofertas->fieldget('utilidad'), 2);
      $this->edmargen->text = round($this->tbofertas->fieldget('pMargen'), 2);
      $sql = 'select count(idoferta) as num from ofertasdet where idoferta=' . $this->edoferta->Text;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      if($row[0] > 0)
         $this->chkequipo->Checked = true;
      else
         $this->chkequipo->Checked = false;
      //traer notas
      $this->traernotas();

      if(Derechos("Abrir ArchivoFinanciamiento"))
      {
         //adjuntos
         $this->lbadjunto->Link = 'Adjuntos/' . $this->tbofertas->fieldget('path');
         $this->lbadjunto->Caption = $this->tbofertas->fieldget('path');
         $this->hfpath->Value = $this->tbofertas->fieldget('path');
         if($this->tbofertas->fieldget('path') <> '')
            $this->lbeliminar->Caption = 'Eliminar';
      }
   }

   function Limpiar()
   {
      reset($this->datosprincipales->controls->items);
      while(list($key, $val) = each($this->datosprincipales->controls->items))
      {
         if($val->inheritsFrom("Edit"))
         {
            $val->Text = "";
            $val->tag = '';
         }
      }
      reset($this->precios->controls->items);
      while(list($key, $val) = each($this->precios->controls->items))
      {
         if($val->inheritsFrom("Edit"))
         {
            $val->Text = "";
            $val->tag = '';
         }
      }
      //$this->mnotas->Clear();
      $this->mespecifica->Clear();
      $this->cboestatus->Clear();
      $this->cbofinanciamiento->Clear();
      $this->btnactivar->tag = 0;
      $this->btnactivar->Caption = "Activar";
      $this->chkequipo->Checked = false;
      $this->hfemail->Value = '';
      $this->lbadjunto->Caption = '';
      $this->lbadjunto->Link = '';
      $this->lbeliminar->Caption = '';
   }

   function inicializa()
   {
      //trae el max id
      $sql = 'select max(idoferta)+1 as id from ofertas';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      if($row[0] == 0 || $row[0] == '')
         $this->edoferta->Text = '1';
      else
         $this->edoferta->Text = $row[0];

      //id revision
      $this->edrevision->Text = 0;

      $sql = 'select p.idplaza,p.nombre as plaza,u.idusuario,if(apaterno is not null or apaterno=\'\',' .
      'if(amaterno is not null or amaterno=\'\',' .
      ' concat(u.nombre,\' \',u.apaterno,\' \',amaterno), ' .
      'concat(u.nombre,\' \',u.apaterno)),u.nombre) as vendedor' .
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
      $sql = 'select idmoneda,moneda,tc from monedas';
      $rs = mysql_query($sql)or die('Error de consulta SQL :' . $sql);
      while($row = mysql_fetch_array($rs))
      {
         $this->cbomoneda->AddItem($row['moneda'], null , $row['idmoneda']);
         if($row['tc'] != 1)
            $this->edtc->Text = round($row['tc'], 2);
      }
      $this->cbomoneda->ItemIndex = GetConfiguraciones('idmonedadefault');

      //estatus
      $sql = 'select idclasificacion, nombre from clasificaciones where idtipo=15 order by orden';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      while($row = mysql_fetch_array($rs))
      {
         $this->cboestatus->AddItem($row['nombre'], null , $row['idclasificacion']);
      }
      $this->cboestatus->ItemIndex = GetConfiguraciones('idestatusoferta');

      //zeros campos float
      $this->edchasis->Text = '0';
      $this->edcarroceria->Text = '0';
      $this->edaccesorios->Text = '0';
      $this->eddescuento->Text = '0';
      $this->edcostototal->Text = '0';
      $this->edprecio->Text = '0';
      $this->edtotal->Text = '0';
      $this->edutilidad->Text = '0';
      $this->edmargen->Text = '0';


      //financiamiento
      $sql = 'select idclasificacion, nombre from clasificaciones c' .
      ' where idtipo=16 ';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $this->cbofinanciamiento->AddItem("Sin Clasificar", null , 0);
      while($row = mysql_fetch_array($rs))
      {
         $this->cbofinanciamiento->AddItem($row[1], null , $row[0]);
      }
      $this->cbofinanciamiento->Enabled = false;

      //fase
      $sql = 'select idfase, nombre from ofertasfases' .
      ' where idfase=1 ';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      $this->edfase->Text = $row[1];
      $this->edfase->Tag = $row[0];

      //fechacreacion
      $this->edfechacreacion->Text = date('Y-m-d');
   }
}

global $application;

global $uofertas;

//Creates the form
$uofertas = new uofertas($application);

//Read from resource file
$uofertas->loadResource(__FILE__);

//Shows the form
$uofertas->show();

?>