<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 09</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 09</h1>
    <?php
    $lado01 = 2.0;
    $lado02 = 5.0;
    $lado03 = 2.0;

    if ($lado01 == $lado02 and $lado01 == $lado03) {
        echo ("El triángulo es equilátero.");
    } elseif ($lado01 == $lado02 or $lado02 == $lado03 or $lado01 == $lado03) {
        echo ("El triángulo es isósceles.");
    } else {
        echo ("El triángulo es escaleno.");
    }
    ?>

</body>

</html>