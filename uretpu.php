<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");


require_once("vcl/vcl.inc.php");
//Includes
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

ini_set("memory_limit", "50M");
ini_set("max_execution_time", "500");

$mslink = mssql_pconnect(GetConfiguraciones('serverSQL'), GetConfiguraciones('userSQL'), GetConfiguraciones('passSQL'));
if(!$mslink)
{
   echo 'No se conecto a MSSQL';
}
else
{
   //conectar con gedas
   mssql_select_db(GetConfiguraciones('bdSQL'), $mslink);
}


//Class definition
class ureptpu extends Page
{
   public $rgtipo = null;
   public $rgciudad = null;
   public $cbtipos = null;
   public $Label3 = null;
   public $dtf2 = null;
   public $dtf1 = null;
   public $Label2 = null;
   public $pbotones = null;
   public $lbtitulo = null;
   public $btngenerar = null;
   function ureptpuShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption= $this->Caption;


   }

   function ureptpuCreate($sender, $params)
   {
      if(Derechos('ACCREPORTPU') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
            	   alert("Usted no tiene derechos para Accesar al Reporte TPU");
               	document.location.href("menu.php");
               	</script>';
         	exit;
         }

   }



   function btngenerarClick($sender, $params)
   {

      $this->ReporteTPU();

   }

   function ReporteTPU()
   {
      /*{TOD total ordenes desfasadas
      TOT total ordenes a tiempo
      THD total horas desfasadas
      THT total horas a tiempo
      , TH, PD, PT, HPD, HPT, HP, DNP, DNPD, DNPT, DHP, DHPD, DHPT :Double;*/
      if($this->rgciudad->ItemIndex == 0)
      {
         $c = 'MEXICALI';
         $cd = 'M';
      }
      if($this->rgciudad->ItemIndex == 1)
      {
         $c = 'TIJUANA';
         $cd = 'T';
      }
      if($this->rgciudad->ItemIndex == 2)
      {
         $c = 'ENSENADA';
         $cd = 'E';
      }

      $TOD = 0;
      $TOT = 0;
      $THD = 0;
      $THT = 0;
      $periodo = $c . ' Del ' . $this->dtf1->Text . ' al ' . $this->dtf2->Text;

      $sql = 'select count(OROrden) as total from SEORDSER
           where OrFecAlta between  \'' . date('Ymd', $this->dtf1->Text) . '\'
           and \'' . date('Ymd', $this->dtf2->Text) . '\' and ORStatus = \'AB\'';
      $rs = mssql_query($sql)or die("Error MS SQL: " . $sql . " " . mssql_error());
      $row = mssql_fetch_array($rs);
      $rc = mssql_num_rows($rs);


      if($this->cbtipos->ItemIndex != '0')
      {
         $tipo = ' and ORTipOrd = \'' . $this->cbtipos->ItemIndex . '\' ';
      }
      else
       $tipo = '';

      $sql = 'select count(((datediff(mi, convert(char(10), OrFecAlta,112), convert(char(10),OrFecEnt,112))) +
             (datediff(mi, convert(char(8), OrHoraIni, 108),convert(char(8),OrHoraFin, 108))))/60) as OrdEst,
             SUM(((datediff(mi, convert(char(10), OrFecAlta,112), convert(char(10),OrFecEnt,112))) +
             (datediff(mi, convert(char(8), OrHoraIni, 108),convert(char(8),OrHoraFin, 108))))/60) as TotHrsEst,
             case  when (datediff(mi, convert(char(10), OrFecProm,112), convert(char(10),OrFecEnt,112))) +
             (datediff(mi, convert(char(8), OrHoraPro, 108),convert(char(8),OrHoraFin, 112))) > 0 then \'HD\'
             else \'HT\' end as m from SEORDSER
             where OrFecEnt between \'' . str_replace("-", "", $this->dtf1->Text) . '\' and
             \'' . str_replace("-", "", $this->dtf2->Text) . '\' and ORStatus = \'CE\'
             and left(OrOrden,1) = \'' . $cd . '\'  ' . $tipo . '
             group by (case  when (datediff(mi, convert(char(10), OrFecProm,112), convert(char(10),OrFecEnt,112))) +
             (datediff(mi, convert(char(8), OrHoraPro, 108),convert(char(8),OrHoraFin, 112))) > 0 then \'HD\'
             else \'HT\' end)  order by m';
      $rs = mssql_query($sql)or die("Error sql: " . $sql . " " . mssql_error());

      if(mssql_num_rows($rs) == 0)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("No se encontraron Datos");
			       //document.location.href("menu.php");
             </script>';
      }
      else
      {

       $TTO = 0;
       $TOD = 0;
       $TOT = 0;
       $THD = 0;
       $THT = 0;
       $TH = 0;
       $PD = 0;
       $PT = 0;
       $PORTOT = 0;
       $HPD = 0;
       $HPT = 0;
       $HP = 0;
       $DNP = 0;
       $DNPD = 0;
       $DNPT = 0;
       $DHP = 0;
       $DHPD = 0;
       $DHPT = 0;

         while($row = mssql_fetch_array($rs))
         {
            if($row['m'] == 'HD')
            {
               $TOD = $row['OrdEst'];
               $THD = $row['TotHrsEst'];
            }
            else
            {
               $TOT = $row['OrdEst'];
               $THT = $row['TotHrsEst'];
            }
         }

         $TTO = $TOD + $TOT;//total ordenes
         $TH = $THD + $THT;//total horas

         if($TTO == 0)
         {
            $PD = 0;
            $PT = 0;
         }
         else
         {
            $PD = ($TOD / $TTO) * 100;//porcentaje de desfase
            $PT = ($TOT / $TTO) * 100;//porcentaje de a tiempo
         }

         $PORTOT = $PD + $PT;//debes ser 100

         if($TOD != 0)
            $HPD = $THD / $TOD;

         if($TOT != 0)
            $HPT = $THT / $TOT;
         $HP = $TH / $TTO;

         $DNPD = $HPD / 24;
         $DNPT = $HPT / 24;
         $DNP = $HP / 24;

         $DHPD = $HPD / 8;
         $DHPT = $HPT / 8;
         $DHP = $HP / 8;





      $sql = 'select  \'' . $periodo . '\' as periodo,
         OrOrden, OrNombre, ORTipOrd as Initipo,
         convert(char(10), OrFecAlta,112) as FecAlta, convert(char(8), OrHoraIni, 108) as HrAlta,
         convert(char(10), OrFecProm,112) as FecProm, convert(char(8), OrHoraPro, 108) as HrProm,
         convert(char(10),OrFecEnt,112) as FecEnt, convert(char(8),OrHoraFin, 108) as HrEnt,
         ((datediff(mi, convert(char(10), OrFecAlta,112), convert(char(10),OrFecEnt,112))) +
         (datediff(mi, convert(char(8), OrHoraIni, 108),convert(char(8),OrHoraFin, 108))))/60 as TotHrsEst,
         ((datediff(mi, convert(char(10), OrFecProm,112), convert(char(10),OrFecEnt,112)))
         + (datediff(mi, convert(char(8), OrHoraPro, 108),convert(char(8),OrHoraFin, 108))))/60 as TotHrsDif,
         case  when (datediff(mi, convert(char(10), OrFecProm,112), convert(char(10),OrFecEnt,112))) +
         (datediff(mi, convert(char(8), OrHoraPro, 108),convert(char(8),OrHoraFin, 112))) > 0 then \'UNIDADES CON HORAS DESFASADAS\'
         else \'UNIDADES CON HORAS A TIEMPO\' end as m,
         CASE ORTipOrd WHEN  \'G\' THEN \'GARANTIA\' WHEN  \'N\' THEN \'NORMAL\' WHEN  \'H\' THEN \'HOJALATERIA\'
         WHEN  \'R\' THEN \'RECLAMACION\'  WHEN  \'I\' THEN \'INTERNO\'
         WHEN  \'E\' THEN \'EXPRESS\' WHEN \'F\' THEN \'FLOTILLAS\' WHEN \'S\' THEN \'SINIESTROS\'
         ELSE ORTipOrd END AS ORTipOrd
         from SEORDSER
         where OrFecEnt  between \'' . str_replace("-", "", $this->dtf1->Text) . '\' and
             \'' . str_replace("-", "", $this->dtf2->Text) . '\'
         and ORStatus = \'CE\' and left(OrOrden,1) = \'' . $cd . '\'  ' . $tipo . ' order by ORTipOrd,m,TotHrsDif';




      $sql2 = 'Select \'TOTAL ORDENES\' as descripcion, round("' . $TTO . '",2) as TTO
               UNION Select \'TOTAL DE ORDENES CON DESFASE\' as descripcion, round("' . $TOD . '",2) as TOD
               UNION Select \'TOTAL DE ORDENES A TIEMPO\' as descripcion, round("' . $TOT . '",2) as TOT
               UNION Select \'TOTAL DE HORAS CON DESFASE\' as descripcion, round("' . $THD . '",2) as THD
               UNION Select \'TOTAL DE HORAS A TIEMPO\' as descripcion, "' . $THT . '" as THT
               UNION Select \'TOTAL HORAS\' as descripcion, "' . $TH . '" as TH
               UNION Select \'PORCENTAJE DE DESFASE\' as descripcion, round("' . $PD . '",2) as PD
               UNION Select \'PORCENTAJE A TIEMPO\' as descripcion, round("' . $PT . '",2) as PT
               UNION Select \'PORCENTAJE TOTAL\' as descripcion, round("' . $PORTOT . '",2) as PORTOT
               UNION Select \'HORAS PORCENTAJE DE DESFASE\' as descripcion, round("' . $HPD . '",2) as HPD
               UNION Select \'HORAS PORCENTAJE A TIEMPO\' as descripcion, round("' . $HPT . '",2) as HPT
               UNION Select \'HORAS PORCENTAJE\' as descripcion, round("' . $HP . '",2) as HP
               UNION Select \'DIAS NATURALES PORCENTAJE\' as descripcion, round("' . $DNP . '",2) as DNP
               UNION Select \'DIAS NATURALES PORCENTAJE CON DESFASE\' as descripcion, round("' . $DNPD . '",2) as DNPD
               UNION Select \'DIAS NATURALES PORCENTAJE A TIEMPO\' as descripcion, round("' . $DNPT . '",2) as DNPT
               UNION Select \'DIAS HABILES PORCENTAJE\' as descripcion, round("' . $DHP . '",2) as DHP
               UNION Select \'DIAS HABILES PORCENTAJE CON DESFASE\' as descripcion, round("' . $DHPD . '",2) as DHPD
               UNION Select \'DIAS HABILES PORCENTAJE A TIEMPO\' as descripcion, round("' . $DHPT . '",2) as DHPT';

      if($this->rgtipo->ItemIndex == 1)
         $this->exportarMSSQL($sql, 'ReporteTPU');
      else
         $this->exportarMSSQL($sql2, 'ReporteTPU2');

      }

   }



   function exportarMSSQL($sql, $nombre)
   {

      ini_set("memory_limit", "50M");
      ini_set("max_execution_time", "500");

      $link = mssql_pconnect(GetConfiguraciones('serverSQL'), GetConfiguraciones('userSQL'), GetConfiguraciones('passSQL'));
      if(!$link)
      {
         echo 'No se conecto a MSSQL';
      }
      else
      {
         //conectar con gedas
         mssql_select_db(GetConfiguraciones('bdSQL'), $link);
      }

      $result = mssql_query($sql, $link);
      // $result2 = mssql_query($sql2, $link);
      // Send Header
      header("Pragma: public");
      header("Expires: 0");
      header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
      header("Content-Type: application/force-download");
      header("Content-Type: application/octet-stream");
      header("Content-Type: application/download");
      header("Content-Disposition: attachment;filename=" . $nombre . '.xls');
      header("Content-Transfer-Encoding: binary ");

      // XLS Data Cell

      xlsBOF();
      //Titulo
      xlsWriteLabel(1, 0, strtoupper("International de Baja California S.A. de C.V."));

      //Encabezado
      $row = mssql_fetch_assoc($result);
      //$row2 = mssql_fetch_assoc($result2);
      //get field names
      $i = 0;
      foreach($row as $key => $value)
      {
         xlsWriteLabel(3, $i, strtoupper($key));
         ++$i;
      }

      $fields = $i;
      $xlsRow = 4;

      //regresar result
      $v_Re = mssql_data_seek($result, 0);
      if(!$v_Re)
         die('MsSql data seek Error' . mssql_error());

      //Cuerpo
      while($row = mssql_fetch_row($result))
      {
         //++$i;
         for($i = 0; $i <= $fields; $i++)
         {
            if(is_numeric($row[$i]))
               xlsWriteNumber($xlsRow, $i, $row[$i]);
            else
               xlsWriteLabel($xlsRow, $i, $row[$i]);
         }
         $xlsRow++;
      }

      xlsEOF();
      mssql_free_result($result);


      //////////////////
      /*  $i = $xlsRow+1;
      foreach($row2 as $key => $value)
      {
      xlsWriteLabel(3, $i, strtoupper($key));
      ++$i;
      }

      $fields = $i;
      $xlsRow =$xlsRow+  4;

      //regresar result
      $v_Re = mssql_data_seek($result2, 0);
      if(!$v_Re)
      die('MsSql data seek Error' . mssql_error());

      /* //Cuerpo
      while($row2 = mssql_fetch_row($result2))
      {
      //++$i;
      for($i = 0; $i <= $fields; $i++)
      {
      if(is_numeric($row2[$i]))
      xlsWriteNumber($xlsRow, $i, $row2[$i]);
      else
      xlsWriteLabel($xlsRow, $i, $row2[$i]);
      }
      $xlsRow++;
      }

      xlsEOF();
      mssql_free_result($result2);      */

      ///////////////////
      exit();
      while(ob_get_level() > 0)
         ob_end_flush();

   }



}

global $application;

global $ureptpu;

//Creates the form
$ureptpu = new ureptpu($application);

//Read from resource file
$ureptpu->loadResource(__FILE__);

//Shows the form
$ureptpu->show();

?>