
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
				<div class="grid_server" id="grd_inventario" ruta="../inventario/prp_inventario.php"></div><br />
            </form>
        </td>
        
    </tr>
    <tr>
    	<td align="right">
	       	<input type="button" class="boton" value="Nuevo" onclick="mostrar_sincrono('../inventario/frm_nuevo_inventario.php','div_inventario');iniciar_formulario('frm_nuevo_inventario');" id="btn_nuevo_inventario" />
            <input type="button" id="btn_modificar_inventario" value="Modificar" class="boton" onclick="cargar_registro('../inventario/frm_modificar_inventario.php', 'id_inventario', 'rad_inventario','div_inventario','frm_modificar_inventario');" />
            <input type="button" id="btn_abrir_inventario" value="Abrir" class="boton" onclick="cargar_registro('../inventario/frm_abrir_inventario.php', 'id_inventario', 'rad_inventario','div_inventario','frm_modificar_inventario');" />
            <input type="button" id="btn_abrir_fotos" value="Fotos" class="boton" onclick="cargar_registro('../inventario/frm_abrir_fotos.php', 'id_inventario', 'rad_inventario','div_inventario','frm_modificar_inventario');" />            
            <input type="button" id="btn_abrir_fotos" value="Codigos" class="boton" onclick="window.open('../inventario/pdf_codigos.php')" />

            <input type="button" id="btn_abrir_fotos" value="Codigos SIAM" class="boton" onclick="window.open('../inventario/pdf_codigos_siam.php')" />
            <input type="button" id="btn_abrir_fotos" value="Expediente" class="boton" onclick="abrir_expediente_inventario()" />
	   </td>
    </tr>
</table>
<br />
<div id="div_inventario" align="center"></div>
