<?php
    class CheckBox
    {
        public $datos;
        //public $valor_seleccionado;
        public $campo_valor;
        public $campo_texto;
        
        public $datos_seleccionados;
        public $campo_seleccionado;
        
        public function __construct()
        {
            $this->campo_seleccionado = "";
            $this->campo_texto = "";
            $this->campo_valor = "";
            $this->datos = array();
            $this->datos_seleccionados = array();
        }
        public function __toString()
        {
            
            //["valor_seleccionado"]=$this->valor_seleccionado;            
            $i=0;
            foreach($this->datos as $renglon )
            {
                $arr_json["datos"][$i]["valor"]=$renglon[$this->campo_valor];
                $arr_json["datos"][$i]["texto"]=$renglon[$this->campo_texto];
                $i++;                
            }
            
            $i=0;
            $arr_json["datos_seleccionados"]=array();
            foreach($this->datos_seleccionados as $renglon )
            {
                $arr_json["datos_seleccionados"][$i]=$renglon[$this->campo_seleccionado];                
                $i++;                
            }
            return json_encode($arr_json);
        }
    }
?>