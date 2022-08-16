// JavaScript Document

function iniciar_tab_ubicacion()
{
    //restaurar_tema();    
}

function guardar_ubicacion()
{	    
    $("#frm_nuevo_ubicacion").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_nuevo_ubicacion','guardar');
        }        
        
    });
}

function modificar_ubicacion()
{	    
    $("#frm_modificar_ubicacion").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_modificar_ubicacion','modificar');
        },
        antes_enviar: function()
        {            
            return true;
        }          
    });
}

function borrar_ubicacion()
{	
    $("#frm_abrir_ubicacion").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_abrir_ubicacion','borrar');
        }        
    });
}

function iniciar_ubicar_inventario()
{

	 $("#txt_no_inventario_ubicacion").autocomplete({
		source: function( request, response ) {
			$.ajax({
				url: "../prestamos/prp_prestamo.php",
				type: "POST",
				dataType: "json",
				data: {
					_accion: "json_inventario",
					nombre: request.term
				},
				success: function( data ) {
				   response( $.map( data, function( item ) {
						return {
							label: item.tipo_equipo + "-" + item.numero_inventario+ "-" + item.no_serie,
							value: item.numero_inventario
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

	$("#txt_no_inventario_ubicacion" ).keyup(function(event) {
	   switch(event.which)
	   {            
		case 13:            
		    guardar_ubicacion_inventario();
			$("#txt_no_inventario_ubicacion" ).val("");
		break;           
		                                            
	   }                                                                    
	});                          
		 

}

function guardar_ubicacion_inventario()
{
	$.ajax({
                async: false,
                url: "../ubicaciones/acc_ubicacion.php",
                dataType: 'json',
                type: "POST",
                data: "_accion=guardar_ubicacion_inventario&"  +  $("#frm_ubicacion_inventario").serialize(),
                beforeSend: function()
                {
                       $("#div_resultado_ubicacion").html("Guardando...");
                    
                },
                success: function(data) {      
                    
 
                    $("#div_resultado_ubicacion").html(data.mensaje);

                    
                }
            });  
}
 


