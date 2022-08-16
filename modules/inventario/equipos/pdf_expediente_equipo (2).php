<?php
define("CPU", "39");


//librerias
include_once("../../../config.php");  
include("../../../lib/ui/cls_tab.php");
include("../../../lib/ui/cls_boton.php");
include("../../../lib/generales/cls_master_page.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");

include("../../../classes/cls_equipo.php");
include("../../../classes/cls_ubicacion.php");
include("../../../classes/cls_inventario.php");
include("../../../classes/cls_usuario.php");

include_once("../../../modules/main/master/dic_principal.php");
include_once("../../../lib/generales/cls_session.php");	
 

//Carga de datos
$id_equipo = $_POST["hdn_foto_equipo_id_equipo"];

$obj_equipo = new Equipo();
$obj_equipo->id_equipo =$id_equipo;
$obj_equipo->cargarPorId();
$obj_equipo->_html_entities = true;

$obj_ubicacion = new Ubicacion();
$obj_ubicacion->id_ubicacion = $obj_equipo->tbl_ubicacion_id_ubicacion;
$obj_ubicacion->cargarPorId();
$obj_ubicacion->_html_entities = true;

$obj_inventario = new Inventario();
$obj_inventario->tbl_tipo_equipo_id_tipo_equipo = CPU;
$obj_inventario->tbl_ubicacion_id_ubicacion = $obj_ubicacion->id_ubicacion;
$obj_inventario->cargarPorTipoYUbicacion();
$obj_inventario->_html_entities = true;

$obj_usuario = new Usuario();
$obj_usuario->id_usuario = $obj_inventario->tbl_usuario_id_usuario;
$obj_usuario->cargarPorId();
$obj_usuario->_html_entities = true;

$obj_inventario->tbl_ubicacion_id_ubicacion = $obj_ubicacion->id_ubicacion;
$obj_inventario->cargarPorUbicacion();

//Componentes adicionales
$arr_componentes_adicionales= array();
$obj_componente = new Inventario();
$obj_componente->_html_entities = true;
$total_hojas = count($_POST["chk_inventario"]) +1 ;

foreach($obj_inventario->_datos as $componente)
{           
        $obj_componente->id_inventario = $componente["id_inventario"];
        $obj_componente->cargarPorId();
        if( is_array($_POST["chk_inventario"]) && $obj_componente->tbl_tipo_equipo_id_tipo_equipo != CPU  && in_array( $obj_componente->tbl_tipo_equipo_id_tipo_equipo,$_POST["chk_inventario"]))
        { 
            array_push($arr_componentes_adicionales,$obj_componente->tipo_equipo);
        }            
}



$ruta_foto = (file_exists("../../../web/uploads/equipos/{$id_equipo}.jpg"))?"../../../web/uploads/equipos/{$id_equipo}.jpg" :"../../../web/images/generales/equipo.jpg";	        

MasterPage::iniciarSeccion(); ?>
<page>
<table style="width: 100%;border-style: solid; border-width: 3px;" cellpadding="0" cellspacing="0">

    <tr>
        <td style="width: 20%;text-align: center; border-style: solid; border-width: 1px; vertical-align: middle; height: 25px; " rowspan="2"><img style="width:61px; height:60px;" src="../../../web/images/generales/logo_cecyteg.jpg" /></td>
        <td style="width: 60%;text-align: center; border-style: solid; border-width: 1px;  vertical-align: middle; height: 25px ">INFRAESTRUCTURA COMPUTACIONAL EN PLANTELES CECYTEG</td>
        <td style="width: 20%;text-align: center; border-style: solid; border-width: 1px; vertical-align: middle; height: 25px;font-size: 9px; text-align: left;" rowspan="2">C&Oacute;DIGO: <br /> NO. REVISI&Oacute;N: 01<br />  FECHA: <?php echo date("d/m/Y") ?><br /> HOJA: 1 de <?php echo $total_hojas ?></td>
    </tr>
    <tr>
        <td style="text-align: center; border-style: solid; border-width: 1px; vertical-align: middle; height: 25px; font-weight: bold;">EXPEDIENTE DE EQUIPO</td>
    </tr>
</table>

<br />

<table style="width: 100%;" cellpadding="0" cellspacing="0">
    <tr >
        <td style="background-color: gray; color: white; font-weight: bold; width: 32%; border-style: solid; border-top-width: 2px; border-right-width: 2px; border-left-width: 2px;">        
            PLANTEL:
        </td>
        <td style="width: 2%;">                   
        </td>
        <td style="background-color: gray; color: white; font-weight: bold; width: 32%; border-style: solid; border-top-width: 2px; border-right-width: 2px; border-left-width: 2px;">        
           FECHA:
        </td>
        <td style="width: 2%;">                   
        </td>
        <td style="background-color: gray; color: white; font-weight: bold; width: 32%; border-style: solid; border-top-width: 2px; border-right-width: 2px; border-left-width: 2px;">        
           FOLIO:
        </td>
    </tr>
    
    <tr >
        <td style="text-align: center; width: 32%; border-style: solid; border-bottom-width: 2px; border-right-width: 2px; border-left-width: 2px;">        
           P&Eacute;NJAMO
        </td>
        <td style="width: 2%;">                   
        </td>
        <td style="text-align: center; width: 32%; border-style: solid; border-bottom-width: 2px; border-right-width: 2px; border-left-width: 2px;">        
          <?php echo date("d") ?> de <?php echo date("M")  ?> de <?php echo date("Y") ?>
        </td>
        <td style="width: 2%;">                   
        </td>
        <td style="text-align: center; width: 32%; border-style: solid; border-bottom-width: 2px; border-right-width: 2px; border-left-width: 2px;">        
           1/1
        </td>
    </tr>

</table>
<br />

<div style="text-align: center;width: 100%;">
    <img style="border-width: 1px; border-style: solid;" src="<?php echo $ruta_foto ?>" />
</div>

<br />

<table style="width: 100%;color: white; background-color: gray;font-weight: bold;text-align: center;">
    <tr style="width: 100%;">
        <td style="width: 100%;">DATOS GENERALES</td>
    </tr>
</table>

<table style="width: 100%;text-align: center;" >
    
    <tr>
        <td style="text-align: right;width: 50%;">
            Marca:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo $obj_inventario->marca ?>
        </td>
    </tr>

    <tr>
        <td style="text-align: right;width: 50%;">
            Modelo:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo $obj_inventario->modelo ?>
        </td>
    </tr>

    <tr>
        <td style="text-align: right;width: 50%;">
            Numero de serie:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo $obj_inventario->no_serie ?>
        </td>
    </tr>

    <tr>
        <td style="text-align: right;width: 50%;">
            C&oacute;digo de inventario:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo $obj_inventario->numero_inventario ?>
        </td>
    </tr>


    <tr>
        <td style="text-align: right;width: 50%;">
            Sistema operativo:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo $obj_equipo->sistema_operativo ?>
        </td>
    </tr>

    <tr>
        <td style="text-align: right;width: 50%;">
            Product key:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo $obj_equipo->product_key ?>
        </td>
    </tr>
    
    <tr>
        <td style="text-align: right;width: 50%;">
            Nombre del equipo:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo $obj_equipo->nombre ?>
        </td>
    </tr>
            
    <tr>
        <td style="text-align: right;width: 50%;">
            Direcci&oacute;n IP:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo $obj_equipo->ip ?>
        </td>
    </tr>
    
    <tr>
        <td style="text-align: right;width: 50%;">
            Direcci&oacute;n MAC:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo $obj_equipo->mac ?>
        </td>
    </tr>
    
    <tr>
        <td style="text-align: right;width: 50%;">
            Procesador:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo $obj_equipo->procesador ?>
        </td>
    </tr>
    
    <tr>
        <td style="text-align: right;width: 50%;">
            Memoria RAM:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo $obj_equipo->ram ?>
        </td>
    </tr>
    
    <tr>
        <td style="text-align: right;width: 50%;">
            Disco duro:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo $obj_equipo->disco_duro ?>
        </td>
    </tr>
    
    <tr>
        <td style="text-align: right;width: 50%;">
            Unidad lectora:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo $obj_equipo->unidad_lectora ?>
        </td>
    </tr>
    
    <tr>
        <td style="text-align: right;width: 50%;">
            Floppy:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo $obj_equipo->floppy ?>
        </td>
    </tr>
    
    <tr>
        <td style="text-align: right;width: 50%;">
            Componentes adicionales:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo implode(",", $arr_componentes_adicionales) ?>
        </td>
    </tr>

    
    <tr>
        <td style="text-align: right;width: 50%;">
            Resguardante del equipo:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo $obj_usuario->nombre_completo ?>
        </td>
    </tr>

    <tr>
        <td style="text-align: right;width: 50%;">
            Ubicaci&oacute;n:
        </td>
        <td style="text-align: left;width: 50%;font-weight: bold;">
            <?php echo $obj_ubicacion->descripcion ?>
        </td>
    </tr>    
</table>
<br />
<table style="width: 100%;">
    <tr>
        <td style="width: 25%; text-align: right;">Fecha de compra:</td>
        <td style="width: 25%; text-align: left; font-weight: bold;"><?php echo date("d/m/Y" ,strtotime($obj_equipo->fecha_compra)) ?></td>
        <td style="width: 25%; text-align: right;vertical-align: middle;" rowspan="2">Antiguedad:</td>
        <td style="width: 25%; text-align: left; font-weight: bold;vertical-align: middle;" rowspan="2"><?php echo date("Y" ,time()-  strtotime($obj_equipo->fecha_compra) )-1970 ?> A&ntilde;o(s) <?php echo date("n" ,time()-  strtotime($obj_equipo->fecha_compra) ) - 1 ?> Mes(es)</td>                     
    </tr>
    <tr>
        <td style="width: 25%; text-align: right;">Proveedor:</td>
        <td style="width: 25%; text-align: left; font-weight: bold;"><?php echo $obj_equipo->proveedor ?></td>
                    
    </tr>
    
    <tr>
        <td style="width: 25%; text-align: right;">Factura:</td>
        <td style="width: 25%; text-align: left; font-weight: bold;"><?php echo $obj_equipo->factura ?></td>
        <td style="width: 25%; text-align: right;vertical-align: middle;" rowspan="2">Tiempo estimado de vida:</td>
        <td style="width: 25%; text-align: left; font-weight: bold;vertical-align: middle;" rowspan="2"><?php echo date("Y" ,strtotime($obj_equipo->fecha_obsolecencia) -  strtotime($obj_equipo->fecha_compra) )-1970 ?> A&ntilde;o(s) <?php echo date("n" ,strtotime($obj_equipo->fecha_obsolecencia) -  strtotime($obj_equipo->fecha_compra) - 1) ?> Mes(es)</td>                     
    </tr>
    <tr>
        <td style="width: 25%; text-align: right;">Recurso:</td>
        <td style="width: 25%; text-align: left; font-weight: bold;"><?php echo $obj_equipo->recurso ?></td>
                    
    </tr>
</table>

<br />
<table style="width: 100%;">
    <tr>
        <td style="width: 25%; text-align: right;">Garant&iacute;a:</td>
        <td style="width: 25%; text-align: left; font-weight: bold;"><?php echo date("Y" ,strtotime($obj_equipo->fecha_fin_garantia) -  strtotime($obj_equipo->fecha_inicio_garantia) )-1970 ?> A&ntilde;o(s) <?php echo date("n" ,strtotime($obj_equipo->fecha_fin_garantia) -  strtotime($obj_equipo->fecha_inicio_garantia) ) - 1?> Mes(es)</td>
        <td style="width: 25%; text-align: right;vertical-align: middle;" rowspan="3">Estatus (Reparaci&oacute;n, Baja, Activo):</td>
        <td style="width: 25%; text-align: left; font-weight: bold;vertical-align: middle;" rowspan="3"><?php echo $obj_equipo->estado_string ?></td>                     
    </tr>
    <tr>
        <td style="width: 25%; text-align: right;">Inicia:</td>
        <td style="width: 25%; text-align: left; font-weight: bold;"><?php echo date("d/m/Y",strtotime($obj_equipo->fecha_inicio_garantia) ) ?></td>
                    
    </tr>
    <tr>
        <td style="width: 25%; text-align: right;">Termina:</td>
        <td style="width: 25%; text-align: left; font-weight: bold;"><?php echo date("d/m/Y",strtotime($obj_equipo->fecha_fin_garantia) ) ?></td>
                    
    </tr>


</table>
<br />

<table style="width: 100%;">
    <tr>    
        <td style="width: 33%; text-align: right;"></td>
        <td style="width: 33%; text-align: right;font-weight: bold;">Elabor&oacute;:</td>
        <td style="width: 34%; text-align: left;">Juan Jos&eacute; Gallardo Mendoza</td>
    </tr>
</table>
</page>

<?php 
$no_hoja = 1;
foreach($obj_inventario->_datos as $componente): 
$no_hoja++;
$obj_componente->id_inventario = $componente["id_inventario"];
$obj_componente->cargarPorId();
if(is_array($_POST["chk_inventario"]) && in_array( $obj_componente->tbl_tipo_equipo_id_tipo_equipo,$_POST["chk_inventario"])):
$arr_fotos = glob("../../../web/uploads/inventario/{$obj_componente->id_inventario}/*.jpg");
?>

<page>
    <table style="width: 100%;border-style: solid; border-width: 3px;" cellpadding="0" cellspacing="0">

    <tr>
        <td style="width: 20%;text-align: center; border-style: solid; border-width: 1px; vertical-align: middle; height: 25px; " rowspan="2"><img style="width:61px; height:60px;" src="../../../web/images/generales/logo_cecyteg.jpg" /></td>
        <td style="width: 60%;text-align: center; border-style: solid; border-width: 1px;  vertical-align: middle; height: 25px ">INFRAESTRUCTURA COMPUTACIONAL EN PLANTELES CECYTEG</td>
        <td style="width: 20%;text-align: center; border-style: solid; border-width: 1px; vertical-align: middle; height: 25px;font-size: 9px; text-align: left;" rowspan="2">C&Oacute;DIGO: <br /> NO. REVISI&Oacute;N: 01<br />  FECHA: <?php echo date("d/m/Y") ?><br /> HOJA: <?php echo $no_hoja ?> de <?php echo $total_hojas ?></td>
    </tr>
    <tr>
        <td style="text-align: center; border-style: solid; border-width: 1px; vertical-align: middle; height: 25px; font-weight: bold;">EXPEDIENTE DE EQUIPO</td>
    </tr>
</table>




<br />
<table style="width: 100%;" cellpadding="0" cellspacing="0">
    <tr >
        <td style="background-color: gray; color: white; font-weight: bold; width: 32%; border-style: solid; border-top-width: 2px; border-right-width: 2px; border-left-width: 2px;">        
            PLANTEL:
        </td>
        <td style="width: 2%;">                   
        </td>
        <td style="background-color: gray; color: white; font-weight: bold; width: 32%; border-style: solid; border-top-width: 2px; border-right-width: 2px; border-left-width: 2px;">        
           FECHA:
        </td>
        <td style="width: 2%;">                   
        </td>
        <td style="background-color: gray; color: white; font-weight: bold; width: 32%; border-style: solid; border-top-width: 2px; border-right-width: 2px; border-left-width: 2px;">        
           FOLIO:
        </td>
    </tr>
    
    <tr >
        <td style="text-align: center; width: 32%; border-style: solid; border-bottom-width: 2px; border-right-width: 2px; border-left-width: 2px;">        
           P&Eacute;NJAMO
        </td>
        <td style="width: 2%;">                   
        </td>
        <td style="text-align: center; width: 32%; border-style: solid; border-bottom-width: 2px; border-right-width: 2px; border-left-width: 2px;">        
          <?php echo date("d") ?> de <?php echo date("M")  ?> de <?php echo date("Y") ?>
        </td>
        <td style="width: 2%;">                   
        </td>
        <td style="text-align: center; width: 32%; border-style: solid; border-bottom-width: 2px; border-right-width: 2px; border-left-width: 2px;">        
           1/1
        </td>
    </tr>

</table>
<br />

<table style="width: 100%;background: gray; color: white; font-weight: bold;">
    <tr>
        <td  style="width: 100%; text-align: center;">
            COMPONENTES
        </td>
    </tr>
</table>
<br />
<div style="width: 100%; font-weight: bold; text-align: center;"> <?php echo $obj_componente->tipo_equipo ?></div>
<br />

<table  style="width: 100%;">    
    <?php  for($i=0 ; $i< count($arr_fotos); $i+=2 ): ?>
    <tr>
        <td style="width: 50%;text-align: center;" >
            <?php if(file_exists($arr_fotos[$i])): ?>
            <img src="<?php echo $arr_fotos[$i] ?>" style="width: 300px; height: 225px;"  />
            <?php endif; ?>
        </td>
        <td style="width: 50%;text-align: center">
            <?php if(file_exists($arr_fotos[$i+1])): ?>
            <img src="<?php echo $arr_fotos[$i+1] ?>" style="width: 300px; height: 225px;" />
            <?php endif; ?>
        </td>
    </tr>
    <?php endfor; ?>
</table>
<br />

<table style="width: 50%;">
    <tr>
        <td style="width: 50%;text-align: right;">Marca: </td>
        <td style="width: 50%; font-weight: bold; text-align: left;"><?php echo $obj_componente->marca ?></td>
    </tr>
    <tr>
        <td style="width: 50%;text-align: right;">Modelo: </td>
        <td style="width: 50%; font-weight: bold;text-align: left;"><?php echo $obj_componente->modelo ?></td>
    </tr>
    <tr>
        <td style="width: 50%;text-align: right;">N&uacute;mero de serie: </td>
        <td style="width: 50%; font-weight: bold;text-align: left;"><?php echo $obj_componente->no_serie ?></td>
    </tr>
    <tr>
        <td style="width: 50%;text-align: right;">C&oacute;digo de inventario: </td>
        <td style="width: 50%; font-weight: bold;text-align: left;"><?php echo $obj_componente->numero_inventario ?></td>
    </tr>
</table>
</page>
<?php endif;  endforeach; ?>
<?php 
   MasterPage::finalizarSeccion($contenido); 
   include("../../main/master/pdf_reporte.php"); 
?>
