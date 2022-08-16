function iniciar_tab_dias_asistencia()
{    
    swfobject.embedSWF("../../../lib/ofc/open-flash-chart.swf", "grp_dias_asistencia", "450", "300", "9.0.0", "expressInstall.swf",{"get-data":"grp_dias_asistencia"} );    
}


function iniciar_tab_ventas_mensuales()
{        
    swfobject.embedSWF("../../../lib/ofc/open-flash-chart.swf", "grp_ventas_mensuales", "750", "300", "9.0.0", "expressInstall.swf",{"get-data":"grp_ventas_mensuales"} );    
}

function grp_dias_asistencia()
{
    return cargar_grafica("grp_dias_asistencia")
}

function grp_ventas_mensuales()
{
    return cargar_grafica("grp_ventas_mensuales")
}

function cargar_grafica(id_grafica)
{
    var datos = ""
    $.ajax({
        url: "../generales/prp_grafica.php",
        dataType: 'json',
        type: "POST",
        async: false,
        data: '_accion=' + id_grafica,
        success: function(data) {
            datos = data;
        }        
    });
    return JSON.stringify(datos);
}
