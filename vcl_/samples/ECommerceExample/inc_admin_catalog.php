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
require_once("DbModule.php");
use_unit("dbctrls.inc.php");
use_unit("rawoutput.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class AdminCatalog extends Page
{
   public $Catalog = null;
   public $Label4 = null;
   public $Label1 = null;
   public $Label2 = null;
   public $Image1 = null;
   public $Msg = null;
   public $AddSubmitButton = null;
   public $AddImageInput = null;
   public $AddCostInput = null;
   public $AddNameInput = null;
   function AdminCatalogShow($sender, $params)
   {
      $page = $_REQUEST['page'];
      $db = GetDBModule()->Database1;

      if($page == 'add')
      {
         $prod_name = $this->AddNameInput->Text;
         $prod_cost = $this->AddCostInput->Text;
         $prod_image = $this->AddImageInput->Text;

         if(empty($prod_name) || !strlen($prod_cost))
         {
            $this->Msg->Value = "Can't add product. Product name or cost empty.";
         }

         $query = 'INSERT INTO products (ProdName,Image,Price) VALUES(' . $db->Param('ProdName') . ',' . $db->Param('Image') . ',' . $db->Param('Price') . ')';
         $params = array
         (
          $prod_name,
          $prod_image,
          $prod_cost,
          );

         $db->Execute($query, $params);

         $this->AddNameInput->Text = '';
         $this->AddCostInput->Text = '';
         $this->AddImageInput->Text = '';

         GetDBModule()->Table1->close();
         GetDBModule()->Table1->open();
      }
      else if($page == 'delete')
         {
            $id = $_REQUEST['id'];

            $query = 'DELETE FROM products WHERE ID = ' . $db->Param('ID');
            $params = array($id);

            $db->Execute($query, $params);

            GetDBModule()->Table1->close();
            GetDBModule()->Table1->open();
         }

      $this->Catalog->DataSource = GetDBModule()->Datasource1;
   }


   function Label3BeforeShow($sender, $params)
   {
      $sender->Link = 'admin.php?page=delete&id=' . GetDBModule()->Table1->ID;
   }

   function Image1BeforeShow($sender, $params)
   {
      $sender->ImageSource = 'images/' . GetDBModule()->Table1->Image;
   }

   function Label2BeforeShow($sender, $params)
   {
      $sender->Caption = '$' . sprintf("%01.2f", GetDBModule()->Table1->Price );
   }

   function Label1BeforeShow($sender, $params)
   {
      $sender->Caption = GetDBModule()->Table1->ProdName;
   }

}

global $application;

global $AdminCatalog;

//Creates the form
$AdminCatalog = new AdminCatalog($application);

//Read from resource file
$AdminCatalog->loadResource(__FILE__ );

//Shows the form
$AdminCatalog->show();

?>