<?php
//librerias
include_once("../../../config.php");   
include("../../../lib/ui/cls_tab.php");
include("../../../lib/ui/cls_boton.php");
include("../../../lib/generales/cls_master_page.php");
include_once("../../../modules/main/master/dic_principal.php");
//Tab
$obj_tab=new Tab("tab_principal");
foreach( $menu_principal["graficas"]["submenu"] as $submenu)
{    
    $obj_tab->agregarTab($submenu["nombre"],$submenu["url"], $submenu["funcion_js"]);
}

MasterPage::iniciarSeccion(); ?>
<!-- Inicio Cabecera -->
<?php foreach( $menu_principal["graficas"]["submenu"] as $submenu): if(isset( $submenu["archivo_js"]) ):?>

    <script type="text/javascript" src="<?php echo $submenu["archivo_js"]; ?>"></script>
<?php endif; endforeach; ?>
    <script type="text/javascript" src="../../../web/js/graficas/generales.js"></script>
<!-- Fin Cabecera -->
<?php MasterPage::finalizarSeccion($cabecera); ?>

<?php MasterPage::iniciarSeccion(); ?>
<!-- Inicio Cuerpo -->

<div align="center"><?php echo $obj_tab; ?></div>

<!-- Fin Cuerpo -->
<?php 
    MasterPage::finalizarSeccion($cuerpo); 
    include("../../main/master/frm_principal.php"); 
?>