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
				<div class="grid_server" id="grd_prestamo" ruta="../prestamos/prp_prestamo.php"></div><br />
            </form>
        </td>
        
    </tr>
    <tr>
    	<td align="right">
	       	<input type="button" class="boton" value="Nuevo" onclick="mostrar_sincrono('../prestamos/frm_nuevo_prestamo.php','div_prestamo');iniciar_formulario('frm_nuevo_prestamo');iniciar_nuevo_prestamo()" id="btn_nuevo_prestamo" />
	       	<input type="button" id="btn_abrir_prestamo" value="Abrir" class="boton" onclick="cargar_registro('../prestamos/frm_abrir_prestamo.php', 'id_prestamo', 'rad_prestamo','div_prestamo','frm_modificar_prestamo');" />
	   </td>
    </tr>
</table>
<br />
<div id="div_prestamo" align="center"></div>
