<?php

    abstract class Persona {

    private $nombre         =   NULL;
    private $apellido       =   NULL;
    private $edad           =   NULL;
    private $estadoCivil    =   NULL;
    private $sexo           =   NULL;
    private $tipoDoc        =   NULL;
    private $documento      =   NULL;
    
    const SEXO_MASCULINO = 'M';
    const SEXO_FEMENINO  = 'F';

    public function __construct(Array $params) {

        if (isset($params['nombre'])){

            $this->setNombre($params['nombre']);

        }

        if (isset($params['apellido'])){

            $this->setApellido($params['apellido']);

        }

        if (isset($params['edad'])) {

            $this->setEdad($params['edad']);

        }

        if (isset($params['sexo'])) {

            $this->setSexo($params['sexo']);

        }

        if (isset($params['tipo_doc'])) {

            $this->setTipoDocumento($params['tipo_doc']);

        }

        if (isset($params['documento'])) {

            $this->setDocumento($params['documento']);

        }        
        
        if (isset($params['estado_civil'])) {

            $this->setEstadoCivil($params['estado_civil']);

        }        
        

    }
    
    private function validarVacio($nombre,$valor,$useTrim=TRUE){

        $valor =   $useTrim ? trim($valor) : $valor;
        
        if(empty($valor)){

            $msg = "El $nombre no puede estar vacio";
            throw new \InvalidArgumentException($msg);

        }
        
        return $valor;
        
    }
    
    public function setEstadoCivil($estado){

        return $this->estadoCivil  =   $this->validarVacio('estado civil',$estado);

    }

    
    public function setSexo($sexo){

        return $this->sexo = $this->validarVacio('sexo',$sexo);
        
    }
    
    public function getSexo(){

        return $this->sexo;

    }
    
    //(Setter) Asigna el valor nombre a una instancia de persona
    public function setNombre($nombre) {

        return $this->nombre = $this->validarVacio('nombre',$nombre);

    }

    //(Getter) Devuelve el valor asignado al nombre de la persona

    public function getNombre() {

        return $this->nombre;
    }

    //(Setter) Asigna el valor apellido a una instancia de persona
    public function setApellido($apellido) {

        return $this->apellido = $this->validarVacio('apellido',$apellido);

    }

    //(Getter) Devuelve el valor asignado al apellido de la persona

    public function getApellido() {

        return $this->apellido;
    }

    //(Setter) Asigna el valor edad a una instancia de persona
    public function setEdad($edad) {

        $edad = (int) $edad;

        if ($edad <= 0) {

            throw new Exception("La edad debe ser mayor que 0");
        }

        return $this->edad = $edad;

    }

    //(Getter) Devuelve el valor asignado al edad de la persona

    public function getEdad() {

        return $this->edad;
    }
    
    public function setTipoDocumento($tipo){

        return $this->tipoDoc  =   $this->validarVacio('tipo documento',$tipo);

    }
    
    public function getTipoDocumento(){

        return $this->tipoDoc;

    }
    
    public function setDocumento($doc){

        $doc    =   preg_replace("/[^0-9]/",'',$doc);
        return $this->documento    =   $this->validarVacio('documento',$doc);

    }
    
    public function getDocumento(){

        return $this->documento;

    }
    
    public function toArray(){

        return Array(
                        'nombre'        =>  $this->nombre,
                        'apellido'      =>  $this->apellido,
                        'edad'          =>  $this->edad,
                        'estado_civil'  =>  $this->estadoCivil,
                        'sexo'          =>  $this->sexo,
                        'tipo_documento'=>  $this->tipoDoc,
                        'documento'     =>  $this->documento
        );

    }

    public function guardar(Conexion $conexion) {

        //Reutilizo el codigo de los setters el cual valida de que 
        //Los datos ingresados de la persona se encuentran en perfecto 
        //estado.

        $this->setNombre($this->nombre);
        $this->setApellido($this->apellido);
        $this->setEdad($this->edad);
        $this->setEstadoCivil($this->estadoCivil);
        $this->setSexo($this->sexo);
        $this->setTipoDocumento($this->tipoDoc);        
        $this->setDocumento($this->documento);

        $prepare        =   Array();
        $clienteArray   =   $this->toArray();

        foreach($clienteArray as $key=>$value){

            $prepare[]="$key = :$key";

        }

        $sql = sprintf('INSERT INTO clientes SET %s',implode(',',$prepare));

        $stmt = $conexion->prepare($sql);

        foreach($clienteArray as $key=>$value){

            $stmt->bindValue(":$key",$value);

        }

        return $stmt->execute();

    }

}
