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
				<div class="grid_server" id="grd_alumno" ruta="../alumnos/prp_alumno.php"></div><br />            
        </td>
        
    </tr>
    <tr>
    	<td align="right">
	       	<input type="button" class="boton" value="Nuevo" onclick="mostrar_sincrono('../alumnos/frm_nuevo_alumno.php','div_alumno');iniciar_formulario('frm_nuevo_alumno');" id="btn_nuevo_alumno" />
            <input type="button" id="btn_modificar_alumno" value="Modificar" class="boton" onclick="cargar_registro('../alumnos/frm_modificar_alumno.php', 'id_alumno', 'rad_alumno','div_alumno','frm_modificar_alumno');" />
            <input type="button" id="btn_abrir_alumno" value="Abrir" class="boton" onclick="cargar_registro('../alumnos/frm_abrir_alumno.php', 'id_alumno', 'rad_alumno','div_alumno','frm_modificar_alumno');" />
            <input type="button" id="btn_foto_alumno" value="Foto" class="boton" onclick="cargar_registro('../alumnos/frm_foto_alumno.php', 'id_alumno', 'rad_alumno','div_alumno','frm_foto_alumno');" />            
	   </td>
    </tr>
</table>
<br />
<div id="div_alumno" align="center"></div>