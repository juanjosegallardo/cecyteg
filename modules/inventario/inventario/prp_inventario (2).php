<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_inventario.php");
include("../../../classes/cls_marca.php");
include("../../../classes/cls_ubicacion.php");
include("../../../classes/cls_tipo_equipo.php");
include("../../../classes/cls_usuario.php");
include("../../../classes/cls_mensaje.php");
include("../../../classes/cls_permiso.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_combo.php");
include("../../../lib/ui/cls_checkbox.php");

$obj_session=new Session();
switch($_POST['_accion'])
{ 
    case "cmb_marca": 
        $obj_marca=new Marca();   
        $obj_marca->cargar_grid();                     
        array_unshift($obj_marca->_datos,array("nombre"=>"Seleccione una opci&oacute;n","id_marca"=>""  ));
        $cmb_marca = new Combo();        
        $cmb_marca->datos = $obj_marca->_datos;        
        $cmb_marca->campo_texto = "nombre";
        $cmb_marca->campo_valor = "id_marca";
        $cmb_marca->valor_seleccionado = "";        
        echo $cmb_marca;    
    break;
    
    case "cmb_tipo_equipo": 
        $obj_tipo_equipo=new TipoEquipo();   
        $obj_tipo_equipo->cargar_grid();                     
        array_unshift($obj_tipo_equipo->_datos,array("nombre"=>"Seleccione una opci&oacute;n","id_tipo_equipo"=>""  ));
        $cmb_tipo_equipo = new Combo();        
        $cmb_tipo_equipo->datos = $obj_tipo_equipo->_datos;        
        $cmb_tipo_equipo->campo_texto = "nombre";
        $cmb_tipo_equipo->campo_valor = "id_tipo_equipo";
        $cmb_tipo_equipo->valor_seleccionado = "";        
        echo $cmb_tipo_equipo;    
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
        array_push($datos,array("estado"=>"bueno","id_estado"=>"1"  ));
        array_push($datos,array("estado"=>"regular","id_estado"=>"2"  ));
        array_push($datos,array("estado"=>"malo","id_estado"=>"3"  ));
        array_push($datos,array("estado"=>"en repararacion","id_estado"=>"4"  ));
        array_push($datos,array("estado"=>"baja","id_estado"=>"5"  ));
        array_push($datos,array("estado"=>"robado","id_estado"=>"6"  ));
        array_push($datos,array("estado"=>"extraviado","id_estado"=>"7"  ));
       	array_push($datos,array("estado"=>"obsoleto","id_estado"=>"8"  ));
		array_push($datos,array("estado"=>"pendiente baja","id_estado"=>"9"  ));
		array_push($datos,array("estado"=>"dictamen","id_estado"=>"10"  ));

        $cmb_tipo_equipo = new Combo();        
        $cmb_tipo_equipo->datos = $datos;     
        $cmb_tipo_equipo->campo_texto = "estado";
        $cmb_tipo_equipo->campo_valor = "id_estado";
        $cmb_tipo_equipo->valor_seleccionado = "";        
        echo $cmb_tipo_equipo;    
    break;
    
    case "cmb_usuario": 
        $obj_usuario=new Usuario();   
        $obj_usuario->cargar_grid();                     
        array_unshift($obj_usuario->_datos,array("nombre_completo"=>"Seleccione una opci&oacute;n","id_usuario"=>""  ));
        $cmb_usuario = new Combo();        
        $cmb_usuario->datos = $obj_usuario->_datos;        
        $cmb_usuario->campo_texto = "nombre_completo";
        $cmb_usuario->campo_valor = "id_usuario";
        $cmb_usuario->valor_seleccionado = "";        
        echo $cmb_usuario;      
    break;


    case "cmb_siam": 
        $datos = array();        
        array_push($datos,array("siam"=>"Seleccione una opci&oacute;n","id_siam"=>""  ));
        array_push($datos,array("siam"=>"no","id_siam"=>"0"  ));
        array_push($datos,array("siam"=>"si","id_siam"=>"1"  ));       
        $cmb_tipo_siam = new Combo();        
        $cmb_tipo_siam->datos = $datos;     
        $cmb_tipo_siam->campo_texto = "siam";
        $cmb_tipo_siam->campo_valor = "id_siam";
        $cmb_tipo_siam->valor_seleccionado = "";        
        echo $cmb_tipo_siam;       
    break;

	case "grd_inventario":                          
        $obj_inventario=new Inventario();
        $obj_inventario->cargar_grid();            
        Grid::agregarColumna($obj_inventario->_datos,"radio",'<input type="radio" name="rad_inventario" id="rad_inventario_?" value="?" />',array("id_inventario","id_inventario"));            
        $grd_inventario=new Grid();
        $grd_inventario->datos=$obj_inventario->_datos;
        $grd_inventario->campos=array("","No. Inventario", "Tipo", "Marca", "Modelo", "No. Serie", "Ubicacion");
        $grd_inventario->campos_excel=array("No. Inventario", "Tipo", "Marca", "Modelo", "No. Serie", "Ubicacion","Observaciones");             
        $grd_inventario->width_columnas=array("10%", "15%","15%","15%","15%","15%","15%");
        $grd_inventario->width="750px";
        $grd_inventario->orden_columnas=array("radio","numero_inventario", "tipo_equipo","marca","modelo","no_serie","ubicacion");
        $grd_inventario->orden_columnas_excel=array("numero_inventario", "tipo_equipo","marca","modelo","no_serie","ubicacion","observaciones");
        $grd_inventario->propiedad_renglon='onclick="$(\'#rad_inventario_?\').attr(\'checked\', true);" style="cursor:pointer"';
        $grd_inventario->parametros_renglon=array("id_inventario");
        $grd_inventario->caracter_sustitucion="?";           
        $grd_inventario->ordenacion=array("","numero_inventario", "tipo_equipo","marca","modelo","no_serie","ubicacion");
        $grd_inventario->filtros=array("numero_inventario","tipo_equipo","marca","modelo","no_serie","ubicacion");
        $grd_inventario->maxlength=array("0","0");       
        $grd_inventario->mensaje ="No se encontraron inventario";
        echo $grd_inventario;
	break;

}
?>
