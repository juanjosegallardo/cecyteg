<?php
class Ciudad extends General
{

	//guardar comentario

	public function cargar()
	{
		$qry = "SELECT * FROM tbl_ciudad";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    
    
	public function cargarPorEstado()
	{
		$qry = "SELECT * FROM tbl_ciudad WHERE tbl_estado_id_estado = '{$this->tbl_estado_id_estado}'";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	
    
 }
?>
