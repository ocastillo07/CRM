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
use_unit("rawoutput.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class Checkout extends Page
{
   public $SubmitButton = null;
   public $Msg = null;

   protected $CartValue = '';

   function CheckoutTemplate($sender, $params)
   {
      global $ECommerceMain;

      $template = $params['template'];
      $items = explode(',', $this->CartValue );

      $str = '';
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

         $str .= '<tr>';
         $str .= '<td>' . GetDBModule()->Query1->ProdName . '</td>';
         $str .= '<td width="50">$' . sprintf("%01.2f", GetDBModule()->Query1->Price * $quantity) . '</td>';
         $str .= '<td width="50"><a href="index.php?page=delete&id=' . $id . '">Delete</a></td>';
         $str .= "</tr>\r\n";

         $subtotal += GetDBModule()->Query1->Price * $quantity;
      }

      $template->_smarty->assign('CartContentsStr', $str);
      $template->_smarty->assign('SubtotalStr', '$' . sprintf("%01.2f", $subtotal));
      $template->_smarty->assign('TotalStr', '$' . sprintf("%01.2f", $subtotal));

      $query =
      "SELECT * FROM users WHERE Username = " . GetDBModule()->Database1->Param('Username');

      GetDBModule()->Query1->close();
      GetDBModule()->Query1->SQL = $query;
      GetDBModule()->Query1->Params = array($ECommerceMain->CurrentUserLogin->GetLoggedInUser());
      GetDBModule()->Query1->open();

      if(GetDBModule()->Query1->RecordCount > 0)
      {
         $template->_smarty->assign('NameStr', GetDBModule()->Query1->PersonalName );
         $template->_smarty->assign('AddressStr', GetDBModule()->Query1->Address );
         $template->_smarty->assign('CityStr', GetDBModule()->Query1->City );
         $template->_smarty->assign('StateStr', GetDBModule()->Query1->AddrState );
         $template->_smarty->assign('CountryStr', GetDBModule()->Query1->Country );
         $template->_smarty->assign('PostcodeStr', GetDBModule()->Query1->Postcode );
         $template->_smarty->assign('PhoneStr', GetDBModule()->Query1->Phone );
      }

      GetDBModule()->Query1->close();
   }

   function CheckoutCreate($sender, $params)
   {
      global $ECommerceMain;

      $this->CartValue = $_COOKIE['cart'];

      if(empty($this->CartValue ))
      {
         $this->TemplateFilename = 'templates/empty_cart.tpl';
         return;
      }

      if($_REQUEST['registered'] == 1)
      {
         $this->Msg->Value = 'You have successfully registered. Click Login below to sign in to your account to start the checkout process.';
      }

      if($ECommerceMain->CurrentUserLogin->GetLoggedInUser() === false )
      {
         // User not logged in, so show the login/register page.
         $this->TemplateFilename = 'templates/login_register.tpl';
         return;
      }

      $this->TemplateFilename = 'templates/checkout.tpl';
   }
}

global $application;

global $Checkout;

//Creates the form
$Checkout = new Checkout($application);

//Read from resource file
$Checkout->loadResource(__FILE__ );

//Shows the form
$Checkout->show();

?>