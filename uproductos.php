<?php

include("dmconexion.php");
include("urecursos.php");

session_start();
 if(!isset($_SESSION["login"]))
   {
   redirect("login.php");
   }

require_once("vcl/vcl.inc.php");
//Includes
use_unit("clock.inc.php");
use_unit("mysql.inc.php");
use_unit("comctrls.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class uproductos extends Page
{
       public $btncopiar = null;
       public $chkactivo = null;
       public $edcomentario = null;
       public $Label32 = null;
       public $edsuspensiontrasera = null;
       public $edsuspensiondelantera = null;
       public $edtanque = null;
       public $edclavevehicular = null;
       public $edlargototal = null;
       public $edsistemadireccion = null;
       public $edfrenos = null;
       public $edllantas = null;
       public $edcamarote = null;
       public $edbastidor = null;
       public $edacondicionamiento = null;
       public $edejetrasero = null;
       public $edejedelantero = null;
       public $edembrague = null;
       public $edtorque = null;
       public $edtransmision = null;
       public $edmotor = null;
       public $edconfiguracion = null;
       public $edchasis = null;
       public $lbeliminar2 = null;
       public $lbeliminar1 = null;
       public $lbtitulo = null;
       public $lbadjunto2 = null;
       public $hfpath2 = null;
       public $cbmoneda = null;
       public $Label31 = null;
       public $hfdescripcion = null;
       public $cbcamiones = null;
       public $lbufh = null;
       public $hfpath = null;
       public $Label30 = null;
       public $lbadjunto = null;
       public $upload = null;
       public $btnupload = null;
       public $edfacturados = null;
       public $edapartados = null;
       public $edbackorder = null;
       public $edexistencias = null;
       public $Label29 = null;
       public $Label28 = null;
       public $Label27 = null;
       public $Label26 = null;
       public $pbotones = null;
       public $edproducto = null;
       public $Label25 = null;
       public $hfreturn = null;
       public $btnregresar = null;
       public $btnguardacierra = null;
       public $btnguardar = null;
       public $tbproductosdet = null;
       public $dsproductosdet = null;
       public $Label24 = null;
       public $Label23 = null;
       public $Label22 = null;
       public $Label21 = null;
       public $Label20 = null;
       public $Label19 = null;
       public $Label18 = null;
       public $Label17 = null;
       public $Label16 = null;
       public $Label15 = null;
       public $Label14 = null;
       public $Label13 = null;
       public $Label12 = null;
       public $Label11 = null;
       public $Label10 = null;
       public $Label9 = null;
       public $Label8 = null;
       public $Label7 = null;
       public $Label6 = null;
       public $Label5 = null;
       public $Label4 = null;
       public $Label3 = null;
       public $Label2 = null;
       public $PageControl = null;
       public $edpreciomin = null;
       public $edcosto = null;
       public $eddescripcion = null;
       public $edclave = null;
       public $cbtipos = null;
       public $tbproductos = null;
       public $dsproductos = null;
       public $Label1 = null;
       public $fdproductos10 = null;
       public $fdproductos9 = null;
       public $fdproductos8 = null;
       public $fdproductos7 = null;
       function btncopiarClick($sender, $params)
       {
         if($this->btnguardar->Tag != 1)
         {
            $this->btnguardar->Tag = 1;
            $this->tbproductos->close();
            $this->tbproductosdet->close();
            $this->tbproductos->open();
            $this->tbproductos->insert();
            $this->tbproductosdet->open();
            $this->tbproductosdet->insert();
            $sql = 'SELECT clave,descripcion,comentario,costo,preciominimo,moneda,idtipo,
                   existencias,backorder,apartados,facturados,activo,path,path2
                   FROM productos where idproducto='.$this->edproducto->Text;
            $rs = mysql_query($sql) or die("Error de Consulta SQL: ".$sql.' '.mysql_error());
            $row = mysql_fetch_array($rs);
            $this->edclave->Text = $row['clave'];
            $this->cbtipos->ItemIndex = $row['idtipo'];
            $this->eddescripcion->Text= $row['descripcion'];
				if($this->cbtipos->ItemIndex==1)
				{
				   $this->cbcamiones->Visible=true;
					if($this->eddescripcion->Text<>'Sin Clasificar')
					{
					   $cadena='select idtipo from camionestipos where nombre="'.$this->eddescripcion->Text.'"';
         			$r = mysql_query($cadena) or die(" error de consulta de SQL : ".$cadena);
						$id= mysql_fetch_row($r);
						$this->cbcamiones->ItemIndex= $id[0];
					}
					else
					   $this->cbcamiones->ItemIndex= 0;
				}
				else
				   $this->cbcamiones->Visible=false;
            $this->edcomentario->Text = $row['comentario'];
            $this->cbmoneda->ItemIndex = $row['moneda'];
            $this->edcosto->Text = $row['costo'];
            $this->edpreciomin->Text = $row['preciominimo'];
            $this->edexistencias->Text = $row['existencias'];
            $this->edbackorder->Text = $row['backorder'];
            $this->edapartados->Text = $row['apartados'];
            $this->edfacturados->Text = $row['facturados'];

            //adjuntos
            if(Derechos("Abrir ArchivoProductos"))
				{
				   $this->lbadjunto->Link = 'Adjuntos/'.$row['path'];
               $this->lbadjunto->Caption = $row['path'];
               $this->hfpath->Value = $row['path'];
               if($row['path']<>'')
                  $this->lbeliminar1->Caption='Eliminar';
               $this->lbadjunto2->Link = 'Adjuntos/'.$row['path2'];
               $this->lbadjunto2->Caption = $row['path2'];
               $this->hfpath2->Value = $row['path2'];
               if($row['path2']<>'')
                  $this->lbeliminar2->Caption = 'Eliminar';
				}

            $sql = 'SELECT idproducto,chasis,acondicionamiento,bastidor,camarote,clavevehicular,transmision,
                   configuracion,ejedelantero,ejetrasero,embrage,frenos,largototal,llantas,motor,
                   sistemadireccion,suspensiondelantera,suspensiontrasera,tanquescombustible,torque
                   FROM productosdet where idproducto='.$this->edproducto->Text;
            $rs = mysql_query($sql) or die("Error de Consulta SQL: ".$sql.' '.mysql_error());
            $row = mysql_fetch_array($rs);
            $this->edchasis->Text = $row['chasis'];
            $this->edconfiguracion->Text = $row['configuracion'];
            $this->edmotor->Text = $row['motor'];
            $this->edtransmision->Text = $row['transmision'];
            $this->edtorque->Text = $row['torque'];
            $this->edembrague->Text = $row['embrage'];
            $this->edejetrasero->Text = $row['ejetrasero'];
            $this->edejedelantero->Text = $row['ejedelantero'];
            $this->edsuspensiontrasera->Text = $row['suspensiontrasera'];
            $this->edsuspensiondelantera->Text = $row['suspensiondelantera'];
            $this->edbastidor->Text = $row['bastidor'];
            $this->edacondicionamiento->Text = $row['acondicionamiento'];
            $this->edcamarote->Text = $row['camarote'];
            $this->edllantas->Text = $row['llantas'];
            $this->edfrenos->Text = $row['frenos'];
            $this->edsistemadireccion->Text = $row['sistemadireccion'];
            $this->edlargototal->Text = $row['largototal'];
            $this->edtanque->Text = $row['tanquescombustible'];
            $this->edclavevehicular->Text = $row['clavevehicular'];
            $this->edproducto->Text = MaxId('productos','idproducto')+1;
         }
         else
            echo '<script language="javascript" type="text/javascript">
                  alert("No has seleccionado ningun producto");
                  </script>';
       }

       function edcomentarioJSKeyPress($sender, $params)
       {

       ?>
       //Add your javascript code here
        if(event.keyCode==13)
            {
               var edit=findObj('edcosto');
               edit.focus();
            }
       <?php

       }

       function lbeliminar2Click($sender, $params)
       {
         if(Derechos('Eliminar Archivoproductos') == false)
         {
            echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Eliminar el Archivo");
               window.location="uproductos.php";
               </script>';
         }
         else
         {
            unlink('Adjuntos/'.$this->lbadjunto2->Caption);
            $this->hfpath2->Value='';
            $sql=' update productos set path2="'.$this->hfpath2->Value.
              '" where idproducto ='.$this->edproducto->Text;
            $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
            $this->lbadjunto2->Caption='';
            $this->lbeliminar2->Caption='';
         }
       }

       function lbeliminar1Click($sender, $params)
       {
         if(Derechos('Eliminar Archivoproductos') == false)
         {
            echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Eliminar el Archivo");
               window.location="uproductos.php";
               </script>';
         }
         else
         {
            unlink('Adjuntos/'.$this->lbadjunto->Caption);
            $this->hfpath->Value='';
            $sql=' update productos set path="'.$this->hfpath->Value.
              '" where idproducto ='.$this->edproducto->Text;
            $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
            $this->lbadjunto->Caption='';
            $this->lbeliminar1->Caption='';
         }
       }

       function edfacturadosJSKeyPress($sender, $params)
       {

       ?>
       //Add your javascript code here
          if(event.keyCode<48 || event.keyCode>57)
         {
            alert('No es un valor numerico');
            return false;
         }
       <?php
       }


       function cbtiposChange($sender, $params)
       {
         if($this->cbtipos->ItemIndex==1)
            $this->cbcamiones->Visible=true;
         else
			{
            $this->cbcamiones->Visible=false;
				$this->eddescripcion->Text='';
			}
       }

       function cbcamionesChange($sender, $params)
       {
        $this->eddescripcion->Text=$this->cbcamiones->Items[$this->cbcamiones->ItemIndex];

       }

       function edtanqueJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edclavevehicular');
               edit.focus();
            }
       <?php
       }

       function edlargototalJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edtanque');
               edit.focus();
            }
       <?php
       }

       function edacondicionamientoJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edlargototal');
               edit.focus();
            }
       <?php
       }

       function edsistemadireccionJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edacondicionamiento');
               edit.focus();
            }
       <?php
       }

       function edfrenosJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edsistemadireccion');
               edit.focus();
            }
       <?php
       }

       function edllantasJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edfrenos');
               edit.focus();
            }
       <?php
       }

       function edcamaroteJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edllantas');
               edit.focus();
            }
       <?php
       }

       function edbastidorJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edcamarote');
               edit.focus();
            }
       <?php
       }

       function edsuspensiontraseraJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edbastidor');
               edit.focus();
            }
       <?php
       }


       function edsuspensiondelanteraJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edsuspensiontrasera');
               edit.focus();
            }
       <?php
       }

       function edejetraseroJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edsuspensiondelantera');
               edit.focus();
            }
       <?php
       }

       function edejedelanteroJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edejetrasero');
               edit.focus();
            }
       <?php
       }

       function edembragueJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edejedelantero');
               edit.focus();
            }
       <?php
       }

       function edtorqueJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edembrague');
               edit.focus();
            }
       <?php
       }

       function edtransmisionJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edtorque');
               edit.focus();
            }
       <?php
       }

       function edmotorJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edtransmision');
               edit.focus();
            }
       <?php
       }

       function edconfiguracionJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
             if(event.keyCode==13)
            {
               var edit=findObj('edmotor');
               edit.focus();
            }
       <?php
       }

       function edchasisJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
				if(event.keyCode==13)
            {
               var edit=findObj('edconfiguracion');
               edit.focus();
            }
       <?php
       }

       function edapartadosJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
       if(event.keyCode<48 || event.keyCode>57)
         {

            if(event.keyCode==13)
            {
               var edit=findObj('edfacturados');
               edit.focus();
            }
            else
            {
               alert('No es un valor numerico');
               return false;
            }
         }

       <?php
       }

       function edbackorderJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
       if(event.keyCode<48 || event.keyCode>57)
         {
            if(event.keyCode==13)
            {
               var edit=findObj('edapartados');
               edit.focus();
            }
            else
            {
               alert('No es un valor numerico');
               return false;
            }
         }

       <?php
       }

       function edexistenciasJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
         if(event.keyCode<48 || event.keyCode>57)
         {
            if(event.keyCode==13)
            {
               var edit=findObj('edbackorder');
               edit.focus();
            }
            else
            {
               alert('No es un valor numerico');
               return false;
            }
         }

       <?php
       }

       function edpreciominJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
         if((event.keyCode<48 || event.keyCode>57)&& event.keyCode!=46)
         {
            if(event.keyCode==13)
            {
               var edit=findObj('edexistencias');
               edit.focus();
            }
            else
            {
               alert('No es un valor numerico');
               return false;
            }
         }


       <?php
       }

       function edcostoJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
         if((event.keyCode<48 || event.keyCode>57)&& event.keyCode!=46)
         {
            if(event.keyCode==13)
            {
               var edit=findObj('edpreciomin');
               edit.focus();
            }
            else
            {
               alert('No es un valor numerico');
               return false;
            }
         }

       <?php

       }

       function eddescripcionJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
           if(event.keyCode==13)
            {
               var edit=findObj('edcosto');
               edit.focus();
            }
       <?php

       }

       function cbtiposJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
           if(event.keyCode==13)
            {
               var edit=findObj('eddescripcion');
               edit.focus();
            }
       <?php

       }

       function edclaveJSKeyPress($sender, $params)
       {
       ?>
       //Add your javascript code here
            if(event.keyCode==13)
            {
               var edit=findObj('cbtipos');
               edit.focus();
            }
       <?php
       }

       function btnuploadClick($sender, $params)
       {
         $path = GetConfiguraciones('Pathadjuntos');

         if ((($_FILES["upload"]["type"] == "image/gif")
               || ($_FILES["upload"]["type"] == "image/jpeg")
               || ($_FILES["upload"]["type"] == "image/pjpeg")
               || ($_FILES["upload"]["type"] == "application/pdf")
               || ($_FILES["upload"]["type"] == "application/vnd.ms-excel")
               || ($_FILES["upload"]["type"] == "application/msword"))
               && ($_FILES["upload"]["size"] < 20485760)) //10 megas
         {
            if ($_FILES["upload"]["error"] > 0)
            {
               echo '<script language="javascript" type="text/javascript">
                       alert(\'Error al subir Archivo: ' .$_FILES["upload"]["error"]  .'\');
                     </script>';
            }
            else
            {
              /* echo '<script language="javascript" type="text/javascript">
                       alert(\'Upload ' . $_FILES["upload"]["name"]  .'\');
                       alert(\'Type ' . $_FILES["upload"]["type"]  .'\');
                       alert(\'Size ' . $_FILES["upload"]["size"]  .'\');
                       alert(\'Temp file ' . $_FILES["upload"]["tmp_name"]  .'\');
                     </script>';
               */
               if (file_exists($path. $_FILES["upload"]["name"]))
               {
                  echo '<script language="javascript" type="text/javascript">
                          alert(\' El Archivo ya existe: ' .$_FILES["upload"]["name"]  .'\');
                        </script>';
               }
               else
               {
                  if($this->lbadjunto->Caption=='')
                  {
                     move_uploaded_file($_FILES["upload"]["tmp_name"],
                     $_SERVER[ 'DOCUMENT_ROOT' ] . $path .replace($_FILES["upload"]["name"]));
                     echo '<script language="javascript" type="text/javascript">
                          alert(\'Archivo Guardado: ' .replace($_FILES["upload"]["name"]).'\');
                        </script>';
                     $this->lbadjunto->Caption=replace($_FILES["upload"]["name"]);
                     $this->lbadjunto->Link="Adjuntos/".replace($_FILES["upload"]["name"]);
                     $this->hfpath->Value=replace($_FILES['upload']['name']);
                     $sql=' update productos set path="'.$this->hfpath->Value.
                          '" where idproducto ='.$this->edproducto->Text;
                     $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
                     $this->lbeliminar1->Caption='Eliminar';
                  }
                  else if($this->lbadjunto2->Caption=='')
                  {

                     move_uploaded_file($_FILES["upload"]["tmp_name"],
                      $_SERVER[ 'DOCUMENT_ROOT' ]. $path .replace($_FILES["upload"]["name"]));
                     echo '<script language="javascript" type="text/javascript">
                          alert(\'Archivo Guardado: ' .replace($_FILES["upload"]["name"])  .'\');
                        </script>';
                     $this->lbadjunto2->Caption=replace($_FILES["upload"]["name"]);
                     $this->lbadjunto2->Link="Adjuntos/".replace($_FILES["upload"]["name"]);
                     $this->hfpath2->Value=replace($_FILES['upload']['name']);
                     $sql=' update productos set path2="'.$this->hfpath2->Value.
                          '" where idproducto ='.$this->edproducto->Text;
                     $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
                     $this->lbeliminar2->Caption='Eliminar';
                  }
                  else
                     echo '<script language="javascript" type="text/javascript">
                             alert(\'Ya no puedes agregar otro Archivo \');
                           </script>';
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

       function btnregresarClick($sender, $params)
       {
         redirect('uproductosvista.php');
       }

       function btnguardacierraClick($sender, $params)
       {
         $this->guardar();
         redirect('uproductosvista.php');
       }



       function btnguardarClick($sender, $params)
       {
         $this->guardar();
       }

       function guardar()
       {
          try
          {
            if(Derechos('Modificar Productos') == false)
            {
               echo '<script language="javascript" type="text/javascript">
               alert("No Tienes Derechos para Modificar Productos");
               window.location="uproductosvista.php";
               </script>';
            }
            else
            {
               if($this->btnguardar->Tag==1)
               {
                  //alta
                  $this->tbproductos->fieldset('idproducto',$this->edproducto->Text);
                  $this->tbproductosdet->fieldset('idproducto',$this->edproducto->Text);
               }

               $this->tbproductos->fieldset('descripcion',$this->eddescripcion->Text);
               $this->tbproductos->fieldset('idtipo',$this->cbtipos->ItemIndex);
               $this->tbproductos->fieldset('moneda',$this->cbmoneda->ItemIndex);
               $this->tbproductos->fieldset('usuario',$_SESSION['login']);
               $this->tbproductos->fieldset('fecha',date('Y/m/d'));
               $this->tbproductos->fieldset('hora',date('h:i:s'));
               $this->tbproductos->fieldset('path',$this->hfpath->Value);
               $this->tbproductos->fieldset('path2',$this->hfpath2->Value);
               $this->tbproductos->post();
					$this->guardardetalle();
               //si son chasis
               //if($this->cbtipos->ItemIndex==1)
                  //$this->tbproductosdet->post();
            }
          }
          catch(Exception $e)
          {
               trigger_error( $e->getMessage(), E_USER_ERROR );
          }
       }

		 function guardardetalle()
		 {
			 $this->tbproductosdet->fieldset('chasis',$this->edchasis->Text);
			 $this->tbproductosdet->fieldset('configuracion',$this->edconfiguracion->Text);
			 $this->tbproductosdet->fieldset('motor',$this->edmotor->Text);
			 $this->tbproductosdet->fieldset('transmision',$this->edtransmision->Text);
			 $this->tbproductosdet->fieldset('torque',$this->edtorque->Text);
			 $this->tbproductosdet->fieldset('embrage',$this->edembrague->Text);
			 $this->tbproductosdet->fieldset('ejedelantero',$this->edejedelantero->Text);
			 $this->tbproductosdet->fieldset('ejetrasero',$this->edejetrasero->Text);
			 $this->tbproductosdet->fieldset('suspensiontrasera',$this->edsuspensiontrasera->Text);
			 $this->tbproductosdet->fieldset('suspensiondelantera',$this->edsuspensiondelantera->Text);
			 $this->tbproductosdet->fieldset('bastidor',$this->edbastidor->Text);
		 	 $this->tbproductosdet->fieldset('camarote',$this->edcamarote->Text);
			 $this->tbproductosdet->fieldset('llantas',$this->edllantas->Text);
			 $this->tbproductosdet->fieldset('frenos',$this->edfrenos->Text);
			 $this->tbproductosdet->fieldset('sistemadireccion',$this->edsistemadireccion->Text);
			 $this->tbproductosdet->fieldset('acondicionamiento',$this->edacondicionamiento->Text);
			 $this->tbproductosdet->fieldset('largototal',$this->edlargototal->Text);
			 $this->tbproductosdet->fieldset('tanquescombustible',$this->edtanque->Text);
			 $this->tbproductosdet->fieldset('clavevehicular',$this->edclavevehicular->Text);

			 $this->tbproductosdet->post();
		 }

		 function cargardetalle()
		 {
		 	$this->edchasis->Text= $this->tbproductosdet->fieldget('chasis');
			$this->edconfiguracion->Text= $this->tbproductosdet->fieldget('configuracion');
			$this->edmotor->Text= $this->tbproductosdet->fieldget('motor');
			$this->edtransmision->Text= $this->tbproductosdet->fieldget('transmision');
			$this->edtorque->Text= $this->tbproductosdet->fieldget('torque');
			$this->edembrague->Text= $this->tbproductosdet->fieldget('embrage');
			$this->edejedelantero->Text= $this->tbproductosdet->fieldget('ejedelantero');
			$this->edejetrasero->Text= $this->tbproductosdet->fieldget('ejetrasero');
			$this->edsuspensiontrasera->Text= $this->tbproductosdet->fieldget('suspensiontrasera');
			$this->edsuspensiondelantera->Text= $this->tbproductosdet->fieldget('suspensiondelantera');
			$this->edbastidor->Text= $this->tbproductosdet->fieldget('bastidor');
			$this->edcamarote->Text= $this->tbproductosdet->fieldget('camarote');
			$this->edllantas->Text= $this->tbproductosdet->fieldget('llantas');
			$this->edfrenos->Text= $this->tbproductosdet->fieldget('frenos');
			$this->edsistemadireccion->Text= $this->tbproductosdet->fieldget('sistemadireccion');
			$this->edacondicionamiento->Text= $this->tbproductosdet->fieldget('acondicionamiento');
			$this->edlargototal->Text= $this->tbproductosdet->fieldget('largototal');
			$this->edtanque->Text= $this->tbproductosdet->fieldget('tanquescombustible');
			$this->edclavevehicular->Text= $this->tbproductosdet->fieldget('clavevehicular');
		 }



       function inicializa()
       {
         //llenar tiposproductos
         $cadena='select idtipo,nombre from productostipos ';
         $rs = mysql_query($cadena) or die(" error de consulta de SQL : ".$cadena);
         while($row=mysql_fetch_array($rs))
         {
               $this->cbtipos->AddItem($row['nombre'],null,$row['idtipo']);
         }
         mysql_free_result($rs);

         //llenar tiposcamiones
			$this->cbcamiones->Clear();
         $cadena='select idtipo,nombre from camionestipos ';
         $rs = mysql_query($cadena) or die(" error de consulta de SQL : ".$cadena);
			$this->cbcamiones->AddItem('Sin Clasificar',null,0);
         while($row=mysql_fetch_array($rs))
               $this->cbcamiones->AddItem($row['nombre'],null,$row['idtipo']);


         //moneda
         $cadena='select idmoneda,moneda from monedas ';
         $rs = mysql_query($cadena) or die(" error de consulta de SQL : ".$cadena);
         while($row=mysql_fetch_array($rs))
         {
               $this->cbmoneda->AddItem($row['moneda'],null,$row['idmoneda']);
         }

         $this->PageControl->TabIndex=0;
       }

       function uproductosShow($sender, $params)
       {
         $this->pbotones->Width = $_SESSION["width"];
         $this->lbtitulo->Caption= $this->Caption;
         $this->inicializa();
         if(isset($_GET['idproducto']))
         {
            //ALTA
            //trae el max id
            if($_GET['idproducto']==0)
            {
               $this->Limpiar();
					$this->eddescripcion->Text='Sin Clasificar';
					$this->cbcamiones->ItemIndex=0;
               $sql='select max(idproducto)+1 as id from productos';
               $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
               $row=mysql_fetch_row($rs);
               $this->btnguardar->Tag=1;
               $this->tbproductos->open();
               $this->tbproductos->append();
               $this->edproducto->Text= $row[0];
					$this->hfpath->Value='';
					$this->hfpath2->Value='';
					$this->tbproductosdet->open();
               $this->tbproductosdet->append();
            }
            else
            {
                // MODIFICACION
                $this->Limpiar();
                $this->cbtipos->ItemIndex=$this->tbproductos->fieldget('idtipo');
                $this->btnguardar->Tag=2;
                $this->tbproductos->close();
                $this->tbproductos->writeFilter(" idproducto=".$_GET["idproducto"]);
                $this->tbproductos->refresh();
                $this->tbproductos->open();
                $this->edproducto->text= $this->tbproductos->fieldget('idproducto');
                $this->cbtipos->ItemIndex= $this->tbproductos->fieldget('idtipo');
                $this->eddescripcion->Text= $this->tbproductos->fieldget('descripcion');
					 if($this->cbtipos->ItemIndex==1)
					 {
					 	$this->cbcamiones->Visible=true;
						if($this->eddescripcion->Text<>'Sin Clasificar')
						{
						 	$cadena='select idtipo from camionestipos where nombre="'.$this->eddescripcion->Text.'"';
         			 	$rs = mysql_query($cadena) or die(" error de consulta de SQL : ".$cadena);
						 	$row= mysql_fetch_row($rs);
						 	$this->cbcamiones->ItemIndex= $row[0];
						}
						else
							$this->cbcamiones->ItemIndex= 0;
					 }
					 else
					    $this->cbcamiones->Visible=false;
                $this->cbmoneda->ItemIndex= $this->tbproductos->fieldget('moneda');
                //adjunto
                if(Derechos("Abrir ArchivoProductos"))
					 {
					 	$this->lbadjunto->Link= 'Adjuntos/'.$this->tbproductos->fieldget('path');
                	$this->lbadjunto->Caption=$this->tbproductos->fieldget('path');
                	$this->hfpath->Value=$this->tbproductos->fieldget('path');
                	if($this->tbproductos->fieldget('path')<>'')
                  	$this->lbeliminar1->Caption='Eliminar';
                	$this->lbadjunto2->Link= 'Adjuntos/'.$this->tbproductos->fieldget('path2');
                	$this->lbadjunto2->Caption=$this->tbproductos->fieldget('path2');
                	$this->hfpath2->Value=$this->tbproductos->fieldget('path2');
                	if($this->tbproductos->fieldget('path2')<>'')
                  	$this->lbeliminar2->Caption='Eliminar';
					}
                //usuario fecha hora
                $r = ufh('a');
                $sql= 'select '.$r.' as ufh from productos a '.
                ' where idproducto='.$this->edproducto->Text;
                $rs= mysql_query($sql) or die('Error de SQL: '.$sql);
                $row= mysql_fetch_row($rs);
                $this->lbufh->Caption = $row[0];

                $this->tbproductos->edit();
                //detalle
                $this->tbproductosdet->close();
                $this->tbproductosdet->writeFilter(" idproducto=".$_GET["idproducto"]);
                $this->tbproductosdet->refresh();
                $this->tbproductosdet->open();
                $this->tbproductosdet->edit();
					 $this->cargardetalle();

                //eliminar
               if(isset($_GET['elim']))
               {
                  if(Derechos('Eliminar Productos') == false)
                  {
                     echo '<script language="javascript" type="text/javascript">
                        alert("No Tienes el Derechos para Eliminar Productos");
                        window.location="uproductosvista.php";
								</script>';
                  }
                  else
                  {
                     $sql ='select o.modelo from ofertas o left join productos p on o.modelo=p.clave
                            where p.idproducto="'.$this->edproducto->Text.'"';
                     $rs = mysql_query($sql) or die("Error de Consulta SQL: ".$sql);
                     if(mysql_num_rows($rs)>0)
                     {
                        echo '<script language="javascript" type="text/javascript">
                              alert("El producto esta ligado a una Oferta, por lo tanto no se puede borrar!");
                              window.location="uproductosvista.php";
                              </script>';
                     }
                     else
                     {
                        $rs=mysql_query('select idproducto from productosdet where '.$this->edproducto->Text);
                        $row=mysql_fetch_row($rs);
                        if($row>0)
                        {
                           $rs=mysql_query('delete from productosdet where idproducto='.
                           $this->edproducto->Text);
                        }
                        $rs=mysql_query('delete from productos where idproducto='.$this->edproducto->Text)
                            or die ('Error Al Eliminar Registro ');
                        dmconexion::Log("Elimino el Producto No. ".$this->edproducto->Text.
                                        " con la Clave: ".$this->edclave->Text,3);
                     }
                     echo '<script language="javascript" type="text/javascript">
                              window.location="uproductosvista.php";
                              </script>';
                     //redirect("uproductosvista.php");
                  }
               }
            }
         }
       }

       function Limpiar()
       {
         reset($this->PageControl->controls->items);
         while(list($key, $val)=each($this->PageControl->controls->items))
         {
            if ($val->inheritsFrom("Edit"))
            {
               $val->Text="";
            }
         }
         $this->lbufh->Caption = '';
         $this->lbadjunto->Caption='';
         $this->lbadjunto->Link='';
			$this->lbadjunto2->Caption='';
         $this->lbadjunto2->Link='';
         $this->lbeliminar1->Caption='';
         $this->lbeliminar2->Caption='';
       }


}

global $application;

global $uproductos;

//Creates the form
$uproductos=new uproductos($application);

//Read from resource file
$uproductos->loadResource(__FILE__);

//Shows the form
$uproductos->show();

?>