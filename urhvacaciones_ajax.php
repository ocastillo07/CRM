<?php
include("dmconexion.php");
include("urecursos.php");
include("ufechas.php");

if(isset($_POST['TraeColaborador']))
{
   $idcolaborador = $_POST['TraeColaborador'];
   $sql = 'Select concat(c.nombre, " ", c.apaterno, " ", c.amaterno) as nombre,
                a.nombre as area, p.nombre as puesto, c.fechaingreso,
                c.idcolaborador, c.diaspendientes, c.idplaza
                from rhcolaboradores c left join areas a on a.idarea=c.idarea
                left join puestos p on p.idpuesto=c.idpuesto
                where c.idempleado=' . $idcolaborador;
   $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
   $row = mysql_fetch_array($rs);
   if($row != false)
   {

      echo '
        vcl.$("hfidcolaborador").value = ' . $row['idcolaborador'] . ';
        vcl.$("ednombre").value = "' . $row['nombre'] . '";
        vcl.$("edarea").value = "' . $row['area'] . '";
        vcl.$("edpuesto").value = "' . $row['puesto'] . '";
        vcl.$("edfechaingreso").value = "' . $row['fechaingreso'] . '";
        vcl.$("eddisponibles").value = "' . $row['diaspendientes'] . '";
        vcl.$("cbplaza").value = "' . $row['idplaza'] . '";
        ';
   }
   else
   {
      echo 'alert("No existe el colaborador.");';
   }
}

if(isset($_POST['TraeCubridor']))
{
   $idcolaborador = $_POST['TraeCubridor'];
   $sql = 'Select c.idcolaborador, concat(c.nombre, " ", c.apaterno, " ", c.amaterno) as nombre,
        p.nombre as puesto
        from rhcolaboradores c
        left join puestos p on p.idpuesto=c.idpuesto
        where c.idempleado=' . $idcolaborador;
   $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
   $row = mysql_fetch_array($rs);
   if($row != false)
   {
      echo '
        if(vcl.$("edidcolaborador").value == vcl.$("edcubre").value)
        {
          alert("La persona que cubre es el mismo para la persona de vacaciones.");
          vcl.$("edcubre").value = "";
          vcl.$("edpuestocubre").value = "";
        }
        else
        {
          vcl.$("hfidcubre").value = ' . $row['idcolaborador'] . ';
          vcl.$("edcubre").value = "' . $row['nombre'] . '";
          vcl.$("edpuestocubre").value = "' . $row['puesto'] . '";
        }
        ';
   }
   else
   {
      echo 'alert("No existe el colaborador.");';
   }
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

if(isset($_POST['CalculaPeriodo']))
{
   $dias = $_POST['dias'];
   $inicio = $_POST['inicio'];
   $fecha = $inicio;
   for($i = 1; $i < $dias; $i++)
   {
      if(DiaHabil($fecha) == false)
         $i--;
      $fecha = IncDay($fecha);
   }

   echo ' vcl.$("dtfin").value = "' . $fecha . '";';

   $fecha = IncDay($fecha);
   while(DiaHabil($fecha) == false)
   {
      if(DiaHabil($fecha) == false)
         $fecha = IncDay($fecha);
   }

   echo ' vcl.$("dtregreso").value = "' . $fecha . '";';



}

?>