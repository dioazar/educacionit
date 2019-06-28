<?php
defined("ACCESS_SUCCESS") or header("location: ../error-403");

/* alias para los controladores */
if (!empty($url[CONTROLLER_INDEX])) {
    switch (strtolower($url[CONTROLLER_INDEX])) {
        case "inicio":
            $url[CONTROLLER_INDEX] = "HomeController";
            break;
        default:
            /* no se encontró ningún alias para el controlador */
            $url[CONTROLLER_INDEX] = $url[CONTROLLER_INDEX];
    }
}

/* alias para los métodos */
if (!empty($url[METHOD_INDEX])) {
    switch (strtolower($url[METHOD_INDEX])) {
        case "ver-elementos":
            $url[METHOD_INDEX] = "getElement";
            break;
        case "datos":
            $url[METHOD_INDEX] = "getData";
            break;
        default:
            /* no se encontró ningún alias paraMETHOD */
            $url[METHOD_INDEX] = $url[METHOD_INDEX];
    }
}
