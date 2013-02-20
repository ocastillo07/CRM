<?php
        //Includes

        include("dmconexion.php");
        //include("urecursos.php");
       /* session_start();
        if(!isset($_SESSION["login"]))
        {
          redirect("login.php");
        } */
        require_once("vcl/vcl.inc.php");
        use_unit("dbctrls.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class LeftPane extends Page
        {
               public $lbderechos = null;
               public $Label2 = null;
               public $pmenu = null;

               function LeftPaneCreate($sender, $params)
               {
                  echo '<script language="javascript" type="text/javascript">
                        window.open("uinicio.php", "Frame3");
                        </script>';
               }


               function LeftPaneShow($sender, $params)
               {
                  $h=intval($_SESSION["height"]);
                  $h=$h-100;
                  $this->lbderechos->Top=$h-150;
                  $cambio=0;
                  $rsm = mysql_query("select * from menu order by superior, idmenu");
                  $rc = mysql_num_rows($rsm);
                  if ($rc != 0)
                  {
                     echo "<table>";
                     echo "
            					 <tr>
             						<td>&nbsp;</td>
             						</tr>
             						<tr>
             						<td>&nbsp;</td>
             						</tr>  
										<tr>
             						<td>&nbsp;</td>
             						</tr>
										<tr>
             						<td>&nbsp;</td>
             						</tr>
             						<tr>
             						<td><STRONG><FONT color=#004080>Usuario:</td>
             						</tr>
				 						<tr>           
				 						<td><STRONG><FONT color=#004080>".$_SESSION['login']."</td>
				 						</tr>
										<tr>           
				 						<td>&nbsp;</td>
				 						</tr>
									 ";                                         
                     while($row1 = mysql_fetch_array($rsm))
                     {
                        $datos=explode("&",$link[$i]);
                        printf( "<tr><td>
                        <span style=\" font-family: Verdana; font-size: 12; font-style: bold; \">
                        <a href=\"".$row1["link"]."\" target=\"Frame3\">
                        <STRONG><FONT color=#004080>".$row1["descripcion"]." </a>
                        </span></td></tr>");
                     }
                     mysql_free_result($rsm);
                     printf( "
                     <tr><td>
                     <span style=\" font-family: Verdana; font-size: 12; font-style: bold; \">
                     <a href=\"ulogout.php\" target=\"_parent\"><STRONG><FONT color=#004080>Log Out</a>
                     </span>
                     </td></tr> ");
                     echo "</table>";
                  }
               }



        }

        global $application;

        global $LeftPane;

        //Creates the form
        $LeftPane=new LeftPane($application);

        //Read from resource file
        $LeftPane->loadResource(__FILE__);

        //Shows the form
        $LeftPane->show();

?>