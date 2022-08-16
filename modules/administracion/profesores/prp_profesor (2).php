<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_profesor.php");
include("../../../classes/cls_mensaje.php");
include("../../../classes/cls_permiso.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_combo.php");
include("../../../lib/ui/cls_checkbox.php");

$obj_session=new Session();
switch($_POST['_accion'])
{

	case "grd_profesor":                          
        $obj_profesor=new Profesor();
        $obj_profesor->cargarGrid();            
        Grid::agregarColumna($obj_profesor->_datos,"radio",'<input type="radio" name="rad_profesor" id="rad_profesor_?" value="?" />',array("id_profesor","id_profesor"));            
        $grd_profesor=new Grid();
        $grd_profesor->datos=$obj_profesor->_datos;
        $grd_profesor->campos=array("","No Control","Nombre Completo");
        $grd_profesor->campos_excel=array("No Control","Nombre Completo");             
        $grd_profesor->width_columnas=array("5%","20%", "75%");
        $grd_profesor->width="750px";
        $grd_profesor->orden_columnas=array("radio","codigo","nombre");
        $grd_profesor->orden_columnas_excel=array("codigo","nombre");
        $grd_profesor->propiedad_renglon='onclick="$(\'#rad_profesor_?\').attr(\'checked\', true);" style="cursor:pointer"';
        $grd_profesor->parametros_renglon=array("id_profesor");
        $grd_profesor->caracter_sustitucion="?";           
        $grd_profesor->ordenacion=array("","codigo","nombre");
        $grd_profesor->filtros=array("codigo","nombre");
        $grd_profesor->maxlength=array("0","0","0");     
        $grd_profesor->mensaje = "No se encontraron profesores";           
        echo $grd_profesor;
	break;    
}
?>