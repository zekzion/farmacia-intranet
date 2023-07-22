<?php
require_once "../Conexion.php";
class CategoriaModel {
    private $db;

    public function __construct() {
        $this->db = Conexion::getInstancia()->getConexion();
    }

    public function agregarCategoria($nombre, $descripcion, $fechaCreacion, $fechaEdicion) {
        $sql = "insert into  (nombre, descripcion, fecha_creacion, fecha_ultima_edicion) values (:nombre, :descripcion, :fechaCreacion, :fechaEdicion)";
        $query = $this->db->prepare($sql);

        $query->bindParam(":nombre", $nombre);
        $query->bindParam(":descripcion", $descripcion);
        $query->bindParam(":fechaCreacion", $fechaCreacion);
        $query->bindParam(":fechaEdicion", $fechaEdicion);

        $query->execute();
    }

    public function listarCategorias() {
        $sql = "select * from categorias";
        $query = $this->db->query($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoria($id) {
        $sql = "select * from categorias where id_categoria = :id";

        $query = $this->db->prepare($sql);
        $query->bindParam(":id", $id);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCategoria($id, $nombre, $descripcion, $fechaCreacion, $fechaEdicion) {
        $sql = "update empleados set nombre = :nombre, descripcion = :descripcion, fecha_creacion = :fechaC, fecha_ultima_edicion = :fechaE where id = :id";
        $query = $this->db->prepare($sql);

        $query->bindParam(":id", $id);
        $query->bindParam(":nombre", $nombre);
        $query->bindParam(":descripcion", $descripcion);
        $query->bindParam(":fechaC", $fechaCreacion);
        $query->bindParam(":fechaE", $fechaEdicion);

        $query->execute();
    }

    public function eliminarCategoria($id) {
        $sql = "delete from empleados where id = :id";
        $query = $this->db->prepare($sql);

        $query->bindParam(":id", $id);
        $query->execute();
    }
}

