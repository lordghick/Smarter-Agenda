<?php
include_once 'app/conexion.inc.php';
include_once 'app/mostrarTareas.inc.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/mystyles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <title>Agenda inteligente</title>
</head>

<body>
    <?php
    include_once 'plantillas/modalTarea.php';
    ?>
    <main class="main-container">
        <div class="menu-aside">
            <div class="logo-container">Smarter Agenda </div>
            <button type="button" onclick="mostrarModal()">Añadir nueva tarea</button>
        </div>
        <div class="main-view">
            <?php
            include_once 'plantillas/navDinamico.php';
            ?>


            <!-- en este UL se renderizan las tareas (mostrarTareas.inc.php)  -->
            <div id="lista" class="lista">
                <?php
                Conexion::abrirConexion();
                MostrarTareas::obtenerTareas();
                Conexion::cerrarConexion();
                ?>
            </div>
        </div>
    </main>
    <script src="scripts/scripts.js"></script>
</body>

</html>