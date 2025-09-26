<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 20</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 20</h1>
    <?php
    $numeroDecimal = 100;
    $numeroBinario = decbin($numeroDecimal);
    $numeroOctal = decoct($numeroDecimal);
    $numeroHexa = hexdec($numeroDecimal);

    echo ("El número {$numeroDecimal} su representación decimal es: " . $numeroDecimal . "<br>");
    echo ("El número {$numeroDecimal} su representación binaria es: " . $numeroBinario . "<br>");
    echo ("El número {$numeroDecimal} su representación octal es: " . $numeroOctal . "<br>");
    echo ("El número {$numeroDecimal} su representación hexadecimal es: " . $numeroHexa . "<br>");
    ?>
</body>

</html>