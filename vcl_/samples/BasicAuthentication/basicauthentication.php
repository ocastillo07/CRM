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
use_unit("auth.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class PasswordProtectedPage extends Page
{
   public $Label1 = null;
   public $BasicAuthentication1 = null;
   function BasicAuthentication1Authenticate($sender, $params)
   {
      //You can use the Username and Password properties to automatically check for that
      //But if you want to search in a list/database, you can use the OnAuthenticate event
      if (($params['username'] == 'delphiforphp') && ($params['password'] == 'rules'))
      {
         return(true);
      }
      else return(false);
   }

   function PasswordProtectedPageBeforeShow($sender, $params)
   {
      $this->BasicAuthentication1->Execute();
   }

}

global $application;

global $PasswordProtectedPage;

//Creates the form
$PasswordProtectedPage = new PasswordProtectedPage($application);

//Read from resource file
$PasswordProtectedPage->loadResource(__FILE__);

//Shows the form
$PasswordProtectedPage->show();

?>