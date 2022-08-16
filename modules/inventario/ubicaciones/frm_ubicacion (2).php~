<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_mensaje.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_tab.php");
include("../../../lib/generales/cls_session.php");

?>
<table>
    <tr>    
        <td align="center">
            <br />
			<form action="" method="post" >
				<div class="grid_server" id="grd_ubicacion" ruta="../ubicaciones/prp_ubicacion.php"></div><br />
            </form>
        </td>
        
    </tr>
    <tr>
    	<td align="right">
	       	<input type="button" class="boton" value="Nuevo" onclick="mostrar_sincrono('../ubicaciones/frm_nuevo_ubicacion.php','div_ubicacion');iniciar_formulario('frm_nuevo_ubicacion');" id="btn_nuevo_ubicacion" />
            <input type="button" id="btn_modificar_ubicacion" value="Modificar" class="boton" onclick="cargar_registro('../ubicaciones/frm_modificar_ubicacion.php', 'id_ubicacion', 'rad_ubicacion','div_ubicacion','frm_modificar_ubicacion');" />
            <input type="button" id="btn_abrir_ubicacion" value="Abrir" class="boton" onclick="cargar_registro('../ubicaciones/frm_abrir_ubicacion.php', 'id_ubicacion', 'rad_ubicacion','div_ubicacion','frm_modificar_ubicacion');" />

            <input type="button" id="btn_abrir_ubicacion" value="Inventario" class="boton" onclick="cargar_registro('../ubicaciones/frm_inventario.php', 'id_ubicacion', 'rad_ubicacion','div_ubicacion','frm_inventario');iniciar_ubicar_inventario()" />
	   </td>
    </tr>
</table>
<br />
<div id="div_ubicacion" align="center"></div>
