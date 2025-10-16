<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 20</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-text {
            visibility: hidden;
        }
    </style>
</head>

<body class="bg-primary bg-gradient vh-100">
    <header class="card-header text-center">
        <h1 class="mb-0 text-light fw-bold p-3"><u>Ejercicio 20</u></h1>
    </header>
    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 bg-info-subtle shadow">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" id="form">
                        <div class="mb-3">
                            <label for="numero" class="form-label">Número decimal mayor o igual a 0:</label>
                            <input type="number" class="form-control" id="numero" name="numero">
                            <div id="numeroHelp" class="form-text text-danger">El número es obligatorio y debe ser entero no negativo.</div>
                        </div>
                        <div class="mb-3">
                            <label for="base" class="form-label">Convertir a:</label>
                            <select class="form-select" id="base" name="base" required>
                                <option value="" disabled selected>Selecciona una base</option>
                                <option value="binario">Binario (base 2)</option>
                                <option value="octal">Octal (base 8)</option>
                                <option value="hexadecimal">Hexadecimal (base 16)</option>
                            </select>
                            <div id="baseHelp" class="form-text text-danger" style="visibility: hidden;">Debes seleccionar una base.</div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Convertir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php
    if (isset($_GET['numero']) && isset($_GET['base']) && $_GET['base'] !== '') {
        $numero_original = $_GET['numero'];
        $base_seleccionada = $_GET['base'];

        if ($numero_original === '' || !is_numeric($numero_original)) {
            echo "<div class='alert alert-danger mt-4 text-center'>El número debe ser un valor numérico válido.</div>";
        } else {
            $numero = intval($numero_original);
            if ($numero < 0) {
                echo "<div class='alert alert-danger mt-4 text-center'>El número debe ser mayor o igual que 0.</div>";
            } else {
                $base = match ($base_seleccionada) {
                    'binario' => 2,
                    'octal' => 8,
                    'hexadecimal' => 16,
                    default => 10
                };

                if ($numero == 0) {
                    $resultado = "0";
                } else {
                    $temp = $numero;
                    $resultado = "";
                    while ($temp > 0) {
                        $digito = $temp % $base;
                        $caracter = $digito < 10 ? (string)$digito : chr(55 + $digito);
                        $resultado = $caracter . $resultado;
                        $temp = intval($temp / $base);
                    }
                }

                $nombre_base = match ($base_seleccionada) {
                    'binario' => 'binaria',
                    'octal' => 'octal',
                    'hexadecimal' => 'hexadecimal',
                    default => 'desconocida'
                };

                echo "<div class='alert alert-info mt-4 text-center'>";
                echo "<h4>El número <strong>{$numero}</strong> en representación <strong>{$nombre_base}</strong> es: <strong>{$resultado}</strong></h4>";
                echo "</div>";
            }
        }
    }
    ?>

    <script>
        document.getElementById('form').addEventListener("submit", function(event) {
            if (!validarFormulario()) {
                event.preventDefault();
            }
        });

        document.getElementById('numero').addEventListener("change", function() {
            limpiarError('numeroHelp', 'numero');
        });

        document.getElementById('base').addEventListener("change", function() {
            limpiarError('baseHelp', 'base');
        });

        function validarFormulario() {
            // Validar número
            const VALOR_NUM = parseInt(document.getElementById("numero").value.trim());
            let validar = true;

            if (isNaN(VALOR_NUM)) {
                alert("Debes introducir un número entero válido.");
                campoErrorColorear('numeroHelp', 'numero');
                validar = false;
            }

            if (VALOR_NUM < 0) {
                alert("El número debe ser mayor o igual que 0.");
                campoErrorColorear('numeroHelp', 'numero');
                validar = false;
            }

            // Validar selección de base
            const baseSelect = document.getElementById("base");
            if (baseSelect.value === "") {
                alert("Debes seleccionar una base de conversión.");
                campoErrorColorear('baseHelp', 'base');
                validar = false;
            }

            return validar;
        }

        function campoErrorColorear(id1, id2) {
            document.getElementById(id1).style.visibility = "visible";
            if (id2 === 'base') {
                document.getElementById(id2).style.borderColor = "red";
            } else {
                document.getElementById(id2).style.borderColor = "red";
            }
        }

        function limpiarError(id1, id2) {
            document.getElementById(id1).style.visibility = "hidden";
            document.getElementById(id2).style.borderColor = "#dee2e6";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>