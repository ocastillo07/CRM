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
use_unit("styles.inc.php");
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class Noname3 extends Page
{
   public $Button3 = null;
   public $Button1 = null;
   public $Memo1 = null;
   public $Button2 = null;
   public $Label1 = null;
   public $StyleSheet1 = null;
   function Button3Click($sender, $params)
   {
      $styles = $this->StyleSheet1->BuildStyleList($this->StyleSheet1->FileName, 0, 1, 1);
      if (isset($styles))
      {
         $lines = "";
         reset($styles);
         while (list(, $val) = each($styles))
            $lines .= $val . "\n";
         unset($styles);
      }
      else
      {
         $lines = "No custom styles defined in " . $this->StyleSheet1->FileName;
      }
      $this->Memo1->Text = $lines;
   }

   function Button2Click($sender, $params)
   {
      $styles = $this->StyleSheet1->BuildStyleList($this->StyleSheet1->FileName, 0, 0, 0);
      if (isset($styles))
      {
         $lines = "";
         reset($styles);
         while (list(, $val) = each($styles))
            $lines .= $val . "\n";
         unset($styles);
      }
      else
      {
         $lines = "No custom styles defined in " . $this->StyleSheet1->FileName;
      }
      $this->Memo1->Text = $lines;
   }

   function Button1Click($sender, $params)
   {
      $styles = $this->StyleSheet1->BuildStyleList($this->StyleSheet1->FileName, 1, 0, 0);
      if (isset($styles))
      {
         $lines = "";
         reset($styles);
         while (list(, $val) = each($styles))
            $lines .= $val . "\n";
         unset($styles);
      }
      else
      {
         $lines = "No custom styles defined in " . $this->StyleSheet1->FileName;
      }
      $this->Memo1->Text = $lines;
   }
}

global $application;

global $Noname3;

//Creates the form
$Noname3 = new Noname3($application);

//Read from resource file
$Noname3->loadResource(__FILE__);

//Shows the form
$Noname3->show();

?>