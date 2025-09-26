<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 02</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 02</h1>
    <?php
    /*
    Haz un programa PHP que muestre un valor de ejemplo de cada tipo de
    dato escalar en php con echo utilizando la función var_dump(), y también
    con printf formateado. Prueba todas las posibilidades tal y como vienen
    descritas en: https://www.w3schools.com/php/func_string_printf.asp
        ● bool
        ● int
        ● float
        ● string
    */
    $boolean = true;
    $nombre = "Jose";
    $curso = 2;
    $altura = 1.73;

    echo (var_dump($boolean));
    echo (var_dump($nombre));
    echo (var_dump($curso));
    echo (var_dump($altura));

    printf("<br>Mi nombre es %s con una altura %.2f y estoy en %u de DAW", $nombre, $altura, $curso);

    ?>
</body>

</html>
