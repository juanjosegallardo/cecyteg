<?php
class ClaseAlumno extends General
{
    

	public function guardar()
	{
		$qry = "INSERT INTO tbl_clase_alumno (tbl_clase_id_clase, tbl_alumno_id_alumno) VALUES ('{$this->tbl_clase_id_clase}', '{$this->tbl_alumno_id_alumno}');";
		$this->_conexion->ejecutar($qry);	     
	}


 }
?>