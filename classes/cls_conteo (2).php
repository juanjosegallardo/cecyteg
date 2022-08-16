<?php
class Conteo extends General
{
	public function guardar()
	{
		$qry = "INSERT INTO tbl_conteo (descripcion,estado, estatus) VALUES ( '{$this->descripcion}',  {$this->estado},  {$this->estatus});";
		$this->_conexion->ejecutar($qry);
        $this->id_conteo = $this->_conexion->getIdInsertado();
	}
	
	public function actualizar()
	{
		$qry = "UPDATE tbl_conteo set descripcion='{$this->descripcion}'  WHERE id_conteo={$this->id_conteo}";
		$this->_conexion->ejecutar($qry);
	}

	public function iniciar()
	{
		$qry = "UPDATE tbl_conteo set fecha_inicio=NOW() , estado =2 WHERE id_conteo='{$this->id_conteo}'";
		$this->_conexion->ejecutar($qry);
	}

	public function terminar()
	{
		$qry = "UPDATE tbl_conteo set fecha_fin=NOW(), estado =3  WHERE id_conteo='{$this->id_conteo}'";
		$this->_conexion->ejecutar($qry);
	}


	public function eliminar()
	{
		$qry = "UPDATE tbl_conteo set estatus=0  WHERE id_conteo={$this->id_conteo}";
		$this->_conexion->ejecutar($qry);
	}

	public function cambiarEstado()
	{
		$qry = "UPDATE tbl_conteo set estado='{$this->estado}'  WHERE id_conteo={$this->id_conteo}";
		$this->_conexion->ejecutar($qry);
	}
	
	public function cargar()
	{
		$qry = "SELECT * FROM tbl_conteo";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    
    public function cargar_grid()
	{
		$qry = "SELECT id_conteo,descripcion, estado,fecha_inicio, fecha_fin FROM tbl_conteo WHERE estatus=1";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	
	//cargar comentario por Id
	public function cargarPorId()
	{
		$this->_query = "SELECT * FROM vw_conteo WHERE id_conteo='{$this->id_conteo}'";
		$this->__cargarPropiedades();
	}
	
    
 }
?>
