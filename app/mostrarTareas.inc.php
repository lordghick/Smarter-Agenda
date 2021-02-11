<?php

include_once 'repositorioTareas.inc.php';
include_once 'tarea.inc.php';
include_once 'conexion.inc.php';

class MostrarTareas
{
    public static function obtenerTareas()
    {
        Conexion :: abrirConexion();
        $entradas = RepositorioTareas::obtenerTareasPropias(Conexion::obtenerConexion(), $_SESSION['idUsuario']);
        if (count($entradas)) {
            foreach ($entradas as $tarea) {
                self::escribirTarea($tarea);
            }
        }
        Conexion :: cerrarConexion();
    }

    public static function escribirTarea($tarea)
    {
        if (isset($tarea)) {
?>

            <div class="card <?php                     
                    if($tarea -> getCategoria() == 0){
                        echo 'general';
                    }else if($tarea -> getCategoria() == 1){
                        echo 'personal';
                    }else if($tarea -> getCategoria() == 2){
                        echo 'trabajo';
                    } ?>">
                <div class="container-mark">
                <i class="fas fa-bookmark <?php
                    if($tarea -> getPrioridad() == 1){
                        echo 'urgente';
                    }else if($tarea -> getPrioridad() == 2){
                        echo 'importante';
                    }else if($tarea -> getPrioridad() == 3){
                        echo 'completado';
                    }
                    ?>"></i> 
                </div>
                
                <div class="asunto">
                    <h3 class="asunto-tittle"><?php echo $tarea->getAsunto(); ?></h3>
                </div>
                <div class="detalles">
                    <p class="p-detalles"><?php echo $tarea->getDetalles(); ?></p>
                </div>
                <div class="divHora">
                    <p><?php echo $tarea->getHora(); ?></p>
                </div>
            </div>



<?php
        } else {
            return;
        }
    }
}
