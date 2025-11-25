<?php
// =======================================================================================
// EJERCICIO 03: JUEGO DE ADIVINAR EL NÚMERO (SIN SESIONES)
// =======================================================================================
// En este ejercicio, el servidor "recuerda" el número secreto enviándolo de vuelta
// al cliente en un campo oculto (input type="hidden").
// Esto es una forma primitiva de mantener el estado sin usar sesiones ni cookies.

// 1. LÓGICA PARA OBTENER O GENERAR EL NÚMERO SECRETO
// --------------------------------------------------
// Si el formulario ya se ha enviado, el número secreto viene en $_GET['numeroSecreto'].
// Si es la primera vez que entramos, generamos uno nuevo aleatorio.

if (isset($_GET['numeroSecreto'])) {
    // Recuperamos el número que le enviamos al usuario la última vez
    $numeroSecreto = intval($_GET['numeroSecreto']);
} else {
    // Primera visita: Generamos un número aleatorio del 1 al 100
    $numeroSecreto = rand(1, 100);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 4 - Ejercicio 03</title>
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
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 03</u></h1>
    </header>

    <main class="container mt-5">

        <section class="row justify-content-center">
            <article class="col-md-6">
                <div class="card p-4 shadow text-center bg-info-subtle">

                    <!-- FORMULARIO -->
                    <!-- Usamos GET para ver los parámetros en la URL (aunque POST sería más limpio) -->
                    <form id="form" method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="mb-3">
                            <label for="numero" class="form-label fw-bold">Escribe un número del 1 al 100</label><br>
                            <input type="number" id="numero" name="numero" class="form-control d-inline-block w-50" required>

                            <!-- CAMPO OCULTO (HIDDEN) -->
                            <!-- Aquí está el truco: guardamos el número secreto en el HTML -->
                            <!-- Cuando el usuario envíe el formulario, este valor viajará de vuelta al servidor -->
                            <input type="hidden" name="numeroSecreto" value="<?php echo $numeroSecreto; ?>">

                            <div id="numeroHelp" class="form-text text-danger">
                                Introduce un número del 1 al 100.
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success" name="enviar">Enviar</button>
                        </div>
                    </form>

                    <?php
                    // 2. PROCESAMIENTO DEL INTENTO DEL USUARIO
                    // ----------------------------------------
                    if (isset($_GET['numero'])) {
                        $numeroUser = intval($_GET["numero"]);

                        // Validación básica
                        if ($numeroUser <= 0 || $numeroUser >= 101) {
                            echo "<div class='container mt-4'><div class='alert alert-danger text-center'>";
                            echo "Error: Los números deben estar entre el 1 al 100.";
                            echo "</div></div>";
                        } else {
                            // Lógica del juego: Comparar número usuario vs secreto
                            if ($numeroSecreto == $numeroUser) {
                                echo "<div class='alert alert-info mt-4 text-center'>";
                                echo "<strong>¡Enhorabuena has acertado el número!</strong>";

                                // Para jugar de nuevo, simplemente enlazamos a la página SIN parámetros.
                                // Esto hará que el script genere un nuevo número aleatorio al inicio.
                                echo "<br><a href='Ejercicio03.php' class='btn btn-primary mt-2'>Jugar de nuevo</a>";
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
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <!-- Validación Cliente (JS) -->
    <script>
        const formulario = document.getElementById("form");
        const inputElement = document.getElementById("numero");
        const helpElement = document.getElementById("numeroHelp");

        document.getElementById('form').addEventListener("submit", function(event) {
            if (!validarNumero()) {
                event.preventDefault(); // Parar el submit si no es válido
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