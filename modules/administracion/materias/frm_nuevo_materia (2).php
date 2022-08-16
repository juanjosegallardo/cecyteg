<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_materia.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_materia.php");		
    
	$btn_guardar_materia=new Boton("btn_guardar_materia","Guardar","guardar_materia()","75px",true);
            
    $obj_formulario = new Formulario();
    $obj_formulario->pantalla = $pantalla_materia;    
?>
<form id="frm_nuevo_materia" name="frm_nuevo_materia" action="../materias/acc_materia.php" method="post">
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="50%" />
            <col width="50%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                materia
            </td>    
        </tr>        
        <?php foreach($pantalla_materia as $componente => $valor): ?>
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
            	<?php echo $btn_guardar_materia ?>
            </td>
        </tr> 
    </table>
</form>