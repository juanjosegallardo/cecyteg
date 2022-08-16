<?php    
	header( "Expires: Mon, 20 Dec 1998 01:00:00 GMT" );
	header( "Last-Modified: . gmdate(D, d M Y H:i:s) . GMT" );
	header( "Cache-Control: no-cache, must-revalidate" );
	header( "Pragma: no-cache" ); 

	include_once("../../../config.php");  
	require('../../../lib/fpdf/code128.php');

	include("../../../lib/generales/cls_conexion.php");
	include("../../../lib/generales/cls_general.php");
	include("../../../classes/cls_configuracion.php");
	include("../../../classes/cls_alumno.php");
	include("../../../classes/cls_reporte.php");


	$pdf=new PDF_Code128();
	$pdf->AddPage();
	
	$obj_reporte =  new Reporte();
	$obj_reporte->id_reporte = $_GET["id_reporte"];
	$obj_reporte->cargarPorId();

	$obj_alumno =  new Alumno();
	$obj_alumno->id_alumno= $obj_reporte->tbl_alumno_id_alumno;
	$obj_alumno->cargarPorId();

	
	
	
	$pdf->Image("../../../web/images/reporte.jpg" , 0,0, 210 , 120,'JPG', "");
	
	
	$pdf->SetXY(61 ,28);
	$pdf->SetFont('Arial','',7);
	$pdf->Write(4,"PÉNJAMO");
	
	$pdf->SetXY(130 ,28);
	$pdf->SetFont('Arial','',7);
	$pdf->Write(4,$obj_reporte->fecha);

	$pdf->SetXY( 50,35);
	$pdf->SetFont('Arial','',7);
	$pdf->Write(4,$obj_alumno->nombre);

	$pdf->SetXY(115 ,35);
	$pdf->SetFont('Arial','',7);
	$pdf->Write(4,$obj_alumno->grupo);

	$pdf->SetXY(140 ,35);
	$pdf->SetFont('Arial','',7);
	$pdf->Write(4,$obj_alumno->no_control);

	$pdf->SetXY( 46,69);
	$pdf->SetFont('Arial','',7);
	$pdf->Write(4,$obj_reporte->causa);

	
	$pdf->Output('reporte.pdf', 'I');

?>
