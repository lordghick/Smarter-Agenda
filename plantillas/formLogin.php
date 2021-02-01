<!-- Borrador HTMl para testeo -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="welcome.php">
        <div>
            <input type="email" placeholder="Correo electrónico" name="email" required autofocus>
        </div>
        <div>
            <input type="password" placeholder="Contraseña" name="password">
        </div>
        <div>
            <button type="submit" name="login">iniciar sesion</button>
        </div>
    </form>
        <form method="POST" action="welcome.php">
            <button type="submit" name="registro">Registrate aqui</button>
        </form>
</body>

</html>