<?php
class TipoEquipo extends General
{

	//guardar comentario
	public function guardar()
	{
		$qry = "INSERT INTO tbl_tipo_equipo (nombre, estatus) VALUES ( '{$this->nombre}',  {$this->estatus});";
		$this->_conexion->ejecutar($qry);
        $this->id_tipo_equipo = $this->_conexion->getIdInsertado();
	}
	
	//modificar comentario
	public function actualizar()
	{
		$qry = "UPDATE tbl_tipo_equipo set nombre='{$this->nombre}'  WHERE id_tipo_equipo={$this->id_tipo_equipo}";
		$this->_conexion->ejecutar($qry);
	}

	public function eliminar()
	{
		$qry = "UPDATE tbl_tipo_equipo set estatus=0  WHERE id_tipo_equipo={$this->id_tipo_equipo}";
		$this->_conexion->ejecutar($qry);
	}
	
	public function cargar()
	{
		$qry = "SELECT * FROM tbl_tipo_equipo";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    
    public function cargar_grid()
	{
		$qry = "SELECT id_tipo_equipo,nombre FROM tbl_tipo_equipo WHERE estatus=1";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	
	//cargar comentario por Id
	public function cargarPorId()
	{
		$this->_query = "SELECT * FROM tbl_tipo_equipo WHERE id_tipo_equipo='{$this->id_tipo_equipo}'";
		$this->__cargarPropiedades();
	}
	
    
 }
?>
