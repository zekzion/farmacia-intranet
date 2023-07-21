<?php

class Database
{
    private $host;
    private $db;
    private $username;
    private $password;
    private $conexion;

    public function __construct($host, $db, $username, $password)
    {
        $this->host = $host;
        $this->db = $db;
        $this->username = $username;
        $this->password = $password;
    }

    public function conectar()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
            $opciones = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $this->conexion = new PDO($dsn, $this->username, $this->password, $opciones);
            return $this->conexion;
        } catch (PDOException $e) {
            echo "Error de conexion: " . $e->getMessage();
            exit;
        }
    }

    public function cerrarConexion()
    {
        $this->conexion = null;
    }
}