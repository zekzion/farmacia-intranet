// validar nombre y apellido
function validarNombreApellido() {
    let nombreInput = document.getElementById("nombre-nueva-cuenta");
    let apellidosInput = document.getElementById("apellido-nueva-cuenta");
    let nombres = nombreInput.value.trim();
    let apellidos = apellidosInput.value.trim();

    //regex para los nombres y apellidos
    let nombreApellidoRegex = /^[a-zA-Z\s]+$/;

    if (!nombreApellidoRegex.test(nombres)) {
        alert("Ingresa solo letras en el campo de nombres y apellidos!");
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

// validar email
function validarEmail(){
    let emailInput = document.getElementById("email-nueva-cuenta");
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
// validar Contraseña
function passwordVacio(){
    let passwordInput = document.getElementById("password-nueva-cuenta").value;
    let confirmarPasswordInput = document.getElementById("password-repetir-nueva-cuenta").value;


    if (passwordInput.length === 0 || confirmarPasswordInput.length === 0) {
        alert("Campo de contreñas vacias!");
        return false;
    }
    return true;
}
// validar todos

/****** validar contraseñas de forma automatica sin pulsar el boton enviar ***********/
function validarPass() {
    let passwordInput = document.getElementById("password-nueva-cuenta").value;
    let passwordConfirm = document.getElementById("password-repetir-nueva-cuenta").value;
    let mensaje = document.getElementById("mensaje");

    // si los campos estan vacios
    if (passwordInput === "" || passwordConfirm === "") {
        mensaje.innerHTML = "";
        return;
    }

    // comparar ambos campos de contraseña y mostrar mensajes de exito o error
    if (passwordInput === passwordConfirm) {
        // si se incluyen espacios en los campos
        if (passwordInput.includes(" ")) {
            mensaje.innerHTML = "La contraseña no debe contener espacios";
            mensaje.style.color = "red";
        } else {
            mensaje.innerHTML = "Las contraseña coinciden";
            mensaje.style.color = "green";
        }
        // las contraseñas no son las mismas
    } else {
        mensaje.innerHTML = "Las contraseña no coinciden";
        mensaje.style.color = "red";
    }
}

// validacion automatica de las contraseñas, no se necesita enviar el formulario
function validacionAutomaticaPass() {
    // obetener los elementos inputs de contraseñas
    let pass = document.getElementById("password-nueva-cuenta");
    let confirPass = document.getElementById("password-repetir-nueva-cuenta");

    // añadirle un evento a ambos inputs
    pass.addEventListener("input", validarPass);
    confirPass.addEventListener("input", validarPass);
}

// activar evento cuando la pagina termina de cargar
window.addEventListener("load", validacionAutomaticaPass);

/**************************************************************************************/

// validar todos los campos inputs  cuando se envia el formulario
function validarConfiguracionRegistro() {
    return validarNombreApellido() && validarEmail() && passwordVacio();
}



