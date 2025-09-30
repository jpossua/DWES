<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 2 - Ejercicio 01</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <h1>Ejercicio 01</h1>

    <form action="" method="get">
        <div>
            <label for="numero1">Introduce número 1:</label>
            <input type="text" name="numero1" id="numero1">
        </div>
        <div>
            <label for="operador">Operador</label>
            <select name="operador" id="operador">
                <option value="suma">+</option>
                <option value="resta">-</option>
                <option value="multiplicación">*</option>
                <option value="división">/</option>
                <option value="resta">%</option>
            </select>
        </div>
        <div>
            <label for="numero2">Introduce número 2:</label>
            <input type="text" name="numero2" id="numero2">
        </div>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>