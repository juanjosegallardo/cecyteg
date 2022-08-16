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
			<form action="" method="post" name="frm_registro_servcio"  id="frm_registro_servcio">
				N&uacute;mero de control: <input id="txt_numero_control" name="txt_numero_control" type="text" value="" />
                <input type="hidden" name="_accion"  id="_accion" value="guardar_registro" /><br />
                <br />
                <label style="font-size: 20px; font-weight: bold;" id="mensaje_reloj"></label>
                <br /><br />
                <div id="mensaje_registro_servicio"></div>
                
            </form>
        </td>
        
    </tr>
</table>
<br />
<div id="div_usuario" align="center"></div>