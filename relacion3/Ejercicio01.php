<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 01</title>
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
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 01</u></h1>
    </header>
    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 bg-info-subtle shadow">
                    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="get">
                        <div class="mb-3">
                            <label for="numero" class="form-label">Introduce un número mayor que 0:</label>
                            <input type="number" class="form-control" id="numero" name="numero" min="1" required>
                            <div class="invalid-feedback">
                                Introduce un número entero válido.
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
    // Incluir la librería con las funciones
    require_once 'relacion3.php';
    /*
    // La función dice si el numero es primo o no
    function numeroPrimo($num)
    {
        $esPrimo = true;
        if ($num <= 1) {
            $esPrimo = false;
        } else {
            for ($i = 2; $i < $num && $esPrimo; $i++) {
                if ($num % $i == 0) {
                    $esPrimo = false;
                }
            }
        }

        return $esPrimo;
    }
    */
    if (isset($_GET['numero']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
        $numero = intval($_GET['numero']);
        if ($numero <= 0) {
            echo ("<div class='alert alert-danger mt-4'>El número debe ser un entero mayor que 0.</div>");
        } else {
            $esPrimo = numeroPrimo($numero);
        }

        echo ("<div class='alert alert-info mt-4 text-center'>");
        if ($esPrimo) {
            echo ("<h4>El número <strong>$numero</strong> es <strong>primo</strong>.</h4>");
        } else {
            echo ("<h4>El número <strong>$numero</strong> <strong>no es primo</strong>.</h4>");
        }
        echo ("</div>");
        echo ("</p></div>");
    } else {
        echo "<div class='alert alert-warning mt-4 text-center'>No se ha recibido ningun número o opción.</div>";
    }
    ?>
    <!-- Carga de Bootstrap JS al final del body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>