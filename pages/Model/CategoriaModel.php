<?php
class CategoriaModel
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function agregarCategoria($nombre, $descripcion) {
        $sql = "insert into categorias (nombre, descripcion) VALUES (?, ?)";
        $query = $this->conexion->prepare($sql);
        $query->execute([$nombre, $descripcion]);
    }

    public function actualizarCategoria($id, $nombre, $descripcion) {
        $sql = "update categorias set nombre = ?, descripcion = ?, fecha_ultima_edicion = CURRENT_TIMESTAMP where id_categoria = ?";
        $query = $this->conexion->prepare($sql);
        $query->execute([$nombre, $descripcion, $id]);
    }

    public function obtenerCategorias() {
        $sql = "select * from Categorias";
        $query = $this->conexion->query($sql);
        return $query->fetchAll();
    }
}