<?php
class Boton
{
	function __construct($id="", $value="", $onclick="", $estado=true,$visible=true ,$width="100pxs")
	{
		$this->id = $id;
		$this->value = $value;
		$this->onclick = $onclick;
		$this->width = $width;
		$this->estado = $estado;
		$this->visible = $visible;
	}

    public function __toString()
    {
		$str_boton = "";
		if ($this->visible)
		{

			$str_boton .= "<div ";
			$str_boton .= $this->estado ? "estado=\"true\" " : "estado=\"false\" ";
			$str_boton .= "iniciado=\"false\" class=\"boton\" ";
			$str_boton .= "onclick=\"";
			$str_boton .= "if($('#". $this->id . "').attr('estado')!='false' ){ " . $this->onclick . " }";
			$str_boton .= "\"";
			$str_boton .= "id=\"" . $this->id ."\">";
			$str_boton .=  $this->value;
			$str_boton .= "</div>";
		}

		return $str_boton;
    }	
}

?>
