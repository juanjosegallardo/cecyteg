<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");

include("../../../classes/cls_materia.php");
include("../../../classes/cls_mensaje.php");
include("../../../lib/ui/cls_grid.php");
include("dic_materia.php");

$obj_session=new Session();

if(in_array( "SCR_MATERIAS" ,$obj_session->permisos))
{
    switch($_POST['_accion'])
    {
    	case "guardar":
    		
            $obj_materia = new materia();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_materia;
            $obj_formulario->validar($obj_materia);
            if( $obj_formulario->validado)
            {
                $obj_materia->_conexion->iniciarTransaccion(); 
                $obj_materia->estatus = 1;                                                 
                $obj_materia->guardar();
                if( $obj_materia->_conexion->ejecutarTransaccion())            
                {
                    $obj_session->mensaje="La materia se guardo correctamente";                                     
                }
                else            
                {
                    $obj_session->mensaje="Ocurrio un error, el materia no pudo guardarse"; 
                }        
                            
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        																					
    	break;
    	case "modificar":
            $obj_materia = new materia();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_materia; 
            $obj_formulario->validar($obj_materia); 
            if( $obj_formulario->validado)
            {          
                $obj_materia->_conexion->iniciarTransaccion();                
                $obj_materia->estatus=1;
                $obj_materia->actualizar();                                                     
                                                     
                if( $obj_materia->_conexion->ejecutarTransaccion())            
                {
                    $obj_session->mensaje="La materia se actualizo correctamente";                                     
                }
                else            
                {
                    $obj_session->mensaje="Ocurrio un error, el materia no pudo actualizarse"; 
                }        
                     
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        
    			
    	break;		
    	case "borrar":
            $obj_materia = new materia();
            
            $obj_materia->_conexion->iniciarTransaccion();              
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_materia;
            $obj_formulario->validar($obj_materia);
            $obj_materia->eliminar();     
              
            if( $obj_materia->_conexion->ejecutarTransaccion())
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