<?php

include_once 'controlSesion.inc.php';
include_once 'redireccion.inc.php';

ControlSesion::cerrarSesion();
Redireccion::redirigir($salida);