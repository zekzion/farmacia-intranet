// validar email


function validarEmail(){
    let emailInput = document.getElementById("txtemail");
    let email = emailInput.value.trim();

    // regex para comprobar el email
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // testear el email mediante su regex
    if (!emailRegex.test(email)) {
        alert("Ingresa un email válido!!");
        emailInput.focus();
        return false;
    }
    return true;
}
// validar Contraseña
function validarPassword(){
    let pwdInput = document.getElementById("txtpassword");
    let pwd = pwdInput.value;

    if (pwd.length === 0) {
        alert("Campo de contreñas vacias!");
        return false;
    }
    if (pwd.includes(" ")) {
        alert("La contraseña no debe contener espacios");
        pwdInput.focus();
        return false;
    }
    return true;
}


// validar todos
function validarConfiguracionLogin() {
    return validarEmail() && validarPassword();
}

// desactivar boton login si no hay ningun campo con datos
function validarCampos() {
    let email = document.getElementById("txtemail").value;
    let pass = document.getElementById("txtpassword").value;

    let botonLogin = document.getElementById("boton-inicio-sesion");

    // habilitar o deshabilitar
    if (email.length > 0 && pass.length > 0) {
        botonLogin.disabled = false;
    } else {
        botonLogin.disabled = true;
    }
}
