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
use_unit("rawoutput.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class Order extends Page
{
   public $Msg = null;

   function OrderCreate($sender, $params)
   {
      global $ECommerceMain;

      $items = explode(',', $_COOKIE['cart']);
      $subtotal = 0;

      GetDBModule()->Query1->SQL =
      "SELECT * FROM products WHERE ID = " . GetDBModule()->Database1->Param('ID');

      foreach($items as $data)
      {
         list($id, $quantity) = explode('=', $data);

         if(empty($id) || substr($id, 0, 1) == 'U')

            continue;

         GetDBModule()->Query1->close();
         GetDBModule()->Query1->Params = array($id);
         GetDBModule()->Query1->open();

         $subtotal += GetDBModule()->Query1->Price * $quantity;
      }

      $query =
      "SELECT ID FROM users WHERE Username = " . GetDBModule()->Database1->Param('Username');

      GetDBModule()->Query1->close();
      GetDBModule()->Query1->Params = array($ECommerceMain->CurrentUserLogin->GetLoggedInUser());
      GetDBModule()->Query1->SQL = $query;
      GetDBModule()->Query1->open();

      $UserID = GetDBModule()->Query1->ID;

      GetDBModule()->Query1->close();

      $total = $subtotal;

      // Begin a transaction.
      GetDBModule()->Database1->BeginTrans();

      $query =
      "INSERT INTO orders (User,Date,Subtotal,Total) " .
      "VALUES(" . GetDBModule()->Database1->Param('User') . ',' .
      GetDBModule()->Database1->Param('Date') . ',' .
      GetDBModule()->Database1->Param('Subtotal') . ',' .
      GetDBModule()->Database1->Param('Total') . ')';

      $parameters = array
      (
       $UserID,
       date('Y-m-d'),
       $subtotal,
       $total,
       );

      GetDBModule()->Database1->Execute($query, $parameters);

      $OrderID = GetDBModule()->Database1->_connection->Insert_ID('orders', 'ID');

      GetDBModule()->Query1->SQL =
      "SELECT * FROM products WHERE ID = " . GetDBModule()->Database1->Param('ID');

      foreach($items as $data)
      {
         list($id, $quantity) = explode('=', $data);

         if(empty($id) || substr($id, 0, 1) == 'U')
            continue;

         GetDBModule()->Query1->close();
         GetDBModule()->Query1->Params = array($id);
         GetDBModule()->Query1->open();

         $amount = GetDBModule()->Query1->Price * $quantity;

         $query =
         "INSERT INTO orders_products (OrderID,ProductID,Quantity,Amount) " .
         "VALUES(" . GetDBModule()->Database1->Param('OrderID') . ',' .
         GetDBModule()->Database1->Param('ProductID') . ',' .
         GetDBModule()->Database1->Param('Quantity') . ',' .
         GetDBModule()->Database1->Param('Amount') . ')';

         $parameters = array
         (
          $OrderID,
          $id,
          $quantity,
          $amount,
          );

         GetDBModule()->Database1->Execute($query, $parameters);
      }

      // End transaction.
      GetDBModule()->Database1->CompleteTrans();

      setcookie('cart', '');

      $this->Msg->Value = 'Your order has been successfully processed. Thank you for choosing us.';
   }
}

global $application;

global $Order;

//Creates the form
$Order = new Order($application);

//Read from resource file
$Order->loadResource(__FILE__ );

//Shows the form
$Order->show();

?>