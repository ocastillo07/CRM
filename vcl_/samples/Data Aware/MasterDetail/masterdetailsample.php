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
class MasterDetail extends Page
{
   public $oscommerce = null;
   public $ddproducts_description1 = null;
   public $dsproducts_description1 = null;
   public $tbproducts_description1 = null;
   public $ddproducts1 = null;
   public $dsproducts1 = null;
   public $tbproducts1 = null;

   function ddproducts1JSRowChanged($sender, $params)
   {
?>
      products_id=ddproducts1.getTableModel().getValue(0, ddproducts1.getFocusedRow());
      params=products_id;
<?php
      echo $this->ddproducts1->ajaxCall("updateDetail");
   }

   function updateDetail($sender, $params)
   {
      $this->tbproducts1->products_id = $params;
      $this->tbproducts_description1->Refresh();
      $this->tbproducts1->Cancel();
   }
}

global $application;

global $MasterDetail;

//Creates the form
$MasterDetail = new MasterDetail($application);

//Read from resource file
$MasterDetail->loadResource(__FILE__);

//Shows the form
$MasterDetail->show();

?>