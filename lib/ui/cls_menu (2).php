<?php
class Menu extends General
{

	public function __construct($id)
	{
		$this->id=$id;	
		$this->secciones="";
		$this->height="27px";
		$this->cont=1;
		$this->width=1;
	}
	
	public function agregarSeccion($seccion, $link, $width=100)
	{
		$this->secciones.="<td id=\"{$this->id}_{$this->cont}\" class=\"seccion_menu\"  nowrap=\"nowrap\" height=\"{$this->height}\" align=\"center\" width=\"{$width}px\" onclick=\"{$link}\">{$seccion}</td><td width=\"1px\" class=\"separador\"></td>";
		$this->cont++;
		$this->width+=$width+1;
	}
	public function __toString()
	{
		$cad="<table class=\"menu fondo_menu\"  width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td align=\"center\">   <table width=\"{$this->width}\" class=\"fondo_menu\"  cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td width=\"1px\" class=\"separador\"></td><td>{$this->secciones}</td></tr></table></td></tr></table>";
		return $cad;
	}
}
?>