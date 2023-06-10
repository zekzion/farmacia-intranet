function descargarPDF(idtabla) {


    let doc = new jspdf.jsPDF();

    // titulo de pdf
    doc.text("Lista de Productos", 10, 10);

    // obtener la tabla por id
    let tabla = document.getElementById(idtabla);

    // obtener las filas
    let filas = tabla.getElementsByTagName("tr");

    // obtener el header de la tabla
    let header = [];
    let celdasHeader = filas[0].getElementsByTagName("th");
    for (let i = 0; i < celdasHeader.length-1; i++) {
        header.push(celdasHeader[i].innerText);
    }

    // obtener datos de la tabla, filas de contenido, se coloca en length-1 para no mostrar la columna opciones
    // que contiene los botones, eliminar y editar
    let datos = [];
    for (let j = 0; j < filas.length-1; j++) {
        let fila = filas[j];
        let celdas = fila.getElementsByTagName("td");
        let filaDatos = [];

        for (let k = 0; k < celdas.length-1; k++) {
            filaDatos.push(celdas[k].innerText);
        }
        datos.push(filaDatos);
    }

    // generar pdf
    doc.autoTable({
        head: [header],
        body: datos
    });

    // guardar pdf
    doc.save("tabla-producto.pdf");
}