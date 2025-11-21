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
        <h1 class="fw-bold"> Ejercicio 12: Funciones de String en PHP</h1>
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
                // --- FUNCIÓN PERSONALIZADA PARA INVERTIR CON TILDES ---
                function mb_strrev($string)
                {
                    // 1. mb_str_split divide el string en caracteres, no bytes (PHP 7.4+)
                    // Si usas una versión vieja de PHP, usa: preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);
                    $caracteres = mb_str_split($string);

                    // 2. Invertimos el array
                    $caracteresInvertidos = array_reverse($caracteres);

                    // 3. Unimos de nuevo
                    return implode('', $caracteresInvertidos);
                }
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    // Recogemos la entrada (htmlspecialchars convierte caracteres especiales en entidades HTML por seguridad)
                    // Usamos trim para quitar espacios sobrantes al inicio y final
                    $textoInput = trim($_POST['texto']);

                    if (!empty($textoInput)) {

                        echo ("<div class='alert alert-info mt-4 text-center'>");
                        echo ("<h4 class='mb-0 text-center'>Resultados del Análisis</h4>");
                        echo ('<div class="card-body">');


                        // -------------------------------------------------------
                        // 1. CADENA DEL REVÉS Y PALÍNDROMO
                        // -------------------------------------------------------
                        // strrev: Invierte un string byte a byte (ojo con tildes, para español perfecto se requiere mb logic, pero usamos la estándar)
                        $textoReves = strrev($textoInput);

                        // Lógica Palíndromo: 
                        // Quitamos espacios y ponemos todo en minusculas para comparar
                        $limpioOriginal = strtolower(str_replace(' ', '', $textoInput));
                        $limpioReves = strtolower(str_replace(' ', '', $textoReves));

                        // NOTA: strrev básico puede fallar con tildes (UTF-8). Para ejercicios básicos se acepta.
                        // Una comparación laxa para palíndromos simples:
                        $esPalindromo = ($limpioOriginal == $limpioReves) ? "<strong>SÍ</strong> es palíndroma." : "<strong>NO</strong> es palíndroma.";

                        echo "<div class='alert alert-primary shadow-sm result-box'>";
                        echo "<h5>1. Inversión y Palíndromo (función <code>strrev</code>)</h5>";
                        echo "Texto invertido: <strong>" . htmlspecialchars($textoReves) . "</strong><br>";
                        echo "Conclusión: $esPalindromo";
                        echo "</div>";

                        // -------------------------------------------------------
                        // 2. CADENA DEL REVÉS Y PALÍNDROMO CON TILDES
                        // -------------------------------------------------------

                        $textoRevesTildes = mb_strrev($textoInput);

                        // Lógica Palíndromo (Mejorada para UTF-8)
                        // mb_strtolower para bajar mayúsculas con tildes correctamente
                        $limpioOriginalConTildes = mb_strtolower(str_replace(' ', '', $textoInput));
                        $limpioRevesConTildes = mb_strtolower(str_replace(' ', '', $textoRevesTildes));

                        $esPalindromoConTildes = ($limpioOriginalConTildes == $limpioRevesConTildes) ? "<strong>SÍ</strong> es palíndroma." : "<strong>NO</strong> es palíndroma.";

                        echo "<div class='alert alert-secondary shadow-sm result-box'>";
                        echo "<h5>2. Inversión y Palíndromo (Correcto con tildes)</h5>";
                        echo "Texto invertido: <strong>" . htmlspecialchars($textoRevesTildes) . "</strong><br>";
                        echo "Conclusión: $esPalindromo";
                        echo "</div>";


                        // -------------------------------------------------------
                        // 3. PALABRAS EN ORDEN INVERSO
                        // -------------------------------------------------------
                        // No hay función nativa directa, combinamos explode + array_reverse + implode
                        $palabrasArr = explode(" ", $textoInput);
                        $palabrasReves = implode(" ", array_reverse($palabrasArr));

                        echo "<div class='alert alert-light shadow-sm result-box'>";
                        echo "<h5>3. Orden de palabras invertido</h5>";
                        echo "Resultado: <strong>" . htmlspecialchars($palabrasReves) . "</strong>";
                        echo "</div>";


                        // -------------------------------------------------------
                        // 4. MAYÚSCULAS Y MINÚSCULAS
                        // -------------------------------------------------------
                        // Usamos mb_strtoupper/mb_strtolower si están disponibles para respetar tildes (UTF-8), 
                        // si no, usamos las clásicas strtoupper/strtolower.
                        $mayus = mb_strtoupper($textoInput, 'UTF-8');
                        $minus = mb_strtolower($textoInput, 'UTF-8');

                        echo "<div class='alert alert-success shadow-sm result-box'>";
                        echo "<h5>4. Transformación de caja (<code>strtoupper</code> / <code>strtolower</code>)</h5>";
                        echo "Mayúsculas: <strong>" . htmlspecialchars($mayus) . "</strong><br>";
                        echo "Minúsculas: <strong>" . htmlspecialchars($minus) . "</strong>";
                        echo "</div>";


                        // -------------------------------------------------------
                        // 5. RECUENTO DE CARACTERES Y PALABRAS
                        // -------------------------------------------------------
                        // strlen: cuenta bytes. mb_strlen: cuenta caracteres (mejor para español).
                        // str_word_count: cuenta palabras.
                        $numCaracteres = mb_strlen($textoInput, 'UTF-8'); // Usamos mb_ para contar bien la 'ñ'
                        $numPalabras = str_word_count($textoInput);
                        // Nota: str_word_count a veces falla con tildes si no se configura el locale, 
                        // pero para el ejercicio estándar es la función solicitada.

                        echo "<div class='alert alert-warning shadow-sm result-box'>";
                        echo "<h5>5. Estadísticas (<code>strlen</code> y <code>str_word_count</code>)</h5>";
                        echo "Número de caracteres (con espacios): <strong>$numCaracteres</strong><br>";
                        echo "Número de palabras: <strong>$numPalabras</strong>";
                        echo "</div>";


                        // -------------------------------------------------------
                        // 6. ENCRIPTACIÓN / HASHING
                        // -------------------------------------------------------
                        // md5 y sha1 son algoritmos de hash (no reversibles).
                        // crypt es un algoritmo de hash antiguo (tipo DES por defecto).

                        $hashMD5 = md5($textoInput);
                        $hashSHA1 = sha1($textoInput);
                        $hashCrypt = crypt($textoInput, 'st'); // 'st' es la "salt" (semilla) estática para el ejemplo

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