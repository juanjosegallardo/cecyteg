<?php    
	$columnas =5;
	$renglones = 4;

	$ancho =60; 
	$largo = 95;

	$x =0;
	$y=0;

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



	$obj_alumno =  new Alumno();
	$obj_alumno->grupo= $_POST["txt_grupo"];
	$obj_alumno->cargarPorGrupo();

	$i=0;
	foreach($obj_alumno->_datos as $alumno)
	{

		if($i%9==0)
		{
			$pdf->AddPage();
			$i=0;
		}

		$x= ($i % 3) * $ancho;
		$y=floor($i / 3) * $largo;


		$ruta_foto = (file_exists("../../../web/uploads/alumnos/{$alumno["id_alumno"]}.jpg"))?"../../../web/uploads/alumnos/{$alumno["id_alumno"]}.jpg":"../../../web/images/generales/usuario.jpg";	 
	

		
		$pdf->Image("../../../web/images/credencial/fondo.jpg" , $x, $y, $ancho , $largo,'JPG', "");		
		$pdf->SetXY( $x+ 0, $y+63);
		$pdf->SetFont('Arial','',7);
		$pdf->Write(4, utf8_decode( $alumno["nombre"]));

	     
	   	 $pdf->Code128($x+ 15 ,$y+70,$alumno["no_control"],30,10);    
		  

		$pdf->SetXY($x+0 ,$y+66);
		$pdf->SetFont('Arial','B',6);
		$pdf->Write(4,$alumno["no_control"]);

		$pdf->Image($ruta_foto , $x+17 ,$y+24, 28 , 33,'JPG', $ruta_foto);
		$pdf->Rect($x,$y,$ancho,$largo);

		

		$i++;

		
	}

	$pdf->Output('credencial.pdf', 'I');

?>
