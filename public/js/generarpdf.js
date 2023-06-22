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
    for (let j = 0; j < filas.length; j++) {
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
    doc.save("Documento.pdf");
}


    document.getElementById("exportar-btn").addEventListener("click", function (){
        // crear nuevo pdf
        let doc = new jspdf.jsPDF();

        let chartAltura = 100;
        let espacioVertical = 20;
        let espacioDisponible = doc.internal.pageSize.getHeight() - espacioVertical;
        let espacioVerticalActual = espacioVertical;


        // añadir titulo principal al documento
        let tituloDoc = "Reporte";
        // generar fecha
        let fechaHora = new Date();
        let fechaFormateado = fechaHora.toLocaleDateString();
        // generar hora
        let horaFormateado = fechaHora.toLocaleTimeString();


        doc.setFontSize(16);
        doc.text(tituloDoc + " generado el " + fechaFormateado + " a las " + horaFormateado, 10, espacioVerticalActual);

        espacioVerticalActual += 20;


        // titulos de graficos
        let charts = [
            {id: "chartVentas", titulo: "Grafico 1: Ventas Mensuales(Nuevos Soles)"},
            {id: "chartCategorias", titulo: "Grafico 2: Categorías de producto mas vendidas"},
            {id: "chartProductosMasVendidos", titulo: "Grafico 3: Productos más vendidos"},
            {id: "chartProductosMenosVendidos", titulo: "Grafico 4: Productos menos vendidos"},
        ];

        // bucle para los graficos
        charts.forEach(function (chart) {
            let chartCanvas = document.getElementById(chart.id);
            let chartImg = chartCanvas.toDataURL("imagen.png");

            let pdfAncho = doc.internal.pageSize.getWidth() - 20;
            let pdfAlto = (chartCanvas.height / chartCanvas.width) * pdfAncho;

            if (espacioVerticalActual + pdfAlto > espacioDisponible) {
                doc.addPage();
                espacioVerticalActual = espacioVertical;
            }

            doc.text(chart.titulo, 10, espacioVerticalActual);
            doc.addImage(chartImg, "PNG", 10, espacioVerticalActual + 10, pdfAncho, pdfAlto);

            espacioVerticalActual += pdfAlto + espacioVertical;
        });

        // guardar pdf
        doc.save("graficos.pdf");
    });
