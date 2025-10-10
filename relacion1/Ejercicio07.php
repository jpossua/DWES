<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 07</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 07</h1>
    <?php
    $nota01 = 8.0;
    $nota02 = 5.0;
    $notaFinal = 0.0;
    $faltas = 0;
    $descontar = 0.25;

    $notaFinal = ($nota01 + $nota02) / 2;

    echo ("Tu nota final es: " . ($faltas > 0 ? $notaFinal = $notaFinal - ($descontar * $faltas) : $notaFinal) . "<br>");

    if ($notaFinal >= 5) {
        echo ("¡Enhorabuena has aprobado!");
    } else {
        echo ("¡Lo siento, has suspendido...!");
    }
    ?>
</body>

</html>