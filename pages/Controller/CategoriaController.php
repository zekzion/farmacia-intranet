<?php
use DateTime;
class CategoriaController
{
    private $categoria;

    public function __construct($categoria)
    {
        $this->categoria = $categoria;
    }

    public function index() {
        $categorias = $this->categoria->obtenerCategorias();
        include "View/categorias.php";
    }

    public function agregarCategoria($nombre, $descripcion) {
        $fechaActual = new DateTime();
        $this->categoria->agregarCategoria($nombre, $descripcion);
        header("Location: categorias.php");
        exit;
    }

    public function actualizarCategoria($id, $nombre, $descripcion) {
        $fechaActual = new DateTime();
        $this->categoria->actualizarCategoria($id, $nombre, $descripcion);
        header("Location: categorias.php");
        exit;
    }
}