<?php
class PrestamoAlumno extends General
{
	public function guardar()
	{
		$qry = " INSERT INTO tbl_prestamo_alumno (tbl_alumno_id_alumno, tbl_prestamo_id_prestamo)VALUES ('{$this->tbl_alumno_id_alumno}', '{$this->tbl_prestamo_id_prestamo}');";
		$this->_conexion->ejecutar($qry);
	}

    
 }
?>
