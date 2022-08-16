<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
    include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_usuario.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_usuario.php");		
    
    $btn_guardar_usuario=new Boton("btn_modificar_usuario","Borrar","borrar_usuario()","75px",true);
        
    $obj_usuario = new Usuario();
    $obj_usuario->id_usuario = $_GET["id_usuario"];
    $obj_usuario->cargarPorId();
    	        
    $arr_parametros = array("id_usuario" =>  $_GET["id_usuario"] );	  
    $obj_formulario = new Formulario();
    $obj_formulario->pantalla = $pantalla_usuario;
    $obj_formulario->agregar_parametros($arr_parametros);
    $obj_formulario->cargar($obj_usuario);
    $obj_formulario->deshabilitar();
    
?>
<form id="frm_abrir_usuario" name="frm_abrir_usuario" action="../usuarios/acc_usuario.php" method="post">
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