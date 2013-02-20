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
class UploadFileSample extends Page
{
   public $ebMovePath = null;
   public $Label3 = null;
   public $Label2 = null;
   public $Label1 = null;
   public $lbUploadText = null;
   public $Button1 = null;
   public $Upload1 = null;
   function Upload1Uploaded($sender, $params)
   {
      //Do something after file has finished uploading
   }

   function Button1Click($sender, $params)
   {
      if(!$this->Upload1->isUploadedFile())
         $this->lbUploadText->Caption = $this->Upload1->errorMessage();
      else
      {
         if($this->ebMovePath->Text != "")
         {
            $file = $this->ebMovePath->Text;
            $len = strlen($this->ebMovePath->Text);
            if($this->ebMovePath->Text[$len - 1] == "\\" || $this->ebMovePath->Text[$len - 1] == "/")
               $file = $this->ebMovePath->Text . "movedfile.dat";
            $this->Upload1->moveUploadedFile($file);
            //We must move file after checking for errors not before
            $this->lbUploadText->Caption = "File Uploaded to " . $this->Upload1->FileTmpName . " and moved to your move folder";
         }
         else
            $this->lbUploadText->Caption = "File Uploaded to " . $this->Upload1->FileTmpName;
      }
   }
}

global $application;

global $UploadFileSample;

//Creates the form
$UploadFileSample = new UploadFileSample($application);

//Read from resource file
$UploadFileSample->loadResource(__FILE__);

//Shows the form
$UploadFileSample->show();

?>