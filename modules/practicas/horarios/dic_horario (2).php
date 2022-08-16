<?php
   
    $pantalla_horario["cmb_grupo"]["etiqueta"] = "select";
    $pantalla_horario["cmb_grupo"]["campo"] = "tbl_grupo_id_grupo";
    $pantalla_horario["cmb_grupo"]["texto"] = "Grupo";              
    $pantalla_horario["cmb_grupo"]["obligatorio"] = "true";       
    $pantalla_horario["cmb_grupo"]["mensaje"] = "Favor de especificar un grupo valido";  
    $pantalla_horario["cmb_grupo"]["class"] = "combo_server";
    $pantalla_horario["cmb_grupo"]["ruta"] = "../horarios/prp_horario.php";  
	 
	
	$pantalla_horario["cmb_materia"]["etiqueta"] = "select";
    $pantalla_horario["cmb_materia"]["campo"] = "tbl_materia_id_materia";
    $pantalla_horario["cmb_materia"]["texto"] = "Grupo";              
    $pantalla_horario["cmb_materia"]["obligatorio"] = "true";       
    $pantalla_horario["cmb_materia"]["mensaje"] = "Favor de especificar una materia valida";  
    $pantalla_horario["cmb_materia"]["class"] = "combo_server";
    $pantalla_horario["cmb_materia"]["ruta"] = "../horarios/prp_horario.php"; 	
	$pantalla_horario["cmb_materia"]["hijo"] = "cmb_practica"; 
	$pantalla_horario["cmb_materia"]["asincrono"] = "true"; 
    
    $pantalla_horario["cmb_profesor"]["etiqueta"] = "select";
    $pantalla_horario["cmb_profesor"]["campo"] = "tbl_profesor_id_profesor";
    $pantalla_horario["cmb_profesor"]["texto"] = "Profesor";              
    $pantalla_horario["cmb_profesor"]["obligatorio"] = "true";       
    $pantalla_horario["cmb_profesor"]["mensaje"] = "Favor de especificar una profesor valida";  
    $pantalla_horario["cmb_profesor"]["class"] = "combo_server";
    $pantalla_horario["cmb_profesor"]["ruta"] = "../horarios/prp_horario.php"; 
	$pantalla_horario["cmb_profesor"]["hijo"] = "cmb_practica"; 
	
	$pantalla_horario["cmb_practica"]["etiqueta"] = "select";
    $pantalla_horario["cmb_practica"]["campo"] = "tbl_practica_id_practica";
    $pantalla_horario["cmb_practica"]["texto"] = "Grupo";              
    $pantalla_horario["cmb_practica"]["obligatorio"] = "true";       
    $pantalla_horario["cmb_practica"]["mensaje"] = "Favor de especificar una materia valida";  
    $pantalla_horario["cmb_practica"]["class"] = "combo_server";
    $pantalla_horario["cmb_practica"]["ruta"] = "../horarios/prp_horario.php"; 
	$pantalla_horario["cmb_practica"]["asincrono"] = "true";
    

		
	$pantalla_horario["horario_fecha_hora"]["etiqueta"] = "input";
    $pantalla_horario["horario_fecha_hora"]["campo"] = "fecha_hora";
	$pantalla_horario["horario_fecha_hora"]["type"] ="text";
    $pantalla_horario["horario_fecha_hora"]["texto"] = "";              
    $pantalla_horario["horario_fecha_hora"]["obligatorio"] = "true";       
    $pantalla_horario["horario_fecha_hora"]["mensaje"] = "Favor de especificar una profesor valida";  
    $pantalla_horario["horario_fecha_hora"]["readonly"] = "";
	
	
	$pantalla_horario["hdn_horario_id_aula"]["etiqueta"] = "input";
	$pantalla_horario["hdn_horario_id_aula"]["type"] ="hidden";
    $pantalla_horario["hdn_horario_id_aula"]["campo"] = "tbl_aula_id_aula";
    $pantalla_horario["hdn_horario_id_aula"]["texto"] = "Aula";              
    $pantalla_horario["hdn_horario_id_aula"]["obligatorio"] = "true";       
    $pantalla_horario["hdn_horario_id_aula"]["mensaje"] = "Favor de especificar una aula valida";  
	
	
	$pantalla_horario["cmb_modulos"]["etiqueta"] = "select";
    $pantalla_horario["cmb_modulos"]["campo"] = "duracion";
    $pantalla_horario["cmb_modulos"]["texto"] = "Total de modulos";              
    $pantalla_horario["cmb_modulos"]["obligatorio"] = "true";       
    $pantalla_horario["cmb_modulos"]["mensaje"] = "Favor de especificar una cantidad valida";  
    $pantalla_horario["cmb_modulos"]["class"] = "combo_server";
    $pantalla_horario["cmb_modulos"]["ruta"] = "../horarios/prp_horario.php"; 	
                                
?>