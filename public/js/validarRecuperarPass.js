function validarEmailRec(){
    let emailInput = document.getElementById("txtemail-validar");
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

// desactivar boton login si no hay ningun campo con datos
function validarEntrada() {
    let email = document.getElementById("txtemail-validar").value;

    let botonLogin = document.getElementById("boton-inicio-sesion");

    // habilitar o deshabilitar
    botonLogin.disabled = email.length <= 0;
}
