<script type='text/javascript' src='funciones.js'></script>
<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
require_once("vcl/vcl.inc.php");
//Includes
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class useservicios extends Page
{
   public $edkilometraje = null;
   public $Label53 = null;
   public $edplacas = null;
   public $Label52 = null;
   public $edeconomico = null;
   public $Label51 = null;
   public $edfactura = null;
   public $Label49 = null;
   public $edmontocredito = null;
   public $Label50 = null;
   public $edciudad = null;
   public $Label47 = null;
   public $edrfc = null;
   public $edtel = null;
   public $eddir = null;
   public $Label46 = null;
   public $Label30 = null;
   public $Label24 = null;
   public $btnvin = null;
   public $lbprefactura = null;
   public $btnprefactura = null;
   public $edprestotalmn = null;
   public $Label18 = null;
   public $edverificacion = null;
   public $cbtecnico = null;
   public $Label28 = null;
   public $edprestotal = null;
   public $edpresref = null;
   public $edprestot = null;
   public $edpresmo = null;
   public $Label48 = null;
   public $Label45 = null;
   public $Label44 = null;
   public $Label26 = null;
   public $lbfactura = null;
   public $btnfactura = null;
   public $edpromesa = null;
   public $Label25 = null;
   public $hfidestatus = null;
   public $hfidnota = null;
   public $lbhistorial = null;
   public $lbnotas = null;
   public $hfidtarifa = null;
   public $edtotalmn = null;
   public $Label43 = null;
   public $imgtc = null;
   public $Label42 = null;
   public $cbpiva = null;
   public $Label41 = null;
   public $edtc = null;
   public $Label40 = null;
   public $cbmoneda = null;
   public $hfpresupuesto = null;
   public $hfactivar = null;
   public $hfidauditor = null;
   public $edfallas = null;
   public $dttermino = null;
   public $edtotal = null;
   public $ediva = null;
   public $edsubtotal = null;
   public $Label39 = null;
   public $Label38 = null;
   public $Label29 = null;
   public $Label23 = null;
   public $dtcreacion = null;
   public $Label9 = null;
   public $dtentrega = null;
   public $Label8 = null;
   public $Label11 = null;
   public $hfdetalle = null;
   public $hfidcontador = null;
   public $btnagregar = null;
   public $lbdetalle = null;
   public $Label22 = null;
   public $lbprestamos = null;
   public $btnprestamos = null;
   public $edfinal = null;
   public $Label37 = null;
   public $edtotalref = null;
   public $edtotaltot = null;
   public $edtotalmo = null;
   public $Label36 = null;
   public $Label35 = null;
   public $Label33 = null;
   public $lbref = null;
   public $btnref = null;
   public $btntot = null;
   public $lbtot = null;
   public $lbmo = null;
   public $btnmo = null;
   public $edinicio = null;
   public $Label27 = null;
   public $lbarchivo = null;
   public $btnarchivo = null;
   public $btnbuscarasesor = null;
   public $btnbuscarcli = null;
   public $edunidad = null;
   public $lbimprimir = null;
   public $btnimprimir = null;
   public $edobservaciones = null;
   public $edtelefono = null;
   public $edatencion = null;
   public $edventa = null;
   public $edcolor = null;
   public $edano = null;
   public $edmotor = null;
   public $edvin = null;
   public $cbestatus = null;
   public $cbtiposervicio = null;
   public $cbtipopago = null;
   public $edasesor = null;
   public $edidasesor = null;
   public $edcliente = null;
   public $edidcliente = null;
   public $edidservicio = null;
   public $Label21 = null;
   public $Label20 = null;
   public $Label19 = null;
   public $Label16 = null;
   public $Label15 = null;
   public $Label14 = null;
   public $Label13 = null;
   public $Label12 = null;
   public $Label6 = null;
   public $Label10 = null;
   public $Label7 = null;
   public $Label5 = null;
   public $cbalmacen = null;
   public $Label17 = null;
   public $Label4 = null;
   public $Label2 = null;
   public $Label3 = null;
   public $lbufh = null;
   public $edserie = null;
   public $Label1 = null;
   public $lbnuevo = null;
   public $btnnuevo = null;
   public $pbotones = null;
   public $Label34 = null;
   public $btnregresar = null;
   public $btngcerrar = null;
   public $Label32 = null;
   public $Label31 = null;
   public $btnguardar = null;
   public $lbtitulo = null;
   public $hfestatus = null;
   function cbtipopagoJSChange($sender, $params)
   {
?>
   basicAjax('useservicios_ajax.php','cbtipopagochange=1'+
                '&tipopago=' + vcl.$('cbtipopago').value);
<?php
   }

   function btnvinClick($sender, $params)
   {
      redirect('usearchivocolgantevista.php?pagina=useservicios.php&idcliente=' . $this->edidcliente->Text .
      '&idservicio=' . $this->edidservicio->Text . '&serie=' . $this->edserie->Text);
   }


   function edmontocreditoJSKeyPress($sender, $params)
   {
?>
   if( ValidaEntero(vcl.$('edmontocredito').value, event) != event.keyCode)
           return false;

   if(event.keyCode == 13)
          return false;
<?php
   }


   function btnprefacturaJSClick($sender, $params)
   {
?>
   var exhibir = 0;
   if(vcl.$('hfidestatus').value > 1)
   {
    if(confirm('Desea visualizar las claves?'))
      exhibir = 1;
    else
      exhibir = 0;

    basicAjax('useservicios_ajax.php','PreFactura=1'+'&serie=' + vcl.$('edserie').value+
                '&idservicio='+ vcl.$('edidservicio').value+'&mostrarpartes='+exhibir);

   }
   else
      alert('Favor de Abrir la Orden primero.');
<?php
   }

   function btnfacturaJSClick($sender, $params)
   {
?>
   if(vcl.$('hfidestatus').value == 8)
      basicAjax('useservicios_ajax.php','Facturar=1'+'&serie=' + vcl.$('edserie').value+
                '&idservicio='+ vcl.$('edidservicio').value+'&idtipopago='+vcl.$('cbtipopago').value+
                '&idalmacen='+vcl.$('cbalmacen').value+'&idcliente='+vcl.$('edidcliente').value+
                '&totalmn='+vcl.$('edtotalmn').value);
   else
      alert('El estatus no es Finalizado');
<?php
   }

   function btnimprimirJSClick($sender, $params)
   {
?>
   if(vcl.$('hfidestatus').value > 1)
      basicAjax('useservicios_ajax.php','Imprimir=1&idservicio='+vcl.$('edidservicio').value+'&serie='+
                vcl.$('edserie').value);
   else
      alert('Favor de Abrir la orden primero.');
<?php
   }

   function edidasesorJSKeyPress($sender, $params)
   {
?>
   if(event.keyCode == 13)
      return false;

   if( ValidaEntero(vcl.$('edidasesor').value, event) != event.keyCode)
      return false;
<?php
   }

   function edpresrefJSKeyPress($sender, $params)
   {
?>
   if(event.keyCode == 13)
      return false;

   if( ValidaDecimal(vcl.$('edpresref').value, event) != event.keyCode)
      return false;
<?php
   }

   function edprestotJSKeyPress($sender, $params)
   {
?>
   if(event.keyCode == 13)
      return false;

   if( ValidaDecimal(vcl.$('edprestot').value, event) != event.keyCode)
      return false;
<?php
   }

   function edpresmoJSKeyPress($sender, $params)
   {
?>
   if(event.keyCode == 13)
      return false;

   if( ValidaDecimal(vcl.$('edpresmo').value, event) != event.keyCode)
      return false;
<?php
   }


   function edfallasJSKeyPress($sender, $params)
   {
?>
   if(event.keyCode == 13)
      {
       btnagregarJSClick(event);
       event.keyCode = 32;
       return false;
       }
<?php
   }

   function edpresmoJSBlur($sender, $params)
   {
?>
   if(vcl.$('edprestot').value == '')
      vcl.$('edprestot').value = '0';

   if(vcl.$('edpresref').value == '')
      vcl.$('edpresref').value = '0';

   if(vcl.$('edpresmo').value == '')
      vcl.$('edpresmo').value = '0';

   vcl.$('edprestotal').value = parseFloat(vcl.$('edprestot').value) + parseFloat(vcl.$('edpresref').value) + parseFloat(vcl.$('edpresmo').value);
   if(vcl.$('cbmoneda').value == 1)
      vcl.$('edprestotalmn').value = parseFloat(vcl.$('edprestotal').value);
   else
      vcl.$('edprestotalmn').value = round(parseFloat(vcl.$('edprestotal').value) * parseFloat(vcl.$('edtc').value),2);
<?php
   }

   function edidasesorJSChange($sender, $params)
   {
?>
   if(vcl.$('edidasesor').value == '')
     vcl.$('edasesor').value = '';
<?php
   }

   function edidclienteJSChange($sender, $params)
   {
?>
   if(vcl.$('edidcliente').value == '')
     vcl.$('edcliente').value = '';
<?php
   }

   function lbnotasJSClick($sender, $params)
   {
?>
   if(vcl.$('hfestatus').value == 1)
      alert('Primero debes guardar los datos');
   else
     document.location.href("unotas.php?idnota=" + vcl.$('hfidnota').value +
      "&procedencia=seservicios&idprocedencia=" + vcl.$('edidservicio').value +
      "&serie=" + vcl.$('edserie').value);
<?php
   }

   function imgtcJSClick($sender, $params)
   {
?>

<?php
   }

   function cbmonedaJSChange($sender, $params)
   {
?>
   basicAjax('useservicios_ajax.php', 'MonedaChange='+vcl.$('cbmoneda').value+'&tc='+vcl.$('edtc').value+
             '&idtipopago='+vcl.$('cbtipopago').value);
<?php
   }

   function btnagregarJSClick($sender, $params)
   {
?>
   basicAjax('useservicios_ajax.php', 'Agregar=1&fallas='+vcl.$('edfallas').value+
             '&idauditor='+vcl.$('hfidauditor').value+'&verificacion='+vcl.$('edverificacion').value+
             '&auditor='+vcl.$('hfidauditor').value+
             '&hfestatus='+vcl.$('hfestatus').value+'&hfidestatus='+vcl.$('hfidestatus').value+
             '&hfdetalle='+vcl.$('hfdetalle').value+'&hfidcontador='+vcl.$('hfidcontador').value);
<?php
   }

   function edpromesaJSKeyUp($sender, $params)
   {
?>
   RelojDigital(vcl.$('edpromesa'));
<?php
   }

   function edpromesaJSKeyPress($sender, $params)
   {
?>
    RelojDigital(vcl.$('edpromesa'));
<?php
   }

   function edfinalJSKeyUp($sender, $params)
   {
?>
   RelojDigital(vcl.$('edfinal'));
<?php
   }

   function edfinalJSKeyPress($sender, $params)
   {
?>
   if(event.keyCode != 58)
    if( ValidaDecimal(vcl.$('edfinal').value, event) != event.keyCode)
           return false;

   if(event.keyCode == 13)
          return false;
<?php
   }

   function edinicioJSKeyPress($sender, $params)
   {
?>
   if(event.keyCode != 58)
    if( ValidaDecimal(vcl.$('edinicio').value, event) != event.keyCode)
           return false;

   if(event.keyCode == 13)
          return false;
<?php
   }

   function edinicioJSKeyUp($sender, $params)
   {
?>
   RelojDigital(vcl.$('edinicio'));
<?php
   }

   function edvinJSBlur($sender, $params)
   {
?>
   if(vcl.$('edvin').value != '')
     basicAjax('useservicios_ajax.php', 'TraeVIN='+vcl.$('edvin').value);
<?php
   }

   function edidasesorJSBlur($sender, $params)
   {
?>
   if(vcl.$('edidasesor').value != '')
     basicAjax('useservicios_ajax.php', 'TraeAsesor='+vcl.$('edidasesor').value);
<?php
   }

   function edidclienteJSBlur($sender, $params)
   {
?>
   if(vcl.$('edidcliente').value != '')
     basicAjax('useservicios_ajax.php', 'TraeCliente='+vcl.$('edidcliente').value);
<?php
   }

   function edidclienteJSKeyPress($sender, $params)
   {
?>
   if( ValidaDecimal(vcl.$('edcliente').value, event) != event.keyCode)
           return false;

   if(event.keyCode == 13)
          return false;
<?php
   }

   function edserieJSKeyPress($sender, $params)
   {
?>
   if(event.keyCode == 13)
          return false;
<?php
   }

   function cbalmacenJSFocus($sender, $params)
   {
?>
   if(vcl.$('cbestatus').value > 0 )
      {
      alert('No puedes modificar el almacen despues de presupuesto.');
      return false;
      }
<?php
   }

   function btnexportarJSClick($sender, $params)
   {
?>
   basicAjax('useservicios_ajax.php','ExportarServicio='+vcl.$('edidservicio').value+'&serie='+
    vcl.$('edserie').value);
<?php
   }

   function useserviciosJSLoad($sender, $params)
   {
?>
   validarEventos();
    var h = '';

    if(vcl.$('edidcliente').value != '' && vcl.$('edcliente').value == '')
       h = '&TraeCliente='+vcl.$('edidcliente').value;

    if(vcl.$('edidasesor').value != '' && vcl.$('edasesor').value == '')
       h = h+'&TraeAsesor='+vcl.$('edidasesor').value;

    if(vcl.$('edvin').value != '')
       h = h + '&TraeVIN='+vcl.$('edvin').value;


    basicAjax('useservicios_ajax.php', 'Load=1&idservicio='+vcl.$('edidservicio').value+'&serie='+
              vcl.$('edserie').value+'&hfestatus='+vcl.$('hfestatus').value+'&hfidestatus='+vcl.$('hfidestatus').value+h);
<?php
   }

   function btnprestamosClick($sender, $params)
   {
   if(Derechos('SECARHERR') != true && Derechos('SERECHERR')!= true)
      {
         echo '<script language="javascript" type="text/javascript">
         alert("No tienes derecho para cargar o recibir Herramienta");
         </script>';
      }
      else
      redirect('useprestamos.php?serie=' . $this->edserie->Text . '&idservicio=' . $this->edidservicio->Text);
   }

   function btnrefClick($sender, $params)
   {
   if(Derechos('SECARREF') != true && Derechos('SEDESCARREF')!= true)
      {
         echo '<script language="javascript" type="text/javascript">
         alert("No tienes derecho para cargar o descargar refacciones");
         </script>';
      }
      else
      redirect('userefacciones.php?serie=' . $this->edserie->Text . '&idservicio=' . $this->edidservicio->Text);
   }

   function btntotClick($sender, $params)
   {
   if(Derechos('SECAROC') != true)
      {
         echo '<script language="javascript" type="text/javascript">
         alert("No tienes derecho para cargar Otros Cargos");
         </script>';
      }
      else
      redirect('useotrostalleres.php?serie=' . $this->edserie->Text . '&idservicio=' . $this->edidservicio->Text);
   }

   function btnmoClick($sender, $params)
   {
      if(Derechos('SECARMO') != true)
      {
         echo '<script language="javascript" type="text/javascript">
         alert("No tienes derecho para cargar Mano de Obra");
         </script>';
      }
      else
         redirect('usemanoobra.php?serie=' . $this->edserie->Text . '&idservicio=' . $this->edidservicio->Text);
   }

   function btnarchivoClick($sender, $params)
   {
      if($this->edidcliente->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
         alert("Falta el cliente");
         </script>';
      }
      else
      {
         if($this->edvin->Text == '')
            $this->edvin->Text = '0';

         redirect('usearchivocolgante.php?vin=' . $this->edvin->Text . '&idcliente=' . $this->edidcliente->Text .
         '&idservicio=' . $this->edidservicio->Text . '&serie=' . $this->edserie->Text);
      }
   }

   function btnbuscarasesorClick($sender, $params)
   {
      redirect('uusuariosvista.php?pagina=useservicios.php&area=servicios');
   }

   function btnbuscarcliClick($sender, $params)
   {
      redirect('uclientesvista.php?pagina=useservicios.php&serie=' . $this->edserie->Text . '&idservicio=' . $this->edidservicio->Text);
   }

   function btnguardarClick($sender, $params)
   {
      if($this->Validar() != false)
      {
         $this->guardar();
         redirect('useservicios.php?serie=' . $this->edserie->Text . '&idservicio=' . $this->edidservicio->text);
      }
   }

   function btngcerrarClick($sender, $params)
   {
      if($this->Validar() != false)
      {
         $this->guardar();
         redirect('useserviciosvista.php');
      }
   }

   function btnregresarClick($sender, $params)
   {
      redirect('useserviciosvista.php');
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('SEALSERV') == false)
      {
         echo '<script language="javascript" type="text/javascript">
         alert("No puede Agregar Servicios");
         </script>';
      }
      else
         redirect("useservicios.php?idservicio=0");
   }

   function useserviciosShow($sender, $params)
   {
      $this->lbtitulo->Caption = $this->Caption;
      $this->pbotones->Width = $_SESSION["width"] - 201;

      if(isset($_GET['idcliente']))
         $this->edidcliente->Text = $_GET['idcliente'];

      if(isset($_GET['id']))
      {
         $this->edidasesor->Text = $_GET['id'];
         $this->edasesor->Text = '';
      }

      if(isset($_GET['vin']))
         $this->edvin->Text = $_GET['vin'];

      if(isset($_GET["idservicio"]))
      {
         $this->edidservicio->Text = $_GET["idservicio"];
         if($this->edidservicio->Text == 0)
            $this->hfestatus->Value = 1;
         else
            $this->hfestatus->Value = 2;

         if($this->edidservicio->Text == 0 && $this->hfestatus->Value == 1)
         {
            $this->Limpiar();
            $this->inicializa();
            $this->Alta();
         }
         else
         {
            $this->Limpiar();
            $this->inicializa();
            $this->Locate();
         }
      }
   }

   function Alta()
   {
      //folio por tipo de operacion
      $rsm = "select clave, folio+1 as folio from folios where idtipo = 7 and idplaza = " . $_SESSION['sesidplaza'];
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $row = mysql_fetch_row($r);
      $this->edserie->Text = $row[0];
      $this->edidservicio->Text = $row[1];

      $this->cbestatus->ItemIndex = 1;

      $this->cbalmacen->ItemIndex = $_SESSION['sesidalmacen'];
      $this->dtcreacion->Text = Fecha();
      $this->edinicio->Text = Hora();
      $this->edpromesa->Text = Hora();
      $this->dtentrega->Text = Manana();

      $this->edverificacion->ReadOnly = true;
      $this->hfidestatus->Value = 1;

      $this->edidasesor->Text = $_SESSION['sesidusuario'];
      $this->edasesor->Text = $_SESSION['sesnombre'];

      $rsm = "Select vcontado as tc from tiposcambio order by idcontador desc limit 1";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $row = mysql_fetch_array($r);
      if($row != false)
         $this->edtc->Text = $row['tc'];
      else
         echo '<script language="javascript" type="text/javascript">
               alert("No hay tipo de cambio del dia seleccionado.");
               </script>';

      $rsm = "select (porcentaje/100) from impuestos where `default` = 1";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $row = mysql_fetch_row($r);
      $this->cbpiva->ItemIndex = $row[0];
      $this->habilitar(true);
      $this->edmontocredito->ReadOnly = true;
      $this->cbestatus->Enabled = false;

      $_SESSION['tablafallas'] = array();
   }

   function Locate()
   {
      if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
      {
         if($_GET["idservicio"] != 0)
         {

            $this->edverificacion->ReadOnly = false;

            $this->edserie->Text = $_GET["serie"];
            $this->edidservicio->Text = $_GET["idservicio"];

            $r = ufh('s');

            $cadena = 'SELECT s.idalmacen, s.idestatus, e.activo, e.nombre as estatus,
                      s.fechacreacion, s.fechapromesa, s.fechatermino, s.idcliente, s.idnota,
                      ' . NombreCliente('c') . ' as cliente, concat(c.direccion, " ", c.numero,
                      " ", c.colonia) as dir, concat(c.municipio, ", ", c.estado ) as ciudad,
                      c.telefono as tel, c.rfc, s.idfactura,
                      s.idasesor, s.idtecactual,
                      ' . NombreFisica('u') . ' as asesor, s.idtiposervicio, s.idtipopago,
                      s.vin, s.kilometraje, ac.codmotor, tu.nombre as unidad, ac.ano, s.piva, s.idmoneda, s.tc,
                      ac.color, ac.fechaventa, s.atencion, s.telefono,
                      s.observaciones, horainicio, horapromesa, horafinal,
                      s.totalmo, s.totalref, s.totaltot, s.subtotal, s.iva, s.total, s.totalmn,
                      s.presmo, s.prestot, s.presref, s.prestotal, s.prestotalmn, s.montocredito,
                      ' . $r . ' as ufh
                      FROM seservicios AS s left join realmacen a on a.idalmacen=s.idalmacen
                      left join seserviciosestatus e on e.idestatus=s.idestatus
                      left join clientes c on c.idcliente=s.idcliente
                      left join usuarios u on u.idusuario=s.idasesor
                      left join searchivocolgante ac on ac.vin=s.vin
                      left join setipounidad tu on tu.idunidad=ac.idunidad
                      where serie="' . $this->edserie->Text . '"
                      and idservicio="' . $this->edidservicio->Text . '"';
            $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);
            $row = mysql_fetch_array($rs);

            $this->dtcreacion->Text = $row["fechacreacion"];
            $this->dtentrega->Text = $row["fechapromesa"];
            $this->dttermino->Text = $row["fechatermino"];

            $this->edfactura->Text = $row["idfactura"];
            $this->edidcliente->Text = $row["idcliente"];
            $this->edcliente->Text = $row["cliente"];
            $this->eddir->Text = $row["dir"];
            $this->edtel->Text = $row["tel"];
            $this->edrfc->Text = $row["rfc"];
            $this->edciudad->Text = $row["ciudad"];
            $this->edidasesor->Text = $row["idasesor"];
            $this->edasesor->Text = $row["asesor"];

            $this->edvin->Text = $row["vin"];
            $this->edkilometraje->Text = $row["kilometraje"];
            $this->edmotor->Text = $row["codmotor"];
            $this->edunidad->Text = $row["unidad"];
            $this->edano->Text = $row["ano"];
            $this->edcolor->Text = $row["color"];
            $this->edventa->Text = $row["fechaventa"];
            $this->edatencion->Text = $row["atencion"];
            $this->edtelefono->Text = $row["telefono"];
            $this->edunidad->Text = $row["unidad"];

            $this->edtotalmo->Text = number_format($row["totalmo"], 2);
            $this->edtotalref->Text = $row["totalref"];
            $this->edtotaltot->Text = $row["totaltot"];

            $this->edtc->Text = $row["tc"];

            $this->edsubtotal->Text = $row["subtotal"];
            $this->ediva->Text = $row["iva"];
            $this->edtotal->Text = $row["total"];
            $this->edtotalmn->Text = $row["totalmn"];

            $this->edprestotal->Text = $row["prestotal"];
            $this->edprestotalmn->Text = $row["prestotalmn"];
            $this->edpresref->Text = $row["presref"];
            $this->edprestot->Text = $row["prestot"];
            $this->edpresmo->Text = $row["presmo"];
            $this->edmontocredito->Text = $row["montocredito"];

            $this->edobservaciones->Text = $row["observaciones"];

            $this->edinicio->Text = $row["horainicio"];
            $this->edpromesa->Text = LeftStr($row["horapromesa"], 5);
            $this->edfinal->Text = $row["horafinal"];

            $this->cbestatus->ItemIndex = $row["idestatus"];
            $this->cbalmacen->ItemIndex = $row["idalmacen"];
            $this->cbtecnico->ItemIndex = $row["idtecactual"];
            $this->cbtiposervicio->ItemIndex = $row["idtiposervicio"];
            $this->cbtipopago->ItemIndex = $row["idtipopago"];
            $this->cbpiva->ItemIndex = $row["piva"] / 100;
            $this->cbmoneda->ItemIndex = $row["idmoneda"];

            $this->hfidestatus->Value = $row["idestatus"];
            $this->hfidnota->Value = $row["idnota"];

            $this->cbestatus->Enabled = true;

            if($row["idestatus"] == 1)
               $this->Habilitar(true);
            else
               $this->Habilitar(false);

            if(Derechos('SEAUDFALLAS') == true)
               $this->edverificacion->Enabled = true;
            else
               $this->edverificacion->Enabled = false;

            $this->lbufh->Caption = $row["ufh"];

            if(($this->hfidestatus->Value >= 2 && $this->hfidestatus->Value < 8) && Derechos('SEASIGCRED') == true)
               $this->edmontocredito->ReadOnly = false;
            else
               $this->edmontocredito->ReadOnly = true;

            $this->TraeDetalle();
            $this->TraeNotas();

         }
      }
   }

   function TraeDetalle()
   {
      $rsm = "SELECT idcontador, fallas, verificacion, idauditor, u.iniciales as auditor,
              fechaverificacion, horaverificacion
              from sefallas f left join usuarios u on u.idusuario=f.idauditor
              where serie='" . $this->edserie->Text . "'
              and idservicio ='" . $this->edidservicio->Text . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $i = 0;
      $tabla = array();
      while($row = mysql_fetch_array($r))
      {
         $tabla[$i] = array('idcontador' => $i,
                            'fallas' => $row['fallas'],
                            'verificacion' => $row['verificacion'],
                            'auditor' => $row['auditor'],
                            'fechaverificacion' => $row['fechaverificacion'],
                            'horaverificacion' => $row['horaverificacion'],
                            'idauditor' => $row['idauditor']
                            );
         $i++;
      }
      $_SESSION['tablafallas'] = array();
      $_SESSION['tablafallas'] = $tabla;
   }

   function TraeNotas()
   {
      $r = ufh('n');
      $sql = 'select nota,' . str_replace("Modificado", "Elaborado ", $r) . ' as ufh
      from notasdet n left join usuarios u on n.usuario=u.login
      where idnota=' . $this->hfidnota->Value . ' ORDER BY n.fecha desc,n.hora DESC';
      $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);

      $i = 0;
      while($row = mysql_fetch_array($rs))
      {
         if(($i % 2) == 0)
            $c = "#ff5500";
         else
            $c = "#004080";

         $t .= '<br><strong>
							  <font color=' . $c . '>' . strtoupper($row['nota']) . '
							  </font>
						    </strong><br>';

         $t .= '<strong>
							  <font color=' . $c . '>' . $row['ufh'] . '
							  </font>
						    </strong><br>';
         $i++;
      }

      $this->lbhistorial->Caption = $t;
   }

   function Guardar()
   {
      if($this->hfestatus->Value == '1')
      {
         $msg = "Creo la Orden de Servicio No. " . $this->edserie->Text . $this->edidservicio->Text;
         $nivel = 1;
         $sql = 'Insert into seservicios (serie, idservicio, idalmacen, idcliente, idasesor, idtiposervicio,
                idestatus, fechacreacion, horacreacion, fechapromesa, horapromesa, idtipopago,
                vin, kilometraje, atencion, telefono, observaciones, idmoneda, tc, piva,
                presmo, prestot, presref, prestotal, prestotalmn,
                usuario, fecha, hora) values ("' . $this->edserie->Text . '", "' . $this->edidservicio->Text . '",
                "' . $this->cbalmacen->ItemIndex . '", "' . $this->edidcliente->Text . '", "' . $this->edidasesor->Text . '",
                "' . $this->cbtiposervicio->ItemIndex . '","' . $this->cbestatus->ItemIndex . '",
                curdate(), curtime(), "' . $this->dtentrega->Text . '", "' . $this->edpromesa->Text . '", "' . $this->cbtipopago->ItemIndex . '",
                "' . strtoupper($this->edvin->Text) . '", "' . $this->edkilometraje->Text . '",
                "' . strtoupper($this->edatencion->Text) . '", "' . $this->edtelefono->Text . '",
                "' . $this->edobservaciones->Text . '",  "' . $this->cbmoneda->ItemIndex . '",
                "' . $this->edtc->Text . '", "' . ($this->cbpiva->ItemIndex * 100) . '",
                "' . $this->edpresmo->Text . '", "' . $this->edprestot->Text . '",
                "' . $this->edpresref->Text . '", "' . $this->edprestotal->Text . '", "' . $this->edprestotalmn->Text . '",
                "' . $_SESSION["login"] . '", curdate(), curtime())';
         $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
         $this->edidservicio->Text = mysql_insert_id();
      }
      else
      {
         if(Derechos('SEEDSERV') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                 alert("No puede Modificar Ordenes de Servicio");
                 document.location.href("useserviciosvista.php");
                 </script>';
         }
         else
         {
            if($this->hfidestatus->Value < 8 && $this->cbestatus->ItemIndex == 8)
               $cierre = 'fechatermino=curdate(), horafinal=curtime(), ';
            else
               $cierre = '';

            $sql = 'Update seservicios set idcliente="' . $this->edidcliente->Text . '",
                idasesor="' . $this->edidasesor->Text . '", idtiposervicio="' . $this->cbtiposervicio->ItemIndex . '",
                idestatus="' . $this->cbestatus->ItemIndex . '", fechapromesa="' . $this->dtentrega->Text . '", horapromesa="' . $this->edpromesa->Text . '",
                idtipopago="' . $this->cbtipopago->ItemIndex . '", horainicio="' . $this->edinicio->Text . '",
                vin="' . strtoupper($this->edvin->Text) . '", kilometraje= "' . $this->edkilometraje->Text . '",
                atencion="' . strtoupper($this->edatencion->Text) . '",
                observaciones="' . $this->edobservaciones->Text . '", telefono="' . $this->edtelefono->Text . '",
                idmoneda="' . $this->cbmoneda->ItemIndex . '", tc="' . $this->edtc->Text . '",
                piva="' . ($this->cbpiva->ItemIndex * 100) . '",
                presmo="' . $this->edpresmo->Text . '", prestot="' . $this->edprestot->Text . '",
                presref="' . $this->edpresref->Text . '", prestotal="' . $this->edprestotal->Text . '",
                prestotalmn="' . $this->edprestotalmn->Text . '", montocredito="' . $this->edmontocredito->Text . '",
                idtecactual="' . $this->cbtecnico->ItemIndex . '",
                ' . $cierre . ' usuario="' . $_SESSION["login"] . '", fecha=curdate(), hora=curtime()
                where serie = "' . $this->edserie->Text . '"
                and idservicio=' . $this->edidservicio->Text;
            $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
            $msg = "Edito la Orden de Servicio No. " . $this->edserie->Text . $this->edidservicio->text;
            $nivel = 2;

            if($this->hfidestatus->Value == 2 && $this->cbestatus->ItemIndex == 3)
               $this->Activar();

            if($this->hfidestatus->Value != 10 && $this->cbestatus->ItemIndex == 10)
            {
               redirect('useservicioscancelados.php?serie=' . $this->edserie->Text . '&idservicio=' . $this->edidservicio->Text .
               '&idestatus=' . $this->hfidestatus->Value);
               exit;
            }
         }
      }

      $this->GuardarDetalle();
      dmconexion::Log($msg, $nivel);
      $this->hfestatus->Value = 2;

      if($this->hfidestatus->Value != 8 && $this->cbestatus->ItemIndex == 8)
      {
         $sql = 'update searchivocolgante set ultservicio=curdate() where vin="' . $this->edvin->Text . '"';
         $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
      }

      if($this->hfidestatus->Value != 10 && $this->cbestatus->ItemIndex == 10)
         redirect('useservicioscancelados.php?serie=' . $this->edserie->Text . '&idservicio=' .
         $this->edidservicio->text);
   }

   function Activar()
   {
      $rsm = "Insert into seotrostalleres (serie, idservicio, idmoneda,
             cvecargo, descripcion, tc, cantidad, unitario, importe, piva, iva,
             costo, utilidad, total, totalmn,
             fechacreacion, usuario, fecha, hora)
             Select '" . $this->edserie->Text . "', " . $this->edidservicio->Text . ",
             1, cvecargo, nombre, '" . $this->edtc->Text . "', 1,
             round(if(" . $this->cbmoneda->ItemIndex . " = 1, tarifa, tarifa/" . $this->edtc->Text . "),2),
             round(if(" . $this->cbmoneda->ItemIndex . " = 1, tarifa, tarifa/" . $this->edtc->Text . "),2),
             '" . ($this->cbpiva->ItemIndex * 100) . "', 0, 0, 0,
             round(if(" . $this->cbmoneda->ItemIndex . " = 1, tarifa, tarifa/" . $this->edtc->Text . "),2),
             tarifa as totalmn,
             curdate(), '" . $_SESSION['login'] . "', curdate(), curtime()
             from seotroscargos where pordefecto = 1";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      dmconexion::Log('Se agregaron los otros cargos por defecto', 1);

      $sql = 'Select sum(total) as total from seotrostalleres
              where serie = "' . $this->edserie->Text . '" and idservicio=' . $this->edidservicio->Text;
      $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
      $row = mysql_fetch_array($rs);

      $sql = 'Update seservicios set totaltot=' . $row['total'] . ' where serie = "' . $this->edserie->Text . '"
                and idservicio=' . $this->edidservicio->Text;
      $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
   }

   function GuardarDetalle()
   {
      $tabla = $_SESSION['tablafallas'];
      $t = count($tabla) - 1;

      $rsm = "Select idcontador, fallas from sefallas
              where serie='" . $this->edserie->Text . "' and idservicio = '" . $this->edidservicio->Text . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      while($row = mysql_fetch_array($r))
      {
         $ban = false;
         for($i = 0; $i <= $t; $i++)
         {
            if($row['fallas'] == $tabla[$i]['fallas'])
               $ban = true;
         }
         if($ban == false)
            $this->BDDelRow($row['idcontador']);
      }

      for($i = 0; $i <= $t; $i++)
      {
         $rsm = "Select idcontador, fallas, verificacion from sefallas
                    where serie='" . $this->edserie->Text . "' and idservicio = '" . $this->edidservicio->Text . "'
                    and fallas='" . $tabla[$i]['fallas'] . "'";
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
         if(mysql_num_rows($r) == 0)
            $this->BDAgregar($i);
         else
         {
            $row = mysql_fetch_array($r);
            if(!($row['verificacion'] == $tabla[$i]['verificacion']))
            {
               $this->BDDelRow($row['idcontador']);
               $this->BDAgregar($i);
            }
         }
      }
   }

   function BDAgregar($row)
   {
      $tabla = $_SESSION['tablafallas'];

      //inserta el detalle
      $rsm = "Insert into sefallas (serie, idservicio, fallas, verificacion, idauditor,
              fechaverificacion, horaverificacion, usuario, fecha, hora)
              values ('" . $this->edserie->Text . "', " . $this->edidservicio->Text . ",
              '" . replace_esp($tabla[$row]['fallas']) . "', '" . replace_esp($tabla[$row]['verificacion']) . "',
              '" . $tabla[$row]['idauditor'] . "', '" . $tabla[$row]['fechaverificacion'] . "', '" . $tabla[$row]['horaverificacion'] . "',
              '" . $_SESSION['login'] . "', curdate(), curtime())";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      dmconexion::Log('Inserto en la Orden de Servicio ' . $this->edserie->Text . $this->edidservicio->Text . ' la falla: ' .
      LeftStr(replace_esp($tabla[$row]['fallas']), 10), 2);
   }

   function BDDelRow($idcontador)
   {
      $tabla = $_SESSION['tablafallas'];

      $rsm = "Select idcontador, fallas, verificacion, idauditor, fechaverificacion
                from sefallas where idcontador=" . $idcontador;
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $row = mysql_fetch_array($r);

      $rsm = "Delete from sefallas where idcontador ='" . $idcontador . "'";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      dmconexion::Log('Elimino en la Orden de Servicio ' . $this->edserie->Text . $this->edidservicio->Text .
      ' la falla: ' . LeftStr(replace_esp($tabla[$row]['fallas']), 10), 3);
   }

   function habilitar($ban)
   {
      $this->edvin->Enabled = $ban;
      $this->edatencion->Enabled = $ban;
      $this->edidcliente->Enabled = $ban;
      $this->edatencion->Enabled = $ban;
      $this->btnagregar->Enabled = $ban;
      $this->cbpiva->Enabled = $ban;
      $this->cbmoneda->Enabled = $ban;
      $this->cbtiposervicio->Enabled = $ban;
      $this->edpresmo->Enabled = $ban;
      $this->edprestot->Enabled = $ban;
      $this->edpresref->Enabled = $ban;
      $this->edprestotal->Enabled = $ban;
      $this->edprestotalmn->Enabled = $ban;
      $this->cbtipopago->Enabled = $ban;
      $this->btnvin->Enabled = $ban;
   }

   function Validar()
   {

      //si ya esta cerrada
      if($this->hfidestatus->Value > 7)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("No puede Modificar Ordenes de Servicio cerradas");
              document.getElementByName("cbestatus").value = document.getElementByName("hfidestatus").value;
              </script>';
         return false;
      }
      else
      {
         //Si finaliza la orden
         if($this->cbestatus->ItemIndex == 8 && $this->hfidestatus->Value < 8)
         {
            //Existen prestamos?
            $sql = 'Select estatus from seprestamos p
                    where concat(p.serie, p.idservicio)= "' . $this->edserie->Text . $this->edidservicio->Text . '"
                    and p.estatus="P"';
            $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
            $row = mysql_fetch_array($rs);
            if($row != false)
            {
               $this->cbestatus->ItemIndex = $this->hfidestatus->Value;
               echo '<script language="javascript" type="text/javascript">
                 alert("Falta herramienta por entregar.");
                 </script>';
               return false;
            }

            $sql = 'Select verificacion from sefallas where serie="' . $this->edserie->Text . '"
                and idservicio=' . $this->edidservicio->Text . ' and verificacion <> ""';
            $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
            $row = mysql_fetch_array($rs);
            if($row != true)
            {
               $this->cbestatus->ItemIndex = $this->hfidestatus->Value;
               echo '<script language="javascript" type="text/javascript">
                 alert("Falta la verificacion de las fallas.Si existen guarde antes de Cerrar.");
                 </script>';
               return false;
            }
         }
      }

      if($this->hfidestatus->Value == 1 && ($this->cbestatus->ItemIndex > 2 && $this->cbestatus->ItemIndex != 10))
      {
         $this->cbestatus->ItemIndex = $this->hfidestatus->Value;
         echo '<script language="javascript" type="text/javascript">
              alert("No puedes usar los demas estatus hasta que no abra la orden.");
              </script>';
         return false;
      }

      if(count($_SESSION['tablafallas']) == 0)
      {
         $this->cbestatus->ItemIndex = $this->hfidestatus->Value;
         echo '<script language="javascript" type="text/javascript">
                 alert("Falta capturar las fallas");
                 </script>';
         return false;
      }

      if($this->edprestotal->Text == '0')
      {
         $this->cbestatus->ItemIndex = $this->hfidestatus->Value;
         echo '<script language="javascript" type="text/javascript">
                 alert("Falta capturar el monto del presupuesto");
                 </script>';
         return false;
      }

      if($this->hfidestatus->Value == 2)
      {
         if($this->cbestatus->ItemIndex == 3)
         {
            if(Derechos('SEASIGCRED') == false)
            {
               $this->cbestatus->ItemIndex = $this->hfidestatus->Value;
               echo '<script language="javascript" type="text/javascript">
                 alert("No puedes asignar Monto de Credito, por lo que no puedes Autorizar la Orden");
                 </script>';
               return false;
            }
            else
            {
               // PUEDE DAR CREDITO
               if($this->cbtipopago->ItemIndex == 2)
               {
                  if($this->edmontocredito->Text == '0' || $this->edmontocredito->Text == '')
                  {
                     echo '<script language="javascript" type="text/javascript">
                          alert("No has asignado un monto.");
                          </script>';
                     return false;
                  }

                  $sql = 'Select saldodisp as saldo from clientes where idcliente=' . $this->edidcliente->Text . ' and creditoactivo=1';
                  $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
                  $row = mysql_fetch_array($rs);
                  if($row == false)
                  {
                     echo '<script language="javascript" type="text/javascript">
                    alert("El cliente no tiene credito abierto");
                    </script>';
                     return false;
                  }
                  else
                  {
                     if($this->cbmoneda->ItemIndex == 1)
                        $saldo = $row['saldo'];
                     else
                        $saldo = $row['saldo'] / $this->edtc->Text;

                     if($saldo < $this->edmontocredito->Text)
                     {
                        echo '<script language="javascript" type="text/javascript">
                       alert("El saldo es menor al presupuestado");
                       </script>';
                        return false;
                     }
                  }
               }
            }
         }



         if($this->cbestatus->ItemIndex == 10 && Derechos('SECANSERV') == false)
         {
            $this->cbestatus->ItemIndex = $this->hfidestatus->Value;
            echo '<script language="javascript" type="text/javascript">
                 alert("No puedes Cancelar la Orden de Servicio");
                 </script>';
            return false;
         }

         if($this->cbestatus->ItemIndex != 10 && $this->cbestatus->ItemIndex != 3)
         {
            $this->cbestatus->ItemIndex = $this->hfidestatus->Value;
            echo '<script language="javascript" type="text/javascript">
                 alert("No puedes utilizar ese estatus en esta Orden de Servicio");
                 </script>';
            return false;
         }
      }


      if($this->hfidestatus->Value > 2 && $this->cbestatus->ItemIndex <= 2)
      {
         $this->cbestatus->ItemIndex = $this->hfidestatus->Value;
         echo '<script language="javascript" type="text/javascript">
              alert("No puedes regresar el estatus.");
              </script>';
         return false;
      }

      if($this->hfidestatus->Value > 3 && $this->cbestatus->ItemIndex <= 3)
      {
         $this->cbestatus->ItemIndex = $this->hfidestatus->Value;
         echo '<script language="javascript" type="text/javascript">
              alert("No puedes regresar el estatus.");
              </script>';
         return false;
      }

      if($this->cbestatus->ItemIndex == 9 && $this->hfidestatus->Value != 8 && Derechos('SEFACT'))
      {
         $this->cbestatus->ItemIndex = $this->hfidestatus->Value;
         echo '<script language="javascript" type="text/javascript">
                 alert("No puedes facturar esta Orden de Servicio.");
                 </script>';
      }

      if($this->hfidestatus->Value != 10 && $this->cbestatus->ItemIndex == 10)
      {
         if(Derechos('SECANSERV') == false)
         {
            $this->cbestatus->ItemIndex = $this->hfidestatus->Value;
            echo '<script language="javascript" type="text/javascript">
                 alert("No tienes derechos para cancelar Ordenes de Servicio.");
                 </script>';
         }

         //Existen prestamos?
         $sql = 'Select estatus from seprestamos p
                    where concat(p.serie, p.idservicio)= "' . $this->edserie->Text . $this->edidservicio->Text . '"
                    and p.estatus="P"';
         $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
         $row = mysql_fetch_array($rs);
         if($row != false)
         {
            $this->cbestatus->ItemIndex = $this->hfidestatus->Value;
            echo '<script language="javascript" type="text/javascript">
                 alert("Falta herramienta por entregar.");
                 </script>';
            return false;
         }

         if($this->edtotaltot->Text > 0)
         {
            $this->cbestatus->ItemIndex = $this->hfidestatus->Value;
            echo '<script language="javascript" type="text/javascript">
                 alert("Hay Otros Cargos agregados.");
                 </script>';
            return false;
         }

         if($this->edtotalref->Text > 0)
         {
            $this->cbestatus->ItemIndex = $this->hfidestatus->Value;
            echo '<script language="javascript" type="text/javascript">
                 alert("Hay Refacciones agregadas.");
                 </script>';
            return false;
         }
      }

      if($this->hfidestatus->Value != 9 && $this->cbestatus->ItemIndex == 9)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("No puedes facturar desde aqui");
             </script>';
         return false;
      }

      if($this->edidcliente->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el Cliente");
             </script>';
         return false;
      }

      if($this->edidasesor->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el Asesor");
             </script>';
         return false;
      }

      if($this->edvin->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el VIN");
             </script>';
         return false;
      }

      if($this->cbtiposervicio->ItemIndex == - 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el tipo de servicio");
             </script>';
         return false;
      }

      if($this->cbtipopago->ItemIndex == - 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el tipo de pago");
             </script>';
         return false;
      }

      if($this->edatencion->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la atencion");
             </script>';
         return false;
      }

      if($this->cbmoneda->ItemIndex == - 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la moneda");
             </script>';
         return false;
      }

      if($this->edtc->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el Tipo de Cambio");
             </script>';
         return false;
      }

      if($this->edinicio->Text != '')
         if(ValidarHora($this->edinicio->Text) == false)
         {
            echo '<script language="javascript" type="text/javascript">
             alert("La hora de inicio no es una hora valida");
             </script>';
            return false;
         }

      if($this->edfinal->Text != '')
         if(ValidarHora($this->edfinal->Text) == false)
         {
            echo '<script language="javascript" type="text/javascript">
             alert("La hora de termino no es una hora valida");
             </script>';
            return false;
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
         if($val->inheritsFrom("Memo"))
            $val->Text = "";
         if($val->inheritsFrom("ComboBox"))
            $val->ItemIndex = -1;
      }
      $this->lbufh->Caption = '';
      $this->lbhistorial->Caption = '';
      $this->hfdetalle->Value = '';
   }

   function inicializa()
   {
      //almacen
      $this->cbalmacen->Clear();
      $this->cbalmacen->AddItem("Sin Clasificar", null , - 1);
      $sql = 'select a.idalmacen id, a.nombrecorto as nombre from realmacen a';
      if(Derechos('TODALMACENES') != true)
         $sql .= ' where idalmacen="' . $_SESSION['sesidalmacen'] . '"';
      else
         $sql .= ' where a.idplaza="' . $_SESSION['sesidplaza'] . '"';

      $sql .= ' and ventas = 1';
      $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
      while($row = mysql_fetch_array($rs))
      {
         $this->cbalmacen->AddItem($row['nombre'], null , $row['id']);
      }
      mysql_free_result($rs);

      //estatus
      $this->cbestatus->Clear();
      $this->cbestatus->AddItem("Sin Clasificar", null , - 1);
      $sql = 'select idestatus id, nombre from seserviciosestatus order by id';
      $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
      while($row = mysql_fetch_array($rs))
      {
         $this->cbestatus->AddItem($row['nombre'], null , $row['id']);
      }
      mysql_free_result($rs);

      //tiposervicio
      $this->cbtiposervicio->Clear();
      $this->cbtiposervicio->AddItem("Sin Clasificar", null , - 1);
      $sql = 'select idtiposervicio id, nombre from setiposervicios';
      $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
      while($row = mysql_fetch_array($rs))
      {
         $this->cbtiposervicio->AddItem($row['nombre'], null , $row['id']);
      }
      mysql_free_result($rs);

      //tipopagos
      $this->cbtipopago->Clear();
      $this->cbtipopago->AddItem("Sin Clasificar", null , - 1);
      $sql = 'select idtipopago id, nombre from retipopagos';
      $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
      while($row = mysql_fetch_array($rs))
      {
         $this->cbtipopago->AddItem($row['nombre'], null , $row['id']);
      }
      mysql_free_result($rs);

      //moneda
      $this->cbmoneda->Clear();
      //$this->cbmoneda->AddItem("Sin Clasificar", null , - 1);
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

      //tecnicos
      $this->cbtecnico->Clear();
      $this->cbtecnico->AddItem("Sin Clasificar", null , - 1);
      $cadena = 'select idusuario id, iniciales as nombre from usuarios
                where idarea = 2 and estatus = 1 order by nombre asc';
      $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);
      while($row = mysql_fetch_array($rs))
      {
         $this->cbtecnico->AddItem($row['nombre'], null , $row['id']);
      }
      mysql_free_result($rs);

      //fechainicio
      $this->dtcreacion->Text = Fecha();
   }

}

global $application;

global $useservicios;

//Creates the form
$useservicios = new useservicios($application);

//Read from resource file
$useservicios->loadResource(__FILE__);

//Shows the form
$useservicios->show();

?>