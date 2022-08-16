<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
    include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_conteo.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_conteo.php");		
           
    $obj_conteo = new conteo();
    $obj_conteo->id_conteo = $_GET["id_conteo"];
    $obj_conteo->cargarPorId();
    	        
    $arr_parametros = array("id_conteo" =>  $_GET["id_conteo"] );	  
    $obj_formulario = new Formulario();
    $obj_formulario->pantalla = $pantalla_conteo;
    $obj_formulario->agregar_parametros($arr_parametros);
    $obj_formulario->cargar($obj_conteo);
    $obj_formulario->deshabilitar();    
?>
<form id="frm_abrir_conteo" name="frm_abrir_conteo" action="../conteos/acc_conteo.php" method="post">
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
    </table>
</form>
<br />
<form id="frm_agregar_inventario" name="frm_agregar_inventario">
<table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="50%" />
            <col width="50%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                Inventario
            </td>    
        </tr>     
        <tr>
            <td colspan="2">
                <input type="hidden" id="hdn_id_conteo" name="hdn_id_conteo" value="<?php echo $_GET['id_conteo']; ?>"  />
                <input type="hidden" id="_accion" name="_accion" value="guardar_inventario_conteo"  />
            </td>        
        </tr>   
        <tr>
            <td>Numero de inventario: </td>
            <td><input type="text" id="txt_numero_inventario" name="txt_numero_inventario" /></td>        
        </tr>
        <tr>
            <td colspan="2"><label id="lbl_autocompletar_inventario"  for="chk_autocompletar">Autocompletar</label><input type="checkbox" id="chk_autocompletar" name="chk_autocompletar"/></label> </td>                 
        </tr>
        <tr>
            <td colspan="2">
                <div style="height: 100px;" id="div_inventario"><label id="lbl_inventario" style="font-weight: bold;"> </label></div>
            </td>
        </tr>
    </table>

</form>