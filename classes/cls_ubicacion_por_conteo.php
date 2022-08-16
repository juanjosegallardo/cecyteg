<?php
class UbicacionPorConteo extends General
{

	public function guardar()
	{
		$qry = "INSERT INTO tbl_ubicacion_por_conteo (tbl_conteo_id_conteo, tbl_ubicacion_id_ubicacion) VALUES ( '{$this->tbl_conteo_id_conteo}', '{$this->tbl_ubicacion_id_ubicacion}');";
		$this->_conexion->ejecutar($qry);
        //$this->id_ubicacion_por_conteo = $this->_conexion->getIdInsertado();
	}


	public function eliminarPorConteo()
	{
		$qry = "DELETE FROM tbl_ubicacion_por_conteo WHERE tbl_conteo_id_conteo={$this->tbl_conteo_id_conteo}";
		$this->_conexion->ejecutar($qry);
	}
	
	public function cargarPorConteo()
	{
		$qry = "SELECT * FROM tbl_ubicacion_por_conteo  WHERE tbl_conteo_id_conteo='{$this->tbl_conteo_id_conteo}'";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}

	
	//cargar comentario por Id
	public function cargarPorId()
	{
		$this->_query = "SELECT * FROM tbl_ubicacion_por_conteo WHERE id_ubicacion_por_conteo='{$this->id_ubicacion_por_conteo}'";
		$this->__cargarPropiedades();
	}
	
    
 }
?>
