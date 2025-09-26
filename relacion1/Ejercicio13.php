<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 13</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 13</h1>
    <?php
    $factorial = 1;
    $numero = 0;

    if ($numero < 0) {
        echo ("Para hacer el factorial de un número este no puede ser negativo.");
    } else {
        for ($i = 1; $i <= $numero; $i++) {
            $factorial = $factorial * $i;
        }

        /* 
        for ($i = $numero; $i <= 1; $i--) {
            $factorial = $factorial * $i;
        }
        */

        echo ("{$numero}! = {$factorial}");
    }
    ?>
</body>

</html>