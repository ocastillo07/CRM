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
use_unit("rawinclude.inc.php");
use_unit("dbctrls.inc.php");
use_unit("userlogin.inc.php");
use_unit("rawoutput.inc.php");
use_unit("dbtables.inc.php");
require_once("DbModule.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
require_once('configure.php');

//Class definition
class ECommerceMain extends Page
{
   public $PageContent = null;

   public $Label1 = null;
   public $Image1 = null;
   public $AdBar = null;
   public $CurrentUserLogin = null;
   public $PageTitle = null;

   function ECommerceMainTemplate($sender, $params)
   {
      global $SiteName;

      $template = $params['template'];
      $template->_smarty->assign('PageTitleStr', $SiteName);
   }

   function ECommerceMainCreate($sender, $params)
   {
      global $SiteName;

      $this->PageTitle->Value = $SiteName;
      $this->CurrentUserLogin->Database = GetDBModule()->Database1;
      $this->CurrentUserLogin->UserTable = 'users';

      $page = $_REQUEST['page'];
      $origpage = $page;
      if($origpage == 'logout')
         $origpage = '';

      $this->CurrentUserLogin->LoginLink = 'index.php?page=login&orig=' . $origpage;
      $this->CurrentUserLogin->LogoutLink = 'index.php?page=logout';

      if($page == 'logout')
         $this->CurrentUserLogin->LogoutUser();

      $page_map = array
      (
       'catalog' => 'catalog',
       'add' => 'cart',
       'delete' => 'cart',
       'cart' => 'cart',
       'update' => 'cart',
       'checkout' => 'checkout',
       'login' => 'login',
       'logout' => 'logout',
       'register' => 'register',
       'order' => 'order'
       );

      if(array_key_exists($page, $page_map))
      {
         $page = $page_map[$page];
      }
      else
      {
         $page = 'home';
      }

      $this->PageContent->Include = 'inc_' . $page . '.php';
   }

   function Label1BeforeShow($sender, $params)
   {
      $sender->Caption = GetDBModule()->AdQuery->ProdName . ' @ $' . sprintf("%01.2f", GetDBModule()->AdQuery->Price );
   }

   function Image1BeforeShow($sender, $params)
   {
      $sender->ImageSource = 'images/' . GetDBModule()->AdQuery->Image;
   }
}

global $application;

global $ECommerceMain;

//Creates the form
$ECommerceMain = new ECommerceMain($application);

//Read from resource file
$ECommerceMain->loadResource(__FILE__ );

//Shows the form
$ECommerceMain->show();

?>