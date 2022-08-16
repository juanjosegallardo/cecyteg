<?php
class PrestamoUsuario extends General
{
	public function guardar()
	{
		$qry = " INSERT INTO tbl_prestamo_usuario (tbl_usuario_id_usuario, tbl_prestamo_id_prestamo)VALUES ('{$this->tbl_usuario_id_usuario}', '{$this->tbl_prestamo_id_prestamo}');";
		$this->_conexion->ejecutar($qry);
	}

    
 }
?>
