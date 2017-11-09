<?php
require("fpdf/fpdf.php");
date_default_timezone_set('Asia/Makassar');

$pdf=new FPDF();
$pdf->AddPage('L','Legal');
$pdf->SetDisplayMode(real,'default');
$pdf->SetDrawColor(188,188,188);
$pdf->SetFont("Arial","B",20);
$pdf->Cell(0,8,"PT. SatNetCom Balikpapan",0,0,C);
$pdf->MultiCell(0,6,"",0,0);

if ($_POST['circuit']!="ALL"){
$pdf->SetFont("Arial","B",12);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(0,8,"BACKBONE REPORT",0,0,C);
$pdf->MultiCell(0,6,"",0,0);


$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont("Arial","B",11);
$pdf->SetTextColor(0,0,0);

$pdf->Cell(1,1,"Generate By",0,0);
$pdf->Cell(50);
$pdf->Cell(20,1,": System",0,0);
$pdf->MultiCell(0,5,"",0,0);

$pdf->Cell(1,1,"Generate Date",0,0);
$pdf->Cell(50);
$pdf->Cell(20,1,": ".date('l, F d, o, H:i'),0,0);
$pdf->MultiCell(0,5,"",0,0);

$pdf->Cell(1,1,"Partner Name",0,0);
$pdf->Cell(50);
$pdf->Cell(20,1,": {$_POST['nama_backbone']}",0,0);
$pdf->MultiCell(0,5,"",0,0);

$pdf->Cell(1,1,"Circuit ID",0,0);
$pdf->Cell(50);
$pdf->Cell(20,1,": {$_POST['circuit']}",0,0);
$pdf->MultiCell(0,5,"",0,0);

$pdf->Cell(1,1,"Period Report",0,0);
$pdf->Cell(50);
$pdf->Cell(20,1,": {$_POST['rstart']} - {$_POST['rfinish']}",0,0);
$pdf->MultiCell(0,5,"",0,0);


$pdf->Ln();

} else {
$pdf->SetFont("Arial","B",12);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(0,8,"SUMMARY BACKBONE REPORT",0,0,C);
$pdf->MultiCell(0,6,"",0,0);


$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont("Arial","B",11);
$pdf->SetTextColor(0,0,0);

$pdf->Cell(1,1,"Generate By",0,0);
$pdf->Cell(50);
$pdf->Cell(20,1,": System",0,0);
$pdf->MultiCell(0,5,"",0,0);

$pdf->Cell(1,1,"Generate Date",0,0);
$pdf->Cell(50);
$pdf->Cell(20,1,": ".date('l, F d, o, H:i'),0,0);
$pdf->MultiCell(0,5,"",0,0);

$pdf->Cell(1,1,"Period Report",0,0);
$pdf->Cell(50);
$pdf->Cell(20,1,": {$_POST['rstart']} - {$_POST['rfinish']}",0,0);
$pdf->MultiCell(0,5,"",0,0);


$pdf->Ln();

}

$pdf->SetFont("Arial","B",10);
$pdf->Cell(5,6,"#",0,0,L);
$pdf->Cell(15,6,"SWOS",0,0,L);
$pdf->Cell(20,6,"DESC",0,0,L);
$pdf->Cell(35,6,"START",0,0,C);
$pdf->Cell(35,6,"FINISH",0,0,C);
$pdf->Cell(25,6,"DURATION",0,0,C);
$pdf->Cell(100,6,"ROOT CAUSE",0,0,L);
$pdf->Cell(0,6,"ACTION",0,1,L);


$pdf->SetFont("Arial","",10);
$no=0;
for ($i=0;$i<$_POST['row'];$i++){
	$pdf->Cell(5,6,$no=$no+1,0);
	$pdf->Cell(15,6,print_r($_POST['swos'][$i],true),0);
	$pdf->Cell(20,6,print_r($_POST['description'][$i],true),0);
	$pdf->Cell(35,6,print_r($_POST['datetime_start'][$i],true),0);
	$pdf->Cell(35,6,print_r($_POST['datetime_end'][$i],true),0);
	$pdf->Cell(25,6,print_r($_POST['duration'][$i],true),0,0,C);
	$pdf->Cell(100,6,print_r($_POST['root_cause'][$i],true),0,0);
        $pdf->MultiCell(0,6,print_r($_POST['solved_after'][$i],true),0,1);
}
$pdf->Ln();

$pdf->SetFont("Arial","BI",10);
$pdf->Cell(105,6,"Total Down :",0,0,R);
$pdf->Cell(25,6,"DOWNTIME",0,1,C);
$pdf->Cell(105,6,"Total Intermittent :",0,0,R);
$pdf->Cell(25,6,"INTERMITTENT",0,1,C);
$pdf->Cell(105,6,"Total TTR :",0,0,R);
$pdf->Cell(25,6,"TTR",0,1,C);
$pdf->Cell(105,6,"SLA Result :",0,0,R);
$pdf->Cell(25,6,"SLA",0,1,C);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->output();

?>
