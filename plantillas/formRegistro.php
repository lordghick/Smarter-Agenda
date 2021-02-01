<!-- Borrador HTMl para testeo -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="app/registro.php">
        <div>
            <input class="formInput" type="text" id="nombre" placeholder="Nombre completo" name="nombre">
        </div>
        <div>
            <input type="email" id="email" placeholder="Correo electrónico" name="email">
        </div>
        <div>
            <input type="password" id="password1" placeholder="Contraseña" name="password1">
        </div>
        <div>
            <input type="password" id="password2" placeholder="Repita su contraseña" name="password2">
        </div>
        <button type="submit" class="guardarForm" name="enviar">Registrar usuario</button>
    </form>
</body>

</html>