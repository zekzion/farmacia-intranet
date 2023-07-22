<?php
require_once "../Model/CategoriaModel.php";

$accion = $_POST['accion'];

if ($accion == 'agregar') {
    $nombre = $_POST['nombre'];
    $decripcion = $_POST['descripcion'];
    $fachaC = $_POST['fecha-c'];
    $fachaE = $_POST['fecha-e'];

    $modelo = new CategoriaModel();
    $modelo->agregarCategoria($nombre, $decripcion, $fachaC, $fachaE);

    echo 'Categoria agregada exitosamente.';
} elseif ($accion == 'listar') {
    $modelo = new EmpleadoModelo();
    $empleados = $modelo->listarEmpleados();

    include "Vista.php";
} elseif ($accion == "obtener") {
    $idEmpleado = $_POST["id"];

    $modelo = new EmpleadoModelo();
    $empleado = $modelo->getEmpleado($idEmpleado);
    echo json_encode($empleado);
} elseif ($accion == "actualizar") {
    $idEmpleado = $_POST["id"];
    $nombre = $_POST["nombreEditar"];
    $cargo = $_POST["cargoEditar"];

    $modelo = new EmpleadoModelo();
    $modelo->updateEmpleado($idEmpleado, $nombre, $cargo);
    echo "Empleado actualizado exitosamente";
} elseif ($accion == "eliminar") {
    $idEmpleado = $_POST["id"];

    $modelo = new EmpleadoModelo();
    $modelo->eliminarEmpleado($idEmpleado);

    echo "Empleado eliminado exitosamente";
}
