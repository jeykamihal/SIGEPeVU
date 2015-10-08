<?php

App::import('Vendor', 'fpdf', array('file' => 'tcpdf/tcpdf.php'));
App::import('Vendor', 'pdf', array('file' => 'tcpdf/pdf/fpdi.php'));

// initiate FPDI
$pdf = new FPDI('L');
// add a page
$pdf->AddPage();
// set the sourcefile
$pdf->setSourceFile('formularios/pdfs/EquiposxComision.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at point 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0, null);

//$pdf->SetFont('TIMES', 'B', 16);

//******DATOS DE LA COMISION*******////
    $pdf->SetFont('TIMES', '', 11);
    $pdf->SetXY(50, 70);
    $pdf->Write(0, $datoscom['Comision']['Nombre']);
    $pdf->SetXY(110, 70);
    $pdf->Write(0, $datoscom['Comision']['Lugar']);


//********* DATOS DE EQUIPO **********///
     $y=90;
   foreach ($equiposxcomisions as $equ):
    $pdf->SetFont('TIMES', '', 11);
    $pdf->SetXY(25, $y);
    $pdf->Write(0, $equ['E']['equCodigo']);
    $pdf->SetXY(60, $y);
    $pdf->Write(0, '------');
    $pdf->SetXY(75, $y);
    $pdf->Write(0, $equ['E']['equTipo']);
    $pdf->SetXY(150, $y);
    $pdf->Write(0, '------');
    $pdf->SetXY(165, $y);
    $pdf->Write(0, $equ['Personal']['Apellido_Nombre']);
    $y = $y+5;
endforeach;

//*****TIPO DE FUENTES A USAR ****//
   
    $pdf->AddFont('times', '', 'times.php');


$pdf->Output('Equipos en Comision'.'pdf', 'I');

exit(0);
?>
