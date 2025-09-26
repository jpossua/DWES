<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 18</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 18</h1>

    <?php
    $num1 = 24; // Primer número natural
    $num2 = 54; // Segundo número natural

    echo ("<h3>1. Algoritmo de Euclides por División (Método Estándar)</h3>");
    echo ("<p>Calculando MCD($num1, $num2)...</p>");
    $a = $num1; // Dividendo
    $b = $num2; // Divisor
    $temporal = 0;
    $resto = 0;


    // Hay que asegurarse a sea siempre mayor o igual que b
    if ($b > $a) {
        $temporal = $a;
        $a = $b;
        $b = $temporal;
        echo "<p>Nota: Se intercambiaron los valores para que $a > $b.</p>";
    }

    echo ("El MCD de $a y $b es: ");

    // Hay que ejecutar el algoritmo hasta que el resto sea 0
    while ($b != 0) {
        $resto = $a % $b; // Calcula el resto de la división
        $a = $b; // El antiguo divisor se convierte en el nuevo dividendo
        $b = $resto; // El resto se convierte en el nuevo divisor
    }

    // Cuando $b es 0, $a contiene el MCD
    echo ($a);
    echo ("<hr>");
    echo ("<h3>2. Algoritmo de Euclides por Restas Sucesivas (Método Original)</h3>");
    echo ("<p>Calculando MCD($num1, $num2) restando el menor del mayor hasta que sean iguales.</p>");
    $a = $num1; // Dividendo
    $b = $num2; // Divisor

    echo ("El MCD de $a y $b es: ");

    while ($a != $b) {
        if ($a > $b) {
            $a -= $b;
        } else {
            $b -= $a;
        }
    }

    echo ($a);
    ?>
</body>

</html>