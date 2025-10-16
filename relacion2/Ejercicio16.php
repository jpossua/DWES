<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 16</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .divisor {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-primary bg-gradient vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 16</u></h1>
    </header>
    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 bg-info-subtle shadow">
                    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="get" onsubmit="return validarFormulario()">
                        <div class="mb-3">
                            <label for="numero" class="form-label">Introduce un número mayor que 0:</label>
                            <input type="number" class="form-control" id="numero" name="numero" min="1" required>
                            <div class="invalid-feedback">
                                Introduce un número entero válido.
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="mb-2">¿Qué deseas hacer?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="opcion" id="opcion_primo" value="primo" checked required>
                                <label class="form-check-label" for="opcion_primo">Ver si es primo</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="opcion" id="opcion_divisores" value="divisores" required>
                                <label class="form-check-label" for="opcion_divisores">Mostrar sus divisores</label>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Ejecutar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php
    if (isset($_GET['numero']) && isset($_GET['opcion']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
        $numero = intval($_GET['numero']);
        $opcion = $_GET['opcion'];
        if ($numero <= 0) {
            echo ("<div class='alert alert-danger mt-4'>El número debe ser un entero mayor que 0.</div>");
        } else {
            if ($opcion == 'primo') {
                $esPrimo = true;
                if ($numero <= 1) {
                    $esPrimo = false;
                } else {
                    for ($i = 2; $i * $i <= $numero && $esPrimo; $i++) {
                        if ($numero % $i == 0) {
                            $esPrimo = false;
                        }
                    }
                }

                echo ("<div class='alert alert-info mt-4 text-center'>");
                if ($esPrimo) {
                    echo ("<h4>El número <strong>$numero</strong> es <strong>primo</strong>.</h4>");
                } else {
                    echo ("<h4>El número <strong>$numero</strong> <strong>no es primo</strong>.</h4>");
                }
                echo ("</div>");
            } elseif ($opcion == 'divisores') {
                $divisores = [];
                echo ("<div class='alert alert-info mt-4 text-center'>");
                echo ("<h4>Divisores de <strong>{$numero}</strong>:</h4>");
                echo '<p>';
                for ($i = 1; $i <= $numero; $i++) {
                    if ($numero % $i == 0) {
                        $divisores[] = "<span class='divisor'>{$i}</span>";
                    } else {
                        $divisores[] = (string)$i;
                    }
                }
                // implode — Une elementos de un array en un string [implode(string $separator, array $array)]
                echo implode(', ', $divisores);
                echo ("</p></div>");
            }
        }
    } else {
        echo "<div class='alert alert-warning mt-4 text-center'>No se ha recibido ningun número o opción.</div>";
    }
    ?>

    <script>
        function validarFormulario() {
            const numero = parseInt(document.getElementById("numero").value);
            let validar = true;

            if (isNaN(numero) || numero == "" || numero < 0) {
                alert("El valor debe ser un número entero mayor que 0.");
                validar = false;
            }

            return validar;
        }
    </script>
    <!-- Carga de Bootstrap JS al final del body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>