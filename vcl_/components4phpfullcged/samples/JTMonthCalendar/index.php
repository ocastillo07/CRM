<?php
        //Includes
        require_once("vcl/vcl.inc.php");
        use_unit("components4phpfullcged/jtmonthcalendar.inc.php");
        use_unit("components4phpfullcged/jtsitetheme.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class Unit27 extends Page
        {
               public $Label3 = null;
               public $JTMonthCalendar1 = null;
               public $JTSiteTheme1 = null;
               public $Label2 = null;
               public $Label1 = null;

               function JTMonthCalendar1JSSelectDate($sender, $params)
               {
               ?>
                    document.getElementById( "Label3" ).innerHTML = "You selected " + Month + "/" + Day + "/" + Year + " (mm/dd/yyyy).";
               <?php
               }

        }

        global $application;

        global $Unit27;

        //Creates the form
        $Unit27=new Unit27($application);

        //Read from resource file
        $Unit27->loadResource(__FILE__);

        //Shows the form
        $Unit27->show();

?>
