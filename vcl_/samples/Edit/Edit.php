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
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class EditSample extends Page
{
   public $lbCase = null;
   public $btSetMax = null;
   public $btChangeColor = null;
   public $btEnable = null;
   public $btCharCase = null;
   public $btReadOnly = null;
   public $btPassword = null;
   public $Edit1 = null;
   function btReadOnlyClick($sender, $params)
   {
      $this->Edit1->ReadOnly = !$this->Edit1->ReadOnly;


   }

   function btSetMaxClick($sender, $params)
   {
      if($this->Edit1->MaxLength == "20")
         $this->Edit1->MaxLength = 0;
      else
         $this->Edit1->MaxLength = 20;

   }

   function btPasswordClick($sender, $params)
   {
      $this->Edit1->IsPassword = !$this->Edit1->IsPassword;
   }

   function btChangeColorClick($sender, $params)
   {
      if($this->Edit1->Color == "#308020")
         $this->Edit1->Color = "";
      else
         $this->Edit1->Color = "#308020";

   }

   function btEnableClick($sender, $params)
   {
      $this->Edit1->Enabled = !$this->Edit1->Enabled;
   }

   function btCharCaseClick($sender, $params)
   {
      if($this->Edit1->CharCase == ecUpperCase) $this->Edit1->CharCase = ecLowerCase;
      else if($this->Edit1->CharCase == ecLowerCase) $this->Edit1->CharCase = ecNormalCase;
      else $this->Edit1->CharCase = ecUpperCase;

      $this->lbCase->Caption = $this->Edit1->CharCase;
   }

}

global $application;

global $EditSample;

//Creates the form
$EditSample = new EditSample($application);

//Read from resource file
$EditSample->loadResource(__FILE__);

//Shows the form
$EditSample->show();

?>