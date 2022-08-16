<?php
class Aula extends General
{

	public function cargar()
	{
		$qry = "SELECT * FROM tbl_aula";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    

 }
?>