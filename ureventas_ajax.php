<?php
//<script type='text/javascript' src='funciones.js'></script>
session_start();
include('dmconexion.php');
include("urecursos.php");

if(isset($_POST['RECalcular']))
{
   $tabla = $_SESSION['tablaventas'];
   $tablacores = $_SESSION['tablacores'];
   $t = count($tabla);
   $tc = count($tablacores);
   for($i = 0; $i <= $t - 1; $i++)
   {
      //combobox de moneda en pesos
      if($_POST['idmoneda'] == 1)
      {
         $precio = 'round(if(pm.idmoneda=1,pm.' . GetConfiguraciones('preciodefault') .
         ',pm.' . GetConfiguraciones('preciodefault') . '*' . $_POST['tc'] . '),2) as precio';
         $preciox = round($tabla[$i]['precio'] * $_POST['tc'], 2);
      }
      //combobox de moneda en dlls
      else
      {
         $precio = 'round(if(pm.idmoneda=2,pm.' . GetConfiguraciones('preciodefault') .
         ',pm.' . GetConfiguraciones('preciodefault') . '/' . $_POST['tc'] . '),2) as precio';
         $preciox = round($tabla[$i]['precio'] / $_POST['tc'], 2);
      }
      //buscar si existe la parte en el almacen
      $sql = 'select cveparte from repartesmov
             where cveparte="' . $tabla[$i]['cveparte'] . '" and idalmacen=' . $_SESSION['sesidalmacen'];
      $rs = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
      if(mysql_num_rows($rs) > 0)
         $almacen = ' and pm.idalmacen=' . $_SESSION['sesidalmacen'];
      else
         $almacen = '';
      $sql = 'SELECT ' . $precio . ',pm.idmoneda
              FROM repartes AS p left join repartesmov pm on pm.cveparte=p.cveparte
              left join reunidadesmedida u on u.idunidad=p.idunidadmedida
              where p.cveparte="' . $tabla[$i]['cveparte'] . '" ' . $almacen;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_array($rs);
      //$tabla[$i]['precio'] = $row['precio'];
      //$tabla[$i]['importe'] = round($row['precio'] * $tabla[$i]['cantidad'], 2);
      $tabla[$i]['precio'] = round($preciox, 2);
      $tabla[$i]['importe'] = round($preciox * $tabla[$i]['cantidad'], 2);
   }
   //si hay cores
   if($tc > 0)
   {
      for($i = 0; $i <= $tc - 1; $i++)
      {
         //combobox de moneda en pesos
         if($_POST['idmoneda'] == 1)
            $precio = 'round(if(pm.idmoneda=1,pm.' . GetConfiguraciones('preciodefault') .
            ',pm.' . GetConfiguraciones('preciodefault') . '*' . $_POST['tc'] . '),2) as precio';
         //combobox de moneda en dlls
         else
            $precio = 'round(if(pm.idmoneda=2,pm.' . GetConfiguraciones('preciodefault') .
            ',pm.' . GetConfiguraciones('preciodefault') . '/' . $_POST['tc'] . '),2) as precio';

         $sql = 'SELECT ' . $precio . ',pm.idmoneda
                 FROM repartes AS p left join repartesmov pm on pm.cveparte=p.cveparte
                 left join reunidadesmedida u on u.idunidad=p.idunidadmedida
                 where p.cveparte="' . $tablacores[$i]['cvecore'] . '" and pm.idalmacen=' . $_SESSION['sesidalmacen'];
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $row = mysql_fetch_array($rs);
         $tablacores[$i]['precio'] = $row['precio'];
         $tablacores[$i]['importe'] = round($row['precio'] * $tablacores[$i]['cantidad'], 2);
      }
   }
   $_SESSION['tablaventas'] = $tabla;
   $_SESSION['tablacores'] = $tablacores;
   traerdetalle($_POST['RECalcular'], 1);
}

//cargar el cliente
if(isset($_POST["traecliente"]))
{
   $idcliente = $_POST["idcliente"];
   $nom = NombreCliente('c');
   $sql = 'select ' . $nom . ' as cliente,rfc,direccion,cp,municipio,estado,
          telefono,fax,email,if(persona="F","FISICA","MORAL") as persona,persona as pid,idfact,
          colonia from clientes c where idcliente=' . $idcliente;
   $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
   if(mysql_num_rows($rs) > 0)
   {
      $row = mysql_fetch_array($rs);
      echo "vcl.$('ednombrecom').value= '" . $row['cliente'] . "';
            vcl.$('edrfc').value= '" . $row['rfc'] . "';
            vcl.$('edcalle').value= '" . $row['direccion'] . "';
            vcl.$('edcp').value= '" . $row['cp'] . "';
            vcl.$('edcolonia').value= '" . $row['colonia'] . "';
            vcl.$('edciudad').value= '" . $row['municipio'] . "';
            vcl.$('edestado').value= '" . $row['estado'] . "';
            vcl.$('edtel1').value= '" . $row['telefono'] . "';
            vcl.$('edfax').value= '" . $row['fax'] . "';
            vcl.$('edemail').value= '" . $row['email'] . "';
            vcl.$('edpersona').value = '" . $row['persona'] . "';
            vcl.$('hfpersona').value = '" . $row['pid'] . "'; ";
      //cargar el piva desde clientesfact
      if($row['idfact'] != '0')
      {
         $sql = 'select piva from clientesfact where idfact = ' . $row['idfact'];
         $rs = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
         $rw = mysql_fetch_array($rs);
         echo "vcl.$('cbiva').value = '" . $rw['piva'] . "'; ";
      }
      else
      {
         $sql = 'select porcentaje from impuestos where estatus = 1 AND `default` = 1';
         $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
         $rw = mysql_fetch_array($rs);
         echo "vcl.$('cbiva').value = '" . $rw['porcentaje'] . "'; ";
      }

      ######################## Si el cliente tiene Descuentos ##########################
      $sql = 'select idcliente from clientesparametros where idcliente=' . $idcliente;
      $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
      if(mysql_num_rows($rs) > 0)
         $_SESSION['parametrizar'] = true;
      else
         $_SESSION['parametrizar'] = false;

      ####################   Limite de Credito #######################################


      $sql = 'select limitecredito from retipopagos where idtipopago=' . $_POST['pago'];
      $rs = mysql_query($sql)or die('Error de SQL: ' . $sql);
      $row = mysql_fetch_array($rs);
      if($row['limitecredito'] == 1)
      {
        $saldodisp = consultarcredito($idcliente, 2);
        echo "vcl.$('hfcredito').value='" . $saldodisp . "';";

        }
   }
   else
      echo "alert('Este cliente no se encuentra registrado!'); ";
}

if(isset($_POST["traeclientecombo"]))
{
   $idcliente = $_POST["idcliente"];
   $nom = NombreCliente('c');
   $sql = 'select ' . $nom . ' as cliente,rfc,direccion,cp,municipio,estado,
          telefono,fax,email,if(persona="F","FISICA","MORAL") as persona,persona as pid,
          colonia from clientes c where idcliente=' . $idcliente;
   $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
   if(mysql_num_rows($rs) > 0)
   {
      $row = mysql_fetch_array($rs);
      echo "vcl.$('ednombrecom').value= '" . $row['cliente'] . "';
            vcl.$('edrfc').value= '" . $row['rfc'] . "';
            vcl.$('edcalle').value= '" . $row['direccion'] . "';
            vcl.$('edcp').value= '" . $row['cp'] . "';
            vcl.$('edcolonia').value= '" . $row['colonia'] . "';
            vcl.$('edciudad').value= '" . $row['municipio'] . "';
            vcl.$('edestado').value= '" . $row['estado'] . "';
            vcl.$('edtel1').value= '" . $row['telefono'] . "';
            vcl.$('edfax').value= '" . $row['fax'] . "';
            vcl.$('edemail').value= '" . $row['email'] . "';
            vcl.$('edpersona').value = '" . $row['persona'] . "';
            vcl.$('hfpersona').value = '" . $row['pid'] . "'; ";

      ######################## Si el cliente tiene Descuentos ##########################
      $sql = 'select idcliente from clientesparametros where idcliente=' . $idcliente;
      $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
      if(mysql_num_rows($rs) > 0)
         $_SESSION['parametrizar'] = true;
      else
         $_SESSION['parametrizar'] = false;

      ####################   Limite de Credito #######################################
           $sql = 'select limitecredito from retipopagos where idtipopago=' . $_POST['pago'];
      $rs = mysql_query($sql)or die('Error de SQL: ' . $sql);
      $row = mysql_fetch_array($rs);
      if($row['limitecredito'] == 1)
      {
        $saldodisp = consultarcredito($idcliente, 2);
        echo "vcl.$('hfcredito').value='" . $saldodisp . "';";


   }
   else
      echo "alert('Este cliente no se encuentra registrado!'); ";


     /* $sql = 'select limitecredito from retipopagos where idtipopago=' . $_POST['pago'];
      $rs = mysql_query($sql)or die('Error de SQL: ' . $sql);
      $row = mysql_fetch_array($rs);
      if($row['limitecredito'] == 1)
      {
      //Se imprime el saldo de credito que tiene el cliente.
      $saldodisp = consultarcredito($idcliente, 2);
      echo "vcl.$('hfcredito').value='" . $saldodisp . "';";


        $sql = 'select creditoactivo,round(saldodisp,2) as saldodisp from clientes where idcliente=' . $idcliente;
         $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
         $row = mysql_fetch_array($rs);
         if($row['creditoactivo'] == '1')
           { echo "vcl.$('hfcredito').value='" . $row['saldodisp'] . "';";}
         else {if($row['creditoactivo'] == '2')
           { echo "vcl.$('hfcredito').value=0; ";
         }else{
            echo "vcl.$('hfcredito').value=0; ";
            }}
      }*/
   }
   else
      echo "alert('Este cliente no se encuentra registrado!'); ";
}

if(isset($_POST['buscarsus']))
{
   $sql = 'select cveparte from repartessustitutas where cveparte="' .
   $_POST["cveparte"] . '" or cvesustituto="' . $_POST['cveparte'] . '"';
   $rs = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
   if(mysql_num_rows($rs) > 0)
   {
      $row = mysql_fetch_array($rs);
      echo " var ConfiguracionPagina = 'border:thick;center:yes;resizable:no;help:no;status:no;dialogWidth:544px;dialogHeight:248px';
             var parte = window.showModalDialog('urepartessustitutasvista.php?cveparte=" .
      $row['cveparte'] . "&idalmacen=" . $_SESSION['sesidalmacen'] . "','',ConfiguracionPagina);
             vcl.$('edparte').value = parte;
             var params='traecveparte=' + parte +
                     '&idcliente=" . $_POST['idcliente'] . "' +
                     '&idpromotor=" . $_POST['idpromotor'] . "' +
                     '&precio=" . $_POST['precio'] . "' +
                     '&preciodefault=" . $_POST['preciodefault'] . "' +
                     '&cbmoneda=" . $_POST['cbmoneda'] . "' +
                     '&tc=" . $_POST['tc'] . "' +
                     '&idalmacen=" . $_POST['idalmacen'] . "';
           basicAjax('ureventas_ajax.php',params);
             ";
   }
   else
      echo "var params='traecveparte=" . $_POST["cveparte"] . "' +
                     '&idcliente=" . $_POST['idcliente'] . "' +
                     '&idpromotor=" . $_POST['idpromotor'] . "' +
                     '&precio=" . $_POST['precio'] . "' +
                     '&preciodefault=" . $_POST['preciodefault'] . "' +
                     '&cbmoneda=" . $_POST['cbmoneda'] . "' +
                     '&tc=" . $_POST['tc'] . "' +
                     '&idalmacen=" . $_POST['idalmacen'] . "';
          basicAjax('ureventas_ajax.php',params); ";

}



//cargar la parte     //el costo siempre es en pesos
if(isset($_POST["traecveparte"]))
{
   $cve = $_POST["traecveparte"];
   $existe = false;
   if(!empty($cve) && !($_POST['idcliente'] == '0' || $_POST['idcliente'] == ''))
   {

      if($_POST['cbmoneda'] == 1)//combobox de moneda en pesos
      {
         $precio = traerprecio(GetConfiguraciones('preciodefault'), $_POST['tc'], 1);
         $precioa = traerprecio('precioa', $_POST['tc'], 1);
         $preciob = traerprecio('preciob', $_POST['tc'], 1);
         $precioc = traerprecio('precioc', $_POST['tc'], 1);
         $preciod = traerprecio('preciod', $_POST['tc'], 1);
         $precioe = traerprecio('precioe', $_POST['tc'], 1);
         //$costo = traerprecio('costo',$_POST['tc'],1);
      }
      else //combobox de moneda en dlls
      {
         $precio = traerprecio(GetConfiguraciones('preciodefault'), $_POST['tc'], 2);
         $precioa = traerprecio('precioa', $_POST['tc'], 2);
         $preciob = traerprecio('preciob', $_POST['tc'], 2);
         $precioc = traerprecio('precioc', $_POST['tc'], 2);
         $preciod = traerprecio('preciod', $_POST['tc'], 2);
         $precioe = traerprecio('precioe', $_POST['tc'], 2);
      }

      $sql = 'SELECT u.nombre as unidades, p.descripcion ,p.idsupercision,
              disponibles as existencia, apartados,
              ' . $precio . ' as precio,' . $precioa . ' as precioa,' . $preciob . ' as preciob,
              ' . $precioc . ' as precioc,' . $preciod . ' as preciod,' . $precioe . ' as precioe,
              pm.costo as costo, pm.idmoneda, p.core, p.kit
              FROM repartes AS p left join repartesmov pm on pm.cveparte=p.cveparte
              left join reunidadesmedida u on u.idunidad=p.idunidadmedida
              where p.cveparte="' . $cve . '" and pm.idalmacen=' . $_POST['idalmacen'];
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      //primero busca partes de su mismo almacen
      if(mysql_num_rows($rs) > 0)
      {
         $existe = true;
         $row = mysql_fetch_array($rs);
         $costo = round($row['costo'], 2);
         $precio = round($row['precio'], 2);
           if($row['existencia'] < 0)
            $exis = '0';
         else
            $exis = $row['existencia'];
      }
      //si no existe en su almacen buscar en los demas
      else
      {
         $sql = 'SELECT u.nombre as unidades, p.descripcion, p.idsupercision, 0 as existencia, 0 as apartados,
                ' . $precio . ' as precio,' . $precioa . ' as precioa,' . $preciob . ' as preciob,
                ' . $precioc . ' as precioc,' . $preciod . ' as preciod,' . $precioe . ' as precioe,
                pm.costo as costo,pm.idmoneda, p.core,p.kit
                FROM repartes AS p left join repartesmov pm on pm.cveparte=p.cveparte
                left join reunidadesmedida u on u.idunidad=p.idunidadmedida
                where p.cveparte="' . $cve . '" limit 1';
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         if(mysql_num_rows($rs) > 0)
         {
            $row = mysql_fetch_array($rs);
            $existe = true;
            $costo = round($row['costo'], 2);
            $precio = round($row['precio'], 2);
            if($row['existencia'] < 0)
               $exis = '0';
            else
               $exis = $row['existencia'];
         }
         else
            $existe = false;
      }

      if($existe)
      {
         $_SESSION['preciodefault'] = $precio;

         // if(!isset($_GET['EditRow']))
         $cad = "precio='" . $precio . "',

               vcl.$('edprecio').value = round(precio,2);
               vcl.$('edimporte').value = round(precio,2);
               vcl.$('hfpreciodefault').value = round(precio,2);
               vcl.$('hfprecio1').value='" . $row['precioa'] . "';
               vcl.$('hfprecio2').value='" . $row['preciob'] . "';
               vcl.$('hfprecio3').value='" . $row['precioc'] . "';
               vcl.$('hfprecio4').value='" . $row['preciod'] . "';
               vcl.$('hfprecio5').value='" . $row['precioe'] . "';";

         echo "var unidades='" . $row['unidades'] . "',
               desc='" . replace_esp($row['descripcion']) . "',
               supercision='" . $row['idsupercision'] . "', exis='" . $exis . "',
               costo='" . $costo . "' ,
               ban='$ban', core='" . $row['core'] . "';
               " . $cad . "
               vcl.$('hfunidades').value = unidades;
               vcl.$('eddescripcion').value = desc;
               vcl.$('hfidsupercision').value = supercision;
               vcl.$('edexistencia').value = exis;
               vcl.$('edcantidad').value = '1';
               vcl.$('edapartados').value = '" . $row['apartados'] . "';
               vcl.$('hfcore').value = core;
               vcl.$('hfcosto').value = round(costo,2);     ";


         $b = Validar($_POST['idcliente'], $_POST['idalmacen'], $cve,
         $_POST['cbmoneda'], $_POST['tc'], $_POST['idpromotor'], $precio, $precio);
      }
      else
      {
         echo "alert('La parte no existe'); ";
         limpiarcampos();
      }
   }
   else
   {
      if(empty($cve))
         echo "alert('La parte no existe'); ";

      if($_POST['idcliente'] == '0' || $_POST['idcliente'] == '')
         echo " alert('No has capturado el cliente'); ";
      limpiarcampos();
   }

}

function limpiarcampos()
{
   $_SESSION['preciodefault'] = "";
   echo "vcl.$('hfunidades').value = '';
         vcl.$('edparte').value='';
         vcl.$('eddescripcion').value='';
         vcl.$('hfidsupercision').value = '';
         vcl.$('edexistencia').value='';
         vcl.$('edcantidad').value='';
         vcl.$('edapartados').value='';
         vcl.$('edprecio').value='';
         vcl.$('hfcosto').value='';
         vcl.$('edimporte').value='';
         vcl.$('hfpreciodefault').value = '';
         vcl.$('hfcore').value = '';
         vcl.$('hfprecio1').value= '';
         vcl.$('hfprecio2').value= '';
         vcl.$('hfprecio3').value= '';
         vcl.$('hfprecio4').value= '';
         vcl.$('hfprecio5').value= '';
         vcl.$('edpartecap').value = '';
         vcl.$('eddescripcioncap').value = '';
         vcl.$('edunidadescap').value = '';
         vcl.$('edcantidadcap').value = '';
         vcl.$('edpreciocap').value = '';
         vcl.$('edimportecap').value = ''; ";
}

if(isset($_POST['Agregar']))
{
   //en caso de que se ocupe validar precios
   if($_POST['valida'] == '1')
      $ban = Validar($_POST['idcliente'], $_POST['idalmacen'], $_POST['parte'],
      $_POST['idmoneda'], $_POST['tc'], $_POST['idpromotor'], $_POST['precio'],
      $_POST['preciodefault']);
   else
      $ban = true;
   //agregar la parte
   if($ban)
   {
      $tabla = $_SESSION['tablaventas'];
      $t = count($tabla);
      $ban = false;
      for($i = 0; $i <= $t - 1; $i++)
         if(strtoupper($tabla[$i]['cveparte']) == strtoupper($_POST['parte']))
            $ban = true;

      if($ban == true)
      {
         echo "alert('Esta parte ya fue registrada'); ";
         limpiarcampos();
         if($_POST['ne'] == '0')
            echo "vcl.$('edparte').focus(); ";
         else
            echo "vcl.$('edpartecap').focus(); ";
      }
      else
      {
         //credito
         $ban = true;
         $credito = 0;
         if(($_POST['cantidad'] * $_POST['precio']) > $_POST['credito'])
            $credito = ($_POST['cantidad'] * $_POST['precio']) - ($_POST['credito']);

         $sql = 'select limitecredito from retipopagos where idtipopago=' . $_POST['pago'];
         $rs = mysql_query($sql)or die('Error de SQL: ' . $sql);
         $row = mysql_fetch_array($rs);

         if($ban)
         {
            $tabla[$t] = array('cveparte' => strtoupper($_POST['parte']),
                               'idsupercision' => $_POST['idsupercision'],
                               'idmoneda' => $_POST['idmoneda'],
                               'unidades' => strtoupper($_POST['unidades']),
                               'descripcion' => strtoupper($_POST['descripcion']),
                               'cantidad' => $_POST['cantidad'],
                               'costo' => $_POST['costo'],
                               'precio' => $_POST['precio'],
                               'importe' => $_POST['cantidad'] * $_POST['precio'],
                               'ne' => $_POST['ne']
                               );
            if($_POST['core'] == '1')
            {
               $tablacores = $_SESSION['tablacores'];
               $tc = count($tablacores);
               $sql = 'select cveparte,cvecore from repartescores where cveparte="' . $_POST['parte'] . '"';
               $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
               $r = mysql_fetch_array($rs);
               if(mysql_num_rows($rs) > 0)
               {
                  //combobox de moneda en pesos
                  if($_POST['idmoneda'] == '1')
                     $precio = 'round(if(pm.idmoneda=1,pm.' . GetConfiguraciones('preciodefault') .
                     ',pm.' . GetConfiguraciones('preciodefault') . '*' . $_POST['tc'] . '),2) as precio';
                  //combobox de moneda en dlls
                  else
                     $precio = 'round(if(pm.idmoneda=2,pm.' . GetConfiguraciones('preciodefault') .
                     ',pm.' . GetConfiguraciones('preciodefault') . '/' . $_POST['tc'] . '),2) as precio';
                  //si no existe en el almacen traerlo de otro
                  $sql = 'select pm.cveparte,p.idsupercision,p.descripcion,pm.costo,' . $precio .
                  ' from repartesmov pm
                         left join repartes p on p.cveparte=pm.cveparte
                         where pm.cveparte="' . $r['cvecore'] . '" and pm.idalmacen=' . $_POST['idalmacen'];
                  $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
                  if(mysql_num_rows($rs) > 0)
                  {
                     $r = mysql_fetch_array($rs);
                     $tablacores[$tc] = array('cveparte' => strtoupper($_POST['parte']),
                                              'cvecore' => strtoupper($r['cveparte']),
                                              'idsupercision' => $r['idsupercision'],
                                              'unidades' => strtoupper($_POST['unidades']),
                                              'descripcion' => strtoupper($r['descripcion']),
                                              'cantidad' => $_POST['cantidad'],
                                              'idmoneda' => $_POST['idmoneda'],
                                              'costo' => round($r['costo'], 2),
                                              'precio' => round($r['precio'], 2),
                                              'importe' => round($r['precio'] * $_POST['cantidad'], 2),
                                              'estatus' => 'N'
                                              );
                     $_SESSION['tablacores'] = $tablacores;
                  }
                  else
                  {
                     $sql = 'select pm.cveparte,p.idsupercision,p.descripcion,pm.costo,' . $precio .
                     ' from repartesmov pm
                         left join repartes p on p.cveparte=pm.cveparte
                         where pm.cveparte="' . $r['cvecore'] . '" limit 1';
                     $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
                     if(mysql_num_rows($rs) > 0)
                     {
                        $r = mysql_fetch_array($rs);
                        $tablacores[$tc] = array('cveparte' => strtoupper($_POST['parte']),
                                                 'cvecore' => strtoupper($r['cveparte']),
                                                 'idsupercision' => $r['idsupercision'],
                                                 'unidades' => strtoupper($_POST['unidades']),
                                                 'descripcion' => strtoupper($r['descripcion']),
                                                 'cantidad' => $_POST['cantidad'],
                                                 'idmoneda' => $_POST['idmoneda'],
                                                 'costo' => round($r['costo'], 2),
                                                 'precio' => round($r['precio'], 2),
                                                 'importe' => round($r['precio'] * $_POST['cantidad'], 2),
                                                 'estatus' => 'N'
                                                 );
                        $_SESSION['tablacores'] = $tablacores;
                     }
                  }
               }
            }
         }
         limpiarcampos();
         if($_POST['ne'] == '0')
            echo "vcl.$('edparte').focus(); ";
         else
            echo "vcl.$('edpartecap').focus(); ";
         $_SESSION['tablaventas'] = $tabla;
         traerdetalle(0, 1);
      }
   }
}

if(isset($_POST['EditRow']))
{
   $tabla = $_SESSION['tablaventas'];
   $tablacore = $_SESSION['tablacores'];
   $sql = 'select cveparte, disponibles from repartesmov where idalmacen=' . $_SESSION['sesidalmacen'] .
   ' and cveparte="' . $tabla[$_POST['EditRow']]['cveparte'] . '"';
   $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
   $row = mysql_fetch_array($rs);
   if($tabla[$_POST['EditRow']]['ne'] == '0')
   {
      echo "vcl.$('edparte').value = '" . $tabla[$_POST['EditRow']]['cveparte'] . "';
            vcl.$('hfidsupercision').value = '" . $tabla[$_POST['EditRow']]['idsupercision'] . "';
            vcl.$('eddescripcion').value = '" . $tabla[$_POST['EditRow']]['descripcion'] . "';
            vcl.$('hfunidades').value = '" . $tabla[$_POST['EditRow']]['unidades'] . "';
            vcl.$('edexistencia').value = '" . $row['disponibles'] . "';
            vcl.$('edcantidad').value = '" . $tabla[$_POST['EditRow']]['cantidad'] . "';
            vcl.$('hfcosto').value = '" . $tabla[$_POST['EditRow']]['costo'] . "';
            vcl.$('edprecio').value = '" . $tabla[$_POST['EditRow']]['precio'] . "';
            vcl.$('edimporte').value = '" . $tabla[$_POST['EditRow']]['importe'] . "'; ";
   }
   else //no existe
   {
      echo "vcl.$('edpartecap').value = '" . $tabla[$_POST['EditRow']]['cveparte'] . "';
            vcl.$('hfidsupercision').value = '';
            vcl.$('eddescripcioncap').value = '" . $tabla[$_POST['EditRow']]['descripcion'] . "';
            vcl.$('edunidadescap').value = '" . $tabla[$_POST['EditRow']]['unidades'] . "';
            vcl.$('edcantidadcap').value = '" . $tabla[$_POST['EditRow']]['cantidad'] . "';
            vcl.$('hfcosto').value = '';
            vcl.$('edpreciocap').value = '" . $tabla[$_POST['EditRow']]['precio'] . "';
            vcl.$('edimportecap').value = '" . $tabla[$_POST['EditRow']]['importe'] . "'; ";
   }



   //borrar la parte del array
   //cores
   $c = count($tablacore);
   if($c > 0)
   {
      $parte = $tabla[$_POST['EditRow']]['cveparte'];
      $ban = false;
      for($i = 0; $i <= $c; $i++)
      {
         if($parte == $tablacore[$i]['cveparte'])
         {
            $ban = true;
            break;
         }
      }
      if($ban)
      {
         unset($tablacore[$i]);
         $tablacore = array_values($tablacore);
         $_SESSION['tablacores'] = $tablacore;
      }
   }
   //parte
   unset($tabla[$_POST['EditRow']]);
   $tabla = array_values($tabla);
   $_SESSION['tablaventas'] = $tabla;
   traerdetalle(1, 1);
}

if(isset($_POST['DelRow']))
{
   $tabla = $_SESSION['tablaventas'];
   $tablacore = $_SESSION['tablacores'];

   //cores
   $c = count($tablacore);
   if($c > 0)
   {
      $parte = $tabla[$_POST['DelRow']]['cveparte'];
      $ban = false;
      for($i = 0; $i <= $c; $i++)
      {
         if($parte == $tablacore[$i]['cveparte'])
         {
            $ban = true;
            break;
         }
      }
      if($ban)
      {
         unset($tablacore[$i]);
         $tablacore = array_values($tablacore);
         $_SESSION['tablacores'] = $tablacore;
      }
   }
   //parte
   unset($tabla[$_POST['DelRow']]);
   $tabla = array_values($tabla);
   $_SESSION['tablaventas'] = $tabla;
   traerdetalle(0, 1);
}

function traerdetalle($ban, $borrar)
{
   $tabla = $_SESSION['tablaventas'];
   $tablacore = $_SESSION['tablacores'];
   $nt = count($tabla);
   $nc = count($tablacore);
   // si el detalle trae cores cambiar el valor del HFFacturacore a 1
   // para cuando facture preguntar si desea separla o no
   if($nc > 0)
      echo " vcl.$('hffacturacore').value='1'; ";

   $t = '<div style="width:800x; height:100px; overflow:auto">' .
   '<table style="font-family: Verdana; font-size: 10px; background-color: #C0C0C0;" width="800">' .
   '<table width="790" border="0" cellspacing="0" cellpadding="2">' .
   '<tr bgcolor="#FF6600">' .
   '<td><span style=" font-family: Verdana; font-size: 10;  ">Cantidad</td>' .
   '<td><span style=" font-family: Verdana; font-size: 10;  ">Unidades</td>' .
   '<td><span style=" font-family: Verdana; font-size: 10;  ">Parte</td>' .
   '<td><span style=" font-family: Verdana; font-size: 10;  ">Descripcion</td>' .
   '<td><div align="right"><span style=" font-family: Verdana; font-size: 10;  ">Precio</div></td>' .
   '<td><div align="right"><span style=" font-family: Verdana; font-size: 10;  ">Importe</div></td>' .
   '<td><span style=" font-family: Verdana; font-size: 10;  ">&nbsp;&nbsp;&nbsp;</td>' .
   '<td><span style=" font-family: Verdana; font-size: 10;  ">&nbsp;&nbsp;&nbsp;</td>' .
   '</tr>';
   $total = 0;
   $costo = 0;
   //venta normal, puede traer cores
   for($i = 0; $i <= $nt - 1; $i++)
   {
      $t .= '<tr>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['cantidad'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['unidades'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['cveparte'] . '</span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10; ">' . $tabla[$i]['descripcion'] . '</span></td>' .
      '<td><div align="right"><span style=" font-family: Verdana; font-size: 10; ">' . number_format($tabla[$i]['precio'], 2) . '</span></div></td>' .
      '<td><div align="right"><span style=" font-family: Verdana; font-size: 10; ">' . number_format($tabla[$i]['importe'], 2) . '</span></div></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10;  "><div align="right">';
      if($borrar == '1')
         $t .= '<a href="javascript:basicAjax(\\\'ureventas_ajax.php\\\',\\\'EditRow=' . $i . '&traecveparte=' . $tabla[$i]['cveparte'] .
         '&idcliente=\\\'+vcl.$(\\\'edidcliente\\\').value+\\\'&idpromotor=\\\' + vcl.$(\\\'cbpromotor\\\').value + ' .
         '\\\'&precio=\\\' + vcl.$(\\\'edprecio\\\').value +' .
         '\\\'&cbmoneda=\\\' + vcl.$(\\\'cbmoneda\\\').value +' .
         '\\\'&tc=\\\' + vcl.$(\\\'edtc\\\').value +' .
         '\\\'&idalmacen=\\\' + vcl.$(\\\'edalmacen\\\').value+' .
         '\\\'&preciodefault=\\\' + vcl.$(\\\'hfpreciodefault\\\').value);">Editar</a>';
      $t .= '</div></span></td>' .
      '<td><span style=" font-family: Verdana; font-size: 10;  "><div align="right">';
      if($borrar == '1')
         $t .= '<a href="javascript:basicAjax(\\\'ureventas_ajax.php\\\',\\\'DelRow=' . $i . '\\\');">Borrar</a>';
      $t .= '</div></span></td>' .
      '</tr>';
      if($nc > 0)
      {
         for($x = 0; $x <= $nc - 1; $x++)
         {
            if($tabla[$i]['cveparte'] == $tablacore[$x]['cveparte'])
            {
               $t .= '<tr>' .
               '<td><span style=" font-family: Verdana; font-size: 10;  ">' . $tablacore[$x]['cantidad'] . '</span></td>' .
               '<td><span style=" font-family: Verdana; font-size: 10;  ">' . $tablacore[$x]['unidades'] . '</span></td>' .
               '<td><span style=" font-family: Verdana; font-size: 10;  ">' . $tablacore[$x]['cvecore'] . '</span></td>' .
               '<td><span style=" font-family: Verdana; font-size: 10;  ">' . $tablacore[$x]['descripcion'] . '</span></td>' .
               '<td><div align="right"><span style=" font-family: Verdana; font-size: 10;  ">' . number_format($tablacore[$x]['precio'], 2) . '</span></div></td>' .
               '<td><div align="right"><span style=" font-family: Verdana; font-size: 10;  ">' . number_format($tablacore[$x]['importe'], 2) . '</span></div></td>' .
               '<td><span style=" font-family: Verdana; font-size: 10;  "><div align="right">';
               '</div></span></td>' .
               '</tr>';
               $total = $total + $tablacore[$x]['importe'];
               $costo = $costo + $tablacore[$x]['costo'] * $tablacore[$x]['cantidad'];
            }
         }
      }
      $total = $total + $tabla[$i]['importe'];
      $costo = $costo + $tabla[$i]['costo'] * $tabla[$i]['cantidad'];
   }
   //si solo trae cores en la venta
   if($nt == 0 && $nc > 0)
   {
      for($x = 0; $x <= $nc - 1; $x++)
      {
         if($tabla[$i]['cveparte'] == $tablacore[$x]['cveparte'])
         {
            $t .= '<tr>' .
            '<td><span style=" font-family: Verdana; font-size: 10;  ">' . $tablacore[$x]['cantidad'] . '</span></td>' .
            '<td><span style=" font-family: Verdana; font-size: 10;  ">' . $tablacore[$x]['unidades'] . '</span></td>' .
            '<td><span style=" font-family: Verdana; font-size: 10;  ">' . $tablacore[$x]['cvecore'] . '</span></td>' .
            '<td><span style=" font-family: Verdana; font-size: 10;  ">' . $tablacore[$x]['descripcion'] . '</span></td>' .
            '<td><div align="right"><span style=" font-family: Verdana; font-size: 10;  ">' . number_format($tablacore[$x]['precio'], 2) . '</span></div></td>' .
            '<td><div align="right"><span style=" font-family: Verdana; font-size: 10;  ">' . number_format($tablacore[$x]['importe'], 2) . '</span></div></td>' .
            '<td><span style=" font-family: Verdana; font-size: 10;  "><div align="right">';
            '</div></span></td>' .
            '</tr>';
            $total = $total + $tablacore[$x]['importe'];
            $costo = $costo + $tablacore[$x]['costo'];
         }
      }
   }
   $total = number_format($total, 2);

   $t .= '</table></div>' .
   '<font size="1" face="Verdana"><strong>' .
   'Total&nbsp;Partidas:&nbsp;&nbsp;' . $i . '</strong></font>';

   $m = 'vcl.$("lbdetalle").innerHTML = \'' . $t . '\';';
   echo $m;
   $total = str_replace(',', '', $total);
   echo "var total = '" . $total . "';
         vcl.$('hfcostototal').value = '" . $costo . "';
         vcl.$('edsubtotal').value = formatCurrency(total);
         vcl.$('ediva').value = formatCurrency((vcl.$('cbiva').value)/100 * total);
        vcl.$('edtotal').value = formatCurrency((1+(vcl.$('cbiva').value)/100) * total);
          ";

   if($ban == '0')
   {
      echo "
     vcl.$('edparte').value='';
     vcl.$('eddescripcion').value='';
     vcl.$('edexistencia').value='';
     vcl.$('edcantidad').value='';
     vcl.$('hfcosto').value='';
     vcl.$('edprecio').value='';
     vcl.$('edimporte').value=''; ";
   }
}

if(isset($_POST['Calcular']))
{
   traerdetalle($_POST['Calcular'], $_POST['ban']);

   if(strpos($_SERVER['HTTP_REFERER'], 'id2') > 0)
   {
      echo "if(vcl.$('cbestatus').value=='1')
            {
               if(vcl.$('hfestatus').value=='1')
                  vcl.$('cbtipopago').focus();
            }
            else
                  vcl.$('btnguardar').focus();
            ";
   }
   $sql = 'select idestatus from reventas where serie="' . $_POST['serie'] . '" and idventa=' . $_POST['idventa'] .
   ' and idrevision=' . $_POST['idrevision'];
   $rs = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
   if(mysql_num_rows($rs) > 0)
   {
      $row = mysql_fetch_array($rs);
      echo "vcl.$('cbestatus').value='" . $row['idestatus'] . "' ; ";
   }
   if(strpos($_SERVER['HTTP_REFERER'], 'cveparte') > 0)
      echo "vcl.$('edcantidad').focus();";
   if(strpos($_SERVER['HTTP_REFERER'], 'idcliente') > 0)
      echo "vcl.$('edparte').focus();";
}

if(isset($_POST['prefacturar']))
{
   if($_POST['idtipopago'] == '2')
   {
      $total = str_replace(",", "", $_POST['total']);
      $credito = consultarcredito($_POST['idcliente'], 2);
      if($_POST['idmoneda'] == '2')
         $total = round(floatval($total) * floatval($_POST['tc']), 2);
      if(floatval($total) > floatval($credito))
      {
         $monto = round($total - $credito, 2);
         echo "alert('El monto excede al limite de credito del cliente por $" . number_format($monto, 2) . " Pesos'); ";
         exit;
      }
   }
   llenartablasinex();
   $ban = validarexistencias($_POST['idalmacen']);
   //si hay existencias "Pedido"
   if($ban == '0')
   {
      if(Derechos('REVTAPRE') == true)
      {
         if(EnInventario($_POST['idalmacen']) == true)
         {
            echo "alert('ATENCION!!!.. se esta haciendo el inventario, no podras hacer movimientos hasta nuevo aviso!');";
            exit;
         }
         //asignar numero de pedido
         //folio para el pedido
         $sql = "select clave, folio+1 as folio from folios where idtipo = 1
         and idplaza = " . $_SESSION['sesidplaza'];
         $r = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
         $row = mysql_fetch_row($r);
         $serie = $row[0];
         $idpedido = $row[1];
         actualizartotales($_POST['serie'], $_POST['idventa'], $_POST['idrevision'], 1);
         //actualizar la tabla ventas
         $sql = 'update reventas set idestatus=2 ,idpedido="' . $serie . $idpedido . '"
                where serie="' . $_POST['serie'] .
                '" and idventa=' . $_POST['idventa'] . ' and idrevision=' . $_POST['idrevision'];
         $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         //inserta en el log
         dmconexion::Log('Prefacturo la venta: ' . $serie . $idpedido, 2);
         //apartar las partes
         $tabla = $_SESSION['tablaventas'];
         $tablacores = $_SESSION['tablacores'];
         $t = count($tabla) - 1;
         $tc = count($tablacores) - 1;
         for($i = 0; $i <= $t; $i++)
         {
            $ban = false;
            $nodis = array();
            $c = 0;
            $sql = 'select cveparte,disponibles,costo from repartesmov where cveparte="' .
            $tabla[$i]['cveparte'] . '" and idalmacen=' . $_POST['idalmacen'];
            $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
            if(mysql_num_rows($rs) > 0)
            {
               $row = mysql_fetch_array($rs);
               if($row['disponibles'] >= $tabla[$i]['cantidad'])
               {
                  //apartar la pieza
                  $sql = 'update repartesmov set disponibles=disponibles-' . $tabla[$i]['cantidad'] .
                  ', apartados= apartados+' . $tabla[$i]['cantidad'] .
                  ',usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
                        where cveparte="' . $tabla[$i]['cveparte'] . '" and idalmacen=' .
                  $_SESSION['sesidalmacen'];
                  $r = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
                  //insertar en el kardex
                  InsertaKardex($_SESSION['sesidalmacen'], $tabla[$i]['cveparte'],
                  ($serie . $idpedido), 'S', $tabla[$i]['cantidad'], 'Apartado por Prefactura', 17);
                  //si tiene cores
                  if($tc > 0)
                     for($x = 0; $x <= $tc; $x++)
                        if($tabla[$i]['cveparte'] == $tablacores[$x]['cveparte'])
                        {
                           //apartar la pieza
                           $sql = 'update repartesmov set disponibles=disponibles-' . $tablacores[$x]['cantidad'] .
                                  ', apartados= apartados+' . $tablacores[$x]['cantidad'] .
                                  ',usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
                                  where cveparte="' . $tablacores[$x]['cvecore'] . '" and idalmacen=' .
                                 $_SESSION['sesidalmacen'];
                           $r = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
                           //insertar en el kardex
                           InsertaKardex($_SESSION['sesidalmacen'], $tablacores[$x]['cvecore'],
                           ($serie . $idpedido), 'S', $tablacore[$x]['cantidad'], 'Apartado por Prefactura', 17);
                        }
               }
            }
         }
         buscarpagosrealizados($_POST['serie'], $_POST['idventa'], $_POST['idrevision'], $serie . $idpedido);
         if($_POST['vista'] == '0')
         {
            echo " vcl.$('cbestatus').value='2';
                   findObj('cbpromotor').disabled = true;
                   findObj('cbtipopago').disabled = true;
                   vcl.$('edpedido').value= '" . $serie . $idpedido . "'; ";
         }
         else
            echo "  window.location='ureventasvista.php'; ";
         //imprimir la prefactura
         echo " window.open(\"http://" . $_SESSION['ServidorJasper'] .
         "/ibc.jsp?reporte=prefactura&tiporeporte=pdf&idventa=" .
         $_POST['idventa'] . "&idrevision=" . $_POST['idrevision'] . "&serie=" .
         $_POST['serie'] . "&mod=ref\", \"_blank\" );
               ";
      }
      else
         echo "alert('No tienes derechos para prefacturar'); ";
   }
   if($ban == '1')//no hay existencias
   {
      if($_POST['estatus'] != '8')
      {
         $c = count($_SESSION['partes']) - 1;
         $partes = '';
         for($i = 0; $i <= $c; $i++)
            $partes .= $_SESSION['partes'][$i]['cveparte'] . ' ';

         echo "
         if(confirm('No hay suficientes Existencias para la(s) parte(s) " . $partes . " , Desea Continuar con la Venta?'))
         {
            if(confirm('Deseas Crear la Requisicion de Compra?'))
            {
               basicAjax('ureventas_ajax.php','revisartablas=1'+
                         '&tipo=O'+
                         '&serie=" . $_POST['serie'] . "' +
                         '&idventa=" . $_POST['idventa'] . "' +
                         '&idalmacen=" . $_POST['idalmacen'] . "' +
                         '&idrevision=" . $_POST['idrevision'] . "' +
                         '&idpromotor=" . $_POST['idpromotor'] . "'+
                         '&idcliente=" . $_POST['idcliente'] . "'+
                         '&idmoneda=" . $_POST['idmoneda'] . "'+
                         '&piva=" . $_POST['piva'] . "'+
                         '&idtipopago=" . $_POST['idtipopago'] . "' +
                         '&tc=" . $_POST['tc'] . "' +
                         '&atencion=" . $_POST['atencion'] . "' +
                         '&idnota=" . $_POST['idnota'] . "'
                         );
            }
            else if(confirm('Deseas Crear la Requisicion de Traspaso?'))
            {
               basicAjax('ureventas_ajax.php','revisartablas=1'+
                         '&tipo=T'+
                         '&serie=" . $_POST['serie'] . "' +
                         '&idventa=" . $_POST['idventa'] . "' +
                         '&idalmacen=" . $_POST['idalmacen'] . "' +
                         '&idrevision=" . $_POST['idrevision'] . "' +
                         '&idpromotor=" . $_POST['idpromotor'] . "'+
                         '&idcliente=" . $_POST['idcliente'] . "'+
                         '&idmoneda=" . $_POST['idmoneda'] . "'+
                         '&piva=" . $_POST['piva'] . "'+
                         '&idtipopago=" . $_POST['idtipopago'] . "' +
                         '&tc=" . $_POST['tc'] . "' +
                         '&atencion=" . $_POST['atencion'] . "' +
                         '&idnota=" . $_POST['idnota'] . "'
                         );
            }
            else
            {

               basicAjax('ureventas_ajax.php','ventacaida=1'+
                         '&serie=" . $_POST['serie'] . "' +
                         '&idventa=" . $_POST['idventa'] . "' +
                         '&idrevision=" . $_POST['idrevision'] . "' +
                         '&idpromotor=" . $_POST['idpromotor'] . "'+
                         '&idcliente=" . $_POST['idcliente'] . "' +
                         '&idmoneda=". $_POST['idmoneda']."'
                         );
            }
         }
         else
         {

            basicAjax('ureventas_ajax.php','ventacaida=1'+
                      '&serie=" . $_POST['serie'] . "' +
                      '&idventa=" . $_POST['idventa'] . "' +
                      '&idrevision=" . $_POST['idrevision'] . "' +
                      '&idpromotor=" . $_POST['idpromotor'] . "'+
                      '&idcliente=" . $_POST['idcliente'] . "'+
                      '&idmoneda=". $_POST['idmoneda']."'
                      );
         }
                      ";
      }
      else if($_POST['estatus'] == '8')
      {
         echo "if(confirm('Deseas Crear la Requisicion de Compra?'))
               {
                 basicAjax('ureventas_ajax.php','revisartablas=1'+
                         '&serie=" . $_POST['serie'] . "' +
                         '&idventa=" . $_POST['idventa'] . "' +
                         '&idalmacen=" . $_POST['idalmacen'] . "' +
                         '&idrevision=" . $_POST['idrevision'] . "' +
                         '&idpromotor=" . $_POST['idpromotor'] . "'+
                         '&idcliente=" . $_POST['idcliente'] . "'+
                         '&idmoneda=" . $_POST['idmoneda'] . "'+
                         '&piva=" . $_POST['piva'] . "'+
                         '&idtipopago=" . $_POST['idtipopago'] . "' +
                         '&tc=" . $_POST['tc'] . "' +
                         '&atencion=" . $_POST['atencion'] . "' +
                         '&idnota=" . $_POST['idnota'] . "'
                         );
               }
               else
                  basicAjax('ureventas_ajax.php','ventacaida=1'+
                            '&serie=" . $_POST['serie'] . "' +
                            '&idventa=" . $_POST['idventa'] . "' +
                            '&idrevision=" . $_POST['idrevision'] . "' +
                            '&idpromotor=" . $_POST['idpromotor'] . "'+
                            '&idcliente=" . $_POST['idcliente'] . "'+
                            '&idmoneda=" . $_POST['idmoneda'] . "'
                            );";
      }
   }
   if($ban == '2')// kit
   {
      $c = count($_SESSION['partes']) - 1;
      $partes = '';
      for($i = 0; $i <= $c; $i++)
         $partes .= $_SESSION['partes'][$i]['cveparte'] . ' cantidad: ' . $_SESSION[$i]['cantidad'];

      echo "if(confirm('La parte " . $partes . " es un kit que no tiene existencias,'+
               'deseas continuar con la venta y eliminar la parte?'))
            {
               basicAjax('ureventas_ajax.php','borrarkit=1'+
                         '&serie=" . $_POST['serie'] . "' +
                         '&idventa=" . $_POST['idventa'] . "' +
                         '&idalmacen=" . $_POST['idalmacen'] . "' +
                         '&idrevision=" . $_POST['idrevision'] . "' +
                         '&idpromotor=" . $_POST['idpromotor'] . "'+
                         '&idcliente=" . $_POST['idcliente'] . "'+
                         '&idmoneda=" . $_POST['idmoneda'] . "'+
                         '&piva=" . $_POST['piva'] . "'+
                         '&idtipopago=" . $_POST['idtipopago'] . "' +
                         '&tc=" . $_POST['tc'] . "' +
                         '&atencion=" . $_POST['atencion'] . "' +
                         '&idnota=" . $_POST['idnota'] . "'+
                         '&estatus=" . $_POST['estatus'] . "'
                         );
            }
            else
               basicAjax('ureventas_ajax.php','ventacaida=1'+
                         '&serie=" . $_POST['serie'] . "' +
                         '&idventa=" . $_POST['idventa'] . "' +
                         '&idrevision=" . $_POST['idrevision'] . "' +
                         '&idpromotor=" . $_POST['idpromotor'] . "'+
                         '&idcliente=" . $_POST['idcliente'] . "'+
                         '&idmoneda=" . $_POST['idmoneda'] . "'
                         );";
   }
   if($ban == '3')//no existe la parte en almacen
   {
      $c = count($_SESSION['partes']) - 1;
      $partes = '';

      for($i = 0; $i <= $c; $i++)
      {

         if($_SESSION['partes'][$i]['tipo'] == 'noexiste')
         {
            $parte = $_SESSION['partes'][$i]['cveparte'];

            echo "if(confirm('La parte \"" . $parte . "\". No esta registrada en almacen,'+
               'deseas continuar con la venta y eliminar la parte? o cancelar para que registren la parte?'))
            {
               basicAjax('ureventas_ajax.php','borrarparte=" . $parte . "'+
                         '&serie=" . $_POST['serie'] . "' +
                         '&idventa=" . $_POST['idventa'] . "' +
                         '&idalmacen=" . $_POST['idalmacen'] . "' +
                         '&idrevision=" . $_POST['idrevision'] . "' +
                         '&estatus=" . $_POST['estatus'] . "' +
                         '&idpromotor=" . $_POST['idpromotor'] . "'+
                         '&idcliente=" . $_POST['idcliente'] . "'+
                         '&idmoneda=" . $_POST['idmoneda'] . "'+
                         '&piva=" . $_POST['piva'] . "'+
                         '&idtipopago=" . $_POST['idtipopago'] . "' +
                         '&tc=" . $_POST['tc'] . "' +
                         '&atencion=" . $_POST['atencion'] . "' +
                         '&idnota=" . $_POST['idnota'] . "'+
                         '&vista=0');
            }";
         }
      }
   }
   if($ban == '4')//inactivo
   {
      $c = count($_SESSION['partes']) - 1;
      $partes = '';
      for($i = 0; $i <= $c; $i++)
      {
         if($_SESSION['partes'][$i]['tipo'] == 'inactivo')
         {
            $parte = $_SESSION['partes'][$i]['cveparte'];
            echo "if(confirm('La parte \"" . $parte . "\". No tiene un estatus activo en este almacen,'+
                  'deseas continuar con la venta y eliminar la parte? o cancelar el movimiento para modificar la parte?'))
            {
               basicAjax('ureventas_ajax.php','borrarparte=" . $parte . "'+
                         '&serie=" . $_POST['serie'] . "' +
                         '&idventa=" . $_POST['idventa'] . "' +
                         '&idalmacen=" . $_POST['idalmacen'] . "' +
                         '&idrevision=" . $_POST['idrevision'] . "' +
                         '&estatus=" . $_POST['estatus'] . "' +
                         '&idpromotor=" . $_POST['idpromotor'] . "'+
                         '&idcliente=" . $_POST['idcliente'] . "'+
                         '&idmoneda=" . $_POST['idmoneda'] . "'+
                         '&piva=" . $_POST['piva'] . "'+
                         '&idtipopago=" . $_POST['idtipopago'] . "' +
                         '&tc=" . $_POST['tc'] . "' +
                         '&atencion=" . $_POST['atencion'] . "' +
                         '&idnota=" . $_POST['idnota'] . "'+
                         '&vista=0');
            }";
            break;
         }
      }
   }
   if($ban == '5')//apartado
   {
      $c = count($_SESSION['partes']) - 1;
      $partes = '';
      for($i = 0; $i <= $c; $i++)
         $partes .= $_SESSION['partes'][$i]['cveparte'] . ' ';
      echo "alert('La(s) parte(s) \" " . $partes . " \". tiene cantidades en apartado,favor de revisar para continuar con la venta.');";
   }
}

// 0-si hay 1-no hay 2-kit 3-no existe 4-inactivo 5-apartados
function validarexistencias($idalmacen)
{
   $tabla = $_SESSION['tablaventas'];
   $tablasinex = $_SESSION['tablasinex'];
   $tablacores = $_SESSION['tablacores'];
   $t = count($tabla);
   $tc = count($tablacores);
   $ts = count($tablasinex);
   $c = -1;
   $inactivo = false;
   $apartado = false;
   $sinex = false;
   $noexis = false;
   $_SESSION['partes'] = array();
   for($i = 0; $i <= $t-1; $i++)
   {
      //checar si la parte tiene core
      $core = false;
      $cvecore = '';
      for($x = 0; $x <= $tc - 1; $x++)
         if($tabla[$i]['cveparte'] == $tablacores[$x]['cveparte'])
         {
            $core = true;
            $cvecore = $tablacores[$x]['cvecore'];
         }
      //checar si la parte existe o no
      $noexis = noexiste($tabla[$i]['cveparte']);
      if($noexis == true)
      {
         $c++;
         $_SESSION['partes'][$c] = array('cveparte' => strtoupper($tabla[$i]['cveparte']),
                                         'cantidad' => $tabla[$i]['cantidad'],
                                         'idmoneda' => $tabla[$i]['idmoneda'],
                                         'tipo' => 'noexiste');
         break;
      }
      else
      {
         //si la parte tiene core y no existe en el almacen
         if($core == true)
         {
            $noexis = noexiste($cvecore);
            if($noexis == true)
            {
               $c++;
               $_SESSION['partes'][$c] = array('cveparte' => strtoupper($cvecore),
                                               'cantidad' => $tabla[$i]['cantidad'],
                                               'idmoneda' => $tabla[$i]['idmoneda'],
                                               'tipo' => 'noexiste');
               break;
            }
         }
      }
      //chechar el estatus de la parte activo/inactivo
      $inactivo = inactivo($tabla[$i]['cveparte']);
      if($inactivo == true)
      {
         $c++;
         $_SESSION['partes'][$c] = array('cveparte' => strtoupper($tabla[$i]['cveparte']),
                                         'idsupercision' => $tabla[$i]['idsupercision'],
                                         'idmoneda' => $tabla[$i]['idmoneda'],
                                         'cantidad' => $tabla[$i]['cantidad'],
                                         'tipo' => 'inactivo');
      }
      else
      {
         if($core == true)
         {
            $inactivo = inactivo($cvecore);
            if($inactivo == true)
            {
               $c++;
               $_SESSION['partes'][$c] = array('cveparte' => strtoupper($cvecore),
                                               //'idsupercision' => $tabla[$i]['idsupercision'],
                                               'idmoneda' => $tabla[$i]['idmoneda'],
                                               'cantidad' => $tabla[$i]['cantidad'],
                                               'tipo' => 'inactivo');
            }
         }
      }
      //checar si hay apartados
      $apartado = apartados($tabla[$i]['cveparte'], $tabla[$i]['cantidad']);
      if($apartado == true)
      {
         $c++;
         $_SESSION['partes'][$c] = array('cveparte' => strtoupper($tabla[$i]['cveparte']),
                                         'idsupercision' => $tabla[$i]['idsupercision'],
                                         'idmoneda' => $tabla[$i]['idmoneda'],
                                         'cantidad' => ($tabla[$i]['cantidad']) - ($row['disponibles']),
                                         'costo' => $tabla[$i]['costo'],
                                         'precio' => $tabla[$i]['precio'],
                                         'tipo' => 'apartados');
      }
      else
      {
         //si el core tiene existencias
         if($core == true)
         {
            $apartado = apartados($cvecore, $tabla[$i]['cantidad']);
            if($apartado == true)
            {
               $c++;
               $_SESSION['partes'][$c] = array('cveparte' => strtoupper($cvecore),
                                               'idsupercision' => $tabla[$i]['idsupercision'],
                                               'idmoneda' => $tabla[$i]['idmoneda'],
                                               'cantidad' => ($tabla[$i]['cantidad']) - ($row['disponibles']),
                                               'costo' => $tabla[$i]['costo'],
                                               'precio' => $tabla[$i]['precio'],
                                               'tipo' => 'parte');
            }
         }
      }
      //checar si tiene existencias
      $sinex = sinexis($tabla[$i]['cveparte'], $tabla[$i]['cantidad']);
      if($sinex == true)
      {
         $c++;
         $_SESSION['partes'][$c] = array('cveparte' => strtoupper($tabla[$i]['cveparte']),
                                         'idsupercision' => $tabla[$i]['idsupercision'],
                                         'idmoneda' => $tabla[$i]['idmoneda'],
                                         'cantidad' => ($tabla[$i]['cantidad']) - ($row['disponibles']),
                                         'costo' => $tabla[$i]['costo'],
                                         'precio' => $tabla[$i]['precio'],
                                         'tipo' => 'parte');
         $sinex = true;
      }
      else
      {
         if($core == true)
         {
            $sinex = sinexis($cvecore, $tabla[$i]['cantidad']);
            if($sinex == true)
            {
               $c++;
               $_SESSION['partes'][$c] = array('cveparte' => strtoupper($cvecore),
                                               //'idsupercision' => $tabla[$i]['idsupercision'],
                                               'idmoneda' => $tabla[$i]['idmoneda'],
                                               'cantidad' => ($tabla[$i]['cantidad']) - ($row['disponibles']),
                                               'costo' => $tabla[$i]['costo'],
                                               'precio' => $tabla[$i]['precio'],
                                               'tipo' => 'parte');
            }
         }
      }
   }

   for($i = 0; $i <= $ts - 1; $i++)
   {
      $c++;
      $_SESSION['partes'][$c] = array('cveparte' => strtoupper($tablasinex[$i]['cveparte']),
                                         'idsupercision' => $tablasinex[$i]['idsupercision'],
                                         'idmoneda' => $tablasinex[$i]['idmoneda'],
                                         'cantidad' => ($tablasinex[$i]['cantidad']),
                                         'costo' => $tablasinex[$i]['costo'],
                                         'precio' => $tablasinex[$i]['precio'],
                                         'tipo' => 'parte');
      $sinex = true;
   }

   if($noexis == true)
      return 3;
   else if($inactivo == true)
      return 4;
   else if($apartado == true)
      return 5;
   else if($sinex == true)
      return 1;
   else
      return 0;
}

function inactivo($parte)
{
   $sql = 'select activo from repartesestatus rs left join repartesmov pm on pm.idestatus=rs.idestatus
          where cveparte="' . $parte . '" and pm.idalmacen=' . $_SESSION['sesidalmacen'];
   $rs = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
   if(mysql_num_rows($rs) > 0)
   {
      $row = mysql_fetch_array($rs);
      if($row['activo'] == '0')
         return true;
      else
         return false;
   }
   else
      return false;
}

function noexiste($parte)
{
   $sql = 'select cveparte from repartesmov pm
          where cveparte="' . $parte . '" and pm.idalmacen=' . $_SESSION['sesidalmacen'];
   $rs = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
   if(mysql_num_rows($rs) > 0)
      return false;
   else
      return true;
}

function apartados($parte, $cantidad)
{
   $sql = 'select pm.cveparte,disponibles,apartados,costo,idsupercision,idmoneda
          from repartesmov pm LEFT join repartes pa on pa.cveparte=pm.cveparte
          where pm.cveparte="' . $parte . '" and pm.idalmacen=' . $_SESSION['sesidalmacen'];
   $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
   if(mysql_num_rows($rs) > 0)
   {
      $row = mysql_fetch_array($rs);
      if($row['disponibles'] < $cantidad)
      {
         if(($row['disponibles'] + $row['apartados']) > $cantidad ||
         ($row['disponibles'] + $row['apartados']) == $cantidad)
            return true;
         else
            return false;
      }
      else
         return false;
   }
   else
      return false;
}

function sinexis($parte, $cantidad)
{
   $sql = 'select pm.cveparte,disponibles,apartados,costo,idsupercision,idmoneda
          from repartesmov pm LEFT join repartes pa on pa.cveparte=pm.cveparte
          where pm.cveparte="' . $parte . '" and pm.idalmacen=' . $_SESSION['sesidalmacen'];
   $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
   if(mysql_num_rows($rs) > 0)
   {
      $row = mysql_fetch_array($rs);
      /*if(($row['disponibles'] + $row['apartados']) > $cantidad ||
      ($row['disponibles'] + $row['apartados']) == $cantidad)*/
      if($row['disponibles'] >= $cantidad)
         return false;//si hay existencias
      else
         return true;
   }
   else
      return false;
}

if(isset($_POST['borrarkit']))
{
   $t = count($_SESSION['partes']);
   for($i = 0; $i <= $t - 1; $i++)
   {
      if($_SESSION['partes'][$i]['tipo'] == 'kit')
      {
         $sql = 'delete from reventasdet where serie="' . $_POST['serie'] . '"
                  and idventa=' . $_POST['idventa'] . ' and idrevision=' . $_POST['idrevision'] .
         ' and cveparte="' . $_SESSION['partes'][$i]['cveparte'] . '"';
         $rs = mysql_query($sql)or die($sql);
         actualizartotales($_POST['serie'], $_POST['idventa'], $_POST['idrevision'], 1);
         //borrar del arreglo tablassinex;
         for($x = 0; $x <= count($_SESSION['tablaventas']) - 1; $x++)
         {
            if($_SESSION['partes'][$i]['cveparte'] == $_SESSION['tablaventas'][$x]['cveparte'])
            {
               unset($_SESSION['tablaventas'][$x]);
               $_SESSION['tablaventas'] = array_values($_SESSION['tablaventas']);
            }
         }
      }
   }
   if(count($_SESSION['tablaventas'] > 0))
      echo "basicAjax('ureventas_ajax.php','prefacturar=1'+
                   '&serie=" . $_POST['serie'] . "' +
                   '&idventa=" . $_POST['idventa'] . "' +
                   '&idalmacen=" . $_POST['idalmacen'] . "' +
                   '&idrevision=" . $_POST['idrevision'] . "' +
                   '&idpromotor=" . $_POST['idpromotor'] . "'+
                   '&idcliente=" . $_POST['idcliente'] . "'+
                   '&idmoneda=" . $_POST['idmoneda'] . "'+
                   '&piva=" . $_POST['piva'] . "'+
                   '&idtipopago=" . $_POST['idtipopago'] . "' +
                   '&tc=" . $_POST['tc'] . "' +
                   '&atencion=" . $_POST['atencion'] . "' +
                   '&idnota=" . $_POST['idnota'] . "' +
                   '&estatus=" . $_POST['estatus'] . "'+
                   '&vista=0'); ";
}

if(isset($_POST['borrarparte']))
{
   $ban = true;
   $tabla = $_SESSION['tablaventas'];
   $t = count($tabla);
   $tablacores = $_SESSION['tablacores'];
   //buscar de la tablaventas para eliminar partes
   for($x = 0; $x <= $t - 1; $x++)
      if($_POST['borrarparte'] == $tabla[$x]['cveparte'])
      {
         $core = -1;
         if($t == 1)
         {
            echo "alert('No puedes eliminar la ultima parte del presupuesto, si deseas modificar, Selecciona la opcion REVISAR!'); ";
            $ban = false;
         }
         else
         {
            if($tabla[$x]['ne'] == '0')
            {
               for($y = 0; $y <= count($tablacores) - 1; $y++)
                  if($tabla[$x]['cveparte'] == $tablacores[$y]['cveparte'])
                  {
                     $sql = 'delete from reventasdet where serie="' . $_POST['serie'] . '"
                             and idventa=' . $_POST['idventa'] . ' and idrevision=' . $_POST['idrevision'] .
                     ' and cveparte="' . $tablacores[$y]['cvecore'] . '"';
                     $rs = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
                     $core = $y;
                  }
               $sql = 'delete from reventasdet where serie="' . $_POST['serie'] . '"
                      and idventa=' . $_POST['idventa'] . ' and idrevision=' . $_POST['idrevision'] .
               ' and cveparte="' . $tabla[$x]['cveparte'] . '"';
            }
            else
            {
               for($y = 0; $y <= count($tablacores) - 1; $y++)
                  if($tabla[$x]['cveparte'] == $tablacores[$y]['cveparte'])
                  {
                     $sql = 'delete from reventasdetne where serie="' . $_POST['serie'] . '"
                             and idventa=' . $_POST['idventa'] . ' and idrevision=' . $_POST['idrevision'] .
                     ' and cveparte="' . $tablacores[$y]['cvecore'] . '"';
                     $rs = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
                     $core = $y;
                  }
               $sql = 'delete from reventasdetne where serie="' . $_POST['serie'] . '"
                       and idventa=' . $_POST['idventa'] . ' and idrevision=' . $_POST['idrevision'] .
               ' and cveparte="' . $tabla[$x]['cveparte'] . '"';
            }
            //borrar
            $rs = mysql_query($sql)or die($sql);
            //quitar de la tabla
            unset($_SESSION['tablaventas'][$x]);
            $_SESSION['tablaventas'] = array_values($_SESSION['tablaventas']);
            if($core > - 1)
            {
               unset($_SESSION['tablacores'][$core]);
               $_SESSION['tablacores'] = array_values($_SESSION['tablacores']);
            }
            actualizartotales($_POST['serie'], $_POST['idventa'], $_POST['idrevision'], 1);
         }
      }
   //buscar de la tabla cores
   for($i = 0; $i <= count($tablacores) - 1; $i++)
      if($_POST['borrarparte'] == $tablacores[$i]['cvecore'])
      {
         $sql = 'delete from reventasdet where serie="' . $_POST['serie'] . '"
                and idventa=' . $_POST['idventa'] . ' and idrevision=' . $_POST['idrevision'] .
         ' and cveparte="' . $tablacores[$y]['cvecore'] . '"';
         $rs = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
         $sql = 'delete from reventasdet where serie="' . $_POST['serie'] . '"
                and idventa=' . $_POST['idventa'] . ' and idrevision=' . $_POST['idrevision'] .
         ' and cveparte="' . $tablacores[$y]['cveparte'] . '"';
         $rs = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
         unset($_SESSION['tablacores'][$i]);
         $_SESSION['tablacores'] = array_values($_SESSION['tablacores']);
         for($x = 0; $x <= $t - 1; $x++)
            if($tabla[$x]['cveparte'] == $tablacores[$i]['cveparte'])
            {
               unset($_SESSION['tablaventas'][$x]);
               $_SESSION['tablaventas'] = array_values($_SESSION['tablaventas']);
            }
      }

   traerdetalle(0, 0);
   echo "basicAjax('ureventas_ajax.php','prefacturar=1'+
                '&serie=" . $_POST['serie'] . "' +
                '&idventa=" . $_POST['idventa'] . "' +
                '&idalmacen=" . $_POST['idalmacen'] . "' +
                '&idrevision=" . $_POST['idrevision'] . "' +
                '&estatus=" . $_POST['estatus'] . "'  +
                '&idpromotor=" . $_POST['idpromotor'] . "'+
                '&idcliente=" . $_POST['idcliente'] . "'+
                '&idmoneda=" . $_POST['idmoneda'] . "'+
                '&piva=" . $_POST['piva'] . "'+
                '&idtipopago=" . $_POST['idtipopago'] . "' +
                '&tc=" . $_POST['tc'] . "' +
                '&atencion=" . $_POST['atencion'] . "' +
                '&idnota=" . $_POST['idnota'] . "'+
                '&vista=0'); ";
}

function actualizartotales($serie, $venta, $revision, $ambas)
{
   //TABLAS PARA CALCULAR EL TOTAL
   $tabla = $_SESSION['tablaventas'];
   $tablacores = $_SESSION['tablacores'];
   $t = count($tabla);
   $tc = count($tablacores);
   $subtotal = 0;
   $costo = 0;
   for($i = 0; $i <= $t - 1; $i++)
   {
      $subtotal += $tabla[$i]['importe'];
      $costo += $tabla[$i]['costo'];
   }
   if($ambas == '1')//si tambien se suma juntas las partes cores
      for($i = 0; $i <= $tc - 1; $i++)
      {
         $costo += $tablacores[$i]['costo'];
         $subtotal += $tablacores[$i]['importe'];
      }
   $costo = round($costo, 2);
   $subtotal = round($subtotal, 2);
   $sql = 'select piva from reventas where serie="' . $serie . '" and idventa="' . $venta .
   '" and idrevision="' . $revision . '"';
   $rs = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
   $row = mysql_fetch_array($rs);
   $iva = round($subtotal * ($row['piva'] / 100), 2);
   $total = round($subtotal + $iva, 2);
   //actualizar la tabla ventas
   $sql = 'update reventas set costo="' . $costo . '",importe="' . $subtotal . '", subtotal = "' . $subtotal .
          '", iva="' . $iva . '", total="' . $total . '",totalmn="' . $total . '" where serie="' . $serie .
          '" and idventa=' . $venta . ' and idrevision=' . $revision;
   $rstotal = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
}
function llenartablasinex()
{
   $tabla = $_SESSION['tablaventas'];
   $tablacores = $_SESSION['tablacores'];
   $tablasinex = array();
   $t = count($tabla);
   $tc = count($tablacores);
   for($i = 0; $i <= $t - 1; $i++)
   {
      $sql = 'select cveparte,disponibles,costo from repartesmov where cveparte="' .
      $tabla[$i]['cveparte'] . '" and idalmacen=' . $_SESSION['sesidalmacen'];
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      if(mysql_num_rows($rs) > 0)
      {
         $row = mysql_fetch_array($rs);

         //si las disponibles son mayores que la existencia no se guarda nada en tablasinex
         //si son menores las disponibles a las pedidas se guardan las diferencias en la tablasinex
         if($row['disponibles'] < $tabla[$i]['cantidad'])
         {
            $n = count($tablasinex);
            $tablasinex[$n] = array('cveparte' => $tabla[$i]['cveparte'],
                                    'cantidad' => $tabla[$i]['cantidad'] - $row['disponibles'],
                                    'idsupercision' => $tabla[$i]['idsupercision'],
                                    'unidades' => $tabla[$i]['unidades'],
                                    'idmoneda' => $tabla[$i]['idmoneda'],
                                    'descripcion' => $tabla[$i]['descripcion'],
                                    'costo' => $row['costo'],
                                    'precio' => $tabla[$i]['precio'],
                                    'importe' => $tabla[$i]['importe']
                                    );
            if($tc > 0)
               for($x = 0; $x <= $tc - 1; $x++)
               {
                  if($tabla[$i]['cveparte'] == $tablacores[$x]['cveparte'])
                  {
                     $n = count($tablasinex);
                     $tablasinex[$n] = array('cveparte' => $tablacores[$x]['cvecore'],
                                             'cantidad' => $tabla[$i]['cantidad'] - $row['disponibles'],
                                             'idsupercision' => $tablacores[$x]['idsupercision'],
                                             'unidades' => $tabla[$i]['unidades'],
                                             'idmoneda' => $tabla[$i]['idmoneda'],
                                             'descripcion' => $tablacores[$x]['descripcion'],
                                             'costo' => $tablacores[$x]['costo'],
                                             'precio' => $tablacores[$x]['precio'],
                                             'importe' => $tablacores[$x]['importe']
                                             );
                     if($row['disponibles'] == 0)
                     {
                        unset($tabla[$i]);
                        $i--;
                        $t = count($tabla);
                     }
                     else
                        $tablacores[$x]['cantidad'] = $row['disponibles'];
                  }
                  //$tablacores[$x]['cantidad'] = $row['disponibles'];
               }
            if($row['disponibles'] == 0)
            {
                unset($tabla[$i]);
                $tabla = array_values($tabla);
                $i--;
                $t = count($tabla);
            }
            else
                $tabla[$i]['cantidad'] = $row['disponibles'];
         }
         //$tabla[$i]['cantidad'] = $row['disponibles'];
      }
   }
   //asignar valores a las tablas
   $_SESSION['tablasinex'] = $tablasinex;
   $_SESSION['tablaventas'] = $tabla;
   $_SESSION['tablacores'] = $tablacores;
}

if(isset($_POST['revisartablas']))
{
   //llenartablasinex();

   //revisar las existencias
   $tabla = $_SESSION['tablaventas'];
   $tablacores = $_SESSION['tablacores'];
   $tablasinex = $_SESSION['tablasinex'];
   $t = count($tabla);
   $tc = count($tablacores);
   $ban = false;
   $separar = false;

   //checar que si las partes no tienen existencia por completo
   // o si solo hay algunas sugerir separar la venta
   for($i = 0; $i <= $t - 1; $i++)
   {
      if($tabla[$i]['cantidad']>0)
      {
        $separar = true;
        break;
      }
   }

   $c = "basicAjax('ureventas_ajax.php','crearbackorder=1'+
                         '&tipo=" . $_POST['tipo'] . "'+
                         '&serie=" . $_POST['serie'] . "' +
                         '&idventa=" . $_POST['idventa'] . "' +
                         '&idalmacen=" . $_POST['idalmacen'] . "' +
                         '&idrevision=" . $_POST['idrevision'] . "' +
                         '&idpromotor=" . $_POST['idpromotor'] . "'+
                         '&idcliente=" . $_POST['idcliente'] . "'+
                         '&idmoneda=" . $_POST['idmoneda'] . "'+
                         '&piva=" . $_POST['piva'] . "'+
                         '&idtipopago=" . $_POST['idtipopago'] . "' +
                         '&tc=" . $_POST['tc'] . "' +
                         '&atencion=" . $_POST['atencion'] . "' +
                         '&idnota=" . $_POST['idnota'] . "' +
                         '&bandera='+ban
                         );";

   //if($t > 0)
   if($separar)
      echo "if(confirm('Deseas separar la requisicion en otra venta?'))
             var ban = 1;
            else
              var ban = 2;
           " . $c;
   else
      echo "var ban = 2; " . $c;

}

if(isset($_POST['separartablas']))
{
   llenartablasinex();
}

if(isset($_POST['crearbackorder']))
{
   $tabla = $_SESSION['tablaventas'];
   $tablacores = $_SESSION['tablacores'];
   $tablasinex = $_SESSION['tablasinex'];

   //se actualiza la venta o se crea una nueva con las inexistencias segun sea el caso
   // si la bandera = 1 se separa la venta con las inexistencias
   if($_POST['bandera'] == '1')
   {
      //la venta actual actualizar a estatus revisada
      $sql = 'select max(idrevision) from reventas where serie="' . $_POST['serie'] .
             '" and idventa=' . $_POST['idventa'];
      $r = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_row($r);
      $idrevision = $row[0] + 1;

      $subtotal = 0;  $costo = 0;
      for($i = 0; $i <= count($tabla) - 1; $i++)
      {
         $subtotal += $tabla[$i]['cantidad'] * $tabla[$i]['precio'];
         $costo +=  $tabla[$i]['cantidad'] * $tabla[$i]['costo'];

      }
       for($i = 0; $i <= count($tabla) - 1; $i++)
      {
         $subtotal += $tablacores[$i]['cantidad'] * $tablacores[$i]['precio'];
         $costo +=  $tablacores[$i]['cantidad'] * $tablacores[$i]['costo'];

      }

      $sql = 'select serie,' . $idrevision . ' as idrevision,"A" as fase,idalmacen,idpromotor,idcliente,
           idestatus,idmoneda, atencion, idnota,idtipopago,fechacreacion,piva,tc,costo,
           importe,descuento,subtotal,iva,total,totalmn,observaciones,usuario,fecha,hora
           from reventas  where serie="' . $_POST['serie'] . '" and idventa=' .
           $_POST['idventa'] . ' and idrevision=' . $_POST['idrevision'];

      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);

      $iva = $subtotal * ($row['piva'] / 100);
      $total = $subtotal * (1 + ($row['piva'] / 100));

      if($row['idmoneda'] == 1)
         $totalmn = $total;
      else
         $totalmn = $total * $row['tc'];

      //se inserta la nueva venta que contendra las partes existentes
      $sql = 'insert into reventas (serie,idrevision,fase,idalmacen,idpromotor,
           idcliente,idestatus,idmoneda, atencion, idnota,idtipopago,fechacreacion,
           piva,tc,costo,importe,descuento,subtotal,iva,total,totalmn,observaciones,usuario,fecha,hora)
           values ("' . $row['serie'] . '", "' . $row['idrevision'] . '","' . $row['fase'] . '","' . $row['idalmacen'] . '",
           "' . $row['idpromotor'] . '","' . $row['idcliente'] . '","' . $row['idestatus'] . '","' . $row['idmoneda'] . '",
           "' . $row['atencion'] . '","' . $row['idnota'] . '","' . $row['idtipopago'] . '","' . $row['fechacreacion'] . '",
           "' . $row['piva'] . '","' . $row['tc'] . '","' . $costo . '","' . $subtotal . '","' . $row['descuento'] . '",
           "' . $subtotal . '","' . $iva . '","' . $total . '","' . $totalmn . '","' . $row['observaciones'] . '",
           "' . $row['usuario'] . '","' . $row['fecha'] . '","' . $row['hora'] . '")       ';

      $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
      $idv = mysql_insert_id();


      $sql = 'select folio from folios where clave="' . $_POST['serie'] . '" and idplaza=' .
              $_SESSION['sesidplaza'];
      $rs = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_row($rs);

      //se cambia el folio por el autoincremental
      $sql = 'update reventas set idventa= ' . $_POST['idventa'] .
             ' where idventa=' . $idv . ' and serie="' . $_POST['serie'] .
             '" and idrevision= ' . $idrevision;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);

      //se incrementa el folio
      $sql = 'update folios set folio=' . $_POST['idventa'] . ' where clave="' .
             $_POST['serie'] . '" and idplaza=' . $_SESSION['sesidplaza'];
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);

      //se cambia la fase de la venta anterior a revisada
      $sql = 'update reventas set fase="R",observaciones="\"PRESUPUESTO REVISADO\",
          SE CREO OTRA VENTA CON EXISTENCIAS Y UNA REQUISICION DE BACKORDER",
          usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
          where serie="' . $_POST['serie'] . '" and idventa=' . $_POST['idventa'] .
           ' and idrevision=' . $_POST['idrevision'];
      $r = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

      //insertar la venta con las partes que se van a vender
      $tabla = $_SESSION['tablaventas'];
      $t = count($tabla);
      $costo = 0;
      $precio = 0;
      for($i = 0; $i <= $t - 1; $i++)
      {
         BDAgregarVenta($i, $_POST['serie'], $_POST['idventa'], $idrevision);#BO001
         $costo = $costo + $tabla[$i]['costo'] * $tabla[$i]['cantidad'];
         $precio = $precio + $tabla[$i]['importe'];
      }
      /*//actualizar la venta con la suma del detalle
      $sql = 'update reventas set costo=' . $costo . ',importe="' . $precio . '", subtotal=' . $precio .
      ', iva=' . $precio . '*(piva/100), total=' . $precio . '+' . $precio . '*(piva/100),
          totalmn=if(idmoneda=1,' . $precio . '+' . $precio . '*(piva/100),(' . $precio .
      '+' . $precio . '*(piva/100))*tc)
          where serie="' . $_POST['serie'] . '" and idventa=' .
      $_POST['idventa'] . ' and idrevision=' . $idrevision;
      $rs = mysql_query($sql)or die($sql);       }  */
      ############################# CREAR BACK ORDER ##########################################
      $costobacko = 0;
      $preciosubtotal = 0;
      $moneda = 0;
      $t = count($_SESSION['tablasinex']);
      for($i = 0; $i <= $t - 1; $i++)
      {
         $costobacko = $costobacko + ($_SESSION['tablasinex'][$i]['costo'] * $_SESSION['tablasinex'][$i]['cantidad']);
         $preciosubtotal = $preciosubtotal + ($_SESSION['tablasinex'][$i]['precio'] * $_SESSION['tablasinex'][$i]['cantidad']);
      }
      $moneda = $_POST['idmoneda'];
      $precioiva = round($preciosubtotal * (($_POST['piva']) / 100), 2);
      $preciototal = round($preciosubtotal + $precioiva, 2);
      if($moneda == 1)
         $preciototmn = $preciototal;
      else
      {
         $costobacko = round($costobacko * $_POST['tc'], 2);
         $preciototmn = round($preciototal * $_POST['tc'], 2);
      }

      //folio para la venta
      $sql = "select clave, folio+1 as folio from folios where idtipo = 15 and idplaza = " . $_SESSION['sesidplaza'];
      $r = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_row($r);
      $serievta = $row[0];
      $idventa = $row[1];
      //dependiento el tipo es el estatus de la venta
      if($_POST['tipo'] == 'O')
         $estatus = '3';
      else
         $estatus = '7';
      if($_POST['tipo'] == 'T')
         $cadena = 'Traspaso';
      else
         $cadena = 'BackOrder';
      //inserta la venta con estatus backorder
      $sql = 'insert into reventas (serie,idventa,idrevision,idalmacen,idpromotor,idcliente,idestatus,fase,idmoneda, atencion, idnota,
          idtipopago,fechacreacion,piva,tc,costo,importe,descuento,subtotal,iva,total,totalmn,observaciones,usuario,fecha,hora)
          values ("' . $serievta . '",' . $idventa . ',0,' . $_POST['idalmacen'] . ',' . $_POST['idpromotor'] .
          ',' . $_POST['idcliente'] . ',' . $estatus . ',"A",' . $moneda . ',"' . $_POST['atencion'] . '",' . $_POST['idnota'] . ',' . $_POST['idtipopago'] . ',curdate(),' . $_POST['piva'] .
          ',' . $_POST['tc'] . ',' . $costobacko . ',' . $preciosubtotal . ',0,' . $preciosubtotal . ',' . $precioiva . ',' . $preciototal . ',' . $preciototmn .
          ',"Venta Con ' . $cadena . ' Generado","' . $_SESSION['login'] . '",curdate(),curtime())';
      $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
      $idventa = mysql_insert_id();
      $serievtareq = $serievta;
      $idvtareq = $idventa;
      $idrevreq = '0';
      //detalle venta backorder
      $t = count($_SESSION['tablasinex']);
      for($i = 0; $i <= $t - 1; $i++)
      {
         BDAgregarBackOrder($i, $serievta, $idventa, '0');#BO002
         for($x = 0; $x <= count($_SESSION['tablacores']) - 1; $x++)
         {
            if($_SESSION['tablasinex'][$i]['cveparte'] == $_SESSION['tablacores'][$x]['cvecore'])
            {
               unset($_SESSION['tablasinex'][$i]);
               $_SESSION['tablasinex'] = array_values($_SESSION['tablasinex']);
            }
         }
      }
   }
   else // si bandera = 2 se crea el backorder en la misma venta
   {
      $t = count($_SESSION['tablasinex']);
      for($i = 0; $i <= $t - 1; $i++)
         for($x = 0; $x <= count($_SESSION['tablacores']) - 1; $x++)
            if($_SESSION['tablasinex'][$i]['cveparte'] == $_SESSION['tablacores'][$x]['cvecore'])
            {
               unset($_SESSION['tablasinex'][$i]);
               $_SESSION['tablasinex'] = array_values($_SESSION['tablasinex']);
            }
      //dependiento el tipo es el estatus de la venta
      if($_POST['tipo'] == 'O')
         $estatus = '3';
      else
         $estatus = '7';
      //cambiar estatus a la venta  a backorder
      $sql = 'update reventas set idestatus=' . $estatus . ' where serie="' . $_POST['serie'] .
             '" and idventa=' . $_POST['idventa'] . ' and idrevision= ' . $_POST['idrevision'];
      $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
      $serievtareq = $_POST['serie'];
      $idvtareq = $_POST['idventa'];
      $idrevreq = $_POST['idrevision'];
   }


   ########################################################################################
   ############################## Insertar la Requisicion #################################
   ########################################################################################
   $sql = "select clave, folio+1 as folio from folios where idtipo = 19 and idplaza = " . $_SESSION['sesidplaza'];
   $r = mysql_query($sql)or die("Error SQL: " . $sql . " " . mysql_error());
   $row = mysql_fetch_row($r);
   $serier = $row[0];
   $idrequi = $row[1];
   $tabla = $_SESSION['tablaventas'];
   $tablacores = $_SESSION['tablacores'];
   $tablasinex = $_SESSION['tablasinex'];
   $t = count($tabla);
   $ti = count($tablasinex);
   $tc = count($_SESSION['tablacores']);
   // "1" si es contado se inserta la requisicion con estatus "pendiente"
   // "2" si es credito automaticamente se pasa a autorizado  "anticipo"
   if($_POST['idtipopago'] == '1')
   {
      //anticipo del cliente
      $tipopago = '1';
      $sql = 'select v.idcliente,c.anticipovtas from reventas v left join clientes c
             on v.idcliente = c.idcliente
             where v.serie="' . $_POST['serie'] . '" and v.idventa=' . $_POST['idventa'] .
             ' and v.idrevision=' . $_POST['idrevision'];
      $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
      $row = mysql_fetch_array($rs);
      if($row['anticipovtas'] == '1')
         echo " var ban=1; ";
      else
      {
         $tipopago = '2';
         echo " var ban=0; ";
      }
   }
   else
   {
      $tipopago = '2';
      echo "var ban=0; ";
   }
   //recorrer la tabla de los disponibles para apartarlos
   for($i = 0; $i <= $t - 1; $i++)
   {
      if($tipopago == '2' && $_POST['bandera'] != '1')
      {
         #si no pide anticipo apartar las piezas que esten disponibles
         //surtir las partes de la venta
         $sql = 'update reventasdet set surtido=' . $tabla[$i]['cantidad'] . '
                where concat(serie,idventa,"-",idrevision)="' . $serievtareq . $idvtareq . '-' . $idrevreq .
         '" and cveparte="' . $tabla[$i]['cveparte'] . '"';
         $update = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
         //apartar las que si estan disponibles
         $sql = 'update repartesmov set disponibles=disponibles-' . $tabla[$i]['cantidad'] .
         ', apartados= apartados+' . $tabla[$i]['cantidad'] . ',usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
                where cveparte="' . $tabla[$i]['cveparte'] . '" and idalmacen=' . $_SESSION['sesidalmacen'];
         $r = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         //insertar en el kardex
         InsertaKardex($_SESSION['sesidalmacen'], $tabla[$i]['cveparte'], ($serier . $idrequi), 'S', $tabla[$i]['cantidad'], 'Apartado por BackOrder', 17);
         //si tiene *********CORES*********
         if($tc > 0)
            for($z = 0; $z <= $tc - 1; $z++)
               if($_SESSION['tablacores'][$z]['cveparte'] == $tablasinex[$i]['cveparte'])
               {
                  //sutir la venta
                  $sql = 'update reventasdet set surtido=' . $_SESSION['tablacores'][$z]['cantidad'] . '
                         where concat(serie,idventa,"-",idrevision)="' . $serievtareq . $idvtareq . '-' . $idrevreq .
                  '" and cveparte="' . $_SESSION['tablacores'][$z]['cvecore'] . '"';
                  $update = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
                  //apartar la pieza
                  $sql = 'update repartesmov set disponibles=disponibles-' . $_SESSION['tablacores'][$z]['cantidad'] .
                  ', apartados= apartados+' . $_SESSION['tablacores'][$z]['cantidad'] .
                  ',usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
                         where cveparte="' . $_SESSION['tablacores'][$z]['cvecore'] . '" and idalmacen=' . $_SESSION['sesidalmacen'];
                  $r = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
                  //insertar en el kardex
                  InsertaKardex($_SESSION['sesidalmacen'], $_SESSION['tablacores'][$z]['cvecore'], ($serier . $idrequi), 'S', $_SESSION['tablacores'][$z]['cantidad'], 'Apartado por BackOrder', 17);
               }
      }
   }
   //insertar las partes para requisicion
   for($i = 0; $i <= $ti - 1; $i++)
   {
      #insertar la requisicion
      $sql = 'insert into rerequisiciones(serie,idrequisicion,iddocumento,idalmacen,
            idcliente,idestatus,cveparte,cantidad,tipo,destino,fechacreacion,usuario,fecha,hora)
            values ("' . $serier . '",' . $idrequi . ',"' . $serievtareq . $idvtareq . '-' . $idrevreq .
            '",' . $_POST['idalmacen'] . ',' . $_POST['idcliente'] . ',' . $tipopago . ',"' . $tablasinex[$i]['cveparte'] .
           '",' . $tablasinex[$i]['cantidad'] . ',"' . $_POST['tipo'] . '","M",curdate(),"' . $_SESSION['login'] . '",curdate(),curtime())';
      $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);

   }


   //dependiento el tipo es el estatus de la venta
   if($_POST['tipo'] == 'O')
   {
      $estatus = 'BackOrder';
      $id = '3';
   }
   else
   {
      $id = '7';
      $estatus = 'Traspaso';
   }
   //impresion de la requisicion
   echo "if(ban=='1')
            alert('EL cliente debe pasar a caja a dejar anticipo!');

         alert('Requisicion de " . $estatus . " generado con folio: " . $serier . $idrequi . "');
         window.open(\" http://" . $_SESSION['ServidorJasper'] .
   "/ibc.jsp?reporte=requisicion&tiporeporte=pdf&idrequisicion=" .
   $idrequi . "&serie=" . $serier . "&mod=ref\", \"_blank\");
         vcl.$('cbestatus').value = '" . $id . "';
         vcl.$('cbpromotor').disabled= true;
         vcl.$('cbtipopago').disabled= true;
        ";
   // si es venta con partes con partes con y sin existencia, crea otra venta
   // con las partes que si puede tener salida
   if($_POST['bandera'] == '1')
   {
      posicionarventanueva($_POST['serie'], $_POST['idventa'], $idrevision);
      traerdetalle(1, 0);
   }
}

function BDAgregarVenta($row, $serie, $idventa, $idrevision)#BO001
{
   $edparte = replace_esp($_SESSION['tablaventas'][$row]['cveparte']);
   $idsupercision = $_SESSION['tablaventas'][$row]['idsupercision'];
   $descripcion = replace_esp($_SESSION['tablaventas'][$row]['descripcion']);
   $edcantidad = $_SESSION['tablaventas'][$row]['cantidad'];
   $precio = $_SESSION['tablaventas'][$row]['precio'];
   $costo = $_SESSION['tablaventas'][$row]['costo'];

   //inserta el detalle de la venta
   $sql = 'Insert into reventasdet (serie, idventa,idrevision,cveparte,idsupercision,descripcion,
           cantidad, costo,precio, usuario, fecha, hora) values ("' . $serie . '", ' . $idventa . ',' .
          $idrevision . ', "' . $edparte . '",' . $idsupercision . ',"' . $descripcion . '",' .
          $edcantidad . ',' . $costo . ', ' . $precio . ',"' . $_SESSION['login'] . '", curdate(), curtime())';
   $r = mysql_query($sql)or die("Error SQL: " . $sql . " " . mysql_error());

   /*  //Actualiza ordenados
   $sql = 'Update repartesmov set ordenados=ordenados+' . $edcantidad . ',
   usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
   where cveparte="' . $edparte . '" and idalmacen=' . $_SESSION['sesidalmacen'];
   $r = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());      */

   $tablacore = $_SESSION['tablacores'];
   if(isset($tablacore[$row]['cveparte']))
   {
      //inserta el detalle de la venta
      $sql = 'Insert into reventasdet (serie, idventa,idrevision, cveparte,idsupercision,descripcion,
            cantidad, costo, precio, usuario, fecha, hora) values ("' . $serie . '", ' . $idventa . ',' .
            $idrevision . ',"' . $tablacore[$row]['cvecore'] . '",' . $tablacore[$row]['idsupercision'] . ',"' . $tablacore[$row]['descripcion'] . '",' .
            $tablacore[$row]['cantidad'] . ', ' . $tablacore[$row]['costo'] . ', ' . $tablacore[$row]['precio'] . ',' .
            '"' . $_SESSION['login'] . '", curdate(), curtime())';
      $r = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

      /*  //Actualiza ordenados
      $sql = 'Update repartesmov set ordenados=ordenados+' . $edcantidad . ',
      usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
      where cveparte="' . $edparte . '" and idalmacen=' . $_SESSION['sesidalmacen'];
      $r = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
      //insertar en el kardex
      InsertaKardex($_SESSION['sesidalmacen'], $edparte, ($serie . $idorden), 'E', $edcantidad, 'Entrada por BackOrder', 1); */
   }

   //insertar en el kardex
   InsertaKardex($_SESSION['sesidalmacen'], $edparte, ($serie . $idorden), 'E', $edcantidad, 'Entrada por BackOrder', 1);

   //inserta en el log
   dmconexion::Log('Inserto en la venta ' . $serie . $idventa . ' las partes: ' .
   $edcantidad . ' unidad(es) de ' . $edparte . ' - ' . replace_esp($_SESSION['tablaventas'][$row]['descripcion']) . '', 2);
}

function BDAgregarBackOrder($row, $seriev, $idventa, $idrevision)#BO002
{
   $edparte = replace_esp($_SESSION['tablasinex'][$row]['cveparte']);
   $idsupercision = $_SESSION['tablasinex'][$row]['idsupercision'];
   $descripcion = replace_esp($_SESSION['tablasinex'][$row]['descripcion']);
   $edcantidad = $_SESSION['tablasinex'][$row]['cantidad'];
   $precio = $_SESSION['tablasinex'][$row]['precio'];
   $costo = $_SESSION['tablasinex'][$row]['costo'];

   //inserta el detalle de la venta
   $sql = 'Insert into reventasdet (serie, idventa,idrevision, cveparte,idsupercision,descripcion,
           cantidad, costo, precio, usuario, fecha, hora) values ("' . $seriev . '", ' . $idventa . ',' .
   $idrevision . ',"' . $edparte . '",' . $idsupercision . ',"' . $descripcion . '",' .
   $edcantidad . ', ' . $costo . ', ' . $precio . ',"' . $_SESSION['login'] . '", curdate(), curtime())';
   $r = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

      //inserta en el log
   dmconexion::Log('Inserto en la Orden de Compra Por BackOrder ' . $serie . $idorden . ' las partes: ' .
   $edcantidad . ' unidad(es) de ' . $edparte . ' - ' . replace_esp($_SESSION['tablasinex'][$row]['descripcion']) . '', 2);
}

function BDAgregarCore($i, $serie, $idventa, $idrevision, $factura)
{
   $edparte = replace_esp($_SESSION['tablacores'][$i]['cvecore']);
   $idsupercision = $_SESSION['tablacores'][$i]['idsupercision'];
   $edcantidad = $_SESSION['tablacores'][$i]['cantidad'];
   $edcosto = $_SESSION['tablacores'][$i]['costo'];
   $edprecio = $_SESSION['tablacores'][$i]['precio'];
   $eddescripcion = replace_esp($_SESSION['tablacores'][$i]['descripcion']);

   //inserta el detalle de la venta
   $sql = 'Insert into reventasdet (serie, idventa,idrevision,cveparte,descripcion,idsupercision,
           cantidad,costo, precio, usuario, fecha, hora) values ("' . $serie . '", ' . $idventa . ',' .
   $idrevision . ',"' . $edparte . '","' . $eddescripcion . '",' . $idsupercision . ',' . $edcantidad .
   ',' . $edcosto . ', ' . $edprecio . ',"' . $_SESSION['login'] . '", curdate(), curtime())';
   $r = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

   //Actualiza ordenados
   $sql = 'update repartesmov set apartados= apartados-' . $edcantidad .
   ',existencia=existencia-' . $edcantidad . ',ultsalida=curdate(),
          usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
          where cveparte="' . $edparte . '" and idalmacen=' . $_SESSION['sesidalmacen'];
   $r = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

   //Inserta en el Kardex
   InsertaKardex($_SESSION['sesidalmacen'], $edparte, $factura,
   'S', $edcantidad, 'Salida por Facturacion de Cores', 13);

   //inserta en el log
   dmconexion::Log('Factura de Core en la Venta ' . $serie . $idventa . ' las partes: ' .
   $edcantidad . ' unidad(es) de ' . $edparte . ' - ' . replace_esp($eddescripcion) . '', 2);
}

if(isset($_POST['creartraspaso']))
{
   $sql = 'update reventas set idestatus=7,saldo=total where serie="' . $_POST['serie'] . '" and idventa=' .
   $_POST['idventa'] . ' and idrevision=' . $_POST['idrevision'];
   $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
   $sql = 'select v.idcliente,c.anticipovtas from reventas v left join clientes c on v.idcliente = c.idcliente
          where v.serie="' . $_POST['serie'] . '" and v.idventa=' .
   $_POST['idventa'] . ' and v.idrevision=' . $_POST['idrevision'];
   $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
   $row = mysql_fetch_array($rs);
   if($row['anticipovtas'] == '1')
      echo " var ban=1; ";
   else
      echo " var ban=0; ";

   echo "
         vcl.$('cbestatus').value = '7';
         if(ban=='1')
            alert('EL cliente debe pasar a caja a dejar anticipo.');
         else
            alert('Requisicion de traspaso realizada');
         ";
}

if(isset($_POST['preFacturarVista']))
{
   list($idpres, $idrevision) = split('-', $_POST['id']);
   $serie = substr($idpres, 0, 3);
   $idpres = substr($idpres, 3);
   //buscar la venta y sus datos
   $sql = 'select fase,idalmacen,idestatus,idpromotor,idtipopago,idcliente,piva,idmoneda,tc,atencion,idnota,total
          from reventas where serie="' . $serie . '" and idventa=' . $idpres . ' and idrevision=' . $idrevision;
   $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
   $row = mysql_fetch_array($rs);
   traertablas($serie, $idpres, $idrevision, $row['idestatus'], $row['idalmacen'], $row['tc'], $row['idmoneda']);

   echo "
      if('" . $row['fase'] . "' == 'B')
         alert('No puedes imprimir la Prefactura, Hasta que Actives!');
      else if('" . $row['fase'] . "' == 'A')
      {
         if('" . $row['idestatus'] . "' == '1')
               basicAjax('ureventas_ajax.php','prefacturar=1'+
                '&serie=" . $serie . "' +
                '&idventa=" . $idpres . "'+
                '&idrevision=" . $idrevision . "' +
                '&idalmacen=" . $row['idalmacen'] . "'+
                '&estatus=" . $row['idestatus'] . "'+
                '&idpromotor=" . $row['idpromotor'] . "' +
                '&idcliente=" . $row['idcliente'] . "' +
                '&idtipopago=" . $row['idtipopago'] . "' +
                '&piva=" . $row['piva'] . "' +
                '&idmoneda=" . $row['idmoneda'] . "' +
                '&tc=" . $row['tc'] . "' +
                '&atencion=" . $row['atencion'] . "' +
                '&idnota=" . $row['idnota'] . "' +
                '&total=" . $row['total'] . "' +
                '&credito=" . $credito . " ' +
                '&vista=" . $_POST['vista'] . "');

         if('" . $row['idestatus'] . "' == '2')
            basicAjax('ureventas_ajax.php','prefacturarImp=1'+
                   '&serie=" . $serie . "'+
                   '&idventa=" . $idpres . "'+
                   '&idrevision=" . $idrevision . "');

         if('" . $row['idestatus'] . "' == '3' || '" . $row['idestatus'] . "' == '7')
           basicAjax('ureventas_ajax.php','requisicionImp=1'+
                     '&serie=" . $serie . "'+
                     '&idventa=" . $idpres . "'+
                     '&idrevision=" . $idrevision . "');

         if('" . $row['idestatus'] . "' == '4')
            alert('Este pedido esta cancelado');

         if('" . $row['idestatus'] . "' == '5')
            basicAjax('ureventas_ajax.php','prefacturarSurtido=1'+
                      '&vista=1'+
                      '&idalmacen=" . $row['idalmacen'] . "'+
                      '&serie=" . $serie . "'+
                      '&idventa=" . $idpres . "'+
                      '&idrevision=" . $idrevision . "');

         if('" . $row['idestatus'] . "' == '6')
            alert('La venta ya a sido facturada');
      }
      else
         alert('No puedes imprimir la prefactura, Ya esta revisado!');
   ";
}

function traertablas($serie, $idventa, $idrevision, $idestatus, $idalmacen, $tc, $idmoneda)
{
   $i = 0;
   $tabla = array();
   $tablacores = array();
   //si es presupuesto
   if($idestatus == '1')
      $sql = 'select r.cveparte,u.nombre as unidades,r.idsupercision, r.descripcion,
             v.cantidad,v.costo,v.precio, v.idcontador, l.lineacore as core, 0 as ne
         from reventasdet v left join repartes r on r.cveparte=v.cveparte
             left join repartesmov re on re.cveparte=r.cveparte
             left join reunidadesmedida u on u.idunidad=r.idunidadmedida
             left join relineas l on l.idlinea=r.idlinea
          where idventa=' . $idventa . ' and serie = "' . $serie . '"
             and idrevision=' . $idrevision . ' group by cveparte
             union  select cveparte,unidades,0, descripcion, cantidad,0, precio, idcontador,0,1
             from reventasdetne where idventa=' . $idventa .
      ' and serie = "' . $serie . '" and idrevision = ' . $idrevision;
   else
      $sql = 'select r.cveparte,u.nombre as unidades,r.idsupercision, r.descripcion,
             v.cantidad,v.costo,v.precio, v.idcontador, l.lineacore as core, 0 as ne
         from reventasdet v left join repartes r on r.cveparte=v.cveparte
             left join repartesmov re on re.cveparte=r.cveparte
             left join reunidadesmedida u on u.idunidad=r.idunidadmedida
             left join relineas l on l.idlinea=r.idlinea
          where idventa=' . $idventa . ' and serie = "' . $serie . '"
             and idrevision=' . $idrevision . ' and idalmacen = ' . $idalmacen .
      ' union  select cveparte,unidades,0, descripcion, cantidad,0, precio, idcontador,0,1
             from reventasdetne where idventa=' . $idventa .
      ' and serie = "' . $serie . '" and idrevision = ' . $idrevision;
   $result = mysql_query($sql)or die('Error de consulta SQL ' . $sql);
   while($row = mysql_fetch_array($result))
   {
      if($row['core'] == '0')
      {
         $tabla[$i] = array('cveparte' => $row['cveparte'],
                            'idsupercision' => $row['idsupercision'],
                            'unidades' => $row['unidades'],
                            'descripcion' => $row['descripcion'],
                            'cantidad' => $row['cantidad'],
                            'idmoneda' => $idmoneda,
                            'costo' => round($row['costo'], 2),
                            'precio' => round($row['precio'], 2),
                            'importe' => round($row['precio'] * $row['cantidad'], 2),
                            'core' => $row['core'],
                            'ne' => $row['ne']
                            );
         $i++;
      }
      //si tiene core
      if($row['core'] == '1')
      {
         $sql = 'select cveparte,cvecore from repartescores where cvecore="' . $row['cveparte'] . '"';
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         if(mysql_num_rows($rs) > 0)
         {
            $core = mysql_fetch_array($rs);
            //combobox de moneda en pesos
            if($idmoneda == 1)
               $precio = 'round(if(pm.idmoneda=1,pm.' . GetConfiguraciones('preciodefault') .
               ',pm.' . GetConfiguraciones('preciodefault') . '*' . $tc . '),2) as precio';
            //combobox de moneda en dlls
            else
               $precio = 'round(if(pm.idmoneda=2,pm.' . GetConfiguraciones('preciodefault') .
               ',pm.' . GetConfiguraciones('preciodefault') . '/' . $tc . '),2) as precio';

            $sql = 'select pm.cveparte,p.idsupercision,p.descripcion,costo,' . $precio .
            ' from repartesmov pm left join repartes p on p.cveparte=pm.cveparte
                   where pm.cveparte="' . $core['cvecore'] . '" and pm.idalmacen=' . $idalmacen;
            $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
            if(mysql_num_rows($rs) > 0)
            {
               $r = mysql_fetch_array($rs);
               $tablacores[count($tablacores)] = array('cveparte' => $core['cveparte'],
                                                       'cvecore' => $row['cveparte'],
                                                       'idsupercision' => $row['idsupercision'],
                                                       'unidades' => $row['unidades'],
                                                       'descripcion' => $row['descripcion'],
                                                       'cantidad' => $row['cantidad'],
                                                       'idmoneda' => $idmoneda,
                                                       'costo' => round($r['costo'], 2),
                                                       'precio' => round($r['precio'], 2),
                                                       'importe' => round($r['precio'] * $row['cantidad'], 2),
                                                       'estatus' => 'A'
                                                       );
            }
         }
      }
   }
   /*//eliminar las partes cores de $tabla
   for($i=0;$i<=count($tabla)-1;$i++)
   for($x=0;$x<=count($tablacores)-1;$x++)
   if($tabla[$i]['cveparte']==$tablacores[$x]['cvecore'])
   {
   //si se agrego a la tabla cores la quito de la tabla detalle
   unset($tabla[$i]);
   $tabla= array_values($tabla);
   }    */
   $_SESSION['tablaventas'] = array();
   $_SESSION['tablaventas'] = $tabla;
   $_SESSION['tablacores'] = array();
   $_SESSION['tablacores'] = $tablacores;
   $_SESSION['tablasinex'] = array();
}

if(isset($_POST['prefacturarSurtido']))
{
   if(EnInventario($_POST['idalmacen']) == true)
   {
      echo "alert('ATENCION!!!.. Se esta haciendo el inventario, No podras hacer movimientos hasta nuevo aviso!');";
      exit;
   }
   //asignar numero de pedido
   //folio para el pedido
   $sql = "select clave, folio+1 as folio from folios where idtipo = 1 and idplaza = " . $_SESSION['sesidplaza'];
   $r = mysql_query($sql)or die("Error de SQL: " . $sql . " " . mysql_error());
   $row = mysql_fetch_row($r);
   $serie = $row[0];
   $idpedido = $row[1];
   $sql = 'update reventas set idestatus=2 ,idpedido="' . $serie . $idpedido . '" where serie="' . $_POST['serie'] .
          '" and idventa=' . $_POST['idventa'] . ' and idrevision=' . $_POST['idrevision'];
   $rs = mysql_query($sql)or die("Error de SQL: " . $sql . " " . mysql_error());
   $sql = 'update folios set folio=folio+1 where idtipo = 1 and idplaza = ' . $_SESSION['sesidplaza'];
   $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
   buscarpagosrealizados($_POST['serie'], $_POST['idventa'], $_POST['idrevision'], $serie . $idpedido);
   if($_POST['vista'] == '0')
   {
      echo " vcl.$('cbestatus').value='2';
             vcl.$('edpedido').value= '" . $serie . $idpedido . "'; ";
   }
   else
      echo "  window.location='ureventasvista.php'; ";
   //imprimir la prefactura
   echo " window.open(\"http://" . $_SESSION['ServidorJasper'] .
   "/ibc.jsp?reporte=prefactura&tiporeporte=pdf&idventa=" .
   $_POST['idventa'] . "&idrevision=" . $_POST['idrevision'] . "&serie=" .
   $_POST['serie'] . "&mod=ref \", \"_blank\" );
        ";
}

if(isset($_POST['FacturarVista']))
{
   list($idpres, $idrevision) = split('-', $_POST['id']);
   $serie = substr($idpres, 0, 3);
   $idpres = substr($idpres, 3);
   $sql = 'select idestatus,idpromotor,idcliente,idtipopago,piva,tc,idmoneda,idnota,atencion ' .
   ' from reventas where serie="' . $serie . '" and idventa=' . $idpres .
   ' and idrevision=' . $idrevision;
   $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
   $rowx = mysql_fetch_array($rs);
   //si viene desde la vista buscar si las partes traen core
   traertablas($serie, $idpres, $idrevision, $rowx['idestatus'], $_SESSION['sesidalmacen'], $rowx['tc'], $rowx['idmoneda']);
   $core = 0;
   if(count($_SESSION['tablacores']) > 0)
      $core = 1;

   echo "if(" . $core . "=='1')
            if(confirm('Esta Venta tiene CORE(S), deseas separarlo(s) en otra Factura?'))
               separarcores='1';
            else
               separarcores='0';
         else
            separarcores='0';
         var ban = facturar('16','" . $rowx['idcliente'] . "','" . $rowx['idtipopago'] . "');
         if(ban=='1')
         {
            alert('Envio de la factura');
            basicAjax('ureventas_ajax.php','Facturar=1'+
                '&serie=" . $serie . "' +
                '&idalmacen=" . $_SESSION['sesidalmacen'] . "' +
                '&idventa=" . $idpres . "'+
                '&idrevision=" . $idrevision . "' +
                '&estatus=" . $rowx['idestatus'] . "'+
                '&idpromotor=" . $rowx['idpromotor'] . "' +
                '&idcliente=" . $rowx['idcliente'] . "' +
                '&idtipopago=" . $rowx['idtipopago'] . "' +
                '&piva=" . $rowx['piva'] . "' +
                '&tc=" . $rowx['tc'] . "' +
                '&idmoneda=" . $rowx['idmoneda'] . "' +
                '&idnota=" . $rowx['idnota'] . "' +
                '&atencion=" . $rowx['atencion'] . "' +
                '&vista=1&separarcores='+separarcores);
         }
         else
         {
            alert('Cancelo la impresion de la Factura!!');
            window.location = 'ureventasvista.php';
         }";
}

if(isset($_GET['FacturarVistaCaja']))
{
   $sql = 'select serie,idventa,idrevision,idestatus,idpromotor,idcliente,idtipopago,
           piva,tc,idmoneda,idnota,atencion ' .
   ' from reventas where idpedido="' . $_GET['id'] . '"';
   $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
   $rowx = mysql_fetch_array($rs);
   //si viene desde la vista buscar si las partes traen core
   traertablas($rowx['serie'], $rowx['idventa'], $rowx['idrevision'], $rowx['idestatus'], $_SESSION['sesidalmacen'], $rowx['tc'], $rowx['idmoneda']);
   $core = 0;
   if(count($_SESSION['tablacores']) > 0)
      $core = 1;

   echo '<script type="text/javascript" src="funciones.js"></script>
         <script language="javascript" type="text/javascript">
           if(' . $core . '=="1")
             if(confirm("Esta Venta tiene CORE(S), deseas separarlo(s) en otra Factura?"))
               separarcores="1";
             else
               separarcores="0";
           else
             separarcores="0";
           var ban = facturar("16","' . $rowx['idcliente'] . '","' . $rowx['idtipopago'] . '");
           if(ban=="1")
           {
               alert("Envio de la factura");
               window.location="ureventas_ajax.php?FacturarCaja=1&serie=' . $rowx['serie'] . ' "+
                "&idalmacen=' . $_SESSION['sesidalmacen'] . '" +
                "&idventa=' . $rowx['idventa'] . '"+
                "&idrevision=' . $rowx['idrevision'] . '" +
                "&estatus=' . $rowx['idestatus'] . '"+
                "&idpromotor=' . $rowx['idpromotor'] . '" +
                "&idcliente=' . $rowx['idcliente'] . '" +
                "&idtipopago=' . $rowx['idtipopago'] . '" +
                "&piva=' . $rowx['piva'] . '" +
                "&tc=' . $rowx['tc'] . '" +
                "&idmoneda=' . $rowx['idmoneda'] . '" +
                "&idnota=' . $rowx['idnota'] . '" +
                "&atencion=' . $rowx['atencion'] . '" +
                "&vista=2&separarcores="+separarcores;
           }
           else
           {
               alert("Cancelo la impresion de la Factura!!");
               window.location = "ucccajavistapendientes.php";
           }
         </script>';
}

if(isset($_GET['FacturarCaja']))
{
   if(EnInventario($_GET['idalmacen']) == true)
   {
      echo '<script language="javascript" type="text/javascript">
            alert("ATENCION!!!.. Se esta haciendo el inventario, No podras hacer movimientos hasta nuevo aviso!");
            </script>';
      exit;
   }
   facturar($_GET['serie'], $_GET['idventa'], $_GET['idrevision'],
   $_GET['separarcores'], $_GET['idalmacen'], $_GET['idmoneda'],
   $_GET['piva'], $_GET['tc'], $_GET['idpromotor'], $_GET['idcliente'],
   $_GET['idtipopago'], $_GET['atencion'], $_GET['idnota'], $_GET['vista'], $_GET['estatus']);
}

if(isset($_POST['Facturar']))
{
   if($_POST['estatus'] == 2)//pedido o surtido
   {
      if(EnInventario($_POST['idalmacen']) == true)
      {
         echo "alert('ATENCION!!!.. Se esta haciendo el inventario, No podras hacer movimientos hasta nuevo aviso!');";
         exit;
      }
      facturar($_POST['serie'], $_POST['idventa'], $_POST['idrevision'],
      $_POST['separarcores'], $_POST['idalmacen'], $_POST['idmoneda'],
      $_POST['piva'], $_POST['tc'], $_POST['idpromotor'], $_POST['idcliente'],
      $_POST['idtipopago'], $_POST['atencion'], $_POST['idnota'], $_POST['vista'], $_POST['estatus']);
   }
   else
   {
      $sql = 'select nombre from reventasestatus where idestatus=' . $_POST['estatus'];
      $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
      $row = mysql_fetch_array($rs);
      echo "alert('No puedes facturar este Pedido, tiene un estatus de: " . $row['nombre'] . "'); ";
   }
}

function facturar($pserie, $pidventa, $pidrevision, $separacores, $idalmacen,
$moneda, $piva, $tc, $idpromotor, $idcliente, $idtipopago, $atencion, $idnota, $vista, $estatus)
{
   if(Derechos('REVTAFAC'))
   {
      //checar que tenga datos de facturacion
      $sql = 'select count(*) as datos from clientesfact cf left join clientes c on c.idfact=cf.idfact
             where idcliente=' . $idcliente;
      $rs = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
      $row = mysql_fetch_array($rs);
      if($row['datos'] == '0')
      {
         if($vista != '2')
            echo "alert('El cliente no tiene capturados los datos de facturacion!!'); ";
         else
            echo '<script language="javascript" type="text/javascript">
                  alert("El cliente no tiene capturados los datos de facturacion!!");
                  window.location="ucccajavistapendientes.php";
                  </script>';
         return false;
      }


      //checar que la factura no exista
      $factura = $_SESSION['fac_serie'] . $_SESSION['fac_folio'];
      $fechavence = $_SESSION['fac_fechavence'];
      $sql = 'select idfactura from facturas where idfactura="' . $factura . '"';
      $rs = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
      if(mysql_num_rows($rs) > 0)
      {
         if($vista != '2')
            echo "alert('La factura ya existe favor de revisar su consecutivo'); ";
         else
            echo '<script language="javascript" type="text/javascript">
                  alert("La factura ya existe favor de revisar su consecutivo");
                   window.location="ucccajavistapendientes.php";
                  </script>';
         return false;
      }

      //credito
      $sqlcre = 'select if(saldodisp>=totalmn,1,0) as credito,idtipopago
      from reventas v left join clientes c on c.idcliente=v.idcliente
      where serie="' . $pserie . '" and idventa=' . $pidventa . ' and idrevision=' . $pidrevision;
      $rscre = mysql_query($sqlcre)or die("Error de Consulta SQL: " . $sqlcre . ' ' . mysql_error());
      $rowcre = mysql_fetch_array($rscre);
      if($rowcre['credito'] == '0'and $rowcre['idtipopago'] == '2')
      {
         if($vista != '2')
            echo "alert('El credito disponible  del cliente es menor al total del pedido'); ";
         else
            echo '<script language="javascript" type="text/javascript">
                  alert("El credito disponible  del cliente es menor al total del pedido");
                   window.location="ucccajavistapendientes.php";
                  </script>';
         return false;
      }

      //traer el detalle de las tablas
      $tabla = $_SESSION['tablaventas'];
      $tablacores = $_SESSION['tablacores'];
      $t = count($tabla);
      $c = count($tablacores);
      //si la factura se va a separar
      if($separacores == '1')//if($c > 0)
      {
         //eliminar las parter core del detalle de la venta
         for($i = 0; $i <= $c - 1; $i++)
         {
            $sql = 'delete from reventasdet
                    where serie="' . $pserie . '" and idventa=' . $pidventa .
            ' and idrevision=' . $pidrevision . ' and cveparte="' . $tablacores[$i]['cvecore'] . '" ';
            $r = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         }
         $subtotal = 0;
         $costo = 0;
         for($i = 0; $i <= $c - 1; $i++)
         {
            $costo = $subtotal + $_SESSION['tablacores'][$i]['costo'];
            $subtotal = $subtotal + $_SESSION['tablacores'][$i]['importe'];
         }
         $iva = round($subtotal * (($piva) / 100), 2);
         $total = round($subtotal + $iva, 2);
         if($moneda == 1)
            $totmn = $total;
         else
            $totmn = round($total * $tc, 2);

         //folio venta NUEVA
         $rsm = "select clave, folio+1 as folio from
                 folios where idtipo = 15 and idplaza = " . $_SESSION['sesidplaza'];
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
         $row = mysql_fetch_row($r);
         $serie = $row[0];
         $idventa = $row[1];
         $idrevision = '0';
         $facturacr = $_SESSION['fac_serie'] . (intval($_SESSION['fac_folio']) + 1);
         //traer el folio del pedido
         $rsm = "select clave, folio+1 as folio from
                 folios where idtipo = 1 and idplaza = " . $_SESSION['sesidplaza'];
         $r = mysql_query($rsm)or die("Error SQL: " . $rsm . " " . mysql_error());
         $row = mysql_fetch_array($r);
         $pedido = $row['clave'] . $row['folio'];
         //inserta la venta del core
         $sql = 'insert into reventas (serie,idventa,idrevision,idpedido,idalmacen,idpromotor,
                 idcliente,idestatus,idmoneda,idtipopago,fechacreacion,fechafactura,piva,tc,costo,importe,
                 descuento,subtotal,iva,total,totalmn,fase,atencion,idnota,observaciones,usuario,fecha,hora)
                 values ("' . $serie . '",' . $idventa . ',' . $idrevision . ',"' . $pedido . '",' .
         $_SESSION['sesidalmacen'] . ',' . $idpromotor . ',' . $idcliente .
         ',6,' . $moneda . ',' . $idtipopago . ',curdate(),curdate(),' . $piva . ',' . $tc . ',' .
         $costo . ',' . $subtotal . ',0,' . $subtotal . ',' . $iva . ',' . $total . ',' . $totmn .
         ',"A"' . ',"' . $atencion . '","' . $idnota . '","Factura de Cores de la Venta ' .
         $serie . $idventa . '-' . $idrevision . '","' . $_SESSION['login'] . '",curdate(),curtime())';
         $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
         $idventa = mysql_insert_id();
         //detalle del core
         for($i = 0; $i <= $c - 1; $i++)
            BDAgregarCore($i, $serie, $idventa, $idrevision, $facturacr);

         //para que actualize e inserte en facturas y repartesinventario
         $sql = 'update reventas set idfactura="' . $facturacr . '", usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
                 where idventa=' . $idventa . ' and serie="' . $serie . '" and idrevision=' . $idrevision;
         $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
         $sql = 'update facturas set fechavencimiento="' . $fechavence . '" where idfactura="' . $facturacr . '"';
         $update = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());

         //imprimir la factura del core
         if($vista != '2')
         {
            echo " alert('Genero una factura por core, Con folio: " . $facturacr . "'); ";
            echo " window.open(\"http://" . $_SESSION['ServidorJasper'] .
            "/ibc.jsp?reporte=factura&tiporeporte=pdf&idventa=" . $idventa .
            "&idrevision=" . $idrevision . "&serie=" . $serie . "&mod=ref \", \"_blank\" ); ";
         }
         else
            echo '<script language="javascript" type="text/javascript">
                     alert("Genero una nueva factura por venta de core, Con folio: ' . $facturacr . '");
                     window.open("http://' . $_SESSION['ServidorJasper'] .
            '/ibc.jsp?reporte=factura&tiporeporte=pdf&idventa=' . $idventa .
            '&idrevision=' . $idrevision . '&serie=' . $serie . '&mod=ref", "_blank" );
                     </script>';
         actualizartotales($pserie, $pidventa, $pidrevision, 0);
      }
      else
         actualizartotales($pserie, $pidventa, $pidrevision, 1);
      //Cambiar el estatus de la venta a FACTURADO
      $sql = 'update reventas set idfactura="' . $factura . '",idestatus = 6, fechafactura=curdate(),
              usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
              where serie="' . $pserie . '" and idventa=' . $pidventa . ' and idrevision=' . $pidrevision;
      $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
      $sql = 'update facturas set fechavencimiento="' . $fechavence . '" where idfactura="' . $factura . '"';
      $update = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
      //si se separo la factura por core
      //hacer el ligue entre factura y factura por core
      if($_POST['separarcores'] == '1')
      {
         $sql = 'insert into facturascores(idfactura,idfacturacore) values("' .
         $factura . '","' . $facturacr . '")';
         $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
      }

      //imprimir la factura Normal
      if($vista != '2')
         echo " window.open(\"http://" . $_SESSION['ServidorJasper'] .
         "/ibc.jsp?reporte=factura&tiporeporte=pdf&idventa=" .
         $pidventa . "&idrevision=" . $pidrevision . "&serie=" .
         $pserie . "&mod=ref \", \"_blank\" );
            ";
      else
         echo '<script language="javascript" type="text/javascript">
              window.open("http://' . $_SESSION['ServidorJasper'] .
         '/ibc.jsp?reporte=factura&tiporeporte=pdf&idventa=' .
         $pidventa . '&idrevision=' . $pidrevision . '&serie=' .
         $pserie . '&mod=ref ", "_blank" );
               </script>';
      //descontar de inventario las partes
      for($i = 0; $i <= $t - 1; $i++)
      {
         $sql = 'update repartesmov set apartados= apartados-' . $tabla[$i]['cantidad'] .
         ',existencia=existencia-' . $tabla[$i]['cantidad'] . ',ultsalida=curdate(),
                usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
                where cveparte="' . $tabla[$i]['cveparte'] . '" and idalmacen=' . $idalmacen;
         $r = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . " " . mysql_error());
         if($separacores == '0')
         {
            for($x = 0; $x <= $c - 1; $x++)
            {
               if($tabla[$i]['cveparte'] == $tablacores[$x]['cveparte'])
               {
                  $sql = 'update repartesmov set apartados= apartados-' . $tablacores[$x]['cantidad'] .
                  ',existencia=existencia-' . $tablacores[$x]['cantidad'] . ',ultsalida=curdate(),
                         usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
                         where cveparte="' . $tablacores[$x]['cvecore'] . '" and idalmacen=' . $idalmacen;
                  $r = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . " " . mysql_error());
               }
            }
         }
         //Inserta en el Kardex
         InsertaKardex($idalmacen, $tabla[$i]['cveparte'], $factura,
         'S', $tabla[$i]['cantidad'], 'Salida por Facturacion', 13);
      }
      //esto es para aquellas ventas que tenian anticipo por una requisicion
      //borrar el pago e insertar uno nuevo con el folio de la factura
      buscarpagosrealizados($pserie, $pidventa, $pidrevision, $factura);
      GenerarArchivoFactura($factura, $facturacr);

      //depende de donde venga la vista, si es 0 es de la pantalla de ventas,
      //si es 1 de la vistaventas y 2 de caja
      if($vista == '0')
         echo "vcl.$('cbestatus').value='6';
               vcl.$('edfactura').value='" . $factura . "'; ";
      else if($vista == '1')
         echo "window.location='ureventasvista.php';";
      else
         echo '<script language="javascript" type="text/javascript">
                 window.location="ucccajavistapendientes.php";
                 </script>';
   }
   else
   {
      if($vista != '2')
         echo "alert('No tienes derechos para facturar'); ";
      else
         echo '<script language="javascript" type="text/javascript">
               alert(\'No tienes derechos para facturar\');
               window.location="ucccajavistapendientes.php";
               </script>';
   }
}

function buscarpagosrealizados($serie, $idventa, $idrevision, $nuefactura)
{
   //si la venta era requisicion y tenia un anticipo
   $sql = 'select rk.serie, idrequisicion, pc.iddocumento as requi,r.total
         from rerequisiciones rk left join reventas r on CONCAT(r.serie,r.idventa,"-",r.idrevision)=rk.iddocumento
         left join ccpagosclientes pc on pc.iddocumento=concat(rk.serie,rk.idrequisicion)
         where r.serie="' . $serie . '" and r.idventa=' . $idventa . ' and idrevision=' . $idrevision;
   $rs = mysql_query($sql)or die($sql);
   if(mysql_num_rows($rs) > 0)
   {
      $row = mysql_fetch_array($rs);
      //insertar el pago con el cambio de factura
      $s = 'select idcliente, idalmacen,concat(rc.serie,rc.idrecibo) as recibo,cargo,abono,saldo,
            movimiento,idtipocobro,idformapago,idbanco,idmoneda,tc,fechacreacion,nota
            from ccpagosclientes pc left join ccrecibosdet rc on pc.idcontador=rc.idpago
            where iddocumento="' . $row['requi'] . '"';
      $r = mysql_query($s)or die("Error de Consulta SQL: " . $s . ' ' . mysql_error());
      if(mysql_num_rows($r) > 0)
      {
         $rw = mysql_fetch_array($r);
         $saldo = round($row['total'] - $rw['abono'], 2);
         $sql = 'insert into ccpagosclientes(idcliente, iddocumento,tipo,idalmacen,cargo,abono,saldo,movimiento,
                idtipocobro,idformapago,idbanco,idmoneda,tc,fechacreacion,nota,usuario, fecha,hora ) values (' .
                $rw['idcliente'] . ',"' . $nuefactura . '","F",' . $rw['idalmacen'] . ',"' . $rw['cargo'] . '","' . $rw['abono'] . '","' .
                $saldo . '",5,' . $rw['idtipocobro'] . ',' . $rw['idformapago'] . ',' . $rw['idbanco'] . ',' .
                $rw['idmoneda'] . ',"' . $rw['tc'] . '",curdate(),"Asignacion del Recibo ' . $rw['recibo'] . '","' .
                $_SESSION['login'] . '",curdate(),curtime())';
         $rs = mysql_query($sql)or die($sql);
      }
   }

}

if(isset($_POST['llenartabla']))
{
   $tabla = $_SESSION['tablabackorder'];
   $t = count($tabla);

   $tabla[$t] = array('cveparte' => $_POST['cveparte'],
                      'idsupercision' => $_POST['idsupercision'],
                      'unidades' => $_POST['unidades'],
                      'descripcion' => $_POST['descripcion'],
                      'cantidad' => $_POST['cantidad'],
                      'costo' => $_POST['costo'],
                      'precio' => $_POST['precio'],
                      'idmoneda' => $_POST['idmoneda']);
   $_SESSION['tablabackorder'] = $tabla;
}

function posicionarventanueva($serie, $idventa, $idrevision)
{
   $sql = 'select fase,observaciones,idestatus from reventas where serie="' . $serie . '" and idventa=' . $idventa . ' and idrevision=' . $idrevision;
   $rs = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
   $row = mysql_fetch_array($rs);
   echo "
         vcl.$('edserie').value= '" . $serie . "';
         vcl.$('edidventa').value= '" . $idventa . "';
         vcl.$('edrevision').value= '" . $idrevision . "';
         vcl.$('cbestatus').value= '" . $row['idestatus'] . "';
         vcl.$('mobservaciones').value = '" . $row['observaciones'] . "';
         vcl.$('hffase').value = '" . $row['fase'] . "';
         ";
}

if(isset($_POST['ventacaida']))
{
   $tabla = $_SESSION['partes'];
   $tablacores = $_SESSION['tablacores'];
   $t = count($tabla);
   $tc = count($tabla);
   $ban = true;
   for($i = 0; $i <= $t - 1; $i++)
   {
      $sql = 'Select disponibles from repartesmov where cveparte = "' . $tabla[$i]['cveparte'] . '" and idalmacen=' . $_SESSION['sesidalmacen'];
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);

      if($row['disponibles'] == '0')
         $tipo = '1';
      else
         $tipo = '2';

      //checar que la parte no este registrada con el mismo folio de venta
      $sql = 'select cveparte from revtacaidas where iddocumento="' .
      $_POST['serie'] . $_POST['idventa'] . '"';//'-' . $_POST['idrevision'] . '"';
      $rs = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
      if(mysql_num_rows($rs) > 0)
      {
         $row = mysql_fetch_array($rs);
         if($row['cveparte'] == $tabla[$i]['cveparte'])
            $ban = false;
      }
      if($ban == true)
      {
         $sql = 'insert into revtacaidas(idvendedor,idcliente,idalmacen,idmoneda,iddocumento,cveparte,idsupercision,
             idmotivo,procedencia,cantidad,precio,costo,fechacreacion,usuario,fecha,hora) values (' .
         $_POST['idpromotor'] . ',' . $_POST['idcliente'] . ',' . $_SESSION['sesidalmacen'] .
         ',' . $_POST['idmoneda'] . ',"' . $_POST['serie'] . $_POST['idventa'] . '-' . $_POST['idrevision'] . '","' .
         $tabla[$i]['cveparte'] . '",' . $tabla[$i]['idsupercision'] . ',' . $tipo . ',"R",' .
         $tabla[$i]['cantidad'] . ',' . str_replace(",", "", $tabla[$i]['precio']) . ',' .
         str_replace(",", "", $tabla[$i]['costo']) . ',curdate(),"' . $_SESSION['login'] . '",curdate(),curtime())';
         $rs = mysql_query($sql)or die("Error SQL: " . $sql . " " . mysql_error());
         //checar si tiene core
         for($x = 0; $x <= $tc - 1; $x++)
            if($tablacores[$x]['cveparte'] == $tabla[$i]['cveparte'])
            {
               $sql = 'insert into revtacaidas(idvendedor,idcliente,idalmacen,idmoneda,iddocumento,cveparte,idsupercision,
                   idmotivo,procedencia,cantidad,precio,costo,fechacreacion,usuario,fecha,hora) values (' .
               $_POST['idpromotor'] . ',' . $_POST['idcliente'] . ',' . $_SESSION['sesidalmacen'] .
               ',' . $tablacores[$x]['idmoneda'] . ',"' . $_POST['serie'] . $_POST['idventa'] . '-' . $_POST['idrevision'] . '","' . $tablacores[$x]['cvecore'] . '",' .
               $tablacores[$x]['idsupercision'] . ',' . $tipo . ',"R",' . $tabla[$i]['cantidad'] . ',' .
               str_replace(",", "", $tablacores[$x]['precio']) . ',' . str_replace(",", "", $tablacores[$x]['costo']) .
               ',curdate(),"' . $_SESSION['login'] . '",curdate(),curtime())';
               $rs = mysql_query($sql)or die("Error SQL: " . $sql . " " . mysql_error());
            }
         echo "alert('Se genero Venta Caida');";
      }
   }
}

if(isset($_POST['cbtipopagochange']))
{
   if($_POST['tipopago'] == '1')//contado
   {
      $sql = 'SELECT vcontado FROM tiposcambio where idcontador=(select max(idcontador) from tiposcambio)';
      $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
      $row = mysql_fetch_array($rs);
   }
   if($_POST['tipopago'] == '2')//credito
   {
      $sql = 'SELECT vcredito FROM tiposcambio where idcontador=(select max(idcontador) from tiposcambio)';
      $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);
   }

   echo " vcl.$('edtc').value='" . $row[0] . "'; ";

       ####################   Limite de Credito #######################################
       if($_POST['idcliente'] != '')
     {
      $sql = 'select limitecredito from retipopagos where idtipopago=' . $_POST['pago'];
      $rs = mysql_query($sql)or die('Error de SQL: ' . $sql);
      $row = mysql_fetch_array($rs);
      if($row['limitecredito'] == 1)
      {
        $saldodisp = consultarcredito($idcliente, 2);
        echo "vcl.$('hfcredito').value='" . $saldodisp . "';";
   }
  // else
  //    echo "alert('Este cliente no se encuentra registrado!'); ";
      }
}

if(isset($_POST['cancelar']))
{
   $ban = false;
   //viene de backorder?
   $sql = 'SELECT v.idventa,v.idestatus,e.nombre FROM reventas v
             left join reventasestatus e on v.idestatus = e.idestatus
             where serie="' . $_POST['serie'] . '"  and idventa="' . $_POST['idventa'] . '"  and idrevision=' . $_POST['idrevision'];
   $r = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
   if(mysql_num_rows($r) > 0)
   {
      $row = mysql_fetch_array($r);
      if($row['idestatus'] == '2' || $row['idestatus'] == '3')//pedido o backorder
      {
         $ban = true;
      }
      else
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No puedes cancelar ventas con estatus ' . $row['nombre'] . ' .");
               window.location="ureventasvista.php";
               </script>';
      }
   }
   if($ban == true)
   {
      //si la venta tiene backorder
      $sql = 'select o.serie, o.idorden from reordencompra o
                left join reordencompradet od on o.serie=od.serie and o.idorden=od.idorden
                where idbackorder="' . $_POST['serie'] . $_POST['idventa'] . '"  and idrevision=' . $_POST['idrevision'];
      $rs = mysql_query($sql)or die("Error SQL: " . $sql . " " . mysql_error());
      if(mysql_num_rows($rs) > 0)
      {
         $row = mysql_fetch_array($rs);
         CancelarBackOrder($row['serie'], $row['idorden']);
      }

      //Cambia de estatus
      $sql = 'Update reventas set idestatus=4 where serie="' . $_POST['serie'] . '"
                and idventa="' . $_POST['idventa'] . '"  and idrevision=' . $_POST['idrevision'];
      $r = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

      //regresa apartados
      $sql = 'Select cveparte, cantidad from reventasdet where serie="' . $_POST['serie'] . '"
                 and idventa="' . $_POST['idventa'] . '" and idrevision=' . $_POST['idrevision'];
      $rs = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
      while($row = mysql_fetch_array($rs))
      {
         $cantidad = $row['cantidad'];
         $cveparte = $row['cveparte'];
         $sql = "Update repartesmov set apartados= apartados- '" . $cantidad . "',
                usuario='" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
                where cveparte='" . $cveparte . "' and idalmacen='" . $_SESSION['sesidalmacen'] . "'";
         $r = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         //Inserta en el Kardex
         InsertaKardex($_SESSION['sesidalmacen'], $cveparte, ($_POST['serie'] . $_POST['idventa'] . $_POST['idrevision']),
         'E', $cantidad, 'Entrada a Apartados por Cancelacion de Venta ', 11);
      }
      dmconexion::Log('Cancelo la Venta ' . $_POST['serie'] . $_POST['idventa'] . $_POST['idrevision'], 3);
      echo 'window.location="ureventasvista.php";';
   }
}

function CancelarBackOrder($serie, $idorden)
{
   $ban = false;
   //tiene surtido?
   $sql = 'SELECT idestatus FROM reordencompra where serie="' . $serie . '"
                and idorden="' . $idorden . '" and idrevision=' . $_POST['idrevision'] . ' and idestatus <= 4';
   $r = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
   if(mysql_num_rows($r) > 0)
   {
      $ban = true;
   }
   else
   {
      echo 'alert("No puedes cancelar ordenes que tengan surtido.");
            window.location="ureventasvista.php";
           ';
   }
   if($ban == true)
   {
      //Cambia de estatus
      $sql = 'Update reordencompra set idestatus=3 where serie="' . $serie . '"
                and idorden="' . $idorden . '" and idrevision=' . $_POST['idrevision'];
      $r = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      //regresa elimina ordenados
      $sql = 'Select cveparte, cantidad from reordencompradet where serie="' . $serie . '"
                 and idorden="' . $idorden . '" and idrevision=' . $_POST['idrevision'];
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      while($row = mysql_fetch_array($rs))
      {
         $cantidad = $row['cantidad'];
         $cveparte = $row['cveparte'];
         $rsm = "Update repartesmov set ordenados = ordenados - '" . $cantidad . "',
                usuario='" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
                where cveparte='" . $cveparte . "' and idalmacen='" . $_SESSION['sesidalmacen'] . "'";
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
         //Inserta en el Kardex
         InsertaKardex($_SESSION['sesidalmacen'], $cveparte, ($serie . $idorden),
         'S', $cantidad, 'Salida por Cancelacion de Orden de Compra', 2);
      }
      dmconexion::Log('Cancelo la Orden de Compra ' . $serie . $idorden, 3);
   }
}

if(isset($_POST['ValidarPrecio']))
{
   $b = Validar($_POST['idcliente'], $_POST['idalmacen'], $_POST['cveparte'],
   $_POST['cbmoneda'], $_POST['tc'], $_POST['idpromotor'], $_POST['precio'],
   $_POST['preciodefault']);
}

function Validar($idcliente, $idalmacen, $cveparte, $cbmoneda, $tc, $idpromotor, $precio, $preciodefault)
{
      $ban = false;
   if($_SESSION['parametrizar'])
   {
      $sql = 'select nivel, filtro,condicion from clientesparametros where idcliente=' . $idcliente;
      $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
      while($row = mysql_fetch_array($rs))
      {   $filtro = $row['filtro'];


         $nombre = NombreMoral('pr');
         $sql = 'select p.cveparte, l.cvlinea as linea, f.nombre as familia, m.nombre as marca,
                po.nombre as origen,' . $nombre . ' as proveedor
                from repartesmov pm
                left join repartes p on pm.cveparte=p.cveparte and pm.idalmacen=' . $idalmacen .
         ' left join relineas l on l.idlinea=p.idlinea
                left join remarcas m on m.idmarca=p.idmarca
                left join refamilias f on f.idfamilia=p.idfamilia
                left join repartesorigen po on p.idorigen=po.idorigen
                left join proveedores pr on pm.idproveedor=pr.idproveedor
                where p.cveparte ="' . $cveparte . '"  having '. $filtro .'
                union
                select p.cveparte, l.cvlinea as linea, f.nombre as familia, m.nombre as marca,
                po.nombre as origen,' . $nombre . ' as proveedor
                from repartesmov pm
                left join repartes p on pm.cveparte=p.cveparte
                left join relineas l on l.idlinea=p.idlinea
                left join remarcas m on m.idmarca=p.idmarca
                left join refamilias f on f.idfamilia=p.idfamilia
                left join repartesorigen po on p.idorigen=po.idorigen
                left join proveedores pr on pm.idproveedor=pr.idproveedor
                where p.cveparte ="' . $cveparte . '"  having ' . $filtro;
         $r = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
         if(mysql_num_rows($r) > 0 && $ban == false)
         {
            $ban = true;
            $array = explode(" ", $row['condicion']);
            $valorprecio = $array[2];
         /*COMPARAMOS SI LA CONDICION CUANTA CON UN VALOR DE precio ESTO
         YA QUE ESTO CAUSA CONFLICTO EN EL QUERY SIGUIENTE, ASI QUE CON ESTE
         'IF' SE SUSTITUYE EL VALOR PRECIO DE LA ECUACION POR EL VALOR DEL PRECIO
         POR DEFAULT OPTENIDO DEL METODO GetConfiguraciones*/
          if($array [0] == 'precio')
            {
              $valorprecio = str_replace('precio',GetConfiguraciones('preciodefault'),$array[2]);
            }
              break;
         }
      }

      if($ban)
      {
         if($cbmoneda == '1')#pesos
            $sql = 'select round(if(idmoneda=1,(' . $valorprecio . '),(' . $valorprecio . ')*' . $tc . '),2) as precio
                    from repartesmov where cveparte="' . $cveparte . '" and idalmacen=' . $idalmacen . ' union
                    select round(if(idmoneda=1,(' . $valorprecio . '),(' . $valorprecio . ')*' . $tc . '),2) as precio
                    from repartesmov where cveparte="' . $cveparte . '"';
         else #dlls
            $sql = 'select round(if(idmoneda=2,(' . $valorprecio . '),(' . $valorprecio . ')/' . $tc . '),2) as precio
                   from repartesmov where cveparte="' . $cveparte . '" and idalmacen=' . $idalmacen . ' union
                   select round(if(idmoneda=2,(' . $valorprecio . '),(' . $valorprecio . ')/' . $tc . '),2) as precio
                   from repartesmov where cveparte="' . $cveparte . '"';
         $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
         $row = mysql_fetch_array($rs);
         //if($row['precio'] > $precio)
         $p = $row['precio'];
         /*else
         $p = $precio;*/

         echo " vcl.$('edprecio').value='" . $p . "';
                vcl.$('edimporte').value= formatCurrency(vcl.$('edcantidad').value * vcl.$('edprecio').value); ";
      }
   }
   if($ban == false)
   {
      $sql = 'SELECT u.idusuario,n.nivel,n.campo FROM repreciosxusuario AS u
              Inner Join repreciosniveles AS n ON u.idnivel = n.idnivel
              WHERE u.idusuario =  ' . $idpromotor;
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql . mysql_error($sql));
      if(mysql_num_rows($rs) > 0)
      {
         $precios = array();
         $i = 0;
         $campos = '';
         $ban = false;
         while($row = mysql_fetch_array($rs))
         {
            if($cbmoneda == '1')//combobox de moneda en pesos
               $campos = $campos . 'round(if(idmoneda=1,' . $row['campo'] .
               ',' . $row['campo'] . '*' . $tc . '),2) as ' . $row['campo'] . ',';
            else //combobox de moneda en dlls
               $campos = $campos . 'round(if(idmoneda=2,' . $row['campo'] .
               ',' . $row['campo'] . '/' . $tc . '),2) as ' . $row['campo'] . ',';
            $i++;
         }
         if($i == '1')
         {
            if($row['campo'] < $precio)
            {
               " alert('No puedes dar un precio menor al permitido');
                  vcl.$('edprecio').value='" . $preciodefault . "'; ";
            }
         }
         else
         {
            $sql = 'select cveparte, ' . substr($campos, 0, - 1) . ' from repartesmov where cveparte="' .
            $cveparte . '" and idalmacen =' . $idalmacen;
            $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
            if(mysql_num_rows($rs) > 0)
               $row = mysql_fetch_row($rs);
            else
            {
               $sql = 'select cveparte, ' . substr($campos, 0, - 1) . ' from repartesmov where cveparte="' .
               $cveparte . '"  limit 1';
               $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
               if(mysql_num_rows($rs) > 0)
                  $row = mysql_fetch_row($rs);
            }
            switch($i)
            {
               case 2:
                  if($precio >= $row[2])
                     $ban = true;
                  else
                     $ban = false;
                  break;

               case 3:
                  if($precio >= $row[3])
                     $ban = true;
                  else
                     $ban = false;
                  break;

               case 4:
                  if($precio >= $row[4])
                     $ban = true;
                  else
                     $ban = false;
                  break;

               case 5:
                  if($precio >= $row[5])
                     $ban = true;
                  else
                     $ban = false;
                  break;
            }
            if($ban == false)
               echo "alert('No puedes dar un precio menor al permitido');
                     vcl.$('edprecio').value='" . $preciodefault . "';
                     vcl.$('edimporte').value= formatCurrency(vcl.$('edcantidad').value * vcl.$('edprecio').value); ";
            else
               echo "vcl.$('edimporte').value= formatCurrency(vcl.$('edcantidad').value * vcl.$('edprecio').value); ";
         }
      }
      else
      {
         if($preciodefault == '')
            $preciodefault = $_SESSION['preciodefault'];

         if($precio < $preciodefault)
         {
            echo "alert('No puedes dar un precio menor al permitido');
                  vcl.$('edprecio').value='" . $preciodefault . "';
                  vcl.$('edimporte').value = round(vcl.$('edcantidad').value * vcl.$('edprecio').value,2);
                  ";
         }
         else
         {
            echo "vcl.$('edimporte').value = round(vcl.$('edcantidad').value * vcl.$('edprecio').value,2); ";
            $ban = true;
         }
      }
   }
   return $ban;
}

if(isset($_POST['traenotas']))
{
   if($_POST['estatus'] == 1)
   {
      echo " alert('Debes guardar los datos antes de agregar notas'); ";
   }
   else
   {
      $sql = 'select idnota from reventas where idventa=' . $_POST['idventa'] .
      ' and serie="' . $_POST['serie'] . '" and idrevision=' . $_POST['idrevision'];
      $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
      $row = mysql_fetch_row($rs);

      if($row[0] > 0)
         $idnota = $row[0];
      else
         $idnota = 0;

      echo " document.location.href('unotas.php?idnota=" . $idnota .
      "&procedencia=reventas&idprocedencia=" . $_POST['idventa'] .
      "&serie=" . $_POST['serie'] . "&idrevision=" . $_POST['idrevision'] . " '); ";
   }
}

if(isset($_POST['prefacturarImp']))
{
   $h = $_SERVER['SERVER_ADDR'];
   echo " window.open(\"http://" . $_SESSION['ServidorJasper'] .
   "/ibc.jsp?reporte=prefactura&tiporeporte=pdf&idventa=" .
   $_POST['idventa'] . "&idrevision=" . $_POST['idrevision'] . "&serie=" .
   $_POST['serie'] . "&mod=ref\", \"_blank\" );
           ";
}

if(isset($_POST['requisicionImp']))
{
   $sql = 'select serie,idrequisicion from rerequisiciones where iddocumento="' .
   $_POST['serie'] . $_POST['idventa'] . '-' . $_POST['idrevision'] . '"';
   $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
   $row = mysql_fetch_array($rs);
   $h = $_SERVER['SERVER_ADDR'];
   echo " window.open(\"http://" . $_SESSION['ServidorJasper'] .
   "/ibc.jsp?reporte=requisicion&tiporeporte=pdf&idrequisicion=" .
   $row['idrequisicion'] . "&serie=" . $row['serie'] . "&mod=ref\", \"_blank\" );
           ";
}

if(isset($_POST['ImpPresupuesto']))
{
   if($_POST['fase'] != 'B')
   {
      $h = $_SERVER['SERVER_ADDR'];
      echo
      "  var ban=0;
      if(confirm('Deseas EXHIBIR los Numeros de Parte?'))
           ban=1;
         window.open(\" http://" . $_SESSION['ServidorJasper'] .
      "/ibc.jsp?reporte=presupuesto&tiporeporte=pdf&idventa=" .
      $_POST['idventa'] . "&idrevision=" . $_POST['idrevision'] . "&serie=" .
      $_POST['serie'] . "&partes=\"+ban+\"&mod=ref\", \"_blank\");   ";
   }
   else
   {
      echo " alert('No puedes imprimir el presupuesto, aun no has activado'); ";
   }
}

if(isset($_POST['Eliminar']))
{
   if(Derechos('REELVTAS') == false)
      echo " alert('No tienes derechos para eliminar una venta');  ";

   else
   {
      list($idpres, $idrevision) = split('-', $_POST['id']);
      $serie = substr($idpres, 0, 3);
      $idpres = substr($idpres, 3);
      $sql = 'select idestatus from reventas where serie="' . $serie . '" and idventa=' . $idpres .
      ' and idrevision=' . $idrevision;
      $rs = mysql_query($sql)or die($sql);
      $row = mysql_fetch_array($rs);
      //si es presupuesto
      if($row['idestatus'] == '1')
      {
         //eliminar la venta
         $sql = 'delete from reventas where serie="' . $serie .
         '" and idventa=' . $idpres . ' and idrevision=' . $idrevision;
         $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
         //log
         dmconexion::Log('Elimino la Venta No. ' . $_POST['id'] . ' del Cliente: ' . $_POST['cliente'], 3);
         echo " alert('Venta eliminada');
                window.location='ureventasvista.php'; ";
      }
      else if($row['idestatus'] == '2')
      {
         if(Derechos('REELVTASPRE') == false)
            echo " alert('No tienes derechos para eliminar una prefactura'); ";

         else
         {
            //regresar de apartado a disponibe las partes
            $sql = 'select cveparte,cantidad from reventasdet where serie="' . $serie .
            '" and idventa=' . $idpres . ' and idrevision=' . $idrevision;
            $rs = mysql_query($sql)or die($sql);
            while($row = mysql_fetch_array($rs))
            {
               //desapartar la pieza
               $sql = 'update repartesmov set disponibles=disponibles+' . $row['cantidad'] .
               ', apartados= apartados-' . $row['cantidad'] .
               ',usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
                      where cveparte="' . $row['cveparte'] . '" and idalmacen=' . $_SESSION['sesidalmacen'];
               $r = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
               //insertar en el kardex
               InsertaKardex($_SESSION['sesidalmacen'], $row['cveparte'], $_POST['idpedido'], 'E',
               $row['cantidad'], 'Entrada por Cancelacion de Prefactura', 17);
            }
            $sql = 'delete from reventas where serie="' . $serie .
            '" and idventa=' . $idpres . ' and idrevision=' . $idrevision;
            $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
            dmconexion::Log('Elimino la Venta No. ' . $_POST['id'] . ' del Cliente: ' . $_POST['cliente'], 3);
            echo " alert('Venta eliminada');
                   window.location='ureventasvista.php'; ";
         }
      }
      else
         echo " alert('No se puede eliminar esta venta, porque esta en estatus de: " . $_POST['estatus'] . "'); ";
   }
}

if(isset($_POST['RegPresupuesto']))
{
   if(Derechos('REREGAPRES') == false)
   {
      echo " alert('No tienes derechos para regresar el estatus a presupuesto') ";
   }
   else
   {
      if(!isset($_POST['lotes']))
         RegPresupuesto($_POST['id'], $_POST['estatus'], $_POST['idpedido'], false);
      else
      {
         $sql = 'Select concat(serie, idventa, "-",idrevision) as id, v.idestatus,
                 e.nombre as estatus, v.idpedido
                 from reventas v
                 left join reventasestatus e on e.idestatus=v.idestatus
                 where v.idalmacen = ' . $_SESSION['sesidalmacen'] . ' and v.idestatus = 2
                 and v.fechacreacion between "' . $_POST['f1'] . '" and "' . $_POST['f2'] . '"';
         $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
         while($row = mysql_fetch_array($rs))
         {
            RegPresupuesto($row['id'], $row['estatus'], $row['idpedido'], true);
         }

         echo " alert('Termino el proceso de regresar a Presupuesto por Lotes');
                window.location='ureventasvista.php';
               ";
      }
   }
}



function RegPresupuesto($id, $estatus, $idpedido, $lotes)
{
   if($estatus == 'PEDIDO')
   {

      list($idpres, $idrevision) = split('-', $id);
      $serie = substr($idpres, 0, 3);
      $idpres = substr($idpres, 3);
      //cambiar el estatus ala venta. a Presupuesto
      $sql = 'update reventas set idestatus=1,idpedido=0, usuario="' . $_SESSION['login'] .
      '", fecha=curdate(), hora=curtime() where serie="' . $serie . '" and idventa=' . $idpres . ' and idrevision=' . $idrevision;
      $rs = mysql_query($sql)or die($sql);
      //buscar las partes para moverlas de apartado->disponible
      $sql = 'select cveparte,cantidad from reventasdet where serie="' . $serie .
      '" and idventa=' . $idpres . ' and idrevision=' . $idrevision;
      $rs = mysql_query($sql)or die($sql);
      while($row = mysql_fetch_array($rs))
      {
         //desapartar la pieza
         $sql = 'update repartesmov set disponibles=disponibles+' . $row['cantidad'] .
         ', apartados= apartados-' . $row['cantidad'] .
         ',usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
                  where cveparte="' . $row['cveparte'] . '" and idalmacen=' . $_SESSION['sesidalmacen'];
         $r = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
         //insertar en el kardex
         InsertaKardex($_SESSION['sesidalmacen'], $row['cveparte'], $idpedido, 'E',
         $row['cantidad'], 'Entrada por Cancelacion de Prefactura', 17);
      }
      if($lotes == true)
      {
         dmconexion::Log('[RegAp] Regreso el Pedido: ' . $idpedido . ' de la venta: ' . $id . ' a Presupuesto', 2);
      }
      else
      {
         dmconexion::Log('Regreso el Pedido: ' . $idpedido . ' de la venta: ' . $id . ' a Presupuesto', 2);
         echo " alert('Se a regresado a presupuesto la venta: " . $id . " ');
                window.location='ureventasvista.php';
               ";
      }

   }
   else
      echo " alert('La venta esta en estatus: " . $estatus . ", no se puede regresar de estatus'); ";
}


?>