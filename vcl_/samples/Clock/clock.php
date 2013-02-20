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
use_unit("clock.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class ClockDemo extends Page
{
   public $Label1 = null;
   public $Memo1 = null;
   public $Clock1 = null;
   function Clock1JSAlarm($sender, $params)
   {
?>
      //Add your javascript code here
      var dt = new Date();
      var curr_hour = dt.getHours();
      if (curr_hour < 12)
      {
        a_p = "AM";
      }
      else
      {
        a_p = "PM";
      }

      if (curr_hour == 0)
      {
        curr_hour = 12;
      }
      if (curr_hour > 12)
      {
        curr_hour = curr_hour - 12;
      }

      var curr_min = dt.getMinutes();
      var curr_sec = dt.getSeconds();

      document.ClockDemo.Memo1.value+='This is an alarm @' + curr_hour + " : " + curr_min + " : "+curr_sec+" " + a_p+"\n";
      dt = Date.parse(dt)+5000
      Clock1.fld.setAlarm(dt);
<?php
   }

}

global $application;

global $ClockDemo;

//Creates the form
$ClockDemo = new ClockDemo($application);

//Read from resource file
$ClockDemo->loadResource(__FILE__);

//Shows the form
$ClockDemo->show();

?>