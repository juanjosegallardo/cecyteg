<?php
    include_once("../../../config.php");  
    include("../../../lib/generales/cls_session.php");
        
    $obj_session = new Session();
    $obj_session->detener();
    header("Location: index.php");
?>