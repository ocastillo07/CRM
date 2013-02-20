<?php
require_once("vcl/vcl.inc.php");
//Includes
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class Index extends Page
{
   public $lbDate = null;
   public $btnGetDate = null;
   public $edDate = null;
   public $btnSetDate = null;
   public $Label3 = null;
   public $btnSetFirstDay = null;
   public $edFirstDay = null;
   public $Label2 = null;
   public $btnShowsHideTime = null;
   public $Label1 = null;
   public $MonthCalendar1 = null;
   function btnGetDateClick($sender, $params)
   {
      $this->lbDate->Caption = $this->MonthCalendar1->Date;


   }

   function MonthCalendar1JSUpdate($sender, $params)
   {

?>
       //Add your javascript code here
          findObj('edDate').value=event.date.print(event.params.ifFormat);
       <?php

   }

   function btnSetDateClick($sender, $params)
   {
      if ($this->edDate->Text != '')
      {
         $this->MonthCalendar1->Date = date('m/d/Y H:i:s', strtotime($this->edDate->Text));
      }
   }

   function btnSetFirstDayClick($sender, $params)
   {
      $this->MonthCalendar1->FirstDay = $this->edFirstDay->Text;
   }

   function btnShowsHideTimeClick($sender, $params)
   {
      $this->MonthCalendar1->ShowsTime = !$this->MonthCalendar1->ShowsTime;
      if ($this->MonthCalendar1->ShowsTime) $this->btnShowsHideTime->Caption = "Hide Time";
      else $this->btnShowsHideTime->Caption = "Show Time";
   }

}

global $application;

global $Index;

//Creates the form
$Index = new Index($application);

//Read from resource file
$Index->loadResource(__FILE__);

//Shows the form
$Index->show();

?>