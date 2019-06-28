<?php
defined("ACCESS_SUCCESS") or header("location: ../error-403");
class DataBase
{
    private $PDOConnection;

    public function getConnection()
    {
        /* abrir la conexión entes de retornar el objeto */
        $statusConnection = $this->openConnection();
        if ($statusConnection === TRUE) {
            /* devolver la conexión si se pudo abrir */
            return $this->PDOConnection;
        } else {
            /* si no se puede abrir la conexión se retorna mensaje */
            $errorMessage = "No se puede abrir la conexión. ";
            /* incluir los detalles del error */
            $errorMessage .= "Detalles del error: {$statusConnection}";
            /* lanzar la excepción con el mensage */
            throw new PDOException($errorMessage);
        }
    }

    public function openConnection()
    {
        try {
            /* Data Source Name */
            $dsn = "mysql:host=" . HOST_NAME . ";";
            $dsn .= "dbname=" . DB_NAME . ";";
            $dsn .= "charset=utf8";
            /* iniciar la conexión instanciando PDO */
            $this->PDOConnection = new PDO($dsn, DB_USER, DB_PASS);
            /* establecer atributos de la conexión */
            /* nombre de las tablas en minúsculas */
            $this->PDOConnection->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
            /* los errores se lanzan como excepciones */
            $this->PDOConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            /* los registros con campos nulos se convierten a cadenas vacías */
            $this->PDOConnection->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_TO_STRING);
            /* nombre de las columnas en formato numero, associativo */
            $this->PDOConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH);
            /* el true indica que se abrió la conexión */
            return TRUE;
        } catch (PDOException $excepction) {
            /* retornar el mensaje de error */
            return $excepction->getMessage();
        }
    }

    public function closeConnection()
    {
        /* Con una referencia nula, internamente se destruye el objeto */
        $this->PDOConnection = NULL;
    }
}
