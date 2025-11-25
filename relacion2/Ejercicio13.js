/*
* Validaciones para el formulario del ejercicio 13
* Creado por José Manuel Postigo
* Versión 1.0
*/

// Añadimos un 'listener' al evento 'submit' del formulario.
// Esto nos permite ejecutar código antes de que el formulario se envíe.
document.getElementById('form1').addEventListener("submit", function (event) {

    // Si la función validarFormularioNotas() devuelve false, prevenimos el envío.
    if (!validarFormularioNotas()) {
        event.preventDefault(); // Parar el submit por defecto
    }

});

// Listeners para limpiar los errores cuando el usuario cambia el valor de los campos.
document.getElementById('nombre').addEventListener("change", function () {
    limpiarError('nombreHelp', 'nombre');
});
document.getElementById('email').addEventListener("change", function () {
    limpiarError('emailHelp', 'email');
});
document.getElementById('nota01').addEventListener("change", function () {
    limpiarError('notaHelp', 'nota01');
});
document.getElementById('nota02').addEventListener("change", function () {
    limpiarError('notaHelp2', 'nota02');
});
document.getElementById('faltas').addEventListener("change", function () {
    limpiarError('faltasHelp', 'faltas');
});

function validarFormularioNotas() {
    // Expresión regular para validar el formato del email.
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Obtenemos los valores de los campos y eliminamos espacios en blanco con trim().
    let nombre = document.getElementById("nombre").value.trim();
    let email = document.getElementById("email").value.trim();
    // parseFloat convierte la cadena a un número decimal.
    let nota01 = parseFloat(document.getElementById("nota01").value);
    let nota02 = parseFloat(document.getElementById("nota02").value);
    let faltas = parseFloat(document.getElementById("faltas").value);
    let correcto = true;


    // Validamos nombre: no vacío y sin números.
    if (nombre == "" || /\d/.test(nombre)) {
        alert("El nombre no puede estar vacío y no debe contener números.");
        campoErrorColorear("nombreHelp", "nombre");
        correcto = false;
    }

    // Validamos nota01: número, entero, entre 0 y 10.
    // isNaN comprueba si NO es un número.
    if (nota01 == "" || isNaN(nota01) || (!Number.isInteger(nota01)) || nota01 < 0 || nota01 > 10) {
        alert("La primera nota debe ser un número entero entre 0 y 10.");
        campoErrorColorear("notaHelp", "nota01");
        correcto = false;
    }

    // Validamos nota02
    if (nota02 == "" || isNaN(nota02) || (!Number.isInteger(nota02)) || nota02 < 0 || nota02 > 10) {
        alert("La segunda nota debe ser un número entero entre 0 y 10.");
        campoErrorColorear("notaHelp2", "nota02");
        correcto = false;
    }

    // Validamos faltas
    if (faltas == "" || isNaN(faltas) || (!Number.isInteger(faltas)) || (faltas <= 0)) {
        campoErrorColorear("faltasHelp", "faltas");
        alert("Las faltas debe ser un número entero mayor o igual 0.");
        correcto = false;
    }

    // Validar email con regex
    if (email == "" || !emailRegex.test(email)) {
        campoErrorColorear("emailHelp", "email");
        alert("Por favor, introduce un correo electrónico válido.");
        correcto = false;
    }

    // Si han ido todas las comprobaciones, se devuelve al punto de llamado TRUE, sino se devuelve FALSE
    // if(correcto) {document.getElementById("form1").submit();} --> quitar el return y el condicional de arriba.
    return correcto;
}

// Función que colorea si algún campo no cumple los requisitos.
function campoErrorColorear(id1, id2) {
    document.getElementById(id1).style.visibility = "visible";
    document.getElementById(id2).style.borderColor = "red";
}

// Función que colorea si algún campo cumple los requisitos.
function limpiarError(id1, id2) {
    document.getElementById(id1).style.visibility = "hidden";
    document.getElementById(id2).style.borderColor = "#dee2e6";
}