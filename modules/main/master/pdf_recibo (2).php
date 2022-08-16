<?php    
        
    require_once('../../../lib/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('L', 'A5', 'es');        
    $html2pdf->writeHTML($contenido);
    $html2pdf->Output('reporte.pdf');
?>
