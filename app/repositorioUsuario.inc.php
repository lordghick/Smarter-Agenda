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
}