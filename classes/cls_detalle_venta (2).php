<?php
class DetalleVenta extends General
{
   function __construct($conexion)
	{
		$this->_conexion=$conexion;
		$this->_datos=array();
		$this->_propiedades=array();
	}

	public function guardar()
	{
		$qry = "INSERT INTO tbl_detalle_venta ( tbl_venta_id_venta, tbl_producto_id_producto,cantidad, precio_compra, precio_venta ) VALUES ( '{$this->tbl_venta_id_venta}', '{$this->tbl_producto_id_producto}', '{$this->cantidad}', '{$this->precio_compra}', '{$this->precio_venta}');";
		$this->_conexion->ejecutar($qry);
        $this->id_detalle_venta = $this->_conexion->getIdInsertado();
	}
	
	public function cargarPorId()
	{
		$this->_query = "SELECT * FROM tbl_detalle_venta WHERE id_detalle_venta='{$this->id_detalle_venta}'";
		$this->__cargarPropiedades();
	}
   
	
  
 }
?>
