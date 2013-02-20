<?php

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
use_unit("buttons.inc.php");
use_unit("dbgrids.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class uaccionesvista extends Page
{
       public $cbestatus = null;
       public $Label2 = null;
       public $hfidaccion = null;
       public $gridacciones = null;
       public $sqlacciones = null;
       public $dsacciones = null;
       public $lbtitulo = null;
       public $btnexportar = null;
       public $cbofiltro = null;
       public $lblpagina = null;
       public $btnsiguiente = null;
       public $btnregresar = null;
       public $btngo = null;
       public $edgo = null;
       public $btnbuscar = null;
       public $edbuscar = null;
       public $Label1 = null;
       public $btneliminar = null;
       public $btnnuevo = null;
       public $pbotones = null;
       function uaccionesvistaJSLoad($sender, $params)
       {

       ?>
       //Add your javascript code here
         gridacciones.setWidth(document.body.offsetWidth - 40);
         gridacciones.setHeight(document.body.offsetHeight - 150);
         vcl.$('lblpagina_outer').style.top=document.body.offsetHeight-20;
       <?php

       }


       function btnexportarClick($sender, $params)
       {
         if(Derechos('Exportar Acciones')==false)
         {
            echo '<script language="javascript" type="text/javascript">
                    alert(\' No tienes Derechos para Exportar Acciones\');
                  </script>';
         }
         else
         {
            exportar($this->sqlacciones->sql,'Acciones');
         }
       }

       function btnsiguienteClick($sender, $params)
       {
         $this->sqlacciones->LimitStart =  $this->sqlacciones->LimitStart + $this->sqlacciones->LimitCount;
       }

       function btnregresarClick($sender, $params)
       {
         $this->sqlacciones->LimitStart =  $this->sqlacciones->LimitStart - $this->sqlacciones->LimitCount;
       }

       function btngoClick($sender, $params)
       {
         if(is_numeric($this->edgo->Text))
         	$this->sqlacciones->LimitStart = ($this->edgo->Text - 1) * $this->sqlacciones->LimitCount;
       }


       function btneliminarJSClick($sender, $params)
       {
       ?>
       //Add your javascript code here
         if(!confirm('Desea Eliminar la Accion Seleccionada?'))
            return(false);
         document.location.href("uacciones.php?idaccion="+document.getElementById("hfidaccion").value+"&elim=1");
       <?php
       }

       function btnnuevoClick($sender, $params)
       {
         if(Derechos('Alta Acciones') == false)
         	echo '<script language="javascript" type="text/javascript">
            			alert("No puede dar de Alta Acciones");
            		</script>';
      	else
				redirect("uacciones.php?idaccion=0&folio=0");
       }

       function uaccionesvistaShow($sender, $params)
       {
         $this->pbotones->Width = $_SESSION["width"];
         $this->lbtitulo->Caption= $this->Caption;
         $this->cbestatus->Clear();
         $this->cbestatus->AddItem('TODOS',null,0);
         $this->cbestatus->AddItem('PENDIENTE',null,109);
         $this->cbestatus->AddItem('EN REVISION',null,110);
         $this->cbestatus->AddItem('CERRADA',null,111);
         //$this->cbestatus->ItemIndex = 109;
         $this->filtro();
       }

       function uaccionesvistaCreate($sender, $params)
       {
       	if(Derechos('Accesar Acciones') == false)
         {
         	echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para Accesar Acciones");
               document.location.href("menu.php");
               </script>';
         	exit;
         }
       }

       function filtro()
       {
         if($this->cbestatus->ItemIndex != 0)
            $estatus = ' idestatus='.$this->cbestatus->ItemIndex;
         else
            $estatus = '';
         $cond=' ';
         switch($this->cbofiltro->ItemIndex)
         {
         case 0: $this->edbuscar->text ='';
                 $cond = ' idaccion>0';
                 break;
         case 1:  //idaccion
                  if(is_numeric($this->edbuscar->Text))
                     $cond = ' where idaccion='.$this->edbuscar->Text;
                  else
                     echo '<script language="javascript" type="text/javascript">
                             alert(\'No es un valor valido\');
                           </script>';
                  break;
         case 2:  //idclasificacion
						$cond = ' clasificacion like "%'.$this->edbuscar->Text.'%"';;
                  break;
         case 3:  //Originador
                  $cond = ' Originador like "%'.$this->edbuscar->Text.'%"';
                  break;
         case 4:  //idestatus
                  $cond = ' Estatus like "%'.$this->edbuscar->Text.'%"';
                  break;
         case 5:  //Proceso
                  $cond = ' Proceso like "%'.$this->edbuscar->Text.'%"';
                  break;
			case 6:  //Procedimiento
                  $cond = ' Procedimiento like "%'.$this->edbuscar->Text.'%"';
                  break;
			case 7:  //Responsable
                  $cond = ' Responsable like "%'.$this->edbuscar->Text.'%"';
                  break;
			case 8:  //Problema
                  $cond = ' Problema like "%'.$this->edbuscar->Text.'%"';
                  break;
			case 9:  //Analisis
                  $cond = ' Analisis like "%'.$this->edbuscar->Text.'%"';
                  break;
			case 10:  //correccion
                  $cond = ' Correccion like "%'.$this->edbuscar->Text.'%"';
                  break;
			case 11:  //Accion
                  $cond = ' Accion like "%'.$this->edbuscar->Text.'%"';
                  break;
			case 12:  //solicitacierre
                  $cond = ' Solicitacierre like "%'.$this->edbuscar->Text.'%"';
                  break;
			case 13:  //fechacreacion
                  $cond = ' Fechacreacion="'.$this->edbuscar->Text.'"';
                  break;
			case 14: //fechacompromiso
                  $cond = ' Fechacompromiso="'.$this->edbuscar->Text.'"';
                  break;
         case 15: //fechac cierre
                  $cond = ' Fechacierre="'.$this->edbuscar->Text.'"';
                  break;
         }
         if($estatus!='')
            $cond = $estatus.' and '.$cond;

			$sql='SELECT a.idaccion as IdAccion,if(a.idclasificacion=0,"Correctivo","Preventivo") as Clasificacion,
				   a.originador as Originador,a.idestatus,c.nombre as Estatus,ap.nombre as Proceso,
					apc.nombre as Procedimiento,concat(u.nombre," ",u.apaterno," ",u.amaterno) as Responsable,
               left(np.nota,250) as Problema,left(nan.nota,250) as Analisis,left(nc.nota,250) as Correccion,
               left(na.nota,250) as Accion,if(a.solicitacierre=1,"Si","No") as Solicitacierre,a.fechacreacion as Fechacreacion,
					a.fechacompromiso as Fechacompromiso,a.fechacierre as Fechacierre
					from acciones a
					left join clasificaciones c on a.idestatus=c.idclasificacion
					left join accionesprocesos ap on a.idproceso=ap.idproceso
					left join accionesprocedimientos apc on a.idprocedimiento=apc.idprocedimiento
					left join usuarios u on u.idusuario=a.idresponsable
               left join notasdet np on a.idnotaproblema=np.idnota
               left join notasdet na on a.idnotaaccion=na.idnota
               left join notasdet nc on a.idnotacorreccion=nc.idnota
               left join notasdet nan on a.idnotaanalisis=nan.idnota
               where ';
			if(Derechos('Ver todas las Acciones')==true)
            $sql=$sql.' a.idresponsable>0 group by idaccion';
         else if(Derechos('Ver Acciones por Area')==true)
            $sql = $sql.' u.idarea='.$_SESSION['idarea'];
         else
				$sql=$sql.' u.login="'.$_SESSION["login"].'" group by idaccion';
         $sql = 'select * from ('.$sql.') as tab where '.$cond.' order by idaccion desc';

			$rs=mysql_query('select count(*) from ('.$sql.') as t') or die("Error de consulta SQL: ".$sql);
         $row=mysql_fetch_row($rs);
         $total = $row[0];
         $this->sqlacciones->LimitCount = GetConfiguraciones('LimitCountGrids');
         $pagact = ($this->sqlacciones->LimitStart+$this->sqlacciones->LimitCount)/$this->sqlacciones->LimitCount;
         $paginas = ceil($total/$this->sqlacciones->LimitCount);

         $this->lblpagina->Caption = 'Total de Registros: '.$total.' Pagina '.$pagact.' de '.$paginas;

         if($this->sqlacciones->LimitCount < $total)
         {
            $this->btnsiguiente->Enabled = false;
            $this->btnregresar->Enabled = false;
         }
         if(($total - $this->sqlacciones->LimitCount) > 0)
            $this->btnsiguiente->Enabled = true;

         if(($total - $this->sqlacciones->LimitStart) > 0)
            $this->btnregresar->Enabled = true;

         if(($total - $this->sqlacciones->LimitStart) < $this->sqlacciones->LimitCount)
            $this->btnsiguiente->Enabled = false;

         if($this->sqlacciones->LimitStart == 0)
            $this->btnregresar->Enabled = false;

         if($this->btnregresar->Enabled == false && $this->btnsiguiente->Enabled == false)
            $this->btngo->Enabled = false;
         else
            $this->btngo->Enabled = true;

         $this->sqlacciones->close();
         $this->sqlacciones->SQL=$sql;
         $this->sqlacciones->open();

         if($this->sqlacciones->RecordCount == 0)
         {
            $this->cbofiltro->ItemIndex = 0;
            echo '<script language="javascript" type="text/javascript">
            alert("No se encontraron datos");
            </script>';
            $this->sqlacciones->LimitStart = 0;
         }
       }

       function gridaccionesJSDblClick($sender, $params)
       {
       ?>
       //Add your javascript code here
          document.location.href("uacciones.php?idaccion="+document.getElementById("hfidaccion").value);
       <?php

       }

       function gridaccionesJSClick($sender, $params)
       {
       ?>
       //Add your javascript code here
         var model=gridacciones.getTableModel();
         var row=gridacciones.getFocusedRow();
         document.uaccionesvista.hfidaccion.value =model.getValue(0, row);
       <?php

       }
}

global $application;

global $uaccionesvista;

//Creates the form
$uaccionesvista=new uaccionesvista($application);

//Read from resource file
$uaccionesvista->loadResource(__FILE__);

//Shows the form
$uaccionesvista->show();

?>