<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");
include("../../../lib/generales/cls_archivo.php");

include("../../../classes/cls_inventario.php");
include("../../../classes/cls_mensaje.php");
include("../../../lib/ui/cls_grid.php");
include("dic_inventario.php");

$obj_session=new Session();
if(in_array( "SCR_INVENTARIO" ,$obj_session->permisos))
{
    switch($_POST['_accion'])
    {
    	case "guardar":
    		
            $obj_inventario = new Inventario();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_inventario;
            $obj_formulario->validar($obj_inventario);
            if( $obj_formulario->validado)
            {
                $obj_inventario->_conexion->iniciarTransaccion(); 
                $obj_inventario->estatus = 1;                                                 
                $obj_inventario->guardar();
                if( $obj_inventario->_conexion->ejecutarTransaccion())            
                {
                    $obj_session->mensaje="El inventario se guardo correctamente";                                     
                }
                else            
                {
                    $obj_session->mensaje="Ocurrio un error, el inventario no pudo guardarse"; 
                }        
                            
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        																					
    	break;
    	case "modificar":
            $obj_inventario = new Inventario();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_inventario; 
            $obj_formulario->validar($obj_inventario); 
            if( $obj_formulario->validado)
            {          
                $obj_inventario->_conexion->iniciarTransaccion();                
                $obj_inventario->estatus=1;
                $obj_inventario->actualizar();                                                     
                 // $obj_session->mensaje=$obj_inventario->_conexion->query;                                  
                if( $obj_inventario->_conexion->ejecutarTransaccion())            
                {
                    $obj_session->mensaje="El inventario se actualizo correctamente";                                     
                }
                else            
                {
                    $obj_session->mensaje="Ocurrio un error, el inventario no pudo actualizarse";
                     
                }        
                     
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        
    			
    	break;		
    	case "borrar":
            $obj_inventario = new Inventario();
            
            $obj_inventario->_conexion->iniciarTransaccion();              
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_inventario;
            $obj_formulario->validar($obj_inventario);
            $obj_inventario->eliminar();     
              
            if( $obj_inventario->_conexion->ejecutarTransaccion())
            {                      
                                             
                $obj_session->mensaje="Borrado Correctamente"; 
            }
            else
            {
                $obj_session->mensaje="Ocurrio un error y el registro no pudo eliminarse";
            }                        			
    	break;
        case "guardar_foto_inventario":            
            $id_inventario = $_POST["hdn_foto_inventario_id_inventario"];            
            $arr_archivos = glob("../../../web/uploads/inventario/{$id_inventario}/*.jpg");
            
            if(!file_exists("../../../web/uploads/inventario/{$id_inventario}/"))
            {
                
                mkdir("../../../web/uploads/inventario/{$id_inventario}/");
            }
            $total_archivos= count($arr_archivos);
            $nombre_imagen = ($total_archivos==0)?"000000":  substr( "000000".(basename($arr_archivos[$total_archivos-1] )+  1), strlen((basename($arr_archivos[$total_archivos-1] )+  1)),6  );;
            
            
           
            $tam_max = 1000; //kb
            $obj_archivo = new Archivo();
            $obj_archivo->archivo = $_FILES["file_foto_inventario"];
            
            
            $obj_archivo->destino = "../../../web/uploads/inventario/{$id_inventario}/foto_aux.jpg";
            $obj_archivo->tamanio  = 1024 * $tam_max;
            $obj_archivo->tipos = array("image/jpeg", "image/pjpeg");
                        
            if($obj_archivo->subirArchivo())
            {
                
                            
                $id_archivo = count($arr_archivos);
                $datos_imagen = getimagesize($obj_archivo->destino);
                $imagen_creada = imagecreatetruecolor(400, 300);
                $imagen_original = imagecreatefromjpeg($obj_archivo->destino);
                imagecopyresampled($imagen_creada,$imagen_original,0,0,0,0,400,300,$datos_imagen[0], $datos_imagen[1]);                
                imagejpeg($imagen_creada, "../../../web/uploads/inventario/{$id_inventario}/{$nombre_imagen}.jpg",100);
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
        case "eliminar_foto_inventario":
            if(unlink($_POST["hdn_ruta"]))
            {
                $obj_session->mensaje="La imagen se borro correctamente";
            }
            else
            {
                $obj_session->mensaje="La imagen no pudo borrarse";
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