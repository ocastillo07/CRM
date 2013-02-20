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
use_unit("dbgrids.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class TransactionsSample extends Page
{
   public $btnCancel = null;
   public $btnSuccess = null;
   public $ddEMPLOYEE1 = null;
   public $dsEMPLOYEE1 = null;
   public $dbEMPLOYEE1 = null;
   public $tbEMPLOYEE1 = null;
   function btnCancelClick($sender, $params)
   {
      $this->dbEMPLOYEE1->BeginTrans();
      $this->tbEMPLOYEE1->Append();
      $this->tbEMPLOYEE1->FIRST_NAME = "TEST";
      $this->tbEMPLOYEE1->LAST_NAME = "TEST";
      $this->tbEMPLOYEE1->DEPT_NO = "600";
      $this->tbEMPLOYEE1->JOB_CODE = "VP";
      $this->tbEMPLOYEE1->JOB_GRADE = "2";
      $this->tbEMPLOYEE1->JOB_COUNTRY = "USA";
      $this->tbEMPLOYEE1->SALARY = "100000";
      $this->tbEMPLOYEE1->Post();
      $this->dbEMPLOYEE1->CompleteTrans(false);
      $this->tbEMPLOYEE1->Refresh();
   }

   function btnSuccessClick($sender, $params)
   {
      $this->dbEMPLOYEE1->BeginTrans();
      $this->tbEMPLOYEE1->Append();
      $this->tbEMPLOYEE1->FIRST_NAME = "TEST";
      $this->tbEMPLOYEE1->LAST_NAME = "TEST";
      $this->tbEMPLOYEE1->DEPT_NO = "600";
      $this->tbEMPLOYEE1->JOB_CODE = "VP";
      $this->tbEMPLOYEE1->JOB_GRADE = "2";
      $this->tbEMPLOYEE1->JOB_COUNTRY = "USA";
      $this->tbEMPLOYEE1->SALARY = "100000";
      $this->tbEMPLOYEE1->Post();
      $this->tbEMPLOYEE1->Refresh();
      $this->dbEMPLOYEE1->CompleteTrans();
   }
}

global $application;

global $TransactionsSample;

//Creates the form
$TransactionsSample = new TransactionsSample($application);

//Read from resource file
$TransactionsSample->loadResource(__FILE__);

//Shows the form
$TransactionsSample->show();

?>