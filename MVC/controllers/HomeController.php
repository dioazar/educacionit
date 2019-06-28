<?php
defined("ACCESS_SUCCESS") or header("location: ../error-403");
class HomeController
{
    private $countryModel;

    public function __construct()
    {
        require_once "models/CountryModel.php";
        $this->countryModel = new CountryModel();
    }

    public function index()
    {
        $name = "Amigo";
        $lastName = "Mío";
        $data = $this->countryModel->getCountries();
        require_once "views/home.php";
    }

    public function getElement()
    {
        if (isset($_POST["request"])) {
            exit(json_encode("hola"));
        } else {
            require_once ERROR_404;
        }
    }

    private function getData()
    {
        echo "hola";
    }
}
