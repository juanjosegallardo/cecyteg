<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_marca.php");
include("../../../classes/cls_mensaje.php");
include("../../../classes/cls_permiso.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_combo.php");
include("../../../lib/ui/cls_checkbox.php");

$obj_session=new Session();
switch($_POST['_accion'])
{

	case "grd_marca":                          
        $obj_marca=new marca();
        $obj_marca->cargar_grid();            
        Grid::agregarColumna($obj_marca->_datos,"radio",'<input type="radio" name="rad_marca" id="rad_marca_?" value="?" />',array("id_marca","id_marca"));            
        $grd_marca=new Grid();
        $grd_marca->datos=$obj_marca->_datos;
        $grd_marca->campos=array("","Marca");
        $grd_marca->campos_excel=array("Marca");             
        $grd_marca->width_columnas=array("5%", "95%");
        $grd_marca->width="750px";
        $grd_marca->orden_columnas=array("radio","nombre");
        $grd_marca->orden_columnas_excel=array("nombre");
        $grd_marca->propiedad_renglon='onclick="$(\'#rad_marca_?\').attr(\'checked\', true);" style="cursor:pointer"';
        $grd_marca->parametros_renglon=array("id_marca");
        $grd_marca->caracter_sustitucion="?";           
        $grd_marca->ordenacion=array("","nombre");
        $grd_marca->filtros=array("nombre");
        $grd_marca->maxlength=array("0","0");       
        $grd_marca->mensaje ="No se encontraron marcas";
        echo $grd_marca;
	break;

}
?>