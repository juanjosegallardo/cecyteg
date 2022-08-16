<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
	include("../../../classes/cls_practica.php");
	include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_alumno.php");     
    include("../../../lib/ui/cls_boton.php");	
    
    $btn_guardar_practica=new Boton("btn_guardar_practica","Guardar","guardar_archivo_practica()","75px",true);
           
    $obj_practica = new Practica();
    $obj_practica->id_practica = $_GET["id_practica"];
    $obj_practica->cargarPorId();
        
   // $arr_parametros = array("id_alumno" =>  $_GET["id_alumno"] );
    $ruta_practica = (file_exists("../../../web/uploads/practicas/{$obj_practica->id_practica}.xlsx"))?"../../../web/uploads/practicas/{$obj_practica->id_practica}.xlsx?x=".rand(1,1000000) :"../../../web/uploads/practicas/formato.xlsx" ;	        
    
?>
<form id="frm_archivo_practica" name="frm_archivo_practica" action="../practicas/acc_practica.php" method="post"  enctype="multipart/form-data">

    <input type="hidden" name="hdn_archivo_id_practica" id="hdn_archivo_id_practica" value="<?php echo $obj_practica->id_practica; ?>" />
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

			<a href="<?php echo $ruta_practica; ?> "><?php echo utf8_encode( "{$obj_practica->practica}");  ?></a>
            </td>
        </tr>   
        <tr>
            <td colspan="2">&nbsp;
                
            </td>
        </tr>
    
        <tr>
            <td>Archivo Foto (*.xlsx)</td>
            <td><input type="file" name="file_archivo_practica" id="file_archivo_practica" extensiones_permitidas="xlsx" obligatorio="true"/></td>
        </tr>
        
        <tr>
        	<td colspan="2" align="right">            
            	<?php echo $btn_guardar_practica ?>
            </td>
                
            
        </tr> 
    </table>
</form>
