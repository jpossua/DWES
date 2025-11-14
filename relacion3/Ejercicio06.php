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
        // Comprobamos si la variable está declarada (formulario enviado)
        if (isset($_GET['tiradas'])) {

            // Convertimos a entero
            $tirada = intval($_GET['tiradas']);

            // Validamos que sean números positivos
            if ($tirada <= 0) {
                echo ("<div class='container mt-4'>
      <div class='alert alert-danger text-center'>La tirada debe ser un numero entero positivo (mayor que 0).</div>
      </div>");
            } else {
                $dado = 0;
                $dadoTruncado = 0;
                /**
                 * Rellena un array con un mismo valor:
                 * array_fill($rimer índice del array devuelto, Número de elementos a insertar, Valor a utilizar para rellenar el array)
                 */
                $contador = array_fill(1, 6, 0);
                $contadorDadoTruncado = array_fill(1, 6, 0);

                for ($i = 0; $i < $tirada; $i++) {
                    $dado = random_int(1, 6);
                    $dadoTruncado = random_int(1, 8);
                    $contador[$dado]++;
                    $contadorDadoTruncado[$dadoTruncado < 6 ? $dadoTruncado : 6]++;
                }

                // Calcular porcentajes teóricos para el dado trucado
                $probTeoricaTrucado = [];
                for ($i = 1; $i <= 5; $i++) {
                    $probTeoricaTrucado[$i] = (1 / 8) * 100;
                }
                $probTeoricaTrucado[6] = (3 / 8) * 100;

                // Cuando el usuario las veces que se lanza el dado crea una tabla para los dos dados
                if ($dado > 0 || $dadoTruncado > 0) {
                    echo ("<div class='alert alert-info mt-4 text-center'>");
                    echo ("<h3 class='mb-0 text-center'>Dado Equiprobable</h3>");
                    echo ('<div class="card-body">');
                    echo ('<table class="table table-success table-striped">');
                    echo ('<thead>');
                    echo ("<tr>");
                    echo ("<th>Cara</th>");
                    echo ("<th>Frecuencia</th>");
                    echo ("<th>%</th>");
                    echo ("</tr>");
                    for ($i = 1; $i <= 6; $i++) {
                        echo ('</thead>');
                        echo ('<tbody>');
                        echo ("<tr>");
                        echo ("<td>");
                        echo ($i);
                        echo ("</td>");
                        echo ("<td>");
                        echo ($contador[$i]);
                        echo ("</td>");
                        echo ("<td>");
                        echo (($contador[$i] / $tirada) * 100);
                        echo ("</td>");
                        echo ("</tr>");
                        echo ('</tbody>');
                    }
                    echo ("</table>");
                    echo ("</div>");
                    echo ("<h3 class='mb-0 text-center'>Dado Truncado</h3>");
                    echo ('<div class="card-body">');
                    echo ('<table class="table table-success table-striped">');
                    echo ('<thead>');
                    echo ("<tr>");
                    echo ("<th>Cara</th>");
                    echo ("<th>Frecuencia</th>");
                    echo ("<th>%</th>");
                    echo ("</tr>");
                    for ($i = 1; $i <= 6; $i++) {
                        echo ('</thead>');
                        echo ('<tbody>');
                        echo ("<tr>");
                        echo ("<td>");
                        echo ($i);
                        echo ("</td>");
                        echo ("<td>");
                        echo ($contadorDadoTruncado[$i]);
                        echo ("</td>");
                        echo ("<td>");
                        echo (($contadorDadoTruncado[$i] / $tirada) * 100);
                        echo ("</td>");
                        echo ("</tr>");
                        echo ('</tbody>');
                    }
                    echo ("</table>");
                    echo ("</div>");
                    echo '<div class="alert alert-info mt-3">';
                    echo '<i class="fas fa-info-circle me-2"></i>';
                    echo 'En el dado trucado, el número 6 tiene una probabilidad teórica del ';
                    echo '<strong>' . number_format($probTeoricaTrucado[6], 2) . '%</strong>';
                    echo ' frente al <strong>' . number_format((array_sum($probTeoricaTrucado)-$probTeoricaTrucado[6])/5, 2) . '%</strong> del dado equiprobable. Con un número elevado de tiradas, las frecuencias observadas deberían aproximarse a estos valores teóricos.';
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