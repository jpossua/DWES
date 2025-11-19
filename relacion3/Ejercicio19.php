<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 19 - Menú Ponderado con Imágenes</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Carga de Bootstrap CSS 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!--ESTILOS CSS-->
    <style>
        .card-menu {
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            /* Para que la imagen respete el borde redondeado */
        }

        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            /* Recorta la imagen para que encaje bien sin deformarse */
            background-color: #eee;
        }

        .badge-probability {
            font-size: 0.7em;
            background-color: #ffc107;
            color: #000;
        }
    </style>
</head>

<body class="bg-primary bg-gradient">

    <header class="bg-dark bg-gradient text-white text-center p-4 mb-4">
        <h1 class="fw-bold">Menú Inteligente</h1>
        <p class="lead">Sugerencias con probabilidad ponderada (La 3ª opción sale más)</p>
    </header>

    <main class="container pb-5">

        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="d-flex gap-2">
                            <input type="number" name="cantidad" class="form-control" placeholder="Nº de menús" min="1" max="12" required value="<?php echo $_POST['cantidad'] ?? ''; ?>">
                            <button type="submit" class="btn btn-dark btn-lg">Generar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // 1. DATOS DEL MENÚ
        $menu = [
            'entrante' => ['Ensalada César', 'Hummus', 'Boquerones al natural'], // Boquerones saldrán más
            'primero'  => ['Gazpachuelo', 'Salmorejo', 'Ajo Blanco'],           // Ajo Blanco saldrá más
            'segundo'  => ['Fritura Malagueña', 'Conejo al ajillo', 'Pisto con huevo'], // Pisto saldrá más
            'postre'   => ['Helado 3 sabores', 'Flan', 'Tarta de Queso']        // Tarta saldrá más
        ];

        // 2. ARRAY DE IMÁGENES (Solo para los primeros)
        // Clave = Nombre del plato exacto, Valor = Ruta relativa
        $imagenesPlatos = [
            'Gazpachuelo' => 'img/gazpachuelo.jpg',
            'Salmorejo'   => 'img/salmorejo.jpg',
            'Ajo Blanco'  => 'img/ajoblanco.jpg'
        ];

        // 3. PROCESAMIENTO
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $n = intval($_POST['cantidad']);

            if ($n > 0) {
                echo '<div class="row g-4">';

                for ($i = 1; $i <= $n; $i++) {

                    // --- FASE A: GENERACIÓN DE DATOS (Antes de pintar HTML) ---
                    // Necesitamos saber qué platos salen para decidir qué imagen poner en la cabecera

                    $menuGenerado = [];
                    $imagenCabecera = 'img/default.jpg'; // Imagen por defecto
                    $platoDestacado = '';

                    foreach ($menu as $categoria => $platos) {

                        // LÓGICA DE PROBABILIDAD PONDERADA
                        // Queremos que el índice 2 (la 3ª opción) salga el doble.
                        // Creamos una "bolsa" virtual de papeletas: [0, 1, 2, 2]
                        // El 0 tiene 25%, el 1 tiene 25%, el 2 tiene 50%.
                        $bolsaIndices = [0, 1, 2, 2];

                        // Sacamos un índice de la bolsa
                        $indiceSorteado = $bolsaIndices[array_rand($bolsaIndices)];

                        $nombrePlato = $platos[$indiceSorteado];

                        // Guardamos el plato generado
                        $menuGenerado[$categoria] = [
                            'nombre' => $nombrePlato,
                            'esPonderado' => ($indiceSorteado == 2) // Para marcarlo visualmente (opcional)
                        ];

                        // GESTIÓN DE IMAGEN (Solo si es 'primero')
                        if ($categoria === 'primero') {
                            $platoDestacado = $nombrePlato;
                            // Verificamos si existe imagen definida para este plato
                            if (array_key_exists($nombrePlato, $imagenesPlatos)) {
                                $imagenCabecera = $imagenesPlatos[$nombrePlato];
                            }
                        }
                    }

                    // --- FASE B: RENDERIZADO HTML (Mostrar la Card) ---
        ?>
                    <div class="col-md-4">
                        <div class="card card-menu h-100">

                            <img src="<?php echo $imagenCabecera; ?>"
                                class="card-img-top"
                                alt="<?php echo $platoDestacado; ?>"
                                onerror="this.src='https://placehold.co/600x400/e9ecef/495057?text=<?php echo urlencode($platoDestacado); ?>'">

                            <div class="card-body">
                                <h5 class="card-title text-center mb-4">Menú #<?php echo $i; ?></h5>
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($menuGenerado as $cat => $item): ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <span>
                                                <strong class="text-uppercase small text-muted"><?php echo $cat; ?>:</strong><br>
                                                <?php echo $item['nombre']; ?>
                                            </span>
                                            <?php if ($item['esPonderado']): ?>
                                                <span class="badge badge-probability rounded-pill" title="Opción con doble probabilidad">★</span>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="card-footer bg-white text-center">
                                <button class="btn btn-sm btn-outline-dark w-100">Seleccionar Menú</button>
                            </div>
                        </div>
                    </div>
        <?php
                }
                echo '</div>';
            }
        }
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>