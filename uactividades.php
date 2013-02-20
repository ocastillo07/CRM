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
class uactividades extends Page
{
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
				dmconexion::Log("Acceso a las notas de Actividades ".$this->edcliente->Text." ".$this->edcliente->Tag, 1);
       		redirect("unotas.php?idnota=".$this->hfidnota->Value."&procedencia=actividades".
                "&idprocedencia=".$this->hfidactividad->Value);
			}
       }

       function btnbuscarClick($sender, $params)
       {
         redirect("uclientesvista.php?pagina=uactividades.php");
       }

       function btnguardarcerrarClick($sender, $params)
       {
         if($this->Validar() != false)
         {
            $this->guardar();
            redirect('uactividadvista.php');
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
			if($this->btnguardar->tag=='1')
         {
            $this->tbactividades->open();
            $this->tbactividades->insert();
            $this->hfidactividad->Value = MaxId('actividades', 'idactividad')+1;
            $this->tbactividades->fieldset("idactividad", $this->hfidactividad->Value);
            $this->tbactividades->fieldset('fechacreacion',Date('Y/m/d'));
            $this->btnguardar->tag=2;
            $msg = "Creo la Actividad No. ".$this->hfidactividad->Value;
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
         }
         else
         {
				$b=true;
            if(Derechos('Modificar Actividades') == false)
					$b=false;
				if(Derechos('Validar Actividades'))
					$b=true;

				if($b==false)
				{
					echo '<script language="javascript" type="text/javascript">
               alert("No puede Modificar Actividades");
               window.location="uactividades.php?idactividad='.$this->hfidactividad->Value.'";
               </script>';
				}
				else
				{
               $this->tbactividades->close();
               $this->tbactividades->writeFilter('idactividad="'.$this->hfidactividad->Value.'"');
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
            $this->tbactividades->fieldset('idvendedor',$this->edvendedor->Tag);
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

         //idvendedor
         $cadena='select idusuario,concat(nombre," ",apaterno," ",amaterno) as vendedor'.
                 ' from usuarios where login="'.$_SESSION['login'].'"';
         $rs = mysql_query($cadena) or die(" error de consulta de SQL : ".$cadena);
         $row=mysql_fetch_row($rs);
         $this->edvendedor->Text= $row[1];
         $this->edvendedor->tag= $row[0];
         if(Derechos('Modificar Actividades') == false)
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
			//$this->lblnotas->Enabled=$ban;
		 }

       function uactividadesShow($sender, $params)
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
            //$this->lbvin->Visible = false;
            //$this->edvin->Visible = false;
            //nuevo registro
            if($_GET["idactividad"]==0)
            {
               $this->Limpiar();
               $this->inicializa();
					$this->habilitar(true);
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
               $this->tbactividades->writeFilter('idactividad=' . $_GET["idactividad"]);
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
               $this->edvendedor->tag= $this->tbactividades->fieldget('idvendedor');
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
					if(Derechos('Validar Actividades'))
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
							left join actividades a on a.idnota=n.idnota
                     where idactividad=".$this->hfidactividad->Value."
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
               $sql= 'select '.$r.' as ufh from actividades a where idactividad='.$this->hfidactividad->Value;
               $rs= mysql_query($sql) or die('Error de SQL: '.$sql);
               $row= mysql_fetch_row($rs);
               $this->lbufh->Caption = $row[0];

               //eliminar
               if(isset($_GET['elim']))
               {
                  if(Derechos('Eliminar Actividades') == false)
                  {
                     echo '<script language="javascript" type="text/javascript">
                     alert("No Tienes el Derecho para Eliminar Actividades");
							document.location.href("uactividadvista.php");
                     </script>';
                  }
                  else
                  {
                     $this->tbactividades->close();
                     $this->tbactividades->open();
                     $this->tbactividades->delete();
                     $this->tbactividades->Active = false;
                     dmconexion::Log("Elimino la actividad ".$_GET["idactividad"],3);
                     redirect("uactividadvista.php");
                  }
               }
            }
         }
       }
}

global $application;

global $uactividades;

//Creates the form
$uactividades=new uactividades($application);

//Read from resource file
$uactividades->loadResource(__FILE__);

//Shows the form
$uactividades->show();

?>