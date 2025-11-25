<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 01</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .divisor {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-primary bg-gradient vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 01</u></h1>
    </header>
    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 bg-info-subtle shadow">
                    <!-- 
                        FORMULARIO
                        ----------
                        action: A dónde se envían los datos. 
                                $_SERVER['PHP_SELF'] significa "a esta misma página".
                        method: "get". Los datos irán en la URL (ej: ?numero=5).
                    -->
                    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="get">
                        <div class="mb-3">
                            <label for="numero" class="form-label">Introduce un número mayor que 0:</label>
                            <input type="number" class="form-control" id="numero" name="numero" min="1" required>
                            <div class="invalid-feedback">
                                Introduce un número entero válido.
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Ejecutar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php
    // ===================================================================================
    // LÓGICA PHP
    // ===================================================================================

    // 1. Incluir librería externa
    // 'require_once' busca el archivo 'relacion3.php'. Si no lo encuentra, el programa falla (error fatal).
    // El '_once' asegura que si ya se incluyó antes, no se vuelva a incluir (evita errores de duplicados).
    require_once 'relacion3.php';

    /*
    NOTA: La función numeroPrimo($num) está definida en 'relacion3.php'.
    Su lógica es:
    - Recibir un número.
    - Probar a dividirlo por todos los números desde 2 hasta el propio número.
    - Si alguno da resto 0 (es divisible), entonces NO es primo.
    */

    // 2. Comprobar si hemos recibido datos
    // isset($_GET['numero']): ¿Existe la variable 'numero' en la URL?
    // $_SERVER['REQUEST_METHOD'] === 'GET': ¿La petición fue de tipo GET?
    if (isset($_GET['numero']) && $_SERVER['REQUEST_METHOD'] === 'GET') {

        // 3. Recoger y limpiar datos
        // intval(): Convierte lo que llegue a un número entero (por seguridad).
        $numero = intval($_GET['numero']);

        // 4. Validar datos
        if ($numero <= 0) {
            echo ("<div class='alert alert-danger mt-4'>El número debe ser un entero mayor que 0.</div>");
        } else {
            // 5. Llamar a la función (que está en el otro archivo)
            $esPrimo = numeroPrimo($numero);
        }

        // 6. Mostrar resultados
        echo ("<div class='alert alert-info mt-4 text-center'>");
        if ($esPrimo) {
            echo ("<h4>El número <strong>$numero</strong> es <strong>primo</strong>.</h4>");
        } else {
            echo ("<h4>El número <strong>$numero</strong> <strong>no es primo</strong>.</h4>");
        }
        echo ("</div>");
        echo ("</p></div>");
    } else {
        // Si entramos a la página por primera vez (sin enviar formulario)
        echo "<div class='alert alert-warning mt-4 text-center'>No se ha recibido ningun número o opción.</div>";
    }
    ?>
    <!-- Carga de Bootstrap JS al final del body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>