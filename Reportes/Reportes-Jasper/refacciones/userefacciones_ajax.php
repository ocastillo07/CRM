<?php
include('dmconexion.php');
include('urecursos.php');

if(isset($_POST['Load']))
{
   TraeDetalle();
   echo "vcl.$('edoperador').focus(); ";
}

if(isset($_POST['TraeParte']))
{
   $cveparte = $_POST['TraeParte'];
   $idmoneda = $_POST['idmoneda'];
   $idalmacen = $_POST['idalmacen'];
   $edtc = $_POST['edtc'];
   $pd = GetConfiguraciones('preciodefault');

   if($idalmacen == null)
      $idalmacen = $_SESSION['sesidalmacen'];

   $precios = "round(if('" . $idmoneda . "'=1, pm.costo, pm.costo/'" . $edtc . "'),2) as costo,

          round(if('" . $idmoneda . "'=pm.idmoneda, pm.precioa, if(pm.idmoneda=1, pm.precioa/'" . $edtc . "',
          pm.precioa*'" . $edtc . "' ) ),2)  as precioa,

          round(if('" . $idmoneda . "'=pm.idmoneda, pm.preciob, if(pm.idmoneda=1, pm.preciob/'" . $edtc . "',
          pm.preciob*'" . $edtc . "' ) ),2)  as preciob,

          round(if('" . $idmoneda . "'=pm.idmoneda, pm.precioc, if(pm.idmoneda=1, pm.precioc/'" . $edtc . "',
          pm.precioc*'" . $edtc . "' ) ),2)  as precioc,

          round(if('" . $idmoneda . "'=pm.idmoneda, pm.preciod, if(pm.idmoneda=1, pm.preciod/'" . $edtc . "',
          pm.preciod*'" . $edtc . "' ) ),2)  as preciod,

          round(if('" . $idmoneda . "'=pm.idmoneda, pm.precioe, if(pm.idmoneda=1, pm.precioe/'" . $edtc . "',
          pm.precioe*'" . $edtc . "' ) ),2)  as precioe,

          round(if('" . $idmoneda . "'=pm.idmoneda, pm." . $pd . ", if(pm.idmoneda=1, pm." . $pd . "/'" . $edtc . "',
          pm." . $pd . "*'" . $edtc . "' ) ),2)  as preciodefault,";

   $rsm = "Select distinct p.cveparte, descripcion, pm.idmoneda,  " . $precios . "
          disponibles, idsupercision, pm.idalmacen
          from repartes p left join repartesmov pm on pm.cveparte=p.cveparte
          and pm.idalmacen = " . $idalmacen . "
          left join repartesestatus e on e.idestatus=pm.idestatus
          where pm.cveparte ='" . $cveparte . "'
          and e.activo = 1 and p.inventariable = 1
          ";
   $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

   if(mysql_num_rows($r) > 0)
   {
      $row = mysql_fetch_array($r);
      echo 'vcl.$("edparte").value = "' . $cveparte . '";
            vcl.$("eddescripcion").value = "' . replace_esp($row['descripcion']) . '";
            vcl.$("edexistencia").value = "' . $row['disponibles'] . '";
            vcl.$("edcosto").value = "' . $row['costo'] . '";
            vcl.$("edprecio").value = "' . $row['preciodefault'] . '";
            vcl.$("hfpreciodefault").value = "' . $row['preciodefault'] . '";
            vcl.$("hfprecio").value = "' . $row['precio'] . '";
            vcl.$("hfprecio1").value = "' . $row['precioa'] . '";
            vcl.$("hfprecio2").value = "' . $row['preciob'] . '";
            vcl.$("hfprecio3").value = "' . $row['precioc'] . '";
            vcl.$("hfprecio4").value = "' . $row['preciod'] . '";
            vcl.$("hfprecio5").value = "' . $row['precioe'] . '";
            vcl.$("hfidalmacen").value = "' . $row['idalmacen'] . '";
            vcl.$("hfsupercision").value = "' . $row['idsupercision'] . '";
            vcl.$("edcantidad").readOnly = false;
            vcl.$("edparte").readOnly = false;
            vcl.$("edcantidad").focus();
            ';

   }
   else
   {
      echo " alert('El articulo no esta activo, no pertenece al almacen actual o no es inventariable')";
   }
}

if(isset($_POST['TraeOperador']))
{
   $rsm = "Select distinct u.tecnico as operador, u.idusuario from usuarios u
          where u.tecnico = '" . $_POST['TraeOperador'] . "'";
   $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

   if(mysql_num_rows($r) > 0)
   {
      $row = mysql_fetch_array($r);
      echo '  vcl.$("hfidoperador").value = "' . $row['idusuario'] . '";
            ';
   }
   else
   {
      echo 'alert("No esta definido en el catalogo.");
            vcl.$("edoperador").value = "";
            vcl.$("edoperador").focus();';
   }
}

function TraeDetalle()
{
   $tabla = $_SESSION['tablaSEVEN'];
   $hfestatus = $_POST['hfestatus'];

   //ENCABEZADO
   $e = '<div style=" width:790x; height:200px; overflow: auto">' .
   '<table width="800" border="0" cellspacing="0" cellpadding="0">' .
   '<tr bgcolor="#FF6600">' .

   '<td width="80"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>OPER</strong></span></td>' .
   '<td width="80"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>PARTE</strong></span></td>' .
   '<td width="150"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>DESCRIPCION</strong></span></td>' .
   '<td width="40"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<div align="right"><strong>CANT</strong></div></span></td>' .
   '<td width="60"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<div align="right"><strong>SURTIDO</strong></div></span></td>' .
   '<td width="90"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<div align="right"><strong>PRECIO</strong></div></span></td>' .
   '<td width="90"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<div align="right"><strong>IMPORTE</strong></div></span></td>' .
   '<td width="45"></td>' .
   '<td width="45"></td>' .

   '</tr>';


   $totalmn = 0;

   $t = '';
   $tt = count($tabla) - 1;

   //DETALLE
   for($i = 0; $i <= $tt; $i++)
   {
      //color renglon
      if(($i % 2) == 0)
         $k = '#F0F0F0';
      else
         $k = '#CDCDCD';

      $ii = $i + 1;

      if($hfestatus == 2 && Derechos('SECARREF') == true && $_POST['hfidestatus'] < 8)
      {
         $b = '<td><span style=" font-family: Verdana; font-size: 10;  "><div align="right">' .
         '<a href="javascript:basicAjax(\\\'userefacciones_ajax.php\\\',' .
         '\\\'EditRow=' . $i . '&idalmacen=\\\'+vcl.$(\\\'hfidalmacen\\\').value);">Editar</a>' .
         '</div></span></td>';
      }
      else
         $b = '<td>&nbsp;</td>';

      if($hfestatus == 2 && Derechos('SEDESCARREF') == true && $_POST['hfidestatus'] < 8)
      {
         $b .= '<td><span style=" font-family: Verdana; font-size: 10;  "><div align="right">' .
         '<a href="javascript:basicAjax(\\\'userefacciones_ajax.php\\\',\\\'DelRow=' . $i .
         '&hfestatus=\\\'+vcl.$(\\\'hfestatus\\\').value+\\\'&serie=\\\'+vcl.$(\\\'edserie\\\').value+\\\'&idservicio=\\\'+vcl.$(\\\'edidservicio\\\').value);">Borrar</a>' .
         '</div></span></td>';
      }
      else
         $b .= '<td>&nbsp;</td>';


      $t .= '<tr bgcolor="' . $k . '">' .
      $o .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['operador'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['cveparte'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . replace_esp($tabla[$i]['descripcion']) . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; "><div align="right">' . $tabla[$i]['cantidad'] . '</div></span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; "><div align="right">' . $tabla[$i]['surtido'] . '</div></span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; "><div align="right">' . number_format($tabla[$i]['precio'], 2) . '</div></span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; "><div align="right">' . number_format($tabla[$i]['importe'], 2) . '</div></span></td>' .
      $b .
      '</tr>';

      $total += $tabla[$i]['importe'];
   }

   $total = round($total, 2);
   $t .= '<tr>' .
   '<td><span style=" font-family: Verdana; font-size: 11;  "><strong>Partidas: ' . $i . '</strong></span></td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td><span style=" font-family: Verdana; font-size: 11;  "><div align="right"><strong>' . number_format($total, 2) . '</strong></span></div></td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '</tr>' .
   '</table></div>';

   $m = 'vcl.$(\'lbdetalle\').innerHTML = \'' . $e . $t . '\';';

   echo $m;

   echo 'var total = ' . $total . '
         vcl.$("edpartidas").value = ' . $i . ';
         vcl.$("edsubtotal").value = formatCurrency(total);
         vcl.$("ediva").value = formatCurrency(total * vcl.$("cbpiva").value);
         vcl.$("edtotal").value = formatCurrency(total * (1 + (vcl.$("cbpiva").value*1)));

         if(vcl.$("cbmoneda").value == 1)
           vcl.$("edtotalmn").value = formatCurrency(total * (1 + (vcl.$("cbpiva").value*1)));
         else
           vcl.$("edtotalmn").value = formatCurrency(total * (1 + (vcl.$("cbpiva").value*1)) * vcl.$("edtc").value);
        ';
}

if(isset($_POST['EditRow']))
{
   $tabla = $_SESSION['tablaSEVEN'];
   $i = $_POST['EditRow'];

   echo "vcl.$('edparte').readOnly = true;
         vcl.$('edoperador').readOnly = true;";

   $sql = 'Select existencia from repartesmov where cveparte="' . $tabla[$i]['cveparte'] . '" and idalmacen=' . $_POST['idalmacen'];
   $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
   $row = mysql_fetch_array($rs);


   echo '
   vcl.$("edoperador").value = "' . $tabla[$i]['operador'] . '";
   vcl.$("hfidoperador").value = "' . $tabla[$i]['idoperador'] . '";
   vcl.$("edparte").value = "' . $tabla[$i]['cveparte'] . '";
   vcl.$("eddescripcion").value ="' . replace_esp($tabla[$i]['descripcion']) . '";
   vcl.$("edcantidad").value = "' . $tabla[$i]['surtido'] . '";
   vcl.$("edexistencia").value = "' . ($row['existencia'] + $tabla[$i]['cantidad']) . '";
   vcl.$("edcosto").value ="' . number_format($tabla[$i]['costo'], 2) . '";
   vcl.$("edprecio").value ="' . number_format($tabla[$i]['precio'], 2) . '";
   vcl.$("hfprecio1").value ="' . number_format($tabla[$i]['precioa'], 2) . '";
   vcl.$("hfprecio2").value ="' . number_format($tabla[$i]['preciob'], 2) . '";
   vcl.$("hfprecio3").value ="' . number_format($tabla[$i]['precioc'], 2) . '";
   vcl.$("hfprecio4").value ="' . number_format($tabla[$i]['preciod'], 2) . '";
   vcl.$("hfprecio5").value ="' . number_format($tabla[$i]['precioe'], 2) . '";
   vcl.$("hfpreciodefault").value ="' . number_format($tabla[$i]['preciodefault'], 2) . '";
   vcl.$("edimporte").value ="' . number_format($tabla[$i]['importe'], 2) . '";
   vcl.$("hfsupercision").value = "' . $tabla[$i]['idsupercision'] . '";
   vcl.$("hfdetalle").value = "editar";
   vcl.$("hfidcontador").value =' . $i . ';
   ';
}

if(isset($_POST['DelRow']))
{
   $row = $_POST['DelRow'];
   $tabla = $_SESSION['tablaSEVEN'];
   $ban = true;

   if($tabla[$row]['father'] != '')
      if(Derechos('SEDESCORES') == false)
      {
         echo " alert('No tienes derechos para descargar cores'); ";
         $ban = false;
      }

   if($ban == true)
   {
      if($tabla[$row]['father'] != '')
      {
         //revisa si ya se guardo
         $sql = 'select cveparte from serefacciones where serie = "' . $_POST['serie'] . '" and
              idservicio=' . $_POST['idservicio'] . ' and cveparte="' . $tabla[$row]['cveparte'] . '"';
         $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
         $rowc = mysql_fetch_array($rs);
         if($rowc == false)
         {
            echo " alert('No puedes Eliminar el core antes de guardar.');";
         }
         else
         {
            echo "
                 if(confirm('Se generara entrada de core sucio. " .
            "Estas seguro eliminar el core del articulo " . $tabla[$row]['father'] . "?'))
                 {
                 basicAjax('userefacciones_ajax.php', 'EliminaRow=" . $row .
            "&hfestatus='+vcl.$('hfestatus').value+'&ValeCore=1');
                 } ";
         }
      }
      else
      {
         if($tabla[$row]['child'] != '')
         {
            $t = count($tabla) - 1;
            for($i = 0; $i <= $t; $i++)
            {
               if($tabla[$i]['cveparte'] == $tabla[$row]['child'] &&
               $tabla[$row]['cveparte'] == $tabla[$i]['father'])
                  DelRow($tabla[$i]['idcontador']);
            }
         }
         DelRow($row);
      }
   }
}

if(isset($_POST['EliminaRow']))
{
   DelRow($_POST['EliminaRow']);
}

function DelRow($row)
{
   $tabla = $_SESSION['tablaSEVEN'];

   unset($tabla[$row]);
   $tabla = array_values($tabla);
   for($i = 0; $i <= count($tabla) - 1; $i++)
      $tabla[$i]['idcontador'] = $i;
   $_SESSION['tablaSEVEN'] = $tabla;
   TraeDetalle();
}

if(isset($_POST['Calcular']))
{
   TraeDetalle();
}

if(isset($_POST['Agregar']))
{
   if(Derechos('SECARREF') != true)
      echo " alert('No tienes derechos para cargar refacciones'); ";
   else
   {
      $tabla = $_SESSION['tablaSEVEN'];
      $t = count($tabla) - 1;
      $m = 'Esta parte ya fue registrada.';
      $ban = false;

      $idmoneda = $_POST['idmoneda'];
      $idalmacen = $_POST['idalmacen'];
      $edtc = $_POST['edtc'];
      $cantidad = $_POST['cantidad'];

      for($i = 0; $i <= $t; $i++)
         if($tabla[$i]['cveparte'] == $_POST['cveparte'] &&
         $tabla[$i]['idoperador'] == $_POST['idoperador'])
            $ban = true;

      if($_POST['hfdetalle'] == 'editar')
      {
         $t = $_POST['hfidcontador'];
         $ban = false;
         if($tabla[$t]['father'] != '')
         {
            if($tabla[$t]['cantidad'] > $_POST['cantidad'])
            {
               $cantidad = $tabla[$t]['cantidad'];
               $surtido = $_POST['cantidad'];
            }
         }

         if($_POST['cantidad'] > $tabla[$t]['cantidad'] && $tabla[$t]['father'] != '')
         {
            $m = 'No puedes surtir mas de la cantidad.';
            $ban = true;
         }
      }
      else
      {
         $t = count($tabla);
         $surtido = $_POST['cantidad'];
      }

      if($_POST['existencia'] < $_POST['cantidad'])
      {
      /*   if($_POST['hfdetalle'] == 'editar')
         {
            if($_POST['cantidad'] > $tabla[$t]['cantidad'])
            {
               $m = 'No hay existencia disponible para surtir esa cantidad.';
               $ban = false;
            }
         }
         else
         {       */
            $m = 'No hay existencia disponible para surtir esa cantidad.';
            $ban = true;
        // }
      }
      else
         $surtido = $_POST['cantidad'];



      if($ban == true)
         echo "alert('" . $m . "');";
      else
      {
         $tabla[$t] = array('idcontador' => $t,
                            'idoperador' => $_POST['idoperador'],
                            'operador' => strtoupper($_POST['operador']),
                            'cveparte' => $_POST['cveparte'],
                            'descripcion' => $_POST['descripcion'],
                            'cantidad' => $cantidad,
                            'surtido' => $surtido,
                            'costo' => $_POST['costo'],
                            'precio' => $_POST['precio'],
                            'precio1' => $_POST['precio1'],
                            'precio2' => $_POST['precio2'],
                            'precio3' => $_POST['precio3'],
                            'precio4' => $_POST['precio4'],
                            'precio5' => $_POST['precio5'],
                            'preciodefault' => $_POST['preciodefault'],
                            'importe' => round($surtido * $_POST['precio'], 2),
                            'idsupercision' => $_POST['hfsupercision'],
                            'father' => $tabla[$t]['father'],
                            'child' => $tabla[$t]['child']
                            );

         $tt = count($tabla) - 1;
         if($tabla[$t]['child'] != '')
         {
            for($i = 0; $i <= $tt; $i++)
            {
               if($tabla[$i]['cveparte'] == $tabla[$t]['child'] &&
               $tabla[$t]['cveparte'] == $tabla[$i]['father'])
               {
                  if($tabla[$t]['cantidad'] > $tabla[$i]['cantidad'])
                  {
                     $s = $tabla[$t]['cantidad'] - $tabla[$i]['cantidad'];
                     $tabla[$i]['surtido'] += $s;
                  }

                  if($tabla[$t]['cantidad'] < $tabla[$i]['cantidad'])
                  {
                     $s = $tabla[$i]['cantidad'] - $tabla[$t]['cantidad'];
                     $tabla[$i]['surtido'] -= $s;
                  }

                  $tabla[$i]['cantidad'] = $tabla[$t]['cantidad'];
                  $tabla[$i]['importe'] = round($tabla[$i]['cantidad'] * $tabla[$i]['precio'], 2);
               }
            }
         }

         if($_POST['hfdetalle'] != 'editar')
         {//  and pm.idalmacen=' . $idalmacen . '
            $sql = 'Select c.cvecore, ifnull(pm.cveparte, "") as cveparte from repartescores c
                   left join repartesmov pm on pm.cveparte=c.cvecore
                   where c.cveparte ="' . $_POST['cveparte'] . '"';
            $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
            $row = mysql_fetch_array($rs);
            if($row != false)
            {

               $pd = GetConfiguraciones('preciodefaultcore');

               $precios = "round(if('" . $idmoneda . "'=1, pm.costo, pm.costo/'" . $edtc . "'),2) as costo,

            round(if('" . $idmoneda . "'=pm.idmoneda, pm.precioa, if(pm.idmoneda=1, pm.precioa/'" . $edtc . "',
            pm.precioa*'" . $edtc . "' ) ),2)  as precioa,

            round(if('" . $idmoneda . "'=pm.idmoneda, pm.preciob, if(pm.idmoneda=1, pm.preciob/'" . $edtc . "',
            pm.preciob*'" . $edtc . "' ) ),2)  as preciob,

            round(if('" . $idmoneda . "'=pm.idmoneda, pm.precioc, if(pm.idmoneda=1, pm.precioc/'" . $edtc . "',
            pm.precioc*'" . $edtc . "' ) ),2)  as precioc,

            round(if('" . $idmoneda . "'=pm.idmoneda, pm.preciod, if(pm.idmoneda=1, pm.preciod/'" . $edtc . "',
            pm.preciod*'" . $edtc . "' ) ),2)  as preciod,

            round(if('" . $idmoneda . "'=pm.idmoneda, pm.precioe, if(pm.idmoneda=1, pm.precioe/'" . $edtc . "',
            pm.precioe*'" . $edtc . "' ) ),2)  as precioe,

            round(if('" . $idmoneda . "'=pm.idmoneda, pm." . $pd . ", if(pm.idmoneda=1, pm." . $pd . "/'" . $edtc . "',
            pm." . $pd . "*'" . $edtc . "' ) ),2)  as preciodefault ";

               $sql = "SELECT p.cveparte, p.descripcion, " . $precios . "
              from repartes p left join repartesmov pm on pm.cveparte=p.cveparte
              left join reunidadesmedida u on u.idunidad=p.idunidadmedida
              where pm.cveparte = '" . $row['cvecore'] . "'";
               $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
               $row = mysql_fetch_array($rs);
               if($row != false)
               {

                  $t++;
                  $tabla[$t] = array('idcontador' => $t,
                                     'idoperador' => $_POST['idoperador'],
                                     'operador' => strtoupper($_POST['operador']),
                                     'cveparte' => $row['cveparte'],
                                     'descripcion' => $row['descripcion'],
                                     'cantidad' => $_POST['cantidad'],
                                     'surtido' => $surtido,
                                     'costo' => $row['costo'],
                                     'precio' => $row['preciodefault'],
                                     'precio1' => $row['precioa'],
                                     'precio2' => $row['preciob'],
                                     'precio3' => $row['precioc'],
                                     'precio4' => $row['preciod'],
                                     'precio5' => $row['precioe'],
                                     'preciodefault' => $row['preciodefault'],
                                     'importe' => round($row['preciodefault'] * $_POST['cantidad'], 2),
                                     'father' => $_POST['cveparte'],
                                     'child' => ''
                                     );

                  $tabla[$t - 1]['child'] = $row['cveparte'];
               }
            }

         }
         $_SESSION['tablaSEVEN'] = $tabla;
         TraeDetalle();
      }
      echo "
        vcl.$('edoperador').value = '';
        vcl.$('hfidoperador').value = '';
        vcl.$('edparte').readOnly = false;
        vcl.$('edcantidad').readOnly = false;
        vcl.$('hfdetalle').value = '';
        vcl.$('edparte').value = '';
        vcl.$('eddescripcion').value = '';
        vcl.$('edcosto').value = '';
        vcl.$('edprecio').value = '';
        vcl.$('edcantidad').value = '';
        vcl.$('edimporte').value = '';
        vcl.$('edexistencia').value = '';
        vcl.$('hfprecio1').value='0';
        vcl.$('hfprecio2').value='0';
        vcl.$('hfprecio3').value='0';
        vcl.$('hfprecio4').value='0';
        vcl.$('hfprecio5').value='0';

        vcl.$('edoperador').readOnly = false;

          ";
   }

   echo " vcl.$('edoperador').focus();    ";
}


if(isset($_GET['CreaBackOrder']))
{

   $serie = $_GET['serie'];
   $idservicio = $_GET['idservicio'];
   $idcliente = $_GET['idcliente'];
   $cantidad = $_GET['cantidad'];
   $cveparte = $_GET['cveparte'];
   $tipopago = $_GET['idtipopago'];
   $idalmacen = $_GET['idalmacen'];
   $tipo = $_GET['tipo'];

   //Insertar la Requisicion
   $sql = "select clave, folio+1 as folio from folios where idtipo = 19 and idplaza = " . $_SESSION['sesidplaza'];
   $r = mysql_query($sql)or die("Error SQL: " . $sql . " " . mysql_error());
   $row = mysql_fetch_row($r);
   $serier = $row[0];
   $idrequi = $row[1];


   $sql = 'insert into rerequisiciones(serie, idrequisicion, iddocumento, idalmacen,
          idcliente, idestatus,
          cveparte, cantidad, tipo, destino, fechacreacion, usuario, fecha, hora)
          values ("' . $serier . '",' . $idrequi . ',"' . $serie . $idservicio . '",
          ' . $idalmacen . ', ' . $idcliente . ', ' . $tipopago . ', "' . $cveparte . '",
          ' . $cantidad . ',2,"S", curdate(),
          "' . $_SESSION['login'] . '",curdate(),curtime())';
   $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);


   $sql = 'select serie, idrequisicion from rerequisiciones
          where iddocumento="' . $serie . $idservicio . '" and tipo="' . $tipo . '" ';
   $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
   $row = mysql_fetch_array($rs);

   //dependiento el tipo es el estatus de la venta
   if($tipo == 'O')
   {
      $estatus = 'BackOrder';
      $id = '3';
   }
   else
   {
      $id = '7';
      $estatus = 'Traspaso';
   }

   //impresion de la requisicion
   echo "<script language='javascript' type='text/javascript'>
         alert('Requisicion de " . $estatus . " Generado con Folio: " . $serier . $idrequi . "');

         window.open(\" http://" . $_SESSION['ServidorJasper'] .
   "/ibc.jsp?reporte=requisicion&tiporeporte=pdf&idrequisicion=" .
   $idrequi . "&serie=" . $serier . "&mod=ref\", \"_blank\");

   window.location='userefacciones.php?Revisar=1';
       </script> ";
}

if(isset($_POST['ValidarPrecio']))
{
   $b = Validar($_POST['idcliente'], $_POST['idalmacen'], $_POST['cveparte'],
   $_POST['idpromotor'], $_POST['cbmoneda'], $_POST['tc'], $_POST['precio'],
   $_POST['preciodefault']);
}

function Validar($idcliente, $idalmacen, $cveparte, $idpromotor, $cbmoneda, $tc, $precio, $preciodefault)
{
   $ban = false;
   $idpromotor = $_SESSION['sesidusuario'];
   if($_SESSION['parametrizar'])
   {
      $sql = 'select nivel, filtro,condicion from clientesparametros where idcliente=' . $idcliente;
      $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
      while($row = mysql_fetch_array($rs))
      {
         $sql = 'select p.cveparte, l.nombre as linea, f.nombre as familia, m.nombre as marca, po.nombre as origen
                from repartesmov pm
                left join repartes p on pm.cveparte=p.cveparte and pm.idalmacen=' . $idalmacen . '
                left join relineas l on l.idlinea=p.idlinea
                left join remarcas m on m.idmarca=p.idmarca
                left join refamilias f on f.idfamilia=p.idfamilia
                left join repartesorigen po on p.idorigen=po.idorigen
                where p.cveparte ="' . $cveparte . '"  having ' . $row['filtro'];
         $r = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
         if(mysql_num_rows($r) > 0 && $ban == false)
         {
            $ban = true;
            $precio = explode(" ", $row['condicion']);
            $valorprecio = $precio[2];
         }
      }

      if($ban)
      {
         if($cbmoneda == '1')#pesos
            $sql = 'select round(if(idmoneda=1,(' . $valorprecio . '),(' . $valorprecio . ')*' . $tc . '),2) as precio
                    from repartesmov where cveparte="' . $cveparte . '" and idalmacen=' . $idalmacen;
         else #dlls
            $sql = 'select round(if(idmoneda=2,(' . $valorprecio . '),(' . $valorprecio . ')/' . $tc . '),2) as precio
                   from repartesmov where cveparte="' . $cveparte . '" and idalmacen=' . $idalmacen;
         $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sq);
         $row = mysql_fetch_array($rs);
         if($row['precio'] > $precio)
            $p = $row['precio'];
         else
            $p = $precio;

         echo " vcl.$('edprecio').value='" . $p . "';
                vcl.$('edimporte').value= formatCurrency(vcl.$('edcantidad').value * vcl.$('edprecio').value); ";
      }
   }
   if($ban == false)
   {
      $sql = 'SELECT u.idusuario,n.nivel,n.campo FROM repreciosxusuario AS u
              Inner Join repreciosniveles AS n ON u.idnivel = n.idnivel
              WHERE u.idusuario =  ' . $idpromotor;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . mysql_error($sql));
      if(mysql_num_rows($rs) > 0)
      {
         $precios = array();
         $i = 0;
         $campos = '';
         $ban = false;
         while($row = mysql_fetch_array($rs))
         {
            if($cbmoneda == '1')//combobox de moneda en pesos
               $campos = $campos . 'round(if(idmoneda=1,' . $row['campo'] .
               ',' . $row['campo'] . '*' . $tc . '),2) as ' . $row['campo'] . ',';
            else //combobox de moneda en dlls
               $campos = $campos . 'round(if(idmoneda=2,' . $row['campo'] .
               ',' . $row['campo'] . '/' . $tc . '),2) as ' . $row['campo'] . ',';
            $i++;
         }
         if($i == '1')
         {
            if($row['campo'] < $precio)
            {
               " alert('No Puedes Dar un Precio Menor al Permitido [1]');
                  vcl.$('edprecio').value='" . $preciodefault . "'; ";
            }
         }
         else
         {
            $sql = 'select cveparte, ' . substr($campos, 0, - 1) . ' from repartesmov where cveparte="' .
            $cveparte . '" and idalmacen =' . $idalmacen;
            $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
            if(mysql_num_rows($rs) > 0)
               $row = mysql_fetch_row($rs);
            else
            {
               $sql = 'select cveparte, ' . substr($campos, 0, - 1) . ' from repartesmov where cveparte="' .
               $cveparte . '"  limit 1';
               $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
               if(mysql_num_rows($rs) > 0)
                  $row = mysql_fetch_row($rs);
            }
            switch($i)
            {
               case 2:
                  if($precio >= $row[2])
                     $ban = true;
                  else
                     $ban = false;
                  break;

               case 3:
                  if($precio >= $row[3])
                     $ban = true;
                  else
                     $ban = false;
                  break;

               case 4:
                  if($precio >= $row[4])
                     $ban = true;
                  else
                     $ban = false;
                  break;

               case 5:
                  if($precio >= $row[5])
                     $ban = true;
                  else
                     $ban = false;
                  break;
            }
            if($ban == false)
               echo "alert('No Puedes Dar un Precio Menor al Permitido[2]');
                     vcl.$('edprecio').value='" . $preciodefault . "';
                     vcl.$('edimporte').value= formatCurrency(vcl.$('edcantidad').value * vcl.$('edprecio').value); ";
            else
               echo "vcl.$('edimporte').value= formatCurrency(vcl.$('edcantidad').value * vcl.$('edprecio').value); ";
         }
      }
      else
         if($precio < $preciodefault)
         {
            echo "alert('No puedes dar un precio menor al permitido[3]');
                  vcl.$('edprecio').value='" . $preciodefault . "';
                  vcl.$('edimporte').value = round(vcl.$('edcantidad').value * vcl.$('edprecio').value,2);
                  ";
         }
         else
         {
            // echo "vcl.$('edimporte').value = round(vcl.$('edcantidad').value * vcl.$('edprecio').value,2); ";
            $ban = true;
         }
   }
   return $ban;
}

if(isset($_POST['Imprimir']))
{

   echo 'window.open("http://' . $_SESSION['ServidorJasper'] . '/ibc.jsp' .
   '?reporte=sevalesrefacciones&tiporeporte=pdf&serie=' . $_POST['serie'] .
   '&idservicio=' . $_POST['idservicio'] . '&f1=' . Fecha() . '&mod=ser' . '", "_blank");';

   $sql = 'SELECT v.cvecore from sevalescores as v
        left join realmacen a on a.idalmacen=v.idalmacen
        left join repartes p on p.cveparte=v.cvecore
        left join usuarios s on s.idusuario=v.idusersalida
        left join usuarios e on e.idusuario=v.iduserentrega
        where v.serie= "' . $_POST['serie'] . '"
        and v.idservicio="' . $_POST['idservicio'] . '"
        and v.fechacreacion=curdate() ';
   $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
   $row = mysql_fetch_array($rs);
   if($row != false)
   {
      echo 'window.open("http://' . $_SESSION['ServidorJasper'] . '/ibc.jsp' .
      '?reporte=sevalescores&tiporeporte=pdf&serie=' . $_POST['serie'] .
      '&idservicio=' . $_POST['idservicio'] . '&f1=' . Fecha() . '&mod=ser' . '", "_blank");';
   }
}

?>