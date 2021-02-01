<?php

class RepositorioTareas{

    public static function obtenerTodas($conexion){
        $tareas = array();
        if(isset($conexion)){
            try{
                include_once 'tarea.inc.php';
                $sql = "SELECT * FROM tareas";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado)){
                    foreach($resultado as $fila){
                        $tareas[] = new Tarea($fila['id'], $fila['id_usuario'], $fila['categoria'], $fila['asunto'], $fila['detalles'], $fila['hora'], $fila['prioridad']);
                    }
                }else{
                        print "No existen tareas";
                    }

            }catch (PDOException $ex){
                print "ERROR" . $ex -> getMessage();
            }
        }
    }

    public static function insertarTarea($conexion, $tarea, $idUsuario) {
        $tareaInsertada = false;
        if(isset($conexion)){
            try {
                $sql = "INSERT INTO tareas(id_usuario, categoria, asunto, detalles, hora, prioridad) VALUES($idUsuario, :categoria, :asunto, :detalles, :hora, :prioridad)";
                
                $categoria = $tarea -> getCategoria();
                $asunto = $tarea -> getAsunto();
                $detalles = $tarea -> getDetalles();
                $hora = $tarea -> getHora();
                $prioridad = $tarea -> getPrioridad();

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':categoria', $categoria, PDO::PARAM_INT); 
                $sentencia -> bindParam(':asunto', $asunto, PDO::PARAM_STR); 
                $sentencia -> bindParam(':detalles', $detalles, PDO::PARAM_STR); 
                $sentencia -> bindParam(':hora', $hora, PDO::PARAM_STR); 
                $sentencia -> bindParam(':prioridad', $prioridad, PDO::PARAM_INT);

                $tareaInsertada = $sentencia -> execute();

            }catch (PDOException $ex){
                print "ERROR" . $ex -> getMessage();
            }
        }

        return $tareaInsertada;
    }

}