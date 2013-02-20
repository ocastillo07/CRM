<?php
/**
*  This file is part of the VCL for PHP project
*
*  Copyright (c) 2004-2008 qadram software S.L. <support@qadram.com>
*
*  Checkout AUTHORS file for more information on the developers
*
*  This library is free software; you can redistribute it and/or
*  modify it under the terms of the GNU Lesser General Public
*  License as published by the Free Software Foundation; either
*  version 2.1 of the License, or (at your option) any later version.
*
*  This library is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
*  Lesser General Public License for more details.
*
*  You should have received a copy of the GNU Lesser General Public
*  License along with this library; if not, write to the Free Software
*  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307
*  USA
*
*/


require_once("vcl/vcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class ComboBoxSample extends Page
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

global $ComboBoxSample;

//Creates the form
$ComboBoxSample = new ComboBoxSample($application);

//Read from resource file
$ComboBoxSample->loadResource(__FILE__);

//Shows the form
$ComboBoxSample->show();

?>