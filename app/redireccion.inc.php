<?php
include_once 'config.inc.php';

class Redireccion {
    public static function redirigir($direccion){
        header('Location: '.$direccion);
        die();
    }
}