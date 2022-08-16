<?php 
class Conexion
{
	private $con;	
	public $query;	
	public $estado;
	
	public function Conexion()
	{	
	   $this->con=mysqli_connect(BASE_DATOS_SERVIDOR,BASE_DATOS_USUARIO,BASE_DATOS_PASSWORD);
		mysqli_select_db($this->con,BASE_DATOS_NOMBRE);        
		$this->estado=true;
	}
	
	public function ejecutarQuery($query)
	{
		$this->query=$query;
		$res=array();
		$res_consulta=mysqli_query($this->con,$query);
		while($row=mysqli_fetch_array($res_consulta))
		{
			foreach($row as $indice=>$valor)
			{
					$row[$indice]=utf8_encode($valor);
			}
			array_push($res,$row);
		}
		return $res;
	}
	
	public function ejecutar($query)
	{
		$this->query=$query;
        $res_consulta=mysqli_query($this->con,$query);
		$this->estado = $this->estado && $res_consulta;
		return $res_consulta;
	}
	
	
	public function iniciarTransaccion()
	{
		$this->ejecutar("BEGIN");
	}
	
	
	public function ejecutarTransaccion()
	{
		if($this->estado)
		{
			$this->ejecutar("COMMIT");
		}
		else
		{
			$this->ejecutar("ROLLBACK");
		}		
		return $this->estado;
	}

	public function getConexion()
	{
        return $this->con;		
	}
    
    public function getIdInsertado()
    {        
       return mysqli_insert_id($this->con);
    }
}
?>