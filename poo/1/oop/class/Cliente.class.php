<?php


    class Cliente extends Persona{

        public $descuento = NULL;
        
        public function verDatos(){

            echo $this->nombre;
            
            $datos = parent::verDatos();
            $datos .= "Descuento: {$this->descuento}\n";
            return $datos;

        }
        
        public function comprar(){

            
        }
        
    }