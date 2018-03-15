<?php

session_start();
$id = $_SESSION['id'];
include 'dbh.php';
if($_SESSION['voterlogged']){
foreach ($_GET as $key => $value) {
  $sql = "UPDATE candidate_list SET candidate_totalvotes= candidate_totalvotes+1 WHERE candidate_id= $value";
  mysqli_query($conn,$sql);
}
$sql = "UPDATE voter_list SET isVoted = 'true' WHERE CONCAT(voter_id,voter_no) = '$id'";
$result = mysqli_query($conn, $sql);
$_SESSION['voterlogged']=false;
}
// session_destroy();
// header("Location: ../vote.php");
// header("Location: receipt.php");
// exit();
//

 require('fpdf.php');
 $voterid = $_SESSION['id'];
 $votername = $_SESSION['username'];
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
 foreach ($_GET as $key => $value) {
 $pdf->SetFont('Arial','',10);
 $pdf->Cell(0,5,strtoupper($key),0,1,'C');
 $query = "SELECT * FROM candidate_list WHERE candidate_id='$value'";
 $res = mysqli_query($conn,$query);
 $row = mysqli_fetch_assoc($res);
 $pdf->SetFont('Arial','B',8);
 $pdf->Cell(0,5,strtoupper($row['candidate_name']),0,1,'C');
 }
 $pdf->SetFont('Arial','B',10);
 $pdf->Cell(0,10,'THANK YOU FOR VOTING!!!',0,1,'C');
 $pdf->Output();
  ?>
