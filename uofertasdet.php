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
class uofertasdet extends Page
{
       public $lbtitulo = null;
       public $edregresar = null;
       public $pbotones = null;
       public $btnguardarcerrar = null;
       public $mespecial = null;
       public $hfidproducto = null;
       public $btneliminar = null;
       public $dstbofertasdet = null;
       public $hfidoferta = null;
       public $sqlgeneral = null;
       public $tbofertasdet = null;
       public $Btnregresar = null;
       public $btnguardar = null;
       public $sqlofertadet = null;
       public $dsofertasdet = null;
       public $Label1 = null;
       public $detalle = null;
       public $grid = null;
       public $Label6 = null;
       public $btnagregar = null;
       public $cboaccesorio = null;
       public $cbotipo = null;
       public $idoferta=null;

       function btnguardarClick($sender, $params)
       {

         dmconexion::Log("Guardo el detalle de Oferta No. ".$this->hfidoferta->value,3);
         redirect('uofertas.php?idofertadet='.$this->hfidoferta->Value);
       }

       function BtnregresarClick($sender, $params)
       {
         redirect('uofertas.php?idofertadet='.$this->hfidoferta->Value);

       }

       function btneliminarClick($sender, $params)
       {
         if($this->hfidproducto->Value==0 )
         {
            echo '<script language="javascript" type="text/javascript">
                    alert(\'Debes de seleccionar un Producto para Eliminiar\');
                  </script>';
         }
         else
         {
				$this->sqlgeneral->close();
         	$this->sqlgeneral->SQL='select round(od.costo,2) as costo,round(od.precio,2) as precio,
				p.idtipo,p.moneda from ofertasdet od left join 
				productos p on p.idproducto=od.idproducto where od.idproducto='.
         	$this->hfidproducto->Value;
         	$this->sqlgeneral->open();
				if($this->sqlgeneral->RecordCount>0)
				{
					$sql='select moneda,tc from ofertas where idoferta='.$this->hfidoferta->Value;
					$rs=mysql_query($sql) or die('Error de SQL: '.$sql);
					$row=mysql_fetch_row($rs);
				
					//actualizar oferta
					if($this->sqlgeneral->fieldget('idtipo')=='2')  
						$campo='costocarroceria';           
					if($this->sqlgeneral->fieldget('idtipo')=='3') 
						$campo='costoaccesorios';
				
					if($row[0]=='2' && $this->sqlgeneral->fieldget('moneda')=='1') 
						$sql='update ofertas set '.$campo.'=round('.$campo.'-'.
							$this->sqlgeneral->fieldget('costo')/$row[1].
							',2),precio=round(precio-'.round($this->sqlgeneral->fieldget('precio')/$row[1],2).
							',2) where idoferta='.$this->hfidoferta->Value;     
					else if($row[0]=='1' && $this->sqlgeneral->fieldget('moneda')=='2')
						$sql='update ofertas set '.$campo.'=round('.round($campo.'-'.
							$this->sqlgeneral->fieldget('costo')*$row[1],2).
							',2),precio=round(precio-'.round($this->sqlgeneral->fieldget('precio')*$row[1],2).
							',2) where idoferta='.$this->hfidoferta->Value;
					else
						$sql='update ofertas set '.$campo.'=round('.$campo.'-'.
							$this->sqlgeneral->fieldget('costo').',2),precio=round(precio-'.
							$this->sqlgeneral->fieldget('precio').
							',2) where idoferta='.$this->hfidoferta->Value;
			 
					$rs=mysql_query($sql) or die('Error de SQL: '.$sql);
				 
       			$sql='update ofertas set costo=round(costochasis+costocarroceria+costoaccesorios,2),
					total=round(precio,2) where idoferta='.$this->hfidoferta->Value;
					$rs=mysql_query($sql) or die('Error de SQL: '.$sql);      
				
					$sql='delete from ofertasdet where idoferta='.$this->hfidoferta->Value.
               ' and idproducto='.$this->hfidproducto->Value;
            	$rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
            	dmconexion::Log("Elimino el Articulo no. ".$this->hfidproducto->value.' No. Oferta '.
            	$this->hfidoferta->Value,3);
				}
				$this->hfidproducto->Value=0; 
         }
       }


       function gridJSClick($sender, $params)
       {

       ?>
       //Add your javascript code here
            var model=grid.getTableModel();
            var row=grid.getFocusedRow();
            document.getElementById('hfidproducto').value=model.getValue(0, row);
       <?php

       }


       function cbotipoChange($sender, $params)
       {
          //accesorios
         $this->cboaccesorio->Clear();
         $this->sqlgeneral->close();
         $this->sqlgeneral->sql = 'select idproducto,descripcion from productos where idtipo='.
                                   $this->cbotipo->ItemIndex;
         $this->sqlgeneral->open();
         while($this->sqlgeneral->EOF != true)
         {
            $this->cboaccesorio->AddItem($this->sqlgeneral->fieldget('descripcion'),null,$this->sqlgeneral->fieldget('idproducto'));
            $this->sqlgeneral->next();
         }
       }

       function btnagregarClick($sender, $params)
       {
        // global $idoferta;
         $this->sqlgeneral->close();
         $this->sqlgeneral->SQL='select round(costo,2) as costo,round(preciominimo,2) as preciominimo, '.
         'idtipo,moneda from productos where idproducto='.
         $this->cboaccesorio->ItemIndex;
         $this->sqlgeneral->open();
        
			//insertar el articulo
         $this->tbofertasdet->open();
         $this->tbofertasdet->insert();
         $this->tbofertasdet->fieldset('idoferta',$this->hfidoferta->Value);
         $this->tbofertasdet->fieldset('idproducto',$this->cboaccesorio->ItemIndex);
         $this->tbofertasdet->fieldset('costo',$this->sqlgeneral->fieldget('costo'));
         $this->tbofertasdet->fieldset('precio',$this->sqlgeneral->fieldget('preciominimo'));
         $this->tbofertasdet->fieldset('usuario',$_SESSION['login']);
         $this->tbofertasdet->fieldset('fecha',date('Y/m/d'));
         $this->tbofertasdet->fieldset('hora',date('H:i:s'));
         $this->tbofertasdet->post();
         $this->sqlofertadet->refresh();  
			
			if($this->sqlgeneral->fieldget('idtipo')=='2')
				$campo='costocarroceria';
			if($this->sqlgeneral->fieldget('idtipo')=='3')
				$campo='costoaccesorios';    
			
			 //traer de la oferta tc moneda
			$sql='select moneda,tc from ofertas where idoferta='.$this->hfidoferta->Value;
			$rs=mysql_query($sql) or die('Error de SQL: '.$sql);
			$row=mysql_fetch_row($rs);
			
			
			 //tipo cambio en ofertas y el detalle son diferenes hacer conversion
			if($row[0]=='2' && $this->sqlgeneral->fieldget('moneda')=='1')  
				$sql='update ofertas set '.$campo.'=round('.$campo.'+'.
							round($this->sqlgeneral->fieldget('costo')/$row[1],2).
							',2),precio=round(precio+'.round($this->sqlgeneral->fieldget('preciominimo')/$row[1],2).
							',2) where idoferta='.$this->hfidoferta->Value;       
			else if($row[0]=='1' && $this->sqlgeneral->fieldget('moneda')=='2')
				$sql='update ofertas set '.$campo.'=round('.$campo.'+'.
							round($this->sqlgeneral->fieldget('costo')*$row[1],2).
							',2),precio=round(precio+'.round($this->sqlgeneral->fieldget('preciominimo')*$row[1],2).
							',2) where idoferta='.$this->hfidoferta->Value;
			else
				$sql='update ofertas set '.$campo.'=round('.$campo.'+'.
							$this->sqlgeneral->fieldget('costo').',2),precio=round(precio+'.
							$this->sqlgeneral->fieldget('preciominimo').
							',2) where idoferta='.$this->hfidoferta->Value;
			$rs=mysql_query($sql) or die('Error de SQL: '.$sql);
			
       	$sql='update ofertas set costo=round(costochasis+costocarroceria+costoaccesorios,2),
					total=round(precio,2) where idoferta='.$this->hfidoferta->Value;
			$rs=mysql_query($sql) or die('Error de SQL: '.$sql); 
       }

       function uofertasdetShow($sender, $params)
       {
         $this->pbotones->Width = $_SESSION["width"];
         $this->lbtitulo->Caption= $this->Caption;
         if(isset($_GET['idoferta']))
         {
            $this->hfidoferta->Value=$_GET['idoferta'];
            $this->sqlofertadet->close();
            $this->sqlofertadet->Filter='idoferta='.$_GET['idoferta'];
            $this->sqlofertadet->refresh();
            $this->inicializa();
         }
       }

       function inicializa()
       {
         //tipos productos
         $sql='select idtipo,nombre from productostipos where idtipo<>1';
         $rs=mysql_query($sql) or die ("Error de cosulta SQL :".$sql);
         while($row=mysql_fetch_array($rs))
            $this->cbotipo->AddItem($row['nombre'],null,$row['idtipo']);
         //iddefault
         $this->cbotipo->ItemIndex= GetConfiguraciones('idtipoprodefault');

         //productos
         $sql='select idproducto,descripcion from productos where idtipo='.$this->cbotipo->ItemIndex;
         $rs=mysql_query($sql) or die('Error de consulta SQL: '.$sql);
         while($row=mysql_fetch_array($rs))
            $this->cboaccesorio->AddItem($row['descripcion'],null,$row['idproducto']);
       }

}

global $application;

global $uofertasdet;

//Creates the form
$uofertasdet=new uofertasdet($application);

//Read from resource file
$uofertasdet->loadResource(__FILE__);

//Shows the form
$uofertasdet->show();

?>