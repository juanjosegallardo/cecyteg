<?php

class materia extends General
{
	public function guardar()
	{
		$qry = "INSERT INTO tbl_materia (materia, estatus, horas_practica) VALUES ( '{$this->materia}',  {$this->estatus},  '{$this->horas_practica}');";
		$this->_conexion->ejecutar($qry);
        $this->id_materia = $this->_conexion->getIdInsertado();
	}
	
	public function actualizar()
	{
		$qry = "UPDATE tbl_materia set materia='{$this->materia}', horas_practica='{$this->horas_practica}'  WHERE id_materia={$this->id_materia}";
		$this->_conexion->ejecutar($qry);
	}

	public function eliminar()
	{
		$qry = "UPDATE tbl_materia set estatus=0  WHERE id_materia={$this->id_materia}";
		$this->_conexion->ejecutar($qry);
	}
	
	public function cargar()
	{
		$qry = "SELECT * FROM tbl_materia WHERE estatus=1";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    
    public function cargar_grid()
	{
		$qry = "SELECT id_materia,materia FROM tbl_materia WHERE estatus=1";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	
	//cargar comentario por Id
	public function cargarPorId()
	{
		$this->_query = "SELECT * FROM tbl_materia WHERE id_materia='{$this->id_materia}'";
		$this->__cargarPropiedades();
	}
	
    
 }
?>