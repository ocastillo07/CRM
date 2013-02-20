<?php

include("dmconexion.php");
include("urecursos.php");

if(isset($_POST['subir']))
{
   $path = GetConfiguraciones('PathManuales');

   if((($_FILES["ulimgpath"]["type"] == "image/gif")
      || ($_FILES["ulimgpath"]["type"] == "image/jpeg")
      || ($_FILES["ulimgpath"]["type"] == "image/pjpeg")
      || ($_FILES["ulimgpath"]["type"] == "application/pdf")
      || ($_FILES["ulimgpath"]["type"] == "application/vnd.ms-excel")
      || ($_FILES["ulimgpath"]["type"] == "application/msword"))
      && ($_FILES["ulimgpath"]["size"] < 10485760))//10 megas
   {
      if($_FILES["ulimgpath"]["error"] > 0)
         echo 'alert("Error al subir Archivo");';
      else
      {
         echo 'alert(\'Archivo ' . $_SERVER['DOCUMENT_ROOT'] . $path . $_FILES["ulimgpath"]["name"] . ' Guardado\');';
         $file = $_SERVER['DOCUMENT_ROOT'] . GetConfiguraciones('PathManuales') . $row['archivo'];
         unlink($file);
         move_uploaded_file($_FILES["ulimgpath"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'] . $path . $_FILES["ulimgpath"]["name"]);
      }
   }
   else
      echo 'alert("Formato del Archivo Invalido!");';
}
?>