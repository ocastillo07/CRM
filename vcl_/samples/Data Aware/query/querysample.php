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
class QuerySample extends Page
{
   public $dtEnd = null;
   public $Label2 = null;
   public $Label1 = null;
   public $dtInit = null;
   public $Button1 = null;
   public $DBGrid1 = null;
   public $Datasource1 = null;
   public $Query1 = null;
   public $dboscommerce1 = null;
   function Button1Click($sender, $params)
   {
      //Setup a filter with Params

      $this->Query1->Filter = " id>=" . $this->dboscommerce1->Param('init') . " and id<=" . $this->dboscommerce1->Param('end') . "";

      //Setup the params array
      $params = array();
      $params[] = $this->dtInit->Text;
      $params[] = $this->dtEnd->Text;
      $this->Query1->Params = $params;

      //Prepare the query
      $this->Query1->Prepare();

      //Reopen the dataset
      $this->Query1->close();
      $this->Query1->open();
   }
}

global $application;

global $QuerySample;

//Creates the form
$QuerySample = new QuerySample($application);

//Read from resource file
$QuerySample->loadResource(__FILE__);

//Shows the form
$QuerySample->show();

?>