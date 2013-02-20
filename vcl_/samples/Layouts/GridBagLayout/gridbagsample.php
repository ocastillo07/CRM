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
class GridBagSample extends Page
{
   public $Button26 = null;
   public $Button25 = null;
   public $Button24 = null;
   public $Button23 = null;
   public $Button22 = null;
   public $Button21 = null;
   public $Button20 = null;
   public $Button19 = null;
   public $Button18 = null;
   public $Button17 = null;
   public $Button16 = null;
   public $Button15 = null;
   public $Button14 = null;
   public $Button13 = null;
   public $Button12 = null;
   public $Button11 = null;
   public $Button10 = null;
   public $Button9 = null;
   public $Button8 = null;
   public $Button7 = null;
   public $Button6 = null;
   public $Button5 = null;
   public $Button4 = null;
   public $Button3 = null;
   public $Button2 = null;
   public $Panel1 = null;
   public $ListBox2 = null;
   public $ListBox1 = null;
   public $Button1 = null;
   public $Memo2 = null;
   public $Memo1 = null;
}

global $application;

global $GridBagSample;

//Creates the form
$GridBagSample = new GridBagSample($application);

//Read from resource file
$GridBagSample->loadResource(__FILE__);

//Shows the form
$GridBagSample->show();

?>