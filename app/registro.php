<!DOCTYPE html>
<html lang="en">
<?php
include_once 'conexion.inc.php';
include_once 'usuario.inc.php';
include_once 'repositorioUsuario.inc.php';
include_once 'validador_registro.inc.php';
include_once 'redireccion.inc.php';

    if (isset($_POST['enviar'])) {
        Conexion :: abrirConexion();
        $validador = new ValidadorRegistro($_POST['nombre'], $_POST['email'], $_POST['password1'], $_POST['password2']);
        if ($validador -> registroValido()){
            $usuario = new Usuario('', $validador -> obtenerNombre(), $validador -> obtenerEmail(), password_hash($validador -> obtenerPassword(), PASSWORD_DEFAULT), '');
            $usuarioInsertado = RepositorioUsuario :: insertarUsuarios(Conexion :: obtenerConexion(), $usuario);
            if($usuarioInsertado){
                Redireccion::redirigir($Correcto);
            }else{
                ECHO "Anti bello :(";
            }
        }

        Conexion :: cerrarConexion();
    }
