// JavaScript Document
function iniciar_tab_prestamo()
{
    
}

function guardar_prestamo()
{
    $("#frm_nuevo_prestamo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_nuevo_prestamo','guardar');
        }        
        
    });	
	
}

	
function cancelar_prestamo()
{
    $("#frm_abrir_prestamo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_abrir_prestamo','cancelar');
        }        
        
    });	
	
}

function prestar_prestamo()
{
    $("#frm_abrir_prestamo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_abrir_prestamo','prestar');
        }        
        
    });	
	
}


function devolver_prestamo()
{
    $("#frm_abrir_prestamo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_abrir_prestamo','devolver');
        }        
        
    });	
	
}

function actualizar_solicitante()
{
	switch($("#sel_tipo").val() )
	{
		
		case "1":

		 $("#txt_clave").autocomplete({
				source: function( request, response ) {
					$.ajax({
						url: "../prestamos/prp_prestamo.php",
						type: "POST",
						dataType: "json",
						data: {
							_accion: "json_profesores",
							nombre: request.term
						},
						success: function( data ) {
						   response( $.map( data, function( item ) {
								return {
									label: item.nombre,
									value: item.codigo
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
		break;
		case "2":

		 $("#txt_clave").autocomplete({
				source: function( request, response ) {
					$.ajax({
						url: "../prestamos/prp_prestamo.php",
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
			break;
			
			case "3":

		 $("#txt_clave").autocomplete({
				source: function( request, response ) {
					$.ajax({
						url: "../prestamos/prp_prestamo.php",
						type: "POST",
						dataType: "json",
						data: {
							_accion: "json_usuarios",
							nombre: request.term
						},
						success: function( data ) {
						   response( $.map( data, function( item ) {
								return {
									label: item.nombre_completo,
									value: item.nombre_usuario
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
			break;
	
	}
	
	
	

	
}



function iniciar_nuevo_prestamo()
{
			 $("#txt_no_inventario").autocomplete({
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
	
}




