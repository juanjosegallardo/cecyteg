<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_usuario.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_usuario.php");		
    
	$btn_guardar_usuario=new Boton("btn_guardar_usuario","Guardar","guardar_usuario()","75px",true);
            
    $obj_formulario = new Formulario();
    $obj_formulario->pantalla = $pantalla_usuario;    
?>
<form id="frm_nuevo_usuario" name="frm_nuevo_usuario" action="../usuarios/acc_usuario.php" method="post">
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="50%" />
            <col width="50%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                Usuario
            </td>    
        </tr>        
        <?php foreach($pantalla_usuario as $componente => $valor): ?>
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
            	<?php echo $btn_guardar_usuario ?>
            </td>
        </tr> 
    </table>
</form>