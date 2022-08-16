<?php
class Permiso extends General
{

	//cargar comentarios
	public function cargar()
	{
		$qry = "SELECT * FROM tbl_permiso";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
        

}
?>
