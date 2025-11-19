<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 20 - Seguridad en Formularios</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">

    <header class="bg-success text-white text-center p-4 mb-4">
        <h1 class="fw-bold"><i class="bi bi-shield-lock"></i> Formulario Seguro</h1>
        <p>Sanitización (Filter) y Validación (Regex) en PHP</p>
    </header>

    <main class="container">

        <?php
        // INICIALIZACIÓN DE VARIABLES
        $nombre = $email = $edad = $sitioWeb = $codigo = "";
        $errores = []; // Array para guardar mensajes de error
        $datosValidos = false;

        // FUNCIÓN DE LIMPIEZA BÁSICA (Helper)
        // Elimina espacios, barras invertidas y convierte caracteres especiales
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // 1. VALIDAR NOMBRE (String con Regex)
            // Limpieza básica primero
            $nombre = test_input($_POST["nombre"]);
            // preg_match: Solo permitimos letras y espacios (incluyendo tildes básicas)
            if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/", $nombre)) {
                $errores['nombre'] = "Solo se permiten letras y espacios en blanco.";
            } elseif (empty($nombre)) {
                $errores['nombre'] = "El nombre es obligatorio.";
            }

            // 2. VALIDAR EMAIL (Filter)
            $email = test_input($_POST["email"]);
            // A. Sanitizar: Elimina caracteres ilegales de un email
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            // B. Validar: Comprueba si el formato es correcto
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "Formato de correo inválido.";
            }

            // 3. VALIDAR SITIO WEB (URL)
            $sitioWeb = test_input($_POST["sitioWeb"]);
            if (!empty($sitioWeb)) {
                // A. Sanitizar URL
                $sitioWeb = filter_var($sitioWeb, FILTER_SANITIZE_URL);
                // B. Validar URL
                if (!filter_var($sitioWeb, FILTER_VALIDATE_URL)) {
                    $errores['sitioWeb'] = "URL no válida (debe contener protocolo, ej: http://).";
                }
            }

            // 4. VALIDAR EDAD (Entero en un rango)
            // filter_var con opciones avanzadas
            $edadInput = $_POST["edad"];
            $opcionesEdad = array(
                "options" => array("min_range" => 18, "max_range" => 120)
            );

            if (!filter_var($edadInput, FILTER_VALIDATE_INT, $opcionesEdad)) {
                $errores['edad'] = "Debes tener entre 18 y 120 años.";
                $edad = $edadInput; // Guardamos lo escrito para mostrarlo, aunque esté mal
            } else {
                $edad = $edadInput;
            }

            // 5. VALIDAR CÓDIGO PERSONALIZADO (Regex Compleja)
            // Imaginemos un código que debe ser: 2 letras mayúsculas, guion, 4 números. (Ej: AB-1234)
            $codigo = test_input($_POST["codigo"]);
            if (!preg_match("/^[A-Z]{2}-\d{4}$/", $codigo)) {
                $errores['codigo'] = "El código debe seguir el formato XX-0000 (2 Mayúsculas, guion, 4 números).";
            }

            // COMPROBACIÓN FINAL
            if (empty($errores)) {
                $datosValidos = true;
            }
        }
        ?>

        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php if ($datosValidos): ?>
                    <div class="alert alert-success shadow">
                        <h4 class="alert-heading">¡Datos Procesados Correctamente!</h4>
                        <p>Los datos han pasado todos los controles de seguridad del servidor.</p>
                        <hr>
                        <ul>
                            <li><strong>Nombre:</strong> <?php echo $nombre; ?></li>
                            <li><strong>Email:</strong> <?php echo $email; ?></li>
                            <li><strong>Web:</strong> <?php echo $sitioWeb; ?></li>
                            <li><strong>Edad:</strong> <?php echo $edad; ?></li>
                            <li><strong>Código:</strong> <?php echo $codigo; ?></li>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="card shadow">
                    <div class="card-header bg-white">
                        <h5>Validación Segura</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" novalidate>

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre completo:</label>
                                <input type="text" class="form-control <?php echo isset($errores['nombre']) ? 'is-invalid' : ''; ?>"
                                    name="nombre" id="nombre" value="<?php echo $nombre; ?>">
                                <div class="invalid-feedback"><?php echo $errores['nombre'] ?? ''; ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control <?php echo isset($errores['email']) ? 'is-invalid' : ''; ?>"
                                    name="email" id="email" value="<?php echo $email; ?>">
                                <div class="invalid-feedback"><?php echo $errores['email'] ?? ''; ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="sitioWeb" class="form-label">Sitio Web (Opcional):</label>
                                <input type="text" class="form-control <?php echo isset($errores['sitioWeb']) ? 'is-invalid' : ''; ?>"
                                    name="sitioWeb" id="sitioWeb" placeholder="https://..." value="<?php echo $sitioWeb; ?>">
                                <div class="invalid-feedback"><?php echo $errores['sitioWeb'] ?? ''; ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="edad" class="form-label">Edad (18-120):</label>
                                <input type="number" class="form-control <?php echo isset($errores['edad']) ? 'is-invalid' : ''; ?>"
                                    name="edad" id="edad" value="<?php echo $edad; ?>">
                                <div class="invalid-feedback"><?php echo $errores['edad'] ?? ''; ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="codigo" class="form-label">Código Promocional (Ej: ES-2024):</label>
                                <input type="text" class="form-control <?php echo isset($errores['codigo']) ? 'is-invalid' : ''; ?>"
                                    name="codigo" id="codigo" value="<?php echo $codigo; ?>">
                                <div class="form-text">Formato requerido: 2 Mayúsculas, un guion y 4 números.</div>
                                <div class="invalid-feedback"><?php echo $errores['codigo'] ?? ''; ?></div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Validar Datos</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>