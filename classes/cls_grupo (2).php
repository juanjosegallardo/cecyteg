<?php
class Grupo extends General
{

	public function cargar()
	{
		$qry = "SELECT * FROM tbl_grupo";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    

 }
?>