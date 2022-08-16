<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");

include("../../../classes/cls_usuario.php");
include("../../../classes/cls_mensaje.php");
include("../../../lib/ui/cls_grid.php");
include("dic_usuario.php");

$obj_session=new Session();

if(in_array( "SCR_USUARIOS" ,$obj_session->permisos))
{
    switch($_POST['_accion'])
    {
    	case "guardar":
    		
            $obj_usuario = new Usuario();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_usuario;
            $obj_formulario->validar($obj_usuario);
            if( $obj_formulario->validado)
            {
                $obj_usuario->_conexion->iniciarTransaccion();
                
                //Generacion aleatoria del password
                $numero_aleatorio = rand(1,10000000);
                $cadena_pass =  md5($numero_aleatorio);
                $cadena_pass =  substr($cadena_pass,0,8);
                $obj_usuario->password = $cadena_pass;                
                
                $obj_usuario->estatus=1;
                $obj_usuario->guardar();
                
                if(is_array($_POST["chk_permisos_usuario"]))
                {
                    foreach($_POST["chk_permisos_usuario"] as $id_permiso)
                    {
                        $obj_usuario->guardar_permiso($id_permiso);                    
                    }
                }
                
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
    	break;
    	case "modificar":
            $obj_usuario = new Usuario();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_usuario; 
            $obj_formulario->validar($obj_usuario); 
            if( $obj_formulario->validado)
            {          
                $obj_usuario->_conexion->iniciarTransaccion();                
                $obj_usuario->estatus=1;
                $obj_usuario->actualizar_generales();
                                      
                $obj_usuario->borrar_permisos();
                if(is_array($_POST["chk_permisos_usuario"]))
                {
                    foreach($_POST["chk_permisos_usuario"] as $id_permiso)
                    {
                        $obj_usuario->guardar_permiso($id_permiso);                    
                    }
                }
                                                     
                if( $obj_usuario->_conexion->ejecutarTransaccion())            
                {
                    $obj_session->mensaje="El usuario se actualizo correctamente";                                     
                }
                else            
                {
                    $obj_session->mensaje="Ocurrio un error, el usuario no pudo actualizarse"; 
                }        
                     
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        
    			
    	break;		
    	case "borrar":
            $obj_usuario = new Usuario();
            
            $obj_usuario->_conexion->iniciarTransaccion();              
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_usuario;
            $obj_formulario->validar($obj_usuario);
            $obj_usuario->eliminar();     
              
            if( $obj_usuario->_conexion->ejecutarTransaccion())
            {                      
                                             
                $obj_session->mensaje="Borrado Correctamente"; 
            }
            else
            {
                $obj_session->mensaje="Ocurrio un error y el registro no pudo eliminarse";
            }                        			
    	break;			
    }
}
else
{
    $obj_session->mensaje = "No cuenta con los permisos nesesarios para realizar esta accion.";      
}
header("Location: ../main/index.php?id_tab=".$_POST["_id_tab"]);
?>