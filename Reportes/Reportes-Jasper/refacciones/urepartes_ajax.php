<?php
include('dmconexion.php');
include('urecursos.php');

if(isset($_POST['TraeProveedor']))
{
   $prov = $_POST['TraeProveedor'];
   $p = NombreMoral('p');
   $rsm = "Select " . $p . " as nombre, idmoneda from proveedores p
                left join proveedoresestatus e on e.idestatus=p.idestatus
                where idproveedor = " . $prov . "  and e.activo = 1";
   $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
   if(mysql_num_rows($r) > 0)
   {
      $row = mysql_fetch_array($r);
      echo 'vcl.$("edproveedor").value = "' . $row['nombre'] . '";
                  vcl.$("cbmoneda").value = "' . $row['idmoneda'] . '";';

   }
   else
      echo 'alert("El proveedor no existe o no esta activo.");';
}

if(isset($_POST['CalculaMoneda']))
{
   $moneda = $_POST['CalculaMoneda'];

   if(Derechos('REPARTESCMBPREC') != false)
   {

      $sql = 'Select compra from tiposcambio order by fechacreacion desc limit 1 ';
      $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
      $row = mysql_fetch_array($rs);

      $tc = $row['compra'];

      if($moneda != 1)
      {
         echo '
         vcl.$("edcosto").value = round(vcl.$("edcosto").value/' . $tc . ',2);
         vcl.$("edprecioa").value = round(vcl.$("edprecioa").value/' . $tc . ',2);
         vcl.$("edpreciob").value = round(vcl.$("edpreciob").value/' . $tc . ',2);
         vcl.$("edprecioc").value = round(vcl.$("edprecioc").value/' . $tc . ',2);
         vcl.$("edpreciod").value = round(vcl.$("edpreciod").value/' . $tc . ',2);
         vcl.$("edprecioe").value = round(vcl.$("edprecioe").value/' . $tc . ',2); ';
      }
      else
      {
         echo '
         vcl.$("edcosto").value = round(vcl.$("edcosto").value*' . $tc . ',2);
         vcl.$("edprecioa").value = round(vcl.$("edprecioa").value*' . $tc . ',2);
         vcl.$("edpreciob").value = round(vcl.$("edpreciob").value*' . $tc . ',2);
         vcl.$("edprecioc").value = round(vcl.$("edprecioc").value*' . $tc . ',2);
         vcl.$("edpreciod").value = round(vcl.$("edpreciod").value*' . $tc . ',2);
         vcl.$("edprecioe").value = round(vcl.$("edprecioe").value*' . $tc . ',2); ';
      }
   }
}

if(isset($_POST['CalculaPorCosto']))
{
   $costo = $_POST['CalculaPorCosto'];

   if(Derechos('REPARTESCMBPREC') != false)
   {
      echo '
         vcl.$("edprecioa").value = round(' . $costo . ' * (( vcl.$("edutilidada").value / 100 )+ 1),2);
         vcl.$("edpreciob").value = round(' . $costo . ' * (( vcl.$("edutilidadb").value / 100 )+ 1),2);
         vcl.$("edprecioc").value = round(' . $costo . ' * (( vcl.$("edutilidadc").value / 100 )+ 1),2);
         vcl.$("edpreciod").value = round(' . $costo . ' * (( vcl.$("edutilidadd").value / 100 )+ 1),2);
         vcl.$("edprecioe").value = round(' . $costo . ' * (( vcl.$("edutilidade").value / 100 )+ 1),2); ';
   }
}

if(isset($_POST['CalculaPorPrecio']))
{
   $letra = $_POST['CalculaPorPrecio'];
   $costo = $_POST['costo'];
   $precio = $_POST['precio'];

   if(Derechos('REPARTESCMBPREC') != false)
      echo 'vcl.$("edutilidad' . $letra . '").value = round(((' . $precio . ' / ' . $costo . ' ) - 1 ) * 100,2);';
}

if(isset($_POST['CalculaPorUtil']))
{
   $letra = $_POST['CalculaPorUtil'];
   $costo = $_POST['costo'];
   $utilidad = $_POST['utilidad'];

   if(Derechos('REPARTESCMBPREC') != false)
      echo 'vcl.$("edprecio' . $letra . '").value = round( ' . $costo . ' * ((' . $utilidad . ' / 100) + 1),2);';
}

if(isset($_POST['ExisteParte']))
{
   $cveparte = $_POST['ExisteParte'];
   $idalmacen = $_POST['idalmacen'];

   $sql = 'Select cveparte from repartes where cveparte ="' . $cveparte . '" ';
   $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
   if(mysql_num_rows($rs) > 0)
   {
      $sql = 'Select cveparte from repartesmov where idalmacen="' . $idalmacen . '"
          and cveparte ="' . $cveparte . '" ';
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      if(mysql_num_rows($rs) > 0)
         $ban = 1;
      else
         $ban = 2;
   }

   else
      $ban = 3;

   switch($ban)
   {
      case 1:
         //Ya existe
         echo ' alert("Ya existe la parte");
                window.location = "urepartes.php?cveparte=' . $cveparte . '&idalmacen=' . $idalmacen . '";  ';

         break;

      case 2:
         //Existe en Repartes
         TraeParte($cveparte);
         break;

      case 3:
         //Crear uno nuevo
         break;
   }
}

function TraeParte($cveparte)
{
   $sql = 'SELECT p.idparte, pm.idestatus, p.idunidadmedida, p.idfamilia, p.idlinea, p.idorigen,
           p.descripcion, p.imagen, p.kit, p.core, p.inventariable, ' . NombreMoral('pr') . ' as proveedor,
           pm.idproveedor, pm.costo, pm.idmoneda, pm.precioa, pm.preciob, pm.precioc, pm.preciod,
           pm.precioe, pm.putilidada, pm.putilidadb, pm.putilidadc, pm.putilidadd, pm.putilidade
           FROM repartes AS p
           Left join repartesmov pm on pm.cveparte=p.cveparte
           left join proveedores pr on pr.idproveedor=pm.idproveedor
           where p.cveparte = "' . $cveparte . '"';

   $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
   $row = mysql_fetch_array($rs);

   echo '
      if( "' . $row["idestatus"] . '" == "0")
         alert("La parte se encuentra actualmente supercedida.");
      else
        {
        vcl.$("edidparte").value = "' . $row["idparte"] . '";
        vcl.$("cbunidad").value = "' . $row["idunidadmedida"] . '";
        vcl.$("cbfamilia").value = "' . $row["idfamilia"] . '";
        vcl.$("cblinea").value = "' . $row["idlinea"] . '";
        vcl.$("cborigen").value = "' . $row["idorigen"] . '";
        vcl.$("eddescripcion").value = "' . replace_esp($row["descripcion"]) . '";
        vcl.$("edcosto").value = "' . $row["costo"] . '";
        vcl.$("cbmoneda").value = "' . $row["idmoneda"] . '";
        vcl.$("edidproveedor").value = "' . $row["idproveedor"] . '";
        vcl.$("edproveedor").value = "' . $row["proveedor"] . '";
        vcl.$("edprecioa").value = "' . $row["precioa"] . '";
        vcl.$("edpreciob").value = "' . $row["preciob"] . '";
        vcl.$("edprecioc").value = "' . $row["precioc"] . '";
        vcl.$("edpreciod").value = "' . $row["preciod"] . '";
        vcl.$("edprecioe").value = "' . $row["precioe"] . '";
        vcl.$("edutilidada").value = "' . $row["putilidada"] . '";
        vcl.$("edutilidadb").value = "' . $row["putilidadb"] . '";
        vcl.$("edutilidadc").value = "' . $row["putilidadc"] . '";
        vcl.$("edutilidadd").value = "' . $row["putilidadd"] . '";
        vcl.$("edutilidade").value = "' . $row["putilidade"] . '";

        if("' . $row["inventariable"] . '" == "1")
           vcl.$("chinventariable").checked = true;
        else
          vcl.$("chinventariable").checked = false;

        if("' . $row["kit"] . '" == "1")
           vcl.$("chkit").checked = true;
        else
          vcl.$("chkit").checked = false;

        if("' . $row["core"] . '" == "1")
           vcl.$("chcore").checked = true;
        else
          vcl.$("chcore").checked = false;

      if("' . $row["imagen"] . '" != "")
          {
          var source = "http://' . $_SERVER["HTTP_HOST"] . GetConfiguraciones('PathImgPartes') . $row['imagen'] . '";
          vcl.$("imgparte").src = source;
          vcl.$("lbeliminar").innerHTML = "Eliminar";
          vcl.$("lbadjunto").innerHTML = "<a href = "+source+">' . $row['imagen'] . '</a>";
          }
        }
      ';
}

if(isset($_POST['Superceder']))
{
   $idalmacen = $_POST['idalmacen'];
   $sql = 'Select idplaza from realmacen where idalmacen = ' . $idalmacen;
   $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
   $row = mysql_fetch_array($rs);
   if($row['idplaza'] != $_SESSION['sesidplaza'])
   {
      echo 'alert("No puedes modificar almacenes de otras plazas");';
      return false;
   }
   else
   {
      if(Derechos('TODALMACENES') == false && $idalmacen != $_SESSION['sesidalmacen'])
      {
         echo 'alert("No puedes modificar este almacen");';
         return false;
      }
   }

   if(Derechos('REEDPARTES') == false)
   {
      echo 'alert("No tienes derechos para modificar partes");';
      return false;
   }

   if(Derechos('REPARTESSUPER') == false)
   {
      echo 'alert("No tienes derechos para superceder partes.");';
      return false;
   }

   if($_POST['kit'] == 'true' || $_POST['inventariable'] == 'true')
   {
      echo 'alert("No puedes superceder este articulo porque no es inventariable o es un kit");';
      return false;
   }

   $sql = 'Select distinct idalmacen, existencia from repartesmov where cveparte="' . $_POST['Superceder'] . '"';
   $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
   while($rw = mysql_fetch_array($rs))
   {
      $sql = PartesPendientes($rw['idalmacen'], $_POST['Superceder']);
      $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
      $row = mysql_fetch_array($rs);
      if($row != false)
      {
         echo 'alert("No puedes superceder la parte porque hay documentos pendientes");';
         echo 'alert("Existen documentos Pendientes favor de cerrarlos.");  ' .
         'window.open("http://' . $_SESSION['ServidorJasper'] . '/ibc.jsp' .
         '?reporte=documentospend&tiporeporte=pdf' . '&idalmacen=' . $idalmacen .
         '&cveparte=' . $_POST['Superceder'] . '&mod=ref", "_blank");';
      }
      else
      {
         echo 'vcl.$("hfidant").value = vcl.$("edidparte").value;
            vcl.$("hfcveant").value = vcl.$("edclave").value;
            vcl.$("edidparte").value = "' . MaxId('repartes', 'idparte') . '";
            vcl.$("edclave").value = "";
            vcl.$("edcodbar").value = "";
            vcl.$("hfestatus").value = 1;
            vcl.$("edclave").readOnly = false;
           ';
      }
   }
}

if(isset($_GET['Exportar']))
{
   if(Derechos('REEXPPARTES') == false)
      echo 'alert("No tienes Derechos para Exportar Partes");';
   else
      ExportarArchivo($_SESSION['sqlexp'], $_GET['Exportar'], 'xls');
}

if(isset($_POST['Imprimir']))
{
   if($_SERVER['SERVER_PORT '] == '')
   $puerto = '';
   else
   $puerto = ':'. $_SERVER['SERVER_PORT '];

   echo 'window.open("http://' . $_SESSION['ServidorJasper'] . '/ibc.jsp' .
   '?reporte=partes&tiporeporte=pdf&cveparte=' . $_POST['cveparte'] .
   '&idalmacen=' . $_POST['idalmacen'] .
   '&path=http://' . $_SERVER['HTTP_HOST'] . $puerto.'/'.
   GetConfiguraciones('host') . GetConfiguraciones('PathImgPartes') .
   '&mod=ref' . '", "_blank");';
}

if(isset($_POST['EliminaCore']))
{
   $sql = 'Delete from repartescores where cveparte ="' . $_POST['EliminaCore'] . '" ';
   $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);

   $sql = 'Update repartes set core = 0 where cveparte ="' . $_POST['EliminaCore'] . '" ';
   $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);

   echo " vcl.$('chcore').checked = false;
       vcl.$('lbcore').value = '';
";
}

?>