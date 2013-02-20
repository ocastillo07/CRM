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
use_unit("checklst.inc.php");
use_unit("imglist.inc.php");
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class Unit3 extends Page
{
   public $ImageList1 = null;
   public $ButtonView1 = null;
   function ButtonView1JSClick($sender, $params)
   {
?>
      //Add your javascript code here
      tag=event.getTarget().tag;
      alert("Button Tag ID:" + tag + " clicked");
<?php

   }
}

global $application;

global $Unit3;

//Creates the form
$Unit3 = new Unit3($application);

//Read from resource file
$Unit3->loadResource(__FILE__);

//Shows the form
$Unit3->show();

?>