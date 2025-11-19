<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 17 - Master de Arrays</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!--ESTILOS CSS-->
    <style>
        .array-box {
            background-color: #f8f9fa;
            border-left: 4px solid #0d6efd;
            padding: 10px;
            font-family: monospace;
            margin-bottom: 10px;
            word-wrap: break-word;
        }

        .label-func {
            font-weight: bold;
            color: #d63384;
            /* Color rosado para destacar nombres de funciones */
        }
    </style>
</head>

<body class="bg-primary bg-gradient">

    <header class="bg-dark bg-gradient text-white text-center p-4 mb-4">
        <h1 class="fw-bold">Ejercicio 17: Funciones Avanzadas de Array</h1>
        <p>Investigación y Práctica (Range, Intersect, Walk, Map...)</p>
    </header>

    <main class="container pb-5">

        <?php
        // =================================================================
        // 0. POLYFILLS (Compatibilidad para PHP < 8.4)
        // =================================================================

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
        // 1. CREACIÓN DE ARRAYS (Función range)
        // =================================================================

        // a) Números impares entre 1 y 20. 
        // range(inicio, fin, paso). Paso 2 empezando en 1 genera impares.
        $impares = range(1, 20, 2);

        // b) Múltiplos de 3 entre 1 y 40.
        // Paso 3 empezando en 3.
        $multiplosDeTres = range(3, 40, 3);

        // Función auxiliar para imprimir bonito
        function printArr($arr)
        {
            return '[' . implode(', ', $arr) . ']';
        }
        ?>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-header bg-primary text-white fw-bold">Array 1: Impares (1-20)</div>
                    <div class="card-body">
                        <div class="array-box"><?php echo printArr($impares); ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-header bg-success text-white fw-bold">Array 2: Múltiplos de 3 (1-40)</div>
                    <div class="card-body">
                        <div class="array-box"><?php echo printArr($multiplosDeTres); ?></div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // =================================================================
        // 2. OPERACIONES SOLICITADAS
        // =================================================================

        // 1. COUNT: Contar elementos
        $totalImpares = count($impares);
        $totalMultiplos = count($multiplosDeTres);

        // 2. ARRAY_ANY: ¿Hay algún múltiplo de 5?
        // Comprobamos en ambos arrays
        $hayMultiplo5_Impares = array_any($impares, fn($n) => $n % 5 === 0);
        $hayMultiplo5_Mult3   = array_any($multiplosDeTres, fn($n) => $n % 5 === 0);

        // 3. ARRAY_FILTER: Extraer Primos
        // Definimos la lógica de primo en variable para reutilizar
        $esPrimo = function ($n) {
            if ($n < 2) return false;
            for ($i = 2; $i <= sqrt($n); $i++) {
                if ($n % $i == 0) return false;
            }
            return true;
        };
        // Aplicamos filtro a los Impares (por ejemplo)
        $primosImpares = array_filter($impares, $esPrimo);
        // Reindexamos con array_values para que las claves sean 0, 1, 2... (opcional pero recomendado)
        $primosImpares = array_values($primosImpares);

        // 4. ARRAY_FIND: Primera ocurrencia de dos cifras idénticas (Ej: 11, 22, 33)
        // IMPORTANTE: Convertimos a string (strval) antes de acceder al índice para evitar el Warning
        $callbackDobles = fn($n) => $n > 9 && strval($n)[0] === strval($n)[1];

        $dobleImpares = array_find($impares, $callbackDobles);
        $dobleMult3   = array_find($multiplosDeTres, $callbackDobles);

        // 5. ARRAY_MAP: Cuadrado de cada valor
        // Lo aplicaremos a los Impares. Devuelve un array nuevo.
        $cuadradosImpares = array_map(fn($n) => $n ** 2, $impares);

        // 6. ARRAY_INTERSECT: Valores que están en AMBOS arrays
        // Compara valores y devuelve los que coinciden.
        $comunes = array_intersect($impares, $multiplosDeTres);

        // 7. ARRAY_WALK: Sustituir valor por su doble
        // array_walk modifica el array ORIGINAL por referencia.
        // Hacemos una COPIA primero para no perder los datos originales si quisiéramos usarlos luego.
        $imparesDoblados = $impares;
        array_walk($imparesDoblados, fn(&$n) => $n *= 2);

        ?>

        <div class="row g-3">

            <div class="col-md-4">
                <div class="alert alert-primary shadow-sm h-100">
                    <span class="label-func">count()</span><br>
                    Impares tiene: <strong><?php echo $totalImpares; ?></strong> elementos.<br>
                    Mult.3 tiene: <strong><?php echo $totalMultiplos; ?></strong> elementos.
                </div>
            </div>

            <div class="col-md-4">
                <div class="alert alert-secondary shadow-sm h-100">
                    <span class="label-func">array_any()</span> (Múltiplos de 5)<br>
                    ¿En Impares? <strong><?php echo $hayMultiplo5_Impares ? 'SÍ' : 'NO'; ?></strong><br>
                    ¿En Mult.3? <strong><?php echo $hayMultiplo5_Mult3 ? 'SÍ' : 'NO'; ?></strong>
                </div>
            </div>

            <div class="col-md-4">
                <div class="alert alert-info shadow-sm h-100">
                    <span class="label-func">array_find()</span> (Cifras idénticas)<br>
                    En Impares: <strong><?php echo $dobleImpares ?? 'Ninguno'; ?></strong><br>
                    En Mult.3: <strong><?php echo $dobleMult3 ?? 'Ninguno'; ?></strong>
                </div>
            </div>

            <div class="col-md-12">
                <div class="alert alert-dark shadow-sm">
                    <h5 class="label-func">array_intersect()</h5>
                    <p class="mb-1">Valores presentes en ambos arrays originales (Impares y Múltiplos de 3):</p>
                    <div class="array-box bg-white border-dark">
                        <?php echo empty($comunes) ? "No hay coincidencias" : printArr($comunes); ?>
                    </div>
                    <small class="text-muted">Nota: Coinciden el 3, el 9 y el 15 porque son impares y divisibles por 3.</small>
                </div>
            </div>

            <div class="col-md-6">
                <div class="alert alert-warning shadow-sm">
                    <h5 class="label-func">array_filter()</h5>
                    <p class="mb-1">Primos extraídos del array de Impares:</p>
                    <div class="array-box bg-white border-warning">
                        <?php echo printArr($primosImpares); ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="alert alert-danger shadow-sm">
                    <h5 class="label-func">array_map()</h5>
                    <p class="mb-1">Cuadrados del array de Impares (Nuevo Array):</p>
                    <div class="array-box bg-white border-danger">
                        <?php echo printArr($cuadradosImpares); ?>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="alert alert-success shadow-sm">
                    <h5 class="label-func">array_walk()</h5>
                    <p class="mb-1">Modificación "in-situ" (por referencia). Hemos doblado los valores del array de Impares:</p>
                    <div class="fw-bold mb-1">Original:</div>
                    <div class="array-box opacity-75"><?php echo printArr($impares); ?></div>
                    <div class="fw-bold mb-1">Tras array_walk (x2):</div>
                    <div class="array-box bg-white border-success text-success fw-bold">
                        <?php echo printArr($imparesDoblados); ?>
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