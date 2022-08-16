<?php
class Grid
{
	public function __construct($id="",$datos=null)
	{
	
		$total_registros=0;
		if ($datos!= null)
		{
			$total_registros=count($this->datos);
		}
    	$this->id = $id;
        $this->buscar = false;
		$this->width="450px";
		$this->orden_columnas=array();
        $this->orden_columnas_excel=array();
		$this->width_columnas=array();
		$this->ordenables=array();
		$this->visibles=array();
		$this->maxlength=array();
		$this->align=array();
		$this->campos=array();
		$this->ordenacion=array();
        $this->filtros=array();
		$this->caracter_sustitucion="?";
		$this->propiedad_renglon = "";        
		$this->parametros_renglon = array();          
		$this->mensaje="";
        $this->propiedad_renglon ="";
		$arr_json["filtro"]="";
		if ($total_registros != 0)
		{
			$reglon=$this->datos[0];
			$i=0;
			foreach ($renglon as $indice=>$valor)
			{
				$this->orden_columnas[$i] = $this->campos[$i] = $indice;
				$this->width_columnas[$i] = (100 / n) + "%";
				$this->ordenables[$i] = true;
				$this->visibles[$i] = true;
				$this->maxlength[$i] = 0;
				$this->align[$i] = "center";
				$i++;
			}
		}
 	}
               
	public function __toString()
	{
	   
        $filtro = ($_POST["filtro"]==null)?"":$_POST["filtro"];
        $this->buscar = count($this->filtros) >0;
		//Aqui va el filtrado
        if(strlen($filtro)>0)
        {
           // $arr_busquedas =  explode(" ",$filtro);
    	    $arr_busquedas = array($filtro); 
            $posicion = 0;

            foreach($this->datos as $renglon )
            {
                
                $bandera= true;
                foreach($this->filtros as $campo)
                {
                    foreach($arr_busquedas as $busqueda)
                    {

                        if(  !(strpos(strtoupper($renglon[$campo]) ,strtoupper($busqueda) ) === false))
                        {
                            //echo $posicion. "<br />";
                            $bandera = false;                    
                        }
                         
                    }
                   
                }
                if($bandera)
                {
                    
                    unset($this->datos[$posicion]);
                }
                $posicion++;
            }
        }
   
        if(isset($_POST["no_pagina"]))
		{
			$no_pagina = $_POST["no_pagina"]; 
		}            
	
        $no_pagina = ( !isset($no_pagina) || $no_pagina == 0) ? 1 : $no_pagina;   	
        $registros_por_pagina= (isset($_POST["registros_por_pagina"])  && $_POST["registros_por_pagina"] != 0)?$_POST["registros_por_pagina"]:0;   
        $registros_por_pagina = ($registros_por_pagina == 0) ? 5 : $registros_por_pagina;
        $total_registros = count($this->datos);
        $total_paginas = ($total_registros % $registros_por_pagina > 0) ? (int)($total_registros / $registros_por_pagina) + 1 : $total_registros / $registros_por_pagina;
        $campo_ordenacion = ($_POST["campo_ordenacion"]==null)?$this->orden_columnas[0]:$_POST["campo_ordenacion"];
        $tipo_ordenacion = ($_POST["tipo_ordenacion"]==null)?"":$_POST["tipo_ordenacion"];        
        $desde = ($no_pagina - 1) * $registros_por_pagina;
        $hasta = ($desde + $registros_por_pagina < $total_registros) ? $desde + $registros_por_pagina : $total_registros;
        if(isset($_POST["excel"]))
	{
		$excel = $_POST["excel"];
	}		
        //Orden de registros
        $columna = array();
	$i=0;
        foreach($this->datos as $renglon )
        {
	
			array_push($columna,$renglon[$campo_ordenacion]);
		
		
       
        }                
        @array_multisort($columna,(isset($tipo_ordenacion)&&$tipo_ordenacion=="asc")?SORT_ASC:SORT_DESC,$this->datos );
        	
	$arr_renglones=array();	
        $arr_mix = array_merge($this->orden_columnas,$this->parametros_renglon );
        $arr_mix = array_unique($arr_mix);        
        $total_campos = count($arr_mix);  
		for ($i = $desde; $i < $hasta; $i++) 
        {   
        
            $renglon = array();
            $arr_celdas = array();
            for($j=0; $j<$total_campos ; $j++)
            {                
                @array_push($arr_celdas ,$this->datos[$i][$arr_mix[$j]]);
            }
            $renglon["celdas"] = $arr_celdas;        
            @array_push($arr_renglones,$renglon);           			 
		}		
		
		$arr_json = array();
		$arr_json["buscar"]=$this->buscar;                
		$arr_json["mensaje"]=$this->mensaje;
		$arr_json["propiedad_renglon"]=$this->propiedad_renglon;
        $arr_json["caracter_sustitucion"]=$this->caracter_sustitucion;
        $arr_json["parametros_renglon"]=$this->parametros_renglon;
        $arr_json["pagina"]=$no_pagina;
		$arr_json["total_paginas"]=$total_paginas;
		$arr_json["total_registros"]=$total_registros;
		$arr_json["registros_por_pagina"]=$registros_por_pagina;
		$arr_json["ancho_grid"]=$this->width;
		$arr_json["campo_ordenacion"]=$campo_ordenacion;
		$arr_json["tipo_ordenacion"]=$tipo_ordenacion;
		$arr_json["filtro"]=$filtro;
		$arr_json["longitudes_maximas"]=$this->maxlength;
		$arr_json["anchos"]=$this->width_columnas;
		$arr_json["ordenacion"]=$this->ordenacion;
		$arr_json["encabezados"]=$this->campos;
		$arr_json["renglones"]=$arr_renglones;
        
        if(isset($excel) && $excel == "true")
        {            
            $cadena_excel  = "";
            $cont=1;
            $no_campos = count($this->campos_excel);      
            foreach($this->campos_excel as $campo)
            {                    
               $cadena_excel.= '"' . utf8_decode($campo) . '"';
               if($cont < $no_campos )
               {
                    $cadena_excel.=",";
               }
               $cont++;
            }
            $cadena_excel.="\r\n"; 
            $no_campos = count($this->orden_columnas_excel);                    
            foreach($this->datos as $renglon )
            {                
                $cont=1;
                
                foreach($this->orden_columnas_excel as $campo)
                {                    
                   $cadena_excel.= '"' . utf8_decode($renglon[$campo]). '"';
                   if($cont < $no_campos )
                   {
                        $cadena_excel.=",";
                   }
                   $cont++;
                }
                $cadena_excel.="\r\n"; 
            }
            header( "Content-Type: text/csv;" );
            header ("Content-Disposition: attachment; filename=grid.csv;" );
            return $cadena_excel;
        }
       	else
        {
            return json_encode($arr_json);                      
        }
	
	}
	public static function agregarColumna(&$matriz,$nombre,$cadena,$parametros=null,$caracter_sustitucion="?")
	{
		foreach($matriz as $indice=>$renglon)
		{			
			if(isset($parametros))
			{
				$nueva_cadena=$cadena;
				foreach($parametros as $parametro)
				{ 			
					$arr_cadena=explode($caracter_sustitucion,$nueva_cadena,2);
					$nueva_cadena=$arr_cadena[0].$renglon[$parametro].$arr_cadena[1];									
				}
			}
			
			$matriz[$indice][$nombre]=$nueva_cadena;
		}
	}
}

?>
