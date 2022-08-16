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
?>

<page>




´<div style="width:70; height:50; border-style:solid; border-width:2px; border-color:#000000">


</div>
























































</page>



<?php 
   MasterPage::finalizarSeccion($contenido); 
   include("../../main/master/pdf_reporte.php"); 
?>