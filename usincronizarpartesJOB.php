<?php
//include("dmconexion.php");
//include("urecursos.php");
//require_once("mysql.inc.php");

ini_set("memory_limit", "50M");
ini_set("max_execution_time", "500");

Sincronizar();


function Sincronizar()
{
   // Connect to MSSQL
   $mslink = mssql_pconnect('192.168.100.9:1399', 'sa', 'sa');

   if(!$mslink)
   {
      echo 'No se conecto a MSSQL';
   }
   else
   {
      //conectar con gedas
      mssql_select_db('gedas', $mslink);
      //conexion mysql
      $mylink = mysql_connect('localhost', 'root', 'freedom');
      if(!$mylink)
      {
         echo 'No se pudo conectar a MySQL';
      }
      else
      {
         mysql_select_db('crm', $mylink);

         //#######################	partes	###################################
         //vaciar la tabla repartes mysql
         $sql = 'Delete from repartesgds';
         $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         //$row = mysql_fetch_array($rs);
         //$myrs = mysql_query('Delete from repartesgds')or die('Error en SQL: Delete from repartesgds');
         //select repartes mssql
         $sql = "select rtrim(AlmCve) as idalmacen, rtrim(Pstatus) as estatus,
                  rtrim(PUnidMed) as unidad, rtrim(PLinea) as linea,
                  case when rtrim(PAtipMon) like '%MXP%' then '1'
                  when rtrim(PAtipMon) like '%USD%' then '2' else '0' end as moneda,
                  rtrim(Pparte) as clave,
                  rtrim(Pdescrip) as descripcion, rtrim(Pexis) as exis,
                  rtrim(PDis) as dis,	rtrim(PCosAnt) as costoant,
                  rtrim(Pcosto) as costo, rtrim(PPromedio) as prom,
                  rtrim(Ppublic) as precio, rtrim(Pespecial) as esp,
                  case when rtrim(Ppasillo)='' then '0' else rtrim(Ppasillo) end as pasillo,
                  case when rtrim(Pubica)='' then '0' else rtrim(Pubica) end as ubicacion,
                  case when Puti is null then '0' else rtrim(Puti) end as utilidad,
                  rtrim(Pstockmin) as smin, rtrim(Pstockmax) as smax,
                  rtrim(pfecEnt) as fentrada, rtrim(Pfecsal) as fsalida
                  from repartes where pparte!=''";
         $rs = mssql_query($sql)or die('Error en la consulta SQL '.$sql);
         $c=1;
         while($row = mssql_fetch_array($rs))
         {
            $mysql = 'insert into repartesgds (idparte,idalmacen,cveparte,estatus,unidadmedida,linea,
                     moneda,descripcion,existencia,disponible,costoanterior,costo,costoprom,
                     precio,precioesp,fecultentrada,fecultsalida,pasillo,ubicacion,putilidad,
                     stockmin,stockmax, usuario, fecha, hora)
                     values ('.$c.', ' . $row['idalmacen'] . ',"' . $row['clave'] . '","' . $row['estatus'] . '","' . $row['unidad'] .
                     '","' . $row['linea'] . '","' . $row['moneda'] . '","' . str_replace('"', "" ,str_replace('"', "", $row['descripcion'])) . '",' .
                      $row['exis'] . ',' . $row['dis'] . ',' . $row['costoant'] . ',' . $row['costo'] . ',' . $row['prom'] . ',
			' . $row['precio'] . ',' . $row['esp'] . ',"' . $row['fentrada'] . '","' . $row['fsalida'] . '",
			"' . $row['pasillo'] . '","' . $row['ubicacion'] . '",' . $row['utilidad'] . ',' . $row['smin'] . ',' .
                     $row['smax'] . ', "root", curdate(), curtime())';
            $myrs = mysql_query($mysql)or die('Error en el SQL: ' . $mysql);
            $c++;
         }
         $myrs = mysql_query('Delete from repartes')or die('Error en SQL: Delete from repartes');
         $myrs = mysql_query('ALTER TABLE repartes AUTO_INCREMENT = 1') or die('Error en SQL: Alter Table');
         for($i=1;$i<=3;$i++)
         {
               $s = 'insert into repartes (idalmacen,cveparte,estatus,unidadmedida,linea,moneda,descripcion,existencia,
                     disponible,backorder,ordenadas,costoanterior, costo,costoprom,precio,precioesp,fecultentrada,fecultsalida,origen,pasillo,ubicacion,putilidad,stockmin,stockmax)
                       SELECT '.$i.' as idalmacen,r.cveparte,r.estatus,r.unidadmedida,r.linea,r.moneda,r.descripcion,r.existencia,r.disponible,r.backorder,r.ordenadas,r.costoanterior,
                       r.costo,r.costoprom,r.precio,r.precioesp,r.fecultentrada,r.fecultsalida,r.origen,r.pasillo,r.ubicacion,r.putilidad,r.stockmin,r.stockmax
                       FROM repartesgds AS r GROUP BY cveparte';
               $r = mysql_query($s)or die('Error en el SQL: ' . $s);
         }
      }
   }
   mssql_close($mslink);
   mysql_close($mylink);
}
?>