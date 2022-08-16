<?php	     
    include_once("../../../config.php");  
    include("../../../lib/generales/cls_conexion.php");
	include_once("../../../lib/generales/cls_session.php");	
	include("../../../lib/generales/cls_general.php");
    include_once("../../../modules/main/master/dic_principal.php");
	include_once("../../../classes/cls_configuracion.php");    
	 
    $url = $_SERVER['PHP_SELF'];         
	$obj_configuracion = new Configuracion();
    $obj_configuracion->cargarTema();
    $obj_configuracion->cargarColorFondo();
	if(!isset($onready))
	{
		$onready ="";
	}
if($obj_session->iniciado == "true" &&  count($obj_session->permisos) )
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" id="css_tema" type="text/css" href="../../../lib/ui/ui/css/<?php echo $obj_configuracion->tema; ?>/jquery-ui-1.8.14.custom.css" />
<link rel="stylesheet" type="text/css" href="../../../web/css/general.css" />
<link rel="stylesheet" type="text/css" href="../../../lib/ui/farbtastic/farbtastic.css" />
<script type="text/javascript" src="../../../lib/ui/ui/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../../../lib/ui/ui/js/jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript" src="../../../lib/ui/ui/js/jquery.ui.datepicker-es.js"></script>
<script type="text/javascript" src="../../../lib/ui/ui.js"></script>
<script type="text/javascript" src="../../../lib/ajax/ajax.js"></script>
<script type="text/javascript" src="../../../lib/ui/farbtastic/farbtastic.js"></script>
<script type="text/javascript" src="../../../lib/ofc/json2.js"></script>
<script type="text/javascript" src="../../../lib/ofc/swfobject.js"></script>
<script type="text/javascript" src="../../../web/js/master/master.js"></script>


<?php echo $cabecera; ?>

<script type="text/javascript">
	$(document).ready(function(){        	   	   	   
		iniciar_tabs();
        iniciar_menu();
        iniciar_msgbox();
        
        <?php if(isset($_GET['id_tab'])) :?>
            $("#tab_principal").tabs( "select" , <?php echo $_GET['id_tab']; ?>);
        <?php endif?>
        <?php echo $onready; ?>
	});	
</script>
<title><?php echo utf8_encode(NOMBRE_GENERAL);  ?></title>
</head>

<body style="background-color: <?php echo $obj_configuracion->color_fondo; ?>" onload="<?php if(!is_null($obj_session->mensaje) && $obj_session->mensaje!="") { ?>msg_box('<?php echo  $obj_session->mensaje; ?>');<?php } ?>">
<div id="msgbox"></div>
<div id="msgbox_cargando"></div>
<div id="calendario"></div>
<div align="center">
    <table>
        <tr>
            <td class="ui-widget-header ui-corner-all encabezado" colspan="2">
                <table width="100%">
                    <tr>
                        <td align="left" class="ui-widget">
                            Usuario:  <?php echo $obj_session->nombre_usuario; ?>
                        </td>
                        <td align="right" class="ui-widget">
                           
                                <div style="cursor:pointer;" onclick="confirm_box('¿Realmente desea salir?','cerrar_session();')" >Cerrar Sesi&oacute;n</div>
                           
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <div id="aco_menu" style="width: 200px;height: auto;" align="left">
                    <?php foreach($obj_session->menu as $menu ): $i=1; ?>                
                    <h3><a href="#"><?php echo $menu["nombre"]; ?></a></h3>
                    <div>          
						<p>                              
                        <?php if(is_array($menu["submenu"])): foreach($menu["submenu"] as $submenu):  ?>
                            <div class="submenu" onclick="redireccionar_menu('<?php echo $menu["url"]; ?>','<?php echo $i; ?>','<?php echo $url; ?>')"><?php echo $submenu["nombre"]; ?></div>
                        <?php $i++;endforeach;endif; ?>   
						</p>                                       
                    </div>
                    <?php endforeach; ?>
                </div>
            </td>   
            <td valign="top">
                <?php echo $cuerpo; ?>
            </td> 
        </tr>
    </table>
</div>

</body>
</html>
<?php $obj_session->mensaje=""; 
}
else
{
    header("Location: ../../login/main/index.php");
}
?>
