<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_equipo.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_equipo.php");		
    
	$btn_guardar_equipo=new Boton("btn_guardar_equipo","Guardar","guardar_equipo()","75px",true);
            
    $obj_formulario = new Formulario();
    $obj_formulario->pantalla = $pantalla_equipo;    
?>
<form id="frm_nuevo_equipo" name="frm_nuevo_equipo" action="../equipos/acc_equipo.php" method="post">
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="50%" />
            <col width="50%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                equipo
            </td>    
        </tr>        
        <?php foreach($pantalla_equipo as $componente => $valor): ?>
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
            	<?php echo $btn_guardar_equipo ?>
            </td>
        </tr> 
    </table>
</form>