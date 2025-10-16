<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 17</title>
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
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 17</u></h1>
    </header>
    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 bg-info-subtle shadow">
                    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="get" id="form">
                        <div class="mb-3">
                            <label for="dividendo" class="form-label">Dividendo (número entero):</label>
                            <input type="number" class="form-control" id="dividendo" name="dividendo">
                            <div class="invalid-feedback">
                                Introduce un número entero válido.
                            </div>
                            <div id="dividendoHelp" class="form-text text-danger">El dividendo es obligatorio y debe ser un número entero.</div>
                        </div>
                        <div class="mb-3">
                            <label for="numero" class="form-label">Divisor (número entero distinto de 0):</label>
                            <input type="number" class="form-control" id="divisor" name="divisor">
                            <div class="invalid-feedback">
                                Introduce un número entero válido.
                            </div>
                            <div id="divisorHelp" class="form-text text-danger">El divisor es obligatorio y debe ser un número entero distinto de 0.</div>
                        </div>
                        <div class="mb-3">
                            <p class="mb-2">¿Qué deseas calcular?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="calcular[]" id="opcion_cociente" value="cociente">
                                <label class="form-check-label" for="opcion_cociente">Cociente</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="calcular[]" id="opcion_resto" value="resto">
                                <label class="form-check-label" for="opcion_resto">Resto</label>
                            </div>
                            <div id="checkHelp" class="form-text text-danger">Elige al menos una opción.</div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Calcular</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php
    if (isset($_GET['dividendo']) && isset($_GET['divisor']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
        $dividendo = intval($_GET['dividendo']);
        $divisor = intval($_GET['divisor']);
        $calcular = $_GET['calcular'] ?? []; // Sin '[]', y con operador de fusión nula

        if ($divisor == 0) {
            echo ("<div class='alert alert-danger mt-4 text-center'>El divisor no puede ser cero.</div>");
        } elseif (empty($calcular)) {
            echo ("<div class='alert alert-warning mt-4 text-center'>Selecciona al menos una opción: cociente o resto.</div>");
        } else {
            echo "<div class='alert alert-info mt-4 text-center'>";
            /* 
             La función in_array() busca un valor específico en una matriz.
             [in_array(search, array, type)] (Obligatorio. Especifica qué buscar, 
             Obligatorio. Especifica la matriz en la que se realizará la búsqueda, 
             Opcional. Si este parámetro se establece en VERDADERO, la función in_array()
             busca la cadena de búsqueda y el tipo específico en la matriz.)
             */
            if (in_array('cociente', $calcular)) {
                $cociente = intdiv($dividendo, $divisor); // división entera
                echo "<p><strong>Cociente:</strong> $cociente</p>";
            }
            if (in_array('resto', $calcular)) {
                $resto = $dividendo % $divisor;
                echo "<p><strong>Resto:</strong> $resto</p>";
            }
            echo "</div>";
        }
    } else {
        echo "<div class='alert alert-warning mt-4 text-center'>No se ha recibido ningun número o opción.</div>";
    }
    ?>

    <script>
        document.getElementById('form').addEventListener("submit", function(event) {

            if (!validarFormulario()) {
                event.preventDefault(); // Parar el submit por defecto
            }

        });

        document.getElementById('dividendo').addEventListener("change", function() {
            limpiarError('dividendoHelp', 'dividendo');
        });
        document.getElementById('divisor').addEventListener("change", function() {
            limpiarError('divisorHelp', 'divisor');
        });
        document.getElementById('opcion_cociente').addEventListener("change", function() {
            limpiarError('checkHelp', 'opcion_cociente');
        });
        document.getElementById('opcion_resto').addEventListener("change", function() {
            limpiarError('checkHelp', 'opcion_resto');
        });

        function validarFormulario() {
            const dividendo = parseInt(document.getElementById("dividendo").value);
            const divisor = parseInt(document.getElementById("divisor").value);
            const cocienteCheck = document.getElementById("opcion_cociente").checked;
            const restoCheck = document.getElementById("opcion_resto").checked;
            let validar = true;

            if (isNaN(dividendo) || isNaN(divisor)) {
                alert("Ambos campos deben ser números enteros.");
                campoErrorColorear("divisorHelp", "divisor");
                campoErrorColorear("dividendoHelp", "dividendo");
                validar = false;
            }

            if (divisor === 0) {
                alert("El divisor no puede ser 0.");
                campoErrorColorear("divisorHelp", "divisor");
                validar = false;
            }

            if (!cocienteCheck && !restoCheck) {
                alert("Selecciona al menos una opción: cociente o resto.");
                campoErrorColorear("checkHelp", "opcion_cociente");
                campoErrorColorear("checkHelp", "opcion_resto");
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