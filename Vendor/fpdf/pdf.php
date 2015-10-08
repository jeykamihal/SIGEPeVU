<?php
require_once('fpdf.php');
require_once('pdf/fpdi.php');

// initiate FPDI
$pdf = new FPDI();
// add a page
$pdf->AddPage();
// set the sourcefile
$pdf->setSourceFile('Guía de Traslado.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at point 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0,null );

// now write some text above the imported page
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(255,0,0);
$pdf->SetXY(40, 31);
$pdf->Write(0, "Establecimiento");
$pdf->SetXY(40, 35);
$pdf->Write(0, "HEYMAN GRACIELA BEATRIZ");
$pdf->SetXY(40, 39);
$pdf->Write(0, "HEYMAN GRACIELA BEATRIZ");
$pdf->SetXY(40, 43);
$pdf->Write(0, "27059421862");
$pdf->SetXY(40, 47);
$pdf->Write(0, "CHA.72 PC.12 PARQUE INDUSTRIAL");
$pdf->SetXY(40, 51);
$pdf->Write(0, "General Guemes");
$pdf->SetXY(40, 55);
$pdf->Write(0, "Chaco");

$pdf->SetFont('Arial','',8);
$pdf->SetXY(16, 35);
$pdf->Write(0, "Razon Social");
$pdf->SetXY(16, 39);
$pdf->Write(0, "Nombre");
$pdf->SetXY(16, 43);
$pdf->Write(0, "DNI / CUIT");
$pdf->SetXY(16, 47);
$pdf->Write(0, "Domicilio");
$pdf->SetXY(16, 51);
$pdf->Write(0, "Departamento");
$pdf->SetXY(16, 55);
$pdf->Write(0, "Provincia");

// DESTINO
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(255,0,0);
$pdf->SetXY(136, 31);
$pdf->Write(0, "Establecimiento");
$pdf->SetXY(136, 35);
$pdf->Write(0, "AGVE S.R.L.");
$pdf->SetXY(136, 39);
$pdf->Write(0, "AGVE S.R.L.");
$pdf->SetXY(136, 43);
$pdf->Write(0, "30-70996215-5");
$pdf->SetXY(136, 47);
$pdf->Write(0, "ACCESO ESTE Y RUTA NAC. Nº 16");
$pdf->SetXY(136, 51);
$pdf->Write(0, "Almirante Brown");
$pdf->SetXY(136, 55);
$pdf->Write(0, "Chaco");

$pdf->SetFont('Arial','',8);
$pdf->SetXY(112, 35);
$pdf->Write(0, "Razon Social");
$pdf->SetXY(112, 39);
$pdf->Write(0, "Nombre");
$pdf->SetXY(112, 43);
$pdf->Write(0, "DNI / CUIT");
$pdf->SetXY(112, 47);
$pdf->Write(0, "Domicilio");
$pdf->SetXY(112, 51);
$pdf->Write(0, "Departamento");
$pdf->SetXY(112, 55);
$pdf->Write(0, "Provincia");

$pdf->SetFont('Arial','',16);
$pdf->SetXY(78, 24);
$pdf->Write(0, "TR01172301205700");

$pdf->SetFont('Arial','',8);
$pdf->SetXY(88, 18);
$pdf->Write(0, "TR01172301205700");

$pdf->SetFont('Arial','',8);
$pdf->SetXY(164, 19);
$pdf->Write(0, "16-08-2012");

$pdf->SetFont('Arial','',8);
$pdf->SetXY(164, 25);
$pdf->Write(0, "18-08-2012");

$pdf->SetFont('Arial','',10);
$pdf->SetXY(45, 76);
$pdf->Write(0, "Dominio -319 Marca FORD Modelo F-600/1971");

$pdf->SetFont('Arial','',10);
$pdf->SetXY(31, 93);
$pdf->Write(0, "(FORMOSA) MADERA a MEDIDA ALGARROBO");

$pdf->SetFont('Arial','',10);
$pdf->SetXY(121, 93);
$pdf->Write(0, "Kilogramo");

$pdf->SetFont('Arial','',10);
$pdf->SetXY(143, 93);
$pdf->Write(0, "1,00");

$pdf->SetFont('Arial','',10);
$pdf->SetXY(168, 93);
$pdf->Write(0, "2000");

$pdf->SetFont('Arial','',10);
$pdf->SetXY(189,93);
$pdf->Write(0, "2000");

$pdf->SetFont('Arial','',10);
$pdf->SetXY(189,109);
$pdf->Write(0, "2000");

$pdf->SetFont('Arial','',37);
$pdf->SetXY(20,155);
$pdf->Write(0, "****NO DECLARA****");

$pdf->SetFont('Arial','',10);
$pdf->SetXY(195,166);
$pdf->Write(0, "0");

$pdf->SetFont('Arial','',10);
$pdf->SetXY(189,189);
$pdf->Write(0, "2000");


$pdf->Output('newpdf.pdf', 'I');