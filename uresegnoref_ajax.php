<?php
session_start();
include("dmconexion.php");
include("urecursos.php");

if(isset($_POST['Imprimir']))
{
   $reporte = $_POST['reporte'];
   $tipo = $_POST['tipo'];
   $idsolicitud = $_POST['idsolicitud'];

   echo '
        window.open("http://' . GetConfiguraciones('ipserver') . ':8080/imprimir.jsp?' .
   'reporte=' . $reporte . '&tiporeporte=' . $tipo .
   '&idsolicitud=' . $idsolicitud . '", "_blank");
        ';
}

if(isset($_POST['Responsable']))
{
   $sql = 'Select ' . NombreFisica('u') . ' as nombre from usuarios u
            where idusuario=' . $_POST['Responsable'] . ' and idusuario<>0 ';
   $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
   $row = mysql_fetch_array($rs);

   echo 'vcl.$("edresponsable").value = "' . $row['nombre'] . '";';

}

if(isset($_POST['Calcular']))
{
   TraeDetalle();
}

if(isset($_POST['EditRow']))
{
   $tabla = $_SESSION['tablasegref'];
   $i = $_POST['EditRow'];

   if($tabla[$i]['surtido'] == '1')
    $s = 'vcl.$("cksurtido").checked = true;';
   else
    $s = 'vcl.$("cksurtido").checked = false;';

   echo '
   vcl.$("edparte").value = "' . $tabla[$i]['cveparte'] . '";
   vcl.$("eddescripcion").value = "' . $tabla[$i]['descripcion'] . '";
   vcl.$("edcantidad").value = "' . $tabla[$i]['cantidad'] . '";
   vcl.$("edprecio").value ="' . $tabla[$i]['precio'] . '";
   vcl.$("edimporte").value ="' . $tabla[$i]['importe'] . '";
   vcl.$("dtestimada").value ="' . $tabla[$i]['fechaestimada'] . '";
   vcl.$("edocprt").value ="' . $tabla[$i]['ocprt'] . '";
   vcl.$("edproveedor").value ="' . $tabla[$i]['proveedor'] . '";
   vcl.$("edvia").value ="' . $tabla[$i]['viaembarque'] . '";
   vcl.$("edguia").value ="' . $tabla[$i]['guia'] . '";
   vcl.$("edfletes").value ="' . $tabla[$i]['fletes'] . '";
   vcl.$("dtrecepcion").value ="' . $tabla[$i]['fecharecepcion'] . '";
   vcl.$("edhorarep").value ="' . leftstr($tabla[$i]['horarecepcion'], 5) . '";
   vcl.$("edpapeleta").value ="' . $tabla[$i]['papeleta'] . '";
   vcl.$("hfdetalle").value = "editar";
   vcl.$("hfidcontador").value =' . $i . ';
   '.$s;
}

if(isset($_POST['DelRow']))
{
   $row = $_POST['DelRow'];
   $tabla = $_SESSION['tablasegref'];

   unset($tabla[$row]);
   $tabla = array_values($tabla);
   for($i = 0; $i <= count($tabla) - 1; $i++)
      $tabla[$i]['idcontador'] = $i;

   $_SESSION['tablasegref'] = $tabla;
   TraeDetalle();
}


if(isset($_POST['Agregar']))
{
   $tabla = $_SESSION['tablasegref'];
   $t = count($tabla);
   $ban = false;

   if($_POST['detalle'] != 'editar')
   {
      for($i = 0; $i <= $t - 1; $i++)
         if($tabla[$i]['cveparte'] == $_POST['cveparte'])
         {
            $ban = true;
            $m = 'Esta parte ya fue registrada.' . $tabla[$i]['cveparte'] . '  p  ' . $_POST['cveparte'];
         }
   }
   else
   {
      $i = $_POST['hfidcontador'];
      if( strtotime($_POST['fecharecepcion']) > strtotime(date('Y/m/d')) )
      {
        $ban = true;
        $m = 'La fecha de recepcion es mayor a la actual';
      }
   }

   if($ban == true)
      echo "alert('" . $m . "');";
   else
   {
      $tabla[$i] = array('idcontador' => $i,
                         'cveparte' => strtoupper($_POST['cveparte']),
                         'descripcion' => strtoupper(replacememo($_POST['descripcion'])),
                         'cantidad' => $_POST['cantidad'],
                         'precio' => $_POST['precio'],
                         'importe' => $_POST['importe'],
                         'fechaestimada' => $_POST['fechaestimada'],
                         'surtido' => $_POST['surtido'],
                         'ocprt' => strtoupper($_POST['ocprt']),
                         'proveedor' => strtoupper($_POST['proveedor']),
                         'viaembarque' => strtoupper($_POST['viaembarque']),
                         'guia' => strtoupper($_POST['guia']),
                         'fletes' => $_POST['fletes'],
                         'fecharecepcion' => $_POST['fecharecepcion'],
                         'horarecepcion' => $_POST['horarecepcion'],
                         'papeleta' => strtoupper($_POST['papeleta'])
                         );


      $_SESSION['tablasegref'] = $tabla;
      TraeDetalle();
   }
   echo '
           vcl.$("edparte").value = "";
           vcl.$("eddescripcion").value = "";
           vcl.$("edcantidad").value = "";
           vcl.$("edprecio").value = "";
           vcl.$("edimporte").value = "";
           vcl.$("dtestimada").value = "";
           vcl.$("edocprt").value = "";
           vcl.$("edproveedor").value = "";
           vcl.$("edvia").value = "";
           vcl.$("edguia").value = "";
           vcl.$("edfletes").value = "";
           vcl.$("dtrecepcion").value = "";
           vcl.$("edhorarep").value = "";
           vcl.$("edpapeleta").value = "";
           vcl.$("hfdetalle").value = "";
           vcl.$("cksurtido").checked = false;

          vcl.$("hfdetalle").value = "";
          ';

   echo " vcl.$('edparte').focus();    ";
}

function TraeDetalle()
{
   $tabla = $_SESSION['tablasegref'];
   $tt = count($tabla) - 1;

   //ENCABEZADO
   $e = ' <div style = " width:790x; height:200px; overflow: auto" > ' .
   ' <table width = "800"border = "0" cellspacing = "0" cellpadding = "0" > ' .
   ' <tr bgcolor = "#FF6600" > ' .
   ' <td width = "60" > <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <strong> CANT </strong > </span > </td > ' .
   ' <td width = "80" > <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <strong> PARTE </strong > </span > </td > ' .
   ' <td width = "200" > <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <strong> DESCRIPCION </strong > </span > </td > ' .
   ' <td width = "80" > <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <div align="right"> <strong > PRECIO </strong > </div> </span > </td > ' .
   ' <td width = "80" > <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <div align="right"> <strong > IMPORTE </strong > </div> </span > </td > ' .
   ' <td width = "5">&nbsp;</td>' .
   ' <td width = "80"> <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <div> <strong > FLETES </strong > </div> </span > </td > ' .
   ' <td width = "5">&nbsp;</td>' .
   ' <td width = "120" > <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <div> <strong > F. ESTIMADA </strong > </div> </span > </td > ' .
   ' <td width = "60" > <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <strong> SURTIDO </strong > </span > </td > ' .
   ' <td width = "45" > </td > ' .
   ' </tr > ';

   $e .= ' <tr bgcolor = "#FF8040" > ' .

   ' <td> <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <strong> GUIA </strong > </span > </td > ' .
   ' <td> <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <div> <strong > VIA </strong > </div> </span > </td > ' .
   ' <td> <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <strong> PROVEEDOR </strong > </span > </td > ' .
   ' <td> <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <div> <strong > OC/PRT </strong > </div> </span > </td > ' .
   ' <td> <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <div> <strong > F. RECEP </strong > </div> </span > </td > ' .

   ' <td width = "5">&nbsp;</td>' .
   ' <td> <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <div> <strong >H. RECEP</strong > </div> </span > </td > ' .

   ' <td>&nbsp;</td>' .
   ' <td> <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <div> <strong > PAPELETA </strong > </div> </span > </td > ' .
   ' <td> </td > ' .
   ' <td>&nbsp;</td>' .
   ' </tr > ';

   //DETALLE
   for($i = 0; $i <= $tt; $i++)
   {
      //color renglon
      if(($i % 2) == 0)
      {
         $k = '#C2C2C2';
         $l = '#CFCFCF';
      }
      else
      {
         // $k = '#9D9D9D';  $l = '#B0B0B0';
         // $k = '#70B0E4';  $l = '#8CBFEA';   #BBDAF2
         $k = '#8CBFEA';
         $l = '#A5CEEF';
      }

      $ii = $i + 1;

      if($_POST['hfidestatus'] != 4 && $_POST['hfidestatus'] != 7 )
      {
         $editar = '<td><span style=" font-family: Verdana; font-size: 10;  "><div align="right">' .
         '<a href="javascript:basicAjax(\\\'uresegnoref_ajax.php\\\', \\\'EditRow=' . $i . '\\\');">Actualizar</a>' .
         '</div></span></td>';
      }
      else
         $editar = '<td>&nbsp;</td>';

      if($_POST['hfidestatus'] < 2  )
      {
         $borrar = '<td><span style=" font-family: Verdana; font-size: 10;  "><div align="right">' .
         '<a href="javascript:basicAjax(\\\'uresegnoref_ajax.php\\\',\\\'DelRow=' . $i .
         '&hfidestatus=\\\'+vcl.$(\\\'hfidestatus\\\').value);">Borrar</a>' .
         '</div></span></td>';
      }
      else
         $borrar .= '<td>&nbsp;</td>';

      if($tabla[$i]['surtido'] == 'true' || $tabla[$i]['surtido'] == 1)
         $chk = ' checked="yes" ';
      else
         $chk = '';

      $t .= '<tr bgcolor="' . $k . '">' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['cantidad'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['cveparte'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['descripcion'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; "><div align="right">' . number_format($tabla[$i]['precio'], 2) . '</div></span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; "><div align="right">' . number_format($tabla[$i]['importe'], 2) . '</div></span></td>' .
      '<td width = "5">&nbsp;</td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; "><div align="right">' . number_format($tabla[$i]['fletes'],2) . '</div></span></td>' .
      ' <td width = "5">&nbsp;</td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['fechaestimada'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; "><div align="center"><input type="checkbox" name="cksurtido' . $i . '"  ' . $chk . '  /></div></span></td>' .
      $editar .
      '</tr>';

      $t .= '<tr bgcolor="' . $l . '">' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['guia'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['viaembarque'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . replacememo($tabla[$i]['proveedor']) . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['ocprt'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['fecharecepcion'] . '</span></td>' .
      ' <td width = "5">&nbsp;</td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . LeftStr($tabla[$i]['horarecepcion'],5) . '</span></td>' .
      '<td>&nbsp;</td>' .
      '<td width = "10">&nbsp;</td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['papeleta'] . '</span></td>' .
      $borrar .
      '</tr>';
   }

   $t .= '<tr>' .
   '<td><span style=" font-family: Verdana; font-size: 11;  "><strong>Partidas: ' . $i . '</strong></span></td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '</tr>' .
   '</table></div>';

   $m = 'vcl.$(\'lbdetalle\').innerHTML = \'' . $e . $t . '\';';

   echo $m;
}


?>