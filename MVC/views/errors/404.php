<?php
if (defined("ACCESS_SUCCESS")):
    header("HTTP/1.0 404 Not Found");
else:
    header("location: ../../error-403");
endif;
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Error 404</title>
    </head>
    <body>
        <h1>Error 404 - página no encontrada en el servidor</h1>
    </body>
</html>

