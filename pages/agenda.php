<?php


$eventos = array(
    array(
        "titulo" => "Evento 1",
        "inicio" => "2023-06-24"
    ),
    array(
        "titulo" => "Evento 2",
        "inicio" => "2023-06-26"
    )
);
header("Content-Type: application/json");
echo json_encode($eventos);