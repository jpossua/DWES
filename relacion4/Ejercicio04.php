<?php
// =======================================================================================
// EJERCICIO 04: JUEGO DE ADIVINAR EL NÚMERO (CON SESIONES)
// =======================================================================================
// A diferencia del ejercicio anterior, aquí usamos SESIONES ($_SESSION).
// Las sesiones permiten guardar datos en el SERVIDOR que persisten entre diferentes
// cargas de página del mismo usuario. Es mucho más seguro y limpio que usar campos ocultos.

// 1. INICIAR SESIÓN
// -----------------
// session_start() debe ser siempre lo PRIMERO antes de cualquier HTML o echo.
// Si no iniciamos sesión, no podemos acceder a $_SESSION.
session_start();

// 2. LÓGICA DE REINICIO
// ---------------------
// Si el usuario ha pulsado el botón "Jugar de nuevo" (name="reiniciar")...
if (isset($_POST['reiniciar'])) {
    // Borramos la variable específica del número
    unset($_SESSION['numeroRandom']);

    // Opcional: Destruimos toda la sesión para empezar de cero absoluto
    session_destroy();

    // Volvemos a iniciar sesión para generar un nuevo número inmediatamente
    session_start();
}

// 3. GENERAR NÚMERO SECRETO (Si no existe)
// ----------------------------------------
// Comprobamos si ya tenemos un número guardado en la sesión.
// Si NO existe (!isset), significa que es una partida nueva.
if (!isset($_SESSION['numeroRandom'])) {
    $_SESSION['numeroRandom'] = rand(1, 100);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 4 - Ejercicio 04</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        .form-text {
            visibility: hidden;
        }
    </style>
</head>

<body class="bg-primary bg-gradient min-vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 04</u></h1>
    </header>

    <main class="container mt-5">

        <section class="row justify-content-center">
            <article class="col-md-6">
                <div class="card p-4 shadow text-center bg-info-subtle">

                    <!-- FORMULARIO DE JUEGO -->
                    <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="mb-3">
                            <label for="numero" class="form-label fw-bold">Escribe un número del 1 al 100</label><br>
                            <input type="number" id="numero" name="numero" class="form-control d-inline-block w-50" required>
                            <div id="numeroHelp" class="form-text text-danger">
                                Introduce un número del 1 al 100.
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success" name="enviar">Enviar</button>
                        </div>
                    </form>

                    <?php
                    // 4. PROCESAMIENTO DEL INTENTO
                    // ----------------------------
                    if (!empty($_POST) && isset($_POST['numero'])) {
                        $numeroUser = intval($_POST["numero"]);

                        // Recuperamos el número secreto de la SESIÓN
                        $numeroSecreto = $_SESSION['numeroRandom'];

                        // Validación básica
                        if ($numeroUser <= 0 || $numeroUser >= 101) {
                            echo "<div class='container mt-4'><div class='alert alert-danger text-center'>";
                            echo "Error: Los números deben estar entre el 1 al 100.";
                            echo "</div></div>";
                        } else {
                            // Comparación
                            if ($numeroSecreto == $numeroUser) {
                                echo "<div class='alert alert-info mt-4 text-center'>";
                                echo "<strong>¡Enhorabuena has acertado el número!</strong>";

                                // Botón para reiniciar la partida
                                // Este formulario envía un POST con name="reiniciar" que capturamos arriba del todo
                                echo '<form method="post" class="mt-3">';
                                echo '<button type="submit" name="reiniciar" class="btn btn-primary">Jugar de nuevo</button>';
                                echo '</form>';
                                echo "</div>";
                            } else {
                                // Pistas
                                if ($numeroSecreto < $numeroUser) {
                                    echo "<div class='alert alert-danger mt-4 text-center'>";
                                    echo "El número secreto es más <strong>pequeño</strong> ↓";
                                    echo "</div>";
                                } else {
                                    echo "<div class='alert alert-danger mt-4 text-center'>";
                                    echo "El número secreto es más <strong>grande</strong> ↑";
                                    echo "</div>";
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </article>
        </section>

        <!-- EXPLICACIÓN TEÓRICA -->
        <section class="row justify-content-center mt-5">
            <article class="col-md-8">
                <div class="card p-4 shadow bg-light">
                    <h3>¿Por qué usar Sesiones?</h3>
                    <p><strong>¿Cuál crees que es la forma más acertada de haber resuelto este problema? ¿Por qué?</strong></p>
                    <p>
                        La forma más acertada es utilizando <strong>sesiones</strong> (como en este ejercicio).
                    </p>
                    <ul>
                        <li><strong>Seguridad:</strong> Las variables de sesión se almacenan en el servidor. El usuario
                            no puede verlas ni modificarlas fácilmente, a diferencia de los campos <code>hidden</code>
                            que pueden ser inspeccionados y alterados con "Inspeccionar Elemento" en el navegador.</li>
                        <li><strong>Integridad:</strong> Evita que el usuario manipule el número secreto para "ganar"
                            haciendo trampas.</li>
                        <li><strong>Persistencia:</strong> Los datos se mantienen mientras el usuario navega por la web,
                            sin necesidad de re-enviarlos en cada formulario.</li>
                    </ul>
                </div>
            </article>
        </section>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <script>
        const formulario = document.getElementById("form");
        const inputElement = document.getElementById("numero");
        const helpElement = document.getElementById("numeroHelp");

        document.getElementById('form').addEventListener("submit", function(event) {
            if (!validarNumero()) {
                event.preventDefault();
            }
        });

        inputElement.addEventListener("input", () => {
            helpElement.style.visibility = "hidden";
            inputElement.style.borderColor = "#dee2e6";
        });

        function validarNumero() {
            let valor = parseInt(inputElement.value);
            let esValido = true;
            if (isNaN(valor) || valor <= 0 || valor >= 101) {
                helpElement.style.visibility = "visible";
                inputElement.style.borderColor = "red";
                esValido = false;
            }
            return esValido;
        }
    </script>
</body>

</html>