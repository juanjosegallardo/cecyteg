<?php
    include_once("../../../config.php");  
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_ubicacion.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_ubicacion.php");		
    
    $btn_guardar_ubicacion=new Boton("btn_guardar_ubicacion","Guardar","modificar_ubicacion()","75px",true);
           
    $obj_ubicacion = new ubicacion();
    $obj_ubicacion->id_ubicacion = $_GET["id_ubicacion"];
    $obj_ubicacion->cargarPorId();
        
    $arr_parametros = array("id_ubicacion" =>  $_GET["id_ubicacion"] );	        
    $obj_formulario = new Formulario();    
    $obj_formulario->pantalla = $pantalla_ubicacion;
    $obj_formulario->agregar_parametros($arr_parametros);
    $obj_formulario->cargar($obj_ubicacion);
    
?>
<form id="frm_modificar_ubicacion" name="frm_modificar_ubicacion" action="../ubicaciones/acc_ubicacion.php" method="post">
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="50%" />
            <col width="50%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                ubicacion
            </td>    
        </tr>        
        <?php foreach($pantalla_ubicacion as $componente => $valor): ?>
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
            	<?php echo $btn_guardar_ubicacion ?>
            </td>
        </tr> 
    </table>
</form>