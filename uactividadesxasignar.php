<?php
//ozkar 2010-01-20 se agregaron los estatus de la actividad


include("dmconexion.php");
session_start();
if(!isset($_SESSION["login"]))
{
   redirect("login.php");
}
require_once("vcl/vcl.inc.php");
//Includes
require_once("urecursos.php");
use_unit("mysql.inc.php");
use_unit("db.inc.php");
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class uactividadesxasignar extends Page
{
       public $cbasesor = null;
       public $edvin = null;
       public $lbvin = null;
       public $dtactividad = null;
       public $cboestatus = null;
       public $cbfin = null;
       public $cbinicio = null;
       public $Label7 = null;
       public $Label5 = null;
       public $lbufh = null;
       public $lblnotas = null;
       public $Label8 = null;
       public $mvalidacion = null;
       public $Label10 = null;
       public $Label9 = null;
       public $Label4 = null;
       public $mdescripcion = null;
       public $btnbuscar = null;
       public $edcliente = null;
       public $edvendedor = null;
       public $cbasunto = null;
       public $Label1 = null;
       public $Label2 = null;
       public $Label6 = null;
       public $Label3 = null;
       public $hfidcliente = null;
       public $hfidactividad = null;
       public $hfidnota = null;
       public $sqlnotas = null;
       public $lbtitulo = null;
       public $pbotones = null;
       public $tbactividades = null;
       public $dsactividades = null;
       public $btncerrar = null;
       public $btnguardarcerrar = null;
       public $btnguardar = null;




       function cbasuntoJSChange($sender, $params)
       {

       ?>
       //Añada su código javascript aquí
       if(vcl.$("cbasunto").value == 5)
       {
          //vcl.$("edvin").disabled = false;
       }
       else
       {
         //alert("entrar");
         //vcl.$("edvin").disabled = true;
       }

       <?php

       }

       function lblnotasClick($sender, $params)
       {
       	if($this->btnguardar->Tag==1)
			{
			 	echo '<script language="javascript" type="text/javascript">
            	alert(\'No se ha registrado la Actividad, Guarde primero y despues Accese a Notas\');
          		</script>';
			}
			else
			{
				dmconexion::Log("Acceso a las notas de Actividades por Asignar".$this->edcliente->Text." ".$this->edcliente->Tag, 1);
       		redirect("unotas.php?idnota=".$this->hfidnota->Value."&procedencia=actividadesxasignar".
                "&idprocedencia=".$this->hfidactividad->Value);
			}
       }

       function btnbuscarClick($sender, $params)
       {
         redirect("uclientesvista.php?pagina=uactividadesxasignar.php");
       }

       function btnguardarcerrarClick($sender, $params)
       {
         if($this->Validar() != false)
         {
            $this->guardar();
            redirect('uactividadesxasignarvista.php');
         }
       }

       function btnguardarClick($sender, $params)
       {
         if($this->Validar() != false)
            $this->guardar();
       }

       function guardar()
       {
         $ban=false;
         //alta
			if($this->btnguardar->tag=='1')
         {
            $this->tbactividades->open();
            $this->tbactividades->insert();
            $this->hfidactividad->Value = MaxId('actividadesasignar', 'idactividadasignar')+1;
            $this->tbactividades->fieldset("idactividadasignar", $this->hfidactividad->Value);
            $this->tbactividades->fieldset('fechacreacion',Date('Y/m/d'));
            $this->btnguardar->tag=2;
            $msg = "Creo la Actividad por Asignar No. ".$this->hfidactividad->Value;
            $nivel = 1;
            $ban=true;
				//insertar nota al cliente de una nueva actividad
				$sql='select idnota from clientes where idcliente='.$this->edcliente->Tag;
				$rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
				$row=mysql_fetch_row($rs);
				$idnota=$row[0];
				if($row[0]==0)
				{
					$idnota = MaxId('notas', 'idnota')+1;
               $sql = "Update clientes set idnota=".$idnota." where idcliente = ".$this->edcliente->Tag;
               $result = mysql_query($sql) or die("error sql: ".$sql." ".mysql_error());
					$sql = "Insert into notas (idnota,idprocedencia, procedencia, usuario, fecha, hora) ".
                      "values (".$idnota.",".$this->edcliente->Tag.",'Clientes','".
					$_SESSION['login']."', "."curdate(), curtime())";
            	$result = mysql_query($sql) or die("error sql: ".$sql." ".mysql_error());
				}
            $this->hfidnota->value = $idnota;
				$nota='Actividad: '.$this->cbasunto->Items[$this->cbasunto->ItemIndex].' Fecha: '.$this->dtactividad->Text.' '.
							$this->cbinicio->Items[$this->cbinicio->ItemIndex].'-'.
							$this->cbfin->Items[$this->cbfin->ItemIndex].' '.substr($this->mdescripcion->Text,0,120);
				$sql = "Insert into notasdet (idnota, nota, usuario, fecha, hora) ".
                   "values (".$idnota.", '".$nota."', ".
                   "'".$_SESSION['login']."', "."curdate(), curtime())";
            $result = mysql_query($sql) or die("error sql: ".$sql." ".mysql_error());

             //Enviar correo de aviso al asesor
            $msn = 'Se le asignó la siguiente ' . $nota;
            $sql = 'select email from usuarios where idusuario=' . $this->cbasesor->ItemIndex;
            $rs = mysql_query($sql)or die('Error de Consulta SQL: ' . $sql.' '.mysql_error());
            $row = mysql_fetch_row($rs);
            $correos = $row[0];
            enviarmailattach('CRM@ibc.com.mx', 'Sistema de CRM', $correos, 'Varios', 'AVISO DE ACTIVIDAD ASIGNADA', $msn, '', '');

         }
         else   //modificacion
         {
				$b=true;
            if(Derechos('EDACTIVXASIG') == false)
					$b=false;
				if(Derechos('VALACTIVXASIG'))
					$b=true;

				if($b==false)
				{
					echo '<script language="javascript" type="text/javascript">
               alert("No puede Modificar Actividades por Asignar");
               window.location="uactividadesxasignar.php?idactividad='.$this->hfidactividad->Value.'";
               </script>';
				}
				else
				{
               $this->tbactividades->close();
               $this->tbactividades->writeFilter('idactividadasignar="'.$this->hfidactividad->Value.'"');
               $this->tbactividades->refresh();
               $this->tbactividades->open();
               $this->tbactividades->Edit();
               $msg = "Edito la Actividad No. ".$this->hfidactividad->Value;
               $nivel = 2;
               $ban=true;
            }
         }
         if($ban)
         {
            $this->tbactividades->fieldset('idcliente',$this->edcliente->Tag);
            $this->tbactividades->fieldset('idvendedor',$this->cbasesor->ItemIndex);
            $this->tbactividades->fieldset('idasunto',$this->cbasunto->ItemIndex);
            $this->tbactividades->fieldset('vin',$this->edvin->Text);
            $this->tbactividades->fieldset('idnota',$this->hfidnota->Value);
				$this->tbactividades->fieldset('descripcion',$this->mdescripcion->Text);
				$this->tbactividades->fieldset('notavalidacion',$this->mvalidacion->Text);
            $this->tbactividades->fieldset('fechaactividad',$this->dtactividad->Text);
            $this->tbactividades->fieldset('horainicio',$this->cbinicio->ItemIndex);
            $this->tbactividades->fieldset('horafin',$this->cbfin->ItemIndex);
				$this->tbactividades->fieldset('idestatus',$this->cboestatus->ItemIndex);
            $this->tbactividades->fieldset("usuario", $_SESSION["login"]);
            $this->tbactividades->fieldset("fecha", date("Y/n/j"));
            $this->tbactividades->fieldset("hora", date("H:i:s"));
            $this->tbactividades->post();
            $this->tbactividades->Active = false;
            dmconexion::Log($msg,$nivel);
         }
       }

       function btncerrarClick($sender, $params)
       {
         redirect('uactividadvista.php');
         $this->lbtitulo->Caption= $this->Caption;
       }

       function Validar()
       {
         if($this->edcliente->Text == '')
         {
             echo '<script language="javascript" type="text/javascript">
             alert("Falta el cliente");
             </script>';
             return false;
         }

         if($this->cbasunto->ItemIndex == -1)
         {
             echo '<script language="javascript" type="text/javascript">
             alert("Falta el asunto");
             </script>';
             return false;
         }

         if($this->cbasunto->ItemIndex == 5 && $this->edvin->Text == '')
         {
             echo '<script language="javascript" type="text/javascript">
             alert("Falta el VIN de la demostración");
             </script>';
             return false;
         }

         if($this->mdescripcion->Text == '')
         {
             echo '<script language="javascript" type="text/javascript">
             alert("Falta la descripcion");
             </script>';
             return false;
         }
         return true;
       }

       function Limpiar()
       {
         reset($this->controls->items);
         while(list($key, $val)=each($this->controls->items))
         {
            if ($val->inheritsFrom("Edit"))
            {
               $val->Text="";
            }
            if ($val->inheritsFrom("ComboBox"))
            {
               $val->ItemIndex = -1;
            }
         }
         $this->lbufh->Caption = '';
         $this->mdescripcion->Text = '';
			$this->mvalidacion->text= '';
			$this->lblnotas->caption='';
       }

       function inicializa()
       {
         //llenar combo asuntos
         $this->cbasunto->clear();
         $this->cbasunto->AddItem("Sin Clasificar",null,-1);
         $cadena='select idasunto,nombre from actividadesasuntos ';
         $rs = mysql_query($cadena) or die(" error de consulta de SQL : ".$cadena);
         while($row=mysql_fetch_array($rs))
         {
            $this->cbasunto->AddItem($row['nombre'],null,$row['idasunto']);

         }
         //$this->edvin->Enabled = false;

         mysql_free_result($rs);

         //llenar combo horas
         $this->cbinicio->Clear();
         $this->cbfin->Clear();
         $cadena='select idclasificacion,nombre from clasificaciones where idtipo=2 ';
         $rs = mysql_query($cadena) or die(" error de consulta de SQL : ".$cadena);
         while($row=mysql_fetch_array($rs))
         {
            $this->cbinicio->AddItem($row['nombre'],null,$row['nombre']);
            $this->cbfin->AddItem($row['nombre'],null,$row['nombre']);
         }
         mysql_free_result($rs);

			//llenar combo estatus
			$this->cboestatus->Clear();
			$cadena='select idclasificacion,nombre from clasificaciones where idtipo=14 ';
         $rs = mysql_query($cadena) or die(" error de consulta de SQL : ".$cadena);
         while($row=mysql_fetch_array($rs))
            $this->cboestatus->AddItem($row['nombre'],null,$row['idclasificacion']);
			$this->cboestatus->ItemIndex=87;
         mysql_free_result($rs);

         //fechainicio
         $this->dtactividad->IfFormat="%Y-%m-%d";
         $this->dtactividad->Text= date("Y-m-d");

         //promotores
         $this->cbasesor->Clear();
         $sql = 'select idusuario,concat(u.nombre," ",u.apaterno," ",u.amaterno) as promotor
					from usuarios u where idpuesto = 24';
         $rs = mysql_query($sql)or die('Error SQL: ' . $sql);
         $this->cbasesor->AddItem('Sin Asignar', null , 0);
         while($row = mysql_fetch_array($rs))
            $this->cbasesor->AddItem($row['promotor'], null , $row['idusuario']);

         //$this->edvendedor->tag= $row[0];
         if(Derechos('EDACTIVXASIG') == false)
         {
				$this->habilitar(false);
         }
			else
				$this->habilitar(true);

       }

		 function habilitar($ban)
		 {
		 	$this->btnbuscar->Enabled=$ban;
			$this->cbasunto->Enabled=$ban;
			$this->cbfin->Enabled=$ban;
			$this->cbinicio->Enabled=$ban;
			$this->mdescripcion->ReadOnly=!$ban;
			$this->mvalidacion->ReadOnly=!$ban;
			$this->dtactividad->Enabled=$ban;
         $this->cboestatus->Enabled=$ban;
         if(Derechos('TODACTIVXASIG'))
			   $this->cbasesor->Enabled= true;
         else
            $this->cbasesor->Enabled= false;

			//$this->lblnotas->Enabled=$ban;
		 }

       function uactividadesxasignarShow($sender, $params)
       {
         $this->pbotones->Width = $_SESSION["width"];
         $this->lbtitulo->Caption= $this->Caption;
         if($this->cbasunto->ItemIndex == 5)
         {
            $this->lbvin->Enabled = true;
         }

         if(isset($_GET["idcliente"]))
         {
            $nom = NombreMoral('c');
            $sql='Select '.$nom.' as nombre,idcliente,email from clientes c '.
                  'where idcliente ='.$_GET['idcliente'];
            $rs=mysql_query($sql) or die ('Error de SQL :'.$sql);
            $row=mysql_fetch_row($rs);
            $this->edcliente->Text= $row[0];
            $this->edcliente->Tag= $row[1];
         }
         else if(isset($_GET["idactividad"]))
         {
            //nuevo registro
            if($_GET["idactividad"]==0)
            {
               $this->Limpiar();
               $this->inicializa();
					$this->habilitar(true);
               $this->cbasesor->ItemIndex = $_SESSION['idusuario'];
					$this->cboestatus->Enabled=false;
					$this->mvalidacion->ReadOnly= true;
               $this->btnguardar->Tag=1;
               $this->lblnotas->Caption='Notas';
					$this->hfidnota->value=0;
            }
            else
            {
               //modificacion
               $this->Limpiar();
               $this->inicializa();
               $this->btnguardar->Tag=2;
               $this->tbactividades->close();
               $this->tbactividades->writeFilter('idactividadasignar=' . $_GET["idactividad"]);
               $this->tbactividades->refresh();
               $this->tbactividades->open();

               $this->hfidactividad->Value= $_GET['idactividad'];
               //traer cliente
               $nom = NombreMoral('c');
               $sql='Select idcliente,'.$nom.' as nombre from clientes c '.
                    'where idcliente ='.$this->tbactividades->fieldget('idcliente');
               $rs = mysql_query($sql) or die(" error de consulta de SQL : ".$sql);
               $row=mysql_fetch_row($rs);
               $this->edcliente->Text=$row[1];
               $this->edcliente->Tag=$row[0];
               $this->cbasunto->ItemIndex= $this->tbactividades->fieldget("idasunto");
               $this->cbasesor->ItemIndex= $this->tbactividades->fieldget('idvendedor');
               $this->cbinicio->ItemIndex= $this->edvendedor->Text= $this->tbactividades->fieldget('horainicio');
               $this->cbfin->ItemIndex= $this->tbactividades->fieldget('horafin');
               $this->edvin->Text= $this->tbactividades->fieldget('vin');
               $this->mdescripcion->Text= $this->tbactividades->fieldget('descripcion');
					$this->mvalidacion->Text= $this->tbactividades->fieldget('notavalidacion');
               $this->dtactividad->IfFormat="%Y-%m-%d";
               $this->dtactividad->Text= $this->tbactividades->fieldget('fechaactividad');

               //idvendedor
               $this->edvendedor->tag= $this->tbactividades->fieldget('idvendedor');
               $cadena='select concat(nombre," ",apaterno," ",amaterno) as vendedor'.
                       ' from usuarios where idusuario="'.$this->edvendedor->tag.'"';
               $rs = mysql_query($cadena) or die(" error de consulta de SQL : ".$cadena);
               $row=mysql_fetch_row($rs);
               $this->edvendedor->Text= $row[0];

					//estatus
					$this->cboestatus->ItemIndex=$this->tbactividades->fieldget('idestatus');
					//si ya esta validada o rechazada no se puede modificar
					if(Derechos('VALACTIVXASIG'))
					{
						$this->cboestatus->Enabled=true;
						$this->mvalidacion->ReadOnly=false;
						if($this->cboestatus->ItemIndex>87)
						{
							$this->cboestatus->Enabled=false;
							$this->habilitar(false);
						}
					}
					else
					{
						$this->habilitar(false);
						$this->lblnotas->Enabled=true;
					}
					//nota
					$this->hfidnota->Value= $this->tbactividades->fieldget("idnota");
					$r = ufh('n');
					$this->sqlnotas->close();
					$this->sqlnotas->SQL ="SELECT n.nota,".str_replace("Modificado","Elaborado ",$r).
							" as usuario from notasdet n
							left join actividadesasignar a on a.idnota=n.idnota
                     where idactividadasignar=".$this->hfidactividad->Value."
							order by n.fecha desc , n.hora desc limit 3";
               $this->sqlnotas->open();
					$colores[0]="#ff5500";
					$colores[1]="#004080";
         		while(!$this->sqlnotas->EOF == true)
         		{
						if(($this->sqlnotas->RecNo%2)==0)
							$c=0;
						else
							$c=1;
            		$t.='<br><strong>
							<font color='.$colores[$c].'>'.strtoupper($this->sqlnotas->fieldget('nota')).'
							</font>
							</strong><br>';
						$t.='<strong>
							<font color='.$colores[$c].'>'.$this->sqlnotas->fieldget('usuario').'<br>
							</font>
							</strong><br>';
						$this->sqlnotas->next();
          		}
					if($this->sqlnotas->RecordCount>0)
						$this->lblnotas->Caption=$t;
					else
						$this->lblnotas->Caption='Notas';


               //usuario fecha hora
               $r = ufh('a');
               $sql= 'select '.$r.' as ufh from actividadesasignar a where idactividad='.$this->hfidactividad->Value;
               $rs= mysql_query($sql) or die('Error de SQL: '.$sql);
               $row= mysql_fetch_row($rs);
               $this->lbufh->Caption = $row[0];

               //eliminar
               if(isset($_GET['elim']))
               {
                  if(Derechos('ELACTIVXASIG') == false)
                  {
                     echo '<script language="javascript" type="text/javascript">
                     alert("No Tienes el Derecho para Eliminar Actividades por Asignar");
							document.location.href("uactividadesxasignarvista.php");
                     </script>';
                  }
                  else
                  {
                     $this->tbactividades->close();
                     $this->tbactividades->open();
                     $this->tbactividades->delete();
                     $this->tbactividades->Active = false;
                     dmconexion::Log("Elimino la actividad por Asignar ".$_GET["idactividad"],3);
                     redirect("uactividadesxasignarvista.php");
                  }
               }
            }
         }
       }
}

global $application;

global $uactividadesxasignar;

//Creates the form
$uactividadesxasignar=new uactividadesxasignar($application);

//Read from resource file
$uactividadesxasignar->loadResource(__FILE__);

//Shows the form
$uactividadesxasignar->show();

?>