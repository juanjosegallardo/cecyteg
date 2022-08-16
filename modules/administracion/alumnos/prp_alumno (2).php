<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_alumno.php");
include("../../../classes/cls_mensaje.php");
include("../../../classes/cls_permiso.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_combo.php");
include("../../../lib/ui/cls_checkbox.php");

$obj_session=new Session();
switch($_POST['_accion'])
{

	case "grd_alumno":                          
        $obj_alumno=new Alumno();
        $obj_alumno->cargarGrid();            
        Grid::agregarColumna($obj_alumno->_datos,"radio",'<input type="radio" name="rad_alumno" id="rad_alumno_?" value="?" />',array("id_alumno","id_alumno"));            
        $grd_alumno=new Grid();
        $grd_alumno->datos=$obj_alumno->_datos;
        $grd_alumno->campos=array("","No Control","Nombre Completo","Grupo");
        $grd_alumno->campos_excel=array("No Control","Nombre Completo","Grupo");             
        $grd_alumno->width_columnas=array("5%","20%", "55%", "15%");
        $grd_alumno->width="750px";
        $grd_alumno->orden_columnas=array("radio","no_control","nombre", "grupo");
        $grd_alumno->orden_columnas_excel=array("no_control","nombre", "grupo");
        $grd_alumno->propiedad_renglon='onclick="$(\'#rad_alumno_?\').attr(\'checked\', true);" style="cursor:pointer"';
        $grd_alumno->parametros_renglon=array("id_alumno");
        $grd_alumno->caracter_sustitucion="?";           
        $grd_alumno->ordenacion=array("","no_control","nombre", "grupo");
        $grd_alumno->filtros=array("no_control","nombre","grupo");
        $grd_alumno->maxlength=array("0","0","0","0");     
        $grd_alumno->mensaje = "No se encontraron alumnos";           
        echo $grd_alumno;
	break;    
}
?>