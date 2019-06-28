<?php

    class ProductoTable{

        private $conexion   =   NULL;
        const FIELDS = "id,nombre,marca,precio,stock,codigo,categoria";

        public function __construct(Conexion $conexion){

            $this->conexion =   $conexion;

        }

        public function buscarPorNombre($nombre){

            $sql    =   "SELECT * FROM productos WHERE nombre LIKE :nombre";

            //$sql    =   sprintf($sql, self::FIELDS);

            $stmt   =   $this->conexion->prepare($sql);

            $stmt->bindValue(':nombre',"%$nombre%");

            $stmt->execute();

            $productos  =   new Productos();
            $productos->setPDOStatement($stmt);

            return $productos;

        }
        
        public function buscarPorId($id){
            
            if(!is_array($id)){

                $id = Array($id);

            }

            $holders    =   str_repeat('?,',count($id)-1) . '?';
            $sql        =   "SELECT %s FROM productos WHERE id IN($holders)";
            $sql        =   sprintf($sql,self::FIELDS);
            $stmt       =   $this->conexion->prepare($sql);

            foreach($id as $k=>$i){

                $stmt->bindValue($k+1,$i);

            }

            $productos  =   new Productos();
            $productos->setPDOStatement($stmt);

            return $productos;
            
        }
        
    }