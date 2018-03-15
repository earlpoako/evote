<?php

require('fpdf.php');
$voterid = 'kedurant3';
$votername = 'Kevin Durant';
class PDF extends FPDF{
//
  function Header(){
    $this->SetFont('Arial','B',16);
    $this->Cell(0,10,'BALLOT RECEIPT',0,2,'C');
    $this->Ln(1);
  }
}

$pdf = new PDF('P','mm',array(100, 150));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetMargins(12,12);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,10,'SUPREME STUDENT GOVERNMENT ELECTIONS',0,2,'C');
$pdf->Cell(0,0,date("m-d-Y"),0,1,'C');
$pdf-> Ln(10);
$pdf->Cell(10,10,'VOTER ID:',0,0,'');
$pdf->Cell(10);
$pdf->Cell(20,10,$voterid,0,1,'');
$pdf->Cell(10,0,'VOTER NAME:',0,0,'');
$pdf->Cell(15);
$pdf->Cell(20,0,$votername,0,1,'');
$pdf-> Ln(10);
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(0,10,'VOTE SUMMARY',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,10,'THANK YOU FOR VOTING!!!',0,1,'C');
$pdf->Output();
 ?>
