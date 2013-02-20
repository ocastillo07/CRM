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
use_unit("dbgrids.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class Index extends Page
{
   public $Label1 = null;
   public $Button1 = null;
   function Button1JSClick($sender, $params)
   {
      //Dump the call using Ajax to the Button1Click event
      echo $this->Button1->ajaxCall("Button1Click");
?>
      //Return false to prevent the button submit the form
      return(false);
      <?php
   }

   function Button1Click($sender, $params)
   {
      $this->Button1->Caption = "clicked Ajax " . date("Y-m-d g:i:s a");
      $this->Label1->Caption = "Hello from Ajax!! " . date("Y-m-d g:i:s a");
      $this->Label1->Color = "#" . dechex(rand(0, 0xFFFFFF));
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