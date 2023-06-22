function validarAddProducto() {

    // capturar los inputs
    let nombreProdInput = document.getElementById("nombre-producto");
    let categoriaProdInput = document.getElementById("categoria-producto");
    let precioProdInput = document.getElementById("precio-producto");
    let cantidadProdInput = document.getElementById("cantidad-producto");

    // capturar los valores
    let nombreP = nombreProdInput.value.trim();
    let categoriaP = categoriaProdInput.value.trim();
    let precioP = precioProdInput.value.trim();
    let cantidadP = cantidadProdInput.value.trim();

    // regex para validar nombre
    let nombreRegex = /^\p{L}[a-zA-Z0-9ñÑ\s]*$/u;
    let categoriaRegex = /^[a-zA-Z\s]+$/;
    let precioRegex = /^(?!^0\.00$)(([1-9][\d]{0,6})|([0]))\.[\d]{2}$/;
    let cantidaRegex = /^[1-9][0-9]*$/;


    // verificar mediante test() usando regex
    if (!nombreRegex.test(nombreP)) {
        alert("El nombre debe ingresar con un texto.");
        nombreProdInput.focus();
        return false;
    }

    if (!categoriaRegex.test(categoriaP)) {
        alert("La categoria debe ser texto.");
        categoriaProdInput.focus();
        return false;
    }

    if (!precioRegex.test(precioP)) {
        alert("El precio debe tener el formato nn.nn y no ser cero.");
        precioProdInput.focus();
        return false;
    }

    if (!cantidaRegex.test(cantidadP)) {
        alert("La cantidad debe ser mayor a 0");
        cantidadProdInput.focus();
        return false;
    }

    return true;
}