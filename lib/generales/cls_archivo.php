<?php 
class Archivo extends General
{
	public $destino;
	public $tamanio;
	public $tipos;
	public $archivo;
	public $error;
	public function subirArchivo()
	{
		if(!in_array($this->archivo['type'],$this->tipos))
		{
			$this->error=1;
			return false;
		}		
		if( $this->archivo['size'] > $this->tamanio )
		{			
			$this->error=2;
            return false;
		}
		if(move_uploaded_file($this->archivo['tmp_name'],$this->destino))
		{		
			return true;
		}
		else
		{
			$this->error=3;		
			return false;
		}
		return false;
	}	
}
?>