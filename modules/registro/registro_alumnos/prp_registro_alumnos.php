<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_alumno.php");
include("../../../classes/cls_aula.php");
include("../../../classes/cls_clase.php");
include("../../../classes/cls_profesor.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_combo.php");
include("../../../lib/ui/cls_checkbox.php");

$obj_session=new Session();
switch($_REQUEST['_accion'])
{	

    case "json_alumnos":        
        $obj_alumno = new Alumno();                
        $obj_alumno->cargar_alumnos_grupo($_POST["nombre"],$_POST["grupo"]);
        echo $obj_alumno->getJSON(array("no_control","nombre"));   
    break;


    case "json_alumnos_aseo":        
        $obj_alumno = new Alumno();                
        $obj_alumno->cargar_alumnos_grupo_aseo($_POST["grupo"]);
        echo $obj_alumno->getJSON(array("id_alumno","nombre"));   
    break;
    
    case "sel_profesor": 
        $obj_profesor=new Profesor();   
        $obj_profesor->cargarGrid();                     
        array_unshift($obj_profesor->_datos,array("nombre"=>"Seleccione una opci&oacute;n","id_profesor"=>""  ));
        $cmb_profesor = new Combo();        
        $cmb_profesor->datos = $obj_profesor->_datos;        
        $cmb_profesor->campo_texto = "nombre";
        $cmb_profesor->campo_valor = "id_profesor";
        $cmb_profesor->valor_seleccionado = "";        
        echo $cmb_profesor;    
    break;
    
    case "cmb_aula":
    
        $obj_aula=new Aula();
        $obj_aula->cargar();
        array_unshift($obj_aula->_datos,array("nombre"=>"Seleccione una opci&oacute;n","id_aula"=>""  ));
        $cmb_aula=new Combo();
        $cmb_aula->datos= $obj_aula->_datos;
        $cmb_aula->campo_texto= "nombre";
        $cmb_aula->campo_valor="id_aula";
        $cmb_aula->valor_seleccionado="";
        echo $cmb_aula;
        
    break;
    
    case "cmb_clase":
    
        
        $obj_clase = new Clase();
        $id_aula = (isset($_POST["tbl_aula_id_aula"]))?$_POST["tbl_aula_id_aula"]:"";
        $obj_clase->cargarPorFechaAula(date("Y-m-d"),date("Y-m-d"), $id_aula  );
        
        array_unshift($obj_clase->_datos,array("resumen"=>"Seleccione una opci&oacute;n","id_clase"=>""  ));
        $cmb_clase= new Combo();
        $cmb_clase->datos= $obj_clase->_datos;
        $cmb_clase->campo_texto="resumen";
        $cmb_clase->campo_valor="id_clase";
        $cmb_clase->valor_seleccionado="";
        echo $cmb_clase;
    break;
    
    
}
?>
