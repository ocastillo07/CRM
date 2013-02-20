<?php
        //Includes
        require_once("vcl/vcl.inc.php");
        use_unit("components4phpfullcged/jtgroupbox.inc.php");
        use_unit("components4phpfullcged/jtsitetheme.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class JTGroupBoxDemo extends Page
        {
               public $JTGroupBox1 = null;
               public $JTSiteTheme1 = null;
               public $Label2 = null;
               public $Label1 = null;
        }

        global $application;

        global $JTGroupBoxDemo;

        //Creates the form
        $JTGroupBoxDemo=new JTGroupBoxDemo($application);

        //Read from resource file
        $JTGroupBoxDemo->loadResource(__FILE__);

        //Shows the form
        $JTGroupBoxDemo->show();

?>
