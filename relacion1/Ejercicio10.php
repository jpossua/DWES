<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 10</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 10</h1>
    <?php
    $a = 5.0;
    $b = 10.0;
    $c = 3.0;
    $x1 = 0.0;
    $x2 = 0.0;
    $discriminante = 0.0;

    echo ("<h2>Resolución de {$a}x² + {$b}x + {$c} = 0</h2>");

    echo ("<h3>Ecuación Cuadrática</h3>");
    $discrimante = $b ** 2 - (4 * $a * $c);
    // $discrimante = pow($b, 2) - (4 * $a * $c);

    if ($discrimante < 0) {
        echo ("El discriminante es negativo. No existen soluciones reales.<br>");
        echo ("Las soluciones son números complejos.<br>");
    } elseif ($discrimante == 0) {
        $x1 = (-$b) / (2 * $a);
        echo ("El discriminante es cero. Hay una única solución real:<br>");
        echo ("x = " . round($x1, 2));
    } else {

        echo ("El discriminante es positivo. Hay dos soluciones reales distintas:<br>");
        $x1 = (-$b + sqrt($discrimante)) / (2 * $a);
        $x2 = (-$b - sqrt($discrimante)) / (2 * $a);

        echo ("x₁ = " . round($x1, 2) . "<br>");
        echo ("x₂ = " . round($x2, 2) . "<br>");
    }


    ?>
</body>

</html>