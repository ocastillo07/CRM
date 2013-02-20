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
class AdminView extends Page
{
   function AdminViewTemplate($sender, $params)
   {
      $id = $_REQUEST['id'];
      $template = $params['template'];

      $template->_smarty->assign('ID', $id);

      $query =
      "SELECT * FROM orders " .
      "INNER JOIN users ON orders.User = users.ID " .
      "WHERE orders.ID = " . GetDBModule()->Database1->Param('ID');

      GetDBModule()->Query1->close();
      GetDBModule()->Query1->SQL = $query;
      GetDBModule()->Query1->Params = array($id);
      GetDBModule()->Query1->open();

      $template->_smarty->assign('Subtotal', '$' . sprintf("%01.2f", GetDBModule()->Query1->Subtotal ));
      $template->_smarty->assign('Total', '$' . sprintf("%01.2f", GetDBModule()->Query1->Total ));
      $template->_smarty->assign('PersonalName', GetDBModule()->Query1->PersonalName );
      $template->_smarty->assign('Address', GetDBModule()->Query1->Address );
      $template->_smarty->assign('City', GetDBModule()->Query1->City );
      $template->_smarty->assign('AddrState', GetDBModule()->Query1->AddrState );
      $template->_smarty->assign('Country', GetDBModule()->Query1->Country );
      $template->_smarty->assign('Postcode', GetDBModule()->Query1->Postcode );
      $template->_smarty->assign('Phone', GetDBModule()->Query1->Phone );

      GetDBModule()->Query1->close();

      $query =
      "SELECT * FROM orders_products " .
      "INNER JOIN products ON orders_products.ProductID = products.ID " .
      "WHERE OrderID = " . GetDBModule()->Database1->Param('OrderID');

      GetDBModule()->Query1->SQL = $query;
      GetDBModule()->Query1->Params = array($id);
      GetDBModule()->Query1->open();

      $str = '';

      for(GetDBModule()->Query1->first(); !GetDBModule()->Query1->EOF; GetDBModule()->Query1->next())
      {
         $str .= '<tr>';
         $str .= '<td>' . GetDBModule()->Query1->ProdName . '</td>';
         $str .= '<td align="center">' . GetDBModule()->Query1->Quantity . '</td>';
         $str .= '<td align="center">$' . sprintf("%01.2f", GetDBModule()->Query1->Amount ) . '</td>';
         $str .= '</tr>';
      }

      GetDBModule()->Query1->close();

      $template->_smarty->assign('CartContents', $str);
   }
}

global $application;

global $AdminView;

//Creates the form
$AdminView = new AdminView($application);

//Read from resource file
$AdminView->loadResource(__FILE__ );

//Shows the form
$AdminView->show();

?>