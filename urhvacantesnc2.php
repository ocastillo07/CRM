<?php
require_once("vcl/vcl.inc.php");
//Includes
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class urhvacantesnc2 extends Page
{
       public $lbdetalle = null;
       public $Button1 = null;
       public $DateTimePicker3 = null;
       public $CheckBox4 = null;
       public $Label22 = null;
       public $Edit14 = null;
       public $Label21 = null;
       public $Edit12 = null;
       public $Label19 = null;
       public $Label18 = null;
       public $Memo3 = null;
       public $Label17 = null;
       public $Edit11 = null;
       public $Label16 = null;
       public $Edit10 = null;
       public $Label15 = null;
       public $Edit9 = null;
       public $Label14 = null;
       public $Label13 = null;
       public $Memo2 = null;
       public $Label12 = null;
       public $Memo1 = null;
       public $Label11 = null;
       public $Edit8 = null;
       public $Edit7 = null;
       public $Label10 = null;
       public $CheckBox3 = null;
       public $CheckBox2 = null;
       public $CheckBox1 = null;
       public $Edit6 = null;
       public $Label9 = null;
       public $ComboBox1 = null;
       public $Label7 = null;
       public $RadioGroup1 = null;
       public $Label4 = null;
       public $Edit5 = null;
       public $Label3 = null;
       public $Edit2 = null;
       public $Label2 = null;
       public $Label8 = null;
       public $Edit1 = null;
       public $Label1 = null;
       public $Edit4 = null;
       public $Label6 = null;
       public $Edit3 = null;
       public $Label5 = null;
       public $pbotones = null;
       public $lbtitulo = null;
       public $btncerrar = null;
       public $btnguardarcerrar = null;
       public $btnguardar = null;
       function urhvacantesnc2JSLoad($sender, $params)
       {

       ?>
       //Add your javascript code here
       vcl.$('lbdetalle').innerHtml = '
<table width="800" border="0">
  <tr>
    <td bgcolor="#FF8040">Equipo y Herramienta </td>
    <td bgcolor="#FF8040">Cuenta con ella </td>
    <td bgcolor="#FF8040">Accion para obtenerla </td>
    <td bgcolor="#FF8040"><p>Fecha</p>
    </td>
  </tr>
  <tr>
    <td bgcolor="#c0c0c0">Carro</td>
    <td bgcolor="#c0c0c0">si</td>
    <td bgcolor="#c0c0c0">&nbsp;</td>
    <td bgcolor="#c0c0c0">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#f2f2f2">Laptop</td>
    <td bgcolor="#f2f2f2">no</td>
    <td bgcolor="#f2f2f2">comprar</td>
    <td bgcolor="#f2f2f2">2012/04/01</td>
  </tr>
  <tr>
    <td bgcolor="#c0c0c0">Maletin</td>
    <td bgcolor="#c0c0c0">no</td>
    <td bgcolor="#c0c0c0">comprar</td>
    <td bgcolor="#c0c0c0">2012/04/01</td>
  </tr>
</table>
';
       <?php

       }




}

global $application;

global $urhvacantesnc2;

//Creates the form
$urhvacantesnc2=new urhvacantesnc2($application);

//Read from resource file
$urhvacantesnc2->loadResource(__FILE__);

//Shows the form
$urhvacantesnc2->show();

?>