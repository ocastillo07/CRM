<script type='text/javascript' src='funciones.js'></script>
<?php
//modificaciones
//2010-01-30 creado por ozkar

include("dmconexion.php");
include("urecursos.php");

session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");

require_once("vcl/vcl.inc.php");
//Includes

use_unit("menus.inc.php");
use_unit("webservices.inc.php");
use_unit("comctrls.inc.php");
use_unit("mysql.inc.php");
use_unit("dbgrids.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class upresupuestos extends Page
{
   public $mobservaciones = null;
   public $Label30 = null;
   public $btnparte = null;
   public $btncliente = null;
   public $btnagregarcap = null;
   public $edimportecap = null;
   public $edpreciocap = null;
   public $edcantidadcap = null;
   public $eddescripcioncap = null;
   public $edpartecap = null;
   public $Label37 = null;
   public $Label36 = null;
   public $Label35 = null;
   public $Label31 = null;
   public $Label22 = null;
   public $btnagregar = null;
   public $lbufh = null;
   public $hfcbestatus = null;
   public $hfemail = null;
   public $hfidnota = null;
   public $hfestatus = null;
   public $hflogin = null;
   public $hfpath = null;
   public $lbhistorial = null;
   public $edatencion = null;
   public $Label33 = null;
   public $hfcosto = null;
   public $edtotal = null;
   public $edcolonia = null;
   public $Label28 = null;
   public $lbdetalle = null;
   public $Label26 = null;
   public $Label24 = null;
   public $ediva = null;
   public $cbiva = null;
   public $Label23 = null;
   public $cbestatus = null;
   public $Label19 = null;
   public $edrevision = null;
   public $Label18 = null;
   public $sqlpresupuesto = null;
   public $Costo = null;
   public $edcosto = null;
   public $edsubtotal = null;
   public $cbpersona = null;
   public $Label17 = null;
   public $ednombrecom = null;
   public $edidpresupuesto = null;
   public $edimporte = null;
   public $edprecio = null;
   public $edcantidad = null;
   public $edexistencia = null;
   public $eddescripcion = null;
   public $edparte = null;
   public $Label15 = null;
   public $Label13 = null;
   public $Label12 = null;
   public $Label11 = null;
   public $Label10 = null;
   public $Label9 = null;
   public $Label8 = null;
   public $tbpresupuestos = null;
   public $dspresupuestos = null;
   public $lbeliminar = null;
   public $btnsubir = null;
   public $lbadjunto = null;
   public $upload = null;
   public $lbnotas = null;
   public $edemail = null;
   public $edtel2 = null;
   public $edtel1 = null;
   public $edestado = null;
   public $edciudad = null;
   public $Label25 = null;
   public $Label21 = null;
   public $Tel1 = null;
   public $Label20 = null;
   public $Label16 = null;
   public $edcp = null;
   public $Label14 = null;
   public $edcalle = null;
   public $Label7 = null;
   public $edrfc = null;
   public $edamaterno = null;
   public $edapaterno = null;
   public $ednombre = null;
   public $cbpromotor = null;
   public $edfechaalta = null;
   public $edalmacen = null;
   public $edidcliente = null;
   public $Label4 = null;
   public $Label3 = null;
   public $Label2 = null;
   public $Label1 = null;
   public $Label29 = null;
   public $Label6 = null;
   public $Label5 = null;
   public $Cliente = null;
   public $Label27 = null;
   public $idpresupuesto = null;
   public $sqlnotas = null;
   public $lbtitulo = null;
   public $btnimprimir = null;
   public $btnmail = null;
   public $pbotones = null;
   public $btnregresar = null;
   public $btnactivar = null;
   public $btnguardarcerrar = null;
   public $btnguardar = null;



   function upresupuestosJSLoad($sender, $params)
   {

   ?>
   //Add your javascript code here
   var ban=0;
   if(vcl.$('cbestatus').value == '112')
      ban=1;
   else
      ban=0;

   basicAjax('upresupuestos_ajax.php','calcular=1'+
                '&idpresupuesto=' + vcl.$('edidpresupuesto').value +
                '&idrevision=' + vcl.$('edrevision').value +
                '&piva=' + vcl.$('cbiva').value +
                '&ban=' + ban +
                '&idalmacen=' + vcl.$('edalmacen').value);
   <?php

   }

   function edpreciocapJSKeyPress($sender, $params)
   {

   ?>
   //Add your javascript code here
     if( ValidaDecimal(vcl.$('edpreciocap').value, event) != event.keyCode)
        return false;
   <?php

   }

   function edcantidadcapJSKeyPress($sender, $params)
   {

   ?>
   //Add your javascript code here
     if(ValidaEntero(vcl.$('edcantidadcap').value, event) != event.keyCode)
           return false;
   <?php

   }

   function btnparteClick($sender, $params)
   {
      redirect("upartesvista.php");
   }

   function btnclienteClick($sender, $params)
   {
      redirect("uclientesgdsvista.php");
   }

   function upresupuestosAfterShow($sender, $params)
   {
      if(isset($_GET['focuscantidad']))
      {
         echo '<script language="javascript" type="text/javascript">
         	 	vcl.$("edcantidad").value="1";
					vcl.$("edcantidad").focus();
			 		</script>';
      }
   }

   function cbivaJSChange($sender, $params)
   {

?>
   //Add your javascript code here
      vcl.$('ediva').value = round((vcl.$('cbiva').options[vcl.$('cbiva').selectedIndex].text)/100 * vcl.$('edsubtotal').value,2);
		var subt=vcl.$('edsubtotal').value, iva=vcl.$('ediva').value;
		vcl.$('edtotal').value =round(parseFloat(subt)+parseFloat(iva),2);
<?php

   }

   function edpreciocapJSBlur($sender, $params)
   {

?>
   //Add your javascript code here
     if(vcl.$('edpreciocap')!='')
	  {
	  	vcl.$('edimportecap').value = round(vcl.$('edcantidadcap').value * vcl.$('edpreciocap').value,2);
	  }
<?php

   }


   function btnagregarcapJSClick($sender, $params)
   {

?>
   //Add your javascript code here
   var ban=true;
	if(vcl.$('edpartecap').value == '')
   {
      alert('Falta el Numero de Parte');
      ban=false;
   }
   if(vcl.$('eddescripcioncap').value == '')
   {
      alert('Falta la Descripcion');
      ban=false;
   }
   if(vcl.$('edcantidadcap').value == '')
   {
      alert('Falta la Cantidad');
      ban=false;
   }
   if(vcl.$('edpreciocap').value == '')
   {
      alert('Falta el Precio');
      ban=false;
   }

   if(ban)
   {
		if(vcl.$('hfestatus').value=='1')
	  	{
			basicAjax('upresupuestos_ajax.php','guardar=1&guardartemp=1'+
               '&idpresupuesto='+vcl.$('edidpresupuesto').value +
      			'&idrevision='+vcl.$('edrevision').value+
               '&idalmacen='+vcl.$('edalmacen').value +
	      		'&idestatus='+vcl.$('hfcbestatus').value+
               '&idcte='+vcl.$('edidcliente').value+
	   	   	'&atencion='+vcl.$('edatencion').value+
               '&fecha='+vcl.$('edfechaalta').value+
	   		   '&promotor='+vcl.$('cbpromotor').value +
               '&cve='+vcl.$('edpartecap').value+
               '&des='+ vcl.$('eddescripcioncap').value+
               '&cant='+ vcl.$('edcantidadcap').value+
         		'&precio='+ vcl.$('edpreciocap').value+
               '&importe='+ vcl.$('edimportecap').value+
	      		'&idpres='+ vcl.$('edidpresupuesto').value+
               '&idrevision='+ vcl.$('edrevision').value+
               '&observaciones='+vcl.$('mobservaciones').value+
	      		'&piva=' + vcl.$('cbiva').options[vcl.$('cbiva').selectedIndex].text);
	  	}
      else
		   basicAjax('upresupuestos_ajax.php','guardartemp=1&cve='+vcl.$('edpartecap').value+
                  '&idalmacen='+vcl.$('edalmacen').value +
                  '&des='+ vcl.$('eddescripcioncap').value+
                  '&cant='+vcl.$('edcantidadcap').value+
					   '&precio='+vcl.$('edpreciocap').value+
                  '&importe='+vcl.$('edimportecap').value+
   					'&idpres='+vcl.$('edidpresupuesto').value+
                  '&idrevision='+vcl.$('edrevision').value+
		   			'&piva=' + vcl.$('cbiva').options[vcl.$('cbiva').selectedIndex].text);
	}

<?php

   }

   function btnagregarJSClick($sender, $params)
   {

?>
   //Add your javascript code here
    if(vcl.$('edparte').value != '')
	 {
		$ban = true;
		if(vcl.$('hfestatus').value=='1')
	  	{
			if(vcl.$('cbpromotor').selectedIndex == 0)
			{
				alert('No has seleccionado el Promotor');
				$ban=false;
			}
			if(vcl.$('edatencion').value == '')
			{
				alert('No has ingresado el Campo Atencion');
				$ban=false;
			}
			if(vcl.$('edidcliente').value == '')
			{
				alert('No has seleccionado al Cliente');
				$ban=false;
			}
			if($ban)
			basicAjax('upresupuestos_ajax.php','guardar=1&guardardet=1'+
            '&idpresupuesto='+vcl.$('edidpresupuesto').value +
			   '&idrevision='+vcl.$('edrevision').value+
            '&idalmacen='+vcl.$('edalmacen').value +
			   '&idestatus='+vcl.$('hfcbestatus').value+
            '&idcte='+vcl.$('edidcliente').value+
			   '&atencion='+vcl.$('edatencion').value+
            '&fecha='+vcl.$('edfechaalta').value+
			   '&promotor='+vcl.$('cbpromotor').value +
            '&parte='+ vcl.$('edparte').value+
				'&cantidad='+ vcl.$('edcantidad').value+
            '&costo='+ vcl.$('edcosto').value+
				'&precio='+ vcl.$('edprecio').value+
            '&importe='+ vcl.$('edimporte').value+
				'&login='+ vcl.$('hflogin').value +
            '&observaciones='+ vcl.$('mobservaciones').value +
            '&piva=' + vcl.$('cbiva').options[vcl.$('cbiva').selectedIndex].text);
	  	}
		else
         basicAjax('upresupuestos_ajax.php','guardardet=1'+
                '&idpresupuesto='+ vcl.$('edidpresupuesto').value+
				    '&idrevision='+ vcl.$('edrevision').value+
                '&idalmacen='+vcl.$('edalmacen').value +
                '&parte='+ vcl.$('edparte').value+
				    '&cantidad='+ vcl.$('edcantidad').value+
                '&costo='+ vcl.$('edcosto').value+
				    '&precio='+ vcl.$('edprecio').value+
                '&importe='+ vcl.$('edimporte').value+
				    '&login='+ vcl.$('hflogin').value +
                '&piva=' + vcl.$('cbiva').options[vcl.$('cbiva').selectedIndex].text);
	}
	else
	{
		alert('Debes Seleccionar un numero de parte');
		vcl.$('edparte').focus();
	}
<?php

   }

   function cbestatusChange($sender, $params)
   {
      if($this->cbestatus->ItemIndex == '112' || $this->cbestatus->ItemIndex == '113')
      {
         echo '<script language="javascript" type="text/javascript">
            alert(\'No puedes poner este estatus\');
          	</script>';
         $this->cbestatus->ItemIndex = $this->hfcbestatus->Value;
      }
      else if($this->cbestatus->ItemIndex == '114')//revisado
      {
         $this->revisar();
      }
      else if($this->cbestatus->ItemIndex == '115')//ganado
      {
         echo '<script language="javascript" type="text/javascript">
                  if(confirm("Deseas Cambiar de Estatus al Presupuesto?"))
                  {
						  document.location.href("uventas.php?idpresupuesto=' .
         $this->edidpresupuesto->Text . '&idrevision=' . $this->edrevision->text .
         '&idalmacen=' . $this->edalmacen->Text . '&idpromotor=' . $this->cbpromotor->ItemIndex .
         '&promotor=' . $this->cbpromotor->Items[$this->cbpromotor->ItemIndex] . '&idcliente=' .
         $this->edidcliente->Text . '&cliente=' . $this->ednombrecom->text . '&piva=' .
         $this->cbiva->Items[$this->cbiva->ItemIndex] . '&subtotal=' .
         $this->edsubtotal->text . '&iva=' . $this->ediva->text . '&total=' . $this->edtotal->Text . '");
                  }
                  </script>';
         $this->cbestatus->ItemIndex = $this->hfcbestatus->Value;
      }
      else if($this->cbestatus->ItemIndex == '116')//perdido
      {
         echo '<script language="javascript" type="text/javascript">
                  if(confirm("Deseas Cambiar de Estatus al Presupuesto?"))
                  {
						  document.location.href("upresupuestosperdido.php?idpresupuesto=' .
         $this->edidpresupuesto->Text . ' &idrevision=' . $this->edrevision->text . '");
                  }
                  </script>';
         $this->cbestatus->ItemIndex = $this->hfcbestatus->Value;
      }
   }

   function lbhistorialClick($sender, $params)
   {
      $this->guardar();
      $sql = 'select idnota from represupuestos where idpresupuesto=' . $this->edidpresupuesto->Text;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);

      if($row[0] > 0)
         redirect('unotas.php?idnota=' . $row[0] . '&procedencia=represupuestos&idprocedencia=' . $this->edidpresupuesto->Text .
         '&idrevision=' . $this->edrevision->Text);
      else
      {
         $idnota = 0;
         redirect('unotas.php?idnota=' . $idnota . '&procedencia=represupuestos&idprocedencia=' . $this->edidpresupuesto->Text .
         '&idrevision=' . $this->edrevision->Text);
      }
   }

   function edamaternoJSBlur($sender, $params)
   {
?>
       //Add your javascript code here
       	if(vcl.$('cbpersona').selectedIndex=='1')
			{
				vcl.$('ednombrecom').value=vcl.$('ednombre').value+' '+vcl.$('edapaterno').value+' '+vcl.$('edamaterno').value;
				vcl.$('ednombrecom').readOnly=true;
			}
			if(vcl.$('cbpersona').selectedIndex=='2')
			{
				vcl.$('ednombre').value='';
				vcl.$('edapaterno').value='';
				vcl.$('edamaterno').value='';
			}
<?php

   }

   function edprecioJSKeyPress($sender, $params)
   {
?>
       //Add your javascript code here
          // 43=+
			 //alert(event.keyCode);
		if(event.keyCode=='43')
		{
			if(vcl.$('edparte').value != '')
			{
				$ban = true;
				if(vcl.$('hfestatus').value=='1')
				{
					if(vcl.$('cbpromotor').selectedIndex == 0)
					{
						alert('No has seleccionado el Promotor');
						$ban=false;
					}
					if(vcl.$('edatencion').value == '')
					{
						alert('No has ingresado el Campo Atencion');
						$ban=false;
					}
					if(vcl.$('edidcliente').value == '')
					{
						alert('No has seleccionado al Cliente');
						$ban=false;
					}
					if($ban)
						basicAjax('upresupuestos_ajax.php','guardar=1&guardardet=1'+
                  '&idpresupuesto='+ vcl.$('edidpresupuesto').value +
						'&idrevision='+ vcl.$('edrevision').value+
                  '&idalmacen='+ vcl.$('edalmacen').value +
						'&idestatus='+ vcl.$('hfcbestatus').value+
                  '&idcte='+ vcl.$('edidcliente').value+
						'&atencion='+ vcl.$('edatencion').value+
                  '&fecha='+ vcl.$('edfechaalta').value+
						'&promotor='+ vcl.$('cbpromotor').value +
                  '&parte='+ vcl.$('edparte').value +
                  '&cantidad='+ vcl.$('edcantidad').value+
                  '&costo='+ vcl.$('edcosto').value +
                  '&precio='+ vcl.$('edprecio').value+
                  '&importe='+ vcl.$('edimporte').value+
                  '&observaciones='+vcl.$('mobservaciones').value+
                  '&piva='+ vcl.$('cbiva').options[vcl.$('cbiva').selectedIndex].text
                  );
				}
            else
					basicAjax('upresupuestos_ajax.php','guardardet=1'+
                        '&idpresupuesto='+vcl.$('edidpresupuesto').value+
						      '&idrevision='+vcl.$('edrevision').value+
                        '&idalmacen='+ vcl.$('edalmacen').value +
                        '&parte='+vcl.$('edparte').value+
						      '&cantidad='+vcl.$('edcantidad').value+
                        '&costo='+vcl.$('edcosto').value+
						      '&precio='+vcl.$('edprecio').value+
                        '&importe='+vcl.$('edimporte').value+
                        '&piva='+vcl.$('cbiva').options[vcl.$('cbiva').selectedIndex].text);
			}
			else
			{
				alert('Debes Seleccionar un numero de parte');
				vcl.$('edparte').focus();
			}
		}
		if( ValidaDecimal(vcl.$('edprecio').value, event) != event.keyCode)
        return false;
<?php

   }

   function edcantidadJSKeyPress($sender, $params)
   {
?>
       //Add your javascript code here
       	if(ValidaEntero(vcl.$('edcantidad').value, event) != event.keyCode)
           return false;
<?php

   }

   function edcantidadJSBlur($sender, $params)
   {

?>
       //Add your javascript code here
        		vcl.$('edimporte').value=round(vcl.$('edcantidad').value * vcl.$('edprecio').value,2);
<?php

   }

   function edemailJSBlur($sender, $params)
   {

?>
       //Add your javascript code here
		 	var id=document.getElementById("edidcliente").value;
		 	if(id=='9999999999')
			{
          	var params='tipo="insertacliente"' +
						  '&nombre='+vcl.$('ednombre').value +
						  '&apaterno='+vcl.$('edapaterno').value +
						  '&amaterno='+vcl.$('edamaterno').value +
						  '&rsocial='+vcl.$('ednombrecom').value +
						  '&rfc='+vcl.$('edrfc').value +
						  '&direccion='+vcl.$('edcalle').value +
						  '&cp='+vcl.$('edcp').value +
						  '&colonia='+vcl.$('edcolonia').value +
						  '&ciudad='+vcl.$('edciudad').value +
						  '&estado='+vcl.$('edestado').value +
						  '&tel1='+vcl.$('edtel1').value +
						  '&tel2='+vcl.$('edtel2').value +
						  '&email='+vcl.$('edemail').value +
						  '&login='+vcl.$('hflogin').value;
				basicAjax("upresupuestos_ajax.php",params);
			}
<?php

   }

   function traedetalle($ban)
   {
      $sql = 'select p.cveparte, descripcion,r.existencia, cantidad, p.costo,
				 p.precio, p.importe, p.idcontador, "1" as tabla
				 from represupuestosdet p left join repartes r
             on r.cveparte=p.cveparte and r.idalmacen='.$this->edalmacen->text.
				 ' where idpresupuesto=' . $this->edidpresupuesto->Text . ' and idrevision=' . $this->edrevision->Text .
      ' union select cveparte, descripcion,"0" as existencia,cantidad, costo,
				 precio, importe, idcontador, "2" as tabla
				 from represupuestosdettemp
				 where idpresupuesto=' . $this->edidpresupuesto->Text . ' and idrevision=' . $this->edrevision->Text;
      $rs = mysql_query($sql)or die('Error de consulta SQL ' . $sql);
      $t = '<div style="width:700x; height:100px; overflow:auto">
			 		<table style="font-family: Verdana; font-size: 10px;  background-color: #C0C0C0;" width="700">
                  <tbody>
                    <tr style="background-color: #ff8040">
                      <td>Parte</td>
                      <td>Descripcion</td>
                      <td>Existencia</td>
							 <td>Cantidad</td>
							 <td>Costo</td>
							 <td>Precio</td>
							 <td>Importe</td>
							 <td></td>
                    </tr>';
      while($row = mysql_fetch_array($rs))
      {
         $t .= '<tr align="right">
                      <td align="left">' . $row['cveparte'] . '</td>
                      <td align="left">' . $row['descripcion'] . '</td>
                      <td>' . $row['existencia'] . '</td>
							 <td>' . $row['cantidad'] . '</td>
                      <td>' . $row['costo'] . '</td>
                      <td>' . $row['precio'] . '</td>
							 <td>' . $row['importe'] . '</td>';
         if($ban)
         {
            $params = 'idpresupuesto=' . $this->edidpresupuesto->text . '&idrevision=' .
            $this->edrevision->Text . '&idcontador=' . $row['idcontador'] . '&ban=' . $ban .
            '&tabla=' . $row['tabla'] . '&piva=' . $this->cbiva->ItemIndex;
            $t .= '<td>
               			<div align="left">
									<a onclick="basicAjax(\'upresupuestos_ajax.php\',\'' . $params . '\');" href="#">Eliminar</a>
								</div>
               		 </td>';
         }
         $t .= '</tr>';
      }
      $t .= '</tbody></table></div><font size="1" face="Verdana">
				  <span><strong>Total&nbsp;Partidas:&nbsp;&nbsp;' . mysql_num_rows($rs) . '</strong></span></font>';
      return $t;
   }

   function edparteJSBlur($sender, $params)
   {

?>
       //Add your javascript code here
         var params='traeparte=1&cveparte='+ vcl.$('edparte').value+'&idalmacen='+vcl.$('edalmacen').value;
			basicAjax("upresupuestos_ajax.php",params);
<?php

   }

   function edidclienteJSBlur($sender, $params)
   {

?>
       //Add your javascript code here
		 	if(vcl.$('edidcliente').value!='')
			{
        		var params='traecliente=1&idcliente='+vcl.$('edidcliente').value;
				basicAjax("upresupuestos_ajax.php",params);
			}
<?php
   }

   function lbeliminarClick($sender, $params)
   {
      if(Derechos('Eliminar ArchivoPresupuesto') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Eliminar el Archivo");
               </script>';
      }
      else
      {
         unlink('Adjuntos/' . $this->lbadjunto->Caption);
         $this->hfpath->Value = '';
         $sql = ' update represupuestos set path="' . $this->hfpath->Value .
         '" where idpresupuesto =' . $this->edidpresupuesto->Text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->lbadjunto->Caption = '';
         $this->lbeliminar->Caption = '';
      }
   }

   function btnsubirClick($sender, $params)
   {
      if(Derechos('Subir ArchivoPresupuesto') == false)
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
                     $sql = ' update represupuestos set path="' . $this->hfpath->Value .
                     '" where idpresupuesto =' . $this->edidpresupuesto->Text;
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

   function btnmailClick($sender, $params)
   {
      if($this->edemail->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
                      alert(\'El Cliente No tiene Capturado el Correo!\');
                    </script>';
      }
      else
      {
         echo '<script language="javascript" type="text/javascript">
			 		var ban=0;
			 		if(confirm("Deseas EXHIBIR los Numeros de Parte?"))
						ban=1;
			 		window.open("http://' . GetConfiguraciones('ipserver') . ':8080/imprimirpdf.jsp?"+
					"reporte=presupuesto&tiporeporte=pdf&idpresupuesto=' .
               $this->edidpresupuesto->Text . '&idrevision=' . $this->edrevision->text .
               '&partes="+ban+"&idalmacen='.$this->edalmacen->text.'", "_blank");
					var largo = 768;
					var altura = 520;
					var top = (screen.height-altura)/2;
					var izquierda = (screen.width-largo)/2;
					window.open("ucorreo.php?&idpresupuesto=' . $this->edidpresupuesto->Text . '&name=' .
         $this->cbpromotor->Items[$this->cbpromotor->ItemIndex] . '&to=' . $this->edemail->Text . '&' .
         'subject=Presupuesto IBC&attach=presupuesto' . $this->edidpresupuesto->Text . '.pdf", "_blank",
					"resizable=no,menubar=no,titlebar=yes,width="+largo+",height="+altura+",top="+top+",left="+izquierda);
         </script>';
      }
   }

   function btnimprimirClick($sender, $params)
   {
      echo '<script language="javascript" type="text/javascript">
			 var ban=0;
			 if(confirm("Deseas EXHIBIR los Numeros de Parte?"))
				ban=1;
			 window.open("http://' . GetConfiguraciones('ipserver') . ':8080/imprimir.jsp?"+
				"reporte=presupuesto&tiporeporte=pdf&idpresupuesto=' .
      $this->edidpresupuesto->Text . '&idrevision=' . $this->edrevision->text .
      '&partes="+ban+"&idalmacen='.$this->edalmacen->text.'", "_blank");
         </script>';
   }

   function btnguardarcerrarClick($sender, $params)
   {
      $this->guardar();
      redirect('upresupuestosvista.php');
   }

   function btnregresarClick($sender, $params)
   {
      redirect('upresupuestosvista.php');
   }

   function revisar()
   {
      //sacar el maximo idrevision
      $sql = 'select max(idrevision)+1 as max from represupuestos where idpresupuesto=' . $this->edidpresupuesto->Text;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      $idrev = $row[0];
      $idofe = $this->edidpresupuesto->Text;
      //insertar el presupuesto
      $sql = 'insert into represupuestos (idpresupuesto,idrevision,idalmacen,idpromotor,
				idcliente,idestatus,idnota,fechacreacion,idmoneda,tc,piva,costo,importe,descuento,
				subtotal,iva,total,totalmn,path,usuario,fecha,hora,atencion,observaciones)
				SELECT p.idpresupuesto,' . $idrev . ',p.idalmacen,p.idpromotor,p.idcliente,"112",
				p.idnota,p.fechacreacion,p.idmoneda,p.tc,p.piva,p.costo,p.importe,p.descuento,
				p.subtotal,p.iva,p.total,p.totalmn,p.path,p.usuario,p.fecha,p.hora,atencion,observaciones
				FROM represupuestos AS p WHERE p.idpresupuesto =  ' . $this->edidpresupuesto->Text .
      ' and idrevision=' . $this->edrevision->Text;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      //insertar el detalle
      $sql = 'insert into represupuestosdet(idpresupuesto,idrevision,cveparte,cantidad,
				 		costo,precio,importe,usuario,fecha,hora)
						SELECT d.idpresupuesto,' . $idrev . ',d.cveparte,d.cantidad,d.costo,d.precio,d.importe,
						d.usuario,d.fecha,d.hora
						FROM represupuestosdet AS d WHERE d.idpresupuesto =' . $this->edidpresupuesto->Text .
                  ' AND d.idrevision = ' . $this->edrevision->Text;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      //insertar detalle temp por las partes que son capturadas manualmente
		//insertar el detalle
      $sql = 'insert into represupuestosdettemp(idpresupuesto,idrevision,cveparte,descripcion,cantidad,
				 		costo,precio,importe,usuario,fecha,hora)
						SELECT d.idpresupuesto,' . $idrev . ',d.cveparte,d.descripcion,d.cantidad,d.costo,d.precio,d.importe,
						d.usuario,d.fecha,d.hora
						FROM represupuestosdettemp AS d WHERE d.idpresupuesto =' . $this->edidpresupuesto->Text .
      				' AND d.idrevision = ' . $this->edrevision->Text;
		$rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
		//cambiar el estatus a revisada
      $sql = 'update represupuestos set idestatus=114 where idpresupuesto=' . $this->edidpresupuesto->Text .
      ' and idrevision=' . $this->edrevision->Text;
      $rs = mysql_query($sql)or die('Error consulta SQL: ' . $sql);

      $this->Limpiar();
      $this->inicializa();
      $this->locate($idofe, $idrev);
   }

   function btnactivarClick($sender, $params)
   {
      //revisar datos del cliente "completos"
      if($this->btnactivar->Tag == 1)
      {
         $this->revisar();
      }
      else //activar
      {
         $r = $this->Validar();
         if($r == true)
         {
            $this->guardar();
				$sql = 'select count(*) as t from (select idpresupuesto from represupuestosdet
                   where idpresupuesto='.$this->edidpresupuesto->Text.' union
                   select idpresupuesto from represupuestosdettemp where idpresupuesto='.
                   $this->edidpresupuesto->Text.') as tab';

				$rs = mysql_query($sql) or die('Error de consulta SQL: '.$sql);
				$row = mysql_fetch_row($rs);
				if($row[0] == 0)
				{
					echo '<script language="javascript" type="text/javascript">
             		alert(\' No Tienes Ninguna Parte Agregada\');
           			</script>';
				}
				else
				{
            	$this->cbestatus->ItemIndex = 113;
            	$this->btnactivar->Caption = 'Revisar';
            	//poner estatus del boton a revision
            	$this->btnactivar->Tag = 1;
            	$sql = 'update represupuestos set idestatus=113
						   where idpresupuesto=' . $this->edidpresupuesto->Text . ' and idrevision=' .
            	      $this->edrevision->text;
            	$rs = mysql_query($sql)or die('Error consulta SQL: ' . $sql);
            	$this->habilitar(false);
               $this->lbdetalle->Caption = $this->traedetalle(false);
            	$this->btnimprimir->Enabled = true;
            	$this->btnmail->Enabled = true;
            	if($this->cbpersona->ItemIndex == 'M')
            	   $nombre= $this->ednombrecom->Text;
            	else
             	  $nombre=  $this->ednombre->Text . " " . $this->edapaterno->Text . " " . $this->edamaterno->Text."\r\n";

               $sql = 'select p.cveparte, descripcion,r.existencia, cantidad, p.costo, p.precio,
			              p.importe, p.idcontador, "1" as tabla
			              from represupuestosdet p left join repartes r on r.cveparte=p.cveparte and r.idalmacen='.$this->edalmacen->text.
			              ' where idpresupuesto='.$this->edidpresupuesto->text  .
                       ' and idrevision='.$this->edrevision->text.
		                 ' union select cveparte, descripcion,"0" as existencia,cantidad, costo,
		                 precio, importe, idcontador, "2" as tabla
		                 from represupuestosdettemp
		                 where idpresupuesto='.$this->edidpresupuesto->text.' and idrevision='.$this->edrevision->text;
               $rs = mysql_query($sql) or die('Error de Consulta SQl: '.$sql);
               $detalle='';
               while($row = mysql_fetch_array($rs))
               {
                  $detalle.= " ". $row['cantidad']."\t\t".$row['cveparte']."\t\t".$row['descripcion']."     \t\t\t".$row['precio']."\t\t".$row['importe']."\r\n";
               }

               $msn = "Presupuesto No. " . $this->edidpresupuesto->Text ."-".$this->edrevision->Text."
Activado por el Promotor: " . $this->cbpromotor->Items[$this->cbpromotor->ItemIndex] ."
Cliente: " . $this->edidcliente->Text." ".$nombre.

"
\r\n
Detalle de la Venta:
\r\n
Cantidad\tCveparte\t\tDescipcion\t\t\tPrecio\t\tImporte
".$detalle."
\r\n
Subtotal: ".$this->edsubtotal->text;
               if($this->edalmacen->Text == '1')
                  $correos= GetConfiguraciones('mailrefaccionesAL01');
               if($this->edalmacen->Text == '2')
                  $correos= GetConfiguraciones('mailrefaccionesAL02');
               if($this->edalmacen->Text == '3')
                  $correos= GetConfiguraciones('mailrefaccionesAL03');

               //enviarmail(GetConfiguraciones('mailsistema'),$correos, 'Aviso de PRESUPUESTO ACTIVADO', $msn);
               enviarmailattach(GetConfiguraciones('mailsistema'), 'Sistema de CRM', $correos, 'Varios', 'AVISO DE PRESUPUESTO ACTIVADO', $msn, '', '');
               echo '<script language="javascript" type="text/javascript">
                          alert(\'Presupuesto Activado: \');
                        </script>';

				}
         }
      }
   }

   function habilitar($ban)
   {
      $this->cbestatus->Enabled = !$ban;
      $this->cbpromotor->Enabled = $ban;
      //$this->cbpersona->Enabled = $ban;
      $this->edatencion->ReadOnly = !$ban;
      $this->mobservaciones->ReadOnly = !ban;
      $this->edidcliente->ReadOnly = !$ban;
      $this->edparte->ReadOnly = !$ban;
      $this->eddescripcion->ReadOnly = !$ban;
      $this->edcantidad->ReadOnly = !$ban;
      $this->edprecio->ReadOnly = !$ban;
      $this->edpartecap->ReadOnly = !$ban;
      $this->eddescripcioncap->ReadOnly = !$ban;
      $this->edcantidadcap->ReadOnly = !$ban;
      $this->edpreciocap->ReadOnly = !$ban;
      $this->edimportecap->ReadOnly = !$ban;
      $this->cbiva->Enabled = $ban;
      $this->btnsubir->Enabled = $ban;
      $this->btncliente->Enabled = $ban;
      $this->btnparte->Enabled = $ban;
      $this->btnagregar->Enabled = $ban;
      $this->btnagregarcap->Enabled = $ban;
   }

   function traernotas()
   {
      $sql = 'select idnota from represupuestos where idpresupuesto=' . $this->edidpresupuesto->Text;
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
      }
      $this->lbhistorial->Caption = $t;
   }

   function btnguardarClick($sender, $params)
   {
      $r = $this->Validar();
      if($r == true)
         $this->guardar();
      //else
      //	$this->locate($this->edidpresupuesto->Text,$this->edrevision->text);
   }

   function guardar()
   {
      $this->cbpersona->Enabled = true;
      if($this->hfestatus->Value == '1')
      {
         $this->tbpresupuestos->open();
         $this->tbpresupuestos->insert();
         $this->edidpresupuesto->Text = MaxId('represupuestos', 'idpresupuesto') + 1;
         $this->tbpresupuestos->fieldset("idpresupuesto", $this->edidpresupuesto->Text);
         $msg = "Creo el Presupuesto No. " . $this->edidpresupuesto->Text;
         $nivel = 1;
         $ban = true;
      }
      else
      {
         if(Derechos('Modificar Presupuestos') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Presupuestos");
                 document.location.href("upresupuestosvista.php");
                  </script>';
            $ban = false;
         }
         else
         {
            $this->tbpresupuestos->close();
            $this->tbpresupuestos->writeFilter('idpresupuesto=' . $this->edidpresupuesto->Text .
            ' and idrevision=' . $this->edrevision->Text);
            $this->tbpresupuestos->refresh();
            $this->tbpresupuestos->open();
            $this->tbpresupuestos->Edit();
            $msg = "Edito el Presupuesto No. " . $this->edidpresupuesto->Text;
            $nivel = 2;
            $ban = true;
         }
      }
      if($ban)
      {
         $this->tbpresupuestos->fieldset('idrevision', $this->edrevision->text);
         $this->tbpresupuestos->fieldset('idalmacen', $this->edalmacen->Text);
         $this->tbpresupuestos->fieldset('idpromotor', $this->cbpromotor->ItemIndex);
         $this->tbpresupuestos->fieldset('atencion', strtoupper($this->edatencion->Text));
         $this->tbpresupuestos->fieldset('idcliente', $this->edidcliente->text);
         $this->tbpresupuestos->fieldset('idestatus', $this->cbestatus->ItemIndex);
         $this->tbpresupuestos->fieldset('idnota', $this->hfidnota->Value);
         $this->tbpresupuestos->fieldset('fechacreacion', $this->edfechaalta->Text);
         $this->tbpresupuestos->fieldset('idmoneda', '1');
         $this->tbpresupuestos->fieldset('tc', '1');
         $this->tbpresupuestos->fieldset('piva', $this->cbiva->ItemIndex);
         $this->tbpresupuestos->fieldset('costo', $this->hfcosto->Value);
         $this->tbpresupuestos->fieldset('importe', $this->edsubtotal->Text);
         //$this->tbpresupuestos->fieldset('descuento', $this->eddescuento->Text);
         $this->tbpresupuestos->fieldset('subtotal', $this->edsubtotal->Text);
         $this->tbpresupuestos->fieldset('iva', $this->ediva->Text);
         $this->tbpresupuestos->fieldset('total', $this->edtotal->Text);
         $this->tbpresupuestos->fieldset('totalmn', $this->edtotal->text);
         $this->tbpresupuestos->fieldset('path', $this->lbadjunto->Caption);
         $this->tbpresupuestos->fieldset('observaciones', $this->mobservaciones->Text);
         $this->tbpresupuestos->fieldset("usuario", $_SESSION["login"]);
         $this->tbpresupuestos->fieldset("fecha", Fecha());
         $this->tbpresupuestos->fieldset("hora", Hora());
         $this->tbpresupuestos->post();
         $this->hfestatus->Value = 2;
         $this->tbpresupuestos->Active = false;
         dmconexion::Log($msg, $nivel);
         $this->cbpersona->Enabled = false;
      }
   }

   function Validar()
   {
      //promotor
      if($this->cbpromotor->ItemIndex == '0')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el Promotor");
             </script>';
         return false;
      }

		$atencion = $this->edatencion->text;
		if(empty($atencion))
		{
			echo '<script language="javascript" type="text/javascript">
             alert("Falta el Campo Atencion");
             </script>';
         return false;
		}

      //cliente
      $id = $this->edidcliente->Text;
      if(empty($id))
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el Cliente");
             </script>';
         return false;
      }

      return true;
   }


   function upresupuestosShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"] - 160;
      $this->lbtitulo->Caption = $this->Caption;
      $this->hflogin->Value = $_SESSION["login"];
      if(isset($_GET['idcliente']))
      {
         $sql = 'select rsocial,nombre,apaterno,amaterno,rfc,direccion,cp,municipio,estado,colonia,
  		  		tel1,tel2,email,persona from clientesgds where idcliente=' . $_GET['idcliente'];
         $rs = mysql_query($sql)or die('Error de SQL :' . $sql);
         $row = mysql_fetch_array($rs);
         $this->edidcliente->Text = $_GET['idcliente'];
         $this->ednombrecom->Text = $row['rsocial'];
         $this->ednombre->text = $row['nombre'];
         $this->edapaterno->text = $row['apaterno'];
         $this->edamaterno->text = $row['amaterno'];
         $this->edrfc->text = $row['rfc'];
         $this->edcalle->Text = $row['direccion'];
         $this->edcp->Text = $row['cp'];
         $this->edciudad->Text = $row['municipio'];
         $this->edestado->Text = $row['estado'];
         $this->edtel1->Text = $row['tel1'];
         $this->edtel2->Text = $row['tel2'];
         $this->edemail->Text = $row['email'];
         $this->cbpersona->ItemIndex = $row['persona'];
         $this->edcolonia->text = $row['colonia'];
			$this->lbdetalle->Caption = $this->traedetalle(true);
      }
      if(isset($_GET['cveparte']))
      {
         $sql ='SELECT p.descripcion,p.existencia,
               round(if(p.moneda=2,p.precio*m.tc,p.precio),2) as precio,
               round(if(p.moneda=2,p.costo*m.tc,p.costo),2) as costo
               FROM repartes as p
               left join monedas as m on m.idmoneda=1
               where cveparte="'.$_GET['cveparte'].'" and idalmacen='.$_GET['idalmacen'];
         $rs = mysql_query($sql)or die('Error de SQL :' . $sql);
         $row = mysql_fetch_array($rs);
         $this->edparte->Text = $_GET['cveparte'];
         $this->eddescripcion->Text = $row['descripcion'];
         $this->edexistencia->text = $row['existencia'];
         $this->edcantidad->text = '1';
         $this->edcosto->Text = $row['costo'];
         $this->edprecio->Text = $row['precio'];
         $this->edimporte->Text = $row['precio'];
      }
      if(isset($_GET['idprocedencia']))
      {
         $this->hfidnota->Value = $_GET['idnota'];
         $sql = 'update ofertas set idnota=' . $_GET['idnota'] . ' where idpresupuesto=' . $this->edidpresupuesto->Text;
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->traernotas();
      }
      if(isset($_GET['idpresupuesto']))
      {
         //nuevo registro
         $this->edidpresupuesto->Text = ($_GET['idpresupuesto']);
         if($this->edidpresupuesto->Text == '0')
         {
            $this->habilitar(true);
            $this->btnimprimir->Enabled = false;
            $this->btnmail->Enabled = false;
            $this->Limpiar();
            $this->inicializa();
            $this->hfidnota->value = 0;
            $this->hfcosto->Value = 0;
            //borrador
            $this->cbestatus->ItemIndex = 112;
            $this->hfcbestatus->value = 112;
            $this->hfestatus->Value = '1';
         }
         //modificacion
         else if($this->edidpresupuesto->Text > '0')
         {
            $this->Limpiar();
            $this->inicializa();
            $this->hfestatus->Value = '2';
            $this->locate($_GET['idpresupuesto'], $_GET['idrevision']);
            if(Derechos('Modificar Presupuestos') == false)
            {
               $this->habilitar(false);
               $this->cbestatus->Enabled = false;
            }
            //eliminar
            if(isset($_GET['elim']))
            {
               if(Derechos('Eliminar Presupuestos') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                  			alert("No Tienes Derechos para Eliminar Presupuestos");
									window.location="upresupuestosvista.php";
                  			</script>';
               }
               else
               {
                  $this->locate($_GET['idpresupuesto'], $_GET['idrevision']);
						$this->tbpresupuestos->open();
                  $this->tbpresupuestos->delete();
                  $this->tbpresupuestos->Active = false;

                  //se eliminan las notas del presupuesto
                  $sql = "Delete from notas where idnota = '" . $this->hfidnota->Value . "'";
                  $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

                  dmconexion::Log("Elimino el presupuesto No. " . $this->edidpresupuesto->Text .
                  " del Cliente " . $this->edidcliente->Text . " ", 3);
                  redirect("upresupuestosvista.php");
               }
            }
         }
      }
      //eliminadetalle
      else if(isset($_GET['eliminadet']))
      {
         $sql = "Delete from represupuestosdet where idcontador ='" . $_GET['eliminadet'] . "'";
         $r = mysql_query($sql)or die("error sql: " . $rsm . " " . mysql_error());
         $this->lbdetalle->Caption = $this->traedetalle(true);
      }
      /*if($_REQUEST['cbestatus']>112)
      $this->lbdetalle->Caption = $this->traedetalle(false);
      else
      $this->lbdetalle->Caption = $this->traedetalle(true);    */
   }

   function locate($idpresupuesto, $idrevision)
   {
      $this->sqlpresupuesto->close();
      $nom = NombreMoral('c');
      $r = ufh('p');
      $sql = 'SELECT p.idpresupuesto,p.idalmacen,p.idpromotor,p.idestatus,p.atencion,
					p.fechacreacion,p.idmoneda,p.tc,p.piva,p.costo,p.importe,p.subtotal,
					p.iva,p.total,p.totalmn,p.usuario,p.fecha,p.hora,c.idcliente,c.rsocial,
					c.nombre,c.apaterno,c.amaterno,c.persona,c.rfc, c.direccion,c.cp,c.colonia,
					c.municipio,c.estado,c.tel1,c.tel2,c.email, p.idnota,observaciones,p.path,' . $r . ' as ufh
					FROM represupuestos AS p
					Inner Join clientesgds AS c ON p.idcliente = c.idcliente
					where idpresupuesto=' . $idpresupuesto . ' and idrevision=' . $idrevision;
      $rs = mysql_query($sql) or die('Error de consulta SQL: '.$sql);
      $row = mysql_fetch_array($rs);
      //$this->sqlpresupuesto->SQL = $sql;
      //$this->sqlpresupuesto->open();
		$this->tbpresupuestos->setFilter('idpresupuesto=' . $idpresupuesto .
      ' and idrevision=' . $idrevision);
      $this->edidpresupuesto->Text = $idpresupuesto;
      $this->edrevision->text = $idrevision;
      $this->cbestatus->ItemIndex = $row['idestatus'];
      $this->hfcbestatus->Value = $row['idestatus'];
      if($this->cbestatus->ItemIndex == 112)//borrador
      {
         $this->btnactivar->Caption = 'Activar';
         $this->btnactivar->Tag = 0;
         $this->btnactivar->Enabled = true;
         $this->habilitar(true);
         $this->btnimprimir->Enabled = false;
         $this->btnmail->Enabled = false;
         $this->lbdetalle->Caption = $this->traedetalle(true);
      }
      else if($this->cbestatus->ItemIndex == 113)//pendiente o activado
      {
         $this->btnactivar->Caption = 'Revisar';
         $this->btnactivar->Tag = 1;
         $this->habilitar(false);
         $this->cbestatus->Enabled = true;
         $this->btnimprimir->Enabled = true;
         $this->btnmail->Enabled = true;
         $this->lbdetalle->Caption = $this->traedetalle(false);
      }
      else //revisado, ganado, perdido
      {
         $this->btnactivar->Enabled = false;
         $this->habilitar(false);
         $this->mobservaciones->ReadOnly = true;
         $this->btnimprimir->Enabled = false;
         $this->btnmail->Enabled = false;
         $this->cbestatus->Enabled = false;
         $this->upload->Enabled = false;
         $this->btnsubir->Enabled = false;
         $this->lbnotas->Enabled = false;
         $this->lbhistorial->Enabled = false;
         $this->lbdetalle->Caption = $this->traedetalle(false);
      }

      $this->edalmacen->Text = $row['idalmacen'];
      $this->edfechaalta->text = $row['fechacreacion'];
      $this->cbpromotor->ItemIndex = $row['idpromotor'];
      $this->cbpersona->ItemIndex = $row['persona'];
      $this->edatencion->Text = $row['atencion'];
      $this->edidcliente->Text = $row['idcliente'];
      $this->ednombre->Text = $row['nombre'];
      $this->edapaterno->Text = $row['apaterno'];
      $this->edamaterno->Text = $row['amaterno'];
      $this->ednombrecom->Text = $row['rsocial'];
      $this->edrfc->Text = $row['rfc'];
      $this->edcalle->Text = $row['direccion'];
      $this->edcp->Text = $row['cp'];
      $this->edcolonia->Text = $row['colonia'];
      $this->edciudad->Text = $row['municipio'];
      $this->edestado->Text = $row['estado'];
      $this->edtel1->Text = $row['tel1'];
      $this->edtel2->Text = $row['tel2'];
      $this->edemail->Text = $row['email'];
      $this->hfidnota->value = $row['idnota'];
      $this->cbiva->ItemIndex = $row['piva'];
      $this->hfcosto->Value = $row['costo'];
      //$this->edbruto->Text = $this->sqlpresupuesto->fieldget('importe');
      //$this->eddescuento->text = $this->sqlpresupuesto->fieldget('descuento');
      $this->edsubtotal->Text = $row['subtotal'];
      $this->ediva->Text = $row['iva'];
      $this->edtotal->Text = $row['total'];
      $this->mobservaciones->Text = $row['observaciones'];
      $this->lbufh->Caption = $row['ufh'];

      //traer notas
      $this->traernotas();

      if(Derechos("Abrir ArchivoPresupuesto"))
      {
         //adjuntos
         $this->lbadjunto->Link = 'Adjuntos/' . $$row['path'];
         $this->lbadjunto->Caption = $row['path'];
         $this->hfpath->Value = $row['path'];
         if($row['path'] <> '')
            $this->lbeliminar->Caption = 'Eliminar';
      }
   }

   function Limpiar()
   {
      reset($this->controls->items);
      while(list($key, $val) = each($this->controls->items))
      {
         if($val->inheritsFrom("Edit"))
         {
            $val->Text = "";
            $val->tag = '';
         }
      }
      $this->mobservaciones->Clear();
      $this->cbpromotor->Clear();
      $this->cbpersona->Clear();
      $this->lbdetalle->Caption = '';
      $this->lbufh->Caption = '';
      $this->lbadjunto->Caption = '';
      $this->lbadjunto->Link = '';
      $this->lbeliminar->Caption = '';
      $this->btnactivar->Tag = '0';
      $this->edsubtotal->Text = '0';
      $this->ediva->Text = '0';
      $this->edtotal->Text = '0';
      $this->hfemail->Value = '';
      $this->hfcbestatus->Value = '';
      $this->hfidnota->Value = '';
      $this->hfestatus->Value = '';
      $this->hfpath->Value = '';
      $this->hfcosto->Value = '';
      $this->btnactivar->Caption = 'Activar';
   }

   function inicializa()
   {
      //trae el max id
      $this->edidpresupuesto->Text = MaxId('represupuestos', 'idpresupuesto') + 1;

      //cliente
      //$this->edidcliente->Text = 9999999999;

      //id revision
      $this->edrevision->Text = 0;

      //almacen
      $sql = 'select a.idalmacen from realmacen a
					left join plazas p on a.idplaza=p.idplaza
					left join usuarios u on u.idplaza=p.idplaza
					where login="' . $_SESSION['login'] . '"';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
      $this->edalmacen->Text = $row[0];

      //promotores          233->VENDEPRE
      $sql = 'select idusuario,concat(u.nombre," ",u.apaterno," ",u.amaterno) as promotor
					from usuarios u where idusuario in (select idusuario from usuariosderechos where idderecho = 233)';
      $rs = mysql_query($sql)or die('Error SQL: ' . $sql);
      $this->cbpromotor->AddItem('CASA CASA', null , 0);
      //$this->cbpromotor->AddItem('FERNANDO ARMENTA', null , 50);
      while($row = mysql_fetch_array($rs))
         $this->cbpromotor->AddItem($row['promotor'], null , $row['idusuario']);

      //fechacreacion
      $this->edfechaalta->Text = date('Y-m-d');

      //estatus
      $sql = 'select idclasificacion, nombre from clasificaciones where idtipo=19 order by orden';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      while($row = mysql_fetch_array($rs))
         $this->cbestatus->AddItem($row['nombre'], null , $row['idclasificacion']);

      //moneda
      /*$sql='select idmoneda, moneda from monedas';
      $rs= mysql_query($sql) or die('Error de Consulta SQL: '.$sql);
      while($row= mysql_fetch_array($rs))
      $this->cbmoneda->AddItem($row['moneda'],null,$row['idmoneda']);

      //tc
      $sql='select tc from monedas where idmoneda='.$this->cbmoneda->ItemIndex;
      $rs= mysql_query($sql) or die('Error de Consulta SQL: '.$sql);
      $row= mysql_fetch_row($rs);
      $this->edtc->Text= round($row[0],2);
      */
      //iva
      $sql = 'select porcentaje, porcentaje from impuestos where estatus=1 order by porcentaje';
      $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
      while($row = mysql_fetch_array($rs))
         $this->cbiva->AddItem($row['porcentaje'], null , $row['porcentaje']);
      $this->cbiva->ItemIndex = '11';

      //persona
      $this->cbpersona->AddItem('SIN ASIGNAR', null , 0);
      $this->cbpersona->AddItem('FISICA', null , 'F');
      $this->cbpersona->AddItem('MORAL', null , 'M');
      $this->cbpersona->ItemIndex = '0';

   }
}

global $application;

global $upresupuestos;

//Creates the form
$upresupuestos = new upresupuestos($application);

//Read from resource file
$upresupuestos->loadResource(__FILE__);

//Shows the form
$upresupuestos->show();

?>