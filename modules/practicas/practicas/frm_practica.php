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
				<div class="grid_server" id="grd_practica" campo_ordenacion="materia" tipo_ordenacion="asc" ruta="../practicas/prp_practica.php"></div><br />
            </form>
        </td>
        
    </tr>
    <tr>
    	<td align="right">
	       	<input type="button" class="boton" value="Nuevo" onclick="mostrar_sincrono('../practicas/frm_nuevo_practica.php','div_practica');iniciar_formulario('frm_nuevo_practica');" id="btn_nuevo_practica" />
            <input type="button" id="btn_modificar_practica" value="Modificar" class="boton" onclick="cargar_registro('../practicas/frm_modificar_practica.php', 'id_practica', 'rad_practica','div_practica','frm_modificar_practica');" />
            <input type="button" id="btn_abrir_practica" value="Abrir" class="boton" onclick="cargar_registro('../practicas/frm_abrir_practica.php', 'id_practica', 'rad_practica','div_practica','frm_modificar_practica');" />
			<input type="button" id="btn_archivo_practica" value="Archivo" class="boton" onclick="cargar_registro('../practicas/frm_archivo_practica.php', 'id_practica', 'rad_practica','div_practica','frm_archivo_practica');" />
	   </td>
    </tr>
</table>
<br />
<div id="div_practica" align="center"></div>