<?php

class RepositorioUsuario{
    
    public static function obtenerNumeroUsuarios($conexion){
        //Contador de usuarios registrados, útil para promocionarse mas a futuro
        $conteo = null;
        
        if(isset($conexion)){
            
            try
            {
                $sql = 'SELECT COUNT(*) as total FROM usuarios';
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();
                $conteo = $resultado['total'];
            }catch (PDOException $ex)
            {
                print "ERROR" .  $ex -> getMessage();
            }
        }
        return $conteo;
    }

    public static function insertarUsuarios($conexion, $usuario){
        $usuarioInsertado = false;
        if(isset($conexion)){
            try{
                //el id no se inserta porque es auto_increment
                //el NOW no se bindea, puede pasar directo
                $sql = "INSERT INTO usuarios(nombre, email, password, fecha_registro) VALUES(:nombre, :email, :password, NOW())";

                $nombre = $usuario -> getNombre();
                $email = $usuario -> getEmail();
                $password = $usuario -> getPassword();

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> bindParam(':email', $email, PDO::PARAM_STR);
                $sentencia -> bindParam(':password', $password, PDO::PARAM_STR);

                $usuarioInsertado = $sentencia -> execute();


            }catch (PDOException $ex){
                print "ERROR: " . $ex -> getMessage(); 
            }

        }

        return $usuarioInsertado;
    }

    public static function emailLogin($conexion, $email){
            $usuario = null;

            if(isset($conexion)){
                try{
                    include_once 'usuario.inc.php';
                    $sql = "SELECT * FROM usuarios WHERE email = :email";
                    $sentencia = $conexion -> prepare($sql);
                    $sentencia -> bindParam(':email', $email, PDO::PARAM_STR);
                    $sentencia -> execute();
                    $resultado = $sentencia -> fetch();
                    if($resultado){
                        $usuario = new Usuario($resultado['id'], $resultado['nombre'], $resultado['email'], $resultado['password'], $resultado['fecha_registro']);
                    }
                }catch (PDOException $ex){

                }
            }
        return $usuario;
    }
}