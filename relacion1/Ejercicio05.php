<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 05</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 05</h1>
    <?php
    // Creamos un array asociativo constante para las temperaturas
    // El valor puede ser no conocido hasta la ejecución
    const TEMPERATURAS = [
        'Lunes' => 25.5,
        'Martes' => 26.8,
        'Miércoles' => 27.2,
        'Jueves' => 28.1,
        'Viernes' => 26.0,
        'Sábado' => 24.5,
        'Domingo' => 23.9
    ];

    // El modo original de constantes: define("NOMBRE", "Jose");

    // 1. Muestra la temperatura del primer día de la semana.
    echo ("La temperatura del Lunes es: ") . TEMPERATURAS['Lunes'] . "ºC<br><br>";

    // 2. Muestra la temperatura de todos los días secuencialmente.
    foreach (TEMPERATURAS as $dia => $temp) {
        echo ("La temperatura del $dia es de $temp ºC<br>");
    };

    // 3. Muestra la temperatura de todos los días en una lista numerada
    echo ("<ol>");
    foreach (TEMPERATURAS as $dia => $temp) {
        echo ("<li>La temperatura del <b>$dia</b> es de <b>$temp ºC</b></li>");
    };
    echo ("</ol>");

    echo ("<table border='1'>");
    echo ("<th align='center'>Temperaturas</th>");
    foreach (TEMPERATURAS as $dia => $temp) {
        echo ("<tr>");
        echo ("<td><b>$dia</b></td>");
        echo ("<td><b>$temp</b></td>");
        echo ("</tr>");
    };
    echo ("</table>");

    ?>
</body>

</html>