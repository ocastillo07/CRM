<?php

/*
dayofweek() mysql
1 dom  2 lun 3 mar 4 mie
5 jue  6 vie 7 sab
*/

function Pascua($anio)
{
   /* Devuelve la fecha del año en la que cae la Pascua de Resurrección.
   Se utiliza para ello el Algoritmo de Butcher */
   $a = $anio % 19;
   $b = floor($anio / 100);
   $c = $anio % 100;
   $d = floor($b / 4);
   $e = $b % 4;
   $f = floor(($b + 8) / 25);
   $g = floor(($b - $f + 1) / 3);
   $h = (19 * $a + $b - $d - $g + 15) % 30;
   $i = floor($c / 4);
   $k = $c % 4;
   $l = (32 + 2 * $e + 2 * $i - $h - $k) % 7;
   $m = floor(($a + 11 * $h - 22 * l) / 451);
   $n = $h + $l - 7 * $m + 114;
   $mes = floor($n / 31);
   $dia = 1 + $n % 31 - 2;

   return EncodeDate($anio, $mes, $dia);
}

function DiaFestivo($fecha)
{
   $a = YearOf($fecha);
   $m = MonthOf($fecha);
   $d = DayOf($fecha);

   $rsm = "select dia, mes, cambiadia, diasustituto, semanames, sexenial
      from diasfestivos where mes =$m order by dia";
   $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

   if(mysql_num_rows($r) > 0)
   {
      while($row = mysql_fetch_array($r))
      {

         $festivo = EncodeDate($a, $row['mes'], $row['dia']);

         if($row['cambiadia'] == 0)
         {
            if($fecha == $festivo)
            {
               if($row['sexenial'] == 1)
               {
                  if($a > 2000)
                  {
                     if((($a - 2000) % 6) == 0)
                        return true;
                     else
                        $ban = false;
                  }
                  else
                     $ban = false;
               }
               else
                  return true;
            }
            else
               $ban = false;
         }
         else
         {
            $j = 1;
            for($i = 1; $i <= 31; $i++)
            {

               $nfecha = EncodeDate($a, $m, $i);

               $dw = DayOfWeek($nfecha);

               if($dw == $row['diasustituto'] && $j == $row['semanames'])
               {
                  if($nfecha == $fecha)
                     return true;
               }

               if($dw == $row['diasustituto'])
                  $j++;

            }
            $ban = false;
         }
      }
   }
   else
      if(Pascua($a) == $fecha)
      {
         if(GetConfiguraciones('CelebraPascua'))
            return true;
         else
            return false;
      }
      else
         $ban = false;

   return false;
}


function DiaHabil($fecha)
{
   if(DayOfWeek($fecha) == 1)
      return false;

   if(DiaFestivo($fecha) == true)
      return false;

   return true;
}


function DiasHabiles($fecha1, $fecha2)
{
   $hab = 0;
   $fecha = $fecha1;
   while($fecha != IncDay($fecha2, 1))
   {
      if(DiaHabil($fecha) == true)
         $hab++;
      $fecha = IncDay($fecha, 1);
   }
   return $hab;
}

function DiasHabilesMes($ano, $mes)
{
   $dm = DaysInAMonth($ano, $mes);
   $hab = 0;
   for($i = 1; $i <= $dm; $i++)
   {
      $fecha = EncodeDate($ano, $mes, $i);
      if(DiaHabil($fecha) == true)
         $hab++;
   }
   return $hab;
}

function DiasHabilesMesXFecha($fecha)
{
   $dm = DaysMonth($fecha);
   $hab = 0;
   for($i = 1; $i <= $dm; $i++)
   {
      $fecha = EncodeDate(YearOf($fecha), MonthOf($fecha), $i);
      if(DiaHabil($fecha) == true)
         $hab++;
   }
   return $hab;
}

function DayOfWeek($fecha)
{

   $rsm = "select dayofweek('" . $fecha . "') as d";
   $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
   $row = mysql_fetch_array($r);
   return $row['d'];
}

function DaysMonth($fecha)
{

   $rsm = "select DATE_FORMAT(last_day('" . $fecha . "'), '%d') as d";
   $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
   $row = mysql_fetch_array($r);
   return $row['d'];
}

function DaysInAMonth($ano, $mes)
{

   $rsm = "select DATE_FORMAT(last_day('$ano/$mes/01'), '%d') as d";
   $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
   $row = mysql_fetch_array($r);
   return $row['d'];
}

function FirstOfMonth($fecha)
{
   return date('Y/m/01');
}


function YearOf($fecha)
{
   return date('Y', strtotime($fecha));
}

function MonthOf($fecha)
{
   return date('m', strtotime($fecha));
}

function DayOf($fecha)
{
   return date('d', strtotime($fecha));
}

function EncodeDate($a, $m, $d)
{
   if($m < 10)
   {
      $m = $m + 0;
      $m = '0' . $m;
   }
   else
      $m = $m;

   if($d < 10)
   {
      $d = $d + 0;
      $d = '0' . $d;
   }
   else
      $d = $d;

   return $a . '/' . $m . '/' . $d;
}

function IncDay($fecha, $i = 1)
{
   $rsm = "select DATE_FORMAT(DATE_ADD('$fecha',INTERVAL $i DAY), '%Y/%m/%d') as d";
   $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
   $row = mysql_fetch_array($r);
   return $row['d'];
}

function IncMonth($fecha, $i = 1)
{
   $rsm = "select DATE_FORMAT(DATE_ADD('$fecha',INTERVAL $i MONTH), '%Y/%m/%d') as d";
   $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
   $row = mysql_fetch_array($r);
   return $row['d'];
}

function IncYear($fecha, $i = 1)
{
   $rsm = "select DATE_FORMAT(DATE_ADD('$fecha',INTERVAL $i YEAR), '%Y/%m/%d') as d";
   $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
   $row = mysql_fetch_array($r);
   return $row['d'];
}

function DateDiff($fecha1, $fecha2)
{
   $sql = 'Select DATEDIFF("' . $fecha1 . '","' . $fecha2 . '") as diff';
   $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
   $row = mysql_fetch_array($rs);
   $dif = $row['diff'];
   return $dif;
}

function TimeDiff($hora1, $hora2)
{
   $sql = 'Select cast("' . $hora1 . '" as time) - cast("' . $hora2 . '" as time) as diff';
   $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
   $row = mysql_fetch_array($rs);
   $dif = $row['diff'];
   return $dif;
}

?>