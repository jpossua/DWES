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

<body class="bg-light">

    <header class="bg-dark text-white text-center p-4 mb-4">
        <h1 class="fw-bold">Ejercicio 11: Objetos, Arrays y Serialización</h1>
        <p>Manipulación dinámica de objetos stdClass y conversión de tipos</p>
    </header>

    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <?php
                // =======================================================================================
                // 1. CREACIÓN DE OBJETOS DINÁMICOS (stdClass)
                // =======================================================================================
                // stdClass es una clase vacía genérica de PHP.
                // Es útil cuando queremos crear un objeto "al vuelo" sin definir una clase formal.

                $miModulo = new stdClass();

                // Podemos añadir propiedades dinámicamente simplemente asignándoles valor.
                $miModulo->nombre = "Desarrollo web entorno servidor";
                $miModulo->acronimo = "DWES";
                $miModulo->curso = 2;

                echo '<div class="card mb-4 shadow-sm">';
                echo '<div class="card-header bg-primary text-white"><h5>1. Objeto stdClass Inicial</h5></div>';
                echo '<div class="card-body bg-light">';
                echo '<pre>';
                var_dump($miModulo);
                echo '</pre>';
                echo '</div></div>';


                // =======================================================================================
                // 2. CASTING: CONVERSIÓN DE OBJETO A ARRAY
                // =======================================================================================
                // Podemos convertir un objeto en un array asociativo usando (array).
                // Las propiedades del objeto se convierten en claves del array.

                $miModuloArray = (array) $miModulo;

                echo '<div class="card mb-4 shadow-sm">';
                echo '<div class="card-header bg-success text-white"><h5>2. Conversión a Array (Casting)</h5></div>';
                echo '<div class="card-body bg-light">';
                echo '<p>Ahora accedemos como <code>$array["clave"]</code> en lugar de <code>$objeto->propiedad</code>.</p>';
                echo '<pre>';
                var_dump($miModuloArray);
                echo '</pre>';
                echo '</div></div>';


                // =======================================================================================
                // 3. SERIALIZACIÓN
                // =======================================================================================
                // serialize() convierte cualquier estructura de datos (array, objeto) en una CADENA de texto.
                // Esto es útil para guardar datos complejos en una base de datos o en un archivo de texto.

                $miModuloArraySerializada = serialize($miModuloArray);

                echo '<div class="card mb-4 shadow-sm">';
                echo '<div class="card-header bg-warning text-dark"><h5>3. Serialización (serialize)</h5></div>';
                echo '<div class="card-body bg-light">';
                echo '<p>El array se ha convertido en un string especial que PHP sabe interpretar.</p>';
                echo '<div class="alert alert-secondary text-break font-monospace">';
                echo $miModuloArraySerializada;
                echo '</div>';
                echo '</div></div>';


                // =======================================================================================
                // 4. CASTING INVERSO: ARRAY A OBJETO
                // =======================================================================================
                // También podemos convertir un array asociativo de vuelta a un objeto stdClass usando (object).

                $miModuloOtraVezObjeto = (object) $miModuloArray;

                echo '<div class="card mb-4 shadow-sm">';
                echo '<div class="card-header bg-info text-white"><h5>4. Reconversión a Objeto (Casting)</h5></div>';
                echo '<div class="card-body bg-light">';
                echo '<pre>';
                var_dump($miModuloOtraVezObjeto);
                echo '</pre>';
                echo '</div></div>';
                ?>

            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>