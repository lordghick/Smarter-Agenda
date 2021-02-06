<main class="main-central">
    <div class="container-form">
        <div class="form-container">
            <h1 class="main-tittle">Welcome to Smarter Agenda</h1>
            <form class="form" method="POST" action="welcome.php">
                <div>
                    <input class="input-registro" type="text" id="nombre" placeholder="Nombre completo" name="nombre">
                </div>
                <div>
                    <input class="input-registro" type="email" id="email" placeholder="Correo electrónico" name="email">
                </div>
                <div>
                    <input class="input-registro" type="password" id="password1" placeholder="Contraseña" name="password1">
                </div>
                <div>
                    <input class="input-registro" type="password" id="password2" placeholder="Repita su contraseña" name="password2">
                </div>
                <button class="btn" type="submit" class="guardarForm" name="enviar">Registrar usuario</button>
            </form>
        </div>
        <div class="erroresRegistro">
            <?php if (isset($_POST['enviar'])) {
                include_once 'errorresRegistro.php';
            }
            ?>
        </div>
    </div>
    <div class="container-description"></div>
</main>