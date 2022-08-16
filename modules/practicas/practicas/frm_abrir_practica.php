<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
    include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_practica.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_practica.php");		
    
    $btn_guardar_practica=new Boton("btn_modificar_practica","Borrar","borrar_practica()","75px",true);
        
    $obj_practica = new practica();
    $obj_practica->id_practica = $_GET["id_practica"];
    $obj_practica->cargarPorId();
    	        
    $arr_parametros = array("id_practica" =>  $_GET["id_practica"] );	  
    $obj_formulario = new Formulario();
    $obj_formulario->pantalla = $pantalla_practica;
    $obj_formulario->agregar_parametros($arr_parametros);
    $obj_formulario->cargar($obj_practica);
    $obj_formulario->deshabilitar();
    
?>
<form id="frm_abrir_practica" name="frm_abrir_practica" action="../practicas/acc_practica.php" method="post">
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="50%" />
            <col width="50%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                Practica
            </td>    
        </tr>        
        <?php foreach($pantalla_practica as $componente => $valor): ?>
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
            	<?php echo $btn_guardar_practica ?>
            </td>
        </tr> 
    </table>
</form>