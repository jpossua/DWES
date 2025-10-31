<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 3 - Ejercicio 05</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!--ESTILOS CSS-->
    <style>
        .form-text {
            visibility: hidden;
        }
    </style>
</head>

<body class="bg-primary bg-gradient vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 05</u></h1>
    </header>

    <main class="container mt-5">
        <section class="row justify-content-center">
            <article class="col-md-6">
                <div class="card-body">
                    <form action='<?php echo ($_SERVER["PHP_SELF"]) ?>' method="get" id="form1">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Introduce tu nombre:</label>
                            <input class="form-control test-danger" type="text" name="nombre" id="nombre">
                            <div id="nombreHelp" class="form-text text-danger">El nombre no puede estar vacio y no contener números.</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Introduce tu e-mail:</label>
                            <input class="form-control test-danger" type="email" name="email" id="email">
                            <div id="emailHelp" class="form-text text-danger">El email no puede estar vacio y debe ser tener un formato como este:<br> me@example.org.</div>
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">Introduce tu DNI:</label>
                            <input class="form-control test-danger" type="text" name="dni" id="dni">
                            <div id="dniHelp" class="form-text text-danger">El DNI debe tener 8 números y una letra...</div>
                        </div>

                        <div class="mb-3">
                            <label for="nota01" class="form-label">Introduce tu primera nota:</label>
                            <input class="form-control test-danger" type="number" name="nota01" id="nota01">
                            <div id="nota01Help" class="form-text text-danger">La nota debe ser un número positivo.</div>
                        </div>
                        <div class="mb-3">
                            <label for="nota02" class="form-label">Introduce tu segunda nota:</label>
                            <input class="form-control test-danger" type="number" name="nota02" id="nota02">
                            <div id="nota02Help" class="form-text text-danger">La nota debe ser un número positivo.</div>
                        </div>
                        <div class="mb-3">
                            <label for="faltas" class="form-label">Introduce tu número de faltas:</label>
                            <input class="form-control test-danger" type="number" name="faltas" id="faltas">
                            <div id="faltas" class="form-text text-danger">Las faltas debe ser un número entero positivo.</div>
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="btn btn-success" value="Enviar">
                        </div>
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
<!--PHP-->
<?php
// Haremos que se ejecuten los calculos tras el envio
if (!empty($_GET)) {
    // Descargo tres variables locales
    $nombre = $_GET["nombre"];
    $email = $_GET["email"];
    $dni = $_GET["dni"];
    $nota1 = $_GET["nota01"];
    $nota2 = $_GET["nota02"];
    $faltas = $_GET["faltas"];
    $descontar = 0.25;
    $notaFinal = NULL;

    if ($nota1 < 0 || $nota1 > 10 || $nota2 < 0 || $nota2 > 10 || $faltas <= 0) {
        echo "Error: Las notas deben estar entre 0 y 10, y las faltas no pueden ser negativas.";
    } else {
        $notaFinal = (($nota1 + $nota2) / 2);

        echo ("<strong>Nombre: </strong>" . $nombre);
        echo ("<br><strong>email: </strong>" . $email);
        echo ("<br><strong>DNI: </strong>" . $dni);
        echo ("<br><strong>Tu nota final es: </strong>" . ($faltas > 0 ? $notaFinal = $notaFinal - ($descontar * $faltas) : $notaFinal) . "<br>");

        if ($notaFinal >= 5) {
            echo ("¡Enhorabuena has aprobado!");
        } else {
            echo ("¡Lo siento, has suspendido...!");
        }
    }
}
?>

<!--JAVASCRIPT-->
<script>
    const formulario = document.getElementById("form1");

    formulario.addEventListener("submit", function(event) {
        if (!validarFormulario()) {
            event.preventDefault();
        }
    });

    document.getElementById('dni').addEventListener("change", function() {
        limpiarError('dniHelp', 'dni');
    });

    // Función para válidar el Formulario
    function validarFormulario() {
        let correcto = true;
        const dni = document.getElementById("dni").value.trim();

        // test() ejecuta la búsqueda de una ocurrencia entre una expresión regular y una cadena especificada. Devuelve true o false.
        if (!/[0-9]{8}-?[A-Za-z]/.test(dni)) {
            campoColorear("dniHelp", "dni");
            correcto = false;
        }

        return correcto;
    }

    // Función que colorea si algún campo no cumple los requisitos.
    function campoColorear(id1, id2) {
        document.getElementById(id1).style.visibility = "visible";
        document.getElementById(id2).style.borderColor = "red";
    }

    // Función que colorea si algún campo cumple los requisitos.
    function limpiarError(id1, id2) {
        document.getElementById(id1).style.visibility = "hidden";
        document.getElementById(id2).style.borderColor = "#dee2e6";
    }
</script>

</html>