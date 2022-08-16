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
				<div class="grid_server" id="grd_profesor" ruta="../profesores/prp_profesor.php"></div><br />            
        </td>
        
    </tr>
    <tr>
    	<td align="right">
	       	<input type="button" class="boton" value="Nuevo" onclick="mostrar_sincrono('../profesores/frm_nuevo_profesor.php','div_profesor');iniciar_formulario('frm_nuevo_profesor');" id="btn_nuevo_profesor" />
            <input type="button" id="btn_modificar_profesor" value="Modificar" class="boton" onclick="cargar_registro('../profesores/frm_modificar_profesor.php', 'id_profesor', 'rad_profesor','div_profesor','frm_modificar_profesor');" />
            <input type="button" id="btn_abrir_profesor" value="Abrir" class="boton" onclick="cargar_registro('../profesores/frm_abrir_profesor.php', 'id_profesor', 'rad_profesor','div_profesor','frm_modificar_profesor');" />
            <!-- </a><input type="button" id="btn_foto_profesor" value="Foto" class="boton" onclick="cargar_registro('../profesores/frm_foto_profesor.php', 'id_profesor', 'rad_profesor','div_profesor','frm_foto_profesor');" /> -->            
	   </td>
    </tr>
</table>
<br />
<div id="div_profesor" align="center"></div>