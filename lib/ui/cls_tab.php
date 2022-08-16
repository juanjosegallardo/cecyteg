<?php

class Tab
{
	function __construct($id="")
	{
		$this->id=$id;
        $this->id_tab = 1;
        $this->divs = "";
        $this->encabezados = "";
        $this->width = "800px";

	}

    public function agregarTab($encabezado, $pagina, $funciones_js="")
    {
        $this->encabezados .= "<li><a href=\"".$pagina . "\">" . $encabezado . "</a></li>";
        $this->divs .= "<div ";        
        $this->divs .= "funciones_js=\"" .$funciones_js . "\"";
        $this->divs .= "id=\"tabs-" .$this->id."-" . $this->id_tab . "\"></div>";
        $this->id_tab++;
    }

    public function __toString()
    {
        $tab="";
        $tab .= "<div style=\"width:" . $this->width . "\">";
        $tab .= "<div iniciado=\"false\" class=\"tab\" id=\"" . $this->id . "\">";
        $tab .= "<ul>";
        $tab .= $this->encabezados;
        $tab .= "</ul>";
        $tab .= $this->divs;
        $tab .= "</div>";
        $tab .= "</div>";
        return $tab;
    }
}
?>