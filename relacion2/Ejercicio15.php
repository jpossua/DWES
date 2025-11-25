<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 2 - Ejercicio 15</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-primary bg-gradient vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 15</u></h1>
    </header>

    <main class="container mt-5">
        <section class="row justify-content-center">
            <article class="col-md-6">
                <div class="card-p-4 shadow text-center bg-info-subtle">
                    <!-- Formulario que se envía a sí mismo (PHP_SELF) -->
                    <form method="get" action="<?php echo ($_SERVER["PHP_SELF"]) ?>" onsubmit="return validarFormulario()">
                        <div class="mb-3">
                            <label for="numero" class="form-label">Introduce un número entero mayor o igual a 0: </label>
                            <input type="number" class="form-control" id="numero" name="numero" required>
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
    // Determina si una variable está declarada y es diferente de null.
    if (isset($_GET['numero'])) {
        // intval convierte una cadena en un número entero
        $numero = intval($_GET['numero']);

        if ($numero < 0) {
            echo ("<div class='alert alert-danger mt-4'>El valor debe ser un número entero mayor o igual a 0.</div>");
        } else {
            // Calculamos el factorial
            // El factorial de un número n es el producto de todos los enteros positivos desde 1 hasta n.
            $factorial = 1;
            if ($numero > 0) {
                for ($i = 1; $i <= $numero; $i++) {
                    $factorial *= $i; // Multiplicamos acumulativamente
                }
            }
        }
        echo ("<div class='alert alert-success mt-4 text-center'>");
        echo ("<h4>Resultado:</h4>");

        // Formatea un número con miles agrupados [number_format(number,decimals,decimalpoint,separator)].
        echo ("<p><strong>{$numero}! = " . number_format($factorial, 0, ',', '.') . "</strong></p>");
        echo ("</div>");
    }
    ?>

    <script>
        function validarFormulario() {
            const valor = parseFloat(document.getElementById("numero").value);
            let validar = true;

            if (isNaN(valor) || valor == "" || valor < 0) {
                alert("El valor debe ser un número entero mayor que 0.");
                validar = false;
            }

            return validar;
        }
    </script>

    <!-- Carga de Bootstrap JS al final del body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>