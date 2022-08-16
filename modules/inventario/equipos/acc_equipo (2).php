<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");
include("../../../lib/generales/cls_archivo.php");

include("../../../classes/cls_equipo.php");
include("../../../classes/cls_mensaje.php");
include("../../../lib/ui/cls_grid.php");
include("dic_equipo.php");

$obj_session=new Session();

if(in_array( "SCR_EQUIPOS" ,$obj_session->permisos))
{
    switch($_POST['_accion'])
    {

	case "actualizar_squid":

		$obj_equipo = new Equipo();
		$obj_equipo->cargarMacs();

		$ar=fopen("/etc/squid3/acl/mac","w");
		foreach($obj_equipo->_datos as $registro)
		{

				fputs($ar,$registro['mac']);
				fputs($ar,"\n");

		}		
		fclose($ar);

		$obj_session->mensaje="Actualizado";
											
    	break;
    	case "guardar":
    		
            $obj_equipo = new Equipo();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_equipo;
            $obj_formulario->validar($obj_equipo);
            if( $obj_formulario->validado)
            {
                $obj_equipo->_conexion->iniciarTransaccion(); 
                $obj_equipo->estatus = 1;                                                 
                $obj_equipo->guardar();
                if( $obj_equipo->_conexion->ejecutarTransaccion())            
                {
                    $obj_session->mensaje="El equipo se guardo correctamente";                                     
                }
                else            
                {
                    $obj_session->mensaje="Ocurrio un error, el equipo no pudo guardarse"; 
                }        
                            
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        																					
    	break;
    	case "modificar":
            $obj_equipo = new equipo();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_equipo; 
            $obj_formulario->validar($obj_equipo); 
            if( $obj_formulario->validado)
            {          
                $obj_equipo->_conexion->iniciarTransaccion();                
                $obj_equipo->estatus=1;
                $obj_equipo->actualizar();                                                     
                                                     
                if( $obj_equipo->_conexion->ejecutarTransaccion())            
                {
                    	$obj_session->mensaje="El equipo se actualizo correctamente";                     
			$obj_equipo->cargarMacs();

			$ar=fopen("/etc/squid3/acl/mac","w");
			foreach($obj_equipo->_datos as $registro)
			{

					fputs($ar,$registro['mac']);
					fputs($ar,"\n");

			}		
			fclose($ar);                
		}
		else            
		{
		    $obj_session->mensaje="Ocurrio un error, el equipo no pudo actualizarse"; 
		}        
             
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        
    			
    	break;		
    	case "borrar":
            $obj_equipo = new Equipo();
            
            $obj_equipo->_conexion->iniciarTransaccion();              
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_equipo;
            $obj_formulario->validar($obj_equipo);
            $obj_equipo->eliminar();     
              
            if( $obj_equipo->_conexion->ejecutarTransaccion())
            {                      
                                             
                $obj_session->mensaje="Borrado Correctamente"; 
            }
            else
            {
                $obj_session->mensaje="Ocurrio un error y el registro no pudo eliminarse";
            }                        			
    	break;			
        case "guardar_foto_equipo":
            $tam_max = 1000; //kb
            $obj_archivo = new Archivo();
            $id_equipo = $_POST["hdn_foto_equipo_id_equipo"];
            $obj_archivo->archivo = $_FILES["file_foto_equipo"];
            $obj_archivo->destino = "../../../web/uploads/equipos/aux1.jpg";
            $obj_archivo->tamanio  = 1024 * $tam_max;
            $obj_archivo->tipos = array("image/jpeg", "image/pjpeg");
                        
            if($obj_archivo->subirArchivo())
            {            
                $datos_imagen = getimagesize($obj_archivo->destino);
                $imagen_creada = imagecreatetruecolor(400, 300);
                $imagen_original = imagecreatefromjpeg($obj_archivo->destino);
                imagecopyresampled($imagen_creada,$imagen_original,0,0,0,0,400,300,$datos_imagen[0], $datos_imagen[1]);
                imagejpeg($imagen_creada, "../../../web/uploads/equipos/{$id_equipo}.jpg",100);
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
