<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_practica.php");
include("../../../classes/cls_materia.php");
include("../../../classes/cls_mensaje.php");
include("../../../classes/cls_permiso.php");
include("../../../classes/cls_profesor.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_combo.php");
include("../../../lib/ui/cls_checkbox.php");

$obj_session=new Session();
switch($_POST['_accion'])
{

   case "cmb_materia": 
        $obj_materia=new Materia();   
        $obj_materia->cargar();                    
        array_unshift($obj_materia->_datos,array("materia"=>"Seleccione una opci&oacute;n","id_materia"=>""  ));
        $cmb_materia = new Combo();        
        $cmb_materia->datos = $obj_materia->_datos;        
        $cmb_materia->campo_texto = "materia";
        $cmb_materia->campo_valor = "id_materia";
        $cmb_materia->valor_seleccionado = "";        
        echo $cmb_materia;    
    break;
    
	
	
	
	 case "cmb_practica_profesor": 	
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
	
	case "grd_practica":                          
        $obj_practica=new practica();
        $obj_practica->cargar_grid();            
        Grid::agregarColumna($obj_practica->_datos,"radio",'<input type="radio" name="rad_practica" id="rad_practica_?" value="?" />',array("id_practica","id_practica"));            
        $grd_practica=new Grid();
        $grd_practica->datos=$obj_practica->_datos;
        $grd_practica->campos=array("","materia","practica", "archivo", "profesor");
        $grd_practica->campos_excel=array("materia","practica", "archivo","profesor");             
        $grd_practica->width_columnas=array("10%","26%","27%","10%","27%");
        $grd_practica->width="750px";
        $grd_practica->orden_columnas=array("radio","materia","practica", "archivo","profesor");
        $grd_practica->orden_columnas_excel=array("materia","practica", "archivo","profesor");
        $grd_practica->propiedad_renglon='onclick="$(\'#rad_practica_?\').attr(\'checked\', true);" style="cursor:pointer"';
        $grd_practica->parametros_renglon=array("id_practica");
        $grd_practica->caracter_sustitucion="?";           
        $grd_practica->ordenacion=array("","materia","practica","archivo","profesor");
        $grd_practica->filtros=array("materia","practica","archivo","profesor");
        $grd_practica->maxlength=array("0","0","0","0","0");       
        $grd_practica->mensaje ="No se encontraron practicas";
        echo $grd_practica;
	break;

}
?>