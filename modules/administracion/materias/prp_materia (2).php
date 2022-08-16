<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_materia.php");
include("../../../classes/cls_mensaje.php");
include("../../../classes/cls_permiso.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_combo.php");
include("../../../lib/ui/cls_checkbox.php");

$obj_session=new Session();
switch($_POST['_accion'])
{

	case "grd_materia":                          
        $obj_materia=new materia();
        $obj_materia->cargar_grid();            
        Grid::agregarColumna($obj_materia->_datos,"radio",'<input type="radio" name="rad_materia" id="rad_materia_?" value="?" />',array("id_materia","id_materia"));            
        $grd_materia=new Grid();
        $grd_materia->datos=$obj_materia->_datos;
        $grd_materia->campos=array("","materia");
        $grd_materia->campos_excel=array("materia");             
        $grd_materia->width_columnas=array("5%", "95%");
        $grd_materia->width="750px";
        $grd_materia->orden_columnas=array("radio","materia");
        $grd_materia->orden_columnas_excel=array("materia");
        $grd_materia->propiedad_renglon='onclick="$(\'#rad_materia_?\').attr(\'checked\', true);" style="cursor:pointer"';
        $grd_materia->parametros_renglon=array("id_materia");
        $grd_materia->caracter_sustitucion="?";           
        $grd_materia->ordenacion=array("","materia");
        $grd_materia->filtros=array("materia");
        $grd_materia->maxlength=array("0","0");       
        $grd_materia->mensaje ="No se encontraron materias";
        echo $grd_materia;
	break;

}
?>