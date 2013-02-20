<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   {
   redirect("login.php");
   }
require_once("vcl/vcl.inc.php");
//Includes
use_unit("db.inc.php");
use_unit("mysql.inc.php");
use_unit("comctrls.inc.php");
use_unit("buttons.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class uconfiguraciones extends Page
{
       public $edvendedor = null;
       public $Label12 = null;
       public $lbtitulo = null;
       public $edligero = null;
       public $edtracto = null;
       public $edbus = null;
       public $edrabon = null;
       public $edthorton = null;
       public $edventa = null;
       public $edcompra = null;
       public $Label9 = null;
       public $Label8 = null;
       public $Label7 = null;
       public $Label6 = null;
       public $Label5 = null;
       public $Label4 = null;
       public $Label3 = null;
       public $Label2 = null;
       public $Label1 = null;
       public $pbotones = null;
       public $btnguardarcerrar = null;
       public $btnguardar = null;
       public $btnregresar = null;

       function uconfiguracionesCreate($sender, $params)
       {
         if(Derechos('Accesar Configuraciones') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert("Usted no tiene derechos para accesar a configuraciones");
                  document.location.href("menu.php");
                  </script>';
            exit;
         }
       }

       function btnregresarClick($sender, $params)
       {
         redirect('menu.php');
       }

       function btnguardarcerrarClick($sender, $params)
       {
         $this->guardar();
         redirect('menu.php');
       }

       function btnguardarClick($sender, $params)
       {
         $this->guardar();
       }

       function guardar()
       {
         $sql='update monedas set tc='.$this->edventa->text.' where idmoneda=1';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $sql='update monedas set tc='.$this->edcompra->text.' where idmoneda=2';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $sql='update camionestipos set margenutilidad='.$this->edthorton->text.' where idtipo=1';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $sql='update camionestipos set margenutilidad='.$this->edrabon->text.' where idtipo=2';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $sql='update camionestipos set margenutilidad='.$this->edbus->text.' where idtipo=3';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $sql='update camionestipos set margenutilidad='.$this->edtracto->text.' where idtipo=4';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $sql='update camionestipos set margenutilidad='.$this->edligero->text.' where idtipo=5';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);

         $sql= 'update configuraciones set valor="'.$this->edvendedor->Text.'" where concepto="PuestoVendedor"';
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);

			dmconexion::Log('Modifico configuraciones',1);
       }


       function edligeroJSKeyPress($sender, $params)
       {

       ?>
       //Add your javascript code here
         if((event.keyCode<48 || event.keyCode>57)&& event.keyCode!=46)
         {
            alert('No es un valor numerico');
            return false;
         }
       <?php

       }

       function edtractoJSKeyPress($sender, $params)
       {

       ?>
       //Add your javascript code here
           if((event.keyCode<48 || event.keyCode>57)&& event.keyCode!=46)
         {
            alert('No es un valor numerico');
            return false;
         }
       <?php

       }

       function edbusJSKeyPress($sender, $params)
       {

       ?>
       //Add your javascript code here
          if((event.keyCode<48 || event.keyCode>57)&& event.keyCode!=46)
         {
            alert('No es un valor numerico');
            return false;
         }
       <?php

       }

       function edrabonJSKeyPress($sender, $params)
       {

       ?>
       //Add your javascript code here
           if((event.keyCode<48 || event.keyCode>57)&& event.keyCode!=46)
         {
            alert('No es un valor numerico');
            return false;
         }
       <?php

       }

       function edthortonJSKeyPress($sender, $params)
       {

       ?>
       //Add your javascript code here
          if((event.keyCode<48 || event.keyCode>57)&& event.keyCode!=46)
         {
            alert('No es un valor numerico');
            return false;
         }
       <?php

       }

       function edventaJSKeyPress($sender, $params)
       {

       ?>
       //Add your javascript code here
         if((event.keyCode<48 || event.keyCode>57)&& event.keyCode!=46)
         {
            alert('No es un valor numerico');
            return false;
         }
       <?php

       }

       function edcompraJSKeyPress($sender, $params)
       {

       ?>
       //Add your javascript code here
         if((event.keyCode<48 || event.keyCode>57)&& event.keyCode!=46)
         {
            alert('No es un valor numerico');
            return false;
         }
       <?php

       }


       function uconfiguracionesShow($sender, $params)
       {
         $this->pbotones->Width = $_SESSION["width"];
         $this->lbtitulo->Caption= $this->Caption;
         $sql='select  camionestipos.idtipo, camionestipos.margenutilidad as margen'.
               ' from camionestipos';
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         while($row=mysql_fetch_array($rs))
         {
            if($row['idtipo']=='1')
               $this->edthorton->Text=$row['margen'];
            if($row['idtipo']=='2')
               $this->edrabon->Text=$row['margen'];
            if($row['idtipo']=='3')
               $this->edbus->Text=$row['margen'];
            if($row['idtipo']=='4')
               $this->edtracto->Text=$row['margen'];
            if($row['idtipo']=='5')
               $this->edligero->Text=$row['margen'];
         }
         $sql='select monedas.idmoneda, monedas.tc '.
              ' from monedas';
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         while($row=mysql_fetch_array($rs))
         {
            if($row['idmoneda']=='1')
               $this->edventa->Text=round($row['tc'],2);
            if($row['idmoneda']=='2')
               $this->edcompra->Text=round($row['tc'],2);
         }

         $sql='select valor from configuraciones where concepto ="PuestoVendedor"';
         $rs= mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         $row= mysql_fetch_row($rs);
         $this->edvendedor->Text= $row[0];
       }


}

global $application;

global $uconfiguraciones;

//Creates the form
$uconfiguraciones=new uconfiguraciones($application);

//Read from resource file
$uconfiguraciones->loadResource(__FILE__);

//Shows the form
$uconfiguraciones->show();

?>