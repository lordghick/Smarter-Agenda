let boton = document.getElementById('add');
let elBody = document.getElementById('chico');

boton.addEventListener('click', () =>
    {
    console.log('nwbna');
    listarTareas()
})

function listarTareas() {
    let select = document.getElementById('tarjetas');
    let option = document.createElement("button");
    option.className = "unaTarea";
    option.setAttribute("id", "botonDeTarea");
    let text = document.createTextNode("Probando pue");
    option.appendChild(text);
    select.appendChild(option);
}
elBody.addEventListener('click', displayLoco);

function displayLoco(e) {
    if (e.target.className === "unaTarea"){
        elBody.classList.toggle("body");
    }
}



