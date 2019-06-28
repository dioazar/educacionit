<?php
	define("DIR_RAIZ", "/alumnos/phpmysql/2019-primerCuatrimestre/8/");

	define("FRONT_END_PATH", $_SERVER["DOCUMENT_ROOT"] . DIR_RAIZ);
	define("FRONT_END_URL", $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . DIR_RAIZ);

	define("BACK_END_PATH", FRONT_END_PATH . "");
	define("BACK_END_URL", FRONT_END_URL . "");

	define("UPLOADS", FRONT_END_PATH . "images/uploads/");
	define("UPLOADS_URL", FRONT_END_URL . "images/uploads/");
?>