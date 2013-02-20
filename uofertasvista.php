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
class uofertasvista extends Page
{
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
   public $dsofertas = null;
   public $sqlofertas = null;
   public $hfidoferta = null;
   public $btneliminar = null;
   public $btnnuevo = null;
   function uofertasvistaJSLoad($sender, $params)
   {

?>
       //Add your javascript code here
       //alert(document.body.offsetWidth+ ' '+ window.screen.width);
       grid.setWidth(document.body.offsetWidth - 40);
       grid.setHeight(document.body.offsetHeight - 150); //150
       vcl.$('lblpagina_outer').style.top=document.body.offsetHeight-50;
<?php

   }

   function btnsiguienteClick($sender, $params)
   {
      $this->sqlofertas->LimitStart = $this->sqlofertas->LimitStart + $this->sqlofertas->LimitCount;
   }

   function btnregresarClick($sender, $params)
   {
      $this->sqlofertas->LimitStart = $this->sqlofertas->LimitStart - $this->sqlofertas->LimitCount;
   }

   function btngoClick($sender, $params)
   {
      if(is_numeric($this->edgo->Text))
         $this->sqlofertas->LimitStart = ($this->edgo->Text - 1) * $this->sqlofertas->LimitCount;
   }



   function btnnuevoClick($sender, $params)
   {
      if(Derechos('Alta Ofertas') == false)
         echo '<script language="javascript" type="text/javascript">
            			alert("No puede dar de Alta ofertas");
            		</script>';
      else
         redirect("uofertas.php?idoferta=0");
   }


   function btnexportarClick($sender, $params)
   {
      if(Derechos('Exportar Ofertas') == false)
      {
         echo '<script language="javascript" type="text/javascript">
                    alert(\' No tienes Derechos para Exportar Ofertas\');
                  </script>';
      }
      else
      {
         exportar($this->sqlofertas->SQL, 'Ofertas');
      }
   }

   function btneliminarJSClick($sender, $params)
   {

?>
       //Add your javascript code here
          if(!confirm('Desea Eliminar la Oferta Seleccionada?'))
            return(false)

			var model=grid.getTableModel();
       	var row=grid.getFocusedRow();
       	document.location.href("uofertas.php?idoferta="+model.getValue(0, row)+
										  "&idrevision="+model.getValue(1, row)+"&elim=1");
<?php
   }

   function btnbuscarClick($sender, $params)
   {
      $this->filtro();
   }


   function filtro()
   {
      $nom = NombreCliente('c');
      switch($this->cbofiltro->ItemIndex)
      {
         case 1:
            //idoferta
            if(is_numeric($this->edbuscar->Text))
               $cond = ' and idoferta=' . $this->edbuscar->Text;
            else
               echo '<script language="javascript" type="text/javascript">
                             alert(\'No es un valor entero\');
                           </script>';
            break;
         case 2:
            //plaza
            $cond = ' and p.nombre like "%' . $this->edbuscar->Text . '%"';
            break;
         case 3:
            //Cliente
            $cond = ' and ' . $nom . ' like "%' . $this->edbuscar->Text . '%"';
            break;
         case 4:
            //vendedor
            $cond = ' and  concat(u.nombre," ",u.apaterno," ",u.amaterno) like "%' .
            $this->edbuscar->Text . '%"';
            break;
         case 5:
            //modelo
            $cond = ' and modelo like "%' . $this->edbuscar->Text . '%"';
            break;
         case 6:
            //Financiamiento
            $cond = ' and cla.nombre like "%' . $this->edbuscar->Text . '%"';
            break;
         case 7:
            //tipocamion
            $cond = ' and ct.nombre like "%' . $this->edbuscar->Text . '%"';
            break;
         case 8:
            //fase
            $cond = ' and f.nombre like "%' . $this->edbuscar->Text . '%"';
            break;
         case 9:
            //estatus
            $cond = ' and cl.nombre like "%' . $this->edbuscar->Text . '%"';
            break;
         case 10:
            //chasis
            if(is_numeric($this->edbuscar->Text))
               $cond = ' and costochasis>="' . $this->edbuscar->Text . '"';
            else
               echo '<script language="javascript" type="text/javascript">
                           alert(\'No es un valor numerico\');
                           </script>';
            break;
         case 11:
            //carroceria
            if(is_numeric($this->edbuscar->Text))
               $cond = ' and costocarroceria>="' . $this->edbuscar->Text . '"';
            else
               echo '<script language="javascript" type="text/javascript">
                           alert(\'No es un valor numerico\');
                           </script>';
            break;
         case 12:
            //accesorios
            if(is_numeric($this->edbuscar->Text))
               $cond = ' and costoaccesorios>="' . $this->edbuscar->Text . '"';
            else
               echo '<script language="javascript" type="text/javascript">
                             alert(\'No es un valor numerico\');
                           </script>';
            break;
         case 13:
            //costototal
            if(is_numeric($this->edbuscar->Text))
               $cond = ' and costo>="' . $this->edbuscar->Text . '"';
            echo '<script language="javascript" type="text/javascript">
                             alert(\'No es un valor numerico\');
                           </script>';
            break;
         case 14:
            //precio
            if(is_numeric($this->edbuscar->Text))
               $cond = ' and precio>="' . $this->edbuscar->Text . '"';
            else
               echo '<script language="javascript" type="text/javascript">
                             alert(\'No es un valor numerico\');
                           </script>';
            break;
         case 15:
            //descuento
            if(is_numeric($this->edbuscar->Text))
               $cond = ' and descuento>="' . $this->edbuscar->Text . '"';
            else
               echo '<script language="javascript" type="text/javascript">
                             alert(\'No es un valor numerico\');
                           </script>';
            break;
         case 16:
            //total
            if(is_numeric($this->edbuscar->Text))
               $cond = ' and total>=' . $this->edbuscar->Text;
            else
               echo '<script language="javascript" type="text/javascript">
                             alert(\'No es un valor numerico\');
                           </script>';
            break;
         case 17:
            //Margen
            if(is_numeric($this->edbuscar->Text))
               $cond = ' and pmargen>=' . $this->edbuscar->Text;
            else
               echo '<script language="javascript" type="text/javascript">
                             alert(\'No es un valor entero\');
                           </script>';
            break;
         case 18:
            //fechacreacion
            $cond = ' and fechacreacion>="' . $this->edbuscar->Text . '"';
            break;
         case 19:
            //ano
            if(is_numeric($this->edbuscar->Text))
               $cond = ' and ano="' . $this->edbuscar->Text . '"';
            else
               echo '<script language="javascript" type="text/javascript">
                             alert(\'No es un valor entero\');
                           </script>';
            break;

         case 20:
            //idproducto
            if(is_numeric($this->edbuscar->Text))
               $cond = ' and pro.idproducto = "' . $this->edbuscar->Text . '"';
            else
               echo '<script language="javascript" type="text/javascript">
                             alert(\'No es un valor entero\');
                           </script>';
            break;
            break;
      }
      $from = 'from ofertas o
                left join productos pro on o.idproducto=pro.idproducto
					      left join clientes c on c.idcliente=o.idcliente
                left join plazas p on p.idplaza=o.idplaza
                left join camionestipos ct  on ct.idtipo=o.idtipocamion
                left join clasificaciones cl on cl.idclasificacion= o.idestatus
					      left join clasificaciones cla on cla.idclasificacion = o.idfinanciamiento
                left join ofertasfases f on f.idfase=o.idfase
                left join usuarios u on u.idusuario=o.idvendedor';

      $sql = 'select count(*) as total ' . $from;
      /*from ofertas o
      left join clientes c on c.idcliente=o.idcliente
      left join plazas p on p.idplaza=o.idplaza
      left join camionestipos ct  on ct.idtipo=o.idtipocamion
      left join clasificaciones cl on cl.idclasificacion= o.idestatus
      left join clasificaciones cla on cla.idclasificacion = o.idfinanciamiento
      left join ofertasfases f on f.idfase=o.idfase
      left join usuarios u on u.idusuario=o.idvendedor';         */

      if(Derechos('Todas las ofertas') == true)
         $sql = $sql . ' where p.idplaza>0';
      else if(Derechos('Solo Ofertas Plaza') == true)
      {
         $plaza = 'select idplaza from usuarios where login="' . $_SESSION["login"] . '"';
         $rs = mysql_query($plaza)or die('Error de consulta SQL: ' . $plaza);
         $row = mysql_fetch_row($rs);
         $sql = $sql . ' where p.idplaza=' . $row[0];
      }
      else
         $sql = $sql . ' where login="' . $_SESSION["login"] . '" ';
      $sql = $sql . $cond . ' ORDER BY idoferta desc,idrevision desc';

      $rs = mysql_query($sql)or die("Error de consulta SQL: " . $sql);
      $row = mysql_fetch_row($rs);
      $total = $row[0];
      $this->sqlofertas->LimitCount = GetConfiguraciones('LimitCountGrids');
      $pagact = ($this->sqlofertas->LimitStart + $this->sqlofertas->LimitCount) / $this->sqlofertas->LimitCount;
      $paginas = ceil($total / $this->sqlofertas->LimitCount);

      $this->lblpagina->Caption = 'Total de Registros: ' . $total . ' Pagina ' . $pagact . ' de ' . $paginas;

      if($this->sqlofertas->LimitCount < $total)
      {
         $this->btnsiguiente->Enabled = false;
         $this->btnregresar->Enabled = false;
      }
      if(($total - $this->sqlofertas->LimitCount) > 0)
         $this->btnsiguiente->Enabled = true;

      if(($total - $this->sqlofertas->LimitStart) > 0)
         $this->btnregresar->Enabled = true;

      if(($total - $this->sqlofertas->LimitStart) < $this->sqlofertas->LimitCount)
         $this->btnsiguiente->Enabled = false;

      if($this->sqlofertas->LimitStart == 0)
         $this->btnregresar->Enabled = false;

      if($this->btnregresar->Enabled == false && $this->btnsiguiente->Enabled == false)
         $this->btngo->Enabled = false;
      else
         $this->btngo->Enabled = true;

      $this->sqlofertas->close();
      $sql = 'select idoferta, idrevision,p.nombre as plaza, concat(u.nombre," ",u.apaterno," ",u.amaterno) as vendedor,
               ' . $nom . '  as cliente, ct.nombre as tipocamion,fechacreacion, modelo, pro.idproducto as producto, pro.comentario,
					if(idfinanciamiento=0,"Sin Asignar",cla.nombre) as Financiamiento,
                pmargen, cl.nombre as estatus,f.nombre as fase, ano,
                round(costochasis,2) as costochasis,round(costocarroceria,2) as costocarroceria,
                round(costoaccesorios,2) as costoaccesorios,
                round(o.costo,2) as costo,round(descuento,2) as descuento,
                round(precio,2) as precio,round(total,2) as total
                ' . $from;
      if(Derechos('Todas las ofertas'))
         $sql = $sql . ' where p.idplaza>0';
      else if(Derechos('Solo Ofertas Plaza'))
      {
         $plaza = 'select idplaza from usuarios where login="' . $_SESSION["login"] . '"';
         $rs = mysql_query($plaza)or die('Error de consulta SQL: ' . $plaza);
         $row = mysql_fetch_row($rs);
         $sql = $sql . ' where p.idplaza=' . $row[0];
      }
      else
         $sql = $sql . ' where login="' . $_SESSION["login"] . '" ';
      $sql = $sql . $cond . ' ORDER BY idoferta desc,idrevision desc';

      $this->sqlofertas->SQL = $sql;
      $this->sqlexportar->SQL = $sql;
      $this->sqlofertas->open();

      if($this->sqlofertas->RecordCount == 0)
      {
         $this->cbofiltro->ItemIndex = 0;
         echo '<script language="javascript" type="text/javascript">
            alert("No se encontraron datos");
            </script>';
         $this->sqlofertas->LimitStart = 0;
         //$this->filtro();
      }
   }

   function uofertasvistaCreate($sender, $params)
   {
      if(Derechos('Accesar Ofertas') == false)
      {
         echo '<script language="javascript" type="text/javascript">
               alert("Usted no tiene derechos para Accesar Ofertas");
               document.location.href("menu.php");
               </script>';
         exit;
      }
      else
         $this->filtro();
   }

   function uofertasvistaShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
   }


   function gridJSClick($sender, $params)
   {

?>
       //Add your javascript code here
         var model=grid.getTableModel();
         var row=grid.getFocusedRow();
         document.uofertasvista.hfidoferta.value =model.getValue(0, row);
         document.uofertasvista.hfidrevision.value= model.getValue(1,row);
         document.uofertasvista.hfcliente.value= model.getValue(4,row);
<?php

   }

   function gridJSDblClick($sender, $params)
   {

?>
       //Add your javascript code here
         document.location.href("uofertas.php?idoferta="+document.getElementById("hfidoferta").value+
         "&idrevision="+document.getElementById("hfidrevision").value);
<?php

   }


}

global $application;

global $uofertasvista;

//Creates the form
$uofertasvista = new uofertasvista($application);

//Read from resource file
$uofertasvista->loadResource(__FILE__);

//Shows the form
$uofertasvista->show();

?>