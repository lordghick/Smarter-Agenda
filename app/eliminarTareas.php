<?php
include_once 'conexion.inc.php';
include_once 'repositorioTareas.inc.php';
include_once 'controlSesion.inc.php';
include_once 'mostrarTareas.inc.php';
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
            $sql = "DELETE FROM tareas WHERE id='$indexTarea'";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> execute();
        }catch(PDOException $ex){
            echo "ERROR " . $ex -> getMessage();
        }
        Conexion :: cerrarConexion();
        
}