<?php

class Conexion {
    private static $conexion;
    
    public static function abrirConexion() {
        if (!isset(self::$conexion)){
            try {
                self::$conexion = new PDO("mysql:host=localhost; dbname=smarteragenda", 'root', '');
                self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion -> exec('SET CHARACTER SET utf8');
            } catch (PDOException $ex) {
                print "ERROR: " . $ex -> getMessage() . "<br>";
                die();
            }

        }
    }

    public static function cerrarConexion(){
        if (isset(self::$conexion)) {
            self::$conexion = null;
        }
    }

    public static function obtenerConexion(){
        return self::$conexion;
    }
}