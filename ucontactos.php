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
use_unit("mysql.inc.php");
use_unit("dbtables.inc.php");
use_unit("db.inc.php");
use_unit("dbgrids.inc.php");
use_unit("buttons.inc.php");
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class ucontactos extends Page
{
       public $hfnivel = null;
       public $hfidcontador = null;
       public $edidcontacto = null;
       public $edapaterno = null;
       public $ednextel = null;
       public $edfax = null;
       public $edtelefono2 = null;
       public $edtelefono1 = null;
       public $edemail = null;
       public $edpuesto = null;
       public $edcp = null;
       public $edcolonia = null;
       public $edmunicipio = null;
       public $edestado = null;
       public $ednumero = null;
       public $eddir = null;
       public $ednombre = null;
       public $edamaterno = null;
       public $lbtitulo = null;
       public $sqlgen = null;
       public $dgcontactos = null;
       public $pbotones = null;
       public $btnregresar = null;
       public $btneliminar = null;
       public $btnnuevo = null;
       public $btngcerrar = null;
       public $btnguardar = null;
       public $hfidcliente = null;
       public $hfnombre = null;
       public $lblprocedencia = null;
       public $sqlcontactos = null;
       public $dscontactos = null;
       public $tblcontactos = null;
       public $hfestatus = null;
       public $lblufh = null;
       public $cbrelacion = null;
       public $cbplaza = null;
       public $Label12 = null;
       public $Label2 = null;
       public $Label1 = null;
       function lblprocedenciaJSClick($sender, $params)
       {
       
       ?>
       //Add your javascript code here
		 	var cliente=document.getElementById('hfidcliente').value;
			if(cliente==0 || cliente=='')
			{
         	if(!confirm('Desea Asignarle un Cliente a Este Contacto?'))
	            return(false);
				document.location.href("uclientesvista.php?pagina=ucontactos.php");
			}
			else
				alert('El contacto Actual Ya esta asignado a un Cliente');         
       <?php

       }

       function btneliminarJSClick($sender, $params)
       {
       ?>
       //Add your javascript code here
       if(!confirm('Desea Eliminar el Contacto Seleccionado?'))
            return(false)
       var model=dgcontactos.getTableModel();
       var row=dgcontactos.getFocusedRow();
       var link = "ucontactos.php?idcontacto="+document.getElementById("edidcontacto").value+
                              "&idcliente="+document.getElementById("hfidcliente").value+
                              "&estatus=3&idcontador="+model.getValue(0, row);
       document.location.href(link);
       <?php
       }

       function ucontactosCreate($sender, $params)
       {
       if(Derechos('Accesar Contactos') == false)
               {
               echo '<script language="javascript" type="text/javascript">
                  alert("No puede Accesar Contactos");
                  window.location="uclientes.php?idcliente='.$_GET['idcliente'].'";
                  </script>';
               }

       }

       function btnregresarClick($sender, $params)
       {
       redirect('uclientes.php?idcliente='.$this->hfidcliente->Value);
       }


       function btnnuevoClick($sender, $params)
       {
        redirect("ucontactos.php?idcontacto=".$this->edidcontacto->Text.
		  "&idcliente=".$this->hfidcliente->Value."&estatus=1");
       }

       function btngcerrarClick($sender, $params)
       {
       $r = $this->Validar();
         if($r == true)
            {
            $this->Guardar();
            redirect("uclientes.php?idcliente=".$this->hfidcliente->Value);
            }
       }

       function btnguardarClick($sender, $params)
       {
       $r = $this->Validar();
         if($r == true)
            {
            $this->Guardar();
            //redirect("ucontactos.php?idcontacto=".$this->hfidcontacto->Value."&idcontador=".$this->edidcontador->Text);
            }
       }



       function Validar()
       {
       if($this->ednombre->Text == "")
         {
         echo '<script language="javascript" type="text/javascript"> '.
              'alert(\'Falta el nombre.\'); </script>';
         return false;
         }

       if($this->cbrelacion->ItemIndex == -1 || $this->edpuesto->text =="")
         {
         echo '<script language="javascript" type="text/javascript"> '.
              'alert(\'Falta la relacion o el puesto.\'); </script>';
         return false;
         }
       return true;
       }

       function ucontactosShow($sender, $params)
       {
       	$this->pbotones->Width = $_SESSION["width"];
       	$this->lbtitulo->Caption= $this->Caption;
       	if(isset($_GET["idcontacto"])== true)
         {
         	$this->edidcontacto->Text = $_GET["idcontacto"];
				
				if(isset($_GET["idcontador"])== true)
					$this->hfidcontador->Value = $_GET["idcontador"];

       		if($this->edidcontacto->Text == 0)
         		$this->hfestatus->Value = 1;
       		else
         		$this->hfestatus->Value = 2;
       		
				if(isset($_GET["estatus"])== true)
         		$this->hfestatus->value = $_GET["estatus"];

         	
         	if(isset($_GET["idcliente"])== true && $_GET['idcliente']!='')
				{
         		$this->hfidcliente->value = $_GET["idcliente"];
					$nombre = NombreCliente('o');
         		$this->sqlgen->close();
         		$this->sqlgen->SQL = 'Select idcliente, '.$nombre.' as nombre from clientes o '.
                            'where idcliente ='.$_GET["idcliente"];
         		$this->sqlgen->open();
         		$this->lblprocedencia->Caption = $this->sqlgen->fieldget('idcliente').' - '.$this->sqlgen->fieldget('nombre');
				}
       		else                           
				{  
         		$this->lblprocedencia->Caption="<P><FONT color=#0080c0>Click Para Traer Cliente</FONT></P>";
					$this->hfidcliente->Value="";
       		}
				switch( $this->hfestatus->Value )
         	{
         		case 1:
            	{
            		if(Derechos('Alta Contactos') == false)
               	{
               		echo '<script language="javascript" type="text/javascript">
                  		alert("No puede dar de Alta Contactos");
                  		window.location="uclientes.php?idcliente='.$this->hfidcliente->Value.'";
                  		</script>';
               	}
            		else
               	{
               		$this->inicializaforma();
               		$this->Limpiar();
               		$this->Alta();
               		break;
               	}
            	}

         		case 2:
            	{
            		$this->inicializaforma();
            		$this->Limpiar();
            		$this->Locate();
            		break;
            	}

         		case 3:
            	{
            		if(Derechos('Eliminar Contactos') == false)
                  {
                  		echo '<script language="javascript" type="text/javascript">
                  		alert("No puede Eliminar Contactos");
                  		window.location="ucontactos.php?idcontacto='.$this->edidcontacto->Text.'";
                  		</script>';
                  }
               	else
                  {
                  	$this->inicializaforma();
                  	$this->Locate();
                  	$this->tblcontactos->open();  
							$this->tblcontactos->delete();
							$sql='select idcontacto from contactos where idcontacto='.$this->edidcontacto->Text;
							$rs=mysql_query($sql) or die('Error SQL :'.$sql);
							$num=mysql_num_rows($rs);
							if($num==0)                                         
							{
								$sql='update clientes set idcontacto=0 where idcliente='.$this->hfidcliente->Value;
								$r=mysql_query($sql) or die('Error SQL :'.$sql);								 
							}
                  	
                  	$this->tblcontactos->Active = false;
                  	$this->Limpiar();
                  	dmconexion::Log("Elimino el contacto no. ".$this->edidcontacto->Text." del cliente no.".$this->hfidcliente->Value,3);
                  	redirect("ucontactos.php?idcontacto=".$this->edidcontacto->Text."&idcliente=".
                  	$this->hfidcliente->Value);
                  	break;
                  }
               }
            }
         }
			else if(isset($_GET["idcliente"])== true && $_GET['idcliente']!='')
			{
         		$this->hfidcliente->value = $_GET["idcliente"];
					$nombre = NombreCliente('o');
         		$this->sqlgen->close();
         		$this->sqlgen->SQL = 'Select idcliente,idcontacto, '.$nombre.' as nombre from clientes o '.
                            'where idcliente ='.$_GET["idcliente"];  
         		$this->sqlgen->open();
					if($this->sqlgen->fieldget('idcontacto')==0)
					{
						$sql='update clientes set idcontacto='.$this->edidcontacto->Text." 
							where idcliente=".$this->hfidcliente->Value;
						$rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
					}
					else                                                             
					{
						$sql='update contactos set idcontacto='.$this->sqlgen->fieldget('idcontacto')." 
								where idcontador=".$this->hfidcontador->Value;
						$rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
					}	
					$this->lblprocedencia->Caption = $this->sqlgen->fieldget('idcliente').' - '.$this->sqlgen->fieldget('nombre');  						
			}
       }

       function Alta()
       {
         if ($this->hfestatus->Value == 1)
         {
            //
            //{
				$this->hfidcontador->Value = MaxId('contactos', 'idcontador')+1;
				if($this->edidcontacto->Text=='0')
					$this->edidcontacto->Text = MaxId('contactos', 'idcontacto')+1;
            
				//calcular el ultimo en nivel	
            $sql = "Select ifnull(max(nivel),0)+1 as n from contactos
                     where idcontacto =".$this->edidcontacto->Text;
            $result = mysql_query($sql) or die("error sql: ".$sql." ".mysql_error());
            $row = mysql_fetch_row($result);
            $this->hfnivel->Value = $row[0];
            
				/*if($this->edidcontacto->Text == 0)
            {
               $this->hfidcontacto->Value = MaxId('contactos', 'idcontacto')+1;
               $sql = "Update clientes set idcontacto =".$this->hfidcontacto->Value.
                      " where idcliente = ".$this->hfidcliente->Value." and idcontacto=0";
               $result = mysql_query($sql) or die("error sql: ".$sql." ".mysql_error());
            } */
            $this->cargagrid();
       	}
       }
		 
		function Locate()
      {
      	if($this->hfestatus->Value == 2 || $this->hfestatus->Value == 3)
         {
        		/*$this->edidcontacto->Text = $_GET["idcontacto"];
         	if(isset($_GET["idcontador"]))
            	$this->hfidcontador->Value = $_GET["idcontador"];
         	else
            {  
            	if( $this->edidcontacto->Text != 0)
               {
               	$this->sqlgen->close();
               	$this->sqlgen->SQL = 'Select ifnull(min(idcontador),0) as id from contactos '.
                                  'where idcontacto = '.$_GET["idcontacto"];
               	$this->sqlgen->open();
               	$this->edidcontador->Text = $this->sqlgen->fieldget("id");

               	if($this->edidcontador->Text == '0')
                  {
                  	$this->hfestatus->Value = 1;
                  	$this->Alta();
                  	//exit;
                  }
               }
            	else
               {
               	$this->hfestatus->Value = 1;
               	$this->Alta();
               	exit;
               }
            }
         }  */
         	$this->cargagrid();
         	if($this->edidcontacto->Text != "")
         	{
         		$this->tblcontactos->setFilter('idcontador="'.$this->hfidcontador->Value.'"');
            	$this->sqlgen->close();
            	$r = ufh('c');
            	$this->sqlgen->SQL = 'Select c.nombre as nombre, c.apaterno, c.amaterno, c.direccion, c.numero,
                                 c.colonia, c.idrelacion, c.idplaza, c.email, c.telefono1, c.telefono2, c.fax,
                                 c.nextel, '.$r.' as ufh, c.municipio, c.cp, c.nivel, c.puesto, c.estado
                                 from contactos c where c.idcontador = '.$this->hfidcontador->Value;
            	$this->sqlgen->open();
            	if($this->sqlgen->RecordCount > 0)
            	{
               	$this->ednombre->Text = $this->sqlgen->fieldget("nombre");
               	$this->edapaterno->Text = $this->sqlgen->fieldget("apaterno");
               	$this->edamaterno->Text = $this->sqlgen->fieldget("amaterno");
						$this->eddir->Text = $this->sqlgen->fieldget("direccion");
               	$this->ednumero->Text = $this->sqlgen->fieldget("numero");
               	$this->edcp->Text = $this->sqlgen->fieldget("cp");
               	//$this->ednivel->Text = $this->sqlgen->fieldget("nivel");
               	$this->edemail->Text = $this->sqlgen->fieldget("email");
               	$this->ednextel->Text = $this->sqlgen->fieldget("nextel");
               	$this->edfax->Text = $this->sqlgen->fieldget("fax");
               	$this->edtelefono2->Text = $this->sqlgen->fieldget("telefono2");
               	$this->edtelefono1->Text = $this->sqlgen->fieldget("telefono1");
               	$this->edpuesto->Text = $this->sqlgen->fieldget("puesto");
               	$this->edestado->Text = $this->sqlgen->fieldget("estado");
               	$this->edmunicipio->Text = $this->sqlgen->fieldget("municipio");
               	$this->edcolonia->Text = $this->sqlgen->fieldget("colonia");
               	$this->lblufh->Caption = $this->sqlgen->fieldget("ufh");
               	$this->cbrelacion->ItemIndex = $this->sqlgen->fieldget("idrelacion");
               	$this->cbplaza->ItemIndex = $this->sqlgen->fieldget("idplaza");
        			}
       		}
			}
    	}

       function cargagrid()
       {
       	$nombre = NombreFisica('c');
         $this->sqlcontactos->close();
         $this->sqlcontactos->SQL = 'Select c.idcontador,c.idcontacto, '.$nombre.' as nombre, 
												r.nombre as relacion,
                                    c.telefono1 as telefono from contactos c left join clasificaciones r
                                    on r.idclasificacion=c.idrelacion
                                    where idcontacto ='.$this->edidcontacto->Text.'
                                    order by c.nivel';
         $this->sqlcontactos->open();
       }

       function Guardar()
       {
       	if($this->hfestatus->Value == 1)
         {
         	//if($this->hfidcontacto->Value == 0)
            //{                                    
					if($this->edidcontacto->Text=='0')
            		$this->edidcontacto->Text = MaxId('contactos', 'idcontacto')+1; 
					$sql='select idcontacto from clientes where idcliente='.$this->hfidcliente->Value;
					$rs=mysql_query($sql) or die('Error de consulta SQl :'.$sql);
					$row=mysql_fetch_row($rs);
					if($row[0]==0)
						$this->edidcontacto->Text = MaxId('contactos', 'idcontacto')+1;
					
					$this->hfidcontador->Value= MaxId('contactos', 'idcontador')+1;
               $sql = "Update clientes set idcontacto=".$this->edidcontacto->Text.
                      " where idcliente = ".$this->hfidcliente->Value." and idcontacto=0";
               $result = mysql_query($sql) or die("error sql: ".$sql." ".mysql_error());
            //}
            $this->tblcontactos->open();
            $this->tblcontactos->insert();
            $this->tblcontactos->fieldset("idcontador", $this->hfidcontador->Value);
            $this->tblcontactos->fieldset("idcontacto", $this->edidcontacto->Text);
            $msg = "Inserto el contacto no. ".$this->edidcontacto->Text." ".$this->ednombre->Text.
				" ".$this->edapaterno->Text." ".$this->edamaterno->Text." del cliente no.".$this->hfidcliente->Value;
            $nivel = 1;
         	$ban = true;
			}
         else
        	{
        		if(Derechos('Modificar Contactos')==false)
            {
           		echo '<script language="javascript" type="text/javascript">
                    	alert("No puede Modificar Contactos"); 
							window.location="ucontactos.php?idcontacto='.$this->edidcontacto->Text.
							'&idcontador='.$this->hfidcontador->Value.'&idcliente='.$this->hfidcliente->Value.'";
                     </script>';
               $ban = false;
            }
            else
           	{
					$this->tblcontactos->close();
               $this->tblcontactos->writeFilter('idcontador="'.$this->hfidcontador->Value.'"');
               $this->tblcontactos->refresh();
               $this->tblcontactos->open();
               $this->tblcontactos->Edit();
               $msg = "Edito el contacto No. ".$this->edidcontacto->Text." ".$this->hfnombre->Value." del cliente no.".$this->hfidcliente->Value;
               $nivel = 2;
               $ban = true;
             }
        }
        if($ban == true)
        {
          	$this->tblcontactos->fieldset("nombre", $this->ednombre->Text);
            $this->tblcontactos->fieldset("apaterno", $this->edapaterno->Text);
            $this->tblcontactos->fieldset("amaterno", $this->edamaterno->Text);
            $this->tblcontactos->fieldset("direccion", $this->eddir->Text);
            $this->tblcontactos->fieldset("numero", $this->ednumero->Text);
            $this->tblcontactos->fieldset("cp", $this->edcp->Text);
            $this->tblcontactos->fieldset("nivel", $this->hfnivel->Value);
            $this->tblcontactos->fieldset("email", $this->edemail->Text);
            $this->tblcontactos->fieldset("telefono1", $this->edtelefono1->Text);
            $this->tblcontactos->fieldset("telefono2", $this->edtelefono2->Text);
            $this->tblcontactos->fieldset("fax", $this->edfax->Text);
            $this->tblcontactos->fieldset("nextel", $this->ednextel->Text);
            $this->tblcontactos->fieldset("puesto", $this->edpuesto->Text);
            $this->tblcontactos->fieldset("colonia", $this->edcolonia->Text);
            $this->tblcontactos->fieldset("municipio", $this->edmunicipio->Text);
            $this->tblcontactos->fieldset("estado", $this->edestado->Text);
            $this->tblcontactos->fieldset("idplaza", $_REQUEST['cbplaza']);
            $this->tblcontactos->fieldset("idrelacion", $_REQUEST['cbrelacion']);
            $this->tblcontactos->fieldset("usuario", $_SESSION["login"]);
            $this->tblcontactos->fieldset("fecha", date("Y/n/j"));
            $this->tblcontactos->fieldset("hora", date("H:i:s"));
            $this->tblcontactos->post();     
				$this->hfestatus->Value=2;
            $this->tblcontactos->Active = false;
            dmconexion::Log($msg,$nivel);
     		}
       }
		 
		 
       function Limpiar()
         {
         reset($this->controls->items);
         while(list($key, $val)=each($this->controls->items))
            {
            if($val->inheritsFrom("LabeledEdit"))
               {
               $val->Text="";
               }
            if($val->inheritsFrom("ComboBox"))
               {
               $val->ItemIndex=0;
               }
             }
          $this->lblufh->Caption = '';  
			 //$this->hfidcliente->Value='';
			 //$this->lblprocedencia->Caption='...';
          }

       function inicializaforma()
         {
         //plazas
         $this->sqlgen->close();
         $this->sqlgen->sql = 'Select nombre, idplaza from plazas';
         $this->sqlgen->open();
         $this->cbplaza->Clear();
         $this->cbplaza->AddItem("Sin plazas", null, null);
         while($this->sqlgen->EOF != true)
            {
            $this->cbplaza->AddItem($this->sqlgen->fieldget("nombre"), null, $this->sqlgen->fieldget("idplaza"));
            $this->sqlgen->next();
            }

          //relacion
         $this->sqlgen->close();
         $this->sqlgen->sql = 'Select c.idclasificacion, c.nombre from clasificaciones c left join tipoclasificacion tc on tc.idtipo=c.idtipo where tc.nombre="Relacion"';
         $this->sqlgen->open();
         $this->cbrelacion->Clear();
         $this->cbrelacion->AddItem("Sin relacion", null, null);
         while($this->sqlgen->EOF != true)
            {
            $this->cbrelacion->AddItem($this->sqlgen->fieldget("nombre"), null, $this->sqlgen->fieldget("idclasificacion"));
            $this->sqlgen->next();
            }
         }

       function dgcontactosJSDblClick($sender, $params)
       {
       ?>
       //Add your javascript code here
       var model=dgcontactos.getTableModel();
       var row=dgcontactos.getFocusedRow();
       var link = "ucontactos.php?idcontador="+model.getValue(0, row)+"&estatus=2&idcliente="+
                  document.getElementById("hfidcliente").value+"&idcontacto="+document.getElementById("edidcontacto").value;
       document.location.href(link);
       <?php
       }

}

global $application;

global $ucontactos;

//Creates the form
$ucontactos=new ucontactos($application);

//Read from resource file
$ucontactos->loadResource(__FILE__);

//Shows the form
$ucontactos->show();

?>