<main class="main-central">
    <div class="container-form">
        <div class="form-container">
            <h1 class="main-tittle">Iniciar sesion</h1>
            <form method="POST" action="welcome.php" class="form">
                <div class="container-email">
                    <label for="email" class="label-email">Ingresa tu correo:</label>
                    <input class="input-email" type="email" id="email" name="email" autofocus value="<?php
                        if (isset($_POST['login'])) {
                            echo $_POST['email'];
                        }
                        ?>">
                </div>
                <div class="container-password">
                    <label for="password" class="label-password">Ingresa tu contraseña:</label>
                    <input class="input-password" type="password" id="password" name="password">
                </div>
                <div class="btn-form">
                    <button type="submit" name="login" class="btn">iniciar sesion</button>
                    <button type="submit" name="registro" class="btn">Registrate aqui</button>
                </div>
            </form>
            <?php if (isset($_POST['login'])) {
            ?> <div class="anuncio errorLogin"> <?php echo $validador->getError();?></div>
            <?php } ?>
            <?php if($registroExitoso){
                         ?><div class="anuncio registro">Se ha enviado un correo de verificación</div>
            <?php } ?>
        </div>
    </div>
    <div class="container-description"></div>
</main>