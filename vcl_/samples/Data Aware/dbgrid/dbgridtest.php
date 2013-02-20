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
class DBGridTest extends Page
{
   public $meLog = null;
   public $ddproducts1 = null;
   public $dsproducts1 = null;
   public $dboscommerce1 = null;
   public $tbproducts1 = null;
   function ddproducts1JSRowSaved($sender, $params)
   {
?>
      document.DBGridTest.meLog.value+="row saved\n";
      if (event.ex == null)
      {
        document.DBGridTest.meLog.value+="sucessful, result: "+event.result+"\n";
      }
      else
      {
        document.DBGridTest.meLog.value+="error, result: "+event.ex+"\n";
      }
<?php
   }

   function ddproducts1JSDataChanged($sender, $params)
   {
?>
      document.DBGridTest.meLog.value+="datachange\n";
<?php
   }
}

global $application;

global $DBGridTest;

//Creates the form
$DBGridTest = new DBGridTest($application);

//Read from resource file
$DBGridTest->loadResource(__FILE__);

//Shows the form
$DBGridTest->show();

?>