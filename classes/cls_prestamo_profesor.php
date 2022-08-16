<?php
class PrestamoProfesor extends General
{
	public function guardar()
	{
		$qry = " INSERT INTO tbl_prestamo_profesor (tbl_profesor_id_profesor, tbl_prestamo_id_prestamo) VALUES ('{$this->tbl_profesor_id_profesor}', '{$this->tbl_prestamo_id_prestamo}');";
		$this->_conexion->ejecutar($qry);
	}

    
 }
?>
