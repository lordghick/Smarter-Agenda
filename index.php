<!-- Borrador HTMl para testeo -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Agenda inteligente</title>
</head>

<body>
    <!-- nav dinamigo -->
    <?php
    include_once 'plantillas/navDinamico.php';
    ?>

    <!-- Esto de acá  abajo debería ser un modal -->

    <?php
    include_once 'plantillas/modalTarea.php';
    ?>

    <!-- Y acá abajo deberían ser listadas las tareas  -->
    <ul id="lista" class="lista">

    </ul>


    <script src="scripts/scripts.js"></script>
</body>

</html>