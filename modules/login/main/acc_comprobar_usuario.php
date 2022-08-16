<?php
    include_once("../../../config.php");  
    include("../../../lib/generales/cls_session.php");
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../classes/cls_menu.php");
    include("../../../classes/cls_usuario.php");
    include_once("../../../modules/main/master/dic_principal.php");
        
    $obj_session = new Session(); 
    sleep(1);
    $arr_resultado = array();                  
    $obj_usuario = new Usuario();
    if($_POST)
    {
        
        $obj_usuario->nombre_usuario =  $_POST["txt_usuario"];
        $obj_usuario->password = $_POST["txt_password"];        
       
        if($obj_usuario->comprobar_usuario())
        {
                        
            $obj_usuario->cargarPorUsuarioPassword(); 
            $obj_usuario->cargar_permisos();
            $arr_permisos = $obj_usuario->generar_arreglo_permisos(); 
            
            $obj_menu = new Menu();
            $obj_menu->menu_principal =$menu_principal;
            $menu_filtrado = $obj_menu->filtrar($arr_permisos);
            
                        
            $arr_resultado["estado"] = 1;
            $arr_resultado["mensaje"] = "Bienvenido";                                    
            $arr_resultado["url"] = $obj_menu->obtenerPrimerURL($arr_permisos); 
            
                       
            $obj_session->nombre_usuario = $obj_usuario->nombre_usuario;
            $obj_session->id_usuario = $obj_usuario->id_usuario;                                                
            $obj_session->menu = $menu_filtrado;
            $obj_session->permisos = $arr_permisos;   
            $obj_session->pagina_inicio = $arr_resultado["url"];
            $obj_session->iniciado = "true";
                                                                                 
        }
        else
        {
            $arr_resultado["estado"] = 0;
            $arr_resultado["mensaje"] = "Usuario o password incorrectos";                      
        }
        
        
    }
    else
    {
        
          $arr_resultado["estado"] = 0;
          $arr_resultado["mensaje"] = "Usuario o password incorrectos"; 
    }
    
    
    echo  json_encode($arr_resultado)
?>