<?php
    include_once("../../../lib/generales/cls_session.php");
    include_once("../../../config.php");  

    $menu_principal["administracion"]["nombre"] = "Administración";
    $menu_principal["administracion"]["url"] = "administracion/main/index.php";

    $menu_principal["administracion"]["submenu"]["temas"]["nombre"] = "Temas";     
    $menu_principal["administracion"]["submenu"]["temas"]["permiso"] = "SCR_TEMAS";  
    $menu_principal["administracion"]["submenu"]["temas"]["url"] = "../../administracion/temas/frm_tema.php";
    $menu_principal["administracion"]["submenu"]["temas"]["funcion_js"] = "iniciar_tab_tema()";
    $menu_principal["administracion"]["submenu"]["temas"]["archivo_js"] = "../../../web/js/administracion/tema.js";
    
    $menu_principal["administracion"]["submenu"]["usuarios"]["nombre"] = "Usuarios";     
    $menu_principal["administracion"]["submenu"]["usuarios"]["permiso"] = "SCR_USUARIOS";
    $menu_principal["administracion"]["submenu"]["usuarios"]["url"] = "../../administracion/usuarios/frm_usuario.php";
    $menu_principal["administracion"]["submenu"]["usuarios"]["funcion_js"] = "iniciar_tab_usuario()";
    $menu_principal["administracion"]["submenu"]["usuarios"]["archivo_js"] = "../../../web/js/administracion/usuario.js";                        
    
    $menu_principal["administracion"]["submenu"]["alumnos"]["nombre"] = "Alumnos";     
    $menu_principal["administracion"]["submenu"]["alumnos"]["permiso"] = "SCR_ALUMNOS";  
    $menu_principal["administracion"]["submenu"]["alumnos"]["url"] = "../../administracion/alumnos/frm_alumno.php";
    $menu_principal["administracion"]["submenu"]["alumnos"]["funcion_js"] = "iniciar_tab_alumno()";
    $menu_principal["administracion"]["submenu"]["alumnos"]["archivo_js"] = "../../../web/js/administracion/alumno.js";

    $menu_principal["administracion"]["submenu"]["profesor"]["nombre"] = "Profesores";     
    $menu_principal["administracion"]["submenu"]["profesor"]["permiso"] = "SCR_PROFESORES";  
    $menu_principal["administracion"]["submenu"]["profesor"]["url"] = "../../administracion/profesores/frm_profesor.php";
    $menu_principal["administracion"]["submenu"]["profesor"]["funcion_js"] = "iniciar_tab_profesor()";
    $menu_principal["administracion"]["submenu"]["profesor"]["archivo_js"] = "../../../web/js/administracion/profesor.js";

    $menu_principal["administracion"]["submenu"]["materia"]["nombre"] = "Materia";     
    $menu_principal["administracion"]["submenu"]["materia"]["permiso"] = "SCR_MATERIAS";  
    $menu_principal["administracion"]["submenu"]["materia"]["url"] = "../../administracion/materias/frm_materia.php";
    $menu_principal["administracion"]["submenu"]["materia"]["funcion_js"] = "iniciar_tab_materia()";
    $menu_principal["administracion"]["submenu"]["materia"]["archivo_js"] = "../../../web/js/administracion/materia.js";
                
    $menu_principal["inventario"]["nombre"] = "Inventario";
    $menu_principal["inventario"]["url"] = "inventario/main/index.php";
                
    $menu_principal["inventario"]["submenu"]["marcas"]["nombre"] = "Marcas";     
    $menu_principal["inventario"]["submenu"]["marcas"]["permiso"] = "SCR_MARCAS";  
    $menu_principal["inventario"]["submenu"]["marcas"]["url"] = "../../inventario/marcas/frm_marca.php";
    $menu_principal["inventario"]["submenu"]["marcas"]["funcion_js"] = "iniciar_tab_marca()";
    $menu_principal["inventario"]["submenu"]["marcas"]["archivo_js"] = "../../../web/js/inventario/marca.js";
    
    $menu_principal["inventario"]["submenu"]["tipo_equipo"]["nombre"] = "Tipo Equipo";     
    $menu_principal["inventario"]["submenu"]["tipo_equipo"]["permiso"] = "SCR_TIPO_EQUIPO";  
    $menu_principal["inventario"]["submenu"]["tipo_equipo"]["url"] = "../../inventario/tipo_equipo/frm_tipo_equipo.php";
    $menu_principal["inventario"]["submenu"]["tipo_equipo"]["funcion_js"] = "iniciar_tab_tipo_equipo()";
    $menu_principal["inventario"]["submenu"]["tipo_equipo"]["archivo_js"] = "../../../web/js/inventario/tipo_equipo.js";
    
    $menu_principal["inventario"]["submenu"]["ubicacion"]["nombre"] = "Ubicaciones";     
    $menu_principal["inventario"]["submenu"]["ubicacion"]["permiso"] = "SCR_UBICACIONES";  
    $menu_principal["inventario"]["submenu"]["ubicacion"]["url"] = "../../inventario/ubicaciones/frm_ubicacion.php";
    $menu_principal["inventario"]["submenu"]["ubicacion"]["funcion_js"] = "iniciar_tab_ubicacion()";
    $menu_principal["inventario"]["submenu"]["ubicacion"]["archivo_js"] = "../../../web/js/inventario/ubicacion.js";
    
    $menu_principal["inventario"]["submenu"]["inventario"]["nombre"] = "Inventario";     
    $menu_principal["inventario"]["submenu"]["inventario"]["permiso"] = "SCR_INVENTARIO";  
    $menu_principal["inventario"]["submenu"]["inventario"]["url"] = "../../inventario/inventario/frm_inventario.php";
    $menu_principal["inventario"]["submenu"]["inventario"]["funcion_js"] = "iniciar_tab_inventario()";
    $menu_principal["inventario"]["submenu"]["inventario"]["archivo_js"] = "../../../web/js/inventario/inventario.js";
    
    $menu_principal["inventario"]["submenu"]["equipos"]["nombre"] = "Equipos";     
    $menu_principal["inventario"]["submenu"]["equipos"]["permiso"] = "SCR_EQUIPOS";  
    $menu_principal["inventario"]["submenu"]["equipos"]["url"] = "../../inventario/equipos/frm_equipo.php";
    $menu_principal["inventario"]["submenu"]["equipos"]["funcion_js"] = "iniciar_tab_equipo()";
    $menu_principal["inventario"]["submenu"]["equipos"]["archivo_js"] = "../../../web/js/inventario/equipo.js";
    
    $menu_principal["inventario"]["submenu"]["conteos"]["nombre"] = "Conteo";     
    $menu_principal["inventario"]["submenu"]["conteos"]["permiso"] = "SCR_CONTEOS";  
    $menu_principal["inventario"]["submenu"]["conteos"]["url"] = "../../inventario/conteos/frm_conteo.php";
    $menu_principal["inventario"]["submenu"]["conteos"]["funcion_js"] = "iniciar_tab_conteo()";
    $menu_principal["inventario"]["submenu"]["conteos"]["archivo_js"] = "../../../web/js/inventario/conteo.js";
    
	$menu_principal["inventario"]["submenu"]["prestamos"]["nombre"] = "Prestamos";     
    $menu_principal["inventario"]["submenu"]["prestamos"]["permiso"] = "SCR_PRESTAMOS";  
    $menu_principal["inventario"]["submenu"]["prestamos"]["url"] = "../../inventario/prestamos/frm_prestamo.php";
    $menu_principal["inventario"]["submenu"]["prestamos"]["funcion_js"] = "iniciar_tab_prestamo()";
    $menu_principal["inventario"]["submenu"]["prestamos"]["archivo_js"] = "../../../web/js/inventario/prestamo.js";

    $menu_principal["registro"]["nombre"] = "Registro";
    $menu_principal["registro"]["url"] = "registro/main/index.php";
    
    $menu_principal["registro"]["submenu"]["servicio"]["nombre"] = "Servicio Social";     
    $menu_principal["registro"]["submenu"]["servicio"]["permiso"] = "SCR_REGISTRO_SERVICIO";
    $menu_principal["registro"]["submenu"]["servicio"]["url"] = "../../registro/registro_servicio/frm_registro_servicio.php";
    $menu_principal["registro"]["submenu"]["servicio"]["funcion_js"] = "iniciar_tab_registro_servicio()";
    $menu_principal["registro"]["submenu"]["servicio"]["archivo_js"] = "../../../web/js/registro/registro_servicio.js";
		
	$menu_principal["registro"]["submenu"]["clases"]["nombre"] = "Clases";     
    $menu_principal["registro"]["submenu"]["clases"]["permiso"] = "SCR_REGISTRO_CLASES";
    $menu_principal["registro"]["submenu"]["clases"]["url"] = "../../registro/clases/frm_clases.php";
    $menu_principal["registro"]["submenu"]["clases"]["funcion_js"] = "iniciar_tab_clases()";
    $menu_principal["registro"]["submenu"]["clases"]["archivo_js"] = "../../../web/js/registro/clases.js";

   	$menu_principal["registro"]["submenu"]["alumnos"]["nombre"] = "Registro alumnos";     
    $menu_principal["registro"]["submenu"]["alumnos"]["permiso"] = "SCR_REGISTRO_ALUMNOS";
    $menu_principal["registro"]["submenu"]["alumnos"]["url"] = "../../registro/registro_alumnos/frm_registro_alumnos.php";
    $menu_principal["registro"]["submenu"]["alumnos"]["funcion_js"] = "iniciar_tab_registro_alumnos()";
    $menu_principal["registro"]["submenu"]["alumnos"]["archivo_js"] = "../../../web/js/registro/registro_alumnos.js";


	$menu_principal["practicas"]["nombre"] = "Practicas";
    $menu_principal["practicas"]["url"] = "practicas/main/index.php";
    
    $menu_principal["practicas"]["submenu"]["practicas"]["nombre"] = "Practicas";     
    $menu_principal["practicas"]["submenu"]["practicas"]["permiso"] = "SCR_PRACTICAS";
    $menu_principal["practicas"]["submenu"]["practicas"]["url"] = "../../practicas/practicas/frm_practica.php";
    $menu_principal["practicas"]["submenu"]["practicas"]["funcion_js"] = "";
    $menu_principal["practicas"]["submenu"]["practicas"]["archivo_js"] = "../../../web/js/practicas/practica.js";
		
	$menu_principal["practicas"]["submenu"]["horarios"]["nombre"] = "Horarios";     
    $menu_principal["practicas"]["submenu"]["horarios"]["permiso"] = "SCR_HORARIOS";
    $menu_principal["practicas"]["submenu"]["horarios"]["url"] = "../../practicas/horarios/frm_horario.php";
    $menu_principal["practicas"]["submenu"]["horarios"]["funcion_js"] = "iniciar_tab_horarios()";
    $menu_principal["practicas"]["submenu"]["horarios"]["archivo_js"] = "../../../web/js/practicas/horario.js";



    $menu_principal["opciones"]["nombre"] = "Opciones";
    $menu_principal["opciones"]["url"] = "opciones/main/index.php";
    
    $menu_principal["opciones"]["submenu"]["clientes"]["nombre"] = "Cambiar password";     
    $menu_principal["opciones"]["submenu"]["clientes"]["permiso"] = "SCR_CAMBIAR_PASSWORD";
    $menu_principal["opciones"]["submenu"]["clientes"]["url"] = "../../opciones/cambiar_password/frm_cambiar_password.php";
    $menu_principal["opciones"]["submenu"]["clientes"]["funcion_js"] = "";
    $menu_principal["opciones"]["submenu"]["clientes"]["archivo_js"] = "../../../web/js/opciones/cambiar_password.js";
    
	

	
    
   /* 
   
       $menu_principal["reportes"]["nombre"] = "Reportes";
    $menu_principal["reportes"]["url"] = "opciones/main/index.php";
    


    $menu_principal["reportes"]["submenu"]["expedientes"]["nombre"] = "Expedientes";     
    $menu_principal["reportes"]["submenu"]["expedientes"]["permiso"] = "SCR_EXPEDIENTES";
    $menu_principal["reportes"]["submenu"]["expedientes"]["url"] = "../../reportes/expedientes/frm_expedientes.php";
    $menu_principal["reportes"]["submenu"]["expedientes"]["funcion_js"] = "";
    $menu_principal["reportes"]["submenu"]["expedientes"]["archivo_js"] = "";
    
   $menu_principal["reportes"]["nombre"] = "Reportes";
    $menu_principal["reportes"]["url"] = "reportes/main/index.php";
    
    $menu_principal["reportes"]["submenu"]["dias_asistencia"]["nombre"] = "Clientes";     
    $menu_principal["reportes"]["submenu"]["dias_asistencia"]["permiso"] = "SCR_IMPRESION_CODIGOS";
    $menu_principal["reportes"]["submenu"]["dias_asistencia"]["url"] = "../../reportes/generales/frm_dias_asistencia.php";
    $menu_principal["reportes"]["submenu"]["dias_asistencia"]["funcion_js"] = "iniciar_tab_dias_asistencia();";
    
     */   

?>
