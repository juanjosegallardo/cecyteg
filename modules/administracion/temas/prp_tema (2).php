<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_usuario.php");
include("../../../classes/cls_mensaje.php");
include("../../../classes/cls_permiso.php");
include("../../../classes/cls_configuracion.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_combo.php");
include("../../../lib/ui/cls_checkbox.php");

$obj_session=new Session();
switch($_POST['_accion'])
{

    case "cmb_tema_tema":
        $obj_configuracion = new Configuracion();
        $obj_configuracion->cargarTema(); 
        $obj_configuracion->cargarTemas();                    
        $cmb_tema = new Combo();        
        $cmb_tema->datos = $obj_configuracion->_datos;
        $cmb_tema->campo_texto = "tema";
        $cmb_tema->campo_valor = "id_tema";
        $cmb_tema->valor_seleccionado = $obj_configuracion->tema;        
        echo $cmb_tema;
    break;
    case "json_tema":
    	$obj_configuracion = new Configuracion();
        $obj_configuracion->cargarTema();
        $obj_configuracion->cargarColorFondo();
        $array["tema"] = $obj_configuracion->tema;
        $array["color_fondo"] = $obj_configuracion->color_fondo;
        echo json_encode($array);
    break;
}
?>