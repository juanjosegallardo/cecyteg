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
				<div class="grid_server" id="grd_tipo_equipo" ruta="../tipo_equipo/prp_tipo_equipo.php"></div><br />
            </form>
        </td>
        
    </tr>
    <tr>
    	<td align="right">
	       	<input type="button" class="boton" value="Nuevo" onclick="mostrar_sincrono('../tipo_equipo/frm_nuevo_tipo_equipo.php','div_tipo_equipo');iniciar_formulario('frm_nuevo_tipo_equipo');" id="btn_nuevo_tipo_equipo" />
            <input type="button" id="btn_modificar_tipo_equipo" value="Modificar" class="boton" onclick="cargar_registro('../tipo_equipo/frm_modificar_tipo_equipo.php', 'id_tipo_equipo', 'rad_tipo_equipo','div_tipo_equipo','frm_modificar_tipo_equipo');" />
            <input type="button" id="btn_abrir_tipo_equipo" value="Abrir" class="boton" onclick="cargar_registro('../tipo_equipo/frm_abrir_tipo_equipo.php', 'id_tipo_equipo', 'rad_tipo_equipo','div_tipo_equipo','frm_modificar_tipo_equipo');" />
	   </td>
    </tr>
</table>
<br />
<div id="div_tipo_equipo" align="center"></div>