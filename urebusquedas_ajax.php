<?php
include("dmconexion.php");
include("urecursos.php");


if(isset($_POST['TraerDetalle']))
{
  switch($_POST['tabla'])
  {
   case 'S' : Servicios();
              break;
   case 'M' : Recibos();
              break;
   case 'C' : Ordenes();
              break;
      }
}

function Servicios()
{
   //ENCABEZADO
   $t = '<div style=" width:790x; height:500px; overflow: auto">' .
   '<table width="800" border="0" cellspacing="0" cellpadding="0">' .
   '<tr bgcolor="#FF6600">' .
   '<td width="100"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>NO ORDEN</strong></span></td>' .
   '<td width="50"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>TIPO</strong></span></td>' .
   '<td width="50"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>CLIENTE</strong></span></td>' .
   '<td width="200"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>NOMBRE</strong></span></td>' .
   '<td width="80"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>FECHA ALTA</strong></span></td>' .
   '<td width="100"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>CHASIS</strong></span></td>' .
   '</tr>';

   $mslink = ConectarGds();

   $memlim = ini_get('memory_limit');
   $maxtime = ini_get('max_execution_time');

   ini_set('memory_limit', '50M');
   ini_set('max_execution_time', '1000');

   $sql = "select OrOrden, OrTipOrd, OrCliente, OrNombre, convert(char(10), OrFecAlta,111) as OrFecAlta ,
                 OrStatus, OrChasis, OrAlmCve from SEORDSER
                 where OrStatus='AB'
                 and OrFecAlta between '".$_POST['f1']."' and '".$_POST['f2']."'
                 and OrAlmCve = '0".$_SESSION['idalmacen']."'
                 order by OrOrden desc";

   $rs = mssql_query($sql, $mslink)or die("Error sql: " . $sql . " " . mssql_error());

   ini_set('memory_limit', $memlim);
   ini_set('max_execution_time', $maxtime);

   while($row = mssql_fetch_array($rs))
   {
      $tt = mssql_num_rows($rs);
      $i++;

      //color renglon
      if(($i % 2) == 0)
         $k = '#F0F0F0';
      else
         $k = '#CDCDCD';

      $t .= '<tr bgcolor="' . $k . '">' .
      '<a href="uresegnoref.php?idservicio=' . $row['OrOrden'] . '">' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $row['OrOrden'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $row['OrTipOrd'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $row['OrCliente'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $row['OrNombre'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $row['OrFecAlta'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $row['OrChasis'] . '</span></td>' .
      '</a></tr>';
   }


   $t .= '<tr>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '</tr>' .
   '</table></div>';

    $t .= '<table width="800" border="0" cellspacing="0" cellpadding="0">' .
   '<tr>' .
   '<td><span style=" font-family: Verdana; font-size: 11;  "><strong>Partidas: ' . $tt . '</strong></span></td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '</tr>' .
   '</table>';


   echo 'vcl.$("lbdetalle").innerHTML = \'' . $t . '\';
      ';

}

function Recibos()
{

  //ENCABEZADO
   $t = '<div style=" width:790x; height:500px; overflow: auto">' .
   '<table width="800" border="0" cellspacing="0" cellpadding="0">' .
   '<tr bgcolor="#FF6600">' .

   '<td width="100"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>RECIBO</strong></span></td>' .
   '<td width="70"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>F. EMISION</strong></span></td>' .
   '<td width="20"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>FP</strong></span></td>' .
   '<td width="80"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong><div align=right>TOTAL</div></strong></span></td>' .
   '<td width="80"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong><div align=right>PENDIENTE</div></strong></span></td>' .
   '<td width="80"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong><div align=right>CLIENTE</div></strong></span></td>' .
   '<td width="1">&nbsp;</td>' .
   '<td width="200"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>NOMBRE</strong></span></td>' .
   '</tr>';

   $mslink = ConectarGds();  //   and t1.CONumer = 108

   $memlim = ini_get('memory_limit');
   $maxtime = ini_get('max_execution_time');

   ini_set('memory_limit', '50M');
   ini_set('max_execution_time', '1000');

   //mssql
   $sql = "SELECT T1.ReNum as recibo, convert(char(10), T4.REFecha,111)  as FechaEmision,
          T1.REChTaEf as formapago, T1.RETotal as total , T1.CAImpCC as pendlig,
          T4.RECteNo as idcliente, T4.REClienNom as nombre
          FROM (((CARECIB1 T1 WITH (NOLOCK)
          LEFT JOIN CACATCOB T2 WITH (NOLOCK) ON T2.CONumer = T1.CONumer)
          LEFT JOIN CNTIPOBA T3 WITH (NOLOCK) ON T3.BcoTipo = T1.BcoTipo)
          INNER JOIN CARECIBO T4 WITH (NOLOCK) ON T4.ReNum = T1.ReNum)

          WHERE T4.REFecha between '".$_POST['f1']."' and '".$_POST['f2']."'
          AND T4.REStatus = 'LP'
          and REAlmCve = '0".$_SESSION['idalmacen']."'
          and ( T2.COTpo = 'REF' or T2.COTpo = 'RER')
         and T1.CAStCC <> 'CC'
          ORDER BY T2.COTpo DESC, T4.RECteNo, T4.REFecha";

   $rs = mssql_query($sql, $mslink)or die("Error sql: " . $sql . " " . mssql_error());

   ini_set('memory_limit', $memlim);
   ini_set('max_execution_time', $maxtime);

   while($row = mssql_fetch_array($rs))
   {
      $tt = mssql_num_rows($rs);
      $i++;

      //color renglon
      if(($i % 2) == 0)
         $k = '#F0F0F0';
      else
         $k = '#CDCDCD';

      $t .= '<tr bgcolor="' . $k . '">' .
      '<a href="uresegnoref.php?idrecibo=' . $row['recibo'] . '">' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $row['recibo'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $row['FechaEmision'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $row['formapago'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; "><div align=right>' . number_format($row['total'],2) . '</div></span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; "><div align=right>' . number_format($row['pendlig'],2) . '</div></span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; "><div align=right>' . $row['idcliente'] . '</div></span></td>' .
      '<td>&nbsp;</td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $row['nombre'] . '</span></td>' .
      '</a></tr>';
   }


   $t .= '<tr>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '</tr>' .
   '</table></div>';

    $t .= '<table width="800" border="0" cellspacing="0" cellpadding="0">' .
   '<tr>' .
   '<td><span style=" font-family: Verdana; font-size: 11;  "><strong>Partidas: ' . $tt . '</strong></span></td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '</tr>' .
   '</table>';


   echo 'vcl.$("lbdetalle").innerHTML = \'' . $t . '\';
      ';

}

function Ordenes()
{

  //ENCABEZADO
   $t = '<div style=" width:790x; height:500px; overflow: auto">' .
   '<table width="800" border="0" cellspacing="0" cellpadding="0">' .
   '<tr bgcolor="#FF6600">' .

   '<td width="120"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>OR. COMPRA</strong></span></td>' .
   '<td width="70"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>ALM</strong></span></td>' .
   '<td width="100"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>F. ORDEN</strong></span></td>' .
   '<td width="60"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong>MON</strong></span></td>' .
   '<td width="80"><span style=" font-family: Verdana; font-size: 10; ">' .
   '<strong><div align=right>TOTAL</div></strong></span></td>' .
   '</tr>';

   $mslink = ConectarGds();
   $sql = "select OCNoOrCo, ReCveALm, convert(char(10), OCFOrCom,111) as OCFOrCom, OCTipMon, OCImpTot
           from REORDCOM
           where OCFOrCom between '".$_POST['f1']."' and '".$_POST['f2']."'
           and OCstOrd = 'AB'";

   $rs = mssql_query($sql, $mslink)or die("Error sql: " . $sql . " " . mssql_error());
   while($row = mssql_fetch_array($rs))
   {
      $tt = mssql_num_rows($rs);
      $i++;

      //color renglon
      if(($i % 2) == 0)
         $k = '#F0F0F0';
      else
         $k = '#CDCDCD';

      $t .= '<tr bgcolor="' . $k . '">' .
      '<a href="uresegnoref.php?idorden=' . $row['OCNoOrCo'] . '">' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $row['OCNoOrCo'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $row['ReCveALm'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $row['OCFOrCom'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $row['OCTipMon'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; "><div align=right>' . number_format($row['OCImpTot'],2) . '</div></span></td>' .
      '</a></tr>';
   }


   $t .= '<tr>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '</tr>' .
   '</table></div>';

    $t .= '<table width="800" border="0" cellspacing="0" cellpadding="0">' .
   '<tr>' .
   '<td><span style=" font-family: Verdana; font-size: 11;  "><strong>Partidas: ' . $tt . '</strong></span></td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '<td>&nbsp;</td>' .
   '</tr>' .
   '</table>';


   echo 'vcl.$("lbdetalle").innerHTML = \'' . $t . '\';
      ';

}

?>
