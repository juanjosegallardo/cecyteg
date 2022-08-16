<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");

include("../../../classes/cls_usuario.php");
include("../../../classes/cls_configuracion.php");
include("../../../classes/cls_mensaje.php");
include("../../../lib/ui/cls_grid.php");
include("dic_tema.php");

$obj_session=new Session();
if(in_array( "SCR_TEMAS" ,$obj_session->permisos))
{
    switch($_POST['_accion'])
    {
    	case "modificar":
    		
            $obj_configuracion = new Configuracion();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_tema;
            $obj_formulario->validar($obj_configuracion);
            if( $obj_formulario->validado)
            {
                $obj_configuracion->_conexion->iniciarTransaccion();
                $obj_configuracion->guardarTema();
                $obj_configuracion->guardarColorFondo();
                if( $obj_configuracion->_conexion->ejecutarTransaccion())            
                {
                    $obj_session->mensaje="La apariencia se modifico correctamente";                                     
                }
                else            
                {
                    $obj_session->mensaje="Ocurrio un error, la apariencia no pudo modificarse"; 
                }        
                            
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
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