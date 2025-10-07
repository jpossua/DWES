<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 06</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 06</h1>
    <?php
    class Fruta
    {
        //Propiedades
        private string $nombre;
        private string $color;

        // Métodos
        // Constructor
        function __construct($nombre, $color)
        {
            $this->nombre = $nombre;
            $this->color = $color;
        }

        // setter
        function set_name($nombre)
        {
            $this->nombre = $nombre;
        }
        function set_color($color)
        {
            $this->color = $color;
        }

        // getter
        function get_color()
        {
            return $this->color;
        }
        function get_name()
        {
            return $this->nombre;
        }
    }

    $algunaFruta = null;
    $manzana = new Fruta('Manzana', 'roja');
    $platano = new Fruta('Kiwi', 'verde');
    $platano->set_color('amarillo');
    $platano->set_name('Banana');
    echo $manzana->get_name();
    echo ' ' . $manzana->get_color();
    echo "<br>";
    echo $platano->get_name();
    echo ' ' . $platano->get_color();
    echo "<br>";
    ?>
</body>

</html>