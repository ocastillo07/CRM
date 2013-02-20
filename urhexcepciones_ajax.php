<?php
include("dmconexion.php");
include("urecursos.php");

if(isset($_POST['TraeColaborador']))
{
   $idcolaborador = $_POST['TraeColaborador'];
   $sql = 'Select concat(c.nombre, " ", c.apaterno, " ", c.amaterno) as nombre,
                a.nombre as area, p.nombre as puesto, c.idcolaborador, c.idplaza
                from rhcolaboradores c left join areas a on a.idarea=c.idarea
                left join puestos p on p.idpuesto=c.idpuesto
                where c.idempleado=' . $idcolaborador . ' and c.estatus = 1';
   $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
   $row = mysql_fetch_array($rs);
   if($row != false)
      echo '
        vcl.$("hfidcolaborador").value = ' . $row['idcolaborador'] . ';
        vcl.$("edentrevistador").value = "' . $row['nombre'] . '";
        ';
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
?>