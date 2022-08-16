<?php
    $pantalla_conteo["hdn_id_conteo"]["etiqueta"] = "input";
    $pantalla_conteo["hdn_id_conteo"]["campo"] = "id_conteo";
    $pantalla_conteo["hdn_id_conteo"]["type"] = "hidden";        
   
    $pantalla_conteo["txt_descripcion_conteo"]["etiqueta"] = "input";
    $pantalla_conteo["txt_descripcion_conteo"]["campo"] = "descripcion";
    $pantalla_conteo["txt_descripcion_conteo"]["texto"] = "Descripcion";
    $pantalla_conteo["txt_descripcion_conteo"]["type"] = "text";            
    $pantalla_conteo["txt_descripcion_conteo"]["obligatorio"] = "true";       
    $pantalla_conteo["txt_descripcion_conteo"]["mensaje"] = "Favor de especificar una descripcion valida";
    $pantalla_conteo["txt_descripcion_conteo"]["exp"] = EXP_LETRA_ESPACIO;
    $pantalla_conteo["txt_descripcion_conteo"]["caracteres"] = CAR_LETRA_ESPACIO;
    $pantalla_conteo["txt_descripcion_conteo"]["maxlength"] = "100";
    
    $pantalla_conteo["chk_ubicaciones_conteo"]["etiqueta"] = "div";    
    $pantalla_conteo["chk_ubicaciones_conteo"]["class"] = "checkbox";
    $pantalla_conteo["chk_ubicaciones_conteo"]["style"] = "overflow: auto; height: 200px";
    $pantalla_conteo["chk_ubicaciones_conteo"]["texto"] = "Ubicaciones";                              
    $pantalla_conteo["chk_ubicaciones_conteo"]["ruta"] = "../conteos/prp_conteo.php";     

?>