<?php
session_start();

require('C:\Program Files (x86)\fpdf16\fpdf.php');

class PDF extends FPDF
   {
   //Page header
   function Header()
      {
      global $titulo;
      //Logo
      $this->Image('imagenes\international.jpg',20,8,15);

      $this->SetFont('Arial','B',12);
      //Move to the right
      $this->Cell(80);
      //Title
      //Cell(width, height, string,border[0:noborder,1:frame; L:left, T:top, R:right, B:bottom], ln[0:to the right, 1:to the begining of the next line, 2:below], align [L:left, C:center, R:right], fill[true, false], URL or identifier returned by AddLink())
      $this->Cell(30,6,'International de Baja California, S.A. de C.V.',0,1,'C');
      $this->SetFont('Arial','B',9);
      $this->Cell(190,4,'Mexicali, Baja California',0,1,'C');
      $this->Cell(190,4,$_SESSION["titulo"],0,1,'C');

      //Line break
      $this->Ln(20);
      }

   //Page footer
   function Footer()
      {
      //Position at 1.5 cm from bottom
      $this->SetY(-15);
      //Arial italic 8
      $this->SetFont('Arial','I',8);
      //Page number
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
      }
   }


?>
