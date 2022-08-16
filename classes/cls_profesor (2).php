<?php
class Profesor extends General
{
	public function guardar()
	{
		$qry = "INSERT INTO tbl_profesor (nombre, codigo, estatus) VALUES ( '{$this->nombre}','{$this->codigo}',  {$this->estatus});";
		$this->_conexion->ejecutar($qry);
        $this->id_profesor = $this->_conexion->getIdInsertado();
	}
	
	public function actualizar()
	{
		$qry = "UPDATE tbl_profesor set nombre='{$this->nombre}', codigo='{$this->codigo}' WHERE id_profesor={$this->id_profesor}";
		$this->_conexion->ejecutar($qry);
	}

	public function eliminar()
	{
		$qry = "UPDATE tbl_profesor set estatus=0  WHERE id_profesor={$this->id_profesor}";
		$this->_conexion->ejecutar($qry);
	}
	
	public function cargar()
	{
		$qry = "SELECT * FROM tbl_profesor";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    

    public function cargarGrid()
	{
		$qry = "SELECT id_profesor,codigo, nombre FROM tbl_profesor WHERE estatus=1";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	

	
      
    public function cargar_profesors($nombre_profesor)
	{
		$qry = "SELECT * FROM tbl_profesor WHERE estatus=1 AND nombre like '%{$nombre_profesor}%'";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	
    
   	
	public function cargarPorCodigo()
	{
		$this->_query = "SELECT * FROM tbl_profesor WHERE codigo='{$this->codigo}'";
		$this->__cargarPropiedades();
	}
    
    public function cargarPorId()
	{
		$this->_query = "SELECT * FROM tbl_profesor WHERE id_profesor='{$this->id_profesor}'";
		$this->__cargarPropiedades();
	}
	

 }
?>
