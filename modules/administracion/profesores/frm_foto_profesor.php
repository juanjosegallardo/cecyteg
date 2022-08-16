<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_profesor.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_profesor.php");		
    
    $btn_guardar_profesor=new Boton("btn_guardar_profesor","Guardar","guardar_foto_profesor()","75px",true);
           
    $obj_profesor = new profesor();
    $obj_profesor->id_profesor = $_GET["id_profesor"];
    $obj_profesor->cargarPorId();
        
    $arr_parametros = array("id_profesor" =>  $_GET["id_profesor"] );
    $ruta_foto = (file_exists("../../../web/uploads/profesors/{$obj_profesor->id_profesor}.jpg"))?"../../../web/uploads/profesors/{$obj_profesor->id_profesor}.jpg?x=".rand(1,1000000) :"../../../web/images/generales/usuario.jpg";	        
    
?>
<form id="frm_foto_profesor" name="frm_foto_profesor" action="../profesors/acc_profesor.php" method="post"  enctype="multipart/form-data">

    <input type="hidden" name="hdn_foto_profesor_id_profesor" id="hdn_foto_profesor_id_profesor" value="<?php echo $obj_profesor->id_profesor; ?>" />
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="40%" />
            <col width="60%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                profesor
            </td>    
        </tr>        

        <tr>
             <td colspan="2" align="center">

		<?php echo utf8_encode( "{$obj_profesor->nombre} {$obj_profesor->apellido_paterno} {$obj_profesor->apellido_paterno}");  ?>
            </td>
        </tr>   
        <tr>
            <td colspan="2">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <img src="<?php echo $ruta_foto ?>" />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>Archivo Foto (*.jpg)</td>
            <td><input type="file" name="file_foto_profesor" id="file_foto_profesor" extensiones_permitidas="jpg" obligatorio="true"/></td>
        </tr>
        
        <tr>
        	<td colspan="2" align="right">            
            	<?php echo $btn_guardar_profesor ?>
            </td>
                
            
        </tr> 
    </table>
</form>