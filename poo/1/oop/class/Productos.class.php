<?php

    class Productos implements Iterator,Countable{

        /**
         *
         * @var PDOStatement
         */
        private $stmt       =   NULL;
        private $executed   =   FALSE;
        private $current    =   NULL;
        private $total      =   0;
        
        public function setPDOStatement(PDOStatement $stmt){
            
            $this->stmt = $stmt;
            
            return;

        }

        private function getResult(){

            if(!$this->executed){

                $this->stmt->execute();
                $this->executed =   TRUE;
                $this->total    =   $this->stmt->rowCount();

            }
            
            return $this->current = $this->stmt->fetchObject("Producto");

        }
        
        public function getTotal(){

            return $this->total;

        }
        
        public function count(){

            if(!$this->executed){

                $this->stmt->execute();
                $this->executed =   TRUE;
                $this->total    =   $this->stmt->rowCount();

            }
            
            return $this->total;

        }
        
        public function current(){

            return $this->current;

        }

        public function next(){

            return $this->current;

        }
        
        public function rewind(){

            $this->count    =   0;
            $this->executed =   FALSE;
            $this->current  =   NULL;

        }

        public function key(){

            return $this->count;

        }
        
        public function valid(){

            return $this->current   =   $this->getResult();

        }
        
        public function append($value){

            $msg = "No se puede llamar al metodo append directamente";
            throw new BadMethodCallException($msg);

        }

        public function agregar(Producto $producto){

            return parent::append($producto);

        }
        
        public function imprimir(){
            
            foreach($this as $producto){

                echo $producto;

            }

        }

        public function __toString(){

            return $this->imprimir();

        }
        
    }