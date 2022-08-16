<?php 
define("EXP_ENTERO", "/^[0-9]+$/");
define("EXP_ALFANUMERICO", "/^[a-z0-9]*$/i");
define("EXP_ALFANUMERICO_ESPACIO", "/^([a-z0-9 ])*$/i");
define("EXP_CORREO", "/^[A-Za-z][A-Za-z0-9_\-\.]*@[A-Za-z0-9_\-]+(\.[A-Za-z0-9_\-]+)+[A-Za-z]$/");
define("EXP_LETRA", "/^([a-z0-9])*$/i");
define("EXP_LETRA_ESPACIO", "/.*/");
define("EXP_LETRA_ESPACIO_ESPECIALES", "/^[a-z0-9 \-\_\.\(\)\/\?\¡\!\¿]*$/i");
define("EXP_DECIMAL", "/^[0-9]*.[0-9]*$/i");
define("EXP_TELEFONO", "/^[0-9*]+$/");
define("EXP_DIRECCION", "/^[0-9a-z#\. ]*$/i");

define("CAR_ENTERO", "48-58,8"); 
define("CAR_ALFANUMERICO", "48-58,97-122,8");
define("CAR_CORREO", "48-58,97-122,8,64,46");
define("CAR_LETRA", "48-58,97-122,8");
define("CAR_LETRA_ESPACIO", "1-255");
define("CAR_LETRA_ESPACIO_ESPECIALES", "48-58,97-122,8");
define("CAR_DECIMAL", "48-58,8,46");
define("CAR_TELEFONO", "48-58,8");
define("CAR_DIRECCION", "48-58,97-122,8");

class Formulario
{
    public $pantalla;
    public $mensaje;
    public $validado;
    
    public function generar_componente($componente)    
    {
        
        $html ="";
        $html .= "<" .$this->pantalla[$componente]["etiqueta"];
        $html .= ' id= "' . $componente . '"';
        $html .= ' name= "' . $componente . '"';
        foreach($this->pantalla[$componente] as $propiedad=>$valor)
        {            
            if(($propiedad!="etiqueta" && $propiedad!="campo" && $propiedad!="texto" )||( $propiedad=="campo" && $this->pantalla[$componente]["etiqueta"] =="select") )
            {
                $html .= ' '. $propiedad. '= "' . utf8_encode($valor) . '"';        
            }                              
        }
        $html .= "/>";
        return $html;        
    }
    
    public function generar_etiqueta($componente)
    {                 
        $html ="";
        $html .= utf8_encode((isset($this->pantalla[$componente]["texto"]))?  $this->pantalla[$componente]["texto"]:"");
        $html .= ( isset($this->pantalla[$componente]["obligatorio"]) && $this->pantalla[$componente]["obligatorio"]=="true")?"*":"";
        return $html;
    }
    
    public function validar(&$clase = null)
    {
                
        $this->validado = true;
        foreach($this->pantalla as $componente => $propiedades)        
        {            
            if(isset($propiedades["exp"]) &&   $propiedades["exp"] &&  isset($_POST[$componente]) && !preg_match($propiedades["exp"],$_POST[$componente]))
            {
                $this->validado = false;
                $this->mensaje = $propiedades["mensaje"];                                
            }
            if($clase && isset($propiedades["campo"]) && isset($_POST[$componente]))
            {
                $clase->_propiedades[$propiedades["campo"] ] = $_POST[$componente];    
            }                    
        }
                        
    }
        
    public function cargar($clase)
    {
        foreach($this->pantalla as $componente => $propiedades)        
        {   
		if(isset($propiedades["campo"]) && isset($clase->_propiedades[$propiedades["campo"]]) )
		{
		    $this->pantalla[$componente]["value"]  = $clase->_propiedades[$propiedades["campo"]];
		    if($propiedades["etiqueta"]=="select")
		    {
		        $this->pantalla[$componente]["valor_seleccionado"]  = $clase->_propiedades[$propiedades["campo"]];
		    }
		}	
        }        
    }
    
    public function deshabilitar()
    {
        foreach($this->pantalla as $componente => $propiedades)        
        {            
            if(!(isset($this->pantalla[$componente]["etiqueta"]) && $this->pantalla[$componente]["etiqueta"]=="input") && isset($this->pantalla[$componente]["type"]) &&  $this->pantalla[$componente]["type"]!="hidden"  )
            {
                $this->pantalla[$componente]["disabled"]  = "true";   
            }                            
        }        
    }
    
    public function deshabilitar_componente($componente)
    {
        $this->pantalla[$componente]["disabled"]  = "true";   
    }
    
    public function agregar_parametros( $array)
    {
        $parametros="?";
        $i=1;
        foreach($array as $parametro => $valor)
        {
            $parametros.= $parametro. "=" . $valor;
            if(count($array) < $i)
            {
                    $parametros .="&";
            }                        
        }
        
        foreach($this->pantalla as $componente => $propiedades)        
        {            
            if(isset($this->pantalla[$componente]["ruta"]))
            {
                $this->pantalla[$componente]["ruta"]  .= $parametros;   
            }                            
        }   
    }
    
        
}
?>
