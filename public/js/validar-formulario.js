// validar usuario
function validarUsuario() {
    let usuarioInput = document.getElementById("username");
    let usuario = usuarioInput.value.trim();
    // regex para validacion
    let usuarioRegex = /^[a-zA-Z0-9_]{3,20}$/;

    if (!usuarioRegex.test(usuario)) {
        alert("El nombre de usuario debe tener entre 3 a 20 caracteres alfanumericos");
        usuarioInput.focus();
        return false;
    }
    return true;
}

// validar email
function validarEmail(){
    let emailInput = document.getElementById("email");
    let email = emailInput.value.trim();
    // regex para email
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
        alert("Ingresa un email válido!!");
        emailInput.focus();
        return false;
    }

    return true;
}

// validar nombre y apellido
function validarNombreApellido() {
    let nombreInput = document.getElementById("nombres");
    let apellidosInput = document.getElementById("apellidos");
    let nombres = nombreInput.value.trim();
    let apellidos = apellidosInput.value.trim();

    //regex para los nombres y apellidos
    let nombreApellidoRegex = /^[a-zA-Z\s]+$/;

    if (!nombreApellidoRegex.test(nombres)) {
        alert("Ingresa solo letras en el campo de nombres!");
        nombreInput.focus();
        return false;
    }

    if (!nombreApellidoRegex.test(apellidos)) {
        alert("Ingresa solo letras en el campo de apellidos!");
        apellidosInput.focus();
        return false;
    }

    return true;
}

// validar todos
function validarConfiguracionUsuario() {
    return validarUsuario() && validarEmail() && validarNombreApellido();
}

// vlaidacion del formulario de configuracion de contacto
function validarContacto() {
    let direccionInput = document.getElementById("direccion");
    let ciudadInput = document.getElementById("ciudad");
    let paisInput = document.getElementById("pais");
    let direccion = direccionInput.value.trim();
    let ciudad = ciudadInput.value.trim();
    let pais = paisInput.value.trim();

    //regex para los nombres y apellidos
    let contactoRegex = /^[a-zA-Z\s]+$/;

    if (!contactoRegex.test(direccion)) {
        alert("Ingresa solo letras en el campo de direccion!");
        direccionInput.focus();
        return false;
    }

    if (!contactoRegex.test(ciudad)) {
        alert("Ingresa solo letras en el campo de Ciudad!");
        ciudadInput.focus();
        return false;
    }

    if (!contactoRegex.test(pais)) {
        alert("Ingresa solo letras en el campo de País!");
        paisInput.focus();
        return false;
    }

    return true;
}