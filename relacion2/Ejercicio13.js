/*
* Validaciones para el formulario del ejercicio 13
* Creado por José Manuel Postigo
* Versión 1.0
*/

function validarFormularioNotas() {
    const EMAILREGEX = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    let nombre = document.getElementById("nombre").value.trim();
    let email = document.getElementById("email").value.trim();
    let nota01 = parseFloat(document.getElementById("nota01").value);
    let nota02 = parseFloat(document.getElementById("nota02").value);
    let faltas = parseFloat(document.getElementById("faltas").value);
    let correcto = true;


    if (nombre == "" || /\d/.test(nombre)) {
        alert("El nombre no puede estar vacío y no debe contener números.");
        correcto = false;
    }

    if (nota01 == "" || isNaN(nota01) || (!Number.isInteger(nota01)) || (nota01 < 0 && nota01 > 10)) {
        alert("La primera nota debe ser un número entero entre 0 y 10.");
        correcto = false;
    }

    if (nota02 == "" || isNaN(nota02) || (!Number.isInteger(nota02)) || (nota02 < 0 && nota02 > 10)) {
        alert("La segunda nota debe ser un número entero entre 0 y 10.");
        correcto = false;
    }

    if (faltas == "" || isNaN(faltas) || (!Number.isInteger(faltas)) || (faltas <= 0)) {
        alert("Las faltas debe ser un número entero mayor o igual 0.");
        correcto = false;
    }

    // Validar email
    if (email = "" || !EMAILREGEX.test(email)) {
        alert("Por favor, introduce un correo electrónico válido.");
        correcto = false;
    }

    // Si han ido todas las comprobaciones, se devuelve al punto de llamado TRUE, sino se devuelve FALSE
    return correcto;
}