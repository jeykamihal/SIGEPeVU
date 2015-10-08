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


// ORIGEN



if ($guia['Guia']['tipoorigen']=='Permiso') {
	$pdf->SetFont('TAHOMA','',9);
	//$pdf->SetTextColor(255,0,0);
	$pdf->SetTextColor(0,0,0);
	$margenX=36;
	$pdf->SetXY($margenX, 31);
	$pdf->Write(0, $guia['Guia']['tipoorigen']);
	$pdf->SetXY($margenX, 35);
	$pdf->Write(0, $guia['Guia']['nropermiso']);
	$pdf->SetXY($margenX, 39);
	$pdf->Write(0, trim($guia['Guia']['tipopermiso']));
	$pdf->SetXY($margenX, 43);
	$pdf->Write(0, utf8_decode($guia['Guia']['nombre1']));
	$pdf->SetXY($margenX, 47);
	$pdf->Write(0, $guia['Guia']['doc1']);
	$pdf->SetXY($margenX, 51);
	$pdf->Write(0, utf8_decode($guia['Guia']['domicilio1']));
	$pdf->SetXY($margenX, 55);
	$pdf->Write(0, utf8_decode($guia['Guia']['depto1']));
	$pdf->SetXY($margenX, 59);
	$pdf->Write(0, utf8_decode($guia['Guia']['provincia1']));

	$pdf->SetFont('TAHOMA','',8);
	$pdf->SetXY(16, 35);
	$pdf->Write(0, utf8_decode("Permiso Nº"));
	$pdf->SetXY(16, 39);
	$pdf->Write(0, "Tipo Permiso");
	$pdf->SetXY(16, 43);
	$pdf->Write(0, "Productor");
	$pdf->SetXY(16, 47);
	$pdf->Write(0, "DNI / CUIT");
	$pdf->SetXY(16, 51);
	$pdf->Write(0, "Predio");
	$pdf->SetXY(16, 55);
	$pdf->Write(0, "Departamento");
	$pdf->SetXY(16, 59);
	$pdf->Write(0, "Provincia");
}


if ($guia['Guia']['tipoorigen']=='Establecimiento') {
	$pdf->SetFont('TAHOMA','',9);
	//$pdf->SetTextColor(255,0,0);
	$margenX=36;
	$pdf->SetXY($margenX, 31);
	$pdf->Write(0, $guia['Guia']['tipoorigen']);
	$pdf->SetXY($margenX, 35);
	$pdf->Write(0,utf8_decode($guia['Guia']['nombre1']));
	$pdf->SetXY($margenX, 39);
	$pdf->Write(0, utf8_decode($guia['Guia']['razonsocial1']));
	$pdf->SetXY($margenX, 43);
	$pdf->Write(0, $guia['Guia']['doc1']);
	$pdf->SetXY($margenX, 47);
	$pdf->Write(0, utf8_decode($guia['Guia']['domicilio1']));
	$pdf->SetXY($margenX, 51);
	$pdf->Write(0, $guia['Guia']['depto1']);
	$pdf->SetXY($margenX, 55);
	$pdf->Write(0, $guia['Guia']['provincia1']);
	//$pdf->SetXY($margenX, 59);
	//$pdf->Write(0, );

	$pdf->SetFont('TAHOMA','',8);
	$pdf->SetXY(16, 35);
	$pdf->Write(0, "Nombre");
	$pdf->SetXY(16, 39);
	$pdf->Write(0, "Razon Social");
	$pdf->SetXY(16, 43);
	$pdf->Write(0, "DNI / CUIT");
	$pdf->SetXY(16, 47);
	$pdf->Write(0, "Domicilio");
	$pdf->SetXY(16, 51);
	$pdf->Write(0, "Departamento");
	$pdf->SetXY(16, 55);
	$pdf->Write(0, "Provincia");
	//$pdf->SetXY(16, 59);
	//$pdf->Write(0, "Provincia");
	

}


// DESTINO

if ($guia['Guia']['tipodestino']=='Establecimiento') {
$pdf->SetFont('TAHOMA','',9);
//$pdf->SetTextColor(255,0,0);
$pdf->SetXY(136, 31);
$pdf->Write(0, $guia['Guia']['tipodestino']);
$pdf->SetXY(136, 35);
$pdf->Write(0, utf8_decode($guia['Guia']['nombre2']));
$pdf->SetXY(136, 39);
$pdf->Write(0, utf8_decode($guia['Guia']['razonsocial2']));
$pdf->SetXY(136, 43);
$pdf->Write(0, $guia['Guia']['doc2']);
$pdf->SetXY(136, 47);
$pdf->Write(0, utf8_decode($guia['Guia']['domicilio2']));
$pdf->SetXY(136, 51);
$pdf->Write(0, utf8_decode($guia['Guia']['depto2']));
$pdf->SetXY(136, 55);
$pdf->Write(0, $guia['Guia']['provincia2']);

$pdf->SetFont('TAHOMA','',8);
$pdf->SetXY(112, 35);
$pdf->Write(0, "Nombre");
$pdf->SetXY(112, 39);
$pdf->Write(0, utf8_decode("Razón Social"));
$pdf->SetXY(112, 43);
$pdf->Write(0, "DNI / CUIT");
$pdf->SetXY(112, 47);
$pdf->Write(0, "Domicilio");
$pdf->SetXY(112, 51);
$pdf->Write(0, "Departamento");
$pdf->SetXY(112, 55);
$pdf->Write(0, "Provincia");
}

if ($guia['Guia']['tipodestino']=='Exportacion') {
$pdf->SetFont('TAHOMA','',9);
//$pdf->SetTextColor(255,0,0);
$pdf->SetXY(136, 31);
$pdf->Write(0, 'EXPORTACION'.' - '.$destinoexportacions['Tipodestinoexportacion']['nombre']);
$pdf->SetXY(136, 35);
$numerogexterna = (!empty($destinoexportacions['Destinoexportacion']['NroGuiaExterna']))?$destinoexportacions['Destinoexportacion']['NroGuiaExterna']:'------';
$pdf->Write(0,$numerogexterna );
$pdf->SetXY(136, 39);
$pdf->Write(0, utf8_decode($destinoexportacions['Destinoexportacion']['RazonSocial']));
$pdf->SetXY(136, 43);
$pdf->Write(0, utf8_decode($destinoexportacions['Destinoexportacion']['DNICUIT']));
$pdf->SetXY(136, 47);
$pdf->Write(0, $destinoexportacions['Destinoexportacion']['Domicilio']);
$pdf->SetXY(136, 51);
$pdf->Write(0, $destinoexportacions['Destinoexportacion']['Observaciones']);
// $pdf->SetXY(136, 55);
// $pdf->Write(0, $destinoexportacions['Destinoexportacion']['NroGuiaExterna']);

$pdf->SetFont('TAHOMA','',8);
$pdf->SetXY(112, 35);
$pdf->Write(0, utf8_decode("Guía externa Nº"));
$pdf->SetXY(112, 39);
$pdf->Write(0, utf8_decode("Razón Social"));
$pdf->SetXY(112, 43);
$pdf->Write(0, "DNI / CUIT");
$pdf->SetXY(112, 47);
$pdf->Write(0, "Domicilio");
$pdf->SetXY(112, 51);
$pdf->Write(0, "Observaciones");
//$pdf->SetXY(112, 55);
//$pdf->Write(0, "Observaciones");
}
if ($guia['Guia']['tipodestino']=='Externo') {
$pdf->SetFont('TAHOMA','',9);
//$pdf->SetTextColor(255,0,0);
$pdf->SetXY(136, 31);
$pdf->Write(0, 'Externo'.' - '.$destinoexternos['Provincia']['nombre']);
$pdf->SetXY(136, 35);
$numerogexterna = (!empty( $destinoexternos['Destinoexterno']['NroGuiaExterna']))?$destinoexternos['Destinoexterno']['NroGuiaExterna']:'------';
$pdf->Write(0,$numerogexterna);
$pdf->SetXY(136, 39);
$pdf->Write(0, utf8_decode($destinoexternos['Destinoexterno']['RazonSocial']));
$pdf->SetXY(136, 43);
$pdf->Write(0, $destinoexternos['Destinoexterno']['DNICUIT']);
$pdf->SetXY(136, 47);
$pdf->Write(0, utf8_decode($destinoexternos['Destinoexterno']['Domicilio']));
$pdf->SetXY(136, 51);
$pdf->Write(0, utf8_decode($destinoexternos['Destinoexterno']['Observaciones']));
// $pdf->SetXY(136, 55);
// $pdf->Write(0, $destinoexportacions['Destinoexportacion']['NroGuiaExterna']);

$pdf->SetFont('TAHOMA','',8);
$pdf->SetXY(112, 35);
$pdf->Write(0, utf8_decode("Guía externa Nº"));
$pdf->SetXY(112, 39);
$pdf->Write(0, utf8_decode("Razón Social"));
$pdf->SetXY(112, 43);
$pdf->Write(0, "DNI / CUIT");
$pdf->SetXY(112, 47);
$pdf->Write(0, "Domicilio");
$pdf->SetXY(112, 51);
$pdf->Write(0, "Observaciones");
//$pdf->SetXY(112, 55);
//$pdf->Write(0, "Observaciones");
}
if ($guia['Guia']['tipodestino']=='Consumidor') {
    if ($guia['Guia']['tipoorigen']=='Permiso'){
        
        $pdf->SetFont('TAHOMA','',9);
        //$pdf->SetTextColor(255,0,0);
        $pdf->SetXY(136, 31);
        $pdf->Write(0, 'Externo'.' - '.'Chaco (monte nativo)');
        $pdf->SetXY(136, 35);
        $numerogexterna = '------';
        $pdf->Write(0,$numerogexterna);
        $pdf->SetXY(136, 39);
        $pdf->Write(0, utf8_decode($destinoconsumidors['Destinoconsumidor']['RazonSocial']));
        $pdf->SetXY(136, 43);
        $pdf->Write(0, $destinoconsumidors['Destinoconsumidor']['DNICUIT']);
        $pdf->SetXY(136, 47);
        $pdf->Write(0, utf8_decode($destinoconsumidors['Destinoconsumidor']['Domicilio']));
        $pdf->SetXY(136, 51);
        $pdf->Write(0, utf8_decode($destinoconsumidors['Destinoconsumidor']['Observaciones']));
        // $pdf->SetXY(136, 55);
        // $pdf->Write(0, $destinoexportacions['Destinoexportacion']['NroGuiaExterna']);
        
        $pdf->SetFont('TAHOMA','',8);
        $pdf->SetXY(112, 35);
        $pdf->Write(0, utf8_decode("Guía externa Nº"));
        $pdf->SetXY(112, 39);
        $pdf->Write(0, utf8_decode("Razón Social"));
        $pdf->SetXY(112, 43);
        $pdf->Write(0, "DNI / CUIT");
        $pdf->SetXY(112, 47);
        $pdf->Write(0, "Domicilio");
        $pdf->SetXY(112, 51);
        $pdf->Write(0, "Observaciones");
        //$pdf->SetXY(112, 55);
        //$pdf->Write(0, "Observaciones");
    }
   else{
        $pdf->SetFont('TAHOMA','',9);
        //$pdf->SetTextColor(255,0,0);
        $pdf->SetXY(136, 31);
        $pdf->Write(0, 'Consumidor Final');
        $pdf->SetXY(136, 35);
        $pdf->Write(0, '');
        $pdf->SetXY(136, 39);
        $pdf->Write(0, utf8_decode($destinoconsumidors['Destinoconsumidor']['RazonSocial']));
        $pdf->SetXY(136, 43);
        $pdf->Write(0, $destinoconsumidors['Destinoconsumidor']['DNICUIT']);
        $pdf->SetXY(136, 47);
        $pdf->Write(0, utf8_decode($destinoconsumidors['Destinoconsumidor']['Domicilio']));
        $pdf->SetXY(136, 51);
        $pdf->Write(0, utf8_decode($destinoconsumidors['Destinoconsumidor']['Observaciones']));
        // $pdf->SetXY(136, 55);
        // $pdf->Write(0, $destinoexportacions['Destinoexportacion']['NroGuiaExterna']);

        $pdf->SetFont('TAHOMA','',8);
        $pdf->SetXY(112, 35);
        $pdf->Write(0, "");
        $pdf->SetXY(112, 39);
        $pdf->Write(0, utf8_decode("Razón Social"));
        $pdf->SetXY(112, 43);
        $pdf->Write(0, "DNI / CUIT");
        $pdf->SetXY(112, 47);
        $pdf->Write(0, utf8_decode("Domicilio"));
        $pdf->SetXY(112, 51);
        $pdf->Write(0, utf8_decode("Observaciones"));
        //$pdf->SetXY(112, 55);
        //$pdf->Write(0, "Observaciones");
   }
}


$pdf->SetFont('C39HrP36DlTt','',30);
$pdf->SetXY(61.3, 21.8);
//$pdf->SetXY(10.8, 22.5);
$pdf->Write(0, "*".$guia['Guia']['nroguia']."*");
//$pdf->Cell(0,0,"*".$guia['Guia']['nroguia']."*",0,0,'C');
//$pdf->SetFont('TAHOMA','',9);
//$pdf->SetXY(93, 17);
//$pdf->Write(0, $guia['Guia']['nroguia']);

$pdf->SetFont('TAHOMA','',9);
$pdf->SetXY(164, 19);
$pdf->Write(0, date('d-m-Y H:i',strtotime($guia['Guia']['desde'])).' hs.');

$pdf->SetFont('TAHOMA','',9);
$pdf->SetXY(164, 25);
$pdf->Write(0, date('d-m-Y H:i',strtotime($guia['Guia']['hasta'])).' hs.');

$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(45, 76);
$pdf->Write(0, "Dominio ".$guia['Guia']['dominio1']."   Marca ".$guia['Guia']['marca1']."  Modelo ".$guia['Guia']['modelo1']);

if(!$guiaproductos) {
$pdf->SetFont('TAHOMA','',37);
$pdf->SetXY(20,100);
$pdf->Write(0, "*******************");
}
///Productos Chasis /////////////////////////////////////////////////////////
$ind=0;
foreach ($guiaproductos as $guiaproducto) {
$pdf->SetFont('TAHOMA','',8);
$pdf->SetXY(15, 93+(3 * $ind));

$pdf->Write(0,$guiaproducto['Guiaproducto']['codigo']);

$pdf->SetFont('TAHOMA','',9);
$pdf->SetXY(31, 93+(3 * $ind));
$pdf->Write(0, $guiaproducto['Guiaproducto']['descrip1']);

$pdf->SetFont('TAHOMA','',9);
$pdf->SetXY(121, 93+(3 * $ind));
$pdf->Write(0, $guiaproducto['Guiaproducto']['unidad1']);

$pdf->SetFont('TAHOMA','',9);
$valor=$pdf->GetStringWidth($guiaproducto['Guiaproducto']['kgunidad1'],'TAHOMA','',9,'');
$pdf->SetXY(155-$valor, 93+(3 * $ind));

//TCPDF::GetStringWidth ($ s,$ fontname = '', $fontstyle = '', $ fontsize = 0, $getarray = false )

//Write ($h, $txt, $link='', $fill=false, $align='', $ln=false, $stretch=0, $firstline=false, $firstblock=false, $maxh=0, $wadj=0, $margin='')
$pdf->Write(0, $guiaproducto['Guiaproducto']['kgunidad1'],'', false, 'L', false, 0, false, false, 0, 0, '' );



//if($envioproducto100['Producto']['idorig']) { 
		
//$envioproducto100['Envioproducto']['ordenproducto']
//$envioproducto100['Producto']['idorig']
//$envioproducto100['Producto']['nombre']
//$tipounidads[($envioproducto100['Producto']['tipounidad_id'])-1]['Tipounidad']['nombre']
//$envioproducto100['Producto']['pesounidad']
//$envioproducto100['Envioproducto']['cantidad']
//$envioproducto100['Producto']['pesounidad'] * $envioproducto100['Envioproducto']['cantidad']




$valor=$pdf->GetStringWidth($guiaproducto['Guiaproducto']['cantunidad1'],'TAHOMA','',10,'');
$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(176-$valor, 93 +(3 * $ind));
$pdf->Write(0, (integer)$guiaproducto['Guiaproducto']['cantunidad1']);

$valor=$pdf->GetStringWidth($guiaproducto['Guiaproducto']['cantunidad1'] * $guiaproducto['Guiaproducto']['kgunidad1'],'TAHOMA','',10,'');
$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(198-$valor,93 +(3 * $ind));
$total_unidadesxkilos= $guiaproducto['Guiaproducto']['cantunidad1'] * $guiaproducto['Guiaproducto']['kgunidad1'];
$pdf->Write(0, (integer)$total_unidadesxkilos);

$ind=$ind+1;
}



$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(45, 132);
$pdf->Write(0, "Dominio ".$guia['Guia']['dominio2']."   Marca ".$guia['Guia']['marca2']."  Modelo ".$guia['Guia']['modelo2']);



$valor=$pdf->GetStringWidth((integer)$guia['Guia']['totalchasis'],'TAHOMA','',10,'');
$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(198-$valor,109);
$pdf->Write(0, (integer)$guia['Guia']['totalchasis']);


if(!$guiaproductos1) {
$pdf->SetFont('TAHOMA','',37);
$pdf->SetXY(20,155);
$pdf->Write(0, "*******************");
}

// Productos Acoplado ////////////////////////////////////////////////////////////////
$ind=0;
$margenY=149;
foreach ($guiaproductos1 as $guiaproducto1) {
	$pdf->SetFont('TAHOMA','',8);
	$pdf->SetXY(15, $margenY+(3 * $ind));

	$pdf->Write(0,$guiaproducto1['Guiaproducto']['codigo']);

	$pdf->SetFont('TAHOMA','',9);
	$pdf->SetXY(31, $margenY+(3 * $ind));
	$pdf->Write(0, $guiaproducto1['Guiaproducto']['descrip1']);

	$pdf->SetFont('TAHOMA','',9);
	$pdf->SetXY(121, $margenY+(3 * $ind));
	$pdf->Write(0, $guiaproducto1['Guiaproducto']['unidad1']);

	$pdf->SetFont('TAHOMA','',9);
	$valor=$pdf->GetStringWidth($guiaproducto1['Guiaproducto']['kgunidad1'],'TAHOMA','',9,'');
	$pdf->SetXY(155-$valor, $margenY+(3 * $ind));

	//TCPDF::GetStringWidth ($ s,$ fontname = '', $fontstyle = '', $ fontsize = 0, $getarray = false )

	//Write ($h, $txt, $link='', $fill=false, $align='', $ln=false, $stretch=0, $firstline=false, $firstblock=false, $maxh=0, $wadj=0, $margin='')
	$pdf->Write(0, $guiaproducto1['Guiaproducto']['kgunidad1'],'', false, 'L', false, 0, false, false, 0, 0, '' );

	$valor=$pdf->GetStringWidth($guiaproducto['Guiaproducto']['cantunidad1'],'TAHOMA','',10,'');
	$pdf->SetFont('TAHOMA','',10);
	$pdf->SetXY(176-$valor, $margenY +(3 * $ind));
	$pdf->Write(0, (integer)$guiaproducto1['Guiaproducto']['cantunidad1']);

	$valor=$pdf->GetStringWidth($guiaproducto1['Guiaproducto']['cantunidad1'] * $guiaproducto1['Guiaproducto']['kgunidad1'],'TAHOMA','',10,'');
	$pdf->SetFont('TAHOMA','',10);
	$pdf->SetXY(198-$valor,$margenY +(3 * $ind));
	$pdf->Write(0, (integer)$guiaproducto1['Guiaproducto']['cantunidad1'] * $guiaproducto1['Guiaproducto']['kgunidad1']);

	$ind=$ind+1;
}
//////////////////////////////////////////////////////////////////////////////////////



$valor=$pdf->GetStringWidth((integer)$guia['Guia']['totalacop'],'TAHOMA','',10,'');
$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(198-$valor,166);
$pdf->Write(0, (integer)$guia['Guia']['totalacop']);

$valor=$pdf->GetStringWidth((integer)$guia['Guia']['totalchasisacop'],'TAHOMA','',10,'');
$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(198-$valor,189);
$pdf->Write(0, (integer)$guia['Guia']['totalchasisacop']);

$pdf->SetXY(50,189);
$pdf->Write(0, 'CARGA TOTAL (Kilogramos): '.convertir_a_letras((double)$guia['Guia']['totalchasisacop']).'.-');

//CARGA TOTAL: cinco milseiscientos setenta y ocho KILOS.


$pdf->AddPage();
// set the sourcefile
$pdf->setSourceFile('formularios/modelos/Guia de Traslado - Constancia Emision.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at point 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0,null );


// ORIGEN



if ($guia['Guia']['tipoorigen']=='Permiso') {
	$pdf->SetFont('TAHOMA','',9);
	//$pdf->SetTextColor(255,0,0);
	$margenX=36;
	$pdf->SetXY($margenX, 31);
	$pdf->Write(0, $guia['Guia']['tipoorigen']);
	$pdf->SetXY($margenX, 35);
	$pdf->Write(0, $guia['Guia']['nropermiso']);
	$pdf->SetXY($margenX, 39);
	$pdf->Write(0, trim($guia['Guia']['tipopermiso']));
	$pdf->SetXY($margenX, 43);
	$pdf->Write(0, $guia['Guia']['nombre1']);
	$pdf->SetXY($margenX, 47);
	$pdf->Write(0, $guia['Guia']['doc1']);
	$pdf->SetXY($margenX, 51);
	$pdf->Write(0, utf8_decode($guia['Guia']['domicilio1']));
	$pdf->SetXY($margenX, 55);
	$pdf->Write(0, $guia['Guia']['depto1']);
	$pdf->SetXY($margenX, 59);
	$pdf->Write(0, $guia['Guia']['provincia1']);

	$pdf->SetFont('TAHOMA','',8);
	$pdf->SetXY(16, 35);
	$pdf->Write(0, "Permiso N�");
	$pdf->SetXY(16, 39);
	$pdf->Write(0, "Tipo Permiso");
	$pdf->SetXY(16, 43);
	$pdf->Write(0, "Productor");
	$pdf->SetXY(16, 47);
	$pdf->Write(0, "DNI / CUIT");
	$pdf->SetXY(16, 51);
	$pdf->Write(0, "Predio");
	$pdf->SetXY(16, 55);
	$pdf->Write(0, "Departamento");
	$pdf->SetXY(16, 59);
	$pdf->Write(0, "Provincia");
}


if ($guia['Guia']['tipoorigen']=='Establecimiento') {
	$pdf->SetFont('TAHOMA','',9);
	//$pdf->SetTextColor(255,0,0);
	$margenX=36;
	$pdf->SetXY($margenX, 31);
	$pdf->Write(0, $guia['Guia']['tipoorigen']);
	$pdf->SetXY($margenX, 35);
	$pdf->Write(0,$guia['Guia']['nombre1'] );
	$pdf->SetXY($margenX, 39);
	$pdf->Write(0, $guia['Guia']['razonsocial1']);
	$pdf->SetXY($margenX, 43);
	$pdf->Write(0, $guia['Guia']['doc1']);
	$pdf->SetXY($margenX, 47);
	$pdf->Write(0, utf8_decode($guia['Guia']['domicilio1']));
	$pdf->SetXY($margenX, 51);
	$pdf->Write(0, $guia['Guia']['depto1']);
	$pdf->SetXY($margenX, 55);
	$pdf->Write(0, $guia['Guia']['provincia1']);
	//$pdf->SetXY($margenX, 59);
	//$pdf->Write(0, );

	$pdf->SetFont('TAHOMA','',8);
	$pdf->SetXY(16, 35);
	$pdf->Write(0, "Nombre");
	$pdf->SetXY(16, 39);
	$pdf->Write(0, "Razon Social");
	$pdf->SetXY(16, 43);
	$pdf->Write(0, "DNI / CUIT");
	$pdf->SetXY(16, 47);
	$pdf->Write(0, "Domicilio");
	$pdf->SetXY(16, 51);
	$pdf->Write(0, "Departamento");
	$pdf->SetXY(16, 55);
	$pdf->Write(0, "Provincia");
	//$pdf->SetXY(16, 59);
	//$pdf->Write(0, "Provincia");
	

}


// DESTINO
if ($guia['Guia']['tipodestino']=='Establecimiento') {
$pdf->SetFont('TAHOMA','',9);
//$pdf->SetTextColor(255,0,0);
$pdf->SetXY(136, 31);
$pdf->Write(0, $guia['Guia']['tipodestino']);
$pdf->SetXY(136, 35);
$pdf->Write(0, $guia['Guia']['nombre2']);
$pdf->SetXY(136, 39);
$pdf->Write(0, $guia['Guia']['razonsocial2']);
$pdf->SetXY(136, 43);
$pdf->Write(0, $guia['Guia']['doc2']);
$pdf->SetXY(136, 47);
$pdf->Write(0, utf8_decode($guia['Guia']['domicilio2']));
$pdf->SetXY(136, 51);
$pdf->Write(0, $guia['Guia']['depto2']);
$pdf->SetXY(136, 55);
$pdf->Write(0, $guia['Guia']['provincia2']);

$pdf->SetFont('TAHOMA','',8);
$pdf->SetXY(112, 35);
$pdf->Write(0, "Nombre");
$pdf->SetXY(112, 39);
$pdf->Write(0, "Razon Social");
$pdf->SetXY(112, 43);
$pdf->Write(0, "DNI / CUIT");
$pdf->SetXY(112, 47);
$pdf->Write(0, "Domicilio");
$pdf->SetXY(112, 51);
$pdf->Write(0, "Departamento");
$pdf->SetXY(112, 55);
$pdf->Write(0, "Provincia");
}


if ($guia['Guia']['tipodestino']=='Exportacion') {
$pdf->SetFont('TAHOMA','',9);
//$pdf->SetTextColor(255,0,0);
$pdf->SetXY(136, 31);
$pdf->Write(0, 'EXPORTACION'.' - '.$destinoexportacions['Tipodestinoexportacion']['nombre']);
$pdf->SetXY(136, 35);
$pdf->Write(0, $destinoexportacions['Destinoexportacion']['NroGuiaExterna']);
$pdf->SetXY(136, 39);
$pdf->Write(0, $destinoexportacions['Destinoexportacion']['RazonSocial']);
$pdf->SetXY(136, 43);
$pdf->Write(0, $destinoexportacions['Destinoexportacion']['DNICUIT']);
$pdf->SetXY(136, 47);
$pdf->Write(0, $destinoexportacions['Destinoexportacion']['Domicilio']);
$pdf->SetXY(136, 51);
$pdf->Write(0, $destinoexportacions['Destinoexportacion']['Observaciones']);
// $pdf->SetXY(136, 55);
// $pdf->Write(0, $destinoexportacions['Destinoexportacion']['NroGuiaExterna']);

$pdf->SetFont('TAHOMA','',8);
$pdf->SetXY(112, 35);
$pdf->Write(0, utf8_decode("Guía externa Nº"));
$pdf->SetXY(112, 39);
$pdf->Write(0, utf8_decode("Razón Social"));
$pdf->SetXY(112, 43);
$pdf->Write(0, "DNI / CUIT");
$pdf->SetXY(112, 47);
$pdf->Write(0, "Domicilio");
$pdf->SetXY(112, 51);
$pdf->Write(0, "Observaciones");
//$pdf->SetXY(112, 55);
//$pdf->Write(0, "Observaciones");
}
if ($guia['Guia']['tipodestino']=='Externo') {
$pdf->SetFont('TAHOMA','',9);
//$pdf->SetTextColor(255,0,0);
$pdf->SetXY(136, 31);
$pdf->Write(0, 'Externo'.' - '.$destinoexternos['Provincia']['nombre']);
$pdf->SetXY(136, 35);
$pdf->Write(0, $destinoexternos['Destinoexterno']['NroGuiaExterna']);
$pdf->SetXY(136, 39);
$pdf->Write(0, utf8_decode($destinoexternos['Destinoexterno']['RazonSocial']));
$pdf->SetXY(136, 43);
$pdf->Write(0, $destinoexternos['Destinoexterno']['DNICUIT']);
$pdf->SetXY(136, 47);
$pdf->Write(0, utf8_decode($destinoexternos['Destinoexterno']['Domicilio']));
$pdf->SetXY(136, 51);
$pdf->Write(0, utf8_decode($destinoexternos['Destinoexterno']['Observaciones']));
// $pdf->SetXY(136, 55);
// $pdf->Write(0, $destinoexportacions['Destinoexportacion']['NroGuiaExterna']);

$pdf->SetFont('TAHOMA','',8);
$pdf->SetXY(112, 35);
$pdf->Write(0, utf8_decode("Guía externa Nº"));
$pdf->SetXY(112, 39);
$pdf->Write(0, utf8_decode("Razón Social"));
$pdf->SetXY(112, 43);
$pdf->Write(0, "DNI / CUIT");
$pdf->SetXY(112, 47);
$pdf->Write(0, "Domicilio");
$pdf->SetXY(112, 51);
$pdf->Write(0, "Observaciones");
//$pdf->SetXY(112, 55);
//$pdf->Write(0, "Observaciones");
}
if ($guia['Guia']['tipodestino']=='Consumidor') {
    if ($guia['Guia']['tipoorigen']=='Permiso'){
        
        $pdf->SetFont('TAHOMA','',9);
        //$pdf->SetTextColor(255,0,0);
        $pdf->SetXY(136, 31);
        $pdf->Write(0, 'Externo'.' - '.'Chaco (monte nativo)');
        $pdf->SetXY(136, 35);
        $numerogexterna = '------';
        $pdf->Write(0,$numerogexterna);
        $pdf->SetXY(136, 39);
        $pdf->Write(0, utf8_decode($destinoconsumidors['Destinoconsumidor']['RazonSocial']));
        $pdf->SetXY(136, 43);
        $pdf->Write(0, $destinoconsumidors['Destinoconsumidor']['DNICUIT']);
        $pdf->SetXY(136, 47);
        $pdf->Write(0, utf8_decode($destinoconsumidors['Destinoconsumidor']['Domicilio']));
        $pdf->SetXY(136, 51);
        $pdf->Write(0, utf8_decode($destinoconsumidors['Destinoconsumidor']['Observaciones']));
        // $pdf->SetXY(136, 55);
        // $pdf->Write(0, $destinoexportacions['Destinoexportacion']['NroGuiaExterna']);
        
        $pdf->SetFont('TAHOMA','',8);
        $pdf->SetXY(112, 35);
        $pdf->Write(0, utf8_decode("Guía externa Nº"));
        $pdf->SetXY(112, 39);
        $pdf->Write(0, utf8_decode("Razón Social"));
        $pdf->SetXY(112, 43);
        $pdf->Write(0, "DNI / CUIT");
        $pdf->SetXY(112, 47);
        $pdf->Write(0, "Domicilio");
        $pdf->SetXY(112, 51);
        $pdf->Write(0, "Observaciones");
        //$pdf->SetXY(112, 55);
        //$pdf->Write(0, "Observaciones");
    }
   else{
        $pdf->SetFont('TAHOMA','',9);
        //$pdf->SetTextColor(255,0,0);
        $pdf->SetXY(136, 31);
        $pdf->Write(0, 'Consumidor Final');
        $pdf->SetXY(136, 35);
        $pdf->Write(0, '');
        $pdf->SetXY(136, 39);
        $pdf->Write(0, utf8_decode($destinoconsumidors['Destinoconsumidor']['RazonSocial']));
        $pdf->SetXY(136, 43);
        $pdf->Write(0, $destinoconsumidors['Destinoconsumidor']['DNICUIT']);
        $pdf->SetXY(136, 47);
        $pdf->Write(0, utf8_decode($destinoconsumidors['Destinoconsumidor']['Domicilio']));
        $pdf->SetXY(136, 51);
        $pdf->Write(0, utf8_decode($destinoconsumidors['Destinoconsumidor']['Observaciones']));
        // $pdf->SetXY(136, 55);
        // $pdf->Write(0, $destinoexportacions['Destinoexportacion']['NroGuiaExterna']);

        $pdf->SetFont('TAHOMA','',8);
        $pdf->SetXY(112, 35);
        $pdf->Write(0, "");
        $pdf->SetXY(112, 39);
        $pdf->Write(0, utf8_decode("Razón Social"));
        $pdf->SetXY(112, 43);
        $pdf->Write(0, "DNI / CUIT");
        $pdf->SetXY(112, 47);
        $pdf->Write(0, utf8_decode("Domicilio"));
        $pdf->SetXY(112, 51);
        $pdf->Write(0, utf8_decode("Observaciones"));
        //$pdf->SetXY(112, 55);
        //$pdf->Write(0, "Observaciones");
   }
}


//$pdf->AddFont('C39HrP36DlTt','','C39HrP36DlTt.php');
$pdf->SetFont('C39HrP36DlTt','',21);
$pdf->SetXY(72, 22.8);
$pdf->Write(0, "*".$guia['Guia']['nroguia']."*");

///$pdf->SetFont('TAHOMA','',9);
///$pdf->SetXY(93, 17);
///$pdf->Write(0, $guia['Guia']['nroguia']);

$pdf->SetFont('TAHOMA','',8);
$pdf->SetXY(164, 19);
$pdf->Write(0, date('d-m-Y H:i',strtotime($guia['Guia']['desde'])).' hs.');

$pdf->SetFont('TAHOMA','',8);
$pdf->SetXY(164, 25);
$pdf->Write(0, date('d-m-Y H:i',strtotime($guia['Guia']['hasta'])).' hs.');

$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(45, 76);
$pdf->Write(0, "Dominio ".$guia['Guia']['dominio1']."   Marca ".$guia['Guia']['marca1']."  Modelo ".$guia['Guia']['modelo1']);

if(!$guiaproductos) {
$pdf->SetFont('TAHOMA','',37);
$pdf->SetXY(20,100);
$pdf->Write(0, "*******************");
}

///Productos Chasis /////////////////////////////////////////////////////////
$ind=0;
foreach ($guiaproductos as $guiaproducto) {
$pdf->SetFont('TAHOMA','',8);
$pdf->SetXY(15, 93+(3 * $ind));

$pdf->Write(0,$guiaproducto['Guiaproducto']['codigo']);

$pdf->SetFont('TAHOMA','',9);
$pdf->SetXY(31, 93+(3 * $ind));
$pdf->Write(0, $guiaproducto['Guiaproducto']['descrip1']);

$pdf->SetFont('TAHOMA','',9);
$pdf->SetXY(121, 93+(3 * $ind));
$pdf->Write(0, $guiaproducto['Guiaproducto']['unidad1']);

$pdf->SetFont('TAHOMA','',9);
$valor=$pdf->GetStringWidth($guiaproducto['Guiaproducto']['kgunidad1'],'TAHOMA','',9,'');
$pdf->SetXY(155-$valor, 93+(3 * $ind));

//TCPDF::GetStringWidth ($ s,$ fontname = '', $fontstyle = '', $ fontsize = 0, $getarray = false )

//Write ($h, $txt, $link='', $fill=false, $align='', $ln=false, $stretch=0, $firstline=false, $firstblock=false, $maxh=0, $wadj=0, $margin='')
$pdf->Write(0, $guiaproducto['Guiaproducto']['kgunidad1'],'', false, 'L', false, 0, false, false, 0, 0, '' );



//if($envioproducto100['Producto']['idorig']) { 
		
//$envioproducto100['Envioproducto']['ordenproducto']
//$envioproducto100['Producto']['idorig']
//$envioproducto100['Producto']['nombre']
//$tipounidads[($envioproducto100['Producto']['tipounidad_id'])-1]['Tipounidad']['nombre']
//$envioproducto100['Producto']['pesounidad']
//$envioproducto100['Envioproducto']['cantidad']
//$envioproducto100['Producto']['pesounidad'] * $envioproducto100['Envioproducto']['cantidad']




$valor=$pdf->GetStringWidth($guiaproducto['Guiaproducto']['cantunidad1'],'TAHOMA','',10,'');
$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(176-$valor, 93 +(3 * $ind));
$pdf->Write(0, $guiaproducto['Guiaproducto']['cantunidad1']);

$valor=$pdf->GetStringWidth($guiaproducto['Guiaproducto']['cantunidad1'] * $guiaproducto['Guiaproducto']['kgunidad1'],'TAHOMA','',10,'');
$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(198-$valor,93 +(3 * $ind));
$pdf->Write(0, $guiaproducto['Guiaproducto']['cantunidad1'] * $guiaproducto['Guiaproducto']['kgunidad1']);

$ind=$ind+1;
}



$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(45, 132);
$pdf->Write(0, "Dominio ".$guia['Guia']['dominio2']."   Marca ".$guia['Guia']['marca2']."  Modelo ".$guia['Guia']['modelo2']);



$valor=$pdf->GetStringWidth((integer)$guia['Guia']['totalchasis'],'TAHOMA','',10,'');
$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(198-$valor,109);
$pdf->Write(0, (integer)$guia['Guia']['totalchasis']);


if(!$guiaproductos1) {
$pdf->SetFont('TAHOMA','',37);
$pdf->SetXY(20,155);
$pdf->Write(0, "*******************");
}

// Productos Acoplado ////////////////////////////////////////////////////////////////
$ind=0;
$margenY=149;
foreach ($guiaproductos1 as $guiaproducto1) {
	$pdf->SetFont('TAHOMA','',8);
	$pdf->SetXY(15, $margenY+(3 * $ind));

	$pdf->Write(0,$guiaproducto1['Guiaproducto']['codigo']);

	$pdf->SetFont('TAHOMA','',9);
	$pdf->SetXY(31, $margenY+(3 * $ind));
	$pdf->Write(0, $guiaproducto1['Guiaproducto']['descrip1']);

	$pdf->SetFont('TAHOMA','',9);
	$pdf->SetXY(121, $margenY+(3 * $ind));
	$pdf->Write(0, $guiaproducto1['Guiaproducto']['unidad1']);

	$pdf->SetFont('TAHOMA','',9);
	$valor=$pdf->GetStringWidth($guiaproducto1['Guiaproducto']['kgunidad1'],'TAHOMA','',9,'');
	$pdf->SetXY(155-$valor, $margenY+(3 * $ind));

	//TCPDF::GetStringWidth ($ s,$ fontname = '', $fontstyle = '', $ fontsize = 0, $getarray = false )

	//Write ($h, $txt, $link='', $fill=false, $align='', $ln=false, $stretch=0, $firstline=false, $firstblock=false, $maxh=0, $wadj=0, $margin='')
	$pdf->Write(0, $guiaproducto1['Guiaproducto']['kgunidad1'],'', false, 'L', false, 0, false, false, 0, 0, '' );

	$valor=$pdf->GetStringWidth($guiaproducto['Guiaproducto']['cantunidad1'],'TAHOMA','',10,'');
	$pdf->SetFont('TAHOMA','',10);
	$pdf->SetXY(176-$valor, $margenY +(3 * $ind));
	$pdf->Write(0, $guiaproducto1['Guiaproducto']['cantunidad1']);

	$valor=$pdf->GetStringWidth($guiaproducto1['Guiaproducto']['cantunidad1'] * $guiaproducto1['Guiaproducto']['kgunidad1'],'TAHOMA','',10,'');
	$pdf->SetFont('TAHOMA','',10);
	$pdf->SetXY(198-$valor,$margenY +(3 * $ind));
	$pdf->Write(0, $guiaproducto1['Guiaproducto']['cantunidad1'] * $guiaproducto1['Guiaproducto']['kgunidad1']);

	$ind=$ind+1;
}
//////////////////////////////////////////////////////////////////////////////////////



$valor=$pdf->GetStringWidth((integer)$guia['Guia']['totalacop'],'TAHOMA','',10,'');
$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(198-$valor,166);
$pdf->Write(0, (integer)$guia['Guia']['totalacop']);

$valor=$pdf->GetStringWidth((integer)$guia['Guia']['totalchasisacop'],'TAHOMA','',10,'');
$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(198-$valor,189);
$pdf->Write(0, (integer)$guia['Guia']['totalchasisacop']);

$pdf->SetXY(15,189);
$pdf->Write(0, 'CARGA TOTAL (Kilogramos): '.convertir_a_letras((double)$guia['Guia']['totalchasisacop']).'.-');
//$pdf->Write(0, convertir_a_letras((double)$guia['Guia']['totalchasisacop']));

///////////////// Rutina para agregar la constancia para subsecretaria de medio ambiente de la nacion ----> OFB (05-02-15)
if ($guia['Guia']['tipodestino']=='Exportacion') {

$pdf->AddPage();
// set the sourcefile
$pdf->setSourceFile('formularios/modelos/Guia de Traslado - Secretaria de Ambiente.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at point 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0,null );

// ORIGEN

if ($guia['Guia']['tipoorigen']=='Permiso') {
	$pdf->SetFont('TAHOMA','',9);
	//$pdf->SetTextColor(255,0,0);
	$margenX=36;
	$pdf->SetXY($margenX, 31);
	$pdf->Write(0, $guia['Guia']['tipoorigen']);
	$pdf->SetXY($margenX, 35);
	$pdf->Write(0, $guia['Guia']['nropermiso']);
	$pdf->SetXY($margenX, 39);
	$pdf->Write(0, trim($guia['Guia']['tipopermiso']));
	$pdf->SetXY($margenX, 43);
	$pdf->Write(0, $guia['Guia']['nombre1']);
	$pdf->SetXY($margenX, 47);
	$pdf->Write(0, $guia['Guia']['doc1']);
	$pdf->SetXY($margenX, 51);
	$pdf->Write(0, utf8_decode($guia['Guia']['domicilio1']));
	$pdf->SetXY($margenX, 55);
	$pdf->Write(0, $guia['Guia']['depto1']);
	$pdf->SetXY($margenX, 59);
	$pdf->Write(0, $guia['Guia']['provincia1']);

	$pdf->SetFont('TAHOMA','',8);
	$pdf->SetXY(16, 35);
	$pdf->Write(0, "Permiso N�");
	$pdf->SetXY(16, 39);
	$pdf->Write(0, "Tipo Permiso");
	$pdf->SetXY(16, 43);
	$pdf->Write(0, "Productor");
	$pdf->SetXY(16, 47);
	$pdf->Write(0, "DNI / CUIT");
	$pdf->SetXY(16, 51);
	$pdf->Write(0, "Predio");
	$pdf->SetXY(16, 55);
	$pdf->Write(0, "Departamento");
	$pdf->SetXY(16, 59);
	$pdf->Write(0, "Provincia");
}


if ($guia['Guia']['tipoorigen']=='Establecimiento') {
	$pdf->SetFont('TAHOMA','',9);
	//$pdf->SetTextColor(255,0,0);
	$margenX=36;
	$pdf->SetXY($margenX, 31);
	$pdf->Write(0, $guia['Guia']['tipoorigen']);
	$pdf->SetXY($margenX, 35);
	$pdf->Write(0,$guia['Guia']['nombre1'] );
	$pdf->SetXY($margenX, 39);
	$pdf->Write(0, $guia['Guia']['razonsocial1']);
	$pdf->SetXY($margenX, 43);
	$pdf->Write(0, $guia['Guia']['doc1']);
	$pdf->SetXY($margenX, 47);
	$pdf->Write(0, utf8_decode($guia['Guia']['domicilio1']));
	$pdf->SetXY($margenX, 51);
	$pdf->Write(0, $guia['Guia']['depto1']);
	$pdf->SetXY($margenX, 55);
	$pdf->Write(0, $guia['Guia']['provincia1']);
	//$pdf->SetXY($margenX, 59);
	//$pdf->Write(0, );

	$pdf->SetFont('TAHOMA','',8);
	$pdf->SetXY(16, 35);
	$pdf->Write(0, "Nombre");
	$pdf->SetXY(16, 39);
	$pdf->Write(0, "Razon Social");
	$pdf->SetXY(16, 43);
	$pdf->Write(0, "DNI / CUIT");
	$pdf->SetXY(16, 47);
	$pdf->Write(0, "Domicilio");
	$pdf->SetXY(16, 51);
	$pdf->Write(0, "Departamento");
	$pdf->SetXY(16, 55);
	$pdf->Write(0, "Provincia");
	//$pdf->SetXY(16, 59);
	//$pdf->Write(0, "Provincia");
	

}


// DESTINO Exportacion para la tercer página --> OFB (05-02-15)

$pdf->SetFont('TAHOMA','',9);
//$pdf->SetTextColor(255,0,0);
$pdf->SetXY(136, 31);
$pdf->Write(0, 'EXPORTACION'.' - '.$destinoexportacions['Tipodestinoexportacion']['nombre']);
$pdf->SetXY(136, 35);
$pdf->Write(0, $destinoexportacions['Destinoexportacion']['NroGuiaExterna']);
$pdf->SetXY(136, 39);
$pdf->Write(0, utf8_decode($destinoexportacions['Destinoexportacion']['RazonSocial']));
$pdf->SetXY(136, 43);
$pdf->Write(0, $destinoexportacions['Destinoexportacion']['DNICUIT']);
$pdf->SetXY(136, 47);
$pdf->Write(0, utf8_decode($destinoexportacions['Destinoexportacion']['Domicilio']));
$pdf->SetXY(136, 51);
$pdf->Write(0, utf8_decode($destinoexportacions['Destinoexportacion']['Observaciones']));
// $pdf->SetXY(136, 55);
// $pdf->Write(0, $destinoexportacions['Destinoexportacion']['NroGuiaExterna']);

$pdf->SetFont('TAHOMA','',8);
$pdf->SetXY(112, 35);
$pdf->Write(0, utf8_decode("Guía externa Nº"));
$pdf->SetXY(112, 39);
$pdf->Write(0, utf8_decode("Razón Social"));
$pdf->SetXY(112, 43);
$pdf->Write(0, "DNI / CUIT");
$pdf->SetXY(112, 47);
$pdf->Write(0, "Domicilio");
$pdf->SetXY(112, 51);
$pdf->Write(0, "Observaciones");
//$pdf->SetXY(112, 55);
//$pdf->Write(0, "Observaciones");


//$pdf->AddFont('C39HrP36DlTt','','C39HrP36DlTt.php');
$pdf->SetFont('C39HrP36DlTt','',21);
$pdf->SetXY(72, 22.8);
$pdf->Write(0, "*".$guia['Guia']['nroguia']."*");

///$pdf->SetFont('TAHOMA','',9);
///$pdf->SetXY(93, 17);
///$pdf->Write(0, $guia['Guia']['nroguia']);

$pdf->SetFont('TAHOMA','',8);
$pdf->SetXY(164, 19);
$pdf->Write(0, date('d-m-Y H:i',strtotime($guia['Guia']['desde'])).' hs.');

$pdf->SetFont('TAHOMA','',8);
$pdf->SetXY(164, 25);
$pdf->Write(0, date('d-m-Y H:i',strtotime($guia['Guia']['hasta'])).' hs.');

$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(45, 76);
$pdf->Write(0, "Dominio ".$guia['Guia']['dominio1']."   Marca ".$guia['Guia']['marca1']."  Modelo ".$guia['Guia']['modelo1']);

if(!$guiaproductos) {
$pdf->SetFont('TAHOMA','',37);
$pdf->SetXY(20,100);
$pdf->Write(0, "*******************");
}

///Productos Chasis /////////////////////////////////////////////////////////
$ind=0;
foreach ($guiaproductos as $guiaproducto) {
$pdf->SetFont('TAHOMA','',8);
$pdf->SetXY(15, 93+(3 * $ind));

$pdf->Write(0,$guiaproducto['Guiaproducto']['codigo']);

$pdf->SetFont('TAHOMA','',9);
$pdf->SetXY(31, 93+(3 * $ind));
$pdf->Write(0, $guiaproducto['Guiaproducto']['descrip1']);

$pdf->SetFont('TAHOMA','',9);
$pdf->SetXY(121, 93+(3 * $ind));
$pdf->Write(0, $guiaproducto['Guiaproducto']['unidad1']);

$pdf->SetFont('TAHOMA','',9);
$valor=$pdf->GetStringWidth($guiaproducto['Guiaproducto']['kgunidad1'],'TAHOMA','',9,'');
$pdf->SetXY(155-$valor, 93+(3 * $ind));

//TCPDF::GetStringWidth ($ s,$ fontname = '', $fontstyle = '', $ fontsize = 0, $getarray = false )

//Write ($h, $txt, $link='', $fill=false, $align='', $ln=false, $stretch=0, $firstline=false, $firstblock=false, $maxh=0, $wadj=0, $margin='')
$pdf->Write(0, $guiaproducto['Guiaproducto']['kgunidad1'],'', false, 'L', false, 0, false, false, 0, 0, '' );



//if($envioproducto100['Producto']['idorig']) { 
		
//$envioproducto100['Envioproducto']['ordenproducto']
//$envioproducto100['Producto']['idorig']
//$envioproducto100['Producto']['nombre']
//$tipounidads[($envioproducto100['Producto']['tipounidad_id'])-1]['Tipounidad']['nombre']
//$envioproducto100['Producto']['pesounidad']
//$envioproducto100['Envioproducto']['cantidad']
//$envioproducto100['Producto']['pesounidad'] * $envioproducto100['Envioproducto']['cantidad']




$valor=$pdf->GetStringWidth($guiaproducto['Guiaproducto']['cantunidad1'],'TAHOMA','',10,'');
$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(176-$valor, 93 +(3 * $ind));
$pdf->Write(0, $guiaproducto['Guiaproducto']['cantunidad1']);

$valor=$pdf->GetStringWidth($guiaproducto['Guiaproducto']['cantunidad1'] * $guiaproducto['Guiaproducto']['kgunidad1'],'TAHOMA','',10,'');
$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(198-$valor,93 +(3 * $ind));
$pdf->Write(0, $guiaproducto['Guiaproducto']['cantunidad1'] * $guiaproducto['Guiaproducto']['kgunidad1']);

$ind=$ind+1;
}



$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(45, 132);
$pdf->Write(0, "Dominio ".$guia['Guia']['dominio2']."   Marca ".$guia['Guia']['marca2']."  Modelo ".$guia['Guia']['modelo2']);



$valor=$pdf->GetStringWidth((integer)$guia['Guia']['totalchasis'],'TAHOMA','',10,'');
$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(198-$valor,109);
$pdf->Write(0, (integer)$guia['Guia']['totalchasis']);


if(!$guiaproductos1) {
$pdf->SetFont('TAHOMA','',37);
$pdf->SetXY(20,155);
$pdf->Write(0, "*******************");
}

// Productos Acoplado ////////////////////////////////////////////////////////////////
$ind=0;
$margenY=149;
foreach ($guiaproductos1 as $guiaproducto1) {
	$pdf->SetFont('TAHOMA','',8);
	$pdf->SetXY(15, $margenY+(3 * $ind));

	$pdf->Write(0,$guiaproducto1['Guiaproducto']['codigo']);

	$pdf->SetFont('TAHOMA','',9);
	$pdf->SetXY(31, $margenY+(3 * $ind));
	$pdf->Write(0, $guiaproducto1['Guiaproducto']['descrip1']);

	$pdf->SetFont('TAHOMA','',9);
	$pdf->SetXY(121, $margenY+(3 * $ind));
	$pdf->Write(0, $guiaproducto1['Guiaproducto']['unidad1']);

	$pdf->SetFont('TAHOMA','',9);
	$valor=$pdf->GetStringWidth($guiaproducto1['Guiaproducto']['kgunidad1'],'TAHOMA','',9,'');
	$pdf->SetXY(155-$valor, $margenY+(3 * $ind));

	//TCPDF::GetStringWidth ($ s,$ fontname = '', $fontstyle = '', $ fontsize = 0, $getarray = false )

	//Write ($h, $txt, $link='', $fill=false, $align='', $ln=false, $stretch=0, $firstline=false, $firstblock=false, $maxh=0, $wadj=0, $margin='')
	$pdf->Write(0, $guiaproducto1['Guiaproducto']['kgunidad1'],'', false, 'L', false, 0, false, false, 0, 0, '' );

	$valor=$pdf->GetStringWidth($guiaproducto['Guiaproducto']['cantunidad1'],'TAHOMA','',10,'');
	$pdf->SetFont('TAHOMA','',10);
	$pdf->SetXY(176-$valor, $margenY +(3 * $ind));
	$pdf->Write(0, $guiaproducto1['Guiaproducto']['cantunidad1']);

	$valor=$pdf->GetStringWidth($guiaproducto1['Guiaproducto']['cantunidad1'] * $guiaproducto1['Guiaproducto']['kgunidad1'],'TAHOMA','',10,'');
	$pdf->SetFont('TAHOMA','',10);
	$pdf->SetXY(198-$valor,$margenY +(3 * $ind));
	$pdf->Write(0, $guiaproducto1['Guiaproducto']['cantunidad1'] * $guiaproducto1['Guiaproducto']['kgunidad1']);

	$ind=$ind+1;
}
//////////////////////////////////////////////////////////////////////////////////////



$valor=$pdf->GetStringWidth((integer)$guia['Guia']['totalacop'],'TAHOMA','',10,'');
$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(198-$valor,166);
$pdf->Write(0, (integer)$guia['Guia']['totalacop']);

$valor=$pdf->GetStringWidth((integer)$guia['Guia']['totalchasisacop'],'TAHOMA','',10,'');
$pdf->SetFont('TAHOMA','',10);
$pdf->SetXY(198-$valor,189);
$pdf->Write(0, (integer)$guia['Guia']['totalchasisacop']);

$pdf->SetXY(15,189);
$pdf->Write(0, 'CARGA TOTAL (Kilogramos): '.convertir_a_letras((double)$guia['Guia']['totalchasisacop']).'.-');
//$pdf->Write(0, convertir_a_letras((double)$guia['Guia']['totalchasisacop']));
}
//////////// Fin Rutina de constancia medio ambiente

$pdf->Output('formularios/guias/pdfs//'.$guia['Guia']['nroguia'].'.pdf', 'F');
$pdf->Output('formularios/guias/pdfs//'.$guia['Guia']['nroguia'].'.pdf', 'I');


	exit(0);
?>


<?php
// FUNCIONES DE CONVERSION DE NUMEROS A LETRAS.

function centimos()
{
	global $importe_parcial;

	$importe_parcial = number_format($importe_parcial, 2, ".", "") * 100;

	if ($importe_parcial > 0)
		$num_letra = " con ".decena_centimos($importe_parcial);
	else
		$num_letra = "";

	return $num_letra;
}

function unidad_centimos($numero)
{
	switch ($numero)
	{
		case 9:
		{
			$num_letra = "nueve gramos";
			break;
		}
		case 8:
		{
			$num_letra = "ocho gramos";
			break;
		}
		case 7:
		{
			$num_letra = "siete gramos";
			break;
		}
		case 6:
		{
			$num_letra = "seis gramos";
			break;
		}
		case 5:
		{
			$num_letra = "cinco gramos";
			break;
		}
		case 4:
		{
			$num_letra = "cuatro gramos";
			break;
		}
		case 3:
		{
			$num_letra = "tres gramos";
			break;
		}
		case 2:
		{
			$num_letra = "dos gramos";
			break;
		}
		case 1:
		{
			$num_letra = "un gramo";
			break;
		}
	}
	return $num_letra;
}

function decena_centimos($numero)
{
	if ($numero >= 10)
	{
		if ($numero >= 90 && $numero <= 99)
		{
			  if ($numero == 90)
				  return "noventa gramos";
			  else if ($numero == 91)
				  return "noventa y un gramos";
			  else
				  return "noventa y ".unidad_centimos($numero - 90);
		}
		if ($numero >= 80 && $numero <= 89)
		{
			if ($numero == 80)
				return "ochenta gramos";
			else if ($numero == 81)
				return "ochenta y un gramos";
			else
				return "ochenta y ".unidad_centimos($numero - 80);
		}
		if ($numero >= 70 && $numero <= 79)
		{
			if ($numero == 70)
				return "setenta gramos";
			else if ($numero == 71)
				return "setenta y un gramos";
			else
				return "setenta y ".unidad_centimos($numero - 70);
		}
		if ($numero >= 60 && $numero <= 69)
		{
			if ($numero == 60)
				return "sesenta gramos";
			else if ($numero == 61)
				return "sesenta y un gramos";
			else
				return "sesenta y ".unidad_centimos($numero - 60);
		}
		if ($numero >= 50 && $numero <= 59)
		{
			if ($numero == 50)
				return "cincuenta gramos";
			else if ($numero == 51)
				return "cincuenta y un gramos";
			else
				return "cincuenta y ".unidad_centimos($numero - 50);
		}
		if ($numero >= 40 && $numero <= 49)
		{
			if ($numero == 40)
				return "cuarenta gramos";
			else if ($numero == 41)
				return "cuarenta y un gramos";
			else
				return "cuarenta y ".unidad_centimos($numero - 40);
		}
		if ($numero >= 30 && $numero <= 39)
		{
			if ($numero == 30)
				return "treinta gramos";
			else if ($numero == 91)
				return "treinta y un gramos";
			else
				return "treinta y ".unidad_centimos($numero - 30);
		}
		if ($numero >= 20 && $numero <= 29)
		{
			if ($numero == 20)
				return "veinte gramos";
			else if ($numero == 21)
				return "veintiun gramos";
			else
				return "veinti".unidad_centimos($numero - 20);
		}
		if ($numero >= 10 && $numero <= 19)
		{
			if ($numero == 10)
				return "diez gramos";
			else if ($numero == 11)
				return "once gramos";
			else if ($numero == 12)
				return "doce gramos";
			else if ($numero == 13)
				return "trece gramos";
			else if ($numero == 14)
				return "catorce gramos";
			else if ($numero == 15)
				return "quince gramos";
			else if ($numero == 16)
				return "dieciseis gramos";
			else if ($numero == 17)
				return "diecisiete gramos";
			else if ($numero == 18)
				return "dieciocho gramos";
			else if ($numero == 19)
				return "diecinueve gramos";
		}
	}
	else
		return unidad_centimos($numero);
}

function unidad($numero)
{
	switch ($numero)
	{
		case 9:
		{
			$num = "nueve";
			break;
		}
		case 8:
		{
			$num = "ocho";
			break;
		}
		case 7:
		{
			$num = "siete";
			break;
		}
		case 6:
		{
			$num = "seis";
			break;
		}
		case 5:
		{
			$num = "cinco";
			break;
		}
		case 4:
		{
			$num = "cuatro";
			break;
		}
		case 3:
		{
			$num = "tres";
			break;
		}
		case 2:
		{
			$num = "dos";
			break;
		}
		case 1:
		{
			$num = "uno";
			break;
		}
	}
	return $num;
}

function decena($numero)
{
	if ($numero >= 90 && $numero <= 99)
	{
		$num_letra = "noventa ";
		
		if ($numero > 90)
			$num_letra = $num_letra."y ".unidad($numero - 90);
	}
	else if ($numero >= 80 && $numero <= 89)
	{
		$num_letra = "ochenta ";
		
		if ($numero > 80)
			$num_letra = $num_letra."y ".unidad($numero - 80);
	}
	else if ($numero >= 70 && $numero <= 79)
	{
			$num_letra = "setenta ";
		
		if ($numero > 70)
			$num_letra = $num_letra."y ".unidad($numero - 70);
	}
	else if ($numero >= 60 && $numero <= 69)
	{
		$num_letra = "sesenta ";
		
		if ($numero > 60)
			$num_letra = $num_letra."y ".unidad($numero - 60);
	}
	else if ($numero >= 50 && $numero <= 59)
	{
		$num_letra = "cincuenta ";
		
		if ($numero > 50)
			$num_letra = $num_letra."y ".unidad($numero - 50);
	}
	else if ($numero >= 40 && $numero <= 49)
	{
		$num_letra = "cuarenta ";
		
		if ($numero > 40)
			$num_letra = $num_letra."y ".unidad($numero - 40);
	}
	else if ($numero >= 30 && $numero <= 39)
	{
		$num_letra = "treinta ";
		
		if ($numero > 30)
			$num_letra = $num_letra."y ".unidad($numero - 30);
	}
	else if ($numero >= 20 && $numero <= 29)
	{
		if ($numero == 20)
			$num_letra = "veinte ";
		else
			$num_letra = "veinti".unidad($numero - 20);
	}
	else if ($numero >= 10 && $numero <= 19)
	{
		switch ($numero)
		{
			case 10:
			{
				$num_letra = "diez ";
				break;
			}
			case 11:
			{
				$num_letra = "once ";
				break;
			}
			case 12:
			{
				$num_letra = "doce ";
				break;
			}
			case 13:
			{
				$num_letra = "trece ";
				break;
			}
			case 14:
			{
				$num_letra = "catorce ";
				break;
			}
			case 15:
			{
				$num_letra = "quince ";
				break;
			}
			case 16:
			{
				$num_letra = "dieciseis ";
				break;
			}
			case 17:
			{
				$num_letra = "diecisiete ";
				break;
			}
			case 18:
			{
				$num_letra = "dieciocho ";
				break;
			}
			case 19:
			{
				$num_letra = "diecinueve ";
				break;
			}
		}
	}
	else
		$num_letra = unidad($numero);

	return $num_letra;
}

function centena($numero)
{
	if ($numero >= 100)
	{
		if ($numero >= 900 & $numero <= 999)
		{
			$num_letra = "novecientos ";
			
			if ($numero > 900)
				$num_letra = $num_letra.decena($numero - 900);
		}
		else if ($numero >= 800 && $numero <= 899)
		{
			$num_letra = "ochocientos ";
			
			if ($numero > 800)
				$num_letra = $num_letra.decena($numero - 800);
		}
		else if ($numero >= 700 && $numero <= 799)
		{
			$num_letra = "setecientos ";
			
			if ($numero > 700)
				$num_letra = $num_letra.decena($numero - 700);
		}
		else if ($numero >= 600 && $numero <= 699)
		{
			$num_letra = "seiscientos ";
			
			if ($numero > 600)
				$num_letra = $num_letra.decena($numero - 600);
		}
		else if ($numero >= 500 && $numero <= 599)
		{
			$num_letra = "quinientos ";
			
			if ($numero > 500)
				$num_letra = $num_letra.decena($numero - 500);
		}
		else if ($numero >= 400 && $numero <= 499)
		{
			$num_letra = "cuatrocientos ";
			
			if ($numero > 400)
				$num_letra = $num_letra.decena($numero - 400);
		}
		else if ($numero >= 300 && $numero <= 399)
		{
			$num_letra = "trescientos ";
			
			if ($numero > 300)
				$num_letra = $num_letra.decena($numero - 300);
		}
		else if ($numero >= 200 && $numero <= 299)
		{
			$num_letra = "doscientos ";
			
			if ($numero > 200)
				$num_letra = $num_letra.decena($numero - 200);
		}
		else if ($numero >= 100 && $numero <= 199)
		{
			if ($numero == 100)
				$num_letra = "cien ";
			else
				$num_letra = "ciento ".decena($numero - 100);
		}
	}
	else
		$num_letra = decena($numero);
	
	return $num_letra;
}

function cien()
{
	global $importe_parcial;
	
	$parcial = 0; $car = 0;
	
	while (substr($importe_parcial, 0, 1) == 0 && strlen($importe_parcial)) /// Se agrega un condición mas para tratar el caso de que los ultimos tres digitos sean cero ----> OFB (05-02-15)
		$importe_parcial = substr($importe_parcial, 1, strlen($importe_parcial) - 1);
	
	if ($importe_parcial >= 1 && $importe_parcial <= 9.99)
		$car = 1;
	else if ($importe_parcial >= 10 && $importe_parcial <= 99.99)
		$car = 2;
	else if ($importe_parcial >= 100 && $importe_parcial <= 999.99)
		$car = 3;
	
	$parcial = substr($importe_parcial, 0, $car);
	$importe_parcial = substr($importe_parcial, $car);
	
	$num_letra = centena($parcial).centimos();
	
	return $num_letra;
}

function cien_mil()
{
	global $importe_parcial;
	
	$parcial = 0; $car = 0;
	
	while (substr($importe_parcial, 0, 1) == 0)
		$importe_parcial = substr($importe_parcial, 1, strlen($importe_parcial) - 1);
	
	if ($importe_parcial >= 1000 && $importe_parcial <= 9999.99)
		$car = 1;
	else if ($importe_parcial >= 10000 && $importe_parcial <= 99999.99)
		$car = 2;
	else if ($importe_parcial >= 100000 && $importe_parcial <= 999999.99)
		$car = 3;
	
	$parcial = substr($importe_parcial, 0, $car);
	$importe_parcial = substr($importe_parcial, $car);
	
	if ($parcial > 0)
	{
		if ($parcial == 1){
                    $num_letra = "mil ";
                }
		else{
                    $num_letra = centena($parcial)." mil ";
                }
	}
	
	return $num_letra;
}


function millon()
{
	global $importe_parcial;
	
	$parcial = 0; $car = 0;
	
	while (substr($importe_parcial, 0, 1) == 0)
		$importe_parcial = substr($importe_parcial, 1, strlen($importe_parcial) - 1);
	
	if ($importe_parcial >= 1000000 && $importe_parcial <= 9999999.99)
		$car = 1;
	else if ($importe_parcial >= 10000000 && $importe_parcial <= 99999999.99)
		$car = 2;
	else if ($importe_parcial >= 100000000 && $importe_parcial <= 999999999.99)
		$car = 3;
	
	$parcial = substr($importe_parcial, 0, $car);
	$importe_parcial = substr($importe_parcial, $car);
	
	if ($parcial == 1)
		$num_letras = "un millón ";
	else
		$num_letras = centena($parcial)." millones ";
	
	return $num_letras;
}

function convertir_a_letras($numero)
{
	global $importe_parcial;
	
	$importe_parcial = $numero;
	
	if ($numero < 1000000000)
	{
		if ($numero >= 1000000 && $numero <= 999999999.99)
			$num_letras = millon().cien_mil().cien();
		else if ($numero >= 1000 && $numero <= 999999.99)
			$num_letras = cien_mil().cien();
		else if ($numero >= 1 && $numero <= 999.99)
			$num_letras = cien();
		else if ($numero >= 0.01 && $numero <= 0.99)
		{
			if ($numero == 0.01)
				$num_letras = "un gramo";
			else
				$num_letras = convertir_a_letras(($numero * 100)."/100")." gramos";
		}
	}
	return $num_letras;
}


?>




