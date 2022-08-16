<?php
    include_once("../../../config.php");  
    include("../../../lib/generales/cls_session.php");
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../classes/cls_menu.php");
    include("../../../classes/cls_usuario.php");
    include("../../../classes/cls_alumno.php");
    include("../../../classes/cls_registro_servicio.php");
    include_once("../../../modules/main/master/dic_principal.php");
        
    $obj_usuario = new Usuario();
    $obj_session=new Session();
        

    switch($_POST['_accion'])
    {	

        case "guardar_registro":                                                                                                                                  
           
            if(in_array( "SCR_REGISTRO_SERVICIO" ,$obj_session->permisos))
            {              
                        
                $obj_alumno = new Alumno();
                $obj_alumno->no_control = $_POST["txt_numero_control"];
		$obj_alumno->_utf8_decode= false;

                $obj_alumno->cargarPorNoControl();                                                        
		

                $obj_registro_entrada= new RegistroServicio();
                $obj_registro_entrada->tbl_alumno_id_alumno = $obj_alumno->id_alumno;
                
                $obj_registro_entrada->cargar_hoy();

                if( count($obj_registro_entrada->_propiedades ) > 1  )
                {
                    
                    $obj_registro_entrada->hora_salida = date("Y-m-d H:i:s"); 
                    $obj_registro_entrada->guardar_salida();
			$obj_alumno->cargarHorasPractica();
                      $arr_resultado["mensaje"] =  "<b>Adios</b> " . $obj_alumno->nombre. " <b>".  date("Y-m-d H:i:s") ."</b> <br />Horas practica: <b>". $obj_alumno->horas_practica . "</b>";
                }
                else
                {
                    $obj_registro_entrada->hora_entrada =$obj_registro_entrada->hora_salida = date("Y-m-d H:i:s"); 
                    $obj_registro_entrada->guardar_entrada();
			$obj_alumno->cargarHorasPractica();
                    $arr_resultado["mensaje"] =  "<b>Bienvenido</b> " . $obj_alumno->nombre. "  <b>".  date("Y-m-d H:i:s") ."</b> <br />Horas practica: <b>". $obj_alumno->horas_practica . "</b>";
                        
                }
                
                
                            
                if($obj_registro_entrada->_conexion->ejecutarTransaccion())
                {                                
                    $arr_resultado["estado"] = 1;
                   
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
                
    }            
    
?>
