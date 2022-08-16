<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");

include("../../../classes/cls_tipo_equipo.php");
include("../../../classes/cls_mensaje.php");
include("../../../lib/ui/cls_grid.php");
include("dic_tipo_equipo.php");

$obj_session=new Session();

if(in_array( "SCR_TIPO_EQUIPO" ,$obj_session->permisos))
{
    switch($_POST['_accion'])
    {
    	case "guardar":
    		
            $obj_tipo_equipo = new TipoEquipo();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_tipo_equipo;
            $obj_formulario->validar($obj_tipo_equipo);
            if( $obj_formulario->validado)
            {
                $obj_tipo_equipo->_conexion->iniciarTransaccion(); 
                $obj_tipo_equipo->estatus = 1;                                                 
                $obj_tipo_equipo->guardar();
                if( $obj_tipo_equipo->_conexion->ejecutarTransaccion())            
                {
                    $obj_session->mensaje="El tipo de equipo se guardo correctamente";                                     
                }
                else            
                {
                    $obj_session->mensaje="Ocurrio un error, el tipo_equipo no pudo guardarse"; 
                }        
                            
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        																					
    	break;
    	case "modificar":
            $obj_tipo_equipo = new TipoEquipo();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_tipo_equipo; 
            $obj_formulario->validar($obj_tipo_equipo); 
            if( $obj_formulario->validado)
            {          
                $obj_tipo_equipo->_conexion->iniciarTransaccion();                
                $obj_tipo_equipo->estatus=1;
                $obj_tipo_equipo->actualizar();                                                     
                                                     
                if( $obj_tipo_equipo->_conexion->ejecutarTransaccion())            
                {
                    $obj_session->mensaje="La tipo_equipo se actualizo correctamente";                                     
                }
                else            
                {
                    $obj_session->mensaje="Ocurrio un error, el tipo_equipo no pudo actualizarse"; 
                }        
                     
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        
    			
    	break;		
    	case "borrar":
            $obj_tipo_equipo = new TipoEquipo();
            
            $obj_tipo_equipo->_conexion->iniciarTransaccion();              
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_tipo_equipo;
            $obj_formulario->validar($obj_tipo_equipo);
            $obj_tipo_equipo->eliminar();     
              
            if( $obj_tipo_equipo->_conexion->ejecutarTransaccion())
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