<?php
        ini_set('display_errors',1);
        error_reporting(E_ALL);

        require_once "phpunit/phpunit.php";
        require_once "vcl/vcl.inc.php";
        require_once "test_customcontrol.inc.php";
        use_unit("stdctrls.inc.php");
        use_unit("extctrls.inc.php");

        class CustomPanelTest extends CustomControlTest
        {
                function setup()
                {
                        parent::setup();                
                        $this->object=new CustomPanel();
                        $this->object->Name="myobject";
                }

                function test_ActiveLayer()
                {
                        $this->assertEquals($this->object->ActiveLayer, 0);
                        $this->assertEquals($this->object->defaultActiveLayer(),$this->object->ActiveLayer);
                        $this->object->ActiveLayer= 2;
                        $this->assertEquals($this->object->ActiveLayer, 2);
                        $this->object->ActiveLayer= 43;
                        $this->assertEquals($this->object->ActiveLayer, 43);
                }

                function test_Background()
                {
                        $this->assertEquals($this->object->Background, '');
                        $this->assertEquals($this->object->defaultBackground(),$this->object->Background);
                        $this->object->Background= '#000FF0';
                        $this->assertEquals($this->object->Background, '#000FF0');
                }

                function test_BackgroundRepeat()
                {
                        $this->assertEquals($this->object->BackgroundRepeat, '');
                        $this->assertEquals($this->object->defaultBackgroundRepeat(),$this->object->BackgroundRepeat);
                        $this->object->BackgroundRepeat= '#00CFF0';
                        $this->assertEquals($this->object->BackgroundRepeat, '#00CFF0');
                }

                function test_BackgroundPosition()
                {
                        $this->assertEquals($this->object->BackgroundPosition, '');
                        $this->assertEquals($this->object->defaultBackgroundPosition(),$this->object->BackgroundPosition);
                        $this->object->BackgroundPosition= '#03CFF0';
                        $this->assertEquals($this->object->BackgroundPosition, '#03CFF0');
                }

                function test_BorderWidth()
                {
                        $this->assertEquals($this->object->BorderWidth, 0);
                        $this->assertEquals($this->object->defaultBorderWidth(),$this->object->BorderWidth);
                        $this->object->BorderWidth= 2;
                        $this->assertEquals($this->object->BorderWidth, 2);
                        $this->object->BorderWidth= 11;
                        $this->assertEquals($this->object->BorderWidth, 11);
                }

                function test_BorderColor()
                {
                        $this->assertEquals($this->object->BorderColor, '');
                        $this->assertEquals($this->object->defaultBorderColor(),$this->object->BorderColor);
                        $this->object->BorderColor= '#03CFF0';
                        $this->assertEquals($this->object->BorderColor, '#03CFF0');
                }

                 function test_Include()
                {
                        $this->assertEquals($this->object->Include, '');
                        $this->assertEquals($this->object->defaultInclude(),$this->object->Include);
                        $this->object->Include= 'page1.inc.php';
                        $this->assertEquals($this->object->Include, 'page1.inc.php');
                }

                function test_Dynamic()
                {
                        $this->assertEquals($this->object->Dynamic, $this->object->defaultDynamic(),"a");
                        $this->assertEquals($this->object->defaultDynamic(),$this->object->Dynamic);
                        $this->object->Dynamic= 1;
                        $this->assertEquals($this->object->Dynamic, 1);
                }

                function test_ControlStyle($styles=array())
                {
                        if(!isset($styles["csAcceptsControls"]))
                                $styles["csAcceptsControls"]="1";
                        $styles["csRenderOwner"]="1";
                        $styles["csRenderAlso"]="StyleSheet";

                        parent::test_ControlStyle($styles);
                }


               function test_dumpContents()
                {
                        $c=$this->object->Show(true);
                        //print_r($c);
                        $compare=trim('<table id="myobject_table"   border="0"  cellpadding="0" cellspacing="0"     style=" border: 0px solid ; "   >
<tr>
<td style=" font-family: Verdana; font-size: 10px;  "><span style=" font-family: Verdana; font-size: 10px;  "></span>
</td>
</tr>
</table>');
                       $c=$this->fixString($c);
                       $this->assertEquals($c,$compare);
                }
         }
      if ($_SERVER['PHP_SELF']!='') $script=$_SERVER['PHP_SELF'];
        else $script=$_GET['script'];

       if (basename($script)=='test_custompanel.inc.php')
        {
                echo "<html>";
                echo "<head>";
                echo "<title>PHP-Unit Results</title>";
                echo "<STYLE TYPE=\"text/css\">";
                include("phpunit/stylesheet.css");
                echo "</STYLE>";
                echo "</head>";
                echo "<body>";
                $suite = new TestSuite( "CustomPanelTest" );
                $testRunner = new TestRunner();
                $testRunner->run( $suite );
        }


?>
