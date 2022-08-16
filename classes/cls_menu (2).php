<?php

class Menu extends General
{    
    
    public function filtrar($permisos)
    {   
        
        $array = array();
        foreach($this->menu_principal as $indice_menu  => $menu)
        {
            $bandera =0;
            foreach($menu["submenu"] as $indice => $submenu)
            {
                if(in_array($submenu["permiso"], $permisos) )
                {
                     
                    $array[$indice_menu]["submenu"][$indice] = $submenu;  
                    //$array[$bandera ++][$indice] = $submenu;                 
                    $bandera++;    
                }       
                                                         
            }
            if($bandera > 0)
            { 
                $array[$indice_menu]["nombre"]=$menu["nombre"];
                $array[$indice_menu]["url"]=$menu["url"];
                
            }            
        }  
        return $array;
    }

    public function obtenerPrimerURL($permisos)
    {   
        foreach($this->menu_principal as $indice_menu  => $menu)
        {
            foreach($menu["submenu"] as $indice => $submenu)
            {
                if(in_array($submenu["permiso"], $permisos) )
                {

                        return $menu["url"];                        
                                
                }       
                                                         
            }
        }  
        return "";
    }
                  
}

?>
