// JavaScript Document

function iniciar_div_conteo()
{   
        iniciar_completar_inventario();
        $("#txt_numero_inventario").keyup(function(event) {
           switch(event.which)
           {            
                case 13:                    
                    registrar_inventario();
                break;           
                                                            
           }                                                                    
        });
        iniciar_formulario('frm_agregar_inventario');                      
}

function iniciar_completar_inventario()
{
    
    $("#txt_numero_inventario").autocomplete({
			source: function( request, response ) {
				$.ajax({
					url: "../conteos/prp_conteo.php",
                    type: "POST",
					dataType: "json",
					data: {
						_accion: "json_inventario",
						busqueda: request.term
					},
					success: function( data ) {
					   response( $.map( data, function( item ) {
							return {
								label: 'Serie: ' + item.no_serie.toString() + ' No. Inventario: ' + item.numero_inventario.toString(),
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

function iniciar_tab_conteo()
{
    //restaurar_tema();    
}

function guardar_conteo()
{	    
    $("#frm_nuevo_conteo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_nuevo_conteo','guardar');
        }        
        
    });
}

function modificar_conteo()
{	    
    $("#frm_modificar_conteo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_modificar_conteo','modificar');
        },
        antes_enviar: function()
        {            
            return true;
        }          
    });
}

function borrar_conteo()
{	
    $("#frm_abrir_conteo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_abrir_conteo','borrar');
        }        
    });
}

function iniciar_conteo()
{	
    $("#frm_abrir_conteo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_abrir_conteo','iniciar');
        }        
    });
}

function terminar_conteo()
{	
    $("#frm_abrir_conteo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_abrir_conteo','terminar');
        }        
    });
}

function registrar_inventario()
{
         $.ajax({
        async: false,
        url: "../conteos/acc_conteo.php",
        dataType: 'json',
        type: "POST",
        data: $("#frm_agregar_inventario").serialize(),
        beforeSend: function()
        {
            
            
        },
        success: function(data) {        
            $("#lbl_inventario").html(data.mensaje);
            restaurar_registro_conteo();
            
        }
    });

}

function restaurar_registro_conteo()
{
    
    $("#txt_numero_inventario").val("");        
}
