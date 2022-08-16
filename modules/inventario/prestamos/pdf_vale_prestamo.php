<?php

include_once("../../../config.php");  
include("../../../lib/ui/cls_tab.php");
include("../../../lib/ui/cls_boton.php");
include("../../../lib/generales/cls_master_page.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");


include("../../../classes/cls_prestamo.php");     

$obj_prestamo = new Prestamo();
$obj_prestamo->id_prestamo = $_GET["id_prestamo"];
$obj_prestamo->cargarPorId();
MasterPage::iniciarSeccion();
?>





<page>




<table style="border-width:4px;border-color:#000000;border-style:solid; font-size:10px">

<tr >
    <td style="width:100; text-align:center; border-right::3px; border-right-style:solid" > <img src="../../../web/images/logotipo.png" width="50" height="50" /></td><td style="border-right::3px; border-right-style:solid; text-align:center; width:495px" > VALE DE PRESTAMO DE EQUIPO Y/O MATERIAL DE C&Oacute;MPUTO</td>
    <td style="text-align:center; width:140px">C&Oacute;DIGO: F0236-002/B</td>
 </tr>
 
 </table>
 
 <table height="40">
 <tr>
     <td style="font-size:10px"> 
	 PLANTEL: P&Eacute;NJAMO
	 </td>
    </tr>
 </table>
 <!-- Tabla datos del solicitante-->
 
 
 <table style="border-width:2px; border-color:#000000; border-style:solid; font-size:8px;">
	<tr>
		<td style="width:750px">
			<table>
				<tr>
					<td style=" font-weight: bolder">
						I.Datos del Solicitante
					</td>
				</tr>
			
</table>
 
 
 <table  style="border-width:1px; border-color:#000000; border-style:solid">
 
 <tr><td>
 <table>
         <tr><td >
		         Nombre:
		                </td>
			 <td style=" font-size:9px" >
			 	<b><?php echo $obj_prestamo->nombre; ?></b>
	              </td>  <td style=" width:370px"></td>
			 <td >
			 Materia/puesto: 
	              </td> 
			 <td >
			 ________________ 
	              </td> 
		</tr>
		
		</table>
	<!--ESPACIO ENTRE TABLAS-->
		
		<!-- CIERRA ESPACIO ENTRE TABLAS-->
		
		<table >
	    <tr> 
		    <td>
		        <?php if($obj_prestamo->puesto=="Profesor") : ?> 
				<b>Docente</b> Administrativo Otro_______
				
				<?php elseif($obj_prestamo->puesto=="Administrativo") :?>
				Docente <b>Administrativo</b> Otro_______ 
			
				<?php endif; ?> 
                  </td> 
		    <td>
			
				
		      <?php if ($obj_prestamo->puesto=="Alumno"):?>
			   Docente Administrativo Otro: Alumno  
			   
			   <?php endif; ?>
			   
			   
			   
                  </td> <td width="150px"></td> <td></td>
								
		<td>
		       Telefono:
                  </td>
		<td >
	           ________________
                  </td>  <td ></td> 
		</tr>
 </table>

<table >
	<tr>
		<td>
Tipo de Identificac&oacute;n: CECYTEG Elector Licencia de Manejo Otro


		</td>
		<td>
_________________
		</td>


	</tr>


</table>
 
 </td></tr>
 </table>
 <!-- cierra tabla datos del solicitante-->
  <!-- TABLA DATOS DEL EQUIPO Y O MATERIAL-->
  <table>
 <tr>
       <td>
	   II. Datos del Equipo y o Material
	   </td>
</tr>
 </table>
 
 <table style="border-width:1px; border-color:#000000; border-style:solid;">
 <tr><td style="width:745px">
 <table >
        <tr>
		    <td colspan="2" style="width:auto">
			<?php if($obj_prestamo->tipo_equipo=="CANON") :?>
			PC´s Pantalla <b>Ca&ntilde;&oacute;n</b> Tableta PRS Otro:_____________ 
				
				<?php elseif($obj_prestamo->tipo_equipo=="CPU") : ?>
				<b>PC´s</b> Pantalla Ca&ntilde;&oacute;n Tableta PRS Otro:_____________ 
				<?php elseif($obj_prestamo->puesto=="LAPTOP") : ?>
				 <b>PC´s</b> Pantalla Ca&ntilde;&oacute;n Tableta PRS Otro:_____________
				
				<?php elseif($obj_prestamo->puesto=="OTRO") :   ?>
				
				PC´s Pantalla Ca&ntilde;&oacute;n Tableta PRS Otro:_____________
				
				
				<?php endif; ?> 
			
			
			
			
			
			
			
			 
		    </td>  
		    <td  >
			  
				 
			</td> 
		</tr>
		
         <tr>
		      <td  style="width:auto">
			     Marca: 
			  </td>
			  <td style="width:100px" > 
			       <b><?php echo $obj_prestamo->marca; ?></b>
			   </td><td style=" width:150px"></td>
			   <td style="width:auto">
			        No. de Serie:
			   </td>
			   <td style="width:auto">
			        <b><?php echo $obj_prestamo->no_serie; ?></b>
			   </td>  
	     </tr>

         <tr> 
		     <td style="width:auto" >
			      Modelo:
			 </td> 
			 <td style="width:150px" >
			       <b><?php echo $obj_prestamo->modelo; ?></b>
			 </td> <td style=" width:100px"></td>   
			 <td style="width:auto">
			      No. De Inventario:
			 </td>
			 <td style="width:auto">
			     <b><?php echo $obj_prestamo->numero_inventario; ?></b>
			  </td> 
			  
			  
		</tr>
		
</table>
<table>
<tr>
		    <td>
			Estado General del equipo:
		    </td>
			
			<td style="width:250px">
			
			Excelente Bueno Regular Malo P&eacute;simo
			</td>
		</tr>
</table>
<table>
      <tr>
	      <td>
		      El equipo y/o Material se presta con los siguientes accesorios:
		  </td>
	</tr>
	<tr><td>Especifique, si aplica, el tipo de falla o detalle que presente el equipo:</td><td>______________</td></tr>
      </table>
	  <table>
	  <tr>
	       <td >
		         Cable de Alimentacion,Cable VGA,Control Remoto		   </td>
		    <td >
			      Estuche  
			</td>
			<td>
			      Otro(s) (especifique):  
			</td>  
			<td >
			___________
			</td>
	</tr>

</table>




</td></tr>
</table>

<table>
        <tr>
		    <td>
			    El equipo y/o Material se Usar&aacute; en:
			</td>  
			<td >
			<?php if($obj_prestamo->tipo_lugar=="Salón"): ?> 
				<b>Sal&oacute;n</b> Aula Virtual Centro de C&oacute;mputo Laboratorio Plofuncional
			<?php elseif($obj_prestamo->tipo_lugar=="Aula Virtual"): ?>
				Sal&oacute;n <b>Aula Virtual</b> Centro de C&oacute;mputo Laboratorio Plofuncional
			<?php elseif($obj_prestamo->tipo_lugar=="Centro de Cómputo"):?>
				Sal&oacute;n Aula Virtual <b>Centro de C&oacute;mputo</b> Laboratorio Plofuncional 
			
			<?php endif; ?>
			
				<b><?php echo $obj_prestamo->tipo_lugar; ?></b>
			</td>
	   
	   </tr>
</table>
	 
<table >
       <tr>

	        <td >
			     Grado:
			</td>
			<td >
			      _____________</td> 
			<td width="250">
			     Grupo:_____________
			</td>
			
			<td >Materia</td>
			<td width="150" >
			      ______
		    </td>
			<td>Tema:__________   </td>
       </tr>


       <tr> 
	       <td height="20px" >
		        
		   </td> 
		   <td >
		       
		   </td>
	   </tr>


</table>




<table>
       <tr> 
	       <td >
		        Fecha de Pr&eacute;stamo:		 </td>
		   <td width="50"><b></b>		   </td> 
		   <td style=" width:150px"><?php echo $obj_prestamo->dia_inicio; ?>; </td>      
		    <td width="200"></td><td style="width:auto">
			    Horario de Pr&eacute;stamo 
			</td>
			<td>
			    <b><?php echo $obj_prestamo->hora_inicio; ?></b>			</td>   
	   </tr> 

       <tr> 
	      <td style="width:auto"> 
		      Fecha de Devoluci&oacute;n:		  </td>
		  <td >&nbsp;</td> 
		  <td style=" width:150px"><b><?php echo $obj_prestamo->dia_fin; ?></b></td>  
		  <td width="150"></td> <td style="width:auto" >
		 Horario de Devoluci&oacute;n
		  </td>
		  <td>
		  <b><?php echo $obj_prestamo->hora_fin; ?></b>		  </td>   
	   </tr>
</table>


<table>
<tr> <td>&nbsp;   </td>   </tr>


 
 
 <tr> <td>
	<table>
	<tr> <td width="200" align="center">__________________________</td>
	  <td width="150"></td>
	<td width="200" align="center">______________________________</td>
	</tr> 
		<tr> 
			<td align="center" width="250">
				Firma del Responsable del Pr&eacute;stamo
			</td> <td width="150"></td>
			<td align="center" width="250" > 
				Firma del Solicitante del Pr&eacute;stamo
			</td>
		</tr> 
	</table>

 </td> </tr>



</table>









</td></tr>
</table>



<br />
<br />
<br />
<br />


<table style="border-width:4px;border-color:#000000;border-style:solid; font-size:10px">

<tr >
    <td style="width:100; text-align:center; border-right::3px; border-right-style:solid" > <img src="../../../web/images/logotipo.png" width="50" height="50" /></td><td style="border-right::3px; border-right-style:solid; text-align:center; width:495px" > VALE DE PRESTAMO DE EQUIPO Y/O MATERIAL DE C&Oacute;MPUTO</td>
    <td style="text-align:center; width:140px">C&Oacute;DIGO: F0236-002/B</td>
 </tr>
 
 </table>
 
 <table height="40">
 <tr>
     <td style="font-size:10px"> 
	 PLANTEL: P&Eacute;NJAMO
	 </td>
    </tr>
 </table>
 <!-- Tabla datos del solicitante-->
 
 
 <table style="border-width:2px; border-color:#000000; border-style:solid; font-size:8px;">
	<tr>
		<td style="width:750px">
			<table>
				<tr>
					<td style=" font-weight: bolder">
						I.Datos del Solicitante
					</td>
				</tr>
			
</table>
 
 
 <table  style="border-width:1px; border-color:#000000; border-style:solid">
 
 <tr><td>
 <table>
         <tr><td >
		         Nombre:
		                </td>
			 <td style=" font-size:9px" >
			 	<b><?php echo $obj_prestamo->nombre; ?></b>
	              </td>  <td style=" width:370px"></td>
			 <td >
			 Materia/puesto: 
	              </td> 
			 <td >
			 ________________ 
	              </td> 
		</tr>
		
		</table>
	<!--ESPACIO ENTRE TABLAS-->
		
		<!-- CIERRA ESPACIO ENTRE TABLAS-->
		
		<table >
	    <tr> 
		    <td>
		        <?php if($obj_prestamo->puesto=="Profesor") : ?> 
				<b>Docente</b> Administrativo Otro_______
				
				<?php elseif($obj_prestamo->puesto=="Administrativo") :?>
				Docente <b>Administrativo</b> Otro_______ 
			
				<?php endif; ?> 
                  </td> 
		    <td>
			
				
		      <?php if ($obj_prestamo->puesto=="Alumno"):?>
			   Docente Administrativo Otro: Alumno  
			   
			   <?php endif; ?>
			   
			   
			   
                  </td> <td width="150px"></td> <td></td>
								
		<td>
		       Telefono:
                  </td>
		<td >
	           ________________
                  </td>  <td ></td> 
		</tr>
 </table>

<table >
	<tr>
		<td>
Tipo de Identificac&oacute;n: CECYTEG Elector Licencia de Manejo Otro


		</td>
		<td>
_________________
		</td>


	</tr>


</table>
 
 </td></tr>
 </table>
 <!-- cierra tabla datos del solicitante-->
  <!-- TABLA DATOS DEL EQUIPO Y O MATERIAL-->
  <table>
 <tr>
       <td>
	   II. Datos del Equipo y o Material
	   </td>
</tr>
 </table>
 
 <table style="border-width:1px; border-color:#000000; border-style:solid;">
 <tr><td style="width:745px">
 <table >
        <tr>
		    <td colspan="2" style="width:auto">
			<?php if($obj_prestamo->tipo_equipo=="CANON") :?>
			PC´s Pantalla <b>Ca&ntilde;&oacute;n</b> Tableta PRS Otro:_____________ 
				
				<?php elseif($obj_prestamo->tipo_equipo=="CPU") : ?>
				<b>PC´s</b> Pantalla Ca&ntilde;&oacute;n Tableta PRS Otro:_____________ 
				<?php elseif($obj_prestamo->puesto=="LAPTOP") : ?>
				 <b>PC´s</b> Pantalla Ca&ntilde;&oacute;n Tableta PRS Otro:_____________
				
				<?php elseif($obj_prestamo->puesto=="OTRO") :   ?>
				
				PC´s Pantalla Ca&ntilde;&oacute;n Tableta PRS Otro:_____________
				
				
				<?php endif; ?> 
			
			
			
			
			
			
			
			 
		    </td>  
		    <td  >
			  
				 
			</td> 
		</tr>
		
         <tr>
		      <td  style="width:auto">
			     Marca: 
			  </td>
			  <td style="width:100px" > 
			       <b><?php echo $obj_prestamo->marca; ?></b>
			   </td><td style=" width:150px"></td>
			   <td style="width:auto">
			        No. de Serie:
			   </td>
			   <td style="width:auto">
			        <b><?php echo $obj_prestamo->no_serie; ?></b>
			   </td>  
	     </tr>

         <tr> 
		     <td style="width:auto" >
			      Modelo:
			 </td> 
			 <td style="width:150px" >
			       <b><?php echo $obj_prestamo->modelo; ?></b>
			 </td> <td style=" width:100px"></td>   
			 <td style="width:auto">
			      No. De Inventario:
			 </td>
			 <td style="width:auto">
			     <b><?php echo $obj_prestamo->numero_inventario; ?></b>
			  </td> 
			  
			  
		</tr>
		
</table>
<table>
<tr>
		    <td>
			Estado General del equipo:
		    </td>
			
			<td style="width:250px">
			
			Excelente Bueno Regular Malo P&eacute;simo
			</td>
		</tr>
</table>
<table>
      <tr>
	      <td>
		      El equipo y/o Material se presta con los siguientes accesorios:
		  </td>
	</tr>
	<tr><td>Especifique, si aplica, el tipo de falla o detalle que presente el equipo:</td><td>______________</td></tr>
      </table>
	  <table>
	  <tr>
	       <td >
		         Cable de Alimentacion,Cable VGA,Control Remoto		   </td>
		    <td >
			      Estuche  
			</td>
			<td>
			      Otro(s) (especifique):  
			</td>  
			<td >
			___________
			</td>
	</tr>

</table>




</td></tr>
</table>

<table>
        <tr>
		    <td>
			    El equipo y/o Material se Usar&aacute; en:
			</td>  
			<td >
			<?php if($obj_prestamo->tipo_lugar=="Salón"): ?> 
				<b>Sal&oacute;n</b> Aula Virtual Centro de C&oacute;mputo Laboratorio Plofuncional
			<?php elseif($obj_prestamo->tipo_lugar=="Aula Virtual"): ?>
				Sal&oacute;n <b>Aula Virtual</b> Centro de C&oacute;mputo Laboratorio Plofuncional
			<?php elseif($obj_prestamo->tipo_lugar=="Centro de Cómputo"):?>
				Sal&oacute;n Aula Virtual <b>Centro de C&oacute;mputo</b> Laboratorio Plofuncional 
			
			<?php endif; ?>
			
				<b><?php echo $obj_prestamo->tipo_lugar; ?></b>
			</td>
	   
	   </tr>
</table>
	 
<table >
       <tr>

	        <td >
			     Grado:
			</td>
			<td >
			      _____________</td> 
			<td width="250">
			     Grupo:_____________
			</td>
			
			<td >Materia</td>
			<td width="150" >
			      ______
		    </td>
			<td>Tema:__________   </td>
       </tr>


       <tr> 
	       <td height="20px" >
		        
		   </td> 
		   <td >
		       
		   </td>
	   </tr>


</table>




<table>
       <tr> 
	       <td >
		        Fecha de Pr&eacute;stamo:		 </td>
		   <td width="50"><b></b>		   </td> 
		   <td style=" width:150px"><?php echo $obj_prestamo->dia_inicio; ?>; </td>      
		    <td width="200"></td><td style="width:auto">
			    Horario de Pr&eacute;stamo 
			</td>
			<td>
			    <b><?php echo $obj_prestamo->hora_inicio; ?></b>			</td>   
	   </tr> 

       <tr> 
	      <td style="width:auto"> 
		      Fecha de Devoluci&oacute;n:		  </td>
		  <td >&nbsp;</td> 
		  <td style=" width:150px"><b><?php echo $obj_prestamo->dia_fin; ?></b></td>  
		  <td width="150"></td> <td style="width:auto" >
		 Horario de Devoluci&oacute;n
		  </td>
		  <td>
		  <b><?php echo $obj_prestamo->hora_fin; ?></b>		  </td>   
	   </tr>
</table>


<table>
<tr> <td>&nbsp;   </td>   </tr>


 
 
 <tr> <td>
	<table>
	<tr> <td width="200" align="center">__________________________</td>
	  <td width="150"></td>
	<td width="200" align="center">______________________________</td>
	</tr> 
		<tr> 
			<td align="center" width="250">
				Firma del Responsable del Pr&eacute;stamo
			</td> <td width="150"></td>
			<td align="center" width="250" > 
				Firma del Solicitante del Pr&eacute;stamo
			</td>
		</tr> 
	</table>

 </td> </tr>



</table>









</td></tr>
</table>












</page>



<?php 
   MasterPage::finalizarSeccion($contenido); 
   include("../../main/master/pdf_reporte.php"); 
?>
