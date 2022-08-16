<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_mensaje.php");
    include("../../../lib/ui/cls_boton.php");
    
	$btn_generar_reporte=new Boton("btn_guardar_alumno","Generar","generar_expediente()","75px",true);
            


?>
<form >
    <table class="ui-widget ui-widget-content ui-corner-all ventana">
        <colgroup>
            <col width="50%" />
            <col width="50%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                alumno
            </td>    
        </tr>        
        <tr>
            <td>    
                Nombre de equipo
            </td>
            <td>
            </td>
        </tr>
        <tr>
        	<td colspan="2" align="right">            
            	<?php echo $btn_generar_reporte ?>
            </td>
        </tr> 
    </table>
</form>