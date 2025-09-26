<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 03</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 03</h1>
    <p>Esta es una lista de algunas variables del servidor:</p>
    <ul>
        <li><strong>DOCUMENT_ROOT:</strong><?php echo $_SERVER['DOCUMENT_ROOT']; ?></li>
        <li><strong>PHP_SELF:</strong><?php echo $_SERVER['PHP_SELF']; ?></li>
        <li><strong>SERVER_NAME:</strong><?php echo $_SERVER['SERVER_NAME']; ?></li>
        <li><strong>SERVER_SOFTWARE:</strong><?php echo $_SERVER['SERVER_SOFTWARE']; ?></li>
        <li><strong>SERVER_PROTOCOL:</strong><?php echo $_SERVER['SERVER_PROTOCOL']; ?></li>
        <li><strong>HTTP_HOST:</strong><?php echo $_SERVER['HTTP_HOST']; ?></li>
        <li><strong>HTTP_USER_AGENT:</strong><?php echo $_SERVER['HTTP_USER_AGENT']; ?></li>
        <li><strong>REMOTE_ADDR:</strong><?php echo $_SERVER['REMOTE_ADDR']; ?></li>
        <li><strong>REMOTE_PORT:</strong><?php echo $_SERVER['REMOTE_PORT']; ?></li>
        <li><strong>SCRIPT_FILENAME:</strong><?php echo $_SERVER['SCRIPT_FILENAME']; ?></li>
        <li><strong>REQUEST_URI:</strong><?php echo $_SERVER['REQUEST_URI']; ?></li>
    </ul>
    <?php
    echo ("<h3>Lista de variables del servidor</h3><br>");
    foreach ($_SERVER as $clave => $valor) {
        echo ("$clave: $valor<br>");
    };
    echo ("<h3>var_dump</h3>");
    echo (var_dump($_SERVER['DOCUMENT_ROOT']));

    echo ("<h3>print_r</h3>");
    echo (print_r($_SERVER['DOCUMENT_ROOT']));

    /*
    var_dump($_SERVER) produce una salida muy detallada, indicando el tipo de cada clave y valor 
    (ej. string(13) "C:\xampp\htdocs"). Es ideal para entender la estructura completa y el tipo 
    de dato de cada elemento.

    print_r($_SERVER) genera una salida más legible y resumida, mostrando la clave y el valor sin
     tanto detalle (ej. [DOCUMENT_ROOT] => C:\xampp\htdocs). Es mejor para una vista rápida del contenido.
    */
    ?>

</html>
