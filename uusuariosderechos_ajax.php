<?php
include('dmconexion.php');
include('urecursos.php');

if(isset($_POST['Inicializa']))
{
   //LLena tabla con derechos de usuario
   $idusr = $_POST['idusr'];
   $sql = 'SELECT distinct d.idderecho, d.descripcion, if(u.idderecho is null, "N", "S") as der
           FROM derechos d left join usuariosderechos u on u.idderecho=d.idderecho
           and u.idusuario = ' . $idusr . '
           having der ="S"';
   $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());

   $_SESSION['tabladerechos'] = array();
   $i = 0;
   while($row = mysql_fetch_array($rs))
   {
      $_SESSION['tabladerechos'][$i] = $row['idderecho'];
      $i++;
   }
   LlenaTabindex(6);
}

if(isset($_POST['Liberar']))
{
   $_SESSION['tabladerechos'] = array();

   $sql = 'SELECT distinct d.idderecho FROM derechos d ';
   $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
   $i = 0;
   while($row = mysql_fetch_array($rs))
   {
      $_SESSION['tabladerechos'][$i] = $row['idderecho'];
      $i++;
   }
   echo "alert('Derechos Liberados');";
}

if(isset($_POST['Bloquear']))
{
   $_SESSION['tabladerechos'] = array();
   echo "alert('Derechos Bloqueados');";
}

if(isset($_POST['LiberarPagina']))
{
   LlenaDerechos($_POST['menu'], $_POST['perfil'], true);
}

if(isset($_POST['LlenaTabIndex']))
{
   LlenaTabindex($_POST['LlenaTabIndex']);
}

function LlenaTabIndex()
{
   //Llena el menu principal
   $sql = 'Select g.id, g.nombre as modulo
          from grupos g order by g.id ';
   $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);

   $m = '';
   while($row = mysql_fetch_array($rs))
   {
      if($m == '')
      {
         $m = '<table width="200" border="1" cellspacing="0" cellpadding="0">' .
         '<tr> <td width="159" bgcolor="#FF9900"><span style=" font-family: Verdana; font-size: 10;  ">' .
         '<strong>MODULO: ' . $row['modulo'] . '</strong></span></td> </tr>';
      }
      //if($idmenu != $row['id'])
         $col = '#FFFFFF';
      //else
      //   $col = '#92C2EB';

      $m .= '<tr bgcolor="' . $col . '">' .
      '<td><span style=" font-family: Verdana; font-size: 10;  ">' .
      '<a href="javascript:basicAjax(\\\'uusuariosderechos_ajax.php\\\',\\\'Menu=' . $row['id'] .
      '&perfil=\\\'+vcl.$(\\\'hfidusr\\\').value);">' .
      '<div align="left">' . $row['modulo'] . '</div></a></span></td></tr> ';
   }
   $m .= '</table>';

   echo 'vcl.$("lbmodulo").innerHTML = \'' . $m . '\';
         vcl.$("lbderechos").innerHTML = \'\'; ';


}

if(isset($_POST['Menu']))
{
   LlenaMenu($_POST['Menu']);
}

function LlenaMenu($menu)
{
   $sql = 'Select m.idmenu, m.descripcion from menu m where idgrupo = ' . $menu . '
           order by descripcion asc ';
   $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);




   $m = '<table width="250" border="1" cellspacing="0" cellpadding="0">' .
   '<tr> <td width="159" bgcolor="#FF9900"><span style=" font-family: Verdana; font-size: 10;  ">' .
   '<span style=" font-family: Verdana; font-size: 10;  ">' .
   '<div align="left"><strong>SUBMENU:</strong></div></span></td> </tr>';

   while($row = mysql_fetch_array($rs))
   {
      $menu = $row['idmenu'];
      $m .= '<tr bgcolor="#FFFFFF">' .
      '<td><span style=" font-family: Verdana; font-size: 10;  ">' .
      '<a href="javascript:basicAjax(\\\'uusuariosderechos_ajax.php\\\',' .
      '\\\'Derechos=&menu=' . $menu . '&perfil=\\\'+vcl.$(\\\'hfidusr\\\').value);">' .
      '<div align="left">' . $row['descripcion'] . '</div></a></span></td></tr> ';
   }
   $m .= '</table>';

   echo 'vcl.$("lbgrupo").innerHTML = \'' . $m . '\';';

}

function LlenaDerechos($menu, $perfil, $todo = null)
{
   /* //LlenaTabIndex($tab, $menu);
   $sql = 'select idperfil from usuariosperfiles where idusuario = '.$perfil;
   $rs = mysql_query($sql)or die("Error sql: " . $sql . " " . mysql_error());
   $row = mysql_fetch_array($rs);
   if($row != false)
   {
   $idperfil = $row['idperfil'];
   }*/

   $sql = 'SELECT  distinct d.idderecho, d.descripcion,
           if(ud.idderecho is null, 0, 1) as derecho,
           if(dp.idderecho is null, 0, 1) as perfil
           FROM derechos d

           Left join usuariosderechos ud on ud.idderecho=d.idderecho  and ud.idusuario = ' . $perfil . '
           left join usuarios u on u.idusuario = ' . $perfil . '
           left join usuariosperfiles up on up.idusuario=u.idusuario
           left join usuariosderechos dp on dp.idderecho=d.idderecho and dp.idusuario=up.idperfil
           where d.idmenu = ' . $menu;
   $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);


   $m = '<table width="250" border="1" cellspacing="0" cellpadding="0">' .
   '<tr> <td width="159" bgcolor="#FF9900"><span style=" font-family: Verdana; font-size: 10;  ">' .
   '<span style=" font-family: Verdana; font-size: 10;  ">' .
   '<a href="javascript:basicAjax(\\\'uusuariosderechos_ajax.php\\\',\\\'LiberarPagina=1' .
   '&menu=' . $menu . '&perfil=\\\'+vcl.$(\\\'hfidusr\\\').value);">' .
   '<div align="left"><strong>DERECHOS:</strong></div></a></span></td> </tr>';

   while($row = mysql_fetch_array($rs))
   {
      $col = '#FFFFFF';
      $der = '0';
      $c = count($_SESSION['tabladerechos']);
      $h = $c;
      $ban = false;
      for($i = 0; $i <= $c; $i++)
      {
//         if($row['perfil'] == '1')
//         {
//            $col = '#C0C0C0';
//            $der = '1';
//            $ban = false;
//         }
//         else
//         {
            if($_SESSION['tabladerechos'][$i] == $row['idderecho'])
            //if($row['derecho'] == '1')
            {
               $col = '#92C2EB';
               $der = '1';
               $ban = true;
            }
         //}
      }

      if($ban == false)
         if($todo == true)
         {
            $col = '#FF6600';
            $der = '1';
            $h++;
            $_SESSION['tabladerechos'][$h] = $row['idderecho'];
         }



      $m .= '<tr bgcolor="' . $col . '">' .
      '<td><span style=" font-family: Verdana; font-size: 10;  ">' .
      '<a href="javascript:basicAjax(\\\'uusuariosderechos_ajax.php\\\',\\\'Derechos=' .
      $row['idderecho'] . '&der=' . $der . '&menu=' . $menu .
      '&perfil=\\\'+vcl.$(\\\'hfidusr\\\').value);">' .
      '<div align="left">' . $row['descripcion'] . '</div></a></span></td></tr> ';
   }
   $m .= '</table>';

   echo 'vcl.$("lbderechos").innerHTML = \'' . $m . '\';';
}

if(isset($_POST['Derechos']))
{
   $derecho = $_POST['Derechos'];
   $der = $_POST['der'];
   $menu = $_POST['menu'];
   $perfil = $_POST['perfil'];
   $tabla = $_SESSION['tabladerechos'];
   $c = count($tabla);

   if($der == 1)
   {
      for($i = 0; $i <= $c; $i++)
      {
         if($tabla[$i] == $derecho)
         {
            unset($tabla[$i]);
            $tabla = array_values($tabla);
            $_SESSION['tabladerechos'] = $tabla;
         }
      }
   }
   else
   {
      $h = count($_SESSION['tabladerechos']);
      $_SESSION['tabladerechos'][$h] = $derecho;
   }

   LlenaDerechos($menu, $perfil);
}

if(isset($_POST['Imprimir']))
{
   echo 'window.open("http://' . $_SESSION['ServidorJasper'] . '/ibc.jsp' .
   '?reporte=usuariosderechos&tiporeporte=pdf&idusuario=' . $_POST['Imprimir'] . '", "_blank");';
}

?>