<?php
include("dmconexion.php");
include("urecursos.php");
include("ufechas.php");

if(isset($_POST['TraeColaborador']))
{
   $idcolaborador = $_POST['TraeColaborador'];
   $fecha = $_POST['fecha'];
   $sql = 'Select concat(c.nombre, " ", c.apaterno, " ", c.amaterno) as nombre, bloqpermisos,
                a.nombre as area, p.nombre as puesto, c.idcolaborador, c.idplaza
                from rhcolaboradores c left join areas a on a.idarea=c.idarea
                left join puestos p on p.idpuesto=c.idpuesto
                where c.idempleado=' . $idcolaborador;
   $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
   $row = mysql_fetch_array($rs);
   if($row != false)
   {

      if($row["bloqpermisos"] == 1)
         $chk = 'true';
      else
         $chk = 'false';

      echo '
        vcl.$("hfidcolaborador").value = ' . $row['idcolaborador'] . ';
        vcl.$("ednombre").value = "' . $row['nombre'] . '";
        vcl.$("edarea").value = "' . $row['area'] . '";
        vcl.$("edpuesto").value = "' . $row['puesto'] . '";
        vcl.$("cbplaza").value = "' . $row['idplaza'] . '";

        ';
              //vcl.$("chkbloqueado").checked = ' . $chk . ';

      $idcolaborador = $row['idcolaborador'];

      $sql = 'select count(idsolicitud) as t from rhpermisos
                where idcolaborador = '. $idcolaborador .
                ' and YEAR(fechacreacion) = year(CURDATE()) and idestatus = 3 ';
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);
      $cont = $row['t'];
      echo 'vcl.$("edacumulados").value = "' . $cont . '";';
   }
   else
   {
      echo 'alert("El colaborador no existe.");';
   }

}

if(isset($_POST['Calcular']))
{
   TraeDetalle();
}


if(isset($_POST['EditRow']))
{
   $tabla = $_SESSION['tablapermisos'];
   $i = $_POST['EditRow'];

   echo '
   vcl.$("dtreposicion").value = "' . $tabla[$i]['fecharep'] . '";
   vcl.$("edrepinicio").value = "' . $tabla[$i]['iniciorep'] . '";
   vcl.$("edrepfin").value = "' . $tabla[$i]['finrep'] . '";
   vcl.$("hfdetalle").value = "editar";
   vcl.$("hfidcontador").value =' . $i . ';
   ' . $s;
}

if(isset($_POST['DelRow']))
{
   $row = $_POST['DelRow'];
   $tabla = $_SESSION['tablapermisos'];

   unset($tabla[$row]);
   $tabla = array_values($tabla);
   for($i = 0; $i <= count($tabla) - 1; $i++)
      $tabla[$i]['idcontador'] = $i;

   $_SESSION['tablapermisos'] = $tabla;
   TraeDetalle();
}


if(isset($_POST['Agregar']))
{
   $tabla = $_SESSION['tablapermisos'];
   $t = count($tabla);
   $ban = false;

  // if(0 > DateDiff($_POST['fecharep'], date('Y-n-j')))
  // {
  //    $m = 'La fecha de Reposicion es menor a la actual ' . $_POST['fecharep'];
  //    $ban = true;
  // }

   if(TimeDiff($_POST['iniciorep'], $_POST['finrep']) > 0)
   {
      $m = 'La hora de inicio es mayor a la hora fin.';
      $ban = true;
   }
   else
   {
      if(DateDiff($_POST['fecharep'], $_POST['fechaaus']) == 0)
      {

         $m = 'La Reposicion esta sobre la Hora de Ausencia';

         if(TimeDiff($_POST['iniciorep'], $_POST['inicio']) < 0 &&
         TimeDiff($_POST['finrep'], $_POST['inicio']) > 0)
            $ban = true;

         if(TimeDiff($_POST['iniciorep'], $_POST['inicio']) > 0 &&
         TimeDiff($_POST['finrep'], $_POST['fin']) < 0)
            $ban = true;

         if(TimeDiff($_POST['iniciorep'], $_POST['inicio']) > 0 &&
         TimeDiff($_POST['iniciorep'], $_POST['fin']) < 0)
            $ban = true;

      }
   }

   if($_POST['detalle'] != 'editar')
   {
      for($i = 0; $i <= $t - 1; $i++)
         if($tabla[$i]['fecharep'] == $_POST['fecharep'])
         {
            $ban = true;
            $m = 'Esta fecha ya fue registrada.' . $tabla[$i]['fecharep'];
         }
   }
   else
   {
      $i = $_POST['hfidcontador'];
      if(strtotime($_POST['fecharep']) < strtotime(date('Y/m/d')))
      {
         $ban = true;
         $m = 'La fecha de recepcion es menor a la actual';
      }
   }

   if($ban == true)
      echo "alert('" . $m . "');";
   else
   {
      $tabla[$i] = array('idcontador' => $i,
                         'fecharep' => $_POST['fecharep'],
                         'iniciorep' => $_POST['iniciorep'],
                         'finrep' => $_POST['finrep']
                         );


      $_SESSION['tablapermisos'] = $tabla;
      TraeDetalle();
   }
   echo '
           vcl.$("dtreposicion").value = "";
           vcl.$("edrepinicio").value = "";
           vcl.$("edrepfin").value = "";
           vcl.$("hfdetalle").value = "";
          ';

   echo " vcl.$('dtreposicion').focus();    ";
}

function TraeDetalle()
{
   $tabla = $_SESSION['tablapermisos'];
   $tt = count($tabla) - 1;

   //ENCABEZADO
   $e = ' <div style = " width:400x; height:200px; overflow: auto" > ' .
   ' <table width = "400"border = "0" cellspacing = "0" cellpadding = "0" > ' .
   ' <tr bgcolor = "#FF6600" > ' .
   ' <td width = "80" > <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <strong> FECHA </strong > </span > </td > ' .
   ' <td width = "80" > <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <strong> H.INICIO </strong > </span > </td > ' .
   ' <td width = "80" > <span style = " font-family: Verdana; font-size: 10; " > ' .
   ' <strong> H.FIN </strong > </span > </td > ' .
   ' <td width = "45" > </td > ' .
   ' <td width = "45" > </td > ' .
   ' </tr > ';

   //DETALLE
   for($i = 0; $i <= $tt; $i++)
   {
      //color renglon
      if(($i % 2) == 0)
         $k = '#C2C2C2';
      else
         $l = '#CFCFCF';

      $ii = $i + 1;

      if($_POST['hfidestatus'] < 3)
      {
         $editar = '<td><span style=" font-family: Verdana; font-size: 10;  "><div align="right">' .
         '<a href="javascript:basicAjax(\\\'urhpermisos_ajax.php\\\', \\\'EditRow=' . $i . '\\\');">Actualizar</a>' .
         '</div></span></td>';
      }
      else
         $editar = '<td>&nbsp;</td>';

      if($_POST['hfidestatus'] < 2)
      {
         $borrar = '<td><span style=" font-family: Verdana; font-size: 10;  "><div align="right">' .
         '<a href="javascript:basicAjax(\\\'urhpermisos_ajax.php\\\',\\\'DelRow=' . $i .
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
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['fecharep'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['iniciorep'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['finrep'] . '</span></td>' .
      $editar .
      $borrar .
      '</tr>';
   }

   $t .= '<tr>' .
   '<td><span style=" font-family: Verdana; font-size: 11;  "><strong>Partidas: ' . $i . '</strong></span></td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '</table></div>';

   $m = 'vcl.$(\'lbdetalle\').innerHTML = \'' . $e . $t . '\';';

   echo $m;
}


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

?>