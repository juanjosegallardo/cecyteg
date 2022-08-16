// JavaScript Document

function iniciar_tab_materia()
{
    restaurar_tema();    
}

function guardar_materia()
{	    
    $("#frm_nuevo_materia").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_nuevo_materia','guardar');
        }        
        
    });
}

function modificar_materia()
{	    
    $("#frm_modificar_materia").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_modificar_materia','modificar');
        },
        antes_enviar: function()
        {            
            return true;
        }          
    });
}

function borrar_materia()
{	
    $("#frm_abrir_materia").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_abrir_materia','borrar');
        }        
    });
}


