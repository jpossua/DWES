<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Swap y Arrays</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-primary bg-gradient vh-100">

    <header class="bg-primary text-white text-center p-4 mb-4">
        <h1>Prueba de Librería: Swap e Inversión</h1>
    </header>

    <main class="container">
        <?php
        // 1. Incluimos la librería
        include 'relacion3.php';
        ?>

        <section class="card shadow mb-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">1. Función swap($n1, $n2)</h5>
            </div>
            <div class="card-body">
                <?php
                $a = 10;
                $b = 99;
                ?>
                <div class="row text-center">
                    <div class="col-md-5">
                        <div class="alert alert-warning">
                            <h6>ANTES</h6>
                            <p>Variable A: <strong><?php echo $a; ?></strong></p>
                            <p>Variable B: <strong><?php echo $b; ?></strong></p>
                        </div>
                    </div>

                    <div class="col-md-2 d-flex align-items-center justify-content-center">
                        <h1>➤</h1>
                    </div>

                    <div class="col-md-5">
                        <div class="alert alert-success">
                            <h6>DESPUÉS (usando swap)</h6>
                            <?php
                            // Llamamos a la función. Al tener '&' en la librería, cambia los valores reales.
                            swap($a, $b);
                            ?>
                            <p>Variable A: <strong><?php echo $a; ?></strong></p>
                            <p>Variable B: <strong><?php echo $b; ?></strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="card shadow">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">2. Función invertirArray($array)</h5>
            </div>
            <div class="card-body">
                <?php
                // Definimos un array de prueba
                $miArray = ["Rojo", "Verde", "Azul", "Amarillo", "Violeta"];
                ?>

                <p>Vamos a invertir el orden de los componentes usando un bucle que llama a <code>swap()</code> internamente.</p>

                <div class="row">
                    <div class="col-md-6">
                        <h5>Array Original:</h5>
                        <ul class="list-group">
                            <?php foreach ($miArray as $valor) echo "<li class='list-group-item'>$valor</li>"; ?>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <h5>Array Invertido:</h5>
                        <?php
                        // Llamamos a la función que modifica el array por referencia
                        invertirArray($miArray);
                        ?>
                        <ul class="list-group">
                            <?php
                            foreach ($miArray as $valor) {
                                echo "<li class='list-group-item list-group-item-info'>$valor</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>