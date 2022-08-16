// JavaScript Document
function ver_password()
{    
    var id_registro = get_radio('rad_usuario');
    if(id_registro == undefined)
    {        
        msg_box("Por favor seleccione un registro.");   
    }
    else
    {
       $.ajax({
        async: false,
        url: "../usuarios/acc_obtener_password.php",
        dataType: 'json',
        type: "POST",
        data: "_accion=mensaje&id_usuario=" + id_registro,        
        success: function(data) {            
            if(data.estado == 0)
            {
                msg_box("No cuenta con los permisos nesesarios, intente logearse nuevamente.");         
            }
            else
            {                
                msg_box("El password es: " + data.password);                
            }          
        }
        }); 
    }
}

function confirmar_enviar_password()
{
    
        var id_registro = get_radio('rad_usuario');
        if(id_registro == undefined)
        {        
            msg_box("Por favor seleccione un registro.");   
        }
        else
        {
            confirm_box('¿Confirma que desea enviar un correo con el password?','enviar_password()');               
        }
                
        
}


function enviar_password()
{    
    if($("#msgbox").attr("resultado")=="true")
    {
        var id_registro = get_radio('rad_usuario');
        if(id_registro == undefined)
        {        
            msg_box("Por favor seleccione un registro.");   
        }
        else
        {
           $.ajax({
            async: false,
            url: "../usuarios/acc_obtener_password.php",
            dataType: 'json',
            type: "POST",
            data: "_accion=correo&id_usuario=" + id_registro,        
            success: function(data) {            
                if(data.estado == 0)
                {
                    msg_box("No cuenta con los permisos nesesarios, intente logearse nuevamente.");         
                }
                else
                {                
                    msg_box("Password enviado a: "+  data.correo);                
                }          
            }
            }); 
        }
                
    }
    
        
}

function iniciar_tab_usuario()
{
    restaurar_tema();    
}

function guardar_usuario()
{	    
    $("#frm_nuevo_usuario").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_nuevo_usuario','guardar');
        }        
        
    });
}

function modificar_usuario()
{	    
    $("#frm_modificar_usuario").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_modificar_usuario','modificar');
        },
        antes_enviar: function()
        {            
            return true;
        }          
    });
}

function borrar_usuario()
{	
    $("#frm_abrir_usuario").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_abrir_usuario','borrar');
        }        
    });
}


function ingresar()
{
    $.ajax({
        async: false,
        url: "acc_comprobar_usuario.php",
        dataType: 'json',
        type: "POST",
        data: $("#frm_login_usuario").serialize(),
        beforeSend: function() {
           $("#div_login_mensaje").html("Comprobando usuario...");
        },
        success: function(data) {
            $("#div_login_mensaje").html(data.mensaje);
            if(data.estado == 1)
            {
                if(data.url != '')
                {
                    location.href = '../../' + data.url;    
                }                    
            }            
        }
    });
}
