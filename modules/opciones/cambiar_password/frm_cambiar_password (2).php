<?php
    include_once("../../../config.php");  
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_mensaje.php");        
    include("../../../lib/ui/cls_boton.php");
    include("dic_cambiar_password.php");		
    
    $btn_cambiar_password=new Boton("btn_cambiar_password","Guardar","cambiar_password()","75px",true);
           
    $obj_formulario = new Formulario();    
    $obj_formulario->pantalla = $pantalla_usuario;
    
?>
<form id="frm_cambiar_password" name="frm_cambiar_password" action="../cambiar_password/acc_cambiar_password.php" method="post">
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
            	<?php echo $btn_cambiar_password ?>
            </td>
        </tr> 
    </table>
</form>