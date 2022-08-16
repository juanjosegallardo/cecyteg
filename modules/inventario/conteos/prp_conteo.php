<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_conteo.php");
include("../../../classes/cls_ubicacion_por_conteo.php");
include("../../../classes/cls_marca.php");
include("../../../classes/cls_ubicacion.php");
include("../../../classes/cls_tipo_equipo.php");
include("../../../classes/cls_usuario.php");
include("../../../classes/cls_inventario.php");
include("../../../classes/cls_mensaje.php");
include("../../../classes/cls_permiso.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_combo.php");
include("../../../lib/ui/cls_checkbox.php");

$obj_session=new Session();
switch($_POST['_accion'])
{   

	case "grd_conteo":                          
        $obj_conteo=new conteo();
        $obj_conteo->cargar_grid();            
        Grid::agregarColumna($obj_conteo->_datos,"radio",'<input type="radio" name="rad_conteo" id="rad_conteo_?" value="?" />',array("id_conteo","id_conteo"));            
        $grd_conteo=new Grid();
        $grd_conteo->datos=$obj_conteo->_datos;
        $grd_conteo->campos=array("","No. conteo", "Descripcion", "Inicio", "Fin", "Estado");
        $grd_conteo->campos_excel=array("No. conteo", "Descripcion", "Inicio", "Fin", "Estado");             
        $grd_conteo->width_columnas=array("10%", "19%","19%","19%","19%","19%");
        $grd_conteo->width="750px";
        $grd_conteo->orden_columnas=array("radio","id_conteo", "descripcion","fecha_inicio","fecha_fin","estado");
        $grd_conteo->orden_columnas_excel=array("id_conteo", "descripcion","fecha_inicio","fecha_fin","estado");
        $grd_conteo->propiedad_renglon='onclick="$(\'#rad_conteo_?\').attr(\'checked\', true);" style="cursor:pointer"';
        $grd_conteo->parametros_renglon=array("id_conteo");
        $grd_conteo->caracter_sustitucion="?";           
        $grd_conteo->ordenacion=array("","id_conteo", "descripcion","fecha_inicio","fecha_fin","estado");
        $grd_conteo->filtros=array("id_conteo", "descripcion","fecha_inicio","fecha_fin","estado");
        $grd_conteo->maxlength=array("0","0","0","0","0");       
        $grd_conteo->mensaje ="No se encontraron conteos";
        echo $grd_conteo;
	break;
    case "chk_ubicaciones_conteo":
        $obj_ubicacion=new Ubicacion();
        $obj_ubicacion->cargar();                    
        $chk_ubicacion = new CheckBox();
        $chk_ubicacion->datos = $obj_ubicacion->_datos;
        $chk_ubicacion->campo_texto = "codigo";
        $chk_ubicacion->campo_valor = "id_ubicacion";  
        //$chk_ubicacion->datos_seleccionados =   $obj_ubicacion->_datos;
                                  
        if(isset($_GET["id_conteo"]))
        {
            $obj_usuario= new Usuario();
            $obj_usuario->id_usuario = $obj_session->id_usuario;
            $obj_usuario->cargar_permisos();  
        
            $obj_ubicacion_por_conteo = new UbicacionPorConteo();
            $obj_ubicacion_por_conteo->tbl_conteo_id_conteo = $_GET["id_conteo"];
            $obj_ubicacion_por_conteo->cargarPorConteo();
            
            $chk_ubicacion->datos_seleccionados = $obj_ubicacion_por_conteo->_datos;
            $chk_ubicacion->campo_seleccionado = "tbl_ubicacion_id_ubicacion";            
        }              
        echo $chk_ubicacion;    
    break;
    
    case "json_inventario":      
      
        $obj_inventario = new Inventario();
        $obj_inventario->cargarBusqueda($_POST["busqueda"]);
        echo $obj_inventario->getJSON(array("numero_inventario","no_serie"));  
    break;
}
?>