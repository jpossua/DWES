<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 3 - Ejercicio 06</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        .form-text {
            visibility: hidden;
            margin: auto;
        }
    </style>
</head>

<body class="bg-primary bg-gradient min-vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 06 - Dado</u></h1>
    </header>

    <main class="container mt-5">
        <section class="row justify-content-center">
            <article class="col-md-6">
                <div class="card p-4 shadow text-center bg-info-subtle">
                    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                        <div class="mb-3">
                            <label for="num1" class="form-label">Introduce el número de tiradas:</label>
                            <input type="number" class="form-control" id="tiradas" name="tiradas">
                        </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Lanzar Dado</button>
                </div>
                </form>
                </div>
            </article>
        </section>
        <?php
        // ===================================================================================
        // LÓGICA PHP
        // ===================================================================================

        // 1. Comprobamos si se ha enviado el formulario
        if (isset($_GET['tiradas'])) {

            // 2. Convertimos a entero
            $tirada = intval($_GET['tiradas']);

            // 3. Validamos que sea positivo
            if ($tirada <= 0) {
                echo ("<div class='container mt-4'>
      <div class='alert alert-danger text-center'>La tirada debe ser un numero entero positivo (mayor que 0).</div>
      </div>");
            } else {
                // Variables para guardar el resultado de cada tirada individual
                $dado = 0;
                $dadoTruncado = 0;

                /**
                 * PREPARACIÓN DE ARRAYS CONTADORES
                 * --------------------------------
                 * Queremos contar cuántas veces sale cada número (1 al 6).
                 * array_fill(índice_inicial, cantidad, valor)
                 * Creamos un array que empieza en el índice 1, tiene 6 huecos, y todos valen 0.
                 * Indices: [1]=>0, [2]=>0, [3]=>0, [4]=>0, [5]=>0, [6]=>0
                 */
                $contador = array_fill(1, 6, 0);
                $contadorDadoTruncado = array_fill(1, 6, 0);

                // 4. BUCLE DE SIMULACIÓN
                // Repetimos el proceso tantas veces como haya pedido el usuario ($tirada)
                for ($i = 0; $i < $tirada; $i++) {

                    // --- DADO NORMAL (Equiprobable) ---
                    // random_int(1, 6) genera un número aleatorio real entre 1 y 6.
                    $dado = random_int(1, 6);

                    // --- DADO TRUCADO (Trampa) ---
                    // Generamos un número entre 1 y 8.
                    // Si sale 1, 2, 3, 4, 5 -> Esos números.
                    // Si sale 6, 7, 8 -> Cuenta como un 6.
                    // Esto hace que el 6 salga 3 veces más a menudo (3/8 de probabilidad) que los demás (1/8).
                    $dadoTruncado = random_int(1, 8);

                    // 5. Actualizamos contadores
                    // Sumamos 1 a la posición correspondiente del array
                    $contador[$dado]++;

                    // Para el trucado: Si salió 6, 7 u 8, sumamos al contador del 6.
                    $indiceTrucado = ($dadoTruncado < 6) ? $dadoTruncado : 6;
                    $contadorDadoTruncado[$indiceTrucado]++;
                }

                // 6. Calcular porcentajes teóricos (solo para mostrar info)
                $probTeoricaTrucado = [];
                for ($i = 1; $i <= 5; $i++) {
                    $probTeoricaTrucado[$i] = (1 / 8) * 100; // 12.5%
                }
                $probTeoricaTrucado[6] = (3 / 8) * 100; // 37.5%

                // 7. MOSTRAR RESULTADOS
                if ($dado > 0 || $dadoTruncado > 0) {
                    echo ("<div class='alert alert-info mt-4 text-center'>");

                    // --- TABLA 1: DADO NORMAL ---
                    echo ("<h3 class='mb-0 text-center'>Dado Equiprobable</h3>");
                    echo ('<div class="card-body">');
                    echo ('<table class="table table-success table-striped">');
                    echo ('<thead><tr><th>Cara</th><th>Frecuencia</th><th>%</th></tr></thead>');
                    echo ('<tbody>');
                    for ($i = 1; $i <= 6; $i++) {
                        echo ("<tr>");
                        echo ("<td>$i</td>");
                        echo ("<td>{$contador[$i]}</td>"); // Cuántas veces salió
                        // Calculamos porcentaje: (veces / total) * 100
                        echo ("<td>" . number_format((($contador[$i] / $tirada) * 100), 2) . "</td>");
                        echo ("</tr>");
                    }
                    echo ('</tbody></table></div>');

                    // --- TABLA 2: DADO TRUCADO ---
                    echo ("<h3 class='mb-0 text-center'>Dado Trucado</h3>");
                    echo ('<div class="card-body">');
                    echo ('<table class="table table-success table-striped">');
                    echo ('<thead><tr><th>Cara</th><th>Frecuencia</th><th>%</th></tr></thead>');
                    echo ('<tbody>');
                    for ($i = 1; $i <= 6; $i++) {
                        echo ("<tr>");
                        echo ("<td>$i</td>");
                        echo ("<td>{$contadorDadoTruncado[$i]}</td>");
                        echo ("<td>" . number_format((($contadorDadoTruncado[$i] / $tirada) * 100), 2) . "</td>");
                        echo ("</tr>");
                    }
                    echo ('</tbody></table></div>');

                    // Explicación teórica
                    echo '<div class="alert alert-info mt-3">';
                    echo '<i class="fas fa-info-circle me-2"></i>';
                    echo 'En el dado trucado, el número 6 tiene una probabilidad teórica del ';
                    echo '<strong>' . number_format($probTeoricaTrucado[6], 2) . '%</strong>';
                    echo ' frente al <strong>' . number_format((array_sum($probTeoricaTrucado) - $probTeoricaTrucado[6]) / 5, 2) . '%</strong> del dado equiprobable. Con un número elevado de tiradas, las frecuencias observadas deberían aproximarse a estos valores teóricos.';
                    echo  '</div>';
                    echo ("</div>");
                }
            }
        } else {
            echo "<div class='alert alert-warning mt-4 text-center'>No se ha recibido ningun número.</div>";
        }
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>