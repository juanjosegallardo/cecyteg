<?php
class Marca extends General
{
	public function guardar()
	{
		$qry = "INSERT INTO tbl_marca (nombre, estatus) VALUES ( '{$this->nombre}',  {$this->estatus});";
		$this->_conexion->ejecutar($qry);
        $this->id_marca = $this->_conexion->getIdInsertado();
	}
	
	public function actualizar()
	{
		$qry = "UPDATE tbl_marca set nombre='{$this->nombre}'  WHERE id_marca={$this->id_marca}";
		$this->_conexion->ejecutar($qry);
	}

	public function eliminar()
	{
		$qry = "UPDATE tbl_marca set estatus=0  WHERE id_marca={$this->id_marca}";
		$this->_conexion->ejecutar($qry);
	}
	
	public function cargar()
	{
		$qry = "SELECT * FROM tbl_marca";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    
    public function cargar_grid()
	{
		$qry = "SELECT id_marca,nombre FROM tbl_marca WHERE estatus=1";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	
	//cargar comentario por Id
	public function cargarPorId()
	{
		$this->_query = "SELECT * FROM tbl_marca WHERE id_marca='{$this->id_marca}'";
		$this->__cargarPropiedades();
	}
	
    
 }
?>
