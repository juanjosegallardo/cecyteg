<?php
class Reporte extends General
{
	public function guardar()
	{
		$qry = "INSERT INTO tbl_reporte(tbl_alumno_id_alumno, fecha, causa)  values ('{$this->tbl_alumno_id_alumno}', '{$this->fecha}', '{$this->causa}') ";
		$this->_conexion->ejecutar($qry);
        $this->id_reporte = $this->_conexion->getIdInsertado();
	}
	
	
    public function cargar_reportes()
	{
		$qry = "SELECT * FROM tbl_reporte WHERE tbl_alumno_id_alumno = '{$this->tbl_alumno_id_alumno}'";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	
    	public function cargarPorId()
	{
		$this->_query = "SELECT * FROM tbl_reporte WHERE id_reporte='{$this->id_reporte}'";
		$this->__cargarPropiedades();
	}
	
   	

 }
?>