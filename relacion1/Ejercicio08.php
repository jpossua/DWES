<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 08</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 08</h1>
    <?php
    $rubrica = [
        "Inicial" => 0.20,
        "Primera" => 0.30,
        "Segunda" => 0.20,
        "Tercera" => 0.30
    ];

    $calificaciones = [
        "Inicial" => 8,
        "Primera" => 5,
        "Segunda" => 9,
        "Tercera" => 6
    ];

    $notaFinal = 0; // inicializamos a 0 al acumalador

    foreach ($rubrica as $timestre => $nota) { // recorro un array secuencialmente
        $notaFinal += $nota * $calificaciones[$timestre]; // acumalacion
    };

    if ($notaFinal > 4) {
        echo ("¡Enhorabuena, has aprobado!");
    } else {
        echo ("Lo siento, has suspendido...");
    }
    ?>

</body>

</html>