<?php
require_once("vcl/vcl.inc.php");
//Includes
use_unit("buttons.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
include("dmconexion.php");

//Class definition
class uconexion extends Page
{
       public $Label6 = null;
       public $pconexion = null;
       public $Edconfirm = null;
       public $Edpass = null;
       public $Edusuario = null;
       public $Edbd = null;
       public $edservidor = null;
       public $btnprobar = null;
       public $btnguardar = null;
       public $btncerrar = null;
       public $Label5 = null;
       public $Label4 = null;
       public $Label3 = null;
       public $Label2 = null;
       public $Label1 = null;
       function btncerrarJSClick($sender, $params)
       {

       ?>
       //Add your javascript code here
       document.location.href("index.php");
       <?php

       }


       function btnprobarClick($sender, $params)
       {
       $conecto = dmconexion::probar( $this->edservidor->Text,
                           $this->Edbd->Text = $config_info['conexion']['bd'],
                           $this->Edusuario->Text,
                           $this->Edpass->Text);

       if( $conecto == true )
         $mensaje = 'Se logro la conexion';
       else
         $mensaje = 'No se pudo conectar a la base de datos';

       echo $mensaje;
       //'<script language="javascript" type="text/javascript">
       #        alert(\'Estatus '.$mensaje.'\'); </script>';
       }


       function uconexionShow($sender, $params)
       {
       $config_info = parse_ini_file('conexion.ini', true);
       //print_r($config_info);
       $this->edservidor->Text = $config_info['conexion']['servidor'];
       $this->Edbd->Text = $config_info['conexion']['bd'];
       $this->Edusuario->Text = $config_info['conexion']['usuario'];
       $this->Edpass->Text = $config_info['conexion']['pass'];
       $this->Edconfirm->Text = $config_info['conexion']['pass'];
       }

       function btnguardarClick($sender, $params)
       {
       $this->acomodar();
       $file = 'conexion.ini';
       $data = Array ( 'conexion' => Array (
                  'servidor' => $this->edservidor->Text,
                  'bd' => $this->Edbd->Text,
                  'usuario' => $this->Edusuario->Text,
                  'pass' => $this->Edpass->Text
                  ) );

       $output = array(); // el INI
       foreach ($data as $name => $section)
         {
         if (is_array($section))
            {
            $output[] = "[{$name}]\r\n"; // [foo]
            foreach ($section as $key => $val)
               {
               $output[] = "$key=$val\r\n"; // foo=bar
               } // agregamos un salto de linea
            $output[]='';
            }
         }
      // pegamos el INI
      $ini = join("\n", $output);
      if ($file && is_dir(dirname($file)))
         {
        $tmp = fopen($file, 'w+');
        fwrite($tmp, $ini);
        fclose($tmp);
         }
       }

      function acomodar()
         {
         if(!isset($_GET["height"])){
        ?>
        <script type="text/javascript" language="javascript">
            document.location.href = "uconexion.php?height=" + window.screen.height+"&width="+window.screen.width;
        </script>
        <?php
    }
    else{

        $bh = $_GET["height"];
        $bh /= 2;
        $fh = $this->Height/2;
        $this->pconexion->Top = $bh-$fh-80;

        $bw = $_GET["width"];
        $bw /= 2;
        $fw = $this->Width/2;
        $this->pconexion->Left = $bw-$fw;
    }
    }

}

global $application;

global $uconexion;

//Creates the form
$uconexion=new uconexion($application);

//Read from resource file
$uconexion->loadResource(__FILE__);

//Shows the form
$uconexion->show();

?>