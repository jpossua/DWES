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
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 07 - Fechas y Horas</u></h1>
    </header>

    <?php
    // ===================================================================================
    // FUNCIONES PERSONALIZADAS
    // ===================================================================================

    /**
     * obtenerDiaSemanaEsp
     * Devuelve el nombre del día de la semana en español.
     * @param string $dateString Una fecha en formato texto (ej: "2023-10-25")
     */
    function obtenerDiaSemanaEsp(string $dateString)
    {
        // 1. Creamos un objeto DateTime (la forma moderna de manejar fechas en PHP)
        $date = new DateTime($dateString);

        // 2. Obtenemos el número del día de la semana (0=Domingo, 1=Lunes...)
        $diaNumero = $date->format('w');

        // 3. Usamos un array para traducir ese número a texto
        $dias = [
            '0' => 'Domingo',
            '1' => 'Lunes',
            '2' => 'Martes',
            '3' => 'Miércoles',
            '4' => 'Jueves',
            '5' => 'Viernes',
            '6' => 'Sábado',
        ];

        // Devolvemos el día o 'Desconocido' si algo fallara (operador ??)
        return $dias[$diaNumero] ?? 'Día Desconocido';
    }

    /**
     * obtenerMesEsp
     * Devuelve el nombre del mes en español.
     */
    function obtenerMesEsp(string $dateString)
    {
        $date = new DateTime($dateString);
        // 'n' devuelve el mes sin ceros iniciales (1 a 12)
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

    // ===================================================================================
    // DEMOSTRACIÓN DE FUNCIONES NATIVAS
    // ===================================================================================

    echo ("<div class='alert alert-info mt-4 text-center'>");
    echo ("<h3 class='mb-0 text-center'>Funciones Básicas de Fecha y Hora</h3>");
    echo ("<h3 class='mb-0 text-center'>----------------------------------------</h3><br>");
    echo ('<div class="card-body">');

    // 1. Obtenemos la fecha y la hora actual
    // new DateTime() sin parámetros coge el momento actual ("ahora").
    $ahora = new DateTime();
    echo ("<b>1. Fecha y Hora Actual (Objeto DateTime): </b>" . $ahora->format('Y-m-d H:i:s') . "<br>");

    // 2. Obtener la marca de tiempo (Timestamp) actual
    // El timestamp es el número de segundos que han pasado desde el 1 de Enero de 1970 (Época Unix).
    // Es muy útil para guardar fechas en bases de datos o hacer cálculos simples.
    $timestampActual = time();
    echo ("<b>2. Marca de Tiempo (Timestamp): </b>" . $timestampActual . " segundos desde el 1 de enero de 1970.<br>");

    // 3. Formatear una marca de tiempo con la función date()
    // date() es la función antigua/clásica, pero sigue siendo muy útil.
    // 'l' = día semana texto completo, 'd' = día mes, 'm' = mes número, 'Y' = año 4 dígitos...
    $fechaFormateada = date('l, d/m/Y H:i:s', $timestampActual);
    echo ("<b>3. Timestamp formateado con date():</b> " . $fechaFormateada . "<br>");

    // 4. Crear un DateTime a partir de una cadena
    $fechaEspecifica = new DateTime('1990-04-12 15:30:00');
    echo "<b>4. Fecha específica (12 de Abril de 1990):</b> " . $fechaEspecifica->format('d-m-Y') . "<br>";
    echo ("</div></div>");

    // ===================================================================================
    // ARITMÉTICA DE FECHAS (Sumar y Restar tiempo)
    // ===================================================================================

    echo ("<div class='alert alert-info mt-4 text-center'>");
    echo ("<h3 class='mb-0 text-center'>Arítmetica de Fecha y Hora (DateInterval)</h3>");
    echo ("<h3 class='mb-0 text-center'>-----------------------------------------------</h3><br>");
    echo ('<div class="card-body">');
    $fechaInicial = new DateTime('2025-01-10');
    echo "<b>Fecha inicial:</b> " . $fechaInicial->format('Y-m-d') . "<br>";

    // 5. Sumar tiempo
    // DateInterval define un periodo. 'P' de Periodo, '3Y' = 3 Años, '2M' = 2 Meses, '15D' = 15 Días.
    $intervaloSuma = new DateInterval('P3Y2M15D');

    // IMPORTANTE: Los objetos se pasan por referencia. Si modificamos $fechaInicial, cambiaría para siempre.
    // Por eso usamos 'clone' para crear una copia independiente antes de modificarla.
    $fechaFutura = clone $fechaInicial;
    $fechaFutura->add($intervaloSuma); // Método add() suma el intervalo
    echo "<b>5. Sumar 3 años, 2 meses y 15 días:</b> " . $fechaFutura->format('Y-m-d') . "<br>";

    // 6. Restar tiempo
    // 'PT' significa Periodo de Tiempo (para horas/minutos/segundos). '5H' = 5 Horas, '30M' = 30 Minutos.
    $intervaloResta = new DateInterval('PT5H30M');
    $fechaPasada = clone $ahora;
    $fechaPasada->sub($intervaloResta); // Método sub() resta el intervalo
    echo "<b>6. Restar 5 horas y 30 minutos a la hora actual:</b> " . $fechaPasada->format('Y-m-d H:i:s') . "<br>";

    // 7. Calcular la diferencia entre dos fechas
    $fechaA = new DateTime('2024-12-31');
    $fechaB = new DateTime('2026-01-01');

    // diff() devuelve un objeto DateInterval con la diferencia exacta
    $diferencia = $fechaA->diff($fechaB);

    echo "<b>7. Diferencia entre 31/12/2024 y 01/01/2026:</b><br>";
    echo "<b>   - Años: </b>" . $diferencia->y . "<br>";
    echo "<b>   - Meses: </b>" . $diferencia->m . "<br>";
    echo "<b>   - Días: </b>" . $diferencia->d . "<br>";

    // %R%a: %R pone el signo (+ o -), %a pone el total de días absoluto.
    echo "<b>   - Total de días: </b>" . $diferencia->format('%R%a días') . "<br>";
    echo ("</div></div>");

    // ===================================================================================
    // USO DE FUNCIONES PERSONALIZADAS
    // ===================================================================================

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
    // 'now' es una palabra clave mágica para DateTime que significa "ahora mismo".
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