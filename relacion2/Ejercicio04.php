<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 2 - Ejercicio 04</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-primary bg-gradient vh-100">
    <div class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold">Ejercicio 04</h1>
    </div>
    <?php
    /* error_reporting(E_ALL && ~E_WARNING); */ // Para desactivar los warnings

    // PHP es case sensitive (Que diferencia entre mayusculas y minusculas)
    const SEMANA = [
        "lunes",
        "martes",
        "miércoles",
        "jueves",
        "viernes",
        "sábado",
        "domingo"
    ]; // Las constantes se ponen en mayusculas (por convenio) y si declaro `const` no debe usar $ en el nombre

    echo (" <div class='text-center text-light p-3 m-2'");
    echo "<p>El primer de la semana es: ", SEMANA[0], "</p>";
    echo "<p>Una semana tiene ", count(SEMANA), "</p>"; // Esta funcion calcula la longitud de un array
    echo ("</div>");
    echo "<br><center><h3 class='text-light fw-bold'><u>Todos los dias de la semana</u></h3></center>";

    echo (" <div class='container text-center p-5 md-5 border border-primary-subtle bg-info'");
    echo (" <div class='row justify-content-md-center'>");
    echo ("<div class='col-auto'>");
    echo "<ol class='list-group list-group-numbered'>";
    for ($i = 0; $i < 7; $i++) {
        echo "<li class='list-group-item'>El " . $i + 1 . "º dia de la semana es " . SEMANA[$i] . "</li>";
    }
    echo "</ol>";
    echo ("</div>");
    echo ("</div>");
    echo ("</div>");
    ?>
    <!-- Carga de Bootstrap JS al final del body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>