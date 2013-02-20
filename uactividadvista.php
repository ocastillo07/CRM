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
class uactividadvista extends Page
{
       public $dsactividad = null;
       public $sqlactividades = null;
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
       public $hfidactividad = null;
       public $btneliminar = null;
       public $btnnuevo = null;
       public $pbotones = null;
       public $gridactividad = null;
       function uactividadvistaJSLoad($sender, $params)
       {

       ?>
       //Add your javascript code here
       gridactividad.setWidth(document.body.offsetWidth - 40);
       gridactividad.setHeight(document.body.offsetHeight - 150);
       vcl.$('lblpagina_outer').style.top=document.body.offsetHeight-50;
       <?php

       }

       function btnexportarClick($sender, $params)
       {
         if(Derechos('Exportar Actividades')==false)
         {
            echo '<script language="javascript" type="text/javascript">
                    alert(\' No tienes Derechos para Exportar Actividades\');
                  </script>';
         }
         else
         {
            exportar($this->sqlactividades->sql,'Actividades');
         }
       }



       function btnsiguienteClick($sender, $params)
       {
         $this->sqlactividades->LimitStart =  $this->sqlactividades->LimitStart + $this->sqlactividades->LimitCount;
       }

       function btnregresarClick($sender, $params)
       {
         $this->sqlactividades->LimitStart =  $this->sqlactividades->LimitStart - $this->sqlactividades->LimitCount;
       }

       function btngoClick($sender, $params)
       {
         if(is_numeric($this->edgo->Text))
         $this->sqlactividades->LimitStart = ($this->edgo->Text - 1) * $this->sqlactividades->LimitCount;
       }

       function btnbuscarClick($sender, $params)
       {
         $this->filtro();
       }

       function btneliminarJSClick($sender, $params)
       {
       ?>
       //Add your javascript code here
         if(!confirm('Desea Eliminar la Actividad Seleccionada?'))
            return(false);
         document.location.href("uactividades.php?idactividad="+document.getElementById("hfidactividad").value+"&elim=1");
       <?php
       }

       function btnnuevoClick($sender, $params)
       {
         if(Derechos('Alta Actividades') == false)
         	echo '<script language="javascript" type="text/javascript">
            			alert("No puede dar de Alta Actividades");
            		</script>';
      	else
				redirect("uactividades.php?idactividad=0");
       }


       function uactividadvistaShow($sender, $params)
       {
         $this->pbotones->Width = $_SESSION["width"];
         $this->lbtitulo->Caption= $this->Caption;

       }

       function uactividadvistaCreate($sender, $params)
       {
       if(Derechos('Accesar Actividades') == false)
         {
         echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para Accesar Actividades");
               document.location.href("menu.php");
               </script>';
         exit;
         }
       else
       {
         $this->filtro();
        }
       }

       function filtro()
       {
         $nom = NombreCliente('c');
         $cond='';
         switch($this->cbofiltro->ItemIndex)
         {
         case 1:  //idactividad
                  if(is_numeric($this->edbuscar->Text))
                     $cond = ' and idactividad='.$this->edbuscar->Text;
                  else
                     echo '<script language="javascript" type="text/javascript">
                             alert(\'No es un valor valido\');
                           </script>';
                  break;
         case 2:  //Vendedor
                  $cond = ' and concat(u.nombre," ",u.apaterno," ",u.amaterno) like "%'.$this->edbuscar->Text.'%"';
                  break;
         case 3:  //FechaActividad
                  $cond = ' and fechaactividad>"'.$this->edbuscar->Text.'"';
                  break;
         case 5:  //Asunto
                  $cond = ' and cla.nombre like "%'.$this->edbuscar->Text.'%"';
                  break;
         case 4:  //Cliente
                  $cond = ' and '.$nom.' like "%'.$this->edbuscar->Text.'%"';
                  break;
         }

         $sql =  'select a.idactividad,concat(u.nombre," ",u.apaterno," ",u.amaterno) as vendedor,'.
         ' cla.nombre as asunto,clas.nombre as Estatus, a.descripcion,  a.fechaactividad as fechaactividad,horainicio,horafin, '.
         $nom.'  as cliente from actividades a'.
         ' left join clientes c on a.idcliente=c.idcliente'.
         ' left join usuarios u on u.idusuario= a.idvendedor'.
         ' left join actividadesasuntos cla on cla.idasunto=a.idasunto
			  left join clasificaciones clas on clas.idclasificacion=a.idestatus';

        if(Derechos('Ver todas las Actividades')==true)
            $sql=$sql.' where a.idvendedor>0 '.$cond.' order by idactividad desc';
         else
            $sql=$sql.' where login="'.$_SESSION["login"].'" '.$cond.' order by idactividad desc';

         $sqls='select count(*) as total from ('.$sql.') as t';
        /* if(Derechos('Ver todas las Actividades')==true)
            $sql=$sql.' where a.idvendedor>0 '.$cond.' order by idactividad';
         else
            $sql=$sql.' where login="'.$_SESSION["login"].'" '.$cond.' order by idactividad';*/
         $rs=mysql_query($sqls) or die("Error de consulta SQL: ".$sqls);
         $row=mysql_fetch_row($rs);
         $total = $row[0];
         $this->sqlactividades->LimitCount = GetConfiguraciones('LimitCountGrids');
         $pagact = ($this->sqlactividades->LimitStart+$this->sqlactividades->LimitCount)/$this->sqlactividades->LimitCount;
         $paginas = ceil($total/$this->sqlactividades->LimitCount);

         $this->lblpagina->Caption = 'Total de Registros: '.$total.' Pagina '.$pagact.' de '.$paginas;

         if($this->sqlactividades->LimitCount < $total)
         {
            $this->btnsiguiente->Enabled = false;
            $this->btnregresar->Enabled = false;
         }
         if(($total - $this->sqlactividades->LimitCount) > 0)
            $this->btnsiguiente->Enabled = true;

         if(($total - $this->sqlactividades->LimitStart) > 0)
            $this->btnregresar->Enabled = true;

         if(($total - $this->sqlactividades->LimitStart) < $this->sqlactividades->LimitCount)
            $this->btnsiguiente->Enabled = false;

         if($this->sqlactividades->LimitStart == 0)
            $this->btnregresar->Enabled = false;

         if($this->btnregresar->Enabled == false && $this->btnsiguiente->Enabled == false)
            $this->btngo->Enabled = false;
         else
            $this->btngo->Enabled = true;

         $this->sqlactividades->close();
       /*  $sql= 'select a.idactividad,concat(u.nombre," ",u.apaterno," ",u.amaterno) as vendedor,'.
         ' cla.nombre as asunto,clas.nombre as Estatus, a.descripcion,  a.fechaactividad as fechaactividad,horainicio,horafin, '.
         $nom.'  as cliente from actividades a'.
         ' left join clientes c on a.idcliente=c.idcliente'.
         ' left join usuarios u on u.idusuario= a.idvendedor'.
         ' left join actividadesasuntos cla on cla.idasunto=a.idasunto
			  left join clasificaciones clas on clas.idclasificacion=a.idestatus';

        if(Derechos('Ver todas las Actividades')==true)
            $sql=$sql.' where a.idvendedor>0 '.$cond.' order by idactividad';
         else
            $sql=$sql.' where login="'.$_SESSION["login"].'" '.$cond.' order by idactividad';  */

         $this->sqlactividades->SQL=$sql;
         $this->sqlactividades->open();

         if($this->sqlactividades->RecordCount == 0)
         {
            $this->cbofiltro->ItemIndex = 0;
            echo '<script language="javascript" type="text/javascript">
            alert("No se encontraron datos");
            </script>';
            $this->sqlactividades->LimitStart = 0;
         }
       }

       function btnnuevoJSClick($sender, $params)
       {

       ?>
       //Add your javascript code here

       <?php

       }

       function gridactividadJSDblClick($sender, $params)
       {
       ?>
       //Add your javascript code here
          document.location.href("uactividades.php?idactividad="+document.getElementById("hfidactividad").value);
       <?php

       }

       function gridactividadJSClick($sender, $params)
       {
         //$this->sqlactividades->fieldget("idactividad");
         //$this->gridactividad->
       ?>
       //Add your javascript code here
         // document.uactividadvista.hfidactividad.value=gridactividad.getTableModel().getValue(1,gridactividad.getFocusedRow());
         //document.uactividadvista.hfidactividad.value=sqlactividades.fieldget("idactividad");
         var model=gridactividad.getTableModel();
         var row=gridactividad.getFocusedRow();
         document.uactividadvista.hfidactividad.value =model.getValue(0, row);
       <?php

       }

}

global $application;

global $uactividadvista;

//Creates the form
$uactividadvista=new uactividadvista($application);

//Read from resource file
$uactividadvista->loadResource(__FILE__);

//Shows the form
$uactividadvista->show();

?>