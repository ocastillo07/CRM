<link rel='stylesheet' type='text/css' href='style.css' />
<script type='text/javascript' src='toggleview.js'></script>
<script>
var rowsel = new Array();
</script>
<script type='text/javascript' src='sorttable.js'></script>
<title></title>
</head>
<body id='popup' bgcolor=#ffffff link=#0000ee vlink=#0000ee text=#000000   >
<link rel="stylesheet" type="text/css" href="left.css" />
<script>


// Show the logs for the current module in the right
function show_logs() {
  var url = ''+window.parent.frames[1].location;
  var sl1 = url.indexOf('//');
  var mod = '';
  if (sl1 > 0) {
    var sl2 = url.indexOf('/', sl1+2);
    if (sl2 > 0) {
      var sl3 = url.indexOf('/', sl2+1);
      if (sl3 > 0) {
        mod = url.substring(sl2+1, sl3);
      } else {
        mod = url.substring(sl2+1);
      }
    }
  }
if (mod && mod.indexOf('.cgi') <= 0) {
  // Show one module's logs
  window.parent.frames[1].location = 'webminlog/search.cgi?tall=4&uall=1&fall=1&mall=0&module='+mod;
  }
else {
  // Show all logs
  window.parent.frames[1].location = 'webminlog/search.cgi?tall=4&uall=1&fall=1&mall=0&mall=1'
  }
}
</script>

<?php
        //Includes

        include("dmconexion.php");
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
               public $html = null;
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
       $heg=intval($_SESSION["height"]);
       $heg=$heg-100;
       $this->lbderechos->Top=$heg-150;
       $cambio=0;

	   	$h="Login: ".$_SESSION['login']."<br>";

      // $h="Login: root<br>";
       	$sql='select id,nombre from grupos';
			$rs=mysql_query($sql) or die('Error de SQL: '.$sql);
			while($row=mysql_fetch_array($rs))
			{
			 	$h.="
				<div class='linkwithicon'>
					<a href=\"javascript:toggleview('menu".$row['id']."','toggle".$row['id']."')\" id='toggle".$row['id']."'>
						<img src='imagenes/closed.png' alt='[+]' width='14' height='14' border='0'>
					</a>
					<a href=\"javascript:toggleview('menu".$row['id']."','toggle".$row['id']."')\" id='toggle".$row['id']."'>
						<font color=#000000>".$row['nombre']."</font>
					</a>
				</div>
				<div class='itemhidden' id='menu".$row['id']."'>";
				
				$query='select idmenu,descripcion,link from menu where idgrupo='.$row['id'];
				$result=mysql_query($query) or die('Error de SQL: '.$query);
				while($r=mysql_fetch_array($result))
				{
					$h.="
					<div class='linkindented'>
						<a target=\"Frame3\" href=".$r['link'].">".$r['descripcion']."</a>
					</div>";
				}
				$h.="</div>";
			}

			$h.="
			<form action=webmin_search.cgi target=right>
			<div class='leftlink'><hr></div>
			<div class='linkwithicon'><img src=imagenes/stock_quit.png width='16' height='16'>
			<div class='aftericon'><a target=_top href=\"ulogout.php\">Logout</a></div></div>
			";
			$this->html->Caption=$h;
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