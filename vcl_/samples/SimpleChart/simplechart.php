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
use_unit("comctrls.inc.php");
use_unit("chart.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class Unit1 extends Page
{
   public $ImageFade1 = null;
   public $SimpleChart1 = null;
   public $btnClearChart = null;
   public $edtLabel = null;
   public $edtValue = null;
   public $edtChartTitle = null;
   public $cmbChartType = null;
   public $btnAdd = null;
   public $btnApply = null;
   public $Label6 = null;
   public $Label5 = null;
   public $Label4 = null;
   public $Label3 = null;
   public $Label2 = null;
   public $Label1 = null;

   function btnClearChartClick($sender, $params)
   {
      // clear all data from design-time
      $this->SimpleChart1->clearChart();
      // do not show any logo on the chart (default is "Powered by libchart")
      $this->SimpleChart1->Chart->setLogo("");
   }

   function btnApplyClick($sender, $params)
   {
      // set the new chart type
      switch ($this->cmbChartType->ItemIndex)
      {
         case 0:
            $this->SimpleChart1->ChartType = ctHorizontalChart;
            break;
         case 1:
            $this->SimpleChart1->ChartType = ctLineChart;
            break;
         case 2:
            $this->SimpleChart1->ChartType = ctPieChart;
            break;
         case 3:
            $this->SimpleChart1->ChartType = ctVerticalChart;
            break;
      }
      // set the new title
      $this->SimpleChart1->Chart->setTitle($this->edtChartTitle->Text);
   }

   function btnAddClick($sender, $params)
   {
      $this->SimpleChart1->Chart->addPoint(new Point($this->edtLabel->Text, $this->edtValue->Text));
   }

}

global $application;

global $Unit1;

//Creates the form
$Unit1 = new Unit1($application);

//Read from resource file
$Unit1->loadResource(__FILE__);

//Shows the form
$Unit1->show();

?>