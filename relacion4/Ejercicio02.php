<?php
// Iniciamos la sesión
session_start();

// --- LÓGICA DE INICIALIZACIÓN ---
// Si la variable 'a' NO está en la sesión, significa que es la primera visita.
// Inicializamos 'a' y 'b'.
if (!isset($_SESSION['a'])) {
    $_SESSION['a'] = 0;
    $_SESSION['b'] = 0;
}

// --- LÓGICA DE PROCESAMIENTO  ---
// Comprobamos si se ha enviado el formulario (si se pulsó el botón "enviar").
if (isset($_REQUEST['enviar'])) {

    // Comprobamos qué operación se seleccionó
    // Usamos '?? '' para evitar errores si 'operacion' no llegara por algún motivo
    $operacion = $_REQUEST['operacion'] ?? '';

    switch ($operacion) {
        case '+a':
            $_SESSION['a']++;
            break;
        case '-a':
            $_SESSION['a']--;
            break;
        case '+b':
            $_SESSION['b']++;
            break;
        case '-b':
            $_SESSION['b']--;
            break;
        case 'reset_a':
            $_SESSION['a'] = 0;
            break;

        case 'reset_b':
            $_SESSION['b'] = 0;
            break;

        case 'destroy':
            // Borrar todas las variables de sesión
            session_unset();

            // Destruye la sesión
            session_destroy();

            // Refresca la página
            // Esto redirige al navegador a la misma página
            header("Location: " . $_SERVER['PHP_SELF']);
            break;
    }
}

// --- HTML ---
// El código PHP de arriba ya se ha ejecutado,
// Así que $_SESSION['a'] y $_SESSION['b'] tienen los valores ACTUALIZADOS.
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 4 - Ejercicio 02</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body class="bg-primary bg-gradient min-vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 02</u></h1>
    </header>

    <main class="container mt-5">

        <section class="row justify-content-center">
            <article class="col-md-6">
                <div class="card p-4 shadow text-center bg-info-subtle">

                    <form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                        <div class="mb-3">
                            <label for="operacion" class="form-label">Elige una operación:</label>
                            <select class="form-select" id="operacion" name="operacion">
                                <option disabled selected>Elija una opción</option>
                                <option value="+a">Incrementar A</option>
                                <option value="-a">Decrementar A</option>
                                <option value="+b">Incrementar B</option>
                                <option value="-b">Decrementar B</option>
                                <option value="reset_a">Resetear A</option>
                                <option value="reset_b">Resetear B</option>
                                <option value="destroy">Destruir Sesión</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success" name="enviar">Enviar</button>
                        </div>
                    </form>
                </div>
            </article>
        </section>
        <section class="row justify-content-center">
            <article class="col-md-6">
                <div class="card p-4 shadow text-center bg-info-info">
                    <h2 class="text-dark">A: <?php echo $_SESSION['a']; ?></h2>
                    <h2 class="text-dark">B: <?php echo $_SESSION['b']; ?></h2>
                </div>
            </article>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>