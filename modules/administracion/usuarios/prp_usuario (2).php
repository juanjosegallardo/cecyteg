<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_usuario.php");
include("../../../classes/cls_mensaje.php");
include("../../../classes/cls_permiso.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_combo.php");
include("../../../lib/ui/cls_checkbox.php");

$obj_session=new Session();
switch($_POST['_accion'])
{

	case "grd_usuario":                          
        $obj_usuario=new Usuario();
        $obj_usuario->cargar_grid();            
        Grid::agregarColumna($obj_usuario->_datos,"radio",'<input type="radio" name="rad_usuario" id="rad_usuario_?" value="?" />',array("id_usuario","id_usuario"));            
        $grd_usuario=new Grid();
        $grd_usuario->datos=$obj_usuario->_datos;
        $grd_usuario->campos=array("","Usuario","Nombre","E-Mail");
        $grd_usuario->campos_excel=array("Usuario", "Nombre", "Apellido Paterno", "Apellido Materno", "E-Mail");             
        $grd_usuario->width_columnas=array("5%", "25%", "35%", "35%");
        $grd_usuario->width="750px";
        $grd_usuario->orden_columnas=array("radio","nombre_usuario","nombre_completo","correo_electronico");
        $grd_usuario->orden_columnas_excel=array("nombre_usuario","nombre","apellido_paterno","apellido_materno","correo_electronico");
        $grd_usuario->propiedad_renglon='onclick="$(\'#rad_usuario_?\').attr(\'checked\', true);" style="cursor:pointer"';
        $grd_usuario->parametros_renglon=array("id_usuario");
        $grd_usuario->caracter_sustitucion="?";           
        $grd_usuario->ordenacion=array("","nombre_usuario","nombre_completo","correo_electronico");
        $grd_usuario->filtros=array("nombre_usuario","nombre","apellido_paterno","apellido_materno","correo_electronico");
        $grd_usuario->maxlength=array("0","0","0","0","0","0");       
        $grd_usuario->mensaje ="No se encontraron usuarios";
        echo $grd_usuario;
	break;
    
    case "cmb_perfil_usuario":
        $obj_usuario=new Usuario();
        $obj_usuario->cargar();            
        array_unshift($obj_usuario->_datos,array("usuario"=>"Seleccione una opci&oacute;n","id_usuario"=>""  ));
        $cmb_perfil = new Combo();        
        $cmb_perfil->datos = $obj_usuario->_datos;
        $cmb_perfil->campo_texto = "usuario";
        $cmb_perfil->campo_valor = "id_usuario";
        $cmb_perfil->valor_seleccionado = "";        
        echo $cmb_perfil;    
    break;
	
    case "chk_permisos_usuario":
        $obj_permiso=new Permiso();
        $obj_permiso->cargar();                    
        $chk_permiso = new CheckBox();
        $chk_permiso->datos = $obj_permiso->_datos;
        $chk_permiso->campo_texto = "nombre_permiso";
        $chk_permiso->campo_valor = "id_permiso";  
       // $chk_permiso->datos_seleccionados =   $obj_permiso->_datos;
                                  
        if(isset($_GET["id_usuario"]))
        {
            $obj_usuario= new Usuario();
            $obj_usuario->id_usuario = $_GET["id_usuario"];
            $obj_usuario->cargar_permisos();  
            $chk_permiso->datos_seleccionados = $obj_usuario->_datos;
            $chk_permiso->campo_seleccionado = "tbl_permiso_id_permiso";            
        }      
        
        echo $chk_permiso;    
    break;
}
?>