<?php
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
?>