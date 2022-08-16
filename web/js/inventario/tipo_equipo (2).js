// JavaScript Document

function iniciar_tab_tipo_equipo()
{
   //restaurar_tema();    
}

function guardar_tipo_equipo()
{	    
    $("#frm_nuevo_tipo_equipo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_nuevo_tipo_equipo','guardar');
        }        
        
    });
}

function modificar_tipo_equipo()
{	    
    $("#frm_modificar_tipo_equipo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_modificar_tipo_equipo','modificar');
        },
        antes_enviar: function()
        {            
            return true;
        }          
    });
}

function borrar_tipo_equipo()
{	
    $("#frm_abrir_tipo_equipo").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_abrir_tipo_equipo','borrar');
        }        
    });
}


