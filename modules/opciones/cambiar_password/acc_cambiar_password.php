<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");

include("../../../classes/cls_usuario.php");
include("../../../classes/cls_mensaje.php");
include("../../../lib/ui/cls_grid.php");
include("dic_cambiar_password.php");


$obj_session=new Session();

switch($_POST['_accion'])
{
	case "cambiar_password":
    if(in_array( "SCR_CAMBIAR_PASSWORD" ,$obj_session->permisos))
    {
		
        $obj_usuario = new Usuario();
        $obj_formulario = new Formulario();
        $obj_formulario->pantalla=$pantalla_usuario;
        $obj_formulario->validar($obj_usuario);
        $obj_usuario->id_usuario= $obj_session->id_usuario;
        if( $obj_formulario->validado)
        {
            $obj_usuario->_conexion->iniciarTransaccion();
            $obj_usuario->actualizar_password();
            if( $obj_usuario->_conexion->ejecutarTransaccion())            
            {
                $obj_session->mensaje="El usuario se guardo correctamente";                                     
            }
            else            
            {
                $obj_session->mensaje="Ocurrio un error, el usuario no pudo guardarse"; 
            }        
                        
        }
        else
        {
            $obj_session->mensaje=$obj_formulario->mensaje;
        }     
    }                   																					
    else
    {
        $obj_session->mensaje = "No cuenta con los permisos nesesarios para realizar esta accion.";      
    }
    header("Location: ../main/index.php?id_tab=".$_POST["_id_tab"]);
	break;

    case "comprobar_password_anterior":
        $arr_resultado = array();
        $obj_usuario = new Usuario();
        $obj_usuario->nombre_usuario =  $obj_session->nombre_usuario;
        $obj_usuario->password = $_POST["password"];        
        
        if($obj_usuario->comprobar_usuario())
        {
            $arr_resultado["valido"]="true";
        }
        else
        {
            $arr_resultado["valido"]="false";
        }
        
        echo json_encode($arr_resultado);
    break;
    
    

			
}


?>