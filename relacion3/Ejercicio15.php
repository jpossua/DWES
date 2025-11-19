<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15 - Arrow Functions & Match</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-primary bg-gradient vh-100">

    <header class="bg-dark bg-gradient text-white text-center p-4 mb-4">
        <h1 class="fw-bold">Arrow Functions (fn) y Match</h1>
        <p>Sintaxis moderna de PHP (7.4+ y 8.0+)</p>
    </header>

    <main class="container">
        <div class="row justify-content-center">

            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="mb-3">
                                <label for="radio" class="form-label fw-bold">Radio (r):</label>
                                <input type="number" step="any" min="0" class="form-control"
                                    name="radio" id="radio" required
                                    value="<?php echo isset($_POST['radio']) ? htmlspecialchars($_POST['radio']) : ''; ?>">
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Calcular con Flechas">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $r = floatval($_POST['radio']);

                    if ($r > 0) {

                        // --------------------------------------------------
                        // 1. REDEFINICIÓN CON ARROW FUNCTIONS (fn)
                        // --------------------------------------------------
                        // Sintaxis: fn(argumentos) => expresión_de_retorno;

                        $circunferencia = fn($n) => 2 * M_PI * $n;

                        $circulo = fn($n) => M_PI * pow($n, 2);

                        $esfera = fn($n) => (4 / 3) * M_PI * pow($n, 3);

                        // Calculamos los valores
                        $valCircunferencia = $circunferencia($r);
                        $valArea = $circulo($r);
                        $valVolumen = $esfera($r);


                        // --------------------------------------------------
                        // 2. USO DE MATCH (Ejemplo práctico)
                        // --------------------------------------------------
                        // Vamos a clasificar el tamaño del círculo usando match.
                        // Match devuelve un valor, así que lo asignamos a una variable.

                        $clasificacion = match (true) {
                            $valArea < 50   => 'Pequeño',
                            $valArea < 150  => 'Mediano',
                            $valArea < 500  => 'Grande',
                            default         => 'Gigante',
                        };

                        // MOSTRAR RESULTADOS
                        echo '<div class="row">';

                        // Tarjeta 1
                        echo '<div class="col-md-4"><div class="alert alert-success text-center">';
                        echo '<strong>Circunferencia</strong><br>';
                        echo number_format($valCircunferencia, 2);
                        echo '</div></div>';

                        // Tarjeta 2
                        echo '<div class="col-md-4"><div class="alert alert-warning text-center">';
                        echo '<strong>Círculo (' . $clasificacion . ')</strong><br>';
                        echo number_format($valArea, 2);
                        echo '</div></div>';

                        // Tarjeta 3
                        echo '<div class="col-md-4"><div class="alert alert-danger text-center">';
                        echo '<strong>Esfera</strong><br>';
                        echo number_format($valVolumen, 2);
                        echo '</div></div>';

                        echo '</div>';
                    } else {
                        echo '<div class="alert alert-danger">El radio debe ser mayor a 0.</div>';
                    }
                }
                ?>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>