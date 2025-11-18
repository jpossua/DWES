<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 4 - Ejercicio 11</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>

</body>
<?php
// Creo un objeto de la clase  'comodin' stdclass
$miModulo = new stdClass();
var_dump($miModulo);

// Creo atributos sobre la marcha
$miModulo->nombre = "Desarrollo web entorno servidor";
$miModulo->acronimo = "DWES";
$miModulo->curso = 2;

echo "<p>Esto es lo que tiene ahora miModulo</p>";
var_dump($miModulo);

// convierto mi objeto explicito en array
$miModuloArray = (array) $miModulo;

echo "<p>esto es lo que tiene mimoduloArray</p>";

var_dump($miModuloArray);

// Vamos a serializar miModuloArray
$miModuloArraySerializada = serialize($miModuloArray);
echo "<p>esto es lo que tiene mimoduloSerializado</p>";
var_dump($miModuloArraySerializada);

// Convierto explicitamente el array en objeto
$miModuloOtraVezObjeto = (object) $miModuloArray;
echo "<p>esto es lo que tiene miModuloOtraVezObjeto</p>";
var_dump($miModuloOtraVezObjeto)

?>

</html>