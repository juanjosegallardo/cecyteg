<?php 
	$horas=array( "7:00", "7:50", "8:40", "9:30", "10:00", "10:50", "11:40", "12:30", "13:20", "14:10", "15:00", "15:50", "16:20", "17:10", "18:00", "18:50", "23:59");
	$meses  = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Ocutubre", "Noviembre", "Diciembre");

?>
<form id="frm_registro_alumnos" name="frm_registro_alumnos">
<?php  echo date("Y-m-d"); ?>
<input type="hidden" id="_accion" name="_accion" value="guardar_registro" />
<input type="hidden" id="hdn_grupo_alumnos" name="hdn_grupo_alumnos" value="1704" />
    <table class="ui-widget ui-widget-content ui-corner-all ventana" >
        <colgroup>
            <col width="10%" />
            <col width="90%" /> 
        </colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
               Registro Alumnos
            </td>    
        </tr>        
       	<tr>           
            <td>
               Aula 
            </td>
            <td>            
                <select id="cmb_aula" hijo="cmb_clase"  asincrono="true" name="cmb_grupo" campo="tbl_aula_id_aula" obligatorio="true" mensaje="Favor de especificar una aula valida" class="combo_server" ruta="../registro_alumnos/prp_registro_alumnos.php" iniciado="false"></select>               
            </td>               
        </tr>

       	<tr>           
            <td>
               Clase 
            </td>
            <td>            
                <select id="cmb_clase" asincrono="true"  name="cmb_clase" campo="tbl_clase_id_clase" obligatorio="true" mensaje="Favor de especificar una clase valida" class="combo_server" ruta="../registro_alumnos/prp_registro_alumnos.php" iniciado="false"></select>               
            </td>               
        </tr>
      	<tr>           
            <td>
               Alumno 
            </td>
            <td>            
                <input type="text" id="txt_numero_control_alumnos" name="txt_numero_control_alumnos"  /> 
            </td>               
        </tr>

    </table>
</form>
<div id="mensaje_registro_alumnos" align="center"></div>
<br />
<br />

<form method="post" name="frm_reporte_inasistencias" id="frm_reporte_inasistencias" action="../registro_alumnos/pdf_registro_inasistencias.php" target="_blank" >
<table class="ui-widget ui-widget-content ui-corner-all ventana" >
	<colgroup>
	    <col width="50%" />
	    <col width="50%" /> 
	</colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
               Reporte de Inasistencias
            </td>    
        </tr>        
        
	<tr>
		<td>
			Fecha:
		</td>
		<td>
 			<input id="txt_reporte_inasistencia_fecha" name="txt_reporte_inasistencia_fecha" type="text" class="fecha" obligatorio="true" value="<?php echo date("Y-m-d"); ?>"/>
		</td>
	</tr>
<tr>
        
        <td>Hora Entrada</td>
            
        	<td>            
                <select id="txt_reporte_inasistencia_hora_entrada" name="txt_reporte_inasistencia_hora_entrada"  obligatorio="true">
			
			<?php 
				$bandera= 0;
				for($i=0;$i<count($horas) -1;$i++ ):
					$hora= $horas[$i];

					if($bandera==0 &&  strtotime( date("Y-m-d"). " " . $hora) <= strtotime("now")  && strtotime("now") <=   strtotime( date("Y-m-d"). " " . $horas[$i+1]) )
					{
						$bandera++;
					}
					?>
					<option value="<?php echo $hora; ?>" <?php echo ($bandera==1)?'selected':'';   ?> >
						 <?php echo $hora; ?> 



					</option>				
				<?php 
					if($bandera==1)
					{
						$bandera++;
					}
				endfor; 
			?>
		</select>
            </td>

        </tr> 

       <td>Grupo</td>
            
        	<td>            
                <input id="txt_reporte_inasistencia_grupo" name="txt_reporte_inasistencia_grupo" type="text" value="" obligatorio="true"/>
            </td>
        </tr> 
	<tr>
		<td colspan="2" align="center">
			<input  onclick="$('#frm_reporte_inasistencias').submit()" type="button" class="boton" id="btn_reporte horas" value="Generar"/>

		</td>
	</tr>
</table>
</form>
<br />
<br />
<form method="post" name="frm_reporte_horas" id="frm_reporte_horas" action="../registro_alumnos/pdf_registro_alumnos.php" target="_blank" >
<table class="ui-widget ui-widget-content ui-corner-all ventana" >
	<colgroup>
	    <col width="50%" />
	    <col width="50%" /> 
	</colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
               Reporte de Horas
            </td>    
        </tr>        
        
	<tr>
		<td>
			Fecha:
		</td>
		<td>
 			<input id="txt_reporte_alumnos_fecha" name="txt_reporte_alumnos_fecha" type="text" class="fecha" obligatorio="true" value="<?php echo date("Y-m-d"); ?>"/>
		</td>
	</tr>

	<tr>
		<td colspan="2" align="center">
			<input  onclick="$('#frm_reporte_horas').submit()" type="button" class="boton" id="btn_reporte horas" value="Generar"/>

		</td>
	</tr>
</table>
</form>

<br />
<br />

<form method="post" name="frm_reporte_maestros" id="frm_reporte_maestros" action="../registro_alumnos/pdf_registro_maestros.php" target="_blank" >
<table class="ui-widget ui-widget-content ui-corner-all ventana" >
	<colgroup>
	    <col width="50%" />
	    <col width="50%" /> 
	</colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
               Reporte de registro de maestros
            </td>    
        </tr>        
        
	<tr>
		<td>
			Año
		</td>
		<td>
 			<select id="sel_reporte_maestros_ano" name="sel_reporte_maestros_ano">
			<?php for($i=2013; $i<=2050; $i++):?>
				<option value="<?php echo $i; ?>">
					<?php echo $i; ?>
				</option>
			<?php endfor;?>
			</select>
		</td>
	</tr>

	<tr>
		<td>
			Mes
		</td>
		<td>
 			<select id="sel_reporte_maestros_mes" name="sel_reporte_maestros_mes">
			<?php 
			$i=1;
			foreach($meses as $mes): ?>
				<option value="<?php echo $i++; ?>"><?php echo $mes; ?></<option>
			<?php endforeach; ?>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<input onclick="$('#frm_reporte_maestros').submit()" type="button" class="boton" id="btn_reporte horas" value="Generar"/>

		</td>
	</tr>
</table>
</form>


<br />
<br />

<form method="post" name="frm_alumno_aseo" id="frm_alumno_aseo" action="../registro_alumnos/acc_registro_alumnos.php" >
<table class="ui-widget ui-widget-content ui-corner-all ventana" >
	<colgroup>
	    <col width="50%" />
	    <col width="50%" /> 
	</colgroup>
        <tr>    
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
               Aseo Aulas
            </td>    
        </tr>        
    <?php /*    
	<tr>
		<td>
			Fecha
		</td>
		<td>	
			<input type="text" name="txt_aseo_fecha" id="txt_aseo_fecha" class="fecha"/>
		</td>
	</tr>
	<tr>
		<td>
			Hora
		</td>
		<td>
		              <select id="txt_reporte_inasistencia_hora_entrada" name="txt_reporte_inasistencia_hora_entrada"  obligatorio="true">
			
			<?php 
				$bandera= 0;
				for($i=0;$i<count($horas) -1;$i++ ):
					$hora= $horas[$i];

					if($bandera==0 &&  strtotime( date("Y-m-d"). " " . $hora) <= strtotime("now")  && strtotime("now") <=   strtotime( date("Y-m-d"). " " . $horas[$i+1]) )
					{
						$bandera++;
					}
					?>
					<option value="<?php echo $hora; ?>" <?php echo ($bandera==1)?'selected':'';   ?> >
						 <?php echo $hora; ?> 



					</option>				
				<?php 
					if($bandera==1)
					{
						$bandera++;
					}
				endfor; 
			?>
		</select>
		</td>
	</tr> */?>
	<tr>
		<td>
			Grupo
		</td>
		<td>	
			<input type="text" name="txt_aseo_grupo" id="txt_aseo_grupo"/>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<input  onclick="generar_aseadores();" type="button" value="Generar" class="boton"/>

		</td>
	</tr>

	<tr>
		<td colspan="2" >
			<div id="div_alumnos_aseo" >
				No se han generado alumnos
			</div>
			
			
		</td>
		
	</tr>
	<tr>
		<td colspan="2" align="center" >
			<input  onclick="guardar_alumno_aseo()" type="button" value="Guardar" class="boton"/>
			
		</td>
		
	</tr>	
	

</table>
</form>



