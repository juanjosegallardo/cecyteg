<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");

include("../../../classes/cls_marca.php");
include("../../../classes/cls_mensaje.php");
include("../../../lib/ui/cls_grid.php");
include("dic_marca.php");

$obj_session=new Session();

if(in_array( "SCR_MARCAS" ,$obj_session->permisos))
{
    switch($_POST['_accion'])
    {
    	case "guardar":
    		
            $obj_marca = new Marca();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_marca;
            $obj_formulario->validar($obj_marca);
            if( $obj_formulario->validado)
            {
                $obj_marca->_conexion->iniciarTransaccion(); 
                $obj_marca->estatus = 1;                                                 
                $obj_marca->guardar();
                if( $obj_marca->_conexion->ejecutarTransaccion())            
                {
                    $obj_session->mensaje="La marca se guardo correctamente";                                     
                }
                else            
                {
                    $obj_session->mensaje="Ocurrio un error, el marca no pudo guardarse"; 
                }        
                            
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        																					
    	break;
    	case "modificar":
            $obj_marca = new Marca();
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_marca; 
            $obj_formulario->validar($obj_marca); 
            if( $obj_formulario->validado)
            {          
                $obj_marca->_conexion->iniciarTransaccion();                
                $obj_marca->estatus=1;
                $obj_marca->actualizar();                                                     
                                                     
                if( $obj_marca->_conexion->ejecutarTransaccion())            
                {
                    $obj_session->mensaje="La marca se actualizo correctamente";                                     
                }
                else            
                {
                    $obj_session->mensaje="Ocurrio un error, el marca no pudo actualizarse"; 
                }        
                     
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        
    			
    	break;		
    	case "borrar":
            $obj_marca = new marca();
            
            $obj_marca->_conexion->iniciarTransaccion();              
            $obj_formulario = new Formulario();
            $obj_formulario->pantalla=$pantalla_marca;
            $obj_formulario->validar($obj_marca);
            $obj_marca->eliminar();     
              
            if( $obj_marca->_conexion->ejecutarTransaccion())
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