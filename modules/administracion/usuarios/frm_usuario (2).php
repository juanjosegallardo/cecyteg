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
				<div class="grid_server" id="grd_usuario" ruta="../usuarios/prp_usuario.php"></div><br />
            </form>
        </td>
        
    </tr>
    <tr>
    	<td align="right">
	       	<input type="button" class="boton" value="Nuevo" onclick="mostrar_sincrono('../usuarios/frm_nuevo_usuario.php','div_usuario');iniciar_formulario('frm_nuevo_usuario');" id="btn_nuevo_usuario" />
            <input type="button" id="btn_modificar_usuario" value="Modificar" class="boton" onclick="cargar_registro('../usuarios/frm_modificar_usuario.php', 'id_usuario', 'rad_usuario','div_usuario','frm_modificar_usuario');" />
            <input type="button" id="btn_abrir_usuario" value="Abrir" class="boton" onclick="cargar_registro('../usuarios/frm_abrir_usuario.php', 'id_usuario', 'rad_usuario','div_usuario','frm_modificar_usuario');" />
            <input type="button" id="btn_ver_password" value="Ver Password" class="boton" onclick="ver_password()" />
            <input type="button" id="btn_enviar_password" value="Enviar Password" class="boton" onclick="confirmar_enviar_password()" />
	   </td>
    </tr>
</table>
<br />
<div id="div_usuario" align="center"></div>