<?php
class Prestamo extends General
{
	public function guardar()
	{
		$qry = " INSERT INTO tbl_prestamo (tbl_inventario_id_inventario ,tipo_lugar ,lugar ,fecha , duracion ,estatus, tbl_usuario_id_usuario)VALUES ( '{$this->tbl_inventario_id_inventario}', '{$this->tipo_lugar}', '{$this->lugar}', '{$this->fecha}', '{$this->duracion}', '{$this->estatus}', '{$this->tbl_usuario_id_usuario}');";
		$this->_conexion->ejecutar($qry);
        $this->id_prestamo = $this->_conexion->getIdInsertado();
	}
	


	public function cancelar()
	{
		$qry = "UPDATE tbl_prestamo set estatus=4  WHERE id_prestamo={$this->id_prestamo}";
		$this->_conexion->ejecutar($qry);
	}
	
	public function prestar()
	{
		$qry = "UPDATE tbl_prestamo set estatus=2 WHERE id_prestamo={$this->id_prestamo}";
		$this->_conexion->ejecutar($qry);
	}

	public function devolver()
	{
		$qry = "UPDATE tbl_prestamo set estatus=3  WHERE id_prestamo={$this->id_prestamo}";
		$this->_conexion->ejecutar($qry);
	}
	
	public function devolver_otros()
	{
		$qry = "UPDATE tbl_prestamo set estatus=3  WHERE tbl_inventario_id_inventario ='{$this->tbl_inventario_id_inventario}' and fecha < '{$this->fecha}' and estatus=2";
		$this->_conexion->ejecutar($qry);
	}

	public function cargar()
	{
		$qry = "SELECT * FROM tbl_prestamo";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    
    public function cargar_grid()
	{
		$qry = "SELECT * FROM vw_prestamo where estatus ='EN_USO' or estatus ='APARTADO'";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	
	//cargar comentario por Id
	public function cargarPorId()
	{
		$this->_query = "SELECT * FROM vw_prestamo WHERE id_prestamo='{$this->id_prestamo}'";
		$this->__cargarPropiedades();
	}
	
	public function cargarPrestamoSimilar()
	{
		$qry = "SELECT * FROM tbl_prestamo where tbl_inventario_id_inventario ='{$this->tbl_inventario_id_inventario}' and  (estatus ='APARTADO' or estatus='EN_USO' ) and '{$this->fecha}'  between fecha AND DATE_ADD(fecha, INTERVAL duracion MINUTE)  and  DATE_ADD('{$this->fecha}', INTERVAL '{$this->duracion}' MINUTE) between fecha AND DATE_ADD(fecha, INTERVAL duracion MINUTE)  ";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
		
	}

    
 }
?>
