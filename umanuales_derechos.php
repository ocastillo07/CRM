<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
require_once("vcl/vcl.inc.php");
//Includes
use_unit("mysql.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class umanuales_derechos extends Page
{
       public $cbcontenido = null;
       public $cbareas = null;
       public $Label3 = null;
       public $Label2 = null;
       public $hfidpuesto = null;
       public $sqlderechos = null;
       public $lblderechos = null;
       public $pbotones = null;
       public $lbtitulo = null;
       public $btnbloquear = null;
       public $btnliberar = null;
       public $btngcerrar = null;
       public $btnguardar = null;
       public $hfvalor = null;
       public $hfcount = null;
       public $hfestatus = null;
       public $Label1 = null;
       function cbcontenidoChange($sender, $params)
       {
		 	$this->sqlderechos->close();
			$sql= 'Select distinct m.idcontador as idmanual, m.archivo,
					if(d.idpuesto is not null, 1,0) as ch
					from manuales_archivos m
					left join manuales_derechos d on d.idmanual=m.idcontador and
					d.idpuesto ='.$this->hfidpuesto->Value;

			if($this->cbcontenido->ItemIndex<>0)
				$this->sqlderechos->SQL= $sql.' where m.idcontenido='.$this->cbcontenido->ItemIndex .'
												 order by m.idcontador';
			else
				$this->sqlderechos->SQL= $sql.' order by m.archivo';

			$this->sqlderechos->open();
			if($this->sqlderechos->RecordCount<>0)
         	$this->CreaTabla();
			else
				$this->lblderechos->Caption='';
       }

       function cbareasChange($sender, $params)
       {
       	$this->sqlderechos->close();
         $sql = 'Select distinct m.idcontador as idmanual, m.archivo,
					if(d.idpuesto is not null, 1,0) as ch
					from manuales_archivos m
					left join manuales_derechos d on d.idmanual=m.idcontador
					and d.idpuesto ='.$this->hfidpuesto->Value.'
					left join manuales_contenido mc on mc.idcontador=m.idcontenido';
		   if($this->cbareas->ItemIndex<>0)
			{
				$this->sqlderechos->SQL= $sql.' where mc.idtitulo='.$this->cbareas->ItemIndex .'
												 order by m.archivo';
		   }
			else
				$this->sqlderechos->SQL= $sql.' order by m.archivo';

			$this->sqlderechos->open();
			if($this->sqlderechos->RecordCount<>0)
         	$this->CreaTabla();
			else
				$this->lblderechos->Caption='';

			$this->cbcontenido->Clear();
			$sql='select idcontador, nombre
			from manuales_contenido';
			if($this->cbareas->ItemIndex<>0)
				$sql=$sql.' where idtitulo='.$this->cbareas->ItemIndex.' order by nombre';
			else
				$this->cbcontenido->AddItem('Todos',null,0);

			$rs= mysql_query($sql) or die('Error de SQL: '.$sql);
			while($row=mysql_fetch_array($rs))
         	$this->cbcontenido->AddItem($row['nombre'],null,$row['idcontador']);

			if($this->cbareas->ItemIndex==0)
				$this->cbcontenido->ItemIndex=0;
		 }


       function btnbloquearClick($sender, $params)
       {
       	$t = '<table width="500" border="0" cellpadding="0" cellspacing="0">';
       	$this->sqlderechos->close();
       	$this->sqlderechos->SQL = 'Select distinct m.idcontador as idmanual, m.archivo, 0 as ch
                                 from manuales_archivos m order by m.archivo';

       	$this->sqlderechos->open();
       	$this->CreaTabla();
       }

       function btnliberarClick($sender, $params)
       {
       	$this->sqlderechos->close();
       	$this->sqlderechos->SQL = 'Select distinct m.idcontador as idmanual, m.archivo, 1 as ch
                                 from manuales_archivos m order by m.archivo';

       	$this->sqlderechos->open();
       	$this->CreaTabla();
       }

       function btnguardarClick($sender, $params)
       {
       	$this->Guardar();
       	echo '<script language="javascript" type="text/javascript">
              document.location.href("umanuales_derechos.php?idpto='.$this->hfidpuesto->Value.'")
              </script>';
       }

       function uusuariosderechosCreate($sender, $params)
       {
       	if(Derechos('Accesar Derechos Manuales') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para Accesar a Esta Pantalla");
               document.location.href("upuestosvista.php");
               </script>';
         	exit;
         }
       }

       function btngcerrarClick($sender, $params)
       {
       	$this->Guardar();
       	redirect("upuestosvista.php");
       }

       function umanuales_derechosShow($sender, $params)
       {
       	$this->pbotones->Width = $_SESSION["width"];
       	$this->lbtitulo->Caption= $this->Caption;
       	if(Derechos('Accesar Derechos Manuales') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para Accesar a Esta Pantalla");
               document.location.href("upuestosvista.php");
               </script>';
         	exit;
         }
         else if(isset($_GET['idpto']))
       	{
				$this->cbareas->Clear();
		   	$this->cbareas->AddItem('Todos',null,0);
		 		$sql= 'select idcontador,nombre from manuales_titulos order by nombre';
				$rs= mysql_query($sql) or die("Error de SQL: ".$sql);
				while($row=mysql_fetch_array($rs))
					$this->cbareas->AddItem($row['nombre'],null,$row['idcontador']);
            $this->cbareas->ItemIndex=0;

				$this->cbcontenido->Clear();
				$this->cbcontenido->AddItem('Todos',null,0);
				$sql= 'select idcontador,nombre from manuales_contenido order by nombre';
				$rs= mysql_query($sql) or die("Error de SQL: ".$sql);
				while($row=mysql_fetch_array($rs))
					$this->cbcontenido->AddItem($row['nombre'],null,$row['idcontador']);
            $this->cbcontenido->ItemIndex=0;

         	$this->hfidpuesto->Value = $_GET['idpto'];
         	$this->sqlderechos->close();
         	$this->sqlderechos->SQL = 'Select distinct m.idcontador as idmanual, m.archivo,
													if(d.idpuesto is not null, 1,0) as ch
                                   		from manuales_archivos m left join manuales_derechos d on
													d.idmanual=m.idcontador
                                   		and d.idpuesto = '.$this->hfidpuesto->Value.'
													order by m.archivo';
         	$this->sqlderechos->open();
         	$this->CreaTabla();
       	}
       }


       function CreaTabla()
       {
       	$t = '<table width="600" border="0" cellpadding="0" cellspacing="0" align="center">';
       	while(!$this->sqlderechos->EOF==true)
         {
         	//$h =  $this->sqlderechos->fieldget('idmanual') % 2;
			 	$h =  $this->sqlderechos->RecNo % 2;
          	if($h == 0)
            	$c ='#FFFFFF';
          	else
            	$c='#FF9B37';
          	if($this->sqlderechos->fieldget('ch') == 1)
            	$ch = 'checked="checked"';
          	else
            	$ch='';
          	$t = $t.'<tr bgcolor="'.$c.'">
          	<td height = "20"> <span style=" font-family: Verdana; font-size: 11; "> '.
          	$this->sqlderechos->fieldget('archivo').' </span>  </td>
          	<td><span style=" font-family: Verdana; font-size: 11; ">
          	<input type="checkbox" name="chk'.$this->sqlderechos->fieldget('idmanual').'"
          	id="chk'.$this->sqlderechos->fieldget('idmanual').'"
          	value="'.$this->sqlderechos->fieldget('idmanual').'" '.$ch.'     /></span></td>
          	</tr>';
          	$this->sqlderechos->next();
         }
       	//$this->hfcount->Value =  $this->sqlderechos->fieldget('idmanual');
			$sql = 'select max(idmanual) from ('.$this->sqlderechos->SQL.' ) as t';
			$rs = mysql_query($sql) or die('Error de consulta SQL: '.$sql);
			$row = mysql_fetch_row($rs);
			$this->hfcount->Value = $row[0];
       	$t  = $t .' <tr><td></td></tr><tr><td></td></tr></table> ';
       	$this->lblderechos->Caption = $t;
       }

       function Locate()
       {
       	$this->sqlderechos->close();
       	$this->sqlderechos->SQL = 'Select idmanual from manuales_derechos where idpuesto = '.$this->hfidpuesto->Value;
       	while(!$this->sqlderechos->EOF==true)
         {
         	echo '<script language="javascript" type="text/javascript">
         		printf(document.getElementId().value);
         		</script>';
         	$this->sqlderechos->next();
         }
       }

       function Guardar()
       {
       	if(Derechos('Asignar Derechos Manuales') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
                  alert("No puede Asignar Derechos");
                  window.location="upuestosvista.php";
                  </script>';
         }
         else
         {
       		//$sql = 'Delete from manuales_derechos where idpuesto='.$this->hfidpuesto->Value;
				$sql='Delete m from manuales_derechos m inner join('.$this->sqlderechos->SQL.'
				      ) as t on t.idmanual=m.idmanual
				      where m.idpuesto='.$this->hfidpuesto->Value;
       		$result = mysql_query($sql) or die("error sql: ".$sql." ".mysql_error());
       		for($i=1;$i<=$this->hfcount->Value;$i++)
          	{
            	if($_REQUEST['chk'.$i] > 0)
            	{
            		$s = 'Insert into manuales_derechos (idpuesto, idmanual, usuario, fecha, hora) '.
                  	  'values('.$this->hfidpuesto->Value.', '.$_REQUEST['chk'.$i].',
							   "'.$_SESSION['login'].'", curdate(), curtime())';
            		$rs =mysql_query($s) or die("error sql: ".$s." ".mysql_error());
            	}
          	}
      	 	dmconexion::Log('Edito los derechos para archivos del puesto '.$this->hfidpuesto->Value, 3);
       	}
      }
}

global $application;

global $umanuales_derechos;

//Creates the form
$umanuales_derechos=new umanuales_derechos($application);

//Read from resource file
$umanuales_derechos->loadResource(__FILE__);

//Shows the form
$umanuales_derechos->show();

?>