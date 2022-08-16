
function mostrar_sincrono(pagina, destino)
{ 
	$("#" + destino).html('<div>Cargando...</div>');
    $.ajax({
        url: pagina,
        cache: false,
        async: false,
        success: function(html){
            $("#" + destino).html(html);
        }
    });
}

