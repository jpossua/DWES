<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 3 - Ejercicio 03 (MCD Recursivo)</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-primary bg-gradient min-vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 03 - MCD Recursivo</u></h1>
    </header>

    <main class="container mt-5">
        <section class="row justify-content-center">
            <article class="col-md-6">
                <div class="card p-4 shadow text-center bg-info-subtle">
                    <!-- Formulario para pedir dos números -->
                    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                        <div class="mb-3">
                            <label for="num1" class="form-label">Introduce el primer número (a):</label>
                            <input type="number" class="form-control" id="num1" name="num1" min="1" required>
                        </div>

                        <div class="mb-3">
                            <label for="num2" class="form-label">Introduce el segundo número (b):</label>
                            <input type="number" class="form-control" id="num2" name="num2" min="1" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Calcular MCD</button>
                        </div>
                    </form>
                </div>
            </article>
        </section>

        <?php
        // ===================================================================================
        // LÓGICA PHP
        // ===================================================================================

        // 1. Incluir librería
        require_once 'relacion3.php';

        /*
        EXPLICACIÓN DE LOS ALGORITMOS (Están en relacion3.php):
        
        El Máximo Común Divisor (MCD) es el número más grande que divide a dos números.
        
        1. Algoritmo de Euclides (División):
           - Es muy rápido.
           - Se basa en que MCD(a, b) es igual a MCD(b, resto).
           - Ejemplo MCD(48, 18):
             - 48 / 18 = 2, resto 12. -> MCD(18, 12)
             - 18 / 12 = 1, resto 6.  -> MCD(12, 6)
             - 12 / 6 = 2, resto 0.   -> El resultado es 6.
        
        2. Algoritmo de Restas:
           - Es más lento pero más fácil de entender.
           - Si a > b, restamos b a a. Si b > a, restamos a a b.
           - Repetimos hasta que sean iguales.
           - Ejemplo MCD(48, 18):
             - 48 - 18 = 30 -> (30, 18)
             - 30 - 18 = 12 -> (12, 18)
             - 18 - 12 = 6  -> (12, 6)
             - 12 - 6 = 6   -> (6, 6) -> El resultado es 6.
        */

        // 2. Comprobamos si las DOS variables están declaradas (formulario enviado)
        if (isset($_GET['num1']) && isset($_GET['num2'])) {

            // 3. Convertimos a entero
            $num1 = intval($_GET['num1']);
            $num2 = intval($_GET['num2']);

            // 4. Validamos que sean números positivos
            if ($num1 <= 0 || $num2 <= 0) {
                echo ("<div class='container mt-4'><div class='alert alert-danger'>Ambos números deben ser enteros positivos (mayores que 0).</div></div>");
            } else {
                // 5. Calculamos el MCD con ambas funciones (recursivas)
                $mcd_division = mcdDivisionRecursivo($num1, $num2);
                $mcd_resta = mcdRestaRecursivo($num1, $num2);

                // 6. Mostramos los resultados
                echo ("<div class='container mt-4'><div class='alert alert-success text-center'>");
                echo ("<h4>Resultado para MCD($num1, $num2):</h4>");
                echo ("<p><strong>MCD por División (Recursivo): " . $mcd_division . "</strong></p>");
                echo ("<p><strong>MCD por Restas (Recursivo): " . $mcd_resta . "</strong></p>");
                echo ("</div></div>");
            }
        }
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>