<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8A - Checkboxes</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    
    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!--ESTILOS CSS-->
    <style>
        .form-text {
            visibility: hidden;
        }
    </style>
</head>

<body class="bg-primary bg-gradient vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 8A (Y/O)</u></h1>
    </header>

    <main class="container mt-5">
        <section class="row justify-content-center">
            <article class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white text-center">
                        <h5>Conversor de Texto (Múltiple)</h5>
                    </div>
                    <div class="card-body">
                        <form action='<?php echo ($_SERVER["PHP_SELF"]) ?>' method="get" id="formTexto">

                            <div class="mb-3">
                                <label for="texto" class="form-label">Introduce un texto:</label>
                                <input class="form-control" type="text" name="texto" id="texto" placeholder="Escribe algo aquí...">
                                <div id="textoHelp" class="form-text text-danger">El texto no puede estar vacío.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">¿Cómo quieres verlo?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="mayus" value="1" id="chkMayus">
                                    <label class="form-check-label" for="chkMayus">En Mayúsculas</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="minus" value="1" id="chkMinus">
                                    <label class="form-check-label" for="chkMinus">En Minúsculas</label>
                                </div>
                                <div id="opcionHelp" class="form-text text-danger">Debes seleccionar al menos una opción.</div>
                            </div>

                            <div class="d-grid">
                                <input type="submit" class="btn btn-success" value="Convertir">
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </section>

        <?php
        if (!empty($_GET)) {
            // Recogemos datos
            $texto = htmlspecialchars($_GET["texto"] ?? '');
            $checkMayus = isset($_GET["mayus"]);
            $checkMinus = isset($_GET["minus"]);

            if (empty($texto) || (!$checkMayus && !$checkMinus)) {
                echo "<div class='mt-4 alert alert-danger text-center'>Error: Faltan datos.</div>";
            } else {
                echo "<div class='mt-4 card card-body bg-light'>";
                echo "<h4 class='text-center'>Resultados</h4>";
                echo "<strong>Texto original: </strong> " . $texto . "<hr>";

                if ($checkMayus) {
                    echo "<p><strong>MAYÚSCULAS: </strong> " . strtoupper($texto) . "</p>";
                }
                if ($checkMinus) {
                    echo "<p><strong>minúsculas: </strong> " . strtolower($texto) . "</p>";
                }
                echo "</div>";
            }
        }
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <script>
        const formulario = document.getElementById("formTexto");

        // Listeners para limpiar errores
        document.getElementById('texto').addEventListener("input", () => limpiarError('textoHelp', 'texto'));

        // Pasamos el ID, pero el color solo afecta al input si queremos, aquí limpiamos el texto
        document.getElementById('chkMinus').addEventListener("change", () => limpiarError('opcionHelp', 'chkMayus'));
        document.getElementById('chkMayus').addEventListener("change", () => limpiarError('opcionHelp', 'chkMayus'));
        formulario.addEventListener("submit", function(event) {
            if (!validarFormulario()) {
                event.preventDefault();
            }
        });

        function validarFormulario() {
            let correcto = true;
            const texto = document.getElementById("texto").value.trim();
            const chkMayus = document.getElementById("chkMayus").checked;
            const chkMinus = document.getElementById("chkMinus").checked;

            // Validar texto vacío
            if (texto === "") {
                campoColorear("textoHelp", "texto");
                correcto = false;
            }

            // Validar que al menos uno esté marcado
            if (!chkMayus && !chkMinus) {
                document.getElementById("opcionHelp").style.visibility = "visible";
                correcto = false;
            } else {
                document.getElementById("opcionHelp").style.visibility = "hidden";
            }

            return correcto;
        }

        function campoColorear(idTexto, idInput) {
            document.getElementById(idTexto).style.visibility = "visible";
            document.getElementById(idInput).style.borderColor = "red";
        }

        function limpiarError(idTexto, idInput) {
            document.getElementById(idTexto).style.visibility = "hidden";
            // En el caso de los checkbox no pintamos borde, pero limpiamos el texto de error
            if (document.getElementById(idInput).type !== 'checkbox') {
                document.getElementById(idInput).style.borderColor = "#dee2e6";
            }
        }
    </script>
</body>

</html>