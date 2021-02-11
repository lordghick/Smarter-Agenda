<?php
include_once 'conexion.inc.php';
include_once 'repositorioTareas.inc.php';
include_once 'controlSesion.inc.php';
 session_start();

if(isset($_POST["index"]))
{
        Conexion :: abrirConexion();
        $tareasPropias = [];
        $index = $_POST["index"];
		$entradas = RepositorioTareas :: obtenerTareasPropias(Conexion::obtenerConexion(), $_SESSION['idUsuario']);
        foreach($entradas as $fila){
            $tareasPropias[] = $fila -> getId();
        }
        echo $tareasPropias[$index];
        Conexion :: cerrarConexion();
        
}