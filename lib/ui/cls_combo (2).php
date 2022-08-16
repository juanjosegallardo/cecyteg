<?php
    class Combo
    {
        public $datos;
        public $valor_seleccionado;
        public $campo_valor;
        public $campo_texto;
        public function __toString()
        {
            
            $arr_json["valor_seleccionado"]=$this->valor_seleccionado;            
            $i=0;
            foreach($this->datos as $renglon )
            {
                $arr_json["datos"][$i]["valor"]=$renglon[$this->campo_valor];
                $arr_json["datos"][$i]["texto"]=$renglon[$this->campo_texto];
                $i++;                
            }
            return json_encode($arr_json);
        }
    }
?>