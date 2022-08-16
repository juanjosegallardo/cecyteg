<?php
//librerias
include_once("../../../config.php");  
include("../../../lib/ui/cls_tab.php");
include("../../../lib/ui/cls_boton.php");
include("../../../lib/generales/cls_master_page.php");
include_once("../../../modules/main/master/dic_principal.php");
include_once("../../../lib/generales/cls_session.php");	

$obj_session = new Session();
//Tab

$obj_tab=new Tab("tab_principal");
if(is_array($obj_session->menu["practicas"]["submenu"]))
{
    foreach( $obj_session->menu["practicas"]["submenu"] as $submenu)
    {    
        $obj_tab->agregarTab($submenu["nombre"],$submenu["url"], $submenu["funcion_js"]);
    }
}

MasterPage::iniciarSeccion(); ?>
<!-- Inicio Cabecera -->
<?php if(is_array($obj_session->menu["practicas"]["submenu"])):foreach( $obj_session->menu["practicas"]["submenu"] as $submenu): ?>
    <script type="text/javascript" src="<?php echo $submenu["archivo_js"]; ?>"></script>
<?php endforeach;endif; ?>
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