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

$mes = $_REQUEST["sel_reporte_aulas_virtuales_mes"];
$ano = $_REQUEST["sel_reporte_aulas_virtuales_ano"];


$obj_registro->cargarReporteAulaVirtual($mes,$ano);

MasterPage::iniciarSeccion(); 

?>


<page orientation="l"  backtop="30mm"  backbottom="30mm" >
	<page_header> 
	    	<table style="width: 100%;border-style: solid; border-width: 3px;" cellpadding="0" cellspacing="0">

		    <tr>
			<td style="width: 10%;text-align: center; border-style: solid; border-width: 1px; vertical-align: middle; height: 25px;"><img style="width:61px; height:60px;" src="../../../web/images/generales/logo_cecyteg.jpg" /></td>
			<td style="width: 80%;text-align: center; border-style: solid; border-width: 1px;  vertical-align: middle; height: 25px ">REPORTE DE AULAS VIRTUALES</td>
			<td style="width: 10%;text-align: center; border-style: solid; border-width: 1px; vertical-align: middle; height: 25px;font-size: 9px; text-align: center;"><p>C&Oacute;DIGO:</p>
			  <p> F0236-005/B </p></td>
		    </tr>
		</table>	
		<br />
	PLANTEL: <label style="font-weight: bold; text-decoration:underline"> P&Eacute;NJAMO</label><br />

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
	<table border="1" style="width:100%;text-align:center; border-style:solid; border-width:3px; border-color:#000000;background-color:#CCCCCC;" cellpadding="0" cellspacing="0">
<tr>
				<td rowspan="2" style="width:7%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					FECHA
				</td>
				<td rowspan="2" style="width:5%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					HORA
				</td>
	
				<td colspan="2" style="border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					SOLICITANTE
				</td>
				<td colspan="3" style="border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					EVENTO
				</td>
				
				<td colspan="3" style="border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					CLASE
				</td>
				<td rowspan="2" style="width:17%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					TEMA
				</td>
				<td colspan="3" style="border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					No. PART
				</td>
				<td rowspan="2" style="width:4%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					TOTAL DE HORAS DE USO
				</td>
				<td rowspan="2" style="width:17%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					FIRMA
				</td>
				
			</tr>
			<tr>

	
				<td style="width:18%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					NOMBRE
				</td>
				<td style="width:5%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					PUESTO / ESPECIAL<br />IDAD
				</td>
				
				<td  style="width:2%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					C<br />L<br />A<br />S<br />E
				</td>
				<td  style="width:2%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					C<br />A<br />P<br />A<br />C<br />I<br />T<br />A<br />C<br />I<br />&Oacute;<br />N
				</td>
				<td  style="width:2%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					R<br />E<br />U<br />N<br />I<br />&Oacute;<br />N
				</td>
				<td  style="width:4%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					GRADO Y GRUPO
				</td>
				<td  style="width:5%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					ESPECIA<br />LIDAD
				</td>
				<td style="width:6%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					CLAVE DE MATERIA
				</td>


				<td style="width:2%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					A<br />L<br />U<br />M<br />N<br />O<br />S
				</td>
				<td style="width:2%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					D<br />O<br />C<br />E<br />N<br />T<br />E<br />S
				</td>
				<td  style="width:2%;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
					A<br />D<br />M<br />V<br />O<br />S.
				</td>
			</tr>	
			<?php foreach($obj_registro->_datos as $dato ): ?>
			<tr style="height:20px;background-color:#FFFFFF;border-right:solid; border-right-width:1px; border-color:#000000; font-size:8px">
				<td style="height:20px;">	
					<?php echo $dato["fecha"]; ?>
				</td>
				<td style="height:20px;">
					<?php echo $dato["hora_entrada"]; ?>
				</td>
				<td style="height:20px;">
					<?php echo $dato["nombre"]; ?>
				</td>
				<td style="height:20px;">
					
				</td>
				<td style="height:20px;">
					X
				</td>
				<td style="height:20px;">
				</td>
				<td style="height:20px;">
				</td>
				<td style="height:20px;">
					<?php echo $dato["grupo"]; ?>
				</td>
				<td style="height:20px;">
				</td>
				<td style="height:20px;">
				</td>
				<td style="height:20px;">
					<?php echo $dato["actividad"]; ?>
				</td>
				<td style="height:20px;">
					<?php echo $dato["total_alumnos"]; ?>
				</td>
				<td style="height:20px;">
				</td>
				<td style="height:20px;">
				</td>
				<td style="height:20px;">
					<?php echo floor($dato["duracion"]/60) . "h".($dato["duracion"])%60 . "m" ; ?>
				</td>
				<td style="height:20px;">
				</td>

			</tr>
			<?php endforeach; ?>

	</table>
	
	<table>
			<tr>
				<td>
					<p>
				       TOTAL DE ALUMNOS: <?php echo $dato["total_alumnos"]; ?>
				
					</p>
					<p>
				       TOTAL DE ADMINISTRATIVOS
				
					</p>
				<p>
				       TOTAL DE DOCENTES
				
					</p>
				
			<p>
				       TOTAL DE HORAS: <?php echo floor($dato["duracion"]/60) . "h".($dato["duracion"])%60 . "m" ; ?>
				
					</p>
				
				</td>
			</tr>
	</table>
	
	



</page>


<?php 
   MasterPage::finalizarSeccion($contenido); 
   include("../../main/master/pdf_reporte.php"); 

?>
