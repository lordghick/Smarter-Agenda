<?php

include_once "app/conexion.inc.php";
include_once "app/validadorLogin.inc.php";
include_once "app/controlSesion.inc.php";
include_once "app/redireccion.inc.php";
include_once 'app/usuario.inc.php';
include_once 'app/repositorioUsuario.inc.php';
include_once 'app/validador_registro.inc.php';


// Redireccion :: redirigir($index); los redirects son relativos a la pagina donde se utilizan, no a donde está la clase

if (isset($_POST['login'])) {
    unset($_POST['enviar']);
    Conexion::abrirConexion();
    $validador = new ValidadorLogin($_POST['email'], $_POST['password'], Conexion::obtenerConexion());

    if ($validador->getError() == "" && !is_null($validador->getUsuario())) {
        ControlSesion::IniciarSesion($validador->getUsuario()->getId(), $validador->getUsuario()->getNombre());

        echo "TODO CORECTO PAPU";
    }

    Conexion::cerrarConexion();
}

//Proceso de registro
$registroExitoso = null;
if (isset($_POST['enviar'])) {
    unset($_POST['login']);
    Conexion :: abrirConexion();
    $validador = new ValidadorRegistro($_POST['nombre'], $_POST['email'], $_POST['password1'], $_POST['password2']);
    if ($validador -> registroValido()){
        $usuario = new Usuario('', $validador -> obtenerNombre(), $validador -> obtenerEmail(), password_hash($validador -> obtenerPassword(), PASSWORD_DEFAULT), '');
        $usuarioInsertado = RepositorioUsuario :: insertarUsuarios(Conexion :: obtenerConexion(), $usuario);
        $registroExitoso = true;
        unset($_POST['enviar']);
    }

    Conexion :: cerrarConexion();
}

//Acá abajo, si la sesion está iniciada te manda al index, si no renderiza el login, y si clickeas registro renderiza el registro

if (ControlSesion::sesionIniciada()) {
    Redireccion::redirigir($index, null);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/mystyles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <title>Bienvenida</title>
</head>

<body>
    <?php

    if (isset($_POST['registro']) || isset($_POST['enviar'])) {
        include_once 'plantillas/formRegistro.php';
    } else {
        include_once 'plantillas/formLogin.php';
    }

    ?>

</body>

</html>