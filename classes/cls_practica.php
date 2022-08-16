<?php
class Practica extends General
{


	public function cargar()
	{
		$qry = "SELECT * FROM tbl_practica WHERE estatus =1 ";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    
    public function cargarPorId()
    {
    	$this->_query = "SELECT * FROM tbl_practica WHERE id_practica='{$this->id_practica}'";
		$this->__cargarPropiedades();	
    }
    
	public function cargarPorMateria()
	{
		$qry = "SELECT * FROM tbl_practica WHERE tbl_materia_id_materia='{$this->tbl_materia_id_materia}' AND estatus=1";
		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
    
    
	    
	public function cargarPorMateriaProfesor()
	{
		$qry = "SELECT * FROM tbl_practica WHERE tbl_materia_id_materia='{$this->tbl_materia_id_materia}' AND tbl_profesor_id_profesor='{$this->tbl_profesor_id_profesor}' AND estatus=1";

		$this->_datos=$this->_conexion->ejecutarQuery($qry);
	}
	
    public function cargar_grid()
    {
        
  		$qry = "SELECT * , tbl_profesor.nombre as profesor FROM tbl_practica LEFT JOIN tbl_materia ON tbl_practica.tbl_materia_id_materia = tbl_materia.id_materia LEFT JOIN tbl_profesor ON tbl_practica.tbl_profesor_id_profesor=tbl_profesor.id_profesor WHERE tbl_practica.estatus=1";
   	    $this->_datos=$this->_conexion->ejecutarQuery($qry);
    
    }
	
    public function guardar()
    {
   	    $qry = "INSERT INTO tbl_practica(tbl_materia_id_materia,practica,tbl_profesor_id_profesor,estatus,archivo) VALUES('{$this->tbl_materia_id_materia}','{$this->practica}','{$this->tbl_profesor_id_profesor}' ,1,'N'); ";
		$this->_conexion->ejecutar($qry);        
    }
    

    public function actualizar()
    {
   	    $qry = "UPDATE tbl_practica SET tbl_materia_id_materia='{$this->tbl_materia_id_materia}',practica='{$this->practica}', tbl_profesor_id_profesor='{$this->tbl_profesor_id_profesor}' WHERE id_practica='{$this->id_practica}'; ";
    	$this->_conexion->ejecutar($qry);        
    }
	
	    public function actualizarArchivo()
    {
   	    $qry = "UPDATE tbl_practica SET archivo='S' WHERE id_practica='{$this->id_practica}'; ";
    	$this->_conexion->ejecutar($qry);        
    }

    public function eliminar()
    {
   	    $qry = "UPDATE tbl_practica SET estatus='0' WHERE id_practica='{$this->id_practica}'; ";
    	$this->_conexion->ejecutar($qry);        
    }

    
 }
?>
