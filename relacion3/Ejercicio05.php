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
                            <div id="nombreHelp" class="form-text text-danger">El nombre no puede estar vacío y no debe contener números.</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Introduce tu e-mail:</label>
                            <input class="form-control test-danger" type="email" name="email" id="email">
                            <div id="emailHelp" class="form-text text-danger">El email debe tener un formato válido (ej: me@example.org).</div>
                        </div>
                        <div class="mb-3">
                            <label for="tipoDoc" class="form-label">Tipo de documento:</label>
                            <select class="form-select" name="tipoDoc" id="tipoDoc">
                                <option value="" disabled selected>-- Selecciona un tipo --</option>
                                <option value="DNI">DNI (Documento Nacional de Identidad)</option>
                                <option value="NIE">NIE (Número de Identidad de Extranjero)</option>
                                <option value="TIE">TIE (Tarjeta de Identidad de Extranjero)</option>
                            </select>
                            <div id="tipoDocHelp" class="form-text text-danger">Debes seleccionar un tipo de documento.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="numDoc" class="form-label">Número de Documento (DNI/NIE):</label>
                            <input class="form-control test-danger" type="text" name="numDoc" id="numDoc">
                            <div id="numDocHelp" class="form-text text-danger">El número de documento no es válido.</div>
                        </div>
                        <div class="mb-3" id="campoTIESoporte" style="display: none;">
                            <label for="numSoporte" class="form-label">Número de Soporte (TIE):</label>
                            <input class="form-control" type="text" name="numSoporte" id="numSoporte"
                                placeholder="Ej: E00123456">
                            <div id="numSoporteHelp" class="form-text text-danger">El número de soporte debe empezar por
                                'E' seguido de 8 dígitos.</div>
                        </div>
                        <div class="mb-3">
                            <label for="nota01" class="form-label">Introduce tu primera nota:</label>
                            <input class="form-control test-danger" type="number" name="nota01" id="nota01">
                            <div id="nota01Help" class="form-text text-danger">La nota debe ser un número entre 0 y 10.</div>
                        </div>
                        <div class="mb-3">
                            <label for="nota02" class="form-label">Introduce tu segunda nota:</label>
                            <input class="form-control test-danger" type="number" name="nota02" id="nota02">
                            <div id="nota02Help" class="form-text text-danger">La nota debe ser un número entre 0 y 10.</div>
                        </div>
                        <div class="mb-3">
                            <label for="faltas" class="form-label">Introduce tu número de faltas:</label>
                            <input class="form-control test-danger" type="number" name="faltas" id="faltas">
                            <div id="faltasHelp" class="form-text text-danger">Las faltas debe ser un número entero positivo (o 0).</div>
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="btn btn-success" value="Enviar">
                        </div>
                </div>
                </form>
            </article>
        </section>
    </main>
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
    $tipoDoc = $_GET["tipoDoc"];
    $numDoc = $_GET["numDoc"];
    $numSoporte = $_GET["numSoporte"];
    $nota1 = $_GET["nota01"];
    $nota2 = $_GET["nota02"];
    $faltas = $_GET["faltas"];
    $descontar = 0.25;
    $notaFinal = NULL;

    if ($nota1 < 0 || $nota1 > 10 || $nota2 < 0 || $nota2 > 10 || $faltas <= 0) {
        echo "<div class='container mt-4'><div class='alert alert-danger text-center'>";
        echo "Error: Datos numéricos no válidos recibidos.";
        echo "</div></div>";
    } else {
        $notaFinal = (($nota1 + $nota2) / 2);

        echo ("<div class='container mt-4'><div class='alert alert-success text-center'>");
        echo ("<h4>Resultado</h4>");
        echo ("<strong>Nombre: </strong>" . $nombre);
        echo ("<br><strong>email: </strong>" . $email);
        echo ("<br><strong>Tipo Documento: </strong>" . $tipoDoc);
        echo ("<br><strong>Número: </strong>" . $numDoc);

        // Mostrar soporte solo si es TIE y no está vacío
        if ($tipoDoc == "TIE" && !empty($numSoporte)) {
            echo ("<br><strong>Nº Soporte: </strong>" . $numSoporte);
        }
        echo ("<br><strong>Tu nota final es: </strong>" . ($faltas > 0 ? $notaFinal = $notaFinal - ($descontar * $faltas) : $notaFinal) . "<br>");
        echo ("</div>");

        if ($notaFinal >= 5) {
            echo ("<div class='alert alert-info text-center'>¡Enhorabuena has aprobado!</div>");
        } else {
            echo ("<div class='alert alert-warning text-center'>¡Lo siento, has suspendido...!</div>");
        }
        echo ("</div>");
    }
}
?>

<!--JAVASCRIPT-->
<script>
    const formulario = document.getElementById("form1");
    const tipoDocSelect = document.getElementById('tipoDoc');
    const campoTIESoporte = document.getElementById('campoTIESoporte');

    // Se dispara cuando se envie el contenido y si el formulario no es valido no lo envia al php
    formulario.addEventListener("submit", function(event) {
        if (!validarFormulario()) {
            event.preventDefault();
        }
    });

    // Se dispara cuando se cambie el contenido segun el select seleccionado ocultando o no el campo del TIE
    tipoDocSelect.addEventListener('change', function() {
        if (this.value === 'TIE') {
            campoTIESoporte.style.display = 'block';
        } else {
            campoTIESoporte.style.display = 'none';
            document.getElementById('numSoporte').value = ''; // Limpia el valor si se oculta
        }
        // Limpiar errores del select y del numDoc al cambiar
        limpiarError('tipoDocHelp', 'tipoDoc');
        limpiarError('numDocHelp', 'numDoc');
    });

    // Listeners para limpiar errores al escribir (igual que el de DNI original)
    document.getElementById('nombre').addEventListener("input", function() {
        limpiarError('nombreHelp', 'nombre')
    });
    document.getElementById('email').addEventListener("input", () => limpiarError('emailHelp', 'email'));
    document.getElementById('numDoc').addEventListener("input", () => limpiarError('numDocHelp', 'numDoc'));
    document.getElementById('numSoporte').addEventListener("input", () => limpiarError('numSoporteHelp', 'numSoporte'));
    document.getElementById('nota01').addEventListener("input", () => limpiarError('nota01Help', 'nota01'));
    document.getElementById('nota02').addEventListener("input", () => limpiarError('nota02Help', 'nota02'));
    document.getElementById('faltas').addEventListener("input", () => limpiarError('faltasHelp', 'faltas'));

    // Función para válidar el Formulario
    function validarFormulario() {
        let correcto = true;
        const nombre = document.getElementById("nombre").value.trim();
        const email = document.getElementById("email").value.trim();
        const tipoDoc = document.getElementById("tipoDoc").value;
        const numDoc = document.getElementById("numDoc").value.trim().toUpperCase();
        const numSoporte = document.getElementById("numSoporte").value.trim().toUpperCase();
        const nota1 = document.getElementById("nota01").value;
        const nota2 = document.getElementById("nota02").value;
        const faltas = document.getElementById("faltas").value;

        if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/.test(nombre) || nombre === "") {
            campoColorear("nombreHelp", "nombre");
            correcto = false;
        }

        if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
            campoColorear("emailHelp", "email");
            correcto = false;
        }

        if (nota1 === "" || isNaN(nota1) || parseInt(nota1) < 0 || parseInt(nota1) > 10) {
            campoColorear("nota01Help", "nota01");
            correcto = false;
        }

        if (nota2 === "" || isNaN(nota2) || parseInt(nota2) < 0 || parseInt(nota2) > 10) {
            campoColorear("nota02Help", "nota02");
            correcto = false;
        }

        if (faltas === "" || isNaN(faltas) || parseInt(faltas) < 0 || !Number.isInteger(parseFloat(faltas))) {
            campoColorear("faltasHelp", "faltas");
            correcto = false;
        }

        switch (tipoDoc) {
            case 'DNI':
                if (!validarDNI(numDoc)) {
                    campoColorear("numDocHelp", "numDoc", "El DNI no es válido (8 números y 1 letra correcta).");
                    correcto = false;
                }
                break;
            case 'NIE':
                if (!validarNIE(numDoc)) {
                    campoColorear("numDocHelp", "numDoc", "El NIE no es válido (X/Y/Z, 7 números y 1 letra correcta).");
                    correcto = false;
                }
                break;
            case 'TIE':
                // El TIE requiere un NIE válido Y un número de soporte válido
                if (!validarNIE(numDoc)) {
                    campoColorear("numDocHelp", "numDoc", "El NIE (parte del TIE) no es válido.");
                    correcto = false;
                }
                if (!validarSoporteTIE(numSoporte)) {
                    campoColorear("numSoporteHelp", "numSoporte");
                    correcto = false;
                }
                break;
            default:
                // Si no se ha seleccionado nada
                campoColorear("tipoDocHelp", "tipoDoc");
                correcto = false;
        }

        return correcto;
    }

    // Función que valida un DNI español (formato y letra).

    function validarDNI(dni) {
        const letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        const regex = /^[0-9]{8}[A-Z]$/i; // 8 números y 1 letra (case-insensitive)
        let esValido = false;

        if (regex.test(dni)) {
            const numero = dni.substr(0, 8);
            const letra = dni.substr(8, 1).toUpperCase();
            esValido = (letra === letra[numero % 23] ? true : false);
        }

        return esValido;
    }

    // Función que valida un NIE español (formato y letra).
    function validarNIE(nie) {
        const letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        const regex = /^[XYZ][0-9]{7}[A-Z]$/i;
        let esValido = false;

        if (regex.test(nie)) {
            let num = nie.substr(1, 7);
            const letra = nie.substr(8, 1).toUpperCase();
            const inicial = nie.substr(0, 1);

            // Sustituir X por 0, Y por 1, Z por 2
            if (inicial === 'X') {
                num = '0' + num;
            } else if (inicial === 'Y') {
                num = '1' + num;
            } else if (inicial === 'Z') {
                num = '2' + num;
            }
            esValido = (letra === letra[numero % 23] ? true : false);
        }
        return esValido;


    }

    // Función que valida el número de soporte del TIE (E + 8 dígitos).
    function validarSoporteTIE(soporte) {
        const regex = /^E[0-9]{8}$/i;
        return regex.test(soporte);
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