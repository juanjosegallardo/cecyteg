<?php	 
    include_once("../../../config.php");  
	include_once("../../../lib/generales/cls_session.php");
	include("../../../lib/generales/cls_conexion.php");
	include("../../../lib/generales/cls_general.php");
    include_once("../../../modules/main/master/dic_principal.php");
	include_once("../../../classes/cls_configuracion.php");
	$obj_session = new Session();    
    $url = $_SERVER['PHP_SELF'];         
	$obj_configuracion = new Configuracion();
    $obj_configuracion->cargarTema();
    $obj_configuracion->cargarColorFondo();
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

<script type="text/javascript" src="../../../web/js/administracion/usuario.js"></script>

<script type="text/javascript">
	$(document).ready(function(){        	   	   	   
              iniciar_botones();  
              
              $("#txt_usuario").keypress(function (e){
                    if(e.keyCode == '13')
                    {                        
                          $("#txt_password").focus();
                    }
              });
              $("#txt_password").keypress(function (e){
                    if(e.keyCode == '13')
                    {                        
                        ingresar();
                    }
              });
	});	
</script>
<title><?php echo utf8_encode(NOMBRE_GENERAL);  ?></title>
</head>

<body style="background-color: <?php echo $obj_configuracion->color_fondo; ?>" >

<div class="ui-dialog ui-widget ui-widget-content ui-corner-all div_login" >
   <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
      <span id="ui-dialog-title-dialog" class="ui-dialog-title"><?php echo utf8_encode(NOMBRE_GENERAL);  ?></span>      
   </div>
   <div class="ui-dialog-content ui-widget-content" id="dialog" style="overflow: hidden;">
        <form id="frm_login_usuario" name="frm_login_usuario" >
             <table width="100%">
                <tr>
                    <td rowspan="5">
                        <img src="../../../web/images/generales/usuario.png" />
                    </td>
                    <td colspan="2">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        Usuario:
                    </td>
                    <td align="right">
                        <input type="text" id="txt_usuario" name="txt_usuario" /> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:
                    </td>
                    <td align="right">
                        <input type="password" id="txt_password" name="txt_password" /> 
                    </td>
                </tr>
                <tr>        
                    <td colspan="2">
                        &nbsp;
                    </td>
                </tr>
                <tr>            
                    <td align="center" colspan="2">
                        <input type="button" id="btn_ingresar" value="Ingresar" class="boton" onclick="ingresar()" />
                    </td>
                </tr>
                 <tr>        
                    <td colspan="2">
                        <div id="div_login_mensaje" style="height: 20px;"></div>
                    </td>
                </tr>
             </table>
        </form>
   </div>
</div>
</body>
</html>