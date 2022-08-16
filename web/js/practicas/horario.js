 

function iniciar_tab_horarios()
{
	
	iniciar_formulario("frm_agregar_clase");
	//cargar_horario(0);	
	$(".celda_horario").each(function(){
		$(this).css("cursor","pointer");
		$(this).click(function(){});
	});
    
    $("#sel_horarios_aula").change(function()
    {
       actualizar_horario(); 
    });
	
	$(".hora_practica").each(function(){
	
       
        $(this).click(function(){
            if($(this).html()=="")
            {
    			$("#horario_fecha_hora").val($(this).attr("fecha") +" "+$(this).attr("hora"));
    			$("#hdn_horario_id_aula").val($("#sel_horarios_aula").val());
    			$("#horario_aula").val($("#sel_horarios_aula :selected").attr("text"));
    			$("#cmb_modulos").val("1");
    			abrir_horario();
            
            }	
            else
            {
                
                $("#td_descripcion_clase").html($(this).html()+ "<br />" + $(this).attr("fecha")+ " "+$(this).attr("hora"));
                $("#msg_borrar_clase").html("");
                $("#hdn_id_horario_clase").val($(this).attr("id_clase"));
				
				 $("#link_practica_clase").attr("href","../practicas/xls_practica.php?id_clase="+$(this).attr("id_clase"));
				 
                abrir_borrar_horario();
            }		   
		});    
         
    	
        
		$(this).css("cursor","pointer");
	});
	cargar_horario(0);
}

function semana_siguiente()
{	
	var semana= parseInt($("#hdn_semana").val());
	semana++;
	$("#hdn_semana").val(semana);
	cargar_horario(semana);
}


function abrir_borrar_horario()
{
    
    

    
    $("#div_horario_borrar_practica").dialog({
		modal:true,
		autoOpen:true,
		resizable: false,
        width:'auto',
        open : function(){
            $("#div_horario_agregar_practica a.ui-dialog-titlebar-close").hide();       

        },
        	closeOnEscape: false
    });  

}

function borrar_clase()
{
   $.ajax({
        url: "../horarios/acc_horario.php",
        dataType: 'json',
        type: "POST",
        data: "_accion=borrar_clase&" + $("#frm_borrar_clase").serialize(),
        beforeSend: function() {                                                        
       	 	$("#msg_borrar_clase").html('Borrando...');                    
        },
        success: function(data) {   

			$("#msg_borrar_clase").html(data.mensaje);   
            var semana= parseInt($("#hdn_semana").val());	
            cargar_horario(semana);
        }
  });
    
    
}


function semana_anterior()
{
	
	var semana= parseInt($("#hdn_semana").val());
	
		semana--;
		$("#hdn_semana").val(semana);
	cargar_horario(semana);	
}

function actualizar_horario()
{
    var semana= parseInt($("#hdn_semana").val());	
    cargar_horario(semana);
}

function cargar_horario(semana)
{
	
	 $.ajax({
        url: "../horarios/prp_horario.php",
        dataType: 'json',
        type: "POST",
        data: "_accion=json_dias_semana&semana= "+semana,
        beforeSend: function()
        {
         	for(i=0;i<5;i++)
			{
				$("#dia_semana_"+ (i+1).toString()).html("Cargando...");				
			}
        },
        success: function(data) {        
			var i;
			for(i=0;i<data.length;i++)
			{
				$("#dia_semana_"+ (i+1).toString()).html(data[i]);
				$(".fecha_oculta_"+(i+1).toString() ).each(function(){
					$(this).attr("fecha",data[i]);								 
				});
			}
			
			cargar_clases(data[0].toString(), data[4].toString(), $("#sel_horarios_aula").val());
        }
    });
}


function cargar_clases(fecha_inicio, fecha_fin, aula)
{    	
	$.ajax({
        url: "../horarios/prp_horario.php",
        dataType: 'json',
        type: "POST",
        data: "_accion=json_clases&fecha_inicio= "+fecha_inicio + "&fecha_fin=" +fecha_fin+ "&aula="+ aula,
        beforeSend: function()
        {
       		$(".hora_practica").each(function(){
			     $(this).html("Cargando...");
			});
        },
        success: function(data) {        

       		$(".hora_practica").each(function(){
			     $(this).html("");
			});
            
        
            var i;
            for(i=0; i<data.length; i++)
            {
                renglon=parseInt( $("td[fecha="+data[i].fecha +"][hora=\'"+data[i].hora_entrada+"\']").attr("renglon"));
                               
              
                var j;
                for(j=renglon;j<renglon + parseInt(data[i].modulos); j++)
                {
                
                    $("td[fecha="+data[i].fecha +"][renglon=" + j.toString() + "]").html(data[i].nombre + "<br />" + data[i].grupo + "<br />" + data[i].materia);                    
                      $("td[fecha="+data[i].fecha +"][renglon=" + j.toString() + "]").attr("id_clase",data[i].id_clase);                    
                  
                }
                            
            }
			
        }
    });
}

function cargar_similar()
{
	 $.ajax({
		url: "../horarios/prp_horario.php",
		dataType: 'json',
		type: "POST",
		data: "_accion=json_similares&" + $("#frm_agregar_clase").serialize(),
		beforeSend: function() {                                                        
			//$("#msg_horario_clase").html('Guardando...');                    
		},
		success: function(data) {   
			$("#cmb_grupo").val(data[0].tbl_grupo_id_grupo);
			
			$("#cmb_profesor").val(data[0].tbl_profesor_id_profesor);
			$("#cmb_profesor").change();
			$("#cmb_materia").val(data[0].tbl_materia_id_materia);
			$("#cmb_materia").change();
			$("#cmb_practica").attr("valor_seleccionado",data[0].tbl_practica_id_practica);
			$("#cmb_modulos").val(data[0].duracion);

		}
  });
}

function abrir_horario()
{
	
		
	
		cargar_similar();
	
		$("#msg_horario_clase").html("");
	    $("#div_horario_agregar_practica").dialog({
		modal:true,
		autoOpen:true,
		resizable: false,
        width:'auto',
        open : function(){
            $("#div_horario_agregar_practica a.ui-dialog-titlebar-close").hide();       

        },
        	closeOnEscape: false
   		});  
	
}



function guardar_clase()
{

	var	bandera = false;
	$("#frm_agregar_clase select").each(function(){  
		if($(this).val()=="")
		{
			bandera= true;	
		}
		
	});
	
	if(bandera || $("#sel_horarios_aula").val()=="")
	{
		$("#msg_horario_clase").html("Error Llene Todos Los Campos!");
	}
	else
	{
		 $.ajax({
                url: "../horarios/acc_horario.php",
                dataType: 'json',
                type: "POST",
                data: "_accion=guardar_clase&" + $("#frm_agregar_clase").serialize(),
                beforeSend: function() {                                                        
               	 	$("#msg_horario_clase").html('Guardando...');                    
                },
                success: function(data) {   
 
					$("#msg_horario_clase").html(data.mensaje);   
                    var semana= parseInt($("#hdn_semana").val());	
                    cargar_horario(semana);
                }
          });
	}

}
