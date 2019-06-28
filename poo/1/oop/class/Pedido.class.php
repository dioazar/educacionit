<?php

    class Pedido{

        private $cliente    =   NULL;
        private $productos  =   NULL;

        public function __construct(Cliente $cliente=NULL,Productos $productos=NULL){

            if($cliente!==NULL){

                $this->setCliente($cliente);

            }

        }

        public function setCliente(Cliente $cliente){

            return $this->cliente  =   $cliente;
            
        }
        
        public function getCliente(){

            return $this->cliente;
            
        }
        
        public function setProductos(Productos $productos){

            $this->productos    =   $productos;

        }
        
        public function getProductos(){

            return $this->productos;

        }
        
        public function guardar(){
            
        }
        
    }