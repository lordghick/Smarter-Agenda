<?php

class RepositorioUsuario{
    public static function obtenerTodos($conexion){
        //función para obtener todos los usuarios, no está siendo utilizada pero se hizo de practica
         $usuarios = array();
         if (isset($conexion)){
             try{
                include_once 'usuario.inc.php';
                $sql = "SELECT * FROM usuarios";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado)){
                    foreach ($resultado as $fila){
                        $usuarios[] = new Usuario($fila['id'], $fila ['nombre'], $fila['email'], $fila['password'], $fila['fecha_registro']);
                    }
                } else{
                    print "NO HAY RESULTADOS";
                }

             } catch (PDOException $ex){
                print "ERROR" . $ex -> getMessage();
             }
         }
         return $usuarios;
    }
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
}