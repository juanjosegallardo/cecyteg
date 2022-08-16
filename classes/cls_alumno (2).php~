<?php
class Alumno extends General
{
	public function guardar()
	{
		$qry = "INSERT INTO tbl_alumno (nombre, grupo,no_control, estatus, equipo) VALUES ( '{$this->nombre}','{$this->grupo}','{$this->no_control}',  '{$this->estatus}',  '{$this->equipo}');";
		$this->_conexion->ejecutar($qry);
        $this->id_alumno = $this->_conexion->getIdInsertado();
	}
	
	public function actualizar()
	{
		$qry = "UPDATE tbl_alumno set nombre='{$this->nombre}', grupo='{$this->grupo}', no_control='{$this->no_control}' , equipo='{$this->equipo}' WHERE id_alumno={$this->id_alumno}";
		$this->_conexion->ejecutar($qry);
	}

	public function eliminar()
	{
		$qry = "UPDATE tbl_alumno set estatus=0  WHERE id_alumno={$this->id_alumno}";
		$this->_conexion->ejecutar($qry);
	}
	
	public function cargar()
	{
		$qry = "SELECT * FROM tbl_alumno";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    

    public function cargarGrid()
	{
		$qry = "SELECT id_alumno,no_control, nombre, grupo FROM tbl_alumno WHERE estatus=1";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	

	
      
    public function cargar_alumnos($nombre_alumno)
	{
		$qry = "SELECT * FROM tbl_alumno WHERE estatus=1 AND nombre like '%{$nombre_alumno}%' or no_control like '%{$nombre_alumno}%'";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}

    public function cargar_alumnos_grupo($nombre_alumno,$grupo)
	{
		$qry = "SELECT * FROM tbl_alumno WHERE estatus=1 AND (nombre like '%{$nombre_alumno}%' or no_control like '%{$nombre_alumno}%') and GRUPO like '%{$grupo}%' ";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}



    public function cargar_alumnos_grupo_aseo($grupo)
	{
			$qry = "SELECT  *, count(tbl_aseo_alumno.id_aseo_alumno)as veces FROM tbl_alumno left join tbl_aseo_alumno on
tbl_alumno.id_alumno = tbl_aseo_alumno.tbl_alumno_id_alumno WHERE grupo= '{$grupo}' AND tbl_alumno.estatus='1'
group by id_alumno ORDER BY veces, id_alumno ASC ";
			$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	
	
	public function guardar_aseo($fecha)
	{
		$qry = "INSERT INTO tbl_aseo_alumno(tbl_alumno_id_alumno, fecha) values('{$this->id_alumno}','{$fecha}'); ";
		$this->_conexion->ejecutar($qry);
	}
        public function cargarPorGrupo()
	{
		$qry = "SELECT * FROM tbl_alumno WHERE estatus=1 AND grupo='{$this->grupo}'";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
   	
	public function cargarPorNoControl()
	{
		$this->_query = "SELECT * FROM tbl_alumno WHERE no_control='{$this->no_control}'";
		$this->__cargarPropiedades();
	}
    
    public function cargarPorId()
	{
		$this->_query = "SELECT * FROM tbl_alumno WHERE id_alumno='{$this->id_alumno}'";
		$this->__cargarPropiedades();
	}

	public function cargarHorasPractica()
	{
		$this->_query = "SELECT SEC_TO_TIME(SUM(TIMESTAMPDIFF(SECOND, hora_entrada, hora_salida))) as horas_practica FROM `tbl_registro_servicio` WHERE tbl_alumno_id_alumno='{$this->id_alumno}'";
		$this->__cargarPropiedades();
	}
	

 }
?>
