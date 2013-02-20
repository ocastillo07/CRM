//cargar funciones.js
var include=function()
{
    return function(Src)
	 {
        var sc=document.createElement('script');
        sc.type='text/javascript';
        sc.src=Src;
        document.getElementsByTagName('body')[0].appendChild(sc);
        sc=null;
    }
}();
window.onload=function(){
include('funciones.js');
}

<?php
include("urecursos.php");
include("dmconexion.php");
//seleccionar la base de datos    cambiar cada que se mueva de server.
	//$link= mysql_connect('localhost','root','freedom');
 	//mysql_select_db('crm',$link);

//cargar el cliente
if(isset($_POST["traecliente"]))
{
  $idcliente=$_POST["idcliente"];
  $sql= 'select rsocial,nombre,apaterno,amaterno,rfc,direccion,cp,municipio,estado,
  		  tel1,tel2,email,persona,colonia from clientesgds where idcliente='.$idcliente;
  $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
  $row= mysql_fetch_array($rs);
  $rsoc = $row['rsocial'];
  $nombre = $row['nombre'];
  $apaterno= $row['apaterno'];
  $amaterno = $row['amaterno'];
  $rfc = $row['rfc'];
  $dir= $row['direccion'];
  $cp = $row['cp'];
  $mun = $row['municipio'];
  $edo = $row['estado'];
  $tel1 = $row['tel1'];
  $tel2 = $row['tel2'];
  $email = $row['email'];
  $per = $row['persona'];
  $col = $row['colonia'];
 echo " vcl.$('ednombre').value='".$nombre."';
        vcl.$('edapaterno').value='$apaterno';
        vcl.$('edamaterno').value='$amaterno';
        vcl.$('ednombrecom').value='$rsoc';
        vcl.$('edrfc').value='$rfc';
        vcl.$('edcalle').value='$dir';
        vcl.$('edcp').value='$cp';
        vcl.$('edciudad').value='$mun';
 		  vcl.$('edestado').value='$edo';
        vcl.$('edtel1').value='$tel1';
        vcl.$('edtel2').value='$tel2';
        vcl.$('edemail').value='$email';
        vcl.$('cbpersona').value='$per';
        vcl.$('edcolonia').value='$col'; ";
}
//cargar la parte
 if(isset($_POST["traeparte"]))
 {
 	$cve=$_POST["cveparte"];
	if(!empty($cve))
	{
  		$sql= 'SELECT p.idparte,p.descripcion,p.existencia,
            round(if(p.moneda=2,p.precio*m.tc,p.precio),2) as precio,
            round(if(p.moneda=2,p.costo*m.tc,p.costo),2) as costo
            FROM repartes as p
            left join monedas as m on m.idmoneda=1
            where cveparte="'.$cve.'"  and idalmacen='.$_POST['idalmacen'];
  		$rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
      if(mysql_num_rows($rs)>0)
      {
  		   $row= mysql_fetch_array($rs);
		   echo "var tipo='parte', id='".$row['idparte']."', desc='".$row['descripcion']."', exis='".
			$row['existencia']."', precio='".$row['precio']."', costo='".$row['costo']."', importe='".$row['precio']."', ban='$ban';
	      vcl.$('eddescripcion').value=desc;
	      vcl.$('edexistencia').value= exis;
	      vcl.$('edcantidad').value = '1';
	      vcl.$('edprecio').value=round(precio,2);
         vcl.$('edimporte').value= round(importe,2);
	      vcl.$('edcosto').value=round(costo,2); ";
      }
      else
      {
         echo"
            alert('La parte no Existe');
		      vcl.$('edparte').value='';
            vcl.$('eddescripcion').value='';
	         vcl.$('edexistencia').value= '';
	         vcl.$('edcantidad').value = '';
	         vcl.$('edprecio').value='';
            vcl.$('edimporte').value= '';
	         vcl.$('edcosto').value= '';
		      vcl.$('edparte').focus(); ";
      }
	}
	else
	{
	   echo "
		      vcl.$('edparte').value='';
            vcl.$('eddescripcion').value='';
	         vcl.$('edexistencia').value= '';
	         vcl.$('edcantidad').value = '';
	         vcl.$('edprecio').value='';
            vcl.$('edimporte').value= '';
	         vcl.$('edcosto').value= ''; ";
   }
 }

//eliminar detalle presupuesto
if(isset($_POST['idcontador']))
{
  	if($_POST['tabla']=='1')
	{
		$sql = "Delete from represupuestosdet where idcontador ='".$_POST['idcontador']."'";
  		$r = mysql_query($sql) or die("error sql: ".$rsm." ".mysql_error());
	}
	if($_POST['tabla']=='2')
	{
		$sql = "Delete from represupuestosdettemp where idcontador ='".$_POST['idcontador']."'";
  		$r = mysql_query($sql) or die("error sql: ".$rsm." ".mysql_error());
	}
	//costo e importe acomulado
	$sql='select round(sum(costo),2) as costo, round(sum(importe),2) as importe
			from(select round(sum(costo),2) as costo, round(sum(importe),2) as importe
			from represupuestosdet where idpresupuesto='.$_POST['idpresupuesto'].' and idrevision='.
			$_POST['idrevision'].'	union
			select round(sum(costo),2) as costo, round(sum(importe),2) as importe
			from represupuestosdettemp where idpresupuesto='.$_POST['idpresupuesto'].' and idrevision='.
			$_POST['idrevision'].' ) as t';
	$rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
	$row=mysql_fetch_row($rs);
   if($row[0]>0 || $row[0]!=null)
	{
		$costo= $row[0];
		$importe= $row[1];
   }
	else
	{
		$costo= 0;
		$importe= 0;
	}
	//actualizar presupuesto importe iva total
	$sql='update represupuestos set piva='.$_POST['piva'].',costo='.$costo.',importe='.
		   $importe.',subtotal='.$importe.',iva='.round($import*($_POST['piva']/100),2).
			',total='.round($importe + ($importe*($_POST['piva']/100)),2).'
		   where idpresupuesto='.$_POST['idpresupuesto'].' and idrevision='.$_POST['idrevision'];
	$rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
	traerdetalle($_POST['idpresupuesto'],$_POST['idrevision'],$_POST['ban'],$_POST['piva'],$_POST['idalmacen']);
	echo ' var tipo=\'idcontador\', caption=\''.$t.'\', importe=\''.$importe.'\';';

   echo "
	       vcl.$('edsubtotal').value = importe;
	       vcl.$('ediva').value = round((vcl.$('cbiva').options[vcl.$('cbiva').selectedIndex].text)/100 * vcl.$('edsubtotal').value,2);
	       var subt=vcl.$('edsubtotal').value, iva=vcl.$('ediva').value;
	       vcl.$('edtotal').value =round(parseFloat(subt)+parseFloat(iva),2); ";
}

//guardar presupuesto
if(isset($_POST['guardar']))
{
      $idcliente=$_POST['idcte'];
		$sql='insert into represupuestos(idpresupuesto,idrevision,idalmacen,
				idestatus,idcliente,fechacreacion,idpromotor,atencion,observaciones,usuario,fecha,hora) values ('.
				$_POST['idpresupuesto'].','.$_POST['idrevision'].','.$_POST['idalmacen'].','.
				$_POST['idestatus'].','.$idcliente.',"'.$_POST['fecha'].'",'.
				$_POST['promotor'].',"'.strtoupper($_POST['atencion']).'","'.
            $_POST['observaciones'].'","'.$_SESSION['login'].'",curdate(),curtime())';
		$rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
		echo " vcl.$('hfestatus').value='2'; ";
}

//guardar detalle presupuesto
if(isset($_POST['guardardet']))
{
		$sql = 'select cveparte from represupuestosdet where cveparte="'.$_POST['parte'].'"
              and idpresupuesto= '.$_POST['idpresupuesto']. ' and idrevision='.$_POST['idrevision'];
      $rs = mysql_query($sql) or die('Error de consulta SQL: '.$sql);
      if(mysql_num_rows($rs)>0)
      {
         echo " alert('La Parte ya fue Agregada');
               vcl.$('edparte').value='';
	            vcl.$('eddescripcion').value='';
	            vcl.$('edexistencia').value='';
	            vcl.$('edcantidad').value='';
	            vcl.$('edcosto').value='';
	            vcl.$('edprecio').value='';
	            vcl.$('edimporte').value='';
	            vcl.$('edparte').focus(); ";
      }
      else
      {
         //insertar detalle
		   $sql='insert into represupuestosdet(idpresupuesto,idrevision,cveparte,cantidad,costo,precio,importe,usuario,fecha,hora)
					values ('.$_POST['idpresupuesto'].','.$_POST['idrevision'].',"'.$_POST['parte'].'",'.
					$_POST['cantidad'].','.$_POST['costo'].','.$_POST['precio'].','.$_POST['importe'].
					',"'.$_SESSION['login'].'",curdate(),curtime())';
		   $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);

		   //costo e importe acomulado
		   $sql='select round(sum(costo),2) as costo, round(sum(importe),2) as importe
			from(select round(sum(costo),2) as costo, round(sum(importe),2) as importe
			from represupuestosdet where idpresupuesto='.$_POST['idpresupuesto'].' and idrevision='.
			$_POST['idrevision'].'	union
			select round(sum(costo),2) as costo, round(sum(importe),2) as importe
			from represupuestosdettemp where idpresupuesto='.$_POST['idpresupuesto'].' and idrevision='.
			$_POST['idrevision'].' ) as t';
		   $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
		   $row=mysql_fetch_row($rs);
		   $costo= $row[0];
		   $importe= $row[1];
		   //actualizar presupuesto importe iva total
		   $sql='update represupuestos set piva='.$_POST['piva'].',costo='.$costo.',importe='.
		   $importe.',subtotal='.round($importe,2).
			',iva='.round(($importe)*($_POST['piva']/100),2).',total='.
			round(($importe) + ($importe)*($_POST['piva']/100),2).'
		   where idpresupuesto='.$_POST['idpresupuesto'].' and idrevision='.$_POST['idrevision'];
		   $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
		   traerdetalle($_POST['idpresupuesto'],$_POST['idrevision'],1,$_POST['piva'],$_POST['idalmacen']);
		   echo 'var tipo="guardadet", caption=\''.$t.'\', costo=\''.$costo.'\',importe=\''.$importe.'\';';

         echo "
	         vcl.$('hfcosto').value = costo;
	         vcl.$('edsubtotal').value = importe;
	         vcl.$('ediva').value = round((vcl.$('cbiva').options[vcl.$('cbiva').selectedIndex].text)/100 * vcl.$('edsubtotal').value,2);
	         var subt=vcl.$('edsubtotal').value, iva=vcl.$('ediva').value;
	         vcl.$('edtotal').value =round(parseFloat(subt)+parseFloat(iva),2);
	         vcl.$('edparte').value='';
	         vcl.$('eddescripcion').value='';
	         vcl.$('edexistencia').value='';
	         vcl.$('edcantidad').value='';
	         vcl.$('edcosto').value='';
	         vcl.$('edprecio').value='';
	         vcl.$('edimporte').value='';
	         vcl.$('edparte').focus(); ";
      }
}

if(isset($_POST['guardartemp']))
{
   $sql = 'select cveparte from represupuestosdettemp where cveparte="'.$_POST['cve'].'"
              and idpresupuesto= '.$_POST['idpres']. ' and idrevision='.$_POST['idrevision'];
      $rs = mysql_query($sql) or die('Error de consulta SQL: '.$sql);
      if(mysql_num_rows($rs)>0)
      {
         echo " alert('La Parte ya fue Agregada');
                vcl.$('edpartecap').value='';
	             vcl.$('eddescripcioncap').value='';
	             vcl.$('edcantidadcap').value='';
	             vcl.$('edpreciocap').value='';
	             vcl.$('edimportecap').value='';
	             vcl.$('edpartecap').focus();";
      }
      else
      {
	      $sql='insert into represupuestosdettemp (idpresupuesto,idrevision,cveparte,
			descripcion,cantidad,costo,precio,importe) values ('.$_POST['idpres'].','.
			$_POST['idrevision'].',"'.strtoupper($_POST['cve']).'","'.strtoupper($_POST['des']).'",'.$_POST['cant'].
			',0,'.$_POST['precio'].','.$_POST['importe'].')';
	      $rs = mysql_query($sql) or die('Error de SQL: '.$sql);

	      //costo e importe acomulado
	      $sql='select round(sum(costo),2) as costo, round(sum(importe),2) as importe
			from(select round(sum(costo),2) as costo, round(sum(importe),2) as importe
			from represupuestosdet where idpresupuesto='.$_POST['idpres'].' and idrevision='.
			$_POST['idrevision'].'	union
			select round(sum(costo),2) as costo, round(sum(importe),2) as importe
			from represupuestosdettemp where idpresupuesto='.$_POST['idpres'].' and idrevision='.
			$_POST['idrevision'].' ) as t';
	      $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
	      $row=mysql_fetch_row($rs);
	      $costo= $row[0];
	      $importe= $row[1];

	      //actualizar presupuesto importe iva total
	      $sql='update represupuestos set piva='.$_POST['piva'].',costo='.$costo.',importe='.
		   $importe.',subtotal='.round($importe,2).
			',iva='.round(($importe)*($_POST['piva']/100),2).',total='.
			round(($importe) + ($importe)*($_POST['piva']/100),2).'
		   where idpresupuesto='.$_POST['idpres'].' and idrevision='.$_POST['idrevision'];
	      $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
	      traerdetalle($_POST['idpres'],$_POST['idrevision'],1,$_POST['piva'],$_POST['idalmacen']);
  	      echo 'var tipo="guardadettemp", caption=\''.$t.'\', costo=\''.$costo.'\',importe=\''.$importe.'\';';

         echo "
	       vcl.$('hfcosto').value = costo;
	       vcl.$('edsubtotal').value = importe;
	       vcl.$('ediva').value = round((vcl.$('cbiva').options[vcl.$('cbiva').selectedIndex].text)/100 * vcl.$('edsubtotal').value,2);
	       var subt=vcl.$('edsubtotal').value, iva=vcl.$('ediva').value;
	       vcl.$('edtotal').value =round(parseFloat(subt)+parseFloat(iva),2);
	       vcl.$('hfestatus').value='2';
	       vcl.$('edpartecap').value='';
	       vcl.$('eddescripcioncap').value='';
	       vcl.$('edcantidadcap').value='';
	       vcl.$('edpreciocap').value='';
	       vcl.$('edimportecap').value='';
	       vcl.$('edpartecap').focus(); ";
      }
}

if(isset($_POST['calcular']))
{
   traerdetalle($_POST['idpresupuesto'],$_POST['idrevision'],$_POST['ban'],$_POST['piva'],$_POST['idalmacen']);
}

function traerimporte($idpresupuesto,$idrevision)
{
	$sql='select round(sum(importe),2) as importe from (
			select cveparte, descripcion,r.existencia, cantidad, p.costo, p.precio,
			p.importe, p.idcontador, "1" as tipo
			from represupuestosdet p left join repartes r on r.idparte=p.idparte
			where idpresupuesto='.$idpresupuesto.' and idrevision='.$idrevision.
		  	' union select cveparte, descripcion,"0" as existencia,cantidad, costo,
		  	precio, importe, idcontador, "2" as tipo
		  	from represupuestosdettemp
		  	where idpresupuesto='.$idpresupuesto.' and idrevision='.$idrevision.') as t';
	$rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
	$row = mysql_fetch_row($rs);
	$importe = $row[0];
	return round($importe,2);
}

function traerdetalle($idpresupuesto,$idrevision,$ban,$piva,$idalmacen)
{
   $sql='select p.cveparte, descripcion,r.existencia, cantidad, p.costo, p.precio,
			p.importe, p.idcontador, "1" as tabla
			from represupuestosdet p left join repartes r
         on r.cveparte=p.cveparte and r.idalmacen='.$idalmacen.
			' where idpresupuesto='.$idpresupuesto.' and idrevision='.$idrevision.
		  ' union select cveparte, descripcion,"0" as existencia,cantidad, costo,
		  precio, importe, idcontador, "2" as tabla
		  from represupuestosdettemp
		  where idpresupuesto='.$idpresupuesto.' and idrevision='.$idrevision;
	$rs= mysql_query($sql) or die('Error de consulta SQL '.$sql);
	$t='<div style="width:700x; height:100px; overflow:auto">'.
			'<table style="font-family: Verdana; font-size: 10px; background-color: #C0C0C0;" width="700">'.
            '<tbody>'.
              '<tr style="background-color: #ff8040">'.
                '<td>Parte</td>'.
                '<td>Descripcion</td>'.
                '<td>Existencia</td>'.
					 '<td>Cantidad</td>'.
					 '<td>Costo</td>'.
					 '<td>Precio</td>'.
					 '<td>Importe</td>'.
					 '<td></td>'.
              '</tr>';
	while($row = mysql_fetch_array($rs))
	{
        $t.='<tr align="right"><td align="left">'.$row['cveparte'].'</td>'.
                '<td align="left">'.$row['descripcion'].'</td>'.
                '<td>'.$row['existencia'].'</td>'.
					 '<td>'.$row['cantidad'].'</td>'.
                '<td>'.$row['costo'].'</td>'.
                '<td>'.$row['precio'].'</td>'.
					 '<td>'.$row['importe'].'</td>';
			if($ban==1)
			{
				$params='idpresupuesto='.$idpresupuesto.'&idrevision='.
						  $idrevision.'&idcontador='.$row['idcontador'].'&ban='.$ban.
						  '&tabla='.$row['tabla'].'&piva='.$piva.'&idalmacen='.$idalmacen;
				$t.='<td><div align="left">'.
							'<a href="#" onclick="basicAjax(\\\'upresupuestos_ajax.php\\\',\\\''.$params.'\\\');">Eliminar</a>'.
						'</div></td>';
			}
            $t.='</tr>';
	}
	$recno=mysql_num_rows($rs);
	$t.='</tbody></table></div><font size="1" face="Verdana"><strong>'.
		 'Total&nbsp;Partidas:&nbsp;&nbsp;'.$recno.'</strong></font>';

   $m = 'vcl.$("lbdetalle").innerHTML = \'' . $t . '\';';
   echo $m;
}

?>
