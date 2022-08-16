<?php
class RegistroServicio extends General
{

	//guardar comentario
	public function guardar_entrada()
	{
		$qry = "INSERT INTO tbl_registro_servicio (hora_entrada, hora_salida, tbl_alumno_id_alumno) VALUES ( '{$this->hora_entrada}',  '{$this->hora_salida}', '{$this->tbl_alumno_id_alumno}');";
		$this->_conexion->ejecutar($qry);
        $this->id_marca = $this->_conexion->getIdInsertado();
	}
	
    
   	public function guardar_salida()
	{
		$qry = "UPDATE  tbl_registro_servicio SET hora_salida='{$this->hora_salida}' WHERE  id_registro_servicio='{$this->id_registro_servicio}' ;";
		$this->_conexion->ejecutar($qry);
        $this->id_marca = $this->_conexion->getIdInsertado();
	}
    
    public function cargar_hoy()
	{
	   $this->_query = "SELECT * FROM tbl_registro_servicio where TIMEDIFF(hora_entrada,hora_salida) = 0  AND TIMESTAMPDIFF( HOUR,hora_entrada, NOW() ) <16  AND tbl_alumno_id_alumno = '{$this->tbl_alumno_id_alumno}' ORDER BY id_registro_servicio DESC";
	   $this->__cargarPropiedades();
	}
 }
?>
