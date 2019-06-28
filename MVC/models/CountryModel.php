<?php
defined("ACCESS_SUCCESS") or header("location: ../error-403");
class CountryModel extends DataBase
{

    public function getCountries()
    {
        try {
            /* recuperar el objeto de la conexión */
            $pdo = $this->getConnection();
            /* realizar la consulta */
            $query = $pdo->query("SELECT * FROM paises");
            /* retornar los datos */
            return $query->fetchAll();
        } catch (PDOException $ex) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }

    public function getCountry($name)
    {
        try {
            $pdo = $this->getConnection();
            /* hacer una consulta a la base de datos */
            $sql = "select * from pais where pais = :name";
            $query = $pdo->prepare($sql);
            /* pasar los datos correspondientes a los marcadores */
            $query->bindParam(":name", $name);
            /* ejecutar la consulta */
            $query->execute();
            /* retornar el registro */
            return $query->fetch();
        } catch (PDOException $exception) {
            /* retornar mensaje de error */
            return $exception->getMessage();
        } finally {
            /* cerrar la conexión */
            $this->closeConnection();
        }
    }
}
