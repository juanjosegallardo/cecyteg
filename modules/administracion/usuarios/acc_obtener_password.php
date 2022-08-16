<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");

include("../../../classes/cls_usuario.php");

$obj_session=new Session();
$arr_resultado = array();

switch($_POST["_accion"])
{
 
    case 'mensaje':   
        if(in_array( "SCR_USUARIOS" ,$obj_session->permisos))
        {
            $arr_resultado["estado"] = 1;
            
            $obj_usuario = new Usuario();
            $obj_usuario->id_usuario = $_POST["id_usuario"];
            $obj_usuario->cargarPorId();            
            $arr_resultado["password"] = $obj_usuario->password;    
        }
        else
        {
            $arr_resultado["estado"] = 0;      
        }
        echo json_encode($arr_resultado);
    break;
    case 'correo':   
        if(in_array( "SCR_USUARIOS" ,$obj_session->permisos)  )
        {
            $arr_resultado["estado"] = 1;
            
            $obj_usuario = new Usuario();
            $obj_usuario->id_usuario = $_POST["id_usuario"];
            $obj_usuario->cargarPorId(); 
            
      
        	$head="From: " . CORREO_ORIGEN . "\r\n";
        	$head.="To: " . $obj_usuario->correo_electronico ."\r\n";
        	$head.="Content-Type: text/html; charset=iso-8859-1\n";        
        	@mail($dest,"Recuperacion de contraseña ". NOMBRE_GENERAL, "Tu contraseña es:". $obj_usuario->password,$head);
               
            $arr_resultado["password"] = $obj_usuario->password;   
            $arr_resultado["correo"] = $obj_usuario->correo_electronico;
            //mail(); 
        }
        else
        {
            $arr_resultado["estado"] = 0;      
        }
        echo json_encode($arr_resultado);
    break;

}
?>