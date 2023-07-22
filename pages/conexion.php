<?php


class Conexion
{
    public static function conectar()
    {
        define("servidor", "localhost:3306");
        define("baseDatos", "farmaciaintranetdb");
        define("usuario", "root");
        define("password", "");

        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

        try {
            $conexion = new PDO("mysql:host=" . servidor . "; dbname=" . baseDatos, usuario, password, $opciones);
            return $conexion;

        } catch (Exception $e) {
            die("Error: no hay acceso a la base de datos " . $e->getMessage());
        }
    }
}



