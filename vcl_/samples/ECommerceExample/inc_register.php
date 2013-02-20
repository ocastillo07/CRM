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
use_unit("stdctrls.inc.php");
use_unit("rawoutput.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
require_once("common.inc.php");

//Class definition
class Register extends Page
{
   public $NameEdit = null;
   public $Email = null;
   public $RegMsg = null;
   public $Phone = null;
   public $Postcode = null;
   public $Country = null;
   public $State = null;
   public $City = null;
   public $Address = null;
   public $Password = null;
   public $Username = null;
   public $SubmitButton = null;

   function RegisterShow($sender, $params)
   {
      $reg_data = array
      (
       'Username' => $this->Username->Text,
       'Password' => $this->Password->Text,
       'LoginID' => 'dummy',
       'PersonalName' => $this->NameEdit->Text,
       'Email' => $this->Email->Text,
       'Address' => $this->Address->Text,
       'City' => $this->City->Text,
       'AddrState' => $this->State->Text,
       'Country' => $this->Country->Text,
       'Postcode' => $this->Postcode->Text,
       'Phone' => $this->Phone->Text
       );

      $msg = '';
      foreach($reg_data as $key => $value)
      {
         if(empty($value))
         {
            $msg = 'All fields must not be blank!<br>';
            break;
         }
      }

      if(empty($msg))
      {
         $query =
         "SELECT ID FROM users " .
         "WHERE Username = " . GetDBModule()->Database1->Param('Username') . " OR Email = " . GetDBModule()->Database1->Param('Email');

         GetDBModule()->Query1->close();
         GetDBModule()->Query1->Params = array
         (
          $this->Username->Text,
          $this->Email->Text,
          );
         GetDBModule()->Query1->SQL = $query;
         GetDBModule()->Query1->open();

         if(GetDBModule()->Query1->RecordCount == 0)
         {
            GetDBModule()->Query1->close();

            $fields = array_keys($reg_data);

            $values = array();
            foreach($reg_data as $key => $value)
               $values[] = GetDBModule()->Database1->Param($key);

            $query =
            'INSERT INTO users (' . implode(',', $fields) . ') ' .
            'VALUES(' . implode(',', $values) . ')';

            $parameters = array_values($reg_data);

            GetDBModule()->Database1->Execute($query, $parameters);

            redirect_query('page=checkout&registered=1');
         }
         else
         {
            $msg = "This account already exists. Are you sure that you haven't registered prior to this?";
         }
      }

      if(isset($_REQUEST['submitted']))
         $this->RegMsg->Value = $msg;
   }
}

global $application;

global $Register;

//Creates the form
$Register = new Register($application);

//Read from resource file
$Register->loadResource(__FILE__ );

//Shows the form
$Register->show();

?>