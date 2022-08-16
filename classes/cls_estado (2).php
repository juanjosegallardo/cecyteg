<?php
class Estado extends General
{

	//guardar comentario

	public function cargar()
	{
		$qry = "SELECT * FROM tbl_estado";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    
	
    
 }
?>
