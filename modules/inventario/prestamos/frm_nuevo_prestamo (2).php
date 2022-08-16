<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_prestamo.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_prestamo.php");		
    
	$btn_guardar_prestamo=new Boton("btn_guardar_prestamo","Guardar","guardar_prestamo()","75px",true);
            
    $obj_formulario = new Formulario();
    $obj_formulario->pantalla = $pantalla_prestamo;    
?>
<form id="frm_nuevo_prestamo" name="frm_nuevo_prestamo" action="../prestamos/acc_prestamo.php" method="post">
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="50%" />
            <col width="50%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                Prestamo
            </td>    
        </tr>        
        <?php foreach($pantalla_prestamo as $componente => $valor): ?>
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
            	<?php echo $btn_guardar_prestamo ?>
            </td>
        </tr> 
    </table>
</form>