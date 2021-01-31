<!DOCTYPE html>
<html lang="en">
<?php
include_once 'app/conexion.inc.php';
include_once 'app/usuario.inc.php';
include_once 'app/repositorioUsuario.inc.php';
include_once 'app/validador_registro.inc.php';

    if (isset($_POST['enviar'])) {
        Conexion :: abrirConexion();
        $validador = new ValidadorRegistro($_POST['nombre'], $_POST['email'], $_POST['password1'], $_POST['password2']);
        if ($validador -> registroValido()){
            $usuario = new Usuario('', $validador -> obtenerNombre(), $validador -> obtenerEmail(), $validador -> obtenerPassword(), '');
            $usuarioInsertado = RepositorioUsuario :: insertarUsuarios(Conexion :: obtenerConexion(), $usuario);
            if($usuarioInsertado){
                ECHO "Bello papu";
            }else{
                ECHO "Anti bello :(";
            }
        }

        Conexion :: cerrarConexion();
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="registro.php">
        <div>
            <input class="formInput" type="text" id="nombre" placeholder="Nombre completo" name="nombre">
        </div>
        <div>
            <input type="email" id="email" placeholder="Correo electrónico" name="email">
        </div>
        <div>
            <input type="password" id="password1" placeholder="Contraseña" name="password1">
        </div>
        <div>
            <input type="password" id="password2" placeholder="Repita su contraseña" name="password2">
        </div>
        <button type="submit" class="guardarForm" name="enviar">Registrar usuario</button>
    </form>
</body>

</html>