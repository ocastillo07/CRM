<?php
include("dmconexion.php");
include("urecursos.php");
	session_start();
	if(!isset($_SESSION["login"]))
   {
   	redirect("login.php");
   }
	require_once("vcl/vcl.inc.php");
	use_unit("mysql.inc.php");


	ini_set("memory_limit","50M");
	ini_set("max_execution_time","500");

if(!isset($_GET['sincronizar']))
if(Derechos('Sincronizar Clientes') == false)
{
   echo '<script language="javascript" type="text/javascript">
      alert(\' No tienes Derechos para Sincronizar Clientes\');
      document.location.href("menu.php");
      </script>';
}
else
{
   echo '<script language="javascript" type="text/javascript">
    	   if(!confirm("Deseas sincronizar clientes?"))
           document.location.href("menu.php");
         document.location.href("usincronizarclientes.php?sincronizar=1");
         </script>
         ';
}

if(isset($_GET['sincronizar']))
{
   Sincronizar();
}

function Sincronizar()
{
	// Connect to MSSQL
   //international
	//$mslink = mssql_pconnect('192.168.100.9:1399', 'sa', 'sa');
   $mslink = mssql_pconnect(GetConfiguraciones('serverSQL'), GetConfiguraciones('userSQL'), GetConfiguraciones('passSQL'));
	if (!$mslink)
	{
		echo 'No se conecto a MSSQL';
	}
	else
	{
		//conectar con gedas
		mssql_select_db(GetConfiguraciones('bdSQL'),$mslink);
		//conexion mysql
      //international
		//$mylink = mysql_connect('localhost','root','freedom');
      $mylink = mysql_connect(GetConfiguraciones('serverMySQL'),'root','freedom');

		if(!$mylink)
		{
			echo 'No se pudo conectar a MySQL';
		}
		else
		{
			mysql_select_db('crm',$mylink);

			//################	clientes		######################################
			//vaciar la tabla clientes
			$mysql= mysql_query('delete from clientesgds') or die('Error de SQL: delete from clientesgds');

			$sql='select rtrim(clinum) as id, rtrim(clinombre) as rsocial, rtrim(clifnom) as nombre,
					rtrim(clifap) as apaterno, rtrim(clifmp) as amaterno,
					rtrim(clirfc) as rfc, rtrim(clidir) as dir, case when clicp is null then \'0\' else rtrim(clicp) end as cp,
					rtrim(clicolonia) as col, rtrim(clidelmun) as mn, rtrim(cliedo) as edo, rtrim(clipfm) as persona, rtrim(statip) as status,
					rtrim(clifecalta) as alta, rtrim(clitel1) as tel1, rtrim(clitel2) as tel2, rtrim(cliemail) as mail
					from ccclien';
			$rs = mssql_query($sql) or die('Error en la consulta SQL: '.$sql);
			while($row = mssql_fetch_array($rs))
			{
				$mysql= 'insert into clientesgds (idcliente,rsocial,nombre,
							apaterno,amaterno,rfc,direccion,cp,colonia,municipio,
							estado,persona,estatus,alta,tel1,tel2,email, usuario, fecha, hora) values ('.
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
							'","'.$row['tel2'].'",
              "'.str_replace('"','', str_replace('\'','',$row['mail'])).'",
              "'.$_SESSION['login'].'", curdate(), curtime())';
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
}
?>