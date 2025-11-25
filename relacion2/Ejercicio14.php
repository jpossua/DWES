<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 2 - Ejercicio 14</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-primary bg-gradient vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 14</u></h1>
    </header>

    <main class="container mt-5">
        <section class="row justify-content-center">
            <article class="col-md-6">
                <div class="card-p-4 shadow text-center bg-info-subtle">
                    <?php
                    // Determina si una variable está declarada y es diferente de null.
                    if (isset($_GET)) {
                        // floatval convierte una cadena en un número de punto flotante
                        $nota = floatval($_GET['nota']);

                        // Validamos el rango de la nota
                        if ($nota < 0 || $nota > 10) {
                            echo ("<div class='alert alert-danger'>La nota debe estar entre 0 y 10.</div>");
                        } else {
                            // Determinamos calificación textual usando if/elseif/else
                            if ($nota >= 9) {
                                $calificacion = "Sobresaliente";
                                $color = "success";
                            } elseif ($nota >= 7) {
                                $calificacion = "Notable";
                                $color = "info";
                            } elseif ($nota >= 6) {
                                $calificacion = "Bien";
                                $color = "primary";
                            } elseif ($nota >= 5) {
                                $calificacion = "Suficiente";
                                $color = "warning";
                            } else {
                                $calificacion = "Suspenso";
                                $color = "danger";
                            }

                            // Calculamos el porcentaje para la barra (nota * 10)
                            // round() redondea el número. min() y max() aseguran que esté entre 0 y 100.
                            $porcentaje = min(100, max(0, round($nota * 10, 1)));

                            echo ("<h2 class='mb-4'>Tu nota: <strong>" . number_format($nota, 1) . "</strong></h2>");
                            echo ("<h3 class='text-$color mb-4'>Calificación: <strong>" . $calificacion . "</strong></h2>");

                            // Barra de progreso
                            echo ("<div class='mb-2'>Progreso:</div>");
                            echo ("<div class='progress'>");
                            echo ("<div class='progress-bar bg-$color' role='progressbar' style='width: $porcentaje%; aria-valuenow='$porcentaje' aria-valuemin='0' aria-valuemax='100'>");
                            echo ("$porcentaje");
                            echo ("</div>");
                            echo ("</div>");

                            echo "<div class='mt-4'>";
                            echo "<a href='Ejercicio14.html' class='btn btn-$color btn-outline-light'>Volver</a>";
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='alert alert-warning'>No se ha recibido ninguna nota.</div>";
                        echo "<a href='Ejercicio14.html' class='btn btn-primary'>Volver al formulario</a>";
                    }
                    ?>
                </div>
            </article>
        </section>
    </main>


    </form>
    <!-- Carga de Bootstrap JS al final del body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>