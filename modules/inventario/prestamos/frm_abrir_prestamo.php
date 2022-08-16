<?php
    include_once("../../../config.php");      
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../lib/generales/cls_formulario.php");
    include("../../../classes/cls_mensaje.php");
    include("../../../classes/cls_prestamo.php");     
    include("../../../lib/ui/cls_boton.php");
    include("dic_prestamo.php");		
        
    $obj_prestamo = new prestamo();
    $obj_prestamo->id_prestamo = $_GET["id_prestamo"];
    $obj_prestamo->cargarPorId();
    	        
   
    
?>
<form id="frm_abrir_prestamo" name="frm_abrir_prestamo" action="../prestamos/acc_prestamo.php" method="post">
	<input type="hidden" name="id_prestamo" id="id_prestamo" value="<?php echo $obj_prestamo->id_prestamo; ?>" />
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="30%" />
            <col width="70%" /> 
        </colgroup>
        <tr >    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
               Prestamo
            </td>    
        </tr>        
        <tr>
				<td>				
					Solicitante
				</td>
				<td>
					<b><?php echo  $obj_prestamo->nombre; ?></b>
				</td>
		</tr>
		
		<tr>
				<td>				
					Puesto
				</td>
				<td>
					<b><?php echo  $obj_prestamo->puesto; ?></b>
				</td>
		</tr>
        <tr>
				<td>				
					Tipo equipo
				</td>
				<td>
					<b><?php echo  $obj_prestamo->tipo_equipo; ?></b>
				</td>
		</tr>
    	<tr>
				<td>				
					Numero Inventario
				</td>
				<td>
					 <b><?php echo $obj_prestamo->numero_inventario; ?></b>
				</td>
		</tr>
         
		<tr>
				<td>				
					Fecha Prestamo
				</td>
				<td>
					 <b><?php echo  $obj_prestamo->dia_inicio; ?></b>
				</td>
		</tr>
    
	
		<tr>
				<td>				
					Hora Prestamo
				</td>
				<td>
					 <b><?php echo  $obj_prestamo->hora_inicio; ?></b>
				</td>
		</tr>
		
				<tr>
				<td>				
					Fecha Devoluci&oacute;n
				</td>
				<td>
					 <b><?php echo  $obj_prestamo->dia_fin; ?></b>
				</td>
		</tr>
    
	
		<tr>
				<td>				
					Hora Devoluci&oacute;n
				</td>
				<td>
					 <b><?php echo  $obj_prestamo->hora_fin; ?></b>
				</td>
		</tr>
        <tr>
        	<td colspan="2" align="right">            

				


		<?php if($obj_prestamo->estatus=="APARTADO"): ?>
			<a class="boton" onclick="cancelar_prestamo();">Cancelar</a>
			<a class="boton" onclick="prestar_prestamo();">En uso</a>
		<?php endif;?>


		<?php if($obj_prestamo->estatus=="EN_USO"): ?>
			<a class="boton" target="_blank" href="../prestamos/pdf_vale_prestamo.php?id_prestamo=<?php echo $_GET["id_prestamo"]; ?>"> Formato Prestamo</a>
			<a class="boton" onclick="devolver_prestamo();">Devolver</a>
		<?php endif;?>


		


            </td>
        </tr> 
    </table>
</form>
