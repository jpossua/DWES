<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 01</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 01</h1>
    <h3 style='color:red;'>Prueba</h3>
    <?php
    $nombre = "Jose Manuel"; // Las variables empiezan por $ y no son fuertemente tipado
    echo "Hola Mundo $nombre"; // Una variable entre comillas dobles es sustituida por su valor
    echo '<br> Hola Mundo'; // Puedo usar comillas simples
    echo '<br> Hola ', $nombre; // La variable $ no se interpreta entre comillas simples
    echo "<br>Hola ", strtoupper($nombre); // Pone la variable en mayúscula
    echo "<br> Hoy es " . date("y-m-d") . " a las " . date("h:m:s");
    echo "<br>", phpversion(); // Muestra la versión del php
    echo "<br>", phpinfo(); // Muestra toda la información de php

    /* 
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ea dolorum ullam odio ipsum sed mollitia, rem vitae, 
    vel blanditiis neque iste ratione explicabo debitis quisquam sequi, tempora quasi doloribus tenetur. 
    */ // /**/ Hace que el comentario puede tener comentario con salto de lineas
    ?>

</body>

</html>
