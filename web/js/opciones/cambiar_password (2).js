// JavaScript Document

function cambiar_password()
{	    
    $("#frm_cambiar_password").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_cambiar_password','cambiar_password');
        },
        antes_enviar: function()
        {            
            if($("#txt_password_cambiar_password").val() == $("#txt_password2_cambiar_password").val() )
            {                
                                
                 if(comprobar_password())
                 {                    
                    return true;          
                 }
                 else
                 {
                    msg_box("EL password no es correcto");
                    return false;                    
                 } 
            }
            else
            {

                msg_box("Los passwords no coinciden");
                return false;
            }
        }          
        
        
        
    });
}

function comprobar_password()
{        
    var resultado= false;
    $.ajax({
        url: "../../opciones/cambiar_password/acc_cambiar_password.php",
        dataType: 'json',
        async : false,
        type: "POST",
        data: '_accion=comprobar_password_anterior&password='+ $("#txt_password_anterior_cambiar_password").val(),                
        success: function(data) {
           if(data.valido == "true")
           {                    
                resultado = true ;         
           }
        }
    });
    return resultado;
}