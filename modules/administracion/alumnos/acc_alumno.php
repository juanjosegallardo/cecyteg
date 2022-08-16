<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");
include("../../../lib/generales/cls_archivo.php");

include("../../../classes/cls_alumno.php");
include("../../../classes/cls_reporte.php");
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
        
        case "reporte":


			$obj_reporte = new Reporte();
			$obj_reporte->causa = $_POST["txt_causa"];
			$obj_reporte->tbl_alumno_id_alumno = $_POST["hdn_foto_alumno_id_alumno"]; 
			$obj_reporte->fecha = date("Y-m-d");    
			$obj_reporte->guardar();      
			if( $obj_reporte->_conexion->ejecutarTransaccion())            
			{
				$obj_session->mensaje="El reporte se guardo correctamente";                                     
			}
			else            
			{
				$obj_session->mensaje="Ocurrio un error, el reporte no pudo guardarse"; 
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
        
    }
}
else
{
    $obj_session->mensaje = "No cuenta con los permisos nesesarios para realizar esta accion.";         
}
header("Location: ../main/index.php?id_tab=".$_POST["_id_tab"]);	
?>