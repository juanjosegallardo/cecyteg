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
				<div class="grid_server" id="grd_marca" ruta="../marcas/prp_marca.php"></div><br />
            </form>
        </td>
        
    </tr>
    <tr>
    	<td align="right">
	       	<input type="button" class="boton" value="Nuevo" onclick="mostrar_sincrono('../marcas/frm_nuevo_marca.php','div_marca');iniciar_formulario('frm_nuevo_marca');" id="btn_nuevo_marca" />
            <input type="button" id="btn_modificar_marca" value="Modificar" class="boton" onclick="cargar_registro('../marcas/frm_modificar_marca.php', 'id_marca', 'rad_marca','div_marca','frm_modificar_marca');" />
            <input type="button" id="btn_abrir_marca" value="Abrir" class="boton" onclick="cargar_registro('../marcas/frm_abrir_marca.php', 'id_marca', 'rad_marca','div_marca','frm_modificar_marca');" />
	   </td>
    </tr>
</table>
<br />
<div id="div_marca" align="center"></div>