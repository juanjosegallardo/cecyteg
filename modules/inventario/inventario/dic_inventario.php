<?php
   
    $pantalla_inventario["hdn_id_inventario_inventario"]["etiqueta"] = "input";
    $pantalla_inventario["hdn_id_inventario_inventario"]["campo"] = "id_inventario";
    $pantalla_inventario["hdn_id_inventario_inventario"]["type"] = "hidden";             
   
    $pantalla_inventario["txt_numero_inventario"]["etiqueta"] = "input";
    $pantalla_inventario["txt_numero_inventario"]["campo"] = "numero_inventario";
    $pantalla_inventario["txt_numero_inventario"]["texto"] = "Numero Inventario";
    $pantalla_inventario["txt_numero_inventario"]["type"] = "text";            
    $pantalla_inventario["txt_numero_inventario"]["obligatorio"] = "true";       
    $pantalla_inventario["txt_numero_inventario"]["mensaje"] = "Favor de especificar un numero de inventario valido";
    $pantalla_inventario["txt_numero_inventario"]["exp"] = EXP_LETRA_ESPACIO;
    $pantalla_inventario["txt_numero_inventario"]["caracteres"] = CAR_LETRA_ESPACIO;
    $pantalla_inventario["txt_numero_inventario"]["maxlength"] = "100";    

    $pantalla_inventario["cmb_tipo_equipo"]["etiqueta"] = "select";
    $pantalla_inventario["cmb_tipo_equipo"]["campo"] = "tbl_tipo_equipo_id_tipo_equipo";
    $pantalla_inventario["cmb_tipo_equipo"]["texto"] = "Tipo equipo";             
    $pantalla_inventario["cmb_tipo_equipo"]["obligatorio"] = "true";       
    $pantalla_inventario["cmb_tipo_equipo"]["mensaje"] = "Favor de especificar un tipo de equipo valido";
    $pantalla_inventario["cmb_tipo_equipo"]["class"] = "combo_server";
    $pantalla_inventario["cmb_tipo_equipo"]["ruta"] = "../inventario/prp_inventario.php";  

    $pantalla_inventario["txt_especificaciones"]["etiqueta"] = "input";
    $pantalla_inventario["txt_especificaciones"]["campo"] = "especificaciones";
    $pantalla_inventario["txt_especificaciones"]["texto"] = "Especificaciones";
    $pantalla_inventario["txt_especificaciones"]["type"] = "text";            
    $pantalla_inventario["txt_especificaciones"]["obligatorio"] = "true";       
    $pantalla_inventario["txt_especificaciones"]["mensaje"] = "Favor de especificar un nombre valido";
    $pantalla_inventario["txt_especificaciones"]["exp"] = EXP_LETRA_ESPACIO;
    $pantalla_inventario["txt_especificaciones"]["caracteres"] = CAR_LETRA_ESPACIO;
    $pantalla_inventario["txt_especificaciones"]["maxlength"] = "100";    

    $pantalla_inventario["cmb_marca"]["etiqueta"] = "select";
    $pantalla_inventario["cmb_marca"]["campo"] = "tbl_marca_id_marca";
    $pantalla_inventario["cmb_marca"]["texto"] = "Marca";              
    $pantalla_inventario["cmb_marca"]["obligatorio"] = "true";       
    $pantalla_inventario["cmb_marca"]["mensaje"] = "Favor de especificar un nombre valido";  
    $pantalla_inventario["cmb_marca"]["class"] = "combo_server";
    $pantalla_inventario["cmb_marca"]["ruta"] = "../inventario/prp_inventario.php";  
    
    
    $pantalla_inventario["cmb_estado"]["etiqueta"] = "select";
    $pantalla_inventario["cmb_estado"]["campo"] = "estado";
    $pantalla_inventario["cmb_estado"]["texto"] = "Estado";              
    $pantalla_inventario["cmb_estado"]["obligatorio"] = "true";       
    $pantalla_inventario["cmb_estado"]["mensaje"] = "Favor de especificar un estado valido";  
    $pantalla_inventario["cmb_estado"]["class"] = "combo_server";
    $pantalla_inventario["cmb_estado"]["ruta"] = "../inventario/prp_inventario.php";  
    
    $pantalla_inventario["txt_modelo"]["etiqueta"] = "input";
    $pantalla_inventario["txt_modelo"]["campo"] = "modelo";
    $pantalla_inventario["txt_modelo"]["texto"] = "Modelo";
    $pantalla_inventario["txt_modelo"]["type"] = "text";            
    $pantalla_inventario["txt_modelo"]["obligatorio"] = "true";       
    $pantalla_inventario["txt_modelo"]["mensaje"] = "Favor de especificar un nombre valido";
    $pantalla_inventario["txt_modelo"]["exp"] = EXP_LETRA_ESPACIO;
    $pantalla_inventario["txt_modelo"]["caracteres"] = CAR_LETRA_ESPACIO;
    $pantalla_inventario["txt_modelo"]["maxlength"] = "100"; 
        

    $pantalla_inventario["txt_no_serie"]["etiqueta"] = "input";
    $pantalla_inventario["txt_no_serie"]["campo"] = "no_serie";
    $pantalla_inventario["txt_no_serie"]["texto"] = "No. Serie";
    $pantalla_inventario["txt_no_serie"]["type"] = "text";            
    $pantalla_inventario["txt_no_serie"]["obligatorio"] = "true";       
    $pantalla_inventario["txt_no_serie"]["mensaje"] = "Favor de especificar un nombre valido";
    $pantalla_inventario["txt_no_serie"]["exp"] = EXP_LETRA_ESPACIO;
    $pantalla_inventario["txt_no_serie"]["caracteres"] = CAR_LETRA_ESPACIO;
    $pantalla_inventario["txt_no_serie"]["maxlength"] = "100"; 
        
    $pantalla_inventario["cmb_ubicacion"]["etiqueta"] = "select";
    $pantalla_inventario["cmb_ubicacion"]["campo"] = "tbl_ubicacion_id_ubicacion";
    $pantalla_inventario["cmb_ubicacion"]["texto"] = "Ubicacion";              
    $pantalla_inventario["cmb_ubicacion"]["obligatorio"] = "true";       
    $pantalla_inventario["cmb_ubicacion"]["mensaje"] = "Favor de especificar una ubicacion valida";  
    $pantalla_inventario["cmb_ubicacion"]["class"] = "combo_server";
    $pantalla_inventario["cmb_ubicacion"]["ruta"] = "../inventario/prp_inventario.php"; 

    $pantalla_inventario["txt_observaciones"]["etiqueta"] = "input";
    $pantalla_inventario["txt_observaciones"]["campo"] = "observaciones";
    $pantalla_inventario["txt_observaciones"]["texto"] = "Observaciones";
    $pantalla_inventario["txt_observaciones"]["type"] = "text";            
    $pantalla_inventario["txt_observaciones"]["obligatorio"] = "false";       
    $pantalla_inventario["txt_observaciones"]["mensaje"] = "Favor de especificar un nombre valido";
    $pantalla_inventario["txt_observaciones"]["exp"] = EXP_LETRA_ESPACIO;
    $pantalla_inventario["txt_observaciones"]["caracteres"] = CAR_LETRA_ESPACIO;
    $pantalla_inventario["txt_observaciones"]["maxlength"] = "100";                   
                  
    $pantalla_inventario["cmb_usuario"]["etiqueta"] = "select";
    $pantalla_inventario["cmb_usuario"]["campo"] = "tbl_usuario_id_usuario";
    $pantalla_inventario["cmb_usuario"]["texto"] = "Resguardante";              
    $pantalla_inventario["cmb_usuario"]["obligatorio"] = "true";       
    $pantalla_inventario["cmb_usuario"]["mensaje"] = "Favor de especificar un resguarante valido";  
    $pantalla_inventario["cmb_usuario"]["class"] = "combo_server";
    $pantalla_inventario["cmb_usuario"]["ruta"] = "../inventario/prp_inventario.php"; 

    $pantalla_inventario["cmb_siam"]["etiqueta"] = "select";
    $pantalla_inventario["cmb_siam"]["campo"] = "siam";
    $pantalla_inventario["cmb_siam"]["texto"] = "SIAM";              
    $pantalla_inventario["cmb_siam"]["obligatorio"] = "true";       
    $pantalla_inventario["cmb_siam"]["mensaje"] = "Favor de especificar si se dara de alta en el siam";  
    $pantalla_inventario["cmb_siam"]["class"] = "combo_server";
    $pantalla_inventario["cmb_siam"]["ruta"] = "../inventario/prp_inventario.php"; 
?>
