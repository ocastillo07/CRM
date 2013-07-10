<script type='text/javascript' src='funciones.js'></script>
<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
require_once("vcl/vcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class userefacciones extends Page
{
   public $Label9 = null;
   public $Image1 = null;
   public $hfimprimir = null;
   public $hfidoperador = null;
   public $btnoperador = null;
   public $Label4 = null;
   public $edoperador = null;
   public $hfprecio = null;
   public $edimporte = null;
   public $hfidasesor = null;
   public $hfidalmacen = null;
   public $hfsupercision = null;
   public $hfpreciodefault = null;
   public $hfprecio5 = null;
   public $hfprecio4 = null;
   public $hfprecio3 = null;
   public $hfprecio2 = null;
   public $hfprecio1 = null;
   public $Label33 = null;
   public $edtotalmn = null;
   public $Label27 = null;
   public $edpartidas = null;
   public $Label16 = null;
   public $edtotal = null;
   public $Label15 = null;
   public $ediva = null;
   public $Label14 = null;
   public $edsubtotal = null;
   public $Label11 = null;
   public $cbpiva = null;
   public $Label10 = null;
   public $edtc = null;
   public $Label8 = null;
   public $cbmoneda = null;
   public $lbprecio = null;
   public $edprecio = null;
   public $btnagregar = null;
   public $Label28 = null;
   public $Label26 = null;
   public $edexistencia = null;
   public $Label21 = null;
   public $edcosto = null;
   public $Label20 = null;
   public $edcantidad = null;
   public $Label19 = null;
   public $eddescripcion = null;
   public $btnpartes = null;
   public $Label18 = null;
   public $edparte = null;
   public $hfidtipopago = null;
   public $edtipo = null;
   public $Label7 = null;
   public $hfdetalle = null;
   public $edunidad = null;
   public $Label5 = null;
   public $edvin = null;
   public $Label12 = null;
   public $edidcliente = null;
   public $edidservicio = null;
   public $Label2 = null;
   public $Label3 = null;
   public $edcliente = null;
   public $edserie = null;
   public $Label1 = null;
   public $edestatus = null;
   public $hfidestatus = null;
   public $lbdetalle = null;
   public $hfidcontador = null;
   public $imgcalcular = null;
   public $Label29 = null;
   public $Label6 = null;
   public $lbufh = null;
   public $pbotones = null;
   public $Label34 = null;
   public $btnregresar = null;
   public $btngcerrar = null;
   public $Label32 = null;
   public $Label31 = null;
   public $btnguardar = null;
   public $lbtitulo = null;
   public $hfestatus = null;

   function btnimprimirJSClick($sender, $params)
   {
?>
   basicAjax('userefacciones_ajax.php', 'Imprimir=1&serie='+vcl.$('edserie').value+'&idservicio='+vcl.$('edidservicio').value);
<?php
   }

   function btnoperadorClick($sender, $params)
   {
      redirect('uusuariosvista.php?pagina=userefacciones.php');
   }

   function edoperadorJSBlur($sender, $params)
   {
?>
   if(vcl.$('edoperador').value != '')
     basicAjax('userefacciones_ajax.php','TraeOperador='+vcl.$('edoperador').value);
<?php
   }

   function btnpartesClick($sender, $params)
   {
      $this->edparte->Text = '';
      $this->eddescripcion->Text = '';
      $this->edcosto->Text = '';
      $this->edprecio->Text = '';
      $this->edcantidad->Text = '';
      $this->edimporte->Text = '';
      $this->hfdetalle->Value = '';
      $this->hfsupercision->Value = '';
      $this->hfidcontador->Value = '';
      redirect('urepartesvista.php?pagina=userefacciones.php&idalmacen=' . $this->hfidalmacen->Value);
   }

   function edprecioJSKeyPress($sender, $params)
   {
?>
   if(event.keyCode == 112)
      {
         if(vcl.$('hfprecio1').value>0 && vcl.$('hfprecio2').value>0)
         {
            var ConfiguracionPagina = 'border:thick;center:yes;resizable:no;help:no;status:no;dialogWidth:280px;dialogHeight:180px';
            var args = new Object();
            args.p1 = vcl.$('hfprecio1').value;
            args.p2 = vcl.$('hfprecio2').value;
            args.p3 = vcl.$('hfprecio3').value;
            args.p4 = vcl.$('hfprecio4').value;
            args.p5 = vcl.$('hfprecio5').value;
            var precio = window.showModalDialog('ureventas_popup.php',args,ConfiguracionPagina);
            switch (precio)
            {
                case 1: vcl.$('edprecio').value = vcl.$('hfprecio1').value;
                break;

                case 2: vcl.$('edprecio').value = vcl.$('hfprecio2').value;
                break;

                case 3: vcl.$('edprecio').value = vcl.$('hfprecio3').value;
                break;

                case 4: vcl.$('edprecio').value = vcl.$('hfprecio4').value;
                break;

                case 5: vcl.$('edprecio').value = vcl.$('hfprecio5').value;
                break;
            }

         }
         else
            alert('No hay precios cargados para el promotor');
      }

   if( ValidaDecimal(vcl.$('edprecio').value, event) != event.keyCode)
        return false;

   if(event.keyCode == 13)
   {
       btnagregarJSClick(event);
       event.keyCode = 32;
       return false;
   }

   if(event.keyCode == 8 && vcl.$('edprecio').length == 0)
    return false;
<?php
   }

   function edcantidadJSKeyPress($sender, $params)
   {
?>
   if( ValidaEntero(vcl.$('edcantidad').value, event) != event.keyCode)
        return false;

   if(event.keyCode == 13)
          return false;
   vcl.$('edimporte').value= formatCurrency(vcl.$('edcantidad').value * vcl.$('edprecio').value);
<?php
   }

   function edcantidadJSBlur($sender, $params)
   {
?>
   if(vcl.$('edcantidad').value != '' && vcl.$('edprecio').value != '' )
      vcl.$('edimporte').value = round(parseFloat(vcl.$('edcantidad').value * vcl.$('edprecio').value.replace(',', '')),2);

    if(vcl.$('edprecio').value!='')
	  {
	  	   basicAjax('userefacciones_ajax.php','ValidarPrecio=1'+'&idcliente=' + vcl.$('edidcliente').value +
                   '&precio=' + vcl.$('edprecio').value+'&preciodefault=' + vcl.$('hfpreciodefault').value +
                   '&cveparte=' + vcl.$('edparte').value+'&idalmacen=' + vcl.$('hfidalmacen').value +
                   '&cbmoneda=' + vcl.$('cbmoneda').value +'&tc=' + vcl.$('edtc').value+
                   '&idpromotor='+vcl.$('hfidasesor').value );
	  }
<?php
   }

   function edparteJSKeyUp($sender, $params)
   {
?>
   if(event.keyCode == 27 )
      {
      vcl.$('edparte').readOnly = false;
      vcl.$('edparte').value = '';
      vcl.$('edoperador').readOnly = false;
      vcl.$('edoperador').value = '';
      vcl.$('hfidoperador').value = '';
      vcl.$('eddescripcion').value = '';
      vcl.$('edexistencia').value = '';
      vcl.$('edcantidad').value = '';
      vcl.$('edcosto').value = '';
      vcl.$('edprecio').value = '';
      vcl.$('edimporte').value = '';
      vcl.$('hfdetalle').value = '';
      vcl.$('hfidcontador').value = '';
      vcl.$('hfsupercision').value = '';
      vcl.$('hfpreciodefault').value = '';
      vcl.$('hfprecio1').value = '';
      vcl.$('hfprecio2').value = '';
      vcl.$('hfprecio3').value = '';
      vcl.$('hfprecio4').value = '';
      vcl.$('hfprecio5').value = '';
      }
<?php
   }

   function btnagregarJSClick($sender, $params)
   {
?>
   if(8 >= vcl.$('hfidestatus').value && vcl.$('hfidestatus').value >= 3)
   {
      if(vcl.$('edoperador').value != '' &&
        vcl.$('edparte').value != '' && vcl.$('edcantidad').value != '' && vcl.$('edcantidad').value != '0')
      {

              basicAjax('userefacciones_ajax.php', 'Agregar=1&idmoneda='+vcl.$('cbmoneda').value+
               '&edtc='+vcl.$('edtc').value+'&idalmacen='+vcl.$('hfidalmacen').value+
               '&cveparte='+vcl.$('edparte').value+'&descripcion='+vcl.$('eddescripcion').value+
               '&existencia='+vcl.$('edexistencia').value+'&cantidad='+vcl.$('edcantidad').value+
               '&costo='+vcl.$('edcosto').value.replace(',', '')+'&precio='+vcl.$('edprecio').value.replace(',', '')+
               '&hfestatus='+vcl.$('hfestatus').value+
               '&idoperador='+vcl.$('hfidoperador').value+'&operador='+vcl.$('edoperador').value+
               '&importe='+vcl.$('edimporte').value.replace(',', '')+'&hfdetalle='+vcl.$('hfdetalle').value+
               '&hfidcontador='+vcl.$('hfidcontador').value+'&hfsupercision='+vcl.$('hfsupercision').value+
               '&hfpreciodefault='+vcl.$('hfpreciodefault').value+'&hfprecio1='+vcl.$('hfprecio1').value+
               '&hfprecio2='+vcl.$('hfprecio2').value+'&hfprecio3='+vcl.$('hfprecio3').value+
               '&hfprecio4='+vcl.$('hfprecio4').value+'&hfprecio5='+vcl.$('hfprecio5').value);

      }
      else
        alert('Faltan datos.');
   }
   else
       alert('La orden de servicio no se encuentra autorizada.');
<?php
   }

   function edparteJSBlur($sender, $params)
   {
?>
   if(vcl.$('edparte').value != '')
      basicAjax('userefacciones_ajax.php', 'TraeParte='+vcl.$('edparte').value+'&idmoneda='+vcl.$('cbmoneda').value+
                '&idalmacen='+vcl.$('hfidalmacen').value+'&edtc='+vcl.$('edtc').value+
                '&idpromotor='+vcl.$('hfidasesor').value+'&idcliente='+vcl.$('edidcliente').value);
<?php
   }

   function userefaccionesJSLoad($sender, $params)
   {
?>
    validarEventos();
      var h = '';

      if(vcl.$('edparte').value != '' && vcl.$('eddescripcion').value == '')
          h = '&TraeParte='+vcl.$('edparte').value+'&idmoneda='+vcl.$('cbmoneda').value+
              '&almacen='+vcl.$('hfidalmacen').value+'&edtc='+vcl.$('edtc').value+
              '&idpromotor='+vcl.$('hfidasesor').value+'&idcliente='+vcl.$('edidcliente').value;

      if(vcl.$('hfimprimir').value == 1)
          h = h + '&Imprimir=1&serie='+vcl.$('edserie').value+'&idservicio='+vcl.$('edidservicio').value;

      basicAjax('userefacciones_ajax.php', 'Load=1&hfestatus='+vcl.$('hfestatus').value+
                '&hfidestatus='+vcl.$('hfidestatus').value+h);


<?php
   }

   function imgcalcularJSClick($sender, $params)
   {
?>
   basicAjax('userefacciones_ajax.php', 'Calcular=1&hfestatus='+vcl.$('hfestatus').value+
     '&hfidestatus='+vcl.$('hfidestatus').value);
<?php
   }

   function edserieJSKeyPress($sender, $params)
   {
?>
      if(event.keyCode == 13)
          return false;
<?php
   }

   function userefaccionesShow($sender, $params)
   {
      $this->lbtitulo->Caption = $this->Caption;
      $this->pbotones->Width = $_SESSION["width"] - 164;

      if(isset($_GET["cveparte"]))
         $this->edparte->Text = $_GET["cveparte"];

      if(isset($_GET["id"]))
      {
         $this->hfidoperador->Value = $_GET["id"];
         $sql = 'Select tecnico from usuarios where idusuario=' . $_GET["id"];
         $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
         $row = mysql_fetch_array($rs);
         $this->edoperador->Text = $row['tecnico'];
      }

      if(isset($_GET['DelRow']))
      {
         $this->BDDelRow($_GET['DelRow']);
         redirect('userefacciones.php?serie=' . $this->edserie->Text . '&idservicio=' . $this->edidservicio->text);
         exit;
      }

      if(isset($_GET["idservicio"]))
      {
         $this->Limpiar();
         $this->inicializa();

         $this->edidservicio->Text = $_GET["idservicio"];
         $this->edserie->Text = $_GET['serie'];

         $this->hfestatus->Value = 2;
         $this->Locate();
         //$this->RevisaSurtido();
      }

      if(isset($_GET['imprimir']))
         $this->hfimprimir->Value = 1;
      else
         $this->hfimprimir->Value = 0;
   }

   function btnguardarClick($sender, $params)
   {
      if($this->Validar() != false)
      {
         $this->GuardarDetalle();
         // $this->ImprimeVale();
         redirect('userefacciones.php?serie=' . $this->edserie->Text . '&idservicio=' . $this->edidservicio->text . '&imprimir=1');

      }
   }

   function btngcerrarClick($sender, $params)
   {
      if($this->Validar() != false)
      {
         $this->GuardarDetalle();
         redirect('useservicios.php?serie=' . $this->edserie->Text . '&idservicio=' . $this->edidservicio->text);
         //$this->ImprimeVale();
      }
   }

   function ImprimeVale()
   {
      $sql = 'Select idusersalida, iduserentrega, fechacreacion from sevalescores
              where serie="' . $this->edserie->Text . '" and idservicio = "' . $this->edidservicio->Text . '"
              and fechacreacion=curdate()';
      $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
      $row = mysql_fetch_array($rs);
      if($row != false)
      {
         echo '<script language="javascript" type="text/javascript">
              window.open("http://' . $_SESSION['ServidorJasper'] . '/ibc.jsp' .
         '?reporte=sevalescores&tiporeporte=pdf&serie=' . $this->edserie->Text .
         '&idservicio=' . $this->edidservicio->Text . '&f1' . Fecha() . '&mod=ser' . '", "_blank");
              </script>';
      }
   }

   function btnregresarClick($sender, $params)
   {
      redirect('useservicios.php?serie=' . $this->edserie->Text . '&idservicio=' . $this->edidservicio->text);
   }

   function Locate()
   {
      if($_GET["idservicio"] != 0)
      {
         $this->edidservicio->Text = $_GET["idservicio"];
         $this->edserie->Text = $_GET["serie"];
         $r = ufh('s');

         $cadena = 'SELECT s.serie, s.idservicio, s.idcliente, e.nombre as estatus, s.idasesor,
                   t.nombre as tipo, s.idtipopago, s.idalmacen, s.idmoneda, s.piva, s.tc, s.idestatus,
                   s.idcliente, ' . NombreCliente('c') . ' as cliente, s.vin, tu.nombre as unidad
                   FROM seservicios AS s
                   left join seserviciosestatus e on e.idestatus=s.idestatus
                   left join setiposervicios t on t.idtiposervicio=s.idtiposervicio
                   left join clientes c on c.idcliente=s.idcliente
                   left join searchivocolgante ac on ac.vin=s.vin
                   left join setipounidad tu on tu.idunidad=ac.idunidad
                   where serie="' . $this->edserie->Text . '" and idservicio="' . $this->edidservicio->Text . '"';
         $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);
         $row = mysql_fetch_array($rs);

         $this->edidcliente->Text = $row["idcliente"];
         $this->edcliente->Text = $row["cliente"];

         $this->edvin->Text = $row["vin"];
         $this->edunidad->Text = $row["unidad"];
         $this->hfidestatus->Value = $row["idestatus"];
         $this->hfidtipopago->Value = $row["idtipopago"];
         $this->hfidalmacen->Value = $row["idalmacen"];
         $this->edestatus->Text = $row['estatus'];
         $this->edtipo->Text = $row['tipo'];
         $this->cbpiva->ItemIndex = $row['piva'] / 100;
         $this->cbmoneda->ItemIndex = $row['idmoneda'];
         $this->hfidasesor->Value = $row['idasesor'];
         $this->edtc->Text = $row['tc'];

         $this->TraeDetalle();
      }
   }

   function TraeDetalle()
   {
      $edtc = $this->edtc->Text;
      $idmoneda = $this->cbmoneda->ItemIndex;
      $pd = GetConfiguraciones('preciodefaultcore');

      $precios = "round(if('" . $idmoneda . "'=1, pm.costo, pm.costo/'" . $edtc . "'),2) as costo,

          round(if('" . $idmoneda . "'=pm.idmoneda, pm.precioa, if(pm.idmoneda=1, pm.precioa/'" . $edtc . "',
          pm.precioa*'" . $edtc . "' ) ),2)  as precioa,

          round(if('" . $idmoneda . "'=pm.idmoneda, pm.preciob, if(pm.idmoneda=1, pm.preciob/'" . $edtc . "',
          pm.preciob*'" . $edtc . "' ) ),2)  as preciob,

          round(if('" . $idmoneda . "'=pm.idmoneda, pm.precioc, if(pm.idmoneda=1, pm.precioc/'" . $edtc . "',
          pm.precioc*'" . $edtc . "' ) ),2)  as precioc,

          round(if('" . $idmoneda . "'=pm.idmoneda, pm.preciod, if(pm.idmoneda=1, pm.preciod/'" . $edtc . "',
          pm.preciod*'" . $edtc . "' ) ),2)  as preciod,

          round(if('" . $idmoneda . "'=pm.idmoneda, pm.precioe, if(pm.idmoneda=1, pm.precioe/'" . $edtc . "',
          pm.precioe*'" . $edtc . "' ) ),2)  as precioe,

          round(if('" . $idmoneda . "'=pm.idmoneda, pm." . $pd . ", if(pm.idmoneda=1, pm." . $pd . "/'" . $edtc . "',
          pm." . $pd . "*'" . $edtc . "' ) ),2)  as preciodefault,";

      $rsm = "SELECT distinct d.idcontador, d.cveparte, p.descripcion, d.cantidad,
              d.idoperador, u.tecnico as operador, d.precio,
              d.surtido, d.costo, d.idsupercision, " . $precios . "
              round(d.surtido * d.precio,2) as importe, c.cvecore as child, d.padre as father
              FROM serefacciones AS d left join repartes p on p.cveparte=d.cveparte
              left join repartesmov pm on pm.cveparte=p.cveparte
              and pm.idalmacen = " . $this->hfidalmacen->value . "
              left join repartescores c on c.cveparte=p.cveparte
              left join usuarios u on u.idusuario=d.idoperador
              where d.serie='" . $this->edserie->Text . "' and d.idservicio ='" . $this->edidservicio->Text . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $i = 0;
      $tabla = array();
      while($row = mysql_fetch_array($r))
      {
         $tabla[$i] = array('idcontador' => $i,
                            'idoperador' => $row['idoperador'],
                            'operador' => strtoupper($row['operador']),
                            'cveparte' => $row['cveparte'],
                            'descripcion' => $row['descripcion'],
                            'cantidad' => $row['cantidad'],
                            'surtido' => $row['surtido'],
                            'costo' => $row['costo'],
                            'precio' => $row['precio'],
                            'precio1' => $row['precioa'],
                            'precio2' => $row['preciob'],
                            'precio3' => $row['precioc'],
                            'precio4' => $row['preciod'],
                            'precio5' => $row['precioe'],
                            'precio5' => $row['precioe'],
                            'preciodefault' => $row['preciodefault'],
                            'importe' => $row['importe'],
                            'idsupercision' => $row['idsupercision'],
                            'father' => $row['father'],
                            'child' => $row['child']
                            );
         $i++;
      }
      $_SESSION['tablaSEVEN'] = array();
      $_SESSION['tablaSEVEN'] = $tabla;
      $_SESSION['tablaSEVENvales'] = array();
   }

   function GuardarDetalle()
   {
      $tabla = $_SESSION['tablaSEVEN'];
      $t = count($tabla) - 1;
      if($this->hfestatus->Value == '1')
      {
         for($i = 0; $i <= $t; $i++)
            $this->BDAgregar($i);
      }
      else
      {
         $rsm = "Select idcontador, cveparte, padre from serefacciones
              where serie='" . $this->edserie->Text . "' and idservicio = '" . $this->edidservicio->Text . "'";
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

         while($row = mysql_fetch_array($r))
         {
            $ban = false;
            for($i = 0; $i <= $t; $i++)
            {
               if($row['cveparte'] == $tabla[$i]['cveparte'])
                  $ban = true;
            }

            if($ban == false)
            {
               if($row['padre'] == '')
                  $this->BDDelRow($row['idcontador']);
               else
               {
                  $this->EditCore($i, $row['idcontador'], true);
               }
            }
         }

         for($i = 0; $i <= $t; $i++)
         {
            $rsm = "Select idcontador, cveparte, cantidad, surtido, precio from serefacciones
                    where serie='" . $this->edserie->Text . "' and idservicio = '" . $this->edidservicio->Text . "'
                    and cveparte='" . $tabla[$i]['cveparte'] . "'";
            $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
            if(mysql_num_rows($r) == 0)
               $this->BDAgregar($i);
            else
            {
               $row = mysql_fetch_array($r);
               if(!($row['cantidad'] == $tabla[$i]['cantidad'] && $row['precio'] == $tabla[$i]['precio']))
               {
                  $this->BDDelRow($row['idcontador']);
                  $this->BDAgregar($i);
               }

               if($tabla[$i]['father'] != '' && $row['surtido'] != $tabla[$i]['surtido'])
               {
                  //cambio el idcontador buscar de nuevo
                  $rsm = "Select idcontador, cveparte, cantidad, surtido, precio from serefacciones
                          where serie='" . $this->edserie->Text . "' and idservicio = '" . $this->edidservicio->Text . "'
                          and cveparte='" . $tabla[$i]['cveparte'] . "'";
                  $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
                  $row = mysql_fetch_array($r);
                  $this->EditCore($i, $row['idcontador']);
               }
            }
         }
      }

      $sql = 'update seservicios set totalref = ' . str_replace(',', '', $this->edsubtotal->Text) . ' where serie="' . $this->edserie->Text . '"
          and idservicio = "' . $this->edidservicio->Text . '"';
      $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
   }

   function BDAgregar($row)
   {
      $tabla = $_SESSION['tablaSEVEN'];
      $edparte = $tabla[$row]['cveparte'];
      $idsupercision = $tabla[$row]['idsupercision'];
      $cantidad = $tabla[$row]['cantidad'];
      $surtido = $tabla[$row]['surtido'];
      $costo = round($tabla[$row]['costo'], 2);
      $precio = round($tabla[$row]['precio'], 2);
      $importe = round($tabla[$row]['precio'] * $tabla[$row]['cantidad'], 2);
      $padre = $tabla[$row]['father'];
      $idoperador = $tabla[$row]['idoperador'];

      //inserta el detalle
      $rsm = "Insert into serefacciones (serie, idservicio, idoperador, idalmacen, cveparte,
              cantidad, surtido, idsupercision, costo, precio, importe, padre, usuario, fecha, hora)
              values ('" . $this->edserie->Text . "', " . $this->edidservicio->Text . ",
              " . $idoperador . ",  " . $this->hfidalmacen->Value . ",
              '" . $edparte . "', '" . $cantidad . "', '" . $surtido . "', '" . $idsupercision . "',
              '" . $costo . "', '" . $precio . "', '" . $importe . "', '" . $padre . "',
              '" . $_SESSION['login'] . "', curdate(), curtime())";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      //Actualiza enproceso
      $rsm = "Update repartesmov set enproceso=enproceso+'" . $surtido . "',
         disponibles=disponibles-'" . $surtido . "',
         usuario='" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
         where cveparte='" . $edparte . "' and idalmacen='" . $this->hfidalmacen->value . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      //Inserta en el Kardex
      InsertaKardex($this->hfidalmacen->value, $edparte, ($this->edserie->Text . $this->edidservicio->Text),
      'S', $cantidad, 'Carga de refacciones a servicio', 20);
      dmconexion::Log('Inserto en la Orden de Servicio ' . $this->edserie->Text . $this->edidservicio->Text . ' las partes: ' .
      $cantidad . ' unidad(es) de ' . $edparte . ' - ' . $_SESSION['tablaSEVEN'][$row]['descripcion'] . '', 2);
   }

   function BDDelRow($idcontador)
   {
      $rsm = "SELECT d.idoperador, u.tecnico, d.cantidad, d.surtido, d.cveparte, p.descripcion, d.padre
              from serefacciones d left join repartes p on p.cveparte=d.cveparte
              left join usuarios u on u.idusuario=d.idoperador
              where idcontador = " . $idcontador;
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $row = mysql_fetch_array($r);
      $cantidad = $row['cantidad'];
      $surtido = $row['surtido'];
      $cantcore = $row['cantidad'] - $row['surtido'];
      $cveparte = $row['cveparte'];
      $idalmacen = $this->hfidalmacen->value;
      $descripcion = $row['descripcion'];
      $padre = $row['padre'];
      $tecnico = $row['tecnico'];
      $idoperador = $row['idoperador'];

      $rsm = "Update repartesmov set enproceso=enproceso-'" . $surtido . "',
              disponibles=disponibles+'" . $surtido . "',
              usuario='" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
              where cveparte='" . $cveparte . "' and idalmacen='" . $idalmacen . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      dmconexion::Log('Elimino en la Orden de Servicio ' . $this->edserie->Text . $this->edidservicio->Text . ' la parte ' . $cantidad . ' ' . $descripcion . '', 3);

      //Inserta en el Kardex
      InsertaKardex($idalmacen, $cveparte, ($this->edserie->Text . $this->edidservicio->Text),
      'E', $cantidad, 'Entrada por Edicion de Orden de Servicio del usuario: ' . $idoperador . ' tecnico: ' . $tecnico, 21);

      $rsm = "Delete from serefacciones where idcontador ='" . $idcontador . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

   }

   function EditCore($row, $idcontador, $del = false)
   {
      if($del == false)
      {
         $tabla = $_SESSION['tablaSEVEN'];
         $cveparte = $tabla[$row]['cveparte'];
         $idsupercision = $tabla[$row]['idsupercision'];
         $cantnvo = $tabla[$row]['cantidad'];
         $surtnvo = $tabla[$row]['surtido'];
         $costo = round($tabla[$row]['costo'], 2);
         $precio = round($tabla[$row]['precio'], 2);
         $importe = round($tabla[$row]['precio'] * $tabla[$row]['cantidad'], 2);
         $padre = $tabla[$row]['father'];
         $idoperador = $tabla[$row]['idoperador'];

         $idalmacen = $this->hfidalmacen->value;

         $rsm = "SELECT d.idoperador, u.tecnico,d.cantidad, d.surtido, d.cveparte, p.descripcion, d.padre
              from serefacciones d left join repartes p on p.cveparte=d.cveparte
              left join usuarios u on u.idusuario=d.idoperador
              where idcontador = " . $idcontador;
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
         $row = mysql_fetch_array($r);
         $surtant = $row['surtido'];
         $cantant = $row['cantidad'];
         $cantcores = $cantnvo - $surtnvo;
         $descripcion = $row['descripcion'];
         $tecnico = $row['tecnico'];

         //entrada de cores sucios
         if($surtnvo < $surtant)
         {
            $cant = $surtant - $surtnvo;
            $rsm = "Update repartescoresucios set existencia=existencia+'" . $cant . "',
              ultentrada=curdate(), usuario='" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
              where cvecore='" . $cveparte . "' and idalmacen='" . $idalmacen . "'";
            $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

            $rsm = "Update repartesmov set existencia=existencia-'" . $cant . "',
              enproceso=enproceso-'" . $cant . "',
              usuario='" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
              where cveparte='" . $cveparte . "' and idalmacen='" . $idalmacen . "'";
            $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

            //Inserta en el Kardex
            InsertaKardex($idalmacen, $cveparte, ($this->edserie->Text . $this->edidservicio->Text),
            'S', $cant, 'Salida por descarga de core en Orden de Servicio del usuario: ' . $idoperador . ' tecnico: ' . $tecnico, 22);

            //Inserta en el Kardex
            InsertaKardexCores($idalmacen, $cveparte, ($this->edserie->Text . $this->edidservicio->Text),
            'E', $cant, 'Entrada por descarga de core en Orden de Servicio del usuario: ' . $idoperador . ' tecnico: ' . $tecnico, 29);

            dmconexion::Log('Dio salida de core Limpio y entrada de Core Sucio ' .
            $this->edserie->Text . $this->edidservicio->Text . ' la parte ' . $cant . ' ' . $descripcion . '', 3);
         }

         //cancelacion de entrada de cores sucios
         if($surtant < $surtnvo)
         {
            $cant = $surtnvo - $surtant;
            $rsm = "Update repartescoresucios set existencia=existencia-'" . $cant . "', ultsalida=curdate(),
              usuario='" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
              where cvecore='" . $cveparte . "' and idalmacen='" . $idalmacen . "'";
            $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

            $rsm = "Update repartesmov set existencia=existencia+'" . $cant . "',
              enproceso=enproceso+'" . $cant . "',
              usuario='" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
              where cveparte='" . $cveparte . "' and idalmacen='" . $idalmacen . "'";
            $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

            //Inserta en el Kardex
            InsertaKardex($idalmacen, $cveparte, ($this->edserie->Text . $this->edidservicio->Text),
            'E', $cant, 'Entrada por cancelacion de descarga de core en Orden de Servicio del usuario: ' . $idoperador . ' tecnico: ' . $tecnico, 23);

            //Inserta en el Kardex
            InsertaKardexCores($idalmacen, $cveparte, ($this->edserie->Text . $this->edidservicio->Text),
            'S', $cant, 'Salida por cancelacion de descarga de core en Orden de Servicio del usuario: ' . $idoperador . ' tecnico: ' . $tecnico, 28);

            dmconexion::Log('Dio salida de core Limpio y entrada de Core Sucio ' .
            $this->edserie->Text . $this->edidservicio->Text . ' la parte ' . $cant . ' ' . $descripcion . '', 3);
         }

         //aumento en parte
         if($cantnvo < $cantant)
         {
            $cant = $cantant - $cantnvo;

            $rsm = "Update repartesmov set disponibles=disponibles-'" . $cant . "',
              enproceso=enproceso+'" . $cant . "',
              usuario='" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
              where cveparte='" . $cveparte . "' and idalmacen='" . $idalmacen . "'";
            $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
         }

         //disminucion en parte
         if($cantant < $cantnvo)
         {
            $cant = $cantnvo - $cantant;

            $rsm = "Update repartesmov set disponibles=disponibles+'" . $cant . "',
              enproceso=enproceso-'" . $cant . "',
              usuario='" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
              where cveparte='" . $cveparte . "' and idalmacen='" . $idalmacen . "'";
            $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
         }


         $rsm = "update serefacciones set idoperador='" . $idoperador . "', cantidad='" . $cantnvo . "',
              surtido='" . $surtnvo . "', idsupercision='" . $idsupercision . "', costo='" . $costo . "',
              precio='" . $precio . "', importe='" . $importe . "', padre='" . $padre . "',
              usuario='" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
              where serie='" . $this->edserie->Text . "' and idservicio= " . $this->edidservicio->Text . "
              and cveparte='" . $cveparte . "'";
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());


         if($cantcores != 0)
         {
            $sql = 'update sevalescores set cantidad=cantidad+' . $cantcores . ',
          usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
          where serie="' . $this->edserie->Text . '" and idservicio = ' . $this->edidservicio->Text . '
          and cvecore="' . $cveparte . '" ';
            $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);

            $sql = 'delete from sevalescores where serie="' . $this->edserie->Text . '" and idservicio = ' . $this->edidservicio->Text . '
          and cvecore="' . $cveparte . '" and cantidad = 0';
            $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
         }

         //checa si aun hay cores por entregar para borrar el renglon
         $sql = "Delete from serefacciones where serie='" . $this->edserie->Text . "' and idservicio= " . $this->edidservicio->Text . "
              and cveparte='" . $cveparte . "' and surtido=0";
         $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
      }
      else
      {
         //BORRAR EL CORE
         $rsm = "SELECT d.idoperador, u.tecnico,d.cantidad, d.surtido, d.cveparte, p.descripcion, d.padre
              from serefacciones d left join repartes p on p.cveparte=d.cveparte
              left join usuarios u on u.idusuario=d.idoperador
              where idcontador = " . $idcontador;
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
         $row = mysql_fetch_array($r);
         $surtant = $row['surtido'];
         $cantant = $row['cantidad'];
         $cantcores = $cantnvo - $surtnvo;
         $descripcion = $row['descripcion'];
         $tecnico = $row['tecnico'];
         $cveparte = $row['cveparte'];
         $idalmacen = $this->hfidalmacen->value;
         $padre = $row['padre'];
         $tecnico = $row['tecnico'];
         $idoperador = $row['idoperador'];

         $rsm = "Update repartescoresucios set existencia=existencia+'" . $surtant . "', ultentrada=curdate(),
              usuario='" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
              where cvecore='" . $cveparte . "' and idalmacen='" . $idalmacen . "'";
            $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

         $rsm = "Update repartesmov set enproceso=enproceso-'" . $surtant . "',
              existencia=existencia-'" . $surtant . "', ultsalida=curdate(),
              usuario='" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
              where cveparte='" . $cveparte . "' and idalmacen='" . $idalmacen . "'";
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

         dmconexion::Log('Elimino en la Orden de Servicio ' . $this->edserie->Text . $this->edidservicio->Text . ' la parte ' . $cantidad . ' ' . $descripcion . '', 3);

         //Inserta en el Kardex
         InsertaKardex($idalmacen, $cveparte, ($this->edserie->Text . $this->edidservicio->Text),
         'S', $surtant, 'Salida por descarga de core en Orden de Servicio del usuario: ' . $idoperador . ' tecnico: ' . $tecnico, 22);

         //Inserta en el Kardex
         InsertaKardexCores($idalmacen, $cveparte, ($this->edserie->Text . $this->edidservicio->Text),
         'E', $surtant, 'Entrada por descarga de core en Orden de Servicio del usuario: ' . $idoperador . ' tecnico: ' . $tecnico, 29);

         dmconexion::Log('Dio salida de core Limpio y entrada de Core Sucio ' .
         $this->edserie->Text . $this->edidservicio->Text . ' la parte ' . $surtant . ' ' . $descripcion . '', 3);

         $rsm = "Delete from serefacciones where idcontador ='" . $idcontador . "'";
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());


      }
   }

   function Validar()
   {
      if($this->hfidestatus->Value > 7)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("No puede Modificar Ordenes de Servicio cerradas");
              </script>';
         return false;
      }

      if($this->hfidtipopago->Value == 2)
      {
         $sql = 'Select totalmo, totaltot, montocredito, piva from seservicios
              where serie="' . $this->edserie->Text . '" and idservicio = ' . $this->edidservicio->text;

         $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
         $row = mysql_fetch_array($rs);
         $totalfuturo = ($row['totalmo'] + $row['totaltot'] + str_replace(',', '', $this->edsubtotal->Text));
         $totalfuturo = $totalfuturo * (1 + ($row['piva'] / 100));
         if($row['montocredito'] < $totalfuturo)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert("No puede rebasar el monto de credito asignado.");
                  </script>';
            return false;
         }
      }
      return true;
   }

   function Limpiar()
   {
      reset($this->controls->items);
      while(list($key, $val) = each($this->controls->items))
      {
         if($val->inheritsFrom("Edit"))
            $val->Text = "";
         if($val->inheritsFrom("ComboBox"))
            $val->ItemIndex = -1;
      }
      $this->lbufh->Caption = '';
   }

   function inicializa()
   {
      //moneda
      $this->cbmoneda->Clear();
      $this->cbmoneda->AddItem("Sin Clasificar", null , - 1);
      $cadena = 'select idmoneda id,iniciales as nombre from monedas ';
      $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);
      while($row = mysql_fetch_array($rs))
      {
         $this->cbmoneda->AddItem($row['nombre'], null , $row['id']);
      }
      mysql_free_result($rs);

      //piva
      $this->cbpiva->Clear();
      $this->cbpiva->AddItem("Sin Clasificar", null , - 1);
      $cadena = 'select (porcentaje/100) id, nombre from impuestos order by porcentaje desc';
      $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);
      while($row = mysql_fetch_array($rs))
      {
         $this->cbpiva->AddItem($row['nombre'], null , $row['id']);
      }
      mysql_free_result($rs);
   }
}

global $application;

global $userefacciones;

//Creates the form
$userefacciones = new userefacciones($application);

//Read from resource file
$userefacciones->loadResource(__FILE__);

//Shows the form
$userefacciones->show();

?>