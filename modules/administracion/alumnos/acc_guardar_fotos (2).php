<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");
include("../../../lib/generales/cls_archivo.php");

include("../../../classes/cls_alumno.php");
include("../../../classes/cls_reporte.php");
include("../../../classes/cls_mensaje.php");

include("../../../lib/ui/cls_grid.php");
include("dic_alumno.php");


echo "ok";

$obj_alumno = new Alumno();
$obj_alumno->cargarGrid();

foreach($obj_alumno->_datos as $renglon)
{

echo "{$renglon['no_control']}";
	copy("../../../web/uploads/alumnos/{$renglon['id_alumno']}.jpg", "../../../web/uploads/alumnos/credenciales/{$renglon['no_control']}.jpg");
}

?>
