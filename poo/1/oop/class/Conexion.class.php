<?php
/*
 * 
 * [database]
 *  driver = mysql
 *  user = root   ; El usuario
 *  pass = 123456 ;La contraseña
 *  host = localhost;
 *  schema = test
 *  port   = 3306
 *  
 */

    class Conexion extends \PDO
    {
        
        public function __construct($ini=Array(),$seccion="database"){
            
            if(!is_array($ini)){
                
                $ini    =   $this->InterpretarDesdeArchivoIni($ini);

            }

            $dsn    =   $this->crearDSN($ini,$seccion);
            
            parent::__construct(
                                $dsn,
                                isset($ini['user']) ? $ini['user'] : '',
                                isset($ini['pass']) ? $ini['pass'] : ''
            );

        }
        
        private function interpretarDesdeArchivoIni($ini,$seccion){

            $ini    =   trim($ini);

            if(!file_exists($ini)||!is_readable($ini)){

                $msg    =   "El archivo ini no existe o no pudo leerse";
                throw new \InvalidArgumentException($msg);

            }

            $ini    =   parse_ini_file($ini,TRUE);

            if(!is_array($ini)){

                $msg    =   "Fallo al interpretar el archivo $ini";
                throw new \InvalidArgumentException($msg);

            }

            if(!array_key_exists($seccion,$ini)){

                $msg    =   "El archivo ini no contiene la seccion \"$seccion\"";
                throw new \InvalidArgumentException($msg);

            }
            
            return $ini[$seccion];
            
        }
        
        private function crearDSN(Array $values){

            $requiredKeys   =   Array('driver','host','port','schema');
            $msg            =   "Debe especificar el valor de configuracion %s";

            foreach($requiredKeys as $key){

                if(empty($values[$key])){

                    $msg    =   sprintf($msg,$key);
                    throw new \InvalidArgumentException($msg);

                }

            }

            return sprintf(
                            '%s:host=%s;port=%s;dbname=%s;charset=%s',
                            $values['driver'],
                            $values['host'],
                            $values['port'],
                            $values['schema'],
                            isset($values['charset']) ? 
                            $values['charset'] : 'utf8'
            );

        }
        
    }