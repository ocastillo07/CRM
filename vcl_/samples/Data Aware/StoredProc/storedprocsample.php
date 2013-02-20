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
use_unit("comctrls.inc.php");
use_unit("dbgrids.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class StoredProcSample extends Page
{
   public $Label1 = null;
   public $DBGrid2 = null;
   public $Datasource2 = null;
   public $StoredProc2 = null;
   public $tbcustomers = null;
   public $cbCustomers = null;
   public $StoredProc1 = null;
   public $dbemployee = null;
   public $Button1 = null;
   public $DBGrid1 = null;
   public $Datasource1 = null;
   public $Query1 = null;
   function cbCustomersBeforeShow($sender, $params)
   {
      $items = array();
      $this->tbcustomers->First();
      while (!$this->tbcustomers->EOF)
      {
         $items[$this->tbcustomers->CUST_NO] = $this->tbcustomers->CUSTOMER;
         $this->tbcustomers->Next();
      }
      $this->cbCustomers->Items = $items;
   }

   function Button1Click($sender, $params)
   {
      $params = array();
      $params[] = $this->cbCustomers->ItemIndex;
      $this->StoredProc1->Params = $params;

      //Prepare the stored proc
      $this->StoredProc1->Prepare();

      //Reopen the dataset
      $this->StoredProc1->close();
      $this->StoredProc1->open();
   }
}

global $application;

global $StoredProcSample;

//Creates the form
$StoredProcSample = new StoredProcSample($application);

//Read from resource file
$StoredProcSample->loadResource(__FILE__);

//Shows the form
$StoredProcSample->show();

?>