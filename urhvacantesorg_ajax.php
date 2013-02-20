<?php
include("dmconexion.php");
include("urecursos.php");

if(isset($_POST['TraeEntrevistador']))
{
   $idcolaborador = $_POST['TraeEntrevistador'];
   $sql = 'Select concat(c.nombre, " ", c.apaterno, " ", c.amaterno) as nombre,
                a.nombre as area, p.nombre as puesto, c.idcolaborador, c.idplaza
                from rhcolaboradores c left join areas a on a.idarea=c.idarea
                left join puestos p on p.idpuesto=c.idpuesto
                where c.idempleado=' . $idcolaborador . ' and c.estatus = 1';
   $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
   $row = mysql_fetch_array($rs);
   if($row != false)
   {
      if($_POST['edit'] == 'rh')
         echo '
        vcl.$("hfidentrevistadorrh").value = ' . $row['idcolaborador'] . ';
        vcl.$("edentrevistadorrh").value = "' . $row['nombre'] . '";
        ';
      else
         echo '
        vcl.$("hfidentrevistador").value = ' . $row['idcolaborador'] . ';
        vcl.$("edentrevistador").value = "' . $row['nombre'] . '";
        ';
   }
   else
      echo 'alert("El colaborador no se encuentra registrado o activo.");';
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


if(isset($_POST['Calcular']))
{
   TraeDetalle();
}

if(isset($_POST['Agregar']))
{
   $tabla = $_SESSION['tablavo'];
   $t = count($tabla);
   $ban = false;

   if($_POST['detalle'] != 'editar')
   {
      for($i = 0; $i <= $t - 1; $i++)
         if($tabla[$i]['nombre'] == $_POST['nombre'])
         {
            $ban = true;
            $m = 'Esta persona ya fue registrada.' . $tabla[$i]['nombre'] . '  p  ' . $_POST['nombre'];
         }
   }
   else
   {
      $i = $_POST['hfidcontador'];
      if(strtotime($_POST['fecharecepcion']) > strtotime(date('Y/m/d')))
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
                         'nombre' => strtoupper($_POST['nombre']),
                         'pathcurr' => $_POST['pathcurr'],
                         'fentrevista' => $_POST['fentrevista'],
                         'hentrevista' => $_POST['hentrevista'],
                         'cumpleperfil' => $_POST['cumpleperfil'],
                         'obsentrevista' => $_POST['obsentrevista'],
                         'hfidentrevistador' => $_POST['hfidentrevistador'],
                         'identrevistador' => $_POST['identrevistador'],
                         'entrevistador' => strtoupper($_POST['entrevistador']),
                         'fentrevista2' => $_POST['fentrevista2'],
                         'hentrevista2' => $_POST['hentrevista2'],
                         'hfidentrevistadorrh' => $_POST['hfidentrevistadorrh'],
                         'identrevistadorrh' => $_POST['identrevistadorrh'],
                         'entrevistadorrh' => strtoupper($_POST['entrevistadorrh']),
                         'fentrevista3' => $_POST['fentrevista3'],
                         'hentrevista3' => $_POST['hentrevista3'],
                         'resultado' => $_POST['resultado'],
                         'habilidades' => $_POST['habilidades'],
                         'conocimientos' => $_POST['conocimientos'],
                         'observaciones' => $_POST['observaciones'],
                         'evgeneral' => $_POST['evgeneral'],
                         'refempresa' => strtoupper($_POST['refempresa']),
                         'refpuesto' => strtoupper($_POST['refpuesto']),
                         'obsreferencia' => strtoupper($_POST['obsreferencia']),
                         'refrating' => $_POST['refrating']
                         );


      $_SESSION['tablavo'] = $tabla;
      TraeDetalle();
   }

   echo ' vcl.$("hfidcontador").value = "";
          vcl.$("hfdetalle").value = "";

          vcl.$("ednombre").value = "";
          vcl.$("lbadjunto").InnerHTML  = "";

          vcl.$("hfpath").value  = "";

          vcl.$("dtentrevista").value = "";
          vcl.$("edhentrevista").value = "";
          vcl.$("rgcumpleperfil").value = -1;
          setCheckedValue(vcl.$("rgcumpleperfil"), -1);
          vcl.$("edobsentrevista").value = "";

          vcl.$("hfidentrevistador").value = "";
          vcl.$("edidentrevistador").value = "";
          vcl.$("edentrevistador").value = "";
          vcl.$("dtentrevista2").value = "";
          vcl.$("edhentrevista2").value = "";

          vcl.$("hfidentrevistadorrh").value = "";
          vcl.$("edidentrevistadorrh").value = "";
          vcl.$("edentrevistadorrh").value = "";
          vcl.$("dtentrevista3").value = "";
          vcl.$("edhentrevista3").value = "";
          setCheckedValue(vcl.$("rgresultado"), -1);
          vcl.$("edhabilidades").value = "";
          vcl.$("edconocimientos").value = "";
          vcl.$("edobsdepartamento").value = "";
          setCheckedValue(vcl.$("rgevgeneral"), -1);
          setCheckedValue(vcl.$("rgopcontratacion"), -1);

          vcl.$("edempresa").value = "";
          vcl.$("edpuesto").value = "";
          vcl.$("edobsreferencias").value = "";
          setCheckedValue(vcl.$("rgrefrating"), -1);
          ';

   echo " vcl.$('ednombre').focus();    ";
}

if(isset($_POST['EditRow']))
{
   $tabla = $_SESSION['tablavo'];
   $i = $_POST['EditRow'];
   $path = GetConfiguraciones('PathCurriculums');

   echo '
          vcl.$("ednombre").value = "' . $tabla[$i]['nombre'] . '";
          vcl.$("hfpath").value = "' . $tabla[$i]['pathcurr'] . '";
          vcl.$("lbadjunto").innerHTML  = "<A href=\"/' . $path . $tabla[$i]['pathcurr'] . '\" target=blank>'. $tabla[$i]['pathcurr'] .'</A>";
          vcl.$("lbeliminar").innerHTML = "<A onclick=\"return lbeliminarClickWrapper(event, findObj(\'lbeliminarSubmitEvent\'), \'lbeliminar_lbeliminarClick\')\" href=\"'. $path . $tabla[$i]['pathcurr'] .'\" target=blank>Eliminar</A>";

          vcl.$("dtentrevista").value = "' . $tabla[$i]['fentrevista'] . '";
          vcl.$("edhentrevista").value = "' . $tabla[$i]['hentrevista'] . '";
          setCheckedValue(vcl.$("rgcumpleperfil"), ' . $tabla[$i]['cumpleperfil'] . ');
          vcl.$("edobsentrevista").value = "' . $tabla[$i]['obsentrevista'] . '";

          vcl.$("hfidentrevistador").value = "' . $tabla[$i]['hfidentrevistador'] . '";
          vcl.$("edidentrevistador").value = "' . $tabla[$i]['identrevistador'] . '";
          vcl.$("edentrevistador").value = "' . $tabla[$i]['entrevistador'] . '";
          vcl.$("dtentrevista2").value = "' . $tabla[$i]['fentrevista2'] . '";
          vcl.$("edhentrevista2").value = "' . $tabla[$i]['hentrevista2'] . '";

          vcl.$("hfidentrevistadorrh").value = "' . $tabla[$i]['hfidentrevistadorrh'] . '";
          vcl.$("edidentrevistadorrh").value = "' . $tabla[$i]['identrevistadorrh'] . '";
          vcl.$("edentrevistadorrh").value = "' . $tabla[$i]['entrevistadorrh'] . '";
          vcl.$("dtentrevista3").value = "' . $tabla[$i]['fentrevista3'] . '";
          vcl.$("edhentrevista3").value = "' . $tabla[$i]['hentrevista3'] . '";
          setCheckedValue(vcl.$("rgresultado"), ' . $tabla[$i]['resultado'] . ');
          vcl.$("edhabilidades").value = "' . $tabla[$i]['habilidades'] . '";
          vcl.$("edconocimientos").value = "' . $tabla[$i]['conocimientos'] . '";
          vcl.$("edobsdepartamento").value = "' . $tabla[$i]['observaciones'] . '";
          setCheckedValue(vcl.$("rgevgeneral"), ' . $tabla[$i]['evgeneral'] . ');

          vcl.$("edempresa").value = "' . $tabla[$i]['refempresa'] . '";
          vcl.$("edpuesto").value = "' . $tabla[$i]['refpuesto'] . '";
          vcl.$("edobsreferencias").value = "' . $tabla[$i]['obsreferencia'] . '";
          setCheckedValue(vcl.$("rgrefrating"), ' . $tabla[$i]['refrating'] . ');
          vcl.$("hfdetalle").value = "editar";
          vcl.$("hfidcontador").value =' . $i . ';
   ';
}

if(isset($_POST['DelRow']))
{
   $row = $_POST['DelRow'];
   $tabla = $_SESSION['tablavo'];

   unset($tabla[$row]);
   $tabla = array_values($tabla);
   for($i = 0; $i <= count($tabla) - 1; $i++)
      $tabla[$i]['idcontador'] = $i;

   $_SESSION['tablavo'] = $tabla;
   TraeDetalle();
}

function TraeDetalle()
{
   $tabla = $_SESSION['tablavo'];
   $tt = count($tabla) - 1;

   //ENCABEZADO
   $e =
   '<table width="800" border="0" class="Tabla"> ' .

   '<tr bgcolor="#FF6600"> ' .
   '<td><span style=" font-family: Verdana; font-size: 10; "><strong>Nombre</strong></span></td>' .
   '<td><span style=" font-family: Verdana; font-size: 10; "><strong>Archivo</strong></span></td>' .
   '<td width="39">&nbsp;</td>' .
   '<td width="46">&nbsp;</td>' .
   '</tr>';
   $path = GetConfiguraciones('PathCurriculums');
   //DETALLE
   for($i = 0; $i <= $tt; $i++)
   {
      //color renglon
      if(($i % 2) == 0)
         $k1 = '#C2C2C2';
      else
         $k1 = '#4297DD';

      $ii = $i + 1;

      if($_POST['hfidestatus'] != 4 && $_POST['hfidestatus'] != 7)
      {
         $editar = '<span style=" font-family: Verdana; font-size: 10;  "><div align="right">' .
         '<a href="javascript:basicAjax(\\\'urhvacantesorg_ajax.php\\\', \\\'EditRow=' . $i . '\\\');">Actualizar</a>' .
         '</div></span>';
      }
      else
         $editar = '&nbsp;';

      if($_POST['hfidestatus'] < 3)
      {
         $borrar = '<span style=" font-family: Verdana; font-size: 10;  "><div align="right">' .
         '<a href="javascript:basicAjax(\\\'urhvacantesorg_ajax.php\\\',\\\'DelRow=' . $i .
         '&hfidestatus=\\\'+vcl.$(\\\'hfidestatus\\\').value);">Borrar</a>' .
         '</div></span>';
      }
      else
         $borrar .= '&nbsp;';


      if($tabla[$i]['pathcurr'] != '')
         $archivo = '<a href="' . $path . $tabla[$i]['pathcurr'] . '" target="_blank">' . $tabla[$i]['pathcurr'] . '</a>';
      else
         $archivo = '';
      $e .=
      '<tr bgcolor="' . $k1 . '"> ' .

      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['nombre'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $archivo . '</span></td>' .
      '<td width="39">' . $editar . '</td>' .
      '<td width="46">' . $borrar . '</td>' .
      '</tr>';

   }

   $t .= '<tr>' .
   '<td><span style=" font-family: Verdana; font-size: 11;  "><strong>Partidas: ' . $i . '</strong></span></td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '</tr>' .
   '</table>';

   $m = 'vcl.$(\'lbdetalle\').innerHTML = \'' . $e . $t . '\';';

   echo $m;
}

/*
function TraeDetalle()
{
$tabla = $_SESSION['tablavo'];
$tt = count($tabla) - 1;

//ENCABEZADO
$e =
'<table width="800" border="0" class="Tabla"> ' .

'<tr bgcolor="#FF6600"> ' .
'<td width="701">' .
'<table width="700" border="0">' .
'<tr><td><span style=" font-family: Verdana; font-size: 10; "><strong>Nombre</strong></span></td>' .
'<td><span style=" font-family: Verdana; font-size: 10; "><strong>Archivo</strong></span></td></tr>' .
'</table></td>' .
'<td width="39">&nbsp;</td><td width="46">&nbsp;</td>' .
'</tr>' .

'<tr bgcolor="#FFA215">' .
'<td><table width="700" border="0">' .
'<tr><td width="98"><span style=" font-family: Verdana; font-size: 10; "><strong>F. Entrevista</strong></span></td>' .
'<td width="175"><span style=" font-family: Verdana; font-size: 10; "><strong>Resultado</strong></span></td>' .
'<td width="605"><span style=" font-family: Verdana; font-size: 10; "><strong>Observaciones</strong></span></td>' .
'</tr></table></td>' .
'<td>&nbsp;</td> <td>&nbsp;</td>' .
'</tr>' .

'<tr bgcolor="#FFCE09"><td><table width="700" border="0">' .
'<tr><td width="519"><span style=" font-family: Verdana; font-size: 10; "><strong>Entrevistador</strong></span></td>' .
'<td width="180"><span style=" font-family: Verdana; font-size: 10; "><strong>F. Entrevista</strong></span></td>' .
'<td width="179"><span style=" font-family: Verdana; font-size: 10; "><strong>H. Entrevista</strong></span></td>' .
'</tr></table></td>' .
'<td>&nbsp;</td><td>&nbsp;</td>' .
'</tr>' .

'<tr bgcolor="#FFE066"><td><table width="700" border="0">' .
'<tr><td><table width="695" border="0"><tr>' .
'<td width="128"><span style=" font-family: Verdana; font-size: 10; "><strong>F Entrevista</strong></span></td>' .
'<td width="143"><span style=" font-family: Verdana; font-size: 10; "><strong>H. Entrevista</strong></span></td>' .
'<td width="163"><span style=" font-family: Verdana; font-size: 10; "><strong>Resultado</strong></span></td>' .
'<td width="428"><span style=" font-family: Verdana; font-size: 10; "><strong>Habilidades</span></td>' .
'</tr></table></td></tr>' .
'<tr><td><table width="695" border="0"><tr>' .
'<td><span style=" font-family: Verdana; font-size: 10; "><strong>Conocimientos</strong></span></td>' .
'<td><span style=" font-family: Verdana; font-size: 10; "><strong>Observaciones</strong></span></td>' .
'</tr></table></td></tr>' .
'<tr><td><table width="695" border="0"><tr>' .
'<td><span style=" font-family: Verdana; font-size: 10; "><strong>Evaluacion General</strong></span></td>' .
'<td><span style=" font-family: Verdana; font-size: 10; "><strong>Opcion de Contratacion</span></td>' .
'</tr></table></td></tr></table></td>' .
'<td>&nbsp;</td><td>&nbsp;</td></tr>' .

'<tr bgcolor="#FFEC9D"> <td><table width="700" border="0"><tr>' .
'<td width="390"><span style=" font-family: Verdana; font-size: 10; "><strong>Empresa</strong></span></td>' .
'<td width="316"><span style=" font-family: Verdana; font-size: 10; "><strong>Puesto</strong></span></td>' .
'<td width="187"><span style=" font-family: Verdana; font-size: 10; "><strong>Referencia</strong></span></td>' .
'</tr></table></td><td>&nbsp;</td><td>&nbsp;</td></tr></table> ' .
' <div style = " width:800x; height:200px; overflow: auto" > ';

//DETALLE
for($i = 0; $i <= $tt; $i++)
{
//color renglon
if(($i % 2) == 0)
{
$k1 = '#C2C2C2';
$k2 = '#D2D2D2';
$k3 = '#E4E4E4';
$k4 = '#F3F3F3';
$k5 = '#FBFBFB';
}
else
{
$k1 = '#4297DD';
$k2 = '#69ADE4';
$k3 = '#92C2EB';
$k4 = '#C4DEF4';
$k5 = '#E2EFFA';
}

$ii = $i + 1;

if($_POST['hfidestatus'] != 4 && $_POST['hfidestatus'] != 7)
{
$editar = '<span style=" font-family: Verdana; font-size: 10;  "><div align="right">' .
'<a href="javascript:basicAjax(\\\'urhvacantesorg_ajax.php\\\', \\\'EditRow=' . $i . '\\\');">Actualizar</a>' .
'</div></span>';
}
else
$editar = '&nbsp;';

if($_POST['hfidestatus'] < 2)
{
$borrar = '<span style=" font-family: Verdana; font-size: 10;  "><div align="right">' .
'<a href="javascript:basicAjax(\\\'urhvacantesorg_ajax.php\\\',\\\'DelRow=' . $i .
'&hfidestatus=\\\'+vcl.$(\\\'hfidestatus\\\').value);">Borrar</a>' .
'</div></span>';
}
else
$borrar .= '&nbsp;';

if($tabla[$i]['cumpleperfil'] == '0')
$cumpleperfil = 'SI';
else
$cumpleperfil = 'NO';

if($tabla[$i]['resultado'] == '0')
$resultado = 'SI';
else
$resultado = 'NO';

if($tabla[$i]['evgeneral'] == '0')
$evgeneral = 'ACEPTADO';
else
$evgeneral = 'RECHAZADO';

switch($tabla[$i]['refrating'])
{
case 0 :
$refrating = 'EXCELENTES';
break;

case 1 :
$refrating = 'BUENAS';
break;

case 2 :
$refrating = 'REGULAR';
break;

case 3 :
$refrating = 'MALAS';
break;

case 4 :
$refrating = 'DESCONOCIDAS';
break;
}

$e .= '<table width="800" border="0" class="Tabla"> ' .
'<tr bgcolor="' . $k1 . '"> ' .
'<td width="701">' .
'<table width="700" border="0">' .
'<tr><td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['nombre'] . '</span></td>' .
'<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['pathcurr'] . '</span></td></tr>' .
'</table></td>' .
'<td width="39">' . $editar . '</td><td width="46">' . $borrar . '</td>' .
'</tr>' .

'<tr bgcolor="' . $k2 . '">' .
'<td><table width="700" border="0">' .
'<tr><td width="98"><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['fentrevista'] . '</span></td>' .
'<td width="175"><span style=" font-family: Verdana; font-size: 10; ">' . $cumpleperfil . '</span></td>' .
'<td width="605"><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['obsentrevista'] . '</span></td>' .
'</tr></table></td>' .
'<td>&nbsp;</td> <td>&nbsp;</td>' .
'</tr>' .

'<tr bgcolor="' . $k3 . '"><td><table width="700" border="0">' .
'<tr><td width="519"><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['entrevistador'] . '</span></td>' .
'<td width="180"><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['fentrevista2'] . '</span></td>' .
'<td width="179"><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['hentrevista2'] . '</span></td>' .
'</tr></table></td>' .
'<td>&nbsp;</td><td>&nbsp;</td>' .
'</tr>' .

'<tr bgcolor="' . $k4 . '"><td><table width="700" border="0">' .
'<tr><td><table width="695" border="0"><tr>' .
'<td width="128"><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['fentrevista3'] . '</span></td>' .
'<td width="143"><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['hentrevista3'] . '</span></td>' .
'<td width="163"><span style=" font-family: Verdana; font-size: 10; ">' . $resultado . '</span></td>' .
'<td width="428"><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['habilidades'] . '</span></td>' .
'</tr></table></td></tr>' .
'<tr><td><table width="695" border="0"><tr>' .
'<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['conocimientos'] . '</span></td>' .
'<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['observaciones'] . '</span></td>' .
'</tr></table></td></tr>' .
'<tr><td><table width="695" border="0"><tr>' .
'<td><span style=" font-family: Verdana; font-size: 10; ">' . $evgeneral . '</span></td>' .
'<td><span style=" font-family: Verdana; font-size: 10; ">' . ($tabla[$i]['opcontratacion'] + 1) . '</span></td>' .
'</tr></table></td></tr></table></td>' .
'<td>&nbsp;</td><td>&nbsp;</td></tr>' .

'<tr bgcolor="' . $k5 . '"> <td><table width="700" border="0"><tr>' .
'<td width="390"><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['refempresa'] . '</span></td>' .
'<td width="316"><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['refpuesto'] . '</span></td>' .
'<td width="187"><span style=" font-family: Verdana; font-size: 10; ">' . $refrating . '</span></td>' .
'</tr></table></td><td>&nbsp;</td><td>&nbsp;</td></tr></table> ';

}

$t .= '</div><table><tr>' .
'<td><span style=" font-family: Verdana; font-size: 11;  "><strong>Partidas: ' . $i . '</strong></span></td>' .
'<td>&nbsp;</td>' .
'<td>&nbsp;</td>' .
'<td>&nbsp;</td>' .
'<td>&nbsp;</td>' .
'<td>&nbsp;</td>' .
'<td>&nbsp;</td>' .
'<td>&nbsp;</td>' .
'</tr>' .
'</table>';

$m = 'vcl.$(\'lbdetalle\').innerHTML = \'' . $e . $t . '\';';

echo $m;
}  */

?>