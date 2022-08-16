<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_tipo_equipo.php");
include("../../../classes/cls_mensaje.php");
include("../../../classes/cls_permiso.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_combo.php");
include("../../../lib/ui/cls_checkbox.php");

$obj_session=new Session();
switch($_POST['_accion'])
{

	case "grd_tipo_equipo":                          
        $obj_tipo_equipo=new TipoEquipo();
        $obj_tipo_equipo->cargar_grid();            
        Grid::agregarColumna($obj_tipo_equipo->_datos,"radio",'<input type="radio" name="rad_tipo_equipo" id="rad_tipo_equipo_?" value="?" />',array("id_tipo_equipo","id_tipo_equipo"));            
        $grd_tipo_equipo=new Grid();
        $grd_tipo_equipo->datos=$obj_tipo_equipo->_datos;
        $grd_tipo_equipo->campos=array("","tipo");
        $grd_tipo_equipo->campos_excel=array("tipo_equipo");             
        $grd_tipo_equipo->width_columnas=array("5%", "95%");
        $grd_tipo_equipo->width="750px";
        $grd_tipo_equipo->orden_columnas=array("radio","nombre");
        $grd_tipo_equipo->orden_columnas_excel=array("nombre");
        $grd_tipo_equipo->propiedad_renglon='onclick="$(\'#rad_tipo_equipo_?\').attr(\'checked\', true);" style="cursor:pointer"';
        $grd_tipo_equipo->parametros_renglon=array("id_tipo_equipo");
        $grd_tipo_equipo->caracter_sustitucion="?";           
        $grd_tipo_equipo->ordenacion=array("","nombre");
        $grd_tipo_equipo->filtros=array("nombre");
        $grd_tipo_equipo->maxlength=array("0","0");       
        $grd_tipo_equipo->mensaje ="No se encontraron tipo_equipos";
        echo $grd_tipo_equipo;
	break;

}
?>