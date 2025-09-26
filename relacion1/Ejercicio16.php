<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 16</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <style>
        .color {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Ejercicio 16</h1>
    <?php
    $num = 13;
    if ($num <= 0) {
        echo ("El número debe ser mayor de 0.");
    } else {
        echo ("El número <b>{$num}</b> es divisible por:<br>");
        for ($i = 1; $i <= $num; $i++) {
            if ($num % $i == 0) {
                echo ("<span class='color'>" . $i . "</span>");
                if ($num > $i) {
                    echo (", ");
                }
            } else {
                echo ($i);
                if ($num > $i) {
                    echo (", ");
                }
            }
        }
    }
    ?>

</body>

</html>