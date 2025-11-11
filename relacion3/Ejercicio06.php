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
                            <div id="tiradasHelp" class="form-text text-danger">El número de tiradas debe ser un número entero positivo.</div>
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

      /**
      * Rellena un array con un mismo valor:
      * array_fill($rimer índice del array devuelto, Número de elementos a insertar, Valor a utilizar para rellenar el array)
      */
      $contador = array_fill(0, 6, 0);

      for ($i = 0; $i < $tirada; $i++) {
          $dado=rand(1, 6);
          switch ($dado) {
          case 1:
          $contador[0]++;
          break;
          case 2:
          $contador[1]++;
          break;
          case 3:
          $contador[2]++;
          break;
          case 4:
          $contador[3]++;
          break;
          case 5:
          $contador[4]++;
          break;
          case 6:
          $contador[5]++;
          break;
          }
          }

          for ($i=0; $i < 6; $i++) {
          echo ("<div class='alert alert-info mt-4 text-center'>");
          echo ("<strong>Número de veces que ha salido el " . ($i + 1) . " es: </strong>" . $contador[$i]);
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