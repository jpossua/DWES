<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 15</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>
</head>

<body>
    <h1>Ejercicio 15</h1>
    <?php
    $num = 5;
    $primo = true;

    // 1. Manejar casos no primos (números menores o iguales a 1)
    if ($num <= 1) {
        $primo = false;
    } else {
        // 2. Inicia el contador desde 2 (no es necesario marcar 1)
        $contador = 2;

        // 3. Bucle mientras el número todavía se considera primo Y el contador es menor que el número
        do {
            if ($num % $contador == 0) {
                $primo = false; // CORRECT: Use = for assignment
            }

            $contador++;
        } while ($primo && $contador < $num);
    }

    if ($primo) {
        echo ("{$num} es un número primo.<br>");
    } else {
        echo ("{$num} no es un número primo.<br>");
    }
    ?>
</body>

</html>