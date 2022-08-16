<?php
class Dia extends General
{

	public function cargar()
	{
		$qry = "SELECT * FROM tbl_dia";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    

 }
?>