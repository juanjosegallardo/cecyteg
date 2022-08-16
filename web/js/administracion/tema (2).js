// JavaScript Document
function iniciar_tab_tema()
{	                   
	 iniciar_formulario('frm_modificar_tema');

    var picker = $.farbtastic('#cp_color_tema');  
    picker.setColor($("#hdn_color_tema").val());
    picker.linkTo(onColorChange); 
    
    function onColorChange(color) {
        $("#hdn_color_tema").val(color);
        $("body").css("background-color", color); 
    }
    
    $("#cmb_tema_tema").change(function(){
        $("#css_tema").attr("href", "../../../lib/ui/ui/css/" + $("#cmb_tema_tema").val() + "/jquery-ui-1.8.14.custom.css");
    });
}

function modificar_tema()
{	    
    $("#frm_modificar_tema").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_modificar_tema','modificar');
        },
        antes_enviar: function()
        {            
            return true;
        }          
    });
}
function restaurar_tema()
{
    $.ajax({
        url: "../../administracion/temas/prp_tema.php",
        dataType: 'json',
        type: "POST",
        data: '_accion=json_tema',                
        success: function(data) {
            $("#css_tema").attr("href", "../../../lib/ui/ui/css/" + data.tema + "/jquery-ui-1.8.14.custom.css");
            $("#cmb_tema_tema").val(data.tema);
            $("body").css("background-color", data.color_fondo);
            $("#hdn_color_tema").val(data.color_fondo);      
            if($("#cp_color_tema").length  ) 
            {
                var picker = $.farbtastic('#cp_color_tema');     
                picker.setColor($("#hdn_color_tema").val());                                  
            }
            
        }
    });
    
    
}