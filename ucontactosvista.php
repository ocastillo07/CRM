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
use_unit("db.inc.php");
use_unit("dbgrids.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class ucontactosvista extends Page
{
       public $lbtitulo = null;
       public $btnexportar = null;
       public $tblcontactos = null;
       public $hftabla = null;
       public $sqlgen = null;
       public $lblpagina = null;
       public $btngo = null;
       public $edgo = null;
       public $btnsiguiente = null;
       public $btnregresar = null;
       public $hfidcontacto = null;
       public $dscontactos = null;
       public $dgcontactos = null;
       public $btnFiltrar = null;
       public $cbfiltro = null;
       public $Label1 = null;
       public $edfiltrar = null;
       public $pbotones = null;
       public $btnnuevo = null;
       public $hfidcliente = null;
       function ucontactosvistaJSLoad($sender, $params)
       {

       ?>
       //Add your javascript code here
       dgcontactos.setWidth(document.body.offsetWidth - 40);
       dgcontactos.setHeight(document.body.offsetHeight - 150);
       vcl.$('lblpagina_outer').style.top=document.body.offsetHeight-50;
       <?php

       }

       function btnnuevoJSClick($sender, $params)
       {

       ?>
       //Add your javascript code here
		 		alert('Selecciona un Cliente de la siguiente pantalla para relacionar el Nuevo contacto');
            document.location.href("uclientesvista.php?pagina=ucontactosvista.php");
       <?php

       }

       function btnexportarClick($sender, $params)
       {
         if(Derechos('Exportar Contactos')==false)
         {
            echo '<script language="javascript" type="text/javascript">
                    alert(\' No tienes Derechos para Exportar Contactos\');
                  </script>';
         }
         else
         {
            exportar($this->sqlgen->sql,'Contactos');
         }
       }


       function btngoClick($sender, $params)
       {
       if(is_numeric($this->edgo->Text))
         $this->tblcontactos->LimitStart =  ($this->edgo->Text - 1) * $this->tblcontactos->LimitCount;
       }

       function btnregresarClick($sender, $params)
       {
       $this->tblcontactos->LimitStart =  $this->tblcontactos->LimitStart - $this->tblcontactos->LimitCount;
       }

       function btnsiguienteClick($sender, $params)
       {
       $this->tblcontactos->LimitStart =  $this->tblcontactos->LimitStart + $this->tblcontactos->LimitCount;
       }

       function btnnuevoClick($sender, $params)
       {
       //redirect("uclientesvista.php?pagina=ucontactosvista.php");
       }

       function dgcontactosJSDblClick($sender, $params)
       {
       //$this->hfidcliente->Value = $this->tblcontactos->fieldget("idcliente");
       ?>
       //Add your javascript code here
       var model=dgcontactos.getTableModel();
       var row=dgcontactos.getFocusedRow();
       document.location.href("ucontactos.php?idcontador="+model.getValue(0, row)+
		 								"&idcontacto="+model.getValue(1, row)+
										"&idcliente="+model.getValue(3, row));
       <?php
       dmconexion::Log("Acceso a clientes", 1);
       }

       function ucontactosvistaShow($sender, $params)
       {
       	$this->pbotones->Width = $_SESSION["width"];
       	$this->lbtitulo->Caption= $this->Caption;
       	if(isset($_GET['idcliente']))
       	{
         	$sql = "Select idcontacto from clientes where idcliente =".$_GET['idcliente'];
            $result = mysql_query($sql) or die("error sql: ".$sql." ".mysql_error());
         	$row = mysql_fetch_row($result);
         	redirect('ucontactos.php?idcontacto='.$row[0].'&idcliente='.$_GET['idcliente']);
       	}
       	else
         	$this->filtro();
       }

       function filtro()
       {
       $nom = NombreFisica('c');
       $nomcli = NombreCliente('cl');
       if($this->cbfiltro->ItemIndex != '0')
         $cond = 'having '.$this->cbfiltro->ItemIndex.' like "%'.$this->edfiltrar->Text.'%"';
       else
         $cond = '';
       /*switch($this->cbfiltro->ItemIndex)
         {
         case 1:  //Nombre
                  $cond = 'where '.$nom.' like "%'.$this->edfiltrar->Text.'%"';
                  break;
         case 2:  //Telefono
                  $v = str_replace("-", "", $this->edfiltrar->Text);
                  $cond = 'where replace(c.telefono1, "-", "") like "%'.$v.'%"
                  or replace(c.telefono2, "-", "") like "%'.$v.'%"
                  or replace(c.fax, "-", "") like "%'.$v.'%"
                  or replace(c.nextel, "-", "") like "%'.$v.'%"';
                  break;
         case 3:  //Nombre cliente
                  $cond = 'where '.$nomcli.' like "%'.$this->edfiltrar->Text.'%"';
                  break;
         case 4:  //Numero cliente
                  $cond = 'where cl.idcliente like "%'.$this->edfiltrar->Text.'%"';
                  break;
         }       */

       $this->sqlgen->close();
       $this->sqlgen->sql = 'select count(*) as total from( Select c.idcontador,c.idcontacto as ID,
		 	 cl.idcliente as IDCliente,'.$nom.' as Contacto,'.$nomcli.' as Cliente,
			 c.direccion as Direccion, c.numero as Numero, c.colonia as Colonia,
			 c.municipio  as Municipio, c.estado as Estado, c.cp as CP,p.nombre as Plaza,
			 cla.nombre as Relacion, c.puesto as Puesto, c.email as Correo, c.telefono1 as Tel1,
			 c.telefono2 as Tel2, c.fax as Fax, c.nextel as Nextel
          from contactos c left join clientes cl on cl.idcontacto=c.idcontacto
			 left join plazas p on p.idplaza=c.idplaza
			 left join clasificaciones cla on cla.idclasificacion=c.idrelacion '.
         $cond.' ) as t';
       $this->sqlgen->open();
       $total = $this->sqlgen->fieldget('total');
       $this->tblcontactos->LimitCount = GetConfiguraciones('LimitCountGrids');
       $pagact = ($this->tblcontactos->LimitStart+$this->tblcontactos->LimitCount)/$this->tblcontactos->LimitCount;
       $paginas = ceil($total/$this->tblcontactos->LimitCount);

       $this->lblpagina->Caption = 'Total de Registros: '.$total.' Pagina '.$pagact.' de '.$paginas;

       if($this->tblcontactos->LimitCount < $total)
         {
         $this->btnsiguiente->Enabled = false;
         $this->btnregresar->Enabled = false;
         }

       if(($total - $this->tblcontactos->LimitCount) > 0)
         $this->btnsiguiente->Enabled = true;

       if(($total - $this->tblcontactos->LimitStart) > 0)
         $this->btnregresar->Enabled = true;

       if(($total - $this->tblcontactos->LimitStart) < $this->tblcontactos->LimitCount)
          $this->btnsiguiente->Enabled = false;

        if($this->tblcontactos->LimitStart == 0)
         $this->btnregresar->Enabled = false;

       if($this->btnregresar->Enabled == false && $this->btnsiguiente->Enabled == false)
         $this->btngo->Enabled = false;
       else
         $this->btngo->Enabled = true;

       $this->tblcontactos->close();

       $this->hftabla->Value =  "tmpContactos".$_SESSION['idusuario'];

        $sql = "Drop table if exists ".$this->hftabla->Value;
        $result = mysql_query($sql) or die("error sql: ".$sql." ".mysql_error());

        $sql= ' Select c.idcontador,c.idcontacto as ID,cl.idcliente as IDCliente,
		    '.$nom.' as Contacto,'.$nomcli.' as Cliente,
			 c.direccion as Direccion, c.numero as Numero, c.colonia as Colonia,
			 c.municipio  as Municipio, c.estado as Estado, c.cp as CP,p.nombre as Plaza,
			 cla.nombre as Relacion, c.puesto as Puesto, c.email as Correo, c.telefono1 as Tel1,
			 c.telefono2 as Tel2, c.fax as Fax, c.nextel as Nextel
          from contactos c left join clientes cl on cl.idcontacto=c.idcontacto
			 left join plazas p on p.idplaza=c.idplaza
			 left join clasificaciones cla on cla.idclasificacion=c.idrelacion '.
         $cond.'   order by idcontador';

        $this->sqlgen->sql= $sql;


        $sql="Create table ".$this->hftabla->Value.$sql;
        $result = mysql_query($sql) or die("error sql: ".$sql." ".mysql_error());
         $this->RellenaLista();
        $this->RellenaGrid();


       if($this->tblcontactos->RecordCount == 0)
         {
         $this->cbfiltro->ItemIndex = 0;
         echo '<script language="javascript" type="text/javascript">
         alert("No se encontraron datos");
         </script>';
          $this->tblcontactos->LimitStart = 0;
         //$this->filtro();
         }
       }

      function RellenaGrid()
       {
       $this->tblcontactos->TableName = $this->hftabla->Value;//$params;
       $this->tblcontactos->Active = false;
       $this->tblcontactos->Active = true;
       }

       function RellenaLista()
       {
       $sql = "Describe ".$this->hftabla->Value;
       $rs = mysql_query($sql) or die("error sql: ".$sql." ".mysql_error());
       $this->cbfiltro->Clear();
       $this->cbfiltro->AddItem('Todos',null, '0');
       while($row=mysql_fetch_array($rs))
         {
			if($row[0]!='idcontador' && $row[0]!='IDCliente')
         $this->cbfiltro->AddItem($row[0],null, $row[0]);
         }
       }

       function ucontactosvistaCreate($sender, $params)
       {
       if(Derechos('Accesar Contactos') == false)
         {
         echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para accesar a Contactos");
               document.location.href("menu.php");
               </script>';
         exit;
         }
       }



}

global $application;

global $ucontactosvista;

//Creates the form
$ucontactosvista=new ucontactosvista($application);

//Read from resource file
$ucontactosvista->loadResource(__FILE__);

//Shows the form
$ucontactosvista->show();

?>