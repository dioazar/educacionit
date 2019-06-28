<?php defined("ACCESS_SUCCESS") or header("location: ../error-403"); ?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio</title>
    </head>
    <body>
        <h1>Hola mundo, bienvenido: <?php echo $name; ?> <?= $lastName; ?></h1>
        <?php
        foreach ($data as $row):
            echo $row["pais"] . "<br/>";
        endforeach;
        ?>
    </body>
</html>

