<?php
        //Includes
        require_once("vcl/vcl.inc.php");
        use_unit("components4phpfullcged/jtradiobuttonlist.inc.php");
        use_unit("components4phpfullcged/jtsitetheme.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class JTRadioButtonListDemo extends Page
        {
               public $JTRadioButtonList1 = null;
               public $JTSiteTheme1 = null;
               public $Label2 = null;
               public $Label1 = null;
        }

        global $application;

        global $JTRadioButtonListDemo;

        //Creates the form
        $JTRadioButtonListDemo=new JTRadioButtonListDemo($application);

        //Read from resource file
        $JTRadioButtonListDemo->loadResource(__FILE__);

        //Shows the form
        $JTRadioButtonListDemo->show();

?>
