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
class RadioButtonSample extends Page
{
   public $rbGrape = null;
   public $rbApple = null;
   public $rbKiwi = null;
   public $rbBannana = null;
   public $lbResponse = null;
   public $Label2 = null;
   public $Button1 = null;
   public $Label1 = null;
   public $Panel1 = null;
   function Button1Click($sender, $params)
   {
      if($this->rbGrape->Checked)
         $this->lbResponse->Caption = "You like Grapes, pretty good";
      else if($this->rbApple->Checked)
            $this->lbResponse->Caption = "You like Apples, pretty good";
      else if($this->rbKiwi->Checked)
            $this->lbResponse->Caption = "You like Kiwis, pretty good";
      else if($this->rbBannana->Checked)
            $this->lbResponse->Caption = "You like Bananas, pretty good";
      else
         $this->lbResponse->Caption = "Strange, you don´t like any of this fruits";
   }
}

global $application;

global $RadioButtonSample;

//Creates the form
$RadioButtonSample = new RadioButtonSample($application);

//Read from resource file
$RadioButtonSample->loadResource(__FILE__);

//Shows the form
$RadioButtonSample->show();

?>