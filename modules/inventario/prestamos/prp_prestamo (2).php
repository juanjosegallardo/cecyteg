<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_prestamo.php");
include("../../../classes/cls_alumno.php");
include("../../../classes/cls_profesor.php");
include("../../../classes/cls_inventario.php");
include("../../../classes/cls_usuario.php");
include("../../../classes/cls_mensaje.php");
include("../../../classes/cls_permiso.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_combo.php");
include("../../../lib/ui/cls_checkbox.php");

$obj_session=new Session();
switch($_POST['_accion'])
{

	case "grd_prestamo":                          
        $obj_prestamo=new prestamo();
        $obj_prestamo->cargar_grid();            
        Grid::agregarColumna($obj_prestamo->_datos,"radio",'<input type="radio" name="rad_prestamo" id="rad_prestamo_?" value="?" />',array("id_prestamo","id_prestamo"));            
        $grd_prestamo=new Grid();
        $grd_prestamo->datos=$obj_prestamo->_datos;
        $grd_prestamo->campos=array("","Nombre", "Tipo Personal", "Fecha", "duracion","Usuario", "Tipo equipo", "Numero Inventario","Estatus");
        $grd_prestamo->campos_excel=array("nombre","puesto", "fecha", "duracion", "tipo_equipo","numero_inventario");             
        $grd_prestamo->width_columnas=array("5%", "15%", "16%", "6%","10%", "16%", "16%","16%");
        $grd_prestamo->width="750px";
        $grd_prestamo->orden_columnas=array("radio","nombre","puesto", "fecha", "duracion","nombre_usuario", "tipo_equipo","numero_inventario","estatus");
        $grd_prestamo->orden_columnas_excel=array("nombre","tipo_equipo", "fecha_prestamo", "duracion","nombre_usuario","numero_inventario","estatys");
        $grd_prestamo->propiedad_renglon='onclick="$(\'#rad_prestamo_?\').attr(\'checked\', true);" style="cursor:pointer"';
        $grd_prestamo->parametros_renglon=array("id_prestamo");
        $grd_prestamo->caracter_sustitucion="?";           
        $grd_prestamo->ordenacion=array("","nombre","puesto", "fecha", "duracion","nombre_usuario" ,"tipo_equipo","numero_inventario","estatus");
        $grd_prestamo->filtros=array("nombre", "fecha","nombre_usuario");
        $grd_prestamo->maxlength=array("0","0","0","0","0","0","0","0");       
        $grd_prestamo->mensaje ="No se encontraron prestamos";
        echo $grd_prestamo;
	break;
	case "json_alumnos":        
        $obj_alumno = new Alumno();                
        $obj_alumno->cargar_alumnos($_POST["nombre"]);
        echo $obj_alumno->getJSON(array("no_control","nombre"));   
    break;

	case "json_profesores":        
        $obj_profesor = new Profesor();                
        $obj_profesor->cargar_profesors($_POST["nombre"]);
        echo $obj_profesor->getJSON(array("codigo","nombre"));   
    break;
	
	case "json_usuarios":        
        $obj_usuario = new Usuario();                
        $obj_usuario->cargar_usuarios($_POST["nombre"]);
        echo $obj_usuario->getJSON(array("nombre_usuario","nombre_completo"));   
    break;
	
	 case "json_inventario":      
      
        $obj_inventario = new Inventario();
        $obj_inventario->cargarBusqueda($_POST["nombre"]);
        echo $obj_inventario->getJSON(array("numero_inventario","no_serie", "tipo_equipo"));  
    break;
	
	case "sel_tipo": 
        $datos = array();
        
        array_push($datos,array("tipo"=>"Seleccione una opci&oacute;n","id_tipo"=>""  ));
        array_push($datos,array("tipo"=>"Profesor","id_tipo"=>"1"  ));
        array_push($datos,array("tipo"=>"Alumno","id_tipo"=>"2"  ));
        array_push($datos,array("tipo"=>"Administrativo","id_tipo"=>"3"  ));
        
        $cmb_tipo_equipo = new Combo();        
        $cmb_tipo_equipo->datos = $datos;     
        $cmb_tipo_equipo->campo_texto = "tipo";
        $cmb_tipo_equipo->campo_valor = "id_tipo";
        $cmb_tipo_equipo->valor_seleccionado = "";        
        echo $cmb_tipo_equipo;    
    break;

case "sel_tipo": 
        $datos = array();
        
        array_push($datos,array("tipo"=>"Seleccione una opci&oacute;n","id_tipo"=>""  ));
        array_push($datos,array("tipo"=>"Profesor","id_tipo"=>"1"  ));
        array_push($datos,array("tipo"=>"Alumno","id_tipo"=>"2"  ));
        array_push($datos,array("tipo"=>"Administrativo","id_tipo"=>"3"  ));
        
        $cmb_tipo_equipo = new Combo();        
        $cmb_tipo_equipo->datos = $datos;     
        $cmb_tipo_equipo->campo_texto = "tipo";
        $cmb_tipo_equipo->campo_valor = "id_tipo";
        $cmb_tipo_equipo->valor_seleccionado = "";        
        echo $cmb_tipo_equipo;    
    break;





	
	case "sel_hora": 
        $datos = array();
        
        array_push($datos,array("hora"=>"Seleccione una opci&oacute;n","id_hora"=>""  ));
        array_push($datos,array("hora"=>"7:00","id_hora"=>"7:00"  ));
		array_push($datos,array("hora"=>"7:50","id_hora"=>"7:50"  ));
		array_push($datos,array("hora"=>"8:40","id_hora"=>"8:40"  ));
		array_push($datos,array("hora"=>"9:30","id_hora"=>"9:30"  ));
		array_push($datos,array("hora"=>"10:00","id_hora"=>"10:00" ));
		array_push($datos,array("hora"=>"10:50","id_hora"=>"10:50" ));
		array_push($datos,array("hora"=>"11:40","id_hora"=>"11:40"  ));
		array_push($datos,array("hora"=>"12:30","id_hora"=>"12:30"  ));
		array_push($datos,array("hora"=>"13:20","id_hora"=>"13:20"  ));
		array_push($datos,array("hora"=>"14:10","id_hora"=>"14:10"  ));
		array_push($datos,array("hora"=>"15:00","id_hora"=>"15:00"  ));
		array_push($datos,array("hora"=>"15:50","id_hora"=>"15:50"  ));
		array_push($datos,array("hora"=>"16:20","id_hora"=>"16:20"  ));
        array_push($datos,array("hora"=>"17:10","id_hora"=>"17:10"  ));
        array_push($datos,array("hora"=>"18:00","id_hora"=>"18:00"  ));
		array_push($datos,array("hora"=>"18:50","id_hora"=>"18:50"  ));
		
        $cmb_hora = new Combo();        
        $cmb_hora->datos = $datos;     
        $cmb_hora->campo_texto = "hora";
        $cmb_hora->campo_valor = "id_hora";
        $cmb_hora->valor_seleccionado = "";        
        echo $cmb_hora;    
    break;
	
	case "sel_tipo_lugar": 
        $datos = array();
        
        array_push($datos,array("lugar"=>"Seleccione una opci&oacute;n","id_lugar"=>""  ));
        array_push($datos,array("lugar"=>"Sal&oacute;n","id_lugar"=>"1"  ));
        array_push($datos,array("lugar"=>"Aula Virtual","id_lugar"=>"2"  ));
        array_push($datos,array("lugar"=>"Centro computo","id_lugar"=>"3"  ));
        array_push($datos,array("lugar"=>"Laboratorio de computo","id_lugar"=>"4"  ));        
        $cmb_lugar = new Combo();        
        $cmb_lugar->datos = $datos;     
        $cmb_lugar->campo_texto = "lugar";
        $cmb_lugar->campo_valor = "id_lugar";
        $cmb_lugar->valor_seleccionado = "";        
        echo $cmb_lugar;    
    break;
}
?>
