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
use_unit("rawoutput.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
require_once("common.inc.php");

//Class definition
class Login extends Page
{
   public $LoginMsg = null;
   public $LoginBtn = null;
   public $Password = null;
   public $Username = null;

   function LoginTemplate($sender, $params)
   {
      $template = $params['template'];
      $template->_smarty->assign('Url', 'index.php');
      $template->_smarty->assign('OrigPageStr', $_REQUEST['orig']);
   }

   function LoginShow($sender, $params)
   {
      $u = $this->Username->Text;
      $p = $this->Password->Text;

      $this->Username->Text = '';
      $this->Password->Text = '';

      if(!empty($u) && !empty($p))
      {
         global $ECommerceMain;

         if($ECommerceMain->CurrentUserLogin->LoginUser($u, $p))
         {
            redirect_query('page=' . $_REQUEST['orig']);
         }

         $this->LoginMsg->Value = 'Failed to login. Are you sure that the username and password are correct?';
      }
      else
         if(!empty($u) || !empty($p))
         {
            $this->LoginMsg->Value = 'Failed to login. Are you sure that the username and password are correct?';
         }
   }
}

global $application;

global $Login;

//Creates the form
$Login = new Login($application);

//Read from resource file
$Login->loadResource(__FILE__ );

//Shows the form
$Login->show();

?>