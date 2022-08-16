<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_ubicacion.php");
include("../../../classes/cls_mensaje.php");
include("../../../classes/cls_permiso.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_combo.php");
include("../../../lib/ui/cls_checkbox.php");

$obj_session=new Session();
switch($_POST['_accion'])
{

	case "grd_ubicacion":                          
        $obj_ubicacion=new ubicacion();
        $obj_ubicacion->cargar_grid();            
        Grid::agregarColumna($obj_ubicacion->_datos,"radio",'<input type="radio" name="rad_ubicacion" id="rad_ubicacion_?" value="?" />',array("id_ubicacion","id_ubicacion"));            
        $grd_ubicacion=new Grid();
        $grd_ubicacion->datos=$obj_ubicacion->_datos;
        $grd_ubicacion->campos=array("", "codigo","ubicacion");
        $grd_ubicacion->campos_excel=array("codigo","ubicacion");             
        $grd_ubicacion->width_columnas=array("5%", "15%", "80%");
        $grd_ubicacion->width="750px";
        $grd_ubicacion->orden_columnas=array("radio","codigo" ,"descripcion");
        $grd_ubicacion->orden_columnas_excel=array("codigo" ,"descripcion");
        $grd_ubicacion->propiedad_renglon='onclick="$(\'#rad_ubicacion_?\').attr(\'checked\', true);" style="cursor:pointer"';
        $grd_ubicacion->parametros_renglon=array("id_ubicacion");
        $grd_ubicacion->caracter_sustitucion="?";           
        $grd_ubicacion->ordenacion=array("","codigo","descripcion");
        $grd_ubicacion->filtros=array("descripcion","codigo");
        $grd_ubicacion->maxlength=array("0","0");       
        $grd_ubicacion->mensaje ="No se encontraron ubicaciones";
        echo $grd_ubicacion;
	break;

}
?>