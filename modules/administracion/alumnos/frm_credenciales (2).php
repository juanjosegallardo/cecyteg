<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_alumno.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_alumno.php");		
    
	$btn_guardar_alumno=new Boton("btn_generar_credenciales","Generar","$('#frm_credenciales').submit()","75px",true);
            
    $obj_formulario = new Formulario();
    $obj_formulario->pantalla = $pantalla_alumno;    
?>
<form id="frm_credenciales" name="frm_credenciales" action="../alumnos/pdf_credenciales.php" method="post">
    <table class="ui-widget ui-widget-content ui-corner-all ventana">
        <colgroup>
            <col width="50%" />
            <col width="50%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                credenciales
            </td>    
        </tr>        
       	<tr>	
		<td>
			grupo
		</td>

		<td>
			<input type="text" id="txt_grupo" name="txt_grupo" />

		</td>
	</tr>
        <tr>
        	<td colspan="2" align="right">            
            	<?php echo $btn_guardar_alumno ?>
            </td>
        </tr> 
    </table>
</form>
