<?php
class InventarioPorConteo extends General
{

	public function guardar()
	{
		$qry = "INSERT INTO tbl_inventario_por_conteo (fecha_captura, tbl_conteo_id_conteo, tbl_inventario_id_inventario) VALUES (now() ,'{$this->tbl_conteo_id_conteo}', '{$this->tbl_inventario_id_inventario}');";
		$this->_conexion->ejecutar($qry);
        //$this->id_inventario_por_conteo = $this->_conexion->getIdInsertado();
	}


	public function eliminarPorConteo()
	{
		$qry = "DELETE FROM tbl_inventario_por_conteo WHERE tbl_conteo_id_conteo={$this->tbl_conteo_id_conteo}";
		$this->_conexion->ejecutar($qry);
	}
	
	public function cargarPorConteo()
	{
		$qry = "SELECT * FROM tbl_inventario_por_conteo  WHERE tbl_conteo_id_conteo='{$this->tbl_conteo_id_conteo}'";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}

	
	//cargar comentario por Id
	public function cargarPorId()
	{
		$this->_query = "SELECT * FROM tbl_inventario_por_conteo WHERE id_inventario_por_conteo='{$this->id_inventario_por_conteo}'";
		$this->__cargarPropiedades();
	}
	
    
 }
?>
