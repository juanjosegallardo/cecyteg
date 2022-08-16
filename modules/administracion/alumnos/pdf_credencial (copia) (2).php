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


	$pdf=new PDF_Code128();
	$pdf->AddPage();


	$obj_alumno =  new Alumno();
	$obj_alumno->id_alumno= $_GET["id_alumno"];
	$obj_alumno->cargarPorId();

	$ruta_foto = (file_exists("../../../web/uploads/alumnos/{$obj_alumno->id_alumno}.jpg"))?"../../../web/uploads/alumnos/{$obj_alumno->id_alumno}.jpg":"../../../web/images/generales/usuario.jpg";	 


	$pdf->SetXY( 0,2);
	$pdf->SetFont('Arial','',7);
	$pdf->Write(4,$obj_alumno->nombre);

     
   	$pdf->Code128( 10 ,49,$obj_alumno->no_control,30,10);    
          

	$pdf->SetXY(15 ,60);
	$pdf->SetFont('Arial','B',6);
	$pdf->Write(4,$obj_alumno->no_control);

	$pdf->Image($ruta_foto , 7 ,9, 35 , 38,'JPG', $ruta_foto);

	$pdf->SetXY(10 ,65);
	$pdf->SetFont('Arial','B',7);
	$pdf->Write(4,"CENTRO DE COMPUTO");

	$pdf->SetXY(11 ,69);
	$pdf->SetFont('Arial','B',7);
	$pdf->Write(4,"CECYTEG PENJAMO");



	$pdf->Rect(0,0,53,85);

	$pdf->Output('credencial.pdf', 'I');

?>
