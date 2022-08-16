<?php
  	$pantalla_prestamo["hdn_id_prestamo_prestamo"]["etiqueta"] = "input";
    $pantalla_prestamo["hdn_id_prestamo_prestamo"]["campo"] = "id_prestamo";
    $pantalla_prestamo["hdn_id_prestamo_prestamo"]["type"] = "hidden";   
	
	
	$pantalla_prestamo["sel_tipo"]["etiqueta"] = "select";
    $pantalla_prestamo["sel_tipo"]["campo"] = "tipo_personal";
    $pantalla_prestamo["sel_tipo"]["texto"] = "Tipo";              
    $pantalla_prestamo["sel_tipo"]["obligatorio"] = "true";       
    $pantalla_prestamo["sel_tipo"]["mensaje"] = "Favor de especificar un tipo de solicitante valido";  
    $pantalla_prestamo["sel_tipo"]["class"] = "combo_server";
    $pantalla_prestamo["sel_tipo"]["ruta"] = "../prestamos/prp_prestamo.php";  
	$pantalla_prestamo["sel_tipo"]["onclick"] = "actualizar_solicitante()";  
	
	$pantalla_prestamo["txt_clave"]["etiqueta"] = "input";
    $pantalla_prestamo["txt_clave"]["campo"] = "clave";
    $pantalla_prestamo["txt_clave"]["texto"] = "Clave";
    $pantalla_prestamo["txt_clave"]["type"] = "text";            
    $pantalla_prestamo["txt_clave"]["obligatorio"] = "true";       
    $pantalla_prestamo["txt_clave"]["mensaje"] = "Favor de especificar una clave valida";
    $pantalla_prestamo["txt_clave"]["exp"] = EXP_LETRA_ESPACIO;
    $pantalla_prestamo["txt_clave"]["caracteres"] = CAR_LETRA_ESPACIO;
   
   
    $pantalla_prestamo["txt_no_inventario"]["etiqueta"] = "input";
    $pantalla_prestamo["txt_no_inventario"]["campo"] = "numero_inventario";
    $pantalla_prestamo["txt_no_inventario"]["texto"] = "Numero Inventario";
    $pantalla_prestamo["txt_no_inventario"]["type"] = "text";            
    $pantalla_prestamo["txt_no_inventario"]["obligatorio"] = "true";       
    $pantalla_prestamo["txt_no_inventario"]["mensaje"] = "Favor de especificar un numero de inventario valido";
    $pantalla_prestamo["txt_no_inventario"]["exp"] = EXP_LETRA_ESPACIO;
    $pantalla_prestamo["txt_no_inventario"]["caracteres"] = CAR_LETRA_ESPACIO;
    $pantalla_prestamo["txt_no_inventario"]["maxlength"] = "100";   
   
    $pantalla_prestamo["txt_fecha_inicio"]["etiqueta"] = "input";
    $pantalla_prestamo["txt_fecha_inicio"]["campo"] = "fecha";
    $pantalla_prestamo["txt_fecha_inicio"]["texto"] = "Fecha de inicio de prestamo ";
    $pantalla_prestamo["txt_fecha_inicio"]["type"] = "text";            
    $pantalla_prestamo["txt_fecha_inicio"]["obligatorio"] = "true";       
    $pantalla_prestamo["txt_fecha_inicio"]["mensaje"] = "Favor de especificar una fecha de inicio";
    $pantalla_prestamo["txt_fecha_inicio"]["class"] = "fecha";

	$pantalla_prestamo["sel_hora"]["etiqueta"] = "select";
    $pantalla_prestamo["sel_hora"]["campo"] = "hora_inicio";
    $pantalla_prestamo["sel_hora"]["texto"] = "Hora";              
    $pantalla_prestamo["sel_hora"]["obligatorio"] = "true";       
    $pantalla_prestamo["sel_hora"]["mensaje"] = "Favor de especificar una hora valida";  
    $pantalla_prestamo["sel_hora"]["class"] = "combo_server";
    $pantalla_prestamo["sel_hora"]["ruta"] = "../prestamos/prp_prestamo.php";  

    $pantalla_prestamo["txt_duracion"]["etiqueta"] = "input";
    $pantalla_prestamo["txt_duracion"]["campo"] = "duracion";
    $pantalla_prestamo["txt_duracion"]["texto"] = "Duraci&oacute;n:  ";
    $pantalla_prestamo["txt_duracion"]["type"] = "text";            
    $pantalla_prestamo["txt_duracion"]["obligatorio"] = "true";       
    $pantalla_prestamo["txt_duracion"]["mensaje"] = "Favor de especificar la duracion";
	
	$pantalla_prestamo["sel_tipo_lugar"]["etiqueta"] = "select";
    $pantalla_prestamo["sel_tipo_lugar"]["campo"] = "tipo_lugar";
    $pantalla_prestamo["sel_tipo_lugar"]["texto"] = "Tipo de lugar";              
    $pantalla_prestamo["sel_tipo_lugar"]["obligatorio"] = "true";       
    $pantalla_prestamo["sel_tipo_lugar"]["mensaje"] = "Favor de especificar un lugar";  
    $pantalla_prestamo["sel_tipo_lugar"]["class"] = "combo_server";
    $pantalla_prestamo["sel_tipo_lugar"]["ruta"] = "../prestamos/prp_prestamo.php";  
    
	$pantalla_prestamo["txt_lugar"]["etiqueta"] = "input";
    $pantalla_prestamo["txt_lugar"]["campo"] = "lugar";
    $pantalla_prestamo["txt_lugar"]["texto"] = "Lugar";
    $pantalla_prestamo["txt_lugar"]["type"] = "text";            
    $pantalla_prestamo["txt_lugar"]["obligatorio"] = "true";       
    $pantalla_prestamo["txt_lugar"]["mensaje"] = "Favor de especificar un lugar de inventario valido";
    $pantalla_prestamo["txt_lugar"]["exp"] = EXP_LETRA_ESPACIO;
    $pantalla_prestamo["txt_lugar"]["caracteres"] = CAR_LETRA_ESPACIO;
    $pantalla_prestamo["txt_lugar"]["maxlength"] = "100"; 
	  

?>
