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
use_unit("dbctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class AdminOrders extends Page
{
   public $Orders = null;

   function AdminOrdersBeforeShow($sender, $params)
   {
      $str = '';
      $ordersQuery = GetDBModule()->OrdersQuery;
      $ordersQuery->Active = true;

      for($ordersQuery->First(); !$ordersQuery->EOF; $ordersQuery->Next())
      {
         $row = '<tr>';
         $row .= '<td>' . $ordersQuery->OrderID . '</td>';
         $row .= '<td>' . $ordersQuery->PersonalName . '</td>';
         $row .= '<td>' . $ordersQuery->Date . '</td>';
         $row .= '<td>$' . $ordersQuery->Total . '</td>';
         $row .= '<td><a href="admin.php?page=view&id=' . $ordersQuery->OrderID . '">View</a></td>';
         $row .= '</tr>';

         $str .= $row;
      }

      $this->Orders->Value = $str;
   }
}

global $application;

global $AdminOrders;

//Creates the form
$AdminOrders = new AdminOrders($application);

//Read from resource file
$AdminOrders->loadResource(__FILE__ );

//Shows the form
$AdminOrders->show();

?>