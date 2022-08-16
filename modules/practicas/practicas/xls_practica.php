<?php

require_once ('../../../lib/phpexcel/Classes/PHPExcel.php');
include_once("../../../config.php");  
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_permiso.php");
include("../../../classes/cls_clase.php");

$clase = new Clase();
$clase->id_clase = $_GET["id_clase"];

$clase->cargarPorId();


$objPHPExcel = new PHPExcel();
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$ruta_practica = (file_exists("../../../web/uploads/practicas/{$clase->tbl_practica_id_practica}.xlsx"))?"../../../web/uploads/practicas/{$clase->tbl_practica_id_practica}.xlsx?x=".rand(1,1000000) :"../../../web/uploads/practicas/formato.xlsx" ;	     

$objPHPExcel = $objReader->load("../../../web/uploads/practicas/{$clase->tbl_practica_id_practica}.xlsx");




$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("PHPExcel Test Document")
							 ->setSubject("PHPExcel Test Document")
							 ->setDescription("Test document for PHPExcel, generated using PHP classes.")
							 ->setKeywords("office PHPExcel php")
							 ->setCategory("Test result file");


//$objPHPExcel->getActiveSheet()->setCellValue('J3',$clase->fecha);
$objPHPExcel->getActiveSheet()->setCellValue('J4',$clase->fecha_completa);
$objPHPExcel->getActiveSheet()->setCellValue('J5',$clase->turno);
$objPHPExcel->getActiveSheet()->setCellValue('J6',$clase->grupo);
$objPHPExcel->getActiveSheet()->setCellValue('D6',$clase->materia);
$objPHPExcel->getActiveSheet()->setCellValue('D4',$clase->nombre);
$objPHPExcel->getActiveSheet()->setCellValue('A56',"ENTERGO :"  . $clase->nombre );
/*
$objDrawing = new PHPExcel_Worksheet_Drawing();  // PHPExcel_Worksheet_MemoryDrawing
$objDrawing->setPath('../../../web/uploads/profesores/juanjo.jpg');
$objDrawing->setCoordinates('B15');
*/
if(file_exists("../../../web/uploads/profesores/{$clase->tbl_profesor_id_profesor}.jpg"))
{
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('Nombre');
        $objDrawing->setDescription('Reporte de Pedidos');
        $objDrawing->setPath("../../../web/uploads/profesores/{$clase->tbl_profesor_id_profesor}.jpg");
        $objDrawing->setHeight(65);
        $objDrawing->setCoordinates('E56');
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="practica.xlsx"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');


header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); 
header ('Cache-Control: cache, must-revalidate'); 
header ('Pragma: public'); 

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');


?>