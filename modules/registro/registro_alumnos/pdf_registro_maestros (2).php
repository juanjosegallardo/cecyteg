<?php

include_once("../../../config.php");  
include("../../../lib/ui/cls_tab.php");
include("../../../lib/ui/cls_boton.php");
include("../../../lib/generales/cls_master_page.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");

include("../../../classes/cls_equipo.php");
include("../../../classes/cls_ubicacion.php");
include("../../../classes/cls_inventario.php");
include("../../../classes/cls_usuario.php");
include("../../../classes/cls_registro_alumnos.php");

include_once("../../../modules/main/master/dic_principal.php");
include_once("../../../lib/generales/cls_session.php");	


$obj_registro = new RegistroAlumno();

$mes = $_REQUEST["sel_reporte_maestros_mes"];
$ano = $_REQUEST["sel_reporte_maestros_ano"];

$fecha_inicio =  date( "Y-m-d", strtotime( "{$ano}-{$mes}-1") );
$fecha_fin= date( "Y-m-d", strtotime( "{$fecha_inicio} +1 months" ) );


$obj_registro->cargarFechas($fecha_inicio, $fecha_fin);
$fechas =  $obj_registro->_datos;


$meses  = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Ocutubre", "Noviembre", "Diciembre");

$no_hoja=0;
$total_hojas=0;

MasterPage::iniciarSeccion(); 

?>


<page orientation="l"  backtop="30mm"  backbottom="30mm" >
	<page_header> 
	    	<table style="width: 100%;border-style: solid; border-width: 3px;" cellpadding="0" cellspacing="0">

		    <tr>
			<td style="width: 20%;text-align: center; border-style: solid; border-width: 1px; vertical-align: middle; height: 25px; " rowspan="2"><img style="width:61px; height:60px;" src="../../../web/images/generales/logo_cecyteg.jpg" /></td>
			<td style="width: 60%;text-align: center; border-style: solid; border-width: 1px;  vertical-align: middle; height: 25px ">REPORTE DE ACTIVIDADES DEL PROGRAMADOR EN PLANTELES CECYTEG</td>
			<td style="width: 20%;text-align: center; border-style: solid; border-width: 1px; vertical-align: middle; height: 25px;font-size: 9px; text-align: left;" rowspan="2">C&Oacute;DIGO: <br /> NO. REVISI&Oacute;N: 01<br />  FECHA: <?php echo date("d/m/Y") ?><br /> HOJA: <?php echo $no_hoja ?> de <?php echo $total_hojas ?></td>
		    </tr>
		    <tr>
			<td style="text-align: center; border-style: solid; border-width: 1px; vertical-align: middle; height: 25px;">REGISTRO DE HORAS CLASE EN CENTRO DE COMPUTO</td>
		    </tr>
		</table>	
		<br />
	PLANTEL: <label style="font-weight: bold;"> P&Eacute;NJAMO</label><br />

	</page_header> 

	<page_footer> 
		<table style="width: 100%;">	
			<tr>
				<td style="width: 33%;">
				</td>	
				<td style="width: 34%;text-align:center;" >
					
					<img style="height:70px" src="../../../web/uploads/profesores/juanjo.jpg" />
					<hr />
					Nombre y Firma del Programador

				
				</td>
				<td style="width: 33%;">
				</td>	
			</tr>
		</table>
	</page_footer> 
	<?php 
		foreach($fechas as $fecha):
		$dia= date("d", strtotime($fecha["fecha"]));
		$mes = $meses[date ("m",  strtotime($fecha["fecha"]))-1];
		$ano = date("Y", strtotime($fecha["fecha"]));
		$fecha["fecha"]; ?>
		Fecha: <label style="font-weight: bold;"><?php echo "{$dia} de {$mes} de {$ano}"; ?></label><br />
		<br />

<table border="1" style="width: 100%;border-style: solid; border-width: 3px;" cellpadding="0" cellspacing="0">
		<tr style="background-color:#999999;">
			<td style="width:5%;font-size:8px;text-align: center;">
				GRUPO
			</td>
			<td style="width:12%;font-size:8px;text-align: center;">
				NO. DE ALUMNOS
			</td>
			<td style="width:20%;font-size:8px;text-align: center;">
				MATERIA
			</td>
			<td style="width:10%;font-size:8px;text-align: center;">
				HORARIO
			</td>
			<td style="width:15%;font-size:8px;text-align: center;">
				DOCENTE
			</td>
			<td style="width:17%;font-size:8px;text-align: center;">
				TEMA
			</td>
			<td style="width:10%;font-size:8px;text-align: center;">
				¿USO INTERNET?
			</td>
			<td style="width:11%;font-size:8px;text-align: center;">
				FIRMA
			</td>
		</tr>

		<?php 
			$obj_registro->fecha = $fecha["fecha"];
			$obj_registro->cargarReporteMaestrosPorFecha();
			$obj_registro->_html_entities = true;
			$obj_registro->_utf8_decode = false;
			foreach($obj_registro->_datos as $registro):
			
		
		

		 ?>
		<tr>

			<td style="height:20px;width:5%;font-size:8px;text-align: center;">
				<?php echo $registro["grupo"]; ?>
			</td>
			<td style="height:20px;width:12%;font-size:8px;text-align: center;">
				<?php echo $registro["total_alumnos"]; ?>
			</td>
			<td style="height:20px;width:20%;font-size:8px;text-align: center;">
				<?php echo $registro["materia"]; ?>
			</td>
			<td style="height:20px;width:10%;font-size:8px;text-align: center;">
				<?php echo $registro["hora_entrada"]; ?>-<?php echo $registro["hora_salida"]; ?>
			</td>
			<td style="height:20px;width:15%;font-size:8px;text-align: center;">
				<?php echo $registro["nombre"]; ?>
			</td>
			<td style="height:20px;width:17%;font-size:8px;text-align: left;">
				<a target="_blank" href="<?php   echo "http://". $_SERVER["SERVER_NAME"]. "/cecyteg/modules/practicas/practicas/xls_practica.php?id_clase=".$registro["id_clase"] ;  ?>"> <?php echo  $registro["actividad"]; ?></a>
			</td>
			<td style="height:20px;width:10%;font-size:8px;text-align: center;">
				Si
			</td>
			<td style="height:20px;width:11%;font-size:8px;text-align: center;">
			
				<?php if(file_exists("../../../web/uploads/profesores/{$registro['tbl_profesor_id_profesor']}.jpg")) :?>
			
					<img style="height:20px" src="../../../web/uploads/profesores/<?php echo $registro["tbl_profesor_id_profesor"]; ?>.jpg" />
				<?php endif; ?>
			</td>

		</tr>		
		<?php endforeach; ?>
		
		
	</table>	
	<br />
	<?php endforeach; ?>




</page>


<?php 
   MasterPage::finalizarSeccion($contenido); 
   include("../../main/master/pdf_reporte.php"); 

?>
