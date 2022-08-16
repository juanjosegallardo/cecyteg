<?php
    include_once("../../../config.php");  
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_conteo.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_conteo.php");		
    
    $btn_guardar_conteo=new Boton("btn_guardar_conteo","Guardar","modificar_conteo()","75px",true);
           
    $obj_conteo = new conteo();
    $obj_conteo->id_conteo = $_GET["id_conteo"];
    $obj_conteo->cargarPorId(); 
        
    $arr_parametros = array("id_conteo" =>  $_GET["id_conteo"] );	        
    $obj_formulario = new Formulario();    
    $obj_formulario->pantalla = $pantalla_conteo;
    $obj_formulario->agregar_parametros($arr_parametros);
    $obj_formulario->cargar($obj_conteo);
    
?>
<form id="frm_modificar_conteo" name="frm_modificar_conteo" action="../conteos/acc_conteo.php" method="post">
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="50%" />
            <col width="50%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                conteo
            </td>    
        </tr>        
        <?php foreach($pantalla_conteo as $componente => $valor): ?>
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
            	<?php echo $btn_guardar_conteo ?>
            </td>
        </tr> 
    </table>
</form>