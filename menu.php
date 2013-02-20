<?php
        //Includes

        require_once("vcl/vcl.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class index extends Page
        {
               public $pbotones = null;
               public $Frame3 = null;
               public $Frameset1 = null;
               public $Frame1 = null;


        }

        global $application;

        global $index;

        //Creates the form
        $index=new index($application);

        //Read from resource file
        $index->loadResource(__FILE__);

        //Shows the form
        $index->show();

?>