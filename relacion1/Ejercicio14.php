<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 14</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 14</h1>

    <?php
    $numero = 10;
    $suma = 0;

    for ($i = 0; $i <= $numero; $i++) {
        $suma += $i;
    }

    echo ("La suma de los primeros {$numero} números naturales es: " . $suma);
    ?>
</body>

</html>