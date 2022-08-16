<?php
    include_once("../../../config.php");  
    include("../../../lib/generales/cls_session.php");
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../classes/cls_menu.php");
    include("../../../classes/cls_usuario.php");
    include("../../../classes/cls_alumno.php");
    include("../../../classes/cls_registro_alumnos.php");
    include("../../../classes/cls_clase_alumno.php");
    include_once("../../../modules/main/master/dic_principal.php");
        
    $obj_usuario = new Usuario();
    $obj_session=new Session();
        

    switch($_POST['_accion'])
    {	

        case "guardar_registro":                                                                                                                                  
           
            if(in_array( "SCR_REGISTRO_SERVICIO" ,$obj_session->permisos) )
            {              
                        
                $obj_alumno = new Alumno();
                $obj_alumno->no_control = $_POST["txt_numero_control_alumnos"];
                $obj_alumno->_utf8_decode= false;
                $obj_alumno->cargarPorNoControl();                                                        
                
                $obj_clase_alumno=new ClaseAlumno();
                $obj_clase_alumno->tbl_alumno_id_alumno= $obj_alumno->id_alumno;    
                $obj_clase_alumno->tbl_clase_id_clase = $_POST["cmb_clase"];            
                $obj_clase_alumno->_conexion->iniciarTransaccion();
                $obj_clase_alumno->guardar();
                            
                if($obj_clase_alumno->_conexion->ejecutarTransaccion())
                {                                
                    $arr_resultado["estado"] = 1;
                    $arr_resultado["id"] = $obj_alumno->id_alumno ;
                    $arr_resultado["nombre"] = $obj_alumno->nombre ;
                }
                else
                {   
                 
                    $arr_resultado["estado"] = 0;
                    $arr_resultado["mensaje"] ="Ocurrio un error y el registro no pudo guardarse";                               
                }                                                                                                                                                                                             
            }
            else
            {
                $arr_resultado["estado"] = 0;
                $arr_resultado["mensaje"] = "No cuenta con los permisos necesarios"; 
                
            }
            echo  json_encode($arr_resultado);
        break;
		
		case "guardar_aseo_alumno":      
			
			$obj_alumno = new Alumno();			
			$obj_alumno->_conexion->iniciarTransaccion();						
			$fecha= date("Y-m-d H:i:s");  
			foreach($_POST["chk_aseo"] as $id_alumno)
			{	
				$obj_alumno->id_alumno = $id_alumno;
				$obj_alumno->guardar_aseo($fecha);   
			}          
   
			if( $obj_alumno->_conexion->ejecutarTransaccion())            
			{
				$obj_session->mensaje="Se guardo correctamente";                                     
			}
			else            
			{
				$obj_session->mensaje="Ocurrio un error, no pudo guardarse"; 
			}    
			
		                                                                                                          
           	header("Location: ../main/index.php?id_tab=".$_POST["_id_tab"]);
          
        break;
                
    }            
    
?>
