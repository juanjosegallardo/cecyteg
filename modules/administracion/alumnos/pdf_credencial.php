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

	$ancho=62;
	$largo=95;

	$pdf=new PDF_Code128();
	$pdf->AddPage();


	$obj_alumno =  new Alumno();
	$obj_alumno->id_alumno= $_GET["id_alumno"];
	$obj_alumno->cargarPorId();

	$ruta_foto = (file_exists("../../../web/uploads/alumnos/{$obj_alumno->id_alumno}.jpg"))?"../../../web/uploads/alumnos/{$obj_alumno->id_alumno}.jpg":"../../../web/images/generales/usuario.jpg";	 

	$pdf->Image("../../../web/images/credencial/fondo.jpg" , 0,0, $ancho , $largo,'JPG', "");
	$pdf->SetXY( 0,63);
	$pdf->SetFont('Arial','B',8);
	$pdf->Write(4," ". $obj_alumno->nombre);

     
   	//$pdf->Code128( 15 ,70,$obj_alumno->no_control,30,10);    
          

	$pdf->SetXY(0 ,75);
	$pdf->SetFont('Arial','B',8);
	$pdf->Write(4,$obj_alumno->no_control);

	$pdf->Image($ruta_foto , 4,22, 28 , 33,'JPG', $ruta_foto);



	$pdf->Rect(0,0,$ancho,$largo);

	$pdf->Output('credencial.pdf', 'I');

?>
