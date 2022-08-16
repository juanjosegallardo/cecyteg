<?php
class Acordion
{
	function __construct($id="")
	{
		$this->id=$id;
        $this->id_tab = 1;
        $this->divs = "";
        $this->encabezados = "";
        $this->width = "710px";
		$this->height = "350px";
	}

    public function __toString()
    {
        $str_acordion = "";
        $str_acordion .= "<div style=\"width:" . $this->width . "\">";
        $str_acordion .= "<div iniciado=\"false\" class=\"acordion\" id=\"" . $this->id . "\">";
        $str_acordion .= $this->str_divs;
        $str_acordion .= "</div>";
        $str_acordion .= "</div>";
        return $str_acordion;       
    }

    public function agregarColapsable($encabezado, $pagina)
    {
        $this->str_divs .= "<div>";
        $this->str_divs .= "<h3><div align=\"left\"><a href=\"#\">" . $encabezado . "</a></div></h3>";
		$this->str_divs .= "<div><div iniciado=\"false\" class=\"acordion_tab\" pagina=\"" .$pagina ."\" id=\"div_". $this->id . "_".$this->id_acordion."\" style=\"height: " . $this->height . "\"></div></div>";
        $this->str_divs .= "</div>";
        $this->id_acordion++;
    }
}

?>
