<?php
class Equipo extends General
{
	public function guardar()
	{
		$qry = "INSERT INTO tbl_equipo (sistema_operativo , product_key , nombre , ip , mac , procesador , ram , disco_duro , unidad_lectora , floppy , fecha_compra , fecha_obsolecencia , factura , fecha_inicio_garantia , fecha_fin_garantia , proveedor , estado , tbl_ubicacion_id_ubicacion, recurso , estatus, acceso_internet) VALUES ( '{$this->sistema_operativo}' , '{$this->product_key}', '{$this->nombre}' , '{$this->ip}' , '{$this->mac}' , '{$this->procesador}' , '{$this->ram}' , '{$this->disco_duro}' , '{$this->unidad_lectora}' , '{$this->floppy}' , '{$this->fecha_compra}' , '{$this->fecha_obsolecencia}' , '{$this->factura}' , '{$this->fecha_inicio_garantia}' , '{$this->fecha_fin_garantia}' , '{$this->proveedor}' , '{$this->estado}' , '{$this->tbl_ubicacion_id_ubicacion}', '{$this->recurso}' , '{$this->estatus}', '{$this->acceso_internet}');";
		$this->_conexion->ejecutar($qry);
        $this->id_equipo = $this->_conexion->getIdInsertado();
	}
	
	public function actualizar()
	{
		$qry = "UPDATE tbl_equipo set sistema_operativo='{$this->sistema_operativo}' , product_key='{$this->product_key}', nombre='{$this->nombre}' , ip='{$this->ip}' , mac='{$this->mac}' , procesador='{$this->procesador}' , ram='{$this->ram}' , disco_duro='{$this->disco_duro}' , unidad_lectora='{$this->unidad_lectora}' , floppy='{$this->floppy}' , fecha_compra='{$this->fecha_compra}' , fecha_obsolecencia='{$this->fecha_obsolecencia}' , factura='{$this->factura}' , fecha_inicio_garantia='{$this->fecha_inicio_garantia}' , fecha_fin_garantia='{$this->fecha_fin_garantia}' , proveedor='{$this->proveedor}' , estado='{$this->estado}' , tbl_ubicacion_id_ubicacion='{$this->tbl_ubicacion_id_ubicacion}', recurso = '{$this->recurso}', acceso_internet = '{$this->acceso_internet}'   WHERE id_equipo={$this->id_equipo}";
		$this->_conexion->ejecutar($qry);
	}

	public function eliminar()
	{
		$qry = "UPDATE tbl_equipo set estatus=0  WHERE id_equipo={$this->id_equipo}";
		$this->_conexion->ejecutar($qry);
	}
	
	public function cargar()
	{
		$qry = "SELECT * FROM tbl_equipo";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	public function cargarMacs()
	{
		$qry = "SELECT * FROM tbl_equipo WHERE not mac='N.A.' and not mac='' and acceso_internet = 1";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    
    public function cargar_grid()
	{
		$qry = "SELECT id_equipo,nombre, mac, ip FROM tbl_equipo WHERE estatus=1";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	
	//cargar comentario por Id
	public function cargarPorId()
	{
		$this->_query = "SELECT * FROM vw_equipo WHERE id_equipo='{$this->id_equipo}'";
		$this->__cargarPropiedades();
	}
	
    
 }
?>
