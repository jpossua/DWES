<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 12</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 12</h1>
    <?php
    $nota = 7;
    switch ($nota) {
        case 10:
        case 9:
            echo ("Tu nota es un Sobresaliente.");
            break;
        case 8:
        case 7:
            echo ("Tu nota es un Notable.");
            break;
        case 6:
            echo ("Tu nota es un Bien.");
            break;
        case 5:
            echo ("Tu nota es un Suficiente.");
            break;
        case 0:
        case 1:
        case 2:
        case 3:
        case 4:
            echo ("Tu nota es un Suspenso.");
            break;
        default:
            echo ("¡Error, la nota dada no va del 0 al 10!.");
            break;
    }
    ?>
</body>

</html>