<?php
	define("DIR_RAIZ", "/educacionIT/phpmysql/10/");

	define("FRONT_END_PATH", $_SERVER["DOCUMENT_ROOT"] . DIR_RAIZ);
	define("FRONT_END_URL", $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . DIR_RAIZ);

	define("BACK_END_PATH", FRONT_END_PATH . "");
	define("BACK_END_URL", FRONT_END_URL . "");

	define("COMPRADOR", FRONT_END_URL . "comprador/");
	define("VENDEDOR", FRONT_END_URL . "vendedor/");

	define("UPLOADS", FRONT_END_PATH . "/images/uploads");
	define("UPLOADS_URL", FRONT_END_URL . "/images/uploads");
?>