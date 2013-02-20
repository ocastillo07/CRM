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
use_unit("dbctrls.inc.php");
require_once("DbModule.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class CatalogForm extends Page
{
   public $Label3 = null;
   public $Label2 = null;
   public $Label1 = null;
   public $Image1 = null;
   public $Catalog = null;

   protected $UniqueAddId = '';

   function CatalogFormCreate($sender, $params)
   {
      $this->Catalog->DataSource = GetDBModule()->Datasource1;

      $this->UniqueAddId = time();
   }

   function Label3BeforeShow($sender, $params)
   {
      $sender->Link = 'index.php?page=add&id=' . GetDBModule()->Table1->ID . '&uid=' . $this->UniqueAddId;
   }

   function Label2BeforeShow($sender, $params)
   {
      $sender->Caption = '$' . sprintf("%01.2f", GetDBModule()->Table1->Price );
   }

   function Label1BeforeShow($sender, $params)
   {
      $sender->Caption = GetDBModule()->Table1->ProdName;
   }

   function Image1BeforeShow($sender, $params)
   {
      $sender->ImageSource = 'images/' . GetDBModule()->Table1->Image;
   }
}

global $application;

global $CatalogForm;

//Creates the form
$CatalogForm = new CatalogForm($application);

//Read from resource file
$CatalogForm->loadResource(__FILE__ );

//Shows the form
$CatalogForm->show();

?>