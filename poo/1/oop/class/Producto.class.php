<?php

    class Producto{
        
        private $id         =   NULL;
        private $codigo     =   NULL;
        private $nombre     =   NULL;
        private $marca      =   NULL;
        private $stock      =   NULL;
        private $precio     =   NULL;
        private $categoria  =   NULL;

        public function __construct(Array $data=Array()){

            if(!empty($data)){

                $this->setId(isset($data['id']) ? $data['id'] : 0);
                $this->setNombre(isset($data['nombre']) ? $data['nombre'] : '');
                $this->setMarca(isset($data['marca']) ? $data['marca'] : '');
                $this->setStock(isset($data['stock']) ? $data['stock'] : 0);
                $this->setPrecio(isset($data['precio']) ? $data['precio'] : 0);
                $this->setCategoria(isset($data['categoria']) ? $data['categoria'] : 0);

            }

        }
        
        public function setId($id) {

            $id =   (int)$id;
            
            if($id<=0){

                $msg    =   "Id de producto invalido";
                throw new \InvalidArgumentException($msg);

            }

            $this->id = $id;

            return $this;

        }
        
        private function validateEmpty($value,$message=NULL,$useTrim=TRUE){

            if($useTrim){

                $value=trim($value);

            }
            
            if(empty($value)){

                throw new \InvalidArgumentException($message);

            }
            
            return $codigo;

        }
        

        public function setCodigo($codigo) {

            $msg            =   "Debe especificar un codigo de producto";
            $this->codigo   =   $this->validateEmpty($codigo,$msg);
            return $this;

        }

        public function setNombre($nombre) {

            $msg            =   "Debe especificar un nombre de producto";
            $this->nombre   =   $this->validateEmpty($nombre,$msg);
            return $this;

            
        }

        public function setMarca($marca) {

            $msg            =   "Debe especificar una marca de producto";
            $this->marca   =   $this->validateEmpty($marca,$msg);
            return $this;

        }

        public function setStock($stock) {

            $this->stock    =   (int)$stock;
            return $this;

        }

        public function setPrecio($precio) {

            $this->precio = (double)$precio;
            return $this;

        }

        public function setCategoria($categoria) {

            $msg                =   "Debe especificar una categoria de producto";
            $this->categoria    =   $this->validateEmpty($categoria,$msg);
            return $this;

        }

        public function getId() {

            return $this->id;

        }

        public function getCodigo() {
            return $this->codigo;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getMarca() {
            return $this->marca;
        }

        public function getStock() {
            return $this->stock;
        }

        public function getPrecio() {
            return $this->precio;
        }

        public function getCategoria() {
            return $this->categoria;
        }
        
        public function __set($name,$value){

            $method =   sprintf("set%s",ucwords($name));

            if(!method_exists($this,$method)){

                $msg    =   "Campo desconocido \"$name\"";
                
                throw new \InvalidArgumentException($msg);

            }

            return $this->$method($value);

        }
        
        public function __toString(){

            $f = 'Nombre: %s, Precio: %s, Marca: %s, Stock: %s, Categoria: %s';

            return sprintf(
                            $f,
                            $this->nombre,
                            $this->precio,
                            $this->marca,
                            $this->stock,
                            $this->categoria
            );
            
        }


    }