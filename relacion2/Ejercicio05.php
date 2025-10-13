<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 2 - Ejercicio 05</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-primary bg-gradient vh-100">
    <div class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3">Ejercicio 05</h1>
    </div>
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
    echo ("<div class='container text-center border border-primary-subtle bg-info-subtle md-3 p-3'>");
    echo ("<div class='container bg-white md-3 p-3'>");

    echo ("La temperatura del Lunes es: ") . TEMPERATURAS['Lunes'] . "ºC<br><br>";

    // 2. Muestra la temperatura de todos los días secuencialmente.
    foreach (TEMPERATURAS as $dia => $temp) {
        echo ("La temperatura del $dia es de $temp ºC<br>");
    };
    echo ("</div>");

    // 3. Muestra la temperatura de todos los días en una lista numerada
    echo (" <div class='container text-center p-5 md-5 border border-primary-subtle bg-info-subtle'");
    echo (" <div class='row justify-content-md-center'>");
    echo ("<div class='col-auto'>");
    echo ("<ol class='list-group list-group-numbered'>");
    foreach (TEMPERATURAS as $dia => $temp) {
        echo ("<li class='list-group-item'>La temperatura del <b>$dia</b> es de <b>$temp ºC</b></li>");
    };
    echo ("</ol>");
    echo ("</div>");
    echo ("</div>");
    echo ("</div>");

    echo ("<div class='table-responsive p-3'>");
    echo ("<table class='table table-bordered border-primary-subtle text-center'>");
    echo ("<th colspan='2'>Temperaturas</th>");
    foreach (TEMPERATURAS as $dia => $temp) {
        echo ("<tr>");
        echo ("<td><b>$dia</b></td>");
        echo ("<td><b>$temp ºC</b></td>");
        echo ("</tr>");
    };
    echo ("</table>");
    echo ("</div>");

    ?>
    <!-- Carga de Bootstrap JS al final del body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>