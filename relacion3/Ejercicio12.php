<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12 - Ordenación Burbuja</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-primary bg-gradient vh-100">

    <header class="bg-primary text-white text-center p-4 mb-4">
        <h1 class="fw-bold">Ejercicio 12: Algoritmo de la Burbuja (Bubble Sort)</h1>
        <p>Ordenación por referencia de Strings y Números</p>
    </header>

    <main class="container">

        <?php
        // ===================================================================================
        // LÓGICA PHP: ALGORITMO DE LA BURBUJA
        // ===================================================================================

        /**
         * ordenarBurbuja
         * Ordena un array de menor a mayor.
         * 
         * @param array &$array El array a ordenar. Se pasa por REFERENCIA (&) para modificar el original.
         * 
         * ¿CÓMO FUNCIONA LA BURBUJA?
         * Imagina que las burbujas de aire suben a la superficie del agua.
         * Aquí, los elementos "más grandes" van subiendo (se mueven a la derecha) en cada pasada.
         * 
         * 1. Comparamos el primero con el segundo. Si el primero es mayor, los intercambiamos.
         * 2. Comparamos el segundo con el tercero. Si es mayor, cambio.
         * 3. Así hasta el final. Al terminar la primera pasada, el número MÁS GRANDE seguro está al final.
         * 4. Repetimos el proceso, pero ya no hace falta llegar hasta el último (porque ya está colocado).
         */
        function ordenarBurbuja(&$array)
        {
            $n = count($array); // Número de elementos

            // Bucle externo ($i): Controla cuántas pasadas hacemos.
            // Necesitamos n-1 pasadas para asegurar que todo está ordenado.
            for ($i = 0; $i < $n - 1; $i++) {

                // Bucle interno ($j): Recorre el array comparando parejas.
                // Va desde el principio (0) hasta el final MENOS lo que ya hemos ordenado ($n - $i - 1).
                for ($j = 0; $j < $n - $i - 1; $j++) {

                    // Si el elemento actual ($j) es MAYOR que el siguiente ($j+1)...
                    if ($array[$j] > $array[$j + 1]) {

                        // ... ¡INTERCAMBIO! (Swap)
                        $temp = $array[$j];       // Guardamos el valor en una variable temporal
                        $array[$j] = $array[$j + 1]; // Ponemos el siguiente en la posición actual
                        $array[$j + 1] = $temp;   // Ponemos el valor guardado en la siguiente posición
                    }
                }
            }
        }

        // Función auxiliar para mostrar arrays de forma legible en HTML
        // implode: Pega los elementos del array con una coma y espacio entre ellos.
        function imprimirArray($arr)
        {
            echo '[' . implode(', ', $arr) . ']';
        }
        ?>

        <!-- CASO 1: ORDENAR STRINGS -->
        <section class="card shadow mb-5">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Caso 1: Ordenando Strings (Apellidos)</h5>
            </div>
            <div class="card-body text-center">
                <?php
                $datos = ['Pérez', 'García', 'López', 'Márquez', 'Álvarez', 'Domínguez', 'Ruíz', 'Díaz'];
                ?>

                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="alert alert-secondary">
                            <h6 class="text-muted">Array Original (Desordenado)</h6>
                            <p class="font-monospace"><?php imprimirArray($datos); ?></p>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <h1 class="text-primary">
                            <div class="spinner-border text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </h1>
                        <small>Ejecutando burbuja...</small>
                    </div>

                    <div class="col-md-5">
                        <div class="alert alert-success">
                            <h6 class="text-success">Array Ordenado</h6>
                            <?php
                            // Llamamos a la función. Al ser por referencia, $datos cambia de verdad.
                            ordenarBurbuja($datos);
                            ?>
                            <p class="font-monospace fw-bold"><?php imprimirArray($datos); ?></p>
                        </div>
                    </div>
                </div>

                <div class="alert alert-warning mt-3 text-start">
                    <small><strong>Nota sobre acentos:</strong>
                        En informática básica, las letras con tilde (como 'Á') tienen un código numérico "raro" y mayor que la 'Z'.
                        Por eso 'Álvarez' puede salir al final. Para arreglar esto en una web real se usaría <code>Collator</code>,
                        pero aquí estamos aprendiendo el algoritmo básico.</small>
                </div>
            </div>
        </section>

        <!-- CASO 2: ORDENAR NÚMEROS -->
        <section class="card shadow">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Caso 2: Ordenando Números (Polimorfismo)</h5>
            </div>
            <div class="card-body text-center">
                <?php
                $numeros = [45, 2, 105, -5, 89, 0, 12];
                ?>

                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="alert alert-secondary">
                            <h6 class="text-muted">Array Original</h6>
                            <p class="font-monospace"><?php imprimirArray($numeros); ?></p>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <h1 class="text-info">➥</h1>
                    </div>

                    <div class="col-md-5">
                        <div class="alert alert-info">
                            <h6 class="text-primary">Array Ordenado</h6>
                            <?php
                            // ¡La misma función sirve para números! PHP detecta los tipos automáticamente.
                            ordenarBurbuja($numeros);
                            ?>
                            <p class="font-monospace fw-bold"><?php imprimirArray($numeros); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>