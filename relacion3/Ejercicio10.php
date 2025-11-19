<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10 - Invertir Palabras</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    
    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!--ESTILOS CSS-->
    <style>
        /* Ocultamos los mensajes de error por defecto */
        .form-text.text-danger {
            visibility: hidden;
        }
    </style>
</head>

<body class="bg-primary bg-gradient vh-100">

    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 10</u></h1>
    </header>

    <main class="container mt-5">
        <section class="row justify-content-center">
            <article class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-white text-center">
                        <h5>Inversor de Orden de Palabras</h5>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="formInverso">
                            <div class="mb-3">
                                <label for="frase" class="form-label">Introduce una frase:</label>
                                <input type="text"
                                    class="form-control"
                                    name="frase"
                                    id="frase"
                                    placeholder="Ej: La casa es azul"
                                    value="<?php echo isset($_POST['frase']) ? htmlspecialchars($_POST['frase']) : ''; ?>">

                                <div id="fraseHelp" class="form-text text-danger">
                                    Por favor, introduce una frase con al menos una palabra.
                                </div>
                            </div>

                            <div class="d-grid">
                                <input type="submit" class="btn btn-success fw-bold" value="Invertir Palabras">
                            </div>
                        </form>

                    </div>
                </div>
            </article>
        </section>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // 1. Recogemos la frase y limpiamos espacios al principio/final
            $fraseOriginal = trim($_POST['frase']);

            if (!empty($fraseOriginal)) {

                /* LÓGICA DE INVERSIÓN:
                   1. explode: Convierte el string en array separando por espacios (' ').
                   2. array_filter: (Opcional) Elimina elementos vacíos si hubo múltiples espacios seguidos.
                   3. array_reverse: Da la vuelta al array.
                   4. implode: Une el array de nuevo en un string.
                */

                // Separamos por espacios
                $palabras = explode(' ', $fraseOriginal);

                // Filtramos para quitar espacios vacíos (por si el usuario puso "hola    mundo")
                $palabras = array_filter($palabras);

                // Invertimos el array
                $palabrasInvertidas = array_reverse($palabras);

                // Unimos de nuevo
                $fraseInvertida = implode(' ', $palabrasInvertidas);

                // MOSTRAR RESULTADO
                echo "<div class='row justify-content-center mt-4'>";
                echo "<div class='col-md-8'>";
                echo "<div class='alert alert-dark text-center shadow-sm'>";
                echo "<h4 class='alert-heading'>Resultado:</h4>";
                echo "<hr>";
                echo "<p class='mb-1 text-muted'>Original:</p>";
                echo "<p><em>" . htmlspecialchars($fraseOriginal) . "</em></p>";
                echo "<p class='mb-1 text-muted'>Invertida:</p>";
                echo "<h2 class='text-info-emphasis'>" . htmlspecialchars($fraseInvertida) . "</h2>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        }
        ?>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <script>
        const formulario = document.getElementById("formInverso");
        const inputFrase = document.getElementById("frase");
        const msgError = document.getElementById("fraseHelp");

        // Validar al enviar
        formulario.addEventListener("submit", function(event) {
            if (inputFrase.value.trim() === "") {
                event.preventDefault(); // Parar envío
                mostrarError(true);
            }
        });

        // Limpiar error al escribir
        inputFrase.addEventListener("input", function() {
            if (this.value.trim() !== "") {
                mostrarError(false);
            }
        });

        function mostrarError(mostrar) {
            if (mostrar) {
                msgError.style.visibility = "visible";
                inputFrase.classList.add("border-danger"); // Añade borde rojo de Bootstrap
            } else {
                msgError.style.visibility = "hidden";
                inputFrase.classList.remove("border-danger");
            }
        }
    </script>
</body>

</html>