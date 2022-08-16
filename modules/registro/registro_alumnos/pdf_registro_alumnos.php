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
$obj_registro->fecha = $_POST["txt_reporte_alumnos_fecha"];
$obj_registro->cargarReporte();

MasterPage::iniciarSeccion(); 
?>
<page orientation="l"  backtop="35mm"  backbottom="30mm">

	<page_header> 
		<table style="width: 100%;border-style: solid; border-width: 3px;" cellpadding="0" cellspacing="0">
		    <tr>
			<td style="width: 10%;text-align: center; border-style: solid; border-width: 1px; vertical-align: middle; height: 25px; "><img style="width:61px; height:60px;" src="../../../web/images/generales/logo_cecyteg.jpg" /></td>
			<td style="width: 80%;text-align: center; border-style: solid; border-width: 1px;  vertical-align: middle; height: 25px ">REGISTRO DE HORAS PR&Aacute;CTICA EN CENTRO DE COMPUTO</td>
			<td style="width: 10%;text-align: center; border-style: solid; border-width: 1px; vertical-align: middle; height: 25px;font-size: 9px;" ><p>C&Oacute;DIGO:</p>
			  <p>F0236-004/B</p></td>
		    </tr>
			
		</table>

		<br />
		PLANTEL: <label style="font-weight: bold; text-decoration:underline">P&Eacute;NJAMO</label>

		<table border="1" style="width:100%;text-align:center; border-style:solid; border-width:3px; border-color:#000000;background-color:#CCCCCC;" cellpadding="0" cellspacing="0">
			<tr>
				<td rowspan="2" style="width:3%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					No.
				</td>
				<td rowspan="2" style="width:8%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					FECHA
				</td>
	
				<td rowspan="2" style="width:28%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					NOMBRE
				</td>
				<td colspan="4" style="width:12%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					USUARIO
				</td>
				
				<td rowspan="2" style="width:7%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					HORA ENTRADA
				</td>
				<td rowspan="2" style="width:7%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					HORA SALIDA
				</td>
				<td rowspan="2" style="width:5%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					GRUPO
				</td>
				<td rowspan="2" style="width:4%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					No. EQUIPO
				</td>
				<td rowspan="2" style="width:10%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					ACTIVIDAD
				</td>
				<td colspan="2" style="width:6%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					¿USO INTERNET?
				</td>

				<td rowspan="2" style="width:10%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					OBSERVACIONES
				</td>
			</tr>

			<tr>
				<td style="width:3%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:6px">
					ALUMNO
				</td>
				<td style="width:3%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:6px">
					DOCENTE
				</td>
				<td style="width:3%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:6px">
					ADVO.
				</td>
				<td style="width:3%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:6px">
					EXTERNO
				</td>
				
				<td style="width:3%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					SI
				</td>
				<td style="width:3%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					NO
				</td>
			</tr>
			
			
		</table>

	</page_header> 
	<page_footer>
	
	<table align="center">
			
			<tr>		
				
				<td style="width: 34%;text-align:center;" >
					
					<img style="height:70px" src="../../../web/uploads/profesores/juanjo.jpg" />
					<hr />
					Nombre y Firma del Programador

				
				</td>
			
			</tr>
	</table>
	</page_footer>
	
	
	
		
	<table style="width:100%;" border="1"  cellpadding="0" cellspacing="0">
<?php
$i=1;
foreach($obj_registro->_datos as $registro):

?>
		<tr>
			<td style="width:3%;text-align: center;">
				<?php echo $i++; ?>
			</td>
			<td style="width:8%;text-align: center;">
				<?php echo $registro["fecha"]; ?>
			</td>
	
			<td style="width:28%;font-size:8px;text-align: center;">
				<?php echo $registro["nombre"]; ?>
			</td>
			<td style="width:3%;text-align: center;">
				X
			</td>
			<td style="width:3%;text-align: center;">&nbsp;
				
			</td>
			<td style="width:3%;text-align: center;">&nbsp;
				
			</td>
			<td style="width:3%;text-align: center;">&nbsp;
				
			</td>
			<td style="width:7%;text-align: center;">
				<?php echo $registro["hora_entrada"]; ?>
			</td>
			<td style="width:7%;text-align: center;">
				<?php echo $registro["hora_salida"]; ?>
			</td>
			<td style="width:5%;text-align: center;">
				<?php echo $registro["grupo"]; ?>
			</td>
			<td style="width:4%;text-align: center;">
				<?php echo $registro["equipo"]; ?>
			</td>
			<td style="width:10%;font-size:8px;text-align: center;">
				<?php echo $registro["actividad"]; ?>
			</td>
			<td style="width:3%;text-align: center;">
				X
			</td>
			<td style="width:3%;text-align: center;">&nbsp;
				
			</td>
			<td style="width:10%;text-align: center;">&nbsp;
				
			</td>
		</tr>
<?php endforeach; ?>


	</table>
	
	
	
	
	
	
	
	
	

</page>

<?php 
   MasterPage::finalizarSeccion($contenido); 
   include("../../main/master/pdf_reporte.php"); 
?>
