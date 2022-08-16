<?php
include("../../../lib/generales/cls_formulario.php");
include_once("../../../config.php");  
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../classes/cls_mensaje.php");
include("../../../lib/ui/cls_grid.php");
include("../../../lib/ui/cls_boton.php");
include("../../../lib/ui/cls_tab.php");
include("../../../lib/generales/cls_session.php");
$btn_guardar_prestamo=new Boton("btn_guardar_inventario","Guardar","guardar_prestamo()","75px",true);

$horas=array("7:00","7:50","8:40","9:30","10:00", "10:50","11:40","12:30", "13:20", "14:10", "15:00", "15:30", "16:20", "17:10", "18:00", "18:50");
?>

<form id="frm_nuevo_prestamo" name="frm_nuevo_prestamo" action="../prestamos/acc_prestamo.php" method="post">
<table class="ui-widget ui-widget-content ui-corner-all ventana">
	<colgroup>
		<col width="50%" />
		<col width="50%" /> 
	</colgroup>
	<tr>    
		<td class="ui-widget-header ui-corner-all encabezado" colspan="2">
			Nuevo Prestamo
		</td>    
	</tr>   

		
	<tr>
   		<td>
			Tipo de Personal
		</td>
		<td>
			<select id="sel_tipo" onchange="actualizar_solicitante()" obligatorio="true" mensaje="Seleccione el tipo de persona">
				<option	value="">Seleccione una opci&oacute;n</option>
				<option value="1">Profesor</option>
				<option value="2">Alumno</option>
				<option value="3">Administrativo</option>				
			</select>
		</td>
    </tr>
	
	<tr>
		<td>
			Clave
			
		</td>	
		<td>
			<input type="text" id="txt_clave" name="txt_clave" obligatorio="true" mensaje="Escriba la clave"/>
		</td>
	</tr>
	<tr>
		<td>
			Numero de Inventario
			
		</td>	
		<td>
			<input type="text" id="txt_no_inventario" name="txt_no_inventario" obligatorio="true" mensaje="Escriba el numero de inventario"/>
		</td>
	</tr>
	
	<tr>
		<td>
			Fecha Inicio Apartado
			
		</td>	
		<td>
			<input obligatorio="true" type="text" id="txt_fecha_inicio" name="txt_fecha_inicio" class="fecha"  value="<?php echo date("Y-m-d") ?>" mensaje="Escriba la fecha de inicio"/>
		</td>
	</tr>
	
	<tr>
		<td>
			Hora Inicio
			
		</td>	
		<td>
			<select id="sel_hora" name="sel_hora" obligatorio="true" mensaje="Escriba la hora de inicio">
					<option value="">
						Seleccione una opcion
					</option>
				<?php foreach($horas as $hora): ?>
				<option value="<?php echo $hora; ?>">
					<?php echo $hora; ?>
				</option>
				<?php endforeach; ?>
			</select>
		</td>
	</tr>
		
	<tr>
		<td>
			Duracion
			
		</td>	
		<td>
			<input obligatorio="true" type="text" id="txt_duracion" name="txt_duracion" caracteres="48-59,8" exp="<?php echo EXP_ENTERO; ?>"/ mensaje="Escriba la duracion">
		</td>
	</tr>
	<tr>
		<td>
			Tipo de lugar
			
		</td>	
		<td>
			<select id="sel_tipo_lugar" name="sel_tipo_lugar">
				<option value="">Seleccione una opci&oacute;n</option>
				<option value="0">Sal&oacute;n</option>
				<option value="1">Aula Virtual</option>
				<option value="2">Centro de c&oacute;mputo</option>
			</select>
		</td>
	</tr>
	
			

<!--	<tr>
		<td> Iniciar Prestamo
		</td>
		<td>
			<select id="sel_iniciar" name="sel_iniciar" obligatorio="true" mensaje="Seleccione si desea iniciar prestamo">
					<option value="">
						Seleccione una opcion
					</option>
					<option value="1">
						Si
					</option>
					
					<option value="0">
						No
					</option>
			</select>
		</td>-->
	</tr>
	       <tr>
        	<td colspan="2" align="right">            
            	<?php echo $btn_guardar_prestamo ?>
            </td>
        </tr> 
</table>

</form>
<br />
<div id="div_equipo" align="center"></div>