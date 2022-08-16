<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
    include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_equipo.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_equipo.php");		
    
    $btn_guardar_equipo=new Boton("btn_modificar_equipo","Borrar","borrar_equipo()","75px",true);
        
    $obj_equipo = new Equipo();
    $obj_equipo->id_equipo = $_GET["id_equipo"];
    $obj_equipo->cargarPorId();
    	        
    $arr_parametros = array("id_equipo" =>  $_GET["id_equipo"] );	  
    $obj_formulario = new Formulario();
    $obj_formulario->pantalla = $pantalla_equipo;
    $obj_formulario->agregar_parametros($arr_parametros);
    $obj_formulario->cargar($obj_equipo);
    $obj_formulario->deshabilitar();
    
?>
<form id="frm_abrir_equipo" name="frm_abrir_equipo" action="../equipos/acc_equipo.php" method="post">
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