<?php
    include_once 'app/controlSesion.inc.php';
    include_once 'app/config.inc.php';
    include_once 'app/redireccion.inc.php';

    if (!ControlSesion::sesionIniciada()) {
      Redireccion::redirigir($welcome);
  }
?>


<nav class="main-nav"> 
  <h1 class="nav-tittle main-tittle">Bienvenido<?php echo ' ' . $_SESSION['nombreUsuario'];?></h1>
  <div>
    <ul>
      <li>
        <a class="link-cerrarsesion" href="<?php echo $logout ?>">Cerrar Sesion<i class="fas fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </div>
</nav>