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
use_unit("grids.inc.php");
use_unit("comctrls.inc.php");
use_unit("menus.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class UScrollBar extends Page
{
   public $ebPosition = null;
   public $Button1 = null;
   public $lbPosition = null;
   public $ebMax = null;
   public $ebMin = null;
   public $ebPageSize = null;
   public $lbPageSize = null;
   public $lbMax = null;
   public $lbMin = null;
   public $ScrollBar1 = null;
   function ebPositionJSChange($sender, $params)
   {

?>
      //Add your javascript code here
      ScrollBar1.setValue(document.forms[0].ebPosition.value);
<?php
   }


   function Button1Click($sender, $params)
   {
      $this->ScrollBar1->PageSize = $_POST['ebPageSize'];
      $this->ScrollBar1->Min = $_POST['ebMin'];
      $this->ScrollBar1->Max = $_POST['ebMax'];
      $this->ScrollBar1->Position = $_POST['ebPosition'];
   }
}

global $application;

global $UScrollBar;

//Creates the form
$UScrollBar = new UScrollBar($application);

//Read from resource file
$UScrollBar->loadResource(__FILE__);

//Shows the form
$UScrollBar->show();

?>