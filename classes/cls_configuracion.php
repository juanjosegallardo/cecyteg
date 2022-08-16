<?php
class Configuracion extends General
{

	//guardar comentario
	public function guardarTema()
	{
		$qry = "UPDATE tbl_configuracion SET valor = '{$this->tema}' WHERE propiedad = 'tema'";
		$this->_conexion->ejecutar($qry);
	}
	public function guardarColorFondo()
	{
		$qry = "UPDATE tbl_configuracion SET valor = '{$this->color_fondo}' WHERE propiedad = 'color_fondo'";
		$this->_conexion->ejecutar($qry);
	}
    
    
    
	public function cargarTema()
	{
		$this->_query = "SELECT valor as tema FROM tbl_configuracion WHERE propiedad='tema'";
		$this->__cargarPropiedades();
	}

	public function cargarColorFondo()
	{
		$this->_query = "SELECT valor as color_fondo FROM tbl_configuracion WHERE propiedad='color_fondo'";
		$this->__cargarPropiedades();
	}


	public function cargarCredencial()
	{
		$this->_query = "SELECT valor as credencial_nombre_x  FROM tbl_configuracion WHERE propiedad='credencial_nombre_x'";
		$this->__cargarPropiedades();
        $this->_query = "SELECT valor as credencial_nombre_y  FROM tbl_configuracion WHERE propiedad='credencial_nombre_y'";
		$this->__cargarPropiedades();
        $this->_query = "SELECT valor as credencial_foto_x  FROM tbl_configuracion WHERE propiedad='credencial_foto_x'";
		$this->__cargarPropiedades();
        $this->_query = "SELECT valor as credencial_foto_y  FROM tbl_configuracion WHERE propiedad='credencial_foto_y'";
		$this->__cargarPropiedades();
        $this->_query = "SELECT valor as credencial_codigo_x  FROM tbl_configuracion WHERE propiedad='credencial_codigo_x'";
		$this->__cargarPropiedades();
        $this->_query = "SELECT valor as credencial_codigo_y  FROM tbl_configuracion WHERE propiedad='credencial_codigo_y'";
		$this->__cargarPropiedades();

	}
    
	public function guardarCredencial()
	{
		$qry = "UPDATE tbl_configuracion SET valor = '{$this->credencial_nombre_x}' WHERE propiedad = 'credencial_nombre_x'";
		$this->_conexion->ejecutar($qry);
		$qry = "UPDATE tbl_configuracion SET valor = '{$this->credencial_nombre_y}' WHERE propiedad = 'credencial_nombre_y'";
		$this->_conexion->ejecutar($qry);
		$qry = "UPDATE tbl_configuracion SET valor = '{$this->credencial_foto_x}' WHERE propiedad = 'credencial_foto_x'";
		$this->_conexion->ejecutar($qry);
		$qry = "UPDATE tbl_configuracion SET valor = '{$this->credencial_foto_y}' WHERE propiedad = 'credencial_foto_y'";
		$this->_conexion->ejecutar($qry);
		$qry = "UPDATE tbl_configuracion SET valor = '{$this->credencial_codigo_x}' WHERE propiedad = 'credencial_codigo_x'";
		$this->_conexion->ejecutar($qry);
		$qry = "UPDATE tbl_configuracion SET valor = '{$this->credencial_codigo_y}' WHERE propiedad = 'credencial_codigo_y'";
		$this->_conexion->ejecutar($qry);

	}


	public function cargarTemas()
	{
		$arr_temas = scandir("../../../lib/ui/ui/css/");
		$i=0;
		foreach($arr_temas as $tema)
		{
			if ($tema!="." && $tema!="..")
			{
				$this->_datos[$i]["tema"] = $tema;
				$this->_datos[$i]["id_tema"] = $tema;
				$i++;
			}
		}     
                
	}
 }
?>
