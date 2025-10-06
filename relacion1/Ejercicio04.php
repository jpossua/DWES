<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 04</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 04</h1>
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

    echo "El primer de la semana es: ", SEMANA[0];
    echo "<br>Una semana tiene ", count(SEMANA); // Esta funcion calcula la longitud de un array
    echo "<br><center><h3>Todos los dias de la semana</h3></center>";
    echo "<ol>";
    for ($i = 0; $i < 7; $i++) {
        echo "<li>El " . $i + 1 . "º dia de la semana es " . SEMANA[$i] . "</li>";
    }
    echo "</ol>";
    ?>

</body>

</html>