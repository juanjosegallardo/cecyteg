// JavaScript Document

function iniciar_tab_marca()
{
    //restaurar_tema();    
}

function guardar_marca()
{	    
    $("#frm_nuevo_marca").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_nuevo_marca','guardar');
        }        
        
    });
}

function modificar_marca()
{	    
    $("#frm_modificar_marca").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_modificar_marca','modificar');
        },
        antes_enviar: function()
        {            
            return true;
        }          
    });
}

function borrar_marca()
{	
    $("#frm_abrir_marca").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_abrir_marca','borrar');
        }        
    });
}


