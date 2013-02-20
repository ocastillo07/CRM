<?php
        //Includes
        require_once("vcl/vcl.inc.php");
        use_unit("components4phpfullcged/jtmenu.inc.php");
        use_unit("components4phpfullcged/jtsitetheme.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class JTMenuDemo extends Page
        {
               public $Button1 = null;
               public $JTMenu1 = null;
               public $JTSiteTheme1 = null;
               public $Label2 = null;
               public $Label1 = null;

               function Button1JSClick($sender, $params)
               {
               ?>
                    // Get the button's lower-left corner position.
                    var btn = document.getElementById( 'Button1_outer' );
                    var x = btn.offsetLeft;
                    var y = btn.offsetTop + btn.offsetHeight;

                    // Open the menu.
                    document.getElementById( 'JTMenu1' ).Popup( x, y );
               <?php
               }

        }

        global $application;

        global $JTMenuDemo;

        //Creates the form
        $JTMenuDemo=new JTMenuDemo($application);

        //Read from resource file
        $JTMenuDemo->loadResource(__FILE__);

        //Shows the form
        $JTMenuDemo->show();

?>
