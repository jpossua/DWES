<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 2 - Ejercicio 13</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-primary bg-gradient vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 13</u></h1>
    </header>
    <section class='row justify-content-center mt-4'>
        <div class='col-md-6'>
            <div class='alert alert-info text-center' role='alert'>
                <?php
                // Haremos que se ejecuten los calculos tras el envio
                if (!empty($_GET)) {
                    // Descargo tres variables locales
                    $nombre = $_GET["nombre"];
                    $email = $_GET["email"];
                    $nota1 = $_GET["nota01"];
                    $nota2 = $_GET["nota02"];
                    $faltas = $_GET["faltas"];
                    $descontar = 0.25;
                    $notaFinal = NULL;

                    if ($nota1 < 0 || $nota1 > 10 || $nota2 < 0 || $nota2 > 10 || $faltas < 0) {
                        echo "Error: Las notas deben estar entre 0 y 10, y las faltas no pueden ser negativas.";
                    } else {
                        $notaFinal = (($nota1 + $nota2) / 2);

                        echo ("<strong>Nombre: </strong>" . $nombre);
                        echo ("<br><strong>email: </strong>" . $email);
                        echo ("<br><strong>Tu nota final es: </strong>" . ($faltas > 0 ? $notaFinal = $notaFinal - ($descontar * $faltas) : $notaFinal) . "<br>");

                        if ($notaFinal >= 5) {
                            echo ("¡Enhorabuena has aprobado!");
                        } else {
                            echo ("¡Lo siento, has suspendido...!");
                        }
                    }
                }
                ?>
            </div>
        </div>
    </section>
    </main>
    <!-- Carga de Bootstrap JS al final del body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>