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
use_unit("buttons.inc.php");
use_unit("actnlist.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class myFirstI18n extends Page
{
   public $lblResName = null;
   public $lblResFirstname = null;
   public $lblRes = null;
   public $Image1 = null;
   public $btnSelLang = null;
   public $cmbBxSelLang = null;
   public $lblSelLang = null;
   public $btnEnter = null;
   public $edtName = null;
   public $lblName = null;
   public $edtFirstName = null;
   public $lblFirstName = null;
   public $lblTitle = null;
   public $lblMainTitle = null;

   function btnEnterClick($sender, $params)
   {
      $formvars = array();
      foreach($_REQUEST as $key => $value)
      {
         $formvars[$key] .= $value;
      }
      $this->lblResFirstname->Caption = $formvars['edtFirstName'];
      $this->lblResName->Caption = $formvars['edtName'];
      // make labels visible
      $this->lblRes->Visible = true;
      $this->lblResFirstname->Visible = true;
      $this->lblResName->Visible = true;
   }

   function btnSelLangClick($sender, $params)
   {
      $lang;
      switch($_REQUEST['cmbBxSelLang'])
      {
         case 'en':
            $lang = '(default)';
            break;
         case 'de':
            $lang = 'German (Germany)';
            break;
         case 'fr':
            $lang = 'French (France)';
            break;
         case 'es':
            $lang = 'Spanish (Traditional Sort)';
            break;
         default  :
            $lang = '(default)';
      }
      $this->Language = $lang;
   }
}

global $application;

global $myFirstI18n;

//Creates the form
$myFirstI18n = new MyFirstI18n($application);

//Read from resource file
$myFirstI18n->loadResource(__FILE__);

//Shows the form
$myFirstI18n->show();

?>