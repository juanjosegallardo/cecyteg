<?php    
        
    header( "Expires: Mon, 20 Dec 1998 01:00:00 GMT" );
    header( "Last-Modified: . gmdate(D, d M Y H:i:s) . GMT" );
    header( "Cache-Control: no-cache, must-revalidate" );
    header( "Pragma: no-cache" ); 
    
    define("COLUMNAS", 6); 
    define("RENGLONES", 20);
    
    include_once("../../../config.php");  
    require('../../../lib/fpdf/code128.php');
    
    include("../../../lib/generales/cls_conexion.php");
    include("../../../lib/generales/cls_general.php");
    include("../../../classes/cls_configuracion.php");
    include("../../../classes/cls_inventario.php");

    function pix2mm($pix)
    {
        $x_pix = 550;        
        $x_mm = 85;        
        return ($pix * $x_mm) / $x_pix;
    }

    $pdf=new PDF_Code128();
    $pdf->AddPage();
    
  
    $obj_inventario =  new Inventario();
    $obj_inventario->cargarActivos();
    $cont =0;
    foreach($obj_inventario->_datos as $renglon)
    {
        
        
        $no_columna =  $cont % COLUMNAS;
        $no_renglon = ((int) ($cont /COLUMNAS)) % RENGLONES;
 

        $texto =  "00000000000" . $renglon["numero_inventario"];    
        $texto= substr($texto, strlen($texto)-11,11); 
        $pdf->Code128( pix2mm( 200 * $no_columna) + 15 ,pix2mm(80 * $no_renglon) +20,$texto,pix2mm(150),pix2mm(40));    
        $pdf->SetXY( pix2mm( 200 * $no_columna) +17,pix2mm(80 * $no_renglon)+17 );
        $pdf->SetFont('Arial','',5);
        $pdf->Write(4,"CONTROL INTERNO");
        $pdf->SetXY( pix2mm( 200 * $no_columna) +17,pix2mm(80 * $no_renglon)+26 );
        $pdf->SetFont('Arial','',8);
        $pdf->Write(4,$texto);
        
        $cont ++;
        
        if($cont % (RENGLONES * COLUMNAS ) ==0  )
        {            
            $pdf->AddPage();
        }
 
        
        
    } 
                                   
    $pdf->Output('codigos.pdf', 'D');
?>