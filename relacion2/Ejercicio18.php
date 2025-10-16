<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 18</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .divisor {
            color: red;
            font-weight: bold;
        }

        .form-text {
            visibility: hidden;
        }
    </style>

</head>

<body class="bg-primary bg-gradient vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 18</u></h1>
    </header>
    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 bg-info-subtle shadow">
                    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="get" id="form">
                        <div class="mb-3">
                            <label for="numero" class="form-label">Número decimal mayor o igual a 0:</label>
                            <input type="number" class="form-control" id="numero" name="numero">
                            <div class="invalid-feedback">
                                Introduce un número entero válido.
                            </div>
                            <div id="numeroHelp" class="form-text text-danger">El número es obligatorio y debe ser un número entero positivo.</div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Convertir a Binario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php
    if (isset($_GET['numero']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
        $numero = intval($_GET['numero']);

        if ($numero < 0 || is_null($numero)) {
            echo ("<div class='alert alert-danger mt-4 text-center'>Error: Debes introducir un número entero no negativo.</div>");
        } else {

            if ($numero == 0) {
                $binario = "0";
            } else {
                $temp = $numero;
                $binario = "";
                while ($temp > 0) {
                    $binario = ($temp % 2) . $binario;
                    $temp = intval($temp / 2);
                }
            }
            echo ("<div class='alert alert-success mt-4'>");
            echo "<h5>Resultado:</h5>";
            echo "<p>Número decimal: <strong>{$numero}</strong></p>";
            echo "<p>Representación binaria: <strong>{$binario}</strong></p>";
            echo "</div>";
        }
    }
    ?>

    <script>
        document.getElementById('form').addEventListener("submit", function(event) {

            if (!validarFormulario()) {
                event.preventDefault(); // Parar el submit por defecto
            }

        });

        document.getElementById('numero').addEventListener("change", function() {
            limpiarError('numeroHelp', 'numero');
        });

        function validarFormulario() {
            const NUMERO = parseInt(document.getElementById("numero").value.trim());
            let validar = true;

            if (isNaN(NUMERO)) {
                alert("Debes introducir un número entero válido.");
                campoErrorColorear('numeroHelp', 'numero');
                validar = false;
            }

            if (NUMERO < 0) {
                alert("El número debe ser mayor o igual que 0.");
                campoErrorColorear('numeroHelp', 'numero');
                validar = false;
            }

            return validar;
        }

        // Función que colorea si algún campo no cumple los requisitos.
        function campoErrorColorear(id1, id2) {
            document.getElementById(id1).style.visibility = "visible";
            document.getElementById(id2).style.borderColor = "red";
        }

        // Función que colorea si algún campo cumple los requisitos.
        function limpiarError(id1, id2) {
            document.getElementById(id1).style.visibility = "hidden";
            document.getElementById(id2).style.borderColor = "#dee2e6";
        }
    </script>
    <!-- Carga de Bootstrap JS al final del body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>