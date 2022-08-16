<?php
class Inventario extends General
{


	//guardar comentario
	public function guardar()
	{
		$qry = "INSERT INTO tbl_inventario ( numero_inventario , tbl_tipo_equipo_id_tipo_equipo , especificaciones , tbl_marca_id_marca , modelo , no_serie , tbl_ubicacion_id_ubicacion , observaciones, estado , estatus, tbl_usuario_id_usuario,siam) VALUES ('{$this->numero_inventario}' , '{$this->tbl_tipo_equipo_id_tipo_equipo}' , '{$this->especificaciones}' , '{$this->tbl_marca_id_marca}' ,'{$this->modelo}' , '{$this->no_serie }', '{$this->tbl_ubicacion_id_ubicacion}', '{$this->observaciones}' , '{$this->estado}' , '{$this->estatus}', '{$this->tbl_usuario_id_usuario}','{$this->siam}' );";
		$this->_conexion->ejecutar($qry);
	$this->id_inventario = $this->_conexion->getIdInsertado();
	}

	//modificar comentario
	public function actualizar()
	{
		$qry = "UPDATE tbl_inventario set  numero_inventario='{$this->numero_inventario}' , tbl_tipo_equipo_id_tipo_equipo='{$this->tbl_tipo_equipo_id_tipo_equipo}' , especificaciones='{$this->especificaciones}' , tbl_marca_id_marca=  '{$this->tbl_marca_id_marca}', modelo= '{$this->modelo}' , no_serie='{$this->no_serie }' , tbl_ubicacion_id_ubicacion='{$this->tbl_ubicacion_id_ubicacion}' , observaciones='{$this->observaciones}'  , estado='{$this->estado}', estatus='{$this->estatus}', tbl_usuario_id_usuario='{$this->tbl_usuario_id_usuario}', siam='{$this->siam}'  WHERE id_inventario='{$this->id_inventario}';";
		$this->_conexion->ejecutar($qry);
	}
	public function actualizarUbicacion()
	{
		$qry = "UPDATE tbl_inventario set   tbl_ubicacion_id_ubicacion='{$this->tbl_ubicacion_id_ubicacion}' WHERE id_inventario='{$this->id_inventario}';";
		$this->_conexion->ejecutar($qry);
	}


	
	public function eliminar()
	{
		$qry = "UPDATE tbl_inventario set estatus=0  WHERE id_inventario={$this->id_inventario}";
		$this->_conexion->ejecutar($qry);
	}
	
    public function cargarActivos()
    {        
  		$qry = "SELECT * FROM vw_inventario WHERE estatus =  1 ORDER BY numero_inventario ASC";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
    }

    public function cargarSiam()
    {        
  		$qry = "SELECT * FROM vw_inventario WHERE siam =  1 ORDER BY tipo_equipo,numero_inventario ASC";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
    }
    
    public function cargarBusqueda($busqueda)
    {        
  		$qry = "SELECT * FROM vw_inventario WHERE estatus =  1 and (numero_inventario like '%{$busqueda}%' OR no_serie like '%{$busqueda}%' OR tipo_equipo like '%{$busqueda}%' ) ORDER BY numero_inventario ASC";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
    }
    
    public function cargarBusquedaPorInventario($busqueda)
    {        
  		$qry = "SELECT * FROM tbl_inventario WHERE estatus =  1 and (numero_inventario like '%{$busqueda}' )";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
    }
    
    public function cargarPorInventario($busqueda)
    {        
  		$qry = "SELECT * FROM tbl_inventario WHERE estatus =  1 and (numero_inventario = '{$busqueda}' )";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
    }
    
    public function cargarPorNumeroInventario()
    {        
  		$this->_query = "SELECT * FROM tbl_inventario WHERE estatus =  1 and (numero_inventario = '{$this->numero_inventario}' )";
		$this->__cargarPropiedades();
    }
    
    public function cargarPorNumeroInventarioSimilar()
    {        
  		$this->_query = "SELECT * FROM tbl_inventario WHERE estatus =  1 and (numero_inventario like '%{$this->numero_inventario}' )";
		$this->__cargarPropiedades();
    }    
    
	public function cargar()
	{
		$qry = "SELECT * FROM tbl_inventario";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    
    public function cargar_grid()
	{
		$qry = "SELECT id_inventario,numero_inventario,modelo,ubicacion,no_serie, marca, tipo_equipo FROM vw_inventario WHERE estatus=1";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	
	//cargar comentario por Id
	public function cargarPorId()
	{
		$this->_query = "SELECT * FROM vw_inventario WHERE id_inventario='{$this->id_inventario}'";
		$this->__cargarPropiedades();
	}
	
	public function cargarPorTipoYUbicacion()
	{
		$this->_query = "SELECT * FROM vw_inventario WHERE tbl_tipo_equipo_id_tipo_equipo='{$this->tbl_tipo_equipo_id_tipo_equipo}' and tbl_ubicacion_id_ubicacion='{$this->tbl_ubicacion_id_ubicacion}' and estatus= 1";		
        $this->__cargarPropiedades();
	}
    
    public function cargarPorUbicacion()
	{
		$qry = "SELECT * FROM vw_inventario WHERE estatus=1 AND tbl_ubicacion_id_ubicacion='{$this->tbl_ubicacion_id_ubicacion}'";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    
 }
?>
