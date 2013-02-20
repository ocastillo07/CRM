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
require_once("masterpage.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class Index extends MasterPage
{
   public $Label1 = null;
   public $Memo1 = null;
   public $Button1 = null;
   public $pnIndex = null;
   function IndexStartBody($sender, $params)
   {
      //And now is set to false, so we decide when to show the
      //panel contents
      $this->pnIndex->Visible = false;
   }

   function IndexShowHeader($sender, $params)
   {
      //We need to set the panel visible here to allow it
      //add all the header javascript to all the components inside
      $this->pnIndex->Visible = true;
   }

   function Button1Click($sender, $params)
   {
      $this->Memo1->AddLine("test");
   }

   function pnContentsShow($sender, $params)
   {
      $this->pnIndex->show();
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