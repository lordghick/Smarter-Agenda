<?php 
$errorEmail = $validador->obtenerErrorEmail();
$errorPassword1 = $validador->obtenerErrorPassword1();
$errorPassword2 = $validador->obtenerErrorPassword2();

if($errorEmail == !null && ($errorPassword1 == !null || $errorPassword2 == !null)){
    ?><div class="anuncio errorRegistro"> <?php echo $errorEmail; ?></div><?php
}else if($errorEmail){
    ?><div class="anuncio errorRegistro"> <?php echo $errorEmail; ?></div><?php
}else if($errorPassword1){
    ?><div class="anuncio errorRegistro"> <?php echo $errorPassword1; ?></div><?php
}else{
    ?><div class="anuncio errorRegistro"> <?php echo $errorPassword2; ?></div><?php
}