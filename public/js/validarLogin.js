// validar email
function validarEmail(){
    let emailInput = document.getElementById("txtemail");
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