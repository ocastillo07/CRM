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


require_once("vcl/vcl.inc.php");
require_once("configure.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class BlogDB extends DataModule
{
   public $Query1 = null;
   public $CommentsDatasource1 = null;
   public $BlogsDatasource1 = null;
   public $CommentsTable1 = null;
   public $BlogsTable1 = null;
   public $Database1 = null;
}

global $application;

global $BlogDB;

//Creates the form
$BlogDB = new BlogDB($application);

//Read from resource file
$BlogDB->loadResource(__FILE__);

$BlogDB->Database1->DatabaseName = $DbName;
$BlogDB->Database1->Host = $DbHost;
$BlogDB->Database1->UserName = $DbUser;
$BlogDB->Database1->UserPassword = $DbPass;
$BlogDB->Database1->Connected = true;

$BlogDB->BlogsTable1->Filter = '';
$BlogDB->CommentsTable1->Filter = '';

$BlogDB->BlogsTable1->close();
$BlogDB->CommentsTable1->close();

?>