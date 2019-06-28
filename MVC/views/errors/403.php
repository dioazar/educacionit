<?php
if (defined("ACCESS_SUCCESS")):
    header("HTTP/1.0 403 Forbidden");
else:
    header("location: ../../error-403");
endif;
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Error 403</title>
    </head>
    <body>
        <h1>Error 403 - No se puede acceder a este sitio</h1>
    </body>
</html>
