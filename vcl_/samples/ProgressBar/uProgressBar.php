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
class UProgressBar extends Page
{
   public $Button5 = null;
   public $Label1 = null;
   public $Button4 = null;
   public $Button3 = null;
   public $Button2 = null;
   public $ProgressBar1 = null;
   public $Button1 = null;
   function Button5Click($sender, $params)
   {
      $this->ProgressBar1->StepIt();
      $this->Label1->Caption = $this->ProgressBar1->Position;
   }

   function Button4Click($sender, $params)
   {
      $this->ProgressBar1->StepBy(20);
      $this->Label1->Caption = $this->ProgressBar1->Position;
   }

   function Button3Click($sender, $params)
   {
      $this->ProgressBar1->Min = 0;
      $this->ProgressBar1->Max = 200;
   }

   function Button2Click($sender, $params)
   {
      if ($this->ProgressBar1->Orientation == pbHorizontal)
      {
         $this->ProgressBar1->Orientation = pbVertical;
      }
      else
      {
         $this->ProgressBar1->Orientation = pbHorizontal;
      }
   }

   function Button1Click($sender, $params)
   {
      if ($this->ProgressBar1->Position != 50)
      {
         $this->ProgressBar1->Position = 50;
         $this->Label1->Caption = $this->ProgressBar1->Position;
      }
   }
}

global $application;

global $UProgressBar;

//Creates the form
$UProgressBar = new UProgressBar($application);

//Read from resource file
$UProgressBar->loadResource(__FILE__);

//Shows the form
$UProgressBar->show();

?>