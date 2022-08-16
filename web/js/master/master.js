function iniciar_menu()
{
    $("#aco_menu").accordion(
      {collapsible: true, 
      autoHeight: true,
      active: false 
    });

    $(".submenu").hover(
        function(){
            $(this).addClass("ui-state-hover");
            $(this).addClass("ui-corner-all");
        },
        function(){
            $(this).removeClass("ui-state-hover");
            $(this).removeClass("ui-corner-all");
        }    
    );   
}

function redireccionar_menu(direccion, indice, url)
{    
    if(url.substr(  url.length - direccion.length, direccion.length ) == direccion)
    {        
        $("#tab_principal").tabs( "select" , indice );
    
    }
    else
    {
        location.href = "../../" + direccion +"#ui-tabs-" + (parseInt(indice));        
    }    
}

function enviar_formulario_tab(id_formulario, accion)
{        
    if($("#msgbox").attr('resultado')=="true")
    { 
        var tab_seleccinado =  parseInt($("#tab_principal").tabs('option', 'selected'));                
        $("#"+ id_formulario).append('<input type="hidden" name="_accion" value="'+accion+'" />');	
        $("#"+ id_formulario).append('<input type="hidden" name="_id_tab" value="'+ tab_seleccinado + '" />');
        $("#"+ id_formulario).submit();
    }  
}

function cargar_registro(pagina, variable , radio, div, formulario)
{
    var id_registro = get_radio(radio);
    if(id_registro == undefined)
    {        
        msg_box("Por favor seleccione un registro.");   
    }
    else
    {
        mostrar_sincrono(pagina + "?" + variable + "=" + id_registro, div);
        iniciar_formulario(formulario);
    }
                
}

function cerrar_session()
{
     
    if($("#msgbox").attr("resultado") == "true")
    {
  
        location.href ="../../login/main/acc_cerrar_session.php";        
    }  
      
}
