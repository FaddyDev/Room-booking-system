<?php
//Connect to database via another page
 include('include.php');
?>

<?php
//PDF USING MULTIPLE PAGES

require('fpdf/fpdf.php');

//Connect to your database
//include("conectmysql.php");

//Create new pdf file
$pdf=new FPDF();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//Add title
		$pdf->SetFont("Times","","14");
		$pdf->SetX(95);
		$pdf->Cell(10,8,"DEHUB OFFICE SPACE RESERVATION",0,1,"C");
		$pdf->SetX(95);
		$pdf->Cell(10,8,"REGISTERD USE DETAILS",0,1,"C");
//set initial y axis position per page
$y_axis_initial = 25;
$row_height = 8;
//print column titles


		$pdf->SetY($y_axis_initial);
$pdf->SetFont("","B","11");
$pdf->Cell(32,8,"First NAME",1,0,"C",FALSE);		
$pdf->Cell(32,8,"Last Name",1,0,"C",FALSE);
$pdf->Cell(26,8,"Id Number",1,0,"C",FALSE);
$pdf->Cell(35,8,"Phone Number",1,0,"C");
$pdf->Cell(45,8,"Email",1,0,"C",FALSE);

$y_axis = $y_axis_initial + $row_height;

//Select the columns you want to show in your PDF file
$sql="SELECT * FROM signup ORDER BY idnumber";
$result= mysql_query($sql);
						   
//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

//Set Row Height
$row_height = 8;

while($row=mysql_fetch_assoc($result))
{
$pdf->SetFillColor(255,255,255);
$pdf->SetFont("","","11");	
	//If the current row is the last one, create new page and print column title
	if ($i == $max)
	{
		$pdf->AddPage();
         
	   
		//print column titles for the current page
		$pdf->SetY($y_axis_initial);
		//$pdf->SetX(25);
		$pdf->SetFont("Times","","14");
		$pdf->SetX(95);
		$pdf->Cell(10,8,"DEHUB OFFICE SPACE RESERVATION",0,1,"C");
		$pdf->SetX(95);
		$pdf->Cell(10,8,"REGISTERD USE DETAILS",0,1,"C");
		$pdf->SetFont("","B","14");
$pdf->SetFont("","B","11");
$pdf->Cell(32,8,"First NAME",1,0,"C",FALSE);		
$pdf->Cell(32,8,"Last Name",1,0,"C",FALSE);
$pdf->Cell(26,8,"Id Number",1,0,"C",FALSE);
$pdf->Cell(35,8,"Phone Number",1,0,"C");
$pdf->Cell(45,8,"Email",1,0,"C",FALSE);

		//Go to next row
		$y_axis = $pdf->GetY();
		$y_axis = $y_axis + $row_height;
		
		//Set $i variable to 0 (first row)
		$i = 0;
	}
    $firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$idnumber = $row['idnumber'];
	$telephoneno = $row['telephoneno'];
	$email = $row['email'];

	$pdf->SetY($y_axis);
	//$pdf->SetX(25);
	$pdf->Cell(32,8,$firstname,1,0,'C',1);
	$pdf->Cell(32,8,$lastname,1,0,'C',1);
	$pdf->Cell(26,8,$idnumber,1,0,'C',1);
	$pdf->Cell(35,8,$telephoneno,1,0,'C',1);
	$pdf->Cell(45,8,$email,1,0,'C',1);
	
	//Go to next row
	$y_axis = $y_axis + $row_height;
	$i = $i + 1;
}

mysql_close($connection);

//Send file
$pdf->Output();
?>
