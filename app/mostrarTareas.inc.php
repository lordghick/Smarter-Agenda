<?php

include_once 'repositorioTareas.inc.php';
include_once 'tarea.inc.php';

class MostrarTareas
{
    public static function obtenerTareas()
    {
        $entradas = RepositorioTareas::obtenerTareasPropias(Conexion::obtenerConexion(), $_SESSION['idUsuario']);
        if (count($entradas)) {
            foreach ($entradas as $tarea) {
                self::escribirTarea($tarea);
            }
        }
    }

    public static function escribirTarea($tarea)
    {
        if (isset($tarea)) {
?>

            <div class="card">
                <h4 class="categoria"><?php echo $tarea -> getCategoria();?></h4>
                <div class="asunto">
                    <h3><?php echo $tarea -> getAsunto(); ?></h3>
                </div>
                <div class="detalles">
                    <?php echo $tarea -> getDetalles(); ?>
                </div>
                <div class="divHora">
                    <h4><?php echo $tarea -> getHora(); ?></h4>
                </div>
                <div class="divPrioridad">
                    <p><?php $tarea -> getPrioridad(); ?></p>
                </div>
                <div class="botones">
                    <button type="button">Eliminar tarea</button>
                    <button type="button">Editar tarea</button>
                </div>
            </div>

<?php
        } else {
            return;
        }
    }
}
