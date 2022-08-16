<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_equipo.php");
include("../../../classes/cls_ubicacion.php");
include("../../../classes/cls_mensaje.php");
include("../../../classes/cls_permiso.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_combo.php");
include("../../../lib/ui/cls_checkbox.php");

$obj_session=new Session();
switch($_POST['_accion'])
{

	case "grd_equipo":                          
        $obj_equipo=new equipo();
        $obj_equipo->cargar_grid();            
        Grid::agregarColumna($obj_equipo->_datos,"radio",'<input type="radio" name="rad_equipo" id="rad_equipo_?" value="?" />',array("id_equipo","id_equipo"));            
        $grd_equipo=new Grid();
        $grd_equipo->datos=$obj_equipo->_datos;
        $grd_equipo->campos=array("","nombre","mac","ip");
        $grd_equipo->campos_excel=array("nombre");             
        $grd_equipo->width_columnas=array("5%", "15%","40%","40%");
        $grd_equipo->width="750px";
        $grd_equipo->orden_columnas=array("radio","nombre","mac","ip");
        $grd_equipo->orden_columnas_excel=array("nombre","mac","ip");
        $grd_equipo->propiedad_renglon='onclick="$(\'#rad_equipo_?\').attr(\'checked\', true);" style="cursor:pointer"';
        $grd_equipo->parametros_renglon=array("id_equipo");
        $grd_equipo->caracter_sustitucion="?";           
        $grd_equipo->ordenacion=array("","nombre","mac","ip");
        $grd_equipo->filtros=array("","nombre","mac","ip");
        $grd_equipo->maxlength=array("0","0","0","0");       
        $grd_equipo->mensaje ="No se encontraron equipos";
        echo $grd_equipo;
	break;

    
    case "cmb_ubicacion": 
        $obj_ubicacion=new Ubicacion();   
        $obj_ubicacion->cargar_grid();                     
        array_unshift($obj_ubicacion->_datos,array("codigo"=>"Seleccione una opci&oacute;n","id_ubicacion"=>""  ));
        $cmb_ubicacion = new Combo();        
        $cmb_ubicacion->datos = $obj_ubicacion->_datos;        
        $cmb_ubicacion->campo_texto = "codigo";
        $cmb_ubicacion->campo_valor = "id_ubicacion";
        $cmb_ubicacion->valor_seleccionado = "";        
        echo $cmb_ubicacion;    
    break;
    
    case "cmb_estado": 
        $datos = array();
        
        array_push($datos,array("estado"=>"Seleccione una opci&oacute;n","id_estado"=>""  ));
        array_push($datos,array("estado"=>"ACTIVO","id_estado"=>"1"  ));
        array_push($datos,array("estado"=>"REPARACION","id_estado"=>"2"  ));
        array_push($datos,array("estado"=>"BAJA","id_estado"=>"3"  ));
        
        $cmb_estado = new Combo();        
        $cmb_estado->datos = $datos;     
        $cmb_estado->campo_texto = "estado";
        $cmb_estado->campo_valor = "id_estado";
        $cmb_estado->valor_seleccionado = "";        
        echo $cmb_estado;    
    break;

    case "cmb_acceso_internet": 
        $datos = array();
        
        array_push($datos,array("acceso"=>"Seleccione una opci&oacute;n","id_acceso"=>""  ));
        array_push($datos,array("acceso"=>"NO","id_acceso"=>"0"  ));
        array_push($datos,array("acceso"=>"SI","id_acceso"=>"1"  ));

        $cmb_acceso_internet = new Combo();        
        $cmb_acceso_internet->datos = $datos;     
        $cmb_acceso_internet->campo_texto = "acceso";
        $cmb_acceso_internet->campo_valor = "id_acceso";
        $cmb_acceso_internet->valor_seleccionado = "";        
        echo $cmb_acceso_internet;    
    break;
}
?>
