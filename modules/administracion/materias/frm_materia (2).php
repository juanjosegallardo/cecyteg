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
				<div class="grid_server" id="grd_materia" ruta="../materias/prp_materia.php"></div><br />
            </form>
        </td>
        
    </tr>
    <tr>
    	<td align="right">
	       	<input type="button" class="boton" value="Nuevo" onclick="mostrar_sincrono('../materias/frm_nuevo_materia.php','div_materia');iniciar_formulario('frm_nuevo_materia');" id="btn_nuevo_materia" />
            <input type="button" id="btn_modificar_materia" value="Modificar" class="boton" onclick="cargar_registro('../materias/frm_modificar_materia.php', 'id_materia', 'rad_materia','div_materia','frm_modificar_materia');" />
            <input type="button" id="btn_abrir_materia" value="Abrir" class="boton" onclick="cargar_registro('../materias/frm_abrir_materia.php', 'id_materia', 'rad_materia','div_materia','frm_modificar_materia');" />
	   </td>
    </tr>
</table>
<br />
<div id="div_materia" align="center"></div>