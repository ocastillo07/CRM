<?php
require_once("vcl/vcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class Index extends Page
{
   public $Label3 = null;
   public $Label2 = null;
   public $ComboBox2 = null;
   public $Label1 = null;
   public $ComboBox1 = null;
   function ComboBox1JSChange($sender, $params)
   {
?>
        ComboBox1=findObj('ComboBox1');
        ComboBox2=findObj('ComboBox2');
        ComboBox2.options.length=0;
        switch(ComboBox1.selectedIndex)
        {
            case 0:
            ComboBox2.options[ComboBox2.options.length] = new Option('Selection 1 - 1','11');
            ComboBox2.options[ComboBox2.options.length] = new Option('Selection 1 - 2','12');
            ComboBox2.options[ComboBox2.options.length] = new Option('Selection 1 - 3','13');
            break;
            case 1:
            ComboBox2.options[ComboBox2.options.length] = new Option('Selection 2 - 1','21');
            ComboBox2.options[ComboBox2.options.length] = new Option('Selection 2 - 2','22');
            ComboBox2.options[ComboBox2.options.length] = new Option('Selection 2 - 3','23');
            break;
            case 2:
            ComboBox2.options[ComboBox2.options.length] = new Option('Selection 3 - 1','31');
            ComboBox2.options[ComboBox2.options.length] = new Option('Selection 3 - 2','32');
            ComboBox2.options[ComboBox2.options.length] = new Option('Selection 3 - 3','33');
            break;
        }
       <?php
   }




}

global $application;

global $Index;

//Creates the form
$Index = new Index($application);

//Read from resource file
$Index->loadResource(__FILE__);

//Shows the form
$Index->show();

?>