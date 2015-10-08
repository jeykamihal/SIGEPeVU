<?php

App::import('Vendor', 'fpdf', array('file' => 'tcpdf/tcpdf.php'));
App::import('Vendor', 'pdf', array('file' => 'tcpdf/pdf/fpdi.php'));

// initiate FPDI
$pdf = new FPDI();
// add a page
$pdf->AddPage();
// set the sourcefile
$pdf->setSourceFile('formularios/pdfs/RENOVACION CONTRATO.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at point 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0, null);

$pdf->SetFont('TIMES', '', 10);
//$pdf->SetFont('CALIBRI','',11);


//****DOCUMENTO DE RENOVACION*********////
    //Tipo de contrato
    //nombre
    $pdf->SetXY(115, 119.5);
    $pdf->Write(0, $personal['Personal']['Apellido_Nombre']);
    //dni
    $pdf->SetXY(50, 124.7);
    $pdf->Write(0, $personal['Personal']['DNI']);
    //nombre2
    $pdf->SetXY(114, 140);
    $pdf->Write(0, $personal['Personal']['Apellido_Nombre']);
    //fecha ini
  


//*******EVALUACION CONTATOS************////
    // add a page
    $pdf->AddPage();
    // set the sourcefile
    $pdf->setSourceFile('formularios/pdfs/EVALUACION CONTRATADOS.pdf');
    // import page 1
    $tplIdx2 = $pdf->importPage(1);
    // use the imported page and place it at point 10,10 with a width of 100 mm
    $pdf->useTemplate($tplIdx2, 0, 0, null);

    $pdf->SetFont('TAHOMA', '', 10);
    //$pdf->SetFont('CALIBRI','',11);
    //nombre
    $pdf->SetXY(23, 51.5);
    $pdf->Write(0, $personal['Personal']['Apellido_Nombre']);
    //legajo
    $pdf->SetXY(142, 51.5);
    $pdf->Write(0, $personal['Personal']['Legajo']);
    //cargo
    $pdf->SetXY(46, 62);
    $pdf->Write(0, $personal['Personal']['Cargo']);



//*****TIPO DE FUENTES A USAR ****//
    $pdf->AddFont('tahoma', '', 'tahoma.php');
    $pdf->AddFont('impact', '', 'impact.php');
    $pdf->AddFont('calibri', '', 'calibri.php');
    $pdf->AddFont('times', '', 'times.php');


$pdf->Output('constanciaimpresion' . $personal['Personal']['Apellido_Nombre'] . '.pdf', 'I');

exit(0);
?>