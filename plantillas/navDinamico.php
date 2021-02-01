<?php
    include_once 'app/controlSesion.inc.php';
    include_once 'app/config.inc.php';
    include_once 'app/redireccion.inc.php';

    if (!ControlSesion::sesionIniciada()) {
      Redireccion::redirigir($welcome);
  }
?>


<nav>
<h1>Bienvenido a tu Agenda Inteligente<?php echo ' ' . $_SESSION['nombreUsuario'];?></h1>
  <div>
    <ul>
      <li>
        <a href="<?php echo $logout ?>">Cerrar Sesion</a>
      </li>
    </ul>
  </div>
</nav>