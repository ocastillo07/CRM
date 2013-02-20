<?php

include("dmconexion.php");
include("urecursos.php");

if(isset($_POST['TraeCliente']))
{
   $sql = 'select ' . nombreMoral('c') . ' as nombre from clientes c where idcliente=' . $_POST['TraeCliente'];
   $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql);
   $row = mysql_fetch_array($rs);
   echo "vcl.$('edcliente').value='" . $row['nombre'] . "';  ";
}

if(isset($_POST['HabilitaXTipo']))
{
   switch($_POST['HabilitaXTipo'])
   {
      case 1: //FSL
         echo 'vcl.$("lbrenta").caption = "Renta Mensual";
               vcl.$("edcosto").readOnly = false;
               vcl.$("cbllantas").enabled = true;
               vcl.$("cbubicacion").enabled = false;
               ';
         break;

      case 2: //CM
         echo 'vcl.$("lbrenta").caption = "Renta Mensual";
               vcl.$("edcosto").readOnly = false;
               vcl.$("cbllantas").enabled = true;
               vcl.$("cbubicacion").enabled = true;
               ';
         break;

      case 3: //SD
         echo 'vcl.$("lbrenta").caption = "Pago Mensual";
               vcl.$("edcosto").value = "";
               vcl.$("edcosto").readOnly = true;
               vcl.$("cbllantas").enabled = false;
               vcl.$("cbubicacion").enabled = true;
               vcl.$("edcostoapertura").value = "'.GetConfiguraciones('IDLcostoapertura').'";
               vcl.$("cbmonapertura").value = "'.GetConfiguraciones('IDLmonapertura').'";
               ';
         break;
   }


}

?>