<?php 
class General
{
	public $_datos;
	public $_conexion;
	public $_query;
	public $_propiedades;
    	public $_html_entities;
	public $_utf8_decode;

	function __construct($conexion=null)
	{
		if($conexion == null)
		{
		    $this->_conexion=new Conexion();    
		}
		else
		{
		 $this->_conexion = $conexion;   
		}
		
		$this->_datos=array();
		$this->_propiedades=array();
		$this->_html_entities=false;
		$this->_utf8_decode=true;
	}
	function __set($dato,$valor)
	{
		$this->_propiedades[$dato]=$valor;
	}
	function __get($dato)
	{
		
		   if($this->_html_entities)
	       {
		    return htmlentities($this->_propiedades[$dato]);
	       }
	       else
	       {
	  	         return $this->_propiedades[$dato];
	       }
	}
	function __cargarPropiedades()
	{
	
		$arr_aux = array();
		$arr_aux =$this->_conexion->ejecutarQuery($this->_query);
		if(count($arr_aux) !=0)
		{
		    $registro=$arr_aux[0];
	    		foreach($registro as $dato=>$valor)
	    		{
	
				if($this->_utf8_decode)
			       {
	    				$this->$dato=utf8_decode($valor) ;
				}
				else
				{
					$this->$dato=$valor ;
				}	
	    		}                
		}
	}
    
    
   	public function getArray($campos)
	{
		$arr_json = array();       
		foreach($this->_datos as $renglon)
		{
		    $renglon_json=array();
		    foreach($campos as $campo)
		    {
		        
		        $renglon_json[$campo] = $renglon[$campo];
		    }
		    
		    $arr_json[]=$renglon_json;
		}
		return $arr_json;	   	
	}
    
	public function getJSON($campos)
	{
	   return json_encode($this->getArray($campos));
	}
}
?>
