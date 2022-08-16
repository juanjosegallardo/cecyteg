<?php
    header( "Content-type: image/png" );
    $fuente = "code128.ttf";
    $size=isset($_GET['size'])?$_GET['size']:10;
    $texto = isset($_GET['texto'])?urldecode($_GET['texto']):"";
    $details = imageftbbox($size, 0, $fuente, $texto);
    $altura = abs($details[6] - $details[5]);       
    $ancho = abs($details[2] - $details[0]);     
    $imagen = imagecreatetruecolor($ancho, $altura);    
    $bg = imagecolorallocate( $imagen,255, 255, 255 );
    imagefill($imagen,0,0,$bg);
    $negro = imagecolorallocate( $imagen, 0, 0, 0);
    imagettftext($imagen, $size, 0, 0, $altura, $negro, $fuente, $texto );
    imagepng( $imagen );
    imagedestroy( $imagen );
?>