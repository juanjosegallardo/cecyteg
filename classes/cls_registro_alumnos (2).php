<?php
class RegistroAlumno extends General
{

	//guardar comentario
	public function guardar()
	{
		$qry = "INSERT INTO tbl_registro_alumno (fecha,duracion,actividad, acceso_internet,tbl_alumno_id_alumno,equipo,tbl_profesor_id_profesor,aula,materia, aula_virtual) VALUES ( '{$this->fecha}','{$this->duracion}','{$this->actividad}', '{$this->acceso_internet}','{$this->tbl_alumno_id_alumno}', '{$this->equipo}', '{$this->tbl_profesor_id_profesor}', '{$this->aula}', '{$this->materia}', '{$this->aula_virtual}');";
		$this->_conexion->ejecutar($qry);
        $this->id_registro_alumnos = $this->_conexion->getIdInsertado();
	}
	
    	public function cargarReporte()
	{

		$qry = "SELECT tbl_alumno.nombre, fecha, hora_entrada, hora_salida,vw_clases.grupo, actividad, acceso_internet, equipo FROM tbl_alumno left JOIN tbl_clase_alumno ON tbl_clase_alumno.tbl_alumno_id_alumno= tbl_alumno.id_alumno LEFT JOIN tbl_clase ON tbl_clase_alumno.tbl_clase_id_clase = tbl_clase.id_clase left join vw_clases ON vw_clases.id_clase = tbl_clase_alumno.tbl_clase_id_clase WHERE vw_clases.fecha ='{$this->fecha}'";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);


	}

    	public function cargarInasistencias()
	{

		$qry = "SELECT * FROM tbl_alumno where estatus= 1 and id_alumno not in ( select tbl_alumno_id_alumno FROM tbl_clase_alumno left join tbl_clase on tbl_clase_alumno.tbl_clase_id_clase=tbl_clase.id_clase where fecha_hora  ='{$this->fecha} {$this->hora}' ) and grupo='{$this->grupo}' and tbl_alumno.estatus=1 ORDER BY no_control asc";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);


	}


    	public function cargarReporteMaestrosPorFecha()
	{

		$qry = "SELECT * FROM vw_clases where fecha='{$this->fecha}'  AND estatus=1 and archivo='S' and total_alumnos > 0 order by fecha_completa asc";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);


	}

    	public function cargarReporteAulaVirtual($mes, $ano)
	{

		$qry = "SELECT * FROM vw_clases where aula_virtual=1 and estatus= 1 and month(fecha)= '{$mes}' and year(fecha)= '{$ano}' order by fecha_completa asc";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);


	}

    	public function cargarReporteMaestros()
	{

		$qry = "SELECT nombre,   Date_format(fecha,'%Y-%m-%d') as fecha , Date_format(fecha,'%h:%i %p')   as hora_entrada,     Date_format(DATE_ADD(fecha,INTERVAL duracion MINUTE),'%h:%i %p') as hora_salida, grupo, actividad, acceso_internet, tbl_registro_alumno.equipo FROM `tbl_registro_alumno` left join tbl_alumno on
tbl_registro_alumno.tbl_alumno_id_alumno = tbl_alumno.id_alumno";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);


	}


    	public function cargarFechas($fecha_inicio, $fecha_fin)
	{

	$qry = "SELECT fecha FROM vw_clases where estatus=1 and archivo='S'  and total_alumnos > 0 and fecha >= '{$fecha_inicio}'and fecha < '{$fecha_fin}' GROUP BY fecha";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);


	}

	

 }
?>
