<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 2 - Ejercicio 06</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-primary bg-gradient vh-100">

    <div class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 06</u></h1>
    </div>

    <?php
    // Definimos un array multidimensional (un array de arrays).
    // Cada elemento es un array asociativo que representa a una persona.
    $personas = [
        ['nombre' => 'Ana', 'apellido' => 'García', 'correo' => 'ana.garcia@example.com', 'telefono' => '612345678', 'edad' => 28],
        ['nombre' => 'Luis', 'apellido' => 'Martínez', 'correo' => 'luis.martinez@example.com', 'telefono' => '623456789', 'edad' => 34],
        ['nombre' => 'Carla', 'apellido' => 'López', 'correo' => 'carla.lopez@example.com', 'telefono' => '634567890', 'edad' => 22],
        ['nombre' => 'Javier', 'apellido' => 'Rodríguez', 'correo' => 'javier.rodriguez@example.com', 'telefono' => '645678901', 'edad' => 41],
        ['nombre' => 'Marta', 'apellido' => 'Sánchez', 'correo' => 'marta.sanchez@example.com', 'telefono' => '656789012', 'edad' => 29],
        ['nombre' => 'Diego', 'apellido' => 'Fernández', 'correo' => 'diego.fernandez@example.com', 'telefono' => '667890123', 'edad' => 37],
        ['nombre' => 'Lucía', 'apellido' => 'Gómez', 'correo' => 'lucia.gomez@example.com', 'telefono' => '678901234', 'edad' => 25],
        ['nombre' => 'Pablo', 'apellido' => 'Díaz', 'correo' => 'pablo.diaz@example.com', 'telefono' => '689012345', 'edad' => 31],
        ['nombre' => 'Sofía', 'apellido' => 'Pérez', 'correo' => 'sofia.perez@example.com', 'telefono' => '690123456', 'edad' => 26],
        ['nombre' => 'Carlos', 'apellido' => 'Ruiz', 'correo' => 'carlos.ruiz@example.com', 'telefono' => '601234567', 'edad' => 45],
        ['nombre' => 'Elena', 'apellido' => 'Moreno', 'correo' => 'elena.moreno@example.com', 'telefono' => '612345679', 'edad' => 33],
        ['nombre' => 'Raúl', 'apellido' => 'Álvarez', 'correo' => 'raul.alvarez@example.com', 'telefono' => '623456780', 'edad' => 39],
        ['nombre' => 'Clara', 'apellido' => 'Gutiérrez', 'correo' => 'clara.gutierrez@example.com', 'telefono' => '634567891', 'edad' => 27],
        ['nombre' => 'Andrés', 'apellido' => 'Jiménez', 'correo' => 'andres.jimenez@example.com', 'telefono' => '645678902', 'edad' => 36],
        ['nombre' => 'Nuria', 'apellido' => 'Romero', 'correo' => 'nuria.romero@example.com', 'telefono' => '656789013', 'edad' => 30],
        ['nombre' => 'Iván', 'apellido' => 'Hernández', 'correo' => 'ivan.hernandez@example.com', 'telefono' => '667890124', 'edad' => 24],
        ['nombre' => 'Laura', 'apellido' => 'Díaz', 'correo' => 'laura.diaz@example.com', 'telefono' => '678901235', 'edad' => 21],
        ['nombre' => 'Miguel', 'apellido' => 'Torres', 'correo' => 'miguel.torres@example.com', 'telefono' => '689012346', 'edad' => 42],
        ['nombre' => 'Cristina', 'apellido' => 'Vázquez', 'correo' => 'cristina.vazquez@example.com', 'telefono' => '690123457', 'edad' => 35],
        ['nombre' => 'David', 'apellido' => 'Gil', 'correo' => 'david.gil@example.com', 'telefono' => '601234568', 'edad' => 29],
        ['nombre' => 'Patricia', 'apellido' => 'Serrano', 'correo' => 'patricia.serrano@example.com', 'telefono' => '612345680', 'edad' => 32],
        ['nombre' => 'Jorge', 'apellido' => 'Ramos', 'correo' => 'jorge.ramos@example.com', 'telefono' => '623456781', 'edad' => 44],
        ['nombre' => 'Alicia', 'apellido' => 'Blanco', 'correo' => 'alicia.blanco@example.com', 'telefono' => '634567892', 'edad' => 23],
        ['nombre' => 'Fernando', 'apellido' => 'Molina', 'correo' => 'fernando.molina@example.com', 'telefono' => '645678903', 'edad' => 38],
        ['nombre' => 'Beatriz', 'apellido' => 'Castro', 'correo' => 'beatriz.castro@example.com', 'telefono' => '656789014', 'edad' => 27],
        ['nombre' => 'Sergio', 'apellido' => 'Ortega', 'correo' => 'sergio.ortega@example.com', 'telefono' => '667890125', 'edad' => 31],
        ['nombre' => 'Rosa', 'apellido' => 'Delgado', 'correo' => 'rosa.delgado@example.com', 'telefono' => '678901236', 'edad' => 47],
        ['nombre' => 'Antonio', 'apellido' => 'Navarro', 'correo' => 'antonio.navarro@example.com', 'telefono' => '689012347', 'edad' => 50],
        ['nombre' => 'Silvia', 'apellido' => 'Garrido', 'correo' => 'silvia.garrido@example.com', 'telefono' => '690123458', 'edad' => 26],
        ['nombre' => 'Óscar', 'apellido' => 'Pascual', 'correo' => 'oscar.pascual@example.com', 'telefono' => '601234569', 'edad' => 33],
        ['nombre' => 'Eva', 'apellido' => 'Iglesias', 'correo' => 'eva.iglesias@example.com', 'telefono' => '612345681', 'edad' => 28],
        ['nombre' => 'Rubén', 'apellido' => 'Medina', 'correo' => 'ruben.medina@example.com', 'telefono' => '623456782', 'edad' => 36],
        ['nombre' => 'Inés', 'apellido' => 'Crespo', 'correo' => 'ines.crespo@example.com', 'telefono' => '634567893', 'edad' => 22],
        ['nombre' => 'Adrián', 'apellido' => 'León', 'correo' => 'adrian.leon@example.com', 'telefono' => '645678904', 'edad' => 29],
        ['nombre' => 'Teresa', 'apellido' => 'Marín', 'correo' => 'teresa.marin@example.com', 'telefono' => '656789015', 'edad' => 43],
        ['nombre' => 'Víctor', 'apellido' => 'Sanz', 'correo' => 'victor.sanz@example.com', 'telefono' => '667890126', 'edad' => 37],
        ['nombre' => 'Carmen', 'apellido' => 'Núñez', 'correo' => 'carmen.nunez@example.com', 'telefono' => '678901237', 'edad' => 52],
        ['nombre' => 'Hugo', 'apellido' => 'Calvo', 'correo' => 'hugo.calvo@example.com', 'telefono' => '689012348', 'edad' => 25],
        ['nombre' => 'Noelia', 'apellido' => 'Gallego', 'correo' => 'noelia.gallego@example.com', 'telefono' => '690123459', 'edad' => 30],
        ['nombre' => 'Marcos', 'apellido' => 'Vidal', 'correo' => 'marcos.vidal@example.com', 'telefono' => '601234570', 'edad' => 34],
    ];

    // shuffle() mezcla los elementos del array de forma aleatoria.
    shuffle($personas);

    echo ("<h3 class='text-center m-2 text-light'>Listado de Personas</h3>");
    echo ("<div class='table-container'>"); // container-fluid
    echo ("<table class='table table-info table-striped table-bordered text-center w-100'>");
    echo ("<thead><tr>");
    echo ("<th>Nombre</th>");
    echo ("<th>Apellidos</th>");
    echo ("<th>E-mail</th>");
    echo ("<th>Teléfono</th>");
    echo ("<th>Edad</th>");
    echo ("</tr></thead>");
    echo ("<tbody class='table-group-divider'>");
    foreach ($personas as $index => $persona) {
        echo ("<tr>");
        echo ("<td>" . $persona['nombre'] . "</td>");
        echo ("<td>" . $persona['apellido'] . "</td>");
        echo ("<td><a class='text-decoration-none text-primary' href='mailto:'" . $persona['correo'] . ">" . $persona['correo'] . "</a></td>");
        echo ("<td><a class='text-decoration-none text-dark' href='tel:'" . $persona['telefono'] . ">" . $persona['telefono'] . "</a></td>");
        echo ("<td>" . $persona['edad'] . "</td>");
        echo ("</tr>");
    }
    echo ("</tbody>");
    echo ("</table>");
    echo ("</div>");

    ?>
    <!-- Carga de Bootstrap JS al final del body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>