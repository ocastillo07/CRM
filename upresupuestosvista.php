<?php
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
class upresupuestosvista extends Page
{
       public $dspresupuestos = null;
       public $sqlpresupuestos = null;
       public $lbtitulo = null;
       public $sqlexportar = null;
       public $btnexportar = null;
       public $hfcliente = null;
       public $hfidrevision = null;
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
       public $grid = null;
       public $hfidpresupuesto = null;
       public $btneliminar = null;
       public $btnnuevo = null;
       function upresupuestosvistaJSLoad($sender, $params)
       {

       ?>
       //Add your javascript code here
       grid.setWidth(document.body.offsetWidth - 40);
       grid.setHeight(document.body.offsetHeight - 150); //150
       vcl.$('lblpagina_outer').style.top=document.body.offsetHeight-50;
       <?php

       }



       function btnsiguienteClick($sender, $params)
       {
       	$this->sqlpresupuestos->LimitStart = $this->sqlpresupuestos->LimitStart + $this->sqlpresupuestos->LimitCount;
       }

       function btnregresarClick($sender, $params)
       {
       	$this->sqlpresupuestos->LimitStart = $this->sqlpresupuestos->LimitStart - $this->sqlpresupuestos->LimitCount;
       }

       function btngoClick($sender, $params)
       {
       	if(is_numeric($this->edgo->Text))
         	$this->sqlpresupuestos->LimitStart = ($this->edgo->Text - 1) * $this->sqlpresupuestos->LimitCount;
       }

       function btnnuevoClick($sender, $params)
       {
       	if(Derechos('Alta Presupuestos') == false)
         	echo '<script language="javascript" type="text/javascript">
            			alert("No puede dar de Alta Presupuestos");
            		</script>';
      	else
         	redirect("upresupuestos.php?idpresupuesto=0");
       }



       function btnexportarClick($sender, $params)
       {
         if(Derechos('Exportar Presupuestos')==false)
         {
            echo '<script language="javascript" type="text/javascript">
                    alert(\' No tienes Derechos para Exportar Presupuestos\');
                  </script>';
         }
         else
         {
            exportar($this->sqlpresupuestos->SQL,'Presupuestos');
         }
       }

       function btneliminarJSClick($sender, $params)
       {

       ?>
       //Add your javascript code here
          if(!confirm('Desea Eliminar el Presupuesto Seleccionado?'))
            return(false)
			var model=grid.getTableModel();
       	var row=grid.getFocusedRow();
       	document.location.href("upresupuestos.php?idpresupuesto="+model.getValue(0, row)+
										  "&idrevision="+model.getValue(1, row)+"&elim=1");
       <?php
       }

       function filtro()
       {
         $nom = NombreCliente('c');
			$cond='';
         switch($this->cbofiltro->ItemIndex)
         {
         case 1:  //idpresupuesto
                  if(is_numeric($this->edbuscar->Text))
                     $cond = ' where idpresupuesto='.$this->edbuscar->Text;
                  else
                     echo '<script language="javascript" type="text/javascript">
                             alert(\'No es un valor valido\');
                           </script>';
                  break;
			case 2:  //idrevision
						if(is_numeric($this->edbuscar->Text))
                  	$cond = ' where idrevision = '.$this->edbuscar->Text;
						else
                     echo '<script language="javascript" type="text/javascript">
                             alert(\'No es un valor valido\');
                           </script>';
                  break;
			case 3:  //promotor
                  $cond = ' where promotor like "%'.$this->edbuscar->Text.'%"';
                  break;
         case 4:  //almacen
                  $cond = ' where idalmacen ='.$this->edbuscar->Text;
                  break;
         case 5:  //atencion
                  $cond = ' where atencion like "%'.$this->edbuscar->Text.'%"';
                  break;
			case 6:  //Cliente
                  $cond = ' where cliente like "%'.$this->edbuscar->Text.'%"';
                  break;
         case 7:  //estatus
                  $cond = ' where idestatus like "%'.$this->edbuscar->Text.'%"';
                  break;
			case 8:  //fechacreacion
                  $cond = ' where fechacreacion like "%'.$this->edbuscar->Text.'%"';
                  break;
			case 9:  //costo
                  $cond = ' where costo > '.$this->edbuscar->Text;
                  break;
			case 10:  //subtotal
                  $cond = ' where subtotal > '.$this->edbuscar->Text;
                  break;
			case 11:  //iva
                  $cond = ' where iva > '.$this->edbuscar->Text;
                  break;
			case 12:  //total
                  $cond = ' where total >'.$this->edbuscar->Text;
                  break;
         }

			$sql= 'SELECT p.idpresupuesto,p.idrevision,p.idalmacen,p.atencion,
					concat(u.nombre," ",u.apaterno," ",u.amaterno) as
					promotor,concat(c.nombre," ",c.apaterno," ",c.amaterno) as cliente,
					cla.nombre as idestatus,p.fechacreacion,
					m.moneda,p.tc,p.piva,p.costo,p.importe,p.descuento,
					p.subtotal,p.iva,p.total,p.totalmn
					FROM represupuestos AS p
					left join usuarios u on u.idusuario=p.idpromotor
					left join clientesgds c on c.idcliente=p.idcliente
					left join monedas m on m.idmoneda=p.idmoneda
					left join clasificaciones cla on cla.idclasificacion=p.idestatus ';

         if(Derechos('Todos los Almacenes')==true)
            $sql=$sql.' where p.idalmacen>0';
         else if(Derechos('Solo Presupuestos Almacen')==true)
         {
            $plaza='select idalmacen from usuarios u left join realmacen a on u.idplaza=a.idplaza
				  where login="'.$_SESSION["login"].'"';
            $rs=mysql_query($plaza) or die('Error de consulta SQL: '.$plaza);
            $row=mysql_fetch_row($rs);
            $sql=$sql.' where p.idalmacen='.$row[0];
         }
         else
            $sql=$sql.' where login="'.$_SESSION["login"] .'" ';

         $sql='select * from ( '.$sql.' ) as t '.$cond.' order by idpresupuesto,idrevision';
         $rs=mysql_query('select count(*) from ('.$sql.') as t') or die("Error de consulta SQL: ".$sql);
         $row=mysql_fetch_row($rs);
         $total = $row[0];
         $this->sqlpresupuestos->LimitCount = GetConfiguraciones('LimitCountGrids');
         $pagact = ($this->sqlpresupuestos->LimitStart+$this->sqlpresupuestos->LimitCount)/$this->sqlpresupuestos->LimitCount;
         $paginas = ceil($total/$this->sqlpresupuestos->LimitCount);

         $this->lblpagina->Caption = 'Total de Registros: '.$total.' Pagina '.$pagact.' de '.$paginas;

         if($this->sqlpresupuestos->LimitCount < $total)
         {
            $this->btnsiguiente->Enabled = false;
            $this->btnregresar->Enabled = false;
         }
         if(($total - $this->sqlpresupuestos->LimitCount) > 0)
            $this->btnsiguiente->Enabled = true;

         if(($total - $this->sqlpresupuestos->LimitStart) > 0)
            $this->btnregresar->Enabled = true;

         if(($total - $this->sqlpresupuestos->LimitStart) < $this->sqlpresupuestos->LimitCount)
            $this->btnsiguiente->Enabled = false;

         if($this->sqlpresupuestos->LimitStart == 0)
            $this->btnregresar->Enabled = false;

         if($this->btnregresar->Enabled == false && $this->btnsiguiente->Enabled == false)
            $this->btngo->Enabled = false;
         else
            $this->btngo->Enabled = true;

         $this->sqlpresupuestos->close();
         $this->sqlpresupuestos->SQL=$sql;
         $this->sqlexportar->SQL= $sql;
         $this->sqlpresupuestos->open();
         if($this->sqlpresupuestos->RecordCount == 0)
         {
            $this->cbofiltro->ItemIndex = 0;
            echo '<script language="javascript" type="text/javascript">
            alert("No se encontraron datos");
            </script>';
            $this->sqlpresupuestos->LimitStart = 0;
         }
       }

       function upresupuestosvistaCreate($sender, $params)
       {
       	if(Derechos('Accesar Presupuestos') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para Accesar Presupuestos");
               document.location.href("menu.php");
               </script>';
         	exit;
         }
       }

       function upresupuestosvistaShow($sender, $params)
       {
         $this->pbotones->Width = $_SESSION["width"];
         $this->lbtitulo->Caption= $this->Caption;
			$this->filtro();
       }


       function gridJSClick($sender, $params)
       {

       ?>
       //Add your javascript code here
         var model=grid.getTableModel();
         var row=grid.getFocusedRow();
         document.upresupuestosvista.hfidpresupuesto.value =model.getValue(0, row);
         document.upresupuestosvista.hfidrevision.value= model.getValue(1,row);
       <?php

       }

       function gridJSDblClick($sender, $params)
       {

       ?>
       //Add your javascript code here
         document.location.href("upresupuestos.php?idpresupuesto="+document.getElementById("hfidpresupuesto").value+
         "&idrevision="+document.getElementById("hfidrevision").value);
       <?php

       }


}

global $application;

global $upresupuestosvista;

//Creates the form
$upresupuestosvista=new upresupuestosvista($application);

//Read from resource file
$upresupuestosvista->loadResource(__FILE__);

//Shows the form
$upresupuestosvista->show();

?>