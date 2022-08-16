<?php

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
 
$total_hojas = 1;
$no_hoja = 1;
$obj_componente = new Inventario();
$obj_componente->id_inventario = $_GET["id_inventario"];
$obj_componente->cargarPorId();

$arr_fotos = glob("../../../web/uploads/inventario/{$obj_componente->id_inventario}/*.jpg");
MasterPage::iniciarSeccion();

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
<?php 
   MasterPage::finalizarSeccion($contenido); 
   include("../../main/master/pdf_reporte.php"); 
?>