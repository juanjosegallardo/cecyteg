<?php
   
    $pantalla_profesor["hdn_id_profesor"]["etiqueta"] = "input";
    $pantalla_profesor["hdn_id_profesor"]["campo"] = "id_profesor";
    $pantalla_profesor["hdn_id_profesor"]["type"] = "hidden";
    
    $pantalla_profesor["txt_codigo"]["etiqueta"] = "input";
    $pantalla_profesor["txt_codigo"]["campo"] = "codigo";
    $pantalla_profesor["txt_codigo"]["texto"] = "Codigo";
    $pantalla_profesor["txt_codigo"]["type"] = "text";            
    $pantalla_profesor["txt_codigo"]["obligatorio"] = "true";       
    $pantalla_profesor["txt_codigo"]["mensaje"] = "Favor de especificar un numero codigo de profesor valido";
    $pantalla_profesor["txt_codigo"]["exp"] = EXP_LETRA_ESPACIO;
    $pantalla_profesor["txt_codigo"]["caracteres"] = CAR_LETRA_ESPACIO;
    $pantalla_profesor["txt_codigo"]["maxlength"] = "100";
           
    $pantalla_profesor["txt_nombre_profesor"]["etiqueta"] = "input";
    $pantalla_profesor["txt_nombre_profesor"]["campo"] = "nombre";
    $pantalla_profesor["txt_nombre_profesor"]["texto"] = "Nombre";
    $pantalla_profesor["txt_nombre_profesor"]["type"] = "text";            
    $pantalla_profesor["txt_nombre_profesor"]["obligatorio"] = "true";       
    $pantalla_profesor["txt_nombre_profesor"]["mensaje"] = "Favor de especificar un nombre de profesor valido";
    $pantalla_profesor["txt_nombre_profesor"]["exp"] = EXP_LETRA_ESPACIO;
    $pantalla_profesor["txt_nombre_profesor"]["caracteres"] = CAR_LETRA_ESPACIO;
    $pantalla_profesor["txt_nombre_profesor"]["maxlength"] = "100";    
                                 
?>