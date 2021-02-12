<?php 
include_once 'conexion.inc.php';
include_once 'repositorioTareas.inc.php';
session_start();

if(isset($_POST["index"])){

    Conexion :: abrirConexion();
    $conexion = Conexion :: obtenerConexion();
    $tareasPropias = [];
    $index = $_POST["index"];
    $entradas = RepositorioTareas :: obtenerTareasPropias(Conexion::obtenerConexion(), $_SESSION['idUsuario']);
    foreach($entradas as $fila){
        $tareasPropias[] = $fila -> getId();
    }
    $indexTarea = $tareasPropias[$index];
    try{
        $data = [
            'prioridad' => $_POST['prioridad'],
            'categoria' => $_POST['categoria'],
            'asunto' => $_POST['asunto'],
            'detalles' => $_POST['detalles'],
            'hora' => $_POST['hora'],
        ];

        $sql = "UPDATE tareas SET prioridad=:prioridad, categoria=:categoria, asunto=:asunto, detalles=:detalles, hora=:hora where id='$indexTarea'";
        $sentencia = $conexion -> prepare($sql);
        $sentencia -> execute($data);
    }catch(PDOException $ex){
        print "ERROR " . $ex -> getMessage();
    }
    Conexion :: cerrarConexion();
    
}