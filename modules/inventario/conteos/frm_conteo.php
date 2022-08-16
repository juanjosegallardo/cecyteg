
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
				<div class="grid_server" id="grd_conteo" ruta="../conteos/prp_conteo.php"></div><br />
            </form>
        </td>
        
    </tr>
    <tr>
    	<td align="right">
	       	<input type="button" class="boton" value="Nuevo" onclick="mostrar_sincrono('../conteos/frm_nuevo_conteo.php','div_conteo');iniciar_formulario('frm_nuevo_conteo');" id="btn_nuevo_conteo" />
            <input type="button" id="btn_modificar_conteo" value="Modificar" class="boton" onclick="cargar_registro('../conteos/frm_modificar_conteo.php', 'id_conteo', 'rad_conteo','div_conteo','frm_modificar_conteo');" />
            <input type="button" id="btn_abrir_conteo" value="Abrir" class="boton" onclick="cargar_registro('../conteos/frm_abrir_conteo.php', 'id_conteo', 'rad_conteo','div_conteo','frm_abrir|_conteo');" /> 
            <input type="button" id="btn_contar_conteo" value="Contar" class="boton" onclick="cargar_registro('../conteos/frm_contar.php', 'id_conteo', 'rad_conteo','div_conteo','frm_abrir_conteo');iniciar_div_conteo()" />                       
	   </td>
    </tr>
</table>
<br />
<div id="div_conteo" align="center"></div>