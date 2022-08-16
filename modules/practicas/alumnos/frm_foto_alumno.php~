<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_alumno.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_alumno.php");		
    
    $btn_guardar_alumno=new Boton("btn_guardar_alumno","Guardar","guardar_foto_alumno()","75px",true);
           
    $obj_alumno = new Alumno();
    $obj_alumno->id_alumno = $_GET["id_alumno"];
    $obj_alumno->cargarPorId();
        
    $arr_parametros = array("id_alumno" =>  $_GET["id_alumno"] );
$ruta_foto = "../../../web/uploads/alumnos/{$obj_alumno->id_alumno}.jpg" ;
// $ruta_foto = (file_exists("../../../web/uploads/alumnos/{$obj_alumno->id_alumno}.jpg"))?"../../../web/uploads/alumnos/{$obj_alumno->id_alumno}.jpg?x=".rand(1,1000000) :"../../../web/images/generales/usuario.jpg";	        
    
?>
<form id="frm_foto_alumno" name="frm_foto_alumno" action="../alumnos/acc_alumno.php" method="post"  enctype="multipart/form-data">

    <input type="hidden" name="hdn_foto_alumno_id_alumno" id="hdn_foto_alumno_id_alumno" value="<?php echo $obj_alumno->id_alumno; ?>" />
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="40%" />
            <col width="60%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                alumno
            </td>    
        </tr>        

        <tr>
             <td colspan="2" align="center">

		<?php echo utf8_encode( "{$obj_alumno->nombre} ");  ?>
            </td>
        </tr>   
        <tr>
            <td colspan="2">&nbsp;
                
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <img src="<?php echo $ruta_foto ?>" />
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;
                
            </td>
        </tr>
        <tr>
            <td>Archivo Foto (*.jpg)</td>
            <td><input type="file" name="file_foto_alumno" id="file_foto_alumno" extensiones_permitidas="jpg" obligatorio="true"/></td>
        </tr>
        
        <tr>
        	<td colspan="2" align="right">            
            	<?php echo $btn_guardar_alumno ?>
            </td>
                
            
        </tr> 
    </table>
</form>
