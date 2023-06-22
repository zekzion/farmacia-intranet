<?php

$tipo = $_GET["tipo"];


// datos de ventas generados de forma aleatoria
if ($tipo === "ventas_mensuales") {
    // Obtener el mes actual y el año actual
    $mesActual = date('n');
    $yearActual = date('Y');

    // Generar datos de ventas mensuales para el rango de meses
    $ventasMensuales = [];
    for ($mes = 1; $mes <= $mesActual; $mes++) {
        $ventasMensuales[] = rand(1000, 5000);
    }

    // Convertir los datos en un formato adecuado para Chart.js
    $meses = [];
    for ($mes = 1; $mes <= $mesActual; $mes++) {
        $meses[] = date('F', mktime(0, 0, 0, $mes, 1, $yearActual));
    }

    $chartData = [
        'labels' => $meses,
        'data' => $ventasMensuales
    ];

} elseif ($tipo === "cat_mas_vendidas") {
    // Generar datos de productos más vendidos
    $categorias = ["Categoria A", "Categoria B", "Categoria C"];
    $cantidad = [];

    // generar datos aleatorios para la cantidad de productos en cada categoria
    for ($i = 0; $i < 3; $i++) {
        $cantidad[] = rand(20, 50); // array de datos
    }

    $chartData = [
        'labels' => $categorias,
        'data' => $cantidad
    ];
} elseif ($tipo === "prod_mas_vendidos") {
    // Generar datos de productos más vendidos
    $productos = ["Producto A", "Producto B", "Producto C", "Producto D", "Producto E"];
    $cantidad = [];

    // generar datos aleatorios para productos mas vendidos
    for ($i = 0; $i < 5; $i++) {
        $cantidad[] = rand(50, 110); // array de datos
    }

    $chartData = [
        'labels' => $productos,
        'data' => $cantidad
    ];
} elseif ($tipo === "prod_menos_vendidos") {
    // Generar datos de productos menos vendidos
    $productos = ["Producto 1", "Producto 2", "Producto 3", "Producto 4"];
    $cantidad = [];

    // generar datos aleatorios para productos mas vendidos
    for ($i = 0; $i < 4; $i++) {
        $cantidad[] = rand(10, 30); // array de datos
    }

    $chartData = [
        'labels' => $productos,
        'data' => $cantidad
    ];
}

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($chartData);
