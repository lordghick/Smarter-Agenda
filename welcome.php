<?php

include_once "app/conexion.inc.php";
include_once "app/validadorLogin.inc.php";
include_once "app/controlSesion.inc.php";
include_once "app/redireccion.inc.php";

// Redireccion :: redirigir($index); los redirects son relativos a la pagina donde se utilizan, no a donde está la clase

if (isset($_POST['login'])) {
    Conexion::abrirConexion();
    $validador = new ValidadorLogin($_POST['email'], $_POST['password'], Conexion::obtenerConexion());

    if ($validador->getError() == "" && !is_null($validador->getUsuario())) {
        ControlSesion::IniciarSesion($validador->getUsuario()->getId(), $validador->getUsuario()->getNombre());

        echo "TODO CORECTO PAPU";
    } else {
        echo "mano quejestooo";
    }

    Conexion::cerrarConexion();
}

//Acá abajo, si la sesion está iniciada te manda al index, si no renderiza el login, y si clickeas registro renderiza el registro

if (ControlSesion::sesionIniciada()) {
    Redireccion::redirigir($index);
}

if(isset($_POST['registro'])){
    include_once 'plantillas/formRegistro.php';
}else{
    include_once 'plantillas/formLogin.php';
}