<?php
    include_once("../../../config.php");  
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_tipo_equipo.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_tipo_equipo.php");		
    
    $btn_guardar_tipo_equipo=new Boton("btn_guardar_tipo_equipo","Guardar","modificar_tipo_equipo()","75px",true);
           
    $obj_tipo_equipo = new TipoEquipo();
    $obj_tipo_equipo->id_tipo_equipo = $_GET["id_tipo_equipo"];
    $obj_tipo_equipo->cargarPorId();
        
    $arr_parametros = array("id_tipo_equipo" =>  $_GET["id_tipo_equipo"] );	        
    $obj_formulario = new Formulario();    
    $obj_formulario->pantalla = $pantalla_tipo_equipo;
    $obj_formulario->agregar_parametros($arr_parametros);
    $obj_formulario->cargar($obj_tipo_equipo);
    
?>
<form id="frm_modificar_tipo_equipo" name="frm_modificar_tipo_equipo" action="../tipo_equipo/acc_tipo_equipo.php" method="post">
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="50%" />
            <col width="50%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                tipo_equipo
            </td>    
        </tr>        
        <?php foreach($pantalla_tipo_equipo as $componente => $valor): ?>
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
            	<?php echo $btn_guardar_tipo_equipo ?>
            </td>
        </tr> 
    </table>
</form>