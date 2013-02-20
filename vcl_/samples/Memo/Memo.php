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
class MemoSample extends Page
{
   public $btGetLine = null;
   public $ebLineNum = null;
   public $Label2 = null;
   public $Label1 = null;
   public $lbLine = null;
   public $Button1 = null;
   public $btReset = null;
   public $btClear = null;
   public $Memo1 = null;
   function btClearClick($sender, $params)
   {
      $this->Memo1->Text = "";
   }


   function Button1Click($sender, $params)
   {
      $this->Memo1->Enabled = !$this->Memo1->Enabled;
      /*                        if($this->Memo1->Enabled)
      $this->Memo1->Enabled=0;
      else
      $this->Memo1->Enabled=1;*/

   }


   function btResetClick($sender, $params)
   {
      $this->Memo1->Text = "This is our initial text, we can get this text
                                                                          by lines or the whole of it.
                                                                          Try the button to see how it works.";
   }

   function btGetLineClick($sender, $params)
   {
      $LineNum = $this->ebLineNum->Text;
      if($LineNum != "" && $LineNum >= 0)
         $this->lbLine->Caption = $this->Memo1->Lines[$LineNum];

   }

   function Memo1BeforeShow($sender, $params)
   {

      if(!isset($_SESSION["memoexample"]))
      {
         $this->Memo1->Text = "This is our initial text, we can get this text
                                                                                                    by lines or the whole of it.
                                                                                                    Try the button to see how it works.";
      }

      $_SESSION["memoexample"] = 1;
   }

}

global $application;

global $MemoSample;

//Creates the form
$MemoSample = new MemoSample($application);

//Read from resource file
$MemoSample->loadResource(__FILE__);

//Shows the form
$MemoSample->show();

?>