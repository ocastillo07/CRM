<script type='text/javascript' src='funciones.js'></script>
<?php
include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
   redirect("login.php");
require_once("vcl/vcl.inc.php");
//Includes

use_unit("db.inc.php");
use_unit("mysql.inc.php");
use_unit("dbtables.inc.php");
use_unit("comctrls.inc.php");
use_unit("buttons.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class uclientes extends Page
{
   public $lblclasificaciones = null;
   public $Label21 = null;
   public $hfderechonotas = null;
   public $edcp = null;
   public $hfpath2 = null;
   public $hfpath = null;
   public $lbeliminar2 = null;
   public $lbeliminar1 = null;
   public $lbadjunto2 = null;
   public $lbadjunto = null;
   public $btnupload = null;
   public $upload = null;
   public $btncerrar = null;
   public $lbtitulo = null;
   public $edcolonia = null;
   public $edmunicipio = null;
   public $hfcount = null;
   public $lblgrupos = null;
   public $lblufhgrupos = null;
   public $Label26 = null;
   public $edcorreo = null;
   public $Label24 = null;
   public $lblparque = null;
   public $edfechaalta = null;
   public $Label19 = null;
   public $edfax = null;
   public $edtelefono = null;
   public $Label18 = null;
   public $Label16 = null;
   public $rgpersona = null;
   public $Label33 = null;
   public $cbestatus = null;
   public $Label13 = null;
   public $Label20 = null;
   public $edidgds = null;
   public $Edamaterno = null;
   public $Label3 = null;
   public $Label2 = null;
   public $Edapaterno = null;
   public $Label6 = null;
   public $Ednumero = null;
   public $edestado = null;
   public $Label12 = null;
   public $Label11 = null;
   public $Label14 = null;
   public $edrfc = null;
   public $Label23 = null;
   public $cbvendref = null;
   public $cbvendcam = null;
   public $Label15 = null;
   public $Label8 = null;
   public $cbsector = null;
   public $Label10 = null;
   public $Label7 = null;
   public $Eddir = null;
   public $Label5 = null;
   public $Ednombre = null;
   public $Label1 = null;
   public $Edrsocial = null;
   public $Label4 = null;
   public $Ednomcomercial = null;
   public $Label9 = null;
   public $edidcliente = null;
   public $hfnombre = null;
   public $Label32 = null;
   public $lblmodcamiones = null;
   public $lblcamiones = null;
   public $btngcerrar = null;
   public $btnguardar = null;
   public $pbotones = null;
   public $tblclientes = null;
   public $hfidnota = null;
   public $lblnotas = null;
   public $hfidcontacto = null;
   public $hfestatus = null;
   public $sqlgen2 = null;
   public $sqlgen = null;
   public $lbufh = null;
   public $lblcontactos = null;
   public $Label22 = null;
   public $Label17 = null;

   function edcpJSKeyPress($sender, $params)
   {

?>
       //Add your javascript code here
          if( ValidaEntero(document.getElementById('edcp').value, event) != event.keyCode)
           return false;
<?php
   }

   function lbeliminar2Click($sender, $params)
   {
      $this->eliminararchivo(2);
   }

   function lbeliminar1Click($sender, $params)
   {
      $this->eliminararchivo(1);
   }

   function eliminararchivo($no)
   {
      if(Derechos('Eliminar Archivoclientes') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Eliminar el Archivo");
               </script>';
      }
      else
      {
         if($no == 1)
         {
            unlink('Adjuntos/' . $this->lbadjunto->Caption);
            $this->hfpath->Value = '';
            $sql = ' update clientes set path="' . $this->hfpath->Value .
            '" where idcliente =' . $this->edidcliente->Text;
            $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
            $this->lbadjunto->Caption = '';
            $this->lbeliminar1->Caption = '';
         }
         if($no == 2)
         {
            unlink('Adjuntos/' . $this->lbadjunto2->Caption);
            $this->hfpath2->Value = '';
            $sql = ' update clientes set path2="' . $this->hfpath2->Value .
            '" where idcliente =' . $this->edidcliente->Text;
            $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
            $this->lbadjunto2->Caption = '';
            $this->lbeliminar2->Caption = '';
         }
      }
   }

   function btnuploadClick($sender, $params)
   {
      if(Derechos('Subir Archivoclientes') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Adjuntar el Archivo");
               </script>';
      }
      else
      {
         if($this->hfestatus->value == 1)
         {
            echo '<script language="javascript" type="text/javascript">
             	alert(\' Debes Guardar Los Datos Antes de Subir el Archivo \');
           		</script>';

         }
         else
         {
            $path = GetConfiguraciones('Pathadjuntos');

            if((($_FILES["upload"]["type"] == "image/gif")
            || ($_FILES["upload"]["type"] == "image/jpeg")
            || ($_FILES["upload"]["type"] == "image/pjpeg")
            || ($_FILES["upload"]["type"] == "application/pdf")
            || ($_FILES["upload"]["type"] == "application/vnd.ms-excel")
            || ($_FILES["upload"]["type"] == "application/msword"))
            && ($_FILES["upload"]["size"] < 20485760))//10 megas
            {
               if($_FILES["upload"]["error"] > 0)
               {
                  echo '<script language="javascript" type="text/javascript">
                  		     alert(\'Error al subir Archivo: ' . $_FILES["upload"]["error"] . '\');
                     		</script>';
               }
               else
               {
                  if(file_exists($path . $_FILES["upload"]["name"]))
                  {
                     echo '<script language="javascript" type="text/javascript">
                    		      alert(\' El Archivo ya existe: ' . $_FILES["upload"]["name"] . '\');
                     	   </script>';
                  }
                  else
                  {
                     if($this->lbadjunto->Caption == '')
                     {
                        move_uploaded_file($_FILES["upload"]["tmp_name"],
                        $_SERVER['DOCUMENT_ROOT'] . $path . replace($_FILES["upload"]["name"]));
                        echo '<script language="javascript" type="text/javascript">
                         		 alert(\'Archivo Guardado: ' . replace($_FILES["upload"]["name"]) . '\');
                        		</script>';
                        $this->lbadjunto->Caption = replace($_FILES["upload"]["name"]);
                        $this->lbadjunto->Link = "Adjuntos/" . replace($_FILES["upload"]["name"]);
                        $this->hfpath->Value = replace($_FILES['upload']['name']);
                        $sql = ' update clientes set path="' . $this->hfpath->Value .
                        '" where idcliente =' . $this->edidcliente->Text;
                        $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
                        $this->lbeliminar1->Caption = 'Eliminar';
                     }
                     else if($this->lbadjunto2->Caption == '')
                     {
                        move_uploaded_file($_FILES["upload"]["tmp_name"],
                        $_SERVER['DOCUMENT_ROOT'] . $path . replace($_FILES["upload"]["name"]));
                        echo '<script language="javascript" type="text/javascript">
                          	alert(\'Archivo Guardado: ' . replace($_FILES["upload"]["name"]) . '\');
                        	</script>';
                        $this->lbadjunto2->Caption = replace($_FILES["upload"]["name"]);
                        $this->lbadjunto2->Link = "Adjuntos/" . replace($_FILES["upload"]["name"]);
                        $this->hfpath2->Value = replace($_FILES['upload']['name']);
                        $sql = ' update clientes set path2="' . $this->hfpath2->Value .
                        '" where idcliente =' . $this->edidcliente->Text;
                        $rs = mysql_query($sql)or die('Error de consulta SQL: ' . $sql);
                        $this->lbeliminar2->Caption = 'Eliminar';
                     }
                     else
                     {
                        echo '<script language="javascript" type="text/javascript">
                        	     alert(\'Ya no puedes agregar otro Archivo \');
                           	</script>';
                     }
                  }
               }
            }
            else
            {
               echo '<script language="javascript" type="text/javascript">
                    alert(\' Formato del Archivo Invalido! \');
                  </script>';
            }
         }
      }
   }


   function btncerrarClick($sender, $params)
   {
      redirect('uclientesvista.php');
   }

   function rgpersonaClick($sender, $params)
   {
      if($this->rgpersona->ItemIndex == 0)
      {
         $this->Edrsocial->Text = '';
         $this->Edrsocial->ReadOnly = true;
         $this->Ednombre->ReadOnly = false;
         $this->Edapaterno->ReadOnly = false;
         $this->Edamaterno->ReadOnly = false;
      }
      else
      {
         $this->Ednombre->Text = '';
         $this->Edapaterno->Text = '';
         $this->Edamaterno->Text = '';
         $this->Edrsocial->ReadOnly = false;
         $this->Ednombre->ReadOnly = true;
         $this->Edapaterno->ReadOnly = true;
         $this->Edamaterno->ReadOnly = true;
      }
   }

   function uclientesJSLoad($sender, $params)
   {
?>
       //Add your javascript code here
       var ed = document.getElementById("Ednomcomercial");
         ed.focus();
<?php
   }


   function btngcerrarClick($sender, $params)
   {
      $r = $this->Validar();
      if($r == true)
      {
         $this->Guardar();
         redirect("uclientesvista.php");
      }
      /*else
      {
      if($this->Activado() == true && Derechos('Modificar Vendedor') == true &&
      $this->hfestatus->Value == 2 && Derechos('Modificar Clientes')) {
      $this->ActualizarEnActivado();
      redirect("uclientesvista.php");
      }
      } */
   }

   function btnguardarClick($sender, $params)
   {
      $r = $this->Validar();

      if($r == true)
      {
         $this->Guardar();
         redirect('uclientes.php?idcliente=' . $this->edidcliente->Text);
      }
      /*else
      {
      if(Derechos('Modificar Vendedor') == true &&
      $this->hfestatus->Value == 2 && Derechos('Modificar Clientes')) {
      $this->ActualizarEnActivado();
      redirect("uclientesvista.php");
      }
      }*/
   }

   function ActualizarEnActivado()
   {
      $this->tblclientes->close();
      $this->tblclientes->writeFilter('idcliente="' . $this->edidcliente->Text . '"');
      $this->tblclientes->refresh();
      $this->tblclientes->open();
      $this->tblclientes->Edit();
      $this->tblclientes->fieldset("idestatus", $_REQUEST['cbestatus']);
      $msg = "Edito el vendededor del cliente No. " . $this->edidcliente->Text . " " . $this->hfnombre->Value;
      $nivel = 2;
      $this->tblclientes->fieldset("idvendcam", $_REQUEST['cbvendcam']);
      $this->tblclientes->fieldset("idvendref", $_REQUEST['cbvendref']);
      $this->tblclientes->fieldset("usuario", $_SESSION["login"]);
      $this->tblclientes->fieldset("fecha", date("Y/n/j"));
      $this->tblclientes->fieldset("hora", date("H:i:s"));
      $this->tblclientes->post();
      $this->tblclientes->Active = false;
      dmconexion::Log($msg, $nivel);
   }

   function lblnotasClick($sender, $params)
   {
      if($this->hfestatus->Value!='1')
      {
         dmconexion::Log("Acceso a las notas del cliente " . $this->edidcliente->Text . " " . $this->hfnombre->Value, 1);
         redirect("unotas.php?idnota=" . $this->hfidnota->Value . "&procedencia=clientes" .
                  "&idprocedencia=" . $this->edidcliente->Text . "&visible=" . $this->hfderechonotas->Value);
      }
      else
      {
         echo '<script language="javascript" type="text/javascript">
               alert(\'Aun no se a Registrado el Cliente, Primero debes Guardarlo\');
               </script>';
      }
   }

   function lblcontactosClick($sender, $params)
   {
      if($this->hfestatus->Value!='1')
      {
         dmconexion::Log("Acceso a los contactos de el cliente " . $this->edidcliente->Text . " " . $this->hfnombre->Value, 1);
         redirect("ucontactos.php?idcontacto=" . $this->hfidcontacto->Value . "&idcliente=" . $this->edidcliente->Text);
      }
      else
      {
         echo '<script language="javascript" type="text/javascript">
               alert(\'Aun no se a Registrado el Cliente, Primero debes Guardarlo\');
               </script>';
      }
   }


   function uclientesShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET["idcliente"]))
      {
         $this->edidcliente->Text = $_GET["idcliente"];
         if($this->edidcliente->Text == 0)
            $this->hfestatus->Value = 1;
         else
         {
            $this->hfestatus->Value = 2;
            $this->sqlgen2->close();
            $nom = NombreMoral('c');
            $this->sqlgen2->sql = 'Select ' . $nom . ' as nombre from clientes c ' .
            'where idcliente =' . $this->edidcliente->Text;
            $this->sqlgen2->open();
            $this->hfnombre->Value = $this->sqlgen2->fieldget("nombre");
         }

         if($this->edidcliente->Text == 0 && $this->hfestatus->Value == 1)
         {
            $this->inicializaforma();
            $this->Limpiar();
            $this->Alta();
         }
         else
         {
            if(!isset($_GET["elim"]))
            {
               $this->inicializaforma();
               $this->Limpiar();
               $this->edidcliente->Text = $_GET["idcliente"];
               $this->Locate();
            }
            else
            {
               if(Derechos('Eliminar Clientes') == false)
               {
                  echo '<script language="javascript" type="text/javascript">
                  alert("No Tienes el Derecho para Eliminar Clientes");
                  window.location="uclientesvista.php";
                  </script>';
               }
               else
               {
                  $this->hfestatus->Value = 3;
                  $this->inicializaforma();
                  $this->Eliminar();
               }
            }
         }
      }
   }

   function Eliminar()
   {
      $this->Locate();

      $this->tblclientes->open();
      $this->tblclientes->delete();
      $this->tblclientes->Active = false;

      /**/$sql = "Delete from contactos where idcontacto = '" . $this->hfidcontacto->Value . "'";
      $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

      $sql = "Delete from notas where idnota = '" . $this->hfidnota->Value . "'";
      $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

      dmconexion::Log("Elimino el cliente no. " . $this->edidcliente->Text .
      " " . $this->hfnombre->Value . " con sus telefonos, contactos y notas", 3);

      redirect("uclientesvista.php");
   }

   function Validar()
   {

      if($this->ValidarRFC() == false)
         return false;

      if($this->rgpersona->ItemIndex == 1 && $this->Edrsocial->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el nombre la razon social");
             </script>';
         return false;
      }

      if($this->rgpersona->ItemIndex == 0 && $this->Ednombre->Text == '')
      {
         echo '<script language="javascript" type="text/javascript">
             alert("Falta el nombre la persona");
             </script>';
         return false;
      }
      return true;
   }

   function ValidarRFC()
   {
      if($this->edrfc->Text != "")
      {
         if($this->rgpersona->ItemIndex == 0)
         {
            //Fisica
            $c = $this->edrfc->Text;
            $t = strlen($c);
            if($t > 13)
            {
               echo '<script language="javascript" type="text/javascript"> ' .
               'alert(\'Hay un error en el RFC. La longitud es mayor a la correspondiente.\'); </script>';
               return false;
            }
            for($i = 0; $i <= $t; $i++)
            {
               //verifica sea caracter el nombre
               if($i <= 3)
               {
                  if(is_string($c[$i]) == false)
                  {
                     echo '<script language="javascript" type="text/javascript"> ' .
                     'alert(\'Hay un error en el RFC. Con la letra ' . $c[$i] . ' Posicion ' . $i . '\'); </script>';
                     return false;
                  }
               }

               //verifica sea numerica la fecha
               if($i > 3 && $i <= 9)
               {
                  if(is_numeric($c[$i]) == false)
                  {
                     echo '<script language="javascript" type="text/javascript"> ' .
                     'alert(\'Hay un error en el RFC. Con la letra ' . $c[$i] . ' Posicion ' . $i . '\'); </script>';
                     return false;
                  }

                  //verifica el mes
                  if($i == 6)
                     $m = $c[$i];
                  if($i == 7)
                  {
                     $m = $m . $c[$i];
                     if($m > 12 || $m < 1)
                     {
                        echo '<script language="javascript" type="text/javascript"> ' .
                        'alert(\'Hay un error en el RFC. El mes es incorrecto ' . $m . '\'); </script>';
                        return false;
                     }
                  }
                  //verifica el dia
                  if($i == 8)
                     $d = $c[$i];
                  if($i == 9)
                  {
                     $d = $d . $c[$i];
                     if($d > 31 || $d < 1)
                     {
                        echo '<script language="javascript" type="text/javascript"> ' .
                        'alert(\'Hay un error en el RFC. El dia es incorrecto ' . $d . '\'); </script>';
                        return false;
                     }
                  }
               }
            }
         }
         if($this->rgpersona->ItemIndex == 1)
         {
            //Moral
            $c = $this->edrfc->Text;
            $t = strlen($c);
            if($t > 12)
            {
               echo '<script language="javascript" type="text/javascript"> ' .
               'alert(\'Hay un error en el RFC. La longitud es mayor a la correspondiente.\'); </script>';
               return false;
            }

            for($i = 0; $i <= $t; $i++)
            {
               //verifica sea caracter el nombre
               if($i <= 2)
               {
                  if(is_string($c[$i]) == false)
                  {
                     echo '<script language="javascript" type="text/javascript"> ' .
                     'alert(\'Hay un error en el RFC. Con la letra ' . $c[$i] . ' Posicion ' . $i . '\'); </script>';
                     return false;
                  }
               }
               //verifica sea numerica la fecha
               if($i > 2 && $i <= 8)
               {
                  if(is_numeric($c[$i]) == false)
                  {
                     echo '<script language="javascript" type="text/javascript"> ' .
                     'alert(\'Hay un error en el RFC. Con la letra ' . $c[$i] . ' Posicion ' . $i . '\'); </script>';
                     return false;
                  }
                  //verifica el mes
                  if($i == 5)
                     $m = $c[$i];
                  if($i == 6)
                  {
                     $m = $m . $c[$i];
                     if($m > 12 || $m < 1)
                     {
                        echo '<script language="javascript" type="text/javascript"> ' .
                        'alert(\'Hay un error en el RFC. El mes es incorrecto ' . $m . '\'); </script>';
                        return false;
                     }
                  }
                  //verifica el dia
                  if($i == 7)
                     $d = $c[$i];
                  if($i == 8)
                  {
                     $d = $d . $c[$i];
                     if($d > 31 || $d < 1)
                     {
                        echo '<script language="javascript" type="text/javascript"> ' .
                        'alert(\'Hay un error en el RFC. El dia es incorrecto ' . $d . '\'); </script>';
                        return false;
                     }
                  }
               }
            }
         }
      }
      return true;
   }

   function Alta()
   {
      if($this->hfestatus->Value == 1)
      {
         $this->sqlgen2->close();
         $this->sqlgen2->sql = "Select ifnull(max(idcliente), 0)+1 as id from clientes";
         $this->sqlgen2->open();
         $this->edidcliente->Text = $this->sqlgen2->fieldget("id");
         $this->edfechaalta->Text = date("Y/n/j");
			$this->hfidnota->Value=0;
         $this->cbestatus->ItemIndex = 1;
         $this->cbestatus->Enabled = false;
         $this->TraeCamiones();
         $this->TraeGrupos();
      }
   }

   function Locate()
   {
      if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
      {
         if($this->edidcliente->Text != 0)
         {
            //$this->edidcliente->Text = $_GET["idcliente"];
            $this->cbestatus->Enabled = true;

            //notas del cliente
            $this->hfderechonotas->Value = 0;
            if(Derechos("ACCCLIENTESNTS"))
            {
               $this->hfderechonotas->Value = 1;
               $rsm = "SELECT concat(n.fecha, ' ', n.nota) as nota from notasdet n left join clientes c on c.idnota=n.idnota
                        where idcliente=" . $this->edidcliente->Text . " order by n.fecha desc , n.hora desc limit 1";
               $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
               $row = mysql_fetch_row($r);
               $nota = str_replace('"', '\"', $row[0]);
            }
            else
               $nota = "Nueva Nota";

            $this->sqlgen->close();
            $r = ufh('cl');
            $con = NombreFisica('c');

            if($this->rgpersona->ItemIndex == 0)
            {
               $this->Edrsocial->Text = '';
               $this->Edrsocial->ReadOnly = true;
               $this->Ednombre->ReadOnly = false;
               $this->Edapaterno->ReadOnly = false;
               $this->Edamaterno->ReadOnly = false;
            }
            else
            {
               $this->Ednombre->Text = '';
               $this->Edapaterno->Text = '';
               $this->Edamaterno->Text = '';
               $this->Edrsocial->ReadOnly = false;
               $this->Ednombre->ReadOnly = true;
               $this->Edapaterno->ReadOnly = true;
               $this->Edamaterno->ReadOnly = true;
            }

            $this->sqlgen->SQL = 'SELECT cl.idgds, cl.rsocial, cl.nomcomercial, cl.nombre, cl.apaterno,
                              cl.amaterno, cl.direccion, cl.numero, cl.cp, cl.persona,  cl.rfc, cl.municipio,
                              cl.idsector, cl.colonia, ' . $r . ' as ufh, cl.telefono, cl.fax, cl.email,
                              cl.idcontacto, concat(' . $con . ', " ", ifnull(c.telefono1, "")) as contacto,
                              c.telefono1, cl.idnota, left("' . $nota . '", 160) as nota, alta,
                              cl.idestatus, cl.estado, idvendcam, idvendref, activado,path,path2
                              from clientes cl
                              left join contactos c on c.idcontacto=cl.idcontacto and c.nivel = 1
                              where cl.idcliente = ' . $this->edidcliente->Text . ' limit 1';


            $this->sqlgen->Active = true;
            $this->sqlgen->open();

            $this->tblclientes->setFilter(' idcliente="' . $this->edidcliente->Text . '"');
            $this->edidgds->Text = $this->sqlgen->fieldget("idgds");
            $this->Ednomcomercial->Text = $this->sqlgen->fieldget("nomcomercial");
            $this->Edrsocial->Text = $this->sqlgen->fieldget("rsocial");
            $this->Ednombre->Text = $this->sqlgen->fieldget("nombre");
            $this->Edapaterno->Text = $this->sqlgen->fieldget("apaterno");
            $this->Edamaterno->Text = $this->sqlgen->fieldget("amaterno");
            $this->Eddir->Text = $this->sqlgen->fieldget("direccion");
            $this->Ednumero->Text = $this->sqlgen->fieldget("numero");
            $this->edcp->Text = $this->sqlgen->fieldget("cp");
            $this->edrfc->Text = $this->sqlgen->fieldget("rfc");
            $this->edtelefono->Text = $this->sqlgen->fieldget("telefono");
            $this->edfax->Text = $this->sqlgen->fieldget("fax");
            $this->edcorreo->Text = $this->sqlgen->fieldget("email");
            $this->edfechaalta->Text = $this->sqlgen->fieldget("alta");
            $this->lbufh->Caption = $this->sqlgen->fieldget("ufh");

            $this->hfidcontacto->Value = $this->sqlgen->fieldget("idcontacto");
            $this->lblcontactos->Caption = $this->sqlgen->fieldget("contacto");
            if($this->lblcontactos->Caption == "")
               $this->lblcontactos->Caption = "Contactos";

            $this->hfidnota->Value = $this->sqlgen->fieldget("idnota");
            $this->lblnotas->Caption = $this->sqlgen->fieldget("nota");
            if($this->lblnotas->Caption == "")
               $this->lblnotas->Caption = "Notas";

            $this->hfidnota->Value = $this->sqlgen->fieldget("idnota");

            $this->cbestatus->ItemIndex = $this->sqlgen->fieldget("idestatus");
            $this->cbsector->ItemIndex = $this->sqlgen->fieldget("idsector");
            $this->cbvendref->ItemIndex = $this->sqlgen->fieldget("idvendref");
            $this->cbvendcam->ItemIndex = $this->sqlgen->fieldget("idvendcam");

            $this->edestado->Text = $this->sqlgen->fieldget("estado");
            $this->edmunicipio->Text = $this->sqlgen->fieldget("municipio");
            $this->edcolonia->Text = $this->sqlgen->fieldget("colonia");

            if($this->sqlgen->fieldget("persona") == "F")
               $this->rgpersona->ItemIndex = 0;
            else
               $this->rgpersona->ItemIndex = 1;


            if(Derechos("Abrir Archivoclientes"))
            {
               //adjuntos
               $this->lbadjunto->Link = 'Adjuntos/' . $this->sqlgen->fieldget('path');
               $this->lbadjunto->Caption = $this->sqlgen->fieldget('path');
               $this->hfpath->Value = $this->sqlgen->fieldget('path');
               if($this->sqlgen->fieldget('path') <> '')
                  $this->lbeliminar1->Caption = 'Eliminar';
               $this->lbadjunto2->Link = 'Adjuntos/' . $this->sqlgen->fieldget('path2');
               $this->lbadjunto2->Caption = $this->sqlgen->fieldget('path2');
               $this->hfpath2->Value = $this->sqlgen->fieldget('path2');
               if($this->sqlgen->fieldget('path2') <> '')
                  $this->lbeliminar2->Caption = 'Eliminar';
            }

            $this->TraeCamiones();
            $this->TraeGrupos();
            $this->TraeClasificaciones();

         }
      }
   }

   function TraeCamiones()
   {
      $rsm = "SELECT ct.nombre, ifnull(cf.cantidad , 0) as cantidad, concat(cf.usuario, ' ', cf.fecha) as uf, ct.idtipo
               FROM camionestipos AS ct
              left Join clientesflotilla AS cf ON cf.idtipo = ct.idtipo and cf.idcliente = " .
      $this->edidcliente->Text . " where ct.margenutilidad > 0";
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      $c = '
         <table width="100" border="0" cellspacing="1" cellpadding="1"  class = "estilos.css">
         <tr bgcolor="#FF9B37">

         <td width="193">
         <span style=" font-family: Verdana; font-size: 11; ">
         Tipo
         </span></td>
         <td width="157">
         <span style=" font-family: Verdana; font-size: 11; ">
         Cantidad
         </span></td>
         </tr>';
      while($row = mysql_fetch_array($r))
      {
         $this->lblparque->Caption = $row[2];
         $c = $c . '
         <tr>

        <td>
        <span style=" font-family: Verdana; font-size: 10;  ">
        <div align="left">' . $row['nombre'] . '</div>
        </span>
        </td>
         <td>
         <span style=" font-family: Verdana; font-size: 10;">
         <div align="right"><input name="ed' . $row['idtipo'] . '" type="text" value="' . $row['cantidad'] . '" size = "10" tag=' . $row['cantidad'] . '/></div>
         </span></td>';
      }
      $c = $c . "  </tr>
         </table>";

      $this->lblcamiones->Caption = $c;
   }

   function GuardaParque()
   {
      $rsm = "SELECT ct.nombre, ifnull(cf.cantidad , 0) as cantidad, ct.idtipo FROM camionestipos AS ct
              left Join clientesflotilla AS cf ON cf.idtipo = ct.idtipo and cf.idcliente = " .
      $this->edidcliente->Text;
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      while($row = mysql_fetch_array($r))
      {
         $h = $_REQUEST['ed' . $row['idtipo']];
         if($h == $row[1])
            continue;
         else
            $ban = 1;
      }
      if($ban == 1)
      {
         $sql = "Delete from clientesflotilla where idcliente =" . $this->edidcliente->Text;
         $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

         $rsm = "SELECT nombre, idtipo FROM camionestipos where margenutilidad > 0";
         $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
         while($row = mysql_fetch_array($r))
         {
            /*if($_REQUEST['ed'.$row[0]] == '')
            $_REQUEST['ed'.$row[0]] = 0;*/
            $sql = "Insert into clientesflotilla (idcliente, idtipo, cantidad, usuario, fecha, hora)
                  values (" . $this->edidcliente->Text . ", " . $row[1] . ", '" . $_REQUEST['ed' . $row['idtipo']] . "', '" . $_SESSION['login'] . "', curdate(), curtime())";
            $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
         }
         dmconexion::Log('Modifico el Parque Vehicular de ' . $this->edidcliente->Text, 2);
      }
   }

   function TraeGrupos()
   {
      $rsm = "SELECT g.idgrupo as id, g.nombre, if(cg.idcliente is not null, 1,0) as ch,
              concat(cg.usuario, ' ', cg.fecha) as uf
              FROM clientesgruposcat AS g
              left Join clientesgrupos cg on
              cg.idgrupo = g.idgrupo and idcliente = " . $this->edidcliente->Text;
      $this->sqlgen->close();
      $this->sqlgen->sql = $rsm;
      $this->sqlgen->open();
      $t = '<table width="120" border="0" cellpadding="0" cellspacing="0" align="center">';
      $c = 1;
      while(!$this->sqlgen->EOF == true)
      {
         $this->lblufhgrupos->Caption = $this->sqlgen->fieldget('uf'); //$row[2];
         if($this->sqlgen->fieldget('ch') == 1)
            $ch = 'checked="checked"';
         else
            $ch = '';
         $t = $t . '<tr>
          <td height = "20"> <span style=" font-family: Verdana; font-size: 11; "> ' .
         $this->sqlgen->fieldget('nombre') . ' </span>  </td>
          <td><span style=" font-family: Verdana; font-size: 11; ">
          <input type="checkbox" name="chk' . $c . '"
          id="chk' . $c . '"
          value="' . $this->sqlgen->fieldget('id') . '" ' . $ch . '     /></span></td>
          </tr>';

         $this->sqlgen->next();
         $c++;
      }
      $this->hfcount->Value = $c;
      $t = $t . ' <tr><td></td></tr><tr><td></td></tr></table> ';
      $this->lblgrupos->Caption = $t;

   }

   function TraeClasificaciones()
   {
      $rsm = "select idclienteclasificacion as id, cc.nombre, (select idclasificacion
               from clientes where idcliente = 2 and idclasificacion = cc.idclienteclasificacion) as ch
               from clientesclasificaciones cc ";
      $this->sqlgen->close();
      $this->sqlgen->sql = $rsm;
      $this->sqlgen->open();
      $t = '<table width="120" border="0" cellpadding="0" cellspacing="0" align="center">';
      while(!$this->sqlgen->EOF == true)
      {
         //$this->lblufhgrupos->Caption = $this->sqlgen->fieldget('uf'); //$row[2];
         if($this->sqlgen->fieldget('ch') > 0)
            $ch = 'checked="checked"';
         else
            $ch = '';

         $t = $t . '<tr>
                   <td><span style=" font-family: Verdana; font-size: 11; ">
                   <input  type=radio id="RadioGroup1_'. $this->sqlgen->fieldget('id') .'"
                   tabIndex=0 name="RadioClas" value="' . $this->sqlgen->fieldget('id') . '" ' . $ch . '>
                   </span></td>
                   <td height = "20"> <span style=" font-family: Verdana; font-size: 11; "> ' .
                   $this->sqlgen->fieldget('nombre') . ' </span>  </td>
                   </tr>';

         $this->sqlgen->next();
      }
      $this->hfcount->Value = $this->sqlgen->fieldget('id');
      $t = $t . ' <tr><td></td></tr><tr><td></td></tr></table> ';
      $this->lblclasificaciones->Caption = $t;

   }

   function GuardaGrupo()
   {
      $rsm = "SELECT g.idgrupo as id, g.nombre, concat(cg.usuario, ' ', cg.fecha) as uf
              FROM clientesgruposcat AS g
              left Join clientesgrupos cg on cg.idgrupo = g.idgrupo and idcliente = " . $this->edidcliente->Text;
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());
      $c = 1;
      while($row = mysql_fetch_array($r))
      {
         $h = $_REQUEST['chk' . $c];

         if($h == $row[1])
            continue;
         else
            $ban = 1;

         $c++;
      }

      if($ban == 1)
      {
         $sql = 'Delete from clientesgrupos where idcliente=' . $this->edidcliente->Text;
         $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

         for($i = 1; $i <= $c; $i++)
         {
            if($_REQUEST['chk' . $i] > 0)
            {
               $s = 'Insert into clientesgrupos (idcliente, idgrupo, usuario, fecha, hora) ' .
               'values(' . $this->edidcliente->Text . ', ' . $_REQUEST['chk' . $i] . ', "' . $_SESSION['login'] . '", curdate(), curtime())';
               $rs = mysql_query($s)or die("error sql: " . $s . " " . mysql_error());
            }
         }
         dmconexion::Log('Edito los grupos del cliente' . $this->edidcliente->Text, 3);
      }
   }

   function GuardaClasificacion()
   {
      $rsm = "update clientes set idclasificacion = ". $_REQUEST['RadioClas'] . "
             where idcliente = " . $this->edidcliente->Text;
      $r = mysql_query($rsm)or die("error sql: " . $rsm . " " . mysql_error());

      dmconexion::Log('Edito la clasificacion del cliente' . $this->edidcliente->Text, 3);
   }

   function Guardar()
   {
      if(!isset($_GET["idcliente"]))
      {
         $ban = false;
         if($this->hfestatus->Value == 1)
         {
            $this->tblclientes->open();
            $this->tblclientes->insert();
            $this->tblclientes->fieldset("idcliente", $this->edidcliente->Text);
            $this->tblclientes->fieldset("idcontacto", 0);
            $this->tblclientes->fieldset("idestatus", 1);
            $msg = "Inserto el cliente no. " . $this->edidcliente->Text;
            $nivel = 1;
            $ban = true;
         }
         else
         {
            if(Derechos('Modificar Clientes') == false)
            {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Modificar Clientes");
                  </script>';
               $idcliente = $this->edidcliente->Text;
               $this->hfestatus->Value = 2;
               $this->inicializaforma();
               $this->Limpiar();
               $this->edidcliente->Text = $idcliente;
               $this->Locate();
            }
            else
            {
               $ban = true;
               $this->tblclientes->close();
               $this->tblclientes->writeFilter('idcliente="' . $this->edidcliente->Text . '"');
               $this->tblclientes->refresh();
               $this->tblclientes->open();
               $this->tblclientes->Edit();
               if(!isset($_REQUEST['cbestatus']))
               {
                  $s = 'Select idestatus from clientes where idcliente = "' . $this->edidcliente->Text . '"';
                  $rs = mysql_query($s)or die("error sql: " . $s . " " . mysql_error());
                  $row = mysql_fetch_array($rs);
                  $_REQUEST['cbestatus'] = $row['idestatus'];
               }

               $this->tblclientes->fieldset("idestatus", $_REQUEST['cbestatus']);
               $msg = "Edito el cliente no. " . $this->edidcliente->Text . " " . $this->hfnombre->Value;
               $nivel = 2;
            }
         }

         if($ban == true)
         {
            $this->tblclientes->fieldset("nomComercial", $this->Ednomcomercial->Text);
            $this->tblclientes->fieldset("rsocial", $this->Edrsocial->Text);
            $this->tblclientes->fieldset("nombre", $this->Ednombre->Text);
            $this->tblclientes->fieldset("apaterno", $this->Edapaterno->Text);
            $this->tblclientes->fieldset("amaterno", $this->Edamaterno->Text);
            $this->tblclientes->fieldset("rfc", $this->edrfc->Text);
            $this->tblclientes->fieldset("direccion", $this->Eddir->Text);
            $this->tblclientes->fieldset("numero", $this->Ednumero->Text);
            $this->tblclientes->fieldset("cp", $this->edcp->Text);
            $this->tblclientes->fieldset("idgds", $this->edidgds->Text);
            $this->tblclientes->fieldset("telefono", $this->edtelefono->Text);
            $this->tblclientes->fieldset("fax", $this->edfax->Text);
            $this->tblclientes->fieldset("email", $this->edcorreo->Text);
            $this->tblclientes->fieldset("alta", $this->edfechaalta->Text);
            $this->tblclientes->fieldset("estado", $this->edestado->Text);
            $this->tblclientes->fieldset("municipio", $this->edmunicipio->Text);
            $this->tblclientes->fieldset("colonia", $this->edcolonia->Text);
				$this->tblclientes->fieldset("idnota", $this->hfidnota->Value);
            $this->tblclientes->fieldset("path", $this->lbadjunto->Caption);
            $this->tblclientes->fieldset("path2", $this->lbadjunto2->Caption);

            //if(Derechos('Modificar Vendedor') == true)
            //{
            $this->tblclientes->fieldset("idvendcam", $_REQUEST['cbvendcam']);
            $this->tblclientes->fieldset("idvendref", $_REQUEST['cbvendref']);
            /*}
            else
            {
            echo '<script language="javascript" type="text/javascript">
            alert(\' No tienes Derechos Para Modificar el VENDEDOR\');
            </script>';
            }*/


            $this->tblclientes->fieldset("idsector", $_REQUEST['cbsector']);

            switch($this->rgpersona->ItemIndex)
            {
               case 0 :
                  $this->tblclientes->fieldset("persona", "F");
                  break;
               case 1 :
                  $this->tblclientes->fieldset("persona", "M");
                  break;
            }

            $this->tblclientes->fieldset("usuario", $_SESSION["login"]);
            $this->tblclientes->fieldset("fecha", date("Y/n/j"));
            $this->tblclientes->fieldset("hora", date("H:i:s"));
            $this->tblclientes->post();
            $this->tblclientes->Active = false;
            $this->hfestatus->Value = 2;

            $this->GuardaParque();
            $this->GuardaGrupo();
            $this->GuardaClasificacion();

            dmconexion::Log($msg, $nivel);

         }
      }
   }


   function inicializaforma()
   {
      //estatus
      $this->sqlgen2->close();
      $this->sqlgen2->sql = 'Select nombre, idestatus as id from estatusclientes';
      $this->sqlgen2->open();
      $this->cbestatus->Clear();
      $this->cbestatus->AddItem("Sin estatus", null , null);
      while($this->sqlgen2->EOF != true)
      {
         $this->cbestatus->AddItem($this->sqlgen2->fieldget("nombre"), null , $this->sqlgen2->fieldget("id"));
         $this->sqlgen2->next();
      }


      //Sectores
      $this->sqlgen2->close();
      $this->sqlgen2->sql = 'Select c.idclasificacion, c.nombre from clasificaciones c left join tipoclasificacion tc on tc.idtipo=c.idtipo where tc.nombre="Sectores"';
      $this->sqlgen2->open();
      $this->cbsector->Clear();
      $this->cbsector->AddItem("Sin sector", null , null);
      while($this->sqlgen2->EOF != true)
      {
         $this->cbsector->AddItem($this->sqlgen2->fieldget("nombre"), null , $this->sqlgen2->fieldget("idclasificacion"));
         $this->sqlgen2->next();
      }

      //Vendedores
      $this->sqlgen2->close();
      $nombre = NombreFisica('u');
      $this->sqlgen2->sql = 'Select u.idusuario as id, ' . $nombre . ' as nombre from usuarios u
                               where u.idpuesto in(' . GetConfiguraciones('PuestoVendedor') . ')';
      $this->sqlgen2->open();
      $this->cbvendref->Clear();
      $this->cbvendref->AddItem("Sin vendedor", null , null);
      $this->cbvendcam->Clear();
      $this->cbvendcam->AddItem("Sin vendedor", null , null);
      while($this->sqlgen2->EOF != true)
      {
         $this->cbvendref->AddItem($this->sqlgen2->fieldget("nombre"), null , $this->sqlgen2->fieldget("id"));
         $this->cbvendcam->AddItem($this->sqlgen2->fieldget("nombre"), null , $this->sqlgen2->fieldget("id"));
         $this->sqlgen2->next();
      }
      if(Derechos('Modificar Vendedor') == false)
      {
         if($this->hfestatus->Value == 2)
         {
            $this->cbvendcam->Enabled = false;
            $this->cbvendref->Enabled = false;
         }
         else
         {
            $this->cbvendcam->Enabled = true;
            $this->cbvendref->Enabled = true;
         }
      }
      else
      {
         $this->cbvendcam->Enabled = true;
         $this->cbvendref->Enabled = true;
      }

   }

   function Limpiar()
   {
      //echo '<script language="javascript" type="text/javascript">  alert(\'limpiar\'); </script>';
      reset($this->controls->items);
      while(list($key, $val) = each($this->controls->items))
      {
         if($val->inheritsFrom("Edit"))
            $val->Text = "";

         if($val->inheritsFrom("ComboBox"))
            $val->ItemIndex = -1;
      }
      $this->lbufh->Caption = '';
      $this->lblcontactos->Caption = "Contactos";
      $this->lblcamiones->Caption = "";
      $this->lblnotas->Caption = "Notas";
      $this->lbadjunto->Caption = '';
      $this->lbadjunto->Link = '';
      $this->lbadjunto2->Caption = '';
      $this->lbadjunto2->Link = '';
      $this->lbeliminar1->Caption = '';
      $this->lbeliminar2->Caption = '';
   }

}

global $application;

global $uclientes;

//Creates the form
$uclientes = new uclientes($application);

//Read from resource file
$uclientes->loadResource(__FILE__);

//Shows the form
$uclientes->show();

?>