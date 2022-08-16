<?php
class Clase extends General
{

	public function cargar()
	{
		$qry = "SELECT * FROM tbl_clase";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    

	public function guardar()
	{
		$qry = "INSERT INTO tbl_clase ( tbl_practica_id_practica, tbl_profesor_id_profesor, tbl_aula_id_aula, tbl_grupo_id_grupo, fecha_hora, duracion, estatus) VALUES ('{$this->tbl_practica_id_practica}', '{$this->tbl_profesor_id_profesor}', '{$this->tbl_aula_id_aula}', '{$this->tbl_grupo_id_grupo}',  '{$this->fecha_hora}', '{$this->duracion}','1');";
		$this->_conexion->ejecutar($qry);
        $this->id_alumno = $this->_conexion->getIdInsertado();
	}
	
	public function cargarSimilar()	
	{
		$qry= "SELECT * FROM `tbl_clase` LEFT JOIN tbl_practica ON tbl_practica.id_practica = tbl_clase.tbl_practica_id_practica WHERE weekday(`fecha_hora`)=weekday('{$this->fecha_hora}') and tbl_aula_id_aula='{$this->tbl_aula_id_aula}' AND tbl_clase.estatus=1 and hour(fecha_hora) = hour('{$this->fecha_hora}') AND MINUTE(fecha_hora) = MINUTE('{$this->fecha_hora}') ORDER by fecha_hora desc LIMIT 0,1";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	
	public function borrar()
    {
        $qry = "UPDATE tbl_clase SET estatus='0' WHERE id_clase='{$this->id_clase}'";
		$this->_datos=$this->_conexion->ejecutar($qry);
        
    }
	
	public function cargarPorFechaAula($fecha_inicio,$fecha_fin,$id_aula)
	{
		$qry = "SELECT * FROM vw_clases WHERE fecha_completa between '{$fecha_inicio}' and '{$fecha_fin} 23:59:59' and tbl_aula_id_aula='{$id_aula}' and estatus='1'";		
        $this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	
	public function cargarPorId()
	{
		$this->_query = "SELECT * FROM vw_clases WHERE id_clase='{$this->id_clase}'";
		$this->__cargarPropiedades();
	}


 }
?>