<!DOCTYPE html>
<html lang="es">
<?php
    include_once 'app/conexion.inc.php';
    include_once 'app/tarea.inc.php';
    include_once 'app/repositorioTareas.inc.php';
    include_once 'app/validadorTarea.inc.php';

    if(isset($_POST['enviar'])){
        Conexion :: abrirConexion();
        $validador = new ValidadorTarea($_POST['asunto'], $_POST['detalles'], $_POST['hora']);      
        if ($validador -> tareaValida()){
            $tarea = new Tarea('',$_POST['categoria'], $validador -> getAsunto(), $validador -> getDetalles(), $validador -> getHora(), $_POST['prioridad']);
            $tareaInsertada = RepositorioTareas :: insertarTarea(Conexion :: obtenerConexion(), $tarea);
            if($tareaInsertada){
                //Redirigir a Login
                ECHO "Tarea almacenada";
            }
        }else{
            ECHO "TODO INCORRECTO :( porque " . $validador -> getError();
        }

        Conexion :: cerrarConexion();
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Agenda inteligente</title>
</head>

<body>
    <h1>Bienvenido a tu Agenda Inteligente</h1>
    <div class="padreModal">
        <div id='contenido' class="modal-content">
            <span id='close' class="close">×</span>
            <form id="formPadre" method="post" action="index.php" class="formPadre">
                <?php
                    include_once 'plantillas/tareaNueva.php';
                ?>
            </form>
        </div>
    </div>
    <ul id="lista" class="lista">

    </ul>


    <script src="scripts.js"></script>
</body>

</html>