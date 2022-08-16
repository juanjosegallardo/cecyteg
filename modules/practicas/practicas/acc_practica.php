<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");
include("../../../lib/generales/cls_archivo.php");
include("../../../classes/cls_practica.php");
include("../../../classes/cls_mensaje.php");
include("../../../lib/ui/cls_grid.php");
include("dic_practica.php");

$obj_session=new Session();

if(in_array( "SCR_PRACTICAS" ,$obj_session->permisos))
{
    switch($_POST['_accion'])
    {
    	case "guardar":
    		
            $obj_practica = new practica();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_practica;
            $obj_formulario->validar($obj_practica);
            if( $obj_formulario->validado)
            {
                $obj_practica->_conexion->iniciarTransaccion(); 
                $obj_practica->estatus = 1;                                                 
                $obj_practica->guardar();      
                if( $obj_practica->_conexion->ejecutarTransaccion())            
                {
                    $obj_session->mensaje="La practica se guardo correctamente";                                     
                }
                else            
                {
                    $obj_session->mensaje="Ocurrio un error, el practica no pudo guardarse"; 
                }        
                            
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        																					
    	break;
    	case "modificar":
            $obj_practica = new practica();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_practica; 
            $obj_formulario->validar($obj_practica); 
            if( $obj_formulario->validado)
            {          
                $obj_practica->_conexion->iniciarTransaccion();                
                $obj_practica->estatus=1;
                $obj_practica->actualizar();                                                     
                                                     
                if( $obj_practica->_conexion->ejecutarTransaccion())            
                {
                    $obj_session->mensaje="La practica se actualizo correctamente";                                     
                }
                else            
                {
                    $obj_session->mensaje="Ocurrio un error, el practica no pudo actualizarse"; 
                }        
                     
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        
    			
    	break;		
    	case "borrar":
            $obj_practica = new practica();
            
            $obj_practica->_conexion->iniciarTransaccion();              
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_practica;
            $obj_formulario->validar($obj_practica);
            
            $obj_practica->eliminar();     
              
            if( $obj_practica->_conexion->ejecutarTransaccion())
            {                      
                                             
                $obj_session->mensaje="Borrado Correctamente"; 
            }
            else
            {
                $obj_session->mensaje="Ocurrio un error y el registro no pudo eliminarse";
            }                        			
    	break;	
		
		case "guardar_archivo_practica":            
            $id_practica = $_POST["hdn_archivo_id_practica"];            
  
        
           
            $tam_max = 1000; //kb
            $obj_archivo = new Archivo();
            $obj_archivo->archivo = $_FILES["file_archivo_practica"];  
            $obj_archivo->destino = "../../../web/uploads/practicas/{$id_practica}.xlsx";
            $obj_archivo->tamanio  = 1024 * $tam_max;
            $obj_archivo->tipos = array("application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                        
            if($obj_archivo->subirArchivo())
            {
                $obj_practica=new Practica();
				$obj_practica->id_practica=$id_practica; 
				$obj_practica->_conexion->iniciarTransaccion();       
				$obj_practica->actualizarArchivo();
				if( $obj_practica->_conexion->ejecutarTransaccion()	)			
				{
					$obj_session->mensaje="El archivo se copio correctamente";
				}		
				else
				{
					$obj_session->mensaje="El archivo no pudo copiarse";
					unlink($obj_archivo->destino);
				}
			
                                            
                
                 
                
            }   
            else
            {
                switch($obj_archivo->error)
                {
                    
                    case 1:
                        $obj_session->mensaje="El tipo de archivo no es válido". $_FILES["file_archivo_practica"]["type"];    
                    break;
                    case 2:
                        $obj_session->mensaje="El tamaño del archivo debe ser menor a {$tam_max} KB";    
                    break;
                    case 3:
                        $obj_session->mensaje="El archivo no pudo copiarse";    
                    break;
                }
                
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