<?php
	include_once("../../../config.php");  
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_usuario.php");     
    include("../../../classes/cls_configuracion.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_tema.php");		
    
	$btn_guardar_tema=new Boton("btn_guardar_tema","Guardar","modificar_tema()","75px",true);
	$btn_restaurar_tema=new Boton("btn_restaurar_tema","Restaurar","restaurar_tema()","75px",true);
    
	$obj_configuracion = new Configuracion();
	$obj_configuracion->cargarColorFondo();

    $obj_formulario = new Formulario();
    $obj_formulario->pantalla = $pantalla_tema; 
	$obj_formulario->cargar($obj_configuracion);   
?>
<form id="frm_modificar_tema" name="frm_modificar_tema" action="../temas/acc_tema.php" method="post">
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="50%" />
            <col width="50%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                Tema
            </td>    
        </tr>        
        <?php foreach($pantalla_tema as $componente => $valor): ?>
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
            <td colspan="2">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" align="left">
                Antes de cambiar de pesta&ntilde;a asegurese de guardar, si no desea perder los cambios
            </td>
        </tr>   
        <tr>
            <td colspan="2" align="left">
                &nbsp;
            </td>
        </tr> 
        <tr>
        	<td colspan="2" align="right">
                <?php echo $btn_restaurar_tema; ?>            
            	<?php echo $btn_guardar_tema; ?>
            </td>
        </tr> 
    </table>
</form>