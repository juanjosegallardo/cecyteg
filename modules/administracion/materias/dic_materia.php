<?php
   
    $pantalla_materia["hdn_id_materia_materia"]["etiqueta"] = "input";
    $pantalla_materia["hdn_id_materia_materia"]["campo"] = "id_materia";
    $pantalla_materia["hdn_id_materia_materia"]["type"] = "hidden";        
   
    $pantalla_materia["txt_nombre_materia"]["etiqueta"] = "input";
    $pantalla_materia["txt_nombre_materia"]["campo"] = "materia";
    $pantalla_materia["txt_nombre_materia"]["texto"] = "Nombre";
    $pantalla_materia["txt_nombre_materia"]["type"] = "text";            
    $pantalla_materia["txt_nombre_materia"]["obligatorio"] = "true";       
    $pantalla_materia["txt_nombre_materia"]["mensaje"] = "Favor de especificar un nombre valido";
    $pantalla_materia["txt_nombre_materia"]["exp"] = EXP_LETRA_ESPACIO;
    $pantalla_materia["txt_nombre_materia"]["caracteres"] = CAR_LETRA_ESPACIO;
    $pantalla_materia["txt_nombre_materia"]["maxlength"] = "100";


    $pantalla_materia["txt_horas_practica_materia"]["etiqueta"] = "input";
    $pantalla_materia["txt_horas_practica_materia"]["campo"] = "horas_practica";
    $pantalla_materia["txt_horas_practica_materia"]["texto"] = "Horas practica";
    $pantalla_materia["txt_horas_practica_materia"]["type"] = "text";            
    $pantalla_materia["txt_horas_practica_materia"]["obligatorio"] = "true";       
    $pantalla_materia["txt_horas_practica_materia"]["mensaje"] = "Favor de especificar un numero de horas practica";
    $pantalla_materia["txt_horas_practica_materia"]["exp"] = EXP_ENTERO;
    $pantalla_materia["txt_horas_practica_materia"]["caracteres"] = CAR_ENTERO;
    $pantalla_materia["txt_horas_practica_materia"]["maxlength"] = "100";
                  
?>