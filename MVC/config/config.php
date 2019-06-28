<?php
defined("ACCESS_SUCCESS") or header("location: ../error-403");

define("BASE_URL", "http://localhost//educacionit/mvc/");
define("DEFAULT_PROYECT_PATH", "/educacionit/mvc/");
define("DEFAULT_CONTROLLER", "HomeController");
define("CONTROLLER_INDEX", 1);
define("METHOD_INDEX", 2);
define("PARAM_INDEX", 3);
define("ERROR_401", "views/errors/401.php");
define("ERROR_403", "views/errors/403.php");
define("ERROR_404", "views/errors/404.php");

/* configuración de la base de datos */
define("HOST_NAME", "localhost");
define("DB_NAME", "comercioit");
define("DB_USER", "root");
define("DB_PASS", "");
