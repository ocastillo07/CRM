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


//Includes
require_once("vcl/vcl.inc.php");
use_unit("buttons.inc.php");
use_unit("imglist.inc.php");
use_unit("menus.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class MainMenuSample extends Page
{
   public $btnClose = null;
   public $Label1 = null;
   public $Window1 = null;
   public $ImageList1 = null;
   public $MainMenu1 = null;
   function btnCloseJSClick($sender, $params)
   {
?>
      //Add your javascript code here
      Window1.close();
<?php
   }

   function MainMenu1JSClick($sender, $params)
   {
?>
      //Add your javascript code here
      Window1.open();
<?php
   }

}

global $application;

global $MainMenuSample;

//Creates the form
$MainMenuSample = new MainMenuSample($application);

//Read from resource file
$MainMenuSample->loadResource(__FILE__);

//Shows the form
$MainMenuSample->show();

?>