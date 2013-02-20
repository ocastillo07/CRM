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
        window.open("http://' . GetConfiguraciones('ipserver') . ':8080/imprimir.jsp?reporte=' . $reporte . '&tiporeporte=' . $tipo .
   '&idsolicitud=' . $idsolicitud . '", "_blank");
        ';
}

if(isset($_POST['TraeApoyo']))
{
   if($_POST['TraeApoyo'] == 'ed')
      $cond = 'idempleado=' . $_POST['idempleado'];
   else
      $cond = 'idcolaborador=' . $_POST['idcolaborador'];

   $sql = 'SELECT c.idcolaborador, c.idempleado, ' . NombreFisica('c') . ' as nombre,
           p.nombre as puesto from rhcolaboradores c left join puestos p on p.idpuesto=c.idpuesto
           where ' . $cond;
   $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
   $row = mysql_fetch_array($rs);
   if($row != false)
      echo ' vcl.$("hfidapoyo").value = "' . $row['idcolaborador'] . '";
          vcl.$("edidapoyo").value = "' . $row['idempleado'] . '";
          vcl.$("edapoyo").value = "' . $row['nombre'] . '";
          vcl.$("edpuestoapoyo").value = "' . $row['puesto'] . '"; ';
   else
      echo 'alert("El colaborador no existe");';

}

if(isset($_POST['Calcular']))
{
   TraeDetalle();
}

if(isset($_POST['EditRow']))
{
   $tabla = $_SESSION['tablaherr'];
   $i = $_POST['EditRow'];

    if( $tabla[$i]['cuentacon'] == 'SI' )
      $chk = 'true';
    else
      $chk = 'false';

   echo '
   vcl.$("edequipo").value = "' . $tabla[$i]['equipo'] . '";
   vcl.$("ckcuentacon").Checked = "' . $chk . '";
   vcl.$("edaccion").value = "' . replacememo($tabla[$i]['accion']) . '";
   vcl.$("dtfechaherr").value ="' . $tabla[$i]['fecha'] . '";
   vcl.$("dtreal").value ="' . $tabla[$i]['fechareal'] . '";
   vcl.$("hfdetalle").value = "editar";
   vcl.$("hfidcontador").value =' . $i . ';
   ';
}

if(isset($_POST['DelRow']))
{
   $row = $_POST['DelRow'];
   $tabla = $_SESSION['tablaherr'];

   unset($tabla[$row]);
   $tabla = array_values($tabla);
   for($i = 0; $i <= count($tabla) - 1; $i++)
      $tabla[$i]['idcontador'] = $i;

   $_SESSION['tablaherr'] = $tabla;
   TraeDetalle();
}


if(isset($_POST['Agregar']))
{
   $tabla = $_SESSION['tablaherr'];
   $t = count($tabla);
   $ban = false;

   if($_POST['detalle'] != 'editar')
   {
      for($i = 0; $i <= $t - 1; $i++)
         if($tabla[$i]['equipo'] == $_POST['equipo'])
         {
            $ban = true;
            $m = 'Esta parte ya fue registrada.';
         }
   }
   else
   {
     $t = $_POST['hfidcontador'];
   }

   if($_POST['cuentacon'] == 'true')
   {
      $cuenta = 'SI';
      $accion = '';
   }
   else
  {
      $cuenta = 'NO';
  }

   if($_POST['hfidestatus'] >= 2 && Derechos('AUTRHVACNC') == true)
   {
      $equipo = $tabla[$t]['equipo'];
      $cuenta = $tabla[$t]['cuentacon'];
      $accion = $tabla[$t]['accion'];
      $fecha = $tabla[$t]['fecha'];
   }

   if($_POST['hfidestatus'] < 2)
   {
      $equipo = strtoupper($_POST['equipo']);
      $accion = strtoupper($_POST['accion']);
      $fecha = $_POST['fecha'];
   }

   if ($_POST['hfidestatus'] == 2 && Derechos('AUTRHVACNC') == true)
   {
      $fechareal = $_POST['fechareal'];
   }
   else
   {
     $fechareal = $tabla[$t]['fechareal'];
   }



   if($ban == true)
      echo "alert('" . $m . "');";
   else
   {
      //$t++;
      $tabla[$t] = array('idcontador' => $t,
                         'equipo' => $equipo,
                         'cuentacon' => $cuenta,
                         'accion' => $accion,
                         'fecha' => $fecha,
                         'fechareal' => $fechareal
                         );


      $_SESSION['tablaherr'] = $tabla;
      TraeDetalle();
   }
   echo "
        vcl.$('edequipo').value = '';
        vcl.$('ckcuentacon').checked = false;
        vcl.$('edaccion').value = '';
        vcl.$('dtfechaherr').value = '';
        vcl.$('dtreal').value = '';

        vcl.$('edequipo').readOnly = false;
        vcl.$('edaccion').readOnly = false;

        vcl.$('hfdetalle').value = '';
          ";


   echo " vcl.$('edequipo').focus();    ";
}

function TraeDetalle()
{
   $tabla = $_SESSION['tablaherr'];
   $tt = count($tabla) - 1;

   //ENCABEZADO
   $e = '<div style=" width:790x; height:160px; overflow: auto">' .
   '<table width="800" border="0" cellspacing="0" cellpadding="0">' .
   '<tr bgcolor="#FF6600">' .

   '<td width="200"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>EQUIPO Y HERR</strong></span></td>' .
   '<td width="50"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>CUENTA CON ELLA</strong></span></td>' .
   '<td width="200"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>ACCION</strong></span></td>' .
   '<td width="200"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<div><strong>F.ESTIMADA</strong></div></span></td>' .
   '<td width="200"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<div><strong>F. REAL</strong></div></span></td>' .
   '<td width="45"></td>' .
   '<td width="45"></td>' .
   '</tr>';

   //DETALLE
   for($i = 0; $i <= $tt; $i++)
   {
      //color renglon
      if(($i % 2) == 0)
         $k = '#F0F0F0';
      else
         $k = '#CDCDCD';

      $ii = $i + 1;

      if($_POST['hfidestatus'] < 3)
      {
         $b = '<td><span style=" font-family: Verdana; font-size: 10;  "><div align="right">' .
         '<a href="javascript:basicAjax(\\\'urhvacantesnc_ajax.php\\\', \\\'EditRow=' . $i .
         '&hfidestatus=\\\'+vcl.$(\\\'hfidestatus\\\').value);">Editar</a>' .
         '</div></span></td>';
      }
      else
         $b = '<td>&nbsp;</td>';

      if($_POST['hfidestatus'] < 2)
      {
         $b .= '<td><span style=" font-family: Verdana; font-size: 10;  "><div align="right">' .
         '<a href="javascript:basicAjax(\\\'urhvacantesnc_ajax.php\\\',\\\'DelRow=' . $i .
         '&hfidestatus=\\\'+vcl.$(\\\'hfidestatus\\\').value);">Borrar</a>' .
         '</div></span></td>';
      }
      else
         $b .= '<td>&nbsp;</td>';


      $t .= '<tr bgcolor="' . $k . '">' .
      $o .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . replacememo($tabla[$i]['equipo']) . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['cuentacon'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . replacememo($tabla[$i]['accion']) . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['fecha'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['fechareal'] . '</span></td>' .
      $b .
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
   '</tr>' .
   '</table></div>';

   $m = 'vcl.$(\'lbdetalle\').innerHTML = \'' . $e . $t . '\';';

   echo $m;
}


?>