<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_alumno.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_combo.php");
include("../../../lib/ui/cls_checkbox.php");

$obj_session=new Session();
switch($_POST['_accion'])
{	

    case "json_alumnos":        
        $obj_alumno = new Alumno();                
        $obj_alumno->cargar_alumnos($_POST["nombre"]);
	echo $obj_alumno->getJSON(array("no_control","nombre"));   
    break;
    
    case "json_reloj":    
        $arr = array( "hora"=>date("Y-m-d H:i")  );
        echo json_encode($arr);
        
    break;
}
?>