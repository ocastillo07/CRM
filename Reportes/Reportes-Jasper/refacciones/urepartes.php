<script type="text/javascript" src="funciones.js"></script>
<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
require_once("vcl/vcl.inc.php");
//Includes
use_unit("mysql.inc.php");
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class urepartes extends Page
{
   public $hfadjunto = null;
   public $btnimprimir = null;
   public $btnsustitutas = null;
   public $Label41 = null;
   public $cbestatus = null;
   public $btnsuperceder = null;
   public $hfcveant = null;
   public $hfidant = null;
   public $lbsuperceder = null;
   public $edcoresucios = null;
   public $Label46 = null;
   public $Label33 = null;
   public $edcostoultcomp = null;
   public $lbcore = null;
   public $edutilidade = null;
   public $edutilidadd = null;
   public $edutilidadc = null;
   public $edutilidadb = null;
   public $edutilidada = null;
   public $Label14 = null;
   public $Label12 = null;
   public $edprecioa = null;
   public $edpreciob = null;
   public $edprecioc = null;
   public $edpreciod = null;
   public $edprecioe = null;
   public $Label37 = null;
   public $Label36 = null;
   public $Label35 = null;
   public $Label15 = null;
   public $Label13 = null;
   public $Label24 = null;
   public $edcostoanterior = null;
   public $Label25 = null;
   public $Label8 = null;
   public $cbmoneda = null;
   public $edcosto = null;
   public $Label21 = null;
   public $edubicacion = null;
   public $Label20 = null;
   public $edpasillo = null;
   public $Label18 = null;
   public $edreabastecimiento = null;
   public $Label45 = null;
   public $edmultiplos = null;
   public $edseguridad = null;
   public $Label32 = null;
   public $Label38 = null;
   public $edmaximo = null;
   public $Label31 = null;
   public $edminimo = null;
   public $Label30 = null;
   public $chinventariable = null;
   public $chkit = null;
   public $chcore = null;
   public $Label22 = null;
   public $edapartados = null;
   public $Label7 = null;
   public $eddisponibles = null;
   public $Label40 = null;
   public $edenproceso = null;
   public $edtraspaso = null;
   public $Label11 = null;
   public $edordenadas = null;
   public $Label23 = null;
   public $edexistencia = null;
   public $Label26 = null;
   public $edfechapedimento = null;
   public $Label28 = null;
   public $edpedimento = null;
   public $Label27 = null;
   public $edaduana = null;
   public $Label19 = null;
   public $cbmarca = null;
   public $Label10 = null;
   public $hfidalmacen = null;
   public $edalmacen = null;
   public $lbeliminar = null;
   public $lbadjunto = null;
   public $edfechaestatus = null;
   public $edcreacion = null;
   public $Label44 = null;
   public $imgparte = null;
   public $cbfamilia = null;
   public $Label43 = null;
   public $Label42 = null;
   public $edcodbar = null;
   public $Label39 = null;
   public $lbsubir = null;
   public $btnsubir = null;
   public $upload = null;
   public $edidproveedor = null;
   public $Button1 = null;
   public $Label34 = null;
   public $edproveedor = null;
   public $edultsalida = null;
   public $edultentrada = null;
   public $lbufh = null;
   public $cborigen = null;
   public $cbunidad = null;
   public $cblinea = null;
   public $eddescripcion = null;
   public $edclave = null;
   public $edidparte = null;
   public $Label29 = null;
   public $Label17 = null;
   public $Label16 = null;
   public $Label9 = null;
   public $Label5 = null;
   public $Label3 = null;
   public $Label1 = null;
   public $Label6 = null;
   public $cbalmacen = null;
   public $Label4 = null;
   public $Label2 = null;
   public $pbotones = null;
   public $lbimprimir = null;
   public $lbnuevo = null;
   public $btnnuevo = null;
   public $lbregresar = null;
   public $btnregresar = null;
   public $btngcerrar = null;
   public $lbgcerrar = null;
   public $lbguardar = null;
   public $btnguardar = null;
   public $lbtitulo = null;
   public $hfestatus = null;
   function btnimprimirJSClick($sender, $params)
   {
   ?>
   basicAjax('urepartes_ajax.php','Imprimir=pdf&cveparte='+vcl.$('edclave').value+
              '&idalmacen='+vcl.$('hfidalmacen').value);
   <?php
   }


   function btnsustitutasClick($sender, $params)
   {
      redirect('urepartessustitutas.php?cveparteorigen=' . $this->edclave->Text);
   }

   function btnsupercederJSClick($sender, $params)
   {
?>
   basicAjax('urepartes_ajax.php','Superceder='+vcl.$('edclave').value+'&idalmacen='+vcl.$('hfidalmacen').value+
             '&kit='+vcl.$('chkit').checked+'&inventariable='+vcl.$('chinventariable').checked);
<?php
   }

   function cbmonedaJSChange($sender, $params)
   {
?>
   basicAjax('urepartes_ajax.php','CalculaMoneda='+vcl.$('cbmoneda').value);
<?php
   }


   function edidparteJSKeyPress($sender, $params)
   {
?>
   if(event.keyCode == 13)
      return false;
<?php
   }

   function urepartesJSLoad($sender, $params)
   {
?>
validarEventos();
   if(vcl.$('edidproveedor').value != '')
     basicAjax('urepartes_ajax.php','TraeProveedor='+vcl.$('edidproveedor').value);
<?php
   }

   function chcoreJSClick($sender, $params)
   {
?>
   if(vcl.$('chcore').checked == true)
     document.location.href("urepartesvista.php?pagina=urepartes.php&core=1");
   else
    if(!confirm('Desea Eliminar la relacion de core?'))
      return(false);

   basicAjax('urepartes_ajax.php','EliminaCore='+vcl.$('edclave').value);
<?php
   }

   function edclaveJSBlur($sender, $params)
   {
?>
   if(vcl.$('hfestatus').value == 1)
   basicAjax('urepartes_ajax.php','ExisteParte='+vcl.$('edclave').value+'&idalmacen='+
              vcl.$('hfidalmacen').value);

   if(vcl.$('edcodbar').value == '')
      vcl.$('edcodbar').value = vcl.$('edclave').value;
<?php
   }

   function lbeliminarClick($sender, $params)
   {
      if(Derechos('REPARTESELARCH') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Eliminar el Archivo");
               </script>';
      }
      else
      {
         unlink($_SERVER['DOCUMENT_ROOT'] . GetConfiguraciones('PathImgPartes') . $this->lbadjunto->Caption);
         $sql = 'Update repartes set imagen=""
         where cveparte ="' . $this->edclave->Text . '" ';
         $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
         $this->lbadjunto->Caption = '';
         $this->lbeliminar->Caption = '';
         $this->imgparte->ImageSource = '';
      }
   }

   function lbsubirClick($sender, $params)
   {
      if(Derechos('REPARTESIMG') == false)
      {
         echo '<script language="javascript" type="text/javascript">
              alert("No Tienes Derechos para Adjuntar el Archivo");
              </script>';
      }
      else
      {
         if($this->hfestatus->Value != 2)
         {
            echo '<script language="javascript" type="text/javascript">
              	alert(" Debes Guardar Los Datos Antes de Subir el Archivo ");
           		</script>';
         }
         else
         {
            $path = GetConfiguraciones('PathImgPartes');
            if((tipoarchivo($_FILES["upload"]["type"], 1) == true)
            && ($_FILES["upload"]["size"] < GetConfiguraciones('ArchivosSize')))//10 megas

            {
               if($_FILES["upload"]["error"] > 0)
               {
                  echo '<script language="javascript" type="text/javascript">
                  		     alert("Error al subir Archivo: ' . $_FILES["upload"]["error"] . '");
                     		</script>';
               }
               else
               {
                  if(file_exists($path . $_FILES["upload"]["name"]))
                  {
                     echo '<script language="javascript" type="text/javascript">
                    	 alert(" El Archivo ya existe: ' . $_FILES["upload"]["name"] . '");
                     	 </script>';
                  }
                  else
                  {
                     move_uploaded_file($_FILES["upload-"]["tmp_name"],
                     $_SERVER['DOCUMENT_ROOT'] . $path . replace($_FILES["upload"]["name"]));

                     $this->lbadjunto->Caption = replace($_FILES["upload"]["name"]);
                     $this->lbadjunto->Link = GetConfiguraciones('PathImgPartes') . replace($_FILES["upload"]["name"]);
                     $this->imgparte->ImageSource = GetConfiguraciones('PathImgPartes') . replace($_FILES["upload"]["name"]);

                     $sql = 'Update repartes set imagen="' . $_FILES['upload']['name'] . '"
                             where cveparte ="' . $this->edclave->Text . '" ';
                     $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
                     $this->lbeliminar->Caption = 'Eliminar';
                  }
               }
            }
            else
            {
               echo '<script language="javascript" type="text/javascript">
                alert(" Formato del Archivo Invalido! ");
                </script>';
            }
         }
      }
   }

   function edutilidadeJSKeyPress($sender, $params)
   {
?>
   if( ValidaDecimal(vcl.$('edutilidade').value, event) != event.keyCode)
           return false;
<?php
   }

   function edutilidaddJSKeyPress($sender, $params)
   {
?>
   if( ValidaDecimal(vcl.$('edutilidadd').value, event) != event.keyCode)
           return false;
<?php
   }

   function edutilidadcJSKeyPress($sender, $params)
   {
?>
   if( ValidaDecimal(vcl.$('edutilidadc').value, event) != event.keyCode)
           return false;
<?php
   }

   function edutilidadbJSKeyPress($sender, $params)
   {
?>
   if( ValidaDecimal(vcl.$('edutilidadb').value, event) != event.keyCode)
           return false;
<?php
   }

   function edutilidadaJSKeyPress($sender, $params)
   {
?>
   if( ValidaDecimal(vcl.$('edutilidada').value, event) != event.keyCode)
           return false;
<?php
   }

   function edutilidadeJSBlur($sender, $params)
   {
?>
   basicAjax('urepartes_ajax.php','CalculaPorUtil=e&costo='+vcl.$('edcosto').value+'&utilidad='+
            vcl.$('edutilidade').value);
<?php
   }

   function edutilidaddJSBlur($sender, $params)
   {
?>
   basicAjax('urepartes_ajax.php','CalculaPorUtil=d&costo='+vcl.$('edcosto').value+'&utilidad='+
            vcl.$('edutilidadd').value);
<?php
   }

   function edutilidadcJSBlur($sender, $params)
   {
?>
   basicAjax('urepartes_ajax.php','CalculaPorUtil=c&costo='+vcl.$('edcosto').value+'&utilidad='+
            vcl.$('edutilidadc').value);
<?php
   }

   function edutilidadbJSBlur($sender, $params)
   {
?>
   basicAjax('urepartes_ajax.php','CalculaPorUtil=b&costo='+vcl.$('edcosto').value+'&utilidad='+
            vcl.$('edutilidadb').value);
<?php
   }

   function edutilidadaJSBlur($sender, $params)
   {
?>
   basicAjax('urepartes_ajax.php','CalculaPorUtil=a&costo='+vcl.$('edcosto').value+'&utilidad='+
            vcl.$('edutilidada').value);
<?php
   }

   function edprecioeJSKeyPress($sender, $params)
   {
?>
   if( ValidaDecimal(vcl.$('edprecioe').value, event) != event.keyCode)
           return false;
<?php
   }

   function edpreciodJSKeyPress($sender, $params)
   {
?>
   if( ValidaDecimal(vcl.$('edpreciod').value, event) != event.keyCode)
           return false;
<?php
   }

   function edpreciocJSKeyPress($sender, $params)
   {
?>
   if( ValidaDecimal(vcl.$('edprecioc').value, event) != event.keyCode)
           return false;
<?php
   }

   function edpreciobJSKeyPress($sender, $params)
   {
?>
   if( ValidaDecimal(vcl.$('edpreciob').value, event) != event.keyCode)
           return false;
<?php
   }

   function edprecioaJSKeyPress($sender, $params)
   {
?>
   if( ValidaDecimal(vcl.$('edprecioa').value, event) != event.keyCode)
           return false;
<?php
   }

   function edprecioeJSBlur($sender, $params)
   {
?>
   basicAjax('urepartes_ajax.php','CalculaPorPrecio=e&costo='+vcl.$('edcosto').value+'&precio='+
            vcl.$('edprecioe').value);
<?php
   }

   function edpreciodJSBlur($sender, $params)
   {
?>
   basicAjax('urepartes_ajax.php','CalculaPorPrecio=d&costo='+vcl.$('edcosto').value+'&precio='+
            vcl.$('edpreciod').value);
<?php
   }

   function edpreciocJSBlur($sender, $params)
   {
?>
   basicAjax('urepartes_ajax.php','CalculaPorPrecio=c&costo='+vcl.$('edcosto').value+'&precio='+
            vcl.$('edprecioc').value);
<?php
   }

   function edpreciobJSBlur($sender, $params)
   {
?>
   basicAjax('urepartes_ajax.php','CalculaPorPrecio=b&costo='+vcl.$('edcosto').value+'&precio='+
            vcl.$('edpreciob').value);
<?php
   }

   function edprecioaJSBlur($sender, $params)
   {
?>
   basicAjax('urepartes_ajax.php','CalculaPorPrecio=a&costo='+vcl.$('edcosto').value+'&precio='+
            vcl.$('edprecioa').value);
<?php
   }

   function btnbuscarproveedClick($sender, $params)
   {
      redirect('uproveedoresvista.php?pagina=urepartes.php');
   }

   function edcostoJSBlur($sender, $params)
   {
?>
   basicAjax('urepartes_ajax.php','CalculaPorCosto='+vcl.$('edcosto').value);
<?php
   }

   function edcostoJSKeyPress($sender, $params)
   {
?>
   if( ValidaDecimal(vcl.$('edcosto').value, event) != event.keyCode)
           return false;
<?php
   }

   function edidproveedorJSBlur($sender, $params)
   {
?>
   basicAjax('urepartes_ajax.php','TraeProveedor='+vcl.$('edidproveedor').value);
<?php
   }


   function btnregresarClick($sender, $params)
   {
      redirect('ureventaspartesvista.php?pagina=urepartes.php');
   }

   function btngcerrarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect("urepartesvista.php");
      }
   }

   function btnguardarClick($sender, $params)
   {
      if($this->Validar() == true)
      {
         $this->Guardar();
         redirect("urepartes.php?cveparte=" . $this->edclave->Text .
         "&idalmacen=" . $this->cbalmacen->ItemIndex);
      }
   }

   function btnnuevoClick($sender, $params)
   {
      if(Derechos('REALPARTES') == false)
      {
         echo '<script language="javascript" type="text/javascript">
		      alert("No puede Agregar Partes");
			  </script>';
      }
      else
         redirect("urepartes.php?cveparte=0");
   }

   function urepartesShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"] - 160;
      $this->lbtitulo->Caption = $this->Caption;

      if(isset($_GET['cvecore']))
      {
         $this->lbcore->Caption = $_GET['cvecore'];
         $sql = 'insert into repartescores (cveparte, cvecore)
                values ("' . $this->edclave->Text . '", "' . $_GET['cvecore'] . '")';
         $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
         $sql = 'Update repartes set core = 1 where cveparte ="' . $this->edclave->Text . '" ';
         $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
         $this->chcore->Checked = true;
      }

      if(isset($_GET['idproveedor']))
         $this->edidproveedor->Text = $_GET['idproveedor'];

      if(isset($_GET["cveparte"]))
      {
         //revisar si la parte existen en el almacen
         $sql = 'select cveparte from repartesmov where cveparte="' . $_GET['cveparte'] .
         '" and idalmacen=' . $_GET["idalmacen"];
         $rs = mysql_query($sql)or die("Error de Consulta SQL: " . $sql . ' ' . mysql_error());
         if(mysql_num_rows($rs) == 0)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert("La parte no esta registrada en tu almacen, favor de revisar!!");
                  window.location = "ureventaspartesvista.php";
                  </script>';
         }
         $this->edclave->Text = $_GET["cveparte"];
         if($this->edclave->Text == '0')
            $this->hfestatus->Value = 1;
         else
            $this->hfestatus->Value = 2;

         if($this->edclave->Text == '0' && $this->hfestatus->Value == 1)
         {
            $this->Limpiar();
            $this->inicializa();
            $this->Alta();
         }
         else
         {
            if(!isset($_GET["elim"]))
            {
               $this->Limpiar();
               $this->inicializa();
               $this->Locate();
            }
            else
            {
               if(Derechos('REELPARTES') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                       alert("No puede Eliminar Partes");
                       window.location="urepartesvista.php";
                       </script>';
               }
               else
               {
                  $sql = 'Delete from repartesmov where cveparte = "' . $this->edclave->Text . '"';
                  $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
                  dmconexion::Log("Elimino la Parte no. " . $this->edclave->Text . " Clave " . $this->edclave->Text . " ", 3);
                  redirect("urepartesvista.php");
               }
            }
         }
      }
   }

   function Alta()
   {
      if($this->hfestatus->Value == 1)
      {
         $this->edidparte->Text = MaxId('repartes', 'idparte') + 1;
         $this->edclave->ReadOnly = false;
         $this->edpasillo->ReadOnly = false;
         $this->edubicacion->ReadOnly = false;
         $this->cbalmacen->Visible = true;
         $this->edalmacen->Visible = false;
         $this->edcreacion->Text = Fecha();
         $this->edfechaestatus->Text = Fecha();
         $this->cbalmacen->ItemIndex = $_SESSION['sesidalmacen'];
         $this->hfidalmacen->Value = $_SESSION['sesidalmacen'];
         $this->cbestatus->ItemIndex = 5;
         $this->chinventariable->Checked = false;
         $this->chcore->enabled = false;
         $this->hfcveant->Value = '';
         $this->hfidant->Value = '';
      }
   }

   function Locate()
   {
      $this->cbalmacen->Visible = false;
      $this->edalmacen->Visible = true;
      $this->chcore->enabled = true;

      if(Derechos('REESTPARTES') == true)
         $this->cbestatus->Enabled = true;
      else
         $this->cbestatus->Enabled = false;

      if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
      {
         if($_GET["cveparte"] != '0')
         {
            $this->edclave->Text = $_GET["cveparte"];
            $r = ufh('pm');
            $sql = 'SELECT p.idparte, pm.idalmacen, a.nombrecorto as almacen,
              pm.idestatus, p.idunidadmedida,
              p.idfamilia, p.idmarca, p.idlinea, pm.idmoneda, p.idorigen, pm.idproveedor,
              ' . NombreMoral('pr') . ' as proveedor,  p.cveparte, pm.codigobarras,
              p.descripcion, pm.existencia, pm.disponibles, pm.apartados, pm.entraspaso, pm.enproceso,
              pm.ordenados, pm.costoanterior, pm.costo, pm.costoultcomp, pm.idestatus, p.imagen,
              pm.precioa, pm.preciob, pm.precioc, pm.preciod, pm.precioe,
              pm.putilidada, pm.putilidadb, pm.putilidadc, pm.putilidadd, pm.putilidade,
              pm.ultentrada, pm.ultsalida, pm.fechacreacion, p.fechaestatus, pm.pasillo, pm.ubicacion,
              pm.minimo, pm.maximo, pm.seguridad, pm.reabastecimiento, pm.multiplos, cs.existencia as coresucios,
              p.kit, p.core, p.inventariable, pm.fechapedimento, pm.nopedimento, pm.aduana, ' . $r . ' as ufh
              FROM repartes AS p left join repartesmov pm on pm.cveparte = p.cveparte
              and pm.idalmacen = ' . $_GET['idalmacen'] . '
              left join proveedores pr on pr.idproveedor=pm.idproveedor
              left join repartescoresucios cs on cs.cvecore=pm.cveparte and cs.idalmacen=pm.idalmacen
              left join realmacen a on a.idalmacen=pm.idalmacen
              where pm.cveparte = "' . $this->edclave->Text . '"';

            $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
            $row = mysql_fetch_array($rs);

            $this->edidparte->Text = $row["idparte"];
            $this->edclave->Text = $row["cveparte"];
            $this->edcodbar->Text = $row["codigobarras"];
            $this->eddescripcion->Text = $row["descripcion"];
            $this->cbestatus->ItemIndex = $row["idestatus"];

            $this->edexistencia->Text = $row["existencia"];
            $this->edapartados->Text = $row["apartados"];
            $this->edtraspaso->Text = $row["entraspaso"];
            $this->edenproceso->Text = $row["enproceso"];
            $this->edordenadas->Text = $row["ordenados"];
            $this->eddisponibles->Text = $row["disponibles"];
            $this->edcoresucios->Text = $row["coresucios"];

            $this->edcosto->Text = $row["costo"];
            $this->edcostoanterior->Text = $row["costoanterior"];
            $this->edcostoultcomp->Text = $row["costoultcomp"];

            $this->edprecioa->Text = $row["precioa"];
            $this->edpreciob->Text = $row["preciob"];
            $this->edprecioc->Text = $row["precioc"];
            $this->edpreciod->Text = $row["preciod"];
            $this->edprecioe->Text = $row["precioe"];

            $this->edutilidada->Text = $row["putilidada"];
            $this->edutilidadb->Text = $row["putilidadb"];
            $this->edutilidadc->Text = $row["putilidadc"];
            $this->edutilidadd->Text = $row["putilidadd"];
            $this->edutilidade->Text = $row["putilidade"];

            $this->edcreacion->Text = $row["fechacreacion"];
            $this->edfechaestatus->Text = $row["fechaestatus"];
            $this->edultentrada->Text = $row["ultentrada"];
            $this->edultsalida->Text = $row["ultsalida"];
            $this->edpasillo->Text = $row["pasillo"];
            $this->edubicacion->Text = $row["ubicacion"];

            $this->edminimo->Text = $row["minimo"];
            $this->edmaximo->Text = $row["maximo"];
            $this->edseguridad->Text = $row["seguridad"];
            $this->edreabastecimiento->Text = $row["reabastecimiento"];
            $this->edmultiplos->Text = $row["multiplos"];

            $this->edfechapedimento->Text = $row["fechapedimento"];
            $this->edpedimento->Text = $row["nopedimento"];
            $this->edaduana->Text = $row["aduana"];
            $this->edidproveedor->Text = $row["idproveedor"];
            $this->edproveedor->Text = $row["proveedor"];

            $this->cbalmacen->ItemIndex = $row["idalmacen"];
            $this->hfidalmacen->Value = $row["idalmacen"];
            $this->edalmacen->Text = $row["almacen"];

            $this->cbunidad->ItemIndex = $row["idunidadmedida"];
            $this->cblinea->ItemIndex = $row["idlinea"];
            $this->cbmoneda->ItemIndex = $row["idmoneda"];
            $this->cborigen->ItemIndex = $row["idorigen"];
            $this->cbfamilia->ItemIndex = $row["idfamilia"];
            $this->cbmarca->ItemIndex = $row["idmarca"];

            $this->hfcveant->Value = '';
            $this->hfidant->Value = '';

            if($row["kit"] == 1)
               $this->chkit->Checked = true;
            else
               $this->chkit->Checked = false;

            if($row["inventariable"] != 1)
               $this->chinventariable->Checked = true;
            else
               $this->chinventariable->Checked = false;

            if($row["core"] == 1)
               $this->chcore->Checked = true;
            else
               $this->chcore->Checked = false;

            $sql = 'Select lineacore from relineas where idlinea=' . $row["idlinea"];
            $rsp = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
            $rwp = mysql_fetch_array($rsp);
            if($rwp['lineacore'] == 1)
               $this->chcore->Enabled = false;
            else
               $this->chcore->Enabled = true;

            $sql = 'SELECT cvecore from repartescores where cveparte = "' . $this->edclave->Text . '"';
            $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
            $rwc = mysql_fetch_array($rs);
            $this->lbcore->Caption = $rwc['cvecore'];

            $this->lbufh->Caption = $row["ufh"];

            $this->lbadjunto->Link = GetConfiguraciones('PathImgPartes') . $row['imagen'];
            $this->lbadjunto->Caption = $row['imagen'];

            if($row['imagen'] <> '')
            {
               $this->lbeliminar->Caption = 'Eliminar';
               $this->imgparte->ImageSource = GetConfiguraciones('PathImgPartes') . $row['imagen'];
            }
            else
            $this->imgparte->ImageSource = '';


            $this->edpasillo->ReadOnly = true;
            $this->edubicacion->ReadOnly = true;

            if(Derechos('REPARTESCMBPREC') == false)
            {
               $this->edcosto->ReadOnly = true;
               $this->edprecioa->ReadOnly = true;
               $this->edpreciob->ReadOnly = true;
               $this->edprecioc->ReadOnly = true;
               $this->edpreciod->ReadOnly = true;
               $this->edprecioe->ReadOnly = true;

               $this->edutilidada->ReadOnly = true;
               $this->edutilidadb->ReadOnly = true;
               $this->edutilidadc->ReadOnly = true;
               $this->edutilidadd->ReadOnly = true;
               $this->edutilidade->ReadOnly = true;
            }
            else
            {
               $this->edcosto->ReadOnly = false;
               $this->edprecioa->ReadOnly = false;
               $this->edpreciob->ReadOnly = false;
               $this->edprecioc->ReadOnly = false;
               $this->edpreciod->ReadOnly = false;
               $this->edprecioe->ReadOnly = false;

               $this->edutilidada->ReadOnly = false;
               $this->edutilidadb->ReadOnly = false;
               $this->edutilidadc->ReadOnly = false;
               $this->edutilidadd->ReadOnly = false;
               $this->edutilidade->ReadOnly = false;
            }
         }
      }
   }

   function Guardar()
   {

      if($this->chkit->Checked == true)
         $kit = 1;
      else
         $kit = 0;

      if($this->chinventariable->Checked == true)
         $inventariable = 0;
      else
         $inventariable = 1;

      if($this->chcore->Checked == true)
         $core = 1;
      else
         $core = 0;

      if($this->hfestatus->Value == 1)
      {

         // ESTATUS NUEVO 5

         //Existe en repartes?
         $cadena = 'Select cveparte from repartes where cveparte  = "' . $this->edclave->Text . '"';
         $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);

         //NUEVO
         if(mysql_num_rows($rs) == 0)
         {
            $cadena = 'Insert into repartes ( cveparte,
                idunidadmedida, idlinea, idfamilia, idmarca, idorigen, descripcion, inventariable,
                fechacreacion, usuario, fecha, hora ) values (
                "' . strtoupper($this->edclave->Text) . '", "' . $this->cbunidad->ItemIndex . '",
                "' . $this->cblinea->ItemIndex . '", "' . $this->cbfamilia->ItemIndex . '", "' . $this->cbmarca->ItemIndex . '", "' . $this->cborigen->ItemIndex . '",
                "' . strtoupper($this->eddescripcion->Text) . '", "' . $inventariable . '",
                curdate(), "' . $_SESSION['login'] . '", curdate(), curtime())';
            $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);
            $this->edidparte->Text = mysql_insert_id();
            $msg = "Creo la parte no. " . $this->edidparte->Text . " Clave: " . strtoupper($this->edclave->text) . ' - ' . strtoupper($this->eddescripcion->Text);
            $nivel = 1;

            //idsupercision
            if($this->hfidant->Value == '')
               $idsupercision = $this->edidparte->Text;
            else
               $idsupercision = $this->hfidant->Value;
            $cadena = 'update repartes set idsupercision = "' . $idsupercision . '" where cveparte="' . strtoupper($this->edclave->Text) . '"';
            $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);
         }

         if($this->hfidant->Value == '')
         {
            $cadena = 'Insert into repartesmov ( idalmacen, cveparte, codigobarras, idestatus, idmoneda, idproveedor,
                costo, precioa, preciob, precioc, preciod, precioe,
                putilidada, putilidadb, putilidadc, putilidadd, putilidade,
                fechacreacion, fechaestatus, pasillo, ubicacion, minimo, maximo, seguridad,
                multiplos, reabastecimiento, usuario, fecha, hora ) values (
                "' . $this->cbalmacen->ItemIndex . '", "' . strtoupper($this->edclave->Text) . '",
                "' . strtoupper($this->edcodbar->Text) . '", 5, "' . $this->cbmoneda->itemindex . '", "' . $this->edidproveedor->Text . '",
                "' . $this->edcosto->Text . '", "' . $this->edprecioa->Text . '", "' . $this->edpreciob->Text . '", "' . $this->edprecioc->Text . '",
                "' . $this->edpreciod->Text . '", "' . $this->edprecioe->Text . '",
                "' . $this->edutilidada->Text . '", "' . $this->edutilidadb->Text . '", "' . $this->edutilidadc->Text . '",
                "' . $this->edutilidadd->Text . '", "' . $this->edutilidade->Text . '",
                curdate(), curdate(),"' . strtoupper($this->edpasillo->Text) . '", "' . strtoupper($this->edubicacion->Text) . '",
                "' . $this->edminimo->Text . '", "' . $this->edmaximo->Text . '", "' . $this->edseguridad->Text . '",
                "' . $this->edmultiplos->Text . '", "' . $this->edreabastecimiento->Text . '", "' . $_SESSION['login'] . '", curdate(), curtime())';
            $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);
            $msg = "Inserto la parte " . strtoupper($this->edclave->text) . " - " . strtoupper($this->eddescripcion->Text) . " en el almacen. " . $this->cbalmacen->ItemIndex;
         }
         else
         {//FALTA KARDEX Y LOG
            //SUPERCEDER
            $cadena = 'Insert into repartesmov ( idalmacen, cveparte, codigobarras, idestatus, idmoneda, idproveedor,
                costo, precioa, preciob, precioc, preciod, precioe,
                putilidada, putilidadb, putilidadc, putilidadd, putilidade,
                fechacreacion, fechaestatus, pasillo, ubicacion, minimo, maximo, seguridad,
                multiplos, reabastecimiento, usuario, fecha, hora )
                Select idalmacen, "' . strtoupper($this->edclave->Text) . '", "' . strtoupper($this->edcodbar->Text) . '",
                idestatus, idmoneda, idproveedor, costo, precioa, preciob, precioc, preciod, precioe,
                putilidada, putilidadb, putilidadc, putilidadd, putilidade,
                curdate(), curdate(), pasillo, ubicacion, minimo, maximo, seguridad,
                multiplos, reabastecimiento, "' . $_SESSION['login'] . '", curdate(), curtime()
                from repartesmov where cveparte = "' . $this->hfcveant->Value . '"';
            $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);
            dmconexion::Log("Supercedio la parte " . $this->hfcveant->Value . " con la parte " .
            strtoupper($this->edclave->text) . " - " . strtoupper($this->eddescripcion->Text), 2);

            $sql = 'Insert into repartescoresucios (cvecore, idsupercision, idalmacen, existencia, usuario, fecha, hora)
                    Select "' . strtoupper($this->edclave->Text) . '", "' . $this->hfidant->Value . '", idalmacen,
                    existencia, "' . $_SESSION['login'] . '", curdate(), curtime()
                    from repartescoresucios where cvecore="' . $this->hfcveant->Value . '"';
            $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);

            //ACTUALIZA LA LIGA PARTE-CORE SI EXISTE
            $sql = 'Insert into repartescores (cveparte, cvecore)
                    Select cveparte, "' . strtoupper($this->edclave->text) . '"
                    from repartescores where cvecore="' . $this->hfcveant->Value . '"
                    ON DUPLICATE KEY UPDATE cvecore = "' . strtoupper($this->edclave->text) . '"';
            $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
            if(mysql_affected_rows($rs) > 0)
               dmconexion::Log("Actualizo el ligue de Parte-Core la parte " . strtoupper($this->edclave->text) .
               " - " . strtoupper($this->eddescripcion->Text), 2);

            //ACTUALIZA LA LIGA PARTE-CORE SI EXISTE
            $sql = 'Insert ignore into repartescores (cveparte, cvecore)
                    Select "' . strtoupper($this->edclave->text) . '", cvecore
                    from repartescores where cveparte="' . $this->hfcveant->Value . '"';
            $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
            if(mysql_affected_rows($rs) > 0)
               dmconexion::Log("Actualizo el ligue de Parte-Core la parte " . strtoupper($this->edclave->text) .
               " - " . strtoupper($this->eddescripcion->Text), 2);

            $sql = 'select cveperiodo from periodos where curdate() between fecha1 and fecha2';
            $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
            $row = mysql_fetch_array($rs);
            $periodo = $row['cveperiodo'];

            //INSERTA EN REPARTES INVENTARIO
            $sql = 'Insert into repartesinventario (cveparte, idalmacen, idsupercision, periodo,
                   invini, invfin)
                   Select "' . strtoupper($this->edclave->Text) . '", idalmacen, idsupercision,
                   "' . $periodo . '", 0, invfin
                   from repartesinventario where cveparte="' . $this->hfcveant->Value . '" and periodo="' . $periodo . '"';
            $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
            dmconexion::Log("Inserto en Partes Inventario la parte " . strtoupper($this->edclave->text) .
            " - " . strtoupper($this->eddescripcion->Text), 2);

            //AJUSTES DE PARTES
            $sql = 'Select distinct idalmacen, existencia, costo from repartesmov where cveparte="' . $this->hfcveant->Value . '"';
            $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
            while($row = mysql_fetch_array($rs))
            {
               $rsm = "select f.clave from folios f inner join realmacen a on a.idplaza=f.idplaza
               where f.idtipo = 13 and a.idalmacen = " . $row['idalmacen'];
               $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
               $rw = mysql_fetch_array($r);
               $serie = $rw['clave'];

               $sql = 'Select compra from tiposcambio order by  idcontador desc limit 1';
               $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
               $rwtc = mysql_fetch_array($rs);
               $tc = $rwtc['compra'];

               //AJUSTE DE SALIDA
               $sql = 'Insert into reajusteinv (serie, fechacreacion, idconceptoes, movimiento,
               observaciones, idalmacen, idmoneda, tc, partidas, total, totalmn,
               usuario, fecha, hora)
               values( "' . $serie . '", curdate(), 12, "S",  "SALIDA POR SUPERCISION",
               "' . $row['idalmacen'] . '", 1, "' . $tc . '", 1,
               round(' . $row['existencia'] . '*' . $row['costo'] . '),
               round(' . $row['existencia'] . '*' . $row['costo'] . '),
               "' . $_SESSION['login'] . '", curdate(), curtime())';
               $r = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
               $idajuste = mysql_insert_id();

               //inserta el detalle
               $rsm = 'Insert into reajusteinvdet (serie, idajuste, cantidad,
               cveparte, idsupercision, costo, usuario, fecha, hora)
               values ( "' . $serie . '", "' . $idajuste . '",
               ' . $row['existencia'] . ', "' . $this->hfcveant->Value . '",
               ' . $this->hfidant->Value . ', ' . $row['costo'] . ',
               "' . $_SESSION['login'] . '", curdate(), curtime())';
               $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

               dmconexion::Log("Creo el ajuste de inventario " . $serie . $idajuste .
               " para la parte " . strtoupper($this->hfcveant->Value) .
               " - " . strtoupper($this->eddescripcion->Text), 2);

               //Actualiza existencia, disponibles, ultent
               $rsm = "Update repartesmov set idestatus=6, ultsalida = curdate(), existencia = 0, disponibles = 0,
               usuario = '" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
               where cveparte = '" . $this->hfcveant->Value . "' and idalmacen = '" . $row['idalmacen'] . "'";
               $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

               //Inserta en el Kardex
               InsertaKardex($row['idalmacen'], $this->hfcveant->Value, ($serie . $idajuste),
               'S', $row['existencia'], 'Salida por Supercision ', 30);

               dmconexion::Log("Actualizo la existencia de la parte " . strtoupper($this->hfcveant->Value) .
               " - " . strtoupper($this->eddescripcion->Text), 2);

               //AJUSTE DE ENTRADA
               $sql = 'Insert into reajusteinv (serie, fechacreacion, idconceptoes, movimiento,
               observaciones, idalmacen, idmoneda, tc, partidas, total, totalmn,
               usuario, fecha, hora) values ("' . $serie . '",
               curdate(), 11, "E",  "ENTRADA POR SUPERCISION",
               "' . $row['idalmacen'] . '", 1, "' . $tc . '", 1,
               round(' . $row['existencia'] . '*' . $row['costo'] . '),
               round(' . $row['existencia'] . '*' . $row['costo'] . '),
               "' . $_SESSION["login"] . '", curdate(), curtime())';
               $r = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
               $idajuste = mysql_insert_id();

               //inserta el detalle
               $rsm = 'Insert into reajusteinvdet (serie, idajuste, cantidad,
               cveparte, idsupercision, costo, usuario, fecha, hora)
               Select "' . $serie . '", "' . $idajuste . '", existencia, "' . strtoupper($this->edclave->Text) . '",
               ' . $this->hfidant->Value . ', costo, "' . $_SESSION['login'] . '", curdate(), curtime()
               from repartesmov where cveparte="' . $this->hfcveant->Value . '"
               and idalmacen=' . $row['idalmacen'];
               $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

               dmconexion::Log("Creo el ajuste de inventario " . $serie . $idajuste .
               " para la parte " . strtoupper($this->edclave->Text) .
               " - " . strtoupper($this->eddescripcion->Text), 2);

               //Actualiza existencia, disponibles, ultent
               $rsm = "Update repartesmov set ultentrada = curdate(),
               existencia = '" . $row['existencia'] . "', disponibles = '" . $row['existencia'] . "',
               usuario = '" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
               where cveparte = '" . strtoupper($this->edclave->Text) . "' and idalmacen = '" . $row['idalmacen'] . "'";
               $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

               //Inserta en el Kardex
               InsertaKardex($row['idalmacen'], strtoupper($this->edclave->Text), ($serie . $idajuste),
               'E', $row['existencia'], 'Entrada por Supercision ', 31);

               dmconexion::Log("Actualizo la existencia de la parte " . strtoupper($this->edclave->Text) .
               " - " . strtoupper($this->eddescripcion->Text), 2);

               //AJUSTES DE CORES
               $sql = 'Select existencia from repartescoresucios where cvecore="' . $this->hfcveant->Value . '"
                       and idalmacen = ' . $row['idalmacen'] . ' and existencia > 0';
               $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
               $rwc = mysql_fetch_array($rs);
               if($rwc != false)
               {

                  $rsm = "select f.clave from folios f inner join realmacen a on a.idplaza=f.idplaza
                         where f.idtipo = 22 and a.idalmacen = " . $row['idalmacen'];
                  $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
                  $rwf = mysql_fetch_array($r);
                  $serie = $rwf['clave'];

                  //AJUSTE DE SALIDA
                  $sql = 'Insert into reajusteinvcores (serie, fechacreacion, idconceptoes, movimiento,
                  observaciones, idalmacen, idmoneda, tc, partidas, total, totalmn, usuario, fecha, hora) values ("' . $serie . '",
                  curdate(), 12, "S",  "SALIDA POR SUPERCISION",
                  "' . $row['idalmacen'] . '", 1, "' . $tc . '", 1,
                  round(' . $rwc['existencia'] . '*' . $row['costo'] . '),
                  round(' . $rwc['existencia'] . '*' . $row['costo'] . '),
                  "' . $_SESSION["login"] . '", curdate(), curtime())';
                  $r = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
                  $idajuste = mysql_insert_id();

                  //inserta el detalle
                  $rsm = 'Insert into reajusteinvcoresdet (serie, idajuste, cantidad,
                  cveparte, idsupercision, costo, usuario, fecha, hora)
                  Select "' . $serie . '", "' . $idajuste . '", ' . $rwc['existencia'] . ', cveparte,
                  ' . $this->hfidant->Value . ', costo, "' . $_SESSION['login'] . '", curdate(), curtime()
                  from repartesmov where cveparte="' . $this->hfcveant->Value . '"
                  and idalmacen=' . $row['idalmacen'];
                  $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

                  dmconexion::Log("Creo el ajuste de inventario de cores sucios " . $serie . $idajuste .
                  " para la parte " . $this->hfcveant->Value .
                  " - " . strtoupper($this->eddescripcion->Text), 2);

                  //Actualiza existencia, disponibles, ultent
                  $rsm = "Update repartescoresucios set existencia = 0,
                  usuario = '" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
                  where cvecore = '" . $this->hfcveant->Value . "' and idalmacen = '" . $row['idalmacen'] . "'";
                  $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

                  //Inserta en el Kardex
                  InsertaKardexCores($row['idalmacen'], $this->hfcveant->Value, ($serie . $idajuste),
                  'S', $rwc['existencia'], 'Salida por Supercision ', 30);

                  dmconexion::Log("Actualizo la existencia del core sucio " . $this->hfcveant->Value .
                  " - " . strtoupper($this->eddescripcion->Text), 2);

                  //AJUSTE DE ENTRADA
                  $sql = 'Insert into reajusteinvcores (serie, fechacreacion, idconceptoes, movimiento,
                  observaciones, idalmacen, idmoneda, tc, partidas, total, totalmn, usuario, fecha, hora) values ("' . $serie . '",
                  curdate(), 11, "E",  "ENTRADA POR SUPERCISION",
                  "' . $row['idalmacen'] . '", 1, "' . $tc . '", 1,
                  round(' . $rwc['existencia'] . '*' . $row['costo'] . '),
                  round(' . $rwc['existencia'] . '*' . $row['costo'] . '),
                  "' . $_SESSION["login"] . '", curdate(), curtime())';
                  $r = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
                  $idajuste = mysql_insert_id();

                  //inserta el detalle
                  $rsm = 'Insert into reajusteinvcoresdet (serie, idajuste, cantidad,
                  cveparte, idsupercision, costo, usuario, fecha, hora)
                  Select "' . $serie . '", "' . $idajuste . '", ' . $rwc['existencia'] . ',
                  "' . strtoupper($this->edclave->Text) . '",
                  ' . $this->hfidant->Value . ', costo, "' . $_SESSION['login'] . '", curdate(), curtime()
                  from repartesmov where cveparte="' . $this->hfcveant->Value . '"
                  and idalmacen=' . $row['idalmacen'];
                  $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

                  dmconexion::Log("Creo el ajuste de inventario de cores sucios " . $serie . $idajuste .
                  " para la parte " . strtoupper($this->edclave->Text) .
                  " - " . strtoupper($this->eddescripcion->Text), 2);

                  //Actualiza existencia, disponibles, ultent
                  $rsm = "Update repartescoresucios set existencia = '" . $rwc['existencia'] . "',
                  usuario = '" . $_SESSION['login'] . "', fecha=curdate(), hora=curtime()
                  where cvecore = '" . strtoupper($this->edclave->Text) . "' and idalmacen = '" . $row['idalmacen'] . "'";
                  $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

                  //Inserta en el Kardex
                  InsertaKardexCores($row['idalmacen'], strtoupper($this->edclave->Text), ($serie . $idajuste),
                  'E', $rwc['existencia'], 'Entrada por Supercision ', 31);

                  dmconexion::Log("Actualizo la existencia del core sucio " . strtoupper($this->edclave->Text) .
                  " - " . strtoupper($this->eddescripcion->Text), 2);
               }
            }
         }
      }
      else
      {
         if(Derechos('REEDPARTES') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                    alert("No puede Modificar Partes");
                    window.location="urepartesvista.php";
                    </script>';
         }
         else
         {
            $cadena = 'Update repartes set
               idunidadmedida="' . $this->cbunidad->ItemIndex . '", idlinea="' . $this->cblinea->ItemIndex . '",
               idfamilia="' . $this->cbfamilia->ItemIndex . '", idmarca="' . $this->cbmarca->ItemIndex . '",
               idorigen="' . $this->cborigen->ItemIndex . '",
               descripcion="' . strtoupper($this->eddescripcion->Text) . '", inventariable="' . $inventariable . '",
               usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
               where cveparte ="' . strtoupper($this->edclave->Text) . '" ';
            $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);

            $cadena = 'Update repartesmov set idproveedor="' . $this->edidproveedor->Text . '",
               codigobarras="' . strtoupper($this->edcodbar->Text) . '",idmoneda="' . $this->cbmoneda->ItemIndex . '",
               idestatus="' . $this->cbestatus->ItemIndex . '", precioa="' . $this->edprecioa->Text . '",
               preciob="' . $this->edpreciob->Text . '", precioc="' . $this->edprecioc->Text . '",
               preciod="' . $this->edpreciod->Text . '", precioe="' . $this->edprecioe->Text . '",
               putilidada="' . $this->edutilidada->Text . '", putilidadb="' . $this->edutilidadb->Text . '",
               putilidadc="' . $this->edutilidadc->Text . '", putilidadd="' . $this->edutilidadd->Text . '",
               putilidade="' . $this->edutilidade->Text . '",
               usuario="' . $_SESSION['login'] . '", fecha=curdate(), hora=curtime()
               where idalmacen="' . $this->hfidalmacen->Value . '" and cveparte ="' . strtoupper($this->edclave->Text) . '" ';
            $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);

            $msg = "Edito la parte no. " . $this->edidparte->Text . " Clave: " .
            strtoupper($this->edclave->text) . ' - ' . strtoupper($this->eddescripcion->Text) .
            '  en el almacen ' . $this->hfidalmacen->Value;
            dmconexion::Log($msg, $nivel);
         }
      }
      $this->hfestatus->Value = 2;
      dmconexion::Log($msg, $nivel);
   }

   function Limpiar()
   {
      reset($this->controls->items);
      while(list($key, $val) = each($this->controls->items))
      {
         if($val->inheritsFrom("Edit"))
            $val->Text = "";

         if($val->inheritsFrom("ComboBox"))
            $val->ItemIndex = 0;

         if($val->inheritsFrom("CheckBox"))
            $val->checked = false;
      }
      $this->lbufh->Caption = '';
      $this->lbeliminar->Caption = '';
      $this->lbcore->Caption = '';
      $this->edclave->ReadOnly = true;
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
      $rs = mysql_query($sql)or die(" error de consulta de SQL : " . $sql);
      while($row = mysql_fetch_array($rs))
         $this->cbalmacen->AddItem($row['nombre'], null , $row['id']);
      mysql_free_result($rs);

      //linea
      $this->cblinea->Clear();
      $cadena = 'select idlinea id, nombre from relineas order by nombre';
      $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);
      while($row = mysql_fetch_array($rs))
         $this->cblinea->AddItem($row['nombre'], null , $row['id']);
      mysql_free_result($rs);

      //unidad
      $this->cbunidad->Clear();
      $this->cbunidad->AddItem("Sin Clasificar", null , - 1);
      $cadena = 'select idunidad id, nombre from reunidadesmedida order by nombre';
      $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);
      while($row = mysql_fetch_array($rs))
         $this->cbunidad->AddItem($row['nombre'], null , $row['id']);
      mysql_free_result($rs);

      //origen
      $this->cborigen->Clear();
      $this->cborigen->AddItem("Sin Clasificar", null , - 1);
      $cadena = 'select idorigen id, nombre from repartesorigen ';
      $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);
      while($row = mysql_fetch_array($rs))
         $this->cborigen->AddItem($row['nombre'], null , $row['id']);
      mysql_free_result($rs);

      //familia
      $this->cbfamilia->Clear();
      $this->cbfamilia->AddItem("Sin Clasificar", null , - 1);
      $cadena = 'select idfamilia id, nombre from refamilias order by nombre';
      $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);
      while($row = mysql_fetch_array($rs))
         $this->cbfamilia->AddItem($row['nombre'], null , $row['id']);
      mysql_free_result($rs);

      //marca
      $this->cbmarca->Clear();
      $this->cbmarca->AddItem("Sin Clasificar", null , - 1);
      $cadena = 'select idmarca id, nombre from remarcas order by nombre';
      $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);
      while($row = mysql_fetch_array($rs))
         $this->cbmarca->AddItem($row['nombre'], null , $row['id']);
      mysql_free_result($rs);

      //moneda
      $this->cbmoneda->Clear();
      $this->cbmoneda->AddItem("Sin Clasificar", null , - 1);
      $cadena = 'select idmoneda id,iniciales as nombre from monedas ';
      $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);
      while($row = mysql_fetch_array($rs))
         $this->cbmoneda->AddItem($row['nombre'], null , $row['id']);
      mysql_free_result($rs);

      //estatus
      $this->cbestatus->Clear();
      $this->cbestatus->AddItem("Sin Clasificar", null , - 1);
      $cadena = 'select idestatus id, nombre from repartesestatus ';
      $rs = mysql_query($cadena)or die(" error de consulta de SQL : " . $cadena);
      while($row = mysql_fetch_array($rs))
         $this->cbestatus->AddItem($row['nombre'], null , $row['id']);
      mysql_free_result($rs);
   }

   function Validar()
   {
      $sql = 'Select idplaza from realmacen where idalmacen = ' . $this->cbalmacen->ItemIndex;
      $rs = mysql_query($sql)or die(" Error de consulta de SQL : " . $sql);
      $row = mysql_fetch_array($rs);
      if($row['idplaza'] != $_SESSION['sesidplaza'])
      {
         echo '<script language="javascript" type="text/javascript">
            alert("No puedes modificar almacenes de otras plazas");
            </script>';
         return false;
      }
      else
      {
         if(Derechos('TODALMACENES') == false && $this->cbalmacen->ItemIndex != $_SESSION['sesidalmacen'])
         {
            echo '<script language="javascript" type="text/javascript">
            alert("No puedes modificar este almacen");
            </script>';
            return false;
         }
      }

      if(Derechos('REEDPARTES') == false && $this->hfestatus->Value == 2)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("No tienes derechos para modificar partes");
             </script>';
         return false;
      }

      if($this->edclave->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la clave de la parte");
             </script>';
         return false;
      }

      if($this->eddescripcion->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la descripcion de la parte");
             </script>';
         return false;
      }

      if($this->edprecioa->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el precio A de la parte");
             </script>';
         return false;
      }

      if($this->edpreciob->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el precio B de la parte");
             </script>';
         return false;
      }

      if($this->edprecioc->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el precio C de la parte");
             </script>';
         return false;
      }

      if($this->edpreciod->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el precio D de la parte");
             </script>';
         return false;
      }

      if($this->edprecioe->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el precio E de la parte");
             </script>';
         return false;
      }

      if($this->edutilidada->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la utilidad A de la parte");
             </script>';
         return false;
      }

      if($this->edutilidadb->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la utilidad B de la parte");
             </script>';
         return false;
      }

      if($this->edutilidadc->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la utilidad C de la parte");
             </script>';
         return false;
      }

      if($this->edutilidadd->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la utilidad D de la parte");
             </script>';
         return false;
      }

      if($this->edutilidade->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la utilidad E de la parte");
             </script>';
         return false;
      }

      if($this->cbalmacen->ItemIndex < 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el almacen de la parte");
             </script>';
         return false;
      }

      if($this->edidproveedor->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el Proveedor");
             </script>';
         return false;
      }

      if($this->cborigen->ItemIndex < 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el origen de la parte");
             </script>';
         return false;
      }

      if($this->cbunidad->ItemIndex < 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la unidad de la parte");
             </script>';
         return false;
      }

      if($this->cblinea->ItemIndex < 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la linea de la parte");
             </script>';
         return false;
      }

      if($this->cbfamilia->ItemIndex < 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la familia de la parte");
             </script>';
         return false;
      }

      if($this->cbmarca->ItemIndex < 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la marca de la parte");
             </script>';
         return false;
      }

      if($this->cbmoneda->ItemIndex < 1)
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta la moneda de la parte");
             </script>';
         return false;
      }

      return true;
   }

}

global $application;

global $urepartes;

//Creates the form
$urepartes = new urepartes($application);

//Read from resource file
$urepartes->loadResource(__FILE__);

//Shows the form
$urepartes->show();

?>