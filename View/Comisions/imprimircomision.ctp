<?php

App::import('Vendor', 'fpdf', array('file' => 'tcpdf/tcpdf.php'));
App::import('Vendor', 'pdf', array('file' => 'tcpdf/pdf/fpdi.php'));

// initiate FPDI
$pdf = new FPDI();
// add a page
$pdf->AddPage();
// set the sourcefile
$pdf->setSourceFile('formularios/pdfs/comision.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at point 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0, null);

$pdf->SetFont('TIMES', 'B', 16);


//****NOMBRE DE COMISION*********////
    $pdf->SetXY(30, 50);
    $pdf->Write(0, $comision['Comision']['Nombre']);


//********* DATOS DE COMISION **********///
    $pdf->SetFont('TIMES', '', 11);
    $pdf->SetXY(80, 69.7);
    $pdf->Write(0, $comision['Comision']['Lugar']);


 // ***** PERSONAL DE LA COMISION *****************//
   $x=95; $y=95;
   foreach ($comision['Personal'] as $personal):
         $pdf->SetXY($x, $y);
	 $pdf->Write(0, $personal['Apellido_Nombre']);
         $y = $y+5;
          endforeach;
   
//*****TIPO DE FUENTES A USAR ****//
   
    $pdf->AddFont('times', '', 'times.php');


$pdf->Output('Personal de ' . $comision['Comision']['Nombre'] . '.pdf', 'I');

exit(0);
?>