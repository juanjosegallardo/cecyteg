// JavaScript Document

function iniciar_tab_practica()
{
    restaurar_tema();    
}

function guardar_practica()
{	    
    $("#frm_nuevo_practica").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_nuevo_practica','guardar');
        }        
        
    });
}

function modificar_practica()
{	    
    $("#frm_modificar_practica").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_modificar_practica','modificar');
        },
        antes_enviar: function()
        {            
            return true;
        }          
    });
}

function borrar_practica()
{	
    $("#frm_abrir_practica").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_abrir_practica','borrar');
        }        
    });
}


function guardar_archivo_practica()
{	    
    $("#frm_archivo_practica").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_archivo_practica','guardar_archivo_practica');
        }        
        
    });
}


