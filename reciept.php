<?php
//Connect to database via another page
 include('include.php');
?>

<?php
//PDF USING MULTIPLE PAGES
session_start();
require('fpdf/fpdf.php');

//Connect to your database
//include("conectmysql.php");

//Create new pdf file
$pdf=new FPDF();
$sql="SELECT * FROM book,signup where book.username='".$_SESSION['username']."' AND signup.username='".$_SESSION['username']."'";
$result= mysql_query($sql);
if($row=mysql_fetch_assoc($result))
{
	$username = $row['username'];
	$date = $row['date'];
	$start = $row['start'];
	$end1 = $row['end'];
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$number = $row['number'];
	
}
if($start =='1:00.PM'){$start = '13:00.PM';}
if($start =='2:00.PM'){$start = '14:00.PM';}
if($start =='3:00.PM'){$start = '15:00.PM';}
if($start =='4:00.PM'){$start = '16:00.PM';}
if($start =='5:00.PM'){$start = '17:00.PM';}

if($end1 =='1:00.PM'){$end = '13:00.PM';}
if($end1 =='2:00.PM'){$end = '14:00.PM';}
if($end1 =='3:00.PM'){$end = '15:00.PM';}
if($end1 =='4:00.PM'){$end = '16:00.PM';}
if($end1 =='5:00.PM'){$end = '17:00.PM';}



$pdf->SetFillColor(255,255,255);
//$pdf->SetFont("","","11");	

		$pdf->AddPage();
		//Add title
		$pdf->SetFont("Times","","14");
		$pdf->SetX(95);
		$pdf->Cell(10,8,"DEHUB OFFICE SPACE RESERVATION",0,1,"C");
		$pdf->SetX(95);
		$pdf->Cell(10,8,"BOOKED ROOM DETAILS",0,1,"C");
		
		//$pdf->SetFont("","B","14");
$pdf->SetX(35);
$pdf->SetFont("","B","11");		
$pdf->Cell(32,8,"First Name:                       ".$firstname." ",0,5,"C",FALSE);
$pdf->SetX(35);		
$pdf->Cell(32,8,"Last Name:                       ".$lastname."",0,5,"C",FALSE);
$pdf->SetX(35);
$pdf->Cell(26,8,"Room Number:                       ".$number."",0,5,"C",FALSE);
$pdf->SetX(38);
$pdf->Cell(35,8,"Date:                       ".$date."",0,5,"C");
$pdf->SetX(35);
$pdf->Cell(35,8,"Start Time:                       ".$start."",0,5,"C");
$pdf->SetX(35);
$pdf->Cell(35,8,"End Time:                       ".$end1."",0,5,"C",FALSE);
$pdf->SetX(35);
$pdf->Cell(35,8,"Total Time:                       ".($end-$start)."",0,5,"C");
$pdf->SetX(30);
$pdf->Cell(35,8,"Amount per hour:                      Ksh ".$_SESSION['aph']."",0,5,"C");
$pdf->SetX(35);
$pdf->Cell(35,8,"Total Amount:                      Ksh ".($end-$start)*$_SESSION['aph']."",0,5,"C");

$pdf->SetX(95);
$pdf->write(5,"\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nThank you for doing business with us. Please come again. \n");
$pdf->SetX(95);
$pdf->write(5,"@DEHUB 2016 ");
$pdf->Output();
?>
