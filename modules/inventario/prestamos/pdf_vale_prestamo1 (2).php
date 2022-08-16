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
    <td style="width:100; text-align:center; border-right::3px; border-right-style:solid" > <img src="../../../web/images/logotipo.png" width="50" height="50" /></td><td style="border-right::3px; border-right-style:solid; text-align:center; width:495px" > VALE DE PRESTAMO DE EQUIPO Y/O MATERIAL DE C&Oacute;MPUTO</td><td style="text-align:center; width:140px">C&Oacute;DIGO: FO236-002/B</td>
 </tr>
 
 </table>
 
 <table height="40">

     <td style="font-size:10px"> 
	 PLANTEL: P&Eacute;NJAMO
	 </td>
	
 </table>
 
 <!-- Tabla datos del solicitante-->
 
 
 <table style="border-width:2px; border-color:#000000; border-style:solid; font-size:10px">
 <tr>
 <td style="width:750px">
 <table>
 <tr>
       <td style=" font-weight: bolder">
	   I.Datos del Solicitante
	   </td>
</tr>
 </table>
 
 
 <table  style="border-width:1px; border-color:#000000; border-style:solid;">
 
 <tr><td>
 <table>
         <tr><td >
		         Nombre:
		                </td>
			 <td  >
			 	<b><?php echo $obj_prestamo->nombre; ?></b>
			            </td>  <td style=" width:150px"></td>
			 <td >
			 Materia/puesto: 
			            </td> 
			 <td >
			 ________________ 
			             </td> <td style=" width:190px"></td>
		</tr>
		
		</table>
	<!--ESPACIO ENTRE TABLAS-->
		
		<!-- CIERRA ESPACIO ENTRE TABLAS-->
		
		<table>
	    <tr> 
		    <td>
		         Docente  
		                       </td> 
			<td> Administrativo
								</td>	
			<td>  Otro:__________ 
								</td>						
											   
		<td>
		       <b><?php echo $obj_prestamo->puesto; ?></b>
		
			   	   
		                        </td> <td ></td>
		<td>
		       Telefono:
		                        </td>
		<td >
	           _____________
		                        </td>  <td ></td> 
		</tr>
 </table>

<table>
	<tr>
		<td>
TIPO DE IDENTIFICACION: Å 


		</td>
		
		
		<td>
CECYTEG 
		</td>
<td>
Elector
		</td>
<td>
Licencia de manejo 
		</td>
		<td>
Otro: _________________________
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
		 <td colspan="10" style="width:auto"> 
		 PC Pantalla CaÒon Tableta PRS Otro__________________		 </td>
		
		  
		</tr>
		
         <tr>
		      <td  style="width:auto">
			     Marca: 
			  </td>
			  <td colspan="2"style="width:100px" > 
			       <b><?php echo $obj_prestamo->marca; ?></b>
				   
				   
			   </td>
			  <td style=" width:px"></td>
			   <td style="width:auto">
			        No. de Serie:
			   </td>
			   <td  style="width:200px">
			        <b><?php echo $obj_prestamo->no_serie; ?></b>
			   </td>  
	     </tr>

         <tr> 
		     <td colspan="2" style="width:auto" >
			      Modelo:
			 </td> 
			 <td style="width:150px" >
			       <b><?php echo $obj_prestamo->modelo; ?></b>
			 </td> <td style=" width:150px"></td>   
			 <td style="width:auto">
			      No. De Inventario:
			 </td>
			 <td style="width:1500px">
			     <b><?php echo $obj_prestamo->numero_inventario; ?></b>
			  </td> 
			  
			  
		</tr>
		
</table>
<table>
<tr>
		    <td width="167">
			Estado General del equipo:</td>
			
			<td  colspan="4" >
			
		Excelente Bueno Regular Malo Pr&eacute;simo			</td>
		</tr>
		
		<tr>
		<td colspan="5">Espeficique, si se aplica, el tipo de falla o detalle que presente el equipo__________________</td>
		
		
		 </tr>
</table>
<table>
      <tr>
	      <td>
		      El equipo y/o Material se presta con los siguientes accesorios:
		  </td>
	</tr>
      </table>
	  <table>
	  <tr>
	       <td >
		         Cable de Alimentacion,Cable VGA,Control Remoto,Mouse
		   </td>
		    <td >
			      Estuche			</td>
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
				Sal&oacute;n Aula Virtual Centro de C&oacute;mputo Laboratorio de C&oacute;mputo
			</td>
			<td >
				<b><?php echo $obj_prestamo->tipo_lugar; ?></b>
			</td>
			
	   
	   </tr>
</table>
	 
<table >
       <tr>

	        <td style="width:auto;heigth:auto" >
			     Grado:
			____</td>
			<td width="200px">
			     
		    </td> 
			<td  width="300px">
			     Grupo:
			____</td>
			<td >&nbsp;</td> 
			<td width="300px">Materia____________</td>
			<td >&nbsp;</td>
			<td >Tema</td>
			<td >_________________</td>
			<td >
       </tr>


     


</table>




<table>
       <tr> 
	       <td >
		        Fecha de Pr&eacute;stamo:
		 </td>
		   <td><b><?php echo $obj_prestamo->dia_inicio; ?></b>
		   </td> 
		   <td style=" width:600px"></td>  
		   
		      
		    <td style="width:auto">
			    Horario de Pr&eacute;stamo 
			</td>
			<td>
			    <b><?php echo $obj_prestamo->hora_inicio; ?></b>
			</td>   
	   </tr> 

       <tr> 
	      <td style="width:auto"> 
		      Fecha de Devoluci&oacute;n:
		  </td>
		  <td >
		     <b> <?php echo $obj_prestamo->dia_fin; ?></b>
		  </td> <td style=" width:150px"></td>  
		  <td style="width:auto" >
		 Horario de Devoluci&oacute;n
		  </td>
		  <td>
		  <b><?php echo $obj_prestamo->hora_fin; ?></b>
		  </td>   
	   </tr>

</table>


<table>
<tr> <td>&nbsp;   </td>   </tr>


 
 
 <tr> <td>
	<table>
	<tr> <td width="300" align="center">_________________</td><td width="400" align="center">_________________</td></tr> 
		<tr> 
			<td align="center" width="300">
				Firma del Responsable del Pr&eacute;stamo
			</td> 
			<td align="center" width="400" > 
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




<table style="border-width:4px;border-color:#000000;border-style:solid; font-size:10px">

<tr >
    <td style="width:100; text-align:center; border-right::3px; border-right-style:solid" > <img src="../../../web/images/logotipo.png" width="50" height="50" /></td><td style="border-right::3px; border-right-style:solid; text-align:center; width:495px" > VALE DE PRESTAMO DE EQUIPO Y/O MATERIAL DE C&Oacute;MPUTO</td><td style="text-align:center; width:140px">C&Oacute;DIGO: FO236-002/B</td>
 </tr>
 
 </table>
 
 <table height="40">

     <td style="font-size:10px"> 
	 PLANTEL: P&Eacute;NJAMO
	 </td>
	
 </table>
 
 <!-- Tabla datos del solicitante-->
 
 
 <table style="border-width:2px; border-color:#000000; border-style:solid; font-size:10px">
 <tr>
 <td style="width:750px">
 <table>
 <tr>
       <td style=" font-weight: bolder">
	   I.Datos del Solicitante
	   </td>
</tr>
 </table>
 
 
 <table  style="border-width:1px; border-color:#000000; border-style:solid;">
 
 <tr><td>
 <table>
         <tr><td >
		         Nombre:
		                </td>
			 <td  >
			 	<b><?php echo $obj_prestamo->nombre; ?></b>
			            </td>  <td style=" width:150px"></td>
			 <td >
			 Materia/puesto: 
			            </td> 
			 <td >
			 ________________ 
			             </td> <td style=" width:190px"></td>
		</tr>
		
		</table>
	<!--ESPACIO ENTRE TABLAS-->
		
		<!-- CIERRA ESPACIO ENTRE TABLAS-->
		
		<table>
	    <tr> 
		    <td>
		         Docente  
		                       </td> 
			<td> Administrativo
								</td>	
			<td>  Otro:__________ 
								</td>						
											   
		<td>
		       <b><?php echo $obj_prestamo->puesto; ?></b>
		
			   	   
		                        </td> <td ></td>
		<td>
		       Telefono:
		                        </td>
		<td >
	           _____________
		                        </td>  <td ></td> 
		</tr>
 </table>

<table>
	<tr>
		<td>
TIPO DE IDENTIFICACION: Å 


		</td>
		
		
		<td>
CECYTEG 
		</td>
<td>
Elector
		</td>
<td>
Licencia de manejo 
		</td>
		<td>
Otro: _________________________
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
		 <td colspan="10" style="width:auto"> 
		 PC Pantalla CaÒon Tableta PRS Otro__________________		 </td>
		
		  
		</tr>
		
         <tr>
		      <td  style="width:auto">
			     Marca: 
			  </td>
			  <td colspan="2"style="width:100px" > 
			       <b><?php echo $obj_prestamo->marca; ?></b>
				   
				   
			   </td>
			  <td style=" width:px"></td>
			   <td style="width:auto">
			        No. de Serie:
			   </td>
			   <td  style="width:200px">
			        <b><?php echo $obj_prestamo->no_serie; ?></b>
			   </td>  
	     </tr>

         <tr> 
		     <td colspan="2" style="width:auto" >
			      Modelo:
			 </td> 
			 <td style="width:150px" >
			       <b><?php echo $obj_prestamo->modelo; ?></b>
			 </td> <td style=" width:150px"></td>   
			 <td style="width:auto">
			      No. De Inventario:
			 </td>
			 <td style="width:1500px">
			     <b><?php echo $obj_prestamo->numero_inventario; ?></b>
			  </td> 
			  
			  
		</tr>
		
</table>
<table>
<tr>
		    <td width="167">
			Estado General del equipo:</td>
			
			<td  colspan="4" >
			
		Excelente Bueno Regular Malo Pr&eacute;simo			</td>
		</tr>
		
		<tr>
		<td colspan="5">Espeficique, si se aplica, el tipo de falla o detalle que presente el equipo__________________</td>
		
		
		 </tr>
</table>
<table>
      <tr>
	      <td>
		      El equipo y/o Material se presta con los siguientes accesorios:
		  </td>
	</tr>
      </table>
	  <table>
	  <tr>
	       <td >
		         Cable de Alimentacion,Cable VGA,Control Remoto,Mouse
		   </td>
		    <td >
			      Estuche			</td>
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
				Sal&oacute;n Aula Virtual Centro de C&oacute;mputo Laboratorio de C&oacute;mputo
			</td>
			<td >
				<b><?php echo $obj_prestamo->tipo_lugar; ?></b>
			</td>
			
	   
	   </tr>
</table>
	 
<table >
       <tr>

	        <td style="width:auto;heigth:auto" >
			     Grado:
			____</td>
			<td width="200px">
			     
		    </td> 
			<td  width="300px">
			     Grupo:
			____</td>
			<td >&nbsp;</td> 
			<td width="300px">Materia____________</td>
			<td >&nbsp;</td>
			<td >Tema</td>
			<td >_________________</td>
			<td >
       </tr>


     


</table>




<table>
       <tr> 
	       <td >
		        Fecha de Pr&eacute;stamo:
		 </td>
		   <td><b><?php echo $obj_prestamo->dia_inicio; ?></b>
		   </td> 
		   <td style=" width:600px"></td>  
		   
		      
		    <td style="width:auto">
			    Horario de Pr&eacute;stamo 
			</td>
			<td>
			    <b><?php echo $obj_prestamo->hora_inicio; ?></b>
			</td>   
	   </tr> 

       <tr> 
	      <td style="width:auto"> 
		      Fecha de Devoluci&oacute;n:
		  </td>
		  <td >
		     <b> <?php echo $obj_prestamo->dia_fin; ?></b>
		  </td> <td style=" width:150px"></td>  
		  <td style="width:auto" >
		 Horario de Devoluci&oacute;n
		  </td>
		  <td>
		  <b><?php echo $obj_prestamo->hora_fin; ?></b>
		  </td>   
	   </tr>

</table>


<table>
<tr> <td>&nbsp;   </td>   </tr>


 
 
 <tr> <td>
	<table>
	<tr> <td width="300" align="center">_________________</td><td width="400" align="center">_________________</td></tr> 
		<tr> 
			<td align="center" width="300">
				Firma del Responsable del Pr&eacute;stamo
			</td> 
			<td align="center" width="400" > 
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
