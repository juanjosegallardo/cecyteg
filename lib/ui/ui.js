function iniciar_msgbox()
{ 
    $("#msgbox_cargando").html('<div id="mensaje_cargando">Cargando..</div>');
    
    $("#msgbox_cargando").dialog({
		modal:true,
		autoOpen:false,
        open : function(){
            $("#msgbox_cargando a.ui-dialog-titlebar-close").hide();                                                            
        },
        closeOnEscape: false
   });    
            
}


function cambiar_paginado(div, registros_por_pagina) {
    $("#" + div).attr("pagina","1");
    $("#" + div).attr("registros_por_pagina", registros_por_pagina.toString());
    $("#" + div).attr("iniciado", "false");
    iniciar_grids_server();
}

function ir_a_pagina(div, pagina) {

    $("#" + div).attr("pagina", pagina.toString());
    $("#" + div).attr("iniciado", "false");
    iniciar_grids_server();

}

function filtrar_grid_server(div,cadena) {
    $("#" + div).attr("pagina", "1");
    $("#" + div).attr("filtro", cadena);
    $("#" + div).attr("iniciado", "false");
    iniciar_grids_server();
}

function ordenar_por(div, campo) {
    if (campo != $("#" + div).attr("campo_ordenacion")) { //resetea el tipo de ordenacion encaso de cambiar de campo
        $("#" + div).attr("tipo_ordenacion", "");
    }
    $("#" + div).attr("campo_ordenacion", campo.toString())
    if ($("#" + div).attr("tipo_ordenacion") == "asc") {
        $("#" + div).attr("tipo_ordenacion", "desc");
    }
    else
    {
        $("#" + div).attr("tipo_ordenacion", "asc");
    }
    $("#" + div).attr("iniciado", "false");
    iniciar_grids_server();

}

function iniciar_grids_server() {
    $(".grid_server").each(function() {        
        var ruta = $(this).attr('ruta');
        var div_principal = $(this);
        var id = $(this).attr('id');
        if (div_principal.attr('iniciado') == "" || div_principal.attr('iniciado') == undefined) {
            div_principal.attr("pagina", "1");
            div_principal.attr("registros_por_pagina", "");
            if(div_principal.attr("tipo_ordenacion")== undefined )
            {
                div_principal.attr("tipo_ordenacion", "");    
            }
            if(div_principal.attr("campo_ordenacion")== undefined )
            {
                div_principal.attr("campo_ordenacion", "");
            }
            div_principal.attr("filtro", "");
        }
        if (div_principal.attr("iniciado") != "true") {
            div_principal.attr("iniciado", "true");
            $.ajax({
                url: ruta,
                dataType: 'json',
                type: "POST",
                data: '_accion=' + id + '&registros_por_pagina=' + div_principal.attr("registros_por_pagina") + "&no_pagina=" + div_principal.attr("pagina") + "&campo_ordenacion=" + div_principal.attr("campo_ordenacion") + "&tipo_ordenacion=" + div_principal.attr("tipo_ordenacion") + "&filtro=" + div_principal.attr("filtro"),
                beforeSend: function() {
                    div_principal.html('<div>Cargando...</div>');
                },
                success: function(data) {
                    
                    var arr_mix = Array();                     
                    arr_mix = data.ordenacion.concat(data.parametros_renglon);                                                                                     
            
                    var arr_aux = Array();
                    for(var i =0 ; i < arr_mix.length ; i++)
                    {                        
                        if($.inArray(arr_mix[i].toString(),arr_aux) == -1)
                        {
                            arr_aux.push(arr_mix[i]);
                        }
                    }
                    arr_mix = arr_aux;                    

                    if (data.total_registros != 0 || data.filtro != "") {
                        div_principal.html("");
                        if (data.buscar) {
                            div_principal.append('<label>Buscar</label>&nbsp;&nbsp;<input type="text" id="grd_txt_' + id + '" /><br /><br />');
                        }
                        div_principal.append('<table class="ui-widget-content ui-corner-all"  id="grd_' + id + '" rules="groups"></table>');                        
                        for (var i = 0; i < data.encabezados.length; i++) {
                            $("#grd_" + id).append('<colgroup width="' + data.anchos[i] + '" class="ui-widget-content"></colgroup>');
                        }
                        $("#grd_" + id).attr("width", data.ancho_grid);
                        var cadena = "";
                        cadena += '<thead class="ui-widget ui-widget-header encabezado">';

                        for (var i = 0; i < data.encabezados.length; i++) {
                            cadena += '<th class="encabezado" id="grd_encabezado_' + id + '_' + i.toString() + '"';
                            if (data.ordenacion[i] != "") {
                                cadena += 'style="cursor: pointer;" onclick="ordenar_por(\'' + id + '\',\'' + data.ordenacion[i] + '\')" ';
                            }
                            var icono_ordenacion ='';
                            if(data.ordenacion[i]==data.campo_ordenacion && data.campo_ordenacion !="")
                            {
                                if(data.tipo_ordenacion == "asc")
                                {
                                    icono_ordenacion='<span style="float: right; margin-right: .3em;" class="ui-icon ui-icon-circle-triangle-n"></span>';                                        
                                }
                                else
                                {                                    
                                    icono_ordenacion='<span style="float: right; margin-right: .3em;" class="ui-icon ui-icon-circle-triangle-s"></span>';
                                }
                                
                            }
                            
                            cadena += '><p>' + data.encabezados[i] + icono_ordenacion + '</p></th>';
                        }
                        cadena += "</thead>";

                        //Cuerpo
                        cadena += '<tbody  class="ui-widget-content">';
                        
                        for (var i = 0; i < data.renglones.length; i++) {
                            var class_renglon="";
                            if(i%2==1)
                            {
                                class_renglon = "renglon_default ui-state-default";
                            }
                            else
                            {                                
                                 class_renglon = "renglon_activo ui-state-hover";                                
                            }
                            
                            var cadena_aux = data.propiedad_renglon;                            
                            if(data.parametros_renglon != null && data.parametros_renglon != undefined )
                            {
                                for(var j = 0 ; j < data.parametros_renglon.length; j++ )
                                {
                                    var indice_columna =$.inArray(data.parametros_renglon[j],arr_mix);                                                                                                      
                                    if(indice_columna != -1)
                                    {
                                        cadena_aux = cadena_aux.replace(data.caracter_sustitucion,data.renglones[i].celdas[indice_columna]);                                                                                
                                    }                                                                           
                                }    
                            }
                            
                            
                            
                            cadena += '<tr '+ cadena_aux +' class="renglon_grid ' + class_renglon +'"'+ data.renglones[i].propiedad_renglon + '>' ;
                            for (var j = 0; j < data.ordenacion.length; j++) {
                               
                               //Tamaños maximos
                               
                                var indice_columna = $.inArray(data.ordenacion[j],arr_mix);                                                                                                                                   
                                if(indice_columna != -1)
                                {
                                    if (data.longitudes_maximas[j] > 0 && data.renglones[i].celdas[j].length > data.longitudes_maximas[j]) {
                                        cadena += '<td align="center">';
                                        cadena += '<label title="' + data.renglones[i].celdas[indice_columna] + '">' +data.renglones[i].celdas[indice_columna].substring(0, data.longitudes_maximas[j]) + '...' + '</label>' ;
                                    }
                                    else {
                                        cadena += '<td align="center" >';
                                        cadena += data.renglones[i].celdas[indice_columna];
                                    }
                                    cadena += "</td>";

                                }
                            }
                            cadena += "</tr>";

                        }
                        cadena += "</tbody>";

                        //Pie

                        var desde;
                        var hasta;
                        if (data.total_registros != 0) {
                            desde = (data.pagina - 1) * data.registros_por_pagina + 1;
                            hasta = (parseInt(desde - 1) + parseInt(data.registros_por_pagina )< parseInt(data.total_registros)) ? (parseInt(desde - 1) + parseInt(data.registros_por_pagina)) : data.total_registros;
                        }
                        else {
                            desde = 0;
                            hasta =0;
                        }
                       
                        
                        cadena += '<tfoot class="ui-widget ui-widget-header encabezado"><tr><td colspan="' + data.encabezados.length.toString() + '">';                        
                        cadena += '<table width="100%"><tr>';
                        cadena += '<td align="left">';                                                
                        cadena += '<div style="height: 20px">' + desde.toString() + "-" + hasta.toString() + " de " + data.total_registros.toString() + '</div>';                                              
                        cadena += '<span>Página&nbsp;&nbsp;</span>';
                        
                        for (var i = 1; i <= data.total_paginas; i++) {
                            if (data.total_paginas - data.pagina > 2 && i == data.total_paginas) {
                                cadena += '<span>..</span>';
                            }                            
                            if (i == 1 || i == data.total_paginas || i == data.pagina || i == parseInt(data.pagina) - 1 || i == parseInt(data.pagina) + 1 || (data.pagina <= 2 && i == parseInt(data.pagina) + 2) || (data.pagina == 1 && i == parseInt(data.pagina) + 3) || (data.pagina >= data.total_paginas - 1 && i == data.pagina - 2) || (data.pagina == data.total_paginas && i == data.pagina - 3)) {
                                cadena += '<span id="grd_no_pagina_' + id + '_' + i.toString() + '"+  class="boton_grid ui-widget-content ui-state-default" onclick="ir_a_pagina(\'' + id + '\',' + i.toString() + ')" >' + i.toString() + '</span>&nbsp;';
                            }
                            if (data.pagina > 3 && i == 1) {
                                cadena += '<span>&nbsp;...&nbsp;</span>';
                            }
                        }                                                                                                                                                                                               
                        cadena += '</td>';                        
                        cadena += '<td align="right">';   
                        cadena += '<form method="post" id="frm_excel_' + id + '" target="_blank" action="' + ruta + '">';
                        cadena += '<input type="hidden" name="excel" value="true">';
                        cadena += '<input type="hidden" name="_accion" value="' + id + '">';
                        cadena += '<input type="hidden" name="filtro" value="' + div_principal.attr("filtro") + '">';
                        cadena += '<input type="hidden" name="tipo_ordenacion" value="' + div_principal.attr("tipo_ordenacion") + '">';
                        cadena += '<input type="hidden" name="campo_ordenacion" value="' + div_principal.attr("campo_ordenacion") + '">';                                                
                        cadena += '<div onclick="$(\'#frm_excel_'+ id + '\').submit()" style="height: 20px; width:100px; cursor: pointer;">Exportar<span style="float: right;margin-right: .3em;" class="ui-icon ui-icon-disk"></span></div></form>';                            
                        cadena += '<div>Cant. por página: ';
                        cadena += '<span class="boton_grid ui-widget-content ui-state-default" onclick="cambiar_paginado(\'' + id + '\',5)" id="grd_pagina_' + id + '_5" >5</span>';
                        cadena += '<span>&nbsp;</span>';
                        cadena += '<span class="boton_grid ui-widget-content ui-state-default" onclick="cambiar_paginado(\'' + id + '\',15)"  id="grd_pagina_' + id + '_15" >15</span>';
                        cadena += '<span>&nbsp;</span>';
                        cadena += '<span class="boton_grid ui-widget-content ui-state-default"  onclick="cambiar_paginado(\'' + id + '\',50)"  id="grd_pagina_' + id + '_50">50</span>';
                        cadena += '</div>';                                               
                        cadena += '</td>';                                                                                                                                                
                        cadena += '</tr></table>';                                    
                        cadena += "</td></tr></tfoot>";
                        $("#grd_" + id).append(cadena);

                        //Anchos de las columnas
                       /* for (var i = 0; i < data.anchos.length; i++) {
                            var class_renglon = 'tr_' + id + '_' + i.toString();
                            $("." + class_renglon).attr("width", data.anchos[i])
                        }*/

                        $("#grd_" + id ).attr("cellspacing","0");                        
                        $("#grd_pagina_" + id + "_" + data.registros_por_pagina.toString()).removeClass("ui-state-default").addClass("ui-state-active");
                        $('#grd_no_pagina_' + id + '_' + data.pagina.toString()).removeClass("ui-state-default").addClass("ui-state-active");
                        $("#grd_pagina_" + id + "_" + data.registros_por_pagina.toString()).unbind('click');
                        $("#grd_pagina_" + id + "_" + data.registros_por_pagina.toString()).attr('onclick', '');
                        $('#grd_no_pagina_' + id + '_' + data.pagina.toString()).unbind('click');
                        $('#grd_no_pagina_' + id + '_' + data.pagina.toString()).attr('onclick', '');                        

                        //variables
                        div_principal.attr("registros_por_pagina", data.registros_por_pagina.toString());
                        div_principal.attr("pagina", data.pagina.toString());
                        
                        $('#grd_txt_' + id).keypress(function(event) {
                            if (event.keyCode == '13') {
                                filtrar_grid_server(id, $(this).val());
                                return false;

                            }
                        });

                        $('#grd_txt_' + id).val(data.filtro);
                        if ($('#grd_txt_' + id).val() != "") {
                            $('#grd_txt_' + id).focus();
                        }
                        
                        $(".renglon_activo").hover(function(){
                            $(this).removeClass("ui-state-hover").addClass("ui-state-active"); 
                        },function(){
                            $(this).removeClass("ui-state-active").addClass("ui-state-hover");                             
                        });
                        

                        $(".renglon_default").hover(function(){
                            $(this).removeClass("ui-state-default").addClass("ui-state-active");
                        },function(){
                            $(this).removeClass("ui-state-active").addClass("ui-state-default");  
                        });

                        
                        $(".boton_grid").hover(function(){
                            $(this).addClass("ui-state-hover");  
                        },function(){
                            $(this).removeClass("ui-state-hover") 
                        });
                        
                        $(".boton_grid").css("cursor","pointer");
                    }
                    else {

                        div_principal.html( '<div class="ui-widget"  style="width: 250px"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>' + data.mensaje +  '</p></div></div>');                        
                    }

                }
            });
        }
    });
}

function iniciar_combos()
{  
    $(".combo_server").each(function() { 
        if($(this).attr("iniciado")!= "true")
        {
         $(this).attr("iniciado","true");
         var combo= $(this); 
         var ruta = combo.attr("ruta");
         var deshabilitado = combo.attr("disabled")==undefined?"false":combo.attr("disabled").toString();         
         var id= combo.attr("id");
         var datos_padre="";
         if(combo.attr("datos_padre")!=undefined && combo.attr("datos_padre")!="" )
         {            
            datos_padre="&"+ combo.attr("datos_padre");            
         }   
         var asincrono = !(combo.attr("asincrono")=="false");
          $.ajax({
                url: ruta,
                dataType: 'json',
                type: "POST",
                data: '_accion=' + id + datos_padre,
                async: asincrono,
                beforeSend: function() {
                    if(deshabilitado=="false")
                    {
                        combo.attr('disabled', true);
                    }                                        
                    combo.html('<option value="">cargando...</option>');
                    combo.val("");
                },
                success: function(data) {

                    if(deshabilitado=="false")
                    {
                        combo.removeAttr("disabled");
                    }
                    combo.html("");
                    for(var i=0; i<data.datos.length ;i++)
                    {                        
                        combo.append('<option value="'+data.datos[i].valor +'">'+ data.datos[i].texto + '</option>');                        
                    }
					
					
                    if(combo.attr("hijo")!=undefined && combo.attr("hijo")!="")
                    {                              
                        if(combo.attr("evento_creado") !="true")
                        {                      
						
							
							
							
                            combo.change(function(){   
								var arr_resultado= Array();	
								if( $("#"+ combo.attr("hijo")).attr("datos_padre") !=undefined)
								{
										  
									arr_data= $("#"+ combo.attr("hijo")).attr("datos_padre").split("&");
			
									encontrado = false;
									for(i=0;i<arr_data.length; i++)
									{
										arr_propiedades= arr_data[i].split("=");
										
										if(arr_propiedades[0] == combo.attr('campo'))
										{
											
											 arr_propiedades[1]= combo.val();											 
											 encontrado = true;
										}
										arr_resultado.push(arr_propiedades.join("="));  
										
									}
									if(!encontrado)
									{
										arr_resultado.push( combo.attr('campo') + "=" + combo.val()); 
									
									}
									
									
									$("#"+ combo.attr("hijo")).attr("datos_padre",arr_resultado.join("&"));
								}
								else
								{

									$("#"+ combo.attr("hijo")).attr("datos_padre", combo.attr('campo') + "=" + combo.val())
								}				
                                $("#"+ combo.attr("hijo")).attr("iniciado","false");                                                                
                                iniciar_combos();
								
								
                            });   
                            combo.attr("evento_creado","true"); 
                        }
                                                
                        
                        
                    }
                    if(data.valor_seleccionado =="")
                    {
                        var valor_seleccionado = combo.attr("valor_seleccionado");
                        if(valor_seleccionado!=undefined)
                        {
                             combo.val(valor_seleccionado);
                            if(combo.attr("hijo")!=undefined && combo.attr("hijo")!="")
                            {
                                $("#"+ combo.attr("hijo")).attr("datos_padre",  combo.attr('campo') + "=" + valor_seleccionado);
                            }
                        }
                        

                                               
                    }
                    else
                    {                        
                        combo.val(data.valor_seleccionado);                                                                                           
                    }          
                    

                                                                      
                }
          });
            
            
            
            
        }
    });
}

function iniciar_botones()
{
	$('.boton').each(function() {
		$(this).button();

	});
}


function iniciar_tabs() {
    $('.tab').each(function() {
        if($(this).attr('iniciado')!="true")
        { 
			try
			{            	
            	$(this).attr( {iniciado: "true"});
					
				$(this).bind('tabsshow', function(event, ui) {
					iniciar_grids_server();
					iniciar_botones();                     
                    eval($("#tabs-"+$(this).attr('id') +"-" + (parseInt(ui.index )+ 1).toString()).attr("funciones_js"));                            
				});
   			    $(this).tabs({ajaxOptions: { 					
					cache: false,
					async: false	
				}});			
			}
			catch(e)
			{}			
        }   
    });


}

function iniciar_acordiones() {
    $('.acordion').each(function() { 
        if($(this).attr('iniciado')!="true")
        { 
            $('#' + $(this).attr('id')).accordion({ header: "h3" }); 
            $(this).attr( {iniciado: "true"});
        }
    });
    $('.acordion_tab').each(function() { 
        if($(this).attr('iniciado')!="true")
        { 
            $(this).html('Cargando <img src="../../../public/images/generales/ajax-loader-blue.gif" />');
            $(this).attr( {iniciado: "true"});
        } 
    });
    $('.acordion_tab').each(function() { 
        if($(this).attr('iniciado')!="true")
        { 
            var destino = $('#' + $(this).attr('id')); 
            $.ajax({ 
                url: $(this).attr('pagina'), 
                cache: false , 
                async: false, 
                success: function(html) { 
                    $(destino).html(html); 
                }
            });
            $(this).attr( {iniciado: "true"});
        }
    });
}

function iniciar_menus()
{
	$('.seccion_menu').each(function(){	
		$(this).removeClass().addClass("fondo_inactivo");
		$(this).hover(function() {
			$(this).removeClass().addClass("fondo_activo");
		},function() {
			if($(this).attr('activo')!="true")
			{
				$(this).removeClass().addClass("fondo_inactivo");
			}
		});	
		$(this).click(function() {			

			$('.fondo_activo').each(function(){	
				$(this).removeClass().addClass("fondo_inactivo");
				$(this).attr( {activo: "false"});
			});
			$(this).attr( {activo: "true"});
			$(this).removeClass().addClass("fondo_activo");
		});
	});
}


function msg_box(texto)
{
	
		$("#msgbox").html(texto);
		$("#msgbox").dialog({
			modal:true,
			autoOpen:true,
			beforeclose: function(){$("#msgbox").dialog("destroy"); },
            closeOnEscape: false,
            buttons: {				
				"Aceptar": function(){					
					$(this).dialog("close");
				} 				
			}
		});
}



function confirm_box(texto,funcion)
{
		var resultado;
		$("#msgbox").html(texto);
		$("#msgbox").attr("resultado","")
		$("#msgbox").dialog({
			modal:true,
			autoOpen:true,
			beforeclose: function(){$("#msgbox").dialog("destroy"); },
            closeOnEscape: false,
			buttons: {
				"Cancelar":function(){
					$(this).attr('resultado','false'); 
					$(this).dialog("close");
					eval(funcion);
				},
				"Aceptar": function(){
					$(this).attr('resultado','true'); 
					$(this).dialog("close");
					eval(funcion);
				} 				
			}
		});
		

}

function confirm_box_funciones(texto,funcion_verdadera, funcion_falsa)
{
		var resultado;
		$("#msgbox").html(texto);
		$("#msgbox").attr("resultado","")
		$("#msgbox").dialog({
			modal:true,
			autoOpen:true,
			beforeclose: function(){$("#msgbox").dialog("destroy"); },
            closeOnEscape: false,
			buttons: {
				"Cancelar":function(){
					$(this).attr('resultado','false'); 
					$(this).dialog("close");
                    funciones_confirm_box(funcion_verdadera,funcion_falsa);					
				},
				"Aceptar": function(){
					$(this).attr('resultado','true'); 
					$(this).dialog("close");
                    funciones_confirm_box(funcion_verdadera,funcion_falsa);				
				} 				
			}
		});
}

function funciones_confirm_box(funcion_verdadera, funcion_falsa)
{
    if(	$("#msgbox").attr("resultado") =="true" )
    {
        eval(funcion_verdadera);        
    }
    else if(funcion_falsa!="")
    {
        
        eval(funcion_falsa);
    }
}



// JavaScript Document
function get_radio(name)
{
	ctrl=document.getElementsByName(name);
    for(i=0;i<ctrl.length;i++)
        if(ctrl[i].checked) 
			return ctrl[i].value;
}

function enviar_formulario(id_formulario,accion)
{        
    if($("#msgbox").attr('resultado')=="true")
	{    	
	   	$("#" + id_formulario).append('<input type="hidden" name="_accion" value="'+accion+'" />');	
    	$("#" + id_formulario).submit();
    }    
}

function msg_box_focus(texto,elemento)
{
	
		$("#msgbox").html(texto);
		$("#msgbox").dialog({
			modal:true,
			autoOpen:true,
			beforeclose: function(){$("#msgbox").dialog("destroy"); },
            buttons: {				
				"Aceptar": function(){					
					$(this).dialog("close");
				} 				
			},
            close: function() {elemento.focus();}
		});
}

(function($) {
    
    $.fn.validar_formulario = function(opciones_user)
    {
        var formulario = $(this);
        opciones_default = {                    
            antes_enviar: function(){
                return true;
            },
            al_enviar: function(){ 
                return;
            }
        }

                         
        opciones = jQuery.extend(opciones_default , opciones_user);
         
        var validado = true;
        var id_formulario= formulario.attr("id");        
        $("#" + id_formulario +  " input,#" + id_formulario +  " select").each(function(){            
           var longitud_minima = $(this).attr("longitud_minima");
           var longitud=$(this).val().length; 
           var valor=$(this).val();   
           var expresion_regular =  ($(this).attr("exp")!=undefined)?  eval($(this).attr("exp") + ";") :undefined;  
           var mensaje = $(this).attr("mensaje");
           var componente = $(this);
           var menor_que = $(this).attr("menor_que")==undefined?undefined:($(this).attr("menor_que"));
           var mayor_que = $(this).attr("mayor_que")==undefined?undefined:($(this).attr("mayor_que"));
           var obligatorio = $(this).attr("obligatorio")==undefined?"false":$(this).attr("obligatorio");
           var maximo = $(this).attr("maximo")==undefined?undefined:($(this).attr("maximo"));
           var minimo = $(this).attr("minimo")==undefined?undefined:($(this).attr("minimo"));
           
           if(obligatorio=="true" && valor=="")
           {                        
                if(mensaje != undefined)
                {
                    msg_box_focus(mensaje,$(this) );
                } 
               validado=false;            
               return false;
           }
           if(longitud_minima != undefined && longitud < longitud_minima )
           {
                if(mensaje != undefined)
                {
                    msg_box_focus(mensaje, $(this));
                }                
                validado=false;            
                return false;
           }
           if(expresion_regular != undefined)
           {                        
                if(!expresion_regular.test(valor))
                {
                    if(mensaje != undefined)
                    {
                        msg_box_focus(mensaje, $(this));                    
                    } 
                    validado=false;                
                    return false;
                }             
           }        
           
           var valor_flotante = parseFloat(valor.replace(/\-/ ,""));
              
           if( menor_que!= undefined &&  valor_flotante >= parseFloat(menor_que))
           {       
                if(mensaje != undefined)
                {
                    msg_box_focus(mensaje,$(this));                    
                } 
                validado=false;                
                return false;            
           }
                 
           if( mayor_que!= undefined &&  valor_flotante <= parseFloat(mayor_que))
           {       
                if(mensaje != undefined)
                {
                    msg_box_focus(mensaje,$(this));                    
                }
                validado=false;                
                return false; 
           }
           
          if( maximo!= undefined &&  valor_flotante > parseFloat(maximo))
           {   
                if(mensaje != undefined)
                {
                    msg_box_focus(mensaje,$(this));                    
                } 
                validado=false;                
                return false;            
           }
                
           if( minimo!= undefined &&  valor_flotante < parseFloat(minimo))
           {                   
                if(mensaje != undefined)
                {
                    msg_box_focus(mensaje,$(this));                    
                }
                validado=false;                
                return false; 
           }
  
              
        });           
        $("#" + id_formulario +  " input:file").each(function(){            
            var ruta = $(this).val();              
            var arr_extensiones = $(this).attr("extensiones_permitidas").toString().split(",");                        
            var bandera= false;
            arr_aux = ruta.split(".");
                                
            var extension = "";
            if(arr_aux.length > 0)
            {
                extension = arr_aux[arr_aux.length - 1];    
            }
            
            for(var i =0;i< arr_extensiones.length; i++)
            {
                               
                if(extension.toLowerCase() == arr_extensiones[i].toLowerCase())
                {
                      bandera = true;
                }           
                                    
            }
            if(bandera == false)
            {                
                validado = false;
                msg_box_focus("Extension no permitida",$(this));
                return false;  
            }                                              
        }); 
        if(validado && opciones.antes_enviar())
        {
            confirm_box("¿Los datos son correctos?", "opciones.al_enviar()");    
        }   	    
    }
})(jQuery);

function iniciar_formulario(id_formulario)
{
    $("#" + id_formulario +  " input").each(function(){        
       //alert($(this).attr("id"));
       var caracteres = $(this).attr("caracteres");
       if(caracteres != undefined)
       {
            bloquear_caracteres($(this) ,caracteres)
       } 
    });
    
    $("#" + id_formulario).keypress(function(e){      
        if(e.keyCode == 13){
          return false;
        }
    });
    iniciar_botones();
    iniciar_combos();   
    iniciar_calendarios();
    iniciar_checks();
}


function caracter_es_valido(caracter, cadena_validos)
{    
    var valido = false;
    var arr_caracteres = cadena_validos.split(",");
    for(var i=0;i< arr_caracteres.length; i++)
    {        
        //$("#div_pruebas").append(caracter.toString() + " ");
        if($.inArray("-",arr_caracteres[i])!=-1)
        {            
            var arr_rango=arr_caracteres[i].split("-");                        
            if(parseInt(arr_rango[0]) <=  parseInt(caracter) && parseInt(caracter) <= parseInt(arr_rango[1]))
            {
                valido = true;
            }                          
        }
        else
        {
            if(parseInt(caracter) == parseInt(arr_caracteres[i]))
            {
                valido = true;   
            }            
        }
    }    
    return valido;
}

function  bloquear_caracteres(control ,caracteres)
{
    control.keypress(function(event) {   
        
        if (event.which!=0 &&  !caracter_es_valido(event.which, caracteres)) 
        {
            return false;
        }
    });    
}

function iniciar_calendarios()
{
    $(".fecha").each(function(){
       $(this).datepicker({            
            changeMonth: true,
			changeYear: true,
            dateFormat: 'yy-mm-dd'
        
       });       
    });
	
}

function iniciar_checks()
{
    $(".checkbox").each(function(){
         $(this).attr("iniciado","true");
         var checks= $(this); 
         var ruta = checks.attr("ruta");
         var deshabilitado = checks.attr("disabled")==undefined?"false":checks.attr("disabled").toString();         
         var id= checks.attr("id");   
          $.ajax({
                url: ruta,
                dataType: 'json',
                type: "POST",
                data: '_accion=' + id,
                beforeSend: function() {                                                        
                    checks.html('Cargando...');                    
                },
                success: function(data) {   
                    checks.html('');
                    if( data.datos  != undefined)
                    {
                        for(var i=0; i<data.datos.length ;i++)
                        {         
                            var checked=(data.datos_seleccionados.length > 0 && $.inArray(data.datos[i].valor ,data.datos_seleccionados) != -1)?'checked="checked"':"";                                                        
                            
                            var disabled=(checks.attr("disabled")!=undefined && checks.attr("disabled")!="false"  && checks.attr("disabled")!=false )? 'disabled="disabled"':"";                                                          
                            checks.append('<input name="'+id +'[]" '+ checked +' ' + disabled + ' type="checkbox" id="' + id +'_'+ data.datos[i].valor  + '" value="' + data.datos[i].valor + '" ><label for="' + id +'_'+ data.datos[i].valor  + '">' + data.datos[i].texto + '</label><br/> ');                 
                        } 
                    }
   
                    /*for(var i=0; i<data.datos_seleccionados.length ;i++)
                    {                        
                        $(id +'_'+ data.datos[i].valor).attr("checked","checked");
                        alert(id +'_'+ data.datos[i].valor);                 
                    }     */           
                }
          });
 
    });
	
}
