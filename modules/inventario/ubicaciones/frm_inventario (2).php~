<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
    include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_ubicacion.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_ubicacion.php");		
    
          
    $obj_ubicacion = new ubicacion();
    $obj_ubicacion->id_ubicacion = $_GET["id_ubicacion"];
    $obj_ubicacion->cargarPorId();
    	        
    $arr_parametros = array("id_ubicacion" =>  $_GET["id_ubicacion"] );	  
    $obj_formulario = new Formulario();
    $obj_formulario->pantalla = $pantalla_ubicacion;
    $obj_formulario->agregar_parametros($arr_parametros);
    $obj_formulario->cargar($obj_ubicacion);
    $obj_formulario->deshabilitar();
    
?>
<form id="frm_ubicacion_inventario" name="frm_ubicacion_inventario" action="../ubicaciones/acc_ubicacion.php" method="post">
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
		<th colspan="2" align="center">
			Ingrese numeros de inventario
		</th>
	</tr>
	<tr>
		<td>
Numero de inventario:
		</td>
		<td>
			<input type="text" id="txt_no_inventario_ubicacion" name="txt_no_inventario_ubicacion" />
				
		</td>
	</tr>
        
	<tr>
		<td colspan="2" id="div_resultado_ubicacion" align="center">

			
		</td>
	</tr>   

    </table>
</form>
