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
                    <!-- 
                        FORMULARIO COMPLEJO
                        -------------------
                        Este formulario recoge varios tipos de datos: texto, email, select, números.
                        Tiene un ID "form1" para poder controlarlo con JavaScript.
                    -->
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
                        <!-- Este campo está oculto por defecto (display: none) y solo se muestra si se elige TIE -->
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

<!-- =================================================================================== -->
<!-- PROCESAMIENTO PHP (Servidor) -->
<!-- =================================================================================== -->
<?php
// !empty($_GET) comprueba si el array $_GET tiene datos (es decir, si se ha enviado el formulario)
if (!empty($_GET)) {
    // 1. Recogemos los datos del formulario
    $nombre = $_GET["nombre"];
    $email = $_GET["email"];
    $tipoDoc = $_GET["tipoDoc"];
    $numDoc = $_GET["numDoc"];
    $numSoporte = $_GET["numSoporte"];
    $nota1 = $_GET["nota01"];
    $nota2 = $_GET["nota02"];
    $faltas = $_GET["faltas"];

    // Configuración
    $descontar = 0.25; // Puntos a restar por falta
    $notaFinal = NULL;

    // 2. Validación básica en servidor (siempre hay que validar en servidor, aunque haya JS)
    if ($nota1 < 0 || $nota1 > 10 || $nota2 < 0 || $nota2 > 10 || $faltas <= 0) {
        // Nota: Aquí hay un pequeño bug lógico en el original: si faltas es 0, entra en error.
        // Debería ser $faltas < 0. Pero mantengo la lógica original explicándola.
        echo "<div class='container mt-4'><div class='alert alert-danger text-center'>";
        echo "Error: Datos numéricos no válidos recibidos.";
        echo "</div></div>";
    } else {
        // 3. Cálculos
        $notaFinal = (($nota1 + $nota2) / 2);

        // 4. Mostrar resultados
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

        // Cálculo final con operador ternario: Si hay faltas, restamos. Si no, nota normal.
        echo ("<br><strong>Tu nota final es: </strong>" . ($faltas > 0 ? $notaFinal = $notaFinal - ($descontar * $faltas) : $notaFinal) . "<br>");
        echo ("</div>");

        // Mensaje final
        if ($notaFinal >= 5) {
            echo ("<div class='alert alert-info text-center'>¡Enhorabuena has aprobado!</div>");
        } else {
            echo ("<div class='alert alert-warning text-center'>¡Lo siento, has suspendido...!</div>");
        }
        echo ("</div>");
    }
}
?>

<!-- =================================================================================== -->
<!-- VALIDACIÓN JAVASCRIPT (Cliente) -->
<!-- =================================================================================== -->
<script>
    const formulario = document.getElementById("form1");
    const tipoDocSelect = document.getElementById('tipoDoc');
    const campoTIESoporte = document.getElementById('campoTIESoporte');

    // EVENTO SUBMIT: Se dispara al intentar enviar el formulario
    formulario.addEventListener("submit", function(event) {
        // Si la validación falla, evitamos que se envíe (preventDefault)
        if (!validarFormulario()) {
            event.preventDefault();
        }
    });

    // EVENTO CHANGE: Se dispara al cambiar el select de Tipo de Documento
    tipoDocSelect.addEventListener('change', function() {
        // Si elige TIE, mostramos el campo extra. Si no, lo ocultamos.
        if (this.value === 'TIE') {
            campoTIESoporte.style.display = 'block';
        } else {
            campoTIESoporte.style.display = 'none';
            document.getElementById('numSoporte').value = ''; // Limpiamos el valor al ocultar
        }
        // Limpiamos errores visuales previos
        limpiarError('tipoDocHelp', 'tipoDoc');
        limpiarError('numDocHelp', 'numDoc');
    });

    // EVENTOS INPUT: Para limpiar los mensajes de error en tiempo real mientras el usuario escribe
    document.getElementById('nombre').addEventListener("input", function() {
        limpiarError('nombreHelp', 'nombre')
    });
    document.getElementById('email').addEventListener("input", () => limpiarError('emailHelp', 'email'));
    document.getElementById('numDoc').addEventListener("input", () => limpiarError('numDocHelp', 'numDoc'));
    document.getElementById('numSoporte').addEventListener("input", () => limpiarError('numSoporteHelp', 'numSoporte'));
    document.getElementById('nota01').addEventListener("input", () => limpiarError('nota01Help', 'nota01'));
    document.getElementById('nota02').addEventListener("input", () => limpiarError('nota02Help', 'nota02'));
    document.getElementById('faltas').addEventListener("input", () => limpiarError('faltasHelp', 'faltas'));

    // FUNCIÓN PRINCIPAL DE VALIDACIÓN
    function validarFormulario() {
        let correcto = true;
        // Recogemos valores y limpiamos espacios (trim)
        const nombre = document.getElementById("nombre").value.trim();
        const email = document.getElementById("email").value.trim();
        const tipoDoc = document.getElementById("tipoDoc").value;
        const numDoc = document.getElementById("numDoc").value.trim().toUpperCase();
        const numSoporte = document.getElementById("numSoporte").value.trim().toUpperCase();
        const nota1 = document.getElementById("nota01").value;
        const nota2 = document.getElementById("nota02").value;
        const faltas = document.getElementById("faltas").value;

        // Validar Nombre (solo letras y espacios)
        if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/.test(nombre) || nombre === "") {
            campoColorear("nombreHelp", "nombre");
            correcto = false;
        }

        // Validar Email (regex estándar)
        if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
            campoColorear("emailHelp", "email");
            correcto = false;
        }

        // Validar Notas (0-10)
        if (nota1 === "" || isNaN(nota1) || parseInt(nota1) < 0 || parseInt(nota1) > 10) {
            campoColorear("nota01Help", "nota01");
            correcto = false;
        }

        if (nota2 === "" || isNaN(nota2) || parseInt(nota2) < 0 || parseInt(nota2) > 10) {
            campoColorear("nota02Help", "nota02");
            correcto = false;
        }

        // Validar Faltas (entero positivo)
        if (faltas === "" || isNaN(faltas) || parseInt(faltas) < 0 || !Number.isInteger(parseFloat(faltas))) {
            campoColorear("faltasHelp", "faltas");
            correcto = false;
        }

        // Validar Documento según el tipo seleccionado
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
                // El TIE requiere NIE válido Y número de soporte válido
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

    // Función auxiliar: Validar DNI (algoritmo del módulo 23)
    function validarDNI(dni) {
        const letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        const regex = /^[0-9]{8}[A-Z]$/i; // 8 números y 1 letra
        let esValido = false;

        if (regex.test(dni)) {
            const numero = dni.substr(0, 8);
            const letra = dni.substr(8, 1).toUpperCase();
            // Comprobamos si la letra coincide con la calculada
            esValido = (letra === letras[numero % 23] ? true : false);
        }

        return esValido;
    }

    // Función auxiliar: Validar NIE (X, Y, Z se convierten en 0, 1, 2)
    function validarNIE(nie) {
        const letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        const regex = /^[XYZ][0-9]{7}[A-Z]$/i;
        let esValido = false;

        if (regex.test(nie)) {
            let num = nie.substr(1, 7);
            const letra = nie.substr(8, 1).toUpperCase();
            const inicial = nie.substr(0, 1);

            // Sustituir letra inicial por número
            if (inicial === 'X') num = '0' + num;
            else if (inicial === 'Y') num = '1' + num;
            else if (inicial === 'Z') num = '2' + num;

            esValido = (letra === letras[num % 23] ? true : false);
        }
        return esValido;
    }

    // Función auxiliar: Validar Soporte TIE (E + 8 dígitos)
    function validarSoporteTIE(soporte) {
        const regex = /^E[0-9]{8}$/i;
        return regex.test(soporte);
    }

    // Función visual: Muestra el error
    function campoColorear(id1, id2) {
        document.getElementById(id1).style.visibility = "visible";
        document.getElementById(id2).style.borderColor = "red";
    }

    // Función visual: Oculta el error
    function limpiarError(id1, id2) {
        document.getElementById(id1).style.visibility = "hidden";
        document.getElementById(id2).style.borderColor = "#dee2e6";
    }
</script>

</html>