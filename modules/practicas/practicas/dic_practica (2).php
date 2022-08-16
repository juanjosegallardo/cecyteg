<?php
   
    $pantalla_practica["hdn_id_practica_practica"]["etiqueta"] = "input";
    $pantalla_practica["hdn_id_practica_practica"]["campo"] = "id_practica";
    $pantalla_practica["hdn_id_practica_practica"]["type"] = "hidden";        
     
    $pantalla_practica["cmb_materia"]["etiqueta"] = "select";
    $pantalla_practica["cmb_materia"]["campo"] = "tbl_materia_id_materia";
    $pantalla_practica["cmb_materia"]["texto"] = "Materia";              
    $pantalla_practica["cmb_materia"]["obligatorio"] = "true";       
    $pantalla_practica["cmb_materia"]["mensaje"] = "Favor de especificar una materia valida";  
    $pantalla_practica["cmb_materia"]["class"] = "combo_server";
    $pantalla_practica["cmb_materia"]["ruta"] = "../practicas/prp_practica.php"; 
	   
    $pantalla_practica["cmb_practica_profesor"]["etiqueta"] = "select";
    $pantalla_practica["cmb_practica_profesor"]["campo"] = "tbl_profesor_id_profesor";
    $pantalla_practica["cmb_practica_profesor"]["texto"] = "Profesor";    
    $pantalla_practica["cmb_practica_profesor"]["obligatorio"] = "true";       
    $pantalla_practica["cmb_practica_profesor"]["mensaje"] = "Favor de especificar un profesor";
    $pantalla_practica["cmb_practica_profesor"]["class"] = "combo_server";
    $pantalla_practica["cmb_practica_profesor"]["ruta"] = "../practicas/prp_practica.php";
   
    $pantalla_practica["txt_nombre_practica"]["etiqueta"] = "input";
    $pantalla_practica["txt_nombre_practica"]["campo"] = "practica";
    $pantalla_practica["txt_nombre_practica"]["texto"] = "Nombre";
    $pantalla_practica["txt_nombre_practica"]["type"] = "text";            
    $pantalla_practica["txt_nombre_practica"]["obligatorio"] = "true";       
    $pantalla_practica["txt_nombre_practica"]["mensaje"] = "Favor de especificar un nombre valido";
    $pantalla_practica["txt_nombre_practica"]["exp"] = EXP_LETRA_ESPACIO;
    $pantalla_practica["txt_nombre_practica"]["caracteres"] = CAR_LETRA_ESPACIO;
    $pantalla_practica["txt_nombre_practica"]["maxlength"] = "100";    
            
?>