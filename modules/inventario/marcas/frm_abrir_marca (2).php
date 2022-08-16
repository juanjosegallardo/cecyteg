<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
    include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_marca.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_marca.php");		
    
    $btn_guardar_marca=new Boton("btn_modificar_marca","Borrar","borrar_marca()","75px",true);
        
    $obj_marca = new marca();
    $obj_marca->id_marca = $_GET["id_marca"];
    $obj_marca->cargarPorId();
    	        
    $arr_parametros = array("id_marca" =>  $_GET["id_marca"] );	  
    $obj_formulario = new Formulario();
    $obj_formulario->pantalla = $pantalla_marca;
    $obj_formulario->agregar_parametros($arr_parametros);
    $obj_formulario->cargar($obj_marca);
    $obj_formulario->deshabilitar();
    
?>
<form id="frm_abrir_marca" name="frm_abrir_marca" action="../marcas/acc_marca.php" method="post">
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="50%" />
            <col width="50%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                Marca
            </td>    
        </tr>        
        <?php foreach($pantalla_marca as $componente => $valor): ?>
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
            	<?php echo $btn_guardar_marca ?>
            </td>
        </tr> 
    </table>
</form>