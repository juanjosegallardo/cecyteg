<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");
include("../../../lib/generales/cls_archivo.php");

include("../../../classes/cls_profesor.php");
include("../../../classes/cls_clase.php");
include("../../../classes/cls_mensaje.php");
include("../../../lib/ui/cls_grid.php");
include("dic_horario.php");

$obj_session=new Session();

    switch($_POST['_accion'])
    {
    	case "guardar_clase":
			$respuesta= array();
    		if(in_array( "SCR_PRACTICAS" ,$obj_session->permisos))
			{
				$obj_clase = new Clase();
				$obj_formulario = new Formulario();
            	$obj_formulario->pantalla=$pantalla_horario; 
				$obj_formulario->validar($obj_clase); 
				$obj_clase->_conexion->iniciarTransaccion();
				
				$obj_clase->guardar();      
                     
	                           
                if( $obj_clase->_conexion->ejecutarTransaccion())            
                {
                	$respuesta["mensaje"] ="Guardado Correctamente!";  
                }
                else            
                {
					$respuesta["mensaje"] ="No puedo guardarse!";
                }    
				
			}    
			echo json_encode($respuesta);
                     																					
    	break;

    	case "borrar_clase":
			$respuesta= array();
    		if(in_array( "SCR_PRACTICAS" ,$obj_session->permisos))
			{
				$obj_clase = new Clase();
			
				$obj_clase->_conexion->iniciarTransaccion();
			    $obj_clase->id_clase=$_POST["hdn_id_horario_clase"];	
				$obj_clase->borrar();      
                     
	                           
                if( $obj_clase->_conexion->ejecutarTransaccion())            
                {
                	$respuesta["mensaje"] ="Borrado Correctamente!";  
                }
                else            
                {
					$respuesta["mensaje"] ="No puedo guardarse!";
                }    
				
			}    
			echo json_encode($respuesta);
                     																					
    	break;

    }

?>