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
require_once("admin_login.php");
require_once("blog_db.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("rtl.inc.php");

//Class definition
class AdminEditComment extends Page
{
   public $bid = null;
   public $id = null;
   public $Button1 = null;
   public $Button2 = null;
   public $Memo2 = null;
   public $Label4 = null;
   public $Edit2 = null;
   public $Label2 = null;
   public $Label1 = null;

   function Button2Click($sender, $params)
   {
      // Cancel button clicked, so redirect back to comments page.
      redirect("admin_comments.php?id=" . $this->bid->Value );
   }

   function Button1Click($sender, $params)
   {
      global $BlogDB;

      // Check to see whether a valid ID was sent.
      if($this->id->Value > - 1)
      {
         // A valid ID was sent, so switch to edit mode.
         $BlogDB->CommentsTable1->Filter = "ID = '" . mysql_real_escape_string($this->id->Value ) . "'";
         $BlogDB->CommentsTable1->open();
      }
      else
      {
         // No ID sent, so switch to insert mode.
         $BlogDB->CommentsTable1->open();
         $BlogDB->CommentsTable1->append();

         $BlogDB->CommentsTable1->BlogID = $this->bid->Value;
      }

      // Update record.
      $BlogDB->CommentsTable1->Author = $this->Edit2->Text;
      $BlogDB->CommentsTable1->Content = textToHtml($this->Memo2->Text );

      // Post changes.
      $BlogDB->CommentsTable1->post();

      // Redirect to comments page.
      redirect("admin_comments.php?id=" . $this->bid->Value );
   }

   function AdminEditCommentStartBody($sender, $params)
   {
      global $BlogDB;

      $BlogDB->CommentsTable1->Filter = "ID = '" . mysql_real_escape_string($this->id->Value ) . "'";
      $BlogDB->CommentsTable1->open();

      $this->Edit2->Text = $BlogDB->CommentsTable1->Author;
      $this->Memo2->Text = htmlToText($BlogDB->CommentsTable1->Content );
   }

   function AdminEditCommentCreate($sender, $params)
   {
      GetAdminLogin()->EnsureLogin();

      if(!isset($_REQUEST['id']) || !strlen($_REQUEST['id']))
      {
         $this->id->Value = - 1;
         $this->Label1->Caption = 'Blog Admin Panel - Add Comment';
      }
      else
      {
         $this->id->Value = $_REQUEST['id'];
         $this->Label1->Caption = 'Blog Admin Panel - Edit Comment';
      }

      $this->bid->Value = $_REQUEST['bid'];
   }
}

global $application;

global $AdminEditComment;

//Creates the form
$AdminEditComment = new AdminEditComment($application);

//Read from resource file
$AdminEditComment->loadResource(__FILE__);

//Shows the form
$AdminEditComment->show();

?>