
// Categorias

let categorias = ['General', 'Personal', 'Trabajo'];

function listarCategorias() {
    let select = document.getElementById('listSelect');
    for (let i = 0; i < categorias.length; i++) {
        let option = document.createElement("option");
        option.text = categorias[i];
        option.value = i;
        select.add(option)
    }
}

listarCategorias();

//prevent default

function Handler(e) {
    e.preventDefault;
}

//Modal

let modal = document.getElementById('modalContainer'),
    modalContenido = document.getElementById('modalNuevaTarea');

function mostrarModal() {
    modal.style.visibility = 'visible';
    modal.style.opacity = '1';
    modalContenido.style.top = '10%';
}

function cerrarModal() {
    modal.style.visibility = 'hidden';
    modal.style.opacity = '0';
    modalContenido.style.top = '-100%';
}


// funciones


btnActivado = false
btnCreado = [];

function eliminar() {
    if (btnActivado == false) {
        let cards = document.getElementsByClassName('card');
        for (i = 0; i < cards.length; i++) {
            let ico = document.createElement("i");
            ico.className = "fas fa-trash btnSeleccionado";
            cards[i].appendChild(ico)
            btnCreado[i] = ico;
            ico.addEventListener('click', (e) =>{
                let index = getIndex(e);
                eliminar(index);
            })
        }

        btnActivado = true;
    }
}

function modificar() {
    if (btnActivado == false) {
        let cards = document.getElementsByClassName('card');
        for (i = 0; i < cards.length; i++) {
            let ico = document.createElement("i");
            ico.className = "fas fa-pen btnSeleccionado";
            cards[i].appendChild(ico)
            btnCreado[i] = ico;
            ico.addEventListener('click', (e) =>{
                let index = getIndex(e);
                enviar(index);
            })
        }

        btnActivado = true;
    }
}

//obtener indice

function getIndex(e) {
    let tarea = e.target.parentElement;
    let cards = [...document.getElementsByClassName('card')];
    return cards.indexOf(tarea);
}

function eliminar(index)
{
    $.post("app/eliminarTareas.php", {"index":index}, removeDom(index));
}

function removeDom(index){
    let cards = document.getElementsByClassName('card');
    listado = document.getElementById('lista');
    listado.removeChild(cards[index]);
}