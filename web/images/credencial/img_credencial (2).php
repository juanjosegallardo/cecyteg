<?php
       
    header( "Content-type: image/PNG");
    header( "Expires: Mon, 20 Dec 1998 01:00:00 GMT" );
    header( "Last-Modified: . gmdate(D, d M Y H:i:s) . GMT" );
    header( "Cache-Control: no-cache, must-revalidate" );
    header( "Pragma: no-cache" ); 
    
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../classes/cls_configuracion.php");
    include("../../../classes/cls_cliente.php");
        
    $obj_configuracion = new Configuracion();
    $obj_configuracion->cargarCredencial();
    
    $obj_cliente = new Cliente();
    $obj_cliente->id_cliente = $_GET['id_cliente'];
    $obj_cliente->cargarPorId();
    
    
    $imagen = imagecreatetruecolor(550,346);
        
    //Fondo    
    $imagen_fondo = imagecreatefromjpeg("fondo.jpg");
    imagecopy($imagen,$imagen_fondo,0,0,0,0,550,346);                    
    
    //Foto        
    $imagen_foto = imagecreatefromjpeg("foto.jpg");
    imagecopy($imagen,$imagen_foto,$obj_configuracion->credencial_foto_x, $obj_configuracion->credencial_foto_y,0,0,160,192);

    //Nombre
    
    $fuente = "arial.ttf";
    $size=15;
    $texto =  $obj_cliente->nombre . " ". $obj_cliente->apellido_paterno . " ". $obj_cliente->apellido_materno ;        
    if(strlen($texto)>0)
    {
        $details = imageftbbox($size, 0, $fuente, $texto);
        $altura = abs($details[6] - $details[5])+5;       
        $ancho = abs($details[2] - $details[0])+10;     
        $imagen_nombre = imagecreatetruecolor($ancho, $altura);    
        $bg = imagecolorallocate( $imagen_nombre,255, 255, 255 );
        imagefill($imagen_nombre,0,0,$bg);
        $negro = imagecolorallocate( $imagen_nombre, 0, 0, 0);
        imagettftext($imagen_nombre, $size, 0, 0, $altura-5, $negro, $fuente, $texto );
        imagecopy($imagen,$imagen_nombre,$obj_configuracion->credencial_nombre_x, $obj_configuracion->credencial_nombre_y,0,0,$ancho,$altura);        
    } 

    //Codigo
            
    $fuente = "code128.ttf";
    $size=50;
    $texto =  "00000000000" . $obj_cliente->id_cliente;    
    $texto= substr($texto, strlen($texto)-11,11); 
    $details = imageftbbox($size, 0, $fuente, $texto);
    $altura = abs($details[6] - $details[5]);       
    $ancho = abs($details[2] - $details[0]);     
    $imagen_codigo = imagecreatetruecolor($ancho, $altura);    
    $bg = imagecolorallocate( $imagen_codigo,255, 255, 255 );
    imagefill($imagen_codigo,0,0,$bg);
    $negro = imagecolorallocate( $imagen_codigo, 0, 0, 0);
    imagettftext($imagen_codigo, $size, 0, 0, $altura, $negro, $fuente, $texto );    
    imagecopy($imagen,$imagen_codigo,$obj_configuracion->credencial_codigo_x, $obj_configuracion->credencial_codigo_y,0,0,$ancho,$altura);
        
    imagepng($imagen); // output to browser
    imagedestroy($imagen_fondo);
    imagedestroy($imagen); 
    imagedestroy()
?>