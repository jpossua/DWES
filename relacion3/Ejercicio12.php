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
        <h1 class="fw-bold">Algoritmo de la Burbuja (Bubble Sort)</h1>
        <p>Ordenación por referencia de Strings y Números</p>
    </header>

    <main class="container">

        <?php
        // ---------------------------------------------------------
        // DEFINICIÓN DE LA FUNCIÓN DE ORDENACIÓN
        // ---------------------------------------------------------

        /**
         * Ordena un array utilizando el algoritmo de la burbuja.
         * El parámetro se pasa por REFERENCIA (&$array), modificando el original.
         * Funciona para strings y números gracias al tipado dinámico de PHP.
         */
        function ordenarBurbuja(&$array)
        {
            $n = count($array);
            // Bucle externo: controla las pasadas necesarias
            for ($i = 0; $i < $n - 1; $i++) {
                // Bucle interno: compara elementos adyacentes
                // Se resta $i porque los últimos elementos ya quedan ordenados en cada pasada
                for ($j = 0; $j < $n - $i - 1; $j++) {

                    // Si el elemento actual es mayor que el siguiente, los intercambiamos
                    if ($array[$j] > $array[$j + 1]) {
                        $temp = $array[$j];
                        $array[$j] = $array[$j + 1];
                        $array[$j + 1] = $temp;
                    }
                }
            }
        }

        // Función auxiliar para mostrar arrays bonitos en HTML
        // implode — Une elementos de un array en un string [implode(string $separator, array $array): string]
        function imprimirArray($arr)
        {
            echo '[' . implode(', ', $arr) . ']';
        }
        ?>

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
                            // Llamamos a la función. Al ser por referencia, $datos cambia.
                            ordenarBurbuja($datos);
                            ?>
                            <p class="font-monospace fw-bold"><?php imprimirArray($datos); ?></p>
                        </div>
                    </div>
                </div>

                <div class="alert alert-warning mt-3 text-start">
                    <small><strong>Nota sobre acentos:</strong>
                        En la ordenación estándar de computación (binaria), las letras con tilde (como 'Á')
                        tienen un código numérico mayor que la 'Z'. Por eso 'Álvarez' puede aparecer al final.
                        Para corregir esto en aplicaciones reales se usaría la clase <code>Collator</code> de PHP,
                        pero el algoritmo de burbuja puro compara valores brutos.</small>
                </div>
            </div>
        </section>

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
                            // Reutilizamos la MISMA función
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