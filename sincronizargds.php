<?php
	//include("mysql.inc.php");  
	require_once("vcl/vcl.inc.php");
	use_unit("mysql.inc.php");
	
	ini_set("memory_limit","50M");      
	ini_set("max_execution_time","500");

	// Connect to MSSQL
	$mslink = mssql_pconnect('10.30.8.102', 'sa', 'sa');

	if (!$mslink) 
	{
		echo 'No se conecto a MSSQL';
	}
	else
	{     
		//conectar con gedas
		mssql_select_db('gedas',$mslink);
		//conexion mysql         
		$mylink = mysql_connect('localhost','root','freedom');
		if(!$mylink)
		{
			echo 'No se pudo conectar a MySQL';
		}                                     
		else
		{  
			mysql_select_db('crm',$mylink);
         
			//#######################	partes	###################################
			//vaciar la tabla repartes mysql
			$myrs= mysql_query('Delete from repartes') or die('Error en SQL: Delete from repartes'); 
			//select repartes mssql
			$sql= ' select AlmCve as idalmacen, Pstatus as estatus, PUnidMed as unidad, PLinea as linea,
				PAtipMon as moneda, Pparte as clave, Pdescrip as descripcion, Pexis as exis, PDis as dis,
				PCosAnt as costoant, Pcosto as costo, PPromedio as prom, Ppublic as precio, Pespecial as esp, 
				Ppasillo as pas, Pubica as ubicacion, case when Puti is null then \'0\' else Puti end as utilidad, 
				Pstockmin as smin, Pstockmax as smax, 
				pfecEnt as fentrada, Pfecsal as fsalida from repartes where pparte!=\'\'';

			$rs = mssql_query($sql) or die('Error en la consulta SQL'); 
			while($row = mssql_fetch_array($rs))
			{
				$mysql='insert into repartes (idalmacen,cveparte,estatus,unidadmedida,linea,moneda,descripcion,existencia,
						disponible,costoanterior,costo,costoprom,precio,precioesp,fecultentrada,fecultsalida,
						pasillo,ubicacion,putilidad,stockmin,stockmax) values (rtrim('.$row['idalmacen'].'),rtrim(
						"'.$row['clave'].'"),rtrim("'.$row['estatus'].'"),rtrim("'.$row['unidad'].'"),rtrim("'.$row['linea'].'"),rtrim("'.
						$row['moneda'].'"),rtrim("'.str_replace('"',"",$row['descripcion']).'"),rtrim('.$row['exis'].'),
						rtrim('.$row['dis'].'),rtrim('.$row['costoant'].'),rtrim('.$row['costo'].'),rtrim('.$row['prom'].'),
						rtrim('.$row['precio'].'),rtrim('.$row['esp'].'),rtrim("'.$row['fentrada'].'"),rtrim("'.$row['fsalida'].'"),
						rtrim("'.$row['pasillo'].'"),rtrim("'.$row['ubicacion'].'"),rtrim('.$row['utilidad'].'),rtrim('.$row['smin'].'),rtrim('.$row['smax'].'))';   
				$myrs= mysql_query($mysql) or die('Error en el SQL: '.$mysql);
			}
			//################	clientes		######################################
			//vaciar la tabla clientes
			$mysql= mysql_query('delete from clientesgds') or die('Error de SQL: delete from clientesgds');
			
			$sql='select clinum as id, clinombre as rsocial, clifnom as nombre, 
					clifap as apaterno, clifmp as amaterno,
					clirfc as rfc, clidir as dir, case when clicp is null then \'0\' else clicp end as cp, 
					clicolonia as col, clidelmun as mn, cliedo as edo, clipfm as persona, statip as status,
					clifecalta as alta, clitel1 as tel1, clitel2 as tel2, cliemail as mail
					from ccclien';
			$rs = mssql_query($sql) or die('Error en la consulta SQL: '.$sql); 
			while($row = mssql_fetch_array($rs))
			{
				$mysql= 'insert into clientesgds (idcliente,rsocial,nombre,
							apaterno,amaterno,rfc,direccion,cp,colonia,municipio,
							estado,persona,estatus,alta,tel1,tel2,email) values ('.
							$row['id'].',"'.str_replace('"','', str_replace('\'','',$row['rsocial'])).'","'.
							str_replace('"','', str_replace('\'','',$row['nombre'])).
							'","'.str_replace('"','', str_replace('\'','',$row['apaterno'])).'","'.
							str_replace('"','', str_replace('\'','',$row['amaterno'])).'","'.
							str_replace('"','', str_replace('\'','',$row['rfc'])).'","'.
							str_replace('"','', str_replace('\'','',$row['dir'])).'",'.$row['cp'].',"'.
							str_replace('"','', str_replace('\'','',$row['col'])).'","'.
							str_replace('"','', str_replace('\'','',$row['mn'])).'","'.
							str_replace('"','', str_replace('\'','',$row['edo'])).'","'.
							$row['persona'].'","'.$row['estatus'].'","'.$row['alta'].'","'.$row['tel1'].
							'","'.$row['tel2'].'","'.str_replace('"','', str_replace('\'','',$row['mail'])).'")';	 
				$myrs= mysql_query($mysql) or die('Error de SQL: '.$mysql);
			}
		}   		
	}
	echo '<script language="javascript" type="text/javascript">
         alert(\'Finalizo la Sincronizacion \'); 
			document.location.href("menu.php");
       </script>';    
	mssql_close($mslink);
	mysql_close($mylink);
?>