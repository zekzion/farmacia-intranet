
// obtener los los elementos canvas para generar los graficos
let chartVentasMensuales = document.getElementById('chartVentas').getContext('2d');
let chartCatMasVend = document.getElementById('chartCategorias').getContext('2d');
let chartProdMasVend = document.getElementById('chartProductosMasVendidos').getContext('2d');
let chartProdMenVend = document.getElementById('chartProductosMenosVendidos').getContext('2d');

// Obtener los datos de ingresos mensuales  del archivo PHP utilizando AJAX
fetch('datos_ventas.php?tipo=ventas_mensuales')
    .then(function (response) {
        return response.json();
    })
    .then(function (chartData) {
        let chart1 = new Chart(chartVentasMensuales, {
            type: 'line',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Ventas Mensuales',
                    data: chartData.data,
                    backgroundColor: 'rgba(78, 115, 223, 0.05)',
                    borderColor: 'rgba(78, 115, 223, 1)',
                    borderWidth: 3
                }]
            },
            options: {
                legend: {
                    "display": false,
                    "labels": {
                        "fontStyle": "normal"
                    },
                    "position": "top"
                },
                responsive: true,
                scales: {
                    yAxes: [{
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            drawTicks: false,
                            borderDash: ["2"],
                            zeroLineBorderDash: ["2"]
                        }, ticks: {
                            fontColor: "#858796",
                            fontStyle: "normal",
                            beginAtZero: true,
                            padding: 20
                        }
                    }]
                }
            }
        });
    });

// Obtener los datos de categorias mas vendidas  del archivo PHP utilizando AJAX
fetch('datos_ventas.php?tipo=cat_mas_vendidas')
    .then(function (response) {
        return response.json();
    })
    .then(function (chartData) {
        let chart1 = new Chart(chartCatMasVend, {
            type: 'doughnut',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Categorias Mas Vendidas',
                    data: chartData.data,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    borderWidth: 3,
                    hoverOffset: 4
                }]
            },
            options: {
                legend: {
                    "display": true,
                    "labels": {
                        "fontStyle": "normal"
                    },
                    "position": "bottom"
                },
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                    }
                }
            },

        });
    });


// Obtener los datos del os productos mas vendidos  del archivo PHP utilizando AJAX
fetch('datos_ventas.php?tipo=prod_mas_vendidos')
    .then(function (response) {
        return response.json();
    })
    .then(function (chartData) {
        let chart1 = new Chart(chartProdMasVend, {
            type: 'bar',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Productos Mas Vendidos',
                    data: chartData.data,
                    backgroundColor: [
                        'rgba(255,99,132,0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(255, 205, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(255, 205, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                legend: {
                    "display": false,
                    "labels": {
                        "fontStyle": "normal"
                    },
                    "position": "top"
                },
                responsive: true,
                scales: {
                    "xAxes": [{
                        "gridLines": {
                            "color": "rgb(234, 236, 244)",
                            "zeroLineColor": "rgb(234, 236, 244)",
                            "drawBorder": false,
                            "drawTicks": false,
                            "borderDash": ["2"],
                            "zeroLineBorderDash": ["2"],
                            "drawOnChartArea": false
                        }, "ticks": {"fontColor": "#858796", "fontStyle": "normal", "beginAtZero": true, "padding": 20}
                    }],
                    "yAxes": [{
                        "gridLines": {
                            "color": "rgb(234, 236, 244)",
                            "zeroLineColor": "rgb(234, 236, 244)",
                            "drawBorder": false,
                            "drawTicks": false,
                            "borderDash": ["2"],
                            "zeroLineBorderDash": ["2"]
                        }, "ticks": {
                            "fontColor": "#858796",
                            "fontStyle": "normal",
                            "beginAtZero": true,
                            "padding": 20
                        }
                    }]
                }
            }
        });
    });

// Obtener los datos del os productos menos vendidos  del archivo PHP utilizando AJAX
fetch('datos_ventas.php?tipo=prod_menos_vendidos')
    .then(function (response) {
        return response.json();
    })
    .then(function (chartData) {
        let chart1 = new Chart(chartProdMenVend, {
            type: 'bar',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Productos Mas Vendidos',
                    data: chartData.data,
                    backgroundColor: [
                        'rgba(255, 205, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                    ],
                    borderColor: [
                        'rgba(255, 205, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                legend: {
                    "display": false,
                    "labels": {
                        "fontStyle": "normal"
                    },
                    "position": "top"
                },
                responsive: true,
                scales: {
                    "xAxes": [{
                        "gridLines": {
                            "color": "rgb(234, 236, 244)",
                            "zeroLineColor": "rgb(234, 236, 244)",
                            "drawBorder": false,
                            "drawTicks": false,
                            "borderDash": ["2"],
                            "zeroLineBorderDash": ["2"],
                            "drawOnChartArea": false
                        }, "ticks": {"fontColor": "#858796", "fontStyle": "normal", "beginAtZero": true, "padding": 20}
                    }],
                    "yAxes": [{
                        "gridLines": {
                            "color": "rgb(234, 236, 244)",
                            "zeroLineColor": "rgb(234, 236, 244)",
                            "drawBorder": false,
                            "drawTicks": false,
                            "borderDash": ["2"],
                            "zeroLineBorderDash": ["2"]
                        }, "ticks": {
                            "fontColor": "#858796",
                            "fontStyle": "normal",
                            "beginAtZero": true,
                            "padding": 20
                        }
                    }]
                }
            }
        });
    });

/*
let x = {
    "type": "line",
    "data": {
        "labels": ["En", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ag"],
        "datasets": [{
            "label": "Ingresos",
            "fill": true,
            "data": ["1350", "2000", "3000", "2000", "1505", "4000", "3500", "5500"],
            "backgroundColor": "rgba(78, 115, 223, 0.05)",
            "borderColor": "rgba(78, 115, 223, 1)"
        }]
    },
    "options": {
        "maintainAspectRatio": false,
        "legend": {"display": false, "labels": {"fontStyle": "normal"}, "position": "top"},
        "title": {"fontStyle": "normal", "display": false},
        "scales": {
            "xAxes": [{
                "gridLines": {
                    "color": "rgb(234, 236, 244)",
                    "zeroLineColor": "rgb(234, 236, 244)",
                    "drawBorder": false,
                    "drawTicks": false,
                    "borderDash": ["2"],
                    "zeroLineBorderDash": ["2"],
                    "drawOnChartArea": false
                }, "ticks": {"fontColor": "#858796", "fontStyle": "normal", "padding": 20}
            }],
            "yAxes": [{
                "gridLines": {
                    "color": "rgb(234, 236, 244)",
                    "zeroLineColor": "rgb(234, 236, 244)",
                    "drawBorder": false,
                    "drawTicks": false,
                    "borderDash": ["2"],
                    "zeroLineBorderDash": ["2"],
                    "drawOnChartArea": true
                }, "ticks": {"fontColor": "#858796", "fontStyle": "normal", "padding": 20}
            }]
        }
    }
}
*/

/***** estilos para la barra de productos mas/menos vendidos *

 let x = {
    "type": "bar",
    "data": {
        "labels": ["Producto 1", "Producto 2", "Producto 3", "Producto 4"],
        "datasets": [{
            "label": "Vendidos",
            "backgroundColor": "#4e73df",
            "borderColor": "#4e73df",
            "data": ["1000", "2000", "3000", "4000"]
        }]
    },
    "options": {
        "maintainAspectRatio": false,
        "legend": {"display": false, "labels": {"fontStyle": "normal"}},
        "title": {"fontStyle": "normal"},
        "scales": {
            "xAxes": [{
                "gridLines": {
                    "color": "rgb(234, 236, 244)",
                    "zeroLineColor": "rgb(234, 236, 244)",
                    "drawBorder": false,
                    "drawTicks": false,
                    "borderDash": ["2"],
                    "zeroLineBorderDash": ["2"],
                    "drawOnChartArea": false
                }, "ticks": {"fontColor": "#858796", "fontStyle": "normal", "beginAtZero": true, "padding": 20}
            }],
            "yAxes": [{
                "gridLines": {
                    "color": "rgb(234, 236, 244)",
                    "zeroLineColor": "rgb(234, 236, 244)",
                    "drawBorder": false,
                    "drawTicks": false,
                    "borderDash": ["2"],
                    "zeroLineBorderDash": ["2"]
                }, "ticks": {"fontColor": "#858796", "fontStyle": "normal", "beginAtZero": true, "padding": 20}
            }]
        }
    }
} */

/* estilos para el grafico de categorias mas vendidas
let x = {
    "type": "doughnut",
    "data": {
        "labels": ["Categoría 1", "Categoría 2", "Categoría 3"],
        "datasets": [{
            "label": "",
            "backgroundColor": ["#4e73df", "#1cc88a", "#36b9cc"],
            "borderColor": ["#ffffff", "#ffffff", "#ffffff"],
            "data": ["50", "30", "15"]
        }]
    },
    "options": {
        "maintainAspectRatio": false,
        "legend": {"display": false, "labels": {"fontStyle": "normal"}},
        "title": {"fontStyle": "normal"}
    }
} */