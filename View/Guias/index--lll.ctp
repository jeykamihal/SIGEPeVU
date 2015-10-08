<?php
// initiate FPDI
$pdf = new FPDI();
// add a page
$pdf->AddPage();
// set the sourcefile
$pdf->setSourceFile('RENOVACION CONTRATO SERVICIO.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at point 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0,null );

$pdf->AddFont('tahoma','','tahoma.php');
$pdf->AddFont('impact','','impact.php');

$pdf->AddFont('C39HrP36DlTt','','C39HrP36DlTt.php');
?>
