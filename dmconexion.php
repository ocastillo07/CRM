<?php

require_once("vcl/vcl.inc.php");
//Includes
use_unit("mysql.inc.php");
use_unit("db.inc.php");
use_unit("auth.inc.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class dmconexion extends DataModule
        {
        public $conexion = null;
        public $sqlgeneral = null;


        function conectarse()
          {
          $this->conexion->DoConnect();
          }

        function Log($detalle, $nivel)
            {
            $sql = "Insert into log (idusuario, detalle, nivel, fecha, hora) ".
                   "values('".$_SESSION['idusuario']."', \"".$detalle."\", '".$nivel."',".
                   " curdate(), curtime())";
             $result = mysql_query($sql) or die("error sql: ".$sql." ".mysql_error());
            }
        }


        global $application;

        global $dmconexion;

        //Creates the form
        $dmconexion=new dmconexion($application);

        //Read from resource file
        $dmconexion->loadResource(__FILE__);


?>