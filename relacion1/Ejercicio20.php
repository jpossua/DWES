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

    /*
    $numeroDecimal = 160;
    $numeroBinario = decbin($numeroDecimal);
    $numeroOctal = decoct($numeroDecimal);
    $numeroHexa = strtoupper(dechex($numeroDecimal));

    if ($numeroDecimal < 0) {
        echo ("Error: El número decimal debe ser positivo.");
    } else {
        echo ("El número {$numeroDecimal} su representación decimal es: " . $numeroDecimal . "<br>");
        echo ("El número {$numeroDecimal} su representación binaria es: " . $numeroBinario . "<br>");
        echo ("El número {$numeroDecimal} su representación octal es: " . $numeroOctal . "<br>");
        echo ("El número {$numeroDecimal} su representación hexadecimal es: " . $numeroHexa . "<br>");
    }
    */

    $numero = 160;
    $base = 16;
    $resultado = "";

    echo ("El número original es $numero y la base a la que pasarlo $base");
    echo ("<br>El resultado es: ");

    if ($numero < 0) {
        echo ("Error: El número decimal debe ser positivo.");
    } else if ($numero == 0) {
        $resultado = "0";
    } else {
        while ($numero > 0) {
            $digito = $numero % $base; // El resto es el siguiente dígito

            // Determina el carácter (dígito 0-9 o letra A-Z)
            if ($digito > 9) {
                // Convierte 10, 11, ... a 'A', 'B', ...
                // ASCII de 'A' es 65. 55 + 10 = 65. Esto es correcto.
                $caracter = chr(55 + $digito);
            } else {
                $caracter = (string)$digito;
            }

            $resultado = $caracter . $resultado;
            $numero = intval($numero / $base);
        }
    }

    // Si el número era 0, ya se gestionó. Si no, se imprime el resultado.
    echo ($resultado);
    ?>
</body>

</html>