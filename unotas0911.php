<?php
//ozkar 2010-01-20 ultima modificacion


include("dmconexion.php");
include("urecursos.php");
session_start();
if(!isset($_SESSION["login"]))
{
   redirect("login.php");
}
require_once("vcl/vcl.inc.php");
//Includes
use_unit("menus.inc.php");
use_unit("comctrls.inc.php");
use_unit("mysql.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class unotas extends Page
{
   public $lblhistorial = null;
   public $lbtitulo = null;
   public $hfidrevision = null;
   public $btnregresar = null;
   public $mmnuevo = null;
   public $hfidnom = null;
   public $hfprocedencia = null;
   public $hfidprocedencia = null;
   public $sqlnotas = null;
   public $hfidnota = null;
   public $Label2 = null;
   public $Label1 = null;
   public $pbotones = null;
   public $btngcerrar = null;
   public $btnguardar = null;

   function btnregresarClick($sender, $params)
   {
      if($this->hfprocedencia->Value == 'ofertas')
         redirect("u" . $this->hfprocedencia->Value . ".php?" . $this->hfidnom->Value . "=" . $this->hfidprocedencia->Value .
         "&idrevision=" . $this->hfidrevision->Value . "&idnota=" . $this->hfidnota->Value);
      else if($this->hfprocedencia->Value == 'represupuestos')
         redirect("upresupuestos.php?" . $this->hfidnom->Value . "=" . $this->hfidprocedencia->Value .
         "&idrevision=" . $this->hfidrevision->Value . "&idnota=" . $this->hfidnota->Value);
      else
         redirect("u" . $this->hfprocedencia->Value . ".php?" . $this->hfidnom->Value . "=" . $this->hfidprocedencia->Value);
   }

   function btngcerrarClick($sender, $params)
   {
      $this->Guardar();
      if($this->hfprocedencia->Value == 'ofertas')
         redirect("u" . $this->hfprocedencia->Value . ".php?" . $this->hfidnom->Value . "=" . $this->hfidprocedencia->Value .
         "&idrevision=" . $this->hfidrevision->Value . "&idnota=" . $this->hfidnota->Value);
      else if($this->hfprocedencia->Value == 'represupuestos')
         redirect("upresupuestos.php?" . $this->hfidnom->Value . "=" . $this->hfidprocedencia->Value .
         "&idrevision=" . $this->hfidrevision->Value . "&idnota=" . $this->hfidnota->Value);
      else
         redirect("u" . $this->hfprocedencia->Value . ".php?" . $this->hfidnom->Value . "=" . $this->hfidprocedencia->Value);
   }

   function btnguardarClick($sender, $params)
   {
      $this->Guardar();
      if($this->hfprocedencia->Value == 'ofertas' || $this->hfprocedencia->Value == 'represupuestos')
         redirect("unotas.php?idnota=" . $this->hfidnota->Value . "&procedencia=" . $this->hfprocedencia->value .
         "&idprocedencia=" . $this->hfidprocedencia->Value . "&idrevision=" . $this->hfidrevision->Value . "&idnota=" . $this->hfidnota->Value);
      else
         redirect("unotas.php?idnota=" . $this->hfidnota->Value . "&procedencia=" . $this->hfprocedencia->value .
         "&idprocedencia=" . $this->hfidprocedencia->Value);
   }

   function unotasShow($sender, $params)
   {
      $this->pbotones->Width = $_SESSION["width"];
      $this->lbtitulo->Caption = $this->Caption;
      if(isset($_GET["idnota"]) == true)
      {
         $this->hfidnota->Value = $_GET["idnota"];
         $this->hfprocedencia->Value = $_GET['procedencia'];
         $this->hfidprocedencia->Value = $_GET['idprocedencia'];
         $this->hfidrevision->Value = $_GET['idrevision'];
         if(isset($_GET['idnom']))
            $this->hfidnom->Value = $_GET['idnom'];
         else
            $this->inicializaforma();
         $this->Limpiar();
         $this->Locate();
         //$this->Alta();
      }
   }

   function Alta()
   {
      if(isset($_GET["idnota"]) == true)
         $this->hfidnota->Value = $_GET["idnota"];
      if($this->hfidnota->Value == 0)
      {
         $sql = "Update " . $this->hfprocedencia->Value . " set idnota =" . $this->hfidnota->Value .
         " where " . $this->hfidnom->Value . " = " . $this->hfidprocedencia->Value . " and idnota=0";
         $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
      }
   }

   function Locate()
   {
      $this->sqlnotas->close();
      $r = ufh('n');
      $this->sqlnotas->SQL = 'Select n.nota, ' . str_replace("Modificado", "Elaborado ", $r) . ' as ufh ' .
      'from notasdet n ' .
      'where idnota = ' . $this->hfidnota->Value . ' order by fecha desc,hora desc';
      $this->sqlnotas->open();

      $colores[0] = "#ff5500";
      $colores[1] = "#004080";
      while(!$this->sqlnotas->EOF == true)
      {
         if(($this->sqlnotas->RecNo % 2) == 0)
            $c = 0;
         else
            $c = 1;
         $t .= '<br><strong>
							<font color=' . $colores[$c] . '>' . strtoupper($this->sqlnotas->fieldget('nota')) . '
							</font>
						</strong><br>';
         $t .= '<strong>
							<font color=' . $colores[$c] . '>' . $this->sqlnotas->fieldget('ufh') . '
							</font>
						</strong><br>';
         $this->sqlnotas->next();
      }
      $this->lblhistorial->Caption = $t;
   }

   function Guardar()
   {
      if($this->mmnuevo->Text != '')
      {
         str_replace("'", '`', $this->mmnuevo->Text);
         if($this->hfidnota->Value == '0')
         {
            $this->hfidnota->Value = MaxId('notas', 'idnota') + 1;
            $sql = "Update " . $this->hfprocedencia->Value . " set idnota=" . $this->hfidnota->Value .
            " where " . $this->hfidnom->Value . " = " . $this->hfidprocedencia->Value;
            $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());

            $sql = "Insert into notas (idprocedencia, procedencia, usuario, fecha, hora) " .
            "values (" . $this->hfidprocedencia->value . ",'" . $this->hfprocedencia->Value . "','" .
            $_SESSION['login'] . "', " . "curdate(), curtime())";
            $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
         }
         //$nota = str_replace("'", "\'", $this->mmnuevo->Text);
         $nota = $this->mmnuevo->Text;

         $sql = "Insert into notasdet (idnota, nota, usuario, fecha, hora) " .
         "values (" . $this->hfidnota->Value . ", '" . replacememo($nota) . "', " .
         "'" . $_SESSION['login'] . "', " . "curdate(), curtime())";
         $result = mysql_query($sql)or die("error sql: " . $sql . " " . mysql_error());
         $msg = 'Inserto nota de ' . $this->hfprocedencia->Value . ' al ID ' . $this->hfidprocedencia->Value;
         dmconexion::Log($msg, 1);
      }
   }

   function inicializaforma()
   {
      if(isset($_GET['hfidnom']))
         $this->hfidnom->Value = $_GET['hfidnom'];
      else
      {

         switch($this->hfprocedencia->Value)
         {
            case 'clientes':
            {
               $this->hfidnom->Value = 'idcliente';
               break;
            }
            case 'ofertas':
            {
               $this->hfidnom->Value = 'idoferta';
               break;
            }
            case 'actividades':
            {
               $this->hfidnom->Value = 'idactividad';
               break;
            }
            case 'acciones':
            {
               $this->hfidnom->Value = 'idaccion';
               break;
            }

            case 'solinformatica' && 'rhexcepciones':
            {
               $this->hfidnom->Value = 'idsolicitud';
               break;
            }
            case 'represupuestos':
            {
               $this->hfidnom->Value = 'idpresupuesto';
               break;
            }
         }
      }
   }

   function Limpiar()
   {
      //echo '<script language="javascript" type="text/javascript">  alert(\'limpiar\'); </script>';
      reset($this->controls->items);
      while(list($key, $val) = each($this->controls->items))
      {
         if($val->inheritsFrom("Edit"))
         {
            $val->Text = "";
         }
      }
      $this->mmnuevo->Text = '';
      //$this->mmhistorial->Text = '';
      $this->lblhistorial->Caption = '';
   }

}

global $application;

global $unotas;

//Creates the form
$unotas = new unotas($application);

//Read from resource file
$unotas->loadResource(__FILE__);

//Shows the form
$unotas->show();

?>