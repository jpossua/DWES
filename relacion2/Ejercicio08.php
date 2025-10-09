<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 2 - Ejercicio 08</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-info vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 08</u></h1>
    </header>
    <main class="container mt-5">
        <section class="row justify-content-center">
            <article class="col-md-6">
                <div class="card-body">
                    <form action="<?php echo ($_SERVER["PHP_SELF"]) ?>" method="post">
                        <div class="mb-3">
                            <label for="numero01" class="form-label">Introduce número 1:</label>
                            <input type="number" name="numero01" id="numero01" class="form-control" step="any" required>
                        </div>
                        <div class="mb-3">
                            <label for="operador" class="form-label">Operador</label>
                            <select name="operador" id="operador" class="form-select">
                                <option value="+">Suma</option>
                                <option value="-">Resta</option>
                                <option value="*">Multiplicación</option>
                                <option value="/">División</option>
                                <option value="%">Módulo</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="numero02" class="form-label">Introduce número 2:</label>
                            <input type="number" name="numero02" id="numero02" class="form-control" step="any" required>
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="btn btn-success" value="Enviar">
                        </div>
                    </form>
                </div>
            </article>
        </section>
    </main>

    <?php
    // Bloque PHP para procesar el formulario si se ha enviado (Opcional, pero esencial para la lógica)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recoge los números y convertirlos a flotante (para step="any")
        if (isset($_POST['numero01']) && isset($_POST['numero02']) && isset($_POST['operador'])) {
            $num01 = floatval($_POST['numero01']);
            $num02 = floatval($_POST['numero02']);
            $operador = $_POST['operador'];
            $resultado = NULL;
            $error = NULL;

            switch ($operador) {
                case '+':
                    $resultado = $num01 + $num02;
                    break;
                case '-':
                    $resultado = $num01 - $num02;
                    break;
                case '*':
                    $resultado = $num01 * $num02;
                    break;
                case '/':
                    if ($num02 != 0) {
                        $resultado = $num01 / $num02;
                    } else {
                        $error = "¡Error!: No se puede dividir por cero.";
                    }
                    break;
                case '%':
                    if ($num02 != 0) {
                        $resultado = $num01 % $num02;
                    } else {
                        $error = "¡Error!: Módulo por cero indefinido.";
                    }
                    break;

                default:
                    $error = "Operador no válido.";
                    break;
            }

            // Mensaje de resultado:
            echo ("<section class='row justify-content-center mt-4'>");
            echo ("<div class='col-md-6'>");
            if ($error) {
                echo ("<div class='alert alert-info text-center' role='alert'>");
                echo (htmlspecialchars($error));
                echo ("</div>");
            } else {
                echo ("<div class='alert alert-info text-center' role='alert'>");
                echo ("<strong>Resultado: </strong>" . $num01 . " " . $operador . " " . $num02 . "= <strong>" . $resultado . "</strong>");
                echo ("</div>");
            }
            echo ("</div>");
            echo ("</section>");
        }
    }
    ?>

</body>

</html>