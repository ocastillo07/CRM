<?php
//ozkar 2010-01-20 modificacion en el query faltaba round(costo,2)
include("dmconexion.php");
include("urecursos.php");

   session_start();
   if(!isset($_SESSION["login"]))
      redirect("login.php");

require_once("vcl/vcl.inc.php");
//Includes
use_unit("mysql.inc.php");
use_unit("dbgrids.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class uproductosvista extends Page
{
       public $chkinactivo = null;
       public $lbtitulo = null;
       public $btnexportar = null;
       public $sqlexportar = null;
       public $hfnombre = null;
       public $lblpagina = null;
       public $btnsiguiente = null;
       public $btnregresar = null;
       public $btngo = null;
       public $edgo = null;
       public $btnbuscar = null;
       public $cbofiltro = null;
       public $edbuscar = null;
       public $Label1 = null;
       public $pbotones = null;
       public $hfpagina = null;
       public $btneliminar = null;
       public $gridproductos = null;
       public $hfidproducto = null;
       public $btnnuevo = null;
       public $dsproductos = null;
       public $sqlproductos = null;


       function uproductosvistaJSLoad($sender, $params)
       {

       ?>
       //Add your javascript code here
       gridproductos.setWidth(document.body.offsetWidth - 40);
       gridproductos.setHeight(document.body.offsetHeight - 150); //150
       vcl.$('lblpagina_outer').style.top=document.body.offsetHeight-50;
       <?php

       }

       function btnsiguienteClick($sender, $params)
       {
       	$this->sqlproductos->LimitStart =  $this->sqlproductos->LimitStart + $this->sqlproductos->LimitCount;
       }

       function btnregresarClick($sender, $params)
       {
       	$this->sqlproductos->LimitStart =  $this->sqlproductos->LimitStart - $this->sqlproductos->LimitCount;
       }

       function btngoClick($sender, $params)
       {
       	if(is_numeric($this->edgo->Text))
         	$this->sqlproductos->LimitStart = ($this->edgo->Text - 1) * $this->sqlproductos->LimitCount;
       }

       function btnnuevoClick($sender, $params)
       {
       	if(Derechos('Alta Productos') == false)
         	echo '<script language="javascript" type="text/javascript">
            			alert("No puede dar de Alta Productos");
            		</script>';
      	else
				redirect("uproductos.php?idproducto=0");
       }

       function btnexportarClick($sender, $params)
       {
         if(Derechos('Exportar Productos')==false)
         {
            echo '<script language="javascript" type="text/javascript">
                    alert(\' No tienes Derechos para Exportar Productos\');
                  </script>';
         }
         else
         {
            exportar($this->sqlexportar->sql,'Productos');
            redirect("uproductosvista.php");
            $this->sqlexportar->SQL='';
         }
       }

       function btneliminarJSClick($sender, $params)
       {

       ?>
       //Add your javascript code here
           if(!confirm('Desea Eliminar el Producto Seleccionado?'))
            return(false);
            var model=gridproductos.getTableModel();
            var row=gridproductos.getFocusedRow();
            document.location.href("uproductos.php?idproducto="+model.getValue(0, row)+"&elim=1");
       <?php
       }


       function btnbuscarClick($sender, $params)
       {
       //  $this->filtro();
			redirect("uproductosvista.php?pagina=".$this->hfpagina->Value);
       }

       function uproductosvistaCreate($sender, $params)
       {
         if(Derechos('Accesar Productos') == false)
         {
            echo '<script language="javascript" type="text/javascript">
                  alert("Usted no tiene derechos para accesar a productos");
                  document.location.href("menu.php");
                  </script>';
            exit;
         }
       }

       function filtro()
       {
         $nom = NombreCliente('c');
         switch($this->cbofiltro->ItemIndex)
         {
         case 1:  //clave
                  $cond = ' and clave like "%'.$this->edbuscar->Text.'%"';
                  break;
         case 2:  //descripcion
                  $cond = ' and descripcion like "%'.$this->edbuscar->Text.'%"';
                  break;
         case 3:  //tipo
                  $cond = ' and pt.nombre like "%'.$this->edbuscar->Text.'%"';
                  break;
         case 4:  //tipo
                  $cond = ' and costo>= '.$this->edbuscar->Text;
                  break;
         case 5:  //tipo
                  $cond = ' and preciominimo>='.$this->edbuscar->Text;
                  break;
         case 6:  //tipo
                  $cond = ' and m.moneda like "%'.$this->edbuscar->Text.'%"';
                  break;
         case 7:  //tipo
                  $cond = ' and configuracion like "%'.$this->edbuscar->Text.'%"';
                  break;
         }

         if($this->chkinactivo->Checked=='false')
            $activo='activo=1 ';
         else
            $activo='activo=0 ';
         $sql= ' select count(*) as total from productos p '.
               ' left join productosdet det on p.idproducto=det.idproducto'.
               ' left join productostipos pt on pt.idtipo=p.idtipo '.
               ' left join monedas m on m.idmoneda=p.moneda where '.$activo.$cond;

         $rs=mysql_query($sql) or die("Error de consulta SQL: ".$sql);
         $row=mysql_fetch_row($rs);
         $total = $row[0];
         $this->sqlproductos->LimitCount = GetConfiguraciones('LimitCountGrids');
         $pagact = ($this->sqlproductos->LimitStart+$this->sqlproductos->LimitCount)/$this->sqlproductos->LimitCount;
         $paginas = ceil($total/$this->sqlproductos->LimitCount);

         $this->lblpagina->Caption = 'Total de Registros: '.$total.' Pagina '.$pagact.' de '.$paginas;

         if($this->sqlproductos->LimitCount < $total)
         {
            $this->btnsiguiente->Enabled = false;
            $this->btnregresar->Enabled = false;
         }
         if(($total - $this->sqlproductos->LimitCount) > 0)
            $this->btnsiguiente->Enabled = true;

         if(($total - $this->sqlproductos->LimitStart) > 0)
            $this->btnregresar->Enabled = true;

         if(($total - $this->sqlproductos->LimitStart) < $this->sqlproductos->LimitCount)
            $this->btnsiguiente->Enabled = false;

         if($this->sqlproductos->LimitStart == 0)
            $this->btnregresar->Enabled = false;

         if($this->btnregresar->Enabled == false && $this->btnsiguiente->Enabled == false)
            $this->btngo->Enabled = false;
         else
            $this->btngo->Enabled = true;

         $this->sqlproductos->close();
         $this->sqlproductos->SQL= 'select p.idproducto,clave,p.comentario,pt.nombre as tipo, descripcion, motor, '.
                                   'chasis, configuracion,ejedelantero,ejetrasero, '.
                                   'torque, round(preciominimo,2) as preciominimo,round(costo,2) as costo, '.
                                   ' m.moneda,if(activo=1,"Si","No") as activo from productos p '.
                                   ' left join productosdet det on p.idproducto=det.idproducto'.
                                   ' left join productostipos pt on pt.idtipo=p.idtipo '.
                                   ' left join monedas m on m.idmoneda=p.moneda where '.$activo.$cond.
                                   ' order by idproducto';
         $this->sqlexportar->SQL=$this->sqlproductos->SQL;

         $this->sqlproductos->open();

         if($this->sqlproductos->RecordCount == 0)
         {
            $this->cbofiltro->ItemIndex = 0;
            echo '<script language="javascript" type="text/javascript">
            alert("No se encontraron datos");
            </script>';
            $this->sqlproductos->LimitStart = 0;
         }
       }

       function uproductosvistaShow($sender, $params)
       {
       	$this->lbtitulo->Caption= $this->Caption;
       	$this->pbotones->Width = $_SESSION["width"];

			if(isset($_GET['pagina']))
         	$this->hfpagina->Value= $_GET['pagina'];
       	//else
         //	$this->hfpagina->Value= "";

         $this->filtro();
       }

       function gridproductosJSClick($sender, $params)
       {

       ?>
       //Add your javascript code here
         var model=gridproductos.getTableModel();
         var row=gridproductos.getFocusedRow();
         document.uproductosvista.hfidproducto.value =model.getValue(0, row);
         document.uproductosvista.hfnombre.value =model.getValue(1, row);
       <?php
       }

       function gridproductosJSDblClick($sender, $params)
       {

       ?>
       //Add your javascript code here
       var pagina=document.getElementById('hfpagina');
       //alert(pagina.value+' '+document.getElementById("hfidproducto").value);
       if(pagina.value.length==0)
         document.location.href("uproductos.php?idproducto="+document.getElementById("hfidproducto").value);
       else
         document.location.href(pagina.value+"?idproducto="+document.getElementById("hfidproducto").value);
       <?php
       }
}

global $application;

global $uproductosvista;

//Creates the form
$uproductosvista=new uproductosvista($application);

//Read from resource file
$uproductosvista->loadResource(__FILE__);

//Shows the form
$uproductosvista->show();

?>