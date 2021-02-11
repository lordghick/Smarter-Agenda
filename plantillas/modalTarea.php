<div id="modalContainer" class="modalContainer">
    <div id="modalNuevaTarea" class="modalNuevaTarea">
        <div class="btn-modal-box">
            <button type="button" class="btn-modal" id="cerrarModal" onclick="cerrarModal()"><i class="exit-btn fas fa-times-circle"></i></button>
        </div>
        <form class="form-container" method="post" action="app/tareaNueva.php">
            <div class="container-select">
                <div class="container-prioridad">
                    <select name="prioridad" id="prioridad">
                        <option value="1">Importante</option>
                        <option value="2" selected>Normal</option>
                        <option value="3">Poco relevante</option>
                    </select>
                </div>
                <div class="categoria-container">
                    <select id="listSelect" name="categoria"></select>
                </div>
            </div>

            <div class="asunto-container">
                <input type="text" id="asunto" class="asunto-input" placeholder="Asunto" name="asunto" required>
            </div>
            <div class="container-detalles">
                <textarea cols="30" rows="10" placeholder="Detalles" name="detalles"></textarea>
            </div>
            <div class="container-select-2">
                <div class="container-hora">
                    <label for="hora">Hora asignada:</label>
                    <input type="time" name="hora">
                    </p>
                </div>
                <div class="container-fecha">
                    <label for="fecha">Fecha asignada:</label>
                    <input type="date" name="fecha">
                </div>
            </div>
            <button type="submit" name="enviar" class="enviar">Guardar tarea</button>
        </form>
    </div>
</div>