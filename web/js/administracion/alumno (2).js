// JavaScript Document

function iniciar_tab_alumno()
{
    restaurar_tema();    
}

function guardar_alumno()
{	    
    $("#frm_nuevo_alumno").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_nuevo_alumno','guardar');
        }        
        
    });
}

function guardar_foto_alumno()
{	    
    $("#frm_foto_alumno").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_foto_alumno','guardar_foto_alumno');
        }        
        
    });
}

function modificar_alumno()
{	    
    $("#frm_modificar_alumno").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_modificar_alumno','modificar');
        },
        antes_enviar: function()
        {            
            return true;
        }          
    });
}

function borrar_alumno()
{	
    $("#frm_abrir_alumno").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_abrir_alumno','borrar');
        }        
    });
}


function guardar_reporte()
{	
    $("#frm_reporte_alumno").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_reporte_alumno','reporte');
        }        
    });
}

