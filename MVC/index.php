<?php
/* constante global para acceder a ficheros */
define("ACCESS_SUCCESS", true);

/* obtener la url solicitada */
$requestUrl = parse_url($_SERVER["REQUEST_URI"]);
$urlPath = $requestUrl["path"];
$url = explode("/", $urlPath);
//var_dump( $requestUrl );
/* formatear la url una vez que es un arreglo */
$lastIndexUrl = count($url) - 1;

if (empty($url[$lastIndexUrl])) {
    array_shift($url);
    array_pop($url);
} else {
    array_shift($url);
}
/* fin de formato a la url */
print_r( $url );
/* incluir archivos de configuración */
require_once "config/config.php";
require_once "config/routes.php";
require_once "core/DataBase.php";
/* fin de arvhivos requeridos */

/* comprobar solicitudes por la url */
if (DEFAULT_PROYECT_PATH === $urlPath OR
        DEFAULT_PROYECT_PATH === ($urlPath . "/")) {
    /* cargar el controlador predeterminado si existe */
    if (file_exists("controllers/" . DEFAULT_CONTROLLER . ".php")) {
        require_once "controllers/" . DEFAULT_CONTROLLER . ".php";

        $defaultController = DEFAULT_CONTROLLER;
        /* crear una instancia de la clase del controlador predeterminado */
        $controller = new $defaultController();
        /* verificar si existe el método index */
        if (method_exists($controller, "index")) {
            /* obtener información del método solicitado */
            $methodInfo = new ReflectionMethod($controller, "index");

            /* parámentros obligatorios y opcionales del método */
            $requiredParams = $methodInfo->getNumberOfRequiredParameters();

            /* verificar que el método no necesita parámentros */
            if ($requiredParams === 0) {
                /* si no se reciben parámentros llamar al método */
                $controller->index();
            } else {
                /* llamada incorrecta al método */
                require_once ERROR_404;
                /* importante terminar la ejecución del script */
                exit();
            }
        } else {
            /* no se encontró el método index */
            require_once ERROR_404;
        }
    } else {
        /* el archivo solicitado no existe */
        require_once ERROR_404;
    }
} elseif (isset($url[CONTROLLER_INDEX])) {
    /* cargar controlador solicitado con sus métodos y/o parámetros si existe */
    if (file_exists("controllers/" . $url[CONTROLLER_INDEX] . ".php")) {
        require_once "controllers/" . $url[CONTROLLER_INDEX] . ".php";
        /* crerar instancia del controlador solicitado */
        $controller = new $url[CONTROLLER_INDEX]();

        /* determinar si la solicitud del controlador incluye una llamada
          a algun método */
        if (isset($url[METHOD_INDEX])) {
            /* si la solicitud del controlador incluye un método
              verificar que éste exista */
            if (method_exists($controller, $url[METHOD_INDEX])) {
                $method = $url[METHOD_INDEX];

                /* obtener información del método solicitado */
                $methodInfo = new ReflectionMethod($controller, $method);

                /* parámentros obligatorios y opcionales del método */
                $requiredParams = $methodInfo->getNumberOfRequiredParameters();
                $totalParams = $methodInfo->getNumberOfParameters();

                /* si el método no es publico */
                if (!$methodInfo->isPublic()) {
                    /* no se puede ejecutar el método solicitado */
                    require_once ERROR_401;
                    /* importante terminar la ejecución del script */
                    exit();
                }

                /* determinar si se están recibiendo parámetros
                  por la url */
                if (isset($url[PARAM_INDEX])) {
                    /* crear un arreglo con los parámetros que se reciben */
                    $params = array();

                    /* llenar el arreglo con los paramentros */
                    for ($i = PARAM_INDEX; $i < count($url); $i++) {
                        $params[] = $url[$i];
                    }

                    /* número de parámetros diferente a los solicitados */
                    if (count($params) > $totalParams OR
                            count($params) < $requiredParams) {
                        /* llamada incorrecta al método */
                        require_once ERROR_404;
                        /* importante terminar la ejecución del script */
                        exit();
                    }

                    /* llamar al método y enviarle los parámentros */
                    call_user_func_array(array($controller, $method), $params);
                } else {
                    /* verificar que el método no necesita parámetros */
                    if ($requiredParams === 0) {
                        /* si no se reciben parámentros llamar al método */
                        $controller->$method();
                    } else {
                        /* llamada incorrecta al método */
                        require_once ERROR_404;
                        /* importante terminar la ejecución del script */
                        exit();
                    }
                }
            } else {
                /* no se encontró el método solicitado */
                require_once ERROR_404;
            }
        } elseif (method_exists($controller, "index")) {
            /* si no existe una solicitud de algún metodo especifíco
              verificar que exista el metodo predeterminado llamado index
              si éste existe entonces llamarlo */
            /* obtener información del método solicitado */
            $methodInfo = new ReflectionMethod($controller, "index");

            /* parámentros obligatorios y opcionales del método */
            $requiredParams = $methodInfo->getNumberOfRequiredParameters();

            /* verificar que el método no necesita parámentros */
            if ($requiredParams === 0) {
                /* si no se reciben parámentros llamar al método */
                $controller->index();
            } else {
                /* llamada incorrecta al método */
                require_once ERROR_404;
                /* importante terminar la ejecución del script */
                exit();
            }
        } else {
            /* no se solicitó ningún método y no se encontó el método
              predeterminado llamado index */
            require_once ERROR_404;
        }
    } else {
        /* si no existe el controlador solicitado redireccionar
          a una página de error que corresponda */
        if ($url[CONTROLLER_INDEX] === "error-401") {
            /* no hay permiso de acceso */
            require_once ERROR_401;
        } elseif ($url[CONTROLLER_INDEX] === "error-403") {
            /* no hay permiso de ejecución del fichero */
            require_once ERROR_403;
        } else {
            /* no existe la ruta solicitada */
            require_once ERROR_404;
        }
    }
}
/* fin de comprobar solicitudes por la url */
?>