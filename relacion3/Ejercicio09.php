<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palabra más larga</title>
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
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 9: Buscador de Palabra Más Larga</u></h1>
    </header>

    <main class="container mt-5">
        <section class="row justify-content-center">
            <article class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-white text-center">
                        <h5>Analizador de Texto</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="formPalabra">

                            <div class="mb-3">
                                <label for="textoArea" class="form-label">Introduce tu texto o párrafo:</label>
                                <textarea class="form-control" name="texto" id="textoArea" rows="4" placeholder="Escribe aquí un texto con varias palabras..."></textarea>
                                <div id="textoHelp" class="form-text text-danger">Por favor, escribe algo antes de enviar.</div>
                            </div>

                            <div class="d-grid">
                                <input type="submit" class="btn btn-success" value="Analizar Texto">
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </section>

        <?php
        // ===================================================================================
        // LÓGICA PHP
        // ===================================================================================

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // 1. Recogemos y saneamos la entrada
            // trim() elimina espacios al principio y al final.
            $textoOriginal = isset($_POST['texto']) ? trim($_POST['texto']) : "";

            if (!empty($textoOriginal)) {

                // 2. Obtener las palabras del texto
                // str_word_count($string, $formato, $caracteres_extra)
                // - $formato 1: Devuelve un ARRAY con todas las palabras.
                // - $caracteres_extra: Le decimos qué caracteres consideramos parte de una palabra (tildes, ñ, números).
                //   Si no ponemos esto, 'camión' se dividiría en 'cami' y 'n'.
                $listaPalabras = str_word_count($textoOriginal, 1, 'áéíóúÁÉÍÓÚñÑüÜ1234567890');

                // Variables para guardar el récord
                $palabraMasLarga = "";
                $longitudMaxima = 0;
                $empate = []; // Array para guardar si hay varias palabras igual de largas

                // 3. Recorrer el array palabra por palabra
                foreach ($listaPalabras as $palabra) {

                    // IMPORTANTE: Usamos mb_strlen() en lugar de strlen().
                    // strlen() cuenta BYTES. Una 'ñ' ocupa 2 bytes.
                    // mb_strlen() cuenta CARACTERES reales (Multibyte String Length).
                    $longitudActual = mb_strlen($palabra, 'UTF-8');

                    // 4. Comprobar si es un nuevo récord
                    if ($longitudActual > $longitudMaxima) {
                        // ¡Nuevo récord!
                        $longitudMaxima = $longitudActual;
                        $palabraMasLarga = $palabra;
                        $empate = [$palabra]; // Reiniciamos la lista de empates con la nueva ganadora
                    } elseif ($longitudActual == $longitudMaxima) {
                        // ¡Empate! Es igual de larga que la actual ganadora.
                        $empate[] = $palabra; // La añadimos a la lista
                    }
                }

                // 5. Mostrar resultados
                echo "<div class='row justify-content-center mt-4'>";
                echo "<div class='col-md-8'>";
                echo "<div class='alert alert-info text-center shadow-sm'>";

                echo "<h4 class='alert-heading'>Resultados</h4>";
                echo "<hr>";
                echo "<p class='mb-1'><strong>Texto analizado:</strong> <em>" . htmlspecialchars($textoOriginal) . "</em></p>";

                if ($longitudMaxima > 0) {
                    echo "<h2 class='mt-3 text-success'>" . htmlspecialchars($palabraMasLarga) . "</h2>";
                    echo "<p>Con <strong>$longitudMaxima</strong> caracteres.</p>";

                    // Si hay más de una palabra con la misma longitud, las mostramos
                    // array_unique elimina duplicados (si escribiste "hola hola", solo sale una vez)
                    $unicas = array_unique($empate);
                    if (count($unicas) > 1) {
                        echo "<small class='text-muted'>Otras palabras con la misma longitud: " . implode(", ", $unicas) . "</small>";
                    }
                } else {
                    echo "<p class='text-warning'>No se encontraron palabras válidas.</p>";
                }

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
        const formulario = document.getElementById("formPalabra");
        const textoArea = document.getElementById("textoArea");
        const errorMsg = document.getElementById("textoHelp");

        // Quitar error al escribir
        textoArea.addEventListener("input", function() {
            if (this.value.trim() !== "") {
                errorMsg.style.visibility = "hidden";
                this.style.borderColor = "#dee2e6";
            }
        });

        formulario.addEventListener("submit", function(event) {
            if (textoArea.value.trim() === "") {
                event.preventDefault(); // Evita el envío
                errorMsg.style.visibility = "visible";
                textoArea.style.borderColor = "red";
            }
        });
    </script>
</body>

</html>