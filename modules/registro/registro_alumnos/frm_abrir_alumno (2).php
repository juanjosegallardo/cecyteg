<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_alumno.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_alumno.php");		
    
	$btn_guardar_alumno=new Boton("btn_modificar_alumno","Borrar","borrar_alumno()","75px",true);
        
    $obj_alumno = new alumno();
    $obj_alumno->id_alumno = $_GET["id_alumno"];
    $obj_alumno->cargarPorId();
    	        
    $arr_parametros = array("id_alumno" =>  $_GET["id_alumno"] );	  
    $obj_formulario = new Formulario();
    $obj_formulario->pantalla = $pantalla_alumno;
    $obj_formulario->agregar_parametros($arr_parametros);
    $obj_formulario->cargar($obj_alumno);
    $obj_formulario->deshabilitar();
    
?>
<form id="frm_abrir_alumno" name="frm_abrir_alumno" action="../alumnos/acc_alumno.php" method="post">
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="50%" />
            <col width="50%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                alumno
            </td>    
        </tr>        
        <?php foreach($pantalla_alumno as $componente => $valor): ?>
        <tr>
             <td>
            	<?php echo $obj_formulario->generar_etiqueta($componente) ?>
             </td>
             <td>
            	<?php echo $obj_formulario->generar_componente($componente) ?>
            </td>
        </tr>         
        <?php endforeach; ?>
        <tr>
        	<td colspan="2" align="right">            
            	<?php echo $btn_guardar_alumno ?>
            </td>
        </tr> 
    </table>
</form>