<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
    include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_inventario.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_inventario.php");		
    
    $btn_guardar_inventario=new Boton("btn_modificar_inventario","Borrar","borrar_inventario()","75px",true);
        
    $obj_inventario = new Inventario();
    $obj_inventario->id_inventario = $_GET["id_inventario"];
    $obj_inventario->cargarPorId();
    	        
    $arr_parametros = array("id_inventario" =>  $_GET["id_inventario"] );	  
    $obj_formulario = new Formulario();
    $obj_formulario->pantalla = $pantalla_inventario;
    $obj_formulario->agregar_parametros($arr_parametros);
    $obj_formulario->cargar($obj_inventario);
    $obj_formulario->deshabilitar();
?>
<form id="frm_abrir_inventario" name="frm_abrir_inventario" action="../inventario/acc_inventario.php" method="post">
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="50%" />
            <col width="50%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                inventario
            </td>    
        </tr>        
        <?php foreach($pantalla_inventario as $componente => $valor): ?>
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
            	<?php echo $btn_guardar_inventario ?>
            </td>
        </tr> 
    </table>
</form>