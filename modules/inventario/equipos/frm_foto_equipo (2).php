<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_equipo.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_equipo.php");		
    
    $btn_guardar_equipo=new Boton("btn_guardar_equipo","Guardar","guardar_foto_equipo()","75px",true);
           
    $obj_equipo = new Equipo();
    $obj_equipo->id_equipo = $_GET["id_equipo"];
    $obj_equipo->cargarPorId();
        
    $arr_parametros = array("id_equipo" =>  $_GET["id_equipo"] );
    $ruta_foto = (file_exists("../../../web/uploads/equipos/{$obj_equipo->id_equipo}.jpg"))?"../../../web/uploads/equipos/{$obj_equipo->id_equipo}.jpg?x=".rand(1,1000000) :"../../../web/images/generales/equipo.jpg";	        
    
?>
<form id="frm_foto_equipo" name="frm_foto_equipo" action="../equipos/acc_equipo.php" method="post"  enctype="multipart/form-data">

    <input type="hidden" name="hdn_foto_equipo_id_equipo" id="hdn_foto_equipo_id_equipo" value="<?php echo $obj_equipo->id_equipo; ?>" />
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="40%" />
            <col width="60%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                equipo
            </td>    
        </tr>        

        <tr>
             <td colspan="2" align="center">

		<?php echo utf8_encode( "{$obj_equipo->nombre}");  ?>
            </td>
        </tr>   
        <tr>
            <td colspan="2">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <img src="<?php echo $ruta_foto ?>" width="400" height="300"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>Archivo Foto (*.jpg)</td>
            <td><input type="file" name="file_foto_equipo" id="file_foto_equipo" extensiones_permitidas="jpg" obligatorio="true"/></td>
        </tr>
        
        <tr>
        	<td colspan="2" align="right">            
            	<?php echo $btn_guardar_equipo ?>
            </td>
                
            
        </tr> 
    </table>
</form>