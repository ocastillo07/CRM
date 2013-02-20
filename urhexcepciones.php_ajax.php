<?php
include("dmconexion.php");
include("urecursos.php");

if(isset($_POST['TraeColaborador']))
{
$idcolaborador = $_POST['TraeColaborador'];
$sql = 'Select concat(c.nombre, " ", c.apaterno, " ", c.amaterno) as nombre,
                a.nombre as area, p.nombre as puesto
                from rhcolaboradores c left join areas a on a.idarea=c.idarea
                left join puestos p on p.idpuesto=c.idpuesto
                where c.idcolaborador='.$idcolaborador;
        $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
        $row = mysql_fetch_array($rs);

  echo '
        vcl.$("ednombre").value = "'.$row['nombre'].'";
        vcl.$("edarea").value = "'.$row['area'].'";
        vcl.$("edpuesto").value = "'.$row['puesto'].'";
        ';
}
?>