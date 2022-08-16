// JavaScript Document

function iniciar_tab_profesor()
{
    restaurar_tema();    
}

function guardar_profesor()
{	    
    $("#frm_nuevo_profesor").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_nuevo_profesor','guardar');
        }        
        
    });
}

function guardar_foto_profesor()
{	    
    $("#frm_foto_profesor").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_foto_profesor','guardar_foto_profesor');
        }        
        
    });
}

function modificar_profesor()
{	    
    $("#frm_modificar_profesor").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_modificar_profesor','modificar');
        },
        antes_enviar: function()
        {            
            return true;
        }          
    });
}

function borrar_profesor()
{	
    $("#frm_abrir_profesor").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_abrir_profesor','borrar');
        }        
    });
}


