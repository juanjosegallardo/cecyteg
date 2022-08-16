// JavaScript Document
function guardar_actualizacion_squid()
{
	accion = "actualizar_squid";
        var tab_seleccinado =  parseInt($("#tab_principal").tabs('option', 'selected'));                
        $("#frm_actualizar_squid").append('<input type="hidden" name="_accion" value="'+accion+'" />');	
        $("#frm_actualizar_squid").append('<input type="hidden" name="_id_tab" value="'+ tab_seleccinado + '" />');
        $("#frm_actualizar_squid").submit();
}

function iniciar_tab_equipo()
{
    //restaurar_tema();    
}

function guardar_equipo()
{	    
    $("#frm_nuevo_equipo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_nuevo_equipo','guardar');
        }        
        
    });
}

function modificar_equipo()
{	    
    $("#frm_modificar_equipo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_modificar_equipo','modificar');
        },
        antes_enviar: function()
        {            
            return true;
        }          
    });
}

function borrar_equipo()
{	
    $("#frm_abrir_equipo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_abrir_equipo','borrar');
        }        
    });
    
    
}

function guardar_foto_equipo()
{	    
    $("#frm_foto_equipo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_foto_equipo','guardar_foto_equipo');
        }        
        
    });
}

function generar_expediente_equipo(id_equipo)
{
    
    $("#frm_expediente_equipo").submit();
    //window.open("../equipos/pdf_expediente_equipo.php?id_equipo=" + id_equipo);
}



