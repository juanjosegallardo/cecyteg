<?php
class Hora extends General
{

	public function cargar()
	{
		$qry = "SELECT * FROM tbl_hora";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
 }
?>