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

    <div class="principal-btn">
            <button type="button" class="add" id="add" onclick="mostrarModal()"><i class="fas fa-plus"></i></button>
            <button type="button" class="edit" id="edit" onclick="btnTarget(modificar)"><i class="fas fa-pen"></i></button>
            <button type="button" class="remove" id="remove" onclick="eliminar()"><i class="fas fa-trash"></i></button>
    </div>

    <?php
    include_once 'plantillas/modalTarea.php';
    ?>
    <main class="main-container">
        <div class="menu-aside">
            <div class="logo-container">Smarter Agenda </div>
            <div class="categories-container">
                <ol><a href="#" class="link-categories" id="Personales"><i class="fas fas-categories fa-user"></i>Personales</a></ol>
                <ol><a href="#" class="link-categories" id="Trabajo"><i class="fas fas-categories fa-briefcase"></i>Trabajos</a></ol>
                <ol><a href="#" class="link-categories" id="Universidad"><i class="fas fas-categories fa-university"></i>Universidad</a></ol>
                <ol><a href="#" class="link-categories" id="Baile"><i class="fas fas-categories fa-futbol"></i>Futbol</a></ol>
                <ol><a href="#" class="link-categories" id="Otros"><i class="fas fas-categories fa-smile"></i></i>Otros</a></ol>
            </div>

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
    <script src="https://kit.fontawesome.com/12eb794d14.js" crossorigin="anonymous"></script>
    <script src="scripts/scripts.js"></script>
</body>

</html>