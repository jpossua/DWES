<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 17</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 17</h1>

    <?php
    $a_original = 10; // Dividendo original
    $b_original = 2;  // Divisor original

    $a =  $a_original; // Dividendo
    $b = $b_original; // Divisor
    $resto = 0;
    $cociente = 0;
    $formula = 0;

    // Averiguamos el cociente
    $cociente = floor($a / $b);

    // Averiguamos el resto
    $resto = $a % $b;

    // Mostramos el resultado
    echo ("<h2>División Estándar</h2>");
    echo ("<ul>");
    echo ("<li><b>Dividendo: </b>{$a}</li>");
    echo ("<li><b>Divisor: </b>{$b}</li>");
    echo ("<li><b>Cociente: </b>{$cociente}</li>");
    echo ("<li><b>Resto: </b>{$resto}</li>");
    echo ("</ul>");

    echo ("<h2>Verificación de la división (Fórmula de la División Euclidiana)</h2>");
    $formula = ($b * $cociente) + $resto;

    if ($a == $formula) {
        echo ("<b>La división es correcta</b>: ");
        echo ($a . " = " . $formula);
    } else {
        echo ("<b>La división es incorrecta</b>: ");
        echo ($a . " ≠ " . $formula);
    }

    // --- Segundo método: Por Restas Sucesivas (División Euclidiana) ---
    $a = $a_original;
    $b = $b_original;
    $cociente_restas = 0;

    while ($a >= $b) {
        $a -= $b;
        $cociente_restas++;
    }

    echo ("<h2>División Por Restas Sucesivas (División Euclidiana)</h2>");
    echo ("<ul>");
    echo ("<li><b>Cociente: </b>{$cociente}</li>");
    echo ("<li><b>Resto: </b>{$a}</li>");
    echo ("</ul>");

    ?>
</body>

</html>