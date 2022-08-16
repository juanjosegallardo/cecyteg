<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_clase.php");
include("../../../classes/cls_dia.php");
include("../../../classes/cls_hora.php");
include("../../../classes/cls_aula.php"); 
include("../../../classes/cls_grupo.php");
include("../../../classes/cls_materia.php");
include("../../../classes/cls_practica.php");
include("../../../classes/cls_profesor.php");
include("../../../classes/cls_permiso.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_combo.php");
include("../../../lib/ui/cls_checkbox.php");

$obj_session=new Session();
switch($_POST['_accion'])
{

	case "json_dias_semana":  
		$arr_dias=array();
		$semana = $_POST["semana"];
		$arr_dias[]= date("Y-m-d", strtotime ("monday this week ".(($semana>0)?"+ ":"- ") . abs($semana) . " weeks")); 
		$arr_dias[]= date("Y-m-d", strtotime ("monday this week " .(($semana>0)?"+ ":"- ") . abs($semana) . " weeks + 1 days")); 	
		$arr_dias[]= date("Y-m-d", strtotime ("monday this week " .(($semana>0)?"+ ":"- ") . abs($semana) . " weeks + 2 days")); 
		$arr_dias[]= date("Y-m-d", strtotime ("monday this week " .(($semana>0)?"+ ":"- ") . abs($semana) . " weeks + 3 days")); 
		$arr_dias[]= date("Y-m-d", strtotime ("monday this week " .(($semana>0)?"+ ":"- ") . abs($semana) . " weeks + 4 days")); 
		echo json_encode($arr_dias);
	break;  
	
	
	case "json_clases":  
        $obj_clase= new Clase();
        $obj_clase->cargarPorFechaAula($_POST["fecha_inicio"],$_POST["fecha_fin"],$_POST["aula"]);
        echo $obj_clase->getJSON(array("tbl_aula_id_aula","fecha","hora_entrada","nombre", "materia", "grupo","id_clase","duracion","modulos"));
        
	break; 
	
	case "json_similares":  
        $obj_clase= new Clase();
        $obj_clase->tbl_aula_id_aula=$_POST["hdn_horario_id_aula"];
		$obj_clase->fecha_hora=$_POST["horario_fecha_hora"];
		$obj_clase->cargarSimilar();
        echo $obj_clase->getJSON(array("tbl_aula_id_aula","tbl_practica_id_practica","fecha_hora","tbl_grupo_id_grupo", "duracion","tbl_materia_id_materia","tbl_profesor_id_profesor","tbl_practica_id_practica"));
        
	break; 
	
	case "cmb_grupo": 
	
		$obj_grupo = new Grupo();
		$obj_grupo->cargar();		                   
        array_unshift($obj_grupo->_datos,array("grupo"=>"Seleccione una opci&oacute;n","id_grupo"=>""  ));
        $cmb_grupo = new Combo();   
        $cmb_grupo->datos = $obj_grupo->_datos;        
        $cmb_grupo->campo_texto = "grupo";
        $cmb_grupo->campo_valor = "id_grupo";
        $cmb_grupo->valor_seleccionado = "";        
        echo $cmb_grupo;    
    break;
	
	case "cmb_materia": 
	
		$obj_materia = new Materia();
		$obj_materia->cargar();		                   
        array_unshift($obj_materia->_datos,array("materia"=>"Seleccione una opci&oacute;n","id_materia"=>""  ));
        $cmb_materia = new Combo();   
        $cmb_materia->datos = $obj_materia->_datos;        
        $cmb_materia->campo_texto = "materia";
        $cmb_materia->campo_valor = "id_materia";
        $cmb_materia->valor_seleccionado = "";        
        echo $cmb_materia;    
    break;
    
	
	case "cmb_practica": 	
		$obj_practica = new Practica();

		$obj_practica->tbl_materia_id_materia = (isset( $_POST["tbl_materia_id_materia"]))? $_POST["tbl_materia_id_materia"]:"";
		$obj_practica->tbl_profesor_id_profesor = (isset( $_POST["tbl_profesor_id_profesor"]))? $_POST["tbl_profesor_id_profesor"]:"";
		$obj_practica->cargarPorMateriaProfesor();			                   
        array_unshift($obj_practica->_datos,array("practica"=>"Seleccione una opci&oacute;n","id_practica"=>""  ));
        $cmb_practica = new Combo();   
	
        $cmb_practica->datos = $obj_practica->_datos;        
        $cmb_practica->campo_texto = "practica";
        $cmb_practica->campo_valor = "id_practica";
        $cmb_practica->valor_seleccionado = "";        
        echo $cmb_practica;    
    break;
	
		

  
  case "cmb_profesor": 	
		$obj_profesor = new Profesor();
		$obj_profesor->cargarGrid();		
			                   
        array_unshift($obj_profesor->_datos,array("nombre"=>"Seleccione una opci&oacute;n","id_profesor"=>""  ));
        
		$cmb_profesor = new Combo();   
	
        $cmb_profesor->datos = $obj_profesor->_datos;        
        $cmb_profesor->campo_texto = "nombre";
        $cmb_profesor->campo_valor = "id_profesor";
        $cmb_profesor->valor_seleccionado = "";        
        echo $cmb_profesor;    
    break;
	
	  case "cmb_modulos": 	
		$datos= array();
			                   
        array_push($datos,array("cantidad"=>"1"  ));
		array_push($datos,array("cantidad"=>"2"  ));
		array_push($datos,array("cantidad"=>"3"  ));
        
		$cmb_modulos = new Combo();   
	
        $cmb_modulos->datos = $datos;        
        $cmb_modulos->campo_texto = "cantidad";
        $cmb_modulos->campo_valor = "cantidad";
        $cmb_modulos->valor_seleccionado = "";        
        echo $cmb_modulos;    
    break;
}
?>
