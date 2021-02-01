<div>
    <div>
        <form method="post" action="app/tareaNueva.php">
            <div>
                <select id="listSelect" name="categoria"></select>
            </div>
            <div>
                <input type="text" id="asunto" placeholder="Asunto" name="asunto">
            </div>
            <div>
                <textarea cols="30" rows="10" placeholder="Detalles" name="detalles"></textarea>
            </div>
            <div>
                <p> Hora de entrega:
                    <input type="time" name="hora">
                </p>
            </div>
            <div>
                <select name="prioridad" id="prioridad">
                    <option value="1">Importante</option>
                    <option value="2" selected>Normal</option>
                    <option value="3">Poco relevante</option>
                </select>
            </div>
            <button type="submit" name="enviar">Guardar tarea</button>
        </form>
    </div>
</div>