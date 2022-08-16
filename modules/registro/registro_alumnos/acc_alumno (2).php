<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");
include("../../../lib/generales/cls_archivo.php");

include("../../../classes/cls_alumno.php");
include("../../../classes/cls_mensaje.php");
include("../../../lib/ui/cls_grid.php");
include("dic_alumno.php");

$obj_session=new Session();
if(in_array( "SCR_ALUMNOS" ,$obj_session->permisos))
{    
    switch($_POST['_accion'])
    {
    	case "guardar":
    		
            $obj_alumno = new Alumno();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_alumno;
            $obj_formulario->validar($obj_alumno);
            if( $obj_formulario->validado)
            {
                $obj_alumno->_conexion->iniciarTransaccion();
                $obj_alumno->estatus=1;
                $obj_alumno->guardar();                                  
                if( $obj_alumno->_conexion->ejecutarTransaccion())            
                {
                    $obj_session->mensaje="El alumno se guardo correctamente";                                     
                }
                else            
                {
                    $obj_session->mensaje="Ocurrio un error, el alumno no pudo guardarse"; 
                }        
                            
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        																					
    	break;
    	case "modificar":
            $obj_alumno = new Alumno();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_alumno; 
            $obj_formulario->validar($obj_alumno); 
            if( $obj_formulario->validado)
            {          
                $obj_alumno->_conexion->iniciarTransaccion();
                $obj_alumno->estatus=1;
                $obj_alumno->actualizar();      
                                                     
                if( $obj_alumno->_conexion->ejecutarTransaccion())            
                {
                    $obj_session->mensaje="El alumno se actualizo correctamente";                                     
                }
                else            
                {
                    $obj_session->mensaje="Ocurrio un error, el alumno no pudo actualizarse"; 
                }        
                     
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        
    			
    	break;		
    	case "borrar":
            
            
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_alumno;
            
            $obj_alumno = new Alumno();
            $obj_formulario->validar($obj_alumno);
            
            if( $obj_formulario->validado)
            {                      
                $obj_alumno->eliminar();                                              
                $obj_session->mensaje="Borrado Correctamente"; 
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        			
    	break;			
        
        case "guardar_foto_alumno":
            $tam_max = 1000; //kb
            $obj_archivo = new Archivo();
            $id_alumno = $_POST["hdn_foto_alumno_id_alumno"];
            $obj_archivo->archivo = $_FILES["file_foto_alumno"];
            $obj_archivo->destino = "../../../web/uploads/alumnos/{$id_alumno}_aux.jpg";
            $obj_archivo->tamanio  = 1024 * $tam_max;
            $obj_archivo->tipos = array("image/jpeg", "image/pjpeg");
            if($obj_archivo->subirArchivo())
            {
                $datos_imagen = getimagesize($obj_archivo->destino);
                $imagen_creada = imagecreatetruecolor(140, 172);
                $imagen_original = imagecreatefromjpeg($obj_archivo->destino);
                imagecopyresampled($imagen_creada,$imagen_original,0,0,0,0,140,172,$datos_imagen[0], $datos_imagen[1]);
                imagejpeg($imagen_creada, "../../../web/uploads/alumnos/{$id_alumno}.jpg",100);
                unlink($obj_archivo->destino);            
                $obj_session->mensaje="El archivo se copio correctamente";
                 
                
            }   
            else
            {
                switch($obj_archivo->error)
                {
                    
                    case 1:
                        $obj_session->mensaje="El tipo de archivo no es válido";    
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