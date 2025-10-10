/*
* Validaciones para el formulario del ejercicio 12
* Creado por José Manuel Postigo
* Versión 1.0
*/

function validarFormularioNotas() {
    let nombre = document.getElementById("nombre").value;
    let email = document.getElementById("email").value;
    let nota01 = parseFloat(document.getElementById("nota01").value);
    let nota02 = parseFloat(document.getElementById("nota02").value);
    let faltas = parseFloat(document.getElementById("faltas").value);
    let correcto = true;


    if (nombre.trim() == "" || nombre.match("[0-9]")) {
        alert("El cuadro debe contener solo letras o no estar vacío.");
        correcto = false;
    }

    if ((!Number.isInteger(nota01)) || (nota01 < 0 && nota01 >= 10)) {
        alert("La primera nota debe ser un número entero entre 0 y 10.");
        correcto = false;
    }

    if ((!Number.isInteger(nota02)) || (nota02 < 0 && nota02 >= 10)) {
        alert("La segunda nota debe ser un número entero entre 0 y 10.");
        correcto = false;
    }

    if ((!Number.isInteger(faltas)) || (faltas < 0)) {
        alert("Las faltas debe ser un número entero mayor o igual 0.");
        correcto = false;
    }
    if(!email.match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/"))
    // Si han ido todas las comprobaciones, se devuelve al punto de llamado TRUE, sino se devuelve FALSE
    return correcto;
}