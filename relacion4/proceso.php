<?php
session_start();
// Función de comprobación para el usuario
function compruebaAcceso($id, $pass)
{
    // Las constantes deben definirse dentro de la función si solo se usan aquí,
    // o fuera si son globales. Es mejor definirlas fuera.
    define("USUARIO_CORRECTO", "Ali Baba");
    define("CONTRASENA_CORRECTA", "1234");

    return ($id == USUARIO_CORRECTO && $pass == CONTRASENA_CORRECTA);
}

// Variable para guardar el mensaje de resultado
$mensajeHTML = "";

// Comprobamos que los datos se han enviado por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtenemos los datos (con '??' para evitar errores si vienen vacíos)
    $idUsuario = $_POST['idUsuario'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';
    unset($_SESSION["ErrorLogin"]);

    // Comprobamos el acceso y preparamos el mensaje
    if (compruebaAcceso($idUsuario, $contrasena)) {
        // Mensaje de éxito
        echo ('<div class="alert alert-success text-center">¡Acceso concedido! Te hemos encontrado.');
        setcookie("usuario", $idUsuario);
        if (isset($_COOKIE["usuario"])) {
            echo ('<br>Te llamas ' . $_COOKIE["usuario"] . "</div>");
        }

        $_SESSION["usuario"] = $idUsuario;
    } else {
        // Mensaje de error
        // $mensajeHTML = '<div class="alert alert-danger text-center">Acceso denegado. No te hemos encontrado.</div>';
        $_SESSION["ErrorLogin"] = true;
        header("Location: login.php");
    }
} else {
    // Si alguien intenta acceder a proceso.php directamente por la URL
    $mensajeHTML = '<div class="alert alert-danger text-center">Acceso no permitido.</div>';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Acceso</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">

    <main class="container mt-5">
        <section class="row justify-content-center">
            <article class="col-md-6">

                <?php echo $mensajeHTML; ?>

                <div class="text-center mt-3">
                    <a href="login.php" class="btn btn-primary">Volver al formulario</a>
                </div>

            </article>
        </section>
    </main>

</body>

</html>