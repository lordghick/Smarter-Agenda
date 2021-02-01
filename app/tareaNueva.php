<?php
include_once 'conexion.inc.php';
include_once 'tarea.inc.php';
include_once 'repositorioTareas.inc.php';
include_once 'validadorTarea.inc.php';
include_once 'redireccion.inc.php';
include_once 'controlSesion.inc.php';

if (ControlSesion::sesionIniciada()) {
    if (isset($_POST['enviar'])) {
        Conexion::abrirConexion();
        $validador = new ValidadorTarea($_POST['asunto'], $_POST['detalles'], $_POST['hora']);
        if ($validador->tareaValida()) {
            $tarea = new Tarea('', $idUsuario, $_POST['categoria'], $validador->getAsunto(), $validador->getDetalles(), $validador->getHora(), $_POST['prioridad']);
            $tareaInsertada = RepositorioTareas::insertarTarea(Conexion::obtenerConexion(), $tarea, $_SESSION['idUsuario']);
            if ($tareaInsertada) {
                Redireccion::redirigir($Correcto);
            }
        } else {
            echo "TODO INCORRECTO :( porque " . $validador->getError();
        }

        Conexion::cerrarConexion();
    }
} else {
    echo "Nada que llega";
}
