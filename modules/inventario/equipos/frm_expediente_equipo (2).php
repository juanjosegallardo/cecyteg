<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_equipo.php");
    include("../../../classes/cls_inventario.php");      
    include("../../../lib/ui/cls_boton.php");
    include("dic_equipo.php");		
    
           
    $obj_equipo = new Equipo();
    $obj_equipo->id_equipo = $_GET["id_equipo"];
    $obj_equipo->cargarPorId();
    
    $obj_inventario = new Inventario();
    $obj_inventario->tbl_ubicacion_id_ubicacion = $obj_equipo->tbl_ubicacion_id_ubicacion;
    $obj_inventario->cargarPorUbicacion();
    
    $btn_expediente_equipo=new Boton("btn_expediente_equipo","Generar","generar_expediente_equipo({$obj_equipo->id_equipo})","75px",true);
    
        
    $arr_parametros = array("id_equipo" =>  $_GET["id_equipo"] );
    $ruta_foto = (file_exists("../../../web/uploads/equipos/{$obj_equipo->id_equipo}.jpg"))?"../../../web/uploads/equipos/{$obj_equipo->id_equipo}.jpg?x=".rand(1,1000000) :"../../../web/images/generales/equipo.jpg";	        
    
?>
<form id="frm_expediente_equipo" name="frm_expediente_equipo" action="../equipos/pdf_expediente_equipo.php" method="post"   target="_blank">

    <input type="hidden" name="hdn_foto_equipo_id_equipo" id="hdn_foto_equipo_id_equipo" value="<?php echo $obj_equipo->id_equipo; ?>" />
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="40%" />
            <col width="60%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                equipo
            </td>    
        </tr>        
        <tr>
             <td colspan="2" align="center">
		         &nbsp;
            </td>
        </tr>  
        <tr>
             <td colspan="2" align="center">

		          Equipo: <b><?php echo utf8_encode( "{$obj_equipo->nombre}");  ?></b>
            </td>
        </tr>   
        <tr>
             <td colspan="2" align="center">
		         &nbsp;
            </td>
        </tr>  
        <?php foreach($obj_inventario->_datos as $componente): ?>
        <tr>
            <td align="right">
                <input type="checkbox" checked="checked" name="chk_inventario[]" id="chk_inventario_<?php echo $componente["tbl_tipo_equipo_id_tipo_equipo"]; ?>" value="<?php echo $componente["tbl_tipo_equipo_id_tipo_equipo"]; ?>"  /> 
            </td>
            <td>
               <label for="chk_inventario_<?php echo $componente["tbl_tipo_equipo_id_tipo_equipo"]; ?>"><?php echo $componente["tipo_equipo"]; ?></label>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="2">
                &nbsp;
            </td>
        </tr>
        
        
        <tr>
            <td colspan="2">
                &nbsp;
            </td>
        </tr>
        <tr>
        	<td colspan="2" align="right">            
            	<?php echo $btn_expediente_equipo ?>
            </td>
                
            
        </tr> 
    </table>
</form>