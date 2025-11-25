<!DOCTYPE html>
<!-- 
    DOCTYPE: Indica al navegador que este es un documento HTML5.
    html: La etiqueta raíz del documento. 'lang="es"' define el idioma principal como español.
-->
<html lang="es">

<head>
    <!-- 
        head: Contiene metadatos (información sobre el documento) que no se muestran directamente en la página.
        meta charset="UTF-8": Define la codificación de caracteres para soportar tildes, ñ, etc.
        meta viewport: Asegura que la página se vea bien en dispositivos móviles.
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 2 - Ejercicio 01</title>
    <!-- link: Enlaza recursos externos, en este caso, un icono para la pestaña del navegador (favicon). -->
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
</head>

<body>
    <!-- body: Contiene todo el contenido visible de la página web. -->
    <h1>Ejercicio 01</h1>

    <!-- 
        form: Crea un formulario para enviar datos.
        action="": La URL a la que se envían los datos. Si está vacío, se envía a la misma página.
        method="get": Los datos se envían visibles en la URL (ej: ?numero1=5&operador=suma).
    -->
    <!-- 
        form: Crea un formulario para enviar datos.
        action="": La URL a la que se envían los datos. Si está vacío, se envía a la misma página.
        method="get": Los datos se envían visibles en la URL (ej: ?numero1=5&operador=suma).
    -->
    <form action="" method="get">
        <div>
            <!-- label: Etiqueta de texto para un campo de entrada. 'for' debe coincidir con el 'id' del input. -->
            <!-- label: Etiqueta de texto para un campo de entrada. 'for' debe coincidir con el 'id' del input. -->
            <label for="numero1">Introduce número 1:</label>
            <!-- input: Campo de entrada de datos. 'type="text"' permite texto (aunque para números sería mejor 'number'). -->
            <!-- input: Campo de entrada de datos. 'type="text"' permite texto (aunque para números sería mejor 'number'). -->
            <input type="text" name="numero1" id="numero1">
        </div>
        <div>
            <label for="operador">Operador</label>
            <!-- select: Crea un menú desplegable de opciones. -->
            <!-- select: Crea un menú desplegable de opciones. -->
            <select name="operador" id="operador">
                <!-- option: Cada una de las opciones dentro del menú. 'value' es lo que se envía al servidor. -->
                <!-- option: Cada una de las opciones dentro del menú. 'value' es lo que se envía al servidor. -->
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
        <!-- input type="submit": Botón para enviar el formulario. -->
        <input type="submit" value="Enviar">
    </form>
</body>

</html>