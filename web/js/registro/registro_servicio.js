function iniciar_tab_registro_servicio()
{    
    $("#txt_numero_control").autocomplete({
			source: function( request, response ) {
				$.ajax({
					url: "../registro_servicio/prp_registro_servicio.php",
                    type: "POST",
					dataType: "json",
					data: {
						_accion: "json_alumnos",
						nombre: request.term
					},
					success: function( data ) {
					   response( $.map( data, function( item ) {
							return {
								label: item.nombre,
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
        $( "#txt_numero_control" ).focus();
        
        
        $( "#txt_numero_control" ).keydown(function(event) {    
            
           switch(event.which)
           {            
                case 27:
                    restaurar_registro_servicio();
                break;
                
                
  
           }                            
        });  
        
        
        
        $( "#txt_numero_control" ).keyup(function(event) {
           switch(event.which)
           {            
                case 13:
                    
                    guardar_registro_servicio();
                    restaurar_registro_servicio()
                break;           
                                                            
           }                                                                    
        });                          
                        
        iniciar_formulario('frm_registro_servcio');
        actualizar_hora();
        setInterval("actualizar_hora()",10000)
}    

function  actualizar_hora()
{
    $.ajax({
    	url: "../registro_servicio/prp_registro_servicio.php",
        type: "POST",
    	dataType: "json",
    	data: {
    		_accion: "json_reloj",    	
    	},
    	success: function( data ) {
    	   
    	   $("#mensaje_reloj").html(data.hora);	
    	}
    });
}

                


function restaurar_registro_servicio()
{
    $( "#txt_numero_control" ).val("");
}



function guardar_registro_servicio()
{
        $.ajax({
        async: false,
        url: "../registro_servicio/acc_registro_servicio.php",
        dataType: 'json',
        type: "POST",
        data: $("#frm_registro_servcio").serialize(),
        beforeSend: function()
        {
            
            
        },
        success: function(data) {        
            $("#mensaje_registro_servicio").html(data.mensaje);
            restaurar_registro_servicio();
            
        }
    });    
}