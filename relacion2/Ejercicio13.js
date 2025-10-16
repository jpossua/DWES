/*
* Validaciones para el formulario del ejercicio 13
* Creado por José Manuel Postigo
* Versión 1.0
*/
document.getElementById('form1').addEventListener("submit", function (event) {

    if (!validarFormularioNotas()) {
        event.preventDefault(); // Parar el submit por defecto
    }

});

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
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    let nombre = document.getElementById("nombre").value.trim();
    let email = document.getElementById("email").value.trim();
    let nota01 = parseFloat(document.getElementById("nota01").value);
    let nota02 = parseFloat(document.getElementById("nota02").value);
    let faltas = parseFloat(document.getElementById("faltas").value);
    let correcto = true;


    if (nombre == "" || /\d/.test(nombre)) {
        alert("El nombre no puede estar vacío y no debe contener números.");
        campoErrorColorear("nombreHelp", "nombre");
        correcto = false;
    }

    if (nota01 == "" || isNaN(nota01) || (!Number.isInteger(nota01)) || nota01 < 0 || nota01 > 10) {
        alert("La primera nota debe ser un número entero entre 0 y 10.");
        campoErrorColorear("notaHelp", "nota01");
        correcto = false;
    }

    if (nota02 == "" || isNaN(nota02) || (!Number.isInteger(nota02)) || nota02 < 0 || nota02 > 10) {
        alert("La segunda nota debe ser un número entero entre 0 y 10.");
        campoErrorColorear("notaHelp2", "nota02");
        correcto = false;
    }

    if (faltas == "" || isNaN(faltas) || (!Number.isInteger(faltas)) || (faltas <= 0)) {
        campoErrorColorear("faltasHelp", "faltas");
        alert("Las faltas debe ser un número entero mayor o igual 0.");
        correcto = false;
    }

    // Validar email
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