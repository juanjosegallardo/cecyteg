<?php

	include_once("../../../config.php");  
	include("../../../lib/generales/cls_conexion.php");
	$obj_conexion = new Conexion();

$datos =$obj_conexion->ejecutarQuery("SELECT * FROM `vw_prestamo` WHERE tipo_equipo='CANON' and month(fecha) ='{$_GET["txt_mes"]}' and year(fecha)='{$_GET["txt_ano"]}'");

$i=1;
?>
<table>
<?php foreach($datos as $dato): ?>
<tr>
	<td>
		<?php echo $i++; ?>
	</td>
	<td>
		<?php echo $dato["fecha"]; ?>
	<td>

	<td>
		<?php echo $dato["tipo_equipo"]; ?>
	<td>

	<td>
		<?php echo $dato["duracion"]; ?>
	<td>

	<td>
		<?php echo $dato["nombre"]; ?>
	<td>

	<td>
		<?php echo $dato["numero_inventario"]; ?>
	<td>
</tr>
<?php endforeach;?>
</table>
