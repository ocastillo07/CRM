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
require_once("blog_db.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("rtl.inc.php");

//Class definition
class AdminDelete extends Page
{
   public $Label2 = null;
   public $Label1 = null;

   function AdminDeleteCreate($sender, $params)
   {
      global $BlogDB;

      // Make sure that the user is a logged in administrator.
      GetAdminLogin()->EnsureLogin();

      // Make sure that a valid blog post ID was sent.
      if(!isset($_REQUEST['id']) || !strlen($_REQUEST['id']))
         throw new Exception("ID not specified");

      // Retrieve the blog post id.
      $id = $_REQUEST['id'];

      // Delete the blog post.
      $BlogDB->BlogsTable1->Filter = 'ID = ' . mysql_real_escape_string($id);
      $BlogDB->BlogsTable1->open();
      $BlogDB->BlogsTable1->delete();

      // Redirect back to the main administration page.
      redirect('admin.php');
   }
}

global $application;

global $AdminDelete;

//Creates the form
$AdminDelete = new AdminDelete($application);

//Read from resource file
$AdminDelete->loadResource(__FILE__);

//Shows the form
$AdminDelete->show();

?>