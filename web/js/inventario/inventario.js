// JavaScript Document

function iniciar_tab_inventario()
{
    //restaurar_tema();    
}

function guardar_inventario()
{	    
    $("#frm_nuevo_inventario").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_nuevo_inventario','guardar');
        }        
        
    });
}

function modificar_inventario()
{	    
    $("#frm_modificar_inventario").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_modificar_inventario','modificar');
        },
        antes_enviar: function()
        {            
            return true;
        }          
    });
}

function borrar_inventario()
{	
    $("#frm_abrir_inventario").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_abrir_inventario','borrar');
        }        
    });
}


function guardar_foto_inventario()
{	    
    $("#frm_foto_inventario").validar_formulario({    
        al_enviar: function (){   
            enviar_formulario_tab('frm_foto_inventario','guardar_foto_inventario');
        }        
        
    });
}




function mostrar_imagen(ruta)
{        
    
    $("#div_fotos").html('<form method="post"  action="../inventario/acc_inventario.php" id="frm_abrir_foto_inventario" name="frm_abrir_foto_inventario"><input type="hidden" name="hdn_ruta" id="hdn_ruta" value="' + ruta + '" /> <div align="center"><img src="' + ruta + '?x=' +(Math.random() *100000 ).toString() + '"  width="400" height="300"  /></div></form>');
	$("#div_fotos").dialog({
        width : '420px',
		modal:true,
		autoOpen:true,
		beforeclose: function(){$("#msgbox").dialog("destroy"); },
        closeOnEscape: false,
        buttons: {				
			
            "Eliminar": function(){		
                                
                    $("#frm_abrir_foto_inventario").validar_formulario({    
                        al_enviar: function (){   
                            enviar_formulario_tab('frm_abrir_foto_inventario','eliminar_foto_inventario');
                        }                                
                    });                
                
			},
            "Cerrar": function(){					
				$(this).dialog("close");
			} 					
		}
	});     
}


function abrir_expediente_inventario()
{
    var id_inventario = get_radio('rad_inventario');
    window.open('../inventario/pdf_expediente_inventario.php?id_inventario=' +  id_inventario  + "&x="+ (Math.random()*1000000).toString());
}

