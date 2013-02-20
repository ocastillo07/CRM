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
use_unit("menus.inc.php");
use_unit("buttons.inc.php");
use_unit("checklst.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class PaintBoxSample extends Page
{
   public $Label2 = null;
   public $Label1 = null;
   public $PaintBox1 = null;
   public $pbTest = null;
   function PaintBox1JSClick($sender, $params)
   {

   ?>
   //Add your javascript code here
  PaintBox1_Canvas.setColor("#000000");
  PaintBox1_Canvas.fillEllipse(10 + 1, 150+ 1, 60-10+1, 200-150+1);
  PaintBox1_Canvas.paint();
   <?php

   }

   function PaintBox1Paint($sender, $params)
   {
   ?>
  PaintBox1_Canvas.setColor("#000000");
  PaintBox1_Canvas.fillEllipse(10 + 1, 150+ 1, 60-10+1, 200-150+1);
  PaintBox1_Canvas.setStroke(2);
  PaintBox1_Canvas.setColor("#00FFFF");
  PaintBox1_Canvas.drawEllipse(10, 150, 60-10+1, 200-150+1);
  PaintBox1_Canvas.setColor("#FF0000");
  PaintBox1_Canvas.fillRect(70, 150, 120 - 70, 200 - 150);
  PaintBox1_Canvas.setColor("#00FF00");
  PaintBox1_Canvas.fillRect(230 + 10, 150, 151 - 20, 151);
  PaintBox1_Canvas.fillRect(230, 150 + 10, 151, 151 - 20);
  PaintBox1_Canvas.setStroke(2);
  PaintBox1_Canvas.setColor("#FF00FF");
  PaintBox1_Canvas.drawLine(230 + 10, 150, 380 - 10, 150);
  PaintBox1_Canvas.drawLine(230 + 10, 300, 380 - 10, 300);
  PaintBox1_Canvas.drawLine(230, 150 + 10, 230, 300 - 10);
  PaintBox1_Canvas.drawLine(380, 150 + 10, 380, 300 - 10);
  PaintBox1_Canvas.fillArc(230, 150, 20, 20, 90, 180);
  PaintBox1_Canvas.fillArc(380 - 20 + 2, 150, 20, 20 + 2, 0, 90);
  PaintBox1_Canvas.fillArc(230, 300 - 20 + 2, 20, 20, 180, 270);
  PaintBox1_Canvas.fillArc(380 - 20 + 2, 300 - 20 + 2, 20, 20, 270, 360);
  PaintBox1_Canvas.setColor("#00FF00");
  PaintBox1_Canvas.fillArc(230 + 2, 150 + 2, 20 - 2, 20 - 2, 90, 180);
  PaintBox1_Canvas.fillArc(380 - 20 + 2, 150 + 2, 20 - 2, 20 - 2, 0, 90);
  PaintBox1_Canvas.fillArc(230 + 2, 300 - 20, 20, 20, 180, 270);
  PaintBox1_Canvas.fillArc(380 - 20, 300 - 20, 20, 20, 270, 360);
  PaintBox1_Canvas.fillRect(30, 120, 150 - 30 + 1, 170 - 120 + 1);
  PaintBox1_Canvas.setStroke(2);
  PaintBox1_Canvas.setColor("#FF00FF");
  PaintBox1_Canvas.drawRect(30, 120, 150 - 30 + 1, 170 - 120 + 1);
  PaintBox1_Canvas.setFont("Verdana", "10px", "fsOblique");
  PaintBox1_Canvas.setColor("#FF0000");
  PaintBox1_Canvas.drawString("Canvas Test", 10, 5);
  PaintBox1_Canvas.setFont("Verdana", "10px", "fsNormal");
  PaintBox1_Canvas.setColor("#FF0000");
  PaintBox1_Canvas.drawString("Brush color=#00FF00", 10, 20);
  PaintBox1_Canvas.setFont("Verdana", "10px", "fsNormal");
  PaintBox1_Canvas.setColor("#FF0000");
  PaintBox1_Canvas.drawString("Font Name=Verdana", 10, 35);
  PaintBox1_Canvas.setFont("Verdana", "10px", "fsNormal");
  PaintBox1_Canvas.setColor("#FF0000");
  PaintBox1_Canvas.drawString("Font Size=10px", 10, 50);
  PaintBox1_Canvas.setFont("Verdana", "10px", "fsNormal");
  PaintBox1_Canvas.setColor("#FF0000");
  PaintBox1_Canvas.drawString("Pen Color=#FF00FF", 10, 65);
  PaintBox1_Canvas.setFont("Verdana", "10px", "fsNormal");
  PaintBox1_Canvas.setColor("#FF0000");
  PaintBox1_Canvas.drawString("Pen Width=2", 10, 80);
  PaintBox1_Canvas.drawLine(10, 115, 200, 115);
       <?php


   }



   function pbTestPaint($sender, $params)
   {
      $this->pbTest->Canvas->Pen->Color = "#FF0000";
      $this->pbTest->Canvas->Line(0, 0, 100, 100);
      $this->pbTest->Canvas->TextOut(5, 5, "Text written to canvas");
      $this->pbTest->Canvas->Pen->Color = "#0000FF";
      $this->pbTest->Canvas->Pen->Width = 5;
      $this->pbTest->Canvas->Line(100, 0, 100, 100);
   }

}

global $application;

global $PaintBoxSample;

//Creates the form
$PaintBoxSample = new PaintBoxSample($application);

//Read from resource file
$PaintBoxSample->loadResource(__FILE__);

//Shows the form
$PaintBoxSample->show();

?>