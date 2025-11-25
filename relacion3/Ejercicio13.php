<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13 - Manipulación de Strings</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!--ESTILOS CSS-->
    <style>
        .resultado-box {
            margin-bottom: 10px;
        }

        .hash-text {
            font-family: monospace;
            word-break: break-all;
            /* Para que los hashes largos no rompan el diseño */
        }
    </style>
</head>

<body class="bg-primary bg-gradient">

    <header class="bg-primary bg-gradient text-white text-center p-4 mb-4">
        <h1 class="fw-bold"> Ejercicio 13: Funciones de String en PHP</h1>
        <p>Análisis, Inversión y Hashing</p>
    </header>

    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="mb-3">
                                <label for="texto" class="form-label fw-bold">Introduce una cadena de texto:</label>
                                <input type="text" class="form-control form-control-lg" name="texto" id="texto"
                                    placeholder="Ej: Dábale arroz a la zorra el abad"
                                    value="<?php echo isset($_POST['texto']) ? htmlspecialchars($_POST['texto']) : ''; ?>" required>
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-dark" value="Procesar Cadena">
                            </div>
                        </form>
                    </div>
                </div>

                <?php
                // ===================================================================================
                // FUNCIONES PERSONALIZADAS
                // ===================================================================================

                /**
                 * mb_strrev
                 * Invierte un string respetando caracteres multibyte (tildes, emojis, etc).
                 * PHP no tiene una función nativa 'mb_strrev', así que la creamos.
                 */
                function mb_strrev($string)
                {
                    // 1. mb_str_split divide el string en caracteres reales (no bytes).
                    $caracteres = mb_str_split($string);

                    // 2. Invertimos el array de caracteres
                    $caracteresInvertidos = array_reverse($caracteres);

                    // 3. Unimos de nuevo en un string
                    return implode('', $caracteresInvertidos);
                }

                // ===================================================================================
                // LÓGICA PRINCIPAL
                // ===================================================================================

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    // Recogemos la entrada y quitamos espacios extra
                    $textoInput = trim($_POST['texto']);

                    if (!empty($textoInput)) {

                        echo ("<div class='alert alert-info mt-4 text-center'>");
                        echo ("<h4 class='mb-0 text-center'>Resultados del Análisis</h4>");
                        echo ('<div class="card-body">');


                        // -------------------------------------------------------
                        // 1. CADENA DEL REVÉS Y PALÍNDROMO (Básico)
                        // -------------------------------------------------------
                        // strrev: Invierte bytes. Funciona bien en inglés, pero mal con tildes (ej: 'á' son 2 bytes).
                        $textoReves = strrev($textoInput);

                        // Lógica Palíndromo (Básica):
                        // Quitamos espacios y ponemos todo en minúsculas para comparar.
                        $limpioOriginal = strtolower(str_replace(' ', '', $textoInput));
                        $limpioReves = strtolower(str_replace(' ', '', $textoReves));

                        $esPalindromo = ($limpioOriginal == $limpioReves) ? "<strong>SÍ</strong> es palíndroma." : "<strong>NO</strong> es palíndroma.";

                        echo "<div class='alert alert-primary shadow-sm result-box'>";
                        echo "<h5>1. Inversión y Palíndromo (función <code>strrev</code>)</h5>";
                        echo "Texto invertido: <strong>" . htmlspecialchars($textoReves) . "</strong><br>";
                        echo "Conclusión: $esPalindromo";
                        echo "</div>";

                        // -------------------------------------------------------
                        // 2. CADENA DEL REVÉS Y PALÍNDROMO CON TILDES (Avanzado)
                        // -------------------------------------------------------
                        // Usamos nuestra función personalizada mb_strrev
                        $textoRevesTildes = mb_strrev($textoInput);

                        // Lógica Palíndromo (Correcta para UTF-8):
                        // mb_strtolower maneja bien las mayúsculas con tilde (Á -> á).
                        $limpioOriginalConTildes = mb_strtolower(str_replace(' ', '', $textoInput));
                        $limpioRevesConTildes = mb_strtolower(str_replace(' ', '', $textoRevesTildes));

                        $esPalindromoConTildes = ($limpioOriginalConTildes == $limpioRevesConTildes) ? "<strong>SÍ</strong> es palíndroma." : "<strong>NO</strong> es palíndroma.";

                        echo "<div class='alert alert-secondary shadow-sm result-box'>";
                        echo "<h5>2. Inversión y Palíndromo (Correcto con tildes)</h5>";
                        echo "Texto invertido: <strong>" . htmlspecialchars($textoRevesTildes) . "</strong><br>";
                        echo "Conclusión: $esPalindromoConTildes";
                        echo "</div>";


                        // -------------------------------------------------------
                        // 3. PALABRAS EN ORDEN INVERSO
                        // -------------------------------------------------------
                        // Queremos invertir el orden de las palabras, no de las letras.
                        // "Hola Mundo" -> "Mundo Hola"
                        $palabrasArr = explode(" ", $textoInput); // Convertimos a array
                        $palabrasReves = implode(" ", array_reverse($palabrasArr)); // Invertimos array y unimos

                        echo "<div class='alert alert-light shadow-sm result-box'>";
                        echo "<h5>3. Orden de palabras invertido</h5>";
                        echo "Resultado: <strong>" . htmlspecialchars($palabrasReves) . "</strong>";
                        echo "</div>";


                        // -------------------------------------------------------
                        // 4. MAYÚSCULAS Y MINÚSCULAS
                        // -------------------------------------------------------
                        // mb_strtoupper / mb_strtolower son las versiones "multibyte" de strtoupper / strtolower.
                        // Usarlas asegura que las tildes también se transformen (ñ -> Ñ).
                        $mayus = mb_strtoupper($textoInput, 'UTF-8');
                        $minus = mb_strtolower($textoInput, 'UTF-8');

                        echo "<div class='alert alert-success shadow-sm result-box'>";
                        echo "<h5>4. Transformación de caja (<code>mb_strtoupper</code> / <code>mb_strtolower</code>)</h5>";
                        echo "Mayúsculas: <strong>" . htmlspecialchars($mayus) . "</strong><br>";
                        echo "Minúsculas: <strong>" . htmlspecialchars($minus) . "</strong>";
                        echo "</div>";


                        // -------------------------------------------------------
                        // 5. RECUENTO DE CARACTERES Y PALABRAS
                        // -------------------------------------------------------
                        // mb_strlen: cuenta caracteres reales.
                        // str_word_count: cuenta palabras.
                        $numCaracteres = mb_strlen($textoInput, 'UTF-8');
                        $numPalabras = str_word_count($textoInput);

                        echo "<div class='alert alert-warning shadow-sm result-box'>";
                        echo "<h5>5. Estadísticas</h5>";
                        echo "Número de caracteres (con espacios): <strong>$numCaracteres</strong><br>";
                        echo "Número de palabras: <strong>$numPalabras</strong>";
                        echo "</div>";


                        // -------------------------------------------------------
                        // 6. ENCRIPTACIÓN / HASHING
                        // -------------------------------------------------------
                        // Los hashes son unidireccionales: Texto -> Hash. No se puede volver atrás (Hash -> Texto).
                        // Se usan para guardar contraseñas de forma segura.

                        $hashMD5 = md5($textoInput); // MD5 (Ya no se considera seguro para passwords, pero sí para checksums)
                        $hashSHA1 = sha1($textoInput); // SHA1 (Tampoco es seguro para passwords hoy día)
                        $hashCrypt = crypt($textoInput, 'st'); // Crypt (Algoritmo antiguo)

                        echo "<div class='alert alert-dark shadow-sm result-box'>";
                        echo "<h5>6. Encriptación (Hashing)</h5>";
                        echo "<small>Estas funciones convierten el string en una huella digital única.</small><hr>";
                        echo "<div class='mb-2'><strong>MD5:</strong> <span class='hash-text'>$hashMD5</span></div>";
                        echo "<div class='mb-2'><strong>SHA1:</strong> <span class='hash-text'>$hashSHA1</span></div>";
                        echo "<div><strong>Crypt:</strong> <span class='hash-text'>$hashCrypt</span></div>";
                        echo "</div>";
                    }
                    echo ('</div></div>');
                }
                ?>

            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>