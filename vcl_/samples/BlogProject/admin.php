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
use_unit("auth.inc.php");
use_unit("dbctrls.inc.php");
use_unit("dbtables.inc.php");
require_once("blog_db.php");
use_unit("dbgrids.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class Admin extends Page
{
   public $Query1 = null;
   public $Label12 = null;
   public $Label11 = null;
   public $Label10 = null;
   public $Label9 = null;
   public $Label8 = null;
   public $Label7 = null;
   public $Label6 = null;
   public $Label5 = null;
   public $Label4 = null;
   public $Label3 = null;
   public $DBRepeater1 = null;
   public $Panel1 = null;
   public $Label2 = null;
   public $Label1 = null;

   function AdminCreate($sender, $params)
   {
      global $BlogDB;

      // Make sure that the user is a logged in administrator.
      GetAdminLogin()->EnsureLogin();

      // Open the blog table.
      $BlogDB->BlogsTable1->Filter = '';
      $BlogDB->BlogsTable1->open();

      // Setup the DBRepeater to read from the correct data source.
      $this->DBRepeater1->DataSource = $BlogDB->BlogsDatasource1;
   }

   function Label11BeforeShow($sender, $params)
   {
      global $BlogDB;

      // Setup the link to the Comments label.
      $sender->link = "admin_comments.php?id=" . $BlogDB->BlogsTable1->ID;
   }

   function Label9BeforeShow($sender, $params)
   {
      global $BlogDB;

      // Setup the link to the delete post link, including a confirmation JavaScript pop-up dialog.
      $sender->link = "javascript: if( confirm( 'Are you sure you want to delete this blog post?' ) ) window.location = 'admin_delete.php?id=" . $BlogDB->BlogsTable1->ID . "';";
   }

   function Label7BeforeShow($sender, $params)
   {
      global $BlogDB;

      // Setup the link to the Edit post form.
      $sender->link = "admin_edit.php?id=" . $BlogDB->BlogsTable1->ID;
   }
}

global $application;

global $Admin;

//Creates the form
$Admin = new Admin($application);

//Read from resource file
$Admin->loadResource(__FILE__);

//Shows the form
$Admin->show();

?>