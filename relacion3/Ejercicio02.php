<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 3 - Ejercicio 02</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-primary bg-gradient vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 02</u></h1>
    </header>

    <main class="container mt-5">
        <section class="row justify-content-center">
            <article class="col-md-6">
                <div class="card-p-4 shadow text-center bg-info-subtle">
                    <!-- Formulario para pedir el número -->
                    <form method="get" action="<?php echo ($_SERVER["PHP_SELF"]) ?>">
                        <div class="mb-3">
                            <label for="numero" class="form-label">Introduce un número entero mayor o igual a 0: </label>
                            <input type="number" class="form-control" id="numero" name="numero" min="0" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Calcular Factorial</button>
                        </div>
                    </form>
                </div>
            </article>
        </section>
    </main>

    <?php
    // ===================================================================================
    // LÓGICA PHP
    // ===================================================================================

    // 1. Incluir librería de funciones
    require_once 'relacion3.php';

    /*
    NOTA SOBRE RECURSIVIDAD:
    La función calcularFactorial($num) (que está en relacion3.php) es RECURSIVA.
    ¿Qué significa eso? Que la función SE LLAMA A SÍ MISMA.
    
    Ejemplo para factorial de 5 (5!):
    - 5 * factorial(4)
      - 4 * factorial(3)
        - 3 * factorial(2)
          - 2 * factorial(1)
            - 1 (Caso base: cuando llega a 1, para).
    
    Resultado: 5 * 4 * 3 * 2 * 1 = 120
    */

    // 2. Comprobar si hemos recibido el número
    if (isset($_GET['numero'])) {
        // 3. Convertir a entero
        $numero = intval($_GET['numero']);

        // 4. Validar que no sea negativo (el factorial de negativos no existe en reales)
        if ($numero < 0) {
            echo ("<div class='alert alert-danger mt-4'>El valor debe ser un número entero mayor o igual a 0.</div>");
        } else {
            // 5. Llamar a la función recursiva
            $factorial = calcularFactorial($numero);

            echo ("<div class='alert alert-success mt-4 text-center'>");
            echo ("<h4>Resultado:</h4>");

            // 6. Formatear el número
            // number_format(numero, decimales, separador_decimal, separador_miles)
            // Ej: 1.000.000 (sin decimales, coma para decimales, punto para miles)
            echo ("<p><strong>{$numero}! = " . number_format($factorial, 0, ',', '.') . "</strong></p>");
            echo ("</div>");
        }
    }
    ?>

    <!-- Carga de Bootstrap JS al final del body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>