<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 3 - Ejercicio 07</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-primary bg-gradient min-vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 07</u></h1>
    </header>

    <?php
    // Función personalizada para obtener el nombre del día de la semana en español.
    function obtenerDiaSemanaEsp(string $dateString)
    {
        // Creamos un objeto DateTime a partir de la cadena de fecha
        $date = new DateTime($dateString);

        // Obtenemos el formato de día
        $diaNumero = $date->format('w');

        $dias = [
            '0' => 'Domingo',
            '1' => 'Lunes',
            '2' => 'Martes',
            '3' => 'Miércoles',
            '4' => 'Jueves',
            '5' => 'Viernes',
            '6' => 'Sábado',
        ];

        return $dias[$diaNumero] ?? 'Día Desconocido';
    }

    // Función personalizada para obtener el nombre del mes en español.
    function obtenerMesEsp(string $dateString)
    {
        // Crear un objeto DateTime
        $date = new DateTime($dateString);
        // Obtener el formato de mes (1 para Enero, 12 para Diciembre)
        $mesNumero = $date->format('n');

        $meses = [
            '1' => 'Enero',
            '2' => 'Febrero',
            '3' => 'Marzo',
            '4' => 'Abril',
            '5' => 'Mayo',
            '6' => 'Junio',
            '7' => 'Julio',
            '8' => 'Agosto',
            '9' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre',
        ];

        return $meses[$mesNumero] ?? 'Mes desconocido';
    }

    echo ("<div class='alert alert-info mt-4 text-center'>");
    echo ("<h3 class='mb-0 text-center'>Funciones Básicas de Fecha y Hora</h3>");
    echo ("<h3 class='mb-0 text-center'>----------------------------------------</h3><br>");
    echo ('<div class="card-body">');
    // 1. Obtenemos la fecha y la hora actual
    $ahora = new DateTime();
    echo ("<b>1. Fecha y Hora Actual (Objeto DateTime): </b>" . $ahora->format('Y-m-d H:i:s') . "<br>");

    // 2. Obtener la marca de tiempo (Timestamp) actual
    $timestampActual = time();
    echo ("<b>2. Marca de Tiempo (Timestamp): </b>" . $timestampActual . " segundos desde el 1 de enero de 1970.<br>");

    // 3. Formatear una marca de tiempo con la función date()
    $fechaFormateada = date('l, d/m/Y H:i:s', $timestampActual);
    echo ("<b>3. Timestamp formateado con date():</b> " . $fechaFormateada . "<br>");

    // 4. Crear un DateTime a partir de una cadena
    $fechaEspecifica = new DateTime('1990-04-12 15:30:00');
    echo "<b>4. Fecha específica (12 de Abril de 1990):</b> " . $fechaEspecifica->format('d-m-Y') . "<br>";
    echo ("</div></div>");

    echo ("<div class='alert alert-info mt-4 text-center'>");
    echo ("<h3 class='mb-0 text-center'>Arítmetica de Fecha y Hora (DateInterval)</h3>");
    echo ("<h3 class='mb-0 text-center'>-----------------------------------------------</h3><br>");
    echo ('<div class="card-body">');
    $fechaInicial = new DateTime('2025-01-10');
    echo "<b>Fecha inicial:</b> " . $fechaInicial->format('Y-m-d') . "<br>";

    // 5. Sumar tiempo
    $intervaloSuma = new DateInterval('P3Y2M15D'); // 3 años, 2 meses, 15 días
    $fechaFutura = clone $fechaInicial; // Clona el objeto para no modificar el original
    $fechaFutura->add($intervaloSuma);
    echo "<b>5. Sumar 3 años, 2 meses y 15 días:</b> " . $fechaFutura->format('Y-m-d') . "<br>";

    // 6. Restar tiempo
    $intervaloResta = new DateInterval('PT5H30M'); // 5 horas y 30 minutos
    $fechaPasada = clone $ahora;
    $fechaPasada->sub($intervaloResta);
    echo "<b>6. Restar 5 horas y 30 minutos a la hora actual:</b> " . $fechaPasada->format('Y-m-d H:i:s') . "<br>";

    // 7. Calcular la diferencia entre dos fechas
    $fechaA = new DateTime('2024-12-31');
    $fechaB = new DateTime('2026-01-01');
    $diferencia = $fechaA->diff($fechaB);

    echo "<b>7. Diferencia entre 31/12/2024 y 01/01/2026:</b><br>";
    echo "<b>   - Años: </b>" . $diferencia->y . "<br>";
    echo "<b>   - Meses: </b>" . $diferencia->m . "<br>";
    echo "<b>   - Días: </b>" . $diferencia->d . "<br>";

    // El formateador de diferencia %R%a te da el número total de días, incluyendo el signo (+/-)
    echo "<b>   - Total de días: </b>" . $diferencia->format('%R%a días') . "<br>";
    echo ("</div></div>");

    echo ("<div class='alert alert-info mt-4 text-center'>");
    echo ("<h3 class='mb-0 text-center'>Funciones Personalizadas en Español</h3>");
    echo ("<h3 class='mb-0 text-center'>------------------------------------------</h3><br>");
    echo ('<div class="card-body">');
    $fechaPrueba = '2025-05-15'; // Jueves, 15 de Mayo
    echo "<b>Fecha de prueba: </b>" . (new DateTime($fechaPrueba))->format('d/m/Y') . "<br>";

    // 8. Uso de la función personalizada para el día
    $diaEspanol = obtenerDiaSemanaEsp($fechaPrueba);
    echo "<b>8. Día de la semana en español:</b> " . $diaEspanol . "<br>";

    // 9. Uso de la función personalizada para el mes
    $mesEspanol = obtenerMesEsp($fechaPrueba);
    echo "<b>9. Mes en español:</b> " . $mesEspanol . "<br>";

    // 10. Combinación: Mostrar la fecha actual completamente en español
    $fechaActualEspanol = obtenerDiaSemanaEsp('now') . ', ' .
        (new DateTime('now'))->format('d') . ' de ' .
        obtenerMesEsp('now') . ' de ' .
        (new DateTime('now'))->format('Y');

    echo "<b>10. Fecha actual en español:</b> " . $fechaActualEspanol . "<br>";
    echo ("</div></div>");

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>