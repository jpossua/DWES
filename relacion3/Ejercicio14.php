<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 14 - Funciones Anónimas</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!--ESTILOS CSS-->
    <style>
        .resultado-card {
            transition: transform 0.2s;
        }

        .resultado-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>

<body class="bg-primary bg-gradient vh-100">

    <header class="bg-primary bg-gradient text-white text-center p-4 mb-4">
        <h1 class="fw-bold">Geometría con Funciones Anónimas</h1>
        <p>Longitud, Área y Volumen</p>
    </header>

    <main class="container">
        <div class="row justify-content-center">

            <div class="col-md-4 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Entrada de Datos</h5>
                    </div>
                    <div class="card-body d-flex align-items-center">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="w-100">
                            <div class="mb-3">
                                <label for="radio" class="form-label fw-bold">Introduce el Radio (r):</label>
                                <input type="number" step="any" min="0" class="form-control form-control-lg"
                                    name="radio" id="radio" placeholder="Ej: 5.5" required
                                    value="<?php echo isset($_POST['radio']) ? htmlspecialchars($_POST['radio']) : ''; ?>">
                                <div class="form-text">Debe ser un número real positivo.</div>
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Calcular">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    // Recogemos el radio. Usamos floatval para asegurarnos que es un número real.
                    $r = isset($_POST['radio']) ? floatval($_POST['radio']) : 0;

                    if ($r > 0) {

                        // --------------------------------------------------
                        // DEFINICIÓN DE FUNCIONES ANÓNIMAS
                        // --------------------------------------------------

                        // 1. Longitud de la Circunferencia: L = 2 * pi * r
                        $circunferencia = function ($n) {
                            return 2 * M_PI * $n;
                        };

                        // 2. Área del Círculo: A = pi * r^2
                        $circulo = function ($n) {
                            return M_PI * pow($n, 2);
                        };

                        // 3. Volumen de la Esfera: V = (4/3) * pi * r^3
                        $esfera = function ($n) {
                            return (4 / 3) * M_PI * pow($n, 3);
                        };


                        // --------------------------------------------------
                        // MOSTRAR RESULTADOS
                        // --------------------------------------------------
                        echo '<div class="row">';

                        // Tarjeta 1: Circunferencia
                        echo '<div class="col-md-4 mb-3">';
                        echo '<div class="card text-center border-success resultado-card shadow-sm">';
                        echo '<div class="card-header bg-success text-white fw-bold">Circunferencia</div>';
                        echo '<div class="card-body">';
                        echo '<h6 class="card-subtitle mb-2 text-muted">Longitud ($2\pi r$)</h6>';
                        // LLAMADA A LA FUNCIÓN ANÓNIMA
                        echo '<h3 class="card-text text-success">' . number_format($circunferencia($r), 2) . '</h3>';
                        echo '</div></div></div>';

                        // Tarjeta 2: Círculo
                        echo '<div class="col-md-4 mb-3">';
                        echo '<div class="card text-center border-warning resultado-card shadow-sm">';
                        echo '<div class="card-header bg-warning text-dark fw-bold">Círculo</div>';
                        echo '<div class="card-body">';
                        echo '<h6 class="card-subtitle mb-2 text-muted">Área ($\pi r^2$)</h6>';
                        // LLAMADA A LA FUNCIÓN ANÓNIMA
                        echo '<h3 class="card-text text-warning">' . number_format($circulo($r), 2) . '</h3>';
                        echo '</div></div></div>';

                        // Tarjeta 3: Esfera
                        echo '<div class="col-md-4 mb-3">';
                        echo '<div class="card text-center border-danger resultado-card shadow-sm">';
                        echo '<div class="card-header bg-danger text-white fw-bold">Esfera</div>';
                        echo '<div class="card-body">';
                        echo '<h6 class="card-subtitle mb-2 text-muted">Volumen ($\frac{4}{3}\pi r^3$)</h6>';
                        // LLAMADA A LA FUNCIÓN ANÓNIMA
                        echo '<h3 class="card-text text-danger">' . number_format($esfera($r), 2) . '</h3>';
                        echo '</div></div></div>';

                        echo '</div>'; // Fin row resultados

                    } else {
                        // Caso de error (número negativo o cero)
                        echo '<div class="alert alert-danger shadow-sm" role="alert">';
                        echo '<h4 class="alert-heading">Error en los datos</h4>';
                        echo '<p>Por favor, introduce un radio mayor que 0 para realizar los cálculos geométricos.</p>';
                        echo '</div>';
                    }
                } else {
                    // Mensaje inicial cuando no se ha enviado el formulario
                    echo '<div class="alert alert-info shadow-sm">';
                    echo 'Introduce un valor en el formulario para ver los cálculos aquí.';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <script>
        MathJax = {
            tex: {
                inlineMath: [
                    ['$', '$'],
                    ['\\(', '\\)']
                ]
            }
        };
    </script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js"></script>
</body>

</html>