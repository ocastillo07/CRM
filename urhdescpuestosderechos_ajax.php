<?php
include('dmconexion.php');
include('urecursos.php');

if(isset($_POST['Inicializa']))
{
   $idpuesto = $_POST['idpuesto'];

   //LLena tabla con derechos de usuario

   $sql = 'SELECT p.idpuesto, p.nombre as puesto, a.nombre as area,
           if(d.iddescripcion is null, 0, 1) as der
           from puestos p
           left join rhdescpuestos_der d on p.idpuesto=d.iddescripcion
           left join areas a on a.idarea=p.idarea
           where d.idpuesto=' . $idpuesto;
   $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

   $_SESSION['tabladesc'] = array();
   $i = 0;
   while($row = mysql_fetch_array($rs))
   {
      $_SESSION['tabladesc'][$i] = $row['idpuesto'];
      $i++;
   }
   LlenaAreas();
}

if(isset($_POST['Liberar']))
{
   $_SESSION['tabladesc'] = array();

   $sql = 'SELECT idpuesto FROM puestos ';
   $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
   $i = 0;
   while($row = mysql_fetch_array($rs))
   {
      $_SESSION['tabladesc'][$i] = $row['idpuesto'];
      $i++;
   }
   echo "alert('Derechos Liberados');";
}

if(isset($_POST['Bloquear']))
{
   $_SESSION['tabladesc'] = array();
   echo "alert('Derechos Bloqueados');";
}

function LlenaAreas()
{

   //LLENA LAS AREAS Y LINKS A SUS PUESTOS
   $sql = 'Select idarea id, nombre from areas ';
   $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);

   $m = '';
   while($row = mysql_fetch_array($rs))
   {
      if($m == '')
      {
         $m = '<table width="200" border="1" cellspacing="0" cellpadding="0">' .
         '<tr> <td width="159" bgcolor="#FF9900"><span style=" font-family: Verdana; font-size: 10;  ">' .
         '<strong>AREAS</strong></span></td> </tr>';
      }

      if($idmenu != $row['id'])
         $col = '#FFFFFF';
      else
         $col = '#FF6600';

      $m .= '<tr bgcolor="' . $col . '">' .
      '<td><span style=" font-family: Verdana; font-size: 10;  ">' .
      '<a href="javascript:basicAjax(\\\'urhdescpuestosderechos_ajax.php\\\',' .
      '\\\'LlenaPuestos=1&idarea=' . $row['id'] .
      '&hfidpuesto=\\\'+vcl.$(\\\'hfidpuesto\\\').value);">' .
      '<div align="left">' . $row['nombre'] . '</div></a></span></td></tr> ';
   }
   $m .= '</table>';

   echo 'vcl.$("lbareas").innerHTML = \'' . $m . '\';
         vcl.$("lbpuestos").innerHTML = \'\'; ';

}

if(isset($_POST['LlenaPuestos']))
{
   LlenaPuestos($_POST['idarea'], $_POST['hfidpuesto']);
}

function LlenaPuestos($idarea, $hfidpuesto)
{

   $sql = 'SELECT p.idpuesto, p.nombre as puesto, a.nombre as area,
           if(d.iddescripcion is null, 0, 1) as der
           from puestos p
           left join rhdescpuestos_der d on p.idpuesto=d.iddescripcion
           and d.idpuesto=' . $hfidpuesto . '
           left join areas a on a.idarea=p.idarea
           where p.idarea =  ' . $idarea;
   $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);


   $m = '<table width="250" border="1" cellspacing="0" cellpadding="0">' .
   '<tr> <td width="159" bgcolor="#FF9900"><span style=" font-family: Verdana; font-size: 10;  ">' .
   '<span style=" font-family: Verdana; font-size: 10;  ">' .
   '<a href="javascript:basicAjax(\\\'urhdescpuestosderechos_ajax.php\\\',\\\'LiberarPagina=1' .
   '&idpuesto=' . $row['idpuesto'] . '&hfidpuesto=\\\'+vcl.$(\\\'hfidpuesto\\\').value);">' .
   '<div align="left"><strong>DERECHOS:</strong></div></a></span></td> </tr>';

   while($row = mysql_fetch_array($rs))
   {
      $col = '#FFFFFF';
      $der = '0';
      $c = count($_SESSION['tabladesc']);
      $h = $c;
      $ban = false;
      for($i = 0; $i <= $c; $i++)
      {
         if($_SESSION['tabladesc'][$i] == $row['idpuesto'])
         //if($row['derecho'] == '1')
         {
            $col = '#92C2EB';
            $der = '1';
            $ban = true;
         }


         if($ban == false)
            if($todo == true)
            {
               $col = '#92C2EB';
               $der = '1';
               $h++;
               $_SESSION['tabladesc'][$h] = $row['idpuesto'];
            }
      }


      $m .= '<tr bgcolor="' . $col . '">' .
      '<td><span style=" font-family: Verdana; font-size: 10;  ">' .
      '<a href="javascript:basicAjax(\\\'urhdescpuestosderechos_ajax.php\\\',\\\'Derechos=' .
      $row['idpuesto'] . '&der=' . $der . '&idarea=' . $idarea .
      '&hfidpuesto=\\\'+vcl.$(\\\'hfidpuesto\\\').value);">' .
      '<div align="left">' . $row['puesto'] . '</div></a></span></td></tr> ';
   }
   $m .= '</table>';

   echo 'vcl.$("lbpuestos").innerHTML = \'' . $m . '\';';
}

if(isset($_POST['Derechos']))
{
   $derecho = $_POST['Derechos'];
   $der = $_POST['der'];
   $hfidpuesto = $_POST['hfidpuesto'];
   $idarea = $_POST['idarea'];
   $tabla = $_SESSION['tabladesc'];
   $c = count($tabla);

   if($der == 1)
   {
      for($i = 0; $i <= $c; $i++)
      {
         if($tabla[$i] == $derecho)
         {
            unset($tabla[$i]);
            $tabla = array_values($tabla);
            $_SESSION['tabladesc'] = $tabla;
         }
      }
   }
   else
   {
      $h = count($_SESSION['tabladesc']);
      $_SESSION['tabladesc'][$h] = $derecho;
   }

   LlenaPuestos($idarea, $hfidpuesto);
}

if(isset($_POST['Imprimir']))
{
   echo 'window.open("http://' . $_SESSION['ServidorJasper'] . '/ibc.jsp' .
   '?reporte=usuariosderechos&tiporeporte=pdf&idusuario=' . $_POST['Imprimir'] . '", "_blank");';
}

?>