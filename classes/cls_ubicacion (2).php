<?php
class Ubicacion extends General
{

	public function guardar()
	{
		$qry = "INSERT INTO tbl_ubicacion (codigo, descripcion, estatus) VALUES ( '{$this->codigo}', '{$this->descripcion}',  {$this->estatus});";
		$this->_conexion->ejecutar($qry);
        $this->id_Ubicacion = $this->_conexion->getIdInsertado();
	}
	
	public function actualizar()
	{
		$qry = "UPDATE tbl_ubicacion set codigo='{$this->codigo}', descripcion = '{$this->descripcion}', estatus = '{$this->estatus}'  WHERE id_ubicacion={$this->id_ubicacion}";
		$this->_conexion->ejecutar($qry);
	}

	public function eliminar()
	{
		$qry = "UPDATE tbl_ubicacion set estatus=0  WHERE id_ubicacion={$this->id_ubicacion}";
		$this->_conexion->ejecutar($qry);
	}
	
	public function cargar()
	{
		$qry = "SELECT * FROM tbl_ubicacion";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    
    public function cargar_grid()
	{
		$qry = "SELECT id_ubicacion, codigo, descripcion FROM tbl_ubicacion WHERE estatus=1";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	
	//cargar comentario por Id
	public function cargarPorId()
	{
		$this->_query = "SELECT * FROM tbl_ubicacion WHERE id_ubicacion='{$this->id_ubicacion}'";
		$this->__cargarPropiedades();
	}
	
    
 }
?>
