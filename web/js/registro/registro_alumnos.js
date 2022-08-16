function iniciar_tab_registro_alumnos()
{    
   $("#cmb_clase").change(function(){
    
        var arr_datos = $("#cmb_clase :selected").attr("text").split(" - ");
       
    
        $("#txt_numero_control_alumnos").autocomplete({
			source: function( request, response ) {
				$.ajax({
					url: "../registro_alumnos/prp_registro_alumnos.php",
                    type: "POST",
					dataType: "json",
					data: {
						_accion: "json_alumnos",
						nombre: request.term,
						grupo: arr_datos[1]
					},
					success: function( data ) {
					   response( $.map( data, function( item ) {
							return {
								label: item.nombre + " - " + item.no_control,
								value: item.no_control
							}
                        }));
						
					}
				});
			},
			minLength: 2,
			select: function( event, ui ) {			 
			  	/*log( ui.item ?
					"Selected: " + ui.item.label :
					"Nothing selected, input was " + this.value);*/
                                                                                             
			}
		});
    
    
   });
      
        $( "#txt_numero_control_alumnos" ).keydown(function(event) {    
            
           switch(event.which)
           {            
                case 27:
                    restaurar_registro_alumnos();
                break;
                
                
  
           }                            
        });  
        
        
        
        $( "#txt_numero_control_alumnos" ).keyup(function(event) {
           switch(event.which)
           {            
                case 13:
                    
                    guardar_registro_alumnos();
                    restaurar_registro_alumnos()
                break;           
                                                            
           }                                                                    
        });                          
                        
        iniciar_formulario('frm_registro_alumnos');
        
}    




function restaurar_registro_alumnos()
{
    $( "#txt_numero_control_alumnos" ).val("");
}



function guardar_registro_alumnos()
{
    if($("#txt_materia").val()=="" || $("#sel_profesor").val()=="" || $("#sel_aula").val()=="" || $("#txt_hora_entrada").val()=="" || $("#txt_fecha_entrada").val()=="" || $("#txt_duracion").val()=="" )
	{
			 $("#mensaje_registro_alumnos").html("No se pudo guardar el alumno con el no_control: <br />"+ $("#txt_numero_control_alumnos").val()  + " <br />Por favor llene todos los campos");
	}
	else
	{
            $.ajax({
                async: false,
                url: "../registro_alumnos/acc_registro_alumnos.php",
                dataType: 'json',
                type: "POST",
                data: $("#frm_registro_alumnos").serialize(),
                beforeSend: function()
                {
                       
                 $("#mensaje_registro_alumnos").html("Guardando...");   
                },
                success: function(data) {      
                    
                    $("#mensaje_registro_alumnos").html("");
                    $("#mensaje_registro_alumnos").html(data.mensaje);
			if(data.estado==1)
			{
			    $("#mensaje_registro_alumnos").append('Guardado Correctamente: ' + $("#txt_numero_control_alumnos").val() + '<br/>' + data.nombre +'<br /> <img src="../../../web/uploads/alumnos/'+ data.id +'.jpg" width="140px" height="170px" />');
			}
                    restaurar_registro_alumnos();
                    
                }
            });  
   
	}
          
}

function generar_aseadores()
{
 		$.ajax({
                async: false,
                url: "../registro_alumnos/prp_registro_alumnos.php",
                dataType: 'json',
                type: "POST",
                data: "_accion=json_alumnos_aseo&grupo="+$("#txt_aseo_grupo").val() + "&fecha="+$("#txt_aseo_feca").val(),
                beforeSend: function()
                {
                     $("#div_alumnos_aseo").html("Cargando...");	  
                    
                },
                success: function(data) {  
					var i=0;
					 $("#div_alumnos_aseo").html("");
					 if(data.length>0)
					 {
						for(i=0; i<data.length && i<10;i++)
						{
								
								 $("#div_alumnos_aseo").append( '<input type="checkbox" id="chk_aseo_'+ data[i].id_alumno + '" name="chk_aseo[]" value="' +  data[i].id_alumno + '" /><label for="chk_aseo_' +  data[i].id_alumno  +'">' + data[i].nombre + "</label><br />") ;	  
						}
					 }
					 else
					 {
						 
						$("#div_alumnos_aseo").html("No se han generado alumnos");	 
					  }
				
				}

          }); 
		
		

   

}


function guardar_alumno_aseo()
{	    
    $("#frm_alumno_aseo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_alumno_aseo','guardar_aseo_alumno');
        }        
        
    });
}