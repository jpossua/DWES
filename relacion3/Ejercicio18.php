<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 18 - Generador de Menús</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!--ESTILOS CSS-->
    <style>
        .card-menu {
            transition: transform 0.3s;
            border: none;
            border-top: 5px solid #dc3545;
            /* Borde rojo estilo restaurante */
        }

        .card-menu:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .category-label {
            font-weight: bold;
            color: #6c757d;
            text-transform: uppercase;
            font-size: 0.8rem;
        }

        .dish-name {
            font-weight: 500;
            color: #212529;
        }
    </style>
</head>

<body class="bg-primary bg-gradient">


    <header class="bg-dark bg-gradient text-white text-center p-4 mb-4">
        <h1 class="display-4 fw-bold"><i class="bi bi-egg-fried"></i> El Rincón de Málaga</h1>
        <p class="lead">Generador Automático de Sugerencias del Chef</p>
    </header>

    <main class="container">

        <section class="row justify-content-center mb-5">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="d-flex gap-2">
                            <div class="flex-grow-1">
                                <label for="cantidad" class="visually-hidden">Número de menús</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control form-control-lg"
                                    placeholder="¿Cuántos menús quieres sugerir?" min="1" max="10" required
                                    value="<?php echo isset($_POST['cantidad']) ? $_POST['cantidad'] : ''; ?>">
                            </div>
                            <button type="submit" class="btn btn-dark btn-lg">Generar<i class="bi bi-magic"></i></button>
                        </form>
                        <div class="form-text text-center mt-2">Introduce un número (ej: 3) para ver las combinaciones.</div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        // =================================================================
        // DEFINICIÓN DE DATOS (Array Multidimensional)
        // =================================================================
        // Tenemos un array asociativo donde cada clave (entrante, primero...)
        // contiene otro array indexado con los platos.
        $menu = [
            'entrante' => array('Ensalada César', 'Hummus', 'Boquerones al natural'),
            'primero'  => array('Gazpachuelo', 'Salmorejo', 'Ajo Blanco'),
            'segundo'  => array('Fritura Malagueña', 'Conejo al ajillo', 'Pisto con huevo'),
            'postre'   => array('Helado 3 sabores', 'Flan', 'Tarta de Queso')
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $n = intval($_POST['cantidad']);

            if ($n > 0) {
                echo '<div class="row g-4">'; // Inicio del Grid

                // Bucle para generar N menús
                for ($i = 1; $i <= $n; $i++) {
        ?>

                    <div class="col-md-4">
                        <div class="card card-menu h-100 shadow-sm">
                            <div class="card-header bg-white text-center py-3">
                                <h4 class="mb-0 fw-bold">Menú Sugerencia #<?php echo $i; ?></h4>
                            </div>
                            <div class="list-group list-group-flush">

                                <?php
                                // Recorremos las categorías del array original (entrante, primero...)
                                foreach ($menu as $categoria => $listaPlatos) {

                                    // =========================================================
                                    // LÓGICA PRINCIPAL: array_rand
                                    // =========================================================
                                    // array_rand($array) devuelve una CLAVE aleatoria (índice), NO el valor.
                                    // Si $listaPlatos tiene 3 elementos (índices 0, 1, 2), devolverá 0, 1 o 2.
                                    $claveAleatoria = array_rand($listaPlatos);

                                    // Usamos esa clave para sacar el nombre del plato del array.
                                    $platoElegido = $listaPlatos[$claveAleatoria];

                                    // Iconos dinámicos según categoría (usando match de PHP 8)
                                    $icono = match ($categoria) {
                                        'entrante' => 'bi-leaf',
                                        'primero' => 'bi-cup-hot',
                                        'segundo' => 'bi-fire',
                                        'postre' => 'bi-star',
                                        default => 'bi-circle'
                                    };
                                ?>

                                    <div class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <div>
                                            <div class="category-label">
                                                <i class="<?php echo $icono; ?> text-danger me-1"></i>
                                                <?php echo ucfirst($categoria); ?>
                                            </div>
                                            <div class="dish-name"><?php echo $platoElegido; ?></div>
                                        </div>
                                    </div>

                                <?php
                                } // Fin del foreach de categorías 
                                ?>

                            </div>
                            <div class="card-footer bg-white text-center text-muted small">
                                <small>Precio sugerido: 15.90€</small>
                            </div>
                        </div>
                    </div>

        <?php
                } // Fin del for ($i)

                echo '</div>'; // Fin del Grid row

            } else {
                echo '<div class="alert alert-warning text-center">Por favor, introduce un número válido mayor que 0.</div>';
            }
        }
        ?>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>