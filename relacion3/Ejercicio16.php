<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16 - Callbacks y Arrays</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!--ESTILOS CSS-->
    <style>
        .array-output {
            font-family: 'Courier New', Courier, monospace;
            font-size: 0.9em;
            max-height: 100px;
            overflow-y: auto;
            background: rgba(255, 255, 255, 0.5);
            padding: 5px;
            border-radius: 4px;
        }
    </style>
</head>

<body class="bg-primary bg-gradient vh-100">

    <header class="bg-dark bg-gradient text-white text-center p-4 mb-4">
        <h1 class="fw-bold">Funciones Callback en Arrays</h1>
        <p>array_map, array_filter, array_walk, y las nuevas de PHP 8.4</p>
    </header>

    <main class="container">

        <?php
        // =================================================================
        // 0. POLYFILLS [es un trozo de código que define una función 
        // si esta no existe nativamente en tu versión de PHP.]
        // (Para compatibilidad con PHP < 8.4)
        // =================================================================

        if (!function_exists('array_all')) {
            function array_all(array $array, callable $callback): bool
            {
                foreach ($array as $key => $value) {
                    if (!$callback($value, $key)) return false;
                }
                return true;
            }
        }

        if (!function_exists('array_any')) {
            function array_any(array $array, callable $callback): bool
            {
                foreach ($array as $key => $value) {
                    if ($callback($value, $key)) return true;
                }
                return false;
            }
        }

        if (!function_exists('array_find')) {
            function array_find(array $array, callable $callback)
            {
                foreach ($array as $key => $value) {
                    if ($callback($value, $key)) return $value;
                }
                return null;
            }
        }

        // =================================================================
        // 1. PREPARACIÓN DE DATOS
        // =================================================================

        // Creamos un array del 1 al 100 con range()
        $numeros = range(1, 100);

        // Función auxiliar para imprimir arrays largos de forma bonita
        function mostrarArrayCorto($arr)
        {
            $texto = implode(', ', $arr);
            if (strlen($texto) > 100) {
                return substr($texto, 0, 100) . "... (y más)";
            }
            return $texto;
        }

        echo "<div class='alert alert-secondary shadow-sm'>";
        echo "<h5>0. Array Original (generado con <code>range(1, 100)</code>)</h5>";
        echo "<div class='array-output'>" . mostrarArrayCorto($numeros) . "</div>";
        echo "</div>";


        // =================================================================
        // 2. EJECUCIÓN DE FUNCIONES CON CALLBACKS
        // =================================================================

        // --- A. ARRAY_ALL (Todos cumplen la condición?) ---
        // Callback: fn($n) => $n > 0
        $todosPositivos = array_all($numeros, fn($n) => $n > 0);


        // --- B. ARRAY_ANY (Alguno cumple la condición?) ---
        // Callback: fn($n) => $n % 5 === 0
        $algunMultiplo5 = array_any($numeros, fn($n) => $n % 5 === 0);


        // --- C. ARRAY_FILTER (Extraer Primos) ---
        // Callback: Definimos una arrow function un poco más compleja o llamamos a una externa.
        // Para ser una Arrow Function pura en una línea, la lógica de primo es compleja.
        // Usaremos una variable Closure para mayor claridad.
        $esPrimo = function ($n) {
            if ($n <= 1) return false;
            for ($i = 2; $i <= sqrt($n); $i++) {
                if ($n % $i == 0) return false;
            }
            return true;
        };
        // array_filter(array, callback)
        $primos = array_filter($numeros, $esPrimo);


        // --- D. ARRAY_FIND (Primera ocurrencia de dos cifras idénticas) ---
        // Ej: 11, 22, 33. Buscamos el primero.
        // Callback: fn($n) => condición
        /**
         * El problema es el orden en que PHP ejecuta las cosas:
         * La variable $n es un número (ej: 11).
         * PHP intenta ejecutar $n[0] ANTES de convertirlo a string.
         * Como $n es un número entero (int), PHP te dice: 
         * "Oye, no puedes pedirme la posición 0 de un número matemático,
         *  eso solo se hace con textos o arrays".
         */
        // $dobleCifra = array_find($numeros, fn($n) => $n > 9 && (string)$n[0] === (string)$n[1]);

        // Opción A: Usando strval() que es más limpio
        $dobleCifra = array_find($numeros, fn($n) => $n > 9 && strval($n)[0] === strval($n)[1]);
        // Opción B: Paréntesis para forzar la conversión primero
        // $dobleCifra = array_find($numeros, fn($n) => $n > 9 && ((string)$n)[0] === ((string)$n)[1]);


        // --- E. ARRAY_MAP (Transformar: Elevar al cuadrado) ---
        // OJO: array_map devuelve un NUEVO array.
        // Callback: fn($n) => $n ** 2
        $cuadrados = array_map(fn($n) => $n ** 2, $numeros);


        // --- F. ARRAY_WALK (Modificar in-situ: Doblar valor) ---
        // OJO: array_walk devuelve booleano, modifica el array ORIGINAL por referencia (&$valor).
        // Callback: fn(&$n) => $n *= 2
        $numerosDoblados = $numeros; // Hacemos copia para no perder el original de visualización 0
        array_walk($numerosDoblados, fn(&$n) => $n *= 2);


        // =================================================================
        // 3. VISUALIZACIÓN CON BOOTSTRAP
        // =================================================================
        ?>

        <div class="row">

            <div class="col-md-6">
                <div class="alert alert-primary shadow-sm">
                    <h5>1. array_all <small>(¿Todos positivos?)</small></h5>
                    <hr>
                    <strong>Resultado:</strong>
                    <?php echo $todosPositivos ? "SÍ (True)" : "NO (False)"; ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="alert alert-success shadow-sm">
                    <h5>2. array_any <small>(¿Algún múltiplo de 5?)</small></h5>
                    <hr>
                    <strong>Resultado:</strong>
                    <?php echo $algunMultiplo5 ? "SÍ (True)" : "NO (False)"; ?>
                </div>
            </div>

            <div class="col-md-12">
                <div class="alert alert-warning shadow-sm">
                    <h5>3. array_filter <small>(Números Primos)</small></h5>
                    <hr>
                    <div class="array-output">
                        <?php echo implode(', ', $primos); ?>
                    </div>
                    <small class="text-muted">Total encontrados: <?php echo count($primos); ?></small>
                </div>
            </div>

            <div class="col-md-6">
                <div class="alert alert-info shadow-sm">
                    <h5>4. array_find <small>(Primer número cifras idénticas)</small></h5>
                    <hr>
                    <strong>Resultado:</strong>
                    <span class="display-6"><?php echo $dobleCifra; ?></span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="alert alert-danger shadow-sm">
                    <h5>5. array_map <small>(Cuadrados - Muestra parcial)</small></h5>
                    <hr>
                    <div class="array-output">
                        <?php echo mostrarArrayCorto($cuadrados); ?>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="alert alert-dark shadow-sm">
                    <h5>6. array_walk <small>(Doble valor - Modificación por referencia)</small></h5>
                    <hr>
                    <p><em>array_walk ha modificado el array original directamente.</em></p>
                    <div class="array-output">
                        <?php echo mostrarArrayCorto($numerosDoblados); ?>
                    </div>
                </div>
            </div>

        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>