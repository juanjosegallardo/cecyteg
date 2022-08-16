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
$obj_registro->fecha = $_POST["txt_reporte_inasistencia_fecha"];
$obj_registro->hora = $_POST["txt_reporte_inasistencia_hora_entrada"];
$obj_registro->grupo = $_POST["txt_reporte_inasistencia_grupo"];
$obj_registro->cargarInasistencias();

MasterPage::iniciarSeccion(); 
?>
<page>

	<div style = "text-align=center"><b> Reporte de inasistencias <?php echo $obj_registro->fecha; ?> <?php echo $obj_registro->hora; ?> <?php echo $obj_registro->grupo; ?></b></div>
	<br>
	<?php
	$i=1;
	foreach($obj_registro->_datos as $registro):
	?>
		<?php echo $registro["nombre"]; ?>	
		<br />
	<?php endforeach;?>

</page>

<?php 
   MasterPage::finalizarSeccion($contenido); 
   include("../../main/master/pdf_reporte.php"); 
?>
