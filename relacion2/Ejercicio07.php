<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 2 - Ejercicio 07</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-primary bg-gradient vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 07</u></h1>
    </header>

    <main class="container mt-5">
        <section class="row justify-content-center">
            <div class="col-md-6">
                <div class="card-header bg-info-subtle">
                    <h3 class="mb-0 text-center">Introduce dos números</h3>
                </div>
                <article class="card-body">
                    <!--Formulario-->
                    <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]) ?>">
                        <div class="mb-3">
                            <label for="numero01" class="form-label">Primer Número:</label>
                            <input type="number" class="form-control" id="numero01" name="numero01" step="any" value="0" required>
                        </div>
                        <div class="mb-3">
                            <label for="numero02" class="form-label">Segundo Número:</label>
                            <input type="number" class="form-control" id="numero02" name="numero02" step="any" value="0" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </form>
                </article>
            </div>
        </section>

    </main>
    <?php
    // Bloque PHP para procesar el formulario si se ha enviado (Opcional, pero esencial para la lógica)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recoge los números y convertirlos a flotante (para step="any")
        if (isset($_POST['numero01']) && isset($_POST['numero02'])) {
            $num01 = floatval($_POST['numero01']);
            $num02 = floatval($_POST['numero02']);

            // Mensaje de resultado:
            echo ("<section class='row justify-content-center mt-4'>");
            echo ("<div class='col-md-6'>");
            echo ("<div class='alert alert-info text-center' role='alert'>");
            echo ("Números recibidos: " . $num01 . " y " . $num02 . ".");
            echo ("</div>");
            echo ("</div>");
            echo ("</section>");
        }
    }
    ?>
    <!-- Carga de Bootstrap JS al final del body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>