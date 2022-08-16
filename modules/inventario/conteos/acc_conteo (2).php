<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");
include("../../../lib/generales/cls_archivo.php");

include("../../../classes/cls_inventario.php");
include("../../../classes/cls_conteo.php");
include("../../../classes/cls_ubicacion_por_conteo.php");
include("../../../classes/cls_inventario_por_conteo.php");
include("../../../classes/cls_mensaje.php");
include("../../../lib/ui/cls_grid.php");
include("dic_conteo.php");

$obj_session=new Session();
    switch($_POST['_accion'])
    {
    	case "guardar":
            if(in_array( "SCR_CONTEOS" ,$obj_session->permisos))
            {        		
                $obj_conteo = new Conteo();
                $obj_ubicacion_por_conteo = new UbicacionPorConteo($obj_conteo->_conexion);
                $obj_formulario = new Formulario();
                $obj_formulario->pantalla=$pantalla_conteo;
                $obj_formulario->validar($obj_conteo);
                if( $obj_formulario->validado)
                {
                    $obj_conteo->_conexion->iniciarTransaccion(); 
                    
                    $obj_conteo->estatus = 1;
                    $obj_conteo->estado = 1;                                                  
                    $obj_conteo->guardar();                                
                    
                    $obj_ubicacion_por_conteo->tbl_conteo_id_conteo =$obj_conteo->id_conteo;            
                     
                    
                    if(is_array($_POST["chk_ubicaciones_conteo"]))
                    {
                        foreach($_POST["chk_ubicaciones_conteo"] as $id_ubicacion)
                        {
                            $obj_ubicacion_por_conteo->tbl_ubicacion_id_ubicacion = $id_ubicacion;
                            $obj_ubicacion_por_conteo->guardar();                    
                        }
                    }
                    
                    if( $obj_conteo->_conexion->ejecutarTransaccion())            
                    {
                        $obj_session->mensaje="El conteo se guardo correctamente";                                     
                    }
                    else            
                    {
                        $obj_session->mensaje="Ocurrio un error, el conteo no pudo guardarse"; 
                    }        
                                
                }
                else
                {
                    $obj_session->mensaje=$obj_formulario->mensaje;
                }
            }
            else
            {
                $obj_session->mensaje = "No cuenta con los permisos nesesarios para realizar esta accion.";      
            } 
            header("Location: ../main/index.php?id_tab=".$_POST["_id_tab"]);                           																					
    	break;
    	case "modificar":
            if(in_array( "SCR_CONTEOS" ,$obj_session->permisos))
            {
                $obj_conteo = new conteo();
                $obj_ubicacion_por_conteo = new UbicacionPorConteo($obj_conteo->_conexion);
                $obj_formulario = new Formulario();
                $obj_formulario->pantalla=$pantalla_conteo; 
                $obj_formulario->validar($obj_conteo); 
                if( $obj_formulario->validado)
                {          
                    $obj_conteo->_conexion->iniciarTransaccion();                
                    $obj_conteo->estatus=1;
                    $obj_conteo->actualizar();                                                     
                     // $obj_session->mensaje=$obj_conteo->_conexion->query;
                    $obj_ubicacion_por_conteo->tbl_conteo_id_conteo =$obj_conteo->id_conteo;    
                    $obj_ubicacion_por_conteo->eliminarPorConteo();
                    if(is_array($_POST["chk_ubicaciones_conteo"]))
                    {
                        foreach($_POST["chk_ubicaciones_conteo"] as $id_ubicacion)
                        {
                            $obj_ubicacion_por_conteo->tbl_ubicacion_id_ubicacion = $id_ubicacion;
                            $obj_ubicacion_por_conteo->guardar();                    
                        }
                    }
                     
                                            
                    if( $obj_conteo->_conexion->ejecutarTransaccion())            
                    {
                        $obj_session->mensaje="El conteo se actualizo correctamente";                                     
                    }
                    else            
                    {
                        $obj_session->mensaje="Ocurrio un error, el conteo no pudo actualizarse";
                         
                    }        
                         
                }
                else
                {
                    $obj_session->mensaje=$obj_formulario->mensaje;
                }                        
    		}	
            else
            {
                $obj_session->mensaje = "No cuenta con los permisos nesesarios para realizar esta accion.";      
            } 
            header("Location: ../main/index.php?id_tab=".$_POST["_id_tab"]);
    	break;		
    	case "borrar":
            if(in_array( "SCR_CONTEOS" ,$obj_session->permisos))
            {
                $obj_conteo = new conteo();
                
                $obj_conteo->_conexion->iniciarTransaccion();              
                $obj_formulario = new Formulario();
                $obj_formulario->pantalla=$pantalla_conteo;
                $obj_formulario->validar($obj_conteo);
                $obj_conteo->eliminar();     
                  
                if( $obj_conteo->_conexion->ejecutarTransaccion())
                {                      
                                                 
                    $obj_session->mensaje="Borrado Correctamente"; 
                }
                else
                {
                    $obj_session->mensaje="Ocurrio un error y el registro no pudo eliminarse";
                }
            }                        			
            else
            {
                $obj_session->mensaje = "No cuenta con los permisos nesesarios para realizar esta accion.";      
            } 
            header("Location: ../main/index.php?id_tab=".$_POST["_id_tab"]);
    	break;
        case "iniciar":
            if(in_array( "SCR_CONTEOS" ,$obj_session->permisos))
            {
                $obj_conteo = new Conteo();
                $obj_ubicacion_por_conteo = new UbicacionPorConteo($obj_conteo->_conexion);
                $obj_formulario = new Formulario();
                $obj_formulario->pantalla=$pantalla_conteo;
                $obj_formulario->validar($obj_conteo);
                if( $obj_formulario->validado)
                {
                    $obj_conteo->_conexion->iniciarTransaccion();                                                                                  
                    $obj_conteo->iniciar();                                
                    
                    if( $obj_conteo->_conexion->ejecutarTransaccion())            
                    {
                        $obj_session->mensaje="El conteo se inicio correctamente";                                     
                    }
                    else            
                    {
                        $obj_session->mensaje="Ocurrio un error, el conteo no pudo iniciarse"; 
                    }        
                                
                }
                else
                {
                    $obj_session->mensaje=$obj_formulario->mensaje;
                }                        																					
            }
            else
            {
                $obj_session->mensaje = "No cuenta con los permisos nesesarios para realizar esta accion.";      
            } 
            header("Location: ../main/index.php?id_tab=".$_POST["_id_tab"]);
        break;
        
        case "terminar":
            if(in_array( "SCR_CONTEOS" ,$obj_session->permisos))
            {
                $obj_conteo = new Conteo();
                $obj_ubicacion_por_conteo = new UbicacionPorConteo($obj_conteo->_conexion);
                $obj_formulario = new Formulario();
                $obj_formulario->pantalla=$pantalla_conteo;
                $obj_formulario->validar($obj_conteo);
                if( $obj_formulario->validado)
                {
                    $obj_conteo->_conexion->iniciarTransaccion();                                                                                  
                    $obj_conteo->terminar();                                
                    
                    if( $obj_conteo->_conexion->ejecutarTransaccion())            
                    {
                        $obj_session->mensaje="El conteo se inicio correctamente";                                     
                    }
                    else            
                    {
                        $obj_session->mensaje="Ocurrio un error, el conteo no pudo iniciarse"; 
                    }        
                                
                }
                else
                {
                    $obj_session->mensaje=$obj_formulario->mensaje;
                }
            }       
            else
            {
                $obj_session->mensaje = "No cuenta con los permisos nesesarios para realizar esta accion.";      
            } 
            header("Location: ../main/index.php?id_tab=".$_POST["_id_tab"]);
        break; 
        
        case "guardar_inventario_conteo":
            $obj_inventario = new Inventario();
            $arr_resultado = array();
            if(in_array( "SCR_CONTEOS" ,$obj_session->permisos))
            
            {
                if(isset($_POST["chk_autocompletar"]))
                {
                    
                    $obj_inventario->cargarBusquedaPorInventario($_POST["txt_numero_inventario"]);
                    $total = count($obj_inventario->_datos);
                    if($total==0)
                    {
                        $arr_resultado["mensaje"] = "No se encontraron coincidencias con la terminacion " . $_POST["txt_numero_inventario"];
                        
                    }
                    if($total==1)
                    {
                        $obj_inventario->numero_inventario = $_POST["txt_numero_inventario"];
                        $obj_inventario->cargarPorNumeroInventarioSimilar();                        
                                                
                        $obj_inventario_por_conteo = new InventarioPorConteo();
                        $obj_inventario_por_conteo->tbl_inventario_id_inventario = $obj_inventario->id_inventario;
                        $obj_inventario_por_conteo->tbl_conteo_id_conteo = $_POST["hdn_id_conteo"];                          
                        
                        $obj_inventario_por_conteo->_conexion->iniciarTransaccion();
                        $obj_inventario_por_conteo->guardar();
                        
                        if($obj_inventario_por_conteo->_conexion->ejecutarTransaccion())
                        {
                            $arr_resultado["mensaje"] = "Se guardo correctamente el articulo con el numero de inventario : " .$obj_inventario->numero_inventario;                           
                        }
                        else
                        {
                            
                            $arr_resultado["mensaje"] = "No se pudo guardar el articulo con el numero de inventario : " .$obj_inventario->numero_inventario . $obj_inventario_por_conteo->_conexion->query;                                 
                        }             
                        
                    }
                    if($total>1)
                    {
                        $arr_resultado["mensaje"] = "Existen varios articulos del inventario con la terminacion " . $_POST["txt_numero_inventario"];;
                        
                    }                                                            
                }
                else
                {
                    
                    $obj_inventario->cargarPorInventario($_POST["txt_numero_inventario"]);
                    $total = count($obj_inventario->_datos);
                    if($total==0)
                    {
                        $arr_resultado["mensaje"] = "No se encontraron coincidencias con: " . $_POST["txt_numero_inventario"];
                        
                    }
                    if($total==1)
                    {
                        $obj_inventario->numero_inventario = $_POST["txt_numero_inventario"];
                        $obj_inventario->cargarPorNumeroInventario();                        
                                                
                        $obj_inventario_por_conteo = new InventarioPorConteo();
                        $obj_inventario_por_conteo->tbl_inventario_id_inventario = $obj_inventario->id_inventario;
                        $obj_inventario_por_conteo->tbl_conteo_id_conteo = $_POST["hdn_id_conteo"];
                        $obj_inventario_por_conteo->_conexion->iniciarTransaccion();
                        $obj_inventario_por_conteo->guardar();
                        
                        if($obj_inventario_por_conteo->_conexion->ejecutarTransaccion())
                        {
                            $arr_resultado["mensaje"] = "Se guardo correctamente el articulo con el numero de inventario : " .$obj_inventario->numero_inventario;                           
                        }
                        else
                        {
                            
                            $arr_resultado["mensaje"] = "No se pudo guardar el articulo con el numero de inventario : " .$obj_inventario->numero_inventario. $obj_inventario_por_conteo->_conexion->query;;                                 
                        }                                          
                    }
                    
                    if($total>1)
                    {
                        $arr_resultado["mensaje"] = "Existen varios articulos del inventario con el mismo numero";
                        
                    }
                    
                }
                echo json_encode($arr_resultado);
            }        
        break;	 			
    }

?>