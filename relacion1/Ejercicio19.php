<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 19</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 19</h1>

    <?php
    /*
    $numeroDecimal = 6;
    $numeroBinario = decbin($numeroDecimal);

    if ($numeroDecimal < 0) {
        echo ("Error: El número decimal debe ser positivo.");
    } else {
        echo ("El número {$numeroDecimal} su representación decimal es: " . $numeroDecimal . "<br>");
        echo ("El número {$numeroDecimal} su representación binaria es: " . $numeroBinario . "<br>");
    }
    */

    $numero = 2;
    $resultado = "";

    echo ("El resultado es: ");
    while ($numero >= 2) {
        $resultado = (string) $numero % 2 . $resultado; // casting explicito de un numero entero en un dato tipo string

        $cociente = intval($numero / 2);
        $numero = $cociente;
    }

    echo ((string) $numero . $resultado);
    ?>

</body>

</html>