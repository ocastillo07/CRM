<?php


/*
internal post (mysql.inc.php line 804)
$where='';
agregar esto
$where=$this->_filter;
.
.
.
function &extractIndexes($table, $primary = FALSE)
{
$table = $table;
$sql="SHOW INDEX FROM `$table` ";

if ($primary)  <=== tiene ke ser igual  no  "!"
*
*
*
var_dump($Items);
echo '<hr>';
*/


include('vcl/class.phpmailer.php');

function enviarmailattach($from, $fromname, $to, $toname, $subject, $msn, $path, $files)
{
   $mail = new PHPMailer();// defaults to using php "mail()"
   $mail->IsSMTP();
   $mail->SMTPAuth = true;// enable SMTP authentication
   $mail->Host = GetConfiguraciones('hostsmtp');// sets the SMTP server
   $mail->Port = GetConfiguraciones('portsmtp');// 26 set the SMTP port for the GMAIL server
   $mail->Username = GetConfiguraciones('usersmtp');// SMTP account username
   $mail->Password = GetConfiguraciones('passsmtp');// SMTP account password
   //$body = file_get_contents('contents.html');
   $body = $msn;
   $body = eregi_replace("[\]", '', $body);
   $mail->AddReplyTo($from, $fromname);
   $mail->SetFrom($from, $fromname);

   $dirs = split(',', trim($to));
   for($i = 0; $i < count($dirs); $i++)
      $mail->AddAddress($dirs[$i], $toname);
   $mail->Subject = $subject;
   $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
   $mail->MsgHTML($body);
   $split = split('&', $files);
   if(strlen($files))
   {
      for($i = 0; $i < count($split); $i++)
      {
         if($i == 0)
            $mail->AddAttachment($path . '/presupuestos/' . $split[$i]);
         if($i > 0)
            $mail->AddAttachment($path . '/correos/' . $split[$i]);
      }
   }
   if(!$mail->Send())
      return "Mailer Error (" . str_replace("@", "&#64;", $split[$i]) . ') ' . $mail->ErrorInfo . '<br />';//return "Error: " . $mail->ErrorInfo;
   else
      return "Correo Enviado!";
}

function enviarmail($from, $to, $subject, $message)
{/*

   $mail = new PHPMailer();
   $mail->From = "crm@ibc.com.mx";
   $mail->FromName = "Dalula";
   $mail->AddAddress ("crm@ibc.com.mx");
   $mail->Subject = "Test";
   $mail->Body = "probando";
   $mail->IsHTML(true);
   $mail->IsSMTP();
   $mail->Host = "ssl://mail.ibc.com.mx";
   $mail->Port = 26;
   $mail->SMTPAuth = true;
   // turn on SMTP authentication
   $mail->Username = "crm@gmail.com";
   // SMTP username
   $mail->Password = "crm";
   // SMTP password
   if(!$mail->Send())
   {
   echo "Se ha producido un error al enviar el correo.";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
   }else{

   echo 'mail enviado correctamente';
   }  */
   $smtp = GetConfiguraciones('hostsmtp');
   $smtpport = GetConfiguraciones('portsmtp');
   $smtpuser = GetConfiguraciones('usersmtp');
   $smtppass = GetConfiguraciones('passsmtp');
   ini_set('SMTP', $smtp);
   ini_set('smtp_port', $smtpport);
   $headers = "From: " . $from . " \r\n" .
   "Reply-To: crm@ibc.com.mx\r\n" .
   "MIME-Version: 1.0.\r\n" .
   "X-Mailer: PHP/";

   mail($to, $subject, $message, $headers);
}

function enviarmailx($from, $to, $subject, $message)
{
   $mail = new PHPMailer();
   $body = eregi_replace("[\]", '', $message);
   $mail->IsSMTP();// telling the class to use SMTP
   $mail->SMTPAuth = true;// enable SMTP authentication
   $mail->Host = GetConfiguraciones('hostsmtp');// sets the SMTP server
   $mail->Port = 26;// set the SMTP port for the GMAIL server
   $mail->Username = "crm@ibc.com.mx";// SMTP account username
   $mail->Password = "crm";// SMTP account password
   $mail->SetFrom('crm@ibc.com.mx', 'CRM');
   $mail->AddReplyTo('crm@ibc.com.mx', 'CRM');
   $mail->Subject = $subject;//"PHPMailer Test Subject via smtp, basic with authentication";
   $mail->Timeout = 120;
   $split = split(',', $to);
   for($i = 0; $i < count($split); $i++)
   {
      $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";// optional, comment out and test
      $mail->MsgHTML($body);
      $mail->AddAddress($split[$i], $split[$i]);
      //$mail->AddStringAttachment($row["photo"], "YourPhoto.jpg");
      if(!$mail->Send())
      {
         echo "Mailer Error (" . str_replace("@", "&#64;", $split[$i]) . ') ' . $mail->ErrorInfo . '<br />';
      }
      // Clear all addresses and attachments for next loop
      $mail->ClearAddresses();
      $mail->ClearAttachments();
   }
}

function tipoarchivo($tipo)
{
   $sql = "Select nombre from tipoarchivos";
   $rsm = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
   while($r = mysql_fetch_array($rsm))
   {
      if($tipo == $r[0])
         return true;
   }
   return false;
}


function replace($cadena)
{
   $cadena = str_replace("%", "", $cadena);
   $cadena = str_replace(" ", "", $cadena);
   $cadena = str_replace("/", "", $cadena);
   $cadena = str_replace("\\", "", $cadena);
   $cadena = str_replace("@", "", $cadena);
   $cadena = str_replace("#", "", $cadena);
   $cadena = str_replace("$", "", $cadena);
   $cadena = str_replace("&", "", $cadena);
   return $cadena;
}

function replacememo($cadena)
{
   $cadena = str_replace("'", '`', $cadena);
   $cadena = str_replace("\\", chr(92) . chr(92), $cadena);

   $cadena = str_replace("'", "\'", $cadena);
   $cadena = str_replace('"', '\"', $cadena);
   return $cadena;
}

function codificacion($cadena)
{
   $cadena = str_replace("%", "%25", $cadena);
   $cadena = str_replace(" ", "%20", $cadena);
   $cadena = str_replace("á", "%E1", $cadena);
   $cadena = str_replace("é", "%E9", $cadena);
   $cadena = str_replace("í", "%ED", $cadena);
   $cadena = str_replace("ó", "%f3", $cadena);
   $cadena = str_replace("ú", "%FA", $cadena);
   return $cadena;
}

function NombreFisica($tabla)
{
   $nombre = 'if(' . $tabla . '.apaterno is NULL or ' . $tabla . '.apaterno="", ' . $tabla . '.nombre, if(' . $tabla . '.amaterno is NULL or ' . $tabla . '.amaterno="", concat(' .
   $tabla . '.nombre, " ", ' . $tabla . '.apaterno), concat(' . $tabla . '.nombre, " ", ' . $tabla . '.apaterno, " ", ' . $tabla . '.amaterno)))';
   return $nombre;
}

function NombreMoral($tabla)
{
   $nombre = 'if(' . $tabla . '.rsocial is NULL or ' . $tabla . '.rsocial="", if(' . $tabla . '.apaterno is NULL or ' . $tabla . '.apaterno="", ' . $tabla . '.nombre, if(' . $tabla . '.amaterno is NULL or ' . $tabla . '.amaterno="", ' .
   'concat(' . $tabla . '.nombre, " ", ' . $tabla . '.apaterno), concat(' . $tabla . '.nombre, " ", ' . $tabla . '.apaterno, " ", ' . $tabla . '.amaterno))), ' . $tabla . '.rsocial)';
   return $nombre;
}

function NombreCliente($tabla)
{
   $nombre = 'if(' . $tabla . '.persona ="F", if(' . $tabla . '.apaterno is NULL or ' . $tabla . '.apaterno="", ' . $tabla . '.nombre, if(' . $tabla . '.amaterno is NULL or ' . $tabla . '.amaterno="", ' .
   'concat(' . $tabla . '.nombre, " ", ' . $tabla . '.apaterno), concat(' . $tabla . '.nombre, " ", ' . $tabla . '.apaterno, " ", ' . $tabla . '.amaterno))), ' . $tabla . '.rsocial)';
   return $nombre;
}

function UFH($tabla)
{
   $ufh = 'concat("Modificado por ", ' . $tabla . '.usuario, " el ", ' . $tabla . '.fecha, " a las ", ' . $tabla . '.hora)';
   return $ufh;
}

function GetConfiguraciones($concepto)
{
   $rsm = mysql_query("select valor from configuraciones where concepto = '" . $concepto . "'");
   $row = mysql_fetch_row($rsm);
   return $row[0];
}

/*
function Derechos($concepto)
{
   if($_SESSION['login'] == 'root')
      return true;
   else
   {

      $rsm = mysql_query('Select ud.idderecho from usuariosderechos ud left join derechos d on
                       d.idderecho=ud.idderecho where ud.idusuario = ' . $_SESSION['idusuario'] . '
                       and (d.descripcion = "' . $concepto . '" or d.llave="' . $concepto . '") ');

      if(mysql_num_rows($rsm) == 0)
         return false;
      else
         return true;
   }
}*/

function Derechos($concepto)
{
   if($_SESSION['login'] == 'root')
      return true;
   else
   {
      if($_SESSION['idperfil'] != '0')
         $sql = 'Select ud.idderecho u, "U" as t  from derechos d
             left join usuariosderechos ud  on d.idderecho=ud.idderecho
             where (d.descripcion = "' . $concepto . '" or d.llave="' . $concepto . '")
             and ud.idusuario = ' . $_SESSION['idusuario'] . '
             union
             select ud.idderecho p,  "P" as t
             from usuarios u
             inner join usuariosperfiles up on up.idusuario=u.idusuario
             inner join usuariosderechos ud on ud.idusuario=up.idperfil
             inner join derechos d on ud.idderecho=d.idderecho
             where  (d.descripcion = "' . $concepto . '" or d.llave="' . $concepto . '")
             and u.idusuario = ' . $_SESSION['idusuario'] . '';
      else

         $sql = 'Select ud.idderecho from usuariosderechos ud left join derechos d on
                       d.idderecho=ud.idderecho where ud.idusuario = ' . $_SESSION['idusuario'] . '
                       and (d.descripcion = "' . $concepto . '" or d.llave="' . $concepto . '") ';


      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);

      if($row == false)
         return false;
      else
         return true;
   }
}

function MaxId($tabla, $campoid)
{
   $rsm = "Select ifnull(max(" . $campoid . "), 0) as id from " . $tabla;
   $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
   $row = mysql_fetch_row($r);

   return $row[0];
}

function LeftStr($cadena, $total)
{
   $r = substr($cadena, 0, $total);
   return $r;
}

function RightStr($cadena, $total)
{
   $total = $total * - 1;
   $r = substr($cadena, $total, strlen($cadena));
   return $r;
}

function xlsBOF()
{
   echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
   return;
}

function xlsEOF()
{
   echo pack("ss", 0x0A, 0x00);
   return;
}

function xlsWriteNumber($Row, $Col, $Value)
{
   echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
   echo pack("d", $Value);
   return;
}

function xlsWriteLabel($Row, $Col, $Value)
{
   $L = strlen($Value);
   echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
   echo $Value;
   return;
}


function exportar($sql, $nombre)
{

   $link = mysql_connect('localhost', 'root', 'freedom');

   $result = mysql_db_query('crm', $sql);
   // Send Header
   header("Pragma: public");
   header("Expires: 0");
   header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
   header("Content-Type: application/force-download");
   header("Content-Type: application/octet-stream");
   header("Content-Type: application/download");
   ;
   header("Content-Disposition: attachment;filename=" . $nombre . '.xls');
   header("Content-Transfer-Encoding: binary ");

   // XLS Data Cell

   xlsBOF();
   //Titulo
   xlsWriteLabel(1, 0, strtoupper("International de Baja California S.A. de C.V."));
   /*xlsWriteLabel(2,0,"COURSENO : ");
   xlsWriteLabel(2,1,"$courseid");
   xlsWriteLabel(3,0,"TITLE : ");
   xlsWriteLabel(3,1,"$title");
   xlsWriteLabel(4,0,"SETION : ");
   xlsWriteLabel(4,1,"$sec");  */

   //Encabezado
   $row = mysql_fetch_assoc($result);
   //get field names
   $i = 0;
   foreach($row as $key => $value)
   {
      xlsWriteLabel(3, $i, strtoupper($key));
      ++$i;
   }

   $fields = $i;
   //xlsWriteLabel(6,1,"ID");
   //xlsWriteLabel(6,2,"Gender");
   //xlsWriteLabel(6,3,"Name");
   //xlsWriteLabel(6,4,"Lastname");
   $xlsRow = 4;

   //regresar result
   $v_Re = mysql_data_seek($result, 0);
   if(!$v_Re)
      die('MySql data seek Error' . mysql_error());

   //Cuerpo
   while($row = mysql_fetch_row($result))
   {
      //++$i;
      for($i = 0; $i <= $fields; $i++)
      {
         if(is_numeric($row[$i]))
            xlsWriteNumber($xlsRow, $i, $row[$i]);
         else
            xlsWriteLabel($xlsRow, $i, $row[$i]);
      }
      /*xlsWriteLabel($xlsRow,2,"$prename");
      xlsWriteLabel($xlsRow,3,"$name");
      xlsWriteLabel($xlsRow,4,"$sname");*/
      $xlsRow++;
   }
   xlsEOF();
   mysql_free_result($result);
   //mysql_close($link);
   exit();
   while(ob_get_level() > 0)
      ob_end_flush();

}
//exportar('select * from contactos','ofertas');

function Fecha()
{
   $sql = "Select date_format(curdate(), '%Y/%m/%d')";
   $rsm = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
   $r = mysql_fetch_row($rsm);
   return $r[0];
}

function Hora()
{
   $sql = "Select time_format(curtime(), '%H:%i:%s')";
   $rsm = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
   $r = mysql_fetch_row($rsm);
   return $r[0];
}

function isEmail($email)
{
   return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
}

function cadenasinacentos($c1)
{
   //cadena 1
   $c1 = ereg_replace("à|á|â|ã|ä|å|À|Á|Â|Ã|Ä|Å", "a", $c1);
   $c1 = ereg_replace("è|é|ê|ë|È|É|Ê|Ë", "e", $c1);
   $c1 = ereg_replace("ì|í|î|ï|Ì|Í|Î|Ï", "i", $c1);
   $c1 = ereg_replace("ò|ó|ô|õ|ö|Ò|Ó|Ô|Õ|Ö", "o", $c1);
   $c1 = ereg_replace("ù|ú|û|ü|Ù|Ú|Û|Ü", "u", $c1);
   $c1 = ereg_replace("ñ|Ñ", "n", $c1);
   $c1 = strtolower($c1);
   return $c1;
}

function compararcadenas($c1, $c2)
{
   //cadena 1
   $c1 = ereg_replace("à|á|â|ã|ä|å|À|Á|Â|Ã|Ä|Å", "a", $c1);
   $c1 = ereg_replace("è|é|ê|ë|È|É|Ê|Ë", "e", $c1);
   $c1 = ereg_replace("ì|í|î|ï|Ì|Í|Î|Ï", "i", $c1);
   $c1 = ereg_replace("ò|ó|ô|õ|ö|Ò|Ó|Ô|Õ|Ö", "o", $c1);
   $c1 = ereg_replace("ù|ú|û|ü|Ù|Ú|Û|Ü", "u", $c1);
   $c1 = ereg_replace("ñ|Ñ", "n", $c1);
   $c1 = strtolower($c1);
   //cadena 2
   $c2 = ereg_replace("à|á|â|ã|ä|å|À|Á|Â|Ã|Ä|Å", "a", $c2);
   $c2 = ereg_replace("è|é|ê|ë|È|É|Ê|Ë", "e", $c2);
   $c2 = ereg_replace("ì|í|î|ï|Ì|Í|Î|Ï", "i", $c2);
   $c2 = ereg_replace("ò|ó|ô|õ|ö|Ò|Ó|Ô|Õ|Ö", "o", $c2);
   $c2 = ereg_replace("ù|ú|û|ü|Ù|Ú|Û|Ü", "u", $c2);
   $c2 = ereg_replace("ñ|Ñ", "n", $c2);
   $c2 = strtolower($c2);
   if($c1 = $c2)
      return true;
   else
      return false;
}

function doHighlight($srchTerms, $haystack)
{
   $srchTerms = preg_quote($srchTerms, "/");
   $needle = str_replace(" ", "|", $srchTerms);
   $busca = array("a", "e", "i", "o", "u", "ñ", "Ñ");
   $reemplaza = array("[aàáâãäåÀÁÂÃÄÅ]", "[eèéêëÈÉÊË]", "[iìíîïÌÍÎÏ]", "[oòóôõöÒÓÔÕÖ]", "[uùúûüÙÚÛÜ]", "[nñÑ]", "[nñÑ]");
   $needle = str_ireplace($busca, $reemplaza, $needle);
   $text = preg_replace("/($needle)/i", "<b>\\0</b>", $haystack);
   return $text;
}

function ConectarGds()
{
   $server = GetConfiguraciones('serverSQL');
   $db = GetConfiguraciones('bdSQL');
   $user = GetConfiguraciones('userSQL');
   $pass = GetConfiguraciones('passSQL');


   if(!$mslink = mssql_pconnect($server, $user, $pass))
   {
      echo '<script language="javascript" type="text/javascript">
            alert("No se conecto a MSSQL");
            </script>';
   }
   else
   {
      //conectar con gedas
      if(!mssql_select_db($db, $mslink))
      {
         echo '<script language="javascript" type="text/javascript">
            alert("No se conecto a MSSQL");
            </script>';
            mssql_close($mslink);
      }
      else
        return $mslink;
   }
}

function BloquearPermisos($alta, $bloqueado, $idcolaborador)
{
   if($bloqueado)
   {
      $msg = 'Bloqueo Permisos a Colaborador' . $idcolaborador;
      $chk = 1;
   }
   else
   {
      $msg = 'Desbloqueo Permisos a Colaborador' . $idcolaborador;
      $chk = 0;
   }

   //si es alta
   if($alta == 1)
   {
      if(Derechos('BLOQTHPERM'))
        return true;
      else
      {
      	   if($bloqueado)
	   	return false;
	    else
		return true;
	}
   }
   else
   {
      $sql = 'Select bloqpermisos from rhcolaboradores c
           where c.idcolaborador=' . $idcolaborador;
      $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
      $row = mysql_fetch_array($rs);
      if($row['bloqpermisos'] != $chk)
      {
          if(Derechos('BLOQTHPERM'))
          {

             $sql = 'Update rhcolaboradores set bloqpermisos=' . $chk . ',
                usuario="' . $_SESSION["login"] . '",  fecha=curdate(), hora=CURTIME()
                where idcolaborador=' . $idcolaborador;
             $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

            dmconexion::Log($msg, 3);
            return true;
          }
          else
          {
            return false;
          }
      }
      else
        return true;
   }

}


function ExisteNombre($nombre, $tabla, $campo, $condicion = '')
{
   $sql = 'Select ' . $campo . ' from ' . $tabla . ' where ' . $campo . ' = "' . $nombre . '" ' . $condicion;
   $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
   $row = mysql_fetch_array($rs);
   if($row == false)
      $r = false;
   else
      $r = true;
   return $r;
}

?>