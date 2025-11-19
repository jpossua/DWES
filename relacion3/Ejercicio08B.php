<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8B - Radio Buttons</title>
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
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 8B (Disyunción)</u></h1>
    </header>

    <main class="container mt-5">
        <section class="row justify-content-center">
            <article class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white text-center">
                        <h5>Conversor de Texto (Único)</h5>
                    </div>
                    <div class="card-body">
                        <form action='<?php echo ($_SERVER["PHP_SELF"]) ?>' method="get" id="formTextoRadio">

                            <div class="mb-3">
                                <label for="texto" class="form-label">Introduce un texto:</label>
                                <input class="form-control" type="text" name="texto" id="texto" placeholder="Escribe algo aquí...">
                                <div id="textoHelp" class="form-text text-danger">El texto no puede estar vacío.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Elige una transformación:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="conversion" value="mayus" id="radioMayus">
                                    <label class="form-check-label" for="radioMayus">Convertir a Mayúsculas</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="conversion" value="minus" id="radioMinus">
                                    <label class="form-check-label" for="radioMinus">Convertir a Minúsculas</label>
                                </div>
                                <div id="radioHelp" class="form-text text-danger">Debes seleccionar una de las opciones.</div>
                            </div>

                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Procesar">
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </section>

        <?php
        if (!empty($_GET)) {
            $texto = htmlspecialchars($_GET["texto"] ?? '');
            // En radios, solo llega una variable con el valor seleccionado
            $conversion = $_GET["conversion"] ?? null;

            if (empty($texto) || !$conversion) {
                echo "<div class='mt-4 alert alert-danger text-center'>Error: Datos incompletos.</div>";
            } else {
                echo "<div class='mt-4 card card-body bg-light'>";
                echo "<h4 class='text-center'>Resultado</h4>";
                echo "<strong>Original: </strong> " . $texto . "<br><br>";

                if ($conversion === "mayus") {
                    echo "<div class='alert alert-success'><strong>MAYÚSCULAS:</strong> " . strtoupper($texto) . "</div>";
                } elseif ($conversion === "minus") {
                    echo "<div class='alert alert-info'><strong>minúsculas:</strong> " . strtolower($texto) . "</div>";
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
        const formulario = document.getElementById("formTextoRadio");

        // Listeners
        document.getElementById('texto').addEventListener("input", () => limpiarError('textoHelp', 'texto'));

        // Listener para los radios (quitamos el error al clicar cualquiera de los dos)
        document.querySelectorAll('input[name="conversion"]').forEach((elem) => {
            elem.addEventListener("change", function() {
                document.getElementById("radioHelp").style.visibility = "hidden";
            });
        });

        formulario.addEventListener("submit", function(event) {
            if (!validarFormulario()) {
                event.preventDefault();
            }
        });

        function validarFormulario() {
            let correcto = true;
            const texto = document.getElementById("texto").value.trim();

            // Validar texto
            if (texto === "") {
                campoColorear("textoHelp", "texto");
                correcto = false;
            }

            // Validar Radios (verificar si alguno está checked)
            // querySelector devuelve el primer elemento checkeado, si es null es que no hay ninguno
            const opcionSeleccionada = document.querySelector('input[name="conversion"]:checked');

            if (!opcionSeleccionada) {
                document.getElementById("radioHelp").style.visibility = "visible";
                correcto = false;
            }

            return correcto;
        }

        function campoColorear(idTexto, idInput) {
            document.getElementById(idTexto).style.visibility = "visible";
            document.getElementById(idInput).style.borderColor = "red";
        }

        function limpiarError(idTexto, idInput) {
            document.getElementById(idTexto).style.visibility = "hidden";
            document.getElementById(idInput).style.borderColor = "#dee2e6";
        }
    </script>
</body>

</html>