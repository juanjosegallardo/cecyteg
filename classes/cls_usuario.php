<?php
class Usuario extends General
{

	//guardar comentario
	public function guardar()
	{
		$qry = "INSERT INTO tbl_usuario (nombre_usuario, password, apellido_paterno, apellido_materno, nombre, correo_electronico, estatus) VALUES ('{$this->nombre_usuario}', '{$this->password}', '{$this->apellido_paterno}', '{$this->apellido_materno}', '{$this->nombre}', '{$this->correo_electronico}', {$this->estatus});";
		$this->_conexion->ejecutar($qry);
        $this->id_usuario = $this->_conexion->getIdInsertado();
	}
	
	//modificar comentario
	public function actualizar()
	{
		$qry = "UPDATE tbl_usuario set nombre_usuario='{$this->nombre_usuario}', password='{$this->password}', apellido_paterno='{$this->apellido_paterno}', apellido_materno='{$this->apellido_materno}', nombre='{$this->nombre}', correo_electronico='{$this->correo_electronico}', estatus={$this->estatus} WHERE id_usuario={$this->id_usuario}";
		$this->_conexion->ejecutar($qry);
	}

	//modificar comentario
	public function actualizar_password()
	{
		$qry = "UPDATE tbl_usuario set  password='{$this->password}' WHERE id_usuario={$this->id_usuario}";
		$this->_conexion->ejecutar($qry);
	}
    
	public function actualizar_generales()
	{
		$qry = "UPDATE tbl_usuario set nombre_usuario='{$this->nombre_usuario}', apellido_paterno='{$this->apellido_paterno}', apellido_materno='{$this->apellido_materno}', nombre='{$this->nombre}', correo_electronico='{$this->correo_electronico}', estatus={$this->estatus} WHERE id_usuario={$this->id_usuario}";
		$this->_conexion->ejecutar($qry);
	}
    
	//eliminar comentario
	public function eliminar()
	{
		$this->estatus=0;
		$this->actualizar();
	}
	
	//cargar comentarios
	public function cargar()
	{
		$qry = "SELECT * FROM tbl_usuario";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}

	public function cargar_usuarios($nombre)
	{
		$qry = "SELECT * FROM vw_usuario where nombre like '%{$nombre}%'";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    
	public function cargar_grid()
	{
		$qry = "SELECT *  FROM vw_usuario WHERE estatus=1";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	
	//cargar comentario por Id
	public function cargarPorId()
	{
		$this->_query = "SELECT * FROM vw_usuario WHERE id_usuario='{$this->id_usuario}'";
		$this->__cargarPropiedades();
	}
	
    public function cargarPorUsuarioPassword()
	{
		$this->_query = "SELECT * FROM tbl_usuario WHERE nombre_usuario='{$this->nombre_usuario}' AND password = '{$this->password}'";        
		$this->__cargarPropiedades();
	}
	

    public function cargarPorUsuario()
	{
		$this->_query = "SELECT * FROM tbl_usuario WHERE nombre_usuario='{$this->nombre_usuario}'";        
		$this->__cargarPropiedades();
	}
	
    
	public function cargar_permisos()
	{
	   
		$qry = "SELECT * FROM tbl_usuario LEFT JOIN tbl_permiso_usuario ON tbl_permiso_usuario.tbl_usuario_id_usuario = tbl_usuario.id_usuario LEFT JOIN tbl_permiso ON tbl_permiso.id_permiso = tbl_permiso_usuario.tbl_permiso_id_permiso WHERE tbl_usuario_id_usuario = '{$this->id_usuario}' ";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    
    public function generar_arreglo_permisos()
    {
        $this->cargar_permisos();
        $arr_permisos = array();
        
        foreach($this->_datos as $renglon)
        {            
            array_push($arr_permisos, $renglon["clave_permiso"]);     
        }
        return $arr_permisos;                       
    } 
    
	public function guardar_permiso($id_permiso)
	{
		$qry = "INSERT INTO tbl_permiso_usuario (tbl_permiso_id_permiso, tbl_usuario_id_usuario) values ({$id_permiso}, {$this->id_usuario});";
		$this->_conexion->ejecutar($qry);
	}
	
    public function borrar_permisos()
	{
		$qry = "DELETE FROM tbl_permiso_usuario WHERE tbl_usuario_id_usuario = {$this->id_usuario};";
		$this->_conexion->ejecutar($qry);
	}
    
    public function comprobar_usuario()
    {
	   $qry = "SELECT count(*) as total FROM tbl_usuario WHERE nombre_usuario = '{$this->nombre_usuario}' and password='{$this->password}'";
       $arr = $this->_conexion->ejecutarQuery($qry);

       if ($arr[0]["total"] > 0 )
       {
            return true;        
       }
       else       
       {
            return false;
       }
                  
    }
 }
?>
