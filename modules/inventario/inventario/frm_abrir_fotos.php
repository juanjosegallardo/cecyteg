<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
    include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_inventario.php");     
    include("../../../lib/ui/cls_boton.php");
    
    $btn_guardar_foto_inventario=new Boton("btn_guardar_foto_inventario","Guardar","guardar_foto_inventario()","75px",true);
       
    $obj_inventario = new Inventario();
    $obj_inventario->id_inventario = $_GET["id_inventario"];
    $obj_inventario->cargarPorId();
    
    
    $arr_fotos = glob("../../../web/uploads/inventario/{$obj_inventario->id_inventario}/*.jpg");
    
?>
<div id="div_fotos" style="display: none; width: 420px; height: 330px;"> </div>
<form id="frm_foto_inventario" name="frm_foto_inventario" action="../inventario/acc_inventario.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="hdn_foto_inventario_id_inventario" id="hdn_foto_inventario_id_inventario" value="<?php echo $obj_inventario->id_inventario; ?>" />
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="50%" />
            <col width="50%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                inventario
            </td>    
        </tr>        
        <tr>
            <td>
                No. Inventario
            </td>
            <td>
                <?php echo $obj_inventario->numero_inventario; ?>
            </td>
        </tr>
        
        <tr>
            <td>
                Tipo
            </td>
            <td>
                <?php echo $obj_inventario->tipo_equipo; ?>
            </td>
        </tr>
        
        <tr>
            <td>
                Modelo
            </td>
            <td>
                <?php echo $obj_inventario->modelo; ?>
            </td>
        </tr>
        
        <tr>
            <td>
                No. Serie
            </td>
            <td>
                <?php echo $obj_inventario->no_serie; ?>
            </td>
        </tr>
        <?php $no_foto=1; ?>
        <?php foreach($arr_fotos as $foto): ?>
        <tr>
            <td></td>
            <td><div style="cursor: pointer;text-decoration: underline;" onclick="mostrar_imagen('<?php echo $foto ?>')">Abrir Foto <?php echo $no_foto++ ?></div></td>
            
        
        </tr>
        <?php endforeach; ?>

        <tr>        
            
            <td>Archivo Foto (*.jpg)</td>
            <td><input type="file" name="file_foto_inventario" id="file_foto_inventario" extensiones_permitidas="jpg" obligatorio="true"/></td>

        </tr>

        <tr>
        	<td colspan="2" align="right">            
            	<?php echo $btn_guardar_foto_inventario ?>
            </td>
        </tr> 
    </table>
</form>