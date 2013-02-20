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
require_once("admin_login.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("rtl.inc.php");

//Class definition
class AdminDoLogin extends Page
{
   public $Label4 = null;
   public $Button1 = null;
   public $Edit2 = null;
   public $Label3 = null;
   public $Edit1 = null;
   public $Label1 = null;
   public $Label2 = null;

   function Button1Click($sender, $params)
   {
      global $AdminLogin;

      // Try to login using the specified username and password.
      if($AdminLogin->TryLogin($this->Edit1->Text, $this->Edit2->Text ))
      {
         $this->Label4->Caption = '';

         // Login succeeded, so redirect back to the main admin page.
         redirect("admin.php");
      }
      else
      {
         // Login failed, so update the message.
         $this->Label4->Caption = 'Failed to login. Please check that you are using the correct username and password.';
      }
   }
}

global $application;

global $AdminDoLogin;

//Creates the form
$AdminDoLogin = new AdminDoLogin($application);

//Read from resource file
$AdminDoLogin->loadResource(__FILE__);

//Shows the form
$AdminDoLogin->show();

?>